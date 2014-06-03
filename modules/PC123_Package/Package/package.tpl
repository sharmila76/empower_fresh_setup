<div id="suits_and_packages">  
    <div class="list_of_suits">
        <ul class="sortable-list">
            {counter start=0 name="suiteCounter" print=false assign="suiteCounter"}
            {foreach from=$availableSuiteList key='key' item='value'}
                <li class="suite_name" name="suite_name[]" id="suite{$suiteCounter}" value={$value}>{$value}</li>
                    {counter name="suiteCounter"}
                {/foreach}
        </ul>
    </div>
    <div class="suits_under_package">
        <div id="package_name">
            <label>Enter package name</label>
            <input type="text" name="package_name" /></br>
            <label>Select Number of users</label>
            <select>
                <option>1 - 10 users</option>
                <option>1 - 20 users</option>
                <option>1 - 50 users</option>
            </select></br>
            <label>Select Number of months</label>
            <select>
                <option>1 Month</option>
                <option>3 - Months</option>
                <option>6 - Months</option>
            </select></br>            
        </div>
        <div id="drop_here">
            <i>drop suits here</i>
        </div>
        <div class="sortable-list sortable-item">

        </div>
        <input type="submit" id="add_package" name="add_package" value="Add Package" />
    </div>

</div>

{literal}
    <style type='text/css'>
        #droppable {
            width: 100px;
            height: 100px;
            border: 1px solid black;
        }
        #package_name {
            background-color: #FFFFFF;
            padding: 10px;
            border: 1px solid gray;
        }
        #drop_here {
            background-color: #E2E2E2;
            padding: 10px;
        }
        .sortable-list { 
            background-color: #E2E2E2;
            list-style: none outside none;
            margin: 0;
            min-height: 60px;
            padding: 10px;
        }
        .suite_name {            
            background-color: #FFFFFF;
            border: 1px solid #000000;
            cursor: move;
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            padding: 4px 0;
            text-align: center;
        }
        .list_of_suits {            
            float: left;
            width: 22%;
        }
        .suits_under_package {            
            float: left;
            margin-left: 40px;
            //width: 22%;
        }
    </style>
{/literal}
{literal}
    <script type='text/javascript' src="modules/PC123_Package/Package/package.js"></script>
{/literal}
