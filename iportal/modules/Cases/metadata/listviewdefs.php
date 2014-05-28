<?php
// created: 2010-03-12 13:55:38
$listViewDefs['Cases'] = array (
  'CASE_NUMBER' => 
  array (
    'width' => '5%',
    'label' => 'LBL_LIST_NUMBER',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '35%',
    'label' => 'LBL_LIST_SUBJECT',
    'link' => true,
    'default' => true,
  ),
  'ACCOUNT_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'module' => 'Accounts',
    'id' => 'ACCOUNT_ID',
    'link' => false,
    'default' => true,
    'ACLTag' => 'ACCOUNT',
    'related_fields' => 
    array (
      0 => 'account_id',
    ),
  ),
  'TYPE' => 
  array (
    'width' => '8%',
    'label' => 'LBL_TYPE',
    'default' => true,
  ),
  'STATUS' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_STATUS',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' =>
  array (
    'width' => '5%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => false,
    'module' => 'Users',
    'id' => 'ASSIGNED_USER_ID',
    'link' => true,
    'related_fields' => 
    array (
      0 => 'assigned_user_id',
    ),
  ),
  'PRIORITY' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_PRIORITY',
    'default' => false,
  ),
  'DATE_MODIFIED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_MODIFIED',
    'default' => false,
  ),
);
?>
