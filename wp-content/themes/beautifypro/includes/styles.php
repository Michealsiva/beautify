<?php

function beautify_pro_custom_styles($custom) {
$custom = '';  
     $sticky_header_position = get_theme_mod('sticky_header_position') ;
     if( $sticky_header_position == 'bottom') {
          $custom .= ".sticky-header {  top: auto!important;
               bottom:0; }"."\n";  
          $custom .= ".nav-wrap.sticky-header .nav-menu .sub-menu {  top: auto;
               bottom:100%; }"."\n";  
     }

     $sticky_header = get_theme_mod('sticky_header');
     if( ! $sticky_header ) {
          $custom .= ".site-header {  position: absolute; }"."\n";        
     }
  

	//Output all the styles
	wp_add_inline_style( 'beautify-header', $custom );	
}



add_action( 'wp_enqueue_scripts', 'beautify_pro_custom_styles',11 );  
