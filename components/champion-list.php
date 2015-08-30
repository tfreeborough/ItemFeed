<?php
/*
 * If needed, we can use this file to return the champions json file
 */
include('../api/api.php');
$champions = new api;
echo $champions->getChampionsList();
?>