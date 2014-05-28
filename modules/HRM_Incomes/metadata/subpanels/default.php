<?php
$module_name='HRM_Incomes';
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
      'popup_module' => 'HRM_Incomes',
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
    'inc_mois' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_INC_MOIS',
      'sortable' => false,
      'default' => true,
    ),
    'inc_year' => 
    array (
      'width' => '4%',
      'vname' => 'LBL_INC_YEAR',
      'default' => true,
    ),
    'inc_amou' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_INC_AMOU',
      'currency_format' => true,
      'default' => true,
    ),
    'inc_type' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_INC_TYPE',
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'HRM_Incomes',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'HRM_Incomes',
      'width' => '5%',
      'default' => true,
    ),
  ),
);