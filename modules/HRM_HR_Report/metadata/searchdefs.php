<?php
$module_name = 'HRM_HR_Report';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'label' => 'LBL_NAME',
        'default' => true,
      ),
      'rep_mois' => 
      array (
        'width' => '10%',
        'label' => 'LBL_REP_MOIS',
        'default' => true,
        'name' => 'rep_mois',
      ),
      'rep_year' => 
      array (
        'width' => '10%',
        'label' => 'LBL_REP_YEAR',
        'default' => true,
        'name' => 'rep_year',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'label' => 'LBL_NAME',
        'default' => true,
      ),
      'rep_mois' => 
      array (
        'width' => '10%',
        'label' => 'LBL_REP_MOIS',
        'default' => true,
        'name' => 'rep_mois',
      ),
      'description' => 
      array (
        'width' => '10%',
        'label' => 'LBL_DESCRIPTION',
        'sortable' => false,
        'default' => true,
        'name' => 'description',
      ),
      'rep_year' => 
      array (
        'width' => '10%',
        'label' => 'LBL_REP_YEAR',
        'default' => true,
        'name' => 'rep_year',
      ),
      'assigned_user_id' => 
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
        'default' => true,
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
