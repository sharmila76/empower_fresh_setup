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
require_once('modules/OBJ_Indicators/OBJ_Indicators.php');

class OBJ_ConditionsViewEdit extends ViewEdit {

	private $exclude_attr = array('id', 'parent_type', 'deleted', 'created_by', 'modified_user_id', 'assigned_user_id');
	private $exclude_related_attr = array('id', 'parent_id', 'parent_type', 'deleted', 'created_by', 'modified_user_id', 'assigned_user_id');

	
	public function preDisplay() {
		$is_from_change=$_POST['change_attribute'];
		echo "<input type=\"hidden\" name=\"is_from_change\" id=\"is_from_change\"  value=\"$is_from_change\" />";
		parent::preDisplay();
	}
	
	
 	/**
 	 * @see SugarView::display()
 	 */
 	public function display() {
		global $app_list_strings;

		$this->rebuild();
		$this->displayIndicator();
		// Retrieved by $_REQUEST['parent_id'] from subpanel
		if (!empty($_REQUEST['parent_id'])) $_POST['indicator_id'] = $_REQUEST['parent_id'];

		if (!isset($_POST['indicator_id']) and !isset($this->bean->id) or isset($_POST['indicator_id']) and empty($_POST['indicator_id'])) {
			$this->initEmptyPage();
		} else {
			if (isset($_POST['indicator_id'])) $this->bean->indicator_id = $_POST['indicator_id'];
			if (isset($this->bean->indicator_id) && !empty($this->bean->indicator_id)) {
				$this->displayAttribute();
			} else {
				global $app_list_strings;
				$app_list_strings['condition_attribute_list'][''] = '';
			}

			if (isset($_POST['name']) and !empty($_POST['name'])) $this->bean->name = $_POST['name'];

			$this->displayConditionValue();

			if (isset($this->bean->attribute) and !empty($this->bean->attribute)) {
				if (($this->bean->attribute == 'obj_joined_table' || $this->bean->attribute == 'obj_account_name')) {
					$this->displayRelatedAttribute();
					$this->displayRelatedConditionValue();
				} else {
					$this->bean->related_attribute = null;
					$this->bean->related_condition_value = null;
				}
			}
		}
		
		//Prevent list for attribute display list
		foreach($app_list_strings['condition_attribute_prevent_list'] as $k => $v){
			unset($app_list_strings['condition_attribute_list'][$k]);
		}

 		parent::display();
 	}

	private function initEmptyPage() {

		unset($this->ev->defs['panels']['default'][3]);

		global $app_list_strings;
		$app_list_strings['condition_attribute_list'][''] = '';

		$this->rebuild();

		unset($this->bean->indicator_id);
		unset($this->bean->name);
		$this->bean->name = null;
		unset($this->bean->attribute);
		unset($this->bean->condition_value);
		unset($this->bean->related_attribute);
		unset($this->bean->related_condition_value);
		unset($_POST['indicator_id']);
		unset($_POST['name']);
		unset($_POST['attribute']);
		unset($_POST['condition_value']);
		unset($_POST['related_attribute']);
		unset($_POST['related_condition_value']);
	}

	/**
	 * Display a list of indicators available.
	 */
	private function displayIndicator() {
		global $db, $app_list_strings;

		$app_list_strings['condition_indicator_list'][''] = '';
		$indicator = new OBJ_Indicators();
		$indicators = $indicator->get_full_list();
		foreach ($indicators as $i) {
			$app_list_strings['condition_indicator_list'][$i->id] = $i->name;
		}
	}

	/**
	 * Display an attribute list which depends on the object module user choose in the indicator.
	 */
 	private function displayAttribute() {
 		global $db, $app_list_strings, $beanList, $beanFiles;

		$indicator = new OBJ_Indicators();
		$indicator = $indicator->retrieve($this->bean->indicator_id);
		if (isset($indicator) and isset($beanFiles[$beanList[$indicator->object]]) and !empty($beanFiles[$beanList[$indicator->object]])) {
			require_once($beanFiles[$beanList[$indicator->object]]);
			$bean = new $beanList[$indicator->object]();
			foreach ($bean->field_name_map as $col => $prop) {
				if (in_array($col, $this->exclude_attr)) {
					continue;
				}
				if ((!isset($prop['source']) or isset($prop['source']) and $prop['source'] != "non-db") and 
				((!isset($prop['type']) or isset($prop['type']) and $prop['type'] != 'id') or $col == 'parent_id')) {
				 	if ($col == 'parent_id') {
				 		if ($bean->object_name == "Email" and !isset($prop['vname'])) {
				 			$prop['vname'] = 'LBL_EMAIL_RELATE';
				 		}
				 		$app_list_strings['condition_attribute_list']['obj_joined_table'] = str_replace(':', '', translate($prop['vname'], $bean->module_dir));
				 	} else {
						$app_list_strings['condition_attribute_list'][$col] = str_replace(':', '', translate($prop['vname'], $bean->module_dir));
				 	}
				} else if ($col == 'account_name') {
					$app_list_strings['condition_attribute_list']['obj_account_name'] = str_replace(':', '', translate($prop['vname'], $bean->module_dir));
				}
			}
		}
 	}

	/**
	 * Display an attribute list which depends on the object module user choose in the indicator.
	 */
 	private function displayRelatedAttribute() {
 		global $db, $app_list_strings, $beanList, $beanFiles;

		if (isset($_POST['condition_value']) && !empty($_POST['condition_value'])) $this->bean->condition_value = $_POST['condition_value'];
		if (isset($this->bean->attribute) and !empty($this->bean->attribute) and $this->bean->attribute == 'obj_joined_table') {
			// init related attribute list by first table related.
			if (!isset($this->bean->condition_value) or empty($this->bean->condition_value) or !isset($beanList[$this->bean->condition_value])) $this->bean->condition_value = array_shift(array_keys($app_list_strings['parent_type_display']));
			if (isset($beanList[$this->bean->condition_value]) and !empty($beanList[$this->bean->condition_value]) and
				isset($beanFiles[$beanList[$this->bean->condition_value]]) and !empty($beanFiles[$beanList[$this->bean->condition_value]])) {
				require_once($beanFiles[$beanList[$this->bean->condition_value]]);
				$bean = new $beanList[$this->bean->condition_value]();
				foreach ($bean->field_name_map as $col => $prop) {
					if (in_array($col, $this->exclude_related_attr)) {
						continue;
					}
					if ((isset($prop['source']) and $prop['source'] != "non-db" or !isset($prop['source']))) {
						$app_list_strings['condition_related_attribute_list'][$col] = str_replace(':', '', translate($prop['vname'], $bean->module_dir));
					}
				}
			}
		} else if (isset($this->bean->attribute) and !empty($this->bean->attribute) and $this->bean->attribute == 'obj_account_name') {
			if (isset($beanList['Accounts']) and !empty($beanList['Accounts']) and
				isset($beanFiles[$beanList['Accounts']]) and !empty($beanFiles[$beanList['Accounts']])) {
				require_once($beanFiles[$beanList['Accounts']]);
				$bean = new $beanList['Accounts']();
				foreach ($bean->field_name_map as $col => $prop) {
					if (in_array($col, $this->exclude_related_attr)) {
						continue;
					}
					if ((isset($prop['source']) and $prop['source'] != "non-db" or !isset($prop['source']))) {
						$app_list_strings['condition_related_attribute_list'][$col] = str_replace(':', '', translate($prop['vname'], $bean->module_dir));
					}
				}
			}
		}
 	}

	/**
	 * Dynamically display the condition value field which depends on the data type of the attribute.
	 * e.g. if a date field, it displays a text field with calendar.
	 */
	private function displayConditionValue() {
		global $db, $app_list_strings, $beanList, $beanFiles;

		// When created by subpanel, set the first attribute of target object as default.
		// When edited by subpanel, $_REQUEST['record'] is assigned.
		if (!empty($_REQUEST['parent_id']) and !isset($_REQUEST['record'])) {
			$_POST['attribute'] = array_shift(array_keys($app_list_strings['condition_attribute_list']));
		}

		if (isset($_POST['attribute'])) {
			// when change object, check if attribute related
			// if not, select the first attribute in the list
			if (!array_key_exists($_POST['attribute'], $app_list_strings['condition_attribute_list'])) {
				$this->bean->attribute = array_shift(array_keys($app_list_strings['condition_attribute_list']));
			} else {
				$this->bean->attribute = $_POST['attribute'];
			}
		}

		if (isset($this->bean->attribute) && !empty($this->bean->attribute)) {
			// dynamic generate condition value field
			$indicator = new OBJ_Indicators();
			$indicator = $indicator->retrieve($this->bean->indicator_id);
			if (isset($indicator) and isset($beanFiles[$beanList[$indicator->object]]) and !empty($beanFiles[$beanList[$indicator->object]])) {
				require_once($beanFiles[$beanList[$indicator->object]]);
				$bean = new $beanList[$indicator->object]();
				foreach ($bean->field_name_map as $col => $prop) {
					if ($this->bean->attribute == $col) {
						if (isset($prop['type']) and !empty($prop['type'])) {
							$this->ev->defs['panels']['default'][2][1]['type'] = $prop['type'];
							$this->ev->focus->field_defs['condition_value']['type'] = $prop['type'];
						}
						if (strpos($prop['type'], 'date') !== false) {
							$this->ev->defs['panels']['default'][2][0]['fields'] = array(
				          		array(
									'name' => 'attribute',
									'displayParams' => 
						            array (
						              'javascript' => 'onchange="this.form.action.value=\'EditView\';disableOnUnloadEditView(this.form);this.form.submit();"',
						            ),
								),
				          		array(
									'name' => 'date_options',
									'displayParams' => 
						            array (
						              'javascript' => 'onchange="this.form.action.value=\'EditView\';disableOnUnloadEditView(this.form);this.form.submit();"',
						            ),
								),
							);
							$this->displayDateOptions();
						}
						if ($prop['type'] == 'relate') {
							if (isset($prop['table'])) $this->ev->focus->field_defs['condition_value']['table'] = $prop['table'];
							if (isset($prop['module'])) $this->ev->focus->field_defs['condition_value']['module'] = $prop['module'];
							if (isset($prop['dbType'])) $this->ev->focus->field_defs['condition_value']['dbType'] = $prop['dbType'];
							if (isset($prop['id_name'])) $this->ev->focus->field_defs['condition_value']['id_name'] = $prop['id_name'];
						}
						if (isset($prop['options'])) $this->ev->focus->field_defs['condition_value']['options'] = $prop['options'];
					} else if ($this->bean->attribute == 'obj_joined_table' and isset($app_list_strings['condition_attribute_list']['obj_joined_table'])) {
						$this->ev->defs['panels']['default'][2][1]['type'] = 'enum';
						$this->ev->focus->field_defs['condition_value']['options'] = 'parent_type_display';
						$this->ev->defs['panels']['default'][2][1]['displayParams']['javascript'] = 'onchange="this.form.action.value=\'EditView\';disableOnUnloadEditView(this.form);this.form.submit();"';

						// related attribute and condition value
						$this->ev->defs['panels']['default'][3][0]['name'] = 'related_attribute';
						$this->ev->defs['panels']['default'][3][0]['label'] = 'LBL_RELATED_ATTRIBUTE';
						$this->ev->defs['panels']['default'][3][0]['displayParams']['javascript'] = 'onchange="this.form.action.value=\'EditView\';disableOnUnloadEditView(this.form);this.form.submit();"';

						$this->ev->defs['panels']['default'][3][1]['name'] = 'related_condition_value';
						$this->ev->defs['panels']['default'][3][1]['label'] = 'LBL_RELATED_CONDITION_VALUE';
					} else if ($this->bean->attribute == 'obj_account_name' and array_key_exists('account_name', $bean->field_name_map)) {
						$this->ev->defs['panels']['default'][2][1]['name'] = 'obj_account_name';

						// related account attribute and condition value
						$this->ev->defs['panels']['default'][3][0]['name'] = 'related_attribute';
						$this->ev->defs['panels']['default'][3][0]['label'] = 'LBL_RELATED_ATTRIBUTE';
						$this->ev->defs['panels']['default'][3][0]['displayParams']['javascript'] = 'onchange="this.form.action.value=\'EditView\';disableOnUnloadEditView(this.form);this.form.submit();"';

						$this->ev->defs['panels']['default'][3][1]['name'] = 'related_condition_value';
						$this->ev->defs['panels']['default'][3][1]['label'] = 'LBL_RELATED_CONDITION_VALUE';
					}
				}
			}
		} else {
			// clean related attribute row when attribute is empty.
			unset($this->ev->defs['panels']['default'][3]);
		}
		// rebuild page template
		$this->rebuild();
	}

	private function displayRelatedConditionValue() {
		global $db, $app_list_strings, $beanList, $beanFiles;

		if (isset($_POST['related_attribute']) && !empty($_POST['related_attribute'])) {
			// when change object, check if attribute related
			// if not, select the first attribute in the list
			if (!array_key_exists($_POST['related_attribute'], $app_list_strings['condition_related_attribute_list'])) {
				$this->bean->related_attribute = array_shift(array_keys($app_list_strings['condition_related_attribute_list']));
			} else {
				$this->bean->related_attribute = $_POST['related_attribute'];
			}
		}

		if (isset($_POST['attribute']) && !empty($_POST['attribute'])) $this->bean->attribute = $_POST['attribute'];
		if (isset($_POST['condition_value']) && !empty($_POST['condition_value'])) $this->bean->condition_value = $_POST['condition_value'];
		if (isset($this->bean->related_attribute) && !empty($this->bean->related_attribute) and
			isset($this->bean->attribute) and !empty($this->bean->attribute) and $this->bean->attribute == 'obj_joined_table' and
			isset($beanList[$this->bean->condition_value]) and
			isset($beanFiles[$beanList[$this->bean->condition_value]]) and !empty($beanFiles[$beanList[$this->bean->condition_value]]) and
			isset($app_list_strings['condition_attribute_list']['obj_joined_table'])) {
			// dynamic generate related condition value field
			require_once($beanFiles[$beanList[$this->bean->condition_value]]);
			$bean = new $beanList[$this->bean->condition_value]();
			foreach ($bean->field_name_map as $col => $prop) {
				if ($this->bean->related_attribute == $col) {
					if (isset($prop['type']) and !empty($prop['type'])) {
						$this->ev->defs['panels']['default'][3][1]['name'] = 'related_condition_value';
						$this->ev->defs['panels']['default'][3][1]['type'] = $prop['type'];
						$this->ev->focus->field_defs['related_condition_value']['type'] = $prop['type'];
					}
					if ($prop['type'] == 'relate') {
						if (isset($prop['table'])) $this->ev->focus->field_defs['related_condition_value']['table'] = $prop['table'];
						if (isset($prop['module'])) $this->ev->focus->field_defs['related_condition_value']['module'] = $prop['module'];
						if (isset($prop['dbType'])) $this->ev->focus->field_defs['related_condition_value']['dbType'] = $prop['dbType'];
						if (isset($prop['id_name'])) $this->ev->focus->field_defs['related_condition_value']['id_name'] = $prop['id_name'];
					}
					if (isset($prop['options'])) $this->ev->focus->field_defs['related_condition_value']['options'] = $prop['options'];
				}
			}
		} else if (isset($this->bean->related_attribute) && !empty($this->bean->related_attribute) and
			isset($this->bean->attribute) and !empty($this->bean->attribute) and $this->bean->attribute == 'obj_account_name' and
			array_key_exists(3, $this->ev->defs['panels']['default'])) {
			if (isset($beanList['Accounts']) and !empty($beanList['Accounts']) and
				isset($beanFiles[$beanList['Accounts']]) and !empty($beanFiles[$beanList['Accounts']])) {
				require_once($beanFiles[$beanList['Accounts']]);
				$bean = new $beanList['Accounts']();
				foreach ($bean->field_name_map as $col => $prop) {
					if ($this->bean->related_attribute == $col) {
						if (isset($prop['type']) and !empty($prop['type'])) {
							$this->ev->defs['panels']['default'][3][1]['name'] = 'related_condition_value';
							$this->ev->defs['panels']['default'][3][1]['type'] = $prop['type'];
							$this->ev->focus->field_defs['related_condition_value']['type'] = $prop['type'];
						}
						if ($prop['type'] == 'relate') {
							if (isset($prop['table'])) $this->ev->focus->field_defs['related_condition_value']['table'] = $prop['table'];
							if (isset($prop['module'])) $this->ev->focus->field_defs['related_condition_value']['module'] = $prop['module'];
							if (isset($prop['dbType'])) $this->ev->focus->field_defs['related_condition_value']['dbType'] = $prop['dbType'];
							if (isset($prop['id_name'])) $this->ev->focus->field_defs['related_condition_value']['id_name'] = $prop['id_name'];
						}
						if (isset($prop['options'])) $this->ev->focus->field_defs['related_condition_value']['options'] = $prop['options'];
					}
				}

			}
		}
		// rebuild page template
		$this->rebuild();
	}

	private function displayDateOptions() {
		if (isset($_POST['date_options']) and !empty($_POST['date_options'])) $this->bean->date_options = $_POST['date_options'];
		if (isset($this->bean->date_options) and !empty($this->bean->date_options)) {
			if ($this->bean->date_options != "onSpecificDate") {
				unset($this->ev->defs['panels']['default'][2][1]);
			}
		}
	}

	/**
	 * Clear and rebuild.
	 */
	private function rebuild() {
		include_once ('modules/Administration/QuickRepairAndRebuild.php');
    	$repair = new RepairAndClear();
    	$repair->module_list = array('OBJ_Conditions');
		$repair->clearTpls();
	}
}