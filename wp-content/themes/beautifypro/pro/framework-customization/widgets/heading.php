<?php
$divider = ! empty( $instance['divider'] ) ? 'sep '. $headline_align : '';  
$divider_color = ! empty( $instance['divider_color'] ) ? 'style="color:' . $instance['divider_color']. '"' : '';
echo '<div class="sow-headline-container '. $divider .'"'. $divider_color .'>';
	
	if( !empty( $headline ) ) {
		echo '<span><' . $headline_tag . ' class="sow-headline title-divider">' . wp_kses_post( $headline ) . '</' . $headline_tag . '></span>';
	}

	if( !empty( $sub_headline ) ) {
		echo '<div class="genex-sub-head-align">';
		echo '<' . $sub_headline_tag . ' class="sow-sub-headline">' . wp_kses_post( $sub_headline ) . '</' . $sub_headline_tag . '>';
	    echo '</div>';
	} 
	
echo '</div>';   

?>       

