<?php
/*
Widget Name: Recent Work 
Description: Creates a recent work section with multiple option
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
class Recent_Work_Widget extends SiteOrigin_Widget {

	function __construct() {  

		parent::__construct(

			// The unique id for your widget.
			'recent-work-widget',

			// The name of the widget for display purposes.
			__('Recent Work', 'framework'),

			array(
				'description' => __('Creates a recent work section with multiple option', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/recent-work',
				'has_preview' => false,
			),

			//The $control_options array, which is passed through to WP_Widget
			array(
			)
	
		);
	}

	function get_widget_form() {
		return $form_options = array(
			'count' => array(
				'type' => 'number',
				'label' => __( 'No. of Items to show', 'framework' ),
			),
			'portfolio_cat' => array(
				'type' => 'select',
				'label' => __( 'Select Category', 'framework' ),
				'default' => 'all',
				'multiple' => true,
				//'options' => array(),
				'options' => $this->get_portfolio_cats(),
				
			),
			'skills' => array(
				'type' => 'select',
				'label' => __( 'Select Skill', 'framework' ),
				'default' => 'all',
				'multiple' => true,
				'options' =>$this->get_portfolio_skills(),
			),
			'type' => array(
				'type' => 'select',
				'label' => __( 'Select Type', 'framework' ),
				'default' => 'isotope',
				'options' => array(
					'isotope' => __( 'Isotope', 'framework' ),
					'carousel' => __( 'Carousel', 'framework' ),
				),
			),
			'columns' => array(
				'type' => 'select',
				'label' => __( 'No. of columns', 'framework' ),
				'default' => '2',
				'options' => array(
					'2' => __( 'Two Column', 'framework' ),
					'3' => __( 'Three Column', 'framework' ),
					'4' => __( 'Four Column', 'framework' ),
				),
			),
			'filter_type' => array(
				'type' => 'select',
				'label' => __( 'Filter Type Menu', 'framework' ),
				'default' => 'show',
				'options' => array(
					'show' => 'Show',
					'without-all' => 'Show Without "All"',
					'hide' => 'Hide',
				),
			),
			'layout' => array(
				'type' => 'checkbox',
				'label' => __( 'Enable Masonry Layout', 'framework' ),
				'default' => false,
			),
			'gap' => array(
				'type' => 'checkbox',
				'label' => __( 'Enable Without Gap', 'framework' ),
				'default' => false,
			),

		);
	}

	function get_portfolio_cats() {
		$portfolio_cats_terms = get_terms( array( 'taxonomy' => 'portfolio_cat', 'hide_empty' => false ) );
		$portfolio_cats = array();
		foreach($portfolio_cats_terms as $term) {
			$portfolio_cats[$term->slug] = $term->name;
		}
		return $portfolio_cats;
	}

	function get_portfolio_skills() {
		$portfolio_skills_terms = get_terms( array( 'taxonomy' => 'skills', 'hide_empty' => false ) );
		$portfolio_skills = array();
		foreach($portfolio_skills_terms as $term) {
			$portfolio_skills[$term->slug] = $term->name;
		}
		return $portfolio_skills;
	}
	function get_template_name($instance) {
		return 'default';
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'count' => ! empty( $instance['count'] ) ? $instance['count'] : '12',
			'portfolio_cat' => ! empty( $instance['portfolio_cat'] ) ? $instance['portfolio_cat'] : 'all',
			'skill' => ! empty( $instance['skills'] ) ? $instance['skills'] : 'all',
			'type' => ! empty( $instance['type'] ) ? $instance['type'] : 'isotope',
			'filter_type' => ! empty( $instance['filter_type'] ) ? $instance['filter_type'] : 'show',
			'columns' => ! empty( $instance['columns'] ) ? $instance['columns'] : '2',
			'portfolio_cats' => $this->get_portfolio_cats(),
			'skills' => $this->get_portfolio_skills(),
			'layout' => ! empty( $instance['layout'] ) ? $instance['layout'] : false,
			'gap' => ! empty( $instance['gap'] ) ? $instance['gap'] : false,

		);
	}

	function get_style_name($instance) {
		return '';
	}

} // class Recent_Work_Widget

siteorigin_widget_register('recent-work-widget', __FILE__, 'Recent_Work_Widget');