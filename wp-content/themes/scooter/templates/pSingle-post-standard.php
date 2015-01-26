<div <?php post_class(); ?>>
    <!-- Portfolio Detail Title  -->
    <div class="row">
        <div class="span12 pDHeader">

            <!-- Title -->
            <div class="hidden-phone title">
                <?php the_title(); ?>
            </div>

        </div>
    </div>

    <!-- Portfolio Detail phone title  -->
    <div class="row visible-phone">
        <div class="span12 pDHeader">
            <div class="title">

                <?php the_title(); ?>

            </div>
        </div>
    </div>

    <!-- Portfolio Detail content  -->
    <div class="row">
        <div class="span12 post-media">
            <?php the_content();?>
        </div>
    </div>

</div>