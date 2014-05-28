<?php
if(!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Enterprise Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/products/sugar-enterprise-eula.html
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2010 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/



require_once ('iportal/include/generic/SugarWidgets/SugarWidget.php');

class SugarWidgetField extends SugarWidget {

	function SugarWidgetField(&$layout_manager) {
        parent::SugarWidget($layout_manager);
    }
	
	function display($layout_def) {
		//print $layout_def['start_link_wrapper']."===";
		$context = $this->layout_manager->getAttribute('context'); //_ppd($context);
		$func_name = 'display'.$context;

		if (!empty ($context) && method_exists($this, $func_name)) {
			return $this-> $func_name ($layout_def);
		} else {
			return 'display not found:'.$func_name;
		}
	}

	function _get_column_alias($layout_def) {
		$alias_arr = array ();

		if (!empty ($layout_def['name']) && $layout_def['name'] == 'count') {
			return 'count';
		}

		if (!empty ($layout_def['table_alias'])) {
			array_push($alias_arr, $layout_def['table_alias']);
		}

		if (!empty ($layout_def['name'])) {
			array_push($alias_arr, $layout_def['name']);
		}

		return implode("_", $alias_arr);
	}

	function & displayDetailLabel(& $layout_def) {

		return '';
	}

	function & displayDetail($layout_def) {

		return '';
	}
	function displayHeaderCellPlain($layout_def) {
		$module_name = $this->layout_manager->getAttribute('module_name');
		$header_cell_text = '';
		$key = '';

		if (!empty ($layout_def['label'])) {
			$header_cell_text = $layout_def['label'];
		}
		elseif (!empty ($layout_def['vname'])) {
			$key = $layout_def['vname'];

			if (empty ($key)) {
				$header_cell_text = $layout_def['name'];
			} else {
				$header_cell_text = translate($key, $module_name);
			}
		}
		return $header_cell_text;
	}

	function displayHeaderCell($layout_def) {
		$module_name = $this->layout_manager->getAttribute('module_name');
		
		$this->local_current_module = $_REQUEST['module'];
		$this->is_dynamic = true;
		// don't show sort links if name isn't defined
		if (empty ($layout_def['name'])) {
			return $layout_def['label'];
		}
		if (isset ($layout_def['sortable']) && !$layout_def['sortable']) {
			return $this->displayHeaderCellPlain($layout_def);
		}

		$header_cell_text = '';
		$key = '';

		if (!empty ($layout_def['vname'])) {
			$key = $layout_def['vname'];
		}

		if (empty ($key)) {
			$header_cell_text = $layout_def['name'];
		} else {
			$header_cell_text = translate($key, $module_name);
		}

		$subpanel_module = $layout_def['subpanel_module'];
		if (empty ($this->base_URL)) {
			$this->base_URL = ListView :: getBaseURL('CELL');
			$split_url = explode('&to_pdf=true&action=SubPanelViewer&subpanel=', $this->base_URL);
			$this->base_URL = $split_url[0];
			$this->base_URL .= '&inline=true&to_pdf=true&action=SubPanelViewer&subpanel=';
		}
		$sort_by_name = $layout_def['name'];
		if (isset ($layout_def['sort_by'])) {
			$sort_by_name = $layout_def['sort_by'];
		}

		$sort_by = ListView :: getSessionVariableName('CELL', "ORDER_BY").'='.$sort_by_name;

		$start = (empty ($layout_def['start_link_wrapper'])) ? '' : $layout_def['start_link_wrapper'];
		$end = (empty ($layout_def['end_link_wrapper'])) ? '' : $layout_def['end_link_wrapper'];

		$header_cell = "<a class=\"listViewThLinkS1\" href=\"".$start.$this->base_URL.$subpanel_module.'&'.$sort_by.$end."\">";
		$header_cell .= $header_cell_text;
		$header_cell .= "</a>";
		
		$imgArrow = '';

		if (isset ($layout_def['sort'])) {
			$imgArrow = $layout_def['sort'];
		}
		$arrow_start = ListView :: getArrowUpDownStart($imgArrow);
		
		$header_cell .= " ".$arrow_start;

		return $header_cell;

	}

	function displayList($layout_def) {
		return $this->displayListPlain($layout_def);
	}

	function displayListPlain($layout_def) {
		$value= $this->_get_list_value($layout_def);
		if (isset($layout_def['widget_type']) && $layout_def['widget_type'] =='checkbox') {
			if ($value != '' &&  ($value == 'on' || intval($value) == 1 || $value == 'yes'))  
			{
				return "<input name='checkbox_display' class='checkbox' type='checkbox' disabled='true' checked>";
			}
			return "<input name='checkbox_display' class='checkbox' type='checkbox' disabled='true'>";
		}
		return $value;
	}

	function _get_list_value(& $layout_def) {
		$key = '';
		$value = '';

		if (isset ($layout_def['varname'])) {
			$key = strtoupper($layout_def['varname']);
		} else {
			$key = $this->_get_column_alias($layout_def);
			$key = strtoupper($key);
		}

		if (isset ($layout_def['fields'][$key])) {
			return $layout_def['fields'][$key];
		}
		return $value;

	}

	function & displayEditLabel($layout_def) {
		return '';
	}

	function & displayEdit($layout_def) {
		return '';
	}

	function & displaySearchLabel($layout_def) {
		return '';
	}

	function & displaySearch($layout_def) {
		return '';
	}

	function displayInput($layout_def) {
		return ' -- Not Implemented --';
	}
}
?>


