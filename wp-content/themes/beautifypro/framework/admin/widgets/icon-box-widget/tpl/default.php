<?php 
$icon_background = $instance['icon_section']['icon_background'];
$styles = ! empty($icon_background) ? 'style="background-color: ' . $icon_background .';"' : ''; ?>
 
<div class="icon-box <?php  echo $icon_position;  echo empty($instance['box']) ? ' icon-hide-box' : ' icon-show-box'; ?> <?php echo $icon_class ?>clearfix ">
	<div class="icon-wrapper" <?php echo $styles; ?>>

		<?php if( ! empty( $more_url) && ! empty( $all_linkable ) ) : ?>
			<a href="<?php echo sow_esc_url($more_url) ?>" class="link-icon" <?php if ( ! empty( $new_window ) ) echo 'target="_blank"'; ?>>
		<?php endif; ?> 

           <?php 
           $image_url =  wp_get_attachment_image_url( $image ); 
            if( false === filter_var($image_url, FILTER_VALIDATE_URL ) ) { 
			     echo siteorigin_widget_get_icon( $icon, $icon_styles ); 
			}else{
                printf( '<img src="%1$s">', esc_url( $image_url ) );  
			}?>  

		<?php if( ! empty( $more_url) && ! empty( $all_linkable ) ) : ?>
			</a>
		<?php endif; ?>
	</div>

	<div class="icon-box-content-wrapper">
		<?php if( ! empty( $more_url) && ! empty( $all_linkable ) ) : ?>
			<a href="<?php echo sow_esc_url($more_url) ?>" class="link-title" <?php if ( ! empty( $new_window ) ) echo 'target="_blank"'; ?>>
		<?php endif; ?>

		<?php if( ! empty( $title ) ) : ?>
			<h4><?php echo $title; ?></h4>
		<?php endif; ?>

		<?php if( ! empty( $more_url) && ! empty( $all_linkable ) ) : ?>
			</a>
		<?php endif; ?>

		<?php if( ! empty( $content ) ) : ?>
			<div class="icon-box-content"><?php echo $content; ?></div>
		<?php endif; ?>

		<?php if(!empty($instance['text'])) : ?><p class="text"><?php echo wp_kses_post($instance['text']) ?></p><?php endif; ?>
		<?php if( ! empty( $more_url) && ! empty( $all_linkable ) ) : ?>
			<a href="<?php echo sow_esc_url($more_url) ?>" class="more-button" <?php if ( ! empty( $new_window ) ) echo 'target="_blank"'; ?>>
				<?php echo ! empty( $more ) ? $more : __('More Info', 'framework') ?>
			</a>
		<?php endif; ?>
	</div>
</div>