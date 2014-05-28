<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/Users/authentication/SugarAuthenticate/SugarAuthenticate.php');


/**
 * This is the classes used by the AuthenticationController to handle de authentication process
 * for the Iportal.
 * 
 * @author davi
 * @see modules/Users/authentication/SugarAuthenticate/SugarAuthenticate.php
 * @see modules/Users/authentication/AuthenticationController.php
 */
class IportalAuthenticate extends SugarAuthenticate {
	var $userAuthenticateClass = 'IportalAuthenticateUser';
	var $authenticationDir = 'IportalAuthenticate';
	
	function IportalAuthenticate(){
		parent::SugarAuthenticate();
	}
	
	function loginAuthenticate($name, $password, $fallback=false) {
		global $mod_strings;
		
		if ($this->userAuthenticate->loadUserOnLogin($name, $password, $fallback)) {
			return $this->postLoginAuthenticate();	
		}
		
		$_SESSION['login_error'] = $mod_strings['ERR_INVALID_PASSWORD'];
		
		return false;
	}
	
	/**
	 * @see modules/Users/authentication/SugarAuthenticate/SugarAuthenticate#sessionAuthenticate()
	 */
	function sessionAuthenticate() {
		global $current_portal_user;
		if(isset($_SESSION['authenticated_portal_user_id']) && !empty($_SESSION['authenticated_portal_user_id'])) {
			$current_portal_user = new lg_PortalUser; 
			$current_portal_user->retrieve_by_string_fields(array('id' => $_SESSION['authenticated_portal_user_id']));
			return true;
		}
		
		/**
		 * Place login redirect code here
		 */
		
		return false;
	}
	
	/**
	 * @see modules/Users/authentication/SugarAuthenticate/SugarAuthenticate#logout()
	 */
	function logout() {
		global $current_portal_user;
		unset($current_portal_user);
		session_unregister('authenticated_portal_user_id');
	}
}	
