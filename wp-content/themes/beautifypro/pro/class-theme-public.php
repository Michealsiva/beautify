<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.webulousthemes.com/
 * @since      1.0.0
 *
 * @package    beautify_pro_Theme
 * @subpackage beautify_pro_Theme/public
 */
 
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    beautify_pro_Theme
 * @subpackage beautify_pro_Theme/public
 * @author     N. Venkat Raj <venkat@webulous.in>
 */
if ( ! class_exists('Beautify_Pro_Theme_Public')) { 
	class Beautify_Pro_Theme_Public {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $theme_name    The ID of this plugin.
		 */
		private $theme_name;

		/**
		 * The version of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $version    The current version of this plugin.
		 */
		private $version;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param      string    $theme_name       The name of the plugin.
		 * @param      string    $version    The version of this plugin.
		 */
		public function __construct( $theme_name, $version ) {

			$this->theme_name = $theme_name;
			$this->version = $version;
			$this->load_dependencies();

		}

		/**
		 * Load the required dependencies for admin section.
		 *
		 * Include the following files that are required for admin section:
		 *
		 * - class-genex-theme-custom-css-js.php  Outputs custom css and js based on customizer options.
		 * - templatet-tags.php Defines internationalization functionality.
		 * - beautify_pro_Theme_Hooks. Defines all hooks for the public side of the site.
		 *
		 * @since    1.0.0
		 * @access   private     
		 */	
		private function load_dependencies() {     
			require_once get_template_directory()  . '/pro/class-theme-custom-css-js.php';
			require_once get_template_directory()  . '/pro/class-theme-hooks.php';
			require_once get_template_directory()  . '/includes/styles.php';  			
		}
	  

		/**
		 * Register the stylesheets for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles() {
  
			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in beautify_pro_Theme_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The beautify_pro_Theme_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class. 
			 */  
			wp_enqueue_style( 'beautify-noto-sans', beautify_pro_theme_font_url('Noto Sans:400,700'), array(), 20141212 );
			wp_enqueue_style( 'beautify-pt-sans', beautify_pro_theme_font_url('PT Sans:400,700'), array(), 20141212 );
			wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.3.0', 'all' );
			wp_enqueue_style( 'beautify-header', get_stylesheet_uri() );
          
			if( ! get_theme_mod('enable_custom_color_scheme',false) ) { 
				switch ( get_theme_mod('color_scheme') ) {      
					case '1':
						wp_enqueue_style( $this->theme_name, get_template_directory_uri() . '/css/default.css', array(), $this->version, 'all' );
						break;
					case '2':
						wp_enqueue_style( $this->theme_name, get_template_directory_uri() . '/css/green.css', array(), $this->version, 'all' );
						break;
					case '3':
						wp_enqueue_style( $this->theme_name, get_template_directory_uri() . '/css/orange.css', array(), $this->version, 'all' );
						break;
					case '4':
						wp_enqueue_style( $this->theme_name, get_template_directory_uri() . '/css/darkpink.css', array(), $this->version, 'all' );
						break;
					case '5':
						wp_enqueue_style( $this->theme_name, get_template_directory_uri() . '/css/lightgreen.css', array(), $this->version, 'all' );
						break;
					case '6':
						wp_enqueue_style( $this->theme_name, get_template_directory_uri() . '/css/blue.css', array(), $this->version, 'all' );
						break;
								
					default: 
						wp_enqueue_style( $this->theme_name, get_template_directory_uri() . '/css/default.css', array(), $this->version, 'all' );
						break;
				} 
			} else {
				$upload_dir = wp_upload_dir();
				if ( file_exists( $upload_dir['basedir'] . '/'. get_option('stylesheet') .'/custom.css' ) ) {
			    	wp_enqueue_style( $this->theme_name, $upload_dir['baseurl'] . '/'. get_option('stylesheet') .'/custom.css' , array(), $this->version, 'all' );
				}
			} 
			if( get_theme_mod('animation_effect',true ) ) {
				wp_enqueue_style( $this->theme_name . '-animation', get_template_directory_uri() . '/css/animation.css', array(), $this->version, 'all' );
			}

			
		
		}

		/**
		 * Register the JavaScript for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts() {

			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in beautify_pro_Theme_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The beautify_pro_Theme_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */
		   
			wp_enqueue_script( 'beautify-pro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
			wp_enqueue_script( 'beautify-pro-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			if( get_theme_mod('sticky_header',false) ){
				wp_enqueue_script( 'beautify-pro-custom-sticky', get_template_directory_uri() . '/js/custom-sticky.js', array('jquery'), '1.0.0', true );
			}

			wp_enqueue_script('masonry'); 
			wp_enqueue_script( 'beautify-pro-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );

			if( get_theme_mod('animation_effect',true ) ) {
			    wp_enqueue_script( $this->theme_name . '-animate', get_template_directory_uri() . '/js/animate.js', array( 'jquery' ), $this->version, true );
		    }

		}

	}
}
