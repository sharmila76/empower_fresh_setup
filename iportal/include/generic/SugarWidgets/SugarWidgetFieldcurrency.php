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

                                                                                       
require_once('include/generic/SugarWidgets/SugarWidget.php');
                                                                                       

global $current_user;
                                                                                       
$global_currency_obj = null;
                                                                                       
function get_currency()
{
        global $current_user,$global_currency_obj;
        if (empty($global_currency_obj))
        {
        $global_currency_obj = new Currency();
      //  $global_currency_symbol = '$';
                                                                                       
        if($current_user->getPreference('currency') )
        {
                $global_currency_obj->retrieve($current_user->getPreference('currency'));
        }
        else
        {
                $global_currency_obj->retrieve('-99');
        }
        }
        return $global_currency_obj;
}


class SugarWidgetFieldCurrency extends SugarWidgetFieldInt
{
        function & displayList($layout_def)
        {
//                $global_currency_obj = get_currency();
//                  $display = format_number($this->displayListPlain($layout_def), 2, 2, array('convert' => true, 'currency_symbol' => true));
//                $display =  $global_currency_obj->symbol. round($global_currency_obj->convertFromDollar($this->displayListPlain($layout_def)),2);
            $display = $this->displayListPlain($layout_def); 
            return $display;
        }
                             
    function displayListPlain($layout_def) {
//        $value = $this->_get_list_value($layout_def);
        $value = format_number(parent::displayListPlain($layout_def), 2, 2, array('convert' => false, 'currency_symbol' => false));
        return $value;
    }                                                          
 function queryFilterEquals(&$layout_def)
 {
		$global_currency_obj = get_currency();
                return $this->_get_column_select($layout_def)."=".$GLOBALS['db']->quote( round($global_currency_obj->convertToDollar($layout_def['input_name0'])))."\n";
 }
                                                                                       
 function queryFilterNot_Equals(&$layout_def)
 {
		$global_currency_obj = get_currency();
                return $this->_get_column_select($layout_def)."!=".$GLOBALS['db']->quote( round($global_currency_obj->convertToDollar($layout_def['input_name0'])))."\n";
 }
                                                                                       
 function queryFilterGreater(&$layout_def)
 {
		$global_currency_obj = get_currency();
                return $this->_get_column_select($layout_def)." > ".$GLOBALS['db']->quote( round($global_currency_obj->convertToDollar($layout_def['input_name0'])))."\n";
 }
                                                                                       
 function queryFilterLess(&$layout_def)
 {
		$global_currency_obj = get_currency();
                return $this->_get_column_select($layout_def)." < ".$GLOBALS['db']->quote( round($global_currency_obj->convertToDollar($layout_def['input_name0'])))."\n";
 }

 function queryFilterBetween(&$layout_def){
 	$global_currency_obj = get_currency();
    return $this->_get_column_select($layout_def)." > ".$GLOBALS['db']->quote( round($global_currency_obj->convertToDollar($layout_def['input_name0']))). " AND ". $this->_get_column_select($layout_def)." < ".$GLOBALS['db']->quote( round($global_currency_obj->convertToDollar($layout_def['input_name1'])))."\n";
 }


}

?>
