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
$dictionary['PM_ProcessManagerStageTask'] = array(
	'table'=>'pm_processmanagerstagetask',
	'audited'=>true,
	'fields'=>array (
  'task_order' => 
  array (
    'required' => false,
    'name' => 'task_order',
    'vname' => 'LBL_TASK_ORDER',
    'type' => 'int',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => '11',
  ),
  'stage_id' => 
  array (
    'required' => false,
    'name' => 'stage_id',
    'vname' => 'LBL_STAGE_ID',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => '36',
    'default' => 'null',
  ),
  'email_template_defs_id' => 
  array (
    'required' => false,
    'name' => 'email_template_defs_id',
    'vname' => 'LBL_EMAIL_TEMPLATE_DEFS_ID',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => '36',
  ),
  'calls_defs_id' => 
  array (
    'required' => false,
    'name' => 'calls_defs_id',
    'vname' => 'LBL_CALLS_DEFS_ID',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => '36',
  ),
  'task_defs_id' => 
  array (
    'required' => false,
    'name' => 'task_defs_id',
    'vname' => 'LBL_TASK_DEFS_ID',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => '36',
  ),
  'task_type' => 
  array (
    'required' => true,
    'name' => 'task_type',
    'vname' => 'LBL_TASK_TYPE',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
    'options' => 'task_type',
    'studio' => 'visible',
  ),
  'start_delay_type' => 
  array (
    'required' => false,
    'name' => 'start_delay_type',
    'vname' => 'LBL_START_DELAY_TYPE',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
    'options' => 'task_start_delay_type',
    'studio' => 'visible',
  ),
  'custom_script' => 
  array (
    'required' => false,
    'name' => 'custom_script',
    'vname' => 'LBL_CUSTOM_SCRIPT',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
  'email_templates' => 
  array (
    'required' => false,
    'name' => 'email_templates',
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
    'vname' => 'LBL_CHOOSE_EMAIL_TEMPLATE',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getEmailTemplates',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'task_subject' => 
  array (
    'required' => false,
    'name' => 'task_subject',
    'vname' => 'LBL_TASK_SUBJECT',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => '50',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getTaskEditViewField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'task_priority' => 
  array (
    'required' => false,
    'name' => 'task_priority',
    'vname' => 'LBL_TASK_PRIORITY',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'task_priority',
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getTaskEditViewFieldPriority',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'task_due_date_delay_minutes' => 
  array (
    'required' => false,
    'name' => 'task_due_date_delay_minutes',
    'vname' => 'LBL_DUE_DATE_DELAY_MINUTES',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'start_delay_minutes',
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getTaskEditViewDelayFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'task_due_date_delay_hours' => 
  array (
    'required' => false,
    'name' => 'task_due_date_delay_hours',
    'vname' => 'LBL_DUE_DATE_DELAY_HOURS',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'start_delay_hours',
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getTaskEditViewDelayFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'task_due_date_delay_days' => 
  array (
    'required' => false,
    'name' => 'task_due_date_delay_days',
    'vname' => 'LBL_DUE_DATE_DELAY_DAYS',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'start_delay_days',
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getTaskEditViewDelayFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'task_due_date_delay_months' => 
  array (
    'required' => false,
    'name' => 'task_due_date_delay_months',
    'vname' => 'LBL_DUE_DATE_DELAY_MONTHS',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'start_delay_months',
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getTaskEditViewDelayFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'task_due_date_delay_years' => 
  array (
    'required' => false,
    'name' => 'task_due_date_delay_years',
    'vname' => 'LBL_DUE_DATE_DELAY_YEARS',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'start_delay_years',
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getTaskEditViewDelayFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'task_description' => 
  array (
    'required' => false,
    'name' => 'task_description',
    'vname' => 'LBL_TASK_DESCRIPTION',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getTaskEditViewFieldDescription', 
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),     
  ),
  'detai_view_task_description' => 
  array (
    'required' => false,
    'name' => 'detai_view_task_description',
    'vname' => 'LBL_TASK_DESCRIPTION',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewTaskField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),    
  
  ),  
  'call_subject' => 
  array (
    'required' => false,
    'name' => 'call_subject',
    'vname' => 'LBL_CALL_SUBJECT',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => '100',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getCallEditViewField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'reminder_checked' => 
  array (
    'name' => 'reminder_checked',
    'vname' => 'LBL_REMINDER',
    'type' => 'bool',
    'source' => 'non-db',
    'comment' => 'checkbox indicating whether or not the reminder value is set (Meta-data only)',
  ),
  'reminder_time' => 
  array (
    'name' => 'reminder_time',
    'vname' => 'LBL_REMINDER_TIME',
    'type' => 'int',
    'function' => 
    array (
      'name' => 'getReminderTime',
      'returns' => 'html',
      'include' => 'modules/Calls/CallHelper.php',
    ),
    'required' => false,
    'reportable' => false,
    'default' => -1,
    'len' => '4',
    'source' => 'non-db',
    'comment' => 'Specifies when a reminder alert should be issued; -1 means no alert; otherwise the number of seconds prior to the start',
  ),
  'call_due_date_delay_minutes' => 
  array (
    'required' => false,
    'name' => 'call_due_date_delay_minutes',
    'vname' => 'LBL_DUE_DATE_DELAY_MINUTES',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'start_delay_minutes',
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getTaskEditViewDelayFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'call_due_date_delay_hours' => 
  array (
    'required' => false,
    'name' => 'call_due_date_delay_hours',
    'vname' => 'LBL_DUE_DATE_DELAY_HOURS',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'start_delay_hours',
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getTaskEditViewDelayFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'call_due_date_delay_days' => 
  array (
    'required' => false,
    'name' => 'call_due_date_delay_days',
    'vname' => 'LBL_DUE_DATE_DELAY_DAYS',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'start_delay_days',
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getTaskEditViewDelayFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'call_due_date_delay_months' => 
  array (
    'required' => false,
    'name' => 'call_due_date_delay_months',
    'vname' => 'LBL_DUE_DATE_DELAY_MONTHS',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'start_delay_months',
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getTaskEditViewDelayFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'call_due_date_delay_years' => 
  array (
    'required' => false,
    'name' => 'call_due_date_delay_years',
    'vname' => 'LBL_DUE_DATE_DELAY_YEARS',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'start_delay_years',
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getTaskEditViewDelayFields',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'call_description' => 
  array (
    'required' => false,
    'name' => 'call_description',
    'vname' => 'LBL_CALL_DESCRIPTION',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'studio' => 'visible',
    'source' => 'non-db',
     'function' => 
    array (
      'name' => 'getCallEditViewFieldDescription',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),    
  ),
     'detail_view_call_description' => 
  array (
    'required' => false,
    'name' => 'detail_view_call_description',
    'vname' => 'LBL_CALL_DESCRIPTION',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'studio' => 'visible',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewCallField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),    
  ), 
  'email_template_name' => 
  array (
    'required' => false,
    'name' => 'email_template_name',
    'vname' => 'LBL_CHOOSE_EMAIL_TEMPLATE',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewEmailDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'contact_role' => 
  array (
    'required' => false,
    'name' => 'contact_role',
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
      'name' => 'getDetailViewEmailDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_task_subject' => 
  array (
    'required' => false,
    'name' => 'detail_view_task_subject',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewTaskDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_task_priority' => 
  array (
    'required' => false,
    'name' => 'detail_view_task_priority',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewTaskDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_due_date_delay_minutes' => 
  array (
    'required' => false,
    'name' => 'detail_view_due_date_delay_minutes',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewTaskDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_due_date_delay_hours' => 
  array (
    'required' => false,
    'name' => 'detail_view_due_date_delay_hours',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewTaskDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_due_date_delay_days' => 
  array (
    'required' => false,
    'name' => 'detail_view_due_date_delay_days',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewTaskDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_due_date_delay_months' => 
  array (
    'required' => false,
    'name' => 'detail_view_due_date_delay_months',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewTaskDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_due_date_delay_years' => 
  array (
    'required' => false,
    'name' => 'detail_view_due_date_delay_years',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewTaskDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_call_call_subject' => 
  array (
    'required' => false,
    'name' => 'detail_view_call_call_subject',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewCallDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_call_reminder_time' => 
  array (
    'required' => false,
    'name' => 'detail_view_call_reminder_time',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewCallDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_call_start_delay_minutes' => 
  array (
    'required' => false,
    'name' => 'detail_view_call_start_delay_minutes',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewCallDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_call_start_delay_hours' => 
  array (
    'required' => false,
    'name' => 'detail_view_call_start_delay_hours',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewCallDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_call_start_delay_days' => 
  array (
    'required' => false,
    'name' => 'detail_view_call_start_delay_days',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewCallDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_call_start_delay_months' => 
  array (
    'required' => false,
    'name' => 'detail_view_call_start_delay_months',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewCallDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  'detail_view_call_start_delay_years' => 
  array (
    'required' => false,
    'name' => 'detail_view_call_start_delay_years',
    'vname' => '',
    'type' => 'varchar',
    'comments' => '',
    'help' => '',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'source' => 'non-db',
    'function' => 
    array (
      'name' => 'getDetailViewCallDefField',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
  
//NEW FEATURE- ALLOW EMAIL TO BE SENT TO OPP-CASE ACCOUNT
  'send_email_to_caseopp_account' => 
  array (
   'name' => 'send_email_to_caseopp_account',
    'vname' => 'LBL_REMINDER_TIME',
    'type' => 'int',
    'required' => false,
    'reportable' => false,
    'default' => -1,
    'len' => '4',
    'source' => 'non-db',
    'comment' => '',
     'function' => 
    array (
      'name' => 'getEmailDefsEditViewFieldCheckBox',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
 ),
 
//Now the Detail View for Email to Opp Case Account

  'detail_view_send_email_to_caseopp_account' => 
  array (
    'required' => false,
    'name' => 'detail_view_send_email_to_caseopp_account',
    'vname' => 'LBL_REMINDER_TIME',
    'type' => 'int',
    'required' => false,
    'reportable' => false,
    'default' => -1,
    'len' => '4',
    'source' => 'non-db',
     'function' => 
    array (
      'name' => 'getEmailDefsDetailViewFieldCheckBox',
      'returns' => 'html',
      'include' => 'modules/PM_ProcessManager/ProcessManagerViewDefCode.php',
    ),
  ),
//End
//********************************************

),
	'relationships'=>array (
),
	'optimistic_lock'=>true,
);
require_once('include/SugarObjects/VardefManager.php');
VardefManager::createVardef('PM_ProcessManagerStageTask','PM_ProcessManagerStageTask', array('basic','assignable'));