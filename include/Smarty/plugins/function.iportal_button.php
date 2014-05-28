<?php

function smarty_function_iportal_button($params, &$smarty)
{
   if(empty($params['module'])) {
   	  $smarty->trigger_error("sugar_button: missing required param (module)");
   } else if(empty($params['id'])) {
   	  $smarty->trigger_error("sugar_button: missing required param (id)");
   } else if(empty($params['view'])) {
   	  $smarty->trigger_error("sugar_button: missing required param (view)");
   }

   $type = $params['id'];
   if(!is_array($type)) {
   	  $module = $params['module'];
   	  $view = $params['view'];
   	  switch(strtoupper($type)) {
			case "CANCEL":
			$cancelButton  = '{if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}';
			$cancelButton .= '<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="window.location.href=\'iportal.php?action=DetailView&module={$smarty.request.return_module}&record={$smarty.request.return_id}\'; return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button"> ';
			$cancelButton .= '{elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}';
			$cancelButton .= '<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="window.location.href=\'iportal.php?action=DetailView&module={$smarty.request.return_module}&record={$fields.id.value}\'; return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}"> ';
			$cancelButton .= '{elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}';
			$cancelButton .= '<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="window.location.href=\'iportal.php?action=DetailView&module='.$module.'&record={$fields.id.value}\'; return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}"> ';
			$cancelButton .= '{else}';
			$cancelButton .= '<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="window.location.href=\'iportal.php?action=index&module={$smarty.request.return_module}&record={$smarty.request.return_id}\'; return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}"> ';
			$cancelButton .= '{/if}';
			return $cancelButton;
			break;

			case "DELETE":
			return '{if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="this.form.return_module.value=\'' . $module . '\'; this.form.return_action.value=\'ListView\'; this.form.action.value=\'Delete\'; return confirm(\'{$APP.NTC_DELETE_CONFIRMATION}\');" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}">{/if} ';
			break;

			case "DUPLICATE":
			return '{if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="this.form.return_module.value=\''. $module . '\'; this.form.return_action.value=\'DetailView\'; this.form.isDuplicate.value=true; this.form.action.value=\'' . $view . '\'; this.form.return_id.value=\'{$id}\';" type="submit" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if} ';
			break;

			case "EDIT";
			return '{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="this.form.return_module.value=\'' . $module . '\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$id}\'; this.form.action.value=\'EditView\';" type="submit" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if} ';
			break;

			case "FIND_DUPLICATES":
			return '{if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUP_MERGE}" accessKey="M" class="button" onclick="this.form.return_module.value=\'' . $module . '\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$id}\'; this.form.action.value=\'Step1\'; this.form.module.value=\'MergeRecords\';" type="submit" name="Merge" value="{$APP.LBL_DUP_MERGE}">{/if} ';
			break;

			case "SAVE":
				$view = 'IportalEditView';
				return '{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="{if $isDuplicate}this.form.return_id.value=\'\'; {/if}this.form.action.value=\'Save\'; return check_form(\'' . $view . '\');" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">{/if} ';
			break;

			case "SUBPANELSAVE":
				$view = $view == 'QuickCreate' ? "form_SubpanelQuickCreate_{$module}" : $view;
				return '{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button" onclick="this.form.action.value=\'Save\';if(check_form(\''.$view.'\'))return SUGAR.subpanelUtils.inlineSave(this.form.id, \'' . $params['module'] . '_subpanel_save_button\');return false;" type="submit" name="' . $params['module'] . '_subpanel_save_button" id="' . $params['module'] . '_subpanel_save_button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">{/if} ';
			case "SUBPANELCANCEL":
				return '<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="return SUGAR.subpanelUtils.cancelCreate(\'' . $params['module'] . '_subpanel_cancel_button\');return false;" type="submit" name="' . $params['module'] . '_subpanel_cancel_button" id="' . $params['module'] . '_subpanel_cancel_button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}"> ';
		    case "SUBPANELFULLFORM":
				$html = '<input title="{$APP.LBL_FULL_FORM_BUTTON_TITLE}" accessKey="{$APP.LBL_FULL_FORM_BUTTON_KEY}" class="button" onclick="disableOnUnloadEditView(this.form); this.form.return_action.value=\'DetailView\'; this.form.action.value=\'EditView\'; if(typeof(this.form.to_pdf)!=\'undefined\') this.form.to_pdf.value=\'0\';" type="submit" name="' . $params['module'] . '_subpanel_full_form_button" id="' . $params['module'] . '_subpanel_full_form_button" value="{$APP.LBL_FULL_FORM_BUTTON_LABEL}"> ';
				$html .= '<input type="hidden" name="full_form" value="full_form">';
		        return $html;
			case "DCMENUCANCEL":
				return '<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="javascript:lastLoadedMenu=undefined;DCMenu.closeOverlay();return false;" type="submit" name="' . $params['module'] . '_dcmenu_cancel_button" id="' . $params['module'] . '_dcmenu_cancel_button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}"> ';
		   
			case "DCMENUSAVE":
				$view = $view == 'QuickCreate' ? "form_DCQuickCreate_{$module}" : $view;
				return '{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="this.form.action.value=\'Save\';if(check_form(\''.$view.'\'))return DCMenu.save(this.form.id, \'' . $params['module'] . '_subpanel_save_button\');return false;" type="submit" name="' . $params['module'] . '_dcmenu_save_button" id="' . $params['module'] . '_dcmenu_save_button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">{/if} ';
			case "DCMENUFULLFORM":
				$html = '<input title="{$APP.LBL_FULL_FORM_BUTTON_TITLE}" accessKey="{$APP.LBL_FULL_FORM_BUTTON_KEY}" class="button" onclick="disableOnUnloadEditView(this.form); this.form.return_action.value=\'DetailView\'; this.form.action.value=\'EditView\'; if(typeof(this.form.to_pdf)!=\'undefined\') this.form.to_pdf.value=\'0\';" type="submit" name="' . $params['module'] . '_subpanel_full_form_button" id="' . $params['module'] . '_subpanel_full_form_button" value="{$APP.LBL_FULL_FORM_BUTTON_LABEL}"> ';
				$html .= '<input type="hidden" name="full_form" value="full_form">';
		        return $html;	
			case "POPUPSAVE":
				$view = $view == 'QuickCreate' ? "form_QuickCreate_{$module}" : $view;
				return '{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" '
					 . 'class="button primary" onclick="this.form.action.value=\'Popup\';' 
					 . 'return check_form(\''.$view.'\')" type="submit" name="' . $params['module'] 
					 . '_popupcreate_save_button" id="' . $params['module'] 
					 . '_popupcreate_save_button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">{/if} ';
			case "POPUPCANCEL":
				return '<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" ' 
					 . 'class="button" onclick="toggleDisplay(\'addform\');return false;" ' 
					 . 'name="' . $params['module'] . '_popup_cancel_button" type="submit"' 
					 . 'id="' . $params['module'] . '_popup_cancel_button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}"> ';
		    
			case "AUDIT":
	            $popup_request_data = array(
			        'call_back_function' => 'set_return',
			        'form_name' => 'EditView',
			        'field_to_name_array' => array(),
			    );
	            $json = getJSONobj();

	            require_once('include/SugarFields/Parsers/MetaParser.php');
	            $encoded_popup_request_data = MetaParser::parseDelimiters($json->encode($popup_request_data));
	 			$audit_link = '<input title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick=\'open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=' . $params['module'] . '", true, false, ' . $encoded_popup_request_data . '); return false;\' type="submit" value="{$APP.LNK_VIEW_CHANGE_LOG}">';
				$view = '{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}'.$audit_link.'{/if}{/if}';
				return $view;

			//Button for the Connector intergration wizard
			case "CONNECTOR":
				require_once('include/connectors/utils/ConnectorUtils.php');
				require_once('include/connectors/sources/SourceFactory.php');
				$modules_sources = ConnectorUtils::getDisplayConfig();
				foreach($modules_sources as $mod=>$entry) {
				    if($mod == $module && !empty($entry)) {
				    	foreach($entry as $source_id) {
				    		$source = SourceFactory::getSource($source_id);
				    		if($source->isEnabledInWizard()) {
				    			return '<input title="{$APP.LBL_MERGE_CONNECTORS}" accessKey="{$APP.LBL_MERGE_CONNECTORS_BUTTON_KEY}" type="button" class="button" onClick="document.location=\'iportal.php?module=Connectors&action=Step1&record={$fields.id.value}&merge_module={$module}\'" name="merge_connector" value="{$APP.LBL_MERGE_CONNECTORS}">';
				    		}
				    	}
				    }
				}
				return '';


   	  } //switch

   } else if(is_array($type) && isset($type['customCode'])) {
   	  return $type['customCode'];
   }

}

?>
