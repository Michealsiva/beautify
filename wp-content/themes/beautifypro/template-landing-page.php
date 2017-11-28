<?php
/**
 * Template Name: Landing Page 
 *
 * @package BeautifyPro
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>  
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11"><?php
if ( is_singular() && pings_open() ) { ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php
} ?>
<?php wp_head(); ?>
</head>
  
<body <?php body_class(); ?>>  
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'beautify_pro' ); ?></a>

	<div id="content" class="site-content">
		<div class="container">

			<div id="primary" class="content-area sixteen columns">

				<main id="main" class="site-main" role="main"><?php 
				    while ( have_posts() ) : the_post(); 

						get_template_part( 'template-parts/content', 'page' ); 

						beautify_pro_comments_template();

					endwhile; // end of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->
	    </div><!-- .row -->
	</div>
</div>
<?php wp_footer(); ?>

</body>
</html>
