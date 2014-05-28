<?php

require_once('iportal/include/MVC/View/views/view.edit.php');

class AccountsViewEdit extends ViewEdit {

	function AccountsViewEdit() {
		parent::ViewEdit();
	}

	function preDisplay() {
		parent::preDisplay();
	}

	function display() {
		// Begin Davi - I'm overrinding display, cause this piece of code simply don't work inside preDisplay
		// It worked fine in 5.5, but breaks in 5.5.1.
		global $current_portal_user, $iportal_config, $app_list_strings;

		if (!$this->bean->id) {
			$contacts = $current_portal_user->get_linked_beans('contacts_lg_portaluser', 'Contact');
			$iportal_contact = $contacts[0];
			$this->bean->fill_in_relationship_fields();
			$this->bean->parent_id = $iportal_contact->account_id;
			$this->bean->parent_name = $iportal_contact->account_name;

			//echo $this->bean->assigned_user_id.' ['.$this->bean->team_id;
		}

		parent::display();
	}

}

?>
