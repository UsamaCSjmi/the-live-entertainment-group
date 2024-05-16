<?php
include_once("./includes/header.php");
include_once("./includes/navigation.php");
$message="";
if(isset($_POST['add-sub-category'])){
    $add = $subcategoryObj->subcatInsert($_POST['name'],$_POST['slug'],$_POST['category']);
    if($add === true){
        ?>
        <script>
            window.location.href = "sub-category.php?class=success&message=Sub Category Inserted Successfully.";
        </script>
        <?php
    }
    else{
        $message=$add;
    }
}
elseif(isset($_POST['edit-sub-category'])){
    $edit = $subcategoryObj->subcatUpdate($_POST['name'],$_POST['id'],$_POST['slug'],$_POST['category']);
    if($edit === true){
        ?>
        <script>
            window.location.href = "sub-category.php?class=success&message=Sub Category Edited Successfully.";
        </script>
        <?php
    }
    else{
        $message=$edit;
    }
}
$mode = "add";
if (isset($_GET['sub-category']) && $_GET['sub-category'] != "") {
    $subcategory = $subcategoryObj->getSubcatById($_GET['sub-category']);
    if (!$subcategory) {
        echo "
        <script>
            window.location.href='404.php';
        </script>
        ";
    } else {
        $mode = "edit";
    }
}
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sub-Categories/</span><?php if ($mode == "edit") {
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
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">Category</label>
                            <div class="col-sm-10">
                                <select name="category" id="category" class="form-select">
                                    <?php
                                    $categories = $categoryObj->getAllCategories();
                                    while($category = mysqli_fetch_array($categories)){
                                        ?>
                                    <option value="<?php echo $category['id']?>"
                                    <?php
                                    if($mode == "edit" && $subcategory['category'] == $category['id']){
                                        ?>
                                        selected
                                        <?php
                                    }
                                    ?>><?php echo $category['name']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">Sub-Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" 
                                <?php
                                if($mode == "edit"){
                                    ?>
                                    value="<?php echo $subcategory['name']?>"
                                    <?php
                                }
                                ?>
                                placeholder="Enter Sub-Category name here" required/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="slug">Sub-Category Slug</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="slug" id="slug" 
                                <?php
                                if($mode == "edit"){
                                    ?>
                                    value="<?php echo $subcategory['slug']?>"
                                    <?php
                                }
                                ?>
                                placeholder="Sub-Category Slug" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <?php
                                if($mode=="edit"){
                                    ?>
                                    <input type="hidden" name="id" value="<?php echo $subcategory['id']?>">
                                <button type="submit" name="edit-sub-category"class="btn btn-primary">Edit</button>
                                    <?php
                                }
                                else{
                                    ?>
                                <button type="submit" name="add-sub-category"class="btn btn-primary">Add</button>
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
include_once("./includes/footer-layout.php");
include_once("./includes/footer.php");
?>