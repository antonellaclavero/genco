<footer class="footer-bottom" <?php if ( px_opt('footer-banner') ) { ?> style="background-image:url('<?php px_eopt('footer-banner'); ?>');" <?php } ?>>
    <div class="bgPatern">
    <div class="wrap">
        <div class="container">
            <!-- Social Icons -->
            <ul class="social-icons">

                <?php
                    px_socialLink('social_facebook_url', __('Facebook Profile', TEXTDOMAIN), 'icon-facebook');//Facebook
                    px_socialLink('social_twitter_url', __('Twitter Profile', TEXTDOMAIN), 'icon-twitter'); // Twitter
                    px_socialLink('social_vimeo_url', __('Vimeo Profile', TEXTDOMAIN), 'icon-vimeo'); // Vimeo
                    px_socialLink('social_youtube_url', __('YouTube Profile', TEXTDOMAIN), 'icon-youtube'); // Youtube
                    px_socialLink('social_googleplus_url', __('Google+ Profile', TEXTDOMAIN), 'icon-googleplus'); //Google+
                    px_socialLink('social_dribbble_url', __('Dribbble Profile', TEXTDOMAIN), 'icon-dribbble');//Dribbble
                    px_socialLink('social_tumblr_url', __('Tumblr Profile', TEXTDOMAIN), 'icon-tumblr');//Tumblr
                    px_socialLink('social_linkedin_url', __('Linkedin Profile', TEXTDOMAIN), 'icon-linkedin3');//Linkedin
                    px_socialLink('social_flickr_url', __('Flickr Profile', TEXTDOMAIN), 'icon-flickr4');//flickr
                    px_socialLink('social_forrst_url', __('forrst Profile', TEXTDOMAIN), 'icon-forrst');//forrst
                    px_socialLink('social_github_url', __('github Profile', TEXTDOMAIN), 'icon-github5');//github
                    px_socialLink('social_lastfm_url', __('lastfm Profile', TEXTDOMAIN), 'icon-lastfm');//lastfm
                    px_socialLink('social_paypal_url', __('paypal Profile', TEXTDOMAIN), 'icon-paypal');//paypal
                    px_socialLink('social_rss_url', __('RSS Feed', TEXTDOMAIN), 'icon-feed2');//rss
                    px_socialLink('social_skype_url', __('skype  Profile', TEXTDOMAIN), 'icon-skype');//skype
                    px_socialLink('social_wordpress_url', __('wordpres Profile', TEXTDOMAIN), 'icon-wordpress');//wordpress
                    px_socialLink('social_yahoo_url', __('yahoo Profile', TEXTDOMAIN), 'icon-yahoo');//Yahoo
                    px_socialLink('social_deviantart_url', __('deviantart', TEXTDOMAIN), 'icon-deviantart2');//Deviantart
                    px_socialLink('social_steam_url', __('steam Profile', TEXTDOMAIN), 'icon-steam');//steam
                    px_socialLink('social_reddit_url', __('reddit Profile', TEXTDOMAIN), 'icon-reddit');//reddit
                    px_socialLink('social_stumbleupon_url', __('stumbleupon Profile', TEXTDOMAIN), 'icon-stumbleupon2');//stumbleupon
                    px_socialLink('social_pinterest_url', __('pinterest Profile', TEXTDOMAIN), 'icon-pinterest');//Pinterest
                    px_socialLink('social_xing_url', __('xing Profile', TEXTDOMAIN), 'icon-xing2');//xing
                    px_socialLink('social_blogger_url', __('blogger Profile', TEXTDOMAIN), 'icon-blogger');//blogger
                    px_socialLink('social_soundcloud_url', __('soundcloud Profile', TEXTDOMAIN), 'icon-soundcloud');//soundcloud
                    px_socialLink('social_delicious_url', __('delicious Profile', TEXTDOMAIN), 'icon-delicious');//delicious
                    px_socialLink('social_foursquare_url', __('foursquare Profile', TEXTDOMAIN), 'icon-foursquare');//foursquare
                    px_socialLink('social_instagram_url', __('instagram Profile', TEXTDOMAIN), 'icon-instagram');//foursquare
                ?>

            </ul>

            <!-- CopyRight  -->
            <div class="row">
                <div class="span12">
                    <p class="copyright"><?php px_eopt('footer-copyright'); ?></p>
                </div>
            </div>

        </div>
    </div>
    </div>
</footer>
