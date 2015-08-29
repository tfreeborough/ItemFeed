<?php
include('../api/api.php');
$champions = new api;
echo $champions->getChampionsList();
?>