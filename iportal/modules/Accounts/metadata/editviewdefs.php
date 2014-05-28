<?php
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Professional Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/products/sugar-professional-eula.html
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2010 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/
$viewdefs['Accounts']['EditView'] = array(
    'templateMeta' => array(
                            'form' => array(
                            //'buttons'=>array('SAVE', 'CANCEL')
                            //taras
                            'hidden' => array (
                   		'<input type="hidden" name="parent_id" id="parent_id" value="{$fields.parent_id.value}" />',
                        '<input type="hidden" name="parent_name" id="parent_name" value="{$fields.parent_name.value}" />',
                        '<input type="hidden" name="assigned_user_id" value="{$fields.assigned_user_id.value}">',
                        '<input type="hidden" name="team_id" value="{$fields.team_id.value}">',
                        	),
                            //end taras
                            ),
                            'maxColumns' => '2',
                            'useTabs' => true,
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'),
                                            array('label' => '10', 'field' => '30'),
                                            ),
                            'includes'=> array(
                                            array('file'=>'iportal/modules/Accounts/Account.js'),
                                         ),
                            'javascript' => '<script type="text/javascript">
                                addToValidate("IportalEditView", "name", "text", true, "Name");
                                addToValidate("IportalEditView", "email1", "email", true, "Email Address");
                            </script> ',

                           ),

    'panels' => array(
    
      'lbl_account_information' => 
      array (
        array (
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'displayParams' =>
            array (
              'required' => true,
            ),
          ),
          array (
            'name' => 'phone_office',
            'label' => 'LBL_PHONE_OFFICE',
          ),
        ),

        array (

          array (
            'name' => 'website',
            'type' => 'link',
            'label' => 'LBL_WEBSITE',
          ),

          array (
            'name' => 'phone_fax',
            'label' => 'LBL_PHONE_FAX',
          ),
        ),

        array (

          array (
            'name' => 'billing_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),

          array (
            'name' => 'shipping_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
              'copy' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),

        array (

          array (
            'name' => 'email1',
            'label' => 'LBL_EMAIL',
            'displayParams' =>
            array (
              'required' => true,
            ),
          ),
        ),

        array (

          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' =>
      array (

        array (
          'account_type',
          'industry'
        ),

        array (
          'annual_revenue',
          'employees'
        ),

        array (
          'sic_code',
          'ticker_symbol'
        ),

        array (
          //'parent_name',
          'ownership'
        ),

        array (
          //'campaign_name',
          'rating'
        ),
      ),
    )
);
?>