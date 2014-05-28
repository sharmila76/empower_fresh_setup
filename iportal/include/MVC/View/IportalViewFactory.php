<?php

require_once('iportal/include/MVC/View/IportalView.php');
require_once('include/MVC/View/ViewFactory.php');

class IportalViewFactory extends ViewFactory {
	
	function IportalViewFactory() {
		parent::ViewFactory();
	}
	
	
	function loadView($type = 'default', $module, $bean = null, $view_object_map = array()){
		$type = strtolower($type);
		//first let's check if the module handles this view
		$view = null;
//BEGIN TK ADD - Portal dir reference		
		if(file_exists('iportal/modules/'.$module.'/views/view.'.$type.'.php')){
			$view = IportalViewFactory::_buildFromFile('iportal/modules/'.$module.'/views/view.'.$type.'.php', $bean, $view_object_map, $type, $module);
//END TK ADD - Portal dir reference		
		}
		/*elseif(file_exists('custom/modules/'.$module.'/views/view.'.$type.'.php')){
			$view = IportalViewFactory::_buildFromFile('custom/modules/'.$module.'/views/view.'.$type.'.php', $bean, $view_object_map, $type, $module);
		}
		else if(file_exists('modules/'.$module.'/views/view.'.$type.'.php')){
			$view = IportalViewFactory::_buildFromFile('modules/'.$module.'/views/view.'.$type.'.php', $bean, $view_object_map, $type, $module);
		}
		else if(file_exists('custom/include/MVC/View/views/view.'.$type.'.php')){
			$view = IportalViewFactory::_buildFromFile('custom/include/MVC/View/views/view.'.$type.'.php', $bean, $view_object_map, $type, $module);
		}*/
		else{
			//if the module does not handle this view, then check if Sugar handles it OOTB
			$file = 'iportal/include/MVC/View/views/view.'.$type.'.php';
			if(file_exists($file)){
				//it appears Sugar does have the proper logic for this file.
				$view = IportalViewFactory::_buildFromFile($file, $bean, $view_object_map, $type, $module);
			}
		}	
		// Default to SugarView if still nothing found/built
		if (!isset($view)) 
			//TK CHANGE - Portal reference	
			$view = new IportalView();
		IportalViewFactory::_loadConfig($view, $type);
		return $view;
	}
	
	function _buildFromFile($file, &$bean, $view_object_map, $type, $module){
		require_once($file);
		//try ModuleViewType first then try ViewType if that fails then use SugarView
		$class = ucfirst($module).'View'.ucfirst($type);
		$customClass = 'Custom' . $class;
		
		if(class_exists($customClass)){
			return IportalViewFactory::_buildClass($customClass, $bean, $view_object_map);
		}
		if(class_exists($class)){
			return IportalViewFactory::_buildClass($class, $bean, $view_object_map);
		}
		//Now try the next set of possibilites if it was none of the above
		$class = 'View'.ucfirst($type);
		$customClass = 'Custom' . $class;
		if(class_exists($customClass)){
			return IportalViewFactory::_buildClass($customClass, $bean, $view_object_map);
		}
		if(class_exists("Iportal".$class)){
			return IportalViewFactory::_buildClass("Iportal".$class, $bean, $view_object_map);
		}
		if(class_exists($class)){
			return IportalViewFactory::_buildClass($class, $bean, $view_object_map);
		}
		//Now check if there is a custom SugarView for generic handling
		if(file_exists('custom/include/MVC/View/SugarView.php')){
			require_once('custom/include/MVC/View/SugarView.php');
			if(class_exists('CustomSugarView')){
				return new CustomSugarView($bean, $view_object_map);
			}
		}
		//if all else fails return SugarView
		return new IportalView($bean, $view_object_map);
		
	}
	
	function _buildClass($class, $bean, $view_object_map){
		$view = new $class();
		$view->init($bean, $view_object_map);
		
		if($view instanceof IportalView){
			return $view;
		}else
			return new IportalView($bean, $view_object_map);
	}
	
	function _loadConfig(&$view, $type){
		$view_config_custom = array();
		$view_config_module = array();
		$view_config_root_cstm = array();
		$view_config_root = array();
		$view_config_app = array();
		$config_file_name = 'view.'.$type.'.config.php';
		$view_config = sugar_cache_retrieve("VIEW_CONFIG_FILE_".$view->module."_TYPE_".$type);
		if(!$view_config){
			//BEGIN TK ADD - Portal dir reference
			if(file_exists('iportal/modules/'.$view->module.'/views/'.$config_file_name)){
				require_once('iportal/modules/'.$view->module.'/views/'.$config_file_name);
				$view_config_custom = $view_config;
			}
			//END TK ADD - Portal dir reference
			if(file_exists('custom/modules/'.$view->module.'/views/'.$config_file_name)){
				require_once('custom/modules/'.$view->module.'/views/'.$config_file_name);
				$view_config_custom = $view_config;
			}
			if(file_exists('modules/'.$view->module.'/views/'.$config_file_name)){
				require_once('modules/'.$view->module.'/views/'.$config_file_name);
				$view_config_module = $view_config;
			}
			if(file_exists('custom/include/MVC/View/views/'.$config_file_name)){
				require_once('custom/include/MVC/View/views/'.$config_file_name);
				$view_config_root_cstm = $view_config;
			}
			if(file_exists('include/MVC/View/views/'.$config_file_name)){
				require_once('include/MVC/View/views/'.$config_file_name);
				$view_config_root = $view_config;
			}	
			if(file_exists('include/MVC/View/views/view.config.php')){
				require_once('include/MVC/View/views/view.config.php');
				$view_config_app = $view_config;
			}
			$view_config = array('actions' => array(), 'req_params' => array(),);
			
			//actions
			if(!empty($view_config_app) && !empty($view_config_app['actions']))
				$view_config['actions'] = array_merge($view_config['actions'], $view_config_app['actions']);
			if(!empty($view_config_root) && !empty($view_config_root['actions']))
				$view_config['actions'] = array_merge($view_config['actions'], $view_config_root['actions']);
			if(!empty($view_config_root_cstm) && !empty($view_config_root_cstm['actions']))
				$view_config['actions'] = array_merge($view_config['actions'], $view_config_root_cstm['actions']);
			if(!empty($view_config_module) && !empty($view_config_module['actions']))
				$view_config['actions'] = array_merge($view_config['actions'], $view_config_module['actions']);
			if(!empty($view_config_custom) && !empty($view_config_custom['actions']))
				$view_config['actions'] = array_merge($view_config['actions'], $view_config_custom['actions']);	
			
			//req_params
			if(!empty($view_config_app) && !empty($view_config_app['req_params']))
				$view_config['req_params'] = array_merge($view_config['req_params'], $view_config_app['req_params']);
			if(!empty($view_config_root) && !empty($view_config_root['req_params']))
				$view_config['req_params'] = array_merge($view_config['req_params'], $view_config_root['req_params']);
			if(!empty($view_config_root_cstm) && !empty($view_config_root_cstm['req_params']))
				$view_config['req_params'] = array_merge($view_config['req_params'], $view_config_root_cstm['req_params']);
			if(!empty($view_config_module) && !empty($view_config_module['req_params']))
				$view_config['req_params'] = array_merge($view_config['req_params'], $view_config_module['req_params']);
			if(!empty($view_config_custom) && !empty($view_config_custom['req_params']))
				$view_config['req_params'] = array_merge($view_config['req_params'], $view_config_custom['req_params']);	
		
			sugar_cache_put("VIEW_CONFIG_FILE_".$view->module."_TYPE_".$type, $view_config);
		}
		$action = strtolower($view->action);
		$config = null;
		if(!empty($view_config['req_params'])){
			//try the params first	
			foreach($view_config['req_params'] as $key => $value){
			    if(!empty($_REQUEST[$key]) && $_REQUEST[$key] == "false") {
			        $_REQUEST[$key] = false;
			    }
				if(!empty($_REQUEST[$key])){
					
					if(!is_array($value['param_value'])){
						if($value['param_value'] ==  $_REQUEST[$key]){
							$config = $value['config'];
							break;
						}
					}else{
						
						foreach($value['param_value'] as $v){
							if($v ==  $_REQUEST[$key]){
								$config = $value['config'];
								break;
							}
							
						}
						
					}
					
					
					
				}
			}
		}
		if($config == null && !empty($view_config['actions']) && !empty($view_config['actions'][$action])){
				$config = $view_config['actions'][$action];
		}
		if($config != null)
			$view->options = $config;
	}
	
	
}
?>