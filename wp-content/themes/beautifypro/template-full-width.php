<?php
/**
 * Template Name: Page Full Width
 *
 * @package BeautifyPro
 */

get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>		
	<?php do_action('beautify_pro_content_before'); ?> 

	<div id="content" class="site-content">
		<div class="container">

		<div id="primary" class="content-area sixteen columns">

			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

<?php get_footer(); ?>
