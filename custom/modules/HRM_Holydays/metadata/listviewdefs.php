<?php
$module_name = 'HRM_Holydays';
$listViewDefs [$module_name] = 
array (
  'HOL_MOIS' => 
  array (
    'width' => '2%',
    'label' => 'LBL_HOL_MOIS',
    'default' => true,
  ),
  'HOL_YEAR' => 
  array (
    'width' => '2%',
    'label' => 'LBL_HOL_YEAR',
    'default' => true,
  ),
  'HRM_EMPLOYEES_HRM_HOLYDAYS_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_EMPLOYEE',
    'default' => true,
    'link' => true,
    'module' => 'HRM_Employees',
    'id' => 'HRM_EMPLOYE_EMPLOYEES_IDA',
  ),
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'HOL_TYPE' => 
  array (
    'width' => '1%',
    'label' => 'LBL_HOL_TYPE',
    'default' => true,
  ),
  'HOL_QUAN' => 
  array (
    'width' => '2%',
    'label' => 'LBL_HOL_QUAN',
    'default' => true,
  ),
  'HOL_QTYP' => 
  array (
    'width' => '10%',
    'label' => 'LBL_HOL_QTYP',
    'default' => false,
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
