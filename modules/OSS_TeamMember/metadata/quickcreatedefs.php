<?php
$module_name = 'OSS_TeamMember';
$viewdefs [$module_name] = 
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
      'lbl_contact_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'customCode' => '{html_options name="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
            'label' => 'LBL_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'last_name',
            'displayParams' => 
            array (
              'required' => true,
            ),
            'label' => 'LBL_LAST_NAME',
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
            'name' => 'team_name',
            'displayParams' => 
            array (
              'display' => true,
            ),
            'label' => 'LBL_TEAM',
          ),
          1 => NULL,
        ),
      ),
      'lbl_email_addresses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'label' => 'LBL_EMAIL_ADDRESS',
          ),
        ),
      ),
      'lbl_address_information' => 
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
        ),
      ),
    ),
  ),
);
?>
