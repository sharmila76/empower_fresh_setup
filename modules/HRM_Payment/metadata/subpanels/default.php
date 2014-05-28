<?php
$module_name='HRM_Payment';
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
      'popup_module' => 'HRM_Payment',
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
    'pay_mounth' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_PAY_MOUNTH',
      'default' => true,
    ),
    'pay_year' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_PAY_YEAR',
      'default' => true,
    ),
    'pay_amou' => 
    array (
      'width' => '10%',
      'vname' => 'LBL_PAY_AMOU',
      'currency_format' => true,
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'HRM_Payment',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'HRM_Payment',
      'width' => '5%',
      'default' => true,
    ),
  ),
);