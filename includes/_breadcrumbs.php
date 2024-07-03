<section class="bg-light-dull">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 py-1 ps-5">
            <?php
            foreach( $breadcrumbs as $page => $url ){
                if($url != "#"){
                ?>
                <li class="breadcrumb-item"><a href="<?php echo SITE_PATH.$url?>"><?php echo $page?></a></li>
                <?php
                }
                else{
                ?>            
                <li class="breadcrumb-item active" aria-current="page"><?php echo $page?></li>
                <?php
                }
            }
            ?>
        </ol>
    </nav>
</section>