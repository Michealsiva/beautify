<?php

/*
Widget Name: Team Member 
Description: Creates a team member content
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/

class Team_Member_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

		// The unique id for your widget.
			'team-member-widget',

			// The name of the widget for display purposes.
			__( 'Team Member', 'framework' ),

			array(
				'description' => __( 'Creates a team member content', 'framework' ),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/team-team',
				'has_preview' => false,
			),

			//The $control_options array, which is passed through to WP_Widget
			array(),

			false
		);
	}

    function initialize_form() {
    	return array(
				'name'        => array(
					'type'  => 'text',
					'label' => __( 'Name of team member.', 'framework' )
				),
				'designation' => array(
					'type'  => 'text',
					'label' => __( 'Designation of team member.', 'framework' )
				),
				'image'       => array(
					'type'     => 'media',
					'label'    => __( 'Picture of team member.', 'framework' ),
					'choose'   => __( 'Choose image', 'framework' ),
					'update'   => __( 'Set image', 'framework' ),
					'library'  => 'image',
					'fallback' => true,
				),
				'more_url'    => array(
					'type'  => 'link',
					'label' => __( 'Linkable Image', 'framework' ),
				),
				'content'     => array(
					'type'  => 'tinymce',
					'label' => __( 'Content', 'framework' ),
					'rows'  => 5,
				),
				'social_site' => array(
					'type'      => 'repeater',
					'label'     => __( 'Add a social site', 'framework' ),
					'item_name' => __( 'Social Site', 'framework' ),
					'fields'    => array(
						'site_name'   => array(
							'type'  => 'text',
							'label' => __( 'Social Site name', 'framework' )
						),
						'icon'        => array(
							'type'  => 'icon',
							'label' => __( 'Choose site icon', 'framework' )
						),
						'profile_url' => array(
							'type'  => 'link',
							'label' => __( 'Enter your profile URL', 'framework' )
						),
					),
				),
		);
	}
	
	function get_template_variables( $instance, $args ) {  
		return array(
			'name'           => ! empty( $instance['name'] ) ? $instance['name'] : '',
			'designation'    => ! empty( $instance['designation'] ) ? $instance['designation'] : '',
			'image'          => ! empty( $instance['image'] ) ? $instance['image'] : '',
			'image_fallback' => ! empty( $instance['image_fallback'] ) ? $instance['image_fallback'] : false,
			'content'        => ! empty( $instance['content'] ) ? $instance['content'] : '',
			'more_url'       => $instance['more_url'],
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}

	function get_style_name( $instance ) {
		return '';
	}

} // class Team_Member_Widget

siteorigin_widget_register( 'team-member-widget', __FILE__, 'Team_Member_Widget' );