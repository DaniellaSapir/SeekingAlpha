<?php
//useful functions
//-----------------------------------------------------------------URL functions
//dynamically searches for the url for stylesheets, links, etc..
function url_for($script_path) {
    //add the leading '/' if not present
    //script path is the path to the files i.e. PROJECT_PATH
    if($script_path[0] != '/') {
        $script_path = "/".$script_path;
    }
//    note that the stylesheets at stylesheets/style.css
    return WWW_ROOT . $script_path;
}

function u($str) {
//    shortcut for urlencode()
    return urlencode($str);
}
function h($str) {
//    shortcut for htmlspecialchars
    return htmlspecialchars($str);
}
//----------------------------------------------------------POST & GET functions
function is_post_request() {
        
    return $_SERVER['REQUEST_METHOD'] == 'POST';
       
}
function is_get_request() {
        
    return $_SERVER['REQUEST_METHOD'] == 'GET';
       
}   

function redirect($location) {
    header("Location:".$location);
}