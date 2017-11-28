<?php 
$icon_background = $instance['icon_section']['icon_background'];
$styles = ! empty($icon_background) ? 'style="background-color: ' . $icon_background .';"' : ''; ?>
<?php 
$image_url =  wp_get_attachment_image_url( $image,'full' ); 
if( false === filter_var($image_url, FILTER_VALIDATE_URL ) ) { ?>
	<div class="icon-box <?php  echo $icon_position;  echo empty($instance['box']) ? ' icon-hide-box' : ' icon-show-box'; ?> <?php echo $icon_class ?>clearfix ">
		<div class="icon-wrapper" <?php echo $styles; ?>>

			<?php if( ! empty( $more_url) && ! empty( $all_linkable ) ) : ?>
				<a href="<?php echo sow_esc_url($more_url) ?>" class="link-icon" <?php if ( ! empty( $new_window ) ) echo 'target="_blank"'; ?>>
			<?php endif; 
			echo siteorigin_widget_get_icon( $icon, $icon_styles ); ?>

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
<?php }
else { ?>
	<div class="image-box <?php echo empty($instance['box']) ? ' icon-hide-box' : ' icon-show-box'; ?> <?php echo $icon_class ?>clearfix ">
		<div class="image-box-content-wrapper">
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
				<div class="image-box-content"><?php echo $content; ?></div>
			<?php endif; ?>

			<?php if(!empty($instance['text'])) : ?><p class="text"><?php echo wp_kses_post($instance['text']) ?></p><?php endif; ?>
			<?php if( ! empty( $more_url) && ! empty( $all_linkable ) ) : ?>
				<a href="<?php echo sow_esc_url($more_url) ?>" class="more-button" <?php if ( ! empty( $new_window ) ) echo 'target="_blank"'; ?>>
					<?php echo ! empty( $more ) ? $more : __('More Info', 'framework') ?>
				</a>
			<?php endif; ?>
		</div>
		<div class="image-wrapper">

			<?php if( ! empty( $more_url) && ! empty( $all_linkable ) ) : ?>
				<a href="<?php echo sow_esc_url($more_url) ?>" class="link-icon" <?php if ( ! empty( $new_window ) ) echo 'target="_blank"'; ?>>
			<?php endif; 
			printf( '<img src="%1$s">', esc_url( $image_url,'full' ) );  ?>
			
			<?php if( ! empty( $more_url) && ! empty( $all_linkable ) ) : ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
	<?php }
?>
<style type="text/css">
		.icon-box-content-wrapper:hover a h4	
	    {
			color: <?php echo $icon_background; ?>;
		}
		.services-wrapper .service:nth-of-type(<?php echo $i; ?>) .service-content:hover p a	
	    {
			background-color: <?php echo $service_color; ?>;
		}


		.services-wrapper .service:nth-of-type(<?php echo $i; ?>) .icon-wrapper .fa
		{
			background-color: <?php echo $service_color; ?>;
		}

	</style>