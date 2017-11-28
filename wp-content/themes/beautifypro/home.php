<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package BeautifyPro
 */

get_header();  ?>    
<?php do_action('beautify_pro_content_before'); ?>

	<div id="content" class="site-content">
		<div class="container"> <?php 
	    if( get_theme_mod('blog_layout',1) != 3 && get_theme_mod('blog_layout',1) != 5 && get_theme_mod('blog_layout',1) != 6 ) {
	   	   do_action('beautify_pro_two_sidebar_left');
	    } ?>	  

	<div id="primary" class="content-area <?php beautify_pro_layout_class();?> columns">
		<main id="main" class="site-main blog-content <?php beautify_pro_masonry_blog_layout_class();?>" role="main">

		<?php if ( have_posts() ) : 
			    /* Start the Loop */
		        while ( have_posts() ) : the_post(); 
     
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */

					 do_action('beautify_pro_blog_layout_class_wrapper_before');  
					 get_template_part( 'template-parts/content-blog', get_post_format() );
                     do_action('beautify_pro_blog_layout_class_wrapper_after');   
				
			    endwhile; 

		    beautify_pro_page_navigation();

		else : 

			 get_template_part( 'template-parts/content', 'none' ); 

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<?php if( get_theme_mod('blog_layout',1) != 3 && get_theme_mod('blog_layout',1) != 5 && get_theme_mod('blog_layout',1) != 6 ) {
	   	do_action('beautify_pro_two_sidebar_right');
	} ?>	

<?php get_footer(); ?>
