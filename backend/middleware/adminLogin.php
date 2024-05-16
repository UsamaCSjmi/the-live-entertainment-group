<?php 
include_once("../classes/AdminAuth.php");
$adminAuthObj = new AdminAuth();

if(isset($_POST['action']) && $_POST['action'] == "adminLogin"){
    echo $adminAuthObj->adminLogin($_POST['username'],$_POST['password']);
}
else{
    echo "Invalid Request!";
}
?>