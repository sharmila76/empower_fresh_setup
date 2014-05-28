<?php
$module_name = 'HRM_Bonus';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'BON_MOIS' => 
  array (
    'width' => '2%',
    'label' => 'LBL_BON_MOIS',
    'sortable' => false,
    'default' => true,
  ),
  'BON_YEAR' => 
  array (
    'width' => '2%',
    'label' => 'LBL_BON_YEAR',
    'default' => true,
  ),
  'HRM_EMPLOYEES_HRM_BONUS_NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_EMPLOYEE',
    'default' => true,
    'link' => false,
    'module' => 'HRM_Employees',
    'id' => 'HRM_EMPLOYE_EMPLOYEES_IDA',
  ),
  'BON_TURN' => 
  array (
    'width' => '3%',
    'label' => 'LBL_BON_TURN',
    'currency_format' => true,
    'default' => true,
  ),
  'BON_AMOU' => 
  array (
    'width' => '3%',
    'label' => 'LBL_BON_AMOU',
    'currency_format' => true,
    'default' => true,
  ),
  'SUM_MOIS' => 
  array (
    'width' => '3%',
    'label' => 'LBL_SUM_MOIS',
    'sortable' => false,
    'default' => true,
  ),
  'SUM_YEAR' => 
  array (
    'width' => '3%',
    'label' => 'LBL_SUM_YEAR',
    'sortable' => false,
    'default' => true,
  ),
  'BON_RATE' => 
  array (
    'width' => '1%',
    'label' => 'LBL_BON_RATE',
    'default' => false,
  ),
);
?>
