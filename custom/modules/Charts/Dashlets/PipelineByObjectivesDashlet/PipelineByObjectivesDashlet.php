<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2010 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/


require_once('include/Dashlets/DashletGenericChart.php');
require_once('custom/modules/Charts/Dashlets/PipelineByObjectivesDashlet/ObjectiveQueryUtil.php');

class PipelineByObjectivesDashlet extends DashletGenericChart {
	public $date_reference = null;
	public $objective_start_date = null;
	public $objective_end_date = null;
	public $obj_status_types = array();
    public $group_users;
    public $groups;
    public $user_list = "";
    public $error_messages = array();
    public $objective = null;
    public $indicator = null;
    public $check_user_field = array();

	public $query_util;

	private $tables = array();

    protected $_seedName = 'OBJ_Objectives';

    /**
     * @see DashletGenericChart::__construct()
     */
    public function __construct($id, array $options = null) {
        global $timedate, $app_list_strings;

        if (empty($options['date_reference'])) {
            $options['date_reference'] = date($timedate->get_db_date_time_format(), time());
        }

        if (empty($options['title']))
        	$options['title'] = translate($this->dashletStrings['PipelineByObjectivesDashlet']['LBL_TITLE'], 'Charts');

        parent::__construct($id, $options);

		// custom load searchfields
		$classname = get_class($this);
        if (is_file("custom/modules/Charts/Dashlets/$classname/$classname.data.php") ) {
        	$dashletData = null;
            require("custom/modules/Charts/Dashlets/$classname/$classname.data.php");
            $this->_searchFields = $dashletData[$classname]['searchFields'];
        }

		$this->objective = new OBJ_Objectives();
		$this->indicator = new OBJ_Indicators();
		$this->query_util = new ObjectiveQueryUtil();
    }

    /**
     * @see DashletGenericChart::displayOptions()
     */
    public function displayOptions() {
        global $app_list_strings, $current_user, $beanList;

		// init objective status dropdown
        if (!empty($this->obj_status_types) && count($this->obj_status_types) > 0)
            foreach ($this->obj_status_types as $key)
                $selected_datax[] = $key;
        else
            $selected_datax = array_keys($app_list_strings['obj_status_types']);

		// init check user field dropdown
        if (!empty($this->check_user_field) && count($this->check_user_field) > 0)
            foreach ($this->check_user_field as $key)
                $default_user_field_arr[] = $key;
        else
            $default_user_field_arr = array_shift(array_keys($app_list_strings['obj_check_user_fields']));


        $this->_searchFields['obj_status_types']['options'] = $app_list_strings['obj_status_types'];
        $this->_searchFields['obj_status_types']['input_name0'] = $selected_datax;
		$this->_searchFields['obj_name']['options'] = $this->get_objectives_array();
		$this->_searchFields['group_users']['options'] = $this->getObjectiveChartFilterByUsers();
		$this->_searchFields['check_user_field']['options'] = $app_list_strings['obj_check_user_fields'];
		$this->_searchFields['check_user_field']['input_name0'] = $default_user_field_arr;

		if (isset($beanList['SecurityGroups']) and $current_user->is_admin) {
			$this->_searchFields['groups']['options'] = $this->getGroups();
			$this->_searchFields['group_users']['vname'] = 'LBL_ADDITIONAL_GROUP_USERS';
		} else {
			unset($this->_searchFields['groups']);
		}

        return parent::displayOptions();
    }

	public function getGroups() {
		$groups = array();
		include_once('modules/SecurityGroups/SecurityGroup.php');
		$sg = new SecurityGroup();
		foreach (array_values($sg->getAllSecurityGroups()) as $g) {
			$groups[$g['id']] = $g['name'];
		}
		return $groups;
	}

	public function getObjectiveChartFilterByUsers() {
		global $current_user, $db, $beanList, $locale;

		$users = array();

		// if SecuritySuite is installed, get users by roles
		if (isset($beanList['SecurityGroups']) and !empty($current_user->title)) {
			if ($current_user->title == 'Administrator' or $current_user->title == 'Executive Director') {
				$users = $this->get_all_active_users();
			} else if ($current_user->title == 'Zone Manager' or $current_user->title == 'Country BD Manager') {
				$sg = new SecurityGroup();
				$group_ids = array_keys($sg->getUserSecurityGroups($current_user->id));
				$users = $this->getUsersByGroups($group_ids, $sg);
			} else if ($current_user->title == 'Sales Executive' or $current_user->title == 'BD support') {
				$users[$current_user->id] = $current_user->name;
			} else {
				$users = $this->get_all_active_users();
			}
		} else {
			$users = $this->get_all_active_users();
		}

		asort($users);

		return $users;
	}

    /**
     * @see DashletGenericChart::displayScript()
     */
    public function displayScript() {
        require_once('custom/modules/Charts/Dashlets/PipelineByObjectivesDashlet/ObjectiveChart.php');
        $objectiveChart = new ObjectiveChart();
		return $objectiveChart->getDashletScript($this->id);
    }

	public function get_all_active_users() {
		global $locale, $db;
		$user_list = array();
		$r = $db->query("SELECT id, first_name, last_name, user_name FROM users WHERE status = 'Active' AND deleted = 0;");
		while($a = $db->fetchByAssoc($r)) {
			$user_list[$a['id']] = $locale->getLocaleFormattedName($a['first_name'], $a['last_name']);
		}
		return $user_list;
	}

	public function get_objectives_array() {
		global $db;
		$objectives_array = array();
		$list = $this->objective->get_full_list("name");
		if (isset($list)) {
			foreach($list as $i) {
				$objectives_array[$i->id] = $i->name;
			}
		}
		return $objectives_array;
	}

	/**
	 * Function to display Objective Dashlet.
	 */
    public function display() {
    	global $app_list_strings, $current_user, $sugar_config, $dictionary, $beanList, $beanFiles, $timedate;

        if ($this->objective->isSugar6_2()) {
			// compatible with Sugar 6.2
	        require_once('custom/modules/Charts/Dashlets/PipelineByObjectivesDashlet/ObjectiveChart.php');
	        $objectiveChart = new ObjectiveChart();
        } else {
        	// compatible with Sugar 5.5 and 6.1
	        require_once('custom/modules/Charts/Dashlets/PipelineByObjectivesDashlet/ObjectiveFlashChart.php');
	        $objectiveChart = new ObjectiveFlashChart();
	        $objectiveChart->colors_list = array("0x009ACC", "0xEF0000");
//	        $this->date_reference = $timedate->to_db($timedate->to_display_date($this->date_reference, false));
        }
        $objectiveChart->is_currency = false;
        $objectiveChart->group_by = array('user_name');
        $objectiveChart->base_url = array(
			'module' => 'OBJ_Objectives',
			'action' => 'index',
			'query' => 'true',
			'searchFormTab' => 'advanced_search',
		);

		// get current objective
		if (!empty($this->obj_name)) {
			$this->objective = $this->objective->retrieve($this->obj_name);
			if (isset($this->objective)) {
				$this->indicator = $this->indicator->retrieve($this->objective->obj_indicator_id);
				$this->query_util->init($this);
				$title = 'Objectives "'.$this->objective->name. '" ' .$this->getObjectiveStatus()." ".$this->query_util->getChartTitle();
				$objectiveChart->setDisplayProperty('type', 'group by chart');
				$objectiveChart->setDisplayProperty('title', $title);
				$objective_labels = return_module_language($GLOBALS['current_language'], 'OBJ_Objectives');
				$indicator_labels = return_module_language($GLOBALS['current_language'], 'OBJ_Indicators');
		        $objectiveChart->getData($this->constructQuery($objectiveChart));
		        $objectiveChart->setDisplayProperty('subtitle', $objective_labels['LBL_DISPLAY_IN_PERCENTAGE'].' - '. $objective_labels['LBL_DIRECTION'] . " " . $app_list_strings['indicator_direction_list'][$this->objective->direction] . " $history_loaded ");
				$xmlFile = $objectiveChart->getXMLFileName($this->id);
		        $objectiveChart->saveXMLFile($xmlFile, $objectiveChart->generateXML());
				$this->printErrorMessage();
				if ($this->objective->isSugar6_2())
		        	return $this->getTitle('<div align="center"></div>') . '<div align="center">' . $objectiveChart->display($this->id, $xmlFile, '100%', '480', false) . '</div>'. $this->processAutoRefresh();
		        else
		        	return $this->getTitle('<div align="center"></div>') . '<div align="center">' . $objectiveChart->display($this->id, $xmlFile, '100%', '480', false) . '</div><br />';
			}
		}

		$objectiveChart->setDisplayProperty('type', 'group by chart');
        $objectiveChart->getData("select id from obj_objectives where id is null");
		$xmlFile = $objectiveChart->getXMLFileName($this->id);
        $objectiveChart->saveXMLFile($xmlFile, $objectiveChart->generateXML());
        $this->printErrorMessage();
        return $this->getTitle('<div align="center"></div>') . '<div align="center">' . $objectiveChart->display($this->id, $xmlFile, '100%', '480', false) . '</div><br />';
	}

	public function getObjectiveStatus() {
		if (empty($this->obj_status_types) or count($this->obj_status_types) == 2) return "";
		elseif (!empty($this->obj_status_types) and $this->obj_status_types[0] == 'achieved') return 'achieved';
		elseif (!empty($this->obj_status_types) and $this->obj_status_types[0] == 'not_achieved') return 'not achieved';
		else return;
	}

    /**
     * @see DashletGenericChart::constructQuery()
     */
    protected function constructQuery(&$objectiveChart) {
		$this->query_util->validate();
		$objectiveChart->enableLink();
		$this->query_util->setupQuery();
		$this->query_util->fixUpEmptyResultOnUsers();
		$this->query_util->filterObjectivesByStatus();
        return $this->query_util->getQuery();
    }

	/**
	 * Function to print error messages for objective dashlet process.
	 */
	private function printErrorMessage() {
		foreach ($this->query_util->getErrorMessages() as $error) {
			echo $error;
		}
	}

}

?>
