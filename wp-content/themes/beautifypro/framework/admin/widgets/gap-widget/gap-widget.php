<?php
/*
Widget Name: Gap 
Description: Creates a gap between sections
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Gap_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'gap-widget',

			// The name of the widget for display purposes.
			__('Gap', 'framework'),

			array(
				'description' => __('Creates a gap between sections (between 2 widgets/rows)', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/gap',
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
				'gap' => array(
					'type' => 'measurement',
					'label' => __( 'Gap between sections(between 2 widgets/rows)', 'framework' ),
				),
		);
	}


	function get_template_variables( $instance, $args ) {
		return array(
			'gap' => ! empty( $instance['gap'] ) ? $instance['gap'] : '',
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

} // class Gap_Widget

siteorigin_widget_register('gap-widget', __FILE__, 'Gap_Widget');