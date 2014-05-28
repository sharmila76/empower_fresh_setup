<?php
$module_name='HRM_Ticketresto';
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
      'popup_module' => 'HRM_Ticketresto',
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
    'tic_mois' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_TIC_MOIS',
      'default' => true,
    ),
    'tic_year' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_TIC_YEAR',
      'default' => true,
    ),
    'tic_quan' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_TIC_QUAN',
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'HRM_Ticketresto',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'HRM_Ticketresto',
      'width' => '5%',
      'default' => true,
    ),
  ),
);