<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

    <title><?php wp_title('-', true , 'right'); ?> <?php bloginfo('name'); ?></title>

    <?php if(px_opt('favicon') != ""){ ?>
    <link rel="shortcut icon" href="<?php px_eopt('favicon'); ?>"  />
    <?php } else { ?>
    <link rel="shortcut icon" href="<?php echo THEME_IMAGES_URI ?>/favicon.png" />
    <?php } ?>

    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <!--[if lt IE 9]><script src="<?php echo THEME_JS_URI ?>/html5shiv.js"></script><![endif]-->

    <!-- Theme Hook -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php
        //Because it pushes the entire content to a side, it should be placed outside of layout element
        get_template_part( 'templates/navigation-mobile' );

    ?>
    <div id="top"></div>
    
    <div id="scrollToTop" class="visible-desktop">
        <a href="#top">
            <span class="icon icon-angle-up"></span>
        </a>
    </div>
    
    <div id="preloaderLayout" class="layout <?php if( px_opt('loader_display') == 1 ) { ?> preloaderLayout <?php } ?> ">