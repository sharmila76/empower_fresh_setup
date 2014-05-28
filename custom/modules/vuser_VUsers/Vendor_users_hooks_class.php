<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

class Vendor_users_hooks_class {

  protected static $fetchedRow = array();

  public function saveFetchedRow(&$bean, $event, $arguments) {
    if (!empty($bean->id)) {
      //TODO: displaying an error when editing. should solve this.
      self::$fetchedRow[$bean->id] += $bean->fetched_row;
    }
  }

  public function send_email_to_users(&$bean, $event, $arguments) {
    require_once 'custom/include/krumo/class.krumo.php';
    krumo(get_select_options_with_id());
    // call on changed records only
    if (isset(self::$fetchedRow[$id]) && $this->fieldname != self::$fetchedRow[$id]['fieldname']) {
      //TODO: write update query here.
    }
    // call on new records only
    if (!isset(self::$fetchedRow[$id])) {
      global $current_user;
      //save user details
      require_once('modules/Users/User.php');
      $u = new User();
      $u->last_name = $bean->last_name;
      $u->first_name = $bean->first_name;
      $u->user_name = $bean->user_name;
      //TODO: Add title and department if needed
      //$u->title = 'VP Sales';
      //$u->department = 'VP Sales';
      $u->status = $bean->status;
      $u->employee_status = 'Active';
      $u->user_password = $u->encrypt_password('test');
      $u->user_hash = strtolower(md5('test'));
      $u->email1 = $bean->email1;
      $u->save();

      //Send mail to the user with the account creation details.
      require_once('include/SugarPHPMailer.php');
      //$defaults = $emailObj->getSystemDefaultEmail();
      $mail = new SugarPHPMailer();
      $mail->setMailerForSystem();
      $mail->From = $current_user->email1;
      $mail->FromName = $current_user->name;
      $mail->Subject = 'Account creation details';
      $body = 'Hi, ' . $bean->last_name . "\r\n";
      $body .= 'Your login credentials are, Please login' . "\r\n";
      $body .= 'Username: ' . $bean->user_name . "\r\n";
      $body .= 'Password: test';
      $mail->Body = $body;
      $mail->prepForOutbound();
      $mail->AddAddress($bean->email1);
      $mail->Send();
      //$GLOBALS['log']->info( "Value 3: ". $field3); 
    }
  }
}



?>