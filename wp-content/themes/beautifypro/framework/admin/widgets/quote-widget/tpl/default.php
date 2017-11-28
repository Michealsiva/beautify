<?php 
printf( '<span class="pull%1$s">%2$s</span>', esc_attr( $quote_alignment ), do_shortcode( $quote_content ) );
printf(do_shortcode( $content ));