<?php
/*
Widget Name: Button 
Description: Creates buttons of all types and colors
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Button_Widget extends SiteOrigin_Widget {

	function __construct() { 

		parent::__construct( 

		// The unique id for your widget.
			'button-widget',

			// The name of the widget for display purposes.
			__('Button', 'framework'),

			array(
				'description' => __('Creates buttons of all types and colors', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/button',
				'has_preview' => false,
			),

			//The $control_options array, which is passed through to WP_Widget
			array(
			),
            false
			
		);
	}

	function initialize_form() {
		return array(
				'button_text' => array(
					'type' => 'text',
					'label' => __( 'Button Text', 'framework' ),
				),
				'button_url' => array(
					'type' => 'link',
					'label' => __('Button URL', 'framework'),
				),
				
				'button_colors' => array(
					'type' => 'section',
					'label' => __( 'Button Colors.' , 'framework' ),
					'hide' => true,
					'fields' => array(
						'button_background' => array(
							'type' => 'color',
							'label' => __('Button background', 'framework'),
						),
						'button_color' => array( 
							'type' => 'color',
							'label' => __('Button text color', 'framework'),
						),
						'button_background_hover' => array(
							'type' => 'color',
							'label' => __('Button background on hover', 'framework'),
						),	
						'button_color_hover' => array(
							'type' => 'color', 
							'label' => __('Button text color on hover', 'framework'),
						),
					),
				),
				
				'button_alignment' => array(
					'type' => 'select',
					'label' => __('Button Alignment', 'framework'),
					'options' => array(
						'left' => __( 'Left','framework' ),
						'right' => __( 'Right','framework' ),
						'center' => __( 'Center','framework' ),
						'justify' => __( 'Justify','framework' ),
					)
				),
				'button_size' => array(   
					'type' => 'select',
					'label' => __('Button Size', 'framework'),
					'default' => 'mini',
					'options' => array(
						'mini' => __( 'Mini','framework' ),
						'small' => __( 'Small','framework' ),
						'normal' => __( 'Normal','framework' ),
						'large' => __( 'Large','framework' ),
					)
				),  
				'border_radius' => array(
					'type' => 'measurement',
					'label' => __('Button border radius', 'framework'),
				),
				'new_window' => array(
					'type' => 'checkbox',
					'label' => __('Open in new window?', 'framework'),
				),
		);
	}


	/**
	 * Get the template variables for the headline
	 *
	 * @param $instance
	 * @param $args
	 *
	 * @return array
	 */
	function get_template_variables( $instance, $args ) {
		return array(
			'button_text' => $instance['button_text'],
			'button_url' => $instance['button_url'],
			'button_alignment' => $instance['button_alignment'],
			'button_background' => $instance['button_colors']['button_background'],
			'button_background_hover' => $instance['button_colors']['button_background_hover'],
			'button_color' => $instance['button_colors']['button_color'],
			'button_color_hover' => $instance['button_colors']['button_color_hover'],
			'button_size' => $instance['button_size'],
			'border_radius' => $instance['border_radius'],
			'new_window' =>$instance['new_window'],
		);
	}

 
	function get_less_variables($instance){
			if( empty( $instance ) ) return array();  
			return array(     
				'button_background' => isset($instance['button_colors']['button_background']) ? $instance['button_colors']['button_background']:'',
		        'button_color' => isset($instance['button_colors']['button_color']) ? $instance['button_colors']['button_color']:'',
				'button_background_hover' => isset($instance['button_colors']['button_background_hover']) ? $instance['button_colors']['button_background_hover']:'',
		        'button_color_hover' => isset($instance['button_colors']['button_color_hover']) ? $instance['button_colors']['button_color_hover']:'',
		        'border_radius' => isset($instance['border_radius']) ? $instance['border_radius']:'',
			);
		}


	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return 'default';
	}

} // class Button_Widget

siteorigin_widget_register('button-widget', __FILE__, 'Button_Widget');