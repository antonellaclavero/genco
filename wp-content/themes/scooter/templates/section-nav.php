<?php 

   $headerStyle = px_opt('header-style');
   $heaerStyleDefault = 'fixed-menu' ;
   
   $menuBgColor = px_opt('menu-background-color') ;
   $menuTextColor =  px_opt('menu-text-color');
  // $menuOpacity=  px_opt('menu-opacity')/100;
  
  $menuOpacity=  px_opt('menu-opacity');
  
  if ($menuOpacity) {
    $menuOpacity=  px_opt('menu-opacity')/100;
  } else {
    $menuOpacity = 0.98;
  }
  
   
?>
<!-- Header Navigation  -->
<header id="pxHeader" data-fixed="<?php  if ( isset($headerStyle) ) { echo $headerStyle; } else { echo $heaerStyleDefault; } ?>"  class="<?php px_eopt('header-style'); ?>" >
	<div class="wrap">
		<div id="logoMenuHeader">
		
			<style type="text/css">

				#menuBgColor
				{
					background-color: <?php echo $menuBgColor; ?>;
					opacity: <?php echo $menuOpacity; ?>;

				}

				header .navigation li a
				{
					color: <?php echo $menuTextColor; ?>;
				}

			</style>

			<!--menu background color -->
			<div id="menuBgColor"></div>
		
			<div class="container clearfix">

				<!-- Secound Logo -->
				<?php $logoSecond = px_opt('logo-second') == "" ? THEME_ASSETS_URI . "/content/img/logo.png" : px_opt('logo-second'); ?>

				<a class="logo" href="<?php echo get_site_url(); ?>/#home">
					<img  class="secoundLogo" src="<?php echo $logoSecond; ?>" alt="Logo" />
				</a>
				
                <!-- woocomerce drop down cart widget -->
                <?php dynamic_sidebar( 'woocommerce_dropdown_cart' ); ?>
                
				<nav class="navigation hidden-tablet hidden-phone">

					<?php
					wp_nav_menu(array(
						'container' =>'',
						'menu_class' => 'clearfix',
						'before'     => '',
						'theme_location' => 'primary-nav',
						'walker'     => new Px_Nav_Walker(),
						'fallback_cb' => false
					));
					?>

				</nav>
                
				<a	id="phoneNav" class="navigation-button hidden-desktop" href="#">
					<span id="phoneNavIcon" class="icon-paragraph-justify"></span>
				</a>

			</div>
		</div>	
		
		<?php  if ( isset($headerStyle)) { 
				if ( $headerStyle == 'scooter-menu' ) { ?>  
				
				<div id="logoHeader">
					<div class="container clearfix">
						
						<!-- First Logo -->
						<?php $logo = px_opt('logo') == "" ? THEME_ASSETS_URI . "/content/img/logo.png" : px_opt('logo'); ?>

						<a class="logo" href="<?php echo get_site_url(); ?>/#home">
							<img  class="firstLogo" src="<?php echo $logo; ?>" alt="Logo" />
						</a>

					</div>
				</div>	
				
			<?php  } 
		 } ?>

	</div>
</header>
<!-- Header Navigation End -->