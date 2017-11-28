<?php 
/*
	Template Name: Portfolio
 */ 
get_header(); ?>
<style type="text/css">
	.item {
		overflow: hidden;              
	}
</style><?php     

$portfolio_layout = get_post_meta( $post->ID, '_gx_portfolio_layout', true );
$portfolio_filter = get_post_meta( $post->ID, '_gx_portfolio_filter_status', true );
$portfolio_gap = trim( get_post_meta( $post->ID, '_gx_page_portfolio_gap', true ) );
$portfolio_sidebar =  get_post_meta( $post->ID, '_gx_page_portfolio_sidebar', true );
$portfolio_text =  get_post_meta( $post->ID, '_gx_page_portfolio_text', true );
$portfolio_skill =  get_post_meta( $post->ID, '_gx_portfolio_skill' );
$portfolio_category = get_post_meta( $post->ID, '_gx_portfolio_category' );
$portfolio_count = get_post_meta( $post->ID, '_gx_page_portfolio_count', true );

	switch ( $portfolio_layout ) {
		case ( $portfolio_layout == '2col' && $portfolio_gap == false ): ?>
			<style type="text/css">
	           .item {
				  width: 47%;
				  margin: 1%;
				} 
            </style><?php
			break;

		case ( $portfolio_layout == '2col' && $portfolio_gap == true ): ?>
			<style type="text/css">
           .item {
			  width: 49%;
			  margin: 0%;
			} 
        </style><?php
			break;

		case ( $portfolio_layout == '3col' && $portfolio_gap == false ): ?> 
			<style type="text/css">
           .item {
			  width: 31.33%;
			  margin: 1%;
			} 
        </style><?php
			break;

		case ( $portfolio_layout == '3col' && $portfolio_gap == true ): ?>
			<style type="text/css">
           .item {
			  width: 33.33%;
			  margin: 0%;
			} 
        </style><?php
			break;

		case ( $portfolio_layout == '4col' && $portfolio_gap == false ): ?> 
			<style type="text/css">
           .item {
			  width: 23%;
			  margin: 1%;
			} 
        </style><?php
			break;

		case ( $portfolio_layout == '4col' && $portfolio_gap == true ): ?>
			<style type="text/css">
           .item {
			  width: 25%;
			  margin: 0%;
			} 
        </style><?php
			break;
	}

 /* Portfolio filter status */
 switch ($portfolio_filter) {
    case 'without-all': ?>
        <style type="text/css">
           #filters .filter-options li:first-child {
                display: none;
           } 
        </style><?php
    break;
    case 'hide': ?>
         <style type="text/css">
            #filters .filter-options {
                display: none;
           } 
        </style><?php
    break;
 } 

/*  Portfolio Sidebar */
$portfolio_layout_class = !empty($portfolio_sidebar) ? 'eleven' : 'sixteen'; ?>

	<?php get_template_part('template-parts/breadcrumb'); ?>
		<?php do_action('beautify_pro_content_before'); ?>   		

	<div id="content" class="site-content">		
	   <div class="container">	
	
		<div id="primary" class="content-area <?php echo $portfolio_layout_class; ?> columns">
		
			<main id="main" class="site-main" role="main">
 			    <?php while ( have_posts() ) : the_post(); 
					 the_content(); 
				endwhile; // end of the loop. 

                    foreach ($portfolio_category as $key => $val) {
				        $portfolio_categories = explode(',', $val);
					}
					foreach ($portfolio_skill as $key => $val) {
				        $portfolio_skills = explode(',', $val);
					}

					

		            $query_string = array(  
		            	'post_type' => 'portfolio',
		            	'paged' => $paged,
		            	'posts_per_page' => $portfolio_count,
		            	'tax_query' => array( 
		            		'relation' => 'OR',  
		                ),
		            ); 

		            if( !empty($portfolio_category) ) {
                        $query_string['tax_query'][] =  array(
							'taxonomy' => 'portfolio_cat', 
							'field' => 'term_id',  
							'terms' => $portfolio_categories,
						); 
					}


					if( !empty($portfolio_skill) ) {
                        $query_string['tax_query'][] =  array(
							'taxonomy' => 'skills',  
							'field' => 'term_id',
							'terms'    => $portfolio_skills, 
						);
					}
		         
					
					query_posts($query_string);
					$num_of_posts = $wp_query->post_count;
					$count = 0; ?>

			<div id="filters">  
				<?php 
					$terms = get_terms("skills");
					$count = count($terms);
					if ( $count > 0 ) : ?>
					<ul class="filter-options" data-option-key="filter">
						<li><a href="#filter" data-option-value="*" class="selected"><?php echo apply_filters('beautify_pro_portfolio_all_text' , __('All','beautify_pro') ); ?></a></li>
						<?php foreach ( $terms as $term ) : ?>
						<li><a href="#filter" data-option-value=".<?php echo str_replace(' ' , '-', $term->name); ?>"><?php echo $term->name; ?></a></li>
						<?php endforeach; ?>
					</ul>
					<?php endif;
				?> 
				<div class="clearfix"></div>
			</div>

			<ul id="portfolio" class="<?php do_action('beautify_pro_portfolio_masonry_status'); ?>">    
				<?php if (have_posts()) : while (have_posts()) : 
					the_post(); 
					$terms = get_the_terms( $post->ID, 'skills' );						
					if ( $terms && ! is_wp_error( $terms ) ) : 
						$skills = array();
						foreach ( $terms as $term ) {
							$skills[] = str_replace(' ' , '-', $term->name);
						}
						$skills = join( " ", $skills );
					endif; ?>

					<li class="item <?php echo $skills; ?>">
						<div class="portfolio2col portfolioeffects">
							<?php
								$portfolio_video_type        =  get_post_meta( $post->ID, '_gx_portfolio_video_type', true );
								$portfolio_video_id          = trim( get_post_meta( $post->ID, '_gx_portfolio_video_id', true ) );
								$portfolio_project_url       = trim( get_post_meta( $post->ID, '_gx_portfolio_project_url', true ) );
								$portfolio_project_link_text = trim( get_post_meta( $post->ID, '_gx_portfolio_project_link_text', true ) );
							?>	
							<div class="portfolio_thumb">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'portfolio4col' ); ?></a>	
	                          </div>
	                           <div class="portfolio_overlay" >
	                           	<div class="content-details">
									<h3>
										<a href="<?php the_permalink(); ?>" title="<?php _e( the_title_attribute(), 'beautify_pro' ); ?>">
											<?php the_title(); ?>
										</a>
									</h3>
						        </div>
									<div class="overlay_icon portfolio_link_icons">
								<?php if( $portfolio_video_type != 'none' && $portfolio_video_id != '' ) :  ?>
									<?php if( $portfolio_video_type == 'vimeo' ) : ?>
										<a class="icon-zoom" href="http://vimeo.com/<?php echo $portfolio_video_id; ?>" rel="prettyPhoto"><i class="fa fa-search"></i></a>
									<?php else : ?>
										<a class="icon-zoom" href="http://www.youtube.com/watch?v=<?php echo $portfolio_video_id; ?>" rel="prettyPhoto"><i class="fa fa-search"></i></a>
									<?php endif; ?>
								<?php else :  
									$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
										<a class="icon-zoom" href="<?php echo $url; ?>" rel="prettyPhoto[elasti]"><i class="fa fa-search"></i></a>
								<?php endif; ?>
									<a class="icon-link" href="<?php the_permalink(); ?>" title="<?php the_title( ); ?>"><i class="fa fa-link"></i></a>
								</div>				
							    </div>
						</div><?php  
							if( $portfolio_text ) { ?>
	                           <div class="portfolio-excerpt">
									<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
									<?php the_content(); ?>
							   </div><!-- .excerpt -->	<?php
							} ?>								
					</li>
				<?php endwhile; ?>	
			</ul>
			
				<?php beautify_pro_page_navigation(); ?>

				<?php else : ?> 
					
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
				  			    
				</main> <!-- end #main -->

			</div> <!-- end #content -->

  
<?php if( isset($portfolio_sidebar) && !empty($portfolio_sidebar) ) {
	 get_sidebar();
} 
get_footer(); ?>