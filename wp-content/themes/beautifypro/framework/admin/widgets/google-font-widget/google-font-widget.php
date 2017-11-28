<?php
/*
Widget Name: Google Font 
Description: Creates content section with Google Font
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Google_Font_Widget extends SiteOrigin_Widget {

	function __construct() {   

		parent::__construct(

		// The unique id for your widget.
			'google-font-widget',

			// The name of the widget for display purposes.
			__('Google Font', 'framework'),

			array(
				'description' => __('Creates content section with Google Font', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/google-font',
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
				'google_font' => array(
					'type' => 'font',
					'label' => __( 'Select Google Font to use', 'framework' ),
				),
				'google_font_size' => array(  
					'type' => 'measurement',
					'label' => __( 'Font Size', 'framework' ),
				),
				'content' => array(
					'type' => 'tinymce',
					'label' => __( 'Content', 'framework' ),
				)
			);
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'google_font' => ! empty( $instance['google_font'] ) ? $instance['google_font'] : '',
			'google_font_size' => ! empty( $instance['google_font_size'] ) ? $instance['google_font_size'] : '',
			'content' => ! empty( $instance['content'] ) ? $instance['content'] : '',
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

} // class Google_Font_Widget

siteorigin_widget_register('google-font-widget', __FILE__, 'Google_Font_Widget');