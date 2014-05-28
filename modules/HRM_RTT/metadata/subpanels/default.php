<?php
$module_name='HRM_RTT';
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
      'popup_module' => 'HRM_RTT',
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
    'rtt_mois' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_RTT_MOIS',
      'default' => true,
    ),
    'rtt_year' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_RTT_YEAR',
      'default' => true,
    ),
    'rtt_quan' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_RTT_QUAN',
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'HRM_RTT',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'HRM_RTT',
      'width' => '5%',
      'default' => true,
    ),
  ),
);