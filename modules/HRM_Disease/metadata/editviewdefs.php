<?php
$module_name = 'HRM_Disease';
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
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'hrm_employees_hrm_disease_name',
            'label' => 'LBL_EMPLOYEE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'dis_month',
            'label' => 'LBL_DIS_MONTH',
          ),
          1 => 
          array (
            'name' => 'dis_year',
            'label' => 'LBL_DIS_YEAR',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'dis_quan',
            'label' => 'LBL_DIS_QUAN',
          ),
        ),
      ),
    ),
  ),
);
?>
