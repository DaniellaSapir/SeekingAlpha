<?php
//Define the project CONSTANTS

define("COOKIE_NAME", "user_id");
//-----------------------------------------------------------DIRECTORY constants
//for the FILE PATHS ON THE HARDDRIVE, for access from PHP - server side
 // Assign file paths to PHP constants
  // __FILE__ returns the path to this current file - magic constant
  // dirname() returns the path to the parent directory

  define("FILES_PATH", dirname(__FILE__));
//  one dir above the current file
  // define("PROJECT_PATH", dirname(CLASSWORK_PATH));
//  all the included codes in Includes dir 
  // define("SHARED_PATH", PROJECT_PATH.'/Includes');
//  define("PUBLIC_PATH", PROJECT_PATH . '/public');

//-----------------------------------------------------------------URL Constants
//path to the URL - for css and links, since we can't access the FS from the HTML
//best practice that the client side uses the URLs 
//assign the root URL to php constant, do not need to include the domain
//use the same document root as webserver
//can dynamicly find everything in URL up to "/SeekingAlpha - DaniellaSapir Task" folder
  
$files_end = strpos($_SERVER["SCRIPT_NAME"], '/SeekingAlpha - DaniellaSapir Task') +10 ;

$doc_root = substr($_SERVER["SCRIPT_NAME"],0,$files_end);

define ("WWW_ROOT", $doc_root);


// require_once 'functions.php';
require 'classes/db.php';

// link css
// <link rel="stylesheet" media="all" href="<?php echo h(url_for('stylesheets/style.css')); ?>">
