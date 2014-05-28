<?php
// created: 2010-05-10 09:25:42
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '20%',
    'default' => true,
  ),
  'assigned_user_name' => 
  array (
    'link' => 'assigned_user_link',
    'type' => 'relate',
    'vname' => 'LBL_ASSIGNED_TO_NAME',
    'width' => '20%',
    'default' => true,
  ),
  'phone_c' => 
  array (
    'type' => 'phone',
    'default' => true,
    'vname' => 'LBL_PHONE',
    'width' => '10%',
  ),
  'company_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_COMPANY',
    'width' => '10%',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '15%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'widget_class' => 'SubPanelEditButton',
    'module' => 'refer_References',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'refer_References',
    'width' => '5%',
    'default' => true,
  ),
);
?>
