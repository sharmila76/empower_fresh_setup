<?php
$module_name = 'lg_PortalUser';
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
      'LBL_CONTACT_INFO'=>array(

       array (
          0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 =>
          array (

          ),
        ),
         array(
          0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_CONTACT_NAME',
            'customCode'=>'{$CONTACT_NAME}',
          ),
          1 =>array(
              'name' => 'name',
            'label' => 'LBL_CONTACT_LASTNAME',

             'customCode'=>'{$CONTACT_LASTNAME}',
          ),
          ),
array(
          0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_CONTACT_PHONEWORK',
            'customCode'=>'{$phone_work}',
          ),
          1 =>array(
              'name' => 'name',
            'label' => 'LBL_CONTACT_PHONEMOBILE',
             'customCode'=>'{$phone_mobile}',
          ),
          ),
                array(
          0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_EMAIL',
            'customCode'=>'{$email}',
          ),
          1 =>array(

          ),
          ),

      ),

        'LBL_CONTACT_ADDRESS_INFO'=>array(
         array(
          0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_PRIMARY_ADDRESS_STREET',
            'customCode'=>'{$primary_address_street}',
          ),
          1 =>array(
              'name' => 'name',
            'label' => 'LBL_ALT_ADDRESS_STREET',
             'customCode'=>'{$alt_address_street}',
          ),
          ),
          array(
              0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_PRIMARY_ADDRESS_CITY',
            'customCode'=>'{$primary_address_city}',
          ),
          1 =>array(
              'name' => 'name',
            'label' => 'LBL_ALT_ADDRESS_CITY',
            'customCode'=>'{$alt_address_city}',

          ),

          ) ,

          array(
              0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_PRIMARY_ADDRESS_STATE',
            'customCode'=>'{$primary_address_state}',
          ),
          1 =>array(
            'name' => 'name',
            'label' => 'LBL_ALT_ADDRESS_STATE',
            'customCode'=>'{$alt_address_state}',


          ),

          ) ,
            array(
              0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_POSTAL_CODE',
            'customCode'=>'{$primary_address_postalcode}',
          ),
          1 =>array(

               'name' => 'name',
            'label' => 'LBL_POSTAL_CODE',
            'customCode'=>'{$alt_address_postalcode}',
          ),

          ) ,
             array(
              0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_PRIMARY_ADDRESS_COUNTRY',
            'customCode'=>'{$primary_address_country}',
          ),
          1 =>array(
                          'name' => 'name',
            'label' => 'LBL_ALT_ADDRESS_COUNTRY',
            'customCode'=>'{$alt_address_country}',


          ),

          ) ,

        ),








    ),
  ),
);
?>
