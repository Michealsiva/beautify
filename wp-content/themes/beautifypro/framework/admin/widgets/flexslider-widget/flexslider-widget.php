<?php

/*
Widget Name: Flexslider 
Description: Creates an flexslider section
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/

class Flexslider_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(      

		// The unique id for your widget.
			'flexslider-widget',

			// The name of the widget for display purposes.
			__( 'Flexslider', 'framework' ),

			array(
				'description' => __( 'Creates an flexslider section.', 'framework' ),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/flexslider',
				'has_preview' => false,
			),

			//The $control_options array, which is passed through to WP_Widget
			array(),

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
			'post_type'     => 'flexslider',
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

	function get_template_name( $instance ) {
		return 'default';
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'slider' => ! empty( $instance['slider'] ) ? $instance['slider'] : '',
		);
	}

	function get_style_name( $instance ) {
		return '';
	}

} // class Flexslider_Widget

siteorigin_widget_register( 'flexslider-widget', __FILE__, 'Flexslider_Widget' );