<?php

require_once('iportal/include/MVC/View/views/view.edit.php');

class ContactsViewEdit extends ViewEdit {

	function ContactsViewEdit() {
		parent::ViewEdit();
	}

	function preDisplay() {
		parent::preDisplay();
	}

	function display() {

		global $current_portal_user, $iportal_config, $app_list_strings;

		if (!$this->bean->id) {
			$contacts = $current_portal_user->get_linked_beans('contacts_lg_portaluser', 'Contact');
			$iportal_contact = $contacts[0];
			$this->bean->fill_in_relationship_fields();
			$this->bean->account_id = $iportal_contact->account_id;
			$this->bean->account_name = $iportal_contact->account_name;

			//echo $this->bean->assigned_user_id.' ['.$this->bean->team_id;
		}

		/* require_once('include/json_config.php');
		  require_once('include/QuickSearchDefaults.php');

		  // setup Quicksearch
		  $json = getJSONobj();
		  $qsd = new QuickSearchDefaults();
		  $sqs_objects = array('account_name' => $qsd->getQSUser());
		  $sqs_objects['account_name']['populate_list'] = array('account_name', 'account_id');
		  $quicksearch_js .= '<script type="text/javascript" language="javascript">
		  sqs_objects = ' . $json->encode($sqs_objects) . '</script>';
		  echo 'ttt['.$quicksearch_js;
		  enableQS(true);
		 */
		parent::display();
	}

}

?>
