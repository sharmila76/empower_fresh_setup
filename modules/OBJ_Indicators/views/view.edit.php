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

class OBJ_IndicatorsViewEdit extends ViewEdit {

	var $period_dropdown_metadata = array(
		"period" => array(
			"W" => array ("period_reference" => "indicator_period_reference_W_list"),
			"M" => array ("period_reference" => "indicator_period_reference_M_list"),
			"Y" => array ("period_reference" => "indicator_period_reference_Y_list"),
		),
	);

 	/**
 	 * @see SugarView::display()
 	 */
 	public function display() {
		global $app_list_strings;

		$this->displayObjectList();
		
		

		if (isset($_POST['object'])) {
			$this->bean->object = $_POST['object'];
		}
		if (isset($this->bean->object) && !empty($this->bean->object)) {
			$this->displayAttribute();
		}
		if (!isset($app_list_strings['indicator_attribute_list'])) $app_list_strings['indicator_attribute_list'][''] = '';
		if (!isset($app_list_strings['indicator_date_list'])) $app_list_strings['indicator_date_list'][''] = '';

		if (isset($_POST['name'])) $this->bean->name = $_POST['name'];
		if (isset($_POST['operation'])) $this->bean->operation = $_POST['operation'];
		if (isset($_POST['period'])) $this->bean->period = $_POST['period'];
		if (isset($_POST['period_reference'])) $this->bean->period_reference = $_POST['period_reference'];

 		parent::display();

		global $app_list_strings;
		echo "<script>SUGAR.language.setLanguage('app_list_strings', ".json_encode($app_list_strings).");</script>";
		echo '<script>var periodNumberDefs = ' . json_encode($this->period_dropdown_metadata) . ';</script>';
		if (!empty($this->bean->id)) {
			$this->process_default_values();
		}
		echo '<script>show_period_numbers(document.getElementById(\'period\'))</script>';
 	}

	/**
	 * Display an object list which depends on module objects show on the Tab Menu.
	 */
	private function displayObjectList() {
		global $app_list_strings, $modListHeader;

		$app_list_strings['indicator_module_list'][''] = '';
		foreach ($modListHeader as $key => $value) {
			if ($key != 'Home' and $key != 'OBJ_Conditions' and $key != 'OBJ_Indicators' and $key != 'OBJ_Objectives' and $key != 'Calendar') {
				if ($key == 'Activities') {
					$app_list_strings['indicator_module_list']['Calls'] = $app_list_strings['moduleList']['Calls'];
					$app_list_strings['indicator_module_list']['Meetings'] = $app_list_strings['moduleList']['Meetings'];
					$app_list_strings['indicator_module_list']['Tasks'] = $app_list_strings['moduleList']['Tasks'];
				} else {
					$app_list_strings['indicator_module_list'][$key] = $app_list_strings['moduleList'][$key];
				}
			}
		}

	}

	/**
	 * Display an attribute list which depends on the object module user choose.
	 * This attribute should be calculable.
	 * This attribute is optional, if not set, the number of records will be counted.
	 */
 	private function displayAttribute() {
 		global $app_list_strings, $beanList, $beanFiles;

		$app_list_strings['indicator_attribute_list'][''] = '';
		require_once($beanFiles[$beanList[$this->bean->object]]);
		$bean = new $beanList[$this->bean->object]();
		foreach ($bean->field_name_map as $col => $prop) {
			if ((strpos("#".$prop['type'], "int") != 0
				or strpos("#".$prop['type'], "float") != 0 
				or strpos("#".$prop['type'], "double") != 0 
				or strpos("#".$prop['type'], "numeric") != 0
				or strpos("#".$prop['type'], "real") != 0 
				or strpos("#".$prop['type'], "decimal") != 0
				or strpos("#".$prop['type'], "currency") != 0) 
				and $col != "deleted" and (isset($prop['source']) and $prop['source'] != "non-db" or !isset($prop['source']))) {
				$app_list_strings['indicator_attribute_list'][$col] = str_replace(':', '', translate($prop['vname'], $bean->module_dir));
			}
		}

 	}

	private function process_default_values() {
		$default_values = array();

		foreach($this->period_dropdown_metadata as $field => $field_defs) {
			foreach($field_defs[$this->bean->$field] as $target_field => $target_dd) {
				$sub_field = str_replace("[]", "", $target_field);
				$default_values[$target_field] = $this->bean->$sub_field;
			}
		}
		echo '<script>var defaultValuesDefs = ' . json_encode($default_values) . ';</script>';
	}

}