<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.webulousthemes.com  
 * @since      1.0.0
 *
 * @package    Fw
 * @subpackage Fw/admin  
 */ 

/** 
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fw
 * @subpackage Fw/admin
 * @author     N. Venkat Raj <venkatraj.n@gmail.com>
 */
if ( ! class_exists( 'Fw_Admin' ) ) {
	class Fw_Admin {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string $plugin_name The ID of this plugin.
		 */
		private $plugin_name;

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
		 * @param      string $plugin_name The name of this plugin.
		 * @param      string $version The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version     = $version;
			$this->load_dependencies();
		}

	    /**
		 * Load the required dependencies for admin section.
		 *
		 * Include the following files that are required for admin section:
		 *
		 * - TGM_Plugin_Activation. Notify and load required and recommended plugins
		 * - Wbls_Customizer_API_Wrapper. Wrapper class to setup customizer panels/section/settings/controls.
		 * - Wbls_Theme_Shortcode. Defines shortcodes and its functionality.
		 * - Wbls_Theme_Admin. Defines all hooks for the admin area.
		 * - Wbls_Theme_Public. Defines all hooks for the public side of the site.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function load_dependencies() {  
			require_once Fw_DIR . 'admin/class-tgm-plugin-activation.php';
		}

		/**
		 * Register post types
		 */
		public function get_post_types() {
			$post_types = array(
				'flexslider'     => new Fw_Flexslider(),
				'elastic_slider' => new Fw_Elastic_Slider(),
				'faq'            => new Fw_Faq(),
				'portfolio'      => new Fw_Portfolio(),
			);

			return $post_types;
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
			 * defined in Fw_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Fw_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */
			/*
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/framework/includes/vendor/font-awesome/css/font-awesome.min.css' );
			wp_enqueue_style( 'fontawesome-iconpicker', get_template_directory_uri() . '/framework/includes/vendor/fontawesome-iconpicker/css/fontawesome-iconpicker.min.css' );
			wp_enqueue_style( 'select2', get_template_directory_uri() . '/framework/includes/vendor/select2/select2.css' );
			*/

			// Uncomment this when needed
			//wp_enqueue_style( $this->plugin_name, get_template_directory_uri() . '/framework/admin/css/admin.css', array(), $this->version, 'all' );

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
			 * defined in Fw_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Fw_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */

			/*
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( 'select2', get_template_directory_uri() . '/framework/includes/vendor/select2/select2.min.js' );
			wp_enqueue_script( 'fontawesome-iconpicker', get_template_directory_uri() . '/framework/includes/vendor/fontawesome-iconpicker/js/fontawesome-iconpicker.min.js', array( 'jquery' ), '1.0.0', true );
			*/

			wp_enqueue_script( $this->plugin_name, get_template_directory_uri() . '/framework/admin/js/admin.js', array( 'jquery' ), $this->version, true );
		}


		/**
		 * Add meta boxes
		 */
		public function add_meta_boxes( $meta_boxes ) {
			// TODO: May be a separate class and put code in constructor?
			$portfolio_fields = array(
				array(
					'id'         => '_gx_portfolio_content_width',
					'name'       => __( 'Content', 'framework' ),
					'type'       => 'select',
					'options'    => array(
						'full_width' => __( 'Full Width', 'framework' ),
						'half_width' => __( 'Half Width', 'framework' ),
					),
					'allow_none' => false,
					'columns'    => 12,
				),
				array(
					'id'         => '_gx_portfolio_video_type',
					'name'       => __( 'Video Type', 'framework' ),
					'type'       => 'select',
					'options'    => array(
						'youtube' => __( 'YouTube', 'framework' ),
						'vimeo'   => __( 'Vimeo', 'framework' ),
					),
					'allow_none' => true,
					'columns'    => 6,
				),
				array(
					'id'      => '_gx_portfolio_video_id',
					'name'    => __( 'Video ID', 'framework' ),
					'type'    => 'text',
					'columns' => 6
				),
				array(
					'id'      => '_gx_portfolio_project_url',
					'name'    => __( 'Project URL', 'framework' ),
					'type'    => 'text',
					'columns' => 6
				),
				array(
					'id'      => '_gx_portfolio_project_link_text',
					'name'    => __( 'Project Link Text', 'framework' ),
					'type'    => 'text',
					'columns' => 6
				),
			);

			$meta_boxes[] = array(
				'title'      => __( 'Project', 'framework' ),
				'post_types' => array( 'portfolio' ),
				'fields'     => $portfolio_fields
			);

			// Adding Full Width option to single posts
			$meta_boxes[] = array(
				'title'   => __( 'Layout Option', 'framework' ),
				'pages'   => 'post',
				'context' => 'side',
				'fields'  => array(
					array(
						'id'   => '_gx_full_width_post',
						'name' => __( 'Full Width Layout', 'framework' ),
						'type' => 'checkbox'
					)
				),
			);

			$faq_fields = array(
				array( 'id' => '_gx_faq_answer', 'name' => __( 'Answer', 'framework' ), 'type' => 'textarea' ),
			);

			$meta_boxes[] = array(
				'title'  => __( 'FAQ Details', 'framework' ),
				'pages'  => 'faq',
				'fields' => $faq_fields,
			);

			$blog_layouts = array(
				1 => __( 'Default ( One Column )', 'framework' ),
				2 => __( 'Two Columns ', 'framework' ),
				3 => __( 'Three Columns ( Without Sidebar ) ', 'framework' ),
				4 => __( 'Two Columns With Masonry', 'framework' ),
				5 => __( 'Three Columns With Masonry ( Without Sidebar ) ', 'framework' ),
				6 => __( 'Blog FullWidth', 'framework' ),
			);

			$sidebar_layouts      = array(   
				'right' => __( 'Right Sidebar', 'framework' ),
				'left' => __( 'Left Sidebar', 'framework' ),
				'two-sidebar' => __( 'Two Sidebar', 'framework' ),
				'two-sidebar-left' => __( 'Two Sidebar Left', 'framework' ),
				'two-sidebar-right' => __( 'Two Sidebar Right', 'framework' ),
				'fullwidth' => __( 'Full Width', 'framework' ), 
				'no-sidebar' => __( 'No Sidebar', 'framework' ),
			);

			$default_sidebars        = Theme_Sidebars::get();
			$dynamic_sidebars        = Fw_Sidebar_Generator::get_sidebars();
			if( !empty($dynamic_sidebars) ) {	
				$sidebar_widget_area = array_merge( $default_sidebars, $dynamic_sidebars );
			}else{
				$sidebar_widget_area = Theme_Sidebars::get();
			}
			
			
	  
			// Add new meta box - Tab
			$meta_boxes[] = array(
				'title'       => __( 'Page Options', 'framework' ),
				'pages'       => 'page',
				'context'     => 'advanced',  
				'priority'    => 'high',
				'tabs'        => array(
					'slider'         => __( 'Sliders', 'framework' ),
					'portfolio'      => __( ' Portfolio ', 'framework' ),
					'blog'           => __( ' Blog ', 'framework' ),
					'page_sidebar'   => __( ' Layout ', 'framework' ), 
					'page_title_bar' => __( 'Page Title Bar', 'framework' ),
				),
				// Tab style: 'default', 'box' or 'left'. Optional
				'tab_style'   => 'left',  

				// Show meta box wrapper around tabs? true (default) or false. Optional
				'tab_wrapper' => true,
				'fields'      => array(
					/* Slider Tab */
					array(
						'id'         => '_gx_slider_type', 
						'name'       => __( 'Slider Type', 'framework' ),
						'type'       => 'select_advanced',
						'options'    => array(
							'flexslider'     => __( 'Flex Slider', 'framework' ),
							'elastic-slider' => __( 'Elastic Slider', 'framework' ),
						),
						'desc'       => __( 'Select the type of slider that displays.', 'framework' ),
						'tab'        => 'slider', 
					),
					array(
						'id'        => '_gx_flexslider',  
						'name'      => __( 'Select FlexSlider Type', 'framework' ),
						'type'      => 'post',
						'post_type' => 'flexslider',
						'desc'      => __( 'Select the unique name of the slider.', 'framework' ),
						'visible'    => array( '_gx_slider_type', 'flexslider' ),
						'tab'       => 'slider',
					),
					array(
						'id'        => '_gx_elastic_slider',
						'name'      => __( 'Select Elastic Slider Type', 'framework' ),
						'type'      => 'post',
						'post_type' => 'elastic_slider',
						'desc'      => __( 'Select the unique name of the slider.', 'framework' ),
						'visible'    => array( '_gx_slider_type', 'elastic-slider' ),
						'tab'       => 'slider',
					),
					/* Portolio Tab */
					array(
						'id'         => '_gx_portfolio_layout',
						'name'       => __( 'Choose Portfolio Layout', 'framework' ),
						'type'       => 'select',
						'options'    => array(
							'2col' => '2 Col',
							'3col' => '3 Col',
							'4col' => '4 Col',
						),
						'allow_none' => false,
						'default'    => '3 Col',
						'tab'        => 'portfolio',
					),
					array(
						'id'         => '_gx_portfolio_category',
						'name'       => __( 'Choose Portfolio Category', 'framework' ),
						'type'       => 'taxonomy_advanced',    
						'taxonomy'   => 'portfolio_cat', //Enter Taxonomy Slug
						'multiple' => true,
						'select_all_none' => true,  
						'placeholder' => __('Select Category','framework'),
						'tab'        => 'portfolio',
					),

					array(
						'id'         => '_gx_portfolio_skill',
						'name'       => __( 'Choose Portfolio Skill', 'framework' ),
						'type'       => 'taxonomy_advanced',
						'taxonomy'   => 'skills', //Enter Taxonomy Slug
						'multiple' => true,
						'select_all_none' => true,
						'placeholder' => __('Select Skills','framework'),
						'tab'        => 'portfolio',
					),

					array(
						'id'      => '_gx_page_portfolio_count',
						'name'    => __( 'Portfolio Count', 'framework' ),
						'type'    => 'number',
						'step'    => '1',
						'default' => get_option( 'posts_per_page' ),
						'tab'     => 'portfolio'
					),
					array(
						'id'   => '_gx_page_portfolio_masonry',
						'name' => __( 'Enable Portfolio Masonry Layout', 'framework' ),
						'type' => 'checkbox',
						'tab'  => 'portfolio'
					),
					array(
						'id'   => '_gx_page_portfolio_sidebar',
						'name' => __( 'Enable Portfolio Sidebar', 'framework' ),
						'type' => 'checkbox',
						'tab'  => 'portfolio'
					),
					array(
						'id'   => '_gx_page_portfolio_text',
						'name' => __( 'Enable Portfolio Text', 'framework' ),
						'type' => 'checkbox',
						'tab'  => 'portfolio'
					),
					array(
						'id'         => '_gx_portfolio_filter_status',
						'name'       => __( 'Choose Portfolio Filter Type', 'framework' ),
						'type'       => 'select',
						'options'    => array(
							'show'        => 'Show',
							'without-all' => 'Show Without "All"',
							'hide'        => 'Hide',
						),
						'allow_none' => false,
						'default'    => 'Show',
						'tab'        => 'portfolio',
					),
					array(
						'id'   => '_gx_page_portfolio_gap',
						'name' => __( 'Enable Portfolio Without Gap', 'framework' ),
						'type' => 'checkbox',
						'tab'  => 'portfolio'
					),

					/* Blog Page  */
					array(
						'id'      => '_gx_blogpage_layout',
						'name'    => __( 'Select Blog Page Layout', 'framework' ),
						'type'    => 'select',
						'options' => $blog_layouts,
						'default' => 1,
						'tab'     => 'blog'
					),

					/* Page sidebar layout */ 
					array(
						'id'      => '_gx_pagesidebar_layout', 
						'name'    => __( 'Select Page Layout', 'framework' ),
						'type'    => 'select',
						'options' => $sidebar_layouts,
						'default' => 'right',
						'tab'     => 'page_sidebar'     
					),
				    array(
					   'id'         => '_gx_sidebar_one',
					   'name'       => __( 'Select Sidebar 1', 'framework' ),
					   'type'       => 'select',
					   'options' => $sidebar_widget_area,
					   'desc' => __('Select sidebar 1 that will display on this page.( If you want more sidebar widget area You will create the sidebar under Appearance > Sidebars.  ) ','framework'),
					   'tab'      => 'page_sidebar', 
					   'visible' => array('_gx_pagesidebar_layout', 'not in', array('fullwidth','no-sidebar')) 
				   ),
				   array(
					   'id'         => '_gx_sidebar_two',
					   'name'       => __( 'Select Sidebar 2', 'framework' ),
					   'type'       => 'select',
					   'options' => $sidebar_widget_area,   
					 //  'default' => 'sidebar-2', 
					   'desc' => __('Select sidebar 2 that will display on this page. Sidebar 2 can only be used if sidebar 1 is selected','framework'),
					   'tab'        => 'page_sidebar',
					   'visible' => array('_gx_pagesidebar_layout', 'not in', array('left', 'right','fullwidth','no-sidebar'))
				   ),
					/*array(
					   'id'         => '_gx_sidebar_color',
					   'name'       => __( 'Sidebar Background Color', 'framework' ),
					   'type'       => 'color',
					   'desc' => __('Controls the background color of the sidebar.','framework'),
					   'tab'        => 'page_sidebar',
				   ), */

					// Page Title Bar
					array(
						'id'      => '_gx_page_title_bar',
						'name'    => __( 'Choose Page Title Bar', 'framework' ),
						'type'    => 'select',
						'options' => array(
							1 => __( 'Show Bar and Content', 'framework' ),
							2 => __( 'Hide', 'framework' ),
						),
						'default' => 2,
						'allow_none' => true,
						'tab'     => 'page_title_bar'
					),
					array(
						'id'   => '_gx_page_title_text',
						'name' => __( 'Hide Page Title Bar Text', 'framework' ),
						'type' => 'checkbox',
						'tab'  => 'page_title_bar'
					),
					array(
						'id'   => '_gx_page_breadcrumb',
						'name' => __( 'Hide Breadcrumb', 'framework' ),
						'type' => 'checkbox',
						'tab'  => 'page_title_bar'
					),
					array(
						'id'      => '_gx_page_breadcrumb_char',
						'name'    => __( 'Choose Breadcrumb Character', 'framework' ),
						'type'    => 'select',
						'options' => array(
							1 => __( ' >> ', 'framework' ),
							2 => __( ' / ', 'framework' ),
							3 => __( ' > ', 'framework' ),
						),
						'default' => 1,
						'tab'     => 'page_title_bar'
					),
					/* array(
						'id'      => '_gx_page_title_bar_bgcolor', 
						'name'    => __( 'Choose Background color of Page Title Bar', 'framework' ),
						'type'    => 'color',
						'tab'     => 'page_title_bar'
					),
					array(
						'id'      => '_gx_page_title_bar_bgimg',
						'name'    => __( 'Choose Background Image of Page Title Bar', 'framework' ),
						'type'    => 'image_advanced',
						'max_file_uploads' => 1,
						'tab'     => 'page_title_bar'
					), */

				),
			);


			return $meta_boxes;
		}

	    /**
		 * Register Required and Recommended Plugins
		 */
		public function register_plugins() {
			/**
			 * Array of plugin arrays. Required keys are name and slug.
			 * If the source is NOT from the .org repo, then source is also required.
			 */
			$plugins = array(  

				array(
					'name'     => 'SiteOrigin Panels', // The plugin name.
					'slug'     => 'siteorigin-panels', // The plugin slug (typically the folder name).
					'required' => true, // If false, the plugin is only 'recommended' instead of required.
				),
				
				array(
				    'name'               => 'SiteOrigin Widgets Bundle', // The plugin name.
				    'slug'               => 'so-widgets-bundle', // The plugin slug (typically the folder name).
				    'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				),

				array(
				    'name'               => 'Contact Form 7', // The plugin name.
				    'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
				    'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				),

			);


			/*
			 * Array of configuration settings. Amend each line as needed.
			 *
			 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
			 * strings available, please help us make TGMPA even better by giving us access to these translations or by
			 * sending in a pull-request with .po file(s) with the translations.
			 *
			 * Only uncomment the strings in the config array if you want to customize the strings.
			 */
			$config = array(
				'id'           => 'tgmpa',
				// Unique ID for hashing notices for multiple instances of TGMPA.
				'default_path' => '',
				// Default absolute path to bundled plugins.
				'menu'         => 'tgmpa-install-plugins',
				// Menu slug.
				'parent_slug'  => 'themes.php',
				// Parent menu slug.
				'capability'   => 'edit_theme_options',
				// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
				'has_notices'  => true,
				// Show admin notices or not.
				'dismissable'  => true,
				// If false, a user cannot dismiss the nag message.
				'dismiss_msg'  => '',
				// If 'dismissable' is false, this message will be output at top of nag.
				'is_automatic' => false,
				// Automatically activate plugins after installation or not.
				'message'      => '',
				// Message to output right before the plugins table.

				/*
				'strings'      => array(
					'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
					'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
					'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ), // %s = plugin name.
					'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
					'notice_can_install_required'     => _n_noop(
						'This theme requires the following plugin: %1$s.',
						'This theme requires the following plugins: %1$s.',
						'theme-slug'
					), // %1$s = plugin name(s).
					'notice_can_install_recommended'  => _n_noop(
						'This theme recommends the following plugin: %1$s.',
						'This theme recommends the following plugins: %1$s.',
						'theme-slug'
					), // %1$s = plugin name(s).
					'notice_cannot_install'           => _n_noop(
						'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
						'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
						'theme-slug'
					), // %1$s = plugin name(s).
					'notice_ask_to_update'            => _n_noop(
						'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
						'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
						'theme-slug'
					), // %1$s = plugin name(s).
					'notice_ask_to_update_maybe'      => _n_noop(
						'There is an update available for: %1$s.',
						'There are updates available for the following plugins: %1$s.',
						'theme-slug'
					), // %1$s = plugin name(s).
					'notice_cannot_update'            => _n_noop(
						'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
						'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
						'theme-slug'
					), // %1$s = plugin name(s).
					'notice_can_activate_required'    => _n_noop(
						'The following required plugin is currently inactive: %1$s.',
						'The following required plugins are currently inactive: %1$s.',
						'theme-slug'
					), // %1$s = plugin name(s).
					'notice_can_activate_recommended' => _n_noop(
						'The following recommended plugin is currently inactive: %1$s.',
						'The following recommended plugins are currently inactive: %1$s.',
						'theme-slug'
					), // %1$s = plugin name(s).
					'notice_cannot_activate'          => _n_noop(
						'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
						'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
						'theme-slug'
					), // %1$s = plugin name(s).
					'install_link'                    => _n_noop(
						'Begin installing plugin',
						'Begin installing plugins',
						'theme-slug'
					),
					'update_link' 					  => _n_noop(
						'Begin updating plugin',
						'Begin updating plugins',
						'theme-slug'
					),
					'activate_link'                   => _n_noop(
						'Begin activating plugin',
						'Begin activating plugins',
						'theme-slug'
					),
					'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
					'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
					'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
					'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),  // %1$s = plugin name(s).
					'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),  // %1$s = plugin name(s).
					'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ), // %s = dashboard link.
					'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

					'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
				),
				*/
			);

			tgmpa( $plugins, $config );
		}

	    /* Meta box Tab conditional logic */
		public function  gx_meta_box_tab_conditional_logic($conditions){
			    $conditions = array(
				    '.rwmb-tab-portfolio' => array(
				     	'visible' => array('page_template', 'portfolio.php')
				    ),
				    '.rwmb-tab-blog' => array(
				     	'visible' => array('page_template', 'template-blog.php')
				    ),
				    '#page-options' => array(
				     	'hidden' => array('page_template', 'template-landing-page.php')
				    ),
				    '.rwmb-tab-page_sidebar' => array(
	                    'hidden' => array('page_template', 'in' ,array('template-full-width.php','portfolio.php','template-blog.php'))
	                    //'hidden' => array('page_template', 'in' ,array('template-full-width.php'))
				    )

				);
		        return $conditions;
		}


	}
}
