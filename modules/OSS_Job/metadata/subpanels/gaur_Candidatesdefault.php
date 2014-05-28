<?php
// created: 2010-05-10 09:37:09
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'description' => 
  array (
    'type' => 'text',
    'vname' => 'LBL_DESCRIPTION',
    'width' => '10%',
    'default' => true,
  ),
  'no_ofvacancies_c' => 
  array (
    'type' => 'int',
    'default' => true,
    'vname' => 'LBL_NO_OFVACANCIES',
    'width' => '10%',
  ),
  'targetdatetohire_c' => 
  array (
    'type' => 'date',
    'default' => true,
    'vname' => 'LBL_TARGETDATETOHIRE',
    'width' => '10%',
  ),
  'project_c' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_PROJECT',
    'width' => '10%',
  ),
  'team_c' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_TEAM ',
    'width' => '10%',
  ),
  'client_c' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_CLIENT',
    'width' => '10%',
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
    'module' => 'OSS_Job',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'OSS_Job',
    'width' => '5%',
    'default' => true,
  ),
);
?>
