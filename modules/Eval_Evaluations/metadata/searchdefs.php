<?php
$module_name = 'Eval_Evaluations';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
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
      'nameofevaluator_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_NAMEOFEVALUATOR',
        'width' => '10%',
        'name' => 'nameofevaluator_c',
      ),
      'dateofevaluation_c' => 
      array (
        'type' => 'date',
        'default' => true,
        'label' => 'LBL_DATEOFEVALUATION',
        'width' => '10%',
        'name' => 'dateofevaluation_c',
      ),
      'recommendations_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RECOMMENDATIONS',
        'width' => '10%',
        'name' => 'recommendations_c',
      ),
      'timeofevaluation_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_TIMEOFEVALUATION',
        'width' => '10%',
        'name' => 'timeofevaluation_c',
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
      'name' => 
      array (
        'name' => 'name',
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
      'recommendations_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RECOMMENDATIONS',
        'width' => '10%',
        'name' => 'recommendations_c',
      ),
      'nameofevaluator_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_NAMEOFEVALUATOR',
        'width' => '10%',
        'name' => 'nameofevaluator_c',
      ),
      'nameofcandidate_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_NAMEOFCANDIDATE',
        'width' => '10%',
        'name' => 'nameofcandidate_c',
      ),
      'nextsteps_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_NEXTSTEPS',
        'width' => '10%',
        'name' => 'nextsteps_c',
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
        'width' => '10%',
      ),
      'dateofevaluation_c' => 
      array (
        'type' => 'date',
        'default' => true,
        'label' => 'LBL_DATEOFEVALUATION',
        'width' => '10%',
        'name' => 'dateofevaluation_c',
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
      'timeofevaluation_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_TIMEOFEVALUATION',
        'width' => '10%',
        'name' => 'timeofevaluation_c',
      ),
      'created_by_name' => 
      array (
        'type' => 'relate',
        'link' => 'created_by_link',
        'label' => 'LBL_CREATED',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by_name',
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
