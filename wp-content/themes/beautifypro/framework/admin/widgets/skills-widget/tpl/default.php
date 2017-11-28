<?php

	$output = '';
	foreach ( $instance['skills'] as $skill ) {
		$name = $skill['skill_name'];
		$icon = $skill['skill_icon'];
		$style = $skill['skill_style']; 
		$image = sow_esc_url($skill['skill_image']);
		$percentage = $skill['skill_percentage'];
		$image_url =  wp_get_attachment_image_url( $image ); 
			/*	if( false === filter_var($image_url, FILTER_VALIDATE_URL ) ) {
					$skill_icon = siteorigin_widget_get_icon($icon);
				} else {
					$skill_icon = sprintf( '<img src="%1$s">', esc_url( $image_url ) );
				}
			*/

		if( $style != 'circle') {  
			$output .= '<div class="skill-container">';
			$output .= sprintf( '<div class="skill-content">%1$s</div>', $name );
			$output .= '<div class="skill">';
			$output .= sprintf( '<div class="skill-percentage percent%1$s start">', $percentage );
			$output .= '</div>';
			$output .= '<span class="skill-count">'. $percentage .'%</span>';
			$output .= '</div>';
			$output .= '</div>';	
		}else {
			$skill_type = 'circle'; 
			$output .= '<div class="skill-circle">';
			$output .= '<div class="chart">';
			$output .= '<div class="chart-wrapper">';
			$output .= sprintf( '<div class="genex-percentage" data-percent="%1$s">', $percentage );
			$output .=  '<div class="chart-per"><span class="skill-nos">'. $percentage .'</span>%</div></div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= sprintf( '<div class="label">%1$s</div>', $name );
			$output .= '</div>';
		}
	}

	 if( $skill_type == 'circle' ) { ?>
		<script type="text/javascript">
			jQuery(document).ready(function($){    
				$('.genex-percentage').easyPieChart({         
					animate: '<?php echo !empty( $animate ) ? $animate : '3500';?>',
					trackColor: '<?php echo !empty( $track_color ) ? $track_color : '#d7d7d7'; ?>',
					barColor: '<?php echo !empty( $bar_color ) ? $bar_color : '#4baf4f'; ?>', 
				    lineWidth: '<?php echo !empty( $line_width ) ? $line_width : '9'; ?>',
				    lineCap: '<?php echo !empty( $linecap ) ? $linecap : 'butt'; ?>',
				    rotate: '<?php echo !empty( $rotate ) ? $rotate : '0'; ?>', 
				    scaleColor: false,
				    size: 185,  
				});   

			}); 
		</script><?php

	}

	echo $output;


