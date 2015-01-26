<?php

    $footerWidgets = px_opt('footer_widgets');

    if($footerWidgets == 1){

        $widgetSpan1 = 12 ;
    }
    else if ($footerWidgets == 2) {

        $widgetSpan1 = 6 ;
        $widgetSpan2 = 6 ;
    }
    else if ($footerWidgets == 3) {

        $widgetSpan1 = 8 ;
        $widgetSpan2 = 4 ;
    }
    else if ($footerWidgets == 4) {

        $widgetSpan1 = 4;
        $widgetSpan2 = 8 ;

    }

?>

 <?php if($footerWidgets){ ?>
<div class="footer-widgetized">
    <div class="wrap">
        <div class="container clearfix">

            <?php if ( px_opt('footer_title') || px_opt('footer_subtitle')  ) { ?>

                <div class="titleSpace">
                    <?php if ( px_opt('footer_title') ) { ?>
                        <div class="title"><h3><?php px_eopt('footer_title'); ?></h3></div>
                    <?php } if (  px_opt('footer_subtitle') ) { ?>
                        <div class="subtitle"><?php px_eopt('footer_subtitle'); ?></div>
                    <?php } ?>
                </div>

            <?php } ?>

        </div>

        <div class="container clearfix">
            <!-- widgetized Area -->
            <div class="row">
                <div class="span<?php echo $widgetSpan1 ?>">

                    <!--  Footer Widgetised 1 -->
                    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'footer-widget-1') ){}  ?>

                </div>

                <?php if(!($footerWidgets == 1)){ ?>
                <div class="span<?php echo $widgetSpan2 ?>">

                    <!--  Footer Widgetised 2 -->
                    <?php	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'footer-widget-2') ){} ?>

                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
<?php } ?>