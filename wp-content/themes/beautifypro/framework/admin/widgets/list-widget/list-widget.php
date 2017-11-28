<?php
/*
Widget Name: List 
Description: Creates list content section
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class List_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct( 

		// The unique id for your widget.
			'list-widget',

			// The name of the widget for display purposes.
			__('List', 'framework'),

			array(
				'description' => __('Creates list content section', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/list',
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
					'label' => __( 'Title of the list', 'framework' ),
				),
				'list' => array(
					'type' => 'textarea',
					'label' => __( 'List (start each line with *)', 'framework' ),
				),
				'list_icon' => array(
					'type' => 'icon',
					'label' => __( 'List icon', 'framework' )
				),
				'icon_size' => array(
					'type'  => 'measurement',
					'label' => __( 'Icon Size', 'so-widgets-bundle' ),
				),
				'list_icon_color' => array(
					'type' => 'color',
					'label' => __( 'Icon color', 'framework' ),
					'options' => array(),
				),
				'list_image' => array(
					'type' => 'media',
					'label' => __( 'List image', 'framework' ),
					'library' => 'image'
				),
		);
	}

	function get_template_variables( $instance, $args ) {
		$icon_styles = array();
		if( ! empty( $instance['icon_size'] ) ) :
			$icon_styles[] = 'font-size: ' .  $instance['icon_size'];
		endif;
		if( ! empty( $instance['list_icon_color'] ) ) :
			$icon_styles[] = 'color:' . $instance['list_icon_color'] . ';';
		endif;
 
		return array(
			'title' => ! empty( $instance['title'] ) ? $instance['title'] : '',
			'list' => ! empty( $instance['list'] ) ? $instance['list'] : '',
			'icon' => ! empty( $instance['list_icon'] ) ? $instance['list_icon'] : '',
			'icon_styles' => $icon_styles,
			'image' => ! empty( $instance['list_image'] ) ? $instance['list_image'] : '',
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

} // class List_Widget

siteorigin_widget_register('list-widget', __FILE__, 'List_Widget');