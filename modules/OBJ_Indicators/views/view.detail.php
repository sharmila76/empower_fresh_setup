<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class OBJ_IndicatorsViewDetail extends ViewDetail {

    function _displaySubPanels() {
        if (isset($this->bean) && !empty($this->bean->id) && (file_exists('modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/Ext/Layoutdefs/layoutdefs.ext.php'))) {
            $GLOBALS['focus'] = $this->bean;
            require_once ('modules/OBJ_Indicators/views/OBJ_Indicators_SubPanelTiles.php');
            $subpanel = new OBJ_Indicators_SubPanelTiles($this->bean, $this->module);
            echo $subpanel->display();
        }
    }

 	/**
 	 * @see SugarView::display()
 	 */
 	public function display() {
		global $app_list_strings;

		$this->displayObjectList();
		$this->displayAttribute();
		$this->displayPeriodReference();

		if (!isset($app_list_strings['indicator_attribute_list'])) $app_list_strings['indicator_attribute_list'][''] = '';
		if (!isset($app_list_strings['indicator_date_list'])) $app_list_strings['indicator_date_list'][''] = '';

 		parent::display();

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
	 * The attribute should be calculable.
	 */
 	private function displayAttribute() {
 		global $app_list_strings, $beanList, $beanFiles;

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

	private function displayPeriodReference() {
		$this->bean->field_defs["period_reference"]["options"] = "indicator_period_reference_".$this->bean->period."_list";
	}
}

?>