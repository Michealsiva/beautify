<?php

	$output = '';
	if(! empty( $instance['design-process'] ) ) {
		$output .= '<div class="member-container">'; 
		$output .= '<div class="teammember">';
		
		$aaa =round(100/count($instance['design-process']), 3);
			$output .= '<div class="design-process clearfix">';
			$i=1;
				foreach ( $instance['design-process'] as $index => $item ) {
					//$member_image = wp_get_attachment_image_src($item['member_image'],'full');
					$bg_color = $item['process_background'];
					if($i==1) {
						$output .= sprintf('<div class="design-details active" style="width:%1$s%2$s">',$aaa,'%');
					}
					else {
						$output .= sprintf('<div class="design-details" style="width:%1$s%2$s">',$aaa,'%');
					}
					$output .='<a href="#design-'.$i.'">';
						$output .= sprintf('<div class="member-pic" style="background-color:%1$s">',$bg_color);
					$output .= sprintf( '<h3><strong>%1$s</strong></h3>', $item['process_name']);

					$output .= '</div>';
					$output .= '</a></div>';
					$i++;
					 
				}
			$output .= '</div>';
		
			$output .='<div class="sixteen columns design-content">';
			$i=1;
			foreach ( $instance['design-process'] as $index => $item ) {
				if($i ==1) {
					$output .= '<div id="design-'.$i.'" class="staff-desc active">';
				}
				else {
					$output .= '<div id="design-'.$i.'" class="staff-desc">';	
				}
				$output .= sprintf( '<div class="process-content">%1$s</div>', $item['member_content'] );
				$output .= '</div>';
				$i++;
			}
			
			$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
	}

	echo $output;