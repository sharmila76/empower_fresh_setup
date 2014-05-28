<?php

	echo get_module_title( 
		$mod_strings['LBL_MODULE_NAME'], 
		$mod_strings['LBL_MODULE_TITLE'],
		true 
		);

	include("modules/$currentModule/ListView.php");

?>

