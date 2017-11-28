<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.webulousthemes.com
 * @since      1.0.0
 *
 * @package    Fw
 * @subpackage Fw/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Fw
 * @subpackage Fw/includes
 * @author     N. Venkat Raj <venkatraj.n@gmail.com>
 */
if ( ! class_exists( 'Fw' ) ) {
	class Fw {

		/**
		 * The loader that's responsible for maintaining and registering all hooks that power
		 * the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      Fw_Loader $loader Maintains and registers all hooks for the plugin.
		 */
		protected $loader;

		/**
		 * The unique identifier of this plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string $plugin_name The string used to uniquely identify this plugin.
		 */
		protected $plugin_name;

		/**
		 * The current version of the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string $version The current version of the plugin.
		 */
		protected $version;

		/**
		 * Define the core functionality of the plugin.
		 *
		 * Set the plugin name and the plugin version that can be used throughout the plugin.
		 * Load the dependencies, define the locale, and set the hooks for the admin area and
		 * the public-facing side of the site.
		 *
		 * @since    1.0.0
		 *
		 * @param $name string plugin name
		 * @param $version string plugin version
		 *
		 */
		public function __construct( $name = 'framework', $version = '1.0.0' ) {

			$this->plugin_name = $name;
			$this->version     = $version;

			$this->load_dependencies();
			$this->define_admin_hooks();
			$this->define_public_hooks();

		}

		/**
		 * Load the required dependencies for this plugin.
		 *
		 * Include the following files that make up the plugin:
		 *
		 * - Fw_Loader. Orchestrates the hooks of the plugin.
		 * - Fw_i18n. Defines internationalization functionality.
		 * - Fw_Admin. Defines all hooks for the admin area.
		 * - Fw_Public. Defines all hooks for the public side of the site.
		 *
		 * Create an instance of the loader which will be used to register the hooks
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function load_dependencies() {

			/**
			 * The class responsible for orchestrating the actions and filters of the
			 * core plugin.
			 */
			require_once get_template_directory() . '/framework/includes/class-fw-loader.php';


			/**
			 * The class responsible for defining all actions that occur in the admin area.
			 */
			require_once Fw_ADMIN_DIR . 'class-fw-admin.php';

			/**
			 * Other Admin related files
			 */
			require_once Fw_ADMIN_DIR . 'post-types.php';
			require_once Fw_ADMIN_DIR . 'widgets/class-fw-widgets.php';
			require_once Fw_ADMIN_DIR . 'class-fw-tinymce.php';
			require_once Fw_ADMIN_DIR . 'class-fw-sidebar-generator.php';
			require_once Fw_ADMIN_DIR . 'class-fw-so-row-widget-style.php';
			require_once Fw_DIR . 'includes/vendor/meta-box/core/meta-box.php';
			require_once Fw_DIR . 'includes/vendor/meta-box/meta-box-columns/meta-box-columns.php';
			require_once Fw_DIR . 'includes/vendor/meta-box/meta-box-conditional-logic/meta-box-conditional-logic.php';
			require_once Fw_DIR . 'includes/vendor/meta-box/meta-box-group/meta-box-group.php';
			require_once Fw_DIR . 'includes/vendor/meta-box/meta-box-tabs/meta-box-tabs.php';
			require_once Fw_DIR . 'includes/vendor/meta-box/meta-box-tooltip/meta-box-tooltip.php';

			/**
			 * The class responsible for defining all actions that occur in the public-facing
			 * side of the site.
			 */
			require_once Fw_PUBLIC_DIR . 'class-fw-public.php';
			require_once Fw_PUBLIC_DIR . 'template-tags.php';

			$this->loader = Fw_Loader::getInstance();
			Fw_Sidebar_Generator::getInstance();

		}


		/**
		 * Register all of the hooks related to the admin area functionality
		 * of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function define_admin_hooks() { 


			$plugin_admin = new Fw_Admin( $this->get_plugin_name(), $this->get_version() );

			/**
			 * TODO: Write hooks as per WP flow
			 */
			$post_types = $plugin_admin->get_post_types();
			foreach ( $post_types as $post_type => $post_type_object ) {
				$this->loader->add_action( 'init', $post_type_object, 'register' );
				if( method_exists( $post_type_object, 'add_meta_boxes' ) ) {
					$this->loader->add_filter( 'rwmb_meta_boxes', $post_type_object, 'add_meta_boxes' );
				}
				if( method_exists($post_type_object, 'posts_columns')) { 
					$this->loader->add_filter( "manage_{$post_type}_posts_columns", $post_type_object, 'posts_columns' );
				}
				if ( method_exists($post_type_object, 'custom_columns') ) {
					$this->loader->add_action( "manage_{$post_type}_posts_custom_column", $post_type_object, 'custom_columns', 100, 2 );
				}
			} 


			$this->loader->add_filter( 'rwmb_meta_boxes', $plugin_admin, 'add_meta_boxes' );
			$this->loader->add_filter( 'rwmb_outside_conditions', $plugin_admin, 'gx_meta_box_tab_conditional_logic' );

			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

			$this->loader->add_action( 'tgmpa_register', $plugin_admin, 'register_plugins' );
			

			$widgets = new Fw_Widgets();    
			$this->loader->add_filter( 'siteorigin_widgets_widget_folders', $widgets, 'Fw_get_widgets_folder' );
			$this->loader->add_filter( 'siteorigin_panels_widgets', $widgets, 'Fw_add_widgets_group' );
			$this->loader->add_filter( 'siteorigin_panels_widget_dialog_tabs', $widgets, 'Fw_add_dialog_tabs',19 );
			$this->loader->add_filter( 'siteorigin_panels_widget_dialog_tabs', $widgets, 'Fw_add_dialog_tab',20 );		
			$this->loader->add_filter( 'siteorigin_panels_settings_fields', $widgets, 'Fw_settings_options' );
			$this->loader->add_filter( 'siteorigin_widgets_active_widgets', $widgets, 'Fw_filter_active_widgets' );



			$tinymce = new Fw_TinyMCE();
			$this->loader->add_action( 'init', $tinymce, 'editor_background_color' );
			$this->loader->add_filter( 'tiny_mce_before_init', $tinymce, 'display_kitchen_sink' );

			$so_row_widget_style = new Fw_So_Row_Widget_Style();
			/* Field */
			$this->loader->add_filter( 'siteorigin_panels_row_style_fields', $so_row_widget_style, 'gx_fw_panels_row_style_fields' );
			$this->loader->add_filter( 'siteorigin_panels_widget_style_fields', $so_row_widget_style, 'gx_fw_panels_widget_style_fields' );

			/* Attributes */
			$this->loader->add_filter( 'siteorigin_panels_row_style_attributes', $so_row_widget_style, 'gx_fw_panels_panels_row_style_attributes', 10, 2 );
			$this->loader->add_filter( 'siteorigin_panels_widget_style_attributes', $so_row_widget_style, 'gx_fw_panels_panels_widget_style_attributes', 10, 2 );

			/* Groups */
			$this->loader->add_filter( 'siteorigin_panels_row_style_groups', $so_row_widget_style, 'gx_fw_row_style_groups' );
			$this->loader->add_filter( 'siteorigin_panels_widget_style_groups', $so_row_widget_style, 'gx_fw_widget_style_groups' );

			/* common panel css */
			$this->loader->add_filter( 'siteorigin_panels_css_object', $so_row_widget_style, 'gx_fw_css_object', 10, 3 );
 
            if( get_theme_mod('enable_so_custom_color',false) ) {
	            /* override the site origin primary color according to the color scheme and custom color */
	            $this->loader->add_filter( 'siteorigin_panels_row_style_css', $so_row_widget_style, 'gx_fw_override_so_color', 10, 2 );
	            $this->loader->add_filter( 'siteorigin_panels_cell_style_css', $so_row_widget_style, 'gx_fw_override_so_color', 10, 2 );
	            $this->loader->add_filter( 'siteorigin_panels_widget_style_css', $so_row_widget_style, 'gx_fw_override_so_color', 10, 2 );

	            $this->loader->add_filter( 'gx_siteorigin_panels_row_style_css', $so_row_widget_style, 'gx_fw_override_so_color', 10, 2 );
	            $this->loader->add_filter( 'gx_siteorigin_panels_widget_style_css', $so_row_widget_style, 'gx_fw_override_so_color', 10, 2 );

	            $this->loader->add_filter( 'gx_siteorigin_panels_row_style_attributes_css', $so_row_widget_style, 'gx_fw_override_so_color', 10, 2 );
	            $this->loader->add_filter( 'gx_siteorigin_panels_widget_style_attributes_css', $so_row_widget_style, 'gx_fw_override_so_color', 10, 2 );
			}else{
	            $this->loader->add_filter( 'gx_siteorigin_panels_row_style_css', $so_row_widget_style, 'gx_fw_override_default_so_color', 10, 2 );
	            $this->loader->add_filter( 'gx_siteorigin_panels_widget_style_css', $so_row_widget_style, 'gx_fw_override_default_so_color', 10, 2 );

	            $this->loader->add_filter( 'gx_siteorigin_panels_row_style_attributes_css', $so_row_widget_style, 'gx_fw_override_default_so_color', 10, 2 );
	            $this->loader->add_filter( 'gx_siteorigin_panels_widget_style_attributes_css', $so_row_widget_style, 'gx_fw_override_default_so_color', 10, 2 );
            }
			


			add_filter( 'widget_text', 'do_shortcode' );

		}


		/**
		 * Register all of the hooks related to the public-facing functionality
		 * of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function define_public_hooks() {

			$plugin_public = new Fw_Public( $this->get_plugin_name(), $this->get_version() );

			$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
			//$this->loader->add_action( 'wp_head', $plugin_public, 'custom_styles', 100 );

			$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
			//$this->loader->add_action( 'wp_footer', $plugin_public, 'custom_theme_options_js', 100 );
			//add_action( 'Fw_portfolio_breadcrumbs', 'Fw_portfolio_breadcrumbs' );


		}

		/**
		 * Run the loader to execute all of the hooks with WordPress.
		 *
		 * @since    1.0.0
		 */
		public function run() {
			$this->loader->run();
		}

		/**
		 * The name of the plugin used to uniquely identify it within the context of
		 * WordPress and to define internationalization functionality.
		 *
		 * @since     1.0.0
		 * @return    string    The name of the plugin.
		 */
		public function get_plugin_name() {
			return $this->plugin_name;
		}

		/**
		 * The reference to the class that orchestrates the hooks with the plugin.
		 *
		 * @since     1.0.0
		 * @return    Fw_Loader    Orchestrates the hooks of the plugin.
		 */
		public function get_loader() {
			return $this->loader;
		}

		/**
		 * Retrieve the version number of the plugin.
		 *
		 * @since     1.0.0
		 * @return    string    The version number of the plugin.
		 */
		public function get_version() {
			return $this->version;
		}

	}
}
