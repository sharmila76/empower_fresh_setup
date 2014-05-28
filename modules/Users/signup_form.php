<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

if(isset($_POST['signup_form'])){
        require_once "UserManagement.php";
        $usman=new UserManagement();
        $usman->createUser($_POST['email'],$_POST['password']);
        echo "User created";
        die();
}

