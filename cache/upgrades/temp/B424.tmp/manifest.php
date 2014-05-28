    <?php
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2010 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

    $manifest = array (
         'acceptable_sugar_versions' => 
          array (
            
          ),
          'acceptable_sugar_flavors' =>
          array(
            'CE', 'PRO','ENT'
          ),
          'readme'=>'',
          'key'=>'LCHAT',
          'author' => 'LIVECHAT',
          'description' => 'LiveChat - SugarCRM integration system.',
          'icon' => '',
          'is_uninstallable' => true,
          'name' => 'LiveChat',
          'published_date' => '2010-07-21 09:54:09',
          'type' => 'module',
          'version' => '1279706049',
          'remove_tables' => 'prompt',
          );
$installdefs = array (
  'id' => 'LiveChat',
  'beans' => 
  array (
    0 => 
    array (
      'module' => 'LCHAT_ChatTranscript',
      'class' => 'LCHAT_ChatTranscript',
      'path' => 'modules/LCHAT_ChatTranscript/LCHAT_ChatTranscript.php',
      'tab' => true,
    ),
  ),
  'layoutdefs' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/Accounts.php',
      'to_module' => 'Accounts',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/Leads.php',
      'to_module' => 'Leads',
    ),
    2 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/Contacts.php',
      'to_module' => 'Contacts',
    ),
    3 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/Opportunities.php',
      'to_module' => 'Opportunities',
    ),
  ),
  'relationships' => 
  array (
    0 => 
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/lchat_chattranscript_accountsMetaData.php',
    ),
    1 => 
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/lchat_chattranscript_leadsMetaData.php',
    ),
    2 => 
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/lchat_chattranscript_contactsMetaData.php',
    ),
    3 => 
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/lchat_chattranscript_opportunitiesMetaData.php',
    ),
  ),
  'image_dir' => '<basepath>/icons',
  'copy' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/modules/LCHAT_ChatTranscript',
      'to' => 'modules/LCHAT_ChatTranscript',
    ),
  ),
  'language' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/LCHAT_ChatTranscript.php',
      'to_module' => 'LCHAT_ChatTranscript',
      'language' => 'en_us',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'en_us',
    ),
    2 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/LCHAT_ChatTranscript.php',
      'to_module' => 'LCHAT_ChatTranscript',
      'language' => 'en_us',
    ),
    3 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'en_us',
    ),
    4 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/LCHAT_ChatTranscript.php',
      'to_module' => 'LCHAT_ChatTranscript',
      'language' => 'en_us',
    ),
    5 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'en_us',
    ),
    6 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/LCHAT_ChatTranscript.php',
      'to_module' => 'LCHAT_ChatTranscript',
      'language' => 'en_us',
    ),
    7 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/Opportunities.php',
      'to_module' => 'Opportunities',
      'language' => 'en_us',
    ),
    8 => 
    array (
      'from' => '<basepath>/SugarModules/language/application/en_us.lang.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),
  ),
  'vardefs' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/LCHAT_ChatTranscript.php',
      'to_module' => 'LCHAT_ChatTranscript',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/Accounts.php',
      'to_module' => 'Accounts',
    ),
    2 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/LCHAT_ChatTranscript.php',
      'to_module' => 'LCHAT_ChatTranscript',
    ),
    3 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/Leads.php',
      'to_module' => 'Leads',
    ),
    4 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/LCHAT_ChatTranscript.php',
      'to_module' => 'LCHAT_ChatTranscript',
    ),
    5 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/Contacts.php',
      'to_module' => 'Contacts',
    ),
    6 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/LCHAT_ChatTranscript.php',
      'to_module' => 'LCHAT_ChatTranscript',
    ),
    7 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/Opportunities.php',
      'to_module' => 'Opportunities',
    ),
  ),
  'layoutfields' => 
  array (
    0 => 
    array (
      'additional_fields' => 
      array (
      ),
    ),
    1 => 
    array (
      'additional_fields' => 
      array (
      ),
    ),
    2 => 
    array (
      'additional_fields' => 
      array (
      ),
    ),
    3 => 
    array (
      'additional_fields' => 
      array (
      ),
    ),
  ),
);