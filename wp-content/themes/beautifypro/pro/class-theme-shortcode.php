<?php

	/**   
	 * Created by PhpStorm.
	 * User: venkat
	 * Date: 26/11/15
	 * Time: 11:10 AM
	 */
if( ! class_exists( 'Beautify_Pro_Theme_Shortcode' ) ) {
	class Beautify_Pro_Theme_Shortcode {      

		public function do_shortcode(){
         add_shortcode( 'flexslider', array( $this, 'flexslider' ) );  
         add_shortcode( 'elastic_slider', array( $this, 'elastic_slider' ) );
        }

	    /* Flex Slider */  
		public function flexslider( $atts, $content = null ) {
			extract( shortcode_atts( array(
				'id' => '',
			), $atts ) );
				$output = '';
				$slides = rwmb_meta('_gx_flexslider_slide',array(), $id); 
                
 
				if( ! empty( $slides ) ) {  
				// Slider Settings 
			    $animation =  rwmb_meta('_gx_flexslider_animation',array(), $id); 
			    $slide_direction =  rwmb_meta('_gx_flexslider_slide_direction',array(), $id);
			    $slide_show_speed =  rwmb_meta('_gx_flexslider_slideshow_speed',array(), $id);
			    $animation_speed =  rwmb_meta('_gx_flexslider_animation_speed',array(), $id);
			    $slider_show =  rwmb_meta('_gx_flexslider_slideshow',array(), $id);
			    $smooth_height =  rwmb_meta('_gx_flexslider_smooth_height',array(), $id); 
			    $direction_nav =  rwmb_meta('_gx_flexslider_direction_nav',array(), $id);
			    $control_nav =  rwmb_meta('_gx_flexslider_control_nav',array(), $id);
			    $multiple_keyboard =  rwmb_meta('_gx_flexslider_keyboard',array(), $id);
			    $multiple_wheel =  rwmb_meta('_gx_flexslider_mouse_wheel',array(), $id);
			    $pause_play =  rwmb_meta('_gx_flexslider_pause_play',array(), $id); 
			    $randomize =  rwmb_meta('_gx_flexslider_randomize',array(), $id);
			    $animation_loop =  rwmb_meta('_gx_flexslider_animation_loop',array(), $id);
			    $pause_on_action =  rwmb_meta('_gx_flexslider_pause_on_action',array(), $id);
			    $pause_on_hover =  rwmb_meta('_gx_flexslider_pause_on_hover',array(), $id);
			    $play_text =  rwmb_meta('_gx_flexslider_play_text',array(), $id); 
			    $pause_text =  rwmb_meta('_gx_flexslider_pause_text',array(), $id);
			    $prev_text =  rwmb_meta('_gx_flexslider_prev_text',array(), $id);
			    $next_text =  rwmb_meta('_gx_flexslider_next_text',array(), $id);

                $carousel_status = rwmb_meta('_gx_flexslider_carousel',array(), $id);
			    $carousel_width =  rwmb_meta('_gx_flexslider_item_width',array(), $id);
			    $carousel_height =  rwmb_meta('_gx_flexslider_item_margin',array(), $id);  ?>

				<script type="text/javascript">
					jQuery(document).ready(function($){ 
						$('<?php echo '.flexid-'.$id; ?>')  
						.fitVids({ customSelector: "iframe[src^='http']"})
						.flexslider({  
							animation: '<?php echo !empty( $animation ) ? $animation : 'fade';?>',
							slideshowSpeed: <?php echo !empty( $slide_show_speed ) ? $slide_show_speed : '7000'; ?>,
							animationSpeed: <?php echo !empty( $animation_speed ) ? $animation_speed : '600'; ?>,
							slideshow: <?php echo !empty( $slider_show ) ? 'true' : 'false'; ?>,
							smoothHeight: <?php echo !empty( $smooth_height ) ? 'true' : 'false'; ?>,
							directionNav: <?php echo !empty( $direction_nav ) ? 'true' : 'false'; ?>,
							controlNav: <?php echo !empty( $control_nav ) ? 'true' : 'false'; ?>,
							multipleKeyboard: <?php echo !empty( $multiple_keyboard ) ? 'true' : 'false'; ?>,
							mousewheel: <?php echo !empty( $multiple_wheel ) ? 'true' : 'false'; ?>,
							pauseplay: <?php echo !empty( $pause_play ) ? 'true' : 'false'; ?>,
							randomize: <?php echo !empty( $randomize ) ? 'true' : 'false'; ?>,
							animationLoop: <?php echo !empty( $animation_loop ) ? 'true' : 'false'; ?>,
							pauseOnAction: <?php echo !empty( $pause_on_action ) ? 'true': 'false'; ?>,
							pauseOnHover: <?php echo !empty( $pause_on_hover ) ? 'true' : 'false'; ?>,
							prevText: "<?php echo isset( $play_text ) ? $play_text : 'Previous'; ?>",
							nextText: "<?php echo isset( $pause_text ) ? $pause_text : 'Next'; ?>",
							playText: "<?php echo isset( $prev_text ) ? $prev_text : 'Play'; ?>",   
							pauseText: "<?php echo isset( $next_text ) ? $next_text : 'Pause';?>",
							<?php if($carousel_status): ?>
							    direction: 'horizontal',
								itemWidth: <?php echo !empty($carousel_width) ? $carousel_width : 0; ?>,
								itemMargin: <?php echo !empty($carousel_height) ? $carousel_height : 0;?>, 
						    <?php else: ?>
						        direction: '<?php echo !empty( $slide_direction ) ? $slide_direction : 'horizontal'; ?>',
						    <?php endif; ?>

						});     
				
					});
			    </script><?php 
			    // Caption Settings  
                  $custom_caption_status = rwmb_meta('_gx_flexslider_custom_caption',array(), $id);
                  $custom_caption = rwmb_meta('_gx_flexslider_caption_custom_settings',array(), $id);
	              if( $custom_caption_status ) {
		              	$caption_bg = ! empty($custom_caption['_gx_flexslider_caption_bg']) ? $custom_caption['_gx_flexslider_caption_bg'] : '';
		              	$caption_color = ! empty($custom_caption['_gx_flexslider_caption_color'] ) ? $custom_caption['_gx_flexslider_caption_color'] : '';
		              	$caption_align = ! empty($custom_caption['_gx_flexslider_caption_alignment'] ) ? $custom_caption['_gx_flexslider_caption_alignment'] : '';
		              	$caption_transform = ! empty($custom_caption['_gx_flexslider_caption_transform'] ) ? $custom_caption['_gx_flexslider_caption_transform'] : '';
		              	$caption_width = ! empty($custom_caption['_gx_flexslider_caption_width'] ) ? $custom_caption['_gx_flexslider_caption_width'] : '';
		              	$caption_horizontal_position = ! empty($custom_caption['_gx_flexslider_caption_horizontal_position'] ) ? $custom_caption['_gx_flexslider_caption_horizontal_position'] : '';
		              	$caption_vertical_position = ! empty($custom_caption['_gx_flexslider_caption_vertical_position'] ) ? $custom_caption['_gx_flexslider_caption_vertical_position'] : '';
	              } 
                ?>

	             <?php
	             /* css style  */
	            $styles = array(); 
				$styles[] = ! empty( $caption_bg ) ? 'background-color: ' . $caption_bg . ';' : '';
				$styles[] = ! empty( $caption_color ) ? 'color: ' . $caption_color . ';' : '';
				$styles[] = ! empty( $caption_align ) ? 'text-align: ' . $caption_align . ';' : '';
				$styles[] = ! empty( $caption_transform ) ? 'text-transform: ' . $caption_transform . ';' : '';
				$styles[] = ! empty( $caption_width ) ? 'width: ' . $caption_width . '%;' : '100%';
				$styles[] = ! empty( $caption_horizontal_position ) ? 'left: ' . $caption_horizontal_position . '%;' : '';
				$styles[] = ! empty( $caption_vertical_position ) ? 'bottom: ' . $caption_vertical_position . '%;' : '';

				        
				$carousel_class = $carousel_status ? 'flex-carousel' : ''; 

					$output .= '<div class="flex-container '. $carousel_class .'">';	  
					$output .= '<div class="flexslider flexid-'. $id .'">';  

					$output .= '<ul class="slides">';       

					foreach ( $slides as $slide ) {     
						if( 'image' === $slide['_gx_flexslider_type'] ) { 
							$image_id = isset($slide['_gx_flexslider_image'][0]) ? $slide['_gx_flexslider_image'][0] : array();
							$image = RWMB_Image_Field::file_info( $image_id, array( 'size' => 'full' ) );
							if( ! empty($image) ) {
								$output .= '<li><div class="flex-image">';
								$output .= '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">';
								$output .= '</div>';
								if( !empty($slide['_gx_flexslider_caption']) ) {
								    $output .= '<div class="flex-caption" style="'. implode(' ', $styles) .'">' . $slide['_gx_flexslider_caption']. '</div>';
								}
								$output .= '</li>'; 
							}
						}elseif( 'map' === $slide['_gx_flexslider_type']) {  
							$output .= '<li>'; 
						    $map_type = isset($slide['_gx_flexslider_map_type']) ? $slide['_gx_flexslider_map_type']: ''; 
						    if( $map_type == 'iframe') {
                               $map_iframe = isset($slide['_gx_flexslider_map_embed']) ? $slide['_gx_flexslider_map_embed']: '';
						       $output .= $map_iframe;
						    }else{  
	                            $map_address = isset($slide['_gx_flexslider_address']) ? $slide['_gx_flexslider_address']: '';
							    $api = isset($slide['_gx_flexslider_map_api']) ? $slide['_gx_flexslider_map_api']: '';  
								$output .= '<iframe width="100%" height="450" src="https://www.google.com/maps/embed/v1/place?q='. $map_address .'&key='. $api .'" allowfullscreen></iframe>';
						    }  
							$output .= '</li>';    
						}else {      
							$video_url = isset($slide['_gx_flexslider_video']) ? $slide['_gx_flexslider_video'] : '';
							//echo $video_url;
							parse_str( parse_url( $video_url, PHP_URL_QUERY ), $query_vars );
							$video_url = isset($query_vars['v']) ? 'https://www.youtube.com/embed/' . $query_vars['v']: $video_url;

							if( ! empty( $video_url) ) {
								$output .= '<li><div class="flex-image">';
								$output .= '<iframe width="560" height="315" src="' . $video_url . '" frameborder="0" allowfullscreen></iframe>';
								$output .= '</div>';
								if( !empty($slide['_gx_flexslider_caption']) ) {
									$output .= '<div class="flex-caption">' . $slide['_gx_flexslider_caption']. '</div>';
								}
								$output .= '</li>'; 
							}
						} 
						
					}
				}

				$output .= '</ul>';
				$output .= '</div>';
				$output .= '</div>';
				return $output;
		}
  
	    /* Elastic Slider */
		public function elastic_slider( $atts, $content = null ) {
			extract( shortcode_atts( array(
				'id' => ''
			), $atts ) );

            $output = '';
			$slides = rwmb_meta('_gx_elastic_slider_slide',array(), $id); 
			

			$output .= '<div id="ei-slider" class="ei-slider">';
				$output .= '<ul class="ei-slider-large">';
				if( is_array($slides) ) {
					foreach ( $slides as $slide ) {  
						$image_id = isset($slide['_gx_elastic_slider_image'][0]) ? $slide['_gx_elastic_slider_image'][0] : array();
						$image = RWMB_Image_Field::file_info( $image_id, array( 'size' => 'full' ) );
						if( ! empty($image) ) {
							$output .= '<li>';
							$output .= '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">';
							$output .= '<div class="ei-title">';
							if( !empty($slide['_gx_elastic_slider_caption1']) ) {
							    $output .= '<h2>' . $slide['_gx_elastic_slider_caption1']  . '</h2>';
							}
							if( !empty($slide['_gx_elastic_slider_caption2']) ) {
							    $output .= '<h3>' . $slide['_gx_elastic_slider_caption2']  . '</h3>';
							}
							$output .= '</div>';
							$output .= '</li>';
						}
					}
				}

			    $output .= '</ul><!-- .ei-slider-large -->';

				$output .= '<ul class="ei-slider-thumbs">';
					$output .= '<li class="ei-slider-element">' . __('Current','beautify_pro_libra') . '</li>';
					    $count = 1;
					    if( is_array($slides) ) {
							foreach ( $slides as $slide ) {  
								$image_id = isset($slide['_gx_elastic_slider_image'][0]) ? $slide['_gx_elastic_slider_image'][0] : array();
								$image = RWMB_Image_Field::file_info( $image_id, array( 'size' => 'full' ) );
								if( ! empty($image) ) {
									$output .= '<li><a href="#">Slide '. $count .'</a>';
									$output .= '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">';
								    $output .= '</li>';
								} 
						    }
					    }
				$output .= '</ul><!-- .ei-slider-thumbs -->';
		    $output .= '</div><!-- .ei-slider -->';
		    return $output;
		}	


	}
}

