<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
require_once("include/OutboundEmail/OutboundEmail.php");

class EmailsController extends SugarController {

    protected function action_sendbulkmail() {
        $this->view = 'bulkmail';
        //SugarApplication::redirect("index.php?module=Users&record=".$_REQUEST['record']."&action=DetailView"); //bug 48170]
    }

}

?>
