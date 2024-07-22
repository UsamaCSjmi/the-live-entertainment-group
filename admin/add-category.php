<?php
include_once("./includes/header.php");
include_once("./includes/navigation.php");
include_once("../backend/helpers/Format.php");
$message="";
if(isset($_POST['add-category'])){
    $add = $categoryObj->catInsert($_POST['name'],$_POST['slug'],$_POST['title'],$_POST['description'],$_POST['content']);
    if($add === true){
        ?>
        <script>
            window.location.href = "category.php?class=success&message=Category Inserted Successfully.";
        </script>
        <?php
    }
    else{
        $message=$add;
    }
}
elseif(isset($_POST['edit-category'])){
    $edit = $categoryObj->categoryUpdate($_POST['name'],$_POST['slug'],$_POST['id'],$_POST['title'],$_POST['description'],$_POST['content']);
    if($edit === true){
        ?>
        <script>
            window.location.href = "category.php?class=success&message=Category Edited Successfully.";
        </script>
        <?php
    }
    else{
        $message=$edit;
    }
}
$mode = "add";
if (isset($_GET['category']) && $_GET['category'] != "") {
    $category = $categoryObj->getCategoryById($_GET['category']);
    if (!$category) {
        echo "
        <script>
            window.location.href='404.php';
        </script>
        ";
    } else {
        $mode = "edit";
        $content = Format::json_to_sorted_array($category['content']);
    }
}
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories/</span><?php if ($mode == "edit") {
                                                                                            echo "Edit";
                                                                                        } else {
                                                                                            echo "Add";
                                                                                        } ?></h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST">

                        <!-- Name -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" 
                                <?php
                                if($mode == "edit"){
                                    ?>
                                    value="<?php echo $category['name']?>"
                                    <?php
                                }
                                ?>
                                placeholder="Enter Category name here" required/>
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="slug">Category Slug</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="slug" id="slug" 
                                <?php
                                if($mode == "edit"){
                                    ?>
                                    value="<?php echo $category['slug']?>"
                                    <?php
                                }
                                ?>
                                placeholder="Category Slug" />
                            </div>
                        </div>

                        <!-- Meta Title -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="title">Meta Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" id="title" 
                                <?php
                                if($mode == "edit"){
                                    ?>
                                    value="<?php echo $category['title']?>"
                                    <?php
                                }
                                ?>
                                placeholder="Meta Title" />
                            </div>
                        </div>

                        <!-- Meta Description -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="description">Meta Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="description" rows="3"><?php
                                if($mode == "edit"){
                                     echo $category['description'];
                                }
                                ?></textarea>
                            </div>
                        </div>
                        
                        <?php include("./includes/components/_hero.php")?>
                        <?php include("./includes/components/_seo-text.php")?>
                        <?php include("./includes/components/_subcategories.php")?>
                        <?php include("./includes/components/_categories.php")?>
                        <?php include("./includes/components/_video.php")?>
                        <?php include("./includes/components/_faqs.php")?>
                        

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <?php
                                if($mode=="edit"){
                                    ?>
                                    <input type="hidden" name="id" value="<?php echo $category['id']?>">
                                <button type="submit" name="edit-category"class="btn btn-primary">Update</button>
                                    <?php
                                }
                                else{
                                    ?>
                                <button type="submit" name="add-category"class="btn btn-primary">Add</button>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <p class="error"><?php echo $message;?></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<?php
$editor = true;
include_once("./includes/footer-layout.php");
include_once("./includes/footer.php");
?>