<?php
/*
Widget Name: Divider 
Description: Creates a section Divider
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Divider_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'divider-widget',

			// The name of the widget for display purposes.
			__('Divider', 'framework'),

			array(
				'description' => __('Creates a section Divider', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/divider',
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
					'label' => __( 'Type of divider', 'framework' ),
					'default' => 'normal',
					'options' => array(
						'default' => __( 'Standard', 'framework' ),
						'dotted' => __( 'Dotted', 'framework' ),
						'dashed' => __( 'Dashed', 'framework' ),
						'doubled' => __( 'Doubled', 'framework' ),
						'fancy' => __( 'Fancy', 'framework' ),
					)
				),
				'divider-color' => array (
					'type' => 'color',
					'label' => __('Select Divider color','framework'),
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
					)
				),
				'divider' => array(
					'type' => 'checkbox',
			        'label' => __( 'Enable Icon with Divider', 'material' ),
			        'default' => false
				),
		);
	}

	function get_template_variables( $instance, $args ) {
		$icon_styles = array();
		if( ! empty( $instance['icon_section']['icon_color'] ) ) :
			$icon_styles[] = 'color:' . $instance['icon_section']['icon_color'] . ';';
		endif;
		return array(
			//'type' => ! empty( $instance['type'] ) ? $instance['type'] : 'default',
			'type' => $instance['type'],
			'icon' => $instance['icon_section']['icon'],
			'icon_styles' => $icon_styles,
			'divider_color' => $instance['divider-color'],
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

} // class Accordion_Widget

siteorigin_widget_register('divider-widget', __FILE__, 'Divider_Widget');