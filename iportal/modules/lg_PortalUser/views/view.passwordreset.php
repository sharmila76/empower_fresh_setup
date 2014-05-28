<?php
require_once('iportal/include/MVC/View/IportalView.php');

class lg_PortalUserViewPasswordReset extends IportalView {

	function preDisplay() {
		//var_dump($this);
	}
        function display(){
            include_once('iportal/modules/lg_PortalUser/passwordreset.php');
                                                $redirect=new PasswordReset();
                                                $redirect->redireccionar();
            
        }
}

?>
