<div class="search-form">
    <form action="<?php echo home_url( '/' ); ?>">
        <fieldset>
            <input type="text" name="s" placeholder="<?php _e('Search', TEXTDOMAIN); ?>" value="<?php if(!empty($_GET['s'])) echo get_search_query(); ?>">
            <input type="submit" value="">
        </fieldset>
    </form>
</div>