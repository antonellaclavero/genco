<?php

function px_register_menus() {
    register_nav_menu( 'primary-nav', __( 'Primary Navigation', TEXTDOMAIN ) );
    register_nav_menu( 'mobile-nav', __( 'Mobile Navigation', TEXTDOMAIN ) );
}

add_action( 'init', 'px_register_menus' );