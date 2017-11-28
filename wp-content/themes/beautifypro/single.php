<?php
/**
 * The template for displaying all single posts.
 *
 * @package BeautifyPro
 */

global $post;
$post_fullwidth = get_post_meta( $post->ID, '_gx_full_width_post', true );
if ( $post_fullwidth && $post->post_type == 'post' ){
    get_template_part('single-post-fullwidth');
}else{
get_header(); 
get_template_part('template-parts/breadcrumb');
do_action('beautify_pro_content_before');  		
do_action('beautify_pro_single_flexslider_featured_image'); ?>

	<div id="content" class="site-content">
		<div class="container">	

	<?php do_action('beautify_pro_two_sidebar_left'); ?>	

    <div id="primary" class="content-area <?php beautify_pro_layout_class();?> columns">

		<main id="main" class="site-main blog-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>
			<?php if( get_theme_mod('related_posts') && function_exists( 'beautify_pro_related_posts' ) ) : ?>
					<section class="related-posts clearfix">
						<?php beautify_pro_related_posts(); ?>
					</section>  
				<?php endif;  ?>   				
 
			<?php
				if( get_theme_mod ('comments',true) ) :
					beautify_pro_comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php do_action('beautify_pro_two_sidebar_right'); 
	
get_footer();
}