<?php

/**
 * Display an optional post thumbnail.
 */
if ( ! function_exists( 'manual_post_thumbnail' ) ) :
	function manual_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
	
		if ( is_singular() ) :
		?>

<div class="post-thumbnail">
  <?php the_post_thumbnail('',  array( 'class' => "img-responsive" ) ); ?>
</div>
<!-- .post-thumbnail -->

<?php else : ?>
<a href="<?php the_permalink(); ?>" aria-hidden="true">
<?php
				the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() , 'class' => "img-responsive" ) );
			?>
</a>
<?php endif; // End is_singular()
	}
endif;


/**
 * Prints HTML with meta information for the categories, tags.
 */
if ( ! function_exists( 'manual_entry_meta' ) ) :

	function manual_entry_meta() {
		
				
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<span class="sticky-post">%s</span>', esc_html__( 'Featured', 'manual' ) );
		}
	
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			$time_string = '<i class="fa fa-calendar"></i> <span><time class="entry-date published updated" datetime="%1$s">%2$s</time></span>';
	
			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				get_the_date(),
				esc_attr( get_the_modified_date( 'c' ) ),
				get_the_modified_date()
			);
			
			printf( '<span class="posted-on-single"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
				'',
				esc_url( get_permalink() ),
				$time_string
			);
		}
	
		if ( 'post' == get_post_type() ) {
			if ( is_singular() || is_multi_author() ) {
				printf( '<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span> <i class="fa fa-user"></i>
 <a class="url fn n" href="%2$s">%3$s</a></span></span>',
					'',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					get_the_author()
				);
			}
		}
	
		if ( is_attachment() && wp_attachment_is_image() ) {
			// Retrieve attachment metadata.
			$metadata = wp_get_attachment_metadata();
	
			printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
				'',
				esc_url( wp_get_attachment_url() ),
				$metadata['width'],
				$metadata['height']
			);
		}
	
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link"> <i class="fa fa-comments"></i> <span>';
			comments_popup_link( esc_html__( 'Leave a comment', 'manual' ), esc_html__( '1 Comment', 'manual' ), esc_html__( '% Comments', 'manual' ) );
			echo '</span></span>';
		}
		
		echo '<span class="comments-link"><i class="fa fa-folder-open"></i> ';
			the_category(', ');
		echo '</span>';

		
	}
endif;


/**
 * Determine whether blog/site has more than one category.
 */
function manual_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'wsamanual_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'wsamanual_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so manual_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so manual_categorized_blog should return false.
		return false;
	}
}


/**
 * Display navigation to next/previous comments when applicable.
 */
if ( ! function_exists( 'manual_comment_nav' ) ) :

	function manual_comment_nav() {
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
<nav class="navigation comment-navigation" role="navigation">
  <h2 class="screen-reader-text">
    <?php esc_html_e( 'Comment navigation', 'manual' ); ?>
  </h2>
  <div class="nav-links">
    <?php
					if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'manual' ) ) ) :
						printf( '<div class="nav-previous">%s</div>', $prev_link );
					endif;
	
					if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'manual' ) ) ) :
						printf( '<div class="nav-next">%s</div>', $next_link );
					endif;
				?>
  </div>
  <!-- .nav-links --> 
</nav>
<!-- .comment-navigation -->
<?php
		endif;
	}
	
endif;




/**
 * Display custom reply section
 */
if ( ! function_exists( 'manual_comment' ) ) :

	function manual_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		//print_r($args);
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
	?>
<<?php echo $tag ?> id="comment-
<?php comment_ID() ?>
"
<?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?>
>
<div class="comment"  id="<?php echo $add_below; ?>-<?php comment_ID() ?>">
  <div class="img-thumbnail">
    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
  </div>
  <div class="comment-block">
    <div class="comment-arrow"></div>
    <div class="comment-by"> <?php printf( __( '<strong>%s</strong> <span class="says">says:</span>' , 'manual' ), get_comment_author_link() ); ?>
      <div class="pull-right reply">
        <?php 
						comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); 
						?>
      </div>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
    <div class="moderation"> <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.' , 'manual' ); ?></em> </div>
    <?php endif; ?>
    <?php comment_text(); ?>
    <span class="date pull-right"> <?php printf( esc_html__('%1$s at %2$s', 'manual'), get_comment_date(),  get_comment_time() ); ?>
    <?php edit_comment_link( esc_html__( '(Edit)', 'manual' ), '  ', '' ); ?>
    </span> </div>
</div>
<?php
	}
endif;

?>
