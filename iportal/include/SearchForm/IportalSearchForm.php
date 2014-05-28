<?php

require_once("include/SearchForm/SearchForm.php");

class IportalSearchForm extends SearchForm {
	function IportalSearchForm($module, $seedBean, $tpl) {
		parent::SearchForm($module, $seedBean, $tpl);
		//Override serchfields var if we have one on portal
		if(file_exists('iportal/modules/' . $module . '/metadata/SearchFields.php')){
            require_once('iportal/modules/' . $module . '/metadata/SearchFields.php');
            $this->searchFields = $searchFields[$module];
        }
	}
}
?>