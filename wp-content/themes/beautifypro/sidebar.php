<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package BeautifyPro
 */
?>   
<?php  do_action('beautify_pro_sidebar_right_before'); ?>  
<div id="secondary" class="widget-area <?php beautify_pro_sidebar_width_class(); ?> columns" role="complementary">

		<div class="left-sidebar"><?php
		      do_action('beautify_pro_sidebar_right_start'); 
            if( is_page() ):
               $sidebar_one = get_post_meta( $post->ID, '_gx_sidebar_one', true );
               $sidebar_two = get_post_meta( $post->ID, '_gx_sidebar_two', true );
            endif;

	            if( function_exists('generated_dynamic_sidebar') && isset($sidebar_one) && !empty($sidebar_one ) ) {
                 // generated_dynamic_sidebar(); 
                  dynamic_sidebar($sidebar_one);   
              }else{
                dynamic_sidebar('sidebar-1');  
              } 
                
		      do_action('beautify_pro_sidebar_right_end');  ?>  
		</div>

    </div><!-- #secondary -->
<?php  do_action('beautify_pro_sidebar_right_after');  ?>
 

