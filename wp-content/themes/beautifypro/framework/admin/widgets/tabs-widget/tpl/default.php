<?php

	$output = '';

	$output .= sprintf( '<div class="tabs %1$s">', esc_attr( $instance['alignment'] ) );
	$output .= '<ul class="tab_heading">';  
	foreach($instance['tabs'] as $index => $item ) {
		$tab_id[ $index ] = uniqid( 'tab_' );
		$output .= sprintf( '<li><a href="#%1$s">%2$s</a></li>', esc_attr( $tab_id[ $index ] ), esc_html( $item['title'] ) );
	}
	$output .= '</ul>';

	$output .= '<div class="tabs_container">';
	foreach($instance['tabs'] as $index => $item ) {
		$output .= sprintf( '<div id="%1$s">%2$s</div>', esc_attr( $tab_id[ $index ] ), $item['content'] );
	}
	$output .= '</div></div>';


	echo $output;