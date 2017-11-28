<?php
$src = siteorigin_widgets_get_attachment_image_src( $image, 'full', $image_fallback );
$attr = array();
if ( ! empty( $src ) ) {
	$attr = array(
		'src' => $src[0],
	);

	if ( ! empty( $src[1] ) ) {
		$attr['width'] = $src[1];  
	} 
	if ( ! empty( $src[2] ) ) {
		$attr['height'] = $src[2];  
	}
	if ( function_exists( 'wp_get_attachment_image_srcset' ) ) {
		$attr['srcset'] = wp_get_attachment_image_srcset( $image, 'full' );
	}
}
$attr = apply_filters( 'siteorigin_widgets_image_attr', $attr, $instance, $this );

if ( ! empty( $title ) ) {
	$attr['title'] = $title;
}
if ( ! empty( $alt ) ) {
	$attr['alt'] = $alt;
}

	$output = '';

	$output .= '<div class="our-team">';
	
	if( !empty($src) ) :
		$output .= '<div class="team-avatar">';
	    if( !empty($more_url) ) {
		    $output .= '<a href="'. sow_esc_url($more_url).'">';
		}
		$output .= '<img ';
		foreach( $attr as $n => $v ) {  
			$output .= $n . '="' . esc_attr($v) . '" ';   
		}
		$output .= '"/>';
		if( !empty($more_url) ) {   
		    $output .= '</a>';
		}
		$output .= '</div>';
	endif;
	$output .= '<div class="team-content">';
	$output .= '<div class="team-member">';
		if( $name && $designation ) :
			$output .= '<h4>' . esc_html( $name ) .' <span>' . esc_html( $designation ) .'</span></h4>';
		endif;
	$output .= '</div>';

	
	$output .= do_shortcode( $content );   
	if( ! empty( $instance['social_site'] ) ) {   
		$output .= '<div class="team-social">';
		$output .= '<ul>';
		foreach ( $instance['social_site'] as $index => $site ) {
			$output .= '<li><a href="'. esc_url( $site['profile_url'] ) .'">';
			$output .= siteorigin_widget_get_icon($site['icon']);
			$output .= '</a></li>';
		}
		$output .= '</ul>';  
		$output .= '</div>';  
	}
	$output .= '</div>'; 
	$output .= '</div>';

	
	
	echo $output;