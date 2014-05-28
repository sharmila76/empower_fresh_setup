<input type="text" name="{{sugarvar key='name'}}" class={{if empty($displayParams.class) }}"sqsEnabled"{{else}} "{{$displayParams.class}}" {{/if}} tabindex="{{$tabindex}}" id="{{sugarvar key='name'}}" size="{{$displayParams.size}}" value="{{sugarvar key='value'}}" title='{{$vardef.help}}' autocomplete="off" {{$displayParams.readOnly}} {{$displayParams.field}}>
<input type="hidden" name="{{sugarvar key='id_name'}}" id="{{sugarvar key='id_name'}}" value="{{sugarvar memberName='vardef.id_name' key='value'}}">
{{if empty($displayParams.hideButtons) }}
<input type="button" name="btn_{{sugarvar key='name'}}" id="btn_{{sugarvar key='name'}}" tabindex="{{$tabindex}}" title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" class="button" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick='open_popup("{{sugarvar key='module'}}", 600, 400, "{{$displayParams.initial_filter}}", true, false, {{$displayParams.popupData}}, "single", true);' {{if isset($displayParams.javascript.btn)}}{{$displayParams.javascript.btn}}{{/if}}>
{{if empty($displayParams.selectOnly) }}
<input type="button" name="btn_clr_{{sugarvar key='name'}}" id="btn_clr_{{sugarvar key='name'}}" tabindex="{{$tabindex}}" title="{$APP.LBL_CLEAR_BUTTON_TITLE}" accessKey="{$APP.LBL_CLEAR_BUTTON_KEY}" class="button" onclick="this.form.{{sugarvar key='name'}}.value = ''; this.form.{{sugarvar key='id_name'}}.value = '';" value="{$APP.LBL_CLEAR_BUTTON_LABEL}" {{if isset($displayParams.javascript.btn_clear)}}{{$displayParams.javascript.btn_clear}}{{/if}}>
{{/if}}
{{/if}}
{{if !empty($displayParams.allowNewValue) }}
<input type="hidden" name="{{sugarvar key='name'}}_allow_new_value" id="{{sugarvar key='name'}}_allow_new_value" value="true">
{{/if}}
<script type="text/javascript">
<!--
enableQS(false);
-->
</script>
