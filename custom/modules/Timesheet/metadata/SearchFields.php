<?php
// created: 2014-03-18 08:48:29
$searchFields['Timesheet'] = array (
  'assigned_user_id' => 
  array (
    'query_type' => 'default',
  ),
  'parent_type' => 
  array (
    'query_type' => 'default',
    'operator' => '=',
    'options' => 'record_type_display_timesheet',
    'options_add_blank' => true,
    'template_var' => 'PARENT_TYPE_OPTIONS',
  ),
  'project_name' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'parent.project',
    ),
  ),
  'project_task_name' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'parent.project_task',
    ),
  ),
  'case_name' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'parent.cases',
    ),
  ),
  'current_user_only' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'assigned_user_id',
    ),
    'my_items' => true,
  ),
);