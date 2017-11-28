<?php
/**
 * flat functions and definitions
 * @package BeautifyPro
 *
 */
 
if ( ! function_exists( 'beautify_pro_setup' ) ) :  
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function beautify_pro_setup() {   

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 780; /* pixels */
	}
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on flat, use a find and replace
	 * to change 'beautify_pro' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'beautify_pro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );  

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	add_editor_style( 'css/editor-style.css' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );   
	add_image_size( 'beautify_recent_work', 290 , 250, true );
	add_image_size( 'beautify_team_member', 250 , 250, true );
	add_image_size( 'beautify_testimonial', 200 , 200, true );
	add_image_size( 'beautify-pro-recent-posts-img',560, 310, true);
	add_image_size( 'beautify-blog-full-width', 1200,350, true );
	add_image_size( 'beautify-small-featured-image-width', 450,350, true );
	add_image_size( 'beautify-blog-large-width', 800,350, true );
	add_image_size( 'beautify-thumbnail-large', 400,200, true );
	add_image_size( 'beautify-thumbnail-small', 130,90, true );
	add_image_size( 'beautify-magazine_slider_thumbnail', 800,430, true );
	add_image_size( 'beautify-highlighted-post', 550,300, true );   



	add_image_size( 'beautify-service-img', 280,380, true ); 
	add_image_size( 'beautify-recent-posts-img', 350,250, true );
	


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'beautify_pro' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats 
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery',  
	) );

	add_theme_support( 'custom-background' );
	

	add_theme_support( 'custom-logo' );
	
	/* Woocommerce support */

	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	/* License key - EDD update file */
	
	require_once get_template_directory() . '/pro/updater/theme-updater.php';	
	
}
endif; // beautify_pro_setup
add_action( 'after_setup_theme', 'beautify_pro_setup' );

/**
 * Register sidebars for this for this theme.
 */
require get_template_directory() . '/pro/class-theme-sidebars.php';
$theme_sidebars = Theme_Sidebars::getInstance();   

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';
/**
 * Implement the Custom Header feature.
 */
require  get_template_directory()  . '/includes/custom-header.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';


/**
 * Load Filter and Hook functions
 */
require get_template_directory() . '/includes/hooks-filters.php';




remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content', 'beautify_pro_output_content_wrapper');


function beautify_pro_output_content_wrapper() {
	$woocommerce_sidebar = get_theme_mod('woocommerce_sidebar',true ) ;
	if( $woocommerce_sidebar ) {
        $woocommerce_sidebar_column = 'eleven';
    }else {
        $woocommerce_sidebar_column = 'sixteen';
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar');
    }
    $page_breadcrumb = get_theme_mod('breadcrumb'); 
    if( empty($page_breadcrumb) && function_exists('woocommerce_breadcrumb')) {
        echo '<div class="breadcrumb-wrap woocommerce-breadcrumb-class" style="margin-bottom: 30px;"><div class="container">';
		   woocommerce_breadcrumb();  
		echo '</div></div>';
    }
	echo '<div class="site-content container" id="content"><div id="primary" class="content-area '. $woocommerce_sidebar_column .' columns">';	
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
add_action( 'woocommerce_after_main_content', 'beautify_pro_output_content_wrapper_end' );

function beautify_pro_output_content_wrapper_end () {
	echo "</div>";
}

add_action( 'init', 'beautify_pro_remove_wc_breadcrumbs' );  
function beautify_pro_remove_wc_breadcrumbs() {
   	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

include_once( get_template_directory() . '/admin/theme-options.php' ); 


/* Webulous Framework add */
 require get_template_directory() . '/framework/framework.php'; 			

/**
 * The core plugin class that is used to load dependencies, define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
if( !class_exists('Beautify_Pro_Theme') ) {
   require get_template_directory() . '/pro/class-theme.php'; 		
}
/**
 * Begins execution of the theme.
 *
 * Since everything within the theme is registered via hooks,
 * then kicking off the theme from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_beautify_pro() {

	$theme = new Beautify_Pro_Theme( 'beautify_pro', '1.0.0' );
	$theme->run(); 

}

run_beautify_pro();


/* SVG Support */
function genex_svg_mime_support($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'genex_svg_mime_support');


add_action( 'wp_footer','beautify_pro_custom_color_scheme' );

function beautify_pro_custom_color_scheme() {
  if( get_theme_mod('enable_custom_color_scheme',false) ) {
    /* custom color scheme */
    $custom_css_file = get_template_directory() . '/css/default.css';

        if( file_exists($custom_css_file) ) {
          $primary_color =  implode(" ",Kirki::$fields[ 'color_scheme' ]['choices'][ '1' ]);

          $old_color_hex = get_theme_mod('previous_custom_color_scheme',$primary_color);
          $oldcolor = array($old_color_hex,substr(str_replace(',',', ',Kirki_Color::get_rgb($old_color_hex,true)),4,-1));    
          
          $new_color_hex = get_theme_mod('custom_color_scheme',$primary_color);
          $newcolor = array($new_color_hex,substr(str_replace(',',', ',Kirki_Color::get_rgb($new_color_hex,true)),4,-1));
         
	      //read the entire string
	      $origional_css = file_get_contents($custom_css_file); 
	      $modified_css = str_replace('../', '../../themes/'. get_option('stylesheet') .'/', $origional_css); 

	      // Stash CSS in uploads directory
	      require_once( ABSPATH . 'wp-admin/includes/file.php' ); // We will probably need to load this file
	      global $wp_filesystem;
	      $upload_dir = wp_upload_dir(); // Grab uploads folder array
	      $dir = trailingslashit( $upload_dir['basedir'] ) . get_option('stylesheet') . '/'; // Set storage directory path
	      WP_Filesystem(); // Initial WP file system
	      $wp_filesystem->mkdir( $dir ); // Make a new folder for storing our file
            
        if( ! file_exists( $dir . 'custom.css' ) ) {
            $wp_filesystem->put_contents( $dir . 'custom.css', $modified_css, 0644 ); // Finally, store the file :D
        } 

        if( get_theme_mod('beautify_pro_upgrade_completed') ) {
        	$default_old_color = $primary_color;
        	$defaultoldcolor = array($default_old_color,substr(str_replace(',',', ',Kirki_Color::get_rgb($default_old_color,true)),4,-1));    
        	$wp_filesystem->put_contents( $dir . 'custom.css', $modified_css, 0644 ); // Finally, store the file :D
            $asset_css1 = file_get_contents($dir . 'custom.css');
	        //replace something in the file string - this is a VERY simple example
	        $asset_css1 = str_replace($defaultoldcolor, $oldcolor,$asset_css1);
	        $wp_filesystem->delete( $dir . 'custom.css' );
            $wp_filesystem->put_contents( $dir . 'custom.css',$asset_css1, 0644 );
            set_theme_mod('beautify_pro_upgrade_completed',false); 
        }         
           
        $asset_css = file_get_contents($dir . 'custom.css');
          
        //replace something in the file string - this is a VERY simple example
        $asset_css = str_replace($oldcolor, $newcolor,$asset_css);

        $wp_filesystem->delete( $dir . 'custom.css' );
        $wp_filesystem->put_contents( $dir . 'custom.css',$asset_css, 0644 );

        //file_put_contents($dir . 'custom.css', $asset_css);
        set_theme_mod('previous_custom_color_scheme',$new_color_hex);
     
      }
  }
}


/**
 * This function runs when WordPress completes its upgrade process
 * It iterates through each theme updated to see if ours is included
 * @param $upgrader_object Array
 * @param $options Array
 */
function beautify_pro_upgrade_completed( $upgrader_object, $options ) {
 // The path to our theme's main file
 // $our_theme = theme_basename( __FILE__ );
 // If an update has taken place and the updated type is themes and the themes element exists
 if( $options['action'] == 'update' && $options['type'] == 'theme' && isset( $options['themes'] ) ) {
  // Iterate through the themes being updated and check if ours is there

    foreach( $options['themes'] as $theme ) {
	    if( $theme == get_option('stylesheet')) {
	     // Set a theme mod to record that our theme has just been updated
	     set_theme_mod('beautify_pro_upgrade_completed',true);
	    }
    }
 }
}

add_action( 'upgrader_process_complete', 'beautify_pro_upgrade_completed', 10, 2 );