<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package BeautifyPro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<?php if ( get_theme_mod('enable_single_post_top_meta', true ) ): ?>
				<footer class="entry-meta title-meta">
					<?php if(function_exists('beautify_pro_entry_top_meta') ) {
					    beautify_pro_entry_top_meta(); 
					} ?> 
				</footer><!-- .entry-footer -->
			<?php endif;?>  
		<?php endif; ?>  
			<br class="clear">
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php if ( get_theme_mod('enable_single_post_bottom_meta', true ) ): ?>
		<footer class="entry-footer">
			<?php if(function_exists('beautify_pro_entry_bottom_meta') ) {
			     beautify_pro_entry_bottom_meta();
			} ?>
		</footer><!-- .entry-footer -->
	<?php endif;?>
</article><!-- #post-## -->
