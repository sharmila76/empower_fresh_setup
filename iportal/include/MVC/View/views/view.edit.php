<?php
require_once('iportal/include/IportalEditView/IportalEditView.php');
 class ViewEdit extends IportalView{
 	var $ev;
 	var $type ='edit';
 	var $useForSubpanel = false;  //boolean variable to determine whether view can be used for subpanel creates
 	var $useModuleQuickCreateTemplate = false; //boolean variable to determine whether or not SubpanelQuickCreate has a separate display function
 	var $showTitle = true;

 	function ViewEdit(){
 		parent::IportalView();
 	}

 	function preDisplay(){
 		$metadataFile = null;
 		$foundViewDefs = false;
 		if(file_exists('iportal/modules/' . $this->module . '/metadata/editviewdefs.php')){
 			$metadataFile = 'iportal/modules/' . $this->module . '/metadata/editviewdefs.php';
 			$foundViewDefs = true;
 		}elseif(file_exists('custom/modules/' . $this->module . '/metadata/editviewdefs.php')){
 			$metadataFile = 'custom/modules/' . $this->module . '/metadata/editviewdefs.php';
 			$foundViewDefs = true;
 		}else{
	 		if(file_exists('custom/modules/'.$this->module.'/metadata/metafiles.php')){
				require_once('custom/modules/'.$this->module.'/metadata/metafiles.php');
				if(!empty($metafiles[$this->module]['editviewdefs'])){
					$metadataFile = $metafiles[$this->module]['editviewdefs'];
					$foundViewDefs = true;
				}
			}elseif(file_exists('modules/'.$this->module.'/metadata/metafiles.php')){
				require_once('modules/'.$this->module.'/metadata/metafiles.php');
				if(!empty($metafiles[$this->module]['editviewdefs'])){
					$metadataFile = $metafiles[$this->module]['editviewdefs'];
					$foundViewDefs = true;
				}
			}
 		}
 		$GLOBALS['log']->debug("metadatafile=". $metadataFile);
		if(!$foundViewDefs && file_exists('modules/'.$this->module.'/metadata/editviewdefs.php')){
				$metadataFile = 'modules/'.$this->module.'/metadata/editviewdefs.php';
 		}

 		$this->ev = new IportalEditView();
 		$this->ev->ss =& $this->ss;
 		$this->ev->setup($this->module, $this->bean, $metadataFile, 'iportal/include/IportalEditView/EditView.tpl');

 	}

 	function display(){
		$this->ev->process();
		if($this->ev->isDuplicate) {
		   foreach($this->ev->fieldDefs as $name=>$defs) {
		   		if(!empty($defs['auto_increment'])) {
		   		   $this->ev->fieldDefs[$name]['value'] = '';
		   		}
		   }
		}
		echo $this->ev->display($this->showTitle);
 	}


 }
?>
