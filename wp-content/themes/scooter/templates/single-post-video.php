<?php 
     //check social share is Enable or not
    $socialshare = get_post_meta( get_the_ID(), "post-social-share", true );
?>
<div <?php post_class(); ?>>
    <div class="post-media">

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
        <?php } ?>
    </div>
    
    <?php
        get_template_part( 'templates/single', "post-meta" );
        the_content();
        wp_link_pages();
    ?>
    
    <?php if ($socialshare== 1 )  { ?>
        <div class="socailshare">
            <?php
                // socail share icon 
                get_template_part( 'templates/social-share');
            ?>
        </div>
    <?php } ?>
    
    <div class="nav_box">
        <?php echo previous_post_link('%link', '<div class="text_btn next_btn" >'. __('Next Post',TEXTDOMAIN).'</div>'); ?>
        <?php echo next_post_link('%link', '<div class="text_btn previous_btn" >'. __('Prev Post',TEXTDOMAIN).'</div>'); ?>
    </div>

</div>
<div class="commentWrap">
    <?php
        $num_comments = get_comments_number();
        if ( $num_comments == 0 ) { } else { ?>
            <div class="commentTitle">
                <h3>
                    <?php _e("Comments", TEXTDOMAIN); ?>&nbsp; /
                    <span class="comment_count">
                        <?php comments_popup_link( __('0', TEXTDOMAIN ) , __('1', TEXTDOMAIN ) , __('%', TEXTDOMAIN ) ); ?>
                    </span>
                </h3>
            </div>
    <?php }  comments_template('', true); ?>
</div>