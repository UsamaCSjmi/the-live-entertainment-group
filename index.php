<?php
include_once("backend/config/config.php");
include_once("backend/helpers/Format.php");
include_once("backend/classes/Category.php");
include_once("backend/classes/Subcategory.php");
$catObj = new Category();
$subcatObj = new Subcategory();
if(Format::getCategoryFromURL() == "home" ){
    $title = "Home | The Live Entertainment Group";
    $description = "Home | The Live Entertainment Group";
    include_once("home.php");
}
elseif(Format::getCategoryFromURL() == "contact" ){
    $title = "Contact | The Live Entertainment Group";
    $description = "Contact | The Live Entertainment Group";
    include_once("contact.php");
}
elseif(Format::getCategoryFromURL() == "error" ){
    $title = "Page Not Found! Error 404.";
    $description = "Page Not Found! Error 404.";
    include_once("404.php");
}
else if(!Format::getSubCategoryFromURL() && Format::getCategoryFromURL()){
    $category = Format::getCategoryFromURL();
    $pageCategory = $catObj->getCategoryBySlug($category);
    if($pageCategory){
        $pageCategory = mysqli_fetch_array($pageCategory);
    }
    else{
        ?>
        <script>
            window.location.href = "<?php echo SITE_PATH?>error"
        </script>
        <?php
        die();
    }
    $title = $pageCategory['title'];
    $description = $pageCategory['description'];
    include_once('category.php');
}
else if(!Format::getProfileFromURL() && Format::getSubCategoryFromURL()  && Format::getCategoryFromURL() ){
    $category = Format::getCategoryFromURL();
    $subCategory = Format::getSubCategoryFromURL();
    $pageCategory = $catObj->getCategoryBySlug($category);
    if($pageCategory){
        $pageCategory = mysqli_fetch_array($pageCategory);
        
    }
    else{
        ?>
        <script>
            window.location.href = "<?php echo SITE_PATH?>error"
        </script>
        <?php
        die();
    }
    $pageSubcategory = $subcatObj->getSubcatBySlugAndCatId($subCategory,$pageCategory['id']);
    if($pageSubcategory){
        $pageSubcategory = mysqli_fetch_array($pageSubcategory);
        
    }
    else{
        ?>
        <script>
            window.location.href = "<?php echo SITE_PATH?>error"
            </script>
        <?php
        die();
    }
    $title = $pageSubcategory['title'];
    $description = $pageSubcategory['description'];
    include_once('subcategory.php');
}
else if(Format::getProfileFromURL() && Format::getSubCategoryFromURL()  && Format::getCategoryFromURL() ){
    $category = Format::getCategoryFromURL();
    $subCategory = Format::getSubCategoryFromURL();
    $profile = Format::getProfileFromURL();
    include_once('profile.php');
}
else{
    $title = "Page Not Found! Error 404.";
    $description = "Page Not Found! Error 404.";
    include_once("404.php");
}
?>