<?php
include_once("./includes/header.php");
include_once("./includes/navigation.php");
?>
    <div class="container-xxl flex-grow-1 container-p-y">
<?php 
    if(isset($_POST['update-status']) && isset($_POST['is_active']) && ($_POST['is_active']==0 || $_POST['is_active']==1)){
        $updated = $genreObj->updateStatus($_POST['id'],$_POST['is_active']);
        if($updated === true){
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                Status Updated Successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
        else{
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <?php echo $updated?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
    }
    elseif(isset($_GET['action'])&& $_GET['action']=='delete' && $_GET['genre']!=""){
        $deleted = $genreObj->delGenreById($_GET['genre']);
        if($deleted === true){
            ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                Genre Deleted Successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
        else{
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <?php echo $deleted?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
    }
    elseif(isset($_GET['class']) && ($_GET['class']=="success" || $_GET['class']=="error") && isset($_GET['message']) && $_GET['message']!=""){
        ?>
        <div class="alert alert-<?php echo $_GET['class']?> alert-dismissible" role="alert">
            <?php echo $_GET['message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    }
    ?>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Genre/</span> View</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">All Genre</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Genre</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                    $genres = $genreObj->getAllGenre();
                    $i=1;
                    while($genre = mysqli_fetch_array($genres)){
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $genre['name'];?></td>
                            <td><?php echo $genre['slug'];?></td>
                            <td>
                                <form action="genre.php" method="POST">
                                <?php 
                                if($genre['is_active']==1){
                                    ?>
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="hidden" name="id" value="<?php echo $genre['id']?>">
                                    <button type="submit" name="update-status" class="badge bg-label-success me-1 border-0">Active</button>
                                    <?php
                                }
                                else{
                                    ?>
                                    <input type="hidden" name="is_active" value="1">
                                    <input type="hidden" name="id" value="<?php echo $genre['id']?>">
                                    <button type="submit" name="update-status" class="badge bg-label-warning me-1 border-0">Inactive</button>    
                                    <?php
                                }
                                ?>
                                </form>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- <a class="dropdown-item" target="_blank" href="<?php echo SITE_PATH.$category['slug']."/".$genre['slug'];?>"><i class="bx bx-link-external me-1"></i>View</a> -->
                                        <a class="dropdown-item" href="add-genre.php?genre=<?php echo $genre['id']?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" onclick="javascript:return confirm('Are You sure You want to delete <?php echo $genre['name']?> genre? This action can\'t be undone. If you want to temporary delete this, then try deactivating the genre.')" href="genre.php?action=delete&genre=<?php echo $genre['id']?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

</div>
<?php
include_once("./includes/footer-layout.php");
include_once("./includes/footer.php");
?>