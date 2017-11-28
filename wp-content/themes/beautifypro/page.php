<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package BeautifyPro
 */ 

get_header(); 

get_template_part('template-parts/breadcrumb');

do_action('beautify_pro_content_before');

do_action('beautify_pro_single_page_flexslider_featured_image'); ?>	

<div id="content" class="site-content">
	<div class="container"><?php 

	 do_action('beautify_pro_primary_before');  ?>        

        <div id="primary" class="content-area <?php beautify_pro_primary_class(); ?> columns">
			
			<main id="main" class="site-main" role="main">
				
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	
		<?php
			beautify_pro_comments_template();
		
	    do_action('beautify_pro_primary_after');
	    
	get_footer(); 
