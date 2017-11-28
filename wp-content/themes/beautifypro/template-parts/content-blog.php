<?php
/**
 * Template part for displaying posts.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package BeautifyPro 
 */
?>       
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
    <div class="entry-content"><?php 
		$featured_image = get_theme_mod( 'featured_image',true );
	    if( $featured_image ) : ?>
			<div class="thumb"><?php
				if( function_exists( 'beautify_pro_featured_image' ) ) :
					beautify_pro_featured_image();
		        endif; ?>
		    </div><?php   
		endif;
    	if( has_post_format( 'gallery' ) ) { ?>			    	
	    	<div id="gallery-images">
		    	<ul class="slides"><?php
		    		$galleries = get_post_gallery_images( $post );
		    		 foreach ($galleries as $gallery) { ?>
				          <li><img src=<?php echo $gallery; ?>></li>
			    <?php } ?>
		    	</ul>
	    	</div><?php 
    	} 
	 
	    do_action('beautify_pro_entry_header_before'); ?>
        <div class="entry-body">
	        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title( '', '' ); ?></a></h1>
				<?php if ( get_theme_mod('enable_single_post_top_meta', true ) ): ?>
					<footer class="entry-meta">
						<?php if(function_exists('beautify_pro_entry_top_meta') ) {
						    beautify_pro_entry_top_meta(); 
						} ?> 
					</footer><!-- .entry-footer -->
				<?php endif;
				do_action('beautify_pro_entry_header_after'); ?>

				<div class="entry-content">  
							<?php the_content();
				?>
				</div>
				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'beautify_pro' ),
					'after'  => '</div>',
				) );
 			?>
			 <?php do_action('beautify_pro_entry_footer_before'); ?>

					<?php if ( get_theme_mod('enable_single_post_bottom_meta', true ) ): ?>
						<footer class="entry-meta">
							<?php if(function_exists('beautify_pro_entry_bottom_meta') ) {
							     beautify_pro_entry_bottom_meta();
							} ?>
						</footer><!-- .entry-footer -->
					<?php endif; ?>

			    <?php do_action('beautify_pro_entry_footer_after'); ?>  
		    <br class="clear" />
		</div>
	</div><!-- .entry-content -->

   

</article><!-- #post-## -->