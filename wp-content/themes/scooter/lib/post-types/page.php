<?php

require_once('post-type.php');

class PxPage extends PxPostType
{
    function __construct()
    {
        parent::__construct('page');
    }

    function Px_RegisterScripts()
    {
        wp_register_script('page', THEME_LIB_URI . '/post-types/js/page.js', array('jquery'), THEME_VERSION);
        parent::Px_RegisterScripts();
    }

    function Px_EnqueueScripts()
    {
        wp_enqueue_script('hoverIntent');
        wp_enqueue_script('jquery-easing');

        wp_enqueue_script('nouislider');
        wp_enqueue_style('nouislider');

        wp_enqueue_script('colorpicker0');
        wp_enqueue_style('colorpicker0');

        wp_enqueue_style('theme-admin');
        wp_enqueue_script('theme-admin');

        wp_enqueue_script('page');
    }

    private function Px_GetSidebars()
    {
        $sidebars = array('no-sidebar' => '' , 'main-sidebar' => __('Default Sidebar', TEXTDOMAIN), 'page-sidebar' => __('Default Page Sidebar', TEXTDOMAIN));

        if(px_opt('custom_sidebars') != '')
        {
            $arr = explode(',', px_opt('custom_sidebars'));

            foreach($arr as $bar)
                $sidebars[$bar] = str_replace('%666', ',', $bar);
        }

        return $sidebars;
    }

    protected function Px_GetOptions()
    {
        $fields = array(
            'title-bar-switch' => array(
                'type' => 'select',
                'label'=> __('Section Title', TEXTDOMAIN),
                'options' => array('2'=>__('Show post title', TEXTDOMAIN),'1'=>__('Show custom title', TEXTDOMAIN), '0'=>__('Don\'t show title', TEXTDOMAIN)),
            ),
            'title-text' => array(
                'type' => 'text',
                'label'=> __('Title Text', TEXTDOMAIN),
                'placeholder' => __('Override title text', TEXTDOMAIN),

            ),
            'subtitle-text' => array(
                'type' => 'text',
                'label'=> __('Subtitle Text', TEXTDOMAIN),
                'placeholder' => __('Subtitle text', TEXTDOMAIN),
            ),
            'page-type-switch' => array(
                'type' => 'select',
                'label'=> __('Section Type', TEXTDOMAIN),
                'options' => array('blog-section'=>__('Blog section', TEXTDOMAIN),'portfolio-section'=>__('Portfolio section', TEXTDOMAIN),'parallax-section'=>__('Parallax section', TEXTDOMAIN), 'custom-section'=>__('Custom section', TEXTDOMAIN), 'video-section'=>__('Video section', TEXTDOMAIN)),
            ),
             'page-position-switch' => array(
                'type' => 'select',
                'label'=> __('Choose your section to be shown in:', TEXTDOMAIN),
                'options' => array('1'=>__('External page', TEXTDOMAIN), '0'=>__('Main page', TEXTDOMAIN)),
            ),
            'show-in-menu-switch' => array(
                'type' => 'select',
                'label'=> __('Section display in menu:', TEXTDOMAIN),
                'options' => array('1'=>__('Don\'t shown this section in menu', TEXTDOMAIN), '0'=>__('Shown this section in menu', TEXTDOMAIN)),
            ),
            'blog-type-switch' => array(
                'type' => 'select',
                'label'=> __('Blog Type:', TEXTDOMAIN),
                'options' => array('1'=>__('Classic Blog', TEXTDOMAIN), '0'=>__('Toggle Blog', TEXTDOMAIN)),
            ),
            'portfolio-filter' => array(
                'type' => 'select',
                'label'=> __('Choose Portfolio categories:', TEXTDOMAIN),
                'options' => array('1'=>__('Selected categories', TEXTDOMAIN), '0'=>__('All categories', TEXTDOMAIN)),
            ),
            'portfolio-fiter-skill-switch' => array(
                'type' => 'multiselect',
                'label'=> __('Add Your Desc here', TEXTDOMAIN),
                'options' => px_get_Portfolio_skills(),
            ),
            'portfolio-filter-nav' => array(
                'type'   => 'switch',
                'label'  => __('Display Portfolio Filter Navigation', TEXTDOMAIN),
                'state0' => __('Don\'t Show', TEXTDOMAIN),
                'state1' => __('Show', TEXTDOMAIN),
                'default'   => 1
            ),
            'portfolio-detail-ajax' => array(
                'type'   => 'switch',
                'label'=> __('Add Your Desc here', TEXTDOMAIN),
                'state0' => __('In external page', TEXTDOMAIN),
                'state1' => __('As an additional section in main page', TEXTDOMAIN),
                'default'   => 0
            ),
            'portfolio-posts-page' => array(
                'default'   => '12',
                'type'   => 'range',
                'min'   => '1',
                'max'   => '30',
                'step'   => '1',
            ),
            'sidebar' => array(
                'type' => 'select',
                'label'=> __('Choose the sidebar', TEXTDOMAIN),
                'options' => $this->Px_GetSidebars(),
            ),
            'blog-sidebar' => array(
                'type' => 'select',
                'label'=> __('Blog Sidebar Display', TEXTDOMAIN),
                'options' => array('main-sidebar'=> __('Show', TEXTDOMAIN), 'no-sidebar'=> __('Don\'t Show')),
            ),
            'slider' => array(
                'type' => 'select',
                'label'=> __('Choose a layer slider', TEXTDOMAIN),
                'options' => px_get_layerSlider_slides(),
            ),
            'footer-map' => array(
                'type' => 'select',
                'label'=> __('Footer Map Display', TEXTDOMAIN),
                'options' => array('1'=> __('Show', TEXTDOMAIN), '2'=> __('Don\'t Show')),
            ),
            'footer-widget-area' => array(
                'type' => 'select',
                'label'=> __('Widget Area Display', TEXTDOMAIN),
                'options' => array('1'=> __('Show', TEXTDOMAIN), '2'=> __('Don\'t Show')),
            ),
            'parallax-speed' => array(
                'title'  => __('Speed', TEXTDOMAIN),
                'label'  => __('ms', TEXTDOMAIN),
                'type'   => 'range',
                'default'   => '14',
                'min'   => '0',
                'max'   => '100',
                'step'   => '1',
            ),
            'parallax-height' => array(
                'title'  => __('Height', TEXTDOMAIN),
                'label'  => __('px', TEXTDOMAIN),
                'type'   => 'range',
                'default'   => '500',
                'min'   => '100',
                'max'   => '1100',
                'step'   => '1',
            ),
            'parallax-Position' => array(
                'title'  => __('Image Position', TEXTDOMAIN),
                'label'  => __('%', TEXTDOMAIN),
                'type'   => 'range',
                'default'   => '50',
                'min'   => '0',
                'max'   => '100',
                'step'   => '1',
            ),
            'overlay-color' => array(
                'type'   => 'color',
                'label'  => __('Overlay Color', TEXTDOMAIN),
                'value'  => '#555',
            ),
            'overlay-color-opacity' => array(
                'title'  => __('Overlay Opacity', TEXTDOMAIN),
                'label'  => __('%', TEXTDOMAIN),
                'type'   => 'range',
                'default'   => '50',
                'min'   => '0',
                'max'   => '100',
                'step'   => '1',
            ),
            'overlay-texture' => array(
                'type' => 'visual-select',
                'title'=> __('Overlay Texture', TEXTDOMAIN),
                'options' => array(
                                    'texture1'=> __('texture1', TEXTDOMAIN),
                                    'texture2'=> __('texture2', TEXTDOMAIN),
                                    'texture3'=> __('texture3', TEXTDOMAIN),
                                    'texture4'=> __('texture4', TEXTDOMAIN),
                                    'texture5'=> __('texture5', TEXTDOMAIN),
                                    'texture6'=> __('texture6', TEXTDOMAIN),
                                    'texture7'=> __('texture7', TEXTDOMAIN),
                                    'texture8'=> __('texture8', TEXTDOMAIN),
                            ),
            ),
            'video-MP4' => array(
                'type'   => 'upload',
                'label'  => __('Video (MP4 format)', TEXTDOMAIN),
                'placeholder' => __('Upload Video (MP4 format)', TEXTDOMAIN),
                'referer' => 'px-home-gallery-video',
            ),
            'video-WebM' => array(
                'type'   => 'upload',
                'label'  => __('Video (WebM format)', TEXTDOMAIN),
                'placeholder' => __('Upload Video (WebM format)', TEXTDOMAIN),
                'referer' => 'px-home-gallery-video',
            ),
            'video-imge' => array(
                'type'   => 'upload',
                'label'  => __('Video Preview Image', TEXTDOMAIN),
                'placeholder' => __('Upload Video Preview Image', TEXTDOMAIN),
                'referer' => 'px-home-gallery-video',
            ),
            'resume-exp-section'=> array(
                'type' => 'checkbox',
                'checked' => true,
                'value' => 'visible',
                'label' => __('Experience',TEXTDOMAIN),
            ),
        );

        // merge fiels array With portfolio Skill Arrays
        $fields = array_merge ( $fields , px_generate_portfolio_skill() );

        //Option sections
        $options = array(
            'page-type-switch' => array(
                'title'   => __('Section Type', TEXTDOMAIN),
                'tooltip' => __('Choose a section which will be shown in main page.', TEXTDOMAIN),
                'fields'  => array(
                    'page-type-switch' => $fields['page-type-switch'],
                )
            ),//Section Type
            'title-bar' => array(
                'title'   => __('Title', TEXTDOMAIN),
                'tooltip' => __('Choose a title to be shown at the beginning of each section', TEXTDOMAIN),
                'fields'  => array(
                    'title-bar'    => $fields['title-bar-switch'],
                    'title-text'   => $fields['title-text'],
                    'subtitle-text'   => $fields['subtitle-text'],
               )
            ),//Title bar sec
            'video-options' => array(
                'title'   => __('Background Video', TEXTDOMAIN),
                'tooltip' => __('Choose a video to be shown as the background of this section. Preview image will be shown before the video loads completely, also in responsive view it will be shown instead of video.', TEXTDOMAIN),
                'fields'  => array(
                    'video-MP4' => $fields['video-MP4'],
                    'video-WebM' => $fields['video-WebM'],
                    'video-imge' => $fields['video-imge'],
               )
            ),//video options
            'parallax-options' => array(
                'title'   => __('Parallax Options', TEXTDOMAIN),
                'tooltip' => __('Choose parallax settings in which Height is the parallax section height, Image Position is where will your background image shown, Parallax speed "0" = parallax disabled (fixed image), parallax speed "10" = page scrolling speed ,parallax speed above 10 = parallax is faster than page scrolling speed.', TEXTDOMAIN),
                'fields'  => array(
                    'parallax-speed'   => $fields['parallax-speed'],
                    'parallax-height'   => $fields['parallax-height'],
                    'parallax-Position'   => $fields['parallax-Position'],
               )
            ),
            'Overlay-options' => array(
                'title'   => __('Overlay Options', TEXTDOMAIN),
                'tooltip' => __('Choose a color for your overlay, set it\'s opacity and choose a texture to be shown on top of it.', TEXTDOMAIN),
                'fields'  => array(
                    'overlay-color'   => $fields['overlay-color'],
                    'overlay-color-opacity'   => $fields['overlay-color-opacity'],
                    'overlay-texture'   => $fields['overlay-texture'],
               )
            ),//Title bar sec
            'portfolio-skill' => array(
                'title'   => __('Portfolio Category', TEXTDOMAIN),
                'tooltip' => __('Choose all or selected categories to be shown in portfolio section', TEXTDOMAIN),
                'fields'  => array(
                    'portfolio-filter'	=> $fields['portfolio-filter'],
                )
            ),
            'portfolio-posts-page' => array(
                'title'   => __('Portfolios Post Per Section', TEXTDOMAIN),
                'tooltip' => __('Choose the initial number of portfolio items to be shown before clicking load more button.', TEXTDOMAIN),
                'fields'  => array(
                    'portfolio-posts-page'   => $fields['portfolio-posts-page'],
                )
            ),//portfolio post per pages
            'page-position-switch' => array(
                'title'   => __('Section Display', TEXTDOMAIN),
                'tooltip' => __('Choose where you want to show your section. It can be shown in main page or be shown as an external page.', TEXTDOMAIN),
                'fields'  => array(
                    'page-position-switch' => $fields['page-position-switch'],
                )
            ),//Open Page As Seperate Page Or Front Page
            'portfolio-filter-nav' => array(
                'title'   => __('Display Portfolio Filters', TEXTDOMAIN),
                'tooltip' => __('Choose to Show or Not to show Portfolio Filters in portfolio section', TEXTDOMAIN),
                'fields'  => array(
                    'portfolio-filter-nav' => $fields['portfolio-filter-nav'],
                )
            ),//Enable And Disable portfolio Detail Ajax In Front Page

            'portfolio-detail-ajax' => array(
                'title'   => __('Portfolio Detail Display', TEXTDOMAIN),
                'tooltip' => __('Choose to display the portfolio detail of each portfolio item in an external page or as an additional section which will be loaded above portfolio section. Please note that you can\'t have more than 1 additional section in main page and you can\'t have additional section if you choose to show your portfolio in an external page.', TEXTDOMAIN),
                'fields'  => array(
                    'portfolio-detail-ajax' => $fields['portfolio-detail-ajax'],
                )
            ),//Enable And Disable portfolio Detail Ajax In Front Page
            'show-in-menu-switch' => array(
                'title'   => __('Display In Menu', TEXTDOMAIN),
                'tooltip' => __('Enable or Disable the section in menu.', TEXTDOMAIN),
                'fields'  => array(
                    'show-in-menu-switch' => $fields['show-in-menu-switch'],
                )
            ),// Enable Or Disable Page Sidebar
            'blog-type-switch' => array(
                'title'   => __('Blog Type:', TEXTDOMAIN),
                'tooltip' => __('Choose blog style between toggle Blog Or Classic blog', TEXTDOMAIN),
                'fields'  => array(
                    'blog-type-switch' => $fields['blog-type-switch'],
                )
            ),// Add Page Sidebar
            'page-sidebar' => array(
                'title'   => __('Page Sidebar', TEXTDOMAIN),
                'tooltip' => __('You can choose a sidebar to be shown in this section which is created in theme settings ', TEXTDOMAIN),
                'fields'  => array(
                    'sidebar' => $fields['sidebar'],
                )
            ),// Add Page Sidebar
            'blog-sidebar' => array(
                'title'   => __('Blog Sidebar', TEXTDOMAIN),
                'tooltip' => __('You can enable or disable log sidebar ', TEXTDOMAIN),
                'fields'  => array(
                    'blog-sidebar' => $fields['blog-sidebar'],
                )
            ),// Enable blog Sidebar
            'layerslider' => array(
                'title'   => __('LayerSlider ', TEXTDOMAIN),
                'tooltip' => __('Choose a layer slider which is created in LayerSlider WP panel here', TEXTDOMAIN),
                'fields'  => array(
                    'slider' => $fields['slider'],
                )
            ),//slider sec
            'footer-map' => array(
                'title'   => __('Footer Map', TEXTDOMAIN),
                'tooltip' => __('Choose to show or not to show the map in footer', TEXTDOMAIN),
                'fields'  => array(
                    'footer-map' => $fields['footer-map'],
                )
            ),//Footer Map
            'footer-widget-area' => array(
                'title'   => __('Footer Widget Area', TEXTDOMAIN),
                'tooltip' => __('Choose to show or not to show the widget area in footer', TEXTDOMAIN),
                'fields'  => array(
                    'footer-widget-area' => $fields['footer-widget-area'],
                )
            ),//Footer Widget Area
        );

        // merge Skill Arrays
        $options['portfolio-skill']['fields'] = array_merge ( $options['portfolio-skill']['fields'] , px_generate_portfolio_skill($fields));

        return array(
            array(
                'id' => 'blog_meta_box',
                'title' => __('Page Settings', TEXTDOMAIN),
                'context' => 'normal',
                'priority' => 'high',
                'options' => $options,
            )//Meta box 0
        );
    }
}

new PxPage();