<?php
require_once('../../initialize.php');

//Fetch the requred fields from DB, left join allows to count rows with 0 followers
$result = DB::query("
    DELETE FROM followers WHERE followed_id = ".$_GET['followed_id']." AND follower_id = ".$_GET['follower_id']
);

echo json_encode($result);

