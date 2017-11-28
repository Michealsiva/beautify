<?php
$output = '';
if( strtolower($close) == 'yes' ) {
	$close = 1;
} else {
	$close = 0;
}
if( $close ) {
	$close = '<a class="alert-close" href="#">x</a>';
} else {
	$close = '';
}

$alert_bg_color = ! empty($custom_bg) ? 'background-color: ' . $custom_bg .';' : '';


$output = '';
$output .= '<div class="alert-message ' . esc_attr( $type ) . '" style="'. $alert_bg_color .'">';
$output .= $close;
if( $icon ) {
   $output .= siteorigin_widget_get_icon( $icon, $icon_styles );	
}

$output .= do_shortcode(  $content  );
$output .= '</div>';

echo $output;