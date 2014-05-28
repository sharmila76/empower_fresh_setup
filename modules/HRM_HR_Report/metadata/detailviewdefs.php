<?php
$module_name = 'HRM_HR_Report';
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
          0 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'rep_mois',
            'label' => 'LBL_REP_MOIS',
          ),
          1 => 
          array (
            'name' => 'rep_year',
            'label' => 'LBL_REP_YEAR',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
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
            'name' => 'hrr_income',
            'label' => 'LBL_HRR_INCOME',
          ),
          1 => 
          array (
            'name' => 'hrr_inc_year',
            'label' => 'LBL_HRR_INC_YEAR',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'hrr_soc_year',
            'label' => 'LBL_HRR_SOC_YEAR',
          ),
          1 => 
          array (
            'name' => 'hrr_inc_tot',
            'label' => 'LBL_HRR_INC_TOT',
          ),
        ),
      ),
    ),
  ),
);
?>
