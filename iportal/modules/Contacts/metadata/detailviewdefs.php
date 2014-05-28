<?php
// created: 2010-09-15 11:05:44
$viewdefs['Contacts']['DetailView'] = array (
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
    'includes' =>
    array (
      0 =>
      array (
        'file' => 'iportal/modules/Contacts/Lead.js',
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
          'name' => 'full_name',
          'label' => 'LBL_NAME',
          'customCode' => '{$fields.salutation.value} {$fields.first_name.value} {$fields.last_name.value}',
        ),
        1 =>
        array (
          'name' => 'phone_work',
          'label' => 'LBL_OFFICE_PHONE',
        ),
      ),

      array (
        0 =>
        array (
          'name' => 'account_name',
          'label' => 'LBL_ACCOUNT_NAME',
          'customCode'=>'<a href="iportal.php?module=Accounts&action=DetailView&record={$fields.account_id.value}">{$fields.account_name.value}</a>',
        ),
        1 =>
        array (
          'name' => 'phone_mobile',
          'label' => 'LBL_MOBILE_PHONE',
        ),
      ),

      /*array (
        0 =>
        array (
          'name' => 'do_not_call',
          'comment' => 'An indicator of whether contact can be called',
          'label' => 'LBL_DO_NOT_CALL',
        ),
        1 =>
        array (
          'name' => 'phone_other',
          'label' => 'LBL_OTHER_PHONE',
        ),
      ), */

      array (
        0 =>
        array (
          'name' => 'title',
          'comment' => 'The title of the contact',
          'label' => 'LBL_TITLE',
        ),
        1 =>
        array (
          'name' => 'phone_home',
          'label' => 'LBL_HOME_PHONE',
        ),
      ),

     array (
        0 =>
        array (
          'name' => 'email1',
          'label' => 'LBL_EMAIL_ADDRESS',
        ),
      ),


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
          'label' => 'LBL_ALTERNATE_ADDRESS',
          'type' => 'address',
          'displayParams' =>
          array (
            'key' => 'alt',
          ),
        ),
      ),

      array (
        0 =>
        array (
          'name' => 'department',
          'comment' => 'The department of the contact',
          'label' => 'LBL_DEPARTMENT',
        ),
        1 =>
        array (
          'name' => 'birthdate',
          'comment' => 'The birthdate of the contact',
          'label' => 'LBL_BIRTHDATE',
        ),
      ),

      array (
        0 =>
        array (
          'name' => 'lead_source',
          'comment' => 'How did the contact come about',
          'label' => 'LBL_LEAD_SOURCE',
        ),
        1 => '',
      ),

      array (
        0 =>
        array (
          'name' => 'description',
          'comment' => 'Full text of the note',
          'label' => 'LBL_DESCRIPTION',
        ),
      ),

    ),
  ),
);
?>