<?php

// Widget class
class PixFlow_Woocommerce_Dropdown_Cart_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'woocommerce-dropdown-cart', // Base ID
            'Woocommerce Dropdown Cart', // Name
            array( 'description' => __( 'Woocommerce Dropdown Cart.', TEXTDOMAIN ) ) // Args
        );
    }

    function widget( $args, $instance ) {
        
		global $post;
		extract( $args );
		global $woocommerce;

        // Before widget (defined by theme functions file)
        echo $before_widget;
		?>
		
		<ul class="wc_cart_outer">
            <li>
                <a class="header_cart" href="<?php echo $woocommerce-> cart->get_cart_url(); ?>">
                <span class="header_cart_span">
                <?php echo $woocommerce->cart->cart_contents_count; ?>
                </span>
                </a>
                    
                    
							
                <?php
	                $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
	                $list_class = array( 'cart_list', 'product_list_widget' );
                ?>

	                <ul class="<?php echo implode(' ', $list_class); ?>">

		                <?php if ( !$cart_is_empty ) { ?>

			                <?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

				                $_product = $cart_item['data'];

				                // Only display if allowed
				                if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
					                continue;
				                }

				                // Get price
				                $product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

				                $product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
				                ?>

				                <li>
					                <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">

						                <?php echo $_product->get_image(); ?>
                                                    
                                        <div class="wc_cart_product_info">
                                            <div class="wc_cart_product_name">
									                <?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
                                            </div>
                                                        
                                            <?php echo $woocommerce->cart->get_item_data( $cart_item ); ?>
                                                        
                                            <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
											
                                        </div>
                                                    
					                </a>
                                </li>

			                <?php endforeach; ?>

		                <?php  } else { ?>

			                <li class="no_products">
                                <span class="no_products_span">
                                    <?php _e( 'No products in the cart.', 'woocommerce' ); ?>
                                </span>
                            </li>

		                <?php }; ?>

                        <li>
                            <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="icon-cart qbutton white view-cart">
                                <span class="cartbtn"> <?php _e( 'Cart', 'woocommerce' ); ?></span> 
                                <i class="fa fa-shopping-cart"></i>
                                </a>
			                <span class="total"><?php _e( 'Total ', 'woocommerce' ); ?> : <span><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span></span>
                        </li>
	                </ul>
            </li>
		</ul>

        <?php
        // After widget (defined by theme functions file)
        echo $after_widget;
    }
}

// register widget
add_action( 'widgets_init', create_function( '', 'register_widget( "PixFlow_Woocommerce_Dropdown_Cart_Widget" );' ) );