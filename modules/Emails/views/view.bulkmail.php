<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

//require_once('modules/Users/Forms.php');
//require_once('modules/Configurator/Configurator.php');

class ViewBulkmail extends SugarView {

  public function display() {
    $this->ss->assign("USERS_LIST", $this->get_all_users());
    //TODO: While submitting mail users using jquery or javascript.
    if (!empty($_REQUEST['send_mail'])) {
      //send mail to selected users.      
      foreach ($_POST['users'] as $user_id) {
        require_once('include/SugarPHPMailer.php');
        global $current_user;
        //$defaults = $emailObj->getSystemDefaultEmail();
        $mail = new SugarPHPMailer();
        $mail->setMailerForSystem();
        $mail->From = $current_user->emil1;
        $mail->FromName = $current_user->name;
        $mail->Subject = $_POST['subject'];
        
        //select user Email from email_addresses table.
        $q = "SELECT ea.email_address, u.last_name
              FROM users u, email_addr_bean_rel eabr, email_addresses ea
              WHERE eabr.bean_module =  'Users'
              AND eabr.bean_id = u.id
              AND ea.id = eabr.email_address_id
              AND u.id =  '" . $user_id . "'";
        $result = $GLOBALS['db']->query($q);
        while ($row = $GLOBALS['db']->fetchByAssoc($result)) {
          $user_email = $row['email_address'];
          $user_name = $row['last_name']; 
        }
        //print $user_name;
        $body = 'Hi, ' . $user_name . "\r\n";
        $body .= $_POST['send_mail_text'];
        $body .= 'Regards, ' . $current_user->name . "\r\n";
        $mail->Body = $body;
        $mail->prepForOutbound();
        $mail->AddAddress($user_email);
        if($mail->Send()) {
          echo 'Mail has been Sent Successfully to the user ' . $user_name . '</br>';
        }        
      }
    }
    $this->ss->display($this->getCustomFilePathIfExists('modules/Emails/templates/bulkmail.tpl'));
  }

  function get_all_users() {
    global $current_user;
    $q = "SELECT u.id, u.user_name, u.last_name FROM users u";
    $entries = array();
    $res = $GLOBALS['db']->query($q);
    while ($row = $GLOBALS['db']->fetchByAssoc($res)) {
      $entries[] = $row;
    }
    if ($entries) {
      return $entries;
    } else {
      return FALSE;
    }
  }

}
