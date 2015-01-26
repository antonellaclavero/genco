<?php 
    $checkTitle = get_post_meta( get_the_ID(), "title-bar", true );

    //video Options
    $videoMP4 = get_post_meta( get_the_ID(), "video-MP4", true );
    $videoWebM = get_post_meta( get_the_ID(), "video-WebM", true );
    $videoImage = get_post_meta( get_the_ID(), "video-imge", true );

    //overlay Options
    $overlayTexture = get_post_meta( get_the_ID() , "overlay-texture", true );
    $overlayColor = get_post_meta( get_the_ID() , "overlay-color", true );
    $overlayColorOpacity = (intval(get_post_meta( get_the_ID() , "overlay-color-opacity", true )))/100;

?>
<!-- Video Section  -->
<section  class="videoSection">	

    <span class="menuSpace" id="<?php echo $post->post_name;?>"></span>

    <div class="wrap">
        <div class="container clearfix <?php  if ( $checkTitle != 0 ){	?> exPageTitleSpace <?php } ?>">

            <?php get_template_part( 'templates/page-title' ); ?>

        </div>
    </div>

    <div class="wrap">

        <div style="background-image:url('<?php echo $videoImage; ?>')" class="hidden-desktop videoHomePreload"></div>

        <!-- inline Style For video section color and color opacity  -->
        <?php if ( isset($overlayColor) || isset($overlayColorOpacity)) { ?>

            <style>
                .<?php echo $overlayTexture;?>:after {

                    <?php if ( isset($overlayColor) ) { ?> background-color:<?php echo $overlayColor;?>; <?php } ?>
                    <?php if ( isset($overlayColorOpacity) ) { ?> opacity:<?php echo $overlayColorOpacity;?>; <?php } ?>
                }
            </style>

        <?php } ?>

        <div class="videoHome sectionOverlay <?php echo $overlayTexture;?>">
            <div class="videoWrap">
                <video width="1900" height="1060" poster="'<?php echo $videoImage; ?>'" controls="controls" preload="auto" loop="true" autoplay="true">

                    <?php if ( !empty( $videoMP4 ) ) { ?>
                        <!-- MP4 for Safari, IE9, iPhone, iPad, Android, and Windows Phone 7 -->
                        <source type="video/mp4" src="<?php echo $videoMP4 ?>" />
                    <?php } ?>
                    <?php  if ( !empty( $videoWebM ) ) { ?>
                        <!-- WebM/VP8 for Firefox4, Opera, and Chrome -->
                        <source type="video/webm" src="<?php echo $videoWebM ?>" />
                    <?php } ?>

                    <?php if ( !empty( $videoMP4 ) ) { ?>
                        <!-- Flash fallback for non-HTML5 browsers without JavaScript -->
                        <object width="1900" height="1060" type="application/x-shockwave-flash" data="<?php echo get_template_directory() ?>/assets/js/flashmediaelement.swf">
                        <param name="movie" value="<?php echo get_template_directory() ?>/assets/js/flashmediaelement.swf" />
                        <param name="flashvars" value="controls=true&file=<?php echo $videoMP4 ?>" />
                        <img src="<?php echo $videoImage ?>" width="1900" height="1060" title="No video playback capabilities" />
                        </object>
                    <?php } ?>
                </video>
            </div>
        </div>

        <div class="container clearfix videoContent">
                <?php
                if (have_posts()) {
                    while (have_posts()) { the_post();
                        ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                            <?php the_content(); ?>
                        </div>
                    <?php
                    }//While have_posts
                }//If have_posts
                ?>
        </div>

    </div>
</section>
<!-- End Video Section  -->