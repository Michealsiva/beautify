<?php

/**
 * This is core class composed of other classes.
 *
 * This class loads dependencies, define admin and public facing hooks
 * and define internationalisation 
 *
 * @link       http://www.webulousthemes.com/
 * @since      1.0.0
 * @package    beautify_pro_Theme
 * @subpackage beautify_pro_Theme/includes
 * @author     N. Venkat Raj <venkat@webulous.in>
 */
if ( ! class_exists('Beautify_Pro_Theme')) {    
	class Beautify_Pro_Theme { 

		/**
		 * The loader that's responsible for maintaining and registering all hooks that power
		 * the theme.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      beautify_pro_Theme_Loader    $loader    Maintains and registers all hooks for the theme.
		 */
		protected $loader;

		/**
		 * The beautify_proue identifier of this theme.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string    $theme_name    The string used to beautify_prouely identify this theme.
		 */
		protected $theme_name;

		/**
		 * The current version of the theme.
		 *
		 * @since    1.0.0
		 * @access   public static
		 * @var      string    $version    The current version of the theme.
		 */
		public static $version;

		/**
		 * Define the core functionality of the theme.
		 *
		 * Set the theme name and the theme version that can be used throughout the theme.
		 * Load the dependencies, define the locale, and set the hooks for the admin area and
		 * the public-facing side of the site.
		 *
		 * @since    1.0.0
		 * @var string $theme_name
		 * @var string $version
		 */
		public function __construct($theme_name, $version) {

			$this->theme_name = $theme_name;
			self::$version = $version;

			$this->load_dependencies();
			$this->define_admin_hooks();
			$this->define_public_hooks();

		}

		/**
		 * Load the required dependencies for this theme.
		 *
		 * Include the following files that make up the theme:
		 *
		 * - beautify_pro_Theme_Loader. Orchestrates the hooks of the theme.
		 * - beautify_pro_Theme_i18n. Defines internationalization functionality.
		 * - beautify_pro_Theme_Admin. Defines all hooks for the admin area.
		 * - beautify_pro_Theme_Public. Defines all hooks for the public side of the site.
		 *
		 * Create an instance of the loader which will be used to register the hooks
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function load_dependencies() {

			/**
			 *Prebuilt Layout 
			 * 
			 */
			require_once get_template_directory() . '/pro/class-theme-panels.php';

			/**
			 * Demo content 
			 * 
			 */
			require_once get_template_directory() . '/pro/demo/init.php';
			
	        /**
			 *So Row Widget Field 
			 * 
			 */
			require_once get_template_directory() . '/pro/class-theme-row-widget-style.php';  

            /**
			 * Pro Widget ( Theme Specific Pro Widgets )
			 * 
			 */
			require_once get_template_directory() . '/pro/widgets/class-pro-widgets.php';  

			/**
			 * The class responsible for orchestrating the actions and filters of the
			 * core theme.
			 */
			require_once get_template_directory() . '/pro/class-theme-loader.php';

			/**
			 * The class responsible for defining all actions that occur in the admin area.
			 */
			require_once get_template_directory() . '/pro/class-theme-admin.php';

			/**
			 * The class responsible for defining all actions that occur in the public-facing
			 * side of the site.
			 */
			require_once get_template_directory() . '/pro/class-theme-public.php';


			$this->loader = new Beautify_Pro_Theme_Loader();

		}


		/**
		 * Register all of the hooks related to the admin area functionality
		 * of the theme.
		 *
		 * @since    1.0.0
		 * @access   private
		 */ 
		private function define_admin_hooks() {    

			$theme_admin = new Beautify_Pro_Theme_Admin( $this->get_theme_name(), self::$version ); 

			$this->loader->add_action( 'admin_enqueue_scripts', $theme_admin, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $theme_admin, 'enqueue_scripts' );
			//$this->loader->add_action( 'tgmpa_register', $theme_admin, 'beautify_pro_register_plugins' );

			$license_status= get_option( 'beautify_pro_license_key_status', false );  
			if(  $license_status == false || $license_status != 'valid' ) {
				$this->loader->add_action( 'admin_notices', $theme_admin, 'beautify_pro_activate_license_notice' );
			} 

			$layouts = new Beautify_Pro_Prebuilt_Layouts();             
			    $this->loader->add_filter( 'siteorigin_panels_prebuilt_layouts', $layouts, 'layouts' );

  
			$pro_widgets = new Beautify_Pro_Widgets();       
				$this->loader->add_filter( 'siteorigin_widgets_widget_folders', $pro_widgets, 'Beautify_Pro_get_widgets_folder' );
				$this->loader->add_filter( 'siteorigin_panels_widgets', $pro_widgets, 'Beautify_Pro_add_widgets_group' );
				$this->loader->add_filter( 'siteorigin_widgets_active_widgets', $pro_widgets, 'Beautify_Pro_filter_active_widgets' );

			
			$shortcodes = new Beautify_Pro_Theme_Shortcode();
			    $this->loader->add_action( 'widgets_init', $shortcodes, 'do_shortcode' );

 
	        /* Widget Field override */         
			$fields = new Beautify_Pro_Theme_fields();   
			    $this->loader->add_filter( 'siteorigin_widgets_form_options_heading-widget', $fields, 'beautify_pro_extend_heading_form',10,2 );
			    $this->loader->add_filter( 'siteorigin_widgets_form_options_testimonial-widget', $fields, 'beautify_pro_extend_testimonial_form',10,2 );  

			/* Template override */    
			$templates = new Beautify_Pro_Theme_templates();   
	           $this->loader->add_filter( 'siteorigin_widgets_template_file_recent-posts-widget', $templates, 'beautify_pro_recent_post_template_file',10,3);
	           $this->loader->add_filter( 'siteorigin_widgets_template_file_recent-work-widget', $templates, 'beautify_pro_recent_work_template_file',10,3);
	           $this->loader->add_filter( 'siteorigin_widgets_template_file_heading-widget', $templates, 'beautify_pro_heading_template_file',10,3);
	           $this->loader->add_filter( 'siteorigin_widgets_template_file_team-member-widget', $templates, 'beautify_pro_team_member_template_file',10,3);
	           $this->loader->add_filter( 'siteorigin_widgets_template_file_testimonial-widget', $templates, 'beautify_pro_testimonial_template_file',10,3);
	           $this->loader->add_filter( 'siteorigin_widgets_template_file_icon-box-widget', $templates, 'beautify_pro_icon_box_template_file',10,3);
	          


	        /* less file override */
	        $less = new Beautify_Pro_Theme_Less_File();   
		        //$this->loader->add_filter( 'siteorigin_widgets_less_file_gx-recent-work-widget', $less, 'beautify_pro_recent_work_less_file',10,3);
			

		    $beautify_pro_so_row_widget_style = new Beautify_Pro_So_Row_Widget_Style();  
			    /* Field */
				//$this->loader->add_filter( 'siteorigin_panels_row_style_fields', $beautify_pro_so_row_widget_style, 'beautify_pro_panels_row_style_fields',11);  
				//$this->loader->add_filter( 'siteorigin_panels_widget_style_fields', $beautify_pro_so_row_widget_style, 'beautify_pro_panels_widget_style_fields' ,11);
				 
		        /* Attributes */	
				//$this->loader->add_filter( 'siteorigin_panels_row_style_attributes', $beautify_pro_so_row_widget_style, 'beautify_pro_panels_panels_row_style_attributes',11,2);
				//$this->loader->add_filter( 'siteorigin_panels_widget_style_attributes', $beautify_pro_so_row_widget_style, 'beautify_pro_panels_panels_widget_style_attributes',11,2 );
		   
		        /* Groups */
				//$this->loader->add_filter( 'siteorigin_panels_row_style_groups', $beautify_pro_so_row_widget_style, 'beautify_pro_row_style_groups',11 );
				//$this->loader->add_filter( 'siteorigin_panels_widget_style_groups', $beautify_pro_so_row_widget_style, 'beautify_pro_widget_style_groups',11 );
		    
		        /* common panel css */
		       // $this->loader->add_filter( 'siteorigin_panels_css_object', $beautify_pro_so_row_widget_style, 'beautify_pro_css_object',11,3 );

		}    

		/**
		 * Register all of the hooks related to the public-facing functionality
		 * of the theme.
		 *
		 * @since    1.0.0
		 * @access   private 
		 */
		private function define_public_hooks() {      

			$theme_public = new Beautify_Pro_Theme_Public( $this->get_theme_name(), self::$version );

			$this->loader->add_action( 'wp_enqueue_scripts', $theme_public, 'enqueue_styles' );
			$this->loader->add_action( 'wp_enqueue_scripts', $theme_public, 'enqueue_scripts' );

			$beautify_pro_hooks = new Beautify_Pro_Theme_Hooks();
			$this->loader->add_action( 'beautify_pro_content_before', $beautify_pro_hooks, 'full_width_slider', 100 );  

			$custom = new Beautify_Pro_Theme_Custom_CSS_JS();    
			$this->loader->add_action( 'wp_footer', $custom, 'js', 100);
			$this->loader->add_action( 'wp_footer', $custom, 'beautify_pro_user_customize_js' );
			if( get_theme_mod('analytics_place') ) {
				$this->loader->add_action( 'wp_footer', $custom, 'analytics_place_footer' );
			}else {
				$this->loader->add_action( 'wp_head', $custom, 'analytics_place_header' );
			}
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
		 * The name of the theme used to beautify_prouely identify it within the context of
		 * WordPress and to define internationalization functionality.
		 *
		 * @since     1.0.0
		 * @return    string    The name of the theme.
		 */
		public function get_theme_name() {
			return $this->theme_name;
		}

		/**
		 * The reference to the class that orchestrates the hooks with the theme.
		 *
		 * @since     1.0.0
		 * @return    beautify_pro_Theme_Loader    Orchestrates the hooks of the theme.
		 */
		public function get_loader() {
			return $this->loader;
		}

	}
}
