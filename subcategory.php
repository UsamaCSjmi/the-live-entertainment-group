<?php 
include_once("includes/header.php");
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

echo "Category : ".$pageCategory['name']."<br>";
echo "Sub Category : ".$pageSubcategory['name'];
include_once("includes/footer.php");
?>