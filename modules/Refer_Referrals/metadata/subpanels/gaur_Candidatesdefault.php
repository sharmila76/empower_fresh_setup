<?php
// created: 2010-05-10 09:56:20
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'gaur_candidates_refer_referrals_name' => 
  array (
    'type' => 'relate',
    'link' => 'gaur_candidates_refer_referrals',
    'vname' => 'LBL_GAUR_CANDIDATES_REFER_REFERRALS_FROM_GAUR_CANDIDATES_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'widget_class' => 'SubPanelEditButton',
    'module' => 'Refer_Referrals',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'Refer_Referrals',
    'width' => '5%',
    'default' => true,
  ),
);
?>
