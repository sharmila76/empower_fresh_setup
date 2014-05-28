<?php
$module_name = 'HRM_Training';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'for_mois' => 
      array (
        'width' => '10%',
        'label' => 'LBL_FOR_MOIS',
        'sortable' => false,
        'default' => true,
        'name' => 'for_mois',
      ),
      'for_year' => 
      array (
        'width' => '10%',
        'label' => 'LBL_FOR_YEAR',
        'default' => true,
        'name' => 'for_year',
      ),
      'for_dedi' => 
      array (
        'width' => '10%',
        'label' => 'LBL_FOR_DEDI',
        'default' => true,
        'name' => 'for_dedi',
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
