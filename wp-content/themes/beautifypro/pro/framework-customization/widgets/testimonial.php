<?php
$bg_color = ! empty( $instance['bg_color'] ) ? 'style="background-color:' . $instance['bg_color']. '"' : '';

	$output = '';
	if(! empty( $instance['testimonial'] ) ) {
		$output .= '<div class="testimonials">';
		$output .= '<ul class="slides">';
		foreach ( $instance['testimonial'] as $index => $item ) {
			$client_image = wp_get_attachment_image_src($item['client_image']);
			$output .= '<li>';
			$output .= '<div class="testimonial-container" '. $bg_color .' >';
			$output .= '<div class="testimonial">';
			$output .= sprintf( '<div class="testimony"><div class="t-inner">%1$s</div></div>', $item['client_testimonial'] );

			if( $client_image ) {
				$output .= sprintf( '<div class="client-pic"><img src="%1$s"></div>', $client_image[0] );
			}

			$output .= sprintf( '<p class="client"><strong>%1$s</strong>', $item['client_name'] );

			if( false === filter_var( $item['client_website'], FILTER_VALIDATE_URL ) ) {
				$output .= ! empty( $item['client_company'] ) ? $item['client_company'] : '';
			} else {
				$output .= sprintf( ' <a href="%1$s" target="_blank">%2$s</a>', $item['client_website'], $item['client_company'] );
			}
			$output .= '</p></div></div></li>';
		}
		$output .= '</ul>';
		$output .= '</div>';

	}

	echo $output;