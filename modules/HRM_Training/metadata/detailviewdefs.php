<?php
$module_name = 'HRM_Training';
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
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'hrm_employees_hrm_training_name',
            'label' => 'LBL_EMPLOYEE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'for_mois',
            'label' => 'LBL_FOR_MOIS',
          ),
          1 => 
          array (
            'name' => 'for_year',
            'label' => 'LBL_FOR_YEAR',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'for_type',
            'label' => 'LBL_FOR_TYPE',
          ),
          1 => 
          array (
            'name' => 'for_dedi',
            'label' => 'LBL_FOR_DEDI',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'for_cost',
            'label' => 'LBL_FOR_COST',
          ),
        ),
      ),
    ),
  ),
);
?>
