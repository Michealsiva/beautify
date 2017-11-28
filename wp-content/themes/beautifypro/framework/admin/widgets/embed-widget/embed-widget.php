<?php
/*
Widget Name: Embed 
Description: Creates embedded Audio, Video section
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Embed_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'embed-widget',

			// The name of the widget for display purposes.
			__('Embed', 'framework'),

			array(
				'description' => __('Creates embedded Audio, Video section', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/embed',
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
				'embed_text' => array(
					'type' => 'text',
					'label' => __( 'Url of Audio (or) Video', 'framework' ),
				),
		);
	}



	function get_template_variables( $instance, $args ) {
		return array(
			'embed_text' => ! empty( $instance['embed_text'] ) ? $instance['embed_text'] : '',
		); 
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

} // class Embed_Widget

siteorigin_widget_register('embed-widget', __FILE__, 'Embed_Widget');