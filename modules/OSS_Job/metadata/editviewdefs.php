<?php
$module_name = 'OSS_Job';
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
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'no_ofvacancies_c',
            'label' => 'LBL_NO_OFVACANCIES',
          ),
          1 => 
          array (
            'name' => 'targetdatetohire_c',
            'label' => 'LBL_TARGETDATETOHIRE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'project_c',
            'studio' => 'visible',
            'label' => 'LBL_PROJECT',
          ),
          1 => 
          array (
            'name' => 'client_c',
            'studio' => 'visible',
            'label' => 'LBL_CLIENT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'noofcandidate_c',
            'label' => 'LBL_NOOFCANDIDATE_C',
          ),
        ),
      ),
    ),
  ),
);
?>
