<?php
/*
Widget Name: Testimonial 
Description: Creates an testimonial section
Author: N. Venkat Raj 
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Testimonial_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'testimonial-widget',

			// The name of the widget for display purposes.
			__('Testimonial', 'framework'),

			array(
				'description' => __('Creates an testimonial section', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/testimonial',
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
				'testimonial' => array(
					'type' => 'repeater',
					'label' => __( 'Testimonial' , 'framework' ),
					'item_name'  => __( 'Testimonial item', 'framework' ),
					'item_label' => array(
						'selector'     => "[id*='client_testimonial']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'client_testimonial' => array(
							'type' => 'tinymce',
							'label' => __( 'Testimonial content', 'framework' ),
							'rows' => 5,
						),
						'client_name' => array(
							'type' => 'text',
							'label' => __( 'Client name', 'framework' ),
						),
						'client_image' => array(
							'type' => 'media',
							'label' => __( 'Client image', 'framework' ),
							'choose' => __( 'Choose image', 'framework' ),
							'update' => __( 'Set image', 'framework' ),
							'library' => 'image',
						),
						'client_company' => array(
							'type' => 'text',
							'label' => __( 'Company name', 'framework' ),
						),
						'client_website' => array(
							'type' => 'link',
							'label' => __( 'Website', 'framework' ),
						),
					),
				)

		);
	}
	
	function get_template_name($instance) {
		return 'default';
	}

	/*
	function get_template_variables( $instance, $args ) {
		return array(
			'client_testimonial' => ! empty( $instance['client_testimonial'] ) ? $instance['client_testimonial'] : '' ,
			'client_name' => ! empty( $instance['client_name'] ) ? $instance['client_name'] : '' ,
			'client_company' => ! empty( $instance['client_company'] ) ? $instance['client_company'] : '' ,
			'client_website' => ! empty( $instance['client_website'] ) ? $instance['client_website'] : '' ,
		);
	}
	*/

	function get_style_name($instance) {
		return '';
	}

} // class Testimonial_Widget

siteorigin_widget_register('testimonial-widget', __FILE__, 'Testimonial_Widget');