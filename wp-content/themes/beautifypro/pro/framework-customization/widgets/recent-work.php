<?php

	//TODO: use sprintf where necessary
   $styles = array();  
	switch ( $columns ) {   
		case ( $columns == '2' && $gap == false ): 
			$gx_isotope_column = 'portfolio2col';
			$styles[] = 'overflow: hidden;width: 45%;margin: 2%;'; 
			break;
 
		case ( $columns == '2' && $gap == true ): 
			$gx_isotope_column = 'portfolio2col';
			$styles[] = 'overflow: hidden;width: 49%;margin: 0%;';
			break;  

		case ( $columns == '3' && $gap == false ):  
			$gx_isotope_column = 'portfolio3col';
			$styles[] = 'overflow: hidden;width: 31.33%;margin: 1%;';
			break;

		case ( $columns == '3' && $gap == true ): 
			$gx_isotope_column = 'portfolio3col';
			$styles[] = 'overflow: hidden;width: 33.33%;margin: 0%;';
			break;

		case ( $columns == '4' && $gap == false ): 
			$gx_isotope_column = 'portfolio4col';
			$styles[] = 'overflow: hidden;width: 23%;margin: 1%;';
			break;

		case ( $columns == '4' && $gap == true ): 
			$gx_isotope_column = 'portfolio4col';
			$styles[] = 'overflow: hidden;width: 25%;margin: 0%;';
			break;
	}

    /* Recent Work  filter status */
	switch ($filter_type) {
	    case 'without-all': ?>
	        <style type="text/css">
	           #filters .filter-options li:first-child {
	                display: none;
	           } 
	        </style><?php
	    break;
	    case 'hide': ?>
	         <style type="text/css">
	            #filters .filter-options {
	                display: none;
	           } 
	        </style><?php
	    break;
	} 

    $masonry =  !empty($layout) ? 'masonry-portfolio' : ''; 
   

	$portfolio_args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => $count,
		'tax_query' => array( 
			'relation' => 'OR',  
			array(
				'taxonomy' => 'portfolio_cat',
				'field'    => 'slug',
				'terms'    => ($portfolio_cat === 'all' ) ? array_keys($portfolio_cats) : $portfolio_cat,
			),
			array(
				'taxonomy' => 'skills',
				'field'    => 'slug',
				'terms'    => ($skill === 'all' ) ? array_keys($skills) : $skill,
			),
		),
	);

	$output = '';

	$loop = new WP_Query( apply_filters( 'recent_work_query_args', $portfolio_args ) );

	if( 'isotope' === $type ) {

		$output .= '<style type="text/css">';
		$output .= '#filters, #portfolio { padding: 0; } </style>';
		$output .= '<div id="isolate">';
		$output .= '<div id="filters">';
		$count = count( $skills );
		if ( $count > 0 ) {
			$output .= '<ul class="filter-options" data-option-key="filter">';
			$output .= '<li><a href="#filter" data-option-value="*" class="selected">'. apply_filters('Gx_Fw_portfolio_all_text' , __('All','framework') ) .'</a></li>';
			foreach ( $skills as $slug => $name ) {
				$output .= '<li><a href="#filter" data-option-value=".' . esc_attr( strtolower( str_replace( ' ', '-', $slug ) ) ) . '">' . esc_html( $name ) . '</a></li>';
			}
			$output .= '</ul>';
		}
		$output .= '<div class="clearfix"></div>';
		$output .= '</div>';

		$output .= '<ul id="portfolio" class="'. $masonry .'">';

		$loop = new WP_Query( apply_filters( 'recent_work_query_args', $portfolio_args ) );
		if ( $loop->have_posts() ) : while ( $loop->have_posts() ) :
			$loop->the_post();

			$terms = get_the_terms( $loop->post->ID, 'skills' );
			if ( $terms && ! is_wp_error( $terms ) ) {
				$skills = array();
				foreach ( $terms as $term ) {
					$skills[] = strtolower( str_replace( ' ', '-', $term->name ) );
				}
			}
			if ( empty( $skills ) ) {
				$skills = '';
			} else {
				$skills = join( " ", $skills );
			}

			$output .= '<li class="item ' . $skills . '" style="' . apply_filters( 'theme_pro_recent_widget_isotope_style', implode(' ', $styles) ) . '">';


			$output .= '<div class="' . $gx_isotope_column . ' portfolioeffects">';
			$wbls_portfolio_video_type   = get_post_meta( $loop->post->ID, '_gx_portfolio_video_type', true );
			$portfolio_video_id          = trim( get_post_meta( $loop->post->ID, '_gx_portfolio_video_id', true ) );
			$portfolio_project_url       = trim( get_post_meta( $loop->post->ID, '_gx_portfolio_project_url', true ) );
			$portfolio_project_link_text = trim( get_post_meta( $loop->post->ID, '_gx_portfolio_project_link_text', true ) );
			$output .= '<div class="portfolio_thumb1">';
			$output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $loop->post->ID, $gx_isotope_column ) . '</a>';
			$output .= '</div><!-- portfolio_thumb -->';
			$output .= '<div class="portfolio_overlay">';
			$output .= '<div class="overlay_icon portfolio_link_icons">';

			if ( $wbls_portfolio_video_type != 'none' && $portfolio_video_id != '' ) {
				if ( $wbls_portfolio_video_type == 'vimeo' ) {
					$output .= '<a class="icon-zoom" href="http://vimeo.com/' . $portfolio_video_id . '" rel="prettyPhoto"><i class="fa fa-search"></i></a>';
				} else {
					$output .= '<a class="icon-zoom" href="http://www.youtube.com/watch?v=' . $portfolio_video_id . '" rel="prettyPhoto"><i class="fa fa-search"></i></a>';
				}
			} else {
				$url = wp_get_attachment_url( get_post_thumbnail_id( $loop->post->ID ) );
				$output .= '<a class="icon-zoom" title="' . get_the_title() . '"  href="' . esc_url( $url ) . '" rel="prettyPhoto"><i class="fa fa-search"></i></a>';
			}
			$output .= '<a class="icon-link" href="' . get_the_permalink() . '" title="' . get_the_title() . '"><i class="fa fa-link"></i></a>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div><!-- .portfolio4col -->';

			$output .= '</li>';
		endwhile; endif;
		$output .= '</ul></div>';
	} else {

		if( $loop->have_posts() ) {
			$output .= '<div class="recent-work-container recent-work-carousel">';
			$output .= '<div class="recent-work">';
			$output .= '<ul class="slides">';

			while ( $loop->have_posts() ) {
				$loop->the_post();
				$output .= '<li>';
				$output .= '<div class="work">';
				$output .= '<a href="'. get_the_permalink() . '">' . get_the_post_thumbnail($loop->post->ID, 'recent-work' ) . '</a>';
				$cats = wp_get_post_categories($loop->post->ID);
				$output .= '<div class="recent_work_overlay">';
				$output .= '<a rel="prettyPhoto" href="'. get_the_permalink() . '"><i class="fa fa-link"></i></a>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '<div class="work-title">';
				$output .= '<h4><a href="'. get_the_permalink() . '">' . get_the_title() . '</a></h4>';
				if( ! empty( $cats ) ) {
					$cat = get_category($cats[0]);
					$output .= '<div class="cat-name">' . $cat->name . '</div>';
				}
				$output .= '</div>';
				$output .= '</li>';
			}
		}
		$output .= '</ul>';
		$output .= '</div>';
		$output .= '</div>';
	}
	$loop = null;
	wp_reset_postdata();
	echo $output;