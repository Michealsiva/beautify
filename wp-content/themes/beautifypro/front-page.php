<?php 
/**
 * The front page template file.
 *
 *
 * @package BeautifyPro

 */
$page_sidebar_layout = get_post_meta( $post->ID, '_gx_pagesidebar_layout', true ); 
	if( 'posts' == get_option('show_on_front') ) {  
		get_template_part('home');
	}else{ 
        get_header();     
  
		do_action('beautify_pro_content_before'); ?>

	<?php  
	$slider_cat = get_theme_mod( 'slider_cat', '' );
	$slider_count = get_theme_mod( 'slider_count', 5 );   
	$slider_posts = array(   
		'cat' => absint($slider_cat),
		'posts_per_page' => intval($slider_count)              
	);

	$home_slider = get_theme_mod('slider_field',true); 
	if( $home_slider ):
		if ( $slider_cat ) {
			$query = new WP_Query($slider_posts);        
			if( $query->have_posts()) : ?> 
				<div class="flexslider free-flex">  
					<ul class="slides">
						<?php while($query->have_posts()) :
								$query->the_post();
								if( has_post_thumbnail() ) : ?>
								    <li>
								    	<div class="flex-image">
								    		<?php the_post_thumbnail('full'); ?>
								    	</div>
								    	<div class="flex-caption">
								    		<?php the_content( __('Read More','beautify') ); ?>
								    	</div>
								    </li>
							    <?php endif;?>			   
						<?php endwhile; ?>
					</ul>
				</div>
		
			<?php endif; ?>
		   <?php  
			$query = null;
			wp_reset_postdata();
			
		}
    endif; ?>

   <div id="content" class="site-content">
   		<?php do_action( 'beautify_after_slider_part' );?>
   	</div>
   	<?php
			
        if( get_theme_mod('enable_recent_post_service',true) ) :
		   	do_action('beautify_recent_post_before');
			beautify_pro_recent_posts(); 
		    do_action('beautify_recent_post_after');
	    endif;

?>  

		<div id="content" class="site-content"> 
			<div class="container"><?php

			do_action('beautify_pro_primary_before'); ?> 

				<div id="primary" class="content-area <?php beautify_pro_primary_class(); ?> columns">

				   <main id="main" class="site-main" role="main"><?php
				    if( get_theme_mod('enable_home_default_content',false ) ) {  
						while ( have_posts() ) : the_post();
							the_content();    
						endwhile; 
				    } ?>
			        </main><!-- #main -->

			    </div><!-- #primary --><?php

            do_action('beautify_pro_primary_after');
			
			get_footer();  
	}
