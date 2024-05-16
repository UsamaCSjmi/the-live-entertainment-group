<?php
include_once("../backend/config/config.php");
include_once("../backend/lib/Session.php");

if(!Session::checkAdminLogin()){
    Session::checkAdminSession();
}
?>