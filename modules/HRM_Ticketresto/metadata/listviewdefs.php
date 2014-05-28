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
