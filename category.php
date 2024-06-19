<?php 
include_once("includes/header.php");
echo "Category : ".$pageCategory['name']; 
?>
<div class="content">
    <?php echo htmlspecialchars_decode($pageCategory['content'])?>
</div>
<?php
include_once("includes/footer.php");
?>