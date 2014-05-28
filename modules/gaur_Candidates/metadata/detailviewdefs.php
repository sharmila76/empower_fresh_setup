<?php
$module_name = 'gaur_Candidates';
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
          3 => 'FIND_DUPLICATES',
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
            'name' => 'last_name',
            'label' => 'LBL_LAST_NAME',
          ),
          1 => 
          array (
            'name' => 'resumeid_c',
            'label' => 'LBL_RESUMEID',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'phone_work',
            'label' => 'LBL_OFFICE_PHONE',
          ),
          1 => 
          array (
            'name' => 'phone_mobile',
            'label' => 'LBL_MOBILE_PHONE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'lastactivedate_c',
            'label' => 'LBL_LASTACTIVEDATE',
          ),
          1 => 
          array (
            'name' => 'email1',
            'label' => 'LBL_EMAIL_ADDRESS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'title',
            'label' => 'LBL_TITLE',
          ),
          1 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'functionalarea_c',
            'label' => 'LBL_FUNCTIONALAREA',
          ),
          1 => 
          array (
            'name' => 'emplo_employer_gaur_candidates_name',
            'label' => 'LBL_EMPLO_EMPLOYER_GAUR_CANDIDATES_FROM_EMPLO_EMPLOYER_TITLE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'currentlocation_c',
            'label' => 'LBL_CURRENTLOCATION',
          ),
          1 => 
          array (
            'name' => 'preferredlocation_c',
            'label' => 'LBL_PREFERREDLOCATION',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'currentdesignation_c',
            'label' => 'LBL_CURRENTDESIGNATION',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'ugcourse_c',
            'label' => 'LBL_UGCOURSE',
          ),
          1 => 
          array (
            'name' => 'ugspecialization_c',
            'label' => 'LBL_UGSPECIALIZATION',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'uginstitute_c',
            'label' => 'LBL_UGINSTITUTE',
          ),
          1 => 
          array (
            'name' => 'pgcourse_c',
            'label' => 'LBL_PGCOURSE',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'pginstitute_c',
            'label' => 'LBL_PGINSTITUTE',
          ),
          1 => 
          array (
            'name' => 'pgspecialization_c',
            'label' => 'LBL_PGSPECIALIZATION',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'postpgcourse_c',
            'label' => 'LBL_POSTPGCOURSE',
          ),
          1 => 
          array (
            'name' => 'postpgspecialization_c',
            'label' => 'LBL_POSTPGSPECIALIZATION',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'postpginsitute_c',
            'label' => 'LBL_POSTPGINSITUTE',
          ),
          1 => 
          array (
            'name' => 'phone_fax',
            'label' => 'LBL_FAX_PHONE',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'phone_home',
            'label' => 'LBL_HOME_PHONE',
          ),
          1 => 
          array (
            'name' => 'phone_other',
            'label' => 'LBL_OTHER_PHONE',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_street',
            'label' => 'LBL_PRIMARY_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'primary',
            ),
          ),
          1 => 
          array (
            'name' => 'alt_address_street',
            'label' => 'LBL_ALT_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'alt',
            ),
          ),
        ),
        14 => 
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
        15 => 
        array (
          0 => 
          array (
            'name' => 'do_not_call',
            'label' => 'LBL_DO_NOT_CALL',
          ),
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
          1 => '',
        ),
      ),
      'lbl_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'php4_c',
            'label' => 'LBL_PHP4',
          ),
          1 => 
          array (
            'name' => 'php5_c',
            'label' => 'LBL_PHP5',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'mysql_c',
            'label' => 'LBL_MYSQL',
          ),
          1 => 
          array (
            'name' => 'joomla_c',
            'label' => 'LBL_JOOMLA',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'drupal_c',
            'label' => 'LBL_DRUPAL',
          ),
          1 => 
          array (
            'name' => 'xcart_c',
            'label' => 'LBL_XCART',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'sugarcrm_c',
            'label' => 'LBL_SUGARCRM',
          ),
          1 => 
          array (
            'name' => 'linux_c',
            'label' => 'LBL_LINUX',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'zendframework_c',
            'label' => 'LBL_ZENDFRAMEWORK',
          ),
          1 => 
          array (
            'name' => 'symfonyframework_c',
            'label' => 'LBL_SYMFONYFRAMEWORK',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'cakephp_c',
            'label' => 'LBL_CAKEPHP',
          ),
          1 => 
          array (
            'name' => 'css_c',
            'label' => 'LBL_CSS',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'javascript_c',
            'label' => 'LBL_JAVASCRIPT',
          ),
          1 => 
          array (
            'name' => 'java_c',
            'label' => 'LBL_JAVA',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'cprogramming_c',
            'label' => 'LBL_CPROGRAMMING',
          ),
          1 => 
          array (
            'name' => 'oops_c',
            'label' => 'LBL_OOPS',
          ),
        ),
      ),
      'lbl_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'workexperienceyears_c',
            'label' => 'LBL_WORKEXPERIENCEYEARS',
          ),
          1 => 
          array (
            'name' => 'workexperiencemonths_c',
            'label' => 'LBL_WORKEXPERIENCEMONTHS',
          ),
        ),
      ),
      'lbl_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'annualsalary_c',
            'label' => 'LBL_ANNUALSALARY',
          ),
          1 => 
          array (
            'name' => 'expectedctc_c',
            'label' => 'LBL_EXPECTEDCTC',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'offeredctc_c',
            'label' => 'LBL_OFFEREDCTC',
          ),
          1 => 
          array (
            'name' => 'finalctc_c',
            'label' => 'LBL_FINALCTC',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'comment_c',
            'studio' => 'visible',
            'label' => 'LBL_COMMENT',
          ),
          1 => '',
        ),
      ),
      'lbl_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'job_c',
            'studio' => 'visible',
            'label' => 'LBL_JOB',
          ),
          1 => 
          array (
            'name' => 'officestatus_c',
            'studio' => 'visible',
            'label' => 'LBL_OFFICESTATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'reasonforrejection_c',
            'studio' => 'visible',
            'label' => 'LBL_REASONFORREJECTION',
          ),
          1 => 
          array (
            'name' => 'joiningdate_c',
            'label' => 'LBL_JOININGDATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'referredby_c',
            'studio' => 'visible',
            'label' => 'LBL_REFERREDBY',
          ),
          1 => 
          array (
            'name' => 'anyother_c',
            'label' => 'LBL_ANYOTHER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'osscubeemployeereferer_c',
            'studio' => 'visible',
            'label' => 'LBL_OSSCUBEEMPLOYEEREFERER',
          ),
          1 => 
          array (
            'name' => 'recruitmentagency_c',
            'studio' => 'visible',
            'label' => 'LBL_RECRUITMENTAGENCY',
          ),
        ),
      ),
    ),
  ),
);
?>
