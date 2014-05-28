<?php
$module_name = 'HRM_Ticketresto';
$listViewDefs [$module_name] = 
array (
  'TIC_MOIS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_TIC_MOIS',
    'default' => true,
  ),
  'TIC_YEAR' => 
  array (
    'width' => '10%',
    'label' => 'LBL_TIC_YEAR',
    'default' => true,
  ),
  'HRM_EMPLOYEES_HRM_TICKETRESTO_NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_EMPLOYEE',
    'default' => true,
    'link' => true,
    'module' => 'HRM_Employees',
    'id' => 'HRM_EMPLOYE_EMPLOYEES_IDA',
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'TIC_QUAN' => 
  array (
    'width' => '10%',
    'label' => 'LBL_TIC_QUAN',
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
