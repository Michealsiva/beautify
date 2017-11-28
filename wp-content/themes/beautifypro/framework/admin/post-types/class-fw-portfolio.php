<?php

	/**
	 * Created by PhpStorm.
	 * User: venkat
	 * Date: 24/11/15
	 * Time: 3:18 PM
	 */
	class Fw_Portfolio {
		
		protected $_labels = array();
		protected $_args = array();

		/**
		 * Fw_Portfolio constructor.
		 */
		public function __construct() { 
			$this->_labels = apply_filters( 'portfolio_post_type_labels', array(
				'name' => __( 'Projects', 'framework' ),
				'singular_name' => __( 'Project', 'framework' ),
				'add_new' => __( 'Add New Project', 'framework' ),
				'add_new_item' => __( 'Add New Project', 'framework' ),
				'edit_item' => __( 'Edit Project', 'framework' ),
				'new_item' => __( 'New Project', 'framework' ),
				'all_items' => __( 'All Projects', 'framework' ),
				'view_item' => __( 'View Project', 'framework' ),
				'search_items' => __( 'Search Projects', 'framework' ),
				'not_found' =>  __( 'No Projects Found', 'framework' ),
				'not_found_in_trash' => __( 'No Projects Found in Trash', 'framework' ),
				'parent_item_colon' => '',
				'menu_name' => 'Portfolios',
				)
			);

			$this->_args = apply_filters( 'portfolio_post_type_args', array(
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'portfolio' ),
				'has_archive' => true,
				'hierarchical' => true,
				'menu_icon' => 'dashicons-format-image',
				'supports' => array( 'title', 'editor', 'thumbnail' ),
				'labels' => $this->_labels
				)
			);

		}

		/**
		 * Assign Labels, Arguments
		 */
		public function get_skills_parameters(  ) {
			$skills_labels = apply_filters( 'portfolio_skills_taxonomy_labels', array(
					'name' => _x( 'Skills', 'taxonomy general name', 'framework' ),
					'singular_name' => _x( 'Skill', 'taxonomy singular name', 'framework' ),
					'search_items' =>  __( 'Search Skills', 'framework' ),
					'all_items' => __( 'All Skills', 'framework' ),
					'parent_item' => __( 'Parent Skill', 'framework' ),
					'parent_item_colon' => __( 'Parent Skill:', 'framework' ),
					'edit_item' => __( 'Edit Skill', 'framework' ),
					'update_item' => __( 'Update Skill', 'framework' ),
					'add_new_item' => __( 'Add New Skill', 'framework' ),
					'new_item_name' => __( 'New Skill Name', 'framework' ),
					'menu_name' => __( 'Skills', 'framework' ),
				)
			);

			$skills_parameters = apply_filters( 'portfolio_skills_taxonomy_args', array(
					'public' => true,
					'show_ui' => true,
					'hierarchical' => true,
					'labels' => $skills_labels,
					'query_var' => 'skills'
				)
			);

			return $skills_parameters;
		}

		public function get_portfolio_cat_parameters(  ) {
			$portfolio_cat_labels = apply_filters( 'portfolio_cat_taxonomy_labels', array(
					'name' => _x( 'Categories', 'taxonomy general name', 'framework' ),
					'singular_name' => _x( 'Category', 'taxonomy singular name', 'framework' ),
					'search_items' =>  __( 'Search Categories', 'framework' ),
					'all_items' => __( 'All Categories', 'framework' ),
					'parent_item' => __( 'Parent Category', 'framework' ),
					'parent_item_colon' => __( 'Parent Category:', 'framework' ),
					'edit_item' => __( 'Edit Category', 'framework' ),
					'update_item' => __( 'Update Category', 'framework' ),
					'add_new_item' => __( 'Add New Category', 'framework' ),
					'new_item_name' => __( 'New Category Name', 'framework' ),
					'menu_name' => __( 'Categories', 'framework' ),
				)
			);

			$portfolio_cat_parameters = apply_filters( 'portfolio_cat_taxonomy_args', array(
					'public' => true,
					'show_ui' => true,
					'hierarchical' => true,
					'labels' => $portfolio_cat_labels,
					'query_var' => 'portfolio_cat'
				)
			);

			return $portfolio_cat_parameters;
		}

		/**
		 * Register Post Type
		 */
		public function register() {
			register_post_type( 'portfolio', $this->_args );
			register_taxonomy( 'skills', array('portfolio'), $this->get_skills_parameters() );
			register_taxonomy_for_object_type('skills','portfolio');
			register_taxonomy( 'portfolio_cat', array('portfolio'), $this->get_portfolio_cat_parameters() );
			register_taxonomy_for_object_type('portfolio_cat','portfolio');

		}

		/**
		 * Change the columns for the Portfolio edit screen
		 */
		public function posts_columns( $cols ) {
			$cols = apply_filters( 'portfolio_columns_change', array(
				'cb' => '<input type="checkbox" />',
				'title' => __( 'Title', 'framework' ),
				'portfolio_cat' => __( 'Portfolio Category', 'framework' ),
				'skills' => __( 'Skills', 'framework' ),
				'date' => __( 'Date', 'framework' )
				)
			);

			return $cols;
		}

		/**
		 * Add custom column content for Portfolio
		 *
		 * @param $column
		 * @param $post_id
		 */
		public function custom_columns( $column, $post_id ) {
			global $post;

			switch ( $column ) {

				// TODO: Do we need shortcode?
				case 'portfolio_cat' :
					$terms = get_the_terms( $post_id, 'portfolio_cat' );

					/* If terms were found. */
					if ( ! empty( $terms ) ) {

						$out = array();

						/* Loop through each term, linking to the 'edit posts' page for the specific term. */
						foreach ( $terms as $term ) {
							$out[] = sprintf( '<a href="%s">%s</a>',
								esc_url( add_query_arg( array(
									'post_type' => $post->post_type,
									'portfolio_cat'    => $term->slug
								), 'edit.php' ) ),
								esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'portfolio_cat', 'display' ) )
							);
						}

						/* Join the terms, separating them with a comma. */
						echo join( ', ', $out );
					} /* If no terms were found, output a default message. */
					else {
						_e( 'No Category assigned to this project', 'framework' );
					}

					break;

				case 'skills' :
					$terms = get_the_terms( $post_id, 'skills' );

					/* If terms were found. */
					if ( ! empty( $terms ) ) {

						$out = array();

						/* Loop through each term, linking to the 'edit posts' page for the specific term. */
						foreach ( $terms as $term ) {
							$out[] = sprintf( '<a href="%s">%s</a>',
								esc_url( add_query_arg( array(
									'post_type' => $post->post_type,
									'skills'    => $term->slug
								), 'edit.php' ) ),
								esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'skills', 'display' ) )
							);
						}

						/* Join the terms, separating them with a comma. */
						echo join( ', ', $out );
					} /* If no terms were found, output a default message. */
					else {
						_e( 'No Skills assigned to this project', 'framework' );
					}

					break;
			}
		}

	}   