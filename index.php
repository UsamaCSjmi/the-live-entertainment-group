<?php
include_once("backend/config/config.php");
include_once("backend/helpers/Format.php");
if(Format::getCategoryFromURL() == "home" ){
    include_once("home.php");
}
elseif(Format::getCategoryFromURL() == "contact" ){
    include_once("contact.php");
}
elseif(Format::getCategoryFromURL() == "error" ){
    include_once("404.php");
}
else if(!Format::getSubCategoryFromURL() && Format::getCategoryFromURL()){
    $category = Format::getCategoryFromURL();
    include_once('category.php');
}
else if(!Format::getProfileFromURL() && Format::getSubCategoryFromURL()  && Format::getCategoryFromURL() ){
    $category = Format::getCategoryFromURL();
    $subCategory = Format::getSubCategoryFromURL();
    include_once('subcategory.php');
}
else if(Format::getProfileFromURL() && Format::getSubCategoryFromURL()  && Format::getCategoryFromURL() ){
    $category = Format::getCategoryFromURL();
    $subCategory = Format::getSubCategoryFromURL();
    $profile = Format::getProfileFromURL();
    include_once('profile.php');
}
else{
    include_once("404.php");
}
?>