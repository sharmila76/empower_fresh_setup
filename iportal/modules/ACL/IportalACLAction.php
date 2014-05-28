<?php
/**
 * This class extends ACLAction, handling access permissions based on Portal User selected role.
 * 
 * Inside portal, all actions are disabled by default. This way, "Not Set" is the same as "None".
 *  
 * @author davi
 */
class IportalACLAction extends ACLAction {
	
	function IportalACLAction() {
		parent::ACLAction();
	}
		
	function getUserActions($user_id, $refresh=false, $category='',$type='', $action='') {
		global $current_portal_user, $app_strings;
		//check in the session if we already have it loaded
		if(!$refresh && !empty($_SESSION['ACL'][$user_id])){
			if(empty($category) && empty($action)){
				return $_SESSION['ACL'][$user_id];
			}else{
				if(!empty($category) && isset($_SESSION['ACL'][$user_id][$category])){
					if(empty($action)){
						if(empty($type)){
							return $_SESSION['ACL'][$user_id][$category];
						}
						return $_SESSION['ACL'][$user_id][$category][$type];
					}else if(!empty($type) && isset($_SESSION['ACL'][$user_id][$category][$type][$action])){
						return $_SESSION['ACL'][$user_id][$category][$type][$action];
					}
				}
			}
		}
		//if we don't have it loaded then lets check against the db
		$additional_where = '';
		$db = DBManagerFactory::getInstance();
		if(!empty($category)){
			$additional_where .= " AND $this->table_name.category = '$category' ";
		}
		if(!empty($action)){
			$additional_where .= " AND $this->table_name.name = '$action' ";
		}
		if(!empty($type)){
			$additional_where .= " AND $this->table_name.acltype = '$type' ";
		}
        $query=null;
        if ($db->dbType == 'oci8') {
        }
        if (empty($query)) {
            $query = "SELECT acl_actions .*, acl_roles_actions.access_override 
                    FROM acl_actions 
                    LEFT JOIN acl_roles_users ON acl_roles_users.user_id = '$user_id' AND  acl_roles_users.deleted = 0
                    LEFT JOIN acl_roles_actions ON acl_roles_actions.role_id = acl_roles_users.role_id AND acl_roles_actions.action_id = acl_actions.id AND acl_roles_actions.deleted=0
                    WHERE acl_actions.deleted=0 AND acl_roles_actions.role_id = '{$current_portal_user->role}' $additional_where ORDER BY category,name";
        }
        
		$result = $db->query($query);
		$selected_actions = array();
		while($row = $db->fetchByAssoc($result) ){
			$acl = new IportalACLAction();
			$isOverride  = false;
			$acl->populateFromRow($row);
			
			if(!empty($row['access_override'])){
				$acl->aclaccess = $row['access_override'];
				$isOverride = true;
			} else  { 
				// Davi - Here we force Not Set (an empty access_override), to work like None
				// This way, all actions are disabled by default
				$acl->aclaccess = ACL_ALLOW_NONE;
			}
			if(!isset($selected_actions[$acl->category])){
				$selected_actions[$acl->category] = array();
				
			}
			if(!isset($selected_actions[$acl->category][$acl->acltype][$acl->name]) 
				|| ($selected_actions[$acl->category][$acl->acltype][$acl->name]['aclaccess'] > $acl->aclaccess 
					 && $isOverride
					) 
				|| 
					(!empty($selected_actions[$acl->category][$acl->acltype][$acl->name]['isDefault']) 
					&& $isOverride
					)
				) 
			{
				
				
				$selected_actions[$acl->category][$acl->acltype][$acl->name] = $acl->toArray();
				$selected_actions[$acl->category][$acl->acltype][$acl->name]['isDefault'] = !$isOverride;
			}
			
		}
		
		//only set the session variable if it was a full list;
		if(empty($category) && empty($action)){
			if(!isset($_SESSION['ACL'])){
				$_SESSION['ACL'] = array();
			}
			$_SESSION['ACL'][$user_id] = $selected_actions;
		}else{
			if(empty($action) && !empty($category)){
				if(!empty($type)){
					$_SESSION['ACL'][$user_id][$category][$type] = $selected_actions[$category][$type];}
				$_SESSION['ACL'][$user_id][$category] = $selected_actions[$category];
			}else{
				if(!empty($action) && !empty($category) && !empty($type)){
				$_SESSION['ACL'][$user_id][$category][$type][$action] = $selected_actions[$category][$action];
				
			}
			}
		}
		
		if(empty($selected_actions)) {
			$auth_controller = new AuthenticationController('IportalAuthenticate');
			$auth_controller->logout();
			sugar_die($app_strings['ERR_NO_PERMISSION']);
		}
		return $selected_actions;
	}
	
	function userHasAccess($user_id, $category, $action,$type='module', $is_owner = false){
	    global $current_user;
	    if(is_admin_for_module($current_user,$category)&& !isset($_SESSION['ACL'][$user_id][$category][$type][$action]['aclaccess'])){          
        return true;   
        }
        //check if we don't have it set in the cache if not lets reload the cache
		if(IportalACLAction::getUserAccessLevel($user_id, $category, 'access', $type) < ACL_ALLOW_ENABLED) return false;
		if(empty($_SESSION['ACL'][$user_id][$category][$type][$action])){
			IportalACLAction::getUserActions($user_id, false);
		}
		
		if(!empty($_SESSION['ACL'][$user_id][$category][$type][$action])){
			return IportalACLAction::hasAccess($is_owner, $_SESSION['ACL'][$user_id][$category][$type][$action]['aclaccess']);
		}
		return false;
		
	}
	
	function getUserAccessLevel($user_id, $category, $action,$type='module'){
		if(empty($_SESSION['ACL'][$user_id][$category][$type][$action])){
			IportalACLAction::getUserActions($user_id, false);
			
		}
		if(!empty($_SESSION['ACL'][$user_id][$category][$type][$action])){
			return  $_SESSION['ACL'][$user_id][$category][$type][$action]['aclaccess'];
		}
	}
	
	function userNeedsOwnership($user_id, $category, $action,$type='module'){
		//check if we don't have it set in the cache if not lets reload the cache
		
		if(empty($_SESSION['ACL'][$user_id][$category][$type][$action])){
			IportalACLAction::getUserActions($user_id, false);
			
		}
		
		if(!empty($_SESSION['ACL'][$user_id][$category][$type][$action])){
			return $_SESSION['ACL'][$user_id][$category][$type][$action]['aclaccess'] == ACL_ALLOW_OWNER;
		}
		return false;
		
	}
}