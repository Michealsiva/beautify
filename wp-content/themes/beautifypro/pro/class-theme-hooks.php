<?php

	/**
	 * Created by PhpStorm.
	 * User: venkat
	 * Date: 26/11/15
	 * Time: 4:55 PM
	 */  
if( ! class_exists( 'Beautify_Pro_Theme_Hooks' )) {   
	class Beautify_Pro_Theme_Hooks {

		public function full_width_slider(){
			global $post;
			if( ! is_404() && ! is_search() ) {
				
				$slider_type = get_post_meta( $post->ID, '_gx_slider_type', true );
				$flex_slider_status = get_post_meta( $post->ID, '_gx_flexslider', true ); 
				$elastic_slider_status = get_post_meta( $post->ID, '_gx_elastic_slider', true );

				if( !empty( $slider_type ) && ( !empty( $flex_slider_status ) ||  !empty( $elastic_slider_status ) ) ) { 
					if( $slider_type == 'elastic-slider' ) {
						$slider_shortcode_id = get_post_meta( $post->ID, '_gx_elastic_slider', true ); 
						$slider_shortcode = '[elastic_slider id='.$slider_shortcode_id.']' ;
					}else{
						$slider_shortcode_id = get_post_meta( $post->ID, '_gx_flexslider', true );
						$slider_shortcode = '[flexslider id='.$slider_shortcode_id.']' ;
					}

					if( $slider_shortcode != '' ) {
						echo '<div class="page-slider">';
						echo do_shortcode( $slider_shortcode );
						echo '</div>';
					}
			    }
				
		    }
		}    
	}
}