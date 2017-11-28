<?php 


if( ! class_exists( 'Beautify_Pro_Theme_Custom_CSS_JS' ) ) {
	class Beautify_Pro_Theme_Custom_CSS_JS {

		/**
		 * beautify_pro_Theme_Custom_CSS_JS constructor.
		 */
		public function __construct() {
		}


		/**
		 * Custom Theme Options JS
		 */
		public function js() {
      
			$beautify_pro_options_default = array(            
					'lightbox_theme' => '1',
					'lightbox_animation_speed' => 'fast',
					'lightbox_slideshow' => 50,
					'lightbox_autoplay_slideshow' => 0,
					'lightbox_opacity' => 0.5,
					'lightbox_overlay_gallery' => 1,
					
			);
			$beautify_pro_options = get_theme_mods();
			$beautify_pro_options = wp_parse_args( $beautify_pro_options, $beautify_pro_options_default );

		

			switch ($beautify_pro_options['lightbox_theme']) {
				case '1':
					$lightbox_theme = 'pp_default';
					break;
				case '2':
					$lightbox_theme = 'light_rounded';
					break;
				case '3':
					$lightbox_theme = 'dark_rounded';
					break;
				case '4':
					$lightbox_theme = 'light_square';
					break;
				case '5':
					$lightbox_theme = 'dark_square';
					break;
				case '6':
					$lightbox_theme = 'facebook';
					break;
				default:
					$lightbox_theme = 'pp_default';
					break;
			}
			?>
			<script type="text/javascript"> 
				jQuery(document).ready(function($){
					$("a[rel^='prettyPhoto']").prettyPhoto({
						animation_speed: "<?php echo isset($beautify_pro_options['lightbox_animation_speed']) ? strtolower($beautify_pro_options['lightbox_animation_speed']) : 'fast'; ?>",
						slideshow: <?php echo isset( $beautify_pro_options['lightbox_slideshow'] ) ? $beautify_pro_options['lightbox_slideshow'] * 100 : '5000'; ?>,
						autoplay_slideshow: <?php echo !empty( $beautify_pro_options['lightbox_autoplay_slideshow'] ) ? 'true' : 'false'; ?>,
						opacity: <?php echo isset( $beautify_pro_options['lightbox_opacity'] ) ? $beautify_pro_options['lightbox_opacity'] : '0.50'; ?>,
						theme: "<?php echo isset( $lightbox_theme ) ? $lightbox_theme : 'pp_default'; ?>",
						overlay_gallery: <?php echo !empty( $beautify_pro_options['lightbox_overlay_gallery'] ) ? 'true' : 'false'; ?>,
					});

				});
			</script>
			<?php
		}
		
		public function beautify_pro_user_customize_js() {
			$user_custom_js = get_theme_mod ('custom_js');
			?>	
			<script type="text/javascript">
				<?php echo $user_custom_js; ?>      
			</script>
			<?php
		}


		public function analytics_place_header() {
			$analytics_place = get_theme_mod('analytics_place');
			if( ! $analytics_place ) {
				echo get_theme_mod('analytics');
			}
		}

		public function analytics_place_footer() {
			$analytics_place = get_theme_mod('analytics_place');
			if(  $analytics_place ) {
				echo get_theme_mod('analytics');
			}
		}

		
	}
}
