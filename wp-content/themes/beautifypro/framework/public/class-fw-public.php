<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.webulousthemes.com
 * @since      1.0.0
 *
 * @package    Fw
 * @subpackage Fw/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Genex
 * @subpackage Genex/public
 * @author     N. Venkat Raj <venkatraj.n@gmail.com>
 */
if ( ! class_exists( 'Fw_Public' ) ) {
	class Fw_Public {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $plugin_name    The ID of this plugin.
		 */
		private $plugin_name;

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
		 * @param      string    $plugin_name       The name of the plugin.
		 * @param      string    $version    The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version = $version;

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
			 * defined in Fw_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Fw_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */
			wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/framework/includes/vendor/font-awesome/css/font-awesome.min.css' );
			wp_enqueue_style( 'eislide', get_template_directory_uri() . '/framework/includes/vendor/elastic-slider/css/eislide.css' );
			wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/framework/includes/vendor/flexslider/css/flexslider.css' );
			wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/framework/includes/vendor/slicknav/css/slicknav.min.css' );
			wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/framework/includes/vendor/prettyPhoto/css/prettyPhoto.css' );
			wp_enqueue_style( 'tabulous', get_template_directory_uri() . '/framework/includes/vendor/tabulous/css/tabulous.css' );
	        wp_enqueue_style( 'skill', get_template_directory_uri() . '/framework/includes/vendor/skill/css/skill-piechart.css' );
			
			wp_enqueue_style( $this->plugin_name, get_template_directory_uri() . '/framework/public/css/framework-public.css', array(), $this->version, 'all' );
	        

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
			 * defined in Fw_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Fw_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */
			wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/framework/includes/vendor/flexslider/js/jquery.flexslider-min.js', array('jquery'), '2.5.0', true );
			wp_enqueue_script( 'skill', get_template_directory_uri() . '/framework/includes/vendor/skill/js/jquery.easypiechart.js', array('jquery'), '1.0.0', true );

			wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/framework/includes/vendor/fitvids/jquery.fitvids.min.js', array('jquery'), '1.0.0', true );

			// Easing need for Elastic slider
			wp_enqueue_script( 'easing', get_template_directory_uri() . '/framework/includes/vendor/elastic-slider/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
			wp_enqueue_script( 'eislideshow', get_template_directory_uri() . '/framework/includes/vendor/elastic-slider/js/jquery.eislideshow.js', array('jquery'), '1.0', true );
			// TODO: Do we need raphael?
			//wp_enqueue_script( 'raphael', get_template_directory_uri() . '/framework//js/raphael.min.js', array('jquery'), '2.1.0', true );
	       
	        // tab menu dropdown list clickable //
			wp_enqueue_script( 'doubletaptogo', get_template_directory_uri() . '/framework/public/js/doubletaptogo.min.js', array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'fw-public', get_template_directory_uri() . '/framework/public/js/fw-public.js', array('jquery'), $this->version, true );

			wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/framework/public/js/imagesloaded.pkgd.min.js', array('jquery'), '2.0.0', true );
			wp_enqueue_script( 'isotope', get_template_directory_uri() . '/framework/public/js/isotope.pkgd.min.js', array('jquery'), '2.0.0', true );
			wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/framework/includes/vendor/slicknav/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/framework/includes/vendor/prettyPhoto/js/jquery.prettyPhoto.js', array('jquery'), '3.1.5', true );
			// TODO: Do we need modernizr?
			wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/framework/public/js/modernizr.custom.js', array(), '1.0.0', false );
			// TODO: Grid is needed for isotope when window resized? Depends on Modernizer. What about new version?
			wp_enqueue_script( 'grid', get_template_directory_uri() . '/framework/public/js/grid.js', array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'jquery-ui-accordion', false, array('jquery'));
			// TODO: Replace jqueryui tabs with Tabulous or something else.
			// So that customizer will work when tabs are in page.
			wp_enqueue_script( 'tabulous', get_template_directory_uri() . '/framework/includes/vendor/tabulous/js/tabulous.js', array('jquery'), '1.0.0', true );

			//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/framework-public.js', array( 'jquery' ), $this->version, true );

		}


	} 
	 
}
