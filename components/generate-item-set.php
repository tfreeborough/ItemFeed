
<?php
include('../api/api.php');
if(isset($_GET)){
    $set = $_GET;
    $itemset = array();
    $itemset['title'] = $set['name'];
    $itemset['type'] = "custom";
    $itemset['map'] = $set['map'];
    $itemset['mode'] = "any";
    $itemset['priority'] = true;
    $itemset['sortrank'] = 1337;
    $itemset['blocks'] = array();
    foreach($set['group'] as $groupKey => $group){
        $block = array();
        $block['type'] = $group['name'];
        $block['recMath'] = false;
        $block['minSummonerLevel'] = -1;
        $block['maxSummonerLevel'] = -1;
        $block['showIfSummonerSpell'] = "";
        $block['hideIfSummonerSpell'] = "";
        $block['items'] = array();
        foreach($group['items'] as $itemKey => $item){
            $iarray = array();
            $iarray['id'] = (string) $item['id'];
            $iarray['count'] = (int) $item['qty'];
            $block['items'][] = $iarray;
        }
        $itemset['blocks'][] = $block;
    }
    header('Content-disposition: attachment; filename='.$itemset['title'].'_ItemFeed.json');
    header('Content-type: application/json');
    $itemset = json_encode($itemset);
    echo $itemset;
}