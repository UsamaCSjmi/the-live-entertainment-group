<!-- Video starts -->
<div class="d-flex align-items-center justify-content-center mb-3">
    <h3>Video Section</h3>
    <div class="ms-5 mb-2 form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="seo-content-status" <?php if($content['video']['status']) echo "checked"; ?>>
    </div>
 </div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="video-order">Order</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="video-order" id="video-order" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php echo $content['video']['order']?>"
            <?php
        }
        ?>
        placeholder="Video Order" />
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="seo-heading">Video heading</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="video-heading" id="video-heading" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php echo $content['video']['content']['heading']?>"
            <?php
        }
        ?>
        placeholder="Video Heading" />
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="seo-heading">Video URL</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="video-url" id="video-url" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php echo $content['video']['video']?>"
            <?php
        }
        ?>
        placeholder="Video URL" />
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="content">Video Content</label>
    <div class="col-sm-10">
        <textarea class="editor" name="video-content" id="video-content" rows="30">
        <?php
        if($mode == "edit"){
                echo $content['video']['content']['text'];
        }
        ?>
        </textarea>
    </div>
</div>
<div id="video-buttons" class="row mb-3">
    <?php
        if(isset($content['video']['content']['buttons']) && count($content['video']['content']['buttons']) > 0){
            $buttons = $content['video']['content']['buttons'];
            $i = 1;
            foreach($buttons as $button){
        ?>
            <div class="row video-button" id="video-button-<?php echo $i?>">
                <div class="col-sm-2 col-form-label">Button <?php echo $i?></div>
                <div class="col-sm-10 row mb-3">
                    <div class="col-sm-5 row">
                        <label class="col-sm-3 col-form-label">Button Text</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control video-button-text" name="video-button-text" value="<?php echo $button['text']?>" placeholder="Button Text" />
                        </div>
                    </div>  
                    <div class="col-sm-5 row">
                        <label class="col-sm-3 col-form-label">Button Link</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control video-button-link" name="video-button-link" value="<?php echo $button['link']?>" placeholder="Button Link" />
                        </div>
                    </div>  
                    <div class="col-sm-2">
                        <button type="danger" class="btn btn-danger" onclick="deleteVideoButton(<?php echo $i?>)">Delete</button>
                    </div>
                </div>
            </div>
    <?php
                $i++;
            }
        } 
    ?>
</div>
<div class="row mb-3">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <button type="button" class="btn m-0 btn-primary" onclick="addVideoButton()">Add Button + </button>
    </div>
</div>

<script>
    // document.addEventListener("DOMContentLoaded",(event)=>{
        function addVideoButton(event){
            buttonArea = document.querySelector("#video-buttons");
            totalButtons = document.querySelectorAll(".video-button").length
            button = `
            <div class="row video-button" id="video-button-${totalButtons+1}">
                <div class="col-sm-2 col-form-label">Button ${totalButtons+1}</div>
                <div class="col-sm-10 row mb-3">
                    <div class="col-sm-5 row">
                        <label class="col-sm-3 col-form-label">Button Text</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control video-button-text" name="video-button-text" placeholder="Button Text" />
                        </div>
                    </div>  
                    <div class="col-sm-5 row">
                        <label class="col-sm-3 col-form-label">Button Link</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control video-button-link" name="video-button-link" placeholder="Button Link" />
                        </div>
                    </div>  
                    <div class="col-sm-2">
                        <button type="danger" class="btn btn-danger" onclick="deleteVideoButton(${totalButtons+1})">Delete</button>
                    </div>
                </div>
            </div>
            `;
            buttonArea.innerHTML = buttonArea.innerHTML+button;    
        }
        function deleteVideoButton(id){
            button = document.querySelector('#video-button-'+id);
            button.remove()
        }
    // })
</script>
<!-- Video Ends -->