
<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package BeautifyPro
 */ 
?><!DOCTYPE html>    
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11"><?php
if ( is_singular() && pings_open() ) { ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php
} ?>
<?php wp_head(); ?>  
</head>

<body <?php body_class(); ?>>    

<div id="page" class="hfeed site <?php echo beautify_pro_site_style_class(); ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'beautify_pro' ); ?></a>
	<?php do_action('beautify_pro_before_header'); ?>
   <header id="masthead" class="site-header header-wrap <?php echo beautify_pro_site_style_header_class(); ?>" role="banner">
	<?php  if(is_active_sidebar( 'top-left' ) || is_active_sidebar( 'top-right' )): ?>
	    <div class="top-nav">
			<div class="container">		
				<div class="eight columns">
					<div class="cart-left">
						<?php dynamic_sidebar('top-left' ); ?>
					</div>
				</div>

				<div class="eight columns">
					<div class="cart-right">
						<?php dynamic_sidebar('top-right' ); ?>  
					</div>
				</div>
			</div>
		</div> <!-- .top-nav -->
    <?php endif; ?>

    <?php do_action('beautify_pro_header_navigation_before'); ?>

	    <div class="branding header-image">
	        <?php if ( get_theme_mod ('header_overlay',false ) ) { 
			   echo '<div class="overlay overlay-header"></div>';     
			} ?>
			<div class="nav-wrap">    	
				<div class="container">
				   <div class="four columns">    
	                   <div class="site-branding"><?php  
						   // $header_text = get_theme_mod( 'header_text' );
							$logo_title = get_theme_mod( 'logo_title' );
							$logo = get_theme_mod( 'logo', '' );  
							$tagline = get_theme_mod( 'tagline',true);
							if( $logo_title && function_exists( 'the_custom_logo' ) ) {
	                            the_custom_logo();     
					        }elseif( $logo != '' && $logo_title ) { ?>
							   <h1 class="site-title img-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo) ?>"></a></h1><?php
							}else { ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><?php
							} 
						    if( $tagline ) : ?>
								<p class="site-description"><?php bloginfo( 'description' ); ?></p><?php
						    endif; ?>
	                    </div><!-- .site-branding -->
	                </div>
	                <div class="twelve columns">
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php echo apply_filters('beautify_pro_responsive_menu_title', __('Primary Menu','beautify_pro') ); ?></button>
							<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
						</nav><!-- #site-navigation -->	
					</div>
					<?php do_action('beautify_pro_header_navigation_after'); ?>
				</div>
				<?php do_action('beautify_pro_after_primary_nav'); ?>
			</div>
		</div>
		
			<?php do_action('beautify_pro_header_navigation_end'); ?>
		<?php do_action('beautify_pro_header_end'); ?>

    </header><!-- #masthead -->
	<?php do_action('beautify_pro_header_after');

  

