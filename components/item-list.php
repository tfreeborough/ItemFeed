<?php
/*
 * Setup the html needed for the itemslist
 */
include('../api/api.php');

$itemlist = new api;
$itemlist = $itemlist->getItems();


$baseURL = "http://ddragon.leagueoflegends.com/cdn/5.16.1/img/item/";
$tags = array();
?>
<div id="items-list">
    <input class="search" onkeyup="searchItemList(this)" placeholder="Search" />
<h3>Items</h3>
<ul class="item-list mCustomScrollbar" data-mcs-theme="rounded-dots"> <?php

foreach ($itemlist as $key => $item) {
    $itemname = $key.'.png';
    $itemURL = $baseURL . urlencode($itemname);
    print '<li onclick="dragItem(this)" class="item-list-element" data-itemid="'.$key.'"><img src="'.$itemURL.'"><p class="name">'.$item[0].'</p></li>';

}
?> </ul>
</div>
