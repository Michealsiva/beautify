<?php 
/*
	Template Name: Blog Page 
 */
 get_header();

 get_template_part('template-parts/breadcrumb'); 

 do_action('beautify_pro_content_before'); ?>

<div id="content" class="site-content">
	<div class="container"><?php 

	global $post;   
	$blog_page_layout = get_post_meta( $post->ID, '_gx_blogpage_layout', true );

    if( $blog_page_layout != 3 && $blog_page_layout != 5 && $blog_page_layout != 6 ) {
   	   do_action('beautify_pro_two_sidebar_left');  
    } ?>	  

	<div id="primary" class="content-area <?php beautify_pro_layout_class(); ?> columns">
		<main id="main" class="site-main blog-content <?php beautify_pro_masonry_blog_layout_class();?>" role="main"><?php

			$query_string ="post_type=post&paged=$paged";
			query_posts($query_string);
			$num_of_posts = $wp_query->post_count;

		if ( have_posts() ) : 

		    while ( have_posts() ) : the_post(); 

				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				switch ( $blog_page_layout ) {    
					        case 2: ?>
						       <div class="eight columns blog-box blog-two-column">	
					<?php	break;
					        case 3: ?>
							    <div class="one-third column blog-box blog-three-column">  
					<?php	break;
					        case 4: ?>
							    <div class="eight columns masonry-post blog-box blog-two-column">
					<?php	break;
							case 5: ?>  
							   <div class="one-third column masonry-post blog-box blog-three-column">	
					<?php	break;

			    }  

				get_template_part( 'template-parts/content-blog', get_post_format() );

				if(  isset( $blog_page_layout ) && $blog_page_layout  > 1 && $blog_page_layout  < 6 ) { ?>
		          </div><?php 
		        }

		    endwhile; 

			 beautify_pro_page_navigation();

		else : 

			 get_template_part( 'template-parts/content', 'none' ); 

		 endif; ?>   

		</main><!-- #main --> 
	</div><!-- #primary --><?php
    if( $blog_page_layout != 3 && $blog_page_layout != 5 && $blog_page_layout != 6 ) {
	   	do_action('beautify_pro_two_sidebar_right');
	} 

 get_footer();