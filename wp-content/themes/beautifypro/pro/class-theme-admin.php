<?php

	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * @link       http://www.webulousthemes.com/
	 * @since      1.0.0
	 *
	 * @package    beautify_pro_Theme
	 * @subpackage beautify_pro_Theme/admin
	 */

	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * Defines the plugin name, version, and two examples hooks for how to
	 * enqueue the admin-specific stylesheet and JavaScript.
	 *
	 * @package    beautify_pro_Theme
	 * @subpackage beautify_pro_Theme/admin
	 * @author     N. Venkat Raj <venkat@webulous.in>
	 */
	if ( ! class_exists( 'Beautify_Pro_Theme_Admin' ) ) {
		class Beautify_Pro_Theme_Admin {

			/**
			 * The ID of this plugin.
			 *
			 * @since    1.0.0
			 * @access   private
			 * @var      string $theme_name The ID of this plugin.
			 */
			private $theme_name;

			/**
			 * The version of this plugin.
			 *
			 * @since    1.0.0
			 * @access   private
			 * @var      string $version The current version of this plugin.
			 */
			private $version;

			/**
			 * Initialize the class and set its properties.
			 *
			 * @since    1.0.0
			 *
			 * @param      string $theme_name The name of this plugin.
			 * @param      string $version The version of this plugin.
			 */
			public function __construct( $theme_name, $version ) {

				$this->theme_name = $theme_name;
				$this->version     = $version;
				$this->load_dependencies();

			}

			/**
			 * Load the required dependencies for admin section.
			 *
			 * Include the following files that are required for admin section:
			 *
			 * - TGM_Plugin_Activation. Notify and load required and recommended plugins
			 * - beautify_pro_Customizer_API_Wrapper. Wrapper class to setup customizer panels/section/settings/controls.
			 * - beautify_pro_Theme_Shortcode. Defines shortcodes and its functionality.
			 * - beautify_pro_Theme_Admin. Defines all hooks for the admin area.
			 * - beautify_pro_Theme_Public. Defines all hooks for the public side of the site.
			 *
			 * @since    1.0.0
			 * @access   private
			 */  
			private function load_dependencies() { 
				require_once get_template_directory() . '/pro/framework-customization/class-theme-templates.php';
				require_once get_template_directory() . '/pro/framework-customization/class-theme-fields.php';
				require_once get_template_directory() . '/pro/framework-customization/class-theme-less.php';
			    require_once get_template_directory()  . '/pro/class-theme-shortcode.php';
			}


			/**
			 * Register the stylesheets for the admin area.
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
             
				wp_enqueue_style( $this->theme_name, get_template_directory_uri()  . '/admin/css/admin.css', array(), $this->version, 'all' );
                wp_enqueue_style( $this->theme_name.'-gem-customizer-css', get_template_directory_uri()  . '/admin/css/customizer.css', array(), $this->version, 'all' );
			}

			/**
			 * Register the JavaScript for the admin area.
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
				wp_enqueue_script( $this->theme_name, get_template_directory_uri()  . '/admin/js/script.js', array( 'jquery' ), $this->version, false );

			}
						
			/* License key activate notice */

			public function beautify_pro_activate_license_notice() {
                $output = '';
				$output .= '<div class="update-nag theme-activation">';
				$output .= 'Please <a href="' . admin_url( 'themes.php?page=beautify_pro-license') . '"><strong>Activate Beautify Pro License</strong></a> to receive updates and other benefits';
				$output .= '</div>';

				echo $output;
			}

		    

           
		}
	}


