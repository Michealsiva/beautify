<div class="accordion">
<?php
		$output = '';
			foreach($instance['accordion'] as $index => $item ) {
				$output .= '<h3>'. esc_html( $item['title'] ) .'</h3>';
				$output .= '<div class="acc_content">';
				$output .= do_shortcode( $item['content'] );   
				$output .= '</div>';
			}
	echo $output;
?>
</div>