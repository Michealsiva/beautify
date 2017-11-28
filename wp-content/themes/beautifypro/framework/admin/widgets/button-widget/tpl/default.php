<?php

switch ($button_alignment) {
	case 'right':
		$button_align = 'text-align: right;';
		break;  
	case 'center':
		$button_align = 'text-align: center;';
		break;
	case 'justify':
		$button_align  = 'display: block;';
		break;
	default:
		$button_align = 'text-align: left;';     
		break;
}

$target =  !empty( $new_window ) ? '_blank' : '_self';   


?>
<div class="button" style="<?php echo $button_align; ?>"><?php
      printf('<a href="%1$s" target="%2$s" class="btn %3$s">%4$s</a>',sow_esc_url($button_url), $target, $button_size, $button_text); ?>
</div>