<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

include_once('include/ListView/ListView.php');

class OBJ_Conditions_ListView extends ListView {

	function OBJ_Conditions_ListView() {
		parent::ListView();
	}

	function process_dynamic_listview($source_module, $sugarbean,$subpanel_def) {
		$this->source_module = $source_module;
		$this->subpanel_module = $subpanel_def->name;
		if(!isset($this->xTemplate))
			$this->createXTemplate();

		$html_var = $this->subpanel_module . "_CELL";
		
		$list_data = $this->processUnionBeans($sugarbean,$subpanel_def, $html_var);

		$list = $list_data['list'];

		global $beanFiles, $beanList, $db;

		// custom list data
		foreach ($list as $condition_id => $condition_data) {
			// 'attribute', 'related_attribute', 'condition_value'
			if (isset($condition_data->attribute) and $condition_data->attribute == 'obj_joined_table') {
				$condition_data->attribute = 'Related';
				if (isset($condition_data->condition_value) and !empty($condition_data->condition_value)) {
					require_once($beanFiles[$beanList[$condition_data->condition_value]]);
					$bean = new $beanList[$condition_data->condition_value]();
					foreach ($bean->field_name_map as $col => $prop) {
						if ($col == $condition_data->related_attribute) {
							$condition_data->related_attribute = str_replace(':', '', translate($prop['vname'], $bean->module_dir));
						}
					}
				}
			} else if (isset($condition_data->attribute) and $condition_data->attribute == "obj_account_name") {
				require_once($beanFiles[$beanList['Contacts']]);
				$bean = new $beanList['Contacts']();
				$condition_data->attribute = str_replace(':', '', translate($bean->field_name_map['account_name']['vname'], $bean->module_dir));
				require_once($beanFiles[$beanList['Accounts']]);
				$bean = new $beanList['Accounts']();
				foreach ($bean->field_name_map as $col => $prop) {
					if ($col == $condition_data->related_attribute) {
						$condition_data->related_attribute = str_replace(':', '', translate($prop['vname'], $bean->module_dir));						
					}
				}
			} else {
				$condition_data->related_attribute = null;
				$condition_data->related_condition_value = null;
				$query = "select obj_i.object from obj_indicators as obj_i, obj_conditions as obj_c where obj_i.id = obj_c.indicator_id and obj_c.id = '".$condition_data->id."' and obj_i.deleted = 0 and obj_c.deleted = 0";
				$result = $db->query($query, true);
				while ($row = $db->fetchByAssoc($result)) {
					require_once($beanFiles[$beanList[$row['object']]]);
					$bean = new $beanList[$row['object']]();
					foreach ($bean->field_name_map as $col => $prop) {
						if ($col == $condition_data->attribute) {
							$condition_data->attribute = str_replace(':', '', translate($prop['vname'], $bean->module_dir));						
						}
					}
				}
			}
		}

		$parent_data = $list_data['parent_data'];

		if($subpanel_def->isCollection()) {
			$thepanel=$subpanel_def->get_header_panel_def();
		} else {
			$thepanel=$subpanel_def;
		}
		
		

		$this->process_dynamic_listview_header($thepanel->get_module_name(), $thepanel, $html_var);
		$this->process_dynamic_listview_rows($list,$parent_data, 'dyn_list_view', $html_var,$subpanel_def);

		if($this->display_header_and_footer)
		{
			$this->getAdditionalHeader();
			if(!empty($this->header_title))
			{
				echo get_form_header($this->header_title, $this->header_text, false);
			}
		}

		$this->xTemplate->out('dyn_list_view');

		if(isset($_SESSION['validation']))
		{
			print base64_decode('PGEgaHJlZj0naHR0cDovL3d3dy5zdWdhcmNybS5jb20nPlBPV0VSRUQmbmJzcDtCWSZuYnNwO1NVR0FSQ1JNPC9hPg==');
		}
		if(isset($list_data['query'])) {
			return ($list_data['query']);
		}
	}
}

?>