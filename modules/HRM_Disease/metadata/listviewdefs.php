<?php
$module_name = 'HRM_Disease';
$listViewDefs [$module_name] = 
array (
  'DIS_MONTH' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DIS_MONTH',
    'default' => true,
  ),
  'DIS_YEAR' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DIS_YEAR',
    'default' => true,
  ),
  'HRM_EMPLOYEES_HRM_DISEASE' => 
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
  'DIS_QUAN' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DIS_QUAN',
    'default' => true,
  ),
);
?>
