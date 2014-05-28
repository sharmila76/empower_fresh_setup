<?php
$module_name='HRM_Disease';
$subpanel_layout = array (
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'HRM_Disease',
    ),
  ),
  'where' => '',
  'list_fields' => 
  array (
    'name' => 
    array (
      'vname' => 'LBL_NAME',
      'widget_class' => 'SubPanelDetailViewLink',
      'width' => '45%',
      'default' => true,
    ),
    'dis_month' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_DIS_MONTH',
      'default' => true,
    ),
    'dis_year' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_DIS_YEAR',
      'default' => true,
    ),
    'dis_quan' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_DIS_QUAN',
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'HRM_Disease',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'HRM_Disease',
      'width' => '5%',
      'default' => true,
    ),
  ),
);