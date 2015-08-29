<?php


?>
<form id="itemset-form">
<div id="item-build-region no-select">
    <div class="item-build-region-top">
        <div class="item-build-info">
            <h1>Build Panel</h1>
            <div class="item-build-info-top">
                <div id="champ-image-wrap">
                </div>
                <p>
                    Drag and drop items from the item crate directly onto the build panel to build your item set.
                    Simply click the new group button to add a new item group, rename and delete existing groups to fully customise your item set.
                </p>
            </div>
            <p>Some useful tips:</p>
            <ul>
                <li>Drag an item from the item crate to add it to your item set.</li>
                <li>To remove an item, simply click the filed slot.</li>
                <li>To add a new item group, click the "New Item Group" button.</li>
                <li>To remove an item group, select the cog, then click "Remove".</li>
                <li>To rename an item group, select the cog, then click "Rename".</li>
            </ul>

            <div id="add-group" onclick="addGroup()">
                <img src="/img/icons/add.png">
                <h4>Add a new group</h4>
            </div>
            <div id="save-set" onclick="downloadItemSet()">
                <img src="/img/icons/save.png">
                <h4>Download your Item Set</h4>
            </div>
            <hr style="margin:0px;">
            <div class="item-build-group-wrapper">
                <div class="item-build-group">
                    <div class="item-build-settings">
                        <input class="item-build-settings-name" data-groupid="0" type="text" name="group[0][name]" value="Item Group 0" readonly>
                        <img onclick="toggleSettings(this)" class="item-build-settings-icon" src="/img/icons/settings.png">
                    </div>
                    <div class="item-build-slot"></div>
                </div>
            </div>
        </div>
        <div id="item-build-storage-wrap">
            <img class="infographic" src="/img/infographic.png">
            <ul id="item-build-storage">
                <h3 class="item-build-storage-head">Item Crate</h3>

            </ul>
        </div>
    </div>
</div>
</form>

