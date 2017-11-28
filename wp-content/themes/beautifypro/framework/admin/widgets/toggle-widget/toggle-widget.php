<?php
/*
Widget Name: Toggle 
Description: Creates a content section that can toggle visibility
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Toggle_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'toggle-widget',

			// The name of the widget for display purposes.
			__('Toggle', 'framework'),

			array(
				'description' => __('Creates a content section that can toggle visibility.', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/toggle',
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
				'title' => array(
					'type' => 'text',
					'label' => __( 'Title', 'framework' ),
				),
				'state' => array(
					'type' => 'select',
					'label' => __( 'Default state of toggle', 'framework' ),
					'default' => 'open',
					'options' => array(
						'open' => __( 'Open', 'framework' ),
						'close' => __( 'Close', 'framework' ),
					)
				),
				'content' => array(
					'type' => 'tinymce',
					'label' => __( 'Content.', 'framework' ),
					'rows' => 5,
				),
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'state' => ! empty( $instance['state'] ) ? $instance['state'] : 'open',
			'title' => ! empty( $instance['title'] ) ? $instance['title'] : '',
			'content' => ! empty( $instance['content'] ) ? $instance['content'] : '',
		);
	}

	function get_style_name($instance) {
		return '';
	}

} // class Toggle_Widget

siteorigin_widget_register('toggle-widget', __FILE__, 'Toggle_Widget');