<?php
// Development Settings Usama
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "the_live_entertainment_group");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/live-ent/');
define('SITE_PATH','http://localhost/development/live-ent/');
define('BASE_PATH','/development/live-ent/');




// Production Settings
// define("DB_HOST", "localhost");
// define("DB_USER", "u455665005_leg");
// define("DB_PASS", "UVCmv2V^b");
// define("DB_NAME", "u455665005_leg");
// define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/');
// define('SITE_PATH','https://leg.imcconsultancy.co.in/');
// define('BASE_PATH','/');

$url = $_SERVER['REQUEST_URI'];
$current_page = basename($url);
if($current_page == "/" || $current_page == "live-ent"){
    $current_page = "home";
}
$current_page_arr = explode('.',$current_page);
$current_page = $current_page_arr[0];
// die($url);
?>