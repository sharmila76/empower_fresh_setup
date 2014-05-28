<?php
$module_name = 'Eval_Evaluations';
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
            'name' => 'nameofevaluator_c',
            'label' => 'LBL_NAMEOFEVALUATOR',
          ),
          1 => 
          array (
            'name' => 'nameofcandidate_c',
            'label' => 'LBL_NAMEOFCANDIDATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'dateofevaluation_c',
            'label' => 'LBL_DATEOFEVALUATION',
          ),
          1 => 
          array (
            'name' => 'timeofevaluation_c',
            'label' => 'LBL_TIMEOFEVALUATION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
      ),
      'lbl_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'cmarks_c',
            'label' => 'LBL_CMARKS',
          ),
          1 => 
          array (
            'name' => 'php_c',
            'label' => 'LBL_PHP',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'english_c',
            'label' => 'LBL_ENGLISH',
          ),
          1 => 
          array (
            'name' => 'logical_c',
            'label' => 'LBL_LOGICAL',
          ),
        ),
      ),
      'lbl_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'mode_c',
            'label' => 'LBL_MODE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'nextsteps_c',
            'label' => 'LBL_NEXTSTEPS',
          ),
          1 => 
          array (
            'name' => 'recommendations_c',
            'label' => 'LBL_RECOMMENDATIONS',
          ),
        ),
        2 => 
        array (
          0 => '',
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
      'lbl_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'writtenenglish_c',
            'studio' => 'visible',
            'label' => 'LBL_WRITTENENGLISH',
          ),
          1 => 
          array (
            'name' => 'spokenenglish_c',
            'studio' => 'visible',
            'label' => 'LBL_SPOKENENGLISH',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'analytical_c',
            'studio' => 'visible',
            'label' => 'LBL_ANALYTICAL',
          ),
          1 => 
          array (
            'name' => 'logical1_c',
            'studio' => 'visible',
            'label' => 'LBL_LOGICAL1',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'cselection_c',
            'studio' => 'visible',
            'label' => 'LBL_CSELECTION',
          ),
          1 => 
          array (
            'name' => 'oops_c',
            'studio' => 'visible',
            'label' => 'LBL_OOPS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'php4_c',
            'studio' => 'visible',
            'label' => 'LBL_PHP4',
          ),
          1 => 
          array (
            'name' => 'php5_c',
            'studio' => 'visible',
            'label' => 'LBL_PHP5',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'mysql_c',
            'studio' => 'visible',
            'label' => 'LBL_MYSQL',
          ),
          1 => 
          array (
            'name' => 'drupal_c',
            'studio' => 'visible',
            'label' => 'LBL_DRUPAL',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'xcart_c',
            'studio' => 'visible',
            'label' => 'LBL_XCART',
          ),
          1 => 
          array (
            'name' => 'sugarcrm_c',
            'studio' => 'visible',
            'label' => 'LBL_SUGARCRM',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'linux_c',
            'studio' => 'visible',
            'label' => 'LBL_LINUX',
          ),
          1 => 
          array (
            'name' => 'zendframework_c',
            'studio' => 'visible',
            'label' => 'LBL_ZENDFRAMEWORK',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'symfonyframework_c',
            'studio' => 'visible',
            'label' => 'LBL_SYMFONYFRAMEWORK',
          ),
          1 => 
          array (
            'name' => 'cakephp_c',
            'studio' => 'visible',
            'label' => 'LBL_CAKEPHP',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'javascript_c',
            'studio' => 'visible',
            'label' => 'LBL_JAVASCRIPT',
          ),
          1 => 
          array (
            'name' => 'java_c',
            'studio' => 'visible',
            'label' => 'LBL_JAVA',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'joomla_c',
            'studio' => 'visible',
            'label' => 'LBL_JOOMLA',
          ),
          1 => 
          array (
            'name' => 'css_c',
            'studio' => 'visible',
            'label' => 'LBL_CSS',
          ),
        ),
      ),
    ),
  ),
);
?>
