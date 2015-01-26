<?php

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once THEME_INCLUDES . '/class-tgm-plugin-activation.php';


function px_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        //Layer Slider
        array(
            'name'                  => 'LayerSlider WP', // The plugin name
            'slug'                  => 'LayerSlider', // The plugin slug (typically the folder name)
            'source'                => px_path_combine(THEME_PLUGINS, 'layersliderwp.zip'), // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),

        //Contact Form 7
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'required' 	=> false,
        ),
                
       // woocomerce  
        array(
            'name'      => 'WooCommerce',
            'slug'      => 'woocommerce',
            'required'  => false, 
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'            => TEXTDOMAIN,         	// Text domain - likely want to be the same as your theme.
        'default_path'      => '',                      // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',            // Default parent menu slug
        'parent_url_slug'   => 'themes.php',            // Default parent URL slug
        'menu'              => 'install-required-plugins', // Menu slug
        'has_notices'       => true,                       // Show admin notices or not
        'is_automatic'      => false,                       // Automatically activate plugins after installation or not
        'message'           => '',                      // Message to output right before the plugins table
        'strings'       => array(
            'page_title'                                => __( 'Install Required Plugins', TEXTDOMAIN ),
            'menu_title'                                => __( 'Install Plugins', TEXTDOMAIN ),
            'installing'                                => __( 'Installing Plugin: %s', TEXTDOMAIN ), // %1$s = plugin name
            'oops'                              => __( 'Something went wrong with the plugin API.', TEXTDOMAIN ),
            'notice_can_install_required'       => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'    => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'             => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'      => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'   => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'            => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'              => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'              => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                      => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
             'activate_link'                    => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                            => __( 'Return to Required Plugins Installer', TEXTDOMAIN ),
            'plugin_activated'                  => __( 'Plugin activated successfully.', TEXTDOMAIN ),
            'complete'                          => __( 'All plugins installed and activated successfully. %s', TEXTDOMAIN ), // %1$s = dashboard link
            'nag_type'                          => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'px_register_required_plugins' );