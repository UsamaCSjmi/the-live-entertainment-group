<!-- Hero starts -->
 <div class="d-flex align-items-center justify-content-center mb-3">
    <h3>Hero Banner</h3>
 </div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="hero-order">Order</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="hero-order" id="hero-order" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php echo $content['hero']['order']?>"
            <?php
        }
        ?>
        placeholder="Hero Order" />
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="hero-list">List</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="hero-list" id="hero-list" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php 
            foreach ($content['hero']['list'] as $item ){
                echo $item.", ";
            }
            ?>"
            <?php
        }
        ?>
        placeholder="Hero list" />
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="hero-title">Hero Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="hero-title" id="hero-title" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php echo $content['hero']['title']?>"
            <?php
        }
        ?>
        placeholder="Hero Title" />
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="content">Hero Text</label>
    <div class="col-sm-10">
        <textarea name="hero-text" class="form-control">
        <?php
        if($mode == "edit"){
            echo $content['hero']['text'];
        }
        ?>
        </textarea>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="Image">Hero Image</label>
    <div class="col-sm-10 row">
        <div class="col-12">
            <input type="file" name="hero-image" id="hero-image">
        </div>
        <?php
        if($mode == "edit"){
            ?>
            <div class="col-12 mt-3">
                <img src="<?php echo SITE_PATH."/assets/images/".$content['hero']['image']?>" class="img-fluid" alt="Banner">
            </div>
            <?php
        }
        ?>
    </div>
</div>
<!-- Hero Ends -->
                        