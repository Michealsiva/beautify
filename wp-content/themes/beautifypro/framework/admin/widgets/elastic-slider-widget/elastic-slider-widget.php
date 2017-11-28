<?php
/*
Widget Name: Elastic Slider 
Description: Creates an elastic slider section
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Elastic_Slider_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'elastic-slider-widget',

			// The name of the widget for display purposes.
			__('Elastic Slider', 'framework'),

			array(
				'description' => __('Creates an elastic slider section.', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/elastic-slider',
				'has_preview' => false,
			),

			//The $control_options array, which is passed through to WP_Widget
			array(
			),

			$form_options = array(
				'slider' => array(
					'type'    => 'select',
					'label'   => __( 'Select slider', 'framework' ),
					'options' => $this->get_sliders(),
				),
			)
		);
	}


	function get_sliders() {  
		$sliders = array();
		$args    = array(
			'post_type'     => 'elastic_slider',
			'post_per_page' => - 1,
		);
		$query   = new WP_Query( $args );
		if ( $query->have_posts() ) {   
			while ( $query->have_posts() ) {
				$query->the_post();
				$sliders[ $query->post->ID ] = $query->post->post_title;
			}
		}

		return $sliders;   
	}


	function get_template_name($instance) {
		return 'default';
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'slider' => ! empty( $instance['slider'] ) ? $instance['slider'] : '',
		);
	}

	function get_style_name($instance) {
		return '';
	}

} // class Elastic _Slider_Widget

siteorigin_widget_register('elastic-slider-widget', __FILE__, 'Elastic_Slider_Widget');