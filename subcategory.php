<?php 
include_once("includes/header.php");
echo "Category : ".$pageCategory['name']."<br>";
echo "Sub Category : ".$pageSubcategory['name'];
?>
<div class="content">
    <?php echo htmlspecialchars_decode($pageSubcategory['content'])?>
</div>
<?php
include_once("includes/footer.php");
?>