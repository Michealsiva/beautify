<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package BeautifyPro
 */
global $post;
$page_sidebar_layout = get_post_meta( $post->ID, '_gx_pagesidebar_layout', true ); ?>
<?php  do_action('beautify_pro_sidebar_left_before');  ?>
<div id="secondary" class="widget-area <?php beautify_pro_sidebar_width_class(); ?> columns" role="complementary">
    <div class="left-sidebar"><?php
       do_action('beautify_pro_sidebar_left_start');
       if( is_page() ):
		   $sidebar_one = get_post_meta( $post->ID, '_gx_sidebar_one', true );
		   $sidebar_two = get_post_meta( $post->ID, '_gx_sidebar_two', true );
       endif;
        if( function_exists('generated_dynamic_sidebar') && isset($sidebar_two) && !empty($sidebar_two) && 'two-sidebar' == $page_sidebar_layout || 'two-sidebar-left' == $page_sidebar_layout || 'two-sidebar-right' == $page_sidebar_layout )  {
			dynamic_sidebar($sidebar_two);
		}else{
		    dynamic_sidebar('sidebar-left');    
		}

       do_action('beautify_pro_sidebar_left_end'); ?>  
	</div>  
 
</div><!-- #secondary -->
<?php  do_action('beautify_pro_sidebar_left_before');  ?>