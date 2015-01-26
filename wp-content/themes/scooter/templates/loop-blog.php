<div class="blog_loop_item">
    <div  <?php post_class('togglePost'); ?> id="post_<?php the_ID(); ?>">

        <!-- item  -->
        <?php $toggleMode = get_post_meta(get_the_ID(), 'toggle-mode', true);
            if ( !isset( $toggleMode )) {
                /* Close the toggle When not Set Toggle Mode */
                $toggleMode = 0;
            }
        ?>

        <!-- Desktop Blog -->
        <div class="visible-desktop desktopBlog">
            <div class="container">

                <div class="blogAccordion" data-value="<?php echo $toggleMode; ?>">
                    <div class="accordion_box2">
                        <div class="accordion_title" >
                            <!-- blog Post date -->
                            <div class="rightBorder">
                                <span class="day"><?php echo ( get_the_time('j') ); ?></span>
                                <div class="monthYear">
                                    <span class="month"><?php echo ( get_the_time('F') ); ?></span>
                                    <span class="year"><?php echo( get_the_time('Y') ); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion_box10">
                        <!-- Blog Close Button -->
                        <div class="visible-desktop blogClose"></div>

                        <!-- Post title  -->
                        <div class="blogTitle"><?php the_title(); ?></div>

                        <!-- Post feature image  -->
                        <div class="image">
                            <?php if ( has_post_thumbnail() ){ ?>
                                <?php the_post_thumbnail('full'); ?>
                            <?php } else { ?>
                                <div class="noImage"></div>
                            <?php } ?>

                        </div>


                        <span class="frameOverlayGray"></span>
                        <span class="frameOverlayRight"></span>
                        <span class="frameOverlayLeft"></span>

                    </div>

                    <div class="accordion_content">
                        <!-- blog Post text -->
                        <?php the_excerpt();  ?>

                        <!-- More Details Button  -->
                        <a href="<?php the_permalink(); ?>" class="moreButton" rel="bookmark"><?php _e('More Details', TEXTDOMAIN); ?></a>

                    </div>
                    <div class="clearfix"></div>

                    <!-- Toggle Opening Handel  -->
                    <div class="plus span12"></div>
                    <div class="minus span12"></div>

                </div>

            </div>
        </div>

        <!-- Tablet Blog -->
        <div class="hidden-desktop tabletBlog">
            <div class="container">

                <div class="blogAccordion" data-value="<?php echo $toggleMode; ?>">
                    <div class="accordionBox">
            
            <!-- Post feature image  -->
            <div class="image">
              <?php if ( has_post_thumbnail() ) ?>
                <?php the_post_thumbnail('full'); ?>
            </div>

            <!-- Post frame Overlay  -->
            <div class="frameOverlayTablet"> </div>

            <div class="frameTitle">
             
              <div class="centerTitle">

                <div class="accordion_title" >
                  <!-- blog Post date -->
                  <div class="rightBorder">
                    <span class="day">
                      <?php echo ( get_the_time('j') ); ?>
                    </span>
                    <div class="monthYear">
                      
                      <span class="visible-phone month">
                        <?php echo ( get_the_time('M') ); ?>
                      </span>

                      <span class="visible-tablet month">
                        <?php echo ( get_the_time('F') ); ?>
                      </span> 
                      
                      <span class="year">
                        <?php echo( get_the_time('Y') ); ?>
                      </span>
                    </div>
                  </div>
                </div>

                <!-- Post title  -->
                <div class="blogTitle">
                  <?php the_title(); ?>
                </div>

              </div>
           
            </div>
            
        </div>

                    <!-- Toggle Opening Handel  -->
                    <div class="plus span12"></div>
                    <div class="minus span12"></div>

                </div>

                <div class="tabletContent accordion_content">

                    <!-- Blog Close Button -->
                    <div class="visible-desktop blogClose"></div>

                    <!-- blog Post text -->
                    <?php the_excerpt();  ?>

                    <!-- More Details Button  -->
                    <a href="<?php the_permalink(); ?>" class="moreButton" rel="bookmark"><?php _e('More Details', TEXTDOMAIN); ?></a>

                </div>
                <div class="clearfix"></div>

            </div>
        </div>
        <!-- item  Ends -->
    </div>
</div>