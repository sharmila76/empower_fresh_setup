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
$dictionary['OBJ_Objectives'] = array(
	'table'=>'obj_objectives',
	'audited'=>false,
	'fields'=>array (
		'objective_value' => 
			array (
				'required' => true,
				'name' => 'objective_value',
				'vname' => 'LBL_OBJECTIVE_VALUE',
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
		'obj_indicator_id' => 
			array (
				'required' => true,
				'name' => 'obj_indicator_id',
				'vname' => 'LBL_LIST_RELATED_TO',
				'type' => 'id',
				'massupdate' => 0,
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
				'id' => 'OBJ_Objectivesobj_indicators_id',
			),
		'indicator_id' => 
			array (
			  'required' => true,
			  'source' => 'non-db',
			  'name' => 'indicator_id',
			  'vname' => 'LBL_INDICATOR_ID',
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
			  'id_name' => 'obj_indicator_id',
			  'ext2' => 'OBJ_Indicators',
			  'module' => 'OBJ_Indicators',
			  'rname' => 'name',
			  'quicksearch' => 'enabled',
			  'studio' => 'visible',
			  'id' => 'OBJ_Objectivesindicator_id',
			),
  		'direction' => array (
		    'required' => true,
		    'name' => 'direction',
		    'vname' => 'LBL_DIRECTION',
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
		    'options' => 'indicator_direction_list',
		    'studio' => 'visible',
		    'dependency' => false,
		),
		'user_link' =>
		array (
			  'name' => 'user_link',
			  'type' => 'link',
			  'relationship' => 'obj_objectives_users',
			  'source' => 'non-db',
			  'vname' => 'LBL_USER',
		),
		'user_link_id' =>
			array(
			  'name' => 'user_link_id',
			  'type' => 'link',
			  'relationship' => 'obj_objectives_users',
			  'source' => 'non-db',
			  'reportable' => false,
			  'side' => 'right',
			  'vname' => 'LBL_USER_ID',
			),
		'effective_start_date' => 
			array (
				'required' => true,
				'name' => 'effective_start_date',
				'vname' => 'LBL_EFFECTIVE_START_DATE',
				'type' => 'date',
				'massupdate' => 0,
				'default' => '',
				'comments' => '',
				'help' => '',
				'importable' => 'true',
				'duplicate_merge' => 'disabled',
				'duplicate_merge_dom_value' => '0',
				'audited' => false,
				'reportable' => true,
				'studio' => 'visible',
				'dependency' => false,
			),
		'effective_end_date' => 
			array (
				'required' => true,
				'name' => 'effective_end_date',
				'vname' => 'LBL_EFFECTIVE_END_DATE',
				'type' => 'date',
				'massupdate' => 0,
				'default' => '',
				'comments' => '',
				'help' => '',
				'importable' => 'true',
				'duplicate_merge' => 'disabled',
				'duplicate_merge_dom_value' => '0',
				'audited' => false,
				'reportable' => true,
				'studio' => 'visible',
				'dependency' => false,
			),
		'history_obj_id' => 
			array (
				'required' => false,
				'name' => 'history_obj_id',
				'vname' => 'LBL_HISTORY_OBJ_ID',
				'type' => 'id',
				'massupdate' => 0,
				'default' => '',
				'comments' => '',
				'help' => '',
				'importable' => 'true',
				'duplicate_merge' => 'disabled',
				'duplicate_merge_dom_value' => '0',
				'audited' => false,
				'reportable' => true,
				'studio' => 'visible',
				'dependency' => false,
			),
	),
	'relationships'=>array (
),
	'optimistic_locking'=>true,
);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('OBJ_Objectives','OBJ_Objectives', array('basic','assignable'));