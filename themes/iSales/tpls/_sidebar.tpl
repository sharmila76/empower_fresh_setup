<div class="fixed sidebar" id="sidebarDiv">
    {if $shortcutTopMenu[$smarty.request.module]}
    <div class="actionModule sidebarModule">
        <div class="sidebarModuleHeader brandPrimaryBgr">
            <h2 class="brandPrimaryFgr">{$APP.LBL_LINK_ACTIONS}</h2>
        </div>
        <div class="sidebarModuleBody">
            {foreach from=$shortcutTopMenu[$smarty.request.module] item=item}
                <div class="mruItem">
                    {if $item.URL == "-"}
                        <a></a><span>&nbsp;</span>
                    {else}
                        <a href="{$item.URL}" {if $item.TARGET} target="{$item.TARGET}"{/if}>{$item.IMAGE}&nbsp;&nbsp;<span>{$item.LABEL}</span></a>
                    {/if}
                </div>
            {/foreach}
        </div>
    </div>
    {/if}
    <div class="recentItemModule sidebarModule">
        <div class="sidebarModuleHeader brandPrimaryBgr">
            <h2 class="brandPrimaryFgr">{$APP.LBL_LAST_VIEWED}</h2>
        </div>
        <div class="sidebarModuleBody">
            {foreach from=$recentRecords item=item name=lastViewed}
                <div class="mruItem">
                <a title="{$item.item_summary}"
                   accessKey="{$smarty.foreach.lastViewed.iteration}"
                   href="{sugar_link module=$item.module_name action='DetailView' record=$item.item_id link_only=1}">
                    {$item.image}&nbsp;&nbsp;<span>{$item.item_summary_short}</span>
                </a>
                </div>
                {foreachelse}
                {$APP.NTC_NO_ITEMS_DISPLAY}
            {/foreach}
        </div>
    </div>
</div>