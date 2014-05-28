<?php
define('FILTER_BY_ACCOUNT', 'account');
define('FILTER_BY_CONTACT', 'contact');
define('FILTER_BY_NONE', 'none');
//FILTER_BY_PARENT

$iportal_config = array (
	//put here the id of the sugar user that will be used for the portal
	'default_user_id' => '7782316a-abdc-2e11-7a99-4cc150e515a6',
	'default_theme' => 'Sugar5',   //ONLY THEME OF SUGAR5
	'default_language' => 'en_us',
	'default_timezone' => 'America/Sao_Paulo',  //If the default_user_id don't have a timezone set use this one, Check include/timezones/timezones.php


	'list_filter_options' => array (
		'default' => FILTER_BY_CONTACT,
		/*'Cases' => array(
			'Customer' => FILTER_BY_CONTACT,
			'Manager' => FILTER_BY_ACCOUNT,
			'Partner' => FILTER_BY_PARENT,
		),*/
	),
);
?>
