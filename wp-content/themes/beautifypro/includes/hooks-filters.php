<?php
/**
 * Flush out the transients used in beautify_pro_categorized_blog.
 */
if ( ! function_exists( 'beautify_pro_category_transient_flusher' ) ) {
	function beautify_pro_category_transient_flusher() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		// Like, beat it. Dig?
		delete_transient( 'beautify_pro_categories' );  
	} 
}  
add_action( 'edit_category', 'beautify_pro_category_transient_flusher' );
add_action( 'save_post',     'beautify_pro_category_transient_flusher' );


/**
 * Configuration sample for the Kirki Customizer.
 * The function's argument is an array of existing config values
 * The function returns the array with the addition of our own arguments
 * and then that result is used in the kirki/config filter
 *
 * @param $config the configuration array
 *
 * @return array
 */
if(!function_exists('beautify_pro_demo_configuration_sample_styling') ) {
	function beautify_pro_demo_configuration_sample_styling( $config ) {
		return wp_parse_args( array(
			'color_accent' => '#cc8800',
			'color_back'   => '#FFFFFF',
			'width'   => '320px',
		), $config );
	}
}
add_filter( 'kirki/config', 'beautify_pro_demo_configuration_sample_styling' ); 
 

/* Footer Copyright text */
if(! function_exists('beautify_pro_footer_credits') ) {
	function beautify_pro_footer_credits() { 
		$license_status = get_option( 'beautify_pro_license_key_status', false );  
			if( get_theme_mod('copyright')) : ?>
				<p><?php echo do_shortcode( get_theme_mod('copyright') ); ?></p>
			<?php else :  
				printf( __('<p>Powered by <a href="%1$s" target="_blank">WordPress-Theme</a> Beautify by Webulous', 'beautify_pro'), esc_url( 'http://www.webulousthemes.com/') );
			endif; 
    }  
}
add_action('beautify_pro_credits','beautify_pro_footer_credits');


/* Site Origin  - Row default bottom margin value */
if( defined('SITEORIGIN_PANELS_BASE_FILE') ) {
	$current_settings = get_option( 'siteorigin_panels_settings', array() );
	if(!isset($current_settings['margin-bottom'])) {
		$current_settings['margin-bottom'] = 100; 
	}
	update_option( 'siteorigin_panels_settings', $current_settings );   
}

/* MORE TEXT VALUE */

if(! function_exists('beautify_pro_more_text_value') ) {
	function beautify_pro_more_text_value( ) {
		$more_text = get_theme_mod('more_text');
		if( $more_text && !empty( $more_text ) ) { 
			$more_link_text = sprintf(__('%1$s','beautify_pro'), $more_text );   
		}else{
			$more_link_text = __('Read More','beautify_pro'); 
		}
		return '<p class="portfolio-readmore"><a class="more-link" href="' . esc_url(get_permalink()). '">'.$more_link_text.'</a></p>';
	} 
}
add_filter( 'the_content_more_link','beautify_pro_more_text_value');
   

/* Default Blog Layout wrapper start */ 
if(! function_exists('beautify_pro_blog_layout_wrapper_class_before') ) {

	function beautify_pro_blog_layout_wrapper_class_before() {
		$blog_layout = get_theme_mod('blog_layout',1);
		switch ( $blog_layout ) {
			case 2: ?>
				<div class="eight columns blog-box blog-two-column">	
	<?php	break;
	        case 3: ?>
			    <div class="one-third column blog-box blog-three-column">  
	<?php	break;
	        case 4: ?>
			    <div class="eight columns masonry-post blog-box blog-two-column">
	<?php	break;
			case 5: ?>  
			   <div class="one-third column masonry-post blog-box blog-three-column">	
	<?php	break;

		}
	}
}
add_action('beautify_pro_blog_layout_class_wrapper_before','beautify_pro_blog_layout_wrapper_class_before');

/* Default Blog Layout wrapper end */ 
if(! function_exists('beautify_pro_blog_layout_wrapper_class_after') ) {
	function beautify_pro_blog_layout_wrapper_class_after() {
	    $blog_layout = get_theme_mod('blog_layout',1 );  
		   if(  isset( $blog_layout ) && $blog_layout  > 1 && $blog_layout  < 6 ) { ?>
	          </div>
	<?php	}  
	}
}  
add_action('beautify_pro_blog_layout_class_wrapper_after','beautify_pro_blog_layout_wrapper_class_after');

    
/* Two Sidebar Left action */ 

if( !function_exists('beautify_pro_double_sidebar_left') ) { 
    function beautify_pro_double_sidebar_left() {
        $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
		if( 'two-sidebar' == $sidebar_position || 'two-sidebar-left' == $sidebar_position ) :
			 get_sidebar('left'); 
		endif; 
		if('two-sidebar-left' == $sidebar_position || 'left' == $sidebar_position ):
			get_sidebar(); 
		endif; 
    }	  
}   
add_action('beautify_pro_two_sidebar_left','beautify_pro_double_sidebar_left');   

/* Two Sidebar Right action */     
if( !function_exists('beautify_pro_double_sidebar_right') ) { 
    function beautify_pro_double_sidebar_right() {
  	    $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
		 if( 'two-sidebar' == $sidebar_position || 'two-sidebar-right' == $sidebar_position || 'right' == $sidebar_position) :
			 get_sidebar(); 
		endif; 	
		if('two-sidebar-right' == $sidebar_position ):
			get_sidebar('left'); 
		endif;   
    }
}
add_action('beautify_pro_two_sidebar_right','beautify_pro_double_sidebar_right'); 	

/* Single Blog Page flexslider feature image - fullwidth(slider) */
if( !function_exists('beautify_pro_single_flexslider_featured_image_top') ) { 
	function beautify_pro_single_flexslider_featured_image_top() {
		$single_featured_image = get_theme_mod( 'single_featured_image',true );
		$single_featured_image_size = get_theme_mod ('single_featured_image_size',1);
		if( $single_featured_image && $single_featured_image_size == 3 ) {
		    if( has_post_thumbnail() && ! post_password_required() ) :   
				the_post_thumbnail( 'post-thumbnail', array('class' => "single_page_flexslider_feature_image") ); 
			endif;
		}
	}
}
add_action('beautify_pro_single_flexslider_featured_image','beautify_pro_single_flexslider_featured_image_top');

/* Single Page flexslider feature image - fullwidth(slider) */
if( !function_exists('beautify_pro_single_page_flexslider_featured_image_top') ) { 
	function beautify_pro_single_page_flexslider_featured_image_top() {
		$single_page_featured_image = get_theme_mod( 'single_page_featured_image',true );
		$single_page_featured_image_size = get_theme_mod ('single_page_featured_image_size',1);
		if( $single_page_featured_image && $single_page_featured_image_size == 2) {
		    if( has_post_thumbnail() && ! post_password_required() ) :   
				the_post_thumbnail( 'post-thumbnail', array('class' => "single_page_flexslider_feature_image") ); 
			endif;
		}
	}
}		
add_action('beautify_pro_single_page_flexslider_featured_image','beautify_pro_single_page_flexslider_featured_image_top');


/* Flat Custom Logo */
if( !function_exists('beautify_pro_custom_logo') ) { 
	function beautify_pro_custom_logo($html) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = get_theme_mod( 'logo', '' );
		echo '<h1 class="site-title img-logo">';
		if(!$custom_logo_id && $logo!= '') {	
		    echo '<img src="'.$logo.'">';
		}else{
			echo $html;
		}
		echo '<h1>';
	}
}
add_filter( 'get_custom_logo', 'beautify_pro_custom_logo' );
 

/*  Pro - Functions 
    Site Origin Default margin bottom 

if ( ! function_exists( 'beautify_pro_panels_css_row_margin_bottom' ) ) {
	function beautify_pro_panels_css_row_margin_bottom( $panels_margin_bottom ) {
		if ( $panels_margin_bottom == '30px' ) {
			 $panels_margin_bottom = '110px';
		}else {
			$panels_margin_bottom = $panels_margin_bottom;
		}
		return $panels_margin_bottom;
	} 
}
 */
/*  Portfolio Masonry Layout - templates  */
if(! function_exists('beautify_pro_portfolio_masonry_status') ) {
	function beautify_pro_portfolio_masonry_status() {
	   global $post;
	    $page_portfolio_gap       =  get_post_meta( $post->ID, '_gx_page_portfolio_gap', true );
		$page_portfolio_masonry   =  get_post_meta( $post->ID, '_gx_page_portfolio_masonry', true );
		if( $page_portfolio_masonry ) {
           $portfolio_masonry = 'masonry-portfolio';
		}else{
			$portfolio_masonry = '';
		} 
		echo $portfolio_masonry;  
	}
}
add_action('beautify_pro_portfolio_masonry_status','beautify_pro_portfolio_masonry_status');



/* home page & default page tempalte sidebar before */
if(!function_exists('beautify_pro_primary_before') ) {
	function beautify_pro_primary_before(){
		    global $post;
			$global_sidebar_layout =  get_theme_mod('global_sidebar_layout'); 
			if( is_front_page() ) {
                $page_sidebar_layout = get_post_meta( $post->ID, '_gx_pagesidebar_layout', true ); 
			}elseif( empty($global_sidebar_layout) ) {
			    $page_sidebar_layout = get_post_meta( $post->ID, '_gx_pagesidebar_layout', true ); 
			}else{
			   $page_sidebar_layout = get_theme_mod( 'sidebar_position', 'right' ); 
			}

	    switch ($page_sidebar_layout) {
			case 'left': 
				get_sidebar();   
				break;
			case 'two-sidebar': 
			   get_sidebar('left');
			   break; 
			case 'two-sidebar-left':
			    get_sidebar('left');  
			    get_sidebar(); 
	            break;            
		}
	}
}
add_action('beautify_pro_primary_before','beautify_pro_primary_before');

/* home page & default page tempalte sidebar after */
if(!function_exists('beautify_pro_primary_after') ) {
	function beautify_pro_primary_after(){
	    global $post;
		$global_sidebar_layout =  get_theme_mod('global_sidebar_layout'); 
		if( is_front_page() ) {
            $page_sidebar_layout = get_post_meta( $post->ID, '_gx_pagesidebar_layout', true ); 
		}elseif( empty($global_sidebar_layout) ) {
		    $page_sidebar_layout = get_post_meta( $post->ID, '_gx_pagesidebar_layout', true ); 
		}else{
		   $page_sidebar_layout = get_theme_mod( 'sidebar_position', 'right' ); 
		}
		    switch ($page_sidebar_layout) {
				case 'right':
					get_sidebar(); 
					break;
				case 'two-sidebar':
				   get_sidebar(); 
				   break;
				case 'two-sidebar-right':
				    get_sidebar('left');
				    get_sidebar(); 
		            break;
			}
	}
}
add_action('beautify_pro_primary_after','beautify_pro_primary_after');

/* header video */
add_action('beautify_pro_before_header','beautify_pro_before_header_video');
if(!function_exists('beautify_pro_before_header_video')){
	function beautify_pro_before_header_video() {
		if(function_exists('the_custom_header_markup') ) { ?>
		    <div class="custom-header-media">
				<?php the_custom_header_markup(); ?>
			</div>
	    <?php } 
	}
}


