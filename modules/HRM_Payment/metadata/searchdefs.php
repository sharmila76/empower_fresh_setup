<?php
$module_name = 'HRM_Payment';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'hrm_employees_hrm_payment_name' => 
      array (
        'name' => 'hrm_employees_hrm_payment_name',
        'width' => '10%',
        'default' => true,
        'label' => 'LBL_EMPLOYEE',
      ),
      'pay_mounth' => 
      array (
        'width' => '10%',
        'label' => 'LBL_PAY_MOUNTH',
        'default' => true,
        'name' => 'pay_mounth',
      ),
      'pay_year' => 
      array (
        'width' => '10%',
        'label' => 'LBL_PAY_YEAR',
        'default' => true,
        'name' => 'pay_year',
      ),
    ),
    'Employee' => 
    array (
      'name' => 'hrm_employees_hrm_payment_name',
      'width' => '10%',
      'default' => true,
      'label' => 'LBL_EMPLOYEE',
    ),
    'advanced_search' => 
    array (
      'hrm_employees_hrm_payment_name' => 
      array (
        'name' => 'hrm_employees_hrm_payment_name',
        'width' => '10%',
        'default' => true,
        'label' => 'LBL_EMPLOYEE',
      ),
      'pay_year' => 
      array (
        'width' => '10%',
        'label' => 'LBL_PAY_YEAR',
        'default' => true,
        'name' => 'pay_year',
      ),
      'pay_mounth' => 
      array (
        'width' => '10%',
        'label' => 'LBL_PAY_MOUNTH',
        'default' => true,
        'name' => 'pay_mounth',
      ),
      'pay_paid' => 
      array (
        'width' => '10%',
        'label' => 'LBL_PAY_PAID',
        'default' => true,
        'name' => 'pay_paid',
      ),
      'pay_valid' => 
      array (
        'width' => '10%',
        'label' => 'LBL_PAY_VALID',
        'default' => true,
        'name' => 'pay_valid',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
