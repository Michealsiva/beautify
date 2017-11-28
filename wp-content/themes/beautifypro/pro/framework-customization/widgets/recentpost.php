<?php
if ( ! empty( $title ) ) {
	echo  '<h2 class="sep center"><span><p class="divider-wrapper">'. esc_html( $title ) . '</p></span></h2>'; 
}

    $output = '';
		$output .= '<div class="recent-posts-wrapper">';

		switch( $type ) {
			case 'normal':
				$output .= '<div class="recent-posts">';
				break;
			case 'slider' :
				$output .= '<div class="recent-posts-slider clearfix">';
				break;
			case 'carousel' :
				$output .= '<div class="recent-posts-carousel">';
				break;
			default:
				$output .= '<div class="recent-posts">';
				break;
		}

		$output .= '<ul class="slides">';
 

			// WP_Query arguments
			$recent_post_args = array (
				'post_type'              => 'post',
				'category_name'          => $cat,
				'post_status'            => 'publish',
				'posts_per_page'         => $count,
				'ignore_sticky_posts'    => true,
				'order'                  => 'DESC',
			);

		// The Query
		$query = new WP_Query( apply_filters( 'recent_posts_args', $recent_post_args ) );

		// The Loop
		if ( $query->have_posts() ) { 
	        if( $type == 'normal' ) {
				$output .= '<div class="latest-posts">';
			}
			while ( $query->have_posts() ) {  
				$query->the_post();	
				if( $type == 'normal' ) {	
					$output .= '<div class="eight columns">';
						$output .= '<div class="latest-post">';
								$output .= '<div class="latest-post-thumb">'; 
										if ( has_post_thumbnail() ) {
											$output .= '<a href="'. get_permalink() . '">'. get_the_post_thumbnail($query->post->ID ,'beautify-pro-recent-posts-img').'</a>';
										} 
										else {  
											$output .= '<img src="' . get_template_directory_uri()  . '/images/no-image-blog-full-width.png" alt="" >';
										}
								$output .= '</div><!-- .latest-post-thumb -->';
								$output .='<div class="entry-meta">';  
									$output .='<span class="data-structure"><a class="url fn n" href="'. get_day_link( get_the_time('Y'), get_the_time('m'),get_the_time('d')). '"><span class="dd"><span class="date">'.get_the_time('j').'</span><span class="month">'. get_the_time('M').'</span></span></a></span>';
								$output .='</div><!-- entry-meta -->';
								$output .= '<div class=latest-post-details>';
								    $output .= '<h4><a href="'. get_permalink() . '">' . get_the_title() . '</a></h4>';
									
									
									$output .= '<div class="latest-post-content">';
										$output .= '<p>' . get_the_content() . '</p>';
									$output .= '</div><!-- .latest-post-content -->';
								$output .= '</div><!-- .latest-post-details -->';
							
							
						$output .= '</div><!-- .latest-post -->';
					$output .= '</div>';
				}elseif( $type == 'carousel' ) {
				        $output .= '<li>';
						$output .= '<div class="latest-post">';
								$output .= '<div class="latest-post-thumb">'; 
										if ( has_post_thumbnail() ) {
											$output .= get_the_post_thumbnail($query->post->ID ,array(380,350));
										}
										else { 
											$output .= '<img src="' . get_template_directory_uri()  . '/images/no-image-blog-full-width.png" alt="" >';
										}
								$output .= '</div><!-- .latest-post-thumb -->';
								$output .= '<div class=latest-post-details>';
								    $output .= '<h3><a href="'. get_permalink() . '">' . get_the_title() . '</a></h3>';
									/*$output .='<div class="entry-meta">';
										$output .='<span class="data-structure"><span class="dd">' . get_the_time('F j, Y').'</span></span>';
									$output .='</div><!-- entry-meta -->';	*/
									$output .= '<div class="latest-post-content">';
										$output .= '<p>' . get_the_content() . '</p>';
									$output .= '</div><!-- .latest-post-content -->';
								$output .= '</div><!-- .latest-post-details -->';
							
						$output .= '</div><!-- .latest-post -->';
						$output .= '</li>';
			    }else {
			    	$output .= '<li>';
						$output .= '<div class="recent-post">';
						$output .= '<div class="rp-thumb">';	              
							if ( has_post_thumbnail() ) {
								$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $query->post->ID ),'genex_material-blog-full-width' );
								$output .= '<img src="' . $image_url[0] . '">';
							} else {
								$output .= '<img src="' . get_template_directory_uri()  . '/images/no-image-blog-full-width.png" alt="" >';     
							}
						$output .= '</div><!-- .rp-thumb -->';
						$output .= '<div class="rp-content flex-caption">';
						$output .= '<h4><a href="'.get_permalink().'">'. get_the_title() . '</a></h4>';
						$output .= get_the_content();
						$output .= '</div><!-- .rp-content -->';
						$output .= '</div>';
						$output .= '</li>';
			    }
			}
		}

		$query = null;

		// Restore original Post Data
		wp_reset_postdata();
		$output .= '</ul>';
		$output .= '</div></div>';
		echo $output; 
