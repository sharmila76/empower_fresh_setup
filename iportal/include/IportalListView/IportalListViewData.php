<?php

if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once('include/ListView/ListViewData.php');
require_once('iportal/include/IportalEditView/IportalVCR.php');

class IportalListViewData extends ListViewData {

	var $additionalDetails = true;
	var $listviewName = null;
	var $additionalDetailsAllow = null;
	var $additionalDetailsAjax = true; // leave this true when using filter fields
	var $additionalDetailsFieldToAdd = 'NAME'; // where the span will be attached to
	var $base_url = null;
	/*
	 * If you want overwrite the query for the count of the listview set this to your query
	 * otherwise leave it empty and it will use SugarBean::create_list_count_query
	 */
	var $count_query = '';

	function getBaseURL() {
		global $beanList;
		if (empty($this->base_url)) {
			$blockVariables = array('mass', 'uid', 'massupdate', 'delete', 'merge', 'selectCount', $this->var_order_by, $this->var_offset, 'lvso', 'sortOrder', 'orderBy', 'request_data', 'current_query_by_page');
			//$base_url = 'index.php?';
			$base_url = 'iportal.php?';
			foreach ($beanList as $bean) {
				$blockVariables[] = 'Home2_' . strtoupper($bean) . '_ORDER_BY';
			}
			$blockVariables[] = 'Home2_CASE_ORDER_BY';
			foreach (array_merge($_POST, $_GET) as $name => $value) {
				if (!in_array($name, $blockVariables)) {
					if (is_array($value)) {
						foreach ($value as $v) {
							$base_url .= $name . urlencode('[]') . '=' . urlencode($v) . '&';
						}
					} else {
						$base_url .= $name . '=' . urlencode($value) . '&';
					}
				}
			}
			$this->base_url = $base_url;
		}
		return $this->base_url;
	}

	function getListViewData($seed, $where, $offset=-1, $limit = -1, $filter_fields=array(), $params=array(), $id_field = 'id') {
		global $current_user, $current_portal_user, $iportal_config, $currentModule;
		IportalVCR::erase($seed->module_dir);
		$this->seed = & $seed;
		$totalCounted = empty($GLOBALS['sugar_config']['disable_count_query']);
		$_SESSION['MAILMERGE_MODULE_FROM_LISTVIEW'] = $seed->module_dir;
		if (empty($_REQUEST['action']) || $_REQUEST['action'] != 'Popup') {
			$_SESSION['MAILMERGE_MODULE'] = $seed->module_dir;
		}

		$this->setVariableName($seed->object_name, $where, $this->listviewName);

		$this->seed->id = '[SELECT_ID_LIST]';

		// if $params tell us to override all ordering
		if (!empty($params['overrideOrder']) && !empty($params['orderBy'])) {
			$order = $this->getOrderBy(strtolower($params['orderBy']), (empty($params['sortOrder']) ? '' : $params['sortOrder'])); // retreive from $_REQUEST
		} else {
			$order = $this->getOrderBy(); // retreive from $_REQUEST
		}

		// else use stored preference
		$userPreferenceOrder = $current_user->getPreference('listviewOrder', $this->var_name);

		if (empty($order['orderBy']) && !empty($userPreferenceOrder)) {
			$order = $userPreferenceOrder;
		}
		// still empty? try to use settings passed in $param
		if (empty($order['orderBy']) && !empty($params['orderBy'])) {
			$order['orderBy'] = $params['orderBy'];
			$order['sortOrder'] = (empty($params['sortOrder']) ? '' : $params['sortOrder']);
		}

		//rrs - bug: 21788. Do not use Order by stmts with fields that are not in the query.
		// Bug 22740 - Tweak this check to strip off the table name off the order by parameter.
		// Samir Gandhi : Do not remove the report_cache.date_modified condition as the report list view is broken
		$orderby = $order['orderBy'];
		if (strpos($order['orderBy'], '.') && ($order['orderBy'] != "report_cache.date_modified"))
			$orderby = substr($order['orderBy'], strpos($order['orderBy'], '.') + 1);
		if (!in_array($orderby, array_keys($filter_fields))) {
			$order['orderBy'] = '';
			$order['sortOrder'] = '';
		}

		if (empty($order['orderBy'])) {
			$orderBy = '';
		} else {
			$orderBy = $order['orderBy'] . ' ' . $order['sortOrder'];
			//wdong, Bug 25476, fix the sorting problem of Oracle.
			if (isset($params['custom_order_by_override']['ori_code']) && $order['orderBy'] == $params['custom_order_by_override']['ori_code'])
				$orderBy = $params['custom_order_by_override']['custom_code'] . ' ' . $order['sortOrder'];
		}

		if (empty($params['skipOrderSave'])) // don't save preferences if told so
			$current_user->setPreference('listviewOrder', $order, 0, $this->var_name); // save preference

			$ret_array = $seed->create_new_list_query($orderBy, $where, $filter_fields, $params, 0, '', true, $seed, true);

		// BEGIN Davi and Ronaldo
		// Show records if this module has any relation with Contacts module.
		//echo $current_user->user_id;
		$list_filter_option = $iportal_config['list_filter_options']['default'];
		if (isset($iportal_config['list_filter_options'][$currentModule][$current_portal_user->getRoleName()])) {
			$list_filter_option = $iportal_config['list_filter_options'][$currentModule][$current_portal_user->getRoleName()];
		}

		//taras
		//echo $list_filter_option;

		$contacts = $current_portal_user->get_linked_beans('contacts_lg_portaluser', 'Contact');
		$contact = $contacts[0];
		$removed_contact_id = $contact->id;
        $iportal_acc_id= $contact->account_id; //taras: real iportal account_id

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
                $filterById='';
                if ($seed->object_name=='Account') {
                    $filterById= $iportal_acc_id;
                }
                else if ($seed->object_name=='Contact') {
                   $filterById= $removed_contact_id;
                }
                if (!empty($filterById)) {
                  foreach($seed_ids as $key => $val) {
                     if ($filterById==$val) {
                       unset($seed_ids[$key]);
                       //break; might duplicate ids into array
                     }
                  }
                }
               //end taras
			   break;
		}

		if (!empty($seed_ids)) {
			$filter = " AND {$seed->table_name}.id IN ('" . implode("', '", $seed_ids) . "')";
			$ret_array['where'] .= $filter;
		} else {
			// RR - Shows empty list if the filter option is diferent of FILTER_BY_ACCOUNT, FILTER_BY_CONTACT or FILTER_BY_NONE
			if ($list_filter_option != FILTER_BY_NONE) {
				$ret_array['where'] .= ' AND 1=2';
			}
		}
		// END Davi and Ronaldo

		if (!is_array($params))
			$params = array();
		if (!isset($params['custom_select']))
			$params['custom_select'] = '';
		if (!isset($params['custom_from']))
			$params['custom_from'] = '';
		if (!isset($params['custom_where']))
			$params['custom_where'] = '';
		if (!isset($params['custom_order_by']))
			$params['custom_order_by'] = '';
		$main_query = $ret_array['select'] . $params['custom_select'] . $ret_array['from'] . $params['custom_from'] . $ret_array['where'] . $params['custom_where'] . $ret_array['order_by'] . $params['custom_order_by'];

		//C.L. - Fix for 23461
		if (empty($_REQUEST['action']) || $_REQUEST['action'] != 'Popup') {
			$_SESSION['export_where'] = $ret_array['where'];
		}
		if ($limit < -1) {
			$result = $this->db->query($main_query);
		} else {
			if ($limit == -1) {
				$limit = $this->getLimit();
			}
			$offset = $this->getOffset();
			if (strcmp($offset, 'end') == 0) {
				$totalCount = $this->getTotalCount($main_query);
				$offset = (floor(($totalCount - 1) / $limit)) * $limit;
			}
			if ($this->seed->ACLAccess('ListView')) {
				$result = $this->db->limitQuery($main_query, $offset, $limit + 1);
			} else {
				$result = array();
			}
		}

		$data = array();

		if (version_compare(phpversion(), '5.0') < 0) {
			$temp = $seed;
		} else {
			$temp = @clone($seed);
		}
		$rows = array();
		$count = 0;
		$idIndex = array();
		while ($row = $this->db->fetchByAssoc($result)) {
			if ($count < $limit) {
				if (empty($id_list)) {
					$id_list = '(';
				} else {
					$id_list .= ',';
				}
				$id_list .= '\'' . $row[$id_field] . '\'';
				//handles date formating and such
				$idIndex[$row[$id_field]][] = count($rows);
				$rows[] = $row;
			}
			$count++;
		}
		if (!empty($id_list))
			$id_list .= ')';

		IportalVCR::store($this->seed->module_dir, $main_query);
		if ($count != 0) {
			//NOW HANDLE SECONDARY QUERIES
			if (!empty($ret_array['secondary_select'])) {
				$secondary_query = $ret_array['secondary_select'] . $ret_array['secondary_from'] . ' WHERE ' . $this->seed->table_name . '.id IN ' . $id_list;
				$secondary_result = $this->db->query($secondary_query);
				while ($row = $this->db->fetchByAssoc($secondary_result)) {
					foreach ($row as $name => $value) {
						//add it to every row with the given id
						foreach ($idIndex[$row['ref_id']] as $index) {
							$rows[$index][$name] = $value;
						}
					}
				}
			}

			// retrieve parent names
			if (!empty($filter_fields['parent_name']) && !empty($filter_fields['parent_id']) && !empty($filter_fields['parent_type'])) {
				foreach ($idIndex as $id => $rowIndex) {
					if (!isset($post_retrieve[$rows[$rowIndex[0]]['parent_type']])) {
						$post_retrieve[$rows[$rowIndex[0]]['parent_type']] = array();
					}
					if (!empty($rows[$rowIndex[0]]['parent_id']))
						$post_retrieve[$rows[$rowIndex[0]]['parent_type']][] = array('child_id' => $id, 'parent_id' => $rows[$rowIndex[0]]['parent_id'], 'parent_type' => $rows[$rowIndex[0]]['parent_type'], 'type' => 'parent');
				}
				if (isset($post_retrieve)) {
					$parent_fields = $seed->retrieve_parent_fields($post_retrieve);
					foreach ($parent_fields as $child_id => $parent_data) {
						//add it to every row with the given id
						foreach ($idIndex[$child_id] as $index) {
							$rows[$index]['parent_name'] = $parent_data['parent_name'];
						}
					}
				}
			}

			$pageData = array();

			$additionalDetailsAllow = $this->additionalDetails && $this->seed->ACLAccess('DetailView') && (file_exists('modules/' . $this->seed->module_dir . '/metadata/additionalDetails.php') || file_exists('custom/modules/' . $this->seed->module_dir . '/metadata/additionalDetails.php'));
			if ($additionalDetailsAllow)
				$pageData['additionalDetails'] = array();
			$additionalDetailsEdit = $this->seed->ACLAccess('EditView');
			reset($rows);
			while ($row = current($rows)) {
				if (version_compare(phpversion(), '5.0') < 0) {
					$temp = $seed;
				} else {
					$temp = @clone($seed);
				}
				$dataIndex = count($data);

				$temp->setupCustomFields($temp->module_dir);
				$temp->loadFromRow($row);
				if ($idIndex[$row[$id_field]][0] == $dataIndex) {
					$pageData['tag'][$dataIndex] = $temp->listviewACLHelper();
				} else {
					$pageData['tag'][$dataIndex] = $pageData['tag'][$idIndex[$row[$id_field]][0]];
				}
				$data[$dataIndex] = $temp->get_list_view_data($filter_fields);

				if ($temp->bean_implements('ACL')) {
					ACLField::listFilter($data[$dataIndex], $temp->module_dir, $GLOBALS['current_user']->id, $temp->isOwner($GLOBALS['current_user']->id));
				}

				if ($additionalDetailsAllow) {
					if ($this->additionalDetailsAjax) {
						$ar = $this->getAdditionalDetailsAjax($data[$dataIndex]['ID']);
					} else {
						$additionalDetailsFile = 'modules/' . $this->seed->module_dir . '/metadata/additionalDetails.php';
						if (file_exists('custom/modules/' . $this->seed->module_dir . '/metadata/additionalDetails.php')) {
							$additionalDetailsFile = 'custom/modules/' . $this->seed->module_dir . '/metadata/additionalDetails.php';
						}
						require_once($additionalDetailsFile);
						$ar = $this->getAdditionalDetails($data[$dataIndex],
										(empty($this->additionalDetailsFunction) ? 'additionalDetails' : $this->additionalDetailsFunction) . $this->seed->object_name,
										$additionalDetailsEdit);
					}
					$pageData['additionalDetails'][$dataIndex] = $ar['string'];
					$pageData['additionalDetails']['fieldToAddTo'] = $ar['fieldToAddTo'];
				}
				next($rows);
			}
		}
		$nextOffset = -1;
		$prevOffset = -1;
		$endOffset = -1;
		if ($count > $limit) {
			$nextOffset = $offset + $limit;
		}

		if ($offset > 0) {
			$prevOffset = $offset - $limit;
			if ($prevOffset < 0

				)$prevOffset = 0;
		}
		$totalCount = $count + $offset;

		if ($count >= $limit && $totalCounted) {
			$totalCount = $this->getTotalCount($main_query);
		}
		IportalVCR::recordIDs($this->seed->module_dir, array_keys($idIndex), $offset, $totalCount);
		$endOffset = (floor(($totalCount - 1) / $limit)) * $limit;
		$pageData['ordering'] = $order;
		$pageData['ordering']['sortOrder'] = $this->getReverseSortOrder($pageData['ordering']['sortOrder']);
		$pageData['urls'] = $this->generateURLS($pageData['ordering']['sortOrder'], $offset, $prevOffset, $nextOffset, $endOffset, $totalCounted);
		$pageData['offsets'] = array('current' => $offset, 'next' => $nextOffset, 'prev' => $prevOffset, 'end' => $endOffset, 'total' => $totalCount, 'totalCounted' => $totalCounted);
		$pageData['bean'] = array('objectName' => $seed->object_name, 'moduleDir' => $seed->module_dir);
		$pageData['stamp'] = $this->stamp;
		$pageData['access'] = array('view' => $this->seed->ACLAccess('DetailView'), 'edit' => $this->seed->ACLAccess('EditView'));
		$pageData['idIndex'] = $idIndex;
		if (!$this->seed->ACLAccess('ListView')) {
			$pageData['error'] = 'ACL restricted access';
		}

		return array('data' => $data, 'pageData' => $pageData);
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

}
