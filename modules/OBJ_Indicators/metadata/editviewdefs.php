<?php
$module_name = 'OBJ_Indicators';
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
          'label' => '20',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '20',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
	  'includes' => array(
	  		array('file' => 'modules/OBJ_Indicators/period.js'),
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
            'name' => 'name',
            'studio' => 'visible',
            'label' => 'LBL_NAME',
            'popupHelp' => 'HELP_INDICATOR_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'object',
            'studio' => 'visible',
            'label' => 'LBL_OBJECT',
            'popupHelp' => 'HELP_INDICATOR_TARGET',
            'displayParams' => array('javascript' => 'onchange="this.form.action.value=\'EditView\';disableOnUnloadEditView(this.form);this.form.submit();"'),
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
            'popupHelp' => 'HELP_INDICATOR_OPERATION',
          ),
          1 => 
          array (
          	'name' => 'attribute',
          	'studio' => 'visible',
          	'label' => 'LBL_ATTRIBUTE',
          	'popupHelp' => 'HELP_INDICATOR_ATTRIBUTE',
          ),
        ),
        3 => 
        array (
          0 =>
          array (
          	'name' => 'period',
          	'studio' => 'visible',
          	'label' => 'LBL_PERIOD',
          	'popupHelp' => 'HELP_INDICATOR_PERIOD',
          	'fields' =>
          	array (
		        array (
		          'name' => 'period_reference',
		          'displayParams' => 
		          array (
		          	'size' => '5',
		          ),
		        ),
		        array (
		          'name' => 'period',
		          'displayParams' => 
		          array (
		          	'javascript' => 'onchange="show_period_numbers(this);"',
		          ),
		        ),
	        ),
          ), 
        ),
      ),
    ),
  ),
);
?>
