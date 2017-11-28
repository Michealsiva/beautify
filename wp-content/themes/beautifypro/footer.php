<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package BeautifyPro
 
 */
?>
		</div> <!-- .container -->
	</div><!-- #content --><?php
     do_action('beautify_pro_content_after'); ?>

    <?php do_action('beautify_pro_footer_before'); ?>
	<footer id="colophon" class="site-footer footer-image  " role="contentinfo">
		<?php   if ( get_theme_mod ('footer_overlay',false ) ) { 
				   echo '<div class="overlay overlay-footer"></div>';     
				} 
				do_action('beautify_pro_footer_start'); 
	  
		$footer_widgets = get_theme_mod( 'footer_widgets',true );
		if( $footer_widgets ) : ?>
		<div class="footer-widgets">
			<div class="container">
				<?php get_template_part('footer','widgets'); ?>
			</div>
		</div>
	<?php endif; ?>  

	<?php do_action('beautify_pro_footer_bottom_before'); ?>

		<div class="footer-bottom site-info copy"> 
			<div class="container">
				<div class="copyright sixteen columns">  
					<?php do_action('beautify_pro_credits'); ?>
				</div>
			</div>
		</div>

   <?php do_action('beautify_pro_footer_bottom_after'); ?>
   
	<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
	<?php do_action('beautify_pro_footer_end'); ?>

	</footer><!-- #colophon -->

	<?php do_action('beautify_pro_footer_after'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
