<?php

    //title and Subtitle
    $checkTitle = get_post_meta( get_the_ID(), "title-bar", true );
    $title = get_post_meta( get_the_ID(), "title-text", true );
    $subTitle = get_post_meta( get_the_ID() , "subtitle-text", true );

    //parallax Options
    $background = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
    
    if(empty($background)) {
        $noParallaxImage = "noParallaxImage";
    } else {
        $noParallaxImage = "";
    }
    
    $parallaxSpeed = get_post_meta( get_the_ID(), "parallax-speed", true );
    $parallaxHeight = get_post_meta( get_the_ID(), "parallax-height", true );
    $parallaxPosition = get_post_meta( get_the_ID() , "parallax-Position", true );

    //overlay Options
    $overlayTexture = get_post_meta( get_the_ID() , "overlay-texture", true );
    $overlayColor = get_post_meta( get_the_ID() , "overlay-color", true );
    $overlayColorOpacity = (intval(get_post_meta( get_the_ID() , "overlay-color-opacity", true )))/100;


?>

<!-- parallax section-->
<section class="scooterSection">

    <div id="<?php echo $post->post_name;?>" class="wrap">
        <div class="container clearfix">

            <?php  if ( (!empty( $subTitle ) || !empty( $title ) ) || $checkTitle == 2 ) { ?>
            
                <?php if ( $checkTitle == 1 ) { ?>
                    <div class="titleSpace">
                    
                        <?php if ( ( $checkTitle == 1 ) && ! empty( $title )) { ?>
                                
                            <div class="title"><h3><?php echo $title; ?></h3></div>
                    
                        <?php } if (  ( $checkTitle == 1 ) && ! empty( $subTitle ) ) { ?>
                         
                            <div class="subtitle"><?php echo $subTitle; ; ?></div>
                         
                        <?php } ?>
                        
                    </div>
                <?php }  if ( $checkTitle == 2  ) { ?>
                    
                    <div class="titleSpace">
                        <div class="title"><h3><?php the_title(); ?></h3></div>
                    </div>
                 
                <?php } ?>
                
            <?php } ?>
        </div>

        <!-- inline Style For parallax background Color and color Opacity  -->
        <?php if ( isset($overlayColor) || isset($overlayColorOpacity)) { ?>

            <style>
                #<?php echo $post->post_name;?> .<?php echo $overlayTexture;?>:after {

                    <?php if ( isset($overlayColor) ) { ?> background-color:<?php echo $overlayColor;?>; <?php } ?>
                    <?php if ( isset($overlayColorOpacity) ) { ?> opacity:<?php echo $overlayColorOpacity;?>; <?php } ?>
                }

            </style>

        <?php } ?>

        <div class="parallax sectionOverlay <?php echo $overlayTexture; echo $noParallaxImage;?>" style="min-height:<?php echo $parallaxHeight;?>px; background-image: url(<?php echo $background[0]; ?>);"  data-speed="<?php echo $parallaxSpeed;?>" data-Position="<?php echo $parallaxPosition;?>">
            <div class="container clearfix customContent">
                <?php the_content(); ?>
            </div>

        </div>
    </div>

</section>
<!-- End parallax section -->