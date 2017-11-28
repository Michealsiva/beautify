<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package BeautifyPro
 */

get_header(); ?>
<?php get_template_part('template-parts/breadcrumb');
do_action('beautify_pro_content_before'); ?>		
	
	<div id="content" class="site-content">
		<div class="container">
	
			<?php do_action('beautify_pro_two_sidebar_left'); ?>	

			<div id="primary" class="content-area <?php beautify_pro_layout_class(); ?> columns">
				<main id="main" class="site-main blog-content" role="main"><?php 
				
				if ( have_posts() ) : 
					/* Start the Loop */ 
					while ( have_posts() ) : the_post(); 
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile; 

					beautify_pro_page_navigation();	

				else :  
					
					 get_template_part( 'template-parts/content', 'none' ); 

			    endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->

	        <?php do_action('beautify_pro_two_sidebar_right'); 

    get_footer(); ?>
