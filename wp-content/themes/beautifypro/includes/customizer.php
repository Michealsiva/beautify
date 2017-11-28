<?php
/**
 * beautify_pro Theme Customizer
 *
 * @package BeautifyPro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function beautify_pro_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'beautify_pro_customize_register' ); 



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function beautify_pro_customize_preview_js() {
	wp_enqueue_script( 'beautify_pro_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'beautify_pro_customize_preview_js' );




if( get_theme_mod('enable_primary_color',false) ) {

	add_action( 'wp_head','beautify_pro_customizer_primary_custom_css' );

		function beautify_pro_customizer_primary_custom_css() {
			$primary_color = get_theme_mod( 'primary_color','#cc8800'); ?>

	        <style type="text/css">
				
				.site-footer .scroll-to-top:hover,.portfolioeffects:hover .overlay_icon {
					opacity: 0.6;
					background-color: <?php echo $primary_color; ?>;					
				}
			</style>
<?php
	}
}



add_action( 'wp_head','beautify_customizer_service_color' );

function beautify_customizer_service_color() {
	for ($i=1; $i < 4; $i++) { 
		switch ($i) {
			case '1':
				$bg_color = '#5daae0';
				break;
			case '3':
				$bg_color = '#00ba71';
				break;
			default:
				$bg_color = '#ea4640';
				break;
		}
		if( get_theme_mod('service_color_'.$i,$bg_color) ) {
				
			$service_color = get_theme_mod( 'service_color_'.$i,$bg_color);  ?>
			
			<style type="text/css">
				.services-wrapper .service:nth-of-type(<?php echo $i; ?>) .service-content:hover h4 a	
			    {
					color: <?php echo $service_color; ?>;
				}
				.services-wrapper .service:nth-of-type(<?php echo $i; ?>) .service-content:hover p a	
			    {
					background-color: <?php echo $service_color; ?>;
				}


				.services-wrapper .service:nth-of-type(<?php echo $i; ?>) .icon-wrapper .fa
				{
					background-color: <?php echo $service_color; ?>;
				}

			</style><?php
		}

	}
}



