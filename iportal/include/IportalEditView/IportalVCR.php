<?php
 require_once('include/EditView/SugarVCR.php');
 
 class IportalVCR extends SugarVCR {
 	
 	function menu($module, $offset, $isAuditEnabled, $saveAndContinue = false ){
 		$html_text = "";
 		if($offset < 0) {
 			$offset = 0;
 		}
 		//this check if require in cases when you visit the edit view before visiting that modules list view.
 		//you can do this easily either from home or activies or sitemap.
 		$stored_vcr_query=SugarVCR::retrieve($module);
 		if(!empty($_REQUEST['record']) and !empty($stored_vcr_query) and isset($_REQUEST['offset']) and (empty($_REQUEST['isDuplicate']) or $_REQUEST['isDuplicate'] == 'false')){ // bug 15893 - only show VCR if called as an element in a set of records
 			//syncing with display offset;
	 		$offset++;
	 		$action = (!empty($_REQUEST['action']) ? $_REQUEST['action'] : 'EditView');
			$html_text .= "<tr class='pagination'>\n";
			$html_text .= "<td COLSPAN=\"20\" style='padding: 0px;'>\n";
	        $html_text .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tr>\n";
	 		
	 		$list_URL = 'iportal.php?action=index&module='.$module;
	 		$current_page = floor($offset / 20) * 20;
	 		$list_URL .= '&offset='.$current_page;
	 		
			$menu = SugarVCR::play($module, $offset);
			if($saveAndContinue){
				if(!empty($menu['NEXT'])){
					$return_action = 'EditView';
					$return_id = $menu['NEXT'];
					$list_URL = 'iportal.php?action=EditView&module='.$module.'&record='.$return_id.'&offset='.($offset+1);
					$list_link = "<button type='button' id='save_and_continue' class='button' title='{$GLOBALS['app_strings']['LBL_SAVE_AND_CONTINUE']}' onClick='this.form.action.value=\"Save\";if(check_form(\"EditView\")){sendAndRedirect(\"EditView\", \"{$GLOBALS['app_strings']['LBL_SAVING']} {$module}...\", \"$list_URL\");}'>".$GLOBALS['app_strings']['LBL_SAVE_AND_CONTINUE']."</button>";
				}else
					$list_link = "<button type='button' class='button' title='{$GLOBALS['app_strings']['LNK_LIST_RETURN']}' onClick='document.location.href=\"$list_URL\";'>".$GLOBALS['app_strings']['LNK_LIST_RETURN']."</button>";
			}else
				$list_link = "<button type='button' class='button' title='{$GLOBALS['app_strings']['LNK_LIST_RETURN']}' onClick='document.location.href=\"$list_URL\";'>".$GLOBALS['app_strings']['LNK_LIST_RETURN']."</button>";
	 		
	 		$previous_link = "";
	 		$next_link = "";
	 		if(!empty($menu['PREV'])) {
	 			//$previous_link = "<a href='iportal.php?module=$module&action=$action&offset=".($offset-1)."&record=".$menu['PREV']."' >".SugarThemeRegistry::current()->getImage("previous","alt='".$GLOBALS['app_strings']['LNK_LIST_PREVIOUS']."'  border='0' align='absmiddle'").'&nbsp;'.$GLOBALS['app_strings']['LNK_LIST_PREVIOUS']."</a>";
				$href = "iportal.php?module=$module&action=$action&offset=".($offset-1)."&record=".$menu['PREV'];
				$previous_link = "<button type='button' class='button' title='{$GLOBALS['app_strings']['LNK_LIST_PREVIOUS']}' onClick='document.location.href=\"$href\";'>".SugarThemeRegistry::current()->getImage("previous","alt='".$GLOBALS['app_strings']['LNK_LIST_PREVIOUS']."'  border='0' align='absmiddle'")."</button>";
	 		}
	 		else 
				$previous_link = "<button type='button' class='button' title='{$GLOBALS['app_strings']['LNK_LIST_PREVIOUS']}' disabled>".SugarThemeRegistry::current()->getImage("previous_off","alt='".$GLOBALS['app_strings']['LNK_LIST_PREVIOUS']."'  border='0' align='absmiddle'")."</button>";

	 		if(!empty($menu['NEXT'])) {
	 			//$next_link = "<a href='iportal.php?module=$module&action=$action&offset=".($offset+1)."&record=".$menu['NEXT']."' >".$GLOBALS['app_strings']['LNK_LIST_NEXT'].'&nbsp;'.SugarThemeRegistry::current()->getImage("next","alt='".$GLOBALS['app_strings']['LNK_LIST_NEXT']."'  border='0' align='absmiddle'")."</a>";
				$href = "iportal.php?module=$module&action=$action&offset=".($offset+1)."&record=".$menu['NEXT'];
				$next_link = "<button type='button' class='button' title='{$GLOBALS['app_strings']['LNK_LIST_NEXT']}' onClick='document.location.href=\"$href\";'>".SugarThemeRegistry::current()->getImage("next","alt='".$GLOBALS['app_strings']['LNK_LIST_NEXT']."'  border='0' align='absmiddle'")."</button>";
	 		}
	 		else
				$next_link = "<button type='button' class='button' title='{$GLOBALS['app_strings']['LNK_LIST_NEXT']}' disabled>".SugarThemeRegistry::current()->getImage("next_off","alt='".$GLOBALS['app_strings']['LNK_LIST_NEXT']."'  border='0' align='absmiddle'")."</button>";
	 		
	 		if(!empty($_SESSION[$module. 'total'])){
	 			$count = $offset .' '. $GLOBALS['app_strings']['LBL_LIST_OF'] . ' ' . $_SESSION[$module. 'total'];
                if(!empty($GLOBALS['sugar_config']['disable_count_query']) 
                        && ( ($_SESSION[$module. 'total']-1) % $GLOBALS['sugar_config']['list_max_entries_per_page'] == 0 ) ) {
                    $count .= '+';
                }
	 		}else{
	 			$count = $offset;
	 		}
	 		$html_text .= "<td nowrap align='right' >".$list_link."&nbsp;&nbsp;&nbsp;&nbsp;".$previous_link."&nbsp;&nbsp;(".$count.")&nbsp;&nbsp;".$next_link."&nbsp;&nbsp;</td>";
	 		
	 		
	 			
	 		$html_text .= "</tr></table></td></tr>";
 		}
 		return $html_text;
 	}
 	
 	function record($module, $offset){
 		$GLOBALS['log']->debug('IportalVCR is recording more records');
 		$start = max(0, $offset - VCRSTART);
 		$index = $start;
	    $db = DBManagerFactory::getInstance();

 		$result = $db->limitQuery(SugarVCR::retrieve($module),$start,($offset+VCREND),false);
 		$index++;

 		$ids = array();
 		while(($row = $db->fetchByAssoc($result)) != null){
 			$ids[$index] = $row['id'];
 			$index++;
 		}
 		//now that we have the array of ids, store this in the session
 		$_SESSION[$module.'QUERY_ARRAY'] = $ids;
 		return $ids;
 	}
 }
?>
