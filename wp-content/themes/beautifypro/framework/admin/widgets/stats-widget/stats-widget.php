<?php
/*
Widget Name: Stats 
Description: Creates stats content section
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Stats_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'stats-widget',

			// The name of the widget for display purposes.
			__('Stats', 'framework'),

			array(
				'description' => __('Creates stats content section', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/stats',
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
				'stat_name' => array(
					'type' => 'text',
					'label' => __( 'Stat name', 'framework' )
				),
				'stat_content' => array(
					'type' => 'number',
					'label' => __( 'Stat', 'framework' ),
				),
				'icon_section' => array(
					'type' => 'section',
					'label' => __( 'Icon fields.' , 'framework' ),
					'hide' => false,
					'fields' => array(
						'stat_icon' => array(
							'type' => 'icon',
							'label' => __( 'Stat icon', 'framework' )
						),
						'icon_color' => array(
							'type' => 'color',
							'label' => __( 'Icon Color.', 'framework' ),
						),
						'icon_background' => array(
							'type' => 'color',
							'label' => __( 'Icon Background.', 'framework' ),
						),
						'icon_size' => array(
							'type'  => 'measurement',
							'label' => __( 'Size', 'framework' ),
						),
					),
				),
				'stat_image' => array(
					'type' => 'media',
					'label' => __( 'Stat image', 'framework' ),
					'library' => 'image'
				),
				'stat_background' => array(
					'type' => 'color',
					'label' => __( 'Stat Background.', 'framework' ),
				),
		);
	}

	function get_template_variables( $instance, $args ) {
		$icon_styles = array();
		if( ! empty( $instance['icon_section']['icon_size'] ) ) :
			$icon_styles[] = 'font-size: ' . $instance['icon_section']['icon_size'] . ';';
		endif;
		if( ! empty( $instance['icon_section']['icon_color'] ) ) :
			$icon_styles[] = 'color:' . $instance['icon_section']['icon_color'] . ';';
		endif;
		if( ! empty( $instance['icon_section']['icon_background'] ) ) :
			$icon_styles[] = 'background-color:' . $instance['icon_section']['icon_background'] . ';';
		endif;

		return array(
			'name' => ! empty( $instance['stat_name'] ) ? $instance['stat_name'] : '',
			'content' => ! empty( $instance['stat_content'] ) ? $instance['stat_content'] : '',
			'icon' => ! empty( $instance['icon_section']['stat_icon'] ) ? $instance['icon_section']['stat_icon'] : '',
			'icon_styles' => $icon_styles,

			'image' => ! empty( $instance['stat_image'] ) ? $instance['stat_image'] : '',
			'background' => ! empty( $instance['stat_background'] ) ? $instance['stat_background'] : '',
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

} // class Stats_Widget

siteorigin_widget_register('stats-widget', __FILE__, 'Stats_Widget');