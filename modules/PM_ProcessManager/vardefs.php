<?php
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004 - 2007 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
$dictionary['PM_ProcessManager'] = array(
	'table'=>'pm_processmanager',
	'audited'=>true,
	'fields'=>array (
  'status' => 
  array (
    'required' => false,
    'name' => 'status',
    'vname' => 'LBL_STATUS',
    'type' => 'enum',
    'massupdate' => true,
    'default' => 'Active',
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'process_status_dom',
    'studio' => 'visible',
  ),
  'assigned_user_link' => 
  array (
    'name' => 'assigned_user_link',
    'type' => 'link',
    'relationship' => 'pm_processmanager_assigned_user',
    'vname' => 'LBL_ASSIGNED_TO_USER',
    'link_type' => 'one',
    'module' => 'Users',
    'bean_name' => 'User',
    'source' => 'non-db',
    'duplicate_merge' => 'enabled',
    'rname' => 'user_name',
    'id_name' => 'assigned_user_id',
    'table' => 'users',
  ),
  'process_object' => 
  array (
    'required' => true,
    'name' => 'process_object',
    'vname' => 'LBL_PROCESS_OBJECT',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => 'Lead',
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'process_object',
    'studio' => 'visible',
  ),
  'start_event' => 
  array (
    'required' => false,
    'name' => 'start_event',
    'vname' => 'LBL_START_EVENT',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => 'Create',
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'process_start_event',
    'studio' => 'visible',
  ),
  'contacts_fields' => 
  array (
    'required' => false,
    'name' => 'contacts_fields',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'studio' => 'visible',
    'vname' => 'LBL_CONTACT_FIELDS',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getObjectFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'accounts_fields' => 
  array (
    'required' => false,
    'name' => 'accounts_fields',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'studio' => 'visible',
    'vname' => 'LBL_ACCOUNT_FIELDS',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getObjectFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'leads_fields' => 
  array (
    'required' => false,
    'name' => 'leads_fields',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'studio' => 'visible',
    'vname' => 'LBL_LEAD_FIELDS',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getObjectFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'cases_fields' => 
  array (
    'required' => false,
    'name' => 'cases_fields',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'studio' => 'visible',
    'vname' => 'LBL_CASE_FIELDS',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getObjectFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'opportunities_fields' => 
  array (
    'required' => false,
    'name' => 'opportunities_fields',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'studio' => 'visible',
    'vname' => 'LBL_OPPORTUNITY_FIELDS',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getObjectFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
//Updated for projects
  'project_fields' => 
  array (
    'required' => false,
    'name' => 'project_fields',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'studio' => 'visible',
    'vname' => 'LBL_PROJECT_FIELDS',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getObjectFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ), 
    //Updated for tasks
  'tasks_fields' => 
  array (
    'required' => false,
    'name' => 'tasks_fields',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'studio' => 'visible',
    'vname' => 'LBL_PROJECT_FIELDS',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getObjectFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),   
  'process_filter_field1' => 
  array (
    'required' => false,
    'name' => 'process_filter_field1',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'studio' => 'visible',
    'vname' => 'LBL_PROCESS_OBJECT_FILTER_FIELD1',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getProcessFilterField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'filter_list1' => 
  array (
    'required' => false,
    'name' => 'filter_list1',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'studio' => 'visible',
    'vname' => 'LBL_CHOOSE_FILTER1',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getFilterList',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'process_object_field1_value' => 
  array (
    'required' => false,
    'name' => 'process_object_field1_value',
    'vname' => 'LBL_PROCESS_OBJECT_FIELD1_VALUE',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'len' => '25',
    'source' => 'non-db',
    'studio' => 'visible',
    'function' => 
    array (
      'name' => 'getEditViewValue',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_field1' => 
  array (
    'required' => false,
    'name' => 'detail_view_field1',
    'vname' => 'LBL_PROCESS_OBJECT_FIELD5_VALUE',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_value1' => 
  array (
    'required' => false,
    'name' => 'detail_view_value1',
    'vname' => 'LBL_PROCESS_OBJECT_FIELD5_VALUE',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewValue',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_operator1' => 
  array (
    'required' => false,
    'name' => 'detail_view_operator1',
    'vname' => 'LBL_PROCESS_OBJECT_FIELD5_VALUE',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewOperator',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
),
	'relationships'=>array (
  'pm_processmanager_assigned_user' => 
  array (
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'PM_ProcessManager',
    'rhs_table' => 'pm_processmanager',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
),
	'optimistic_lock'=>true,
);
require_once('include/SugarObjects/VardefManager.php');
VardefManager::createVardef('PM_ProcessManager','PM_ProcessManager', array('basic','assignable'));