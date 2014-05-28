<?php
$module_name = 'HRM_Payment';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'hrm_employees_hrm_payment_name',
            'label' => 'LBL_EMPLOYEE',
          ),
          1 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'pay_mounth',
            'label' => 'LBL_PAY_MOUNTH',
          ),
          1 => 
          array (
            'name' => 'pay_year',
            'label' => 'LBL_PAY_YEAR',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'pay_amou',
            'label' => 'LBL_PAY_AMOU',
          ),
          1 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'pay_valid',
            'label' => 'LBL_PAY_VALID',
          ),
        ),
      ),
    ),
  ),
);
?>
