<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package BeautifyPro
 */ 

/**   
 * Register Google fonts.   
 *
 * @return string           
 */
if( !function_exists('beautify_pro_theme_font_url') ) {
	function beautify_pro_theme_font_url($font) {
		$font_url = '';
		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Font, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Font: on or off', 'beautify_pro' ) ) {
			$font_url = esc_url( add_query_arg( 'family', $font, "//fonts.googleapis.com/css" ) );
		}

		return $font_url;
	}
}

// Recent Posts with featured Images to be displayed on home page
if( ! function_exists('beautify_pro_recent_posts') ) {  
	function beautify_pro_recent_posts() {      
		$output = '';
		$posts_per_page  = get_theme_mod('recent_posts_count', 6 );
		// WP_Query arguments
		$args = array (
			'post_type'              => 'post',
			'post_status'            => 'publish',   
			'posts_per_page'         => intval($posts_per_page),
			'ignore_sticky_posts'    => true,
			'order'                  => 'DESC',
		);

		// The Query
		$query = new WP_Query( $args );
		// The Loop 
		if ( $query->have_posts() ) {
			$output .= '<div class="post-wrapper">'; 
			$recent_post_status=get_theme_mod('enable_recent_post_service',true);
		   	$recent_post_section_title= get_theme_mod('recent_post_section_title');
		   	if ( '$recent_post_status' && '$recent_post_section_title'  ) {
				$output.= '<div class="section-head">';
				$output.= '<h1 class="title-divider">' . get_the_title(absint($recent_post_section_title)) . '</h1>';
				$description = get_post_field('post_content',absint($recent_post_section_title));
				$output.= '<p class="sub-description">' . $description . '</p>';
			    $output.= '</div>';
			}
			$output .=  '<div class="container"><main id="main" class="site-main" role="main">'; 
			$output .= '<div class="latest-posts clearfix">';
			while ( $query->have_posts() ) {
				$query->the_post();
				$output .= '<div class="one-third column">';
						$output .= '<div class="latest-post">';
								$output .= '<div class="latest-post-thumb">'; 
										if ( has_post_thumbnail() ) {
											$output .= '<a href="'. esc_url(get_permalink()) . '">'. get_the_post_thumbnail($query->post->ID ,'beautify-pro-recent-posts-img').'</a>';
										}
										else {  
											$output .= '<img src="' . get_template_directory_uri()  . '/images/no-image-blog-full-width.png" alt="" >';
										}
								$output .= '</div><!-- .latest-post-thumb -->';
								$output .= '<div class=latest-post-details>';
								    $output .= '<h4><a href="'. esc_url(get_permalink()) . '">' . get_the_title() . '</a></h4>';
									
									/*$output .='<div class="entry-meta">';  
										$output .='<span class="data-structure"><a class="url fn n" href="'. get_day_link( get_the_time('Y'), get_the_time('m'),get_the_time('d')). '"><span class="dd">' . get_the_time('F j, Y').'</span></a></span>';
									$output .='</div><!-- entry-meta -->';	*/	
									$output .= '<div class="latest-post-content">';
										$output .= '<p>' . get_the_content() . '</p>';
									$output .= '</div><!-- .latest-post-content -->';
								$output .= '</div><!-- .latest-post-details -->';
						$output .= '</div><!-- .latest-post -->';
				$output .= '</div>';
			}
			$output .= '</div><!-- latest post end -->';
			$output .= '</main></div>';
			$output .= '</div><!-- .post-wrapper -->';
		} 
		$query = null;
		// Restore original Post Data
		wp_reset_postdata();
		echo $output;
	}
}



if ( ! function_exists( 'beautify_pro_posts_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function beautify_pro_posts_nav() {    
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {   
		return;
	}    
	?>
	<nav class="navigation pagination post-navigation clearfix" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'beautify_pro' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'beautify_pro' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'beautify_pro' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if( !function_exists('beautify_pro_get_author') ) {
	function beautify_pro_get_author() {
		$byline = sprintf(
			_x( '%s', 'post author', 'beautify_pro' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
		);	

		return $byline;      
     }
}

if ( ! function_exists( 'beautify_pro_entry_top_meta' ) ) : 
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function beautify_pro_entry_top_meta() {   
	// Post meta data 
	
	  $single_post_top_meta = get_theme_mod('single_post_top_meta', array(1,2,3,6) );
      // echo '<pre>',print_r($single_post_top_meta),'</pre>';
	
    if ( 'post' == get_post_type() ) {  
		foreach ($single_post_top_meta as $key => $value) {
		    if( $value == '1') { 
		    	global $post;?>
		  	    <span class="date-structure">				
					<span class="dd"><a class="url fn n" href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'),get_the_time('d')); ?>"><?php the_time('F j, Y'); ?></a></span>		
				</span>
	<?php   }elseif( $value == 2) {
				printf(
					_x( '%s', 'post author', 'beautify_pro' ),
					'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
				);	
			}elseif( $value == 3)  {
				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo ' <span class="comments-link">';
					comments_popup_link( __( 'Leave a comment', 'beautify_pro' ), __( '1 Comment', 'beautify_pro' ), __( '% Comments', 'beautify_pro' ) );
					echo '</span>';
			    }
	        }elseif( $value == 4) {
				$categories_list = get_the_category_list( __( ', ', 'beautify_pro' ) );
				if ( $categories_list ) {
					printf( '<span class="cat-links">' . __( '%1$s ', 'beautify_pro' ) . '</span>', $categories_list );
				}	
		    }elseif( $value == 5)  {
	    		/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'beautify_pro' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links">' . __( '%1$s ', 'beautify_pro' ) . '</span>', $tags_list );
				}			
		    }elseif( $value == 6) {
		        edit_post_link( __( 'Edit', 'beautify_pro' ), '<span class="edit-link">', '</span>' );
		    }
	    }
	}
}

endif;
if ( ! function_exists( 'beautify_pro_entry_bottom_meta' ) ) : 
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function beautify_pro_entry_bottom_meta() {    
	// Post meta data 
	
	$single_post_bottom_meta = get_theme_mod('single_post_bottom_meta', array(4,5) );

	if ( 'post' == get_post_type() ) {  
		foreach ($single_post_bottom_meta as $key => $value) {
		    if( $value == '1') { ?>
		  	    <span class="date-structure">				
					<span class="dd"><a class="url fn n" href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'),get_the_time('d')); ?>"><?php the_time('F j, Y'); ?></a></span>	
				</span>
	<?php   }elseif( $value == 2) {
				printf(
					_x( '%s', 'post author', 'beautify_pro' ),
					'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
				);	
			}elseif( $value == 3)  {
				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo ' <span class="comments-link">';
					comments_popup_link( __( 'Leave a comment', 'beautify_pro' ), __( '1 Comment', 'beautify_pro' ), __( '% Comments', 'beautify_pro' ) );
					echo '</span>';
			    }
	        }elseif( $value == 4) {
				$categories_list = get_the_category_list( __( ', ', 'beautify_pro' ) );
				if ( $categories_list ) {
					printf( '<span class="cat-links">' . __( '%1$s ', 'beautify_pro' ) . '</span>', $categories_list );
				}	
		    }elseif( $value == 5)  {
	    		/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'beautify_pro' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links">' . __( '%1$s ', 'beautify_pro' ) . '</span>', $tags_list );
				}			
		    }elseif( $value == 6) {
		        edit_post_link( __( 'Edit', 'beautify_pro' ), '<span class="edit-link">', '</span>' );
		    }
	    }
	}
}

endif;


if ( ! function_exists( 'beautify_pro_get_comments_meta' ) ) :
	function beautify_pro_get_comments_meta() {			
		$num_comments = get_comments_number(); // get_comments_number returns only a numeric value
 
		if ( comments_open() ) {
		  if ( $num_comments == 0 ) {
		    $comments = __('No Comments','beautify_pro');
		  } elseif ( $num_comments > 1 ) {
		    $comments = $num_comments . __(' Comments','beautify_pro');
		  } else {
		    $comments = __('1 Comment','beautify_pro');  
		  }
		  $write_comments = '<span class="comments-link"><i class="fa fa-comments"></i><a href="' . esc_url(get_comments_link()) .'">'. esc_html($comments).'</a></span>';
		} else{
			$write_comments = '<span class="comments-link"><i class="fa fa-comments"></i><a href="' . esc_url(get_comments_link()) .'">'. esc_html(__('Leave a comment', 'beautify_pro') ).'</a></span>';
		}
		return $write_comments;	
	}

endif;

if ( ! function_exists( 'beautify_pro_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function beautify_pro_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation clearfix" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'beautify_pro' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'beautify_pro' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'beautify_pro' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;   

if ( ! function_exists( 'beautify_pro_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function beautify_pro_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation clearfix" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'beautify_pro' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous"><span class="meta-previuous-post">'. __('previous post','beautify_pro') .'</span>%link</div>', _x( '%title', 'Previous post link', 'beautify_pro' ) );
				next_post_link(     '<div class="nav-next"><span class="meta-next-post">'. __('next post','beautify_pro') .'</span>%link</div>',     _x( '%title&nbsp;', 'Next post link',     'beautify_pro' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'beautify_pro_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function beautify_pro_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'beautify_pro' ),
		'<i class="fa fa-clock-o"></i> <span><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>'
	);

	$byline = sprintf(
		_x( '%s', 'post author', 'beautify_pro' ),
		'<i class="fa fa-user"></i> <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';
	edit_post_link( __( 'Edit', 'beautify_pro' ), ' <span class="edit-link"><i class="fa fa-pencil"></i>', '</span>' );

}
endif;

if ( ! function_exists( 'beautify_pro_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function beautify_pro_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'beautify_pro' ) );
		if ( $categories_list && beautify_pro_categorized_blog() ) {
			printf( ' <span class="cat-links"><i class="fa fa-folder-open"></i>' . __( '%1$s ', 'beautify_pro' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'beautify_pro' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><i class="fa fa-tags"></i> ' . __( '%1$s ', 'beautify_pro' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( '<i class="fa fa-comments"></i>Leave a comment', 'beautify_pro' ), __( '<i class="fa fa-comments"></i> 1 Comment', 'beautify_pro' ), __( '<i class="fa fa-comments"></i> % Comments', 'beautify_pro' ) );
		echo '</span>';
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'beautify_pro_categorized_blog' ) ) {
	function beautify_pro_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'beautify_pro_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,

				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'beautify_pro_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so beautify_pro_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so beautify_pro_categorized_blog should return false.
			return false;
		}
	}
}


if ( ! function_exists( 'beautify_pro_comment' ) ) : 
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function beautify_pro_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'beautify_pro' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'beautify_pro' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="comment-meta">
				<div class="comments-avatar">
					<?php if ( 0 != $args['avatar_size'] ) { echo get_avatar( $comment, $args['avatar_size']=50); } ?>
				</div>
				<span class="comment-author vcard">
					<?php printf( __( '%s', 'beautify_pro' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</span><!-- .comment-author -->
				<span class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '- %1$s at %2$s', '1: date, 2: time', 'beautify_pro' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'beautify_pro' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' ); ?>
				</span><!-- .comment-metadata -->
				

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'beautify_pro' ); ?></p>
				<?php endif; ?>

			<div class="comment-content">
				<?php comment_text(); ?>
				<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="reply"><i class="fa fa-reply"></i>',
						'after'     => '</div>',
					) ) );
				?>				
			</div><!-- .comment-content -->
			</div><!-- .comment-meta -->

		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for beautify_pro_comment()

/**
  * Generates Breadcrumb Navigation
  */
 
 if( ! function_exists( 'beautify_pro_breadcrumbs' )) {
	function beautify_pro_breadcrumbs() {
		/* === OPTIONS === */
		$text['home']     = __( 'Home','beautify_pro' ); // text for the 'Home' link
		$text['category'] = __( 'Archive by Category "%s"','beautify_pro' ); // text for a category page
		$text['search']   = __( 'Search Results for "%s" Query','beautify_pro' ); // text for a search results page
		$text['tag']      = __( 'Posts Tagged "%s"','beautify_pro' ); // text for a tag page
		$text['author']   = __( 'Articles Posted by %s','beautify_pro' ); // text for an author page
		$text['404']      = __( 'Error 404','beautify_pro' ); // text for the 404 page

		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		
		global $post;
		$global_page_title_bar =  get_theme_mod('global_page_title_bar'); 
	    if( empty($global_page_title_bar) ) {  
           $breadcrumb_char = get_post_meta( $post->ID, '_gx_page_breadcrumb_char', true );
		}else{
			$breadcrumb_char = get_theme_mod( 'breadcrumb_char', 1 );
		}
	  
		
		if ( $breadcrumb_char ) {
		 switch ( $breadcrumb_char ) {
		 	case 2 :
		 		$delimiter = ' / ';
		 		break;
		 	case 3:
		 		$delimiter = ' > ';
		 		break;
		 	case 1:
		 	default:
		 		$delimiter = ' &raquo; ';
		 		break;
		 }
		}else{
		 	$delimiter = ' &raquo; ';
		 }

		$before      = '<span class="current">'; // tag before the current crumb
		$after       = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post;
		$homeLink = home_url() . '/';
		$linkBefore = '<span typeof="v:Breadcrumb">';
		$linkAfter = '</span>';
		$linkAttr = ' rel="v:url" property="v:title"';
		$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

		if (is_home() || is_front_page()) {

			if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';

		} else {

			echo '<div id="crumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;

			if ( is_category() ) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) {
					$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					echo $cats;
				}
				echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

			} elseif ( is_search() ) {
				echo $before . sprintf($text['search'], get_search_query()) . $after;

			} elseif ( is_day() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
				echo $before . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo $before . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				echo $before . get_the_time('Y') . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
					if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $delimiter);
					if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					echo $cats;
					if ($showCurrent == 1) echo $before . get_the_title() . $after;
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
				printf($link, get_permalink($parent), $parent->post_title);
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

			} elseif ( is_page() && !$post->post_parent ) {
				if ($showCurrent == 1) echo $before . get_the_title() . $after;

			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

			} elseif ( is_tag() ) {
				echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

			} elseif ( is_author() ) {
		 		global $author;
				$userdata = get_userdata($author);
				echo $before . sprintf($text['author'], $userdata->display_name) . $after;

			} elseif ( is_404() ) {
				echo $before . $text['404'] . $after;
			}

			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo __('Page', 'beautify_pro' ) . ' ' . get_query_var('paged');
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
			}

			echo '</div>';

		}
	} // end beautify_pro_breadcrumbs()
}

if( ! function_exists( 'beautify_pro_author' )) {
	function beautify_pro_author() {
		$byline = sprintf(
			_x( '%s', 'post author', 'beautify_pro' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
		);	

		echo $byline;
	}
}

if( ! function_exists( 'beautify_pro_get_author' )) {
	function beautify_pro_get_author() {
		$byline = sprintf(
			_x( '%s', 'post author', 'beautify_pro' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
		);	

		return $byline; 
	}
}

// Related Posts Function by Tags (call using beautify_pro_related_posts(); ) /NecessarY/ May be write a shortcode?
if( ! function_exists( 'beautify_pro_related_posts' )) {
	function beautify_pro_related_posts() {
		echo '<ul id="webulous-related-posts">';
		global $post;
		$post_hierarchy = get_theme_mod('related_posts_hierarchy',1);
		$relatedposts_per_page  =  get_option('post_per_page');
		if($post_hierarchy == 1) {
			$related_post_type = wp_get_post_tags($post->ID);
			$tag_arr = '';
			if($related_post_type) {
				foreach($related_post_type as $tag) { $tag_arr .= $tag->slug . ','; }
		        $args = array(
		        	'tag' => $tag_arr,
		        	'numberposts' => $relatedposts_per_page, /* you can change this to show more */
		        	'post__not_in' => array($post->ID)
		     	);
		   }
		}else {
			$related_post_type = get_the_category($post->ID); 
			if ($related_post_type) {
				$category_ids = array();
				foreach($related_post_type as $category) {
				     $category_ids = $category->term_id; 
				}  
				$args = array(
					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'numberposts' => $relatedposts_per_page,
		        );
		    }
		}
		if( $related_post_type ) {
	        $related_posts = get_posts($args);
	        if($related_posts) { ?>
               <h4><?php _e('Related Post','beautify_pro'); ?></h4><?php
	        	foreach ($related_posts as $post) : setup_postdata($post); ?>
		           	<li class="related_post">
		           		<a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('recent-work'); ?></a>
		           		<a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		           	</li>
		        <?php endforeach; }
		    else {
	            echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'beautify_pro' ) . '</li>'; 
			 }
		}else{
			echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'beautify_pro' ) . '</li>';
		}
		wp_reset_query();
		
		echo '</ul>';
	}
}


/* custom layout functions */

/*  Site Layout Option - Blog  */  
if( !function_exists('beautify_pro_layout_class') ) {     
	function beautify_pro_layout_class() {
		global $post;
        $blog_page_layout = get_post_meta( $post->ID, '_gx_blogpage_layout', true );
		if( is_page_template('template-blog.php') && ( $blog_page_layout == 3 ||  $blog_page_layout == 5 || $blog_page_layout == 6 ) ) {
	       echo 'sixteen'; 
	       return;
		}else{
			if(  is_home()  &&  ( get_theme_mod('blog_layout',1) == 3 ||  get_theme_mod('blog_layout',1) == 5 || get_theme_mod('blog_layout',1) == 6) ) {
		       echo 'sixteen';
		       return;
			} 	
		} 

	     $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
		     if( 'fullwidth' == $sidebar_position ) {
		     	echo 'sixteen';
		     }elseif('two-sidebar' == $sidebar_position || 'two-sidebar-left' == $sidebar_position || 'two-sidebar-right' == $sidebar_position ) {
		     	echo 'eight';
		     }
		     else{ 
		     	echo 'eleven';
		     }
		     if ( 'no-sidebar' == $sidebar_position ) { 
		     	echo ' no-sidebar';
		     }
	}
}   

/* Blog Masonry */
if( !function_exists('beautify_pro_masonry_blog_layout_class') ) {  
	function beautify_pro_masonry_blog_layout_class() {
		global $post;
        $blog_page_layout = get_post_meta( $post->ID, '_gx_blogpage_layout', true );
		if( is_page_template('template-blog.php') && ( $blog_page_layout == 4 ||  $blog_page_layout == 5 ) ) {
			echo 'masonry-blog-content';
		}elseif(  is_home() && ( get_theme_mod('blog_layout',1) == 4 ||  get_theme_mod('blog_layout',1) == 5 ) ) {
            echo 'masonry-blog-content';
		}  
	}
}

/* Blog Page Feature Image */
if( ! function_exists( 'beautify_pro_featured_image' ) ) {  
	function beautify_pro_featured_image() {
		$featured_image_size = get_theme_mod ('featured_image_size', 1);
		if ( has_post_thumbnail() && ! post_password_required() ) :
			if( $featured_image_size == 1 ) :
				the_post_thumbnail('beautify-blog-full-width');
			elseif( $featured_image_size == 2 ) :
				the_post_thumbnail('beautify-small-featured-image-width');
			elseif( $featured_image_size == 3 ) :
				the_post_thumbnail('full');
			elseif( $featured_image_size == 4 ) :
				the_post_thumbnail('medium');
			elseif( $featured_image_size == 5 ) :
				the_post_thumbnail('large');
			endif;
		endif;
	}
}


/* Page Site Layout class ( layout )*/

if( !function_exists('beautify_pro_site_style_class') ) { 
	function  beautify_pro_site_style_class(){
       $site_style = get_theme_mod('site-style');
	    if( $site_style == 'boxed' )  { 
		  $site_style_class = 'container boxed-container';
		}elseif( $site_style == 'fluid' ){
	       $site_style_class = 'fluid-container';	 
		}
		else{
			 $site_style_class = '';
		} 
		return $site_style_class; 
	}
}

/* Page Site Layout Header class ( layout )*/

if( !function_exists('beautify_pro_site_style_header_class') ) { 
	function  beautify_pro_site_style_header_class(){
        $site_style = get_theme_mod('site-style');
	    if( $site_style == 'boxed' )  { 
		  $site_style_header_class = 'boxed-header';
		}elseif( $site_style == 'fluid' ){
	       $site_style_header_class = 'fluid-header';
		}
		else{
			 $site_style_header_class = '';
		} 
		return $site_style_header_class;
	}
}

/* Sidebar Width (when select two sidebar layouts) */
if( !function_exists('beautify_pro_sidebar_width_class') ) { 
	function beautify_pro_sidebar_width_class() {
		global $post; 
	    if( is_home() ) {
	    	$sidebar_position = get_theme_mod( 'sidebar_position', 'right' );    
	        if( 'two-sidebar' == $sidebar_position || 'two-sidebar-right' == $sidebar_position || 'two-sidebar-left' == $sidebar_position) {
	            echo 'four';
	        }else{
	            echo 'five';
	        }
	        return;
	    } 
	   
	    if( is_page_template('template-blog.php') ) {
	    	$sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
            if( 'two-sidebar' == $sidebar_position || 'two-sidebar-right' == $sidebar_position || 'two-sidebar-left' == $sidebar_position) {
	            echo 'four'; 
	        }else{
	            echo 'five';   
	        }

	        return;
	    }

        $global_sidebar_layout =  get_theme_mod('global_sidebar_layout'); 
	    global $post;   
	    if( is_page($post->ID) && empty($global_sidebar_layout ) ) {
	    	$page_sidebar_layout = get_post_meta( $post->ID, '_gx_pagesidebar_layout', true );
	    }else{
           $page_sidebar_layout = get_theme_mod( 'sidebar_position', 'right' ); 
	    }

	    if( 'two-sidebar' == $page_sidebar_layout || 'two-sidebar-left' == $page_sidebar_layout || 'two-sidebar-right' == $page_sidebar_layout ) {
	        echo 'four';
	    }else {
	       echo 'five';   
	    }

	    switch ($page_sidebar_layout) {
	    	case 'right':
	    		  echo ' right-sidebar';
	    		break;
	    	case 'left':
	    		  echo ' left-sidebar'; 
	    		break;
	    	case 'two-sidebar':
	    		  echo ' two-sidebar';
	    		break;
	    	case 'two-sidebar-left':
	    		  echo ' two-sidebar-left';
	    		break;
	    	case 'two-sidebar-right':
	    		  echo ' two-sidebar-right';
	    		break;
	    	default:
	    		echo ' right-sidebar';
	    		break;
	    }
	}
}

/* page navigation */
if( !function_exists('beautify_pro_page_navigation') ) {
	function beautify_pro_page_navigation() {
		if(  get_theme_mod ('numeric_pagination',true) ) :
		   the_posts_pagination(
				array(   
					'prev_text' => __( '&laquo;', 'beautify_pro' ),
		            'next_text' => __( '&raquo;', 'beautify_pro' ),
		        )
		    );   
		else :
			if( function_exists('beautify_pro_post_nav') ) {
			    beautify_pro_posts_nav();     
		    }
		endif;
	} 
}

/* Comments template */
if( !function_exists('beautify_pro_comments_template') ) {
	function beautify_pro_comments_template() {
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;  
	}
}

/* home page & default page priamry class */
if(!function_exists('beautify_pro_primary_class') ) {
	function beautify_pro_primary_class(){
		global $post;
		$global_sidebar_layout =  get_theme_mod('global_sidebar_layout'); 
		if( is_front_page() ) {
            $page_sidebar_layout = get_post_meta( $post->ID, '_gx_pagesidebar_layout', true ); 
		}elseif( empty($global_sidebar_layout) ) {
		    $page_sidebar_layout = get_post_meta( $post->ID, '_gx_pagesidebar_layout', true ); 
		}else{
		   $page_sidebar_layout = get_theme_mod( 'sidebar_position', 'right' ); 
		}
	    switch ($page_sidebar_layout) {
			case 'two-sidebar':
			case 'two-sidebar-left': 
			case 'two-sidebar-right':
			   $genex_sidebar_layout_class = 'eight';  
			   break; 
	        case 'no-sidebar':
	            $genex_sidebar_layout_class = ' no-sidebar eleven'; 
	            break;
	        case 'left':
	            $genex_sidebar_layout_class = 'eleven'; 
	            break;
	        case 'fullwidth': 
	              $genex_sidebar_layout_class = 'sixteen'; 
	            break;
	        default:
	           $genex_sidebar_layout_class = 'eleven';  
	         break; 
		}
		echo $genex_sidebar_layout_class;
	}
}
	

if ( ! function_exists( 'beautify_pro_header_slider_class' ) ) :

	function beautify_pro_header_slider_class() {
		echo apply_filters('beautify_pro_header_slider_class','');
    }

endif;

if ( ! function_exists( 'beautify_pro_page_slider_class' ) ) :

	function beautify_pro_page_slider_class() {
		echo apply_filters('beautify_pro_page_slider_class','');
    }

endif;

add_action('beautify_after_slider_part','beautify_add_service_section',15);
if( ! function_exists ( 'beautify_add_service_section' ) ) {
	function beautify_add_service_section() { 
		$service_page1 = get_theme_mod('service_section_1');
		$service_page2 = get_theme_mod('service_section_2');
		$service_page3 = get_theme_mod('service_section_3');
		$service_section_title = get_theme_mod('service_section_title');
		$service_section_icon_1 = get_theme_mod('service_section_icon_1');
		$service_section_icon_2 = get_theme_mod('service_section_icon_2');
		$service_section_icon_3 = get_theme_mod('service_section_icon_3');
		$service_section = get_theme_mod('service_section_status',true); ?>
		<div class="container">
			<main id="main" class="site-main" role="main">
	<?php  if( $service_section && $service_section_title ) {
			echo '<div class="section-head">';
			echo '<h1 class="title-divider">' . get_the_title(absint($service_section_title)) . '</h1>';
			$description = get_post_field('post_content',absint($service_section_title));
			echo '<p class="sub-description">' . $description . '</p>';
		    echo '</div>';
		}

		if( $service_section && ($service_page1 || $service_page2 || $service_page3 ) ){
			$service_pages = array($service_page1,$service_page2,$service_page3);
			$args = array(
				'post_type' => 'page',
				'post__in' => $service_pages,
				'posts_per_page' => -1,
				'orderby' => 'post__in'
			);
			$query = new WP_Query($args); 
			if( $query->have_posts()) : ?>
				<div class="services-wrapper clearfix">
					<?php $i = 1;
					while($query->have_posts()) :
							$query->the_post(); ?>  
							    <div class="one-third column service">
							    	
							    	    <?php if($i == 1):
							    	      $icon_url =  $service_section_icon_1;
							    	      //$icon_color =  $service_color_1;
							    	      elseif($i == 2):
							    	       $icon_url =  $service_section_icon_2;
							    	   	  // $icon_color =  $service_color_2;
							    	      elseif($i == 3):
							    	       	$icon_url =  $service_section_icon_3;
							    	      // 	$icon_color =  $service_color_3;
							    	      endif;

						    	        if($icon_url): ?>
						    	        <div class="icon-wrapper">
						    	          	<i class="fa <?php echo $icon_url; ?>" ></i>
										</div>
						    	        <?php
						    	        elseif( has_post_thumbnail() ) : ?>
	                                        <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('beautify_recent_page_img'); ?></a><?php
						    	        endif; ?>
							    	
							    	<div class="service-content">
							    	    <?php the_title( sprintf( '<h4><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
								    	<?php the_content( __( 'Read More', 'beautify' ) ); ?>
							    	</div>
							    </div>
							    <?php $i++;
				    endwhile; ?>
				</div>

			<?php endif; ?>   
			<?php  
				$query = null;
				$args = null;
				wp_reset_postdata(); 
		}?>
		</main>
		</div>
	<?php }
}


add_action('beautify_after_slider_part','beautify_add_image_content_section',15);
if( ! function_exists ( 'beautify_add_image_content_section' ) ) {
	function beautify_add_image_content_section() { 
		$image_content_id = get_theme_mod('image_content_section_1');
		$image_content_2 = get_theme_mod('image_content_section_2');
		$image_content_section_title = get_theme_mod('image_content_section_title');
		$image_content_section = get_theme_mod('image_content_section_status',true);
		if ($image_content_section) { ?>
			<div class="content-section-wrapper">
				<div class="container">
					<main id="main" class="site-main clearfix" role="main">
					<?php  if( $image_content_section  && $image_content_section_title ) {
						echo '<div class="section-head">';
						echo '<h1 class="title-divider">' . get_the_title(absint($image_content_section_title)) . '</h1>';
						$description = get_post_field('post_content',absint($image_content_section_title));
						echo '<p class="sub-description">' . $description . '</p>';
					    echo '</div>';
					}
					if( ($image_content_id || $image_content_2 ) ){
						$image_content_pages = array($image_content_id,$image_content_2);
						$args = array(
							'post_type' => 'page',
							'post__in' => $image_content_pages,
							'posts_per_page' => -1,
							'orderby' => 'post__in'
						);
						$query = new WP_Query($args);
						if( $query->have_posts()) : 
							$i=1;?>
							<?php while($query->have_posts()) :
								$query->the_post(); 
								if($i==1):?> 
									<div class="four columns">
										<?php if( $image_content_id && has_post_thumbnail($image_content_id)  ): ?>
					                        <div class="service-image-section">
												<a href="<?php echo esc_url(get_permalink($image_content_id)); ?>"><?php the_post_thumbnail('beautify-service-img'); ?></a>
							               </div><?php
										endif ?>
									</div>
								<?php endif; 
								if($i==2) { ?>
									<div class="four columns"> 
										<?php if( has_post_thumbnail() ) : ?>
								    		<div class="service-image"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('beautify-service-img'); ?></a></div>
								    	<?php endif; ?>
								    </div>
								    <div class="eight columns">
								    	<div class="service-content">
								    	    <?php the_title( sprintf( '<h3 class="title-divider"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
									    	<?php the_content(); ?>
								    	</div>
								    </div>
								<?php }
								$i++;
								 endwhile; ?>
						<?php endif; ?>   
						<?php  
							$query = null;
							$args = null;
							wp_reset_postdata(); 
					}?>
					</main>
				</div>
			</div>
		<?php }
	}
}



/* free customizer options to pro options */
add_action( 'load-themes.php',  'beautify_pro_customizer_options_settings'  );
if( !function_exists('beautify_pro_customizer_options_settings') ) { 
	function beautify_pro_customizer_options_settings() {
        global $pagenow;  
		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) && ! get_option( 'beautify_pro_free_to_pro' ) ) { 

			$free_theme_mod = get_option('theme_mods_beautify');

		    $free_value = array();
			if ( $free_theme_mod ) {		
				foreach( $free_theme_mod as $key => $value ) { 	 
					if(  isset( $key ) ) {		
					    $free_value[$key] =  $value;
					}
			    }  
			}

			update_option('theme_mods_beautifypro',$free_value);
			update_option('beautify_pro_free_to_pro',1);

		} 
	} 
}  