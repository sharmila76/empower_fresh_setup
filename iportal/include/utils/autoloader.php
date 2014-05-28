<?php

class IportalAutoLoader{

	public static $map = array(
		'XTemplate'=>'XTemplate/xtpl.php',
		'ListView'=>'iportal/include/IportalListView/ListView.php',
		'Sugar_Smarty'=>'include/Sugar_Smarty.php',
		'Javascript'=>'include/javascript/javascript.php',

	);

	public static $noAutoLoad = array(
		'Tracker'=>true,
	);

	public static $moduleMap = array();

    public static function autoload($class)
	{
		$uclass = ucfirst($class);
		if(!empty(IportalAutoLoader::$noAutoLoad[$class])){
			return false;
		}
		if(!empty(IportalAutoLoader::$map[$uclass])){
			require_once(IportalAutoLoader::$map[$uclass]);
			return true;
		}

		if(empty(IportalAutoLoader::$moduleMap)){
			if(isset($GLOBALS['beanFiles'])){
				IportalAutoLoader::$moduleMap = $GLOBALS['beanFiles'];
			}else{
				include('include/modules.php');
				IportalAutoLoader::$moduleMap = $beanFiles;
			}
		}
		if(!empty(IportalAutoLoader::$moduleMap[$class])){
			require_once(IportalAutoLoader::$moduleMap[$class]);
			return true;
		}

  		return false;
	}

	public static function loadAll(){
		foreach(IportalAutoLoader::$map as $class=>$file){
			require_once($file);
		}

		if(isset($GLOBALS['beanFiles'])){
			$files = $GLOBALS['beanFiles'];
		}else{
			include('include/modules.php');
			$files = $beanList;
		}
		foreach(IportalAutoLoader::$map as $class=>$file){
			require_once($file);
		}

	}
}
?>
