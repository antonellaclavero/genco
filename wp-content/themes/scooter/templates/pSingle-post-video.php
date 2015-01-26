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
            $video = px_extract_video_info(px_get_meta('video-id'));

            if($video != null)
            {
                $w = 500; $h = 280;
                px_get_video_meta($video);

                if(array_key_exists('width', $video))
                {
                    $w = $video['width'];
                    $h = $video['height'];
                }

                //Extract video ID
                ?>
                <div class="post-media video-frame">
                    <?php
                    if($video['type'] == 'youtube')
                        $src = "http://www.youtube.com/embed/" . $video['id'];
                    else
                        $src = "http://player.vimeo.com/video/" . $video['id'] . "?color=ff4c2f";
                    ?>
                    <iframe src="<?php echo $src; ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                </div>
            <?php
            }
            ?>

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