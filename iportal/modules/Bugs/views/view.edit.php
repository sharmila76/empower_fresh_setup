<?php

require_once('iportal/include/MVC/View/views/view.edit.php');

class BugsViewEdit extends ViewEdit {

	function BugsViewEdit() {
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

	function display() {

		//taras
		if (!empty($_REQUEST['record'])) {
			header('Location: iportal.php?module=Bugs&action=DetailView&record=' . $_REQUEST['record']);
		}
		//end taras
		$admin = new Administration();
		$admin->retrieveSettings();
		if (isset($admin->settings['portal_on']) && $admin->settings['portal_on']) {
			$this->ev->ss->assign("PORTAL_ENABLED", true);
		}
		parent::display();
	}

}
?>

