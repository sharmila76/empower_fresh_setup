<?php
$module_name = 'HRM_Payment';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '5%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'HRM_EMPLOYEES_HRM_PAYMENT_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_EMPLOYEE',
    'default' => true,
    'link' => true,
    'module' => 'HRM_Employees',
    'id' => 'HRM_EMPLOYE_EMPLOYEES_IDA',
  ),
  'PAY_MOUNTH' => 
  array (
    'width' => '3%',
    'label' => 'LBL_PAY_MOUNTH',
    'default' => true,
  ),
  'PAY_YEAR' => 
  array (
    'width' => '3%',
    'label' => 'LBL_PAY_YEAR',
    'default' => true,
  ),
  'PAY_AMOU' => 
  array (
    'width' => '5%',
    'label' => 'LBL_PAY_AMOU',
    'currency_format' => true,
    'default' => true,
  ),
  'PAY_PAID' => 
  array (
    'width' => '1%',
    'label' => 'LBL_PAY_PAID',
    'default' => true,
  ),
  'PAY_VALID' => 
  array (
    'width' => '1%',
    'label' => 'LBL_PAY_VALID',
    'default' => false,
  ),
);
?>
