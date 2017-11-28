<?php
/**
 * @var $title
 * @var $title_position
 * @var $image
 * @var $size
 * @var $image_fallback
 * @var $alt
 * @var $url
 * @var $new_window
 */
?><?php 

    switch ($align) {
		case 'right':
			$image_align = 'text-align: right;';
			break;  
		case 'center':
			$image_align = 'text-align: center;';
			break;
		default:
			$image_align = 'text-align: left;';    
			break;
	}
	switch ($title_alignment) {
		case 'right':
			$text_align = 'text-align: right;';
			break;  
		case 'center':
			$text_align = 'text-align: center;';
			break;
		default:
			$text_align = 'text-align: left;';    
			break;
	}?>

<div class="sow-image-wrapper img-<?php echo $align; ?>" style="<?php echo $image_align; ?>">

	<?php if( $title_position == 'above' ) : ?>
		<div class="title_align" style="<?php echo $text_align; ?>">
			<?php echo $args['before_title'] . esc_html( $title ) . $args['after_title']; ?>
		</div>
	<?php endif; ?>

	<?php
	$src = siteorigin_widgets_get_attachment_image_src(
		$image,
		$size,
		$image_fallback   
	);

	$attr = array();
	if( !empty($src) ) {
		$attr = array(
			'src' => $src[0],
		);

		if(!empty($src[1])) $attr['width'] = $src[1];
		if(!empty($src[2])) $attr['height'] = $src[2];
		if (function_exists('wp_get_attachment_image_srcset')) {
			$attr['srcset'] = wp_get_attachment_image_srcset( $image, $size );
	 	}
	}  
	$attr = apply_filters( 'siteorigin_widgets_image_attr', $attr, $instance, $this );

	$classes = array('so-widget-image'); 

		if(!empty($title)) $attr['title'] = $title;
		if(!empty($alt)) $attr['alt'] = $alt;  

		$image_style_type = ( $image_type != 'default' ) ? $image_type : '';

		?>
		<div class="sow-image-container <?php echo $image_style_type; ?>">
			<?php if(!empty($url)) : ?><a href="<?php echo sow_esc_url($url) ?>" <?php if($new_window) echo 'target="_blank"' ?>><?php endif; ?>
				<img <?php foreach($attr as $n => $v) echo $n.'="' . esc_attr($v) . '" ' ?> class="<?php echo esc_attr( implode(' ', $classes) ) ?>"/>
			<?php if(!empty($url)) : ?></a><?php endif; ?>
		</div>

		<?php if( $title_position == 'below' ) : ?>
			<div class="title_align" style="<?php echo $text_align; ?>">
				<?php echo $args['before_title'] . esc_html( $title ) . $args['after_title']; ?>
			</div>
		<?php endif; ?>
</div>
