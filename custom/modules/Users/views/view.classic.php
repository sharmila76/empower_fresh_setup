<?php 
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

require_once('include/MVC/View/views/view.detail.php'); 

class ACLRolesViewClassic extends ViewDetail { 


     function ACLRolesViewClassic(){ 
         parent::ViewDetail(); 
     } 
      
     function display(){ 
        $this->dv->process(); 
        echo '<style type="text/css">@import url("custom/include/css/bootstrap.min.css"); </style>'; 
      
        $file = SugarController::getActionFilename($this->action); 
        $this->includeClassicFile('modules/'. $this->module . '/'. $file . '.php'); 
     }      
} 

?>