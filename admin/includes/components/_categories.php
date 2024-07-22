<!-- Categories  starts -->
<div class="d-flex align-items-center justify-content-center mb-3">
    <h3>Categories Section</h3>
    <div class="ms-5 mb-2 form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="categories-status" <?php if($content['categories']['status']) echo "checked"; ?>>
    </div>
 </div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="categories-order">Order</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="categories-order" id="categories-order" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php echo $content['categories']['order']?>"
            <?php
        }
        ?>
        placeholder="Categories  Order" />
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="categories-heading">Categories heading</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="categories-heading" id="categories-heading" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php echo $content['categories']['heading']?>"
            <?php
        }
        ?>
        placeholder="Categories heading" />
    </div>
</div>
<!-- Categories  Ends -->