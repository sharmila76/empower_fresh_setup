<?php
	global $sugar_config;
        if(file_exists('sugar_versions')){
        include_once('sugar_version');
        }
	$sugar_smarty = new Sugar_Smarty();
	$sugar_smarty->assign('MOD', $mod_strings);
	$sugar_smarty->assign('APP', $app_strings);

	echo '<link rel="stylesheet" type="text/css" media="all" href="iportal/modules/lg_PortalUser/login.css">';
	echo '<script type="text/javascript" src="iportal/modules/lg_PortalUser/login.js"></script>';
	if(isset($_SESSION['login_error'])) {
		$sugar_smarty->assign('LOGIN_ERROR', $_SESSION['login_error']);
	}
	if( isset($_REQUEST['password_changed_msg']) && !empty($_REQUEST['password_changed_msg']) ) {
		$sugar_smarty->assign('PASSWORD_CHANGED', $_REQUEST['password_changed_msg']);
	} else {
		$sugar_smarty->assign('PASSWORD_CHANGED', false);
	}
	$sugar_smarty->assign('SITE_URL', $sugar_config['site_url']);
	$sugar_smarty->assign('LOGIN_MODULE', $_REQUEST['login_module']);
	$sugar_smarty->assign('LOGIN_ACTION', $_REQUEST['login_action']);
	$sugar_smarty->assign('LOGIN_RECORD', $_REQUEST['login_record']);



        /*Jose Sambrano */
        // 

         $logo="<IMG src=\"include/images/sugar_md.png\" alt=\"\" width=\"340\" height=\"25\">";

          



        $sugar_smarty->assign('LOGO', $logo);
	$sugar_smarty->display('iportal/modules/lg_PortalUser/login.tpl');