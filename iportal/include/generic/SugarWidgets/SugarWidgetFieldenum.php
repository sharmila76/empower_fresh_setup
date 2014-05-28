<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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
 * by SugarCRM are Copyright (C) 2004-2009 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/

class SugarWidgetFieldEnum extends SugarWidgetReportField {

    function SugarWidgetFieldEnum(&$layout_manager) {
        parent::SugarWidgetReportField($layout_manager);
        $this->reporter = $this->layout_manager->getAttribute('reporter');  
    }
	
	function queryFilterEmpty(&$layout_def)
	{
        if( $this->reporter->db->dbType == 'mysql') {
	    	return '( '.$this->_get_column_select($layout_def).' IS NULL OR '.$this->_get_column_select($layout_def)."='' )\n";
        }		
        elseif( $this->reporter->db->dbType == 'mssql') {
	    	return '( '.$this->_get_column_select($layout_def).' IS NULL OR '.$this->_get_column_select($layout_def)." LIKE '' )\n";
        }

        elseif ( $this->reporter->db->dbType == 'oci8') {
	    	return '( '.$this->_get_column_select($layout_def).' IS NULL OR '.$this->_get_column_select($layout_def)." LIKE '' )\n";
        }

	}

	 function queryFilterNot_Empty(&$layout_def)
	 {
	    $reporter = $this->layout_manager->getAttribute("reporter");
        if( $this->reporter->db->dbType == 'mysql') {
	   		return '( '.$this->_get_column_select($layout_def).' IS NOT NULL AND '.$this->_get_column_select($layout_def)."<>'' )\n";
        }
        else if( $this->reporter->db->dbType == 'mssql') {
	        return $this->_get_column_select($layout_def).' IS NOT NULL ' . "\n";
        }

	    else if ( $reporter->db->dbType == 'oci8')
	    {
	        return $this->_get_column_select($layout_def).' IS NOT NULL ' . "\n";
	    }

	 }
	
	    
	function queryFilteris(& $layout_def) {
		$input_name0 = $layout_def['input_name0'];
		if (is_array($layout_def['input_name0'])) {
			$input_name0 = $layout_def['input_name0'][0];
		}
		return $this->_get_column_select($layout_def)." = '".$GLOBALS['db']->quote($input_name0)."'\n";
	}

	function queryFilterone_of(& $layout_def) {
		$arr = array ();
		foreach ($layout_def['input_name0'] as $value) {
			$arr[] = "'".$GLOBALS['db']->quote($value)."'";
		}
	    $reporter = $this->layout_manager->getAttribute("reporter");
		$str = implode(",", $arr);
		return $this->_get_column_select($layout_def)." IN (".$str.")\n";
	}

	function & displayListPlain($layout_def) {
		if(!empty($layout_def['column_key'])){
			$field_def = $this->reporter->all_fields[$layout_def['column_key']];	
		}else if(!empty($layout_def['fields'])){
			$field_def = $layout_def['fields'];
		}
		
		if (!empty($layout_def['table_key'] ) &&( empty ($field_def['fields']) || empty ($field_def['fields'][0]) || empty ($field_def['fields'][1]))){
			$value = $this->_get_list_value($layout_def);
		}else if(!empty($layout_def['name']) && !empty($layout_def['fields'])){
			$key = strtoupper($layout_def['name']);
			$value = $layout_def['fields'][$key];
		}
		$cell = '';
		if(empty($value)){
			return $cell;
		}
			if(isset($field_def['options']))
			$cell = translate($field_def['options'], $field_def['module'], $value);
			else if(isset($field_def['type']) && $field_def['type'] == 'enum' && isset($field_def['function']))
	        {
	            global $beanFiles;
	            if(empty($beanFiles)) {
	                include('include/modules.php');
	            }
	            $bean_name = get_singular_bean_name($field_def['module']);
	            require_once($beanFiles[$bean_name]);
	            $list = $field_def['function']();
	            $cell = $list[$value];
	        }
		if (is_array($cell)) {
			//#22632  
			$value = unencodeMultienum($value);
			$cell=array();
			foreach($value as $val){
				array_push( $cell, translate($field_def['options'],$field_def['module'],$val));
			}
			$cell = implode(", ",$cell);
		}
		return $cell;
	}


	function & queryOrderBy($layout_def) {
		$field_def = $this->reporter->all_fields[$layout_def['column_key']];
		if (!empty ($field_def['sort_on'])) {
			$order_by = $layout_def['table_alias'].".".$field_def['sort_on'];
		} else {

			if ($this->reporter->db->dbType == 'oci8') {
				$order_by = $this->_get_column_alias($layout_def);
			} else {

				$order_by = $this->_get_column_select($layout_def);

			}

		}
		$list = array();
        if(isset($field_def['options']))
		$list = translate($field_def['options'], $field_def['module']);
        else if(isset($field_def['type']) && $field_def['type'] == 'enum' && isset($field_def['function']))
        {
	        global $beanFiles;
		    if(empty($beanFiles)) {
		        include('include/modules.php');
		    }
		    $bean_name = get_singular_bean_name($field_def['module']);
		    require_once($beanFiles[$bean_name]);
            $list = $field_def['function']();
        }
		$order_by_arr = array ();

		if ($this->reporter->db->dbType == 'oci8') {
			if (empty ($layout_def['sort_dir']) || $layout_def['sort_dir'] == 'a') {
				$order_dir = " ASC";
			} else {
				$order_dir = " DESC";
			}
			$str = "DECODE( $order_by,";
			$i = 0;
			foreach ($list as $key => $value) {
				array_push($order_by_arr, "'".$key."',$i");
				$i ++;
			}
			$str .= implode(',', $order_by_arr);
			$str .= ",$i) $order_dir";
			return $str;

		} else {


			if (empty ($layout_def['sort_dir']) || $layout_def['sort_dir'] == 'a') {
				$order_dir = " DESC";
			} else {
				$order_dir = " ASC";
			}

			foreach ($list as $key => $value) {
				array_push($order_by_arr, $order_by."='".$key."' $order_dir\n");
			}
			$thisarr = implode(',', $order_by_arr);
			return $thisarr;


		}

    }
    
    function displayInput(&$layout_def) {
        global $app_list_strings;

        if(!empty($layout_def['remove_blank']) && $layout_def['remove_blank']) {
            if ( isset($layout_def['options']) &&  is_array($layout_def['options']) ) {
                $ops = $layout_def['options'];
            }
            elseif (isset($layout_def['options']) && isset($app_list_strings[$layout_def['options']])){ 
            	$ops = $app_list_strings[$layout_def['options']];
                if(array_key_exists('', $app_list_strings[$layout_def['options']])) {
             	   unset($ops['']);
	            }
            } 
            else{
            	$ops = array();
            }
        }
        else {
            $ops = $app_list_strings[$layout_def['options']];
        }
        
        $str = '<select multiple="true" size="3" name="' . $layout_def['name'] . '[]">';
        $str .= get_select_options_with_id($ops, $layout_def['input_name0']);
        $str .= '</select>';
        return $str;
    }
}
?>

