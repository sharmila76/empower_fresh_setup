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
 * by SugarCRM are Copyright (C) 2004-2010 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/



require_once('include/generic/SugarWidgets/SugarWidgetFieldvarchar.php');

class SugarWidgetFieldName extends SugarWidgetFieldVarchar
{
    
    function SugarWidgetFieldName(&$layout_manager) {
        parent::SugarWidgetFieldVarchar($layout_manager);
        $this->reporter = $this->layout_manager->getAttribute('reporter');  
    }
    
	function displayList(&$layout_def)
	{
		if(empty($layout_def['column_key']))
		{
			return $this->displayListPlain($layout_def);
		}
		
		$module = $this->reporter->all_fields[$layout_def['column_key']]['module'];
		$name = $layout_def['name'];
		$layout_def['name'] = 'id';
		$key = $this->_get_column_alias($layout_def);
		$key = strtoupper($key);
		
		if(empty($layout_def['fields'][$key]))
		{
		  $layout_def['name'] = $name;
			return $this->displayListPlain($layout_def);	
		}
		
		$record = $layout_def['fields'][$key];
		$layout_def['name'] = $name;
		
		$str = "<a target='_blank' href=\"index.php?action=DetailView&module=$module&record=$record\">";
		$str .= $this->displayListPlain($layout_def);
		$str .= "</a>";	
		return $str;
	}

	function _get_column_select($layout_def)
	{
		global $sugar_config;
		// if $this->db->dbytpe is empty, then grab dbtype value from global array "$sugar_config[dbconfig]"
		if(empty($this->db->dbType)){
			$this->db->dbType = $sugar_config['dbconfig']['db_type'];
		}
        if ( isset($this->reporter->all_fields) ) {
            $field_def = $this->reporter->all_fields[$layout_def['column_key']];
        } else {
            $field_def = array();
        }
		
		if (empty($field_def['fields']) || empty($field_def['fields'][0]) || empty($field_def['fields'][1]))
		{
			return parent::_get_column_select($layout_def);
		}
		
		//	 'fields' are the two fields to concat to create the name
		$alias = '';
		$endalias = '';
		if ( ! empty($layout_def['table_alias']))
		{
			if ($this->db->dbType == 'mysql')
			{
				$alias .= "CONCAT(CONCAT(IFNULL("
					.$layout_def['table_alias']."."
					.$field_def['fields'][0].",''),' '),"
					.$layout_def['table_alias']."."
					.$field_def['fields'][1].")";
			}
			elseif ( $this->db->dbType == 'mssql' )
			{
				$alias .= $layout_def['table_alias'] . '.' . $field_def['fields'][0] . " + ' ' + "
				. $layout_def['table_alias'] . '.' . $field_def['fields'][1]."";
			}
            elseif ($this->db->dbType == 'oci8') 
            {
                $alias .= "CONCAT(CONCAT(NVL("
                    .$layout_def['table_alias']."."
                    .$field_def['fields'][0].",''),' '),"
                    .$layout_def['table_alias']."."
                    .$field_def['fields'][1].")";
            } 
		}
		elseif (! empty($layout_def['name']))
		{
			$alias = $layout_def['name'];
		}
		else
		{
			$alias .= "*";
		}
		
		$alias .= $endalias;
		return $alias;
	}

	function queryFilterIs($layout_def)
	{
		require_once('include/generic/SugarWidgets/SugarWidgetFieldid.php');
		$layout_def['name'] = 'id';
		$layout_def['type'] = 'id';
		$input_name0 = $layout_def['input_name0'];
		
		if ( is_array($layout_def['input_name0']))
		{
			$input_name0 = $layout_def['input_name0'][0];
		}
		if ($input_name0 == 'Current User') {
			global $current_user;
			$input_name0 = $current_user->id;
		}

		return SugarWidgetFieldid::_get_column_select($layout_def)."='"
			.$GLOBALS['db']->quote($input_name0)."'\n";
	}

    // $rename_columns, if true then you're coming from reports
	function queryFilterone_of(&$layout_def, $rename_columns = true)
	{
		require_once('include/generic/SugarWidgets/SugarWidgetFieldid.php');
        if($rename_columns) { // this was a hack to get reports working, sugarwidgets should not be renaming $name! 
    		$layout_def['name'] = 'id';
    		$layout_def['type'] = 'id';
        }
		$arr = array();
		
		foreach($layout_def['input_name0'] as $value)
		{
			if ($value == 'Current User') {
				global $current_user;
				array_push($arr,"'".$GLOBALS['db']->quote($current_user->id)."'");
			}
			else
				array_push($arr,"'".$GLOBALS['db']->quote($value)."'");
		}
		
		$str = implode(",",$arr);
        
		return SugarWidgetFieldid::_get_column_select($layout_def)." IN (".$str.")\n";
	}
	
	function &queryGroupBy($layout_def)
	{
        if( $this->reporter->db->dbType == 'mysql') {
         if($layout_def['name'] == 'full_name') {
             $layout_def['name'] = 'id';
             $layout_def['type'] = 'id';
             require_once('include/generic/SugarWidgets/SugarWidgetFieldid.php');
             $group_by =  SugarWidgetFieldid::_get_column_select($layout_def)."\n";
         }
         else {
            // group by clause for user name passes through here. 
//    		 $layout_def['name'] = 'name';
//    		 $layout_def['type'] = 'name';
             $group_by = $this->_get_column_select($layout_def)."\n";
         }
        }
        elseif($this->reporter->db->dbType == 'oci8') {
            $group_by = $this->_get_column_select($layout_def);
        }
		elseif( $this->reporter->db->dbType == 'mssql') {
			$group_by = $this->_get_column_select($layout_def);
		}
        
        return $group_by;
	}
}

?>
