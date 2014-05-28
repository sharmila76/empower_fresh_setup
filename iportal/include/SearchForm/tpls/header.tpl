<script type="text/javascript" src="{sugar_getjspath file='iportal/include/javascript/popup_parent_helper.js'}"></script>
{$TABS}
{{if $displayView == saved_views }}
{literal}
<script>SUGAR.savedViews.handleForm();</script>
{/literal}
{{/if}}
<form name='search_form' id='search_form' class='search_form' method='post' action='iportal.php?module={$module}&action={$action}'>
<input type='hidden' name='searchFormTab' value='{$displayView}'/>
<input type='hidden' name='module' value='{$module}'/>
<input type='hidden' name='action' value='{$action}'/> 
<input type='hidden' name='query' value='true'/>
{foreach name=tabIteration from=$TAB_ARRAY key=tabkey item=tabData}
<div id='{$module}{$tabData.name}_searchSearchForm' style='{$tabData.displayDiv}' class="edit view search">{if $tabData.displayDiv}{else}{$return_txt}{/if}</div>
{/foreach}
<div id='{$module}saved_viewsSearchForm' {{if $displayView != 'saved_views'}}style='display: none';{{/if}}>{$saved_views_txt}</div>
