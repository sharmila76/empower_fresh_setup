<?php

if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
/**
 * Subpanel definition classes to ease the use of metadata/subpaneldefs.php
 *
 * The contents of this file are subject to the SugarCRM Professional Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/products/sugar-professional-eula.html
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2009 SugarCRM, Inc.; All Rights Reserved.
 */
require_once('include/SubPanel/SubPanelDefinitions.php');

//input
//	module directory
//constructor
//	open the layout_definitions file.
//
class aIportalSubPanel extends aSubPanel {
	/* var $name ;
	  var $_instance_properties ;

	  var $mod_strings ;
	  var $panel_definition ;
	  var $sub_subpanels ;
	  var $parent_bean ;

	  //module's table name and column fields.
	  var $table_name ;
	  var $db_fields ;
	  var $bean_name ;
	  var $template_instance ; */

	function aIportalSubPanel($name, $instance_properties, $parent_bean, $reload = false, $original_only = false) {
		$this->_instance_properties = $instance_properties;
		$this->name = $name;
		$this->parent_bean = $parent_bean;

		//set language
		global $current_language;
		if (!isset($parent_bean->mbvardefs)) {
			$mod_strings = return_module_language($current_language, $parent_bean->module_dir);
		}
		$this->mod_strings = $mod_strings;

		if ($this->isCollection()) {
			$this->load_sub_subpanels(); //load sub-panel definition.
		} else {
			if (!is_dir('modules/' . $this->_instance_properties ['module'])) {
				_pstack_trace();
			}

			// Davi - first we look for layout_defs on iportal. If not found, look on modules and custom/modules
			$def_path = 'iportal/modules/' . $this->_instance_properties ['module'] . '/metadata/subpanels/' . $this->_instance_properties ['subpanel_name'] . '.php';

			if (!file_exists($def_path))
				$def_path = 'modules/' . $this->_instance_properties ['module'] . '/metadata/subpanels/' . $this->_instance_properties ['subpanel_name'] . '.php';

			require ($def_path);
			// end Davi
			if (!$original_only && isset($this->_instance_properties ['override_subpanel_name']) && file_exists('custom/modules/' . $this->_instance_properties ['module'] . '/metadata/subpanels/' . $this->_instance_properties ['override_subpanel_name'] . '.php')) {
				$cust_def_path = 'custom/modules/' . $this->_instance_properties ['module'] . '/metadata/subpanels/' . $this->_instance_properties ['override_subpanel_name'] . '.php';

				require ($cust_def_path);
			}

			// check that the loaded subpanel definition includes a $subpanel_layout section - some, such as projecttasks/default do not...
			$this->panel_definition = array();
			if (isset($subpanel_layout)) {
				$this->panel_definition = $subpanel_layout;


				// Begin Davi - This is the same filter logic used for listview
				global $iportal_config, $current_portal_user, $currentModule;

				$list_filter_option = $iportal_config['list_filter_options']['default'];
				if (isset($iportal_config['list_filter_options'][$currentModule][$current_portal_user->getRoleName()])) {
					$list_filter_option = $iportal_config['list_filter_options'][$currentModule][$current_portal_user->getRoleName()];
				}

				$contacts = $current_portal_user->get_linked_beans('contacts_lg_portaluser', 'Contact');
				$contact = $contacts[0];
				$removed_contact_id = $contact->id;
				$iportal_acc_id = $contact->account_id; //taras: real iportal account_id

				$seed = loadBean($this->_instance_properties['module']);
				$seed->load_relationships();
				$seed_ids = array();

				switch ($list_filter_option) {

					case FILTER_BY_CONTACT:
						$seed_ids = $this->getIds($seed, $contact, 'contacts', $seed_ids);
						break;

					case FILTER_BY_ACCOUNT:

						//Get account related to contact
						$account = new Account();
						$account->retrieve($contact->account_id);

						//Get all records in that account if the relationship exists
						$seed_ids = $this->getIds($seed, $account, 'accounts', $seed_ids);

						//Get all contacts inside that account
						$contacts = $account->get_linked_beans('contacts', 'Contact');
						foreach ($contacts as $contact) {
							$seed_ids = $this->getIds($seed, $contact, 'contacts', $seed_ids);
						}
						break;

					case FILTER_BY_PARENT:

						//Get account related to contact
						$account = new Account();
						$account->retrieve($contact->account_id);

						//Get all records in that account if the relationship exists
						$seed_ids = $this->getIds($seed, $account, 'accounts', $seed_ids);

						//Get all contacts inside that account
						$contacts = $account->get_linked_beans('contacts', 'Contact');
						foreach ($contacts as $contact) {
							$seed_ids = $this->getIds($seed, $contact, 'contacts', $seed_ids);
						}

						//Get all member_of accounts
						$accounts = $account->get_linked_beans('members', 'Account');
						foreach ($accounts as $account) {
							//Get all records in that account if the relationship exists
							$seed_ids = $this->getIds($seed, $account, 'accounts', $seed_ids);

							//Get all contacts inside that account
							$contacts = $account->get_linked_beans('contacts', 'Contact');
							foreach ($contacts as $contact) {
								$seed_ids = $this->getIds($seed, $contact, 'contacts', $seed_ids);
							}
						}
						//taras: Remove own iportal user account_id and contact_id
						$filterById = '';
						if ($seed->object_name == 'Account') {
							$filterById = $iportal_acc_id;
						} else if ($seed->object_name == 'Contact') {
							$filterById = $removed_contact_id;
						}
						if (!empty($filterById)) {
							foreach ($seed_ids as $key => $val) {
								if ($filterById == $val) {
									unset($seed_ids[$key]);
									//break; might duplicate ids into array
								}
							}
						}
						//end taras
						break;
				}

				//Taras: filter by show_in_portal field and remove duplicates
				$seed_ids = $this->filterByShowInPortal($seed_ids, $seed);
				//end taras

				if (!empty($seed_ids)) {
					$filter = " {$seed->table_name}.id IN ('" . implode("', '", $seed_ids) . "')";
					$this->panel_definition['where'] .= $filter;
				} else {
					// RR - Shows empty list if the filter option is diferent of FILTER_BY_ACCOUNT, FILTER_BY_CONTACT or FILTER_BY_NONE
					if ($list_filter_option != FILTER_BY_NONE) {
						$this->panel_definition['where'] .= ' 1=2';
					}
				}
				//end Davi


				ACLField::listFilter($this->panel_definition ['list_fields'], $this->_instance_properties ['module'], $GLOBALS ['current_user']->id, true);
			}
			$this->load_module_info(); //load module info from the module's bean file.
		}
	}

	function load_sub_subpanels() {

		global $modListHeader;
		// added a check for security of tabs to see if an user has access to them
		// this prevents passing an "unseen" tab to the query string and pulling up its contents
		if (!isset($modListHeader)) {
			global $current_user;
			if (isset($current_user)) {
				$modListHeader = query_module_access_list($current_user);
			}
		}

		global $modules_exempt_from_availability_check;

		if (empty($this->sub_subpanels)) {
			$panels = $this->get_inst_prop_value('collection_list');
			foreach ($panels as $panel => $properties) {
				if (array_key_exists($properties ['module'], $modListHeader) or array_key_exists($properties ['module'], $modules_exempt_from_availability_check)) {
					$this->sub_subpanels [$panel] = new aIportalSubPanel($panel, $properties, $this->parent_bean);
				}
			}
		}
	}

	/**
	 * Return all contacts related to an object without give a relationship
	 * @param Object $seed
	 * @param Object $bean
	 * @param String $module_var contact or account
	 * @param Array $seed_ids array of pre-existing ids that should be merged
	 * @return Array ids that should be shown on listview
	 */
	function getIds($seed, $bean, $module_var, $seed_ids) {
		foreach ($seed->get_linked_fields() as $link) {

			if (isset($seed->$link['name']) && strtolower($seed->$link['name']->getRelatedTableName()) == $module_var) {
				$relationship = $link['relationship'];
				//TK - Fix for N-N relationships
				if (!property_exists($bean, $relationship)) {
					$relationship = $seed->table_name;
					//TK - Fix for account without children
					if (!property_exists($bean, $relationship)) {
						$relationship = $link['name'];
					}
				}

				// IF RELATIONSHIP EXISTS EXECUTE FUNCTION GET
				// Jose Sambrano
				if ($bean->load_relationship($relationship)) {
					$new_values = $bean->$relationship->get();
					$seed_ids = array_merge($seed_ids, $new_values);
				}
			}
		}

		return $seed_ids;
	}

	//Taras: filter records by show_in_portal_c field
	//not very well code for this thing, because "where" subpanel works bad with custom fields
	function filterByShowInPortal($seed_ids, $seed) {
		$new_seed_ids = array();
		foreach ($seed_ids as $value) {
			$myObject = clone $seed;
			$myObject->retrieve($value);
			if ($myObject->show_in_portal_c == '1' && !in_array($myObject->id, $new_seed_ids)) {
				$new_seed_ids[] = $myObject->id;
			}
		}
		return $new_seed_ids;
	}

	//end taras
}

;

class IportalSubPanelDefinitions extends SubPanelDefinitions {

	/**
	 * Enter description here...
	 *
	 * @param BEAN $focus - this is the bean you want to get the data from
	 * @param STRING $layout_def_key - if you wish to use a layout_def defined in the default metadata/subpaneldefs.php that is not keyed off of $bean->module_dir pass in the key here
	 * @param ARRAY $layout_def_override - if you wish to override the default loaded layout defs you pass them in here.
	 * @return SubPanelDefinitions
	 */
	function IportalSubPanelDefinitions($focus, $layout_def_key = '', $layout_def_override = '') {
		parent::SubPanelDefinitions($focus, $layout_def_key, $layout_def_override);
	}

	/**
	 * Load the definition of the a sub-panel.
	 * Also the sub-panel is added to an array of sub-panels.
	 * use of reload has been deprecated, since the subpanel is initialized every time.
	 */
	function load_subpanel($name, $reload = false, $original_only = false) {
		if (!is_dir('modules/' . $this->layout_defs ['subpanel_setup'][strtolower($name)] ['module']))
			return false;
		return new aIportalSubPanel($name, $this->layout_defs ['subpanel_setup'] [strtolower($name)], $this->_focus, $reload, $original_only);
	}

	/**
	 * Load the layout def file and associate the definition with a variable in the file.
	 */
	function open_layout_defs($reload = false, $layout_def_key = '', $original_only = false) {
		$layout_defs [$this->_focus->module_dir] = array();
		$layout_defs [$layout_def_key] = array();

		if (empty($this->layout_defs) || $reload || (!empty($layout_def_key) && !isset($layout_defs [$layout_def_key]))) {
			//Davi - Looking for subpaneldefs.php inside iportal modules dir
			if (file_exists('iportal/modules/' . $this->_focus->module_dir . '/metadata/subpaneldefs.php')) {
				require('iportal/modules/' . $this->_focus->module_dir . '/metadata/subpaneldefs.php');
			}
			// end Davi
			else {
				if (file_exists('modules/' . $this->_focus->module_dir . '/metadata/subpaneldefs.php'))
					require ('modules/' . $this->_focus->module_dir . '/metadata/subpaneldefs.php');

				if (!$original_only && file_exists('custom/modules/' . $this->_focus->module_dir . '/Ext/Layoutdefs/layoutdefs.ext.php'))
					require ('custom/modules/' . $this->_focus->module_dir . '/Ext/Layoutdefs/layoutdefs.ext.php');
			}

			if (!empty($layout_def_key))
				$this->layout_defs = $layout_defs [$layout_def_key];
			else
				$this->layout_defs = $layout_defs [$this->_focus->module_dir];
		}
	}

}

?>