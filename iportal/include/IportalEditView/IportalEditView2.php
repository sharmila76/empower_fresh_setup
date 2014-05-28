<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('include/EditView/EditView2.php');

class IportalEditView2 extends EditView{

     public function __construct(){

      //   parent::__construct();
     }
     public function showTitle(
        $showTitle = false
        )
    {
        parent::showTitle();
        global $mod_strings, $app_strings;
        if (is_null($this->viewObject))
    		if (!empty($GLOBALS['current_view']))
    			$this->viewObject = $GLOBALS['current_view'];
    		
        if ($showTitle)
    		return $this->getModuleTitle($this->module,$this->focus->name,false);

    	return '';
    }
                
    //taras FIXED PROBLEM WITH ADDRESS FIELDS
    function render()
    {
        $totalWidth = 0;
        foreach($this->defs['templateMeta']['widths'] as $col => $def) {
            foreach($def as $k => $value) $totalWidth += $value;
        }
        // calculate widths
        foreach($this->defs['templateMeta']['widths'] as $col => $def) {
            foreach($def as $k => $value)
                $this->defs['templateMeta']['widths'][$col][$k] = round($value / ($totalWidth / 100), 2);
        }

        $this->sectionPanels = array();
        $this->sectionLabels = array();
        if(!empty($this->defs['panels']) && count($this->defs['panels']) > 0) {
           $keys = array_keys($this->defs['panels']);
           if(is_numeric($keys[0])) {
           	  $defaultPanel = $this->defs['panels'];
           	  unset($this->defs['panels']); //blow away current value
              $this->defs['panels'][''] = $defaultPanel;
           }
        }
        if($this->view == 'EditView' && !empty($GLOBALS['sugar_config']['forms']['requireFirst'])){
        	$this->requiredFirst();
        }

        $maxColumns = isset($this->defs['templateMeta']['maxColumns']) ? $this->defs['templateMeta']['maxColumns'] : 2;
        $panelCount = 0;
		static $itemCount = 100; //Start the generated tab indexes at 100 so they don't step on custom ones.

		/* loop all the panels */
		foreach($this->defs['panels'] as $key=>$p)
		{
		        $panel = array();

                if(!is_array($this->defs['panels'][$key])) {
                   $this->sectionPanels[strtoupper($key)] = $p;
                } else {

			    	foreach($p as $row=>$rowDef) {
			            $columnsInRows = count($rowDef);
			            $columnsUsed = 0;
			            foreach($rowDef as $col => $colDef) {
			                $panel[$row][$col] = is_array($p[$row][$col]) ? array('field' => $p[$row][$col]) : array('field' => array('name'=>$p[$row][$col]));
                            $panel[$row][$col]['field']['tabindex'] = (isset($p[$row][$col]['tabindex']) && is_numeric($p[$row][$col]['tabindex'])) ? $p[$row][$col]['tabindex'] : $itemCount;

			                if($columnsInRows < $maxColumns) {
			                    if($col == $columnsInRows - 1) {
			                        $panel[$row][$col]['colspan'] = 2 * $maxColumns - ($columnsUsed + 1);
			                    } else {
			                        $panel[$row][$col]['colspan'] = floor(($maxColumns * 2 - $columnsInRows) / $columnsInRows);
			                        $columnsUsed = $panel[$row][$col]['colspan'];
			                    }
			                }

			                //Set address types to have colspan value of 2 if colspan is not already defined
			            	if(isset($colDef['type']) && $colDef['type'] == 'address' && $this->view == 'IportalEditView' && !isset($panel[$row][$col]['colspan'])) {
			                   $panel[$row][$col]['colspan'] = 2;
			                }



			                $itemCount++;

			            } //foreach
			    	} //foreach

			    	// Panel alignment will be off if the panel doesn't have a row with the max columns
			    	// It will not be aligned to the other panels so we fill out the columns in the last row
			        $addFiller = true;
			        foreach($panel as $row) {
			        	if(count($row) == $this->defs['templateMeta']['maxColumns']) {
			        	   $addFiller = false;
			        	   break;
			        	}
			        }

			        if($addFiller) {
			    	   $rowCount = count($panel);
			    	   $filler = count($panel[$rowCount-1]);
			    	   while($filler < $this->defs['templateMeta']['maxColumns']) {
			              $panel[$rowCount - 1][$filler++] = array('field'=>array('name'=>''));
			    	   } //while
			        }


			    	$this->sectionPanels[strtoupper($key)] = $panel;
		        }


		$panelCount++;
		} //foreach
    }
    //end taras


    


}


?>
