<?php
$module_name = 'Rec_Recruitment_Agency';
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
          1 => 
          array (
            'name' => 'phone_c',
            'label' => 'LBL_PHONE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'agency_contact_person_c',
            'label' => 'LBL_AGENCY_CONTACT_PERSON',
          ),
          1 => 
          array (
            'name' => 'mobile_c',
            'label' => 'LBL_MOBILE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
          1 => 
          array (
            'name' => 'otherphone_c',
            'label' => 'LBL_OTHERPHONE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'email_c',
            'label' => 'LBL_EMAIL',
          ),
          1 => 
          array (
            'name' => 'website_c',
            'label' => 'LBL_WEBSITE',
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
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
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
            'name' => 'address_c',
            'label' => 'LBL_ADDRESS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'address_city_c',
            'label' => 'LBL_ADDRESS_CITY',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'address_state_c',
            'label' => 'LBL_ADDRESS_STATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'address_postalcode_c',
            'label' => 'LBL_ADDRESS_POSTALCODE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'address_country_c',
            'label' => 'LBL_ADDRESS_COUNTRY',
          ),
        ),
      ),
    ),
  ),
);
?>
