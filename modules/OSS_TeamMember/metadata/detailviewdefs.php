<?php
$module_name = 'OSS_TeamMember';
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
            'name' => 'full_name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'phone_work',
            'label' => 'LBL_OFFICE_PHONE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'cellphone',
            'label' => 'LBL_CELLPHONE',
          ),
          1 => 
          array (
            'name' => 'landline_no',
            'label' => 'LBL_LANDLINE_NO',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'joiningdate',
            'label' => 'LBL_JOININGDATE',
          ),
          1 => 
          array (
            'name' => 'designation',
            'label' => 'LBL_DESIGNATION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'link_to',
            'label' => 'LBL_LINK_TO',
          ),
          1 => 
          array (
            'name' => 'report_to',
            'label' => 'LBL_REPORT_TO',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
          1 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'label' => 'LBL_EMAIL_ADDRESS',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'status_c',
            'label' => 'LBL_STATUS',
          ),
          1 => 
          array (
            'name' => 'type_c',
            'label' => 'LBL_TYPE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'billable_c',
            'label' => 'LBL_BILLABLE',
          ),
          1 => 
          array (
            'name' => 'location_c',
            'studio' => 'visible',
            'label' => 'LBL_LOCATION',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'project_oss_teammember_name',
          ),
        ),
      ),
      'lbl_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_street',
            'label' => 'LBL_PRIMARY_ADDRESS_STREET',
          ),
          1 => 
          array (
            'name' => 'alt_address_street',
            'label' => 'LBL_ALT_ADDRESS_STREET',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_city',
            'label' => 'LBL_PRIMARY_ADDRESS_CITY',
          ),
          1 => 
          array (
            'name' => 'alt_address_city',
            'label' => 'LBL_ALT_ADDRESS_CITY',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_state',
            'label' => 'LBL_PRIMARY_ADDRESS_STATE',
          ),
          1 => 
          array (
            'name' => 'alt_address_state',
            'label' => 'LBL_ALT_ADDRESS_STATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_postalcode',
            'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
          ),
          1 => 
          array (
            'name' => 'alt_address_postalcode',
            'label' => 'LBL_ALT_ADDRESS_POSTALCODE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_country',
            'label' => 'LBL_PRIMARY_ADDRESS_COUNTRY',
          ),
          1 => 
          array (
            'name' => 'alt_address_country',
            'label' => 'LBL_ALT_ADDRESS_COUNTRY',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'permanent_landline',
            'label' => 'LBL_PERMANENT_LANDLINE',
          ),
          1 => 
          array (
            'name' => 'current_landline',
            'label' => 'LBL_CURRENT_LANDLINE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'officialdob',
            'label' => 'LBL_OFFICIALDOB',
          ),
          1 => 
          array (
            'name' => 'actualdob',
            'label' => 'LBL_ACTUALDOB',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'spousename',
            'label' => 'LBL_SPOUSENAME',
          ),
          1 => 
          array (
            'name' => 'spousedob',
            'label' => 'LBL_SPOUSEDOB',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'father_name',
            'label' => 'LBL_FATHER_NAME',
          ),
          1 => 
          array (
            'name' => 'mother_name',
            'label' => 'LBL_MOTHER_NAME',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'marriagedate',
            'label' => 'LBL_MARRIAGEDATE',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
