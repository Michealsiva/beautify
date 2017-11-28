<?php

// Add the list items
$image_url =  wp_get_attachment_image_url( $image );
	if( false === filter_var($image_url, FILTER_VALIDATE_URL ) ) {
		$list_prefix = siteorigin_widget_get_icon($icon, $icon_styles); 
	} else {
		$list_prefix = sprintf( '<img src="%1$s" class="list-image">', esc_url( $image_url ) );
	}

$text = preg_replace( "/\*+(.*)?/i", '<ul><li>' . $list_prefix . ' $1</li></ul>', $list );
$text = preg_replace( "/(\<\/ul\>\n(.*)\<ul\>*)+/", "", $text );
$text = wpautop( $text );

if($title) {
    echo '<h3>' . $title . '</h3>';    	
}
// sanitized version of the list   
echo $text; 