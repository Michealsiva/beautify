<div class="stat-container clearfix" style="background-color: <?php echo $background?>">
	
<?php
	$output = '';
	$output .= '<div class="icon-wrapper">';
	$image_url =  wp_get_attachment_image_url( $image );
	if( false === filter_var($image_url, FILTER_VALIDATE_URL ) ) {
		$output .= siteorigin_widget_get_icon($icon, $icon_styles);
	} else {
		$output .= sprintf( '<img src="%1$s">', esc_url( $image_url ) );
	}
	$output .='</div>';
	$output .= '<div class="stat-content">';
	$output .= sprintf( '<h4 class="stat">%1$s</h4>', esc_html( $content ) );
	$output .= sprintf( '<h5 class="stats-title">%1$s</h5>', esc_html( $name ) );
	$output .='</div>';

	echo $output;
?>
	
</div>
