<?php
/*
Widget Name: Recent Posts 
Description: Display Recent Post as Slider, Carousel
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Recent_Posts_Widget extends SiteOrigin_Widget {

	function __construct() {  

		parent::__construct(

		// The unique id for your widget.
			'recent-posts-widget',

			// The name of the widget for display purposes.
			__('Recent Posts', 'framework'),   

			array(
				'description' => __('Display Recent Post as Slider, Carousel', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/recent-post',
				'has_preview' => false,
			),

			//The $control_options array, which is passed through to WP_Widget
			array(
			)

		);
	}

	function get_widget_form() {
		return 	$form_options = array(
				'title' => array (
					'type' =>'text',
					'label'=>__('Title','framework'),
				),
				'count' => array(
					'type' => 'number',
					'label' => __( 'Recent Post Count', 'framework' ),
					'default' => 5,
				),
				'cat' => array(
					'type' => 'select',
					'label' => __( 'Select category', 'framework' ),
					'default' => 'all',
					'description' => __('Select Multiple Category Field','framework'),
					'multiple' => true,
					'options' =>$this->get_post_category(), 
			    ),
				'type' => array(
					'type' => 'select',
					'label' => __( 'Recent Post Type', 'framework' ),
					'default' => 'normal',
					'options' => array(
						'normal' => __( 'Normal', 'framework' ),
						'slider' => __( 'Slider', 'framework' ),
						'carousel' => __( 'Carousel', 'framework' ),
					)
				)
		);
	}


    function get_post_category() {  
		$post_cats_terms = get_terms( array( 'taxonomy' => 'category', 'hide_empty' => false ) );
		$post_cats = array();
		foreach($post_cats_terms as $term) {  
			$post_cats[$term->slug] = $term->name;
		}
		return $post_cats;
	}  

	function get_template_variables( $instance, $args ) {
		return array(
			'title' => ! empty( $instance['title'] ) ? $instance['title'] : '',
			'count' => ! empty( $instance['count'] ) ? $instance['count'] : 5 ,
			'cat' => ! empty( $instance['cat'] ) ? $instance['cat'] : '',
			'type' => ! empty( $instance['type'] ) ? $instance['type'] : 'normal',
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

} // class Accordion_Widget

siteorigin_widget_register('recent-posts-widget', __FILE__, 'Recent_Posts_Widget');