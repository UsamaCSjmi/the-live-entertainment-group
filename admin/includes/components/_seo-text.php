<!-- SEO Content starts -->
<div class="d-flex align-items-center justify-content-center mb-3">
    <h3>SEO Section</h3>
    <div class="ms-5 mb-2 form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="seo-content-status" <?php if($content['seoContent']['status']) echo "checked"; ?>>
    </div>
 </div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="seo-order">Order</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="seo-order" id="seo-order" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php echo $content['seoContent']['order']?>"
            <?php
        }
        ?>
        placeholder="SEO Order" />
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="seo-heading">SEO heading</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="seo-heading" id="seo-heading" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php echo $content['seoContent']['heading']?>"
            <?php
        }
        ?>
        placeholder="SEO Heading" />
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="content">SEO Content</label>
    <div class="col-sm-10">
        <textarea class="editor" name="content" id="editor" rows="30">
        <?php
        if($mode == "edit"){
                echo $content['seoContent']['text'];
        }
        ?>
        </textarea>
    </div>
</div>
<!-- SEO Content Ends -->