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
$dictionary['OBJ_Conditions'] = array (
	'table' => 'obj_conditions',
	'audited' => false,
	'fields' => array (
		'indicator_name' => array (
			'name' => 'indicator_name',
			'type' => 'relate',
			'id_name' => 'indicator_id',
			'id' => 'indicator_id',
			'module' => 'OBJ_Indicators',
			'vname' => 'LBL_INDICATOR_NAME',
			'ext2' => 'OBJ_Indicators',
			'rname' => 'name',
			'source' => 'non-db',
		),
		'indicator_id' => array (
			'required' => true,
			'name' => 'indicator_id',
			'type' => 'enum',
			'options' => 'condition_indicator_list',
			'module' => 'OBJ_Indicators',
			'vname' => 'LBL_INDICATOR_NAME',
			'relationship' => 'indicator_conditions',
		),
		'attribute' => array (
			'required' => true,
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
			'options' => 'condition_attribute_list',
			'studio' => 'visible',
			'dependency' => false,
		),
		'condition_value' => array (
			'required' => false,
			'name' => 'condition_value',
			'vname' => 'LBL_CONDITION_VALUE',
			'type' => 'varchar',
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
			'studio' => 'visible',
			'dependency' => false,
		),
		'related_attribute' => 
		array (
			'required' => false,
			'name' => 'related_attribute',
			'vname' => 'LBL_RELATED_ATTRIBUTE',
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
			'options' => 'condition_related_attribute_list',
			'studio' => 'visible',
			'dependency' => false,
		),
		'related_condition_value' => 
		array (
			'required' => false,
			'name' => 'related_condition_value',
			'vname' => 'LBL_RELATED_CONDITION_VALUE',
			'type' => 'varchar',
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
			'studio' => 'visible',
			'dependency' => false,
		),
		'obj_account_id' => 
	    array (
	      'required' => false,
	      'name' => 'obj_account_id',
	      'vname' => 'LBL_CONDITION_VALUE',
	      'type' => 'id',
	      'massupdate' => '0',
	      'default' => NULL,
	      'comments' => '',
	      'help' => '',
	      'importable' => 'true',
	      'duplicate_merge' => 'disabled',
	      'duplicate_merge_dom_value' => '0',
	      'audited' => false,
	      'reportable' => true,
	      'len' => '36',
	      'size' => '20',
	      'id' => 'OBJ_Conditionsobj_account_id',
	    ),
	    'obj_account_name' => 
	    array (
	      'required' => false,
	      'source' => 'non-db',
	      'name' => 'obj_account_name',
	      'vname' => 'LBL_CONDITION_VALUE',
	      'type' => 'relate',
	      'massupdate' => '0',
	      'default' => NULL,
	      'comments' => '',
	      'help' => '',
	      'importable' => 'true',
	      'duplicate_merge' => 'disabled',
	      'duplicate_merge_dom_value' => '0',
	      'audited' => false,
	      'reportable' => true,
	      'len' => '255',
	      'size' => '20',
	      'id_name' => 'obj_account_id',
	      'ext2' => 'Accounts',
	      'module' => 'Accounts',
	      'rname' => 'name',
	      'quicksearch' => 'enabled',
	      'studio' => 'visible',
	      'id' => 'OBJ_Conditionsobj_account_name',
	    ),
	    'is_audited' => 
	    array (
	      'required' => false,
	      'name' => 'is_audited',
	      'vname' => 'LBL_IS_AUDITED',
	      'type' => 'bool',
	      'massupdate' => '0',
	      'default' => '0',
	      'comments' => '',
	      'help' => '',
	      'importable' => 'true',
	      'duplicate_merge' => 'disabled',
	      'duplicate_merge_dom_value' => '0',
	      'audited' => false,
	      'reportable' => true,
	      'len' => '255',
	      'size' => '20',
	      'id' => 'OBJ_Conditionsis_audited',
	    ),
    	'date_options' => array (
	      'required' => false,
	      'name' => 'date_options',
	      'vname' => 'LBL_DATE_OPTIONS',
	      'type' => 'enum',
	      'options'=> 'condition_date_options_list',
	      'massupdate' => '0',
	      'comments' => '',
	      'help' => '',
	      'importable' => 'true',
	      'duplicate_merge' => 'disabled',
	      'duplicate_merge_dom_value' => '0',
	      'audited' => false,
	      'reportable' => true,
	      'len' => '255',
	      'size' => '20',
	      'dependency' => false,
	    ),
	),
	'relationships' => array (
	),
	'optimistic_locking' => true,
);

if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('OBJ_Conditions','OBJ_Conditions', array('basic','assignable'));