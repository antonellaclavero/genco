<?php 

require_once('admin-base.php');

//Extended admin class
class PxAdmin extends PxThemeAdmin
{
    function Px_Save_Options()
    {
        //Check for import dummy data option
        if( array_key_exists('import-dummy-data', $_POST) &&
            $_POST['import-dummy-data'] == '1')
        {
            //Don't save anything just Import data
            $this->Px_ImportDummyData($_POST['demo-dummy-data']);

            echo 'OK';
            die();
        }

        parent::Px_Save_Options();
    }

    function Px_ImportDummyData($demo = 'flaty')
    {
        if(!class_exists( 'WP_Import' ))
        {
            //Try to use custom version of the plugin
            require_once THEME_INCLUDES . '/wordpress-importer/wordpress-importer.php';
        }

        $wp_import = new WP_Import();
        //$wp_import->fetch_attachments = true;
        ob_start();
        $wp_import->import(THEME_ADMIN.'/DummyData/'.$demo.'.xml');
        ob_end_clean();//Prevents sending output to client
    }

    function Px_Enqueue_Scripts()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('hoverIntent');
        wp_enqueue_script('jquery-easing');
        wp_enqueue_style('nouislider');
        wp_enqueue_script('nouislider');
        wp_enqueue_style('colorpicker0');
        wp_enqueue_script('colorpicker0');
        wp_enqueue_style('chosen');
        wp_enqueue_script('chosen');
        wp_enqueue_style('theme-admin-css');
        wp_enqueue_script('theme-admin-script');

        wp_enqueue_script('theme-admin-options', THEME_ADMIN_URI . '/scripts/options-panel.js');
    }
}

new PxAdmin();