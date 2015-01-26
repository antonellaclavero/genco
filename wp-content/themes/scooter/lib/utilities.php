<?php

// include simple_html_dom  :: A simple PHP HTML DOM parser written in PHP5+, supports invalid HTML, and provides a very easy way to handle HTML elements.
if (!function_exists('file_get_html')) require_once(THEME_LIB . '/includes/simple_html_dom.php');
if ( is_singular() ) wp_enqueue_script( "comment-reply");

// Social Link 
function px_socialLink($optKey, $text, $class) {
    if(px_opt($optKey) != '')
    {?>
    <li><a href="<?php px_eopt($optKey); ?>" target="_blank"> <span class="<?php echo $class; ?>" ></span> </a></li>
    <?php
    }
}


// Replaces the excerpt "more" text by a link // Display None 
function new_excerpt_more($more) {
       global $post;
    return '<a class="moretag" href="'. get_permalink(get_the_ID()) . '"> '. __('Read more', TEXTDOMAIN) .' </a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


// retrieves the attachment ID from the file URL
function px_get_image_id($image_url) {
    global $wpdb;

    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " .$wpdb->prefix. "posts WHERE guid='%s';", $image_url));

    if(count($attachment))
        return $attachment[0];
    else
        return -1;
}

//Return theme option
function px_opt($option){
    $opt = get_option(OPTIONS_KEY);

    return stripslashes($opt[$option]);
}

//Echo theme option
function px_eopt($option){
    echo px_opt($option);
}

function px_print_terms($terms, $separatorString) {
    $termIndex = 1;
    if($terms)
    foreach ($terms as $term)
    {
        echo $term->name;

        if(count($terms) > $termIndex)
            echo $separatorString;

        $termIndex++;
    }
}

// Gets array value with specified key, if the key doesn't exist  default value is returned
function px_array_value($key, $arr, $default='') {
    return array_key_exists($key, $arr) ? $arr[$key] : $default;
}

// Deletes attachment by given url
function px_delete_attachment( $url ) {
    global $wpdb;

    // We need to get the image's meta ID.
    $query = "SELECT ID FROM wp_posts where guid = '" . esc_url($url) . "' AND post_type = 'attachment'";
    $results = $wpdb->get_results($query);

    // And delete it
    foreach ( $results as $row ) {
        wp_delete_attachment( $row->ID );
    }
}

//get page meta
function px_get_meta($key, $single = true)
{
    $pid = null;

    if(in_the_loop() || is_single() || (is_page() && !is_home()))
    {
        $pid = get_the_ID();
    }
    //Special case for blog page
    elseif(is_home() && !is_front_page())
    {
        $pid = get_option('page_for_posts');
    }

    if(null == $pid)
        return '';

    return get_post_meta($pid, $key, $single);
}


// Get video url from known sources such as youtube and vimeo 

function px_extract_video_info($string)
{
    //check for youtube video url
    if(preg_match('/https?:\/\/(?:www\.)?youtube\.com\/watch\?v=[^&\n\s"<>]+/i', $string, $matches ))
    {
        $url = parse_url($matches[0]);
        parse_str($url['query'], $queryParams);

        return array('type'=>'youtube', 'url'=> $matches[0], 'id' => $queryParams['v']);
    }
    //Vimeo
    else if(preg_match('/https?:\/\/(?:www\.)?vimeo\.com\/\d+/i', $string, $matches))
    {
        $url = parse_url($matches[0]);

        return array('type'=>'vimeo', 'url'=> $matches[0], 'id' => ltrim($url['path'], '/'));
    }

    return null;
}

// Get Audio url from soundcloud

function px_extract_audio_info($string)
{
    //check for soundcloud url
    if(preg_match('/https?:\/\/(?:www\.)?soundcloud\.com\/[^&\n\s"<>]+\/[^&\n\s"<>]+\/?/i', $string, $matches ))
    {
        return array('type'=>'soundcloud', 'url'=> $matches[0]);
    }

	return null;
}


function px_get_video_meta(array &$video)
{
    if($video['type']  != 'youtube' && $video['type'] != 'vimeo')
        return null;

    $ret = px_get_url_content($video['url']/*, '127.0.0.1:8080'*/);

    if(is_array($ret))
        return 'Server Error: ' . $ret['error'] . " \nError No: " . $ret['errorno'];

    if(trim($ret) == '')
        return 'Error: got empty response from youtube';

    $html = str_get_html($ret);
    $vW   = $html->find('meta[property="og:video:width"]');
    $vH   = $html->find('meta[property="og:video:height"]');

    if(count($vW) && count($vH))
    {
        $video['width']  = $vW[0]->content;
        $video['height'] = $vH[0]->content;
    }

    return null;
}

function px_soundcloud_get_embed($url)
{
    $json = px_get_url_content("http://soundcloud.com/oembed?format=json&url=$url"/*, '127.0.0.1:86'*/);

    if(is_array($json))
        return 'Server Error: ' . $json['error'] . " \nError No: " . $json['errorno'];

    if(trim($json) == '')
        return 'Error: got empty response from soundcloud';

    //Convert the response string to PHP object
    $data = json_decode($json);

    if(NULL == $data)
        return "Cant decode the soundcloud response \nData: $json" ;

    //TODO: add additional error checks

    return $data->html;
}

// downloads data from given url

function px_get_url_content($url, $proxy='')
{
    $ch = curl_init();

    // set URL and other appropriate options
    $options = array( CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true );

    if($proxy != '')
        $options[CURLOPT_PROXY] = $proxy;

    // set URL and other appropriate options
    curl_setopt_array($ch, $options);

    $ret = curl_exec($ch);

    if(curl_errno($ch))
        $ret = array('error' => curl_error($ch), 'errorno' => curl_errno($ch));

    curl_close($ch);
    return $ret;
}

//Html 5 Video background 
function px_header_banner_video() {

    $video_preview = px_opt('home-video-imge');
    $webm = px_opt('home-video-WebM');
    $mp4 = px_opt('home-video-MP4');

    $output = '';
    $output .= '<div style="background-image:url('.$video_preview.')" class="hidden-desktop videoHomePreload"></div>';
    $output .= '<div class="videoHome videoWrap"><video class="video" width="1920" height="800" poster="'.$video_preview.'" controls="controls" preload="auto" loop="true" autoplay="true">';

    if ( !empty( $webm ) ) {
        // WebM/VP8 for Firefox4, Opera, and Chrome
        $output .= '<source type="video/webm" src="'.$webm.'" />';
    }

    if ( !empty( $mp4 ) ) {
        //MP4 for Safari, IE9, iPhone, iPad, Android, and Windows Phone 7
        $output .= '<source type="video/mp4" src="'.$mp4.'" />';
    }

    //if ( !empty( $mp4 ) ) {
        //Flash fallback for non-HTML5 browsers without JavaScript
        $output .= '<object width="320" height="240" type="application/x-shockwave-flash" data="'.get_template_directory_uri().'/assets/js/flashmediaelement.swf">';
        $output .= '<param name="movie" value="'.get_template_directory_uri().'/assets/js/flashmediaelement.swf" />';
        $output .= '<param name="flashvars" value="controls=true&file='.$mp4.'" />';
        $output .= '<img src="'.$video_preview.'" width="1920" height="800" title="No video playback capabilities" />';
        $output .= '</object>';
    //}
    $output .= '</video></div>';

    echo $output;
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
//Layer slider
function px_get_layerSlider_slides() {

    $files = scandir(WP_PLUGIN_DIR);
    $layerSlider = false;
    $layerSliderDirectory = "";
    foreach($files as $file ){
        if($file != '.' && $file != '..' && $layerSlider != true){
            $filename = WP_PLUGIN_DIR.'/'.$file.'/layerslider.php';
            if (file_exists($filename)) {
                $layerSlider = true;
                $layerSliderDirectory  =  $file ;
            }
        }
    }

    if ($layerSlider) {
    
        if (is_plugin_active($layerSliderDirectory.'/layerslider.php')) {
    
            // Get WPDB Object
            global $wpdb;

            // Table name
            $table_name = $wpdb->prefix . "layerslider";

            // Get sliders
            $sliders = $wpdb->get_results( "SELECT * FROM $table_name
                                                WHERE flag_hidden = '0' AND flag_deleted = '0'
                                                ORDER BY date_c ASC LIMIT 100" );

            $items = array('no-slider'=>'');

            // Iterate over the sliders
            foreach($sliders as $key => $item) {
                $items[$item->id] = $item->name;
            }

            return $items;
        }
   }
   
}


// Generate Portfolio Skill array 
function px_generate_portfolio_skill()
{
    $portfolioTerms = get_terms('skills');
    $skillsArray = array();

    foreach($portfolioTerms as $term) {
        $skillArray = array(
                            'type' => 'checkbox',
                            'checked' => true,
                            'value' => 'visible',
                            'label' => $term->name
                        );

        $skillsArray["term-".$term->term_id] = $skillArray;
    }
    return $skillsArray;
}

// Generate Portfolio Skill options list 
function  px_generate_portfolio_skill_option ($fields)
{
    $portfolioTerms = get_terms('skills');
    $SkillOption = array();

    foreach($portfolioTerms as $term) {

        $SkillOption = $fields['term-'. $term-> term_id];

        $SkillOptions["term-".$term->term_id] = $SkillOption;
    }

    return $SkillOptions;
}

// Portfolio Skill
function px_get_Portfolio_skills()
{
    $portfolioTerms = get_terms('skills');
    $portfolioSlugs = array();

    foreach($portfolioTerms as $term) {
        $portfolioSlugs[$term->slug] = $term->name;
    }

    return $portfolioSlugs;
}

// CF7
function px_get_contact_form7_forms()
{
    // Get WPDB Object
    global $wpdb;

    // Table name
    $table_name = $wpdb->prefix . "posts";

    // Get forms
    $forms = $wpdb->get_results( "SELECT * FROM $table_name
                                  WHERE post_type='wpcf7_contact_form'
                                  LIMIT 100" );

    $items = array('no-form'=>'');

    // Iterate over the sliders
    foreach($forms as $key => $item) {
        $items[$item->ID] = $item->post_title;
    }

    return $items;
}

// post pagination Search And Archive page!
function px_get_pagination($query = null, $range = 3) {
    global $paged, $wp_query;

    $q = $query == null ? $wp_query : $query;
    $output = '';

    // How much pages do we have?
    if ( !isset($max_page) ) {
        $max_page = $q->max_num_pages;
    }

    // We need the pagination only if there is more than 1 page
    if ( $max_page < 2 )
        return $output;

    $output .= '<div class="post-pagination">';

    if ( !$paged ) $paged = 1;

    // To the previous page
    if($paged > 1)
        $output .= '<a class="prev-page-link" href="' . get_pagenum_link($paged-1) . '">'. __('Prev', TEXTDOMAIN) .'</a>';

    if ( $max_page > $range + 1 ) {
        if ( $paged >= $range )
            $output .= '<a href="' . get_pagenum_link(1) . '">1</a>';
        if ( $paged >= ($range + 1) )
            $output .= '<span class="page-numbers">&hellip;</span>';
    }

    // We need the sliding effect only if there are more pages than is the sliding range
    if ( $max_page > $range ) {
        // When closer to the beginning
        if ( $paged < $range ) {
            for ( $i = 1; $i <= ($range + 1); $i++ ) {
                $output .= ( $i != $paged ) ? '<a href="' . get_pagenum_link($i) .'">'.$i.'</a>' : '<span class="this-page">'.$i.'</span>';
            }
            // When closer to the end
        } elseif ( $paged >= ($max_page - ceil(($range/2))) ) {
            for ( $i = $max_page - $range; $i <= $max_page; $i++ ) {
                $output .= ( $i != $paged ) ? '<a href="' . get_pagenum_link($i) .'">'.$i.'</a>' : '<span class="this-page">'.$i.'</span>';
            }
            // Somewhere in the middle
        } elseif ( $paged >= $range && $paged < ($max_page - ceil(($range/2))) ) {
            for ( $i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++ ) {
                $output .= ($i != $paged) ? '<a href="' . get_pagenum_link($i) .'">'.$i.'</a>' : '<span class="this-page">'.$i.'</span>';
            }
        }
        // Less pages than the range, no sliding effect needed
    } else {
        for ( $i = 1; $i <= $max_page; $i++ ) {
            $output .= ($i != $paged) ? '<a href="' . get_pagenum_link($i) .'">'.$i.'</a>' : '<span class="this-page">'.$i.'</span>';
        }
    }

    if ( $max_page > $range + 1 ){
        // On the last page, don't put the Last page link
        if ( $paged <= $max_page - ($range - 1) )
            $output .= '<span class="page-numbers">&hellip;</span><a href="' . get_pagenum_link($max_page) . '">' . $max_page . '</a>';
    }

    // Next page
    if($paged < $max_page)
        $output .= '<a class="next-page-link" href="' . get_pagenum_link($paged+1) . '">'. __('Next', TEXTDOMAIN) .'</a>';

    $output .= '</div><!-- post-pagination -->';

    echo $output;
}


/* add  Feature image Column in Admin panel */

add_filter('manage_posts_columns', 'px_add_post_thumbnail_column', 5); // Add the posts columns filter.
add_filter('manage_pages_columns', 'px_add_post_thumbnail_column', 5); // Add the pages columns filter.

// Add the column
function px_add_post_thumbnail_column($cols){
  $cols['px_post_thumb'] = __('Featured', TEXTDOMAIN);
  return $cols;
}

// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_posts_custom_column', 'px_display_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'px_display_post_thumbnail_column', 5, 2);

// Grab featured-thumbnail size post thumbnail and display it.
function px_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'px_post_thumb':
        if( function_exists('the_post_thumbnail') ) {
            
            //if ( !has_post_thumbnail() ) {
               // echo 'Not supported in theme';
               // echo '<img width="41" height="50" src="'.get_stylesheet_directory_uri() .'/assets/img/nothumbnail.png" . alt="">';
                
           // } else {
                echo the_post_thumbnail( 'admin-list-thumb' );
          //  }

           
        } else {
            echo 'Not supported in theme';
        }
      break;
  }
}


/* Search Pages by content */

function px_search_pages_by_content($cnt)
{
    // Get WPDB Object
    global $wpdb;

    $sql = $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_type='page' AND post_status='publish' AND post_content LIKE %s",
        '%' . like_escape($cnt) . '%' );

    // Get forms
    $pages = $wpdb->get_results( $sql );

    return $pages;
}


//  Custom Login Logo 
function px_login_logo() {

    $login_logo = ( px_opt('login-logo') ? px_opt('login-logo') : THEME_ADMIN_URI . '/img/wp_login_logo.png' );
    echo '<style type="text/css"> h1 a { background: url(' . $login_logo . ') center no-repeat !important; width:302px !important; height:67px !important; } </style>';
}
add_action('login_head', 'px_login_logo');
                                                                

// Sidebar widget count 
function px_count_sidebar_widgets( $sidebar_id, $echo = false ) {
    $sidebars = wp_get_sidebars_widgets();

    if( !isset( $sidebars[$sidebar_id] ) )
        return -1;

    $cnt = count( $sidebars[$sidebar_id] );

    if( $echo )
        echo $cnt;
    else
        return $cnt;
}

// Use shortcodes in text widgets.
add_filter('widget_text', 'do_shortcode');

// Get Sidebar 
function px_get_sidebar($id = 1, $class='') {
    $sidebarClass = "sidebar widget-area";

    if('' != $class)
        $sidebarClass .= " $class";

    if(px_count_sidebar_widgets($id) < 1)
        $sidebarClass .= ' no-widgets';
?>
    <div class="<?php echo $sidebarClass; ?>"><?php dynamic_sidebar($id); ?></div>
<?php
}

// woocomerce

    // Adds theme support for woocommerce 
	add_theme_support('woocommerce');

    // Redefine woocommerce_get_product_thumbnail 

	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post;

		if ( has_post_thumbnail() )
			return "<div class=\"imageswrap productthumbnail\"><div class=\"imageHOpacity\"></div>".get_the_post_thumbnail( $post->ID, $size )."</div>";
		elseif ( wc_placeholder_img_src() )
			return wc_placeholder_img( $size );
	}
	
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    add_action( 'woocommerce_before_shop_loop_item_title_rating', 'woocommerce_template_loop_rating', 5 );
   

// Add FeatureImage Boxes In Portfolio
require_once(THEME_LIB . '/includes/multi-post-thumbnails.php');

if (class_exists('MultiPostThumbnails')) { 

   $featureImageNum = 4;
   $counter = 2;

    while ($counter < ($featureImageNum)) {
    
        // Add Slides in Portfolio Items
        new MultiPostThumbnails(
            array(
                'label' => 'Featured Image ' . $counter,
                'id' => $counter . '-slide',
                'post_type' => 'portfolio'
            ));
    
    $counter++;
    
    }
}

//	Get Post Slides
if (!function_exists('px_thumbnail_post_slideshow')) :

    function px_thumbnail_post_slideshow ($image_size, $id ,$post_name , $pDAjaxCheck , $terms , $isLink , $pLink) {

        // Add slideshow javascript
        global $add_slider;
        $add_slider = true;

        $thumbnum = 3;
        // Add one to the thumbnail number for the loop
        $thumbnum++;
        // Set the slideshow variable
        $slideshow = '';

        // Get The Post Type
        $posttype = get_post_type( $id );

        // Check whether the slide should link
        $permalink = get_permalink($id);
        $title = get_the_title($id); // get the item title
        $termNames = get_the_term_list( $id , 'skills', '<span>', '</span> , <span> ', ' </span>' ); // get the item skills

        if ( $isLink == true) {
        
              $permalink = '<a href="'.  $pLink .'"  title="'.$title.'" class="overlay thumbnail-'.$image_size.'">';
        
        
        } else {

                if ( $pDAjaxCheck == 1 ) { //portfolio Ajax enable
                    $permalink = '<a href="'. home_url() .'/#!portfolio-detail/'.$post_name.'"  title="'.$title.'" class="overlay thumbnail-'.$image_size.'">';
                } else if ( $pDAjaxCheck == 0 ) { //portfolio Ajax Disable
                    $permalink = '<a href="'. home_url() .'/?portfolio='.$post_name.'"  title="'.$title.'" class="overlay thumbnail-'.$image_size.'">';
                }

        }

        $permalinkend = '</a>';

        $counter = 2; //start counter at 2

        $full = get_post_meta($id,'_thumbnail_id',false); // Get Image ID

        $image_size = 'thumbnail-'.$image_size;

        // If there's a featured image
        if($full) {

            $alt = get_post_meta($full, '_wp_attachment_image_alt', true); // Alt text of image
            $full = wp_get_attachment_image_src($full[0], 'full', false);  // URL of Featured Full Image

            $thumb = get_post_meta($id,'_thumbnail_id',false);
            $thumb = wp_get_attachment_image_src($thumb[0], $image_size, false);  // URL of Featured first slide


            // Get all slides
            while ($counter < ($thumbnum)) {

                ${"full" . $counter} = MultiPostThumbnails::get_post_thumbnail_id($posttype, $counter . '-slide', $id); // Get Image ID

                ${"alt" . $counter} = get_post_meta(${"full" . $counter} , '_wp_attachment_image_alt', true); // Alt text of image
                ${"full" . $counter} = wp_get_attachment_image_src(${"full" . $counter}, false); // URL of Second Slide Full Image

                ${"thumb" . $counter} = MultiPostThumbnails::get_post_thumbnail_id($posttype, $counter . '-slide', $id);
                ${"thumb" . $counter} = wp_get_attachment_image_src(${"thumb" . $counter}, $image_size, false); // URL of next Slide


            $counter++;

            }

            // If there's a slide 2
            $slideshow .= (isset($thumb2[0]) && $thumb2[0] != '') ? '<div class="flexslider portfolioFlexslider"><div class="slides">' : '';

            // If there's a slide 2 and outside arrows are set to true
            $slideshow .= '<div class="pSlide" style="background-image: url('. $thumb[0] .');"';


            $slideshow .= '></div>';

            $slideshow .= $permalink.'<div class="gradient"></div>'.
                        '<div class="title">'.get_the_title($id).'</div><div class="skills">'. $termNames  .'</div>' . $permalinkend;


            $slideshow .= (isset($thumb2[0]) && $thumb2[0] != '') ? '</li>' : '';

            // Loop through thumbnails and set them
            if (isset($thumb2[0]) && $thumb2[0] != '') {
                $tcounter = 2;
                while ($tcounter < ($thumbnum)) :
                    if ( ${'thumb' . $tcounter}) :
                       $slideshow .= '<div class="pSlide" style="background-image: url('. ${'thumb' . $tcounter}[0]  .');"';
                       $slideshow .= '></div>' ;

                       $slideshow .= $permalink. '<div class="gradient"></div>'.
                        '<div class="title">'.get_the_title().'</div><div class="skills">'. $termNames .'</div>'.$permalinkend ;

                    endif; $tcounter++;
                endwhile;
            }

            $slideshow .= (isset($thumb2[0]) && $thumb2[0] != '') ? '</div></div>' : '';


        } else {

            $slideshow .= '<div class="pSlide"></div>';
            $slideshow .= $permalink. '<div class="gradient"></div>'.
                         '<div class="title">'.get_the_title().'</div><div class="skills">'. $termNames .'</div>'.$permalinkend ;


        } // End if $full

        return $slideshow;

    }
endif;