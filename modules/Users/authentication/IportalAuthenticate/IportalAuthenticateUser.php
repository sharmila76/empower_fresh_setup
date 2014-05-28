<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/Users/authentication/SugarAuthenticate/SugarAuthenticateUser.php');

/**
 * This class handles the portal user session registration.
 * It's looks for a Portal User record in the database that matchs the
 * authentication info from the login form.
 * 
 * @author davi
 * @see modules/Users/authentication/SugarAuthenticate/SugarAuthenticateUser
 */
class IportalAuthenticateUser extends SugarAuthenticateUser {
	
	function authenticateUser($username, $password, $fallback=false) {
		global $db;
		$username = $db->quote($username);
		$password = $db->quote($password);
		$portal_user = new lg_PortalUser;
		$portal_user->retrieve_by_string_fields(array(
			'name' => $username,
			'password' => md5($password),
			'status' => 'active',
			'deleted' => '0',
		));
		
		return $portal_user->id;
	}
	
	/**
	 * This is the real login.
	 * 
	 * If exists a Portal User that matchs the username and password informed,
	 * login and register the session.
	 * 
	 * @see modules/Users/authentication/SugarAuthenticate/SugarAuthenticateUser#loadUserOnLogin($name, $password, $fallback)
	 */
	function loadUserOnLogin($username, $password, $fallback = false) {
		$user_id = $this->authenticateUser($username, $password, $fallback);
		if(!$user_id) {
			return false;
		}
		$this->loadUserOnSession($user_id);
		return true;
	}
	
	/**
	 * This method register the Portal User in the session.
	 * It also sets the global $current_user to the Sugar User indicated in iportal_config.php file
	 *
	 * @see modules/Users/authentication/SugarAuthenticate/SugarAuthenticateUser#loadUserOnSession($user_id)
	 */
	function loadUserOnSession($user_id='') {
		if(!empty($user_id)) {
			$_SESSION['authenticated_portal_user_id'] = $user_id;
		}
		
		if(!empty($_SESSION['authenticated_portal_user_id']) || !empty($user_id)) {
			global $current_portal_user, $current_user, $iportal_config;
			$current_portal_user = new lg_PortalUser;
			$current_portal_user->retrieve($user_id);
			$current_user = new User;
			$current_user->retrieve($iportal_config['default_user_id']);
			
			$this->checkIportalTimeZone();
			
			return true;
		}
		
		return false;
	}
	
	/**
	 * This will set the iportal default sugar user timezone if it was never used to log into sugar,
	 * therefore with no timezone, causing login errors in iportal.
	 * 
	 * @author TK
	 */
	function checkIportalTimeZone() {
		global $current_user, $iportal_config;
		//if the timezone is not set get from config, we can't get the admin pref at this time
		$ut = $GLOBALS['current_user']->getPreference('ut');
		if (!$ut) {
			$current_user->setPreference('timezone', $iportal_config['default_timezone']);
			$current_user->setPreference('ut', 1);
			$current_user->savePreferencesToDB();
		}
	}
}