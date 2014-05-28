<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class OBJ_ConditionsViewDetail extends ViewDetail {

	private $exclude_attr = array('id', 'parent_type', 'deleted', 'created_by', 'modified_user_id');
	private $exclude_related_attr = array('id', 'parent_id', 'parent_type', 'deleted', 'created_by', 'modified_user_id');

 	/**
 	 * @see SugarView::display()
 	 */
 	public function display() {
		global $app_list_strings;

		$this->rebuild();
		$this->displayIndicator();
		$this->displayAuditOptions();
		$this->displayAttribute();
		$this->displayRelatedAttribute();
		if (!(isset($this->bean->attribute) and ($this->bean->attribute == 'obj_joined_table' or $this->bean->attribute == 'obj_account_name'))) {
			$this->bean->related_attribute = null;
			$this->bean->related_condition_value = null;
		}

		if (empty($this->bean->related_attribute)) {
			unset($this->dv->defs['panels']['default'][3]);
		}

 		parent::display();
 	}

	/**
	 * Display a list of indicators available.
	 */
	private function displayIndicator() {
		global $db, $app_list_strings;

		$app_list_strings['condition_indicator_list'][''] = '';
		$query = 'select id, name, object from obj_indicators;';
		$result = $db->query($query, true);
		while ($row = $db->fetchByAssoc($result)) {
			$app_list_strings['condition_indicator_list'][$row['id']] = $row['name'];
			$attribute[$row['name']] = $row['object'];
		}
	}

	/**
	 * Display an attribute list which depends on the object module user choose in the indicator.
	 */
 	private function displayAttribute() {
 		global $db, $app_list_strings, $beanList, $beanFiles;

		$app_list_strings['condition_attribute_list'][''] = '';
		$query = 'select id, name, object from obj_indicators where id = "'.$this->bean->indicator_id.'";';
		$result = $db->query($query, true);
		if ($row = $db->fetchByAssoc($result)) {
			require_once($beanFiles[$beanList[$row['object']]]);
			$bean = new $beanList[$row['object']]();
			foreach ($bean->field_name_map as $col => $prop) {
				if (in_array($col, $this->exclude_attr)) {
					continue;
				}
				if ($this->bean->attribute == $col and strpos($prop['type'], 'date') !== false) {
					$this->dv->defs['panels']['default'][2][0]['fields'] = array('attribute', 'date_options');
					$this->displayDateOptions();
				}
				if ((isset($prop['source']) and $prop['source'] != "non-db" or !isset($prop['source']))) {
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

		$app_list_strings['condition_related_attribute_list'][''] = '';

		if (isset($this->bean->attribute) and !empty($this->bean->attribute) and $this->bean->attribute == 'obj_joined_table' and 
			isset($this->bean->condition_value) and !empty($this->bean->condition_value)) {
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

				/* 
				 * Related attribute and condition value should be added dynamiclly, but if rebuild template, need to reload detail view page again.
				 * Now just keep these two fields display always.
				 * 
				if ($this->bean->attribute == 'obj_joined_table') {
					// related attribute and condition value
					$this->ev->defs['panels']['default'][2][0]['name'] = 'related_attribute';
					$this->ev->defs['panels']['default'][2][0]['label'] = 'LBL_RELATED_ATTRIBUTE';

					$this->ev->defs['panels']['default'][2][1]['name'] = 'related_condition_value';
					$this->ev->defs['panels']['default'][2][1]['label'] = 'LBL_RELATED_CONDITION_VALUE';

					// rebuild page template
					$this->clear();
				}
				*/
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
				if (isset($this->bean->obj_account_id) and !empty($this->bean->obj_account_id)) {
					$bean = $bean->retrieve($this->bean->obj_account_id);
					$this->bean->condition_value = $bean->name;
				}
			}
		}
 	}

	private function displayDateOptions() {
		if (isset($this->bean->date_options) and !empty($this->bean->date_options)) {
			if ($this->bean->date_options != "onSpecificDate") {
				$this->dv->defs['panels']['default'][2][1] = '';
			}
		}
	}

	private function displayAuditOptions() {
		if (isset($this->bean->is_audited) and !$this->bean->is_audited) {
			$this->dv->defs['panels']['default'][1][1] = '';
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

?>