<?php
$module_name = 'gaur_Candidates';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'last_name' => 
      array (
        'name' => 'last_name',
        'default' => true,
        'width' => '10%',
      ),
      'emplo_employer_gaur_candidates_name' => 
      array (
        'type' => 'relate',
        'link' => 'emplo_employer_gaur_candidates',
        'label' => 'LBL_EMPLO_EMPLOYER_GAUR_CANDIDATES_FROM_EMPLO_EMPLOYER_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'emplo_employer_gaur_candidates_name',
      ),
      'currentlocation_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_CURRENTLOCATION',
        'width' => '10%',
        'name' => 'currentlocation_c',
      ),
      'workexperienceyears_c' => 
      array (
        'type' => 'int',
        'default' => true,
        'label' => 'LBL_WORKEXPERIENCEYEARS',
        'width' => '10%',
        'name' => 'workexperienceyears_c',
      ),
      'phone_mobile' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_MOBILE_PHONE',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_mobile',
      ),
      'description' => 
      array (
        'type' => 'text',
        'label' => 'LBL_DESCRIPTION',
        'width' => '10%',
        'default' => true,
        'name' => 'description',
      ),
      'email' => 
      array (
        'name' => 'email',
        'label' => 'LBL_ANY_EMAIL',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
    ),
    'advanced_search' => 
    array (
      'last_name' => 
      array (
        'name' => 'last_name',
        'default' => true,
        'width' => '10%',
      ),
      'officestatus_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OFFICESTATUS',
        'width' => '10%',
        'name' => 'officestatus_c',
      ),
      'reasonforrejection_c' => 
      array (
        'type' => 'multienum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REASONFORREJECTION',
        'width' => '10%',
        'name' => 'reasonforrejection_c',
      ),
      'description' => 
      array (
        'type' => 'text',
        'label' => 'LBL_DESCRIPTION',
        'width' => '10%',
        'default' => true,
        'name' => 'description',
      ),
      'currentlocation_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_CURRENTLOCATION',
        'width' => '10%',
        'name' => 'currentlocation_c',
      ),
      'preferredlocation_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_PREFERREDLOCATION',
        'width' => '10%',
        'name' => 'preferredlocation_c',
      ),
      'emplo_employer_gaur_candidates_name' => 
      array (
        'type' => 'relate',
        'link' => 'emplo_employer_gaur_candidates',
        'label' => 'LBL_EMPLO_EMPLOYER_GAUR_CANDIDATES_FROM_EMPLO_EMPLOYER_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'emplo_employer_gaur_candidates_name',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'created_by_name' => 
      array (
        'name' => 'created_by_name',
        'default' => true,
        'width' => '10%',
      ),
      'workexperienceyears_c' => 
      array (
        'type' => 'int',
        'default' => true,
        'label' => 'LBL_WORKEXPERIENCEYEARS',
        'width' => '10%',
        'name' => 'workexperienceyears_c',
      ),
      'recruitmentagency_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RECRUITMENTAGENCY',
        'width' => '10%',
        'name' => 'recruitmentagency_c',
      ),
      'phone_mobile' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_MOBILE_PHONE',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_mobile',
      ),
      'functionalarea_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_FUNCTIONALAREA',
        'width' => '10%',
        'name' => 'functionalarea_c',
      ),
      'workexperiencemonths_c' => 
      array (
        'type' => 'int',
        'default' => true,
        'label' => 'LBL_WORKEXPERIENCEMONTHS',
        'width' => '10%',
        'name' => 'workexperiencemonths_c',
      ),
      'assigned_user_name' => 
      array (
        'link' => 'assigned_user_link',
        'type' => 'relate',
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'assigned_user_name',
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
