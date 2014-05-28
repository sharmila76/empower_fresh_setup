<?php
/**
 * File: simpleRest.php
 * Project: callinize-sugarcrm
 * User: blake, http://www.blakerobertson.com
 * Date: 9/24/13
 * Time: 4:52 PM
 */

require_once("../sugar_rest.php");

//$rc = new Sugar_REST("http://localhost/sugarcrmce3/custom/service/callinize/rest.php","admin","adF32wjkh");
$rc = new Sugar_REST("http://ec2-54-215-212-106.us-west-1.compute.amazonaws.com/custom/service/callinize/rest.php","patrick","CdhVcwkb4yyg");

print_r($rc);

$params = array();
$params['phone_number'] = "4102152497";
$params['module_order'] = "accounts,contacts";
$params['stop_on_find'] = false;

$beans = $rc->custom_method("find_beans_with_phone_number", $params);

print_r($beans);
