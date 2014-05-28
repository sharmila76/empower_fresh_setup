<?php

require_once('iportal/include/MVC/View/views/view.detail.php');

class CasesViewDetail extends ViewDetail {

	function CasesViewDetail() {
		parent::ViewDetail();
	}

	function preDisplay() {
		parent::preDisplay();
	}

	function display() {
		global $current_portal_user, $iportal_config, $app_list_strings;

		if (!empty($this->bean->id)) {
			$contacts = $current_portal_user->get_linked_beans('contacts_lg_portaluser', 'Contact');
			$iportal_contact = $contacts[0];
			$this->bean->fill_in_relationship_fields();
			$this->bean->account_id = $iportal_contact->account_id;
			$this->bean->account_name = $iportal_contact->account_name;
			$this->bean->contact_c = $iportal_contact->name;
			$this->bean->contact_id_c = $iportal_contact->id;
			$this->bean->assigned_user_id = $iportal_config['default_user_id'];
		}

//var_dump($this->dv->defs['templateMeta']['form']);

		$buttons_to_remove = array('DUPLICATE');

		if (is_array($this->dv->defs['templateMeta']['form']['buttons'])) {

			foreach ($this->dv->defs['templateMeta']['form']['buttons'] as $id => $button) {

				if (in_array($button, $buttons_to_remove)) {
					unset($this->dv->defs['templateMeta']['form']['buttons'][$id]);
				}
			}
		}

		parent::display();
		unset($this->dv->defs['templateMeta']['form']['buttons'][3]);
	}

}

?>
