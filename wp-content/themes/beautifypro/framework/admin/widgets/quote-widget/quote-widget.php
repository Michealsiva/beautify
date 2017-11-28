<?php
/*
Widget Name: Quote 
Description: Creates stylish quotes
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Quote_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'quote-widget',

			// The name of the widget for display purposes.
			__('Quote', 'framework'),

			array(
				'description' => __('Creates stylish quotes', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/quote',
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
				'quote_alignment' => array(
					'type' => 'select',
					'label' => __('Quote Alignment', 'framework'),
					'default' => 'none',
					'options' => array(
						'none' => __( 'Normal Blockquote','framework' ),
						'left' => __( 'Pull Left','framework' ),
						'right' => __( 'Pull Right','framework' ),
					)
				),
				'quote_content' => array(
					'type' => 'tinymce',
					'label' => __('Quote Content', 'framework'),
				),
				'content' => array(
					'type' => 'tinymce',
					'label' => __('Content', 'framework'),
				),
		);
	}
	/**
	 * Get the template variables for the headline
	 *
	 * @param $instance
	 * @param $args
	 *
	 * @return array
	 */
	function get_template_variables( $instance, $args ) {
		return array(
			'quote_alignment' => ! empty( $instance['quote_alignment'] ) ? $instance['quote_alignment'] : '',
			'quote_content' => ! empty( $instance['quote_content']) ? $instance['quote_content'] : '',
			'content' => ! empty( $instance['content']) ? $instance['content'] : '',
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

} // class Quote_Widget

siteorigin_widget_register('quote-widget', __FILE__, 'Quote_Widget');