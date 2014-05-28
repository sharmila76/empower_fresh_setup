<?php
$module_name = 'HRM_Incomes';
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
            'name' => 'hrm_employees_hrm_incomes_name',
            'label' => 'LBL_EMPLOYEE',
          ),
          1 => 
          array (
            'name' => 'inc_amou',
            'label' => 'LBL_INC_AMOU',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'inc_mois',
            'label' => 'LBL_INC_MOIS',
          ),
          1 => 
          array (
            'name' => 'inc_year',
            'label' => 'LBL_INC_YEAR',
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
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'inc_type',
            'label' => 'LBL_INC_TYPE',
          ),
        ),
      ),
    ),
  ),
);
?>
