<?php

require_once('iportal/include/MVC/Controller/IportalController.php');

class lg_PortalUserController extends IportalController {

	function action_login() {
		if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
			$auth_controller = new AuthenticationController('IportalAuthenticate');
			if ($auth_controller->login($_REQUEST['username'], $_REQUEST['password'])) {
				SugarApplication::redirect($this->build_after_login_url());
			}
		}
	}

	function action_logout() {
		$auth_controller = new AuthenticationController('IportalAuthenticate');
		$auth_controller->logout();
		SugarApplication::redirect('iportal.php');
	}

	function action_myaccount() {
		$this->view = 'myaccount';
	}

	function action_passwordreset() {
		$this->view = 'passwordreset';
	}

	function action_changepassword() {
		global $mod_strings, $current_portal_user;

		$old_password = isset($_POST['old_password']) ? $_POST['old_password'] : '';
		$new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';
		$confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
		$_SESSION['CHANGE_PASSWORD_ERROR'] = '';
		if (!empty($old_password)) {
			if ($current_portal_user->password != md5($old_password)) {
				$_SESSION['CHANGE_PASSWORD_ERROR'] = $mod_strings['CHANGE_PASSWORD_ERROR_INVALID_PASSWORD'];
			} else {
				if (!empty($new_password) && !empty($confirm_password)) {
					if ($confirm_password == $new_password) {
						$current_portal_user->password = $new_password;
						$current_portal_user->save();

						SugarApplication::redirect('iportal.php?module=lg_PortalUser&action=passwordreset');
					} else {
						$_SESSION['CHANGE_PASSWORD_ERROR'] = $mod_strings['CHANGE_PASSWORD_ERROR_CONFIRM'];
					}
				} else {
					$_SESSION['CHANGE_PASSWORD_ERROR'] = $mod_strings['CHANGE_PASSWORD_ERROR_EMPTY_PASSWORD'];
				}
			}
		}
	}

	function action_save() {
		global $current_portal_user;
		$contact = $_REQUEST;
		$contacts = $current_portal_user->get_linked_beans('contacts_lg_portaluser', 'Contact');
		$iportal_contact = $contacts[0];
		$iportal_contact->first_name = $contact['contact_name'];
		$iportal_contact->last_name = $contact['contact_lastname'];
		$iportal_contact->phone_work = $contact['phone_work'];
		$iportal_contact->phone_mobile = $contact['phone_mobile'];
		$iportal_contact->primary_address_street = $contact['primary_address_street'];
		$iportal_contact->alt_address_street = $contact['alt_address_street'];
		$iportal_contact->primary_address_city = $contact['primary_address_city'];
		$iportal_contact->alt_address_city = $contact['alt_address_city'];
		$iportal_contact->primary_address_state = $contact['primary_address_state'];
		$iportal_contact->alt_address_state = $contact['alt_address_state'];
		$iportal_contact->primary_address_postalcode = $contact['primary_address_postalcode'];
		$iportal_contact->alt_address_postalcode = $contact['alt_address_postalcode'];
		$iportal_contact->primary_address_country = $contact['primary_address_country'];
		$iportal_contact->alt_address_country = $contact['alt_address_country'];
		$iportal_contact->email1 = $contact['email'];
		$iportal_contact->save();

		$iportal_user = new lg_PortalUser();
		$iportal_user->retrieve($contact['record']);
		$iportal_user->name = $contact['name'];
		$iportal_user->lastname = $contact['lastname'];

		$iportal_user->save();
		
		$contact;
		$_SESSION['CHANGE_PASSWORD_ERROR'] = 'ERROR';
	}

	private function build_after_login_url() {
		$base_url = 'iportal.php?';
		$module = "module={$_REQUEST['login_module']}";
		$action = "&action={$_REQUEST['login_action']}";
		$record = '';
		if (isset($_REQUEST['login_record']) && !empty($_REQUEST['login_record'])) {
			$record = "&record={$_REQUEST['login_record']}";
		}

		return $base_url . $module . $action . $record;
	}

	function action_editview() {
		$this->view = "edit";
	}

}