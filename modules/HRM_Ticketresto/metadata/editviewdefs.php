<?php
$module_name = 'HRM_Ticketresto';
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
            'name' => 'hrm_employees_hrm_ticketresto_name',
            'label' => 'LBL_EMPLOYEE',
          ),
          1 => 
          array (
            'name' => 'tic_quan',
            'label' => 'LBL_TIC_QUAN',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'tic_mois',
            'label' => 'LBL_TIC_MOIS',
          ),
          1 => 
          array (
            'name' => 'tic_year',
            'label' => 'LBL_TIC_YEAR',
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
      ),
    ),
  ),
);
?>
