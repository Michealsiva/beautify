<?php
/*
Widget Name: Accordion 
Description: Creates accordion content section
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Accordion_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'accordion-widget',

			// The name of the widget for display purposes.
			__('Accordion', 'framework'),

			array(
				'description' => __('Creates accordion content section', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/accordion',
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
			'accordion' => array(
				'type' => 'repeater',
				'label' => __( 'Accordion' , 'framework' ),
				'item_name'  => __( 'Accordion item', 'framework' ),
				'item_label' => array(
					'selector'     => "[id*='accordion']",   
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'title' => array(
						'type' => 'text', 
						'label' => __( 'A text field in a repeater item.', 'framework' )
					),
					'content' => array(
						'type' => 'tinymce',
						'label' => __( 'Content', 'framework' ),
						'rows' => 5,
					),     
				)
			)
		);
	}
	
	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

} // class Accordion_Widget

siteorigin_widget_register('accordion-widget', __FILE__, 'Accordion_Widget');