<?php
$divider = ! empty( $instance['divider'] ) ? 'icon ': '';  
$divider_color = ! empty( $instance['divider-color'] ) ? $instance['divider-color']: '';
if( !empty( $divider ) ) {
	if($type == 'doubled') {
		echo '<div class="divider">';
			echo '<div class="left hr_' . esc_attr( $type ) .'" style="border-color:'.$divider_color.' "> </div>';
				echo siteorigin_widget_get_icon( $icon, $icon_styles ); 
			echo '<div class="right hr_' . esc_attr( $type ) .' " style="border-color:'.$divider_color.' "> </div>';
		echo '</div>';
	}
	else {
		echo '<div class="divider">';
			echo '<div class="left hr_' . esc_attr( $type ) .'" style="border-bottom-color:'.$divider_color.' "> </div>';
				echo siteorigin_widget_get_icon( $icon, $icon_styles ); 
			echo '<div class="right hr_' . esc_attr( $type ) .' " style="border-bottom-color:'.$divider_color.' "> </div>';
		echo '</div>';
	}

}

else {
	if ($type == 'doubled') {
		echo '<div class="hr_'. esc_attr ($type).' " style="border-color:'.$divider_color.' " ></div>';
	}
	else {
		echo '<div class="hr_'. esc_attr ($type).' " style="border-bottom-color:'.$divider_color.' " ></div>';
	}
}