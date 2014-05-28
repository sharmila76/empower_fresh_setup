<?php 
 $GLOBALS["dictionary"]["TimesheetTimer"]=array (
  'table' => 'timesheet_timer',
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'vname' => 'LBL_USER_ID',
      'type' => 'varchar',
      'len' => 36,
    ),
    'parent_type' => 
    array (
      'name' => 'parent_type',
      'type' => 'varchar',
      'len' => '25',
      'reportable' => false,
      'vname' => 'LBL_PARENT_TYPE',
    ),
    'parent_id' => 
    array (
      'name' => 'parent_id',
      'vname' => 'LBL_PARENT',
      'type' => 'id',
      'reportable' => false,
    ),
    'parent_name' => 
    array (
      'name' => 'parent_name',
      'parent_type' => 'record_type_display_timesheet',
      'type_name' => 'parent_type',
      'id_name' => 'parent_id',
      'vname' => 'LBL_PARENT',
      'type' => 'parent',
      'group' => 'parent_name',
      'source' => 'non-db',
      'options' => 'record_type_display_timesheet',
      'massupdate' => false,
    ),
    'started' => 
    array (
      'name' => 'started',
      'vname' => 'LBL_TIMER_STARTED',
      'type' => 'float',
      'dbtype' => 'double',
      'disable_num_format' => true,
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'required' => true,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'reportable' => false,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'timerpk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
);