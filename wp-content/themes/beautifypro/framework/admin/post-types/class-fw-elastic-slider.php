<?php

	class Fw_Elastic_Slider {
		
		protected $_labels = array();
		protected $_args = array();


		/**
		 * Fw_Elastic_Slider constructor. 
		 */
		public function __construct() {
			$this->_labels = apply_filters( 'elastic_slider_post_type_labels', array(
				'name' => __( 'Elastic Sliders', 'framework' ),
				'singular_name' => __( 'Elastic Slider', 'framework' ),
				'add_new' => __( 'Add New Slide', 'framework' ),
				'add_new_item' => __( 'Add New Slide', 'framework' ),
				'edit_item' => __( 'Edit Slide', 'framework' ),
				'new_item' => __( 'New Slide', 'framework' ),
				'all_items' => __( 'All Slides', 'framework' ),
				'view_item' => __( 'View Slide', 'framework' ),
				'search_items' => __( 'Search Slides', 'framework' ),
				'not_found' =>  __( 'No Slides Found', 'framework' ),
				'not_found_in_trash' => __( 'No Slides Found in Trash', 'framework' ),
				'parent_item_colon' => '',
				'menu_name' => 'Elastic Sliders',
				)
			); 

			$this->_args = apply_filters( 'elastic_slider_post_type_args', array(
				'public' => true,
				'show_ui' => true,
				'menu_icon' => 'dashicons-images-alt2',
				'supports' => array( 'title', 'thumbnail' ),
				'labels' => $this->_labels
				)
			);
		}


		/**
		 * Register Post Type
		 */
		public function register() {
			register_post_type( 'elastic_slider', $this->_args );
		}


		public function add_meta_boxes( $meta_boxes ) {
			$elastic_slider_fields = array(
				array(
					'id'      => '_gx_elastic_slider_image',
					'name'    => __( 'Image', 'framework' ),
					'type'    => 'image_advanced',
					'max_file_uploads' => 1,
					'columns' => 12,
				),
				array(
					'id'      => '_gx_elastic_slider_caption1',
					'name'    => __( 'Title 1', 'framework' ),
					'type'    => 'text',
					'columns' => 12,
				),
				array(
					'id'      => '_gx_elastic_slider_caption2',
					'name'    => __( 'Title 2', 'framework' ),
					'type'    => 'text',
					'columns' => 12,
				),
			);

			$meta_boxes[] = array(
				'title'      => __( 'Slide', 'framework' ),
				'post_types' => array( 'elastic_slider' ),
				'fields'     => array(
					array(
						'id'         => '_gx_elastic_slider_slide',
						// Group field
						'type'       => 'group',
						// Clone whole group?
						'clone'      => true,
						// Drag and drop clones to reorder them?
						'sort_clone' => true,
						'fields'     => $elastic_slider_fields
					),
				)
			);

		    return $meta_boxes;
        }

	}