<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.list.php');

class OBJ_IndicatorsViewList extends ViewList {

 	function listViewProcess() {
 		$this->displayObjectList();
 		
		$this->processSearchForm();
		$this->lv->searchColumns = $this->searchForm->searchColumns;
		
		
		if (!$this->headers)
			return;
		if (empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false) {
			$this->lv->ss->assign("SEARCH", true);
			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
			$savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);

			global $app_list_strings, $beanList, $beanFiles;
			foreach ($this->lv->data['data'] as $key => &$value) {
				if($value['OBJECT'] == "Targets"){
					$value['OBJECT'] = "Prospects";
				}
				if($value['OBJECT'] == "Target Lists"){
					$value['OBJECT'] = "ProspectLists";
				}
				if($value['OBJECT'] == "Security Groups Management"){
					$value['OBJECT'] = "SecurityGroups";
				}
				require_once($beanFiles[$beanList[$value['OBJECT']]]);
				$bean = new $beanList[$value['OBJECT']]();
				foreach ($bean->field_name_map as $col => $prop) {
					if ($col == $value['ATTRIBUTE']) {
						$value['ATTRIBUTE'] = str_replace(':', '', translate($prop['vname'], $bean->module_dir));						
					}
				}
				$value['OBJECT'] = $app_list_strings['moduleList'][$value['OBJECT']];
			}

			echo $this->lv->display();
		}
 	}
    function prepareSearchForm(){
    	$this->displayObjectList();
    	parent::prepareSearchForm();
    	
    }
 	
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
}


?>