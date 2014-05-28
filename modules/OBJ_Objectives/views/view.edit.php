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
/*********************************************************************************

 * Description: This file is used to override the default Meta-data EditView behavior
 * to provide customization specific to the Tasks module.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('include/MVC/View/views/view.edit.php');

class OBJ_ObjectivesViewEdit extends ViewEdit {

 	/**
 	 * @see SugarView::display()
 	 */
 	public function display() {
		global $app_list_strings;

		$this->getObjectiveValueWidgetEditView($this->bean->id, $this->bean->module_dir, false,'',0);
		$this->getUserList();

 		parent::display();

 		echo '<script>displayObjectiveValueOptions()</script>';
 	}

	function getUserList() {
		global $db, $locale;
		
		$users = array();

		$query  = "SELECT id, first_name, last_name, user_name FROM users WHERE status='Active' AND deleted=0 ";
		$r = $db->query($query);
		while($a = $db->fetchByAssoc($r)) {
			$users[] = array ('id' => $a['id'], 'user_name' => $locale->getLocaleFormattedName($a['first_name'], $a['last_name']));
		}
		foreach ($users as $k => $v) {
		    $id[$k]  = $v['id'];
		    $user_name[$k] = $v['user_name'];
		}
		array_multisort($user_name, SORT_ASC, $users);

		$this->ss->assign('users', $users);
	}

    function getObjectiveValueWidgetEditView($id, $module, $asMetadata=false, $tpl='',$tabindex='') {
        if ( !($this->ss instanceOf Sugar_Smarty ) )
            $this->ss = new Sugar_Smarty();
        
        global $app_strings, $dictionary, $beanList;
        
		$prefill = 'false';
        $prefillData = 'new Object()';
        $passedModule = $module;
        $saveModule = $module;
        if(isset($_POST['is_converted']) && $_POST['is_converted']==true){
            $id=$_POST['return_id'];
            $module=$_POST['return_module'];
        }
        $prefillDataArr = array();
        if(!empty($id)) {
        	$obj = new OBJ_Objectives();
            $prefillDataArr = $obj->getValuesByObjectiveId($id);
		} else if(isset($_REQUEST['full_form']) && !empty($_REQUEST['objectiveValueWidget'])){
			$widget_id = isset($_REQUEST[$module . '_objective_value_widget_id']) ? $_REQUEST[$module . '_objective_value_widget_id'] : '0';
            $count = 0;
            $key1 = $module . $widget_id . 'assigned_user_id'.$count;
            $key2 = $module . $widget_id . 'objectiveValue'.$count;
            while(isset($_REQUEST[$key1]) && isset($_REQUEST[$key2])) {
                   $assigned_user_id = $_REQUEST[$key1];
                   $objective_value = $_REQUEST[$key2];
                   $prefillDataArr[] =  array(
						'assigned_user_id'=>$assigned_user_id,
						'objective_value'=>$objective_value,
						);
                   $key1 = $module . $widget_id . 'assigned_user_id' . ++$count;
                   $key2 = $module . $widget_id . 'objectiveValue' . $count;
            } //while
        }
        if(!empty($prefillDataArr)) {
            $json = new JSON(JSON_LOOSE_TYPE);
            $prefillData = $json->encode($prefillDataArr);
            $prefill = !empty($prefillDataArr) ? 'true' : 'false';
        }
        $required = false;
        $vardefs = $dictionary[$beanList[$passedModule]]['fields'];
        if (!empty($vardefs['objective_value']) && isset($vardefs['objective_value']['required']) && $vardefs['objective_value']['required'])
            $required = true;
        $this->ss->assign('required', $required);
        $this->ss->assign('module', $saveModule);
        $this->ss->assign('app_strings', $app_strings);
        $this->ss->assign('prefillObjectiveValues', $prefill);
        $this->ss->assign('prefillData', $prefillData);
        $this->ss->assign('tabindex', $tabindex);
        $this->ss->assign('addDefaultValue', (isset($_REQUEST['module']) && $_REQUEST['module'] == 'OBJ_Objectives') ? 'false' : 'true');
		$this->ss->assign('objectiveValueView', $this->ev->view);
    }
}