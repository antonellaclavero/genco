<?php
/*-----------------------------------------------------------------------------------

	Theme Shortcodes

-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Shortcode forms ajax handler
/*-----------------------------------------------------------------------------------*/

function px_sc_popup()
{
    include('forms.php');
    die();
}

add_action('wp_ajax_px_sc_popup', 'px_sc_popup');

/*-----------------------------------------------------------------------------------*/
/*	Shortcode helpers
/*-----------------------------------------------------------------------------------*/

//Generate ID for shortcodes
function px_sc_id($key)
{
    $globalKey = "px_sc_$key";

    if(array_key_exists($globalKey, $GLOBALS))
        $GLOBALS[$globalKey]++;
    else
        $GLOBALS[$globalKey] = 1;

    $id    = $GLOBALS[$globalKey];
    return "$key-$id";
}

/*-----------------------------------------------------------------------------------*/
/*	Section, Container, Row, Column and Offset Shortcodes
/*-----------------------------------------------------------------------------------*/

/* Alternate BG Section */

function px_sc_alt_section($atts, $content = null)
{
    extract(shortcode_atts(array(
        'background_color'   => '',
    ), $atts));

    $class = 'fullWidth';
    $style = '';

    if( '' == $background_color ) {
        $class .= ' color-alt-main-background';
    } else {
        $style = "style=\"background-color:$background_color;\"";
    }

    return '<div class="container"><div class="'.$class.'" '.$style.'>' . do_shortcode($content) . '</div></div>';
}

add_shortcode('section_alt', 'px_sc_alt_section');

/* Container */

function px_sc_container( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'vertical_padding'   => ''
    ), $atts));

    $vertical_padding = '' != $vertical_padding ? 'container-vspace' : '';

    return '<div class="container '.$vertical_padding.'">' . do_shortcode($content) . '</div>';
}

add_shortcode('container', 'px_sc_container');

/* Row */

function px_sc_row( $atts, $content = null ) {
    $GLOBALS['px_sc_spans'] = array();//Set/Reset
    do_shortcode($content);
    $spans = $GLOBALS['px_sc_spans'];

    extract(shortcode_atts(array(
        'topspace'   => '',
        'bottomspace'   => ''
    ), $atts));

    $id	= px_sc_id('row');
    $class  = array();
    $hasStyle = '' != $topspace || '' != $bottomspace  ;

    if( strlen($topspace)) {
        $class[] = ' topspace';
     }

     if( strlen($bottomspace)) {
        $class[] = ' bottomspace';
     }

    ob_start();
    if($hasStyle)
    {
    ?>
    <style type="text/css">
        <?php if(strlen($topspace))
        {
            echo "#$id.topspace"; ?>
            {
                margin-top: <?php echo $topspace; ?>px;
            }

        <?php
        }
        if(strlen($bottomspace))
        {
            echo "#$id.bottomspace"; ?>
            {
                margin-bottom: <?php echo $bottomspace; ?>px;
            }
        <?php
        }
        ?>
    </style>
    <?php
    }//if($hasStyle)
    ?>
        <div id="<?php echo $id; ?>" class="row <?php echo implode(' ', $class); ?>"><?php echo  implode("\n", $spans) ?></div>

    <?php
    return ob_get_clean();
}

add_shortcode('row', 'px_sc_row');

/* One Twelve Column */

    function px_sc_span1( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span1 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span1', 'px_sc_span1');

/* Two Twelve Column */

function px_sc_span2( $atts, $content = null ) {
   	extract(shortcode_atts(array(
    'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span2 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span2', 'px_sc_span2');

/* Three Twelve Column */

function px_sc_span3( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span3 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span3', 'px_sc_span3');

/* Four Twelve Column */

function px_sc_span4( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span4 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span4', 'px_sc_span4');

/* Five Twelve Column */

function px_sc_span5( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span5 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span5', 'px_sc_span5');

/* Six Twelve Column */

function px_sc_span6( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span6 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span6', 'px_sc_span6');

/* Seven Twelve Column */

function px_sc_span7( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span7 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span7', 'px_sc_span7');

/* Eight Twelve Column */

function px_sc_span8( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span8 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span8', 'px_sc_span8');

/* Nine Twelve Column */

function px_sc_span9( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span9 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span9', 'px_sc_span9');

/* Ten Twelve Column */

function px_sc_span10( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span10 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span10', 'px_sc_span10');

/* Eleven Twelve Column */

function px_sc_span11( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span11 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span11', 'px_sc_span11');

/* Twelve Twelve Column */

function px_sc_span12( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span12 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span12', 'px_sc_span12');

/*-----------------------------------------------------------------------------------*/
/*  Separators
/*-----------------------------------------------------------------------------------*/

function px_sc_separator( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'size'   => '',  // small, small-center, medium, medium-center
        'margin' => '',//small, medium
        'thickness' => '',
        'color' => '#888',
    ), $atts));

    $id = px_sc_id('separator');
    $class = '';

    switch($size)
    {
        case 'small':
            $class[] = 'hr-small';
            break;
        case 'small-center':
            $class[] = 'hr-small hr-center';
            break;
        case 'medium':
            $class[] = 'hr-medium';
            break;
        case 'medium-center':
            $class[] = 'hr-medium hr-center';
            break;
    }

    switch($margin)
    {
        case 'small':
            $class[] = 'hr-margin-small';
            break;
        case 'medium':
            $class[] = 'hr-margin-medium';
            break;
    }

    if('thick' == $thickness)
    {
        $class[] = 'hr-thick';
    }

    $hasStyle = '' != $color ;

    if($hasStyle)
    {
    ?>
    <style type="text/css">
        <?php if(strlen($color))
        {
            echo "hr#$id"; ?>
            {
                background-color: <?php echo $color; ?>;
            }

        <?php
        }
        ?>
    </style>
    <?php
    }//if($hasStyle)

    ob_start();
    ?>

        <hr id="<?php echo $id; ?>"  class="<?php echo implode(' ',$class)?>" />

    <?php
    return ob_get_clean();
}

add_shortcode('separator', 'px_sc_separator');

/*-----------------------------------------------------------------------------------*/
/*	Title with horizontal line
/*-----------------------------------------------------------------------------------*/

function px_sc_title( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'style'   => '',//center
        'title'   => '',
    ), $atts));

    $class = $style == 'center' ? 'hr-title-center' : 'hr-title';

    ob_start();
    ?>
    <div class="<?php echo $class; ?>">
        <div></div>
        <div class="title"><h3><?php echo $title; ?></h3></div>
        <div></div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('title_separator', 'px_sc_title');

/*-----------------------------------------------------------------------------------*/
/*	Team Member
/*-----------------------------------------------------------------------------------*/

function px_sc_team_member( $atts, $content = null ) {
    $descDefaultText = 'Lorem ipsum dolor sit amet, conse tu ert adipiscing elit. Donec odio quis qi que volutpat mattis eros. Sed adipisin ert adipiscing elit.';

    extract(shortcode_atts(array(
        'name'   => 'sharon stone',
        'title'  => 'Designer',
        'style'  => 'dark',
        'team_animation'  => '',
        'team_animation_delay'  => '',
        'url'    => '',
        'target' => '',
        'description'  => $descDefaultText,
        'image'  => '',
    ), $atts));

    $class = '';

    if(strlen($target))
        $target = "target=\"$target\"";

    if( strlen($team_animation)) {

        $class[] = ' teamWithAnimation';

     }

    ob_start();
    ?>
        <div class="team-member <?php echo implode(' ', $class); ?> <?php echo $style ?>"  <?php if(strlen($team_animation)) { ?> data-delay="<?php echo $team_animation_delay; ?>" data-animation="<?php echo $team_animation; ?>" <?php } ?>>
            <?php if('' != $image){ ?>

            <div class="image visible-desktop">

                <div class="bgImage" style="background-image:url(<?php echo $image; ?>); ">

                    <div class="imageOverlayWrap"></div>

                    <?php if('' != $url){ ?>
                    <div class="image-overlay">
                        <div class="image-overlay-wrap">
                            <div class="overlay">
                                <span class="icon-users overlay-icon"></span>
                                <a class="overlay-link" href="<?php echo $url; ?>" <?php echo $target; ?>></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="nameJob visible-desktop">
                         <div class="name">
                            <?php if('' != $url){ ?>
                            <a href="<?php echo $url; ?>" target="<?php echo $target; ?>"><?php echo $name; ?></a>
                            <?php
                            } else {
                                echo $name;
                            } ?>
                        </div>
                        <span class="job-title"><?php echo $title; ?></span>
                    </div>

                    <div class="description visible-desktop ">
                        <p class="descriptionContent">
                            <?php echo $description; ?>
                        </p>
                        <div class="descriptionIcon">
                            <?php
                            $GLOBALS['px_sc_team_icon'] = array();
                            do_shortcode($content);
                            $icons = $GLOBALS['px_sc_team_icon'];

                            if(count($icons))
                            {?>
                                <ul class="icons">
                                    <?php echo implode("\n", $icons); ?>
                                </ul>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>

            </div>

            <div class="image hidden-desktop">
                 <img src="<?php echo $image; ?>" alt="<?php echo esc_attr($name); ?>" class="js-blur"/>
                <?php if('' != $url){ ?>
                <div class="image-overlay">
                    <div class="image-overlay-wrap">
                        <div class="overlay">
                            <span class="icon-users overlay-icon"></span>
                            <a class="overlay-link" href="<?php echo $url; ?>" <?php echo $target; ?>></a>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="description hidden-desktop">

                        <div class="nameJob">
                             <div class="name">
                                <?php if('' != $url){ ?>
                                <a href="<?php echo $url; ?>" target="<?php echo $target; ?>"><?php echo $name; ?></a>
                                <?php
                                } else {
                                    echo $name;
                                } ?>
                            </div>
                            <span class="job-title"><?php echo $title; ?></span>
                        </div>

                    <div class="descHover">
                        <div class="table">
                            <div class="tableCell">
                                <div class="nameJob">
                                     <div class="name">
                                        <?php if('' != $url){ ?>
                                        <a href="<?php echo $url; ?>" target="<?php echo $target; ?>"><?php echo $name; ?></a>
                                        <?php
                                        } else {
                                            echo $name;
                                        } ?>
                                    </div>
                                    <span class="job-title"><?php echo $title; ?></span>
                                </div>

                                <p class="descriptionContent">
                                    <?php  echo $description; ?>
                                </p>

                                <div class="descriptionIcon">
                                    <?php


                                    $GLOBALS['px_sc_team_icon'] = array();
                                    do_shortcode($content);
                                    $icons = $GLOBALS['px_sc_team_icon'];

                                    if(count($icons))
                                    {?>
                                        <ul class="icons">
                                            <?php echo implode("\n", $icons); ?>
                                        </ul>
                                    <?php
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <?php } ?>

        </div>
    <?php
    return ob_get_clean();
}

add_shortcode('team_member', 'px_sc_team_member');

function px_sc_team_icon($atts, $content = null)
{
    extract(shortcode_atts(array(
        'title'   => '',
        'url'     => '#',
        'icon'    => 'evil-2',
        'target'  => '',
    ), $atts));

    if(strlen($target))
        $target = "target=\"$target\"";

    ob_start();
    ?>
    <li>
        <a href="<?php echo $url; ?>" title="<?php echo $title; ?>" <?php echo $target; ?>>
            <span class="icon-<?php echo $icon; ?>" ></span>
        </a>
    </li>
    <?php
    $GLOBALS['px_sc_team_icon'][] = ob_get_clean();
}

add_shortcode('team_icon', 'px_sc_team_icon');

/*-----------------------------------------------------------------------------------*/
/*	Accordion & Toggle
/*-----------------------------------------------------------------------------------*/

function px_sc_accordion($atts, $content=null)
{
    return px_sc_accordion_content('accordion', $atts, $content);
}

add_shortcode('accordion', 'px_sc_accordion');

function px_sc_toggle($atts, $content=null)
{
    return px_sc_accordion_content('toggle', $atts, $content);
}

add_shortcode('toggle', 'px_sc_toggle');

function px_sc_accordion_content($type='accordion',$atts, $content=null)
{
    $GLOBALS['px_sc_accordion_tab'] = array();
    do_shortcode($content);
    $items = $GLOBALS['px_sc_accordion_tab'];

    ob_start();
    ?>
    <div class="<?php echo $type; ?>">
        <?php echo implode("\n", $items); ?>
    </div>
    <?php
    return ob_get_clean();
}

function px_sc_accordion_tab($atts, $content=null)
{
    px_sc_accordion_tab_content('accordion', $atts, $content);
}

add_shortcode('accordion_tab', 'px_sc_accordion_tab');

function px_sc_toggle_tab($atts, $content=null)
{
    px_sc_accordion_tab_content('toggle', $atts, $content);
}

add_shortcode('toggle_tab', 'px_sc_toggle_tab');

function px_sc_accordion_tab_content($type='accordion', $atts, $content=null)
{
    extract(shortcode_atts(array(
        'title'   => 'Accordion Tab',
        'keepopen' => ''
    ), $atts));

    if($type != 'accordion' && !array_key_exists('title', $atts))
        $title = 'Toggle Tab';

    $tabClass = $keepopen != '' ? 'keep-open' : '';

    ob_start();
    ?>
    <div class="tab <?php echo $tabClass; ?>">
        <div class="header clearfix">
            <div class="tab-button"><span class="icon-minus"></span></div>
            <h4 class="title"><?php echo $title; ?></h4>
        </div>
        <div class="body">
            <?php echo do_shortcode($content); ?>
        </div>
    </div>
    <?php
    $GLOBALS['px_sc_accordion_tab'][] = ob_get_clean();
}

/*-----------------------------------------------------------------------------------*/
/*  Testimonials
/*-----------------------------------------------------------------------------------*/

function px_sc_testimonial_group($atts, $content=null)
{
    $GLOBALS['px_sc_testimonial'] = array();
    do_shortcode($content);
    $items = $GLOBALS['px_sc_testimonial'];

    extract(shortcode_atts(array(
        'animation'  => 'fade',
        'skin'       => 'dark',
    ), $atts));

    $class = "flexslider testimonials ";

    if( 'fade' == $animation)
        $class .=' testimonialsFade';
    else if ('slide' == $animation )
        $class    .=' testimonialsSlide';


    if( 'dark' == $skin)
        $class    .=' testimonialsDark';
    else if ('light' == $skin )
        $class   .=' testimonialsLight';

    ob_start();
    ?>
    <div class="<?php echo $class ?>">
        <div class="item-list">
        <?php echo implode("\n", $items); ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
    }

    add_shortcode('testimonial_group', 'px_sc_testimonial_group');

    function px_sc_testimonial($atts, $content=null)
    {
    extract(shortcode_atts(array(
        'name'       => 'testimonial',
        'talker_name' => 'Joone Doyee',
        'comment'    => '',
        'skin'       => 'dark',
      //  'animate'    => 'no',
    ), $atts));

    $class    = array("clearfix", "testimonial");

    if('light' == $skin)
        $class[] = "skin-light";


    ob_start();
    ?>
    <div class="<?php echo implode(' ', $class); ?>">
        <div class="quote">
            <h4 class="name"><?php echo $name; ?></h4>
            <blockquote><?php echo $comment; ?></blockquote>
             <h6 class="talkerName"><?php echo $talker_name; ?></h6>
        </div>
    </div>
    <?php
    $ret = ob_get_clean();
    $GLOBALS['px_sc_testimonial'][] = $ret;
    return $ret;
}

add_shortcode('testimonial', 'px_sc_testimonial');

/*-----------------------------------------------------------------------------------*/
/*  Pie Chart
/*-----------------------------------------------------------------------------------*/

function px_sc_piechart($atts ,$content=null)
{
    extract(shortcode_atts(array(
        'title'    => '',
        'title_color'    => '',
        'subtitle' => '',
        'subtitle_color' => '',
        'piechart_percent' => '',
        'piechart_color'=> '#1f3642',
        'piechart_icon' => '',
        'piechart_animation' => '',
        'piechart_animation_delay' => '',
    ), $atts));

    $hasTitle   = '' != $title;
    $hasStyle = '' != $title_color || '' != $subtitle_color || '' != $piechart_color ;
    $class = "pieChart easyPieChart";
    $pieChartWithAnimation = '';
    $id	= px_sc_id('piechart');

    if( strlen($piechart_animation)) {

        $pieChartWithAnimation = ' pieChartWithAnimation';

     }

    ob_start();
    if($hasStyle)
    {
    ?>
    <style type="text/css">
        <?php if(strlen($title_color))
        {
            echo "#$id.pieChartBox .title"; ?>
            {
                color: <?php echo $title_color; ?>;
            }

        <?php
        }
        if(strlen($subtitle_color))
        {
            echo "#$id.pieChartBox .subtitle"; ?>
            {
                color: <?php echo $subtitle_color; ?>;
            }
        <?php
        }
        if(strlen($piechart_color))
        {
            echo "#$id.pieChartBox .perecent ,#$id.pieChartBox .icon"; ?>
            {
                color: <?php echo $piechart_color; ?>;
            }
        <?php
        }
        ?>
    </style>
    <?php
    }//if($hasStyle)
    ?>

    <div id="<?php echo $id; ?>" class="pieChartBox  <?php echo $pieChartWithAnimation; ?>" <?php if(strlen($piechart_animation)) { ?> data-delay="<?php echo $piechart_animation_delay; ?>" data-animation="<?php echo $piechart_animation; ?>" <?php } ?> <?php if($piechart_color){ ?> data-barColor=<?php echo $piechart_color; }?>>
        <div class="<?php if($piechart_icon){?>iconPchart <?php } ?><?php echo $class ;?>" data-percent="<?php echo $piechart_percent; ?>">
            <?php if($piechart_icon){?><span class="icon icon-<?php echo $piechart_icon; ?>"></span><?php } ?>
            <span class="perecent"><?php echo $piechart_percent; ?>%</span>
        </div>
        <p class="title"><?php echo $title; ?></p>
        <p class="subtitle"><?php echo $subtitle; ?></p>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'piechart', 'px_sc_piechart' );


/*-----------------------------------------------------------------------------------*/
/*	Social Link 
/*-----------------------------------------------------------------------------------*/

function px_sc_socialLink ($atts, $content=null)
{
    extract(shortcode_atts(array(
        'sociallink_url' => '',
        'sociallink_type'=> '',
    ), $atts));

    $id	= px_sc_id('socialLink');

    ob_start();

    ?>

    <div class="socialLinkShortcode"><a id="<?php echo $id; ?>" href="<?php echo $sociallink_url; ?>" target="_blank"><span class="<?php echo $sociallink_type; ?>"></span></a></div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'socialLink', 'px_sc_socialLink' );


/*-----------------------------------------------------------------------------------*/
/*  Text-Box
/*-----------------------------------------------------------------------------------*/

function px_sc_textbox($atts)
{
    extract(shortcode_atts(array(

        'title'  => '',
        'title_color'  => '',
        'title_fontsize'  => '20',
        'text_align'  => 'left',
        'text_title_style'  => 'none',
        'text_border_underline_color' => '',
        'text_under_align'  => 'left',
        'text_content'  => '',
        'text_content_color'  => '',
        'content_fontsize'  => '12',
        'text_animation'  => '',
        'text_animation_delay'  => '',
        'content'  => '',
        'url'  => '',
        'target' => '',

    ), $atts));

    $hasTitle  = '' != $title;
    $titleIsLink = '' != $url;
    $hasContent  = '' != $text_content;
    $hasStyle = '' != $title_color || '' != $text_border_underline_color || '' != $text_content_color || '' ;

    $id     = px_sc_id('textbox');
    $class  = array();
    $class[] = 'fontSize'.$title_fontsize;
    $contentFSClass = 'contentfs'.$content_fontsize;

    switch($text_align)
    {
        case 'right':
            $class[] = 'textBoxRight';
            break;
        case 'center':
            $class[] = 'textBoxCenter';
            break;
        case 'left':
        default:
            $class[] = 'textBoxleft';

    }

    switch($text_under_align)
    {
        case 'right':
            $class[] = 'textBoxUnderRight';
            break;
        case 'center':
            $class[] = 'textBoxUnderCenter';
            break;
        case 'left':
        default:
            $class[] = 'textBoxUnderleft';

    }

    switch($text_title_style)
    {
        case 'underline':
            $class[] = 'textBoxUnderline';
            break;
        case 'border':
            $class[] = 'textBoxBorder';
            break;
        case 'none':
        default:
            $class[] = 'textBoxNoStyle';
    }

     if( strlen($text_animation)) {

        $class[] = ' textWithAnimation';

     }

    ob_start();

    if($hasStyle)
    {
    ?>
    <style type="text/css">
        <?php if(strlen($title_color))
        {
            echo "#$id.textBox .title"; ?>
            {
                color: <?php echo $title_color; ?>;
            }

        <?php
        }
        if(strlen($text_border_underline_color))
        {
            echo "#$id.textBoxBorder .title "; ?>
            {
                border:3px solid <?php echo $text_border_underline_color; ?>;
            }

            <?php
            echo "#$id.textBoxUnderline .title  hr "; ?>
            {
                background-color: <?php echo $text_border_underline_color; ?>;
            }

        <?php
        }
        if(strlen($text_content_color))
        {
            echo "#$id .text "; ?>
            {
                color: <?php echo $text_content_color; ?>;
            }
        <?php
        }
        ?>
    </style>
    <?php
    }//if($hasStyle)
    ?>

    <div id="<?php echo $id; ?>" class="textBox <?php echo implode(' ', $class); ?>"  <?php if(strlen($text_animation)) { ?> data-delay="<?php echo $text_animation_delay; ?>" data-animation="<?php echo $text_animation; ?>" <?php } ?> >
        <?php if($hasTitle){ ?>

            <?php if($titleIsLink){ ?>

                <a class="title"  href="<?php $url; ?>" target="<?php echo $target; ?>"><?php echo $title; ?>
                    <hr>
                </a>
                <?php } else { ?>

                    <div class="title"><?php echo $title; ?>
                        <hr>
                    </div>

                <?php }?>

        <?php } ?>
        <?php if($hasContent){ ?>
            <div class="<?php echo $contentFSClass; ?> text"><?php echo $text_content ; ?></div>
        <?php } ?>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'textbox', 'px_sc_textbox' );

/*-----------------------------------------------------------------------------------*/
/*  Image-Box
/*-----------------------------------------------------------------------------------*/

function px_sc_imagebox($atts)
{
    extract(shortcode_atts(array(

        'image_url'  => '',
        'image_hover'  => 'disable',
        'image_animation'  => '',
        'image_animation_delay'  => '',
        'title'  => '',
        'title_color'  => '',
        'subtitle'  => '',
        'subtitle_color'  => '',
        'image_text_color'  => '',
        'image_text_align'  => 'left',
        'image_text_background_color'  => '',
        'image_text_border'  => 'disable',
        'image_text_border_color'  => '',
        'content'  => '',
        'url'  => '',
        'target' => '',

    ), $atts));

    $hasTitle  = '' != $title;
    $hasUrl = '' != $url;
    $hasSubTitle  = '' != $subtitle;
    $hasStyle = '' != $title_color || '' != $subtitle_color || '' != $image_text_color || '' != $image_text_background_color || '' != $image_text_border_color ;
    $hasTSContent = '' != $title || '' != $subtitle || '' != $content ;
    $hasContent = '' != $content ;

    $id     = px_sc_id('imagebox');
    $class  = array();

    switch($image_text_align)
    {
        case 'right':
            $class[] = 'imageBoxRight';
            break;
        case 'center':
            $class[] = 'imageBoxCenter';
            break;
        case 'left':
        default:
            $class[] = 'imageBoxleft';
    }


    switch($image_text_border)
    {
        case 'enable':
            $class[] = 'ImageBoxEnable';
            break;
        case 'disable':
            $class[] = 'ImageBoxDisable';
            break;
    }


     if( strlen($image_animation)) {

        $class[] = 'imgWithAnimation';

     }

    switch($image_hover)
    {
        case 'enable':
            $class[] = 'imgBoxHover';
            break;
    }



    ob_start();

    if($hasStyle)
    {
    ?>
    <style type="text/css">
        <?php if(strlen($image_text_border_color))
        {
            echo "#$id.imageBox "; ?>
            {
                border:solid 1px <?php echo $image_text_border_color; ?>;
            }

        <?php
        }
        if(strlen($title_color))
        {
            echo "#$id .content .title"; ?>
            {
                color: <?php echo $title_color; ?>;
            }
        <?php
        }
        if(strlen($subtitle_color))
        {
            echo "#$id  .content .subtitle "; ?>
            {
                color: <?php echo $subtitle_color; ?>;
            }
        <?php
        }
        if(strlen($image_text_color))
        {
            echo "#$id  .content .text "; ?>
            {
                color: <?php echo $image_text_color; ?>;
            }
        <?php
        }
        if(strlen($image_text_background_color))
        {
            echo "#$id  .content "; ?>
            {
                background-color: <?php echo $image_text_background_color; ?>;
            }
        <?php
        }
        ?>
    </style>
    <?php
    }//if($hasStyle)
    ?>

    <div id="<?php echo $id; ?>" class="imageBox <?php echo implode(' ', $class); ?>"  <?php if(strlen($image_animation)) { ?> data-delay="<?php echo $image_animation_delay; ?>" data-animation="<?php echo $image_animation; ?>" <?php } ?> >

        <?php if(strlen($image_url)){ ?>
            <div class="image">
                <div class="imageHOpacity"></div>
                <img src="<?php echo $image_url; ?>" <?php if ( $title ) { ?> alt="<?php echo esc_attr($title) ?>" <?php } else { ?> alt="#" <?php } ?>>
            </div>
         <?php } ?>

         <?php if ($hasTSContent) { ?>
            <div class="content">
                <?php if($hasTitle){ ?>
                    <?php if ($hasUrl) { ?>
                     <a class="title" href="<?php echo $url; ?>" target="<?php echo $target; ?>"><?php echo $title; ?></a>
                    <?php }  else { ?>
                     <div class="title"><?php echo $title; ?></div>
                    <?php } ?>
                <?php } ?>
                <?php if($hasSubTitle){ ?>
                    <div class="subtitle"><?php echo $subtitle; ?></div>
                <?php } ?>
                <?php if($hasContent){ ?>
                    <div class="text"><?php echo $content; ?></div>
                <?php } ?>
            </div>
        <?php } ?>

    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'imagebox', 'px_sc_imagebox' );

/*-----------------------------------------------------------------------------------*/
/*  Icon-Box
/*-----------------------------------------------------------------------------------*/

function px_sc_iconbox($atts, $content=null)
{
    extract(shortcode_atts(array(
        'title'         => '',
        'title_color'   => '',
        'icon_animation' => '',
        'icon_animation_delay' => '',
        'icon'          => 'wand',
        'icon_color'         => '',
        'icon_position' => 'left',
        'url'           => '',
        'url_text'      => __('Learn More', TEXTDOMAIN),
        'target'        => '',
        'content_color' => '',
        'animate'       => 'no'
    ), $atts));

    $hasTitle  = '' != $title;
    $hasStyle = '' != $title_color || '' != $icon_color || '' != $content_color ;

    $id     = px_sc_id('iconbox');
    $class  = array("iconbox");

    switch($icon_position)
    {
        case 'top':
            $class[] = 'iconbox-top';
            break;
        case 'left':
        default:
            $class[] = 'iconbox-left';
    }


    if( strlen($icon_animation)) {

        $class[] = ' iconWithAnimation';

    }

    ob_start();

    if($hasStyle)
    {
    ?>
    <style type="text/css">
        <?php if(strlen($title_color))
        {
            echo "#$id  .title "; ?>
            {
                color: <?php echo $title_color; ?>;
            }
        <?php
        }
        if(strlen($icon_color))
        {
            echo "#$id .glyph"; ?>
            {
                color: <?php echo $icon_color; ?>;
            }
        <?php
        }
        if(strlen($content_color))
        {
            echo "#$id  .content , #$id .more-link a "; ?>
            {
                color: <?php echo $content_color; ?>;
            }
        <?php
        }?>
    </style>
    <?php
    }//if($hasStyle)
    ?>

    <div id="<?php echo $id; ?>" class="<?php echo implode(' ', $class); ?>"  <?php if(strlen($icon_animation)) { ?> data-delay="<?php echo $icon_animation_delay; ?>" data-animation="<?php echo $icon_animation; ?>" <?php } ?>>
        <div class="icon">
            <span class="glyph icon-<?php echo $icon; ?>"></span>
        </div>
        <div class="content-wrap">
            <?php if($hasTitle){ ?>
                <h3 class="title"><?php echo $title; ?></h3>
            <?php } ?>
            <div class="content"><?php echo $content; ?></div>
            <?php if(strlen($url)){ ?>
                <div class="more-link">
                    <a href="<?php $url; ?>" target="<?php echo $target; ?>"><?php echo $url_text; ?><span class="icon-play"></span></a>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'iconbox', 'px_sc_iconbox' );

/*-----------------------------------------------------------------------------------*/
/*	Counter Box
/*-----------------------------------------------------------------------------------*/

function px_sc_conterbox($atts, $content=null)
{
    extract(shortcode_atts(array(
        'counter_number'  => '500',
        'counter_number_color' => '',
        'counter_text_color' => '' ,
        'counter_animation' => '' ,
        'counter_animation_delay' => '' ,
        'counter_text'   =>  __('Description', TEXTDOMAIN),
    ), $atts));

    $hasStyle = '' != $counter_number_color || '' != $counter_text_color ;
    $counter_number = intval($counter_number);
    $id     = px_sc_id('conterbox');

    $class  = array("counterBox");

    if( strlen($counter_animation)) {

        $class[] = 'counterWithAnimation';

     }

    ob_start();

    if($hasStyle)
    {
    ?>
    <style type="text/css">
        <?php if(strlen($counter_number_color))
        {
            echo "#$id > .counterBoxNumber"; ?>
            {
                color: <?php echo $counter_number_color; ?>;
            }
        <?php
        }
        if(strlen($counter_text_color))
        {
            echo "#$id > .counterBoxDetails"; ?>
            {
                color: <?php echo $counter_text_color; ?>;
            }
        <?php
        }?>
    </style>
    <?php
    }//if($hasStyle)
    ?>

    <div id="<?php echo $id; ?>" class="<?php echo implode(' ', $class); ?>" <?php if(strlen($counter_animation)) { ?> data-delay="<?php echo $counter_animation_delay; ?>" data-animation="<?php echo $counter_animation; ?>" <?php } ?> data-countNmber="<?php echo $counter_number; ?>">
        <span class="counterBoxNumber highlight"><?php echo $counter_number; ?></span>
        <h4 class="counterBoxDetails"><?php echo $counter_text; ?></h4>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'conterbox', 'px_sc_conterbox' );

/*-----------------------------------------------------------------------------------*/
/*  Video Vimeo
/*-----------------------------------------------------------------------------------*/

function px_sc_video_vimeo($atts, $content=null)
{
    extract(shortcode_atts(array(
        'vimeo_id'  => '',
        //'vimeo_height'   =>  '315',
        //'vimeo_width'   => '560',
    ), $atts));

    //$vimeo_height = intval($vimeo_height);
    //$vimeo_width = intval($vimeo_width);

    $vimeo_height = 315;
    $vimeo_width = 560;

    $id     = px_sc_id('video_vimeo');
    $class  = array("video_vimeo");

    ob_start();
    ?>

        <div id="<?php echo $id; ?>">
            <iframe src="http://player.vimeo.com/video/<?php echo $vimeo_id ?>" width="<?php echo $vimeo_width ?>" height="<?php echo $vimeo_height ?>" frameborder="0"></iframe>
        </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'video_vimeo', 'px_sc_video_vimeo' );

/*-----------------------------------------------------------------------------------*/
/*  Video YouTube
/*-----------------------------------------------------------------------------------*/

function px_sc_video_youtube($atts, $content=null)
{
    extract(shortcode_atts(array(
        'youtube_id'  => '',
        //'youtube_height'   =>  '315',
        //'youtube_width'   => '560',
    ), $atts));

    //$youtube_height = intval($youtube_height);
    //$youtube_width = intval($youtube_width);

    $youtube_height = 315;
    $youtube_width = 560;

    $id     = px_sc_id('video_youtube');
    $class  = array("video_youtube");

    ob_start();
    ?>

    <div id="<?php echo $id; ?>">
        <iframe title="YouTube video player" width="<?php echo $youtube_width ?>" height="<?php echo $youtube_height ?>" src="http://www.youtube.com/embed/<?php echo $youtube_id ?>" frameborder="0" allowfullscreen></iframe>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'video_youtube', 'px_sc_video_youtube' );

/*-----------------------------------------------------------------------------------*/
/*  Audio SoundCloud
/*-----------------------------------------------------------------------------------*/

function px_sc_audio_soundcloud($atts, $content=null)
{
    extract(shortcode_atts(array(
        'soundcloud_id'  => '',
        'soundcloud_height'   =>  '315',
        'soundcloud_width'   => '560',
    ), $atts));

    $soundcloud_height = intval($soundcloud_height);
    $soundcloud_width = intval($soundcloud_width);

    $id     = px_sc_id('video_youtube');
    $class  = array("audio_soundcloud");

    ob_start();
    ?>

    <div <?php echo $id; ?>>
        <iframe width="<?php echo $soundcloud_width; ?>" height="<?php echo $soundcloud_height; ?>" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $soundcloud_id; ?>&amp;auto_play=false&amp;hide_related=false&amp;visual=true"></iframe>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'audio_soundcloud', 'px_sc_audio_soundcloud' );

/*-----------------------------------------------------------------------------------*/
/*  Tabs
/*-----------------------------------------------------------------------------------*/

function px_sc_tab_group($atts, $content=null)
{
    $GLOBALS['px_sc_tab'] = array();
    do_shortcode($content);
    $tabs = $GLOBALS['px_sc_tab'];

    ob_start();
    ?>
    <div class="tabs">
    <?php if(count($tabs)){ ?>
        <ul class="head clearfix">
            <?php foreach($tabs as $tab){ ?>
            <li><?php echo $tab[0]; ?></li>
            <?php } ?>
        </ul>
        <div class="content">
            <?php foreach($tabs as $tab){ ?>
                <div class="tab-content"><?php echo $tab[1]; ?></div>
            <?php } ?>
        </div>
    <?php } ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode( 'tab_group', 'px_sc_tab_group' );

function px_sc_tab($atts, $content=null)
{
    $tabCnt = count($GLOBALS['px_sc_tab']) + 1;

    extract(shortcode_atts(array(
        'title' => "Tab $tabCnt",
    ), $atts));

    $GLOBALS['px_sc_tab'][] = array($title, do_shortcode($content));
}

add_shortcode( 'tab', 'px_sc_tab' );

/*-----------------------------------------------------------------------------------*/
/*  Button
/*-----------------------------------------------------------------------------------*/

function px_sc_button($atts, $content = null)
{
    extract(shortcode_atts(array(
        'title'            => '',
        'text'             => __('View Page', TEXTDOMAIN),
        'url'              => '#',
        'target'           => '',
        'size'             => '',
    ), $atts));

    if('' != $target)
        $target = "target=\"$target\"";

    $class = "button button1";

    switch($size)
    {
        case 'small':
            $class .=' button-small';
            break;
        case 'large':
            $class .=' button-large';
            break;
    }

    $id = px_sc_id('button');

    ob_start(); ?>

    <a id="<?php echo $id; ?>" class="<?php echo $class; ?>" href="<?php echo esc_attr($url); ?>" title="<?php echo esc_attr($title); ?>" <?php echo $target; ?>><?php echo $text; ?></a>
    <?php
    return ob_get_clean();
}

add_shortcode('button', 'px_sc_button');