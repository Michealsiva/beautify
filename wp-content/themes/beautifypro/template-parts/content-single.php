<?php
/**
 * @package BeautifyPro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
     <?php
		$single_featured_image = get_theme_mod( 'single_featured_image',true );
		$single_featured_image_size = get_theme_mod ('single_featured_image_size',1);
		if (isset($single_featured_image_size) && $single_featured_image_size != 3  && $single_featured_image ) { ?>
		    <div class="post-thumb blog-thumb"><?php
			    if( has_post_thumbnail() && ! post_password_required() ) : 
			        if ( $single_featured_image_size == 1 ) : 
						the_post_thumbnail('beautify-blog-large-width'); 
				    else: 
						the_post_thumbnail('beautify-small-featured-image-width');		
					endif;
			    endif;?>
		    </div><?php
		} ?>

        <header class="entry-content">	
			<h1 class="entry-title"><?php the_title( '','' ); ?></h1>
			<?php if ( get_theme_mod('enable_single_post_top_meta',true ) ): ?>
				    <div class="entry-meta">
				    <?php if(function_exists('beautify_pro_entry_top_meta') ) {
				         beautify_pro_entry_top_meta();
				     } ?>
					</div><!-- .entry-meta -->
			<?php endif; ?>


	<div class="entry-content">
	 
		
		<?php the_content(); 
		    wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'beautify_pro' ),
				'after'  => '</div>',
			) );
		?>
	
	</div><!-- .entry-content -->

<?php if ( get_theme_mod('enable_single_post_bottom_meta', true ) ): ?>
	<footer class="entry-meta">
	<?php if(function_exists('beautify_pro_entry_bottom_meta') ) {
		    beautify_pro_entry_bottom_meta();
		} ?>
	</footer><!-- .entry-footer -->
<?php endif;?>
<?php do_action('remedial_pro_after_single_content'); ?>
			 <?php if( get_theme_mod ('social_sharing_box',true)): ?>
					<div class="share-box">
						<h4><?php _e( 'Share this Post ...', 'remedial_pro' ); ?></h4>
						<ul>
							<?php if( get_theme_mod('facebook_sb',true) ): ?>
							<li>
								<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<?php endif; ?>
							<?php if( get_theme_mod('twitter_sb',true)): ?>
							<li>
								<a href="http://twitter.com/intent/tweet?url=<?php the_permalink(); ?>">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<?php endif; ?>
							<?php if( get_theme_mod('linkedin_sb',true)): ?>
							<li>
								<a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">
									<i class="fa fa-linkedin"></i>
								</a>
							</li>
							<?php endif; ?>

							<?php if(get_theme_mod('google-plus_sb',true)): ?>
							<li>
								<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
							<?php endif; ?>
							<?php if( get_theme_mod ('email_sb',true)): ?>
							<li>
								<a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>">
									<i class="fa fa-envelope"></i>
								</a>
							</li>
							<?php endif; ?>
						</ul>
					</div>
				<?php endif; ?>
	   </header><!-- .entry-header -->
</article><!-- #post-## -->

	<?php beautify_pro_post_nav(); ?>
