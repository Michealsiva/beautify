<?php
/*
Widget Name: Image 
Description: A simple image widget
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/

class Image_Widget extends SiteOrigin_Widget {  
	function __construct() {
		parent::__construct(
			'image-widget',
			__('Image', 'framework'),
			array(
				'description' => __('A simple image widget', 'framework'),
				'help' => 'https://www.webulousthemes.com/docs/widgets/image',
			    'has_preview' => false,
			),
			array(

			),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function initialize_form() {

		return array(
			'image' => array(
				'type' => 'media',
				'label' => __('Image file', 'framework'),
				'library' => 'image',
				'fallback' => true,
			),

			'size' => array(
				'type' => 'image-size',
				'label' => __('Image size', 'framework'),
			),

			'image_type' => array(
				'type' => 'select',
				'label' => __('Image Type', 'framework'),
				'default' => 'default',
				'options' => array(
					'default' => __('Default', 'framework'),
					'img-circle' => __('Circle', 'framework'), 
					'img-border' => __('Border', 'framework'),
					'img-shadow' => __('Shadow', 'framework'),   
				),
			),

			'align' => array(
				'type' => 'select',
				'label' => __('Image alignment', 'framework'),
				'default' => 'default',
				'options' => array(
					'default' => __('Default', 'framework'),
					'left' => __('Left', 'framework'),
					'right' => __('Right', 'framework'),
					'center' => __('Center', 'framework'),
				),
			),

			'title' => array(
				'type' => 'text',
				'label' => __('Title text', 'framework'),
			),

			'title_position' => array(
				'type' => 'select',
				'label' => __('Title position', 'framework'),
				'default' => 'hidden',
				'options' => array(
					'hidden' => __( 'Hidden', 'framework' ),
					'above' => __( 'Above', 'framework' ),
					'below' => __( 'Below', 'framework' ),
				),
			),
			'title_alignment' => array(
				'type' => 'select',
				'label' => __('Title Alignment', 'framework'),
				'default' => 'hidden',
				'options' => array(
					'left' => __( 'Left', 'framework' ),
					'center' => __( 'Center', 'framework' ),
					'right' => __( 'Right', 'framework' ),
				),
			),

			'alt' => array(
				'type' => 'text',
				'label' => __('Alt text', 'framework'),
			),

			'url' => array(
				'type' => 'link',
				'label' => __('Destination URL', 'framework'),
			),
			'new_window' => array(
				'type' => 'checkbox',
				'default' => false,
				'label' => __('Open in new window', 'framework'),
			),

		);
	}

	public function get_template_variables( $instance, $args ) {
		return array(
			'title' => $instance['title'],
			'title_position' => $instance['title_position'],
			'title_alignment'=> $instance['title_alignment'],
			'image' => $instance['image'],
			'size' => $instance['size'],
			'image_fallback' => ! empty( $instance['image_fallback'] ) ? $instance['image_fallback'] : false,
			'alt' => $instance['alt'],
			'url' => $instance['url'],
			'align' => $instance['align'],
			'image_type' => $instance['image_type'],
			'new_window' => $instance['new_window'],
		);
	}  

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}
}

siteorigin_widget_register('image-widget', __FILE__, 'Image_Widget');
