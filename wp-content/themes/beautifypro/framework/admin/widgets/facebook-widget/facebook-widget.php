<?php
/*
Widget Name: Facebook 
Description: Creates an facebook.The most recent Facebook Share
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Facebook_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'facebook-widget', 

			// The name of the widget for display purposes.
			__('Facebook', 'framework'),

			array(
				'description' => __('Creates an facebook.The most recent Facebook Share', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/facebook',
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
				'facebook_url' => array(
					'type' => 'text',
					'label' => __( 'Facebook Username', 'framework' ),
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
			'facebook_url' => $instance['facebook_url'],
			'height' => $instance['height'],
			'width' => $instance['width'], 
			
		);
	}

	function get_style_name($instance) {
		return '';
	}

} // class Facebook_Widget

siteorigin_widget_register('facebook-widget', __FILE__, 'Facebook_Widget');