<?php


class Fw_Flexslider {

	protected $_labels = array();
	protected $_args = array(); 

	/**
	 * Fw_Flexslider constructor.
	 */
	public function __construct() {   
		$this->_labels = apply_filters( 'flex_slider_post_type_labels', array(
				'name'               => __( 'Flex Sliders', 'framework' ),
				'singular_name'      => __( 'Flex Slider', 'framework' ),
				'add_new'            => __( 'Add New Slide', 'framework' ),
				'add_new_item'       => __( 'Add New Slide', 'framework' ),
				'edit_item'          => __( 'Edit Slide', 'framework' ), 
				'new_item'           => __( 'New Slide', 'framework' ),
				'all_items'          => __( 'All Slides', 'framework' ),
				'view_item'          => __( 'View Slide', 'framework' ),
				'search_items'       => __( 'Search Slides', 'framework' ),
				'not_found'          => __( 'No Slides Found', 'framework' ),
				'not_found_in_trash' => __( 'No Slides Found in Trash', 'framework' ),
				'parent_item_colon'  => '',
				'menu_name'          => 'Flex Sliders'
			)
		);

		$this->_args = apply_filters( 'flex_slider_post_type_args', array(
				'public'    => true,
				'show_ui'   => true,
				'menu_icon' => 'dashicons-images-alt',
				'supports'  => array( 'title' ),
				'labels'    => $this->_labels
			)
		);
		/*
					$this->_taxonomy_labels = apply_filters( 'flex_slider_taxonomy_labels', array(
						'name' => _x( 'Slide Groups', 'taxonomy general name', 'framework' ),
						'singular_name' => _x( 'Slide Group', 'taxonomy singular name', 'framework' ),
						'search_items' =>  __( 'Search Slide Groups', 'framework' ),
						'all_items' => __( 'All Slide Groups', 'framework' ),
						'parent_item' => __( 'Parent Slide Group', 'framework' ),
						'parent_item_colon' => __( 'Parent Slide Group:', 'framework' ),
						'edit_item' => __( 'Edit Slide Group', 'framework' ),
						'update_item' => __( 'Update Slide Group', 'framework' ),
						'add_new_item' => __( 'Add New Slide Group', 'framework' ),
						'new_item_name' => __( 'New Slide Group Name', 'framework' ),
						'menu_name' => __( 'Slide Groups', 'framework' ),
						)
					);

					$this->_taxonomy_args = apply_filters( 'flex_slider_taxonomy_args', array(
						'public' => true,
						'show_ui' => true,
						'hierarchical' => true,
						'labels' => $this->_taxonomy_labels,
						'query_var' => 'flexslider_group'
						)
					);
		*/
	}

	/**
	 * Register Flexslider Post Type
	 */
	public function register() {
		register_post_type( 'flexslider', $this->_args );
		//register_taxonomy( 'flexslider_group', array('flexslider'), $this->_taxonomy_args );
		//register_taxonomy_for_object_type('flexslider_group', 'flexslider');

	}


	public function add_meta_boxes( $meta_boxes ) {
		
		$flexslider_fields = array(
			array(
				'id'      => '_gx_flexslider_type',
				'name'    => __( 'Type', 'framework' ),
				'type'    => 'radio',
				'options' => array(
					'image' => __( 'Image', 'framework' ),
					'video' => __( 'Video', 'framework' ),
					'map' => __( 'Google Map', 'framework' ),
				),
				'std'     => 'image',
			),
			array(
				'id'      => '_gx_flexslider_video',
				'name'    => __( 'Video', 'framework' ),
				'type'    => 'oembed',
				'hidden'  => array( '_gx_flexslider_type', '!=', 'video' ) 
			), 
			array(
				'id'      => '_gx_flexslider_image',
				'name'    => __( 'Image', 'framework' ),
				'type'    => 'image_advanced',
				'max_file_uploads' => 1,
				'hidden'  => array( '_gx_flexslider_type', '!=', 'image' )
			),
			array(
				'id'      => '_gx_flexslider_map_type',
				'name'    => __( 'Google Map type', 'framework' ),
				'type'    => 'radio',
				'options' => array(
					'iframe' => __( 'Embed iframe Link', 'framework' ),
					'api' => __( 'API Key', 'framework' ), 
				),
				'hidden'  => array( '_gx_flexslider_type', '!=', 'map' )
			),
			array(
				'id'   => '_gx_flexslider_map_embed',
				'name' => __( 'Enter Google iframe link', 'framework' ), 
				'type' => 'text',
				'hidden'    => array(  
					'when' => array( 
						array( '_gx_flexslider_type', '!=', 'map' ),
						array('_gx_flexslider_map_type','!=', 'iframe'),
					),
					'relation' => 'or'
				),
			),  

			// Map requires at least one address field (with type = text)
			array(
				'id'   => '_gx_flexslider_map_api',
				'name' => __( 'Enter API Key', 'framework' ), 
				'type' => 'text',
				'hidden'=> array(  
					'when' => array( 
						array( '_gx_flexslider_type', '!=', 'map' ),
						array('_gx_flexslider_map_type','!=', 'api'),
					),
					'relation' => 'or'
				),
				'desc' => sprintf( __('Enter your <a href="%1$s" target="_blank">API key</a>. Your map may not function correctly without one.','framework'),'https://developers.google.com/maps/documentation/javascript/get-api-key'),
			),
			array(
				'id'   => '_gx_flexslider_address',
				'name' => __( 'Address', 'framework' ), 
				'type' => 'text', 
				'hidden'    => array(  
					'when' => array( 
						array( '_gx_flexslider_type', '!=', 'map' ),
						array('_gx_flexslider_map_type','!=', 'api'),
					),
					'relation' => 'or' 
				), 
			), 
			  
			/* array(   
				'id'            => '_gx_flexslider_map',
				'name'          => __( 'Location', 'framework' ),      
				'type'          => 'map',
				// Default location: 'latitude,longitude[,zoom]' (zoom is optional)
				'std'           => '-6.233406,-35.049906,12',    
				// Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
				'address_field' => '_gx_flexslider_address',                          
			    'hidden'    => array(    
					'when' => array( 
						array( '_gx_flexslider_type', '!=', 'map' ),
						array('_gx_flexslider_map_type','!=', 'api'), 
					),
					'relation' => 'or'
				),
			), */

			array(
				'id'      => '_gx_flexslider_caption',
				'name'    => __( 'Caption', 'framework' ),
				'type'    => 'wysiwyg', 
				'options' => array(
					'media_buttons' => false,
					'quicktags'     => false,
					//'textarea_rows' => 5
				), 
				'columns' => 12,
			),
			/*
			array( 'id'   => '_gx_flexslider_url',
				   'name' => __( 'URL', 'framework' ),
				   'type' => 'url',
				   'columns' => 6,
			),
			array( 'id'   => '_gx_flexslider_new_window',
				   'name' => __( 'New Window', 'framework' ),
				   'type' => 'checkbox',
				   'columns' => 6,
			),
			*/
		);

		$meta_boxes[] = array(
			'title'      => __( 'Slide', 'framework' ),
			'post_types' => array( 'flexslider' ),
			'fields'     => array(
				array(
					'id'         => '_gx_flexslider_slide',
					// Group field
					'type'       => 'group',
					// Clone whole group?
					'clone'      => true,
					// Drag and drop clones to reorder them?
					'sort_clone' => true,
					'fields'     => $flexslider_fields
				),
			)
		);

		// Caption settings
		$meta_boxes[] = array( 
			'title'      => __( 'Caption Settings', 'framework' ),
			'post_types' => array( 'flexslider' ),
			'fields'     => array(
				array(
					'id'   => '_gx_flexslider_custom_caption',
					'name' => __( 'Enable custom caption Settings', 'framework' ),
					'type' => 'checkbox',
				),
				array(
					'id'     => '_gx_flexslider_caption_custom_settings',
					'type'   => 'group',  
					'hidden' => array('_gx_flexslider_custom_caption', false ),
					'fields' => array(
						array(
							'id'   => '_gx_flexslider_caption_bg',
							'name' => __( 'Caption background color', 'framework' ),
							'type' => 'color',
						),
						array(
							'id'   => '_gx_flexslider_caption_color',
							'name' => __( 'Caption font color', 'framework' ),
							'type' => 'color',
						),
						array(
							'id'      => '_gx_flexslider_caption_alignment',
							'name'    => __( 'Caption Alignment', 'framework' ),
							'type'    => 'select',
							'options' => array(
								'' =>  __( '-- Select alignment --', 'framework' ),
								'left'    => __( 'Left', 'framework' ),
								'right'   => __( 'Right', 'framework' ),
								'center'  => __( 'Center', 'framework' ),
								'justify' => __( 'Justify', 'framework' ),
							),
							'std'     => '', // Todo
						),
						array(
							'id'      => '_gx_flexslider_caption_transform',
							'name'    => __( 'Text Transform', 'framework' ),
							'type'    => 'select',
							'options' => array(
								'' =>  __( '-- Select text transform --', 'framework' ),
								'capitalize'    => __( 'Capitalize', 'framework' ),
								'uppercase'   => __( 'Uppercase', 'framework' ),
								'lowercase'  => __( 'Lowercase', 'framework' ),
								'full-width' => __( 'Full Width', 'framework' ),
							),
							'std'     => '', // Todo
						),
						array(
							'id'   => '_gx_flexslider_caption_width',
							'name' => __( 'Background width', 'framework' ),
							'type' => 'number',
							'min'  => 0,
							'std'  => 0,
						),
						array(
							'id'   => '_gx_flexslider_caption_horizontal_position',
							'name' => __( 'Background horizontal position', 'framework' ),
							'type' => 'number',
							'min'  => 0,
							'std'  => 0,
						),
						array(
							'id'   => '_gx_flexslider_caption_vertical_position',
							'name' => __( 'Background vertical position', 'framework' ),
							'type' => 'number',
							'min'  => 0,
							'std'  => 0,
						),
					),
				),
				/*array(
					'id'   => '_gx_flexslider_responsive_caption',
					'name' => __( 'Responsive Caption Position', 'framework' ),
					'type' => 'radio',
					'options' => array(
						'below'    => __( 'Below Slider', 'framework' ),
						'infront'   => __( 'Infront of Slider', 'framework' ),
					),
					'std' => 'below',
				),*/

			),
		);

		// Slider settings 

		$meta_boxes[] = array(
			'title'       => __( 'Slider Settings', 'framework' ),
			'post_types' => array( 'flexslider' ),
			'context'     => 'advanced',  
			'priority'    => 'high',
			'tabs'        => array(
				'common'           => __( ' Slider ', 'framework' ),
				'slide_speed'      => __( 'Slide Speed', 'framework' ),
				'button'      => __( ' Prev/Next Button ', 'framework' ),
				'carousel'    => __( ' Carousel ', 'framework' ),   
			),
			// Tab style: 'default', 'box' or 'left'. Optional
			'tab_style'   => 'box',    

			// Show meta box wrapper around tabs? true (default) or false. Optional
			'tab_wrapper' => true,
			'fields'     => array(
				array(
					'id'      => '_gx_flexslider_animation',
					'name'    => __( 'Animation effect', 'framework' ),
					'type'    => 'select',
					'options' => array(
						'fade'  => __( 'Fade', 'framework' ),
						'slide' => __( 'Slide', 'framework' ),
					),
					'std'     => 'slide',
					'tab'        => 'common',  
				), 
				array( 
					'id'      => '_gx_flexslider_slide_direction',
					'name'    => __( 'Slide Direction', 'framework' ),
					'type'    => 'radio',
					'options' => array(
						'horizontal' => __( 'Horizontal', 'framework' ),
						'vertical'   => __( 'Vertical', 'framework' ),         
					),
					'hidden'    => array(  
						'when' => array( 
							array( '_gx_flexslider_animation', 'fade' ),
							array('_gx_flexslider_carousel',true),
						),
						'relation' => 'or'
					),
					'tab'        => 'common',          
				),
				array(
					'id'   => '_gx_flexslider_slideshow_speed',
					'name' => __( 'Slideshow speed', 'framework' ),
					'type' => 'number',
					'std'  => 7000,     
					'min'  => 100,
					'tab'        => 'slide_speed',
				),
				array(
					'id'   => '_gx_flexslider_animation_speed',
					'name' => __( 'Animation speed', 'framework' ),
					'type' => 'number',
					'std'  => 600,
					'min'  => 100,
					'tab'        => 'slide_speed',
				),
				array(
					'id'   => '_gx_flexslider_slideshow',
					'name' => __( 'Animate slides automatically', 'framework' ),
					'type' => 'checkbox',
					'std'  => true,
					'tab'        => 'common',
				),
				array(
					'id'   => '_gx_flexslider_smooth_height',
					'name' => __( 'Smooth height', 'framework' ),
					'desc' => __( 'Allow height of the slider to animate smoothly in horizontal mode', 'framework' ),
					'type' => 'checkbox',
					'std'  => true,
					'tab'        => 'common',
				),
				array(
					'id'   => '_gx_flexslider_direction_nav',
					'name' => __( 'Display previous/next buttons', 'framework' ),
					'type' => 'checkbox',
					'std'  => true,
					'tab'        => 'button',
				),
				array(
					'id'   => '_gx_flexslider_control_nav',
					'name' => __( 'Display slideshow pagination', 'framework' ),
					'type' => 'checkbox',
					'std'  => true,
					'tab'        => 'button',
				),
				array(
					'id'   => '_gx_flexslider_keyboard',
					'name' => __( 'Keyboard Navigation', 'framework' ),
					'type' => 'checkbox',
					'std'  => true,
					'tab'        => 'button',
				),
				array(
					'id'   => '_gx_flexslider_mouse_wheel',
					'name' => __( 'Mouse wheeel navigation', 'framework' ),
					'type' => 'checkbox',
					'std'  => false,
					'tab'        => 'button',
				),
				array(
					'id'   => '_gx_flexslider_pause_play',
					'name' => __( 'Enable pause/play element', 'framework' ),
					'type' => 'checkbox',
					'std'  => false,
					'tab'        => 'button',
				),
				array(
					'id'   => '_gx_flexslider_randomize',
					'name' => __( 'Enable random slide order', 'framework' ),
					'type' => 'checkbox',
					'std'  => false,
					'tab'        => 'common',
				),
				array(
					'id'   => '_gx_flexslider_animation_loop',
					'name' => __( 'Enable animation loop', 'framework' ),
					'type' => 'checkbox',
					'std'  => true,
					'tab'        => 'common',
				),
				array(
					'id'   => '_gx_flexslider_pause_on_action',
					'name' => __( 'Pause while using navigation', 'framework' ),
					'type' => 'checkbox',
					'std'  => true,
					'tab'        => 'button',
				),
				array(
					'id'   => '_gx_flexslider_pause_on_hover',
					'name' => __( 'Pause while mouse over slide', 'framework' ),
					'type' => 'checkbox',
					'std'  => false,
					'tab'        => 'button',
				),
				array(
					'id'   => '_gx_flexslider_play_text',
					'name' => __( 'Play button text', 'framework' ),
					'type' => 'text',
					'std'  => __( 'Play', 'framework' ),
					'tab'        => 'button',
				),
				array(
					'id'   => '_gx_flexslider_pause_text',
					'name' => __( 'Pause button text', 'framework' ),
					'type' => 'text',
					'std'  => __( 'Pause', 'framework' ),
					'tab'        => 'button',
				),
				array(
					'id'   => '_gx_flexslider_prev_text',
					'name' => __( 'Previous button text', 'framework' ),
					'type' => 'text',
					'std'  => __( 'Previous', 'framework' ),
					'tab'        => 'button',
				),
				array(
					'id'   => '_gx_flexslider_next_text',
					'name' => __( 'Next button text', 'framework' ),
					'type' => 'text',
					'std'  => __( 'Next', 'framework' ),
					'tab'        => 'button',  
				), 
				array(
					'id'   => '_gx_flexslider_carousel',
					'name' => __( 'Enable slider as a carousel', 'framework' ),
					'type' => 'checkbox', 
					'std'  => false,
					'tab'        => 'carousel',
				),  
				array(   
					'id'   => '_gx_flexslider_item_width', 
					'name' => __( 'Carousel item width', 'framework' ),
					'type' => 'number',
					'std'  => 0,         
					'tab'        => 'carousel',           
					'visible'    => array( '_gx_flexslider_carousel', true),  
				),         
				array( 
					'id'   => '_gx_flexslider_item_margin', 
					'name' => __( 'Carousel item margin', 'framework' ),
					'type' => 'number',     
					'std'  => 0,
					'tab'        => 'carousel',    
					'visible'    => array( '_gx_flexslider_carousel',true),
				),
			), 
		);

		return $meta_boxes;


	}
}

			
		