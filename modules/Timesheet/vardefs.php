<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$dictionary['Timesheet'] = array(
  'table' => 'timesheet',
  'audited' => true,
  'comment' => 'Books time',

  'fields' => array (
  // for Search
  'account_name' =>
  array (
    'name' => 'account_name',
    'rname' => 'name',
    'id_name' => 'account_id',
    'vname' => 'LBL_ACCOUNT_NAME',
    'type' => 'relate',
    'link'=>'accounts',
    'table' => 'accounts',
    'join_name'=>'accounts',
    'isnull' => 'true',
    'module' => 'Accounts',
    'dbType' => 'varchar',
    'len' => 100,
    'source'=>'non-db',
    'unified_search' => true,
    'comment' => 'The name of the account represented by the account_id field',
    'required' => false,
    'importable' => false,
    'reportable' => false,
  ),
  'apply_account_to' =>
  array(
    'name' => 'apply_account_to',
    'vname' => 'LBL_APPLY_ACCOUNT_TO',
    'source' => 'non-db',
    'type' => 'enum',
    'options' => 'record_type_display_timesheet',
    'default' => 'Cases',
  ),
  /* fields for Reports module compatibility */
  'account_id' =>
  array (
    'name' => 'account_id',
    'vname' => 'LBL_ACCOUNT_ID',
    'type' => 'id',
    'comment' => 'Unique account identifier'
  ),
  'project_id' =>
  array (
    'name' => 'project_id',
    'vname' => 'LBL_PROJECT_ID',
    'type' => 'id',
    'comment' => 'Unique project identifier'
  ),
  'projects' => array(
    'name' => 'projects',
    'type' => 'link',
    'relationship' => 'timesheet_projects',
    'source' => 'non-db',
    'vname' => 'LBL_PROJECTS',
  ),
  'accounts' => array(
    'name' => 'accounts',
    'type' => 'link',
    'relationship' => 'timesheet_accounts',
    'source' => 'non-db',
    'vname' => 'LBL_ACCOUNTS',
  ),
  /* end                                     */

  'actual' =>
  array (
    'name' => 'actual',
    'vname' => 'LBL_ACTUAL',
    'type' => 'float',
    'dbtype' => 'double',
    'audited'=>true,
    'required' => true,
    'comment' => 'Actual Effort',
  ),
  'billable' =>
  array (
    'name' => 'billable',
    'vname' => 'LBL_BILLABLE',
    'type' => 'float',
    'dbtype' => 'double',
    'audited'=>true,
    'comment' => 'Billable Effort',
  ),
  'description' =>
  array (
    'name' => 'description',
    'vname' => 'LBL_DESCRIPTION',
    'type' => 'text',
    'comment' => 'Full description'
  ),
  'text_for_bill' =>
  array (
    'name' => 'text_for_bill',
    'vname' => 'LBL_TEXT_FOR_BILL',
    'type' => 'text',
    'comment' => 'Text for bill'
  ),
  'status' =>
  array (
    'name' => 'status',
    'vname' => 'LBL_STATUS',
    'type' => 'enum',
    'options' => 'timesheet_status_dom',
    'len' => '25',
    'audited' => true,
    'comment' => 'statuses',
  ),
  'date_booked' =>
  array (
    'name' => 'date_booked',
    'vname' => 'LBL_DATE_BOOKED',
    'type' => 'date',
    'audited' => true,
    'comment' => 'Booking date',
    'display_default' => 'now',
  ),
  'parent_type' =>
  array (
    'name' => 'parent_type',
    'type' => 'varchar',
    'len' => '25',
    'reportable'=>false,
    'vname' => 'LBL_PARENT_TYPE',
  ),
  'parent_id' =>
  array (
    'name' => 'parent_id',
    'vname' => 'LBL_PARENT',
    'type' => 'id',
    'reportable'=>false,
  ),
  'parent_name'=>
 	array(
		'name'=> 'parent_name',
		'parent_type' => 'record_type_display_timesheet' ,
		'type_name' => 'parent_type',
		'id_name' => 'parent_id',
		'vname' => 'LBL_PARENT',
		'type' => 'parent',
		'group' => 'parent_name',
		'source' => 'non-db',
		'options' => 'record_type_display_timesheet',
    'massupdate' => false,
	),
  ),
  //This enables optimistic locking for Saves From EditView
  'optimistic_locking' => true,
  'relationships' => array(
    'timesheet_accounts' =>
      array('lhs_module'=> 'Timesheet', 'lhs_table'=> 'timesheet', 'lhs_key' => 'account_id', 'rhs_module'=> 'Accounts', 'rhs_table'=> 'accounts', 'rhs_key' => 'id', 'relationship_type'=>'one-to-many'),

    'timesheet_projects' =>
      array('lhs_module'=> 'Timesheet', 'lhs_table'=> 'timesheet', 'lhs_key' => 'project_id', 'rhs_module'=> 'Project', 'rhs_table'=> 'project', 'rhs_key' => 'id', 'relationship_type'=>'one-to-many'),
    /*
    'timesheet_assigned_user' =>
      array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id', 'rhs_module'=> 'Timesheet', 'rhs_table'=> 'timesheet', 'rhs_key' => 'assigned_user_id', 'relationship_type'=>'one-to-many'),

    'timesheet_modified_user' =>
      array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id', 'rhs_module'=> 'Timesheet', 'rhs_table'=> 'timesheet', 'rhs_key' => 'modified_user_id', 'relationship_type'=>'one-to-many'),

    'timesheet_created_by' => array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id', 'rhs_module'=> 'Timesheet', 'rhs_table'=> 'timesheet', 'rhs_key' => 'created_by', 'relationship_type'=>'one-to-many')
    */
  )
);

require_once('include/SugarObjects/VardefManager.php');
VardefManager::createVardef('Timesheet', 'Timesheet', array('basic', 'assignable'));

$dictionary['TimesheetTimer'] = array(
    'table' => 'timesheet_timer',
    'fields' => array(
        'id' => array(
            'name' => 'id',
            'vname' => 'LBL_ID',
            'type' => 'id',
            'required' => true,
        ),
        'assigned_user_id' => array(
            'name' => 'assigned_user_id',
            'vname' => 'LBL_USER_ID',
            'type' => 'varchar',
            'len' => 36,
        ),
        'parent_type' => array (
            'name' => 'parent_type',
            'type' => 'varchar',
            'len' => '25',
            'reportable'=>false,
            'vname' => 'LBL_PARENT_TYPE',
        ),
        'parent_id' => array (
            'name' => 'parent_id',
            'vname' => 'LBL_PARENT',
            'type' => 'id',
            'reportable'=>false,
        ),
        'parent_name'=> array(
        		'name'=> 'parent_name',
            'parent_type' => 'record_type_display_timesheet' ,
            'type_name' => 'parent_type',
            'id_name' => 'parent_id',
            'vname' => 'LBL_PARENT',
            'type' => 'parent',
            'group' => 'parent_name',
            'source' => 'non-db',
            'options' => 'record_type_display_timesheet',
            'massupdate' => false,
        ),
        'started' => array (
            'name' => 'started',
            'vname' => 'LBL_TIMER_STARTED',
            'type' => 'float',
            'dbtype' => 'double',
            'disable_num_format' => true,
        ),
        'date_entered' => array (
      			'name' => 'date_entered',
      			'vname' => 'LBL_DATE_ENTERED',
      			'type' => 'datetime',
      			'required'=>true,
        ),
        'deleted' => array(
            'name' => 'deleted',
            'vname' => 'LBL_DELETED',
            'type' => 'bool',
            'reportable' => false,
        ),
    ),
    'indices' => array(
        array(
          'name' => 'timerpk',
          'type' => 'primary',
          'fields' => array('id')
        ),
    ),
);
?>
