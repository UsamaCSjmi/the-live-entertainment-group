<section class="hero d-flex flex-column align-item-center justify-content-center" style="background: url(<?php echo SITE_PATH."/assets/images/".$hero['image']?>), #00000087;background-position: 100%;background-repeat: no-repeat;background-size: cover;background-blend-mode: darken;">
    <div class="container">
        <div class="banner-area text-center pt-5 pb-5">
            <?php 
            if (isset($hero['title']) && $hero['title'] != ""){
                ?>
            <h1 class="text-light mx-auto"><?php echo $hero['title']?></h1>
                <?php
            }
            if (isset($hero['list']) && $hero['list'] != ""){
                ?>
            <ul class="tick-list text-light my-3">
                <?php
                foreach ($hero['list'] as $li ){
                    ?>
                <li class="mt-3 mb-3"><?php echo $li?></li>
                    <?php
                }
                ?>
            </ul>
            <?php
            }
            if (isset($hero['text']) && $hero['text'] != ""){
                ?>
            <p class="text-light"><?php echo $hero['text']?></p>
                <?php
            }
            ?>
            <div class="banner-search rounded-pill w-50 mx-auto">
                <div class="w-100">
                    <div class="input-group">
                        <select class="form-select border-end ms-2 z-1" aria-label="Default select example">
                            <option selected>Entertainment Category</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="form-select me-2" aria-label="Default select example">
                            <option selected>Event Location</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <button class="btn text-light bg-primary theme-rounded py-2 px-4" type="button"><i class="fa-solid fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>