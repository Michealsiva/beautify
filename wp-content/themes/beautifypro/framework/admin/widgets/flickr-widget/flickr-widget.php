<?php
/*
Widget Name: Flickr 
Description: Creates an flickr.The most recent photos from flickr
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Flickr_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'flickr-widget', 

			// The name of the widget for display purposes.
			__('Flickr', 'framework'),

			array(
				'description' => __('Creates an flickr.The most recent photos from flickr', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/flickr',
				'has_preview' => false,
			),

			//The $control_options array, which is passed through to WP_Widget
			array(
			),

			false
		);
	}

	function initialize_form() {
		return  array(
				'screen_name' => array(
					'type' => 'text',
					'label' => __( 'Flickrs ID', 'framework' ),
					'description' => sprintf(__( '%sGet your flickr ID%s: ', 'framework' ),'<a href="http://idgettr.com/">','</a>'),
				),
				'count' => array(
					'type' => 'text',
				    'label' => __( 'Number of photos to show:', 'framework' ), 
				    'default' => 5,
				),
				'api' => array(
					'type' => 'text', 
					'label' => __( 'API key', 'framework' ),
					'default' => 'c9d2c2fda03a2ff487cb4769dc0781ea',
					'description' => sprintf( __( 'Use default key (c9d2c2fda03a2ff487cb4769dc0781ea) or get your own from %sFlickr APP Garden%s: ', 'framework' ), '<a href="http://www.flickr.com/services/apps/create/apply">', '</a>' ),
				),
		);
	}


	function get_template_name($instance) {
		return 'default';
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'screen_name' => $instance['screen_name'],
			'count' => ! empty( $instance['count'] ) ? $instance['count'] : 5,
			'api' => ! empty( $instance['api'] ) ? $instance['api'] : 'c9d2c2fda03a2ff487cb4769dc0781ea',
		);
	}

	function get_style_name($instance) {
		return '';
	}

} // class Flickr_Widget

siteorigin_widget_register('flickr-widget', __FILE__, 'Flickr_Widget');