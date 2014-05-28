<?php
$module_name='HRM_Holydays';
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
      'popup_module' => 'HRM_Holydays',
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
    'hol_mois' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_HOL_MOIS',
      'default' => true,
    ),
    'hol_year' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_HOL_YEAR',
      'default' => true,
    ),
    'hol_quan' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_HOL_QUAN',
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'HRM_Holydays',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'HRM_Holydays',
      'width' => '5%',
      'default' => true,
    ),
  ),
);