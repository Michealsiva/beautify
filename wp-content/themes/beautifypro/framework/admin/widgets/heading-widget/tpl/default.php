<div class="sow-headline-container"><?php

	if( !empty( $headline ) ) {
		echo '<' . $headline_tag . ' class="sow-headline">' . wp_kses_post( $headline ) . '</' . $headline_tag . '>';
	}

	if( !empty( $sub_headline ) ) {
		echo '<div class="genex-sub-head-align">';
		echo '<' . $sub_headline_tag . ' class="sow-sub-headline">' . wp_kses_post( $sub_headline ) . '</' . $sub_headline_tag . '>';
	    echo '</div>';
	} ?>
	
</div>