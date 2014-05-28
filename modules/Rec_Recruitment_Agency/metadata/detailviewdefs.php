<?php
$module_name = 'Rec_Recruitment_Agency';
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 'team_name',
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'phone_c',
            'label' => 'LBL_PHONE',
          ),
        ),
        3 => 
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
        4 => 
        array (
          0 => 
          array (
            'name' => 'email_c',
            'label' => 'LBL_EMAIL',
          ),
          1 => 
          array (
            'name' => 'otherphone_c',
            'label' => 'LBL_OTHERPHONE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'website_c',
            'label' => 'LBL_WEBSITE',
          ),
        ),
        6 => 
        array (
          0 => 'description',
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
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'address_city_c',
            'label' => 'LBL_ADDRESS_CITY',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'address_state_c',
            'label' => 'LBL_ADDRESS_STATE',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'address_postalcode_c',
            'label' => 'LBL_ADDRESS_POSTALCODE',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'address_country_c',
            'label' => 'LBL_ADDRESS_COUNTRY',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
