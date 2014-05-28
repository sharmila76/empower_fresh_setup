<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
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


include ('include/MVC/preDispatch.php');
$startTime = microtime(true);
require_once('include/entryPoint.php');
ob_start();
require_once('include/MVC/SugarApplication.php');
$app = new SugarApplication();
$app->startSession();
$app->execute();

$freichatx_code_written = true;

function freichatx_get_hash(){

       if(is_file("freichat/hardcode.php")){

               require('freichat/hardcode.php');
				if(isset($_SESSION['authenticated_user_id']))
				{

				$temp_id=$_SESSION['authenticated_user_id'].$uid;

				}
				else
				{
				$temp_id='0'.$uid;
				}

               return md5($temp_id);

       }
       else
       {
               echo "<script>alert('module freichatx says: hardcode.php file not
found!');</script>";
       }

       return 0;
}

function freichatx_get_id()
{
	if(isset($_SESSION['authenticated_user_id']))
	{
	 $id = $_SESSION['authenticated_user_id'];
	}
	else
	{
	 $id = '0';
	}

 return $id;
}

$freichatx_html=ob_get_clean();
$html='<script type="text/javascript" language="javascipt" src="http://localhost:8085/empower/freichat/client/main.php?id='.freichatx_get_id().'&xhash='.freichatx_get_hash().'"></script>
<link rel="stylesheet" href="http://localhost:8085/empower/freichat/client/jquery/freichat_themes/freichatcss.php" type="text/css"></head>';
$freichatx_html=str_replace("</head>",$html,$freichatx_html);
echo $freichatx_html;

?>
