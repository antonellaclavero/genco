<?php
function px_theme_scripts() {

    //Register google fonts
    px_theme_fonts();

    //Register Styles
    wp_enqueue_style('style', get_bloginfo('stylesheet_url'), false, THEME_VERSION);

    //responcive style
    wp_enqueue_style('responsive-style', THEME_CSS_URI . '/responsive.css', false, THEME_VERSION);

    //Add style overrides
    ob_start();
    include(px_path_combine(THEME_CSS, 'styles-inline.php'));
    wp_add_inline_style('style', ob_get_clean());

    if (!is_admin()) {
        wp_enqueue_script('jquery');
    }

    //countTo
    wp_register_script('countTo', THEME_JS_URI . '/jquery.countTo.js', false, '2.1', true );

    //Flex Slider
    wp_register_script('flexslider', THEME_JS_URI . '/jquery.flexslider-min.js', false, '2.1', true );
    wp_register_style('flexslider', THEME_CSS_URI. '/flexslider.css', false, '2.1', 'screen');

    //Parallax
    wp_register_script('parallax', THEME_JS_URI . '/jquery.parallax.js', false, '1.1.3', true );

    // appear element
    wp_register_script('appear', THEME_JS_URI . '/jquery.appear.js', false, '0.3.3', true );

    //smothScroll
    wp_register_script( 'smoothscroll', THEME_JS_URI . '/jquery.smoothscroll.js', false, '1.2.1', true );


    wp_register_script('animate-enhanced', THEME_JS_URI . '/jquery.animate-enhanced.min.js', false, '2.1', true );
    wp_register_script('superslides', THEME_JS_URI . '/jquery.superslides.js', false, '2.1', true );

    //Media Element
    wp_register_style('mediaelementCSS', THEME_CSS_URI. '/mediaelementplayer.css', false, '2.13.1', 'screen');
    wp_register_script('mediaelementJSS', THEME_JS_URI . '/mediaelement-and-player.min.js', false, '2.13.1', true );

    //isotope
    wp_register_style('isotope', THEME_CSS_URI. '/isotope.css', false, '1.5.26', 'screen');
    wp_register_script( 'isotope', THEME_JS_URI . '/jquery.isotope.min.js', false, '1.5.26', true );
    wp_register_script( 'perfectmasonry', THEME_JS_URI . '/jquery.isotope.perfectmasonry.js', false, '1.0', true );
	
	
    //wait for images load
    wp_register_script( 'waitforimages', THEME_JS_URI . '/jquery.waitforimages.min.js', false, '1.0', true );

    //fit vid
    wp_register_script( 'fitVid', THEME_JS_URI . '/jquery.fitvids.js', false, '1.1', true );

    //superfish
    wp_register_script( 'superfish', THEME_JS_URI . '/superfish.js', false, '1.7.4', true );

    //easing
    wp_register_script( 'jquery-easing', THEME_JS_URI . '/jquery.easing.1.3.js', false, '1.3', true );

    //transit
    //wp_register_script( 'jquery-transit', THEME_JS_URI . '/transit.min.js', false, '0.9.9', true );

    //pie chart
    wp_register_script( 'easy-pie-chart', THEME_JS_URI . '/jquery.easypiechart.min.js', false,'2.1.5',true );

    //preloader
    wp_register_script( 'queryloader2', THEME_JS_URI . '/jquery.queryloader2.min.js', false,'2.1.5',true );

    wp_register_script( 'gmap3', THEME_JS_URI . '/gmap3.js', false,'5.1.1',true );

    //Main JS handler
    wp_enqueue_script('googleMap',"http://maps.google.com/maps/api/js?v=3.15?sensor=false&amp;language=en",array(),THEME_VERSION,true);

    //countTo
    wp_enqueue_script('countTo');

    // superfish - Menu Drop Down Effect
    wp_enqueue_script('superfish');

    //Parallax
    wp_enqueue_script('parallax');

    //appear
    wp_enqueue_script('appear');

    //SmoothScroll
    wp_enqueue_script('smoothscroll');

    //Flex Slider
    wp_enqueue_style('flexslider');
    wp_enqueue_script('flexslider');

    wp_enqueue_script('superslides');
    wp_enqueue_script('animate-enhanced');

    //Isotope Plugin
    wp_enqueue_style('isotope');
    wp_enqueue_script('isotope');
	wp_enqueue_script('perfectmasonry');
	
    //wait for images load
    wp_enqueue_script('waitforimages');

    //fitvid
    wp_enqueue_script('fitVid');

    // Media Element
    wp_enqueue_style('mediaelementCSS');
    wp_enqueue_script('mediaelementJSS');

    //easing
    wp_enqueue_script('jquery-easing');
    wp_enqueue_script('jquery-transit');

    //pie chart
    wp_enqueue_script('easy-pie-chart');

    //pre loader
    wp_enqueue_script('queryloader2');

    if(is_page_template('main-page.php')) {
    
         if (px_opt('footer-enable-map') == 1 || px_opt('home-type-switch') == 'home-map') {
            //google Map - gmap3
            wp_enqueue_script('gmap3');
        }
        
    } else {
         //google Map - gmap3
        wp_enqueue_script('gmap3');
    }
    
    //Custom Script
    wp_enqueue_script(
        'custom',
        THEME_JS_URI . '/custom.js',
        false,
        THEME_VERSION,
        true
    );

    // home And Footer Google Map Variables
    $mapJs = array(
        'zoomLevel' => px_opt('footerMapZoom'),
        'iconMap' =>  get_template_directory_uri() ."/assets/img/marker.png",
        'customMap' => px_opt('footerStyleMap'),
        'cityMapCenterLat' => px_opt('footerMapLatitude'),
        'cityMapCenterLng' => px_opt('footerMapLongitude'),
        'homeZoomLevel' => px_opt('homeMapZoom'),
        'homeIconMap' =>  get_template_directory_uri() ."/assets/img/homeMarker.png",
        'homeCustomMap' => px_opt('homeStyleMap'),
        'homeCityMapCenterLat' => px_opt('homeMapLatitude'),
        'homeCityMapCenterLng' => px_opt('homeMapLongitude')
    );
    wp_localize_script('custom', 'pixflowJsMap', $mapJs );

    // scrooling options
    $speedJs = array(
        'scrolling_speed' => px_opt ('scrolling-speed'),
        'scrolling_easing' => px_opt('scrolling-easing'),
    );
    wp_localize_script('custom', 'pixflowJsSpeed', $speedJs );

    // preloader options
    $preloaderJs = array(
    
        'PlEnable' => px_opt('loader_display'),
        'plbarcolor' => px_opt ('preloader-bar-color'),
        'Plbackgroundcolor' => px_opt('preloader-background-color'),
        'Pllogo' => px_opt('preloader-logo'),
        'PlStyle' => px_opt('preloader_style'),

    );
    wp_localize_script('custom', 'pixflowJspl', $preloaderJs );

    // Full Screen Animation Style options
     $sliderJs = array(
        'SliderMode' => px_opt('animation-mode'),
    );
    wp_localize_script('custom', 'pixflowJsSlider', $sliderJs );
    
    
    // additional scripts
    $additionaljs = array(
        'additionaljs' => px_opt('additional-js'),
    );
    wp_localize_script('custom', 'pixflowAdditionalJs', $additionaljs );

    wp_localize_script(
        'custom',
        'theme_uri',
        array(
            'img' => THEME_IMAGES_URI
        )
    );

    wp_localize_script( 'custom', 'theme_strings', array('contact_submit'=>__('Send', TEXTDOMAIN) ) );

    px_Load_Posts_Init();

}
add_action('wp_enqueue_scripts', 'px_theme_scripts');

//load more function
function px_Load_Posts_Init() {

    // Add some parameters for the JS - blog load more .
    $queryArgsPost = array (
        'post_type'      => 'post',
    );
    $query = new WP_Query($queryArgsPost);
    $max = $query-> max_num_pages;
    $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

    wp_localize_script(
        'custom',
        'paged_data',
        array(
            'startPage' => $paged,
            'maxPages' => $max,
            'nextLink' => next_posts($max, false),
            'loadingText' => __('Loading...', TEXTDOMAIN),
            'loadMoreText' => __('Load More', TEXTDOMAIN),
            'noMorePostsText' => __('No More Posts', TEXTDOMAIN)
        )
    );

}

//Custom stylesheet file to the TinyMCE visual editor
function px_add_editor_styles()
{
    add_editor_style();
}

add_action( 'init', 'px_add_editor_styles' );

function px_theme_fonts()
{
    $fontBody     = px_opt('font-body');
    $fontHeading  = px_opt('font-headings');
    $fontNav      = px_opt('font-navigation');
    $ShortcodeFont  = px_opt('font-shortcode');
    $fontNumber   = 'Oswald';

    
    if ( px_opt('home-text-style') == 5) {
    
        $fontTextRotator = 'Playfair Display';
    
    } else if ( px_opt('home-text-style') == 6) {
    
        $fontTextRotator = 'Lobster';
        $fontTextRotator2 = 'Playfair Display';
       
    } else if ( px_opt('home-text-style') == 7) {
    
        $fontTextRotator = 'Bree Serif';
        $fontTextRotator2 = 'Playfair Display';
       
    } else if ( px_opt('home-text-style') == 8) {
    
        $fontTextRotator = 'Great Vibes';
       
    }
    
    
    //Fix for setup problem (shouldn't happen after the update, just for old setups)
    if('' == $fontBody && '' == $fontHeading && '' == $fontNav && '' == $ShortcodeFont && '' == $fontNumber )
        $fontBody = $fontHeading  = $fontNav = $ShortcodeFont =  $fontNumber = '';
        

    if (px_opt('home-text-style') == 5 || px_opt('home-text-style') == 8 ){
    
        $fonts  = array($fontBody, $fontHeading , $fontNav , $ShortcodeFont , $fontNumber , $fontTextRotator);
        $fontVariants = array(array(300,400,700), array(400), array(400,700) , array(300,400,700) , array(400), array(400));//Suggested variants if available 
       
    } else if ( px_opt('home-text-style') == 6 || px_opt('home-text-style') == 7 ) {
    
        $fonts  = array($fontBody, $fontHeading , $fontNav , $ShortcodeFont , $fontNumber , $fontTextRotator , $fontTextRotator2);
        $fontVariants = array(array(300,400,700), array(400), array(400,700) , array(300,400,700) , array(400), array(400), array(400));//Suggested variants if available

    } else {
        
        $fonts  = array($fontBody, $fontHeading , $fontNav , $ShortcodeFont , $fontNumber);
        $fontVariants = array(array(300,400,700), array(400), array(400,700) , array(300,400,700) , array(400));//Suggested variants if available
    } 

    $fonts        = array_filter($fonts);//remove empty elements
    $fontList     = array();
    $fontReq      = 'http://fonts.googleapis.com/css?family=';
    $gf           = new PxGoogleFonts(px_path_combine(THEME_LIB, 'googlefonts.json'));

    //Build font list
    foreach($fonts as $key => $font)
    {
        $duplicate = false;
        //Search for duplicate
        foreach($fontList as $item)
        {
            if($font == $item['font'])
            {
                $duplicate = true;
                $item['variants'] = array_unique(array_merge($item['variants'], $fontVariants[$key]));
                break;
            }
        }

        //Add
        if(!$duplicate)
            $fontList[] = array('font'=>$font, 'variants'=>$fontVariants[$key]);
    }

    $temp=array();
    foreach($fontList as $item)
    {
        $font = $gf->GetFontByName($item['font']);

        if(null==$font)
            continue;

        $variants = array();
        foreach($item['variants'] as $variant)
        {
            //Check if font object has the variant
            if(in_array($variant, $font->variants))
            {
                $variants[] = $variant;
            }
            else if(400 == $variant && in_array('regular', $font->variants))
            {
                $variants[] = $variant;
            }
        }

        $query = preg_replace('/ /', '+', $item['font']);

        if(count($variants))
            $query .= ':' . implode(',', $variants);

        $temp[] = $query;
    }

    if(count($temp))
    {
        $fontReq .= implode('|', $temp);
        wp_enqueue_style('fonts', $fontReq);
    }
}
