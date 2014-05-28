<?php
// created: 2010-05-10 09:46:49
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'name' => 'name',
    'vname' => 'LBL_LIST_NAME',
    'sort_by' => 'last_name',
    'sort_order' => 'asc',
    'widget_class' => 'SubPanelDetailViewLink',
    'module' => 'Contacts',
    'width' => '23%',
    'default' => true,
  ),
  'officestatus_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_OFFICESTATUS',
    'width' => '10%',
  ),
  'email1' => 
  array (
    'name' => 'email1',
    'vname' => 'LBL_LIST_EMAIL',
    'widget_class' => 'SubPanelEmailLink',
    'width' => '30%',
    'default' => true,
  ),
  'phone_mobile' => 
  array (
    'type' => 'phone',
    'vname' => 'LBL_MOBILE_PHONE',
    'width' => '10%',
    'default' => true,
  ),
  'description' => 
  array (
    'type' => 'text',
    'vname' => 'LBL_DESCRIPTION',
    'width' => '10%',
    'default' => true,
  ),
  'workexperienceyears_c' => 
  array (
    'type' => 'int',
    'default' => true,
    'vname' => 'LBL_WORKEXPERIENCEYEARS',
    'width' => '10%',
  ),
  'referredby_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_REFERREDBY',
    'width' => '10%',
  ),
  'emplo_employer_gaur_candidates_name' => 
  array (
    'type' => 'relate',
    'link' => 'emplo_employer_gaur_candidates',
    'vname' => 'LBL_EMPLO_EMPLOYER_GAUR_CANDIDATES_FROM_EMPLO_EMPLOYER_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'currentlocation_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_CURRENTLOCATION',
    'width' => '10%',
  ),
  'edit_button' => 
  array (
    'widget_class' => 'SubPanelEditButton',
    'module' => 'Contacts',
    'width' => '5%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'Contacts',
    'width' => '5%',
    'default' => true,
  ),
  'first_name' => 
  array (
    'name' => 'first_name',
    'usage' => 'query_only',
  ),
  'last_name' => 
  array (
    'name' => 'last_name',
    'usage' => 'query_only',
  ),
);
?>
