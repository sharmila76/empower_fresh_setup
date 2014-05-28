<?php
$module_name = 'HRM_Training';
$listViewDefs [$module_name] = 
array (
  'FOR_MOIS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_FOR_MOIS',
    'sortable' => true,
    'default' => true,
  ),
  'FOR_YEAR' => 
  array (
    'width' => '10%',
    'label' => 'LBL_FOR_YEAR',
    'default' => true,
  ),
  'HRM_EMPLOYEES_HRM_TRAINING_NAME' => 
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
  'FOR_TYPE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_FOR_TYPE',
    'sortable' => false,
    'default' => true,
  ),
);
?>
