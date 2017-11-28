<?php
/*
Widget Name: Tabs 
Description: Creates tabbed content section
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Tabs_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'tabs-widget',

			// The name of the widget for display purposes.
			__('Tabs', 'framework'),

			array(
				'description' => __('Creates tabbed content section', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/tabs',
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
				'tabs' => array(
					'type' => 'repeater',
					'label' => __( 'Tabs.' , 'framework' ),
					'item_name'  => __( 'Tab item', 'framework' ),
					'item_label' => array(
						'selector'     => "[id*='title']",
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
							'label' => __( 'Content.', 'framework' ),
							'rows' => 5,
						),
					)
				),
				'alignment' => array(
					'type' => 'select',
					'label' => __( 'Tabs alignment', 'framework' ),
					'default' => 'normal',
					'options' => array(
						'normal' => __( 'Normal','framework' ),
						'center' => __( 'Center','framework' ),
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

} // class Tabs_Widget

siteorigin_widget_register('tabs-widget', __FILE__, 'Tabs_Widget');