<?php
/*
Widget Name: Call To Action 
Description: Creates a Call To Action section
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Call_To_Action_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'call-to-action-widget',

			// The name of the widget for display purposes.
			__('Call To Action', 'framework'),

			array(
				'description' => __('Creates a Call To Action section', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/accordion',
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
					'label' => __( 'Title', 'framework' )
				),
				'content' => array(
					'type' => 'tinymce',
					'label' => __( 'Content', 'framework' ),
					'rows' => 5,
				),
				'anchor_text' => array(
					'type' => 'text',
					'label' => __( 'Call To Action text', 'framework' )
				),
				'cta_url' => array(
					'type' => 'link',
					'label' => __( 'Target URL', 'framework' ),
					'rows' => 5,
				),
			);
	}


	function get_template_variables( $instance, $args ) {
		return array(
			'title' => ! empty( $instance['title'] ) ? $instance['title'] : '',
			'content' => ! empty( $instance['content'] ) ? $instance['content'] : '',
			'anchor_text' => ! empty( $instance['anchor_text'] ) ? $instance['anchor_text'] : '',
			'cta_url' => ! empty( $instance['cta_url'] ) ? $instance['cta_url'] : ''
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

} // class Accordion_Widget

siteorigin_widget_register('call-to-action-widget', __FILE__, 'Call_To_Action_Widget');