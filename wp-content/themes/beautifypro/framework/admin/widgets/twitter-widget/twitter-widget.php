<?php
/*
Widget Name: Twitter 
Description: Creates an twitter.The most recent tweet
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Twitter_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'twitter-widget', 

			// The name of the widget for display purposes.
			__('Twitter', 'framework'),

			array(
				'description' => __('Creates an twitter.The most recent tweet', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/twitter',
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
				'twitter_id' => array(
					'type' => 'text',
					'label' => __( 'Twitter Username', 'framework' ),
				),
				'twitter_widget_id' => array(
					'type' => 'text',
					'label' => __( 'Twitter Widget ID', 'framework' ),
				),
				'count' => array(
					'type' => 'text',
				    'label' => __( 'Number of Tweet', 'framework' ), 
				    'default' => 5,
				),
				'width' => array(
					'type' => 'number',
					'label' => __( 'Width', 'framework' ),
					'default' => 400,
				),
				'height' => array(
					'type' => 'number',
					'label' => __( 'Height', 'framework' ),
					'default' => 400,
				),
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'count' => ! empty( $instance['count'] ) ? $instance['count'] : 5,
			'twitter_id' => $instance['twitter_id'],
			'twitter_widget_id' => $instance['twitter_widget_id'],
			'height' => $instance['height'],
			'width' => $instance['width'], 
			
		);
	}

	function get_style_name($instance) {
		return '';
	}

} // class Twitter_Widget

siteorigin_widget_register('twitter-widget', __FILE__, 'Twitter_Widget');