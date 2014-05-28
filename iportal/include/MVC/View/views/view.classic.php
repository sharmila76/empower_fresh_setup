<?php

require_once('iportal/include/MVC/View/IportalView.php');
require_once('iportal/include/MVC/Controller/IportalController.php');

class ViewClassic extends IportalView{
 	function ViewClassic(){
 		parent::IportalView();
 		$this->type = $this->action;
 	}
 	
 	function display(){
 		// Call SugarController::getActionFilename to handle case sensitive file names
 		$file = IportalController::getActionFilename($this->action);
 	 	if(file_exists('iportal/modules/' . $this->module . '/'. $file . '.php')){
			$this->includeClassicFile('iportal/modules/'. $this->module . '/'. $file . '.php');
			return true;
		}elseif(file_exists('custom/modules/' . $this->module . '/'. $file . '.php')){
			$this->includeClassicFile('custom/modules/'. $this->module . '/'. $file . '.php');
			return true;
		}elseif(file_exists('modules/' . $this->module . '/'. $file . '.php')){
			$this->includeClassicFile('modules/'. $this->module . '/'. $file . '.php');
			return true;
		}
		return false;
 	}
}
?>
