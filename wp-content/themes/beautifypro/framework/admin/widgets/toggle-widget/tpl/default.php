<?php
if( 'open' === $state ) {
	$toggle_class = 'open';
	$icon_class = 'fa fa-minus';
} else {
	$toggle_class = 'close';
	$icon_class = 'fa fa-plus';
}

$output = sprintf( '<div class="toggle"><div class="toggle-title">%1$s
		<span class="icn"><i class="%2$s"></i></span></div>
		<div class="toggle-content  %3$s">%4$s</div></div>',
		esc_html( $title ), esc_attr( $icon_class ), esc_attr( $toggle_class ), do_shortcode( $content ) );

echo apply_filters( 'toggle_shortcode_html', $output );
