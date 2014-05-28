<?php
$viewdefs ['Timesheet'] = 
array (
  'QuickCreate' => 
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
            'name' => 'assigned_user_name',
            'label' => 'LBL_EMPLOYEE',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'parent_name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'actual',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'billable',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'date_booked',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'status',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'displayParams' => 
            array (
              'rows' => '8',
              'cols' => '80',
            ),
            'nl2br' => true,
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'text_for_bill',
            'displayParams' => 
            array (
              'rows' => '8',
              'cols' => '80',
            ),
            'nl2br' => true,
          ),
        ),
      ),
    ),
  ),
);
?>
