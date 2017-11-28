<?php
	//echo $faq;
	if ( $faq == '' ) return;
	$faq_args = array(
		'post_type' => 'faq',
		'posts_per_page' => ! empty($items) ? $items : -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'faq_group',
				'field' => 'slug',
				'terms' => $faq  
			)
		) 
	);

	$output = '';  


	$loop = new WP_Query( $faq_args );

	if( $loop->have_posts() ) {
		$output .= '<div class="div">';   

		$output .= '<ul class="faq-wrapper">';   

		while ( $loop->have_posts() ) {       
			$loop->the_post();
			$faq_icon = get_post_meta( $loop->post->ID, '_gx_faq_icon', true );
			$faq_answer = get_post_meta( $loop->post->ID, '_gx_faq_answer', true );
			if( ! $faq_icon ) {
				$faq_icon = 'fa fa-plus';    
			}
				$toggle_class = 'close';
				$output .= '<div class="toggle">';
					$output .= '<div class="toggle-title">'. get_the_title() .'<span class="icn"><i class="'. $faq_icon .'"></i></span></div>';
					$output .= '<div class="toggle-content '. $toggle_class .'">';
					    $output .=  $faq_answer;
				    $output .= '</div>';
				$output .= '</div>';		
		}
	}

	$loop = null;
	$output .= '</ul>';
	$output .= '</div>';

	wp_reset_postdata();
	echo $output;






