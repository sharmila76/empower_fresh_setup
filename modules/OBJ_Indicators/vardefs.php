<?php
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
$dictionary['OBJ_Indicators'] = array(
	'table' => 'obj_indicators',
	'audited' => false,
	'fields' => array (
  		'object' => array (
    		'required' => true,
		    'name' => 'object',
		    'vname' => 'LBL_OBJECT',
		    'type' => 'enum',
		    'massupdate' => 0,
		    'default' => '',
		    'comments' => '',
		    'help' => '',
		    'importable' => 'true',
		    'duplicate_merge' => 'disabled',
		    'duplicate_merge_dom_value' => '0',
		    'audited' => false,
		    'reportable' => true,
		    'len' => 100,
		    'size' => '20',
		    'options' => 'indicator_module_list',
		    'studio' => 'visible',
		    'dependency' => false,
  		),
  		'operation' => array (
		    'required' => true,
		    'name' => 'operation',
		    'vname' => 'LBL_OPERATION',
		    'type' => 'enum',
		    'massupdate' => 0,
		    'default' => 'count',
		    'comments' => '',
		    'help' => '',
		    'importable' => 'true',
		    'duplicate_merge' => 'disabled',
		    'duplicate_merge_dom_value' => '0',
		    'audited' => false,
		    'reportable' => true,
		    'len' => 100,
		    'size' => '20',
		    'options' => 'indicator_operation_list',
		    'studio' => 'visible',
		    'dependency' => false,
		 ),
  		'attribute' => array (
		    'required' => false,
		    'name' => 'attribute',
		    'vname' => 'LBL_ATTRIBUTE',
		    'type' => 'enum',
		    'massupdate' => 0,
		    'default' => '',
		    'comments' => '',
		    'help' => '',
		    'importable' => 'true',
		    'duplicate_merge' => 'disabled',
		    'duplicate_merge_dom_value' => '0',
		    'audited' => false,
		    'reportable' => true,
		    'len' => 100,
		    'size' => '20',
		    'options' => 'indicator_attribute_list',
		    'studio' => 'visible',
		    'dependency' => false,
		),
  		'period' => array (
		    'required' => true,
		    'name' => 'period',
		    'vname' => 'LBL_PERIOD',
		    'type' => 'enum',
		    'massupdate' => 0,
		    'default' => 'M',
		    'comments' => '',
		    'help' => '',
		    'importable' => 'true',
		    'duplicate_merge' => 'disabled',
		    'duplicate_merge_dom_value' => '0',
		    'audited' => false,
		    'reportable' => true,
		    'len' => 100,
		    'size' => '20',
		    'options' => 'indicator_period_list',
		    'studio' => 'visible',
		    'dependency' => false,
		),
  		'period_reference' => array (
		    'required' => true,
		    'name' => 'period_reference',
		    'vname' => 'LBL_PERIOD',
		    'type' => 'enum',
		    'massupdate' => 0,
		    'default' => '',
		    'comments' => '',
		    'help' => '',
		    'importable' => 'true',
		    'duplicate_merge' => 'disabled',
		    'duplicate_merge_dom_value' => '0',
		    'audited' => false,
		    'reportable' => true,
		    'len' => 100,
		    'size' => '20',
		    'options' => 'indicator_period_reference_M_list',
		    'studio' => 'visible',
		    'dependency' => false,
		),
  		'conditions' => array (
		  	'name' => 'conditions',
		  	'vname' => 'LBL_SUBPANEL_CONDITIONS',
		  	'type' => 'link',
		  	'relationship' => 'indicator_conditions',
		  	'source' => 'non-db',
		),
	),
	'relationships' => array (
		'indicator_conditions' => array(
			'lhs_module'=> 'OBJ_Indicators',
			'lhs_table'=> 'obj_indicators',
			'lhs_key' => 'id',
			'rhs_module'=> 'OBJ_Conditions' ,
			'rhs_table'=> 'obj_conditions',
			'rhs_key' => 'indicator_id',
			'relationship_type'=>'one-to-many'
		),
	),
	'optimistic_locking' => true,
);
if (!class_exists('VardefManager')) {
	require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('OBJ_Indicators','OBJ_Indicators', array('basic','assignable'));