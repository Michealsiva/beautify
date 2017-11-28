<?php
/**
 * The Template for displaying all single Portfolio.
 *
 * @package Webulous
 */

get_header(); ?>

<?php get_template_part('template-parts/breadcrumb');
do_action('beautify_pro_content_before');  ?>		

<div id="content" class="site-content">
    <div class="container">

	<div id="primary" class="content-area sixteen columns">
		
		<main id="main" class="site-main" role="main">

				
				<?php if( have_posts() ) : ?>
					<?php while( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					
							<?php
								$project_url = get_post_meta( $post->ID, '_gx_portfolio_project_url', true );
								$project_link_text = get_post_meta( $post->ID, '_gx_portfolio_project_link_text', true ); 
								$project_video_type = get_post_meta( $post->ID, '_gx_portfolio_video_type', true );
							    $project_video_id = get_post_meta( $post->ID, '_gx_portfolio_video_id', true );
								$content_width = get_post_meta( $post->ID, '_gx_portfolio_content_width', true );
								if ( $content_width == "full_width") :      
							?>
			
							<section class="article-content">
								<div class="row">
									<div class="two-thirds column alpha">
										<div class="thumbnail">
											<?php the_post_thumbnail( 'full_width' ); ?>
										</div>	
									</div>
									<div class="thumbnail one-third column omega">
										<h3><?php _e( 'Project Description','beautify_pro' ); ?></h3>
										<?php the_content(); ?>
										<dl>
											<dt><?php _e( 'Skill needed','beautify_pro' ); ?></dt>
											<dd><?php echo the_terms( $post->ID, 'skills', '', ', ', '' ); ?></dd>
											<dt><?php _e( 'Category','beautify_pro' ); ?></dt>
											<dd><?php echo get_the_category_list( ', ', '', $post->ID ); ?></dd>
											<?php if(!empty( $project_url )) { ?>
											<dt><?php _e( 'Project Website','beautify_pro' ); ?></dt>
											<dd><a href="<?php echo esc_url($project_url); ?>"><?php echo $project_link_text; ?></a></dd>
											<?php } ?>
											<?php if(!$project_video_id) {
												echo '';   
											} else { ?>
												<dt>Video </dt>
									            <dd>
													<?php    if($project_video_type === 'youtube') {
																echo '<iframe width="300" height="200" ';
																echo 'src="http://www.youtube.com/embed/' . esc_attr( $project_video_id ) .'" frameborder="0" allowfullscreen></iframe>';
															} else {
																echo '<iframe src="http://player.vimeo.com/video/' . esc_attr( $project_video_id ) .'" ';
																echo 'width="300" height="200" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
															}?>
												</dd>
										
										    <?php } ?>


										</dl>
									</div> 
								</div>
															
							</section> <!-- end article section -->
							<?php else : ?>
							<section class="row entry-content">
								<div class="thumbnail two-thirds column alpha">
									<?php the_post_thumbnail( 'blog_large' ); ?>
								</div>
								<div class="one-third column omega offset-by-one">
								<h3><?php _e( 'Project Details','beautify_pro' ); ?></h3>
									<dl>
										<dt><?php _e( 'Project Date','beautify_pro' ); ?></dt>
										<dd><?php echo get_the_date(); ?></dd>
										<dt><?php esc_html_e( 'Skill needed','beautify_pro' ); ?></dt>
										<dd><?php echo the_terms( $post->ID, 'skills', '', ', ', '' ); ?></dd>
										<dt><?php esc_html_e( 'Category','beautify_pro'); ?></dt>
										<dd><?php echo get_the_category_list( ', ', '', $post->ID ); ?></dd>
										<?php if(!empty( $project_url )) { ?>
										<dt><?php esc_html_e( 'Project Website','beautify_pro' ); ?></dt>
										<dd><a href="<?php echo esc_url($project_url); ?>"><?php echo $project_link_text; ?></a></dd>
									   <?php } ?>
									   	<?php if(!$project_video_id) {
												echo '';   
											} else { ?>
												<dt>Video </dt>
									            <dd>
													<?php    if($project_video_type === 'youtube') {
																echo '<iframe width="300" height="200" ';
																echo 'src="http://www.youtube.com/embed/' . esc_attr( $project_video_id ) .'" frameborder="0" allowfullscreen></iframe>';
															} else {
																echo '<iframe src="http://player.vimeo.com/video/' . esc_attr( $project_video_id ) .'" ';
																echo 'width="300" height="200" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
															}?>
												</dd>
										
										<?php } ?>
									</dl>
								</div>
							</section> <!-- end article section -->
							<div class="pro-descrition">
								<h4><?php _e( 'Project Description','beautify_pro' ); ?></h4>
								<?php the_content(); ?>	
							</div>							
							<?php endif; ?>
							

							<section class="related-posts">
								<?php
									if( get_theme_mod('related_posts') && function_exists( 'genex_fw_related_posts' ) ) {
										genex_fw_related_posts(); 
									}
								?>
			
						</article> <!-- end article -->
					<?php endwhile; 
				
					beautify_pro_page_navigation();
				
				 else : ?>
						
						<article id="post-not-found">
							
							<header class ="article-header">
								<h1 class="article-title"><?php _e("Page Not Found", 'beautify_pro'); ?></h1>
							</header>
							
							<section class="article-content">
								<p>
									<?php 
										printf( __('The page you were looking for was not found!. You can return %s or search for the page you were looking for.', 'beautify_pro'), sprintf( '<a href="%1$s" title="%2$s">%3$s</a>', esc_url( get_home_url() ), esc_attr__('Home', 'beautify_pro'), esc_attr__('&larr; Home', 'beautify_pro') )); 
									?>
								</p>
							</section>

							<footer class="article-footer">
								<p>
									<?php 
										_e("This is the error message in the page.php template.", 'beautify_pro'); 
									?>
								</p>
							</footer>

						</article>
						
				<?php endif; ?>						

			</main><!-- #main -->
		</div><!-- #primary -->

		</div><!-- .row -->
	</div><!-- .container -->
		
	<?php get_footer(); ?>