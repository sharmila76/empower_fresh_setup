<?php

require_once('iportal/include/MVC/View/views/view.edit.php');

class CasesViewEdit extends ViewEdit {

	function CasesViewEdit() {
		parent::ViewEdit();
		$this->useForSubpanel = true;
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
			$this->bean->account_id = $iportal_contact->account_id;
			$this->bean->account_name = $iportal_contact->account_name;
			$this->bean->contact_c = $iportal_contact->name;
			$this->bean->contact_id_c = $iportal_contact->id;
			$this->bean->assigned_user_id = $iportal_config['default_user_id'];
			$this->bean->team_id = "1";
			$this->bean->status = "New";
		}

		//TK - Set a custom smarty var to avoid translate errors
		$this->ss->assign('LOC_STATUS', $app_list_strings['case_status_dom'][$this->bean->status]);

		$buttons_to_remove = array('DUPLICATE');
		if (is_array($this->ev->defs['templateMeta']['form']['buttons'])) {
			foreach ($this->ev->defs['templateMeta']['form']['buttons'] as $id => $button) {
				if (in_array($button, $buttons_to_remove)) {
					unset($this->ev->defs['templateMeta']['form']['buttons'][$id]);
				}
			}
		}
		parent::display();
	}

}

?>
