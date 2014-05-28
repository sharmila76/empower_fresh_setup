<?php
$module_name='HRM_Bonus';
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
      'popup_module' => 'HRM_Bonus',
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
    'bon_mois' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_BON_MOIS',
      'default' => true,
    ),
    'bon_year' => 
    array (
      'width' => '45%',
      'vname' => 'LBL_BON_YEAR',
      'default' => true,
    ),
    'bon_amou' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_BON_AMOU',
      'currency_format' => true,
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'HRM_Bonus',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'HRM_Bonus',
      'width' => '5%',
      'default' => true,
    ),
  ),
);