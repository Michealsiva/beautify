<?php
/**
 * The template for displaying search results pages.
 *
 * @package BeautifyPro
 */

get_header();
get_template_part('template-parts/breadcrumb'); 
do_action('beautify_pro_content_before'); ?>

		<div id="content" class="site-content">
		<div class="container">		

		<section id="primary" class="content-area eleven columns">
			<main id="main" class="site-main" role="main"><?php 
			if ( have_posts() ) : 

				/* Start the Loop */ 
				while ( have_posts() ) : the_post(); 

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */

					get_template_part( 'template-parts/content', 'search' );
					
				endwhile; 

				beautify_pro_page_navigation();
			
			else : 

				 get_template_part( 'template-parts/content', 'none' ); 

			endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->
	<?php get_sidebar(); ?>	
	
<?php get_footer(); ?>
