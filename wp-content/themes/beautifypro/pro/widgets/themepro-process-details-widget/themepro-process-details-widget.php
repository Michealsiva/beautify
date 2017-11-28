<?php
/*
Widget Name: Cleanse Pro: Team Member 2
Description: Creates Team Members
Author: N. Venkat Raj
Author URI: https://www.genexthemes.com
Widget URI: todo
Video URI: todo
*/
class ThemePro_Process_Details_Widget extends SiteOrigin_Widget {
 
	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'themepro-process-details-widget',

			// The name of the widget for display purposes.
			__('Theme Pro Process Details Widget', 'framework'),

			array(
				'description' => __('Display Team Member', 'framework'),
				'help'        => 'https://www.genexthemes.com/docs/widgets/best-sale-product',
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
				'design-process' => array(
					'type' => 'repeater',
					'label' => __( 'ThemePro Process Details' , 'framework' ),
					'item_name'  => __( 'Member item', 'framework' ),
					'item_label' => array(
						'selector'     => "[id*='process_name']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array( 
						'process_name'        => array(
							'type'  => 'text',
							'label' => __( 'Design Process Name', 'framework' )
						),
						'process_background' => array(
							'type' => 'color',
							'label' => __( 'Icon Background.', 'framework' ),
						),
						'member_content'     => array(
							'type'  => 'tinymce',
							'label' => __( 'Content', 'framework' ),
							'rows'  => 5,
						),
					),
				)

		);
	}
	 
	function get_template_name($instance) {
		return 'default';
	}

	/*
	function get_template_variables( $instance, $args ) {
		return array(
			'client_testimonial' => ! empty( $instance['client_testimonial'] ) ? $instance['client_testimonial'] : '' ,
			'client_name' => ! empty( $instance['client_name'] ) ? $instance['client_name'] : '' ,
			'client_company' => ! empty( $instance['client_company'] ) ? $instance['client_company'] : '' ,
			'client_website' => ! empty( $instance['client_website'] ) ? $instance['client_website'] : '' ,
		);
	}
	*/

	function get_style_name($instance) {
		return '';
	}

} // class ThemePro_Process_Details_Widget

siteorigin_widget_register('themepro-process-details-widget', __FILE__, 'ThemePro_Process_Details_Widget');