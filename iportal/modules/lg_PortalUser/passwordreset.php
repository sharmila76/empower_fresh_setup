<?php



class PasswordReset{

    function redireccionar(){
   global $mod_strings;
        $sugar_smarty = new Sugar_Smarty();
        $sugar_smarty->assign('MOD', $mod_strings);
   

$sugar_smarty->display('iportal/modules/lg_PortalUser/tpls/passwordreset.tpl');
    }
}
?>
