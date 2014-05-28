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
$viewdefs['Contacts']['EditView'] = array(
    'templateMeta' => array('form'=>array('hidden'=>array(
        '<input type="hidden" name="opportunity_id" value="{$smarty.request.opportunity_id}">',
    	'<input type="hidden" name="case_id" value="{$smarty.request.case_id}">',
    	'<input type="hidden" name="bug_id" value="{$smarty.request.bug_id}">',
        '<input type="hidden" name="email_id" value="{$smarty.request.email_id}">',
        '<input type="hidden" name="inbound_email_id" value="{$smarty.request.inbound_email_id}">',
        //taras
        '<input type="hidden" name="assigned_user_id" value="{$fields.assigned_user_id.value}">',
        '<input type="hidden" name="team_id" value="{$fields.team_id.value}">',
        //end taras
)),
							'maxColumns' => '2', 
							'useTabs' => true,
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'), 
                                            array('label' => '10', 'field' => '30'),
                                        ),
                            'javascript' => '<script type="text/javascript">
                                addToValidate("IportalEditView", "last_name", "text", true, "Last Name");
                                addToValidate("IportalEditView", "email1", "email", true, "Email Address");
                            </script> ',
),


    'panels' => 
    array (
      'lbl_contact_information' => 
      array (
        array (
          array (
            'name' => 'first_name',
            'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}'
	      . '&nbsp;<input name="first_name"  id="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
	      ),

	      'picture',

        ),
        array (
          array (
            'name' => 'last_name',
          ),
          array (
            'name' => 'phone_work',
            'comment' => 'Work phone number of the contact',
            'label' => 'LBL_OFFICE_PHONE',
          ),   
        ),


      array (
        0 =>
        array (
          'name' => 'account_name',
          'label' => 'LBL_ACCOUNT_NAME',
        ),
        1 =>
        array (
          'name' => 'phone_mobile',
          'label' => 'LBL_MOBILE_PHONE',
        ),
      ),

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

     /* array (
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
          'name' => 'email1',
          'label' => 'LBL_EMAIL_ADDRESS',
          'displayParams' =>
            array (
              'required' => true,
            ),
        ),
      ),

      array (
        array (
            'name' => 'primary_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' =>
            array (
              'key' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),

          array (
            'name' => 'alt_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' =>
            array (
              'key' => 'alt',
              'copy' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
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
          'label' => 'LBL_LEAD_SOURCE'
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

  /*     'LBL_PANEL_ASSIGNMENT' =>
      array (
        array (
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
	      'team_name',
        ),
      ), */

    )
);
?>