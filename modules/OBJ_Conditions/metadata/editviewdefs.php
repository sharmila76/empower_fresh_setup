<?php
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2010 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

$module_name = 'OBJ_Conditions';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
	  'includes'=>
      array(
      	0=>array(
      		'file'=>'modules/OBJ_Conditions/jquery-1.7.1.min.js'
      	),
      	1=>array(
      		'file'=>'modules/OBJ_Conditions/conditions.js'
      	),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'indicator_id',
            'studio' => 'visible',
            'label' => 'LBL_INDICATOR_NAME',
            'popupHelp' => 'HELP_CONDITION_INDICATOR',
            'displayParams' => 
            array (
              'javascript' => 'onchange="this.form.action.value=\'EditView\';disableOnUnloadEditView(this.form);this.form.submit();"',
            ),
          ),
          1 => 
          array (
            'name' => 'name',
            'studio' => 'visible',
            'label' => 'LBL_NAME',
            'popupHelp' => 'HELP_CONDITION_NAME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'attribute',
            'studio' => 'visible',
            'label' => 'LBL_ATTRIBUTE',
            'popupHelp' => 'HELP_CONDITION_ATTRIBUTE',
            'displayParams' => 
            array (
              'javascript' => 'onchange="this.form.action.value=\'EditView\';disableOnUnloadEditView(this.form);"',
            ),
          ),
          1 => 
          array (
            'name' => 'condition_value',
            'studio' => 'visible',
            'label' => 'LBL_CONDITION_VALUE',
          ),
        ),
      ),
    ),
  ),
);

?>