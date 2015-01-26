<?php 

    //overlay Options
    $homeOverlayTexture = px_opt('home-overlay-texture');
    $homeOverlayColor =  px_opt('home-overlay-color');
    $homeOverlayOpacity = (intval(px_opt('home-overlay-opacity')))/100;

?>
<section id="home">

    <!-- inline Style For parallax background Color and color Opacity  -->
    <?php if ( isset($homeOverlayColor) || isset($homeOverlayOpacity)) { ?>

        <style>
            #home .<?php echo $homeOverlayTexture;?>:after {

                <?php if ( isset($homeOverlayColor) ) { ?> background-color:<?php echo $homeOverlayColor;?>; <?php } ?>
                <?php if ( isset($homeOverlayOpacity) ) { ?> opacity:<?php echo $homeOverlayOpacity;?>; <?php } ?>
            }
			<?php if ( isset($homeOverlayColor) ) { ?>
				#home .videoColorMask  {
					 background-color:<?php echo $homeOverlayColor;?> !important;
				}
			 <?php } ?>
        </style>

    <?php } ?>

    <div class="homeWrap">
        <?php
            $slideCount = "";
            $slideNumber= "";
            if ( px_opt('home-type-switch') == 'home-slider' ) {
              for ($j = 1; $j <= 10; $j++) { if ( px_opt('home-gallery-'.$j) ) { $slideCount+=1;  $slideNumber=$j;} }
                if ( $slideCount > 1 ) { ?>
                    <!-- FullScreen Slider -->
                    <span id='hideMenuFirst'></span>
                    <div class="wrap sectionOverlay <?php echo $homeOverlayTexture; ?>" id="fullScreenSlider">
                        <div id="slides">
                            <div class="slides-container">
                                <?php for ($i = 1; $i <= 10; $i++) {
                                    if ( px_opt('home-gallery-'.$i) ) { ?>
                                        <img src="<?php px_eopt('home-gallery-'.$i); ?>" alt="<?php echo "slide".$i ?>" />
                                <?php } } ?>
                            </div>

                            <!-- slides navigation -->
                            <nav class="slides-navigation">
                              <a href="#" class="next"></a>
                              <a href="#" class="prev"></a>
                            </nav>

                        </div>
                    </div>
                <?php }  else if ($slideCount == 1) { ?>
                    <!-- FullScreen Image -->
                    <span id='hideMenuFirst'></span>
                    <div id="fullScreenImage" class="fullScreenImage homeParallax sectionOverlay <?php echo $homeOverlayTexture; ?>" style="background:url(<?php px_eopt('home-gallery-'.$slideNumber); ?>);" ></div>

                <?php } ?>
        <?php } else if ( px_opt('home-type-switch') == 'home-map' ){ ?>
            <!-- FullScreen Map -->
            <span id='hideMenuFirst'></span>
            <div class="wrapGoogleMap sectionOverlay <?php echo $homeOverlayTexture; ?>">
                <div id="homeGoogleMap">
                </div>
            </div>
        <?php } else if ( px_opt('home-type-switch') == 'home-video' ){ ?>
            <!-- FullScreen Video -->
            <span id='hideMenuFirst'></span>
            <div id="homeVideoHeight">
                <div class="videoMask <?php echo $homeOverlayTexture; ?>"></div>
                <div class="videoColorMask"></div>

                <?php px_header_banner_video(); ?>
            </div>
        <?php } else if ( px_opt('home-type-switch') == 'home-layerSlider' ){ ?>
            <!-- Layer Slider -->
            <span id='hideMenuFirst'></span>
            <div id="homeHeight" class="layerSlider">
                <?php
                    $homeLayerslider = '[layerslider id='. px_opt('home-video-type').']';
                    echo do_shortcode($homeLayerslider);
                ?>
            </div>

        <?php }

         get_template_part('templates/text', 'rotator');

    ?>

    </div>
</section>
<div id="startHere"></div>