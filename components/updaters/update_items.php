<?php
/*
 * Updates the items list with the items from the sr_filters.php file
 */
include('../../api/api.php');
$update = new api;
$update->updateItemsList();
?>