<?php
/**
   * Created by PhpStorm.
   * User: venkat
   * Date: 26/11/15
   * Time: 11:10 AM
   */
     
if ( ! class_exists('Fw_So_Row_Widget_Style')) {

    class Fw_So_Row_Widget_Style {   

        /* Widget */   

        public function gx_fw_panels_widget_style_fields($fields) {
            /* styling group field  */
              /* Background Group */
                $fields['background'] = array(
                  'name' => __('Background Color', 'framework'),
                  'type' => 'color',
                  'group' => 'background',
                  'description' => __('Background color of the widget.', 'framework'),
                  'priority' => 6,
                );

                $fields['background_image_attachment'] = array(
                  'name' => __('Background Image', 'framework'),
                  'type' => 'image',
                  'group' => 'background',
                  'description' => __('Background image of the widget.', 'framework'),
                  'priority' => 7,
                );

                $fields['background_display'] = array(
                  'name' => __('Background Mode', 'framework'),
                  'type' => 'select',
                  'group' => 'background',
                  'options' => array(
                    'repeat' => __('Repeat', 'framework'),
                    'no-repeat' => __('No Repeat', 'framework'),
                    'repeat-x' => __('Repeat Horizontally', 'framework'),
                    'repeat-y' => __('Repeat Vertically', 'framework'),
                    'parallax' => __('Parallax', 'framework'),
                    'parallax-original' => __('Parallax (Original Size)', 'framework'),
                  ),
                  'priority' => 8,
                );

                $fields['background_size'] = array(
                  'name' => __('Background Size', 'framework'),
                  'type' => 'select',
                  'group' => 'background',
                  'options' => array(
                     '' => __(' ', 'framework'),
                    'cover'  => __( 'Cover', 'framework' ),
                    'contain' => __( 'Contain', 'framework' ),
                    'auto'  => __( 'Auto', 'framework' ),
                    'inherit'  => __( 'Inherit', 'framework' ),
                  ),
                  'priority' => 8,
                );

                $fields['background_position'] = array(
                  'name' => __('Background Position', 'framework'),
                  'type' => 'select', 
                  'group' => 'background',
                  'options' => array(
                     '' => __(' ', 'framework'),
                    'center top' => __('Center Top', 'framework'),
                    'center center' => __('Center Center', 'framework'),
                    'center bottom' => __('Center Bottom', 'framework'),
                    'left top' => __('Left Top', 'framework'),
                    'left center' => __('Left Center', 'framework'),
                    'left bottom' => __('Left Bottom', 'framework'),
                    'right top' => __('Right Top', 'framework'),
                    'right center' => __('Right Center', 'framework'),
                    'right bottom' => __('Right Bottom', 'framework'),
                  ),
                  'priority' => 8,
                );

                $fields['background_attachment'] = array(
                  'name' => __('Background  Attachment', 'framework'),
                  'type' => 'select',
                  'group' => 'background',
                  'options' => array(
                     '' => __(' ', 'framework'),
                      'scroll' => __('Scroll', 'framework'),
                      'fixed' => __('Fixed', 'framework'),
                  ),
                 // 'priority' => 7,
                );

            /* Font Group */

                $gx_fw_google_fonts = Kirki_Fonts::get_all_fonts();
                $gx_fw_google_font = array( '' => '' );           
                foreach ($gx_fw_google_fonts as $key => $value) {
                  $gx_fw_google_font[$key] = $key; 
                }  
                /* Heading Font */
                 $fields['heading_font_family'] = array(
                  'name' => __('Heading Font Family', 'framework'),
                  'type' => 'select',
                  'group' => 'heading_font', 
                  'options' => $gx_fw_google_font,
                  'description' => __('Heading Font family of text inside this widget.', 'framework'),
                  'priority' => 9,
                ); 

                $fields['heading_font_color'] = array(
                  'name' => __('Heading Font Color', 'framework'),
                  'type' => 'color',
                  'group' => 'heading_font',
                  'description' => __('Heading Color of text inside this widget.', 'framework'),
                  'priority' => 10,
                ); 

                $fields['heading_text_align'] = array(
                  'name' => __('Heading Text Align', 'framework'),
                  'type' => 'select',
                  'group' => 'heading_font',
                  'options' => array(
                    '' => __(' ', 'framework'),
                    'inherit' => __('Default', 'framework'),
                    'left' => __('Left', 'framework'),
                    'center' => __('Center', 'framework'),
                    'right' => __('Right', 'framework'),
                    'justify' => __('Justify', 'framework'),
                  ),
                  'priority' => 15,
                );

                /* Font  Group (Running) */
                $fields['font_family'] = array(
                  'name' => __('Font Family', 'framework'),
                  'type' => 'select',
                  'group' => 'font', 
                  'options' => $gx_fw_google_font,
                  'description' => __('Font family of text inside this widget.', 'framework'),
                  'priority' => 9,
                ); 

                $fields['font_color'] = array(
                  'name' => __('Font Color', 'framework'),
                  'type' => 'color',
                  'group' => 'font',
                  'description' => __('Color of text inside this widget.', 'framework'),
                  'priority' => 10,
                ); 
                $fields['font_size'] = array(
                  'name' => __('Font Size', 'framework'),
                  'type' => 'measurement',
                  'group' => 'font',
                  'priority' => 15,
                );

                $fields['line_height'] = array(
                  'name' => __('Line Height', 'framework'),
                  'type' => 'measurement',
                  'group' => 'font',
                  'priority' => 15,
                );

                $fields['text_align'] = array(
                  'name' => __('Text Align', 'framework'),
                  'type' => 'select',
                  'group' => 'font',
                  'options' => array(
                    '' => __(' ', 'framework'),
                    'inherit' => __('Default', 'framework'),
                    'left' => __('Left', 'framework'),
                    'center' => __('Center', 'framework'),
                    'right' => __('Right', 'framework'),
                    'justify' => __('Justify', 'framework'),
                  ),
                  'priority' => 15,
                );

              /* Link group */ 

                $fields['link_color'] = array(
                  'name' => __('Links Color', 'framework'),
                  'type' => 'color',
                  'group' => 'link',
                  'description' => __('Color of links inside this widget.', 'framework'),
                  'priority' => 14,
                );
                $fields['link_hover_color'] = array(
                  'name' => __('Links Hover Color', 'framework'),
                  'type' => 'color',
                  'group' => 'link',
                  'description' => __('Links hover color inside this widget.', 'framework'),
                  'priority' => 15,
                );
                $fields['link_text_decoration'] = array(
                    'name' => __('Text Decoration', 'framework'),
                    'type' => 'select',
                    'group' => 'link',
                    'options' => array(
                      '' => '',
                      'none' => __('None', 'framework'),
                      'underline' => __('Underline', 'framework'),
                      'overline' => __('Overline', 'framework'),
                      'line-through' => __('Line through', 'framework'),
                    ),
                    'priority' => 16,
                );

            /* Border Group */

                $fields['border_color'] = array(
                  'name' => __('Border Color', 'framework'),
                  'type' => 'color',
                  'group' => 'border',
                  'description' => __('Border color of the widget.', 'framework'),
                  'priority' => 10,
                );

                $fields['border_width'] = array(
                  'name' => __('Border Width', 'framework'),
                  'type' => 'measurement',
                  'group' => 'border',
                  'priority' => 15,
                  'multiple' => true,
                );

                $fields['border_style'] = array(
                  'name' => __('Border Style', 'framework'),
                  'type' => 'select',
                  'group' => 'border',
                  'options' => array(
                     '' => __(' ', 'framework'),
                    'solid' => __('Solid', 'framework'),
                    'dashed' => __('Dashed', 'framework'),
                    'dotted' => __('Dotted', 'framework'),
                    'double' => __('Double', 'framework'),
                  ),
                  'priority' => 16,
                );

                $fields['border_radius'] = array(
                  'name' => __('Border Radius', 'framework'),
                  'type' => 'measurement',
                  'group' => 'border',
                  'priority' => 16,
                  'multiple' => true,
                );

            /* Box Model */
                $fields['margin'] = array(
                    'name' => __('Margin', 'framework'),
                    'type' => 'measurement',
                    'group' => 'box-model',
                    'description' => sprintf( __('Margin around the entire Widget. Margin Bottom Default is %spx.(Space below the row.)', 'framework'), siteorigin_panels_setting( 'margin-bottom' ) ),
                    'priority' => 9,
                    'multiple' => true  
                );
               
                $fields['padding'] = array(
                  'name' => __('Padding', 'framework'),
                  'type' => 'measurement',
                  'group' => 'box-model',
                  'description' => __('Padding around the entire widget.', 'framework'),
                  'priority' => 9,
                  'multiple' => true
                );

            /* design group */ 

                $fields['class'] = array(
                  'name' => __('Additional CSS Class', 'framework'),
                  'type' => 'text',
                  'group' => 'design',
                  'description' => __('Add additional CSS class(es) for custom styling', 'framework'),
                 // 'priority' => 5,
                );

                /* Animation group field */
                $animation_name = array(
                    '' => __(' --- Default --- ', 'framework'),
                    'fadeInUpBig-animation' => __('fadeInUpBig-animation','framework' ),
                    'bigEntrance-animation' => __('bigEntrance-animation','framework' ),
                    'boingInUp-animation' => __('boingInUp-animation','framework' ),
                    'bounce-animation' => __('bounce-animation','framework' ),
                    'bounceInLeft-animation' => __('bounceInLeft-animation','framework' ),
                    'bounceInRight-animation' => __('bounceInRight-animation','framework' ),
                    'bounceInUp-animation' => __('bounceInUp-animation','framework' ),
                    'expandUp-animation' => __('expandUp-animation','framework' ),
                    'fade-animation' => __('fade-animation','framework' ),
                    'fadeIn-animation' => __('fadeIn-animation','framework' ),
                    'fadeInDown-animation' => __('fadeInDown-animation','framework' ),
                    'fadeInDownBig-animation' => __('fadeInDownBig-animation','framework' ),
                    'fadeInLeft-animation' => __('fadeInLeft-animation','framework' ),
                    'fadeInLeftBig-animation' => __('fadeInLeftBig-animation','framework' ),
                    'fadeInRight-animation' => __('fadeInRight-animation','framework' ),
                    'fadeInRightBig-animation' => __('fadeInRightBig-animation','framework' ),
                    'fadeInUp-animation' => __('fadeInUp-animation','framework' ),
                    'fadeInUpBig-animation' => __('fadeInUpBig-animation','framework' ),
                    'flip-animation' => __('flip-animation','framework' ),
                    'flipInX-animation' => __('flipInX-animation','framework' ),
                    'flipInY-animation' => __('flipInY-animation','framework' ),
                    'floating-animation' => __('floating-animation','framework' ),
                    'foolishIn-animation' => __('foolishIn-animation','framework' ),
                    'hatch-animation' => __('hatch-animation','framework' ),
                    'lightSpeedIn-animation' => __('lightSpeedIn-animation','framework' ),
                    'puffIn-animation' => __('puffIn-animation','framework' ),
                    'pullDown-animation' => __('pullDown-animation','framework' ),
                    'pullUp-animation' => __('pullUp-animation','framework' ),
                    'pulse-animation' => __('pulse-animation','framework' ),
                    'rollInLeft-animation' => __('rollInLeft-animation','framework' ),
                    'rollInRight-animation' => __('rollInRight-animation','framework' ),
                    'rotateIn-animation' => __('rotateIn-animation','framework' ),
                    'rotateInDownLeft-animation' => __('rotateInDownLeft-animation','framework' ),
                    'rotateInDownRight-animation' => __('rotateInDownRight-animation','framework' ),
                    'rotateInUpLeft-animation' => __('rotateInUpLeft-animation','framework' ),
                    'rotateInUpRight-animation' => __('rotateInUpRight-animation','framework' ),
                    'scale-down-animation' => __('scale-down-animation','framework' ),
                    'scale-up-animation' => __('scale-up-animation','framework' ),
                    'slide-bottom-animation' => __('slide-bottom-animation','framework' ),
                    'slide-left-animation' => __('slide-left-animation','framework' ),
                    'slide-right-animation' => __('slide-right-animation','framework' ),
                    'slide-top-animation' => __('slide-top-animation','framework' ),
                    'slideDown-animation' => __('slideDown-animation','framework' ),
                    'slideExpandUp-animation' => __('slideExpandUp-animation','framework' ),
                    'slideInDown-animation' => __('slideInDown-animation','framework' ),
                    'slideInLeft-animation' => __('bouslideInLeft-animation','framework' ),
                    'slideInRight-animation' => __('slideInRight-animation','framework' ),
                    'slideLeft-animation' => __('slideLeft-animation','framework' ),
                    'slideRight-animation' => __('slideRight-animation','framework' ),
                    'slideUp-animation' => __('slideUp-animation','framework' ),
                    'spaceInDown-animation' => __('spaceInDown-animation','framework' ),
                    'spaceInLeft-animation' => __('spaceInLeft-animation','framework' ),
                    'spaceInRight-animation' => __('spaceInRight-animation','framework' ), 
                    'spaceInUp-animation'  => __('spaceInUp-animation','framework' ),
                    'stretchLeft-animation' => __('stretchLeft-animation','framework' ), 
                    'stretchRight-animation'  => __('stretchRight-animation','framework' ),
                    'swap-animation'  => __('swap-animation','framework' ),
                    'swashIn-animation'  => __('swashIn-animation','framework' ),
                    'swing-animation'  => __('swing-animation','framework' ),
                    'tinDownIn-animation' => __('tinDownIn-animation','framework' ), 
                    'tinRightIn-animation'  => __('tinRightIn-animation','framework' ),
                    'tinUpIn-animation' => __('tinUpIn-animation','framework' ), 
                    'tossing-animation'  => __('tossing-animation','framework' ),
                    'twisterInDown-animation'  => __('twisterInDown-animation','framework' ),
                    'twisterInUp-animation' => __('twisterInUp-animation','framework' ), 
                    'wobble-animation' => __('wobble-animation','framework' ),
                    'zoomIn-animation' => __('zoomIn-animation','framework' ),
                );
                $fields['animation_class'] = array(
                      'name' => __('Animation Class', 'framework'),
                      'type' => 'select',
                      'group' => 'animation',
                      'options' => $animation_name,
                );

             /* Miscellaneous group */

                $fields['widget_css'] = array(
                  'name' => __('CSS Styles', 'framework'),
                  'type' => 'code',
                  'group' => 'miscellaneous',
                  'description' => __('One style attribute per line.', 'framework'),
                  'priority' => 10,
                );

                return $fields;
        }

        public function gx_fw_panels_panels_widget_style_attributes( $attributes, $args ) {
           /* class add */
            if( !empty( $args['animation_class'] ) ) {
              $attributes['class'][] =  $args['animation_class']; 
            }

            if( !empty( $args['class'] ) ) {
              $attributes['class'] = array_merge( $attributes['class'], explode(' ', $args['class']) );
            }

            $args = apply_filters( 'gx_siteorigin_panels_widget_style_attributes_css', array(),$args );


            /* css style */
            if( empty($attributes['style']) ) $attributes['style'] = '';
            
            if( !empty( $args['font_size'] ) ) {  
              $attributes['style'] .= 'font-size: '. esc_attr($args['font_size']) .'; ';
            }
            if( !empty( $args['line_height'] ) ) {  
              $attributes['style'] .= 'line-height: '. esc_attr($args['line_height']) .'; ';
            }
            if( !empty( $args['text_align'] ) ) {  
              $attributes['style'] .= 'text-align: '. $args['text_align'] .'; ';
            }
            if( !empty( $args['border_width'] ) ) {  
              $attributes['style'] .= 'border-width: '. esc_attr($args['border_width']) .'; ';
            }
            if( !empty( $args['border_style'] ) ) {  
              $attributes['style'] .= 'border-style: '. $args['border_style'] .'; ';
            }
            if( !empty( $args['border_radius'] ) ) {  
              $attributes['style'] .= 'border-radius: '. $args['border_radius'] .'; ';
            }
            if( !empty( $args['background_size'] ) ) {  
              $attributes['style'] .= 'background-size: '. $args['background_size'] .'; ';
            }
            if( !empty( $args['background_position'] ) ) {  
              $attributes['style'] .= 'background-position: '. $args['background_position'] .'; ';
            }
            if( !empty( $args['background_attachment'] ) ) {  
              $attributes['style'] .= 'background-attachment: '. $args['background_attachment'] .'; ';
            }
            if( !empty( $args['background_display'] ) && !empty( $args['background_image_attachment'] ) ) {
              if( $args['background_display'] == 'parallax' || $args['background_display'] == 'parallax-original' ) {
                wp_enqueue_script('siteorigin-panels-front-styles');
              }

              $url = wp_get_attachment_image_src( $args['background_image_attachment'], 'full' );

              if( !empty($url) ) {

                if( $args['background_display'] == 'parallax' || $args['background_display'] == 'parallax-original' ) {
                  wp_enqueue_script('siteorigin-parallax');
                  $parallax_args = array(
                    'backgroundUrl' => $url[0],
                    'backgroundSize' => array( $url[1], $url[2] ),
                    'backgroundSizing' => $args['background_display'] == 'parallax-original' ? 'original' : 'scaled',
                    'limitMotion' => siteorigin_panels_setting( 'parallax-motion' ) ? floatval( siteorigin_panels_setting( 'parallax-motion' ) ) : 'auto',
                  );
                  $attributes['data-siteorigin-parallax'] = json_encode( $parallax_args );
                  $attributes['style'] .= 'background-image: url(' . $url[0] . '); ';
                }else {
                  $attributes['style'] .= 'background-image: url(' . $url[0] . ');';
                  switch( $args['background_display'] ) {
                    case 'repeat':
                      $attributes['style'] .= 'background-repeat: repeat;';
                      break;
                    case 'no-repeat':
                      $attributes['style'] .= 'background-repeat: no-repeat;';
                      break;
                    case 'repeat-x':
                      $attributes['style'] .= 'background-repeat: repeat-x;';
                      break;
                    case 'repeat-y':
                      $attributes['style'] .= 'background-repeat: repeat-y;';
                      break;
                  }
                }
              }
            }
            if( !empty( $args['font_family'] ) && isset( $args['font_family'] ) ) {  
                // Check if we've got everything we need
                $url = '//fonts.googleapis.com/css?family=' . str_replace( ' ', '+', $args['font_family'] );
                $key = md5($args['font_family']);
                // check that the URL is valid. we're going to use transients to make this faster.
                $url_is_valid = get_transient( $key );
                if ( false === $url_is_valid ) { // transient does not exist
                  $response = wp_remote_get( 'https:' . $url );
                    if ( ! is_array( $response ) ) {
                      // the url was not properly formatted,
                      // cache for 12 hours and continue to the next field
                      set_transient( $key, null, 12 * HOUR_IN_SECONDS );
                      return;
                    }
                  // check the response headers.
                  if ( isset( $response['response'] ) && isset( $response['response']['code'] ) ) {
                    if ( 200 == $response['response']['code'] ) {
                      // URL was ok
                      // set transient to true and cache for a week
                      set_transient( $key, true, 7 * 24 * HOUR_IN_SECONDS );
                      $url_is_valid = true;
                    }
                  }
                }
                // If the font-link is valid, enqueue it.
                if ( $url_is_valid ) {
                  wp_enqueue_style( $key, $url, null, null ); 
                } 
                if( !empty( $args['font_family'] ) ) {  
                   $attributes['style'] .= 'font-family: '. $args['font_family'] .'; '; 
                }
            }
            if( !empty( $args['heading_font_family'] ) && isset( $args['heading_font_family'] ) ) {  
                // Check if we've got everything we need
                $url = '//fonts.googleapis.com/css?family=' . str_replace( ' ', '+', $args['heading_font_family'] );
                $key = md5($args['heading_font_family']);
                // check that the URL is valid. we're going to use transients to make this faster.
                $url_is_valid = get_transient( $key );
                if ( false === $url_is_valid ) { // transient does not exist
                  $response = wp_remote_get( 'https:' . $url );
                    if ( ! is_array( $response ) ) {
                      // the url was not properly formatted,
                      // cache for 12 hours and continue to the next field
                      set_transient( $key, null, 12 * HOUR_IN_SECONDS );
                      return;
                    }
                  // check the response headers.
                  if ( isset( $response['response'] ) && isset( $response['response']['code'] ) ) {
                    if ( 200 == $response['response']['code'] ) {
                      // URL was ok
                      // set transient to true and cache for a week
                      set_transient( $key, true, 7 * 24 * HOUR_IN_SECONDS );
                      $url_is_valid = true;
                    }
                  }
                }
                // If the font-link is valid, enqueue it.
                if ( $url_is_valid ) {
                  wp_enqueue_style( $key, $url, null, null ); 
                } 
                if( !empty( $args['heading_font_family'] ) ) {  
                   $attributes['style'] .= 'font-family: '. $args['heading_font_family'] .'; '; 
                }
            }
            return $attributes;
        }  

        public function gx_fw_widget_style_groups( $groups ) {
                  $groups = array(
                      'background' => array(
                        'name' => __('Background', 'framework'),
                        'priority' => 9,
                      ), 
                      'heading_font' => array(
                        'name' => __('Heading Font', 'framework'),
                        'priority' => 10,
                      ),
                      'font' => array(
                        'name' => __('Font', 'framework'),
                        'priority' => 10,
                      ),
                      'link' => array(
                        'name' => __('Link', 'framework'),
                        'priority' => 11,
                      ),
                      'box-model' => array(
                        'name' => __('Box Model', 'framework'),
                        'priority' => 12
                      ),
                      'border' => array(
                        'name' => __('Border', 'framework'),
                        'priority' => 13,
                      ),
                      'design' => array(
                        'name' => __('Custom CSS', 'framework'),
                        'priority' => 14,
                      ),
                      'animation' => array(
                        'name' => __('Animation', 'framework'),
                        'priority' => 15,
                      ),
                      'miscellaneous' => array(
                        'name' => __('Miscellaneous', 'framework'),
                        'priority' => 16,
                      ),
                  );
                  return $groups; 
        }

        /* Commin for widgets & Rows */

        public function gx_fw_css_object($css, $panels_data, $post_id) {  
         
          /* Row link color & text decoration */
            foreach ( $panels_data['grids'] as $gi => $grid ) {
              $grid['style'] = apply_filters( 'gx_siteorigin_panels_row_style_css', array(),$grid['style'] );
         
              $grid_id = !empty( $grid['style']['id'] ) ? (string) sanitize_html_class( $grid['style']['id'] ) : intval( $gi );
              if (!empty($grid['style']['link_text_decoration'])) {
                 $css->add_row_css($post_id, $grid_id, ' a', array(
                    'text-decoration' => $grid['style']['link_text_decoration']
                ));   
              }  
              if (!empty($grid['style']['link_color'])) {  
                 $css->add_row_css($post_id, $grid_id, ' a', array(
                    'color' => $grid['style']['link_color']
                ));
              }
              if (!empty($grid['style']['link_hover_color'])) {
                 $css->add_row_css($post_id, $grid_id, ' a:hover', array(
                    'color' => $grid['style']['link_hover_color']
                ));
              }
                 /* Row Heading Font */
               for ($i=1; $i < 7; $i++) { 
                  if (!empty($grid['style']['heading_font_color'])) {
                    $css->add_row_css($post_id, $grid_id, " h{$i}", array(
                      'color' => $grid['style']['heading_font_color']
                    ));    
                  }
                  if (!empty($grid['style']['heading_font_family'])) {
                      $css->add_row_css($post_id, $grid_id, " h{$i}", array(
                        'font-family' => $grid['style']['heading_font_family']
                      ));    
                  }
                  if (!empty($grid['style']['heading_text_align'])) {
                      $css->add_row_css($post_id, $grid_id, " h{$i}", array(
                        'text-align' => $grid['style']['heading_text_align']
                      ));    
                  }
               }

               // Add the bottom margin to any grids that aren't the last
               $settings = siteorigin_panels_setting();
               $panels_margin_bottom = $settings['margin-bottom'];
               $panels_margin_bottom_last_row = $settings['margin-bottom-last-row'];
              if(!empty($grid['style']['bottom_margin']) ) {
                if($gi != count($panels_data['grids'])-1  || !empty($panels_margin_bottom_last_row)) {
                  // Filter the bottom margin for this row with the arguments
                  $css->add_row_css($post_id, $grid_id, '', array(
                    'margin' => apply_filters('siteorigin_panels_css_row_margin_bottom', $panels_margin_bottom.'px', $grid, $gi, $panels_data, $post_id)
                  ));
                }
              }else{
                  $css->add_row_css($post_id, $grid_id, '', array(
                    'margin-bottom' => apply_filters('siteorigin_panels_css_row_margin_bottom', $panels_margin_bottom.'px', $grid, $gi, $panels_data, $post_id)
                  ));
              }
              
            }  
            
            /* Compatibility for cell index value */
            if ( ! empty( $panels_data['widgets'] ) && is_array( $panels_data['widgets'] ) ) {
                $last_gi = 0;
                $last_ci = 0;
                $last_wi = 0;

                foreach ( $panels_data['widgets'] as &$widget ) {
                  // Transfer legacy content
                  if ( empty( $widget['panels_info'] ) && ! empty( $widget['info'] ) ) {
                    $widget['panels_info'] = $widget['info'];
                    unset( $widget['info'] );
                  }

                  // Filter the widgets to add indexes
                  if ( $widget['panels_info']['grid'] != $last_gi ) {
                    $last_gi = $widget['panels_info']['grid'];
                    $last_ci = $widget['panels_info']['cell'];
                    $last_wi = 0;
                  } elseif ( $widget['panels_info']['cell'] != $last_ci ) {
                    $last_ci = $widget['panels_info']['cell'];
                    $last_wi = 0;
                  }
                  $widget['panels_info']['cell_index'] = $last_wi ++;
                }
            }
            // echo '<pre>',print_r($panels_data),'</pre>';


          /* Widget text decoration */
            foreach ($panels_data['widgets'] as $widget_id => $widget) {  

              $widget['panels_info']['style'] = apply_filters( 'gx_siteorigin_panels_widget_style_css', array(),$widget['panels_info']['style'] );

             // echo "<pre>", print_r($widget['panels_info']),"</pre>";
              if (!empty($widget['panels_info']['style']['link_text_decoration']) ) {

                $selector = '#pg-'. $post_id . '-' . $widget['panels_info']['grid'] .' #panel-' . $post_id . '-' . $widget['panels_info']['grid'] . '-' . $widget['panels_info']['cell'] . '-' . $widget['panels_info']['cell_index'] . ' a';
                $css->add_css( $selector, array(
                  'text-decoration' => $widget['panels_info']['style']['link_text_decoration']
                ) );
              }
              if (!empty($widget['panels_info']['style']['link_color']) ) {
                $selector = '#pg-'. $post_id . '-' . $widget['panels_info']['grid'] .' #panel-' . $post_id . '-' . $widget['panels_info']['grid'] . '-' . $widget['panels_info']['cell'] . '-' . $widget['panels_info']['cell_index'] . ' a';
                $css->add_css( $selector, array(
                  'color' => $widget['panels_info']['style']['link_color'] 
                ) );
              }  
              if (!empty($widget['panels_info']['style']['link_hover_color']) ) {
                $selector = '#pg-'. $post_id . '-' . $widget['panels_info']['grid'] .' #panel-' . $post_id . '-' . $widget['panels_info']['grid'] . '-' . $widget['panels_info']['cell'] . '-' . $widget['panels_info']['cell_index'] . ' a:hover';
                $css->add_css( $selector, array(
                  'color' => $widget['panels_info']['style']['link_hover_color']
                ) );
              }
              
              /* widget heading font */
              for ($i=1; $i < 7; $i++) { 
                  if (!empty($widget['panels_info']['style']['heading_font_color']) ) {
                    $selector = '#pg-'. $post_id . '-' . $widget['panels_info']['grid'] .' #panel-' . $post_id . '-' . $widget['panels_info']['grid'] . '-' . $widget['panels_info']['cell'] . '-' . $widget['panels_info']['cell_index'] . " h{$i}";
                    $css->add_css( $selector, array(
                      'color' => $widget['panels_info']['style']['heading_font_color']
                    ) );
                  }
                  if (!empty($widget['panels_info']['style']['heading_font_family']) ) {
                    $selector = '#pg-'. $post_id . '-' . $widget['panels_info']['grid'] .' #panel-' . $post_id . '-' . $widget['panels_info']['grid'] . '-' . $widget['panels_info']['cell'] . '-' . $widget['panels_info']['cell_index'] . " h{$i}";
                    $css->add_css( $selector, array(
                      'font-family' => $widget['panels_info']['style']['heading_font_family']
                    ) );
                  }
                  if (!empty($widget['panels_info']['style']['heading_text_align']) ) {
                    $selector = '#pg-'. $post_id . '-' . $widget['panels_info']['grid'] .' #panel-' . $post_id . '-' . $widget['panels_info']['grid'] . '-' . $widget['panels_info']['cell'] . '-' . $widget['panels_info']['cell_index'] . " h{$i}";
                    $css->add_css( $selector, array(
                      'text-align' => $widget['panels_info']['style']['heading_text_align']
                    ) );
                  }
              }  

              /* Bottom margin for widgets */  

               $settings = siteorigin_panels_setting(); 
               $panels_margin_bottom = $settings['margin-bottom']/3; 

             
                     
                if( !empty($widget['panels_info']['style']['margin']) ) {  
                    $selector = '#pl-' . $post_id . ' #panel-' . $post_id . '-' . $widget['panels_info']['grid'] . '-' . $widget['panels_info']['cell'] . '-' . $widget['panels_info']['cell_index'];
                    $css->add_css($selector, array( 
                      'margin' => $widget['panels_info']['style']['margin']
                    ));  
                }else{
                    $selector = '#pl-' . $post_id . ' #panel-' . $post_id . '-' . $widget['panels_info']['grid'] . '-' . $widget['panels_info']['cell'] . '-' . $widget['panels_info']['cell_index'];
                    $css->add_css($selector, array( 
                      'margin-bottom' => $panels_margin_bottom.'px'  
                    ));
                }
                $selector = '#pl-' . $post_id . ' #pg-' .$post_id . '-' . $widget['panels_info']['grid'] . ' #pgc-' . $post_id . '-' . $widget['panels_info']['grid'] . '-' . $widget['panels_info']['cell'] . ' .so-panel:last-child';
                  $css->add_css($selector, array( 
                    'margin-bottom' => '0px' 
                  ));
            }

            return $css;
        }

        /* Rows */ 

        public function gx_fw_panels_row_style_fields($fields) {  
            
              /* Row Layout group */
                $fields['row_stretch'] = array(       
                  'name' => __('Row Layout', 'framework'),
                  'type' => 'select',
                  'group' => 'row_layout',
                  'options' => array(
                    '' => __('Standard', 'framework'),
                    'full' => __('Full Width', 'framework'),
                    'full-stretched' => __('Full Width Stretched', 'framework')
                  ),
                  'priority' => 10,
                );

                $fields['collapse_order'] = array(
                  'name' => __('Collapse Order', 'framework'),
                  'type' => 'select',
                  'group' => 'row_layout',
                  'options' => array(
                    '' => __('Default', 'framework'),
                    'left-top' => __('Left on Top', 'framework'),
                    'right-top' => __('Right on Top', 'framework'),
                  ),
                  'description' => __('Collapse order of cells in Responsive mode', 'framework'),
                  'priority' => 11,
                );
                   
                $fields['class'] = array(
                  'name' => __('Row Class', 'framework'),
                  'type' => 'text',
                  'group' => 'row_layout',
                  'description' => __('A CSS class', 'framework'),
                  'priority' => 12,
                );

                $fields['id'] = array(
                  'name' => __('Row Anchor', 'framework'),
                  'type' => 'text',
                  'group' => 'row_layout',
                  'description' => __('Example: enter &lsquo;about&rsquo; as row anchor and add &lsquo;#about&rsquo; link in navigation menu. When link is clicked, it will scroll to this row.', 'framework'),
                  'priority' => 13,
                );
              
              /* Background Group */
                $fields['background'] = array(
                  'name' => __('Background Color', 'framework'),
                  'type' => 'color',
                  'group' => 'background',
                  'description' => __('Background color of the Row.', 'framework'),
                  'priority' => 6,
                );

                $fields['background_image_attachment'] = array(
                  'name' => __('Background Image', 'framework'),
                  'type' => 'image',
                  'group' => 'background',
                  'description' => __('Background image of the Row.', 'framework'),
                  'priority' => 7,
                );

                $fields['background_display'] = array(
                  'name' => __('Background Mode', 'framework'),
                  'type' => 'select',
                  'group' => 'background',
                  'options' => array(
                    'repeat' => __('Repeat', 'framework'),
                    'no-repeat' => __('No Repeat', 'framework'),
                    'repeat-x' => __('Repeat Horizontally', 'framework'),
                    'repeat-y' => __('Repeat Vertically', 'framework'),
                    'parallax' => __('Parallax', 'framework'),
                    'parallax-original' => __('Parallax (Original Size)', 'framework'),
                  ),
                  'priority' => 8,
                );

                $fields['background_size'] = array(
                  'name' => __('Background Size', 'framework'),
                  'type' => 'select',
                  'group' => 'background',
                  'options' => array(
                     '' => __(' ', 'framework'),
                    'cover'  => __( 'Cover', 'framework' ),
                    'contain' => __( 'Contain', 'framework' ),
                    'auto'  => __( 'Auto', 'framework' ),
                    'inherit'  => __( 'Inherit', 'framework' ),
                  ),
                  'priority' => 8,
                );

                $fields['background_position'] = array(
                  'name' => __('Background Position', 'framework'),
                  'type' => 'select', 
                  'group' => 'background',
                  'options' => array(
                     '' => __(' ', 'framework'),
                    'center top' => __('Center Top', 'framework'),
                    'center center' => __('Center Center', 'framework'),
                    'center bottom' => __('Center Bottom', 'framework'),
                    'left top' => __('Left Top', 'framework'),
                    'left center' => __('Left Center', 'framework'),
                    'left bottom' => __('Left Bottom', 'framework'),
                    'right top' => __('Right Top', 'framework'),
                    'right center' => __('Right Center', 'framework'),
                    'right bottom' => __('Right Bottom', 'framework'),
                  ),
                  'priority' => 8,
                );

                $fields['background_attachment'] = array(
                  'name' => __('Background  Attachment', 'framework'),
                  'type' => 'select',
                  'group' => 'background',
                  'options' => array(
                     '' => __(' ', 'framework'),
                      'scroll' => __('Scroll', 'framework'),
                      'fixed' => __('Fixed', 'framework'),
                  ),
                 // 'priority' => 7,
                );

              /* Font Group */
              $gx_fw_google_fonts = Kirki_Fonts::get_all_fonts();
              $gx_fw_google_font = array( '' => '' );           
              foreach ($gx_fw_google_fonts as $key => $value) {
                $gx_fw_google_font[$key] = $key;
              } 

              /* Heading Font */
               $fields['heading_font_family'] = array(
                  'name' => __('Heading Font Family', 'framework'),
                  'type' => 'select',
                  'group' => 'heading_font',
                  'options' => $gx_fw_google_font,
                  'description' => __('Heading Font family of text inside this widget.', 'framework'),
                  'priority' => 9,
                );
                $fields['heading_font_color'] = array(
                  'name' => __('Heading Font Color', 'framework'),
                  'type' => 'color',
                  'group' => 'heading_font',
                  'description' => __('Heading Color of text inside this Row.', 'framework'),
                  'priority' => 10,
                );   

                $fields['heading_text_align'] = array(
                  'name' => __('Heading Text Align', 'framework'),
                  'type' => 'select',
                  'group' => 'heading_font',
                  'options' => array(
                     '' => __(' ', 'framework'),
                    'inherit' => __('Default', 'framework'),
                    'left' => __('Left', 'framework'),
                    'center' => __('Center', 'framework'),
                    'right' => __('Right', 'framework'),
                    'justify' => __('Justify', 'framework'),
                  ),
                  'priority' => 15,
                );

                /* Font group (running font) */

                $fields['font_family'] = array(
                  'name' => __('Font Family', 'framework'),
                  'type' => 'select',
                  'group' => 'font',
                  'options' => $gx_fw_google_font,
                  'description' => __('Font family of text inside this widget.', 'framework'),
                  'priority' => 9,
                );
                $fields['font_color'] = array(
                  'name' => __('Font Color', 'framework'),
                  'type' => 'color',
                  'group' => 'font',
                  'description' => __('Color of text inside this Row.', 'framework'),
                  'priority' => 10,
                );   

                 $fields['font_size'] = array(
                  'name' => __('Font Size', 'framework'),
                  'type' => 'measurement',
                  'group' => 'font',
                  'priority' => 15,
                );

                $fields['line_height'] = array(
                  'name' => __('Line Height', 'framework'),
                  'type' => 'measurement',
                  'group' => 'font',
                  'priority' => 15,
                );

                $fields['text_align'] = array(
                  'name' => __('Text Align', 'framework'),
                  'type' => 'select',
                  'group' => 'font',
                  'options' => array(
                     '' => __(' ', 'framework'),
                    'inherit' => __('Default', 'framework'),
                    'left' => __('Left', 'framework'),
                    'center' => __('Center', 'framework'),
                    'right' => __('Right', 'framework'),
                    'justify' => __('Justify', 'framework'),
                  ),
                  'priority' => 15,
                );

               /* Link group */ 

                $fields['link_color'] = array(
                  'name' => __('Links Color', 'framework'),
                  'type' => 'color',
                  'group' => 'link',
                  'description' => __('Color of links inside this Row.', 'framework'),
                  'priority' => 14,
                );
                $fields['link_hover_color'] = array(
                  'name' => __('Links Hover Color', 'framework'),
                  'type' => 'color',
                  'group' => 'link',
                  'description' => __('Links hover color inside this Row.', 'framework'),
                  'priority' => 15,
                );
                $fields['link_text_decoration'] = array(
                    'name' => __('Text Decoration', 'framework'),
                    'type' => 'select',
                    'group' => 'link',
                    'options' => array(
                      '' => '',
                      'none' => __('None', 'framework'),
                      'underline' => __('Underline', 'framework'),
                      'overline' => __('Overline', 'framework'),
                      'line-through' => __('Line through', 'framework'),
                    ),
                    'priority' => 16,
                );

               /* Border Group */

                $fields['border_color'] = array(
                  'name' => __('Border Color', 'framework'),
                  'type' => 'color',
                  'group' => 'border',
                  'description' => __('Border color of the Row.', 'framework'),
                  'priority' => 10,
                );

                $fields['border_width'] = array(
                  'name' => __('Border Width', 'framework'),
                  'type' => 'measurement',
                  'group' => 'border',
                  'priority' => 15,
                  'multiple' => true,
                );

                $fields['border_style'] = array(
                  'name' => __('Border Style', 'framework'),
                  'type' => 'select',
                  'group' => 'border',
                  'options' => array(
                     '' => __(' ', 'framework'),
                    'solid' => __('Solid', 'framework'),
                    'dashed' => __('Dashed', 'framework'),
                    'dotted' => __('Dotted', 'framework'),
                    'double' => __('Double', 'framework'),
                  ),
                  'priority' => 16,
                );  

                $fields['border_radius'] = array(
                  'name' => __('Border Radius', 'framework'),
                  'type' => 'measurement',
                  'group' => 'border',
                  'priority' => 16,
                  'multiple' => true,
                );

               /* Box Model */
                $fields['bottom_margin'] = array(   
                  'name' => __('Margin', 'framework'),
                  'type' => 'measurement',
                  'group' => 'box-model',
                  'description' => sprintf( __('Margin around the entire Row. Margin Bottom Default is %spx.(Space below the row.)', 'framework'), siteorigin_panels_setting( 'margin-bottom' ) ),
                  'priority' => 5,
                  'multiple' => true 
                );
                $fields['padding'] = array(
                  'name' => __('Padding', 'framework'),
                  'type' => 'measurement',
                  'group' => 'box-model',
                  'description' => __('Padding around the entire Row.', 'framework'),
                  'priority' => 8,
                  'multiple' => true
                );
               
                $fields['gutter'] = array(
                  'name' => __('Gutter', 'framework'),
                  'type' => 'measurement',
                  'group' => 'box-model',
                  'description' => sprintf( __('Amount of space between columns. Default is %spx.', 'framework'), siteorigin_panels_setting( 'margin-sides' ) ),
                  'priority' => 10,
                );

                /* Animation group field */

                $animation_name = array(
                    '' => __(' --- Default --- ', 'framework'),
                    'fadeInUpBig-animation' => __('fadeInUpBig-animation','framework' ),
                    'bigEntrance-animation' => __('bigEntrance-animation','framework' ),
                    'boingInUp-animation' => __('boingInUp-animation','framework' ),
                    'bounce-animation' => __('bounce-animation','framework' ),
                    'bounceInLeft-animation' => __('bounceInLeft-animation','framework' ),
                    'bounceInRight-animation' => __('bounceInRight-animation','framework' ),
                    'bounceInUp-animation' => __('bounceInUp-animation','framework' ),
                    'expandUp-animation' => __('expandUp-animation','framework' ),
                    'fade-animation' => __('fade-animation','framework' ),
                    'fadeIn-animation' => __('fadeIn-animation','framework' ),
                    'fadeInDown-animation' => __('fadeInDown-animation','framework' ),
                    'fadeInDownBig-animation' => __('fadeInDownBig-animation','framework' ),
                    'fadeInLeft-animation' => __('fadeInLeft-animation','framework' ),
                    'fadeInLeftBig-animation' => __('fadeInLeftBig-animation','framework' ),
                    'fadeInRight-animation' => __('fadeInRight-animation','framework' ),
                    'fadeInRightBig-animation' => __('fadeInRightBig-animation','framework' ),
                    'fadeInUp-animation' => __('fadeInUp-animation','framework' ),
                    'fadeInUpBig-animation' => __('fadeInUpBig-animation','framework' ),
                    'flip-animation' => __('flip-animation','framework' ),
                    'flipInX-animation' => __('flipInX-animation','framework' ),
                    'flipInY-animation' => __('flipInY-animation','framework' ),
                    'floating-animation' => __('floating-animation','framework' ),
                    'foolishIn-animation' => __('foolishIn-animation','framework' ),
                    'hatch-animation' => __('hatch-animation','framework' ),
                    'lightSpeedIn-animation' => __('lightSpeedIn-animation','framework' ),
                    'puffIn-animation' => __('puffIn-animation','framework' ),
                    'pullDown-animation' => __('pullDown-animation','framework' ),
                    'pullUp-animation' => __('pullUp-animation','framework' ),
                    'pulse-animation' => __('pulse-animation','framework' ),
                    'rollInLeft-animation' => __('rollInLeft-animation','framework' ),
                    'rollInRight-animation' => __('rollInRight-animation','framework' ),
                    'rotateIn-animation' => __('rotateIn-animation','framework' ),
                    'rotateInDownLeft-animation' => __('rotateInDownLeft-animation','framework' ),
                    'rotateInDownRight-animation' => __('rotateInDownRight-animation','framework' ),
                    'rotateInUpLeft-animation' => __('rotateInUpLeft-animation','framework' ),
                    'rotateInUpRight-animation' => __('rotateInUpRight-animation','framework' ),
                    'scale-down-animation' => __('scale-down-animation','framework' ),
                    'scale-up-animation' => __('scale-up-animation','framework' ),
                    'slide-bottom-animation' => __('slide-bottom-animation','framework' ),
                    'slide-left-animation' => __('slide-left-animation','framework' ),
                    'slide-right-animation' => __('slide-right-animation','framework' ),
                    'slide-top-animation' => __('slide-top-animation','framework' ),
                    'slideDown-animation' => __('slideDown-animation','framework' ),
                    'slideExpandUp-animation' => __('slideExpandUp-animation','framework' ),
                    'slideInDown-animation' => __('slideInDown-animation','framework' ),
                    'slideInLeft-animation' => __('bouslideInLeft-animation','framework' ),
                    'slideInRight-animation' => __('slideInRight-animation','framework' ),
                    'slideLeft-animation' => __('slideLeft-animation','framework' ),
                    'slideRight-animation' => __('slideRight-animation','framework' ),
                    'slideUp-animation' => __('slideUp-animation','framework' ),
                    'spaceInDown-animation' => __('spaceInDown-animation','framework' ),
                    'spaceInLeft-animation' => __('spaceInLeft-animation','framework' ),
                    'spaceInRight-animation' => __('spaceInRight-animation','framework' ), 
                    'spaceInUp-animation'  => __('spaceInUp-animation','framework' ),
                    'stretchLeft-animation' => __('stretchLeft-animation','framework' ), 
                    'stretchRight-animation'  => __('stretchRight-animation','framework' ),
                    'swap-animation'  => __('swap-animation','framework' ),
                    'swashIn-animation'  => __('swashIn-animation','framework' ),
                    'swing-animation'  => __('swing-animation','framework' ),
                    'tinDownIn-animation' => __('tinDownIn-animation','framework' ), 
                    'tinRightIn-animation'  => __('tinRightIn-animation','framework' ),
                    'tinUpIn-animation' => __('tinUpIn-animation','framework' ), 
                    'tossing-animation'  => __('tossing-animation','framework' ),
                    'twisterInDown-animation'  => __('twisterInDown-animation','framework' ),
                    'twisterInUp-animation' => __('twisterInUp-animation','framework' ), 
                    'wobble-animation' => __('wobble-animation','framework' ),
                    'zoomIn-animation' => __('zoomIn-animation','framework' ),
                );
                $fields['animation_class'] = array(
                  'name' => __('Animation Class', 'framework'),
                  'type' => 'select',
                  'group' => 'animation',
                  'options' => $animation_name,
                );

                /* Miscellaneous group */
                  $fields['cell_class'] = array(
                    'name' => __('Cell Class', 'framework'),
                    'type' => 'text',
                    'group' => 'miscellaneous',
                    'description' => __('Class added to all cells in this row.', 'framework'),
                    'priority' => 6,
                  );

                  $fields['row_css'] = array(
                    'name' => __('CSS Styles', 'framework'),
                    'type' => 'code',
                    'group' => 'miscellaneous',
                    'description' => __('One style attribute per line.', 'framework'),
                    'priority' => 10,
                  );

                return $fields;
            
        }

        public function gx_fw_panels_panels_row_style_attributes( $attributes, $args ) {
 
            if( !empty( $args['class'] ) ) {
              $attributes['class'] = array_merge( $attributes['class'], explode(' ', $args['class']) );
            }

            $args = apply_filters( 'gx_siteorigin_panels_row_style_attributes_css', array(),$args );


            /* css style */
            if( empty($attributes['style']) ) $attributes['style'] = '';   
            if( !empty( $args['font_color'] ) ) {  
              $attributes['style'] .= 'color: '. esc_attr($args['font_color']) .'; ';
            }
            if( !empty( $args['font_size'] ) ) {  
              $attributes['style'] .= 'font-size: '. esc_attr($args['font_size']) .'; ';
            }
            if( !empty( $args['line_height'] ) ) {  
              $attributes['style'] .= 'line-height: '. esc_attr($args['line_height']) .'; ';
            }
            if( !empty( $args['text_align'] ) ) {  
              $attributes['style'] .= 'text-align: '. $args['text_align'] .'; ';
            }      
            if( !empty( $args['border_width'] ) ) {  
              $attributes['style'] .= 'border-width: '. esc_attr($args['border_width']) .'; ';
            }
            if( !empty( $args['border_style'] ) ) {  
              $attributes['style'] .= 'border-style: '. $args['border_style'] .'; ';
            }
            if( !empty( $args['border_radius'] ) ) {  
              $attributes['style'] .= 'border-radius: '. $args['border_radius'] .'; ';
            }
            if( !empty( $args['background_size'] ) ) {  
              $attributes['style'] .= 'background-size: '. $args['background_size'] .'; ';
            }   
            if( !empty( $args['background_position'] ) ) {  
              $attributes['style'] .= 'background-position: '. $args['background_position'] .'; ';
            }
            if( !empty( $args['background_attachment'] ) ) {  
              $attributes['style'] .= 'background-attachment: '. $args['background_attachment'] .'; ';
            }
            if( !empty( $args['background_display'] ) && !empty( $args['background_image_attachment'] ) ) {
              if( $args['background_display'] == 'parallax' || $args['background_display'] == 'parallax-original' ) {
                wp_enqueue_script('siteorigin-panels-front-styles');
              }

              $url = wp_get_attachment_image_src( $args['background_image_attachment'], 'full' );

              if( !empty($url) ) {

                if( $args['background_display'] == 'parallax' || $args['background_display'] == 'parallax-original' ) {
                  wp_enqueue_script('siteorigin-parallax');
                  $parallax_args = array(
                    'backgroundUrl' => $url[0],
                    'backgroundSize' => array( $url[1], $url[2] ),
                    'backgroundSizing' => $args['background_display'] == 'parallax-original' ? 'original' : 'scaled',
                    'limitMotion' => siteorigin_panels_setting( 'parallax-motion' ) ? floatval( siteorigin_panels_setting( 'parallax-motion' ) ) : 'auto',
                  );
                  $attributes['data-siteorigin-parallax'] = json_encode( $parallax_args );
                  $attributes['style'] .= 'background-image: url(' . $url[0] . '); ';
                }else {
                  $attributes['style'] .= 'background-image: url(' . $url[0] . ');';
                  switch( $args['background_display'] ) {
                    case 'repeat':
                      $attributes['style'] .= 'background-repeat: repeat;';
                      break;
                    case 'no-repeat':
                      $attributes['style'] .= 'background-repeat: no-repeat;';
                      break;
                    case 'repeat-x':
                      $attributes['style'] .= 'background-repeat: repeat-x;';
                      break;
                    case 'repeat-y':
                      $attributes['style'] .= 'background-repeat: repeat-y;';
                      break;
                  }
                }
              }
            }
            if( !empty( $args['font_family'] ) && isset( $args['font_family'] ) ) {  
                // Check if we've got everything we need
                $url = '//fonts.googleapis.com/css?family=' . str_replace( ' ', '+', $args['font_family'] );
                $key = md5( $args['font_family'] );
                // check that the URL is valid. we're going to use transients to make this faster.
                $url_is_valid = get_transient( $key );
                if ( false === $url_is_valid ) { // transient does not exist
                  $response = wp_remote_get( 'https:' . $url );
                    if ( ! is_array( $response ) ) {
                      // the url was not properly formatted,
                      // cache for 12 hours and continue to the next field
                      set_transient( $key, null, 12 * HOUR_IN_SECONDS );
                      return;
                    }
                  // check the response headers.
                  if ( isset( $response['response'] ) && isset( $response['response']['code'] ) ) {
                    if ( 200 == $response['response']['code'] ) {
                      // URL was ok
                      // set transient to true and cache for a week
                      set_transient( $key, true, 7 * 24 * HOUR_IN_SECONDS );
                      $url_is_valid = true;
                    }
                  }
                }
                // If the font-link is valid, enqueue it.
                if ( $url_is_valid ) {
                  wp_enqueue_style( $key, $url, null, null ); 
                } 
                $attributes['style'] .= 'font-family: '. $args['font_family'] .'; '; 
            }
             if( !empty( $args['heading_font_family'] ) && isset( $args['heading_font_family'] ) ) {  
                // Check if we've got everything we need
                $url = '//fonts.googleapis.com/css?family=' . str_replace( ' ', '+', $args['heading_font_family'] );
                $key = md5($args['heading_font_family']);
                // check that the URL is valid. we're going to use transients to make this faster.
                $url_is_valid = get_transient( $key );
                if ( false === $url_is_valid ) { // transient does not exist
                  $response = wp_remote_get( 'https:' . $url );
                    if ( ! is_array( $response ) ) {
                      // the url was not properly formatted,
                      // cache for 12 hours and continue to the next field
                      set_transient( $key, null, 12 * HOUR_IN_SECONDS );
                      return;
                    }
                  // check the response headers.
                  if ( isset( $response['response'] ) && isset( $response['response']['code'] ) ) {
                    if ( 200 == $response['response']['code'] ) {
                      // URL was ok
                      // set transient to true and cache for a week
                      set_transient( $key, true, 7 * 24 * HOUR_IN_SECONDS );
                      $url_is_valid = true;
                    }
                  }
                }
                // If the font-link is valid, enqueue it.
                if ( $url_is_valid ) {
                  wp_enqueue_style( $key, $url, null, null ); 
                } 
                if( !empty( $args['heading_font_family'] ) ) {  
                   $attributes['style'] .= 'font-family: '. $args['heading_font_family'] .'; '; 
                }
            }
            return $attributes;
        }

        public function gx_fw_row_style_groups( $groups ) {
              $groups = array(
                  'row_layout' => array(
                    'name' => __('Row Layout', 'framework'),
                    'priority' => 5
                  ),
                  'design' => array(
                    'name' => __('Custom CSS', 'framework'),
                    'priority' => 9,
                  ), 
                  'background' => array(
                    'name' => __('Background', 'framework'),
                    'priority' => 9,
                  ), 
                  'heading_font' => array(
                    'name' => __('Heading Font', 'framework'),
                    'priority' => 10,
                  ),
                  'font' => array(
                    'name' => __('Font', 'framework'),
                    'priority' => 10,
                  ),
                  'link' => array(
                    'name' => __('Link', 'framework'),
                    'priority' => 11,
                  ),
                  'box-model' => array(
                    'name' => __('Box Model', 'framework'),
                    'priority' => 12
                  ),
                  'border' => array(
                    'name' => __('Border', 'framework'),
                    'priority' => 13,
                  ),
                  'animation' => array(
                    'name' => __('Animation', 'framework'),
                    'priority' => 14,
                  ),
                  'miscellaneous' => array(
                    'name' => __('Miscellaneous', 'framework'),
                    'priority' => 15,
                  ),
              );
              return $groups; 
        }

        /* override the so default color according to the primary color */
        public function gx_fw_override_so_color( $css, $style ) {
            $primary_color =  implode(" ",Kirki::$fields[ 'color_scheme' ]['choices'][ '1' ]);

             if(! get_theme_mod('enable_custom_color_scheme',false) ) {
                $color_scheme_count = get_theme_mod('color_scheme','1');
                $color_scheme_color = implode(" ",Kirki::$fields[ 'color_scheme' ]['choices'][ $color_scheme_count ]);
             }else{
                  $color_scheme_color = get_theme_mod('custom_color_scheme');
             }
           
            foreach($style as $key => $val)
            {
                if ($val == $primary_color) {
                  $style[$key] = $color_scheme_color;
                }
            }
            
            return $style;
        }

        
        public function gx_fw_override_default_so_color( $css, $style ) {
           return $style;
        }



    }

}

