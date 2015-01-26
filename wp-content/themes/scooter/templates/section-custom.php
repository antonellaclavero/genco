<!-- Custom Section  -->
<section  class="scooterSection customSection">

    <div id="<?php echo $post->post_name;?>" class="wrap">
        <div class="container clearfix">

            <!-- headr title And Subtitle -->
            <?php
                $checkTitle = get_post_meta( get_the_ID(), "title-bar", true );
                $title = get_post_meta( get_the_ID(), "title-text", true );
                $subTitle = get_post_meta( get_the_ID() , "subtitle-text", true );
            ?>
            
            <?php  if ( (!empty( $subTitle ) || !empty( $title ) ) || $checkTitle == 2 ) { ?>
            
                <?php if ( $checkTitle == 1 ) { ?>
                    <div class="titleSpace">
                    
                        <?php if ( ( $checkTitle == 1 ) && ! empty( $title )) { ?>
                                
                            <div class="title"><h3><?php echo $title; ?></h3></div>
                    
                        <?php } if (  ( $checkTitle == 1 ) && ! empty( $subTitle ) ) { ?>
                         
                            <div class="subtitle"><?php echo $subTitle; ; ?></div>
                         
                        <?php } ?>
                        
                    </div>
                <?php }  if ( $checkTitle == 2  ) { ?>
                    
                    <div class="titleSpace">
                        <div class="title"><h3><?php the_title(); ?></h3></div>
                    </div>
                    
               <?php } ?>
               
            <?php } ?>

        </div>

        <div class="container clearfix customContent">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<!-- End Custom Section  -->
