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

            //Parse the content for the first occurrence of video url
            $audio = px_extract_audio_info(px_get_meta('audio-url'));

            if($audio != null)
            {
                //Extract video ID
                ?>
                <div class="post-media audio-frame">
                    <?php
                    echo px_soundcloud_get_embed($audio['url']);
                    ?>
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
