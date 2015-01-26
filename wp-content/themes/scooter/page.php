<?php
    get_header();

    // menu
    get_template_part('templates/section', 'nav');
?>
    <div class="pageTopSpace"></div>

<?php
    get_template_part('templates/head');

    //Get the sidebar option
    $sidebarPos = px_opt('sidebar-position');
    $sidebar    = px_get_meta('sidebar');

    // Get Page Post Id
    $post_id = get_the_ID();
?>
<!-- Page Content-->
<div class="wrap" id="pageHeight">
    <?php

    if ( get_post_meta( $post_id, "page-type-switch", true ) == "custom-section" ) {

         if($sidebar == 'no-sidebar' ) {

         ?>
            <!-- <div class="container pageSpace">  -->
            <div class="container">
                <?php  get_template_part('templates/loop-page'); ?>
            </div>

        <?php } else {

            $contentClass = 'span9';
            $sidebarContainerClass = 'span3';
            if(1 == $sidebarPos)
                $contentClass .= ' float-right';
        ?>

        <div class="container pageBottomSpace">
            <div class="row">
                <div class="<?php echo $contentClass; ?>"><?php get_template_part('templates/loop-page'); ?></div>
                <div class="<?php echo $sidebarContainerClass; ?>"><?php px_get_sidebar($sidebar); ?></div>
            </div>
        </div>

        <?php }

    }  else if ( get_post_meta( $post_id, "page-type-switch", true ) == "video-section" || get_post_meta( $post_id, "page-type-switch", true ) == "portfolio-section" || get_post_meta( $post_id, "page-type-switch", true ) == "blog-section" || get_post_meta( $post_id, "page-type-switch", true ) == "parallax-section" ){ ?>
            
            <?php get_template_part('templates/loop-page'); ?>
            
    <?php } else { ?>
        
        <div class="container pageBottomSpace">
            <div class="row">
            
                <?php get_template_part('templates/loop-page'); ?>
    
            </div>
        </div>
        
    <?php }  ?>

</div>
<!-- Page Content End -->
<?php 

    $footerMap = get_post_meta($post_id, "footer-map", true);
    if ($footerMap == "1") {
        //Footer Map
        get_template_part('templates/section', 'location');
    }

    $widgetized_footer = get_post_meta($post_id, "footer-widget-area", true);
    if ($widgetized_footer == "1") {
        //Footer Widgetized Area
        get_template_part('templates/section', 'widgetized_footer');
    }
?>
<?php get_footer();