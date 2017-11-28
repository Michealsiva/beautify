<?php

/**
 * Created by venkat on 2/11/16
 */
if ( ! class_exists('Theme_Sidebars')) { 
	class Theme_Sidebars {

		protected $sidebars;

		public static $instance = null;     

		/**
		 * Theme_Sidebars constructor.
		 */
		public function __construct() {
			$this->sidebars = array(
				'sidebar-1'    => array(
					'name'        => __( 'Sidebar', 'beautify_pro' ),
					'description' => __( 'Primary sidebar', 'beautify_pro' ),
				),
				
				'top-left'     => array(
					'name'        => __( 'Top Left', 'beautify_pro' ),
					'description' => __( 'Widget area at top left side of the header', 'beautify_pro' ),
				),
				'top-right'    => array(
					'name'        => __( 'Top Right', 'beautify_pro' ),
					'description' => __( 'Widget area at top right side of the header', 'beautify_pro' ),
				),
				'footer'       => array(
					'name'        => __( 'Footer %d', 'beautify_pro' ),
					'description' => __( 'One of 4 Column Footer widget area', 'beautify_pro' ),
					'multiple'    => true,
					'items'       => 4,
				),
				'sidebar-left' => array(
					'name'        => __( 'Sidebar Left', 'beautify_pro' ),
					'description' => __( 'Left Sidebar', 'beautify_pro' ),
				),
			);

			add_action( 'widgets_init', array( $this, 'register' ) );  
			add_action( 'init', array($this, 'get') );
		}

		/**
		 * Get an instance of this class
		 */

		public static function getInstance() { 
			if ( self::$instance === null ) {
				self::$instance = new Theme_Sidebars();   
			}

			return self::$instance;
		}

		/**
		 * Register widget area.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
		 */
		public function register() {
			foreach ( $this->sidebars as $id => $sidebar ) {
				$multiple = isset($sidebar['multiple']) ? $sidebar['multiple'] : false;
				$items =  isset($sidebar['items']) ? $sidebar['items'] : 1;
				if ( ! $multiple ) {
					register_sidebar( array(
						'name'          => $sidebar['name'],
						'id'            => $id,
						'description'   => $sidebar['description'],
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget'  => '</aside>',
						'before_title'  => '<h4 class="widget-title">',
						'after_title'   => '</h4>',
					) );
				} else {
					register_sidebars( $sidebar['items'], array(
						'name'          => $sidebar['name'],
						'id'            => $id,
						'description'   => $sidebar['description'],
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget'  => '</aside>',
						'before_title'  => '<h4 class="widget-title">',
						'after_title'   => '</h4>',
					) );
				}
			}
		}

		public static function get() {
			$default_sidebars = array();
			foreach ($GLOBALS['wp_registered_sidebars'] as $sidebar) {
				$default_sidebars[$sidebar['id']] = $sidebar['name'];
			}
			return $default_sidebars;
		}
	}
}