<?php

	// try getting featured image -  pinterest icon 
	$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	if( ! $featured_img )
	{
		$featured_img = '';
	}
	else
	{
		$featured_img = $featured_img[0];
	}
    
?>

<!-- twitter icon  --> 
<div class="share-item twitter">
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="Check out this article: <?php the_title(); ?> - <?php the_permalink(); ?>" data-dnt="true">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>

<!-- google plus icon --> 
<div class="share-item google">
	<div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div>
</div>

<!-- pinterest icon --> 
<div class="share-item pin">
	<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>
		&amp;media=<?php echo $featured_img; ?>
		&amp;description=<?php echo urlencode(get_the_title()); ?>" 
		class="pin-it-button" 
		count-layout="horizontal">
		<img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" />
	</a>
</div>

<!-- facebook icon --> 
<div class="share-item facebook">
    <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
</div>