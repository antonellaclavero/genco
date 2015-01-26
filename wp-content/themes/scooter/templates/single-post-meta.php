<div class="post-meta">
    <h1 class="post-title"><?php the_title(); ?></h1>
    <span class="post-info">
        <span class="post-date"><?php the_date(); ?></span>
        <span class="post-info-separator">/</span>
        <span class="post-author"><?php _e('author:', TEXTDOMAIN); the_author_posts_link(); ?></span>
        <span class="post-info-separator">/</span>
        <span class="post-categories"><?php _e('Category:', TEXTDOMAIN); the_category(', '); ?></span>
        <span class="post-info-separator">/</span>
        <span><?php if(comments_open()) comments_popup_link( 'No Comments', '1 Comment', '%', 'comments-link', ''); ?></span>
    </span>
    <hr class="hr-small hr-margin-small" />
</div>