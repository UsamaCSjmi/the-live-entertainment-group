<?php
include_once("backend/classes/Category.php");
include_once("backend/classes/Subcategory.php");
$catObj = new Category();
$subcatObj = new Subcategory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Live Entertainment Group</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="<?php echo SITE_PATH?>">Home</a>
                </li>
                <?php
                $categories = $catObj->getAllActiveCategories();
                while($singleCat = mysqli_fetch_array($categories)){
                    ?>
                    <li>
                        <a href="<?php echo SITE_PATH.$singleCat['slug'];?>"><?php echo $singleCat['name'];?></a>
                        <?php
                        $subcategories = $subcatObj->getSubcatByCatId($singleCat['id']);
                        if($subcategories){
                            ?>
                            <ul>
                                <?php
                                while($singleSubcat = mysqli_fetch_array($subcategories)){
                                    ?>
                                    <li>
                                        <a href="<?php echo SITE_PATH.$singleCat['slug']."/".$singleSubcat['slug']?>"><?php echo $singleSubcat['name']?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <?php
                        }
                        ?>
                    </li>
                    <?php
                }
                ?>
                <li>
                    <a href="<?php echo SITE_PATH?>contact">Contact</a>
                </li>
            </ul>
        </nav>
    </header>