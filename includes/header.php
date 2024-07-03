<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
    <link rel="shortcut icon" href="<?php echo SITE_PATH?>assets/images/leg-favicon.png" type="image/x-icon">
    <meta name="description" content="<?php echo $description?>">
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- External CSS Libraries -->
    <link rel="stylesheet" href="<?php echo SITE_PATH?>assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo SITE_PATH?>assets/css/lite-yt-embed.css">
    <link rel="stylesheet" href="<?php echo SITE_PATH?>assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="<?php echo SITE_PATH?>assets/css/bootstrap.min.css">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="<?php echo SITE_PATH?>assets/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo SITE_PATH?>">
                    <img src="<?php echo SITE_PATH?>assets/images/leg-logo.png" alt="Live Entertainment Group" width="250" class="img-fluid">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo SITE_PATH?>">Home</a>
                        </li>
                        <?php
                        $categories = $catObj->getAllActiveCategories();
                        while($singleCat = mysqli_fetch_array($categories)){
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo SITE_PATH.$singleCat['slug'];?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $singleCat['name'];?>
                            </a>
                            <?php
                            $subcategories = $subcatObj->getSubcatByCatId($singleCat['id']);
                            if($subcategories){
                            ?>
                            <ul class="dropdown-menu">
                            <?php
                                while($singleSubcat = mysqli_fetch_array($subcategories)){
                                    ?>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo SITE_PATH.$singleCat['slug']."/".$singleSubcat['slug']?>"><?php echo $singleSubcat['name']?></a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo SITE_PATH?>contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-icons">
                    <li class="navbar-icon mx-3"><i class="fas fa-magnifying-glass"></i></li>
                    <li class="navbar-icon mx-3"><i class="fas fa-heart" data-bs-toggle="modal" data-bs-target="#shortlist"></i></li>
                    <li class="navbar-icon mx-3"><i class="fas fa-user"></i></li>
                </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>