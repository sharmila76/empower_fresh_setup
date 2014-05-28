<?php
$module_name = 'HRM_RTT';
$listViewDefs [$module_name] = 
array (
  'RTT_MOIS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_RTT_MOIS',
    'default' => true,
  ),
  'RTT_YEAR' => 
  array (
    'width' => '10%',
    'label' => 'LBL_RTT_YEAR',
    'default' => true,
  ),
  'HRM_EMPLOYEES_HRM_RTT_NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_EMPLOYEE',
    'default' => true,
    'link' => true,
    'module' => 'HRM_Employees',
    'id' => 'HRM_EMPLOYE_EMPLOYEES_IDA',
  ),
  'RTT_TYPE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_RTT_TYPE',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => false,
    'link' => true,
  ),
);
?>
