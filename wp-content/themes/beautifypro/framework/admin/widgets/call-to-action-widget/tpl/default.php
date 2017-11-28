<?php
$output = '';
$output .= '<div class="callout-widget clearfix">';   
	$output .= '<div class="twelve columns">';
		$output .= '<h3>' . esc_html( $title ) . '</h3>';
		$output .= do_shortcode( $content );

	$output .= '</div>';  
    if( $cta_url  || $anchor_text ) {
		$output .= '<div class="four columns cta-right">'; 
			$output .= '<a href="' . sow_esc_url($cta_url) . '">' . esc_html( $anchor_text ) . '</a>';
		$output .= '</div>';
	}
$output .= '</div>';   
echo apply_filters( 'cta_shortcode_html', $output );     
