<?php
/*
Widget Name: Tooltip 
Description: Creates a content section with tooltip
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Tooltip_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'tooltip-widget',

			// The name of the widget for display purposes.
			__('Tooltip', 'framework'),

			array(
				'description' => __('Creates a content section with tooltip.', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/tooltip',
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
				'tooltip' => array(
					'type' => 'text',
					'label' => __( 'Tooltip', 'framework' ),
				),
				'position' => array(
					'type' => 'select',
					'label' => __( 'Tooltip position', 'framework' ),
					'default' => 'top',
					'options' => array(
						'top' => __( 'Top', 'framework' ),
						'right' => __( 'Right', 'framework' ),
						'bottom' => __( 'Bottom', 'framework' ),
						'left' => __( 'Left', 'framework' ),
					)
				),
				'tooltip_content' => array(
					'type' => 'text',
					'label' => __( 'Tooltip Content', 'framework' ),
				),
				'content' => array(
					'type' => 'tinymce',
					'label' => __( 'Content', 'framework' ),
				),
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'tooltip' => ! empty( $instance['tooltip'] ) ? $instance['tooltip'] : '',
			'position' => ! empty( $instance['position'] ) ? $instance['position'] : 'top',
			'tooltip_content' => ! empty( $instance['tooltip_content'] ) ? $instance['tooltip_content'] : '',
			'content' => ! empty( $instance['content'] ) ? $instance['content'] : '',
		);
	}

	function get_style_name($instance) {
		return '';
	}

} // class Tooltip_Widget

siteorigin_widget_register('tooltip-widget', __FILE__, 'Tooltip_Widget');