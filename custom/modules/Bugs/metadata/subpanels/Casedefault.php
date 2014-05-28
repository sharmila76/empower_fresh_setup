<?php
// created: 2010-11-07 09:00:17
$subpanel_layout['list_fields'] = array (
  'bug_number' => 
  array (
    'vname' => 'LBL_LIST_NUMBER',
    'width' => '5%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_LIST_SUBJECT',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '50%',
    'default' => true,
  ),
  'status' => 
  array (
    'vname' => 'LBL_LIST_STATUS',
    'width' => '15%',
    'default' => true,
  ),
  'type' => 
  array (
    'vname' => 'LBL_LIST_TYPE',
    'width' => '15%',
    'default' => true,
  ),
  'priority' => 
  array (
    'vname' => 'LBL_LIST_PRIORITY',
    'width' => '11%',
    'default' => true,
  ),
  'show_in_portal_c' =>
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_SHOW_IN_PORTAL',
    'width' => '10%',
  ),
  'assigned_user_name' => 
  array (
    'name' => 'assigned_user_name',
    'vname' => 'LBL_LIST_ASSIGNED_TO_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_record_key' => 'assigned_user_id',
    'target_module' => 'Employees',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'Bugs',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'Bugs',
    'width' => '5%',
    'default' => true,
  ),
);
?>
