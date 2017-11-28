<?php
$first_letter = substr( $content, 0, 1) ;
$rest = substr( $content, 1 );

printf( '<span class="dropcap dropcap-%1$s">%2$s</span>%3$s', esc_attr( $style ), do_shortcode( $first_letter ), $rest );
