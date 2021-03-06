<div <?php post_class(); ?>>
    <!-- Portfolio Detail Title  -->
    <div class="row">
        <div class="span12 pDHeader">
            <!-- Title -->
            <div class="hidden-phone title">
                <?php the_title(); ?>
            </div>

        </div>
    </div>

    <!--  Portfolio Detail Slider  -->
    <div class="row">
        <div class="span12 postMedia">

            <?php

            $images = px_get_meta('image');

            if(count($images))
            {?>
                <div class="pDFlexslider flexslider">

                    <ul class="slides">
                        <?php

                        $imageSize = 'full';

                        foreach($images as $img)
                        {
                            //For getting image size use
                            //http://php.net/manual/en/function.getimagesize.php
                            $imgId = px_get_image_id($img);
                            if($imgId == -1)//Fallback
                            $imgTag = "<img src=\"$img\" />";
                            else
                                $imgTag = wp_get_attachment_image($imgId, $imageSize);
                            ?>
                            <li><?php echo $imgTag; ?></li>
                        <?php
                        }?>
                    </ul>
                    <div class="slider-nav-controls-container"></div>
                </div>

            <?php
            }?>

        </div>
    </div>

    <!-- Portfolio Detail phone title  -->
    <div class="row visible-phone">
        <div class="span12 pDHeader">
            <div class="title">

                <?php the_title(); ?>

            </div>
        </div>
    </div>

    <!-- Portfolio Detail content  -->
    <div class="row">
        <div class="span12 post-media">
            <?php the_content();?>
        </div>
    </div>
</div>


