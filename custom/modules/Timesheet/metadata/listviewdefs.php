<?php
$listViewDefs ['Timesheet'] = 
array (
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_EMPLOYEE',
    'link' => true,
    'default' => true,
  ),
  'PARENT_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_PARENT',
    'dynamic_module' => 'PARENT_TYPE',
    'id' => 'PARENT_ID',
    'link' => true,
    'default' => true,
    'sortable' => false,
    'ACLTag' => 'PARENT',
    'related_fields' => 
    array (
      0 => 'parent_id',
      1 => 'parent_type',
    ),
  ),
  'ACTUAL' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_ACTUAL',
    'align' => 'left',
    'default' => true,
  ),
  'BILLABLE' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_BILLABLE',
    'default' => true,
  ),
  'DATE_BOOKED' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_DATE_BOOKED',
    'default' => true,
  ),
  'STATUS' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_STATUS',
    'default' => true,
  ),
);
?>
<?php
/*
   This limits the ListView based on teams - part of the CE Teams module
   It is a template which is added to the end of modules/<module>/metadata/listviewdefs.php
   by the custom logic whenever it is needed
   This is needed because there is no logic hook that can modify the listview query
*/
require_once "modules/team/teams_logic.php";
$tmp = new teams_logic();
$tmp->limit_list_access($this, 'before_listview');
?>
