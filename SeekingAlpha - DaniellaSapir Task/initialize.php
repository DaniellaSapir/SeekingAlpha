<?php

//Define the project CONSTANTS
define("COOKIE_NAME", "user_id");

$user_id = $_COOKIE[COOKIE_NAME];

//Files const
define("FILES_PATH", dirname(__FILE__));


//LOGIN  - if no cookie show login page (enough to check if there is any cookie)
if(!isset($_COOKIE[COOKIE_NAME])) {
    include "partials/login.php"; 
    die;
}

//find CURRENT user
$current_user = mysqli_fetch_assoc(DB::query("SELECT users.name FROM users WHERE users.id = $user_id"));



require 'classes/db.php';
