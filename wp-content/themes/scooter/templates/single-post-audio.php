<?php 
     //check social share is Enable or not
    $socialshare = get_post_meta( get_the_ID(), "post-social-share", true );
?>
<div <?php post_class(); ?>>
    <div class="post-media">
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