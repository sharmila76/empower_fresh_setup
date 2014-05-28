<?php

require_once('iportal/include/MVC/View/views/view.detail.php');

class NotesViewDetail extends ViewDetail {

	function NotesViewDetail() {
		parent::ViewDetail();
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

	function display() {

		$buttons_to_remove = array('DUPLICATE');

		if (is_array($this->dv->defs['templateMeta']['form']['buttons'])) {

			foreach ($this->dv->defs['templateMeta']['form']['buttons'] as $id => $button) {
				if (in_array($button, $buttons_to_remove)) {
					unset($this->dv->defs['templateMeta']['form']['buttons'][$id]);
				}
			}
		}

		parent::display();
	}

}