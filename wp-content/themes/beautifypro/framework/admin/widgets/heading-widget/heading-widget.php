<?php
/*
Widget Name: Heading 
Description: Create Heading Section
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/

class Heading_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			// The unique id for your widget.
			'heading-widget',

			// The name of the widget for display purposes.
			__('Heading', 'framework'),

			array(
				'description' => __('Create Heading Widget', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/heading',
				'has_preview' => false,
			),
			array(),
			false,
			plugin_dir_path(__FILE__).'../' 
		);
	}

	function initialize_form(){
		return array(
			'headline' => array(
				'type' => 'section',
				'label'  => __( 'Heading', 'so-widgets-bundle' ),
				'hide'   => false,
				'fields' => array(
					'text' => array(
						'type' => 'text',
						'label' => __( 'Text', 'so-widgets-bundle' ),
					),
					'tag' => array(
						'type' => 'select',
						'label' => __( 'HTML Tag', 'so-widgets-bundle' ),
						'default' => 'h1',
						'options' => array(
							'h1' => __( 'H1', 'so-widgets-bundle' ),
							'h2' => __( 'H2', 'so-widgets-bundle' ),
							'h3' => __( 'H3', 'so-widgets-bundle' ),
							'h4' => __( 'H4', 'so-widgets-bundle' ),
							'h5' => __( 'H5', 'so-widgets-bundle' ),
							'h6' => __( 'H6', 'so-widgets-bundle' ),
							'p' => __( 'Paragraph', 'so-widgets-bundle' ),
						)
					),
					'color' => array(
						'type' => 'color',
						'label' => __('Color', 'so-widgets-bundle'),
					),
					'font' => array(
						'type' => 'font',
						'label' => __( 'Font', 'so-widgets-bundle' ),
						'default' => 'default'
					),
					'font_size' => array(
						'type' => 'measurement',
						'label' => __('Font Size', 'so-widgets-bundle')
					),
					'align' => array(
						'type' => 'select',
						'label' => __( 'Alignment', 'so-widgets-bundle' ),
						'default' => 'center',
						'options' => array(
							'center' => __( 'Center', 'so-widgets-bundle' ),
							'left' => __( 'Left', 'so-widgets-bundle' ),
							'right' => __( 'Right', 'so-widgets-bundle' ),
							'justify' => __( 'Justify', 'so-widgets-bundle' )
						)
					),
					'line_height' => array(
						'type' => 'measurement',
						'label' => __('Line Height', 'so-widgets-bundle')
					),
					'margin' => array(
						'type' => 'measurement',
						'label' => __('Top and Bottom Margin', 'so-widgets-bundle'),
						'default' => '',
					),
				)
			),
			'sub_headline' => array(
				'type' => 'section',
				'label'  => __( 'Sub headline', 'so-widgets-bundle' ),
				'hide'   => true,
				'fields' => array(
					'text' => array(
						'type' => 'text',
						'label' => __('Text', 'so-widgets-bundle')
					),
					'tag' => array(
						'type' => 'select',
						'label' => __( 'HTML Tag', 'so-widgets-bundle' ),
						'default' => 'p',
						'options' => array(
							'h1' => __( 'H1', 'so-widgets-bundle' ),
							'h2' => __( 'H2', 'so-widgets-bundle' ),
							'h3' => __( 'H3', 'so-widgets-bundle' ),
							'h4' => __( 'H4', 'so-widgets-bundle' ),
							'h5' => __( 'H5', 'so-widgets-bundle' ),
							'h6' => __( 'H6', 'so-widgets-bundle' ),
							'p' => __( 'Paragraph', 'so-widgets-bundle' ),
						)
					),
					'color' => array(
						'type' => 'color',
						'label' => __('Color', 'so-widgets-bundle'),
					),
					'font' => array(
						'type' => 'font',
						'label' => __( 'Font', 'so-widgets-bundle' ),
						'default' => 'default'
					),
					'font_size' => array(
						'type' => 'measurement',
						'label' => __('Font Size', 'so-widgets-bundle')
					),
					'align' => array(
						'type' => 'select',
						'label' => __( 'Alignment', 'so-widgets-bundle' ),
						'default' => 'center',
						'options' => array(
							'center' => __( 'Center', 'so-widgets-bundle' ),
							'left' => __( 'Left', 'so-widgets-bundle' ),
							'right' => __( 'Right', 'so-widgets-bundle' ),
							'justify' => __( 'Justify', 'so-widgets-bundle' )
						)
					),
					'width' => array(
						'type' => 'measurement',
						'label' => __('Width', 'so-widgets-bundle'),
						'default' => '80%',
					),
					'line_height' => array(
						'type' => 'measurement',
						'label' => __('Line Height', 'so-widgets-bundle')
					),
					'margin' => array(
						'type' => 'measurement',
						'label' => __('Top and Bottom Margin', 'so-widgets-bundle'),
						'default' => '',
					),
				)
			),
		);
	}

	function get_less_variables( $instance ) {
		$less_vars = array();

		// All the headline attributes
		$less_vars['headline_tag'] = isset( $instance['headline']['tag'] ) ? $instance['headline']['tag'] : false;
		$less_vars['headline_align'] = isset( $instance['headline']['align'] ) ? $instance['headline']['align'] : false;
		$less_vars['headline_color'] = isset( $instance['headline']['color'] ) ? $instance['headline']['color'] : false;
		$less_vars['headline_font_size'] = isset( $instance['headline']['font_size'] ) ? $instance['headline']['font_size'] : false;
		$less_vars['headline_line_height'] = isset( $instance['headline']['line_height'] ) ? $instance['headline']['line_height'] : false;
		$less_vars['headline_margin'] = isset( $instance['headline']['margin'] ) ? $instance['headline']['margin'] : false;

		// Heading font family and weight
		if ( ! empty( $instance['headline']['font'] ) ) {
			$font = siteorigin_widget_get_font( $instance['headline']['font'] );
			$less_vars['headline_font'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$less_vars['headline_font_weight'] = $font['weight'];
			}
		}

		// Set the sub headline attributes
		$less_vars['sub_headline_align'] = isset( $instance['sub_headline']['align'] ) ? $instance['sub_headline']['align'] : false;
		$less_vars['sub_headline_tag'] = isset( $instance['sub_headline']['tag'] ) ? $instance['sub_headline']['tag'] : false;
		$less_vars['sub_headline_color'] = isset( $instance['sub_headline']['color'] ) ? $instance['sub_headline']['color'] : false;
		$less_vars['sub_headline_font_size'] = isset( $instance['sub_headline']['font_size'] ) ? $instance['sub_headline']['font_size'] : false;
		$less_vars['sub_headline_line_height'] = isset( $instance['sub_headline']['line_height'] ) ? $instance['sub_headline']['line_height'] : false;
		$less_vars['sub_headline_margin'] = isset( $instance['sub_headline']['margin'] ) ? $instance['sub_headline']['margin'] : false;
        $less_vars['sub_headline_width'] = isset( $instance['sub_headline']['width'] ) ? $instance['sub_headline']['width'] : false;
		// Sub headline font family and weight
		if ( ! empty( $instance['sub_headline']['font'] ) ) {
			$font = siteorigin_widget_get_font( $instance['sub_headline']['font'] );
			$less_vars['sub_headline_font'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$less_vars['sub_headline_font_weight'] = $font['weight'];
			}
		}

		$less_vars['divider_style'] = isset( $instance['divider']['style'] ) ? $instance['divider']['style'] : false;
		$less_vars['divider_width'] = isset( $instance['divider']['width'] ) ? $instance['divider']['width'] : false;
		$less_vars['divider_thickness'] = isset( $instance['divider']['thickness'] ) ? intval( $instance['divider']['thickness'] ) . 'px' : false;
		$less_vars['divider_align'] = isset( $instance['divider']['align'] ) ? $instance['divider']['align'] : false;
		$less_vars['divider_color'] = isset( $instance['divider']['color'] ) ? $instance['divider']['color'] : false;
		$less_vars['divider_margin'] = isset( $instance['divider']['margin'] ) ? $instance['divider']['margin'] : false;

		return $less_vars;
	}

	function get_google_font_fields( $instance ) {
		return array(
			$instance['headline']['font'],
			$instance['sub_headline']['font'],
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
		if( empty( $instance ) ) return array();

		return array(
			'headline' => $instance['headline']['text'],
			'headline_tag' => $instance['headline']['tag'],
			'sub_headline' => $instance['sub_headline']['text'],
			'sub_headline_tag' => $instance['sub_headline']['tag'],
			'headline_align' => $instance['headline']['align'],
		);
	}


	
}

siteorigin_widget_register('heading-widget', __FILE__, 'Heading_Widget');

