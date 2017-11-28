<?php
/*
Widget Name: Dropcap 
Description: Creates a section with Dropcap
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Dropcap_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'dropcap-widget',

			// The name of the widget for display purposes.
			__('Dropcap', 'framework'),

			array(
				'description' => __('Creates a section with Dropcap', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/dropcap',
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
				'style' => array(
					'type' => 'select',
					'label' => __( 'Type of divider', 'framework' ),
					'default' => 'normal',
					'options' => array(
						'default' => __( 'Default', 'framework' ),
						'circle' => __( 'Circle', 'framework' ),
						'box' => __( 'Box', 'framework' ),
						'book' => __( 'Book', 'framework' ),
					)
				),
				'content' => array(
					'type' => 'textarea',
					'label' => __('Content','framework')
				)
		);
	}


	function get_template_variables( $instance, $args ) {
		return array(
			'style' => ! empty( $instance['style'] ) ? $instance['style'] : 'default',
			'content' => ! empty( $instance['content'] ) ? $instance['content'] : '',
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

} // class Dropcap_Widget

siteorigin_widget_register('dropcap-widget', __FILE__, 'Dropcap_Widget');