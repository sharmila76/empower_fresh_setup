<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class Caseslogic_hooks {
	
	/**
	 * For iportal - Get the id_c relate field and add to N-N Cases/Contacts relationship
	 * @author TK
	 * @param unknown_type $focus
	 */
	function createCaseContactRelationship(&$focus) {
		$focus->load_relationship('contacts');
		$ids = $focus->contacts->get();
		if (!in_array($focus->contact_id_c, $ids)) {
			$focus->contacts->add($focus->contact_id_c);
		}
	}
        
}

?>
