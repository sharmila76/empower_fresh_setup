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
  'LBL_ASSIGNED_TO_NAME' => 'User',
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
  'LBL_LIST_NAME' => 'Indicator Name',
  'LBL_LIST_FORM_TITLE' => 'Indicator List',
  'LBL_MODULE_NAME' => 'Indicators',
  'LBL_MODULE_TITLE' => 'Indicators',
  'LBL_HOMEPAGE_TITLE' => 'My Indicator',
  'LNK_NEW_RECORD' => 'Create Indicator',
  'LNK_LIST' => 'View Indicator',
  'LNK_IMPORT_OBJ_INDICATOR' => 'Import Indicator',
  'LBL_SEARCH_FORM_TITLE' => 'Search Indicator',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'View History',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activities',
  'LBL_OBJ_INDICATOR_SUBPANEL_TITLE' => 'Indicator',
  'LBL_NEW_FORM_TITLE' => 'New Indicator',
  'LBL_OBJECT' => 'Module',
  'LBL_OPERATION' => 'Operation',
  'LBL_PERIOD' => 'Period',
  'LBL_ATTRIBUTE' => 'Field to aggregate',
  'LBL_SUBPANEL_CONDITIONS' => 'Conditions',

  'LNK_NEW_OBJECTIVE' => 'Create Objectives',
  'LNK_LIST_OBJECTIVES' => 'View Objectives',
  'LNK_NEW_INDICATOR' => 'Create Indicators',
  'LNK_LIST_INDICATORS' => 'View Indicators',
  'LNK_NEW_CONDITION' => 'Create Conditions',
  'LNK_LIST_CONDITIONS' => 'View Conditions',

  'HELP_INDICATOR_TARGET' => '<B>Module</B> that is the core of objective, all the other fields are refered to.',
  'HELP_INDICATOR_NAME' => '<B>Name</B> that displays in both Objectives and Conditions.',
  'HELP_INDICATOR_OPERATION' => '<B>Operation</B> that lists aggregative functions available for objective processing.<br />' .
  							'If <I>Field to aggregate</I> is empty, "Count" is saved automatically.',
  'HELP_INDICATOR_PERIOD' => '<B>Period</B> that defines the period of one objective.<br />' .
  							'e.g. If <I>Period</I> is "1 Month", then objective is referenced by natural month, starts from the first to the end of the month. The current month depends on the <I>Reference Date</I> chosen on the result chart options. ' .
  							'There are 12 months per year, so number 1,2,3,4,6 is available for <I>Period</I> "Month".',
  'HELP_INDICATOR_ATTRIBUTE' => '<B>Field to aggregate</B> that is a numerical field from <I>Module</I>, that works with aggregative <I>Operation</I>',
  'HELP_INDICATOR_DIRECTION' => 'that determines objective achievement.<br />' .
  								'e.g. objective "Number of bugs" when you reach the value, you are failed.',
);
?>
