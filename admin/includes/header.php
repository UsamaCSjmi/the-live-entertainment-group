<?php
include_once("../backend/config/config.php");
include_once("../backend/lib/Session.php");
include_once("../backend/helpers/Format.php");
include_once("../backend/classes/Category.php");
include_once("../backend/classes/Subcategory.php");
$categoryObj = new Category();
$subcategoryObj = new Subcategory();
$page = Format::getAdminPage();
if($page != "login" && $page != "forgot-password"){
  Session::checkAdminSession();
}
else{
  Session::checkAdminLogin();
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style <?php if($page!="login" || $page != "forgot-password"){echo "customizer-hide";}else{echo "layout-menu-fixed";}?>" dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>Dashboard - The Live Entertainment Group</title>
    <meta name="description" content="Dashboard of The Live Entertainment Group" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon/favicon.ico" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="./assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="./assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <?php
    if($page!="login" || $page != "forgot-password"){
    ?>
      <link rel="stylesheet" href="./assets/vendor/libs/apex-charts/apex-charts.css" />
      <!-- Page CSS -->
      <!-- Page -->
      <link rel="stylesheet" href="./assets/vendor/css/pages/page-auth.css" />
    <?php
    }
    ?>
    <!-- Helpers -->
    <script src="./assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="./assets/js/config.js"></script>
  </head>

  <body>
