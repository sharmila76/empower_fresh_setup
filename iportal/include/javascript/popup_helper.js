/**
 *
 * Popup helper functions
 *
 * The contents of this file are subject to the SugarCRM Professional Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/products/sugar-professional-eula.html
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2009 SugarCRM, Inc.; All Rights Reserved.
 */
function send_back(module,id)
{var associated_row_data=associated_javascript_data[id];eval("var temp_request_data = "+window.document.forms['popup_query_form'].request_data.value);if(temp_request_data.jsonObject){var request_data=temp_request_data.jsonObject;}else{var request_data=temp_request_data;}
var passthru_data=Object();if(typeof(request_data.passthru_data)!='undefined')
{passthru_data=request_data.passthru_data;}
var form_name=request_data.form_name;var field_to_name_array=request_data.field_to_name_array;var call_back_function=eval("window.opener."+request_data.call_back_function);var array_contents=Array();for(var the_key in field_to_name_array)
{if(the_key!='toJSON')
{var the_name=field_to_name_array[the_key];var the_value='';if(module!=''&&id!='')
{if(the_key.toUpperCase()=='USER_NAME'&&typeof(is_show_fullname)!='undefined'&&is_show_fullname&&form_name!='search_form'){the_value=associated_row_data['FULL_NAME'];}
else{the_value=associated_row_data[the_key.toUpperCase()];}}
if(typeof(the_value)=='string'){the_value=the_value.replace(/\r\n/g,'\\n');}
array_contents.push('"'+the_name+'":"'+the_value+'"');}}
eval("var name_to_value_array = {"+array_contents.join(",")+"}");var result_data={"form_name":form_name,"name_to_value_array":name_to_value_array,"passthru_data":passthru_data};var close_popup=window.opener.get_close_popup();call_back_function(result_data);if(close_popup)
{window.close();}}
function send_back_teams(module,form,field,error_message,request_data,form_team_id){var array_contents=Array();if(form_team_id){array_contents.push(form_team_id);}else{var j=0;for(i=0;i<form.elements.length;i++){if(form.elements[i].name==field){if(form.elements[i].checked==true){array_contents.push(form.elements[i].value);}}}}
if(array_contents.length==0){window.alert(error_message);return;}
var field_to_name_array=request_data.field_to_name_array;var array_teams=new Array();for(team_id in array_contents){if(typeof array_contents[team_id]=='string'){var team={"team_id":associated_javascript_data[array_contents[team_id]].ID,"team_name":associated_javascript_data[array_contents[team_id]].NAME};array_teams.push(team);}}
var passthru_data=Object();if(typeof request_data.call_back_function=='undefined'&&typeof request_data=='object'){request_data=YAHOO.lang.JSON.parse(request_data.value);}
if(typeof(request_data.passthru_data)!='undefined')
{passthru_data=request_data.passthru_data;}
var form_name=request_data.form_name;var field_name=request_data.field_name;var call_back_function=eval("window.opener."+request_data.call_back_function);var result_data={"form_name":form_name,"field_name":field_name,"teams":array_teams,"passthru_data":passthru_data};var close_popup=window.opener.get_close_popup();call_back_function(result_data);if(close_popup)
{window.close();}}
function send_back_selected(module,form,field,error_message,request_data)
{var array_contents=Array();var j=0;for(i=0;i<form.elements.length;i++){if(form.elements[i].name==field){if(form.elements[i].checked==true){++j;array_contents.push('"'+"ID_"+j+'":"'+form.elements[i].value+'"');}}}
if(array_contents.length==0){window.alert(error_message);return;}
eval("var selection_list_array = {"+array_contents.join(",")+"}");eval("var temp_request_data = "+window.document.forms['popup_query_form'].request_data.value);if(temp_request_data.jsonObject){var request_data=temp_request_data.jsonObject;}else{var request_data=temp_request_data;}
var passthru_data=Object();if(typeof(request_data.passthru_data)!='undefined')
{passthru_data=request_data.passthru_data;}
var form_name=request_data.form_name;var field_to_name_array=request_data.field_to_name_array;var call_back_function=eval("window.opener."+request_data.call_back_function);var result_data={"form_name":form_name,"selection_list":selection_list_array,"passthru_data":passthru_data};var close_popup=window.opener.get_close_popup();call_back_function(result_data);if(close_popup)
{window.close();}}
function toggleMore(spanId,img_id,module,action,params){toggle_more_go=function(){oReturn=function(body,caption,width,theme){return overlib(body,CAPTION,caption,STICKY,MOUSEOFF,1000,WIDTH,width,CLOSETEXT,('<img border=0 style="margin-left:2px; margin-right: 2px;" src=themes/'+theme+'/images/close.gif>'),CLOSETITLE,'Click to Close',CLOSECLICK,FGCLASS,'olFgClass',CGCLASS,'olCgClass',BGCLASS,'olBgClass',TEXTFONTCLASS,'olFontClass',CAPTIONFONTCLASS,'olCapFontClass',CLOSEFONTCLASS,'olCloseFontClass',REF,spanId,REFC,'LL',REFX,13);}
success=function(data){eval(data.responseText);SUGAR.util.additionalDetailsCache[spanId]=new Array();SUGAR.util.additionalDetailsCache[spanId]['body']=result['body'];SUGAR.util.additionalDetailsCache[spanId]['caption']=result['caption'];SUGAR.util.additionalDetailsCache[spanId]['width']=result['width'];SUGAR.util.additionalDetailsCache[spanId]['theme']=result['theme'];ajaxStatus.hideStatus();return oReturn(SUGAR.util.additionalDetailsCache[spanId]['body'],SUGAR.util.additionalDetailsCache[spanId]['caption'],SUGAR.util.additionalDetailsCache[spanId]['width'],SUGAR.util.additionalDetailsCache[spanId]['theme']);}
if(typeof SUGAR.util.additionalDetailsCache[spanId]!='undefined')
return oReturn(SUGAR.util.additionalDetailsCache[spanId]['body'],SUGAR.util.additionalDetailsCache[spanId]['caption'],SUGAR.util.additionalDetailsCache[spanId]['width'],SUGAR.util.additionalDetailsCache[spanId]['theme']);if(typeof SUGAR.util.additionalDetailsCalls[spanId]!='undefined')
return;ajaxStatus.showStatus(SUGAR.language.get('app_strings','LBL_LOADING'));url='iportal.php?module='+module+'&action='+action+'&'+params;SUGAR.util.additionalDetailsCalls[spanId]=YAHOO.util.Connect.asyncRequest('GET',url,{success:success,failure:success});return false;}
SUGAR.util.additionalDetailsRpcCall=window.setTimeout('toggle_more_go()',250);}
