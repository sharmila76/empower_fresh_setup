<?php

require_once('iportal/include/MVC/View/IportalViewFactory.php');

class IportalView extends SugarView {

	
	function IportalView() {
		parent::SugarView();
	}

	function displayHeader() {
        global $theme;
        global $max_tabs;
        global $app_strings;
        global $current_user;
        global $sugar_config;
        global $app_list_strings;
     	global $current_portal_user;
        global $iportal_config;
        global $current_language;
        global $mod_strings;
        require_once('iportal_config.php');
		if(file_exists('iportal_config_override.php')){ require_once('iportal_config_override.php'); }
        $GLOBALS['app']->headerDisplayed = true;

        //TK - Removed quickcreate
       /* if (!$this->_menuExists($this->module) && !empty($GLOBALS['mod_strings']['LNK_NEW_RECORD'])) {
            $GLOBALS['module_menu'][] = Array("iportal.php?module=$this->module&action=EditView&return_module=$this->module&return_action=DetailView");
			$GLOBALS['module_menu'][] = Array("iportal.php?module=$this->module&action=index", $GLOBALS['mod_strings']['LNK_LIST'], $this->module, $this->module);
        }  */

        //taras fixed bug with theme. Now use themes from the $iportal_config['default_theme']
        SugarThemeRegistry::set($iportal_config['default_theme']);
        //end taras
        $themeObject = SugarThemeRegistry::current();
        $theme = $themeObject->__toString();

        $ss = new Sugar_Smarty();
        $ss->assign("APP", $app_strings);
        $ss->assign("THEME", $theme);
        $ss->assign("THEME_IE6COMPAT", $themeObject->ie6compat ? 'true':'false');
        $ss->assign("MODULE_NAME", $this->module);

        // get css
        $css = $themeObject->getCSS();
        if ($this->_getOption('view_print')) {
            $css .= '<link rel="stylesheet" type="text/css" href="'.$themeObject->getCSSURL('print.css').'" media="all" />';
        }
        $ss->assign("SUGAR_CSS",$css);

        // get javascript
        ob_start();
        $this->renderJavascript();

        $ss->assign("SUGAR_JS", ob_get_contents().$themeObject->getJS());
        ob_end_clean();

        // get favicon
        if(isset($GLOBALS['sugar_config']['default_module_favicon']))
            $module_favicon = $GLOBALS['sugar_config']['default_module_favicon'];
        else
            $module_favicon = false;

        $favicon = '';
        if ( $module_favicon )
            $favicon = $themeObject->getImageURL($this->module.'_favico.png',false);
        if ( !sugar_is_file($favicon) || !$module_favicon )
            $favicon = $themeObject->getImageURL('sugar_icon.ico',false);
        $ss->assign('FAVICON_URL',getJSPath($favicon));

        // get the module menu
        $shortcut_menu = array();
        foreach ( $this->getMenu() as $key => $menu_item )
            $shortcut_menu[$key] = array(
                "URL"         => str_replace("index.php", "iportal.php", $menu_item[0]),
                "LABEL"       => $menu_item[1],
                "MODULE_NAME" => $menu_item[2],
                "IMAGE"       => $themeObject->getImage($menu_item[2],"alt='".$menu_item[1]."'  border='0' align='absmiddle'"),
                );
        $ss->assign("SHORTCUT_MENU",$shortcut_menu);

        /*echo '<pre>';
        print_r($shortcut_menu);
        echo '</pre>';*/

        // handle rtl text direction
        if(isset($_REQUEST['RTL']) && $_REQUEST['RTL'] == 'RTL'){
            $_SESSION['RTL'] = true;
        }
        if(isset($_REQUEST['LTR']) && $_REQUEST['LTR'] == 'LTR'){
            unset($_SESSION['RTL']);
        }
        if(isset($_SESSION['RTL']) && $_SESSION['RTL']){
            $ss->assign("DIR", 'dir="RTL"');
        }

        // handle resizing of the company logo correctly on the fly
        $companyLogoURL = $themeObject->getImageURL('company_logo.png');
		$companyLogoURL_arr = explode('?', $companyLogoURL);
		$companyLogoURL = $companyLogoURL_arr[0];

        $company_logo_attributes = sugar_cache_retrieve('company_logo_attributes');
        if(!empty($company_logo_attributes)) {
            $ss->assign("COMPANY_LOGO_MD5", $company_logo_attributes[0]);
            $ss->assign("COMPANY_LOGO_WIDTH", $company_logo_attributes[1]);
            $ss->assign("COMPANY_LOGO_HEIGHT", $company_logo_attributes[2]);
        }
        else {
            // Always need to md5 the file
            $ss->assign("COMPANY_LOGO_MD5", md5_file($companyLogoURL));

            list($width,$height) = getimagesize($companyLogoURL);
            if ( $width > 212 || $height > 40 ) {
                $resizePctWidth  = ($width - 212)/212;
                $resizePctHeight = ($height - 40)/40;
                if ( $resizePctWidth > $resizePctHeight )
                    $resizeAmount = $width / 212;
                else
                    $resizeAmount = $height / 40;
                $ss->assign("COMPANY_LOGO_WIDTH", round($width * (1/$resizeAmount)));
                $ss->assign("COMPANY_LOGO_HEIGHT", round($height * (1/$resizeAmount)));
            }
            else {
                $ss->assign("COMPANY_LOGO_WIDTH", $width);
                $ss->assign("COMPANY_LOGO_HEIGHT", $height);
            }

            // Let's cache the results
            sugar_cache_put('company_logo_attributes',
                            array(
                                $ss->get_template_vars("COMPANY_LOGO_MD5"),
                                $ss->get_template_vars("COMPANY_LOGO_WIDTH"),
                                $ss->get_template_vars("COMPANY_LOGO_HEIGHT")
                                )
            );


        }
        $ss->assign("COMPANY_LOGO_URL",getJSPath($companyLogoURL)."&logo_md5=".$ss->get_template_vars("COMPANY_LOGO_MD5"));

        // get the global links
        $gcls = array();
        $global_control_links = array();
        require("iportal/include/globalControlLinks.php");

        foreach($global_control_links as $key => $value) {
            if ($key == 'users')  {   //represents logout link.
                $ss->assign("LOGOUT_LINK", $value['linkinfo'][key($value['linkinfo'])]);
                $ss->assign("LOGOUT_LABEL", key($value['linkinfo']));//key value for first element.
                continue;
            }

            foreach ($value as $linkattribute => $attributevalue) {
                // get the main link info
                if ( $linkattribute == 'linkinfo' ) {
                    $gcls[$key] = array(
                        "LABEL" => key($attributevalue),
                        "URL"   => current($attributevalue),
                        "SUBMENU" => array(),
                        );
                   if(substr($gcls[$key]["URL"], 0, 11) == "javascript:") {
                       $gcls[$key]["ONCLICK"] = substr($gcls[$key]["URL"],11);
                       $gcls[$key]["URL"] = "#";
                   }
                }
                // and now the sublinks
                if ( $linkattribute == 'submenu' && is_array($attributevalue) ) {
                    foreach ($attributevalue as $submenulinkkey => $submenulinkinfo)
                        $gcls[$key]['SUBMENU'][$submenulinkkey] = array(
                            "LABEL" => key($submenulinkinfo),
                            "URL"   => current($submenulinkinfo),
                        );
                       if(substr($gcls[$key]['SUBMENU'][$submenulinkkey]["URL"], 0, 11) == "javascript:") {
                           $gcls[$key]['SUBMENU'][$submenulinkkey]["ONCLICK"] = substr($gcls[$key]['SUBMENU'][$submenulinkkey]["URL"],11);
                           $gcls[$key]['SUBMENU'][$submenulinkkey]["URL"] = "#";
                       }
                }
            }
        }

        $ss->assign("GCLS",$gcls);

        $ss->assign("SEARCH", isset($_REQUEST['query_string']) ? $_REQUEST['query_string'] : '');

        if ($this->action == "EditView" || $this->action == "Login")
            $ss->assign("ONLOAD", 'onload="set_focus()"');

        $ss->assign("AUTHENTICATED",isset($_SESSION["authenticated_portal_user_id"]));

        //authenticated_portal_user_id

        // get other things needed for page style popup
        if (isset($_SESSION["authenticated_portal_user_id"])) {
            // get the current user name and id
             //taras fixed portal user's name
            $contacts = $current_portal_user->get_linked_beans('contacts_lg_portaluser', 'Contact');
			$tmp_contact = $contacts[0];
            $current_portal_user->related_contact= $tmp_contact->full_name;
            $portal_full_name= $current_portal_user->related_contact;
            unset($tmp_contact);
            $ss->assign("CURRENT_USER", trim($portal_full_name)=='' ? $current_portal_user->name : $portal_full_name );
            /*$ss->assign("CURRENT_USER", $current_user->full_name == '' || !showFullName()
                ? current_user->user_name : current_user->full_name );*/
            //end taras
            $ss->assign("CURRENT_USER_ID", $current_user->id);

            // get the last viewed records
            $tracker = new Tracker();
            $history = $tracker->get_recently_viewed($current_user->id);
            foreach ( $history as $key => $row ) {
                $history[$key]['item_summary_short'] = getTrackerSubstring($row['item_summary']);
                $history[$key]['image'] = SugarThemeRegistry::current()
                    ->getImage($row['module_name'],'border="0" align="absmiddle" alt="'.$row['item_summary'].'"');
            }
            $ss->assign("recentRecords",$history);
        }

        $bakModStrings = $mod_strings;
        if (isset($_SESSION["authenticated_portal_user_id"]) ) {
            // get the module list
            $moduleTopMenu = array();

            $max_tabs = $current_user->getPreference('max_tabs');
            // Attempt to correct if max tabs count is waaay too high.
            if ( !isset($max_tabs) || $max_tabs <= 0 || $max_tabs > 10 ) {
                $max_tabs = $GLOBALS['sugar_config']['default_max_tabs'];
                $current_user->setPreference('max_tabs', $max_tabs, 0, 'global');
            }

            $moduleTab = $this->_getModuleTab();
            $ss->assign('SYSTEM_NAME',$moduleTab); //taras TITLE OF THE PAGE
            $ss->assign('MODULE_TAB',$moduleTab);

             // See if they are using grouped tabs or not (removed in 6.0, returned in 6.1)
            $user_navigation_paradigm = $current_user->getPreference('navigation_paradigm');
            if ( !isset($user_navigation_paradigm) ) {
                $user_navigation_paradigm = $GLOBALS['sugar_config']['default_navigation_paradigm'];
            }


            // Get the full module list for later use
            foreach ( query_module_access_list($current_user) as $module ) {
                // Bug 25948 - Check for the module being in the moduleList
                if ( isset($app_list_strings['moduleList'][$module]) ) {
                    $fullModuleList[$module] = $app_list_strings['moduleList'][$module];
                }
            }


            if(!should_hide_iframes()) {
                $iFrame = new iFrame();
                $frames = $iFrame->lookup_frames('tab');
                foreach($frames as $key => $values){
                        $fullModuleList[$key] = $values;
                }
            }
            elseif (isset($fullModuleList['iFrames'])) {
                unset($fullModuleList['iFrames']);
            }

            if ( $user_navigation_paradigm == 'gm' && isset($themeObject->group_tabs) && $themeObject->group_tabs) {
                // We are using grouped tabs
                require_once('include/GroupedTabs/GroupedTabStructure.php');
                $groupedTabsClass = new GroupedTabStructure();
                $modules = query_module_access_list($current_user);
                //handle with submoremodules
                $max_tabs = $current_user->getPreference('max_subtabs');
                // If the max_tabs isn't set incorrectly, set it within the range, to the default max sub tabs size
                if ( !isset($max_tabs) || $max_tabs <= 0 || $max_tabs > 10){
                    // We have a default value. Use it
                    if(isset($GLOBALS['sugar_config']['default_max_subtabs'])){
                        // As of 6.1, we shouldn't have a max subtabs higher than 10.
                        // If it's larger, bring it down to the max and save it in the config override
                        if($GLOBALS['sugar_config']['default_max_subtabs'] > 10){
                            require_once('modules/Configurator/Configurator.php');
                            $configurator = new Configurator();
                            $configurator->config['default_max_subtabs'] = '10';
                            $configurator->handleOverride();
                            $configurator->clearCache();
                        }
                        $max_tabs = $GLOBALS['sugar_config']['default_max_subtabs'];
                    }
                    else{
                        $max_tabs = 8;
                    }
                }

				$subMoreModules = false;
				$groupTabs = $groupedTabsClass->get_tab_structure(get_val_array($modules));
                // We need to put this here, so the "All" group is valid for the user's preference.
                $groupTabs[$app_strings['LBL_TABGROUP_ALL']]['modules'] = $fullModuleList;


                // Setup the default group tab.
                $allGroup = $app_strings['LBL_TABGROUP_ALL'];
                $ss->assign('currentGroupTab',$allGroup);
                $currentGroupTab = $allGroup;
                $usersGroup = $current_user->getPreference('theme_current_group');
                // Figure out which tab they currently have selected (stored as a user preference)
                if ( !empty($usersGroup) && isset($groupTabs[$usersGroup]) ) {
                    $currentGroupTab = $usersGroup;
                } else {
                    $current_user->setPreference('theme_current_group',$currentGroupTab);
                }

                $ss->assign('currentGroupTab',$currentGroupTab);
                $usingGroupTabs = true;

            } else {
                // Setup the default group tab.
                $ss->assign('currentGroupTab',$app_strings['LBL_TABGROUP_ALL']);

                $usingGroupTabs = false;

                $groupTabs[$app_strings['LBL_TABGROUP_ALL']]['modules'] = $fullModuleList;

            }

            $topTabList = array();

            // Now time to go through each of the tab sets and fix them up.
            foreach ( $groupTabs as $tabIdx => $tabData ) {
                $topTabs = $tabData['modules'];
                if ( ! is_array($topTabs) ) {
                    $topTabs = array();
                }
                $extraTabs = array();

                // Split it in to the tabs that go across the top, and the ones that are on the extra menu.
                if ( count($topTabs) > $max_tabs ) {
                    $extraTabs = array_splice($topTabs,$max_tabs);
                }
                // Make sure the current module is accessable through one of the top tabs
                if ( !isset($topTabs[$moduleTab]) ) {
                    // Nope, we need to add it.
                    // First, take it out of the extra menu, if it's there
                    if ( isset($extraTabs[$moduleTab]) ) {
                        unset($extraTabs[$moduleTab]);
                    }
                    if ( count($topTabs) >= $max_tabs - 1 ) {
                        // We already have the maximum number of tabs, so we need to shuffle the last one
                        // from the top to the first one of the extras
                        $lastElem = array_splice($topTabs,$max_tabs-1);
                        $extraTabs = $lastElem + $extraTabs;
                    }
                    $topTabs[$moduleTab] = $app_list_strings['moduleList'][$moduleTab];
                }


               /*
                // This was removed, but I like the idea, so I left the code in here in case we decide to turn it back on
                // If we are using group tabs, add all the "hidden" tabs to the end of the extra menu
                if ( $usingGroupTabs ) {
                    foreach($fullModuleList as $moduleKey => $module ) {
                        if ( !isset($topTabs[$moduleKey]) && !isset($extraTabs[$moduleKey]) ) {
                            $extraTabs[$moduleKey] = $module;
                        }
                    }
                }
                */

                // Get a unique list of the top tabs so we can build the popup menus for them
                foreach ( $topTabs as $moduleKey => $module ) {
                    $topTabList[$moduleKey] = $module;
                }

                $groupTabs[$tabIdx]['modules'] = $topTabs;
                $groupTabs[$tabIdx]['extra'] = $extraTabs;
            }
        }

        //taras  CREATE A MENU LIST
         if ( isset($topTabList) && is_array($topTabList) ) {
            // Adding shortcuts array to menu array for displaying shortcuts associated with each module
            $shortcutTopMenu = array();
            foreach($topTabList as $module_key => $label) {
                global $mod_strings;
                $mod_strings = return_module_language($current_language, $module_key);
                foreach ( $this->getMenu($module_key) as $key => $menu_item ) {
                    $shortcutTopMenu[$module_key][$key] = array(
                        "URL"         => str_replace("index.php", "iportal.php", $menu_item[0]),
                        "LABEL"       => $menu_item[1],
                        "MODULE_NAME" => $menu_item[2],
                        "IMAGE"       => $themeObject->getImage($menu_item[2],"alt='".$menu_item[1]."'  border='0' align='absmiddle'"),
                        );
                }
            }

            $ss->assign("groupTabs",$groupTabs);
            $ss->assign("shortcutTopMenu",$shortcutTopMenu);
            //$ss->assign('USE_GROUP_TABS',$usingGroupTabs);

            // This is here for backwards compatibility, someday, somewhere, it will be able to be removed
            $ss->assign("moduleTopMenu",$groupTabs[$app_strings['LBL_TABGROUP_ALL']]['modules']);
            $ss->assign("moduleExtraMenu",$groupTabs[$app_strings['LBL_TABGROUP_ALL']]['extra']);
         }
        //end taras

        global $mod_strings;
		//$mod_strings = $bakModStrings;
		/******************DC MENU*********************/
		if((isset($_SESSION['authenticated_portal_user_id']) && !empty($_SESSION['authenticated_portal_user_id'])) &&!empty($current_user->id) && !$this->_getOption('view_print')){
			require_once('include/DashletContainer/DCFactory.php');
			$dcm = DCFactory::getContainer(null, 'DCMenu');
			$data = $dcm->getLayout();
			$dcjs = "<script src='".getJSPath('include/DashletContainer/Containers/DCMenu.js')."'></script>";
			$ss->assign('SUGAR_DCJS', $dcjs);
			$ss->assign('SUGAR_DCMENU', $data['html']);
		}
		/******************END DC MENU*********************/

        //$headerTpl = $themeObject->getTemplate('header.tpl');
        $headerTpl = "iportal/themes/default/tpls/header.tpl";
        if ( isset($GLOBALS['sugar_config']['developerMode']) && $GLOBALS['sugar_config']['developerMode'] )
            $ss->clear_compiled_tpl($headerTpl);
        $ss->display($headerTpl);

        $this->includeClassicFile('modules/Administration/DisplayWarnings.php');
    }

    /*function displaySearch() {
        //No Search
    }*/


    public function process()
    {
        LogicHook::initialize();
        $this->_checkModule();

        //trackView has to be here in order to track for breadcrumbs
        $this->_trackView();

        if ($this->_getOption('show_header')) {
            $this->displayHeader();
        } else {
            $this->renderJavascript();
        }

        //taras load style.js for iportal.php
         echo '<script type="text/javascript" src="' . getJSPath('iportal/themes/default/style.js') . '"></script>';
        $this->_buildModuleList();
        $this->preDisplay();
        $this->displayErrors();
        $this->display();
        $GLOBALS['logic_hook']->call_custom_logic('', 'after_ui_frame');
        if ($this->_getOption('show_subpanels')) $this->_displaySubPanels();
        if ($this->action === 'Login') {
            //this is needed for a faster loading login page ie won't render unless the tables are closed
            ob_flush();
        }
        if ($this->_getOption('show_footer')) $this->displayFooter();
        $GLOBALS['logic_hook']->call_custom_logic('', 'after_ui_footer');
        //Do not track if there is no module or if module is not a String
        $this->_track();
    }

    //taras new function from SugarView
    protected function _displayLoginJS()
    {
        global $sugar_config;

        if(isset($this->bean->module_dir)){
            echo "<script>var module_sugar_grp1 = '{$this->bean->module_dir}';</script>";
        }
        if(isset($_REQUEST['action'])){
            echo "<script>var action_sugar_grp1 = '{$_REQUEST['action']}';</script>";
        }
        echo '<script>jscal_today = ' . (1000*strtotime($GLOBALS['timedate']->handle_offset(gmdate($GLOBALS['timedate']->get_db_date_time_format()), $GLOBALS['timedate']->get_db_date_time_format()))) . '; if(typeof app_strings == "undefined") app_strings = new Array();</script>';
        if (!is_file("include/javascript/sugar_grp1.js")) {
        	$_REQUEST['root_directory'] = ".";
        	require_once("jssource/minify_utils.php");
        	ConcatenateFiles(".");
        }
        echo '<script type="text/javascript" src="' . getJSPath('iportal/include/javascript/iportal_grp1_yui.js') . '"></script>';
        echo '<script type="text/javascript" src="' . getJSPath('iportal/include/javascript/iportal_grp1.js') . '"></script>';
		if (!is_file("cache/Expressions/functions_cache.js")) {
            $GLOBALS['updateSilent'] = true;
			include("include/Expressions/updatecache.php");
		}
		if(inDeveloperMode())
            echo '<script type="text/javascript" src="' . getJSPath('cache/Expressions/functions_cache_debug.js') . '"></script>';
		else
            echo '<script type="text/javascript" src="' . getJSPath('cache/Expressions/functions_cache.js') . '"></script>';
        echo '<script type="text/javascript" src="' . getJSPath('jscalendar/lang/calendar-' . substr($GLOBALS['current_language'], 0, 2) . '.js') . '"></script>';
        echo <<<EOQ
		<script>
			if ( typeof(SUGAR) == 'undefined' ) {SUGAR = {}};
			if ( typeof(SUGAR.themes) == 'undefined' ) SUGAR.themes = {};
		</script>
EOQ;
        if(isset( $sugar_config['disc_client']) && $sugar_config['disc_client'])
            echo '<script type="text/javascript" src="' . getJSPath('modules/Sync/headersync.js') . '"></script>';
    }

    /**
     * Called from process(). This method will display the correct javascript.
     */
     //taras new function from SugarView
    protected function _displayJavascript()
    {
        global $locale, $sugar_config;


        if ($this->_getOption('show_javascript')) {
            if (!$this->_getOption('show_header'))
                echo <<<EOHTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
EOHTML;

            echo "<script>var sugar_cache_dir = '{$GLOBALS['sugar_config']['cache_dir']}';</script>";
            echo "<script>var sugar_upload_dir = '{$GLOBALS['sugar_config']['upload_dir']}';</script>";

        	if(isset($this->bean->module_dir)){
                echo "<script>var module_sugar_grp1 = '{$this->bean->module_dir}';</script>";
            }
            if(isset($_REQUEST['action'])){
                echo "<script>var action_sugar_grp1 = '{$_REQUEST['action']}';</script>";
            }
            echo '<script>jscal_today = ' . (1000*strtotime($GLOBALS['timedate']->handle_offset(gmdate($GLOBALS['timedate']->get_db_date_time_format()), $GLOBALS['timedate']->get_db_date_time_format()))) . '; if(typeof app_strings == "undefined") app_strings = new Array();</script>';
	        if (!is_file("include/javascript/sugar_grp1.js") || !is_file("include/javascript/sugar_grp1_yui.js")) {
	        	$_REQUEST['root_directory'] = ".";
	        	require_once("jssource/minify_utils.php");
	        	ConcatenateFiles(".");
	        }
            echo '<script type="text/javascript" src="' . getJSPath('iportal/include/javascript/iportal_grp1_yui.js') . '"></script>';
            echo '<script type="text/javascript" src="' . getJSPath('iportal/include/javascript/iportal_grp1.js') . '"></script>';
            echo '<script type="text/javascript" src="' . getJSPath('jscalendar/lang/calendar-' . substr($GLOBALS['current_language'], 0, 2) . '.js') . '"></script>';

            // cn: bug 12274 - prepare secret guid for asynchronous calls
            if (!isset($_SESSION['asynchronous_key']) || empty($_SESSION['asynchronous_key'])) {
                $_SESSION['asynchronous_key'] = create_guid();
            }
            $image_server = (defined('TEMPLATE_URL'))?TEMPLATE_URL . '/':'';
            echo '<script type="text/javascript">var asynchronous_key = "' . $_SESSION['asynchronous_key'] . '";SUGAR.themes.image_server="' . $image_server . '";</script>'; // cn: bug 12274 - create session-stored key to defend against CSRF
            echo '<script type="text/javascript"> var name_format = "' . $locale->getLocaleFormatMacro() . '";</script>';
            echo $GLOBALS['timedate']->get_javascript_validation();
            if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $GLOBALS['current_language'] . '.js')) {
                require_once ('include/language/jsLanguage.php');
                jsLanguage::createAppStringsCache($GLOBALS['current_language']);
            }
            echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
            if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $this->module . '/' . $GLOBALS['current_language'] . '.js')) {
                require_once ('include/language/jsLanguage.php');
                jsLanguage::createModuleStringsCache($this->module, $GLOBALS['current_language']);
            }
            echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $this->module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
            if(isset( $sugar_config['disc_client']) && $sugar_config['disc_client'])
                echo '<script type="text/javascript" src="' . getJSPath('modules/Sync/headersync.js') . '"></script>';
            echo '<script src="' . getJSPath('include/javascript/yui3/build/yui/yui-min.js') . '" type="text/javascript"></script>';
	        if (!is_file("cache/Expressions/functions_cache.js")) {
	        	$GLOBALS['updateSilent'] = true;
	            include("include/Expressions/updatecache.php");
			}
	        if(inDeveloperMode())
	            echo '<script type="text/javascript" src="' . getJSPath('cache/Expressions/functions_cache_debug.js') . '"></script>';
	        else
	            echo '<script type="text/javascript" src="' . getJSPath('cache/Expressions/functions_cache.js') . '"></script>';
        }

        if (isset($_REQUEST['popup']) && !empty($_REQUEST['popup'])) {
            // cn: bug 12274 - add security metadata envelope for async calls in popups
            echo '<script type="text/javascript">var asynchronous_key = "' . $_SESSION['asynchronous_key'] . '";</script>'; // cn: bug 12274 - create session-stored key to defend against CSRF
        }
    }

    private function _track()
    {
        if (empty($this->responseTime)) {
            $this->_calculateFooterMetrics();
        }
        if (empty($GLOBALS['current_user']->id)) {
            return;
        }


        $trackerManager = TrackerManager::getInstance();
        $timeStamp = gmdate($GLOBALS['timedate']->get_db_date_time_format());
        //Track to tracker_perf
        if($monitor2 = $trackerManager->getMonitor('tracker_perf')){
	        $monitor2->setValue('server_response_time', $this->responseTime);
	        $dbManager = &DBManagerFactory::getInstance();
	        $monitor2->db_round_trips = $dbManager->getQueryCount();
	        $monitor2->setValue('date_modified', $timeStamp);
	        $monitor2->setValue('db_round_trips', $dbManager->getQueryCount());
	        $monitor2->setValue('files_opened', $this->fileResources);
	        if (function_exists('memory_get_usage')) {
	            $monitor2->setValue('memory_usage', memory_get_usage());
	        }
		}
	        // Track to tracker_sessions
	     if($monitor3 = $trackerManager->getMonitor('tracker_sessions')){
	        $monitor3->setValue('date_end', $timeStamp);
	        if ( !isset($monitor3->date_start) ) $monitor3->setValue('date_start', $timeStamp);
	        $seconds = strtotime($monitor3->date_end) -strtotime($monitor3->date_start);
	        $monitor3->setValue('seconds', $seconds);
	        $monitor3->setValue('user_id', $GLOBALS['current_user']->id);
		}
	    $trackerManager->save();
    }

    //taras new
     public function getMenu(
        $module = null
        )
    {
        global $current_language, $current_user, $mod_strings, $app_strings;

        if ( empty($module) )
            $module = $this->module;

        $module_menu = sugar_cache_retrieve("{$current_user->id}_{$module}_module_menu_{$current_language}");
        if ( !is_array($module_menu) ) {
            $final_module_menu = array();

             //taras
            if (file_exists('iportal/modules/' . $module . '/Menu.php')) {
                $GLOBALS['module_menu'] = $module_menu = array();
                require('iportal/modules/' . $module . '/Menu.php');
                return $module_menu;
            }
            //end taras

            if (file_exists('modules/' . $module . '/Menu.php')) {
                $GLOBALS['module_menu'] = $module_menu = array();
                require('modules/' . $module . '/Menu.php');
                $final_module_menu = array_merge($final_module_menu,$GLOBALS['module_menu'],$module_menu);
            }
            if (file_exists('custom/modules/' . $module . '/Ext/Menus/menu.ext.php')) {
                $GLOBALS['module_menu'] = $module_menu = array();
                require('custom/modules/' . $module . '/Ext/Menus/menu.ext.php');
                $final_module_menu = array_merge($final_module_menu,$GLOBALS['module_menu'],$module_menu);
            }
            if (!file_exists('modules/' . $module . '/Menu.php')
                    && !file_exists('custom/modules/' . $module . '/Ext/Menus/menu.ext.php')
                    && !empty($GLOBALS['mod_strings']['LNK_NEW_RECORD'])) {
                $final_module_menu[] = array("index.php?module=$module&action=EditView&return_module=$module&return_action=DetailView",
                    $GLOBALS['mod_strings']['LNK_NEW_RECORD'],"{$GLOBALS['app_strings']['LBL_CREATE_BUTTON_LABEL']}$module" ,$module );
                $final_module_menu[] = array("index.php?module=$module&action=index", $GLOBALS['mod_strings']['LNK_LIST'],
                    $module, $module);
                if ( ($this->bean instanceOf SugarBean) && !empty($this->bean->importable) )
                    if ( !empty($mod_strings['LNK_IMPORT_'.strtoupper($module)]) )
                        $final_module_menu[] = array("index.php?module=Import&action=Step1&import_module=$module&return_module=$module&return_action=index",
                            $mod_strings['LNK_IMPORT_'.strtoupper($module)], "Import", $module);
                    else
                        $final_module_menu[] = array("index.php?module=Import&action=Step1&import_module=$module&return_module=$module&return_action=index",
                            $app_strings['LBL_IMPORT'], "Import", $module);
            }
            if (file_exists('custom/application/Ext/Menus/menu.ext.php')) {
                $GLOBALS['module_menu'] = $module_menu = array();
                require('custom/application/Ext/Menus/menu.ext.php');
                $final_module_menu = array_merge($final_module_menu,$GLOBALS['module_menu'],$module_menu);
            }
            $module_menu = $final_module_menu;
            sugar_cache_put("{$current_user->id}_{$module}_module_menu_{$current_language}",$module_menu);
        }

        return $module_menu;
	}
    //end taras

    private function _calculateFooterMetrics()
    {
        $endTime = microtime(true);
        $deltaTime = $endTime - $GLOBALS['startTime'];
        $this->responseTime = number_format(round($deltaTime, 2), 2);
        // Print out the resources used in constructing the page.
        $included_files = get_included_files();
        // take all of the included files and make a list that does not allow for duplicates based on case
        // I believe the full get_include_files result set appears to have one entry for each file in real
        // case, and one entry in all lower case.
        $list_of_files_case_insensitive = array();
        foreach($included_files as $key => $name) {
            // preserve the first capitalization encountered.
            $list_of_files_case_insensitive[mb_strtolower($name) ] = $name;
        }
        $this->fileResources = sizeof($list_of_files_case_insensitive);
    }


      /**
     * Called from process(). This method will display the footer on the page.
     */
    function displayFooter() {
        global $sugar_config;
        global $app_strings;
        
        //decide whether or not to show themepicker, default is to show
        $showThemePicker = true;
        if (isset($sugar_config['showThemePicker'])) {
            $showThemePicker = $sugar_config['showThemePicker'];
        }

        echo "<!-- crmprint -->";
        $jsalerts = new jsAlerts();
        if ( !isset($_SESSION['isMobile']) )
            echo $jsalerts->getScript();
        
        $ss = new Sugar_Smarty();
        $ss->assign("AUTHENTICATED",isset($_SESSION["authenticated_user_id"]));
        $ss->assign('MOD',return_module_language($GLOBALS['current_language'], 'Users'));
        $copyright = '&copy; 2010 <a href="http://www.lampadaglobal.com" target="_blank" class="copyRightLink">Lampada Global.</a> All Rights Reserved.<br>';
        $attribLinkImg = "<A href='http://www.lampadaglobal.com' target='_blank'><img style='margin-top: 2px' border='0' width='120' height='31' src='iportal/include/images/poweredby_lampada.png' alt='Powered By Lampada Global'></A>\n";
		if(file_exists('include/images/poweredby_sugarcrm.png')){
			$copyright .= $attribLinkImg;
		}
        // End Required Image
        $ss->assign('COPYRIGHT',$copyright);
        $ss->display(SugarThemeRegistry::current()->getTemplate('footer.tpl'));
    }

    // Davi - displaying subpanels with iportal subpanels classes
    // this way we can use subpaneldefs.php inside iportal modules
    protected function _displaySubPanels()
    {
        if (isset($this->bean) && !empty($this->bean->id) && (file_exists('modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/Ext/Layoutdefs/layoutdefs.ext.php'))) {
            $GLOBALS['focus'] = $this->bean;
            //require_once ('include/SubPanel/SubPanelTiles.php');
            //$subpanel = new SubPanelTiles($this->bean, $this->module);
            require_once ('iportal/include/SubPanel/IportalSubPanelTiles.php');
              $subpanel = new IportalSubPanelTiles($this->bean, $this->module);
            echo $subpanel->display();
        }
    }
    /*function displaySubPanels()
    {
    	$GLOBALS['focus'] = $this->bean;
        require_once ('iportal/include/SubPanel/IportalSubPanelTiles.php');
        $subpanel = new IportalSubPanelTiles($this->bean, $this->module);
       	echo $subpanel->display();
    }  */
    // end Davi
    
}


?>