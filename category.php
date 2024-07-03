<?php 
include_once("includes/header.php");
$breadcrumbs = [
    "Home" => "",
    "Function Bands" => "#"
];
include("includes/_breadcrumbs.php");
$hero = [
    "title" => "Top Level Category Title 2 Lines Max",
    "text" => "This is a short paragraph used to describe the category and provide some SEO value."
];
include("includes/_hero.php");
include("includes/_category-cards.php");
include("includes/_faqs.php");
include("includes/_blogs.php");
include("includes/_featured-video-image.php");
include("includes/_artists-cards.php");
include("includes/_blogs.php");
include("includes/_why-chose-leg.php");
include_once("includes/footer.php");
?>