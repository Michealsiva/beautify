<?php
/*
Widget Name: Faq 
Description: Creates an faq section
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Faq_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'faq-widget',

			// The name of the widget for display purposes.
			__('Faq', 'framework'),

			array(
				'description' => __('Creates an faq section.', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/faq',
				'has_preview' => false,
			),

			//The $control_options array, which is passed through to WP_Widget
			array(
			)

		);
	}

   function get_widget_form() {
        return $form_options = array(
			'faq' => array(
				'type' => 'select',
				'label' => __( 'Select faq group', 'framework' ),
				'options' => $this->get_faq_groups(),
			),
			'items' => array(
				'type' => 'number',
				'label' => __( 'FAQs to show?', 'framework' ),
				'default' => '5',
			),

		);
   }
  

	function get_faq_groups() {
		$faq_groups = array();
		$term_list = get_terms( 'faq_group' );
		foreach ( $term_list as $term ) {
			$faq_groups[$term->slug] = $term->name;
		}  
		return $faq_groups;
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'items' => ! empty( $instance['items'] ) ? $instance['items'] : '5',
			'faq' => ! empty( $instance['faq'] ) ? $instance['faq'] : '',
		);
	}

	function get_style_name($instance) {
		return ''; 
	}

} // class Faq_Widget

siteorigin_widget_register('faq-widget', __FILE__, 'Faq_Widget');