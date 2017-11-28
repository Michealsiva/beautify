<?php
/**
 * Version 0.0.3
 *
 * This file is just an example you can copy it to your theme and modify it to fit your own needs.
 * Watch the paths though.
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me! 
if ( !class_exists( 'Radium_Theme_Demo_Data_Importer' ) ) {   

	require_once( dirname( __FILE__ ) . '/importer/radium-importer.php' ); //load admin theme data importer

	class Radium_Theme_Demo_Data_Importer extends Radium_Theme_Importer {     

		/**
		 * Set framewok  
		 *
		 * options that can be used are 'default', 'radium' or 'optiontree'
		 *
		 * @since 0.0.3
		 *
		 * @var string
		 */
		public $theme_options_framework = 'radium';

		/**
		 * Holds a copy of the object for easy reference.
		 *
		 * @since 0.0.1
		 *
		 * @var object
		 */
		private static $instance;

		/**
		 * Set the key to be used to store theme options
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $theme_option_name       = 'theme_mods_beautifypro'; //set theme options name here (key used to save theme options). Optiontree option name will be set automatically

		/**
		 * Set name of the theme options file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $theme_options_file_name = 'theme_options.txt';

		/**
		 * Set name of the widgets json file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $widgets_file_name       = 'widgets.json';

		/**
		 * Set name of the content file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $content_demo_file_name  = 'content.xml';

		/**
		 * Holds a copy of the widget settings
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $widget_import_results;

		/**
		 * Constructor. Hooks all interactions to initialize the class.
		 *
		 * @since 0.0.1
		 */
		public function __construct() {

			$this->demo_files_path = dirname(__FILE__) . '/data/'; //can

			self::$instance = $this;
			parent::__construct();
			add_action('radium_importer_after_theme_options_import', array($this, 'settings_reading'));
			

		}

		/**
		 * Add menus - the menus listed here largely depend on the ones registered in the theme
		 *
		 * @since 0.0.1
		 */
		public function set_demo_menus(){

			// Menus to Import and assign - you can remove or add as many as you want
			$main_menu   = get_term_by('name', 'Primary Menu', 'nav_menu');

			set_theme_mod( 'nav_menu_locations', array(
					'primary' => $main_menu->term_id,
				)
			);

			$this->flag_as_imported['menus'] = true;

		}

		public function settings_reading() {   
			//  frontpage setup //
			
			if( get_option('page_on_front') === '0' && get_option('page_for_posts') === '0' ) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', '932');
				update_option('page_for_posts','933'); 	
			} 
			$sbg = unserialize('a:3:{s:8:"pagemenu";s:9:"Page Menu";s:10:"widgetmenu";s:11:"Widget menu";s:7:"layouts";s:7:"Layouts";}');
			update_option('sbg_sidebars',$sbg);
			
			 //Catch saved options
			$sbg_sidebars = get_option( 'sbg_sidebars', array() );  

			//Make sure if we have valid sidebars
			if ( !empty( $sbg_sidebars ) && is_array( $sbg_sidebars ) ) {

				//Register each sidebar
				foreach( $sbg_sidebars as $sidebar ) {
					if( isset($sidebar) && !empty($sidebar) ){
						$sbg_class = str_replace( array(
							' ',
							',',
							'.',
							'"',
							"'",
							'/',
							"\\",
							'+',
							'=',
							')',
							'(',
							'*',
							'&',
							'^',
							'%',
							'$',
							'#',
							'@',
							'!',
							'~',
							'`',
							'<',
							'>',
							'?',
							'[',
							']',
							'{',
							'}',
							'|',
							':',
						), '', $sidebar );

						register_sidebar(
							array(
								'name'          => $sidebar,
								'id'            => strtolower( $sbg_class ),    
								'description'   => '',
								'before_widget' => '<div id="%1$s" class="widget %2$s">',
								'after_widget'  => '</div>',
								'before_title'  => '<h4 class="widget-title">',  
								'after_title'   => '</h4>'
							)
						);

					}
				}

			} 
		}


	}

	new Radium_Theme_Demo_Data_Importer;

}