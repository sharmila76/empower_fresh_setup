<?php
$module_name = 'HRM_Holydays';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'hol_mois' => 
      array (
        'width' => '10%',
        'label' => 'LBL_HOL_MOIS',
        'default' => true,
        'name' => 'hol_mois',
      ),
      'hol_year' => 
      array (
        'width' => '10%',
        'label' => 'LBL_HOL_YEAR',
        'default' => true,
        'name' => 'hol_year',
      ),
    ),
    'advanced_search' => 
    array (
      'hol_mois' => 
      array (
        'width' => '10%',
        'label' => 'LBL_HOL_MOIS',
        'default' => true,
        'name' => 'hol_mois',
      ),
      'hol_year' => 
      array (
        'width' => '10%',
        'label' => 'LBL_HOL_YEAR',
        'default' => true,
        'name' => 'hol_year',
      ),
      'hol_type' => 
      array (
        'width' => '10%',
        'label' => 'LBL_HOL_TYPE',
        'default' => true,
        'name' => 'hol_type',
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
