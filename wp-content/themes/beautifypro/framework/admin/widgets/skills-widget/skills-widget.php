<?php
/*
Widget Name: Skills 
Description: Creates skills content section
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Skills_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'skills-widget',

			// The name of the widget for display purposes.
			__('Skills', 'framework'),

			array(
				'description' => __('Creates skills content section', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/skills',
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
				'skills' => array(
					'type' => 'repeater',
					'label' => __( 'Skills.' , 'framework' ),
					'item_name'  => __( 'Skill item', 'framework' ),
					'item_label' => array(
						'selector'     => "[id*='skill_name']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'skill_name' => array(
							'type' => 'text',
							'label' => __( 'Skill name', 'framework' )
						),
						
						'skill_style' => array(
							'type' => 'select',
							'label' => __( 'Select Skill style', 'framework' ),
							'options' => array(
								'default' => __('Progress Bar','framework'),
								'circle' => __('Circle Bar','framework'),
							),    
						),
						'skill_percentage' => array(
							'type' => 'slider',
							'label' => __( 'Percentage', 'framework' ),
							'default' => 50,
							'min' => 0,
							'max' => 100,
							'integer' => true 
						),
					)
				),
				'circlebar_section' => array(
					'type' => 'section',
					'label' => __( 'CircleBar related option' , 'framework' ),
					'hide' => true,
					'fields' => array(   
						'animate' => array(
							'type' => 'number',
							'label' => __('Animate - Object with time in milliseconds', 'framework'),
						),
						'line_width' => array(
							'type' => 'number',
							'label' => __('Width of the chart line in px.', 'framework'),
						),
						'track_color' => array(
							'type' => 'color',
							'label' => __('The color of the track', 'framework'),
						),
						'bar_color' => array(
							'type' => 'color',
							'label' => __('The color of the curcular bar.', 'framework'),
						),
						/*'size' => array(
							'type' => 'number',
							'label' => __('Size of the pie chart in px', 'framework'),
						),*/
						'linecap' => array(
							'type' => 'select',
							'label' => __('Defines how the ending of the bar line looks like', 'framework'),
							'options' => array(
								'butt' => __('Butt','framework'),
								'round' => __('Round','framework'),	
								'square' => __('Square','framework'),
							),
							'default'  => 'butt',
						),
						'rotate' => array(
							'type' => 'number',
							'label' => __('Rotation of the complete chart in degrees.', 'framework'),
						    'default' => 0,
						),
					)
				),
		);
	}
	
	function get_template_name($instance) {
		return 'default';
	}


	function get_template_variables( $instance, $args ) {
		return array(
			'animate' => ! empty( $instance['circlebar_section']['animate'] ) ? $instance['circlebar_section']['animate'] : '',
			'line_width' => ! empty( $instance['circlebar_section']['line_width'] ) ? $instance['circlebar_section']['line_width'] : '',
			'track_color' => ! empty( $instance['circlebar_section']['track_color'] ) ? $instance['circlebar_section']['track_color'] : '',
			'bar_color' => ! empty( $instance['circlebar_section']['bar_color'] ) ? $instance['circlebar_section']['bar_color'] : '',
			//'size' => ! empty( $instance['circlebar_section']['size'] ) ? $instance['circlebar_section']['size'] : '',
			'linecap' => ! empty( $instance['circlebar_section']['linecap'] ) ? $instance['circlebar_section']['linecap'] : '',
			'rotate' => ! empty( $instance['circlebar_section']['rotate'] ) ? $instance['circlebar_section']['rotate'] : '',
		);
	}

	function get_style_name($instance) {
		return '';
	}


} // class Skills_Widget

siteorigin_widget_register('skills-widget', __FILE__, 'Skills_Widget');