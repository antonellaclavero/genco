<div class="hidden-desktop">
    <nav id="phoneNavItems" class="navigation-mobile">
        <?php
        wp_nav_menu(array(
            'container' =>'',
            'theme_location' => 'primary-nav',
            'fallback_cb' => false,
            'walker'      =>   new Px_Nav_Walker(),
        ));
        ?>
    </nav>
</div>