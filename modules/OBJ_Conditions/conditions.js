$.noConflict();
jQuery(document).ready(function($){
	after_load();
	$("#attribute").bind("change",attribute);
});
var attribute=function(){
	jQuery("#change_attribute").val("need_clear");
	this.form.submit();
}

var yui_get_url=function(){
	var url=window.location;
	var pos=url.toString().indexOf("index.php")
	var theurl=url.toString().substring(0,pos);
	return theurl;
};

var after_load=function(){
	var html="<input id='change_attribute' name='change_attribute' type='hidden' value='' />";
	jQuery("#EditView_tabs").append(html);
	var is_change=jQuery("#is_from_change").val();
	if(is_change=="need_clear"){
		jQuery("#condition_value").val("");
	}
	
    var attribute_value = jQuery("#attribute").val(); 
    var indicator_id = jQuery("#indicator_id").val();
    sUrl = yui_get_url()+"index.php?module=OBJ_Conditions&action=check_audit&attribute_value="+attribute_value+"&indicator_id="+indicator_id
    jQuery.ajax({
     type:"post",
     url: sUrl,
     async: false, 
     cache: false,
     success:function(data){
    	var audit = JSON.parse(data);
    	if(audit.result == "1"){
    		jQuery("#is_audit").remove();
    		jQuery("#attribute").after("<div class=error><input type=hidden name=is_audit value=1>There is audit record for this fields</div>");
    	} else {
    		jQuery("#is_audit").remove();
    		jQuery("#attribute").after("<div class=error><input type=hidden name=is_audit value=0>There is no audit record for this fields</div>");
    	
    	}
     }
  });
}

