{if $DOCUMENTS_MODULE}
&nbsp;<input title="{$APP.LBL_BROWSE_DOCUMENTS_BUTTON_TITLE}" accessKey="{$APP.LBL_BROWSE_DOCUMENTS_BUTTON_KEY}" type="button" class="button" value="{$APP.LBL_BROWSE_DOCUMENTS_BUTTON_LABEL}" onclick='open_popup("Documents", 600, 400, "&caller=Documents", true, false, "");' />
{/if}
<span class='white-space'>
	&nbsp;&nbsp;&nbsp;{if $SAVED_SEARCHES_OPTIONS}|&nbsp;&nbsp;&nbsp;<b>{$APP.LBL_SAVED_SEARCH_SHORTCUT}</b>&nbsp;
	{$SAVED_SEARCHES_OPTIONS} {/if}
	<span id='go_btn_span' style='display:none'><input tabindex='2' title='go_select' id='go_select'  onclick='SUGAR.searchForm.clear_form(this.form);' class='button' type='button' name='go_select' value=' {$APP.LBL_GO_BUTTON_LABEL} '/></span>
</span>
</form>
{literal}
<script>
	function toggleInlineSearch(){
		if (document.getElementById('inlineSavedSearch').style.display == 'none'){
			document.getElementById('showSSDIV').value = 'yes'		
			document.getElementById('inlineSavedSearch').style.display = '';
{/literal}			
			document.getElementById('up_down_img').src='{sugar_getimagepath file="basic_search.gif"}';
{literal}
		}else{
{/literal}			
			document.getElementById('up_down_img').src='{sugar_getimagepath file="advanced_search.gif"}';
{literal}			
			document.getElementById('showSSDIV').value = 'no';		
			document.getElementById('inlineSavedSearch').style.display = 'none';		
		}
	}


</script>
{/literal}
