<?PHP
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Enterprise Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/products/sugar-enterprise-eula.html
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
 * by SugarCRM are Copyright (C) 2004-2009 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/
/**
 * THIS CLASS IS GENERATED BY MODULE BUILDER
 * PLEASE DO NOT CHANGE THIS CLASS
 * PLACE ANY CUSTOMIZATIONS IN gaur_Candidates
 */

require_once('include/SugarObjects/templates/person/Person.php');

class gaur_Candidates_sugar extends Person {
	var $new_schema = true;
	var $module_dir = 'gaur_Candidates';
	var $object_name = 'gaur_Candidates';
	var $table_name = 'gaur_candidates';
	var $importable = true;



		var $id;
		var $name;
		var $date_entered;
		var $date_modified;
		var $modified_user_id;
		var $modified_by_name;
		var $created_by;
		var $created_by_name;
		var $description;
		var $deleted;
		var $created_by_link;
		var $modified_user_link;
		var $team_id;
		var $team_name;
		var $team_link;
		var $assigned_user_id;
		var $assigned_user_name;
		var $assigned_user_link;
		var $salutation;
		var $first_name;
		var $last_name;
		var $full_name;
		var $title;
		var $department;
		var $do_not_call;
		var $phone_home;
		var $phone_mobile;
		var $phone_work;
		var $phone_other;
		var $phone_fax;
		var $email1;
		var $email2;
		var $invalid_email;
		var $email_opt_out;
		var $primary_address_street;
		var $primary_address_street_2;
		var $primary_address_street_3;
		var $primary_address_city;
		var $primary_address_state;
		var $primary_address_postalcode;
		var $primary_address_country;
		var $alt_address_street;
		var $alt_address_street_2;
		var $alt_address_street_3;
		var $alt_address_city;
		var $alt_address_state;
		var $alt_address_postalcode;
		var $alt_address_country;
		var $assistant;
		var $assistant_phone;
		var $email_addresses_primary;
	
	
	function gaur_Candidates_sugar(){	
		parent::Person();
	}
	
	function bean_implements($interface){
		switch($interface){
			case 'ACL': return true;
		}
		return false;
}
		
}
?>