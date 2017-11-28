<?php
/*
Widget Name: Alert 
Description: Creates an alert message
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Alert_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'alert-widget', 

			// The name of the widget for display purposes.
			__('Alert', 'framework'),

			array(
				'description' => __('Creates an alert. It can be success, error, info alerts.', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/alert',
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
				'type' => array(
					'type' => 'select',
					'label' => __( 'Type of alert Background', 'framework' ),
					'default' => 'notice',
					'options' => array(
						'notice' => __( 'Notice', 'framework' ),
						'warning' => __( 'Warning', 'framework' ),
						'success' => __( 'Success', 'framework' ),
						'error' => __( 'Error', 'framework' ),
						'info' => __( 'Info', 'framework' ),
					)
				), 
				'custom_bg' => array(
					'type' => 'color',
					'label' => __( 'Custom alert Background', 'framework' ),  
				), 
				'icon_section' => array(
					'type' => 'section',
					'label' => __( 'Icon fields.' , 'framework' ),
					'hide' => false,
					'fields' => array(
						'icon' => array(
							'type' => 'icon',
							'label' => __('Select an icon', 'framework'),
						),
						'icon_color' => array(
							'type' => 'color',
							'label' => __( 'Icon Color.', 'framework' ),
						),
						'icon_size' => array(
							'type'  => 'measurement',
							'label' => __( 'Size', 'so-widgets-bundle' ),
						),
					)
				),   
				'close' => array(
					'type' => 'select',
					'label' => __( 'Need close option?', 'framework' ),
					'default' => 'yes',
					'options' => array(
						'yes' => __( 'Yes', 'framework' ),
						'no' => __( 'No', 'framework' ),
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
		$icon_styles = array();
		if( ! empty( $instance['icon_section']['icon_size'] ) ) :
			$icon_styles[] = 'font-size: ' .  $instance['icon_section']['icon_size'];
		endif;
		if( ! empty( $instance['icon_section']['icon_color'] ) ) :
			$icon_styles[] = 'color:' . $instance['icon_section']['icon_color'] . ';';
		endif;
		return array(
			'type' => $instance['type'],
			'close' => $instance['close'],
			'content' => $instance['content'],
			'icon' => $instance['icon_section']['icon'],
			'icon_styles' => $icon_styles,
			'custom_bg' => $instance['custom_bg']
		);
	}

	function get_style_name($instance) {
		return '';
	}

} // class Alert_Widget

siteorigin_widget_register('alert-widget', __FILE__, 'Alert_Widget');