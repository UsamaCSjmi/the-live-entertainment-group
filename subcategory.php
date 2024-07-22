<?php 
include_once("includes/header.php");
$breadcrumbs = [
    "Home" => "",
    "Function Bands" => "function-bands/",
    "Solo Bands" =>"#"
];
include("includes/_breadcrumbs.php");
$hero = [
    "title" => "Sub Category Title 2 Lines Max",
    "text" => "This is a short paragraph used to describe the category and provide some SEO value.",
    "image" => "background.jpeg"
];
include("includes/_hero.php");
include("includes/_artists-cards.php");
include("includes/_genres.php");
include("includes/_why-chose-leg.php");
include("includes/_blogs.php");
include("includes/_faqs.php");
include("includes/_find-local.php");
?>
<?php
include_once("includes/footer.php");
?>