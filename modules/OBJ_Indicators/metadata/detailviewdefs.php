<?php
$module_name = 'OBJ_Indicators';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
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
            'name' => 'object',
            'studio' => 'visible',
            'label' => 'LBL_OBJECT',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'studio' => 'visible',
            'label' => 'LBL_NAME',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'operation',
            'studio' => 'visible',
            'label' => 'LBL_OPERATION',
          ),
          1 => 
          array (
          	'name' => 'attribute',
          	'studio' => 'visible',
          	'label' => 'LBL_ATTRIBUTE',
          ),
        ),
        3 => 
        array (
          0 =>
          array (
          	'name' => 'period',
          	'studio' => 'visible',
          	'label' => 'LBL_PERIOD',
          	'fields' =>
          	array (
		        'period_reference',
		        'period',
	        ),
          ), 
        ),
      ),
    ),
  ),
);
?>
