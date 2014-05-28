<?php
require_once('iportal/include/MVC/Controller/IportalController.php');
require_once('include/MVC/Controller/ControllerFactory.php');

class IportalControllerFactory extends ControllerFactory {
	
	function IportalControllerFactory() {
		parent::ControllerFactory();
	}
	
	function getController($module){
		$class = ucfirst($module).'Controller';
		$customClass = 'Custom' . $class;
//BEGIN TK ADD - Portal dir reference
		if(file_exists('iportal/modules/'.$module.'/controller.php')) {
			require_once('iportal/modules/'.$module.'/controller.php');
			if(class_exists($customClass)){
				$controller = new $customClass();
			}else if(class_exists($class)){
				$controller = new $class();
			}
//END TK ADD - Portal dir reference
		}
		/*elseif(file_exists('custom/modules/'.$module.'/controller.php')){
			require_once('custom/modules/'.$module.'/controller.php');
			if(class_exists($customClass)){
				$controller = new $customClass();
			}else if(class_exists($class)){
				$controller = new $class();
			}
		}
		elseif(file_exists('modules/'.$module.'/controller.php')){		
			require_once('modules/'.$module.'/controller.php');
			if(class_exists($customClass)){
				$controller = new $customClass();
			}else if(class_exists($class)){
				$controller = new $class();
			}
		}*/
		else{
			if(file_exists('custom/include/MVC/Controller/SugarController.php')){
				require_once('custom/include/MVC/Controller/SugarController.php');
			}
			if(class_exists('CustomSugarContrller')){
				$controller = new CustomSugarContrller();
			}else{
				//TK CHANGE - Portal reference
				$controller = new IportalController();
			}
		}
		//setup the controller
		$controller->setup($module);
		return $controller;
	}
	
}
?>