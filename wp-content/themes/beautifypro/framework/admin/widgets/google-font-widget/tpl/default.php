<?php
$font = explode(':',$google_font);
$font_family = $font[0];
$font_weight = $font[1];
printf( '<link href="http://fonts.googleapis.com/css?family=%1$s" 
			rel="stylesheet" type="text/css">', $google_font );
printf( '<div class="googlefont" style="font-family: %1$s, serif !important; 
	font-size: %2$s !important; font-weight: %3$s;">%4$s</div>',
	$font_family, $google_font_size, $font_weight, do_shortcode( $content ) );
