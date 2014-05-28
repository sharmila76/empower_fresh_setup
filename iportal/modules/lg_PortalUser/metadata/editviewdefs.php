<?php
$module_name='lg_PortalUser';
$viewdefs['lg_PortalUser']['EditView'] =array(
    'templateMeta' =>
    array (
    'form' =>
    array (
      'buttons' =>
      array (
        0 => array(
           'customCode' =>
            '<input title="Save [Alt+S]" accessKey="S" onclick="this.form.action.value=\'Save\'; return check_custom_data();" type="submit" name="button" value="'.$GLOBALS['app_strings']['LBL_SAVE_BUTTON_LABEL'].'">',
          ),
        1 => array(
           'customCode' =>
            '<input title="Cancel [Alt+X]" accessKey="X" onclick="this.form.action.value=\'DetailView\'; this.form.module.value=\''.$module_name.'\'; this.form.record.value=\'{$id}\';" type="submit" name="button" value="'.$GLOBALS['app_strings']['LBL_CANCEL_BUTTON_LABEL'].'">'
          ),

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
         array(
          0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_CONTACT_NAME',
            'customCode'=>'<input type="text" name="contact_name" id="contact_name" value="{$CONTACT_NAME}">',
          ),
          1 =>array(
              'name' => 'name',
            'label' => 'LBL_CONTACT_LASTNAME',
              //'customLabel'=>'{$MOD.LBL_CONTACT_LASTNAME} <font color="red">*</font>',
             'customCode'=>'<input type="text" name="contact_lastname" id="contact_lastname" value="{$CONTACT_LASTNAME}">',
          ),
          ),
array(
          0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_CONTACT_PHONEWORK',
            'customCode'=>'<input type="text" name="phone_work" id="phone_work" value="{$phone_work}">',
          ),
          1 =>array(
              'name' => 'name',
            'label' => 'LBL_CONTACT_PHONEMOBILE',
             'customCode'=>'<input type="text" name="phone_mobile" id="phone_mobile" value="{$phone_mobile}">',
          ),
          ),


          array(
          0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_EMAIL',
            'customCode'=>'<input type="text" name="email" id="email" value="{$email}">',
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
            'customCode'=>'<input type="text" name="primary_address_street" id="primary_address_street" value="{$primary_address_street}">',
          ),
          1 =>array(
              'name' => 'name',
            'label' => 'LBL_ALT_ADDRESS_STREET',
             'customCode'=>'<input type="text" name="alt_address_street" id="alt_address_street" value="{$alt_address_street}">',
          ),
          ),
          array(
              0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_PRIMARY_ADDRESS_CITY',
            'customCode'=>'<input type="text" name="primary_address_city" id="primary_address_city" value="{$primary_address_city}">',
          ),
          1 =>array(
              'name' => 'name',
            'label' => 'LBL_ALT_ADDRESS_CITY',
            'customCode'=>'<input type="text" name="alt_address_city" id="alt_address_city" value="{$alt_address_city}">',

          ),

          ) ,

          array(
              0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_PRIMARY_ADDRESS_STATE',
            'customCode'=>'<input type="text" name="primary_address_state" id="primary_address_state" value="{$primary_address_state}">',
          ),
          1 =>array(
            'name' => 'name',
            'label' => 'LBL_ALT_ADDRESS_STATE',
            'customCode'=>'<input type="text" name="alt_address_state" id="alt_address_state" value="{$alt_address_state}">',


          ),

          ) ,
            array(
              0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_POSTAL_CODE',
            'customCode'=>'<input type="text" name="primary_address_postalcode" id="primary_address_postalcode" value="{$primary_address_postalcode}">',
          ),
          1 =>array(
              
               'name' => 'name',
            'label' => 'LBL_POSTAL_CODE',
            'customCode'=>'<input type="text" name="alt_address_postalcode" id="alt_address_postalcode" value="{$alt_address_postalcode}">',
          ),

          ) ,
             array(
              0 =>
          array (
            'name' => 'name',
            'label' => 'LBL_PRIMARY_ADDRESS_COUNTRY',
            'customCode'=>'<input type="text" name="primary_address_country" id="primary_address_country" value="{$primary_address_country}">',
          ),
          1 =>array(
                          'name' => 'name',
            'label' => 'LBL_ALT_ADDRESS_COUNTRY',
            'customCode'=>'<input type="text" name="alt_address_country" id="alt_address_country" value="{$alt_address_country}">',


          ),

          ) ,
         
        ),
    ),
);
?>
