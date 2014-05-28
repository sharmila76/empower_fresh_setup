<?php
$module_name = 'HRM_Incomes';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'Employee' =>                                              // You can put any name you want here
      array (
              'name' => 'hrm_employees_hrm_incomes_name', // Name of the field that holds the Computer name
              'width' => '10%',                                  // Pick a suitable width
              'default' => true,
              'label' => 'LBL_EMPLOYEE',                         // The label you created when fixing the Edit and Detail view
      ),

      'inc_mois' => 
      array (
        'width' => '10%',
        'label' => 'LBL_INC_MOIS',
        'sortable' => false,
        'default' => true,
        'name' => 'inc_mois',
      ),
      'inc_year' => 
      array (
        'width' => '10%',
        'label' => 'LBL_INC_YEAR',
        'default' => true,
        'name' => 'inc_year',
      ),
      'inc_type' => 
      array (
        'width' => '10%',
        'label' => 'LBL_INC_TYPE',
        'default' => true,
        'name' => 'inc_type',
      ),
    ),
    'advanced_search' => 
    array (
'Employee' =>                                              // You can put any name you want here
      array (
              'name' => 'hrm_employees_hrm_incomes_name', // Name of the field that holds the Computer name
              'width' => '10%',                                  // Pick a suitable width
              'default' => true,
              'label' => 'LBL_EMPLOYEE',                         // The label you created when fixing the Edit and Detail view
      ),
      
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
