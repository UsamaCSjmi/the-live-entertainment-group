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
echo "Category : ".$pageCategory['name']; 

include_once("includes/footer.php");
?>