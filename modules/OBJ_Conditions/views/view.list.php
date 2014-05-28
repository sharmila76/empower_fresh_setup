<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.list.php');

class OBJ_ConditionsViewList extends ViewList {

 	function listViewProcess() {

		$this->processSearchForm();
		$this->lv->searchColumns = $this->searchForm->searchColumns;

		if (!$this->headers) return;

		if (empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false) {
			$this->lv->ss->assign("SEARCH", true);
			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);

			$savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);

			global $db, $beanList, $beanFiles;

			require_once('modules/OBJ_Indicators/OBJ_Indicators.php');

			foreach ($this->lv->data['data'] as $key => &$value) {
				if (isset($value['INDICATOR_ID']) and !empty($value['INDICATOR_ID'])) {
					$indicator = new OBJ_Indicators();
					$indicator = $indicator->retrieve($value['INDICATOR_ID']);
					if (isset($indicator->object)) {
						require_once($beanFiles[$beanList[$indicator->object]]);
						$bean = new $beanList[$indicator->object]();
						foreach ($bean->field_name_map as $col => $prop) {
							if ($col == $value['ATTRIBUTE']) {
								$value['ATTRIBUTE'] = str_replace(':', '', translate($prop['vname'], $bean->module_dir));						
							}
						}
					}
				}
				if (isset($value['ATTRIBUTE']) and $value['ATTRIBUTE'] == 'obj_joined_table') {
					$value['ATTRIBUTE'] = 'Related';
					if (isset($value['CONDITION_VALUE']) and !empty($value['CONDITION_VALUE'])) {
						require_once($beanFiles[$beanList[$value['CONDITION_VALUE']]]);
						$bean = new $beanList[$value['CONDITION_VALUE']]();
						foreach ($bean->field_name_map as $col => $prop) {
							if ($col == $value['RELATED_ATTRIBUTE']) {
								$value['RELATED_ATTRIBUTE'] = str_replace(':', '', translate($prop['vname'], $bean->module_dir));						
							}
						}
					}
				} else if (isset($value['ATTRIBUTE']) and $value['ATTRIBUTE'] == "obj_account_name") {
					require_once($beanFiles[$beanList['Contacts']]);
					$bean = new $beanList['Contacts']();
					$value['ATTRIBUTE'] = str_replace(':', '', translate($bean->field_name_map['account_name']['vname'], $bean->module_dir));
					require_once($beanFiles[$beanList['Accounts']]);
					$bean = new $beanList['Accounts']();
					foreach ($bean->field_name_map as $col => $prop) {
						if ($col == $value['RELATED_ATTRIBUTE']) {
							$value['RELATED_ATTRIBUTE'] = str_replace(':', '', translate($prop['vname'], $bean->module_dir));						
						}
					}
				} else {
					$value['RELATED_ATTRIBUTE'] = null;
					$value['RELATED_CONDITION_VALUE'] = null;
					$query = "select obj_i.object from obj_indicators as obj_i, obj_conditions as obj_c where obj_i.id = obj_c.indicator_id and obj_c.id = '".$value['ID']."' and obj_i.deleted = 0 and obj_c.deleted = 0";
					$result = $db->query($query, true);
					while ($row = $db->fetchByAssoc($result)) {
						require_once($beanFiles[$beanList[$row['object']]]);
						$bean = new $beanList[$row['object']]();
						foreach ($bean->field_name_map as $col => $prop) {
							if ($col == $value['ATTRIBUTE']) {
								$value['ATTRIBUTE'] = str_replace(':', '', translate($prop['vname'], $bean->module_dir));						
							}
						}
					}
				}
			}
			echo $this->lv->display();
		}
 	}
}

?>