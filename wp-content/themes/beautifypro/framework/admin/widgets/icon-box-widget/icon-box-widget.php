<?php
/*
Widget Name: Icon Box 
Description: Creates an Icon Box that displays Icons and Text.
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Icon_Box_Widget extends SiteOrigin_Widget {

	function __construct() {  

		parent::__construct(

		// The unique id for your widget.
			'icon-box-widget',

			// The name of the widget for display purposes.
			__('Icon Box', 'framework'),

			array(
				'description' => __('Creates an Icon Box that displays Icons and Text.', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/icon-box',
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
				'content_section' => array(
					'type' => 'section',
					'label' => __( 'Content fields.' , 'framework' ),
					'hide' => false,
					'fields' => array(
						'title' => array(
							'type' => 'text',
							'label' => __( 'Title', 'framework' ),
						),
						'content' => array(
							'type' => 'tinymce',
							'label' => __( 'Content.', 'framework' ),
							'rows' => 5,
						),
						'more' => array(
							'type' => 'text',
							'label' => __( 'Read More Text', 'framework' ),
						),
						'more_url' => array(
							'type' => 'link',
							'label' => __('Read More URL', 'framework'),
						)
					)
				),
				'icon_section' => array(
					'type' => 'section',
					'label' => __( 'Icon fields.' , 'framework' ),
					'hide' => false,
					'fields' => array(
						'icon' => array(
							'type' => 'icon',
							'label' => __('Select an icon', 'framework'),
						),
						'icon_color' => array(
							'type' => 'color',
							'label' => __( 'Icon Color.', 'framework' ),
						),
						'icon_background' => array(
							'type' => 'color',
							'label' => __( 'Icon Background.', 'framework' ),
						),
						'icon_size' => array(
							'type'  => 'measurement',
							'label' => __( 'Size', 'so-widgets-bundle' ),
						),
						'image' => array( 
							'type' => 'media',
							'label' => __( 'Icon image', 'framework' ),
							'library' => 'image'
						),
						'icon_position' => array(
							'type' => 'select',
							'label' => __( 'Icon Position', 'framework' ),
							'default' => '',
							'options' => array(
								'icon-top' => __('Top','framework'),
								'icon-left' => __('Left','framework'),	
								'icon-right' => __('Right','framework'),
							),
						),  
					)
				),
				'options_section' => array(
					'type' => 'section',
					'label' => __( 'Options' , 'framework' ),
					'hide' => true,
					'fields' => array(   
						'all_linkable' => array(
							'type' => 'checkbox',
							'label' => __('Link title and icon to "More URL"', 'framework'),
						),
						'new_window' => array(
							'type' => 'checkbox',
							'label' => __('Open in new window?', 'framework'),
						),
					)
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
		$icon_styles = array();
		if( ! empty( $instance['icon_section']['icon_size'] ) ) :
			$icon_styles[] = 'font-size: ' .  $instance['icon_section']['icon_size'];
		endif;
		if( ! empty( $instance['icon_section']['icon_color'] ) ) :
			$icon_styles[] = 'color:' . $instance['icon_section']['icon_color'] . ';';
		endif;
		return array(
			'title' =>$instance['content_section']['title'],
			'content' =>$instance['content_section']['content'],
			'more' =>$instance['content_section']['more'],
			'more_url' => $instance['content_section']['more_url'],
			'icon' => $instance['icon_section']['icon'],
			'icon_styles' => $icon_styles,
			'image' => $instance['icon_section']['image'],
			'icon_position' => $instance['icon_section']['icon_position'],  
			'all_linkable' => $instance['options_section']['all_linkable'],
			'new_window' => $instance['options_section']['new_window']
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

} // class Icon_Box_Widget

siteorigin_widget_register('icon-box-widget', __FILE__, 'Icon_Box_Widget');