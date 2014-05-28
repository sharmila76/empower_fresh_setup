<?php

require_once('iportal/include/MVC/View/views/view.edit.php');

class NotesViewEdit extends ViewEdit {

	function NotesViewEdit() {
		parent::ViewEdit();
	}

	function preDisplay() {
		global $current_portal_user;
		if (!$this->bean->id) {
			$contacts = $current_portal_user->get_linked_beans('contacts_lg_portaluser', 'Contact');
			$iportal_contact = $contacts[0];
			$this->bean->fill_in_relationship_fields();
			$this->bean->contact_id = $iportal_contact->id;
			$this->bean->contact_name = $iportal_contact->name;
		}
		parent::preDisplay();
	}

}