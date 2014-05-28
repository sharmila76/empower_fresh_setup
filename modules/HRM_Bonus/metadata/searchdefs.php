<?php
$module_name = 'HRM_Bonus';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'hrm_employees_hrm_bonus_name' => 
      array (
        'name' => 'hrm_employees_hrm_bonus_name',
        'width' => '10%',
        'default' => true,
        'label' => 'LBL_EMPLOYEE',
      ),
      'bon_vali' => 
      array (
        'width' => '10%',
        'label' => 'LBL_BON_VALI',
        'default' => true,
        'name' => 'bon_vali',
      ),
      'bon_paid' => 
      array (
        'width' => '10%',
        'label' => 'LBL_BON_PAID',
        'default' => true,
        'name' => 'bon_paid',
      ),
      'bon_mois' => 
      array (
        'width' => '10%',
        'label' => 'LBL_BON_MOIS',
        'sortable' => false,
        'default' => true,
        'name' => 'bon_mois',
      ),
      'bon_year' => 
      array (
        'width' => '10%',
        'label' => 'LBL_BON_YEAR',
        'default' => true,
        'name' => 'bon_year',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
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
