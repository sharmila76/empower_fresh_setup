<?php
$module_name = 'HRM_Holydays';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
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
            'name' => 'hrm_employees_hrm_holydays_name',
            'label' => 'LBL_EMPLOYEE',
          ),
          1 => 
          array (
            'name' => 'hol_quan',
            'label' => 'LBL_HOL_QUAN',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'hol_mois',
            'label' => 'LBL_HOL_MOIS',
          ),
          1 => 
          array (
            'name' => 'hol_year',
            'label' => 'LBL_HOL_YEAR',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'hol_type',
            'label' => 'LBL_HOL_TYPE',
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
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
