<?php
printf( '<a href="#" data-toggle="tooltip" title="%1$s" 
		class="withtip %2$s">%3$s</a>%4$s', esc_attr( $tooltip ),
		esc_attr( $position ), do_shortcode( $tooltip_content ) ,do_shortcode( $content ) );  
