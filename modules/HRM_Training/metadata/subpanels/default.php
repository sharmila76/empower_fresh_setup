<?php
$module_name='HRM_Training';
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
      'popup_module' => 'HRM_Training',
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
    'for_mois' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_FOR_MOIS',
      'default' => true,
    ),
    'for_year' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_FOR_YEAR',
      'default' => true,
    ),
    'for_type' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_FOR_TYPE',
      'default' => true,
    ),
    'for_cost' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_FOR_COST',
      'currency_format' => true,
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'HRM_Training',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'HRM_Training',
      'width' => '5%',
      'default' => true,
    ),
  ),
);