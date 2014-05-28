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
$mod_strings = array (
  'LBL_ASSIGNED_TO_ID' => 'Assigned User Id',
  'LBL_ASSIGNED_TO_NAME' => 'User Name',
  'LBL_ID' => 'ID',
  'LBL_DATE_ENTERED' => 'Date Created',
  'LBL_DATE_MODIFIED' => 'Date Modified',
  'LBL_MODIFIED' => 'Modified By',
  'LBL_MODIFIED_ID' => 'Modified By Id',
  'LBL_MODIFIED_NAME' => 'Modified By Name',
  'LBL_CREATED' => 'Created By',
  'LBL_CREATED_ID' => 'Created By Id',
  'LBL_DESCRIPTION' => 'Description',
  'LBL_DELETED' => 'Deleted',
  'LBL_NAME' => 'Name',
  'LBL_CREATED_USER' => 'Created by User',
  'LBL_MODIFIED_USER' => 'Modified by User',
  'LBL_LIST_NAME' => 'Name',
  'LBL_LIST_FORM_TITLE' => 'Objectives List',
  'LBL_MODULE_NAME' => 'Objectives',
  'LBL_MODULE_TITLE' => 'Objectives',
  'LBL_HOMEPAGE_TITLE' => 'My Objectives',
  'LNK_NEW_RECORD' => 'Create Objectives',
  'LNK_LIST' => 'View Objectives',
  'LNK_IMPORT_OBJ_OBJECTIVES' => 'Import Objectives',
  'LBL_SEARCH_FORM_TITLE' => 'Search Objectives',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'View History',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activities',
  'LBL_OBJ_OBJECTIVES_SUBPANEL_TITLE' => 'Objectives',
  'LBL_NEW_FORM_TITLE' => 'New Objectives',
  'LBL_OBJECTIVE_VALUE' => 'Objective Value',
  'LBL_DEFAULT_OBJECTIVE_VALUE' => 'Default Objective Value',
  'LBL_CURRENT_VALUE' => 'Current Value',
  'LBL_INDICATOR_ID' => 'Indicator',
  'LBL_VALUE_TYPE' => 'Objective Value Type',
  'LBL_REFERENCE_DATE' => 'Reference Date',
  'LBL_OBJ_TYPE' => 'Objective Status',
  'LBL_CHECK_USER_FIELD' => 'Check On User Field',
  'LBL_ADDITIONAL_GROUP_USERS' => 'Additional Users',
  'LBL_GROUPS' => 'Groups',
  'LBL_HISTORY_LOADED' => 'History Loaded',
  'LBL_DISPLAY_IN_PERCENTAGE' => 'Objective values displayed in percentage',

  'LNK_NEW_OBJECTIVE' => 'Create Objectives',
  'LNK_LIST_OBJECTIVES' => 'View Objectives',
  'LNK_NEW_INDICATOR' => 'Create Indicators',
  'LNK_LIST_INDICATORS' => 'View Indicators',
  'LNK_NEW_CONDITION' => 'Create Conditions',
  'LNK_LIST_CONDITIONS' => 'View Conditions',

  'WARN' => 'Warning on Objectives Chart Result:	 ',
  'WARN_NO_INDICATOR_ERROR' => 'No indicator is assigned for Objective: ',
  'WARN_NO_MODULE_ERROR' => ' module is not available for Objective: ',
  'WARN_NO_ATTRIBUTE_ERROR' => ' field is not available for Objective: ',
  'WARN_EMPTY_ATTRIBUTE_ERROR' => 'No object attribute when processing Objective: ',
  'WARN_NO_AUDIT_ERROR' => ' audited field is required for Objective: ',
  'WARN_CHECK_USER' => ' There is no audit table to check  "Was Assigned To" and "Assigned By"  ',
  'WARN_NO_HISTORY_ERROR' => 'Reference date is before creation of Objective: ',
  
  'ERROR_NOT_A_NUMBER' => 'Objective value should be a number.',
  'ERROR_DUPLICATE_USER' => 'This user has been assigned.',

  'HELP_OBJECTIVE_NAME' => '<B>Name</B> that displays on the title of chart dashlet.',
  'HELP_INDICATOR' => '<B>Indicator</B> that chosen for this objective.',
  'HELP_OBJECTIVE_VALUE_TYPE' => '<B>Objective Value Type</B> that determines <I>Single</I> value or <I>Multiple</I> values.<br />' .
  								'<I>Single</I> that provides a standard objective value for all the users.<br />' .
  								'<I>Multiple</I> that provides individual objective value for each user.',
  'HELP_OBJECTIVE_VALUE' => '<B>Objective Value</B> that is the reference value estimated to compare with the actual value. ' .
  							'If it is not defined, the default value is 0.',
  'LBL_DIRECTION'=> 'Objective achieved',
);
?>
