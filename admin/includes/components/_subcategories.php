<!-- Sub-Categories  starts -->
<div class="d-flex align-items-center justify-content-center mb-3">
    <h3>Sub-Categories Section</h3>
    <div class="ms-5 mb-2 form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="subcategories-status" <?php if($content['sub_categories']['status']) echo "checked"; ?>>
    </div>
 </div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="subcategories-order">Order</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="subcategories-order" id="subcategories-order" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php echo $content['sub_categories']['order']?>"
            <?php
        }
        ?>
        placeholder="Sub-Categories  Order" />
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="subcategories-heading">Sub-Categories heading</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="subcategories-heading" id="subcategories-heading" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php echo $content['sub_categories']['heading']?>"
            <?php
        }
        ?>
        placeholder="Sub-Categories heading" />
    </div>
</div>
<!-- Sub-Categories  Ends -->