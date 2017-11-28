<?php
/**
 * The template used for displaying page breadcrumb
 *
 * @package BeautifyPro
 */ 
$global_page_title_bar =  get_theme_mod('global_page_title_bar'); 

if( empty($global_page_title_bar) && is_page()) { 
	$page_title_bar = get_post_meta( $post->ID, '_gx_page_title_bar', true );
	$page_title_text = get_post_meta( $post->ID, '_gx_page_title_text', true );
	$page_breadcrumb = get_post_meta( $post->ID, '_gx_page_breadcrumb', true );  	
}else{
	$page_title_bar	=  get_theme_mod('page_titlebar'); 
	$page_title_text = get_theme_mod('page_titlebar_text'); 
	$page_breadcrumb = get_theme_mod('breadcrumb'); 
}    


if( is_404() || is_search()) { ?>   
	<div class="breadcrumb">
		<div class="container">
			<div class="sixteen columns"> 
				<div class="breadcrumb-left">  
					<h4 class="page-title"><?php
					  is_404() ? _e( 'Oops! That page can&rsquo;t be found.', 'beautify_pro' ) : printf( __( 'Search Results for: %s', 'beautify_pro' ), '<span>' . get_search_query() . '</span>' );?>
					</h4>
				</div>
			</div> 
		</div>
	</div><?php
}else{  
	if( !isset($page_title_bar) || $page_title_bar != 2 ) : ?>    
	   <div class="breadcrumb">   
		 <div class="container">
				<?php
					if( !isset($page_title_text) || empty($page_title_text) ) : ?>
						<div class="breadcrumb-left eight columns">
						     <?php the_title('<h4>','</h4>');?>			
					    </div>
					<?php endif; ?>	
					<?php  
						if( ( !isset( $page_breadcrumb) || empty($page_breadcrumb ) ) && function_exists('beautify_pro_breadcrumbs') ) : ?>
							<div class="breadcrumb-right eight columns">
								<?php beautify_pro_breadcrumbs(); ?> 
							</div><?php 
						endif; ?>	
			</div>
		</div><?php 
	endif; 	
}

