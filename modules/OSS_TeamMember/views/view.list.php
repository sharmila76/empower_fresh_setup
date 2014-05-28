<?php 

require_once('include/MVC/View/views/view.list.php'); 
require_once('modules/OSS_TeamMember/OSS_TeamMemberListViewSmarty.php');  

class OSS_TeamMemberViewList extends ViewList {          
                  function OSS_TeamMemberViewList(){                 
                                    parent::ViewList();        
                  }          

                 function preDisplay(){
                                    $this->lv = new OSS_TeamMemberListViewSmarty();                
                 }
}  
?> 
