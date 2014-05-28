<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

//require_once('modules/Users/Forms.php');
//require_once('modules/Configurator/Configurator.php');

class ViewErrorlog extends SugarView {

  public function preDisplay() {
    global $current_user;

    if (!is_admin($current_user)) {
      sugar_die("Unauthorized access to administration.");
    }
  }

  public function display() {
    parent::display();
    //display log file on the browser. So that the admin can identify an error.
    $fileName = 'sugarcrm.log';
    $file = fopen($fileName,"r") or exit("Unable to open file!");
    //TODO: display errors as formatted on the browser.
    echo '<table>';
    echo '<tr>';
    echo '<th>Date';
    echo '</th>';
    echo '<th>Time';
    echo '</th>';
    echo '<th>Error num and Type';
    echo '</th>';
    echo '<th>Error Description';
    echo '</th>';
    echo '</tr>';  
    while(!feof($file)) {
      $each_line = fgets($file);
      $seperate_by_space = explode(" ", $each_line, 4);
      echo '<tr>';
      echo '<td>' . $seperate_by_space[0];
      echo '</td>';
      echo '<td>' . $seperate_by_space[1];
      echo '</td>';
      echo '<td>' . $seperate_by_space[2];
      echo '</td>';
      echo '<td>' . $seperate_by_space[3];
      echo '</td>';
      echo '</tr>';     
    }
    echo '</table>'; 
  }

}
