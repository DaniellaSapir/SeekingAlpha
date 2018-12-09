<?php
require_once('../../initialize.php');

//Fetch the requred fields from DB, left join allows to count rows with 0 followers
$result = DB::query("
    INSERT INTO followers (followed_id, follower_id) VALUES (".$_GET['followed_id']." , ".$_GET['follower_id'].")
");

echo json_encode($result);

