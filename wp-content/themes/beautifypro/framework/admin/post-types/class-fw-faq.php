<?php

/**
 * Created by PhpStorm.
 * User: venkat
 * Date: 24/11/15
 * Time: 3:18 PM
 */
class Fw_Faq {

	protected $_labels = array();
	protected $_args = array();
	protected $_taxonomy_args = array();
	protected $_taxonomy_labels = array();

	/**
	 * Fw_Faq constructor.
	 */
	public function __construct() {
		$this->_labels = apply_filters( 'fw_faq_post_type_labels', array(
				'name'               => __( 'FAQs', 'framework' ),
				'singular_name'      => __( 'FAQ', 'framework' ),
				'add_new'            => __( 'Add New FAQ', 'framework' ),
				'add_new_item'       => __( 'Add New FAQ', 'framework' ),
				'edit_item'          => __( 'Edit FAQ', 'framework' ),
				'new_item'           => __( 'New FAQ', 'framework' ),
				'all_items'          => __( 'All FAQs', 'framework' ),
				'view_item'          => __( 'View FAQ', 'framework' ),
				'search_items'       => __( 'Search FAQs', 'framework' ),
				'not_found'          => __( 'No FAQs Found', 'framework' ),
				'not_found_in_trash' => __( 'No FAQs Found in Trash', 'framework' ),
				'parent_item_colon'  => '',
				'menu_name'          => 'FAQs',
			)
		);

		$this->_args = apply_filters( 'fw_faq_post_type_args', array(
				'public'       => true,
				'show_ui'      => true,
				'hierarchical' => true,
				'menu_icon'    => 'dashicons-microphone',
				'supports'     => array( 'title' ),
				'labels'       => $this->_labels
			)
		);

		$this->_taxonomy_labels = apply_filters( 'faq_group_taxonomy_labels', array(
				'name'              => _x( 'FAQ Groups', 'taxonomy general name', 'framework' ),
				'singular_name'     => _x( 'FAQ Group', 'taxonomy singular name', 'framework' ),
				'search_items'      => __( 'Search FAQ Groups', 'framework' ),
				'all_items'         => __( 'All FAQ Groups', 'framework' ),
				'parent_item'       => __( 'Parent FAQ Group', 'framework' ),
				'parent_item_colon' => __( 'Parent FAQ Group:', 'framework' ),
				'edit_item'         => __( 'Edit FAQ Group', 'framework' ),
				'update_item'       => __( 'Update FAQ Group', 'framework' ),
				'add_new_item'      => __( 'Add New FAQ Group', 'framework' ),
				'new_item_name'     => __( 'New FAQ Group Name', 'framework' ),
				'menu_name'         => __( 'FAQ Groups', 'framework' ),
			)
		);

		$this->_taxonomy_args = apply_filters( 'faq_group_taxonomy_args', array(
				'public'       => true,
				'show_ui'      => true,
				'hierarchical' => true,
				'labels'       => $this->_taxonomy_labels,
				'query_var'    => 'faq_group'
			)
		);

	}

	/**
	 * Register Post Type
	 */
	public function register() {
		register_post_type( 'faq', $this->_args );
		register_taxonomy( 'faq_group', array( 'faq' ), $this->_taxonomy_args );
		register_taxonomy_for_object_type( 'faq_group', 'faq' );

	}

	/**
		 * Change the columns for the FAQ edit screen
		 */
		public function posts_columns( $cols ) {
			$cols = apply_filters( 'faq_columns_change', array(
				'cb' => '<input type="checkbox" />',
				'title' => __( 'Title', 'framework' ),
				'faq_group' => __( 'FAQ Groups', 'framework' ),
				'date' => __( 'Date', 'framework' )
				)
			);

			return $cols;
		}

		/**
		 * Add custom column content for FAQ
		 *
		 * @param $column
		 * @param $post_id
		 */
		public function custom_columns( $column, $post_id ) {
			global $post;

			switch ( $column ) {

				// TODO: Do we need shortcode?
				case 'faq_group' :
					$terms = get_the_terms( $post_id, 'faq_group' );

					/* If terms were found. */
					if ( ! empty( $terms ) ) {

						$out = array();

						/* Loop through each term, linking to the 'edit posts' page for the specific term. */
						foreach ( $terms as $term ) {
							$out[] = sprintf( '<a href="%s">%s</a>',
								esc_url( add_query_arg( array(
									'post_type' => $post->post_type,
									'faq_group'    => $term->slug
								), 'edit.php' ) ),
								esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'faq_group', 'display' ) )
							);
						}

						/* Join the terms, separating them with a comma. */
						echo join( ', ', $out );
					} /* If no terms were found, output a default message. */
					else {
						_e( 'No FAQ group assigned to this project', 'framework' );
					}

					break;
				
			}
		}



}

