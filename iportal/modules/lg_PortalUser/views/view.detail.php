<?php

require_once('iportal/include/MVC/View/views/view.detail.php');

class lg_PortalUserViewDetail extends ViewDetail {

	function lg_PortalUserViewDetail() {
		parent::ViewDetail();
	}

	function display() {
		global $current_portal_user;
		global $current_language;

		if (file_exists('iportal/modules/lg_PortalUser/' . $current_language . 'lang.php'))
			include_once('iportal/modules/lg_PortalUser/' . $current_language . 'lang.php');

		$contacts = $current_portal_user->get_linked_beans('contacts_lg_portaluser', 'Contact');
		$iportal_contact = $contacts[0];
		$this->bean->fill_in_relationship_fields();
		$this->bean->contact_id = $iportal_contact->id;
		$this->bean->related_contact = $iportal_contact->name;

		$this->bean->contact_name = $iportal_contact->name;

		$this->ss->assign("CONTACT_NAME", $iportal_contact->first_name);
		$this->ss->assign("CONTACT_LASTNAME", $iportal_contact->last_name);
		$this->ss->assign("phone_work", $iportal_contact->phone_work);
		$this->ss->assign("phone_mobile", $iportal_contact->phone_mobile);
		$this->ss->assign("name1", $this->bean->name);
		$this->bean->name.=" " . $this->bean->lastname;


		$this->ss->assign("primary_address_street", $iportal_contact->primary_address_street);
		$this->ss->assign("primary_address_city", $iportal_contact->primary_address_city);
		$this->ss->assign("primary_address_state", $iportal_contact->primary_address_state);
		$this->ss->assign("primary_address_postalcode", $iportal_contact->primary_address_postalcode);
		$this->ss->assign("primary_address_country", $iportal_contact->primary_address_country);



		$this->ss->assign("alt_address_street", $iportal_contact->alt_address_street);
		$this->ss->assign("alt_address_city", $iportal_contact->alt_address_city);
		$this->ss->assign("alt_address_state", $iportal_contact->alt_address_state);
		$this->ss->assign("alt_address_postalcode", $iportal_contact->alt_address_postalcode);
		$this->ss->assign("alt_address_country", $iportal_contact->alt_address_country);
		$this->ss->assign("email", $iportal_contact->email1);

		$buttons_to_remove = array('DUPLICATE', 'DELETE');

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