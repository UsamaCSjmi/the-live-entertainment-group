<?php
include_once("../backend/config/config.php");
define("ADMIN_BASE_PATH",BASE_PATH."admin/");
$url = str_replace(ADMIN_BASE_PATH,"",$_SERVER['REQUEST_URI']);
// include_once("dashboard.php");
?>