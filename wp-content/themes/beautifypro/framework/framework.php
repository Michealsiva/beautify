<?php
	/**
	 * The core plugin class that is used to define internationalization,
	 * admin-specific hooks, and public-facing site hooks.
	 */
	if( ! class_exists( 'Fw' ) ) {
	   require trailingslashit( get_template_directory() ) . 'framework/includes/class-fw.php';
    }            
    
	/**
    * Define constants
    */
	if( ! defined( 'Fw_DIR' ) ) {  
		define( 'Fw_DIR', trailingslashit( get_template_directory() ) . trailingslashit( 'framework' ) );
	}

	if( ! defined( 'Fw_URI' ) ) {
		define( 'Fw_URI',trailingslashit( get_template_directory_uri() ) . trailingslashit( 'framework' ) );
	}
  
	if( ! defined( 'Fw_ADMIN_DIR' ) ) {
		define( 'Fw_ADMIN_DIR', Fw_DIR . trailingslashit( 'admin' ) );
	}

	if( ! defined( 'Fw_ADMIN_URI' ) ) {
		define( 'Fw_ADMIN_URI', Fw_URI . trailingslashit( 'admin' ) );
	}

	if( ! defined( 'Fw_WIDGETS_DIR' ) ) {
		define( 'Fw_WIDGETS_DIR', Fw_ADMIN_DIR . trailingslashit( 'widgets' ) );
	}

	if( ! defined( 'Fw_WIDGETS_URI' ) ) {
		define( 'Fw_WIDGETS_URI', Fw_ADMIN_URI . trailingslashit( 'widgets' ) );
	}

	if( ! defined( 'Fw_PUBLIC_DIR' ) ) {
		define( 'Fw_PUBLIC_DIR', Fw_DIR . trailingslashit( 'public' ) );
	}

	if( ! defined( 'Fw_PUBLIC_URI' ) ) {
		define( 'Fw_PUBLIC_URI', Fw_URI . trailingslashit( 'public' ) );
	}

	/**
	 * Begins execution of the plugin.
	 *
	 * Since everything within the plugin is registered via hooks,
	 * then kicking off the plugin from this point in the file does
	 * not affect the page life cycle.
	 *
	 * @since    1.0.0
	 */
	function run_framework() {
															
		$plugin = new Fw( 'framework', '1.0.0' );
		$plugin->run();

	}

	run_framework();
