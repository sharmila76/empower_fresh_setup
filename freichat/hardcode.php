<?php
/* Data base details */
$dsn='mysql:host=localhost;dbname=ecsiapps_ecsicrmdev'; //DSN
$db_user='root'; //DB username
$db_pass='foyer'; //DB password    
$driver='Sugarcrm'; //Integration driver
$db_prefix=''; //prefix used for tables in database
$uid='535de837c55b5'; //Any random unique number

$PATH = 'freichat/'; // Use this only if you have placed the freichat folder somewhere else
$installed=true; //make it false if you want to reinstall freichat
$admin_pswd='sharmila'; //backend password 

$debug = false;
$custom_error_handling='NO'; // used during custom installation

$use_cookie=false;

/* email plugin */
$smtp_username = '';
$smtp_password = '';

$force_load_jquery = 'NO';

/* Custom driver */
$usertable='login'; //specifies the name of the table in which your user information is stored.
$row_username='root'; //specifies the name of the field in which the user's name/display name is stored.
$row_userid='loginid'; //specifies the name of the field in which the user's id is stored (usually id or userid)
$avatar_field_name = 'avatar';