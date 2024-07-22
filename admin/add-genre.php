<?php
include_once("./includes/header.php");
include_once("./includes/navigation.php");
$message="";
if(isset($_POST['add-genre'])){
    $add = $genreObj->genreInsert($_POST['name'],$_POST['slug']);
    if($add === true){
        ?>
        <script>
            window.location.href = "genre.php?class=success&message=genre Inserted Successfully.";
        </script>
        <?php
    }
    else{
        $message=$add;
    }
}
elseif(isset($_POST['edit-genre'])){
    $edit = $genreObj->genreUpdate($_POST['name'],$_POST['id'],$_POST['slug']);
    if($edit === true){
        ?>
        <script>
            window.location.href = "genre.php?class=success&message=genre Edited Successfully.";
        </script>
        <?php
    }
    else{
        $message=$edit;
    }
}
$mode = "add";
if (isset($_GET['genre']) && $_GET['genre'] != "") {
    $genre = $genreObj->getGenreById($_GET['genre']);
    if (!$genre) {
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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">genre/</span><?php if ($mode == "edit") {
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
                            <label class="col-sm-2 col-form-label" for="name">Genre Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" 
                                <?php
                                if($mode == "edit"){
                                    ?>
                                    value="<?php echo $genre['name']?>"
                                    <?php
                                }
                                ?>
                                placeholder="Enter genre name here" required/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="slug">Genre Slug</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="slug" id="slug" 
                                <?php
                                if($mode == "edit"){
                                    ?>
                                    value="<?php echo $genre['slug']?>"
                                    <?php
                                }
                                ?>
                                placeholder="genre Slug" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <?php
                                if($mode=="edit"){
                                    ?>
                                    <input type="hidden" name="id" value="<?php echo $genre['id']?>">
                                <button type="submit" name="edit-genre"class="btn btn-primary">Edit</button>
                                    <?php
                                }
                                else{
                                    ?>
                                <button type="submit" name="add-genre"class="btn btn-primary">Add</button>
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