<?php
$module_name = 'HRM_RTT';
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
            'name' => 'hrm_employees_hrm_rtt_name',
            'label' => 'LBL_EMPLOYEE',
          ),
          1 => 
          array (
            'name' => 'rtt_quan',
            'label' => 'LBL_RTT_QUAN',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'rtt_mois',
            'label' => 'LBL_RTT_MOIS',
          ),
          1 => 
          array (
            'name' => 'rtt_year',
            'label' => 'LBL_RTT_YEAR',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'rtt_type',
            'label' => 'LBL_RTT_TYPE',
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
