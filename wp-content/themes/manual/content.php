<?php
/**
 *
 * Template for displaying content, Used for both single and index/archive/search.
 *
 */
 
$format = get_post_format();
global $theme_options;
?>

<div <?php post_class('blog'); ?> id="post-<?php the_ID(); ?>">
  <div class="caption">
    <p>
      <?php if( is_page() === false ) { manual_entry_meta(); } ?>
      <?php edit_post_link( esc_html__( 'Edit', 'manual' ), '<span class="edit-link">', '</span>' ); ?>
    </p>
    <?php
                if ( is_single() ) {
					if( $theme_options['blog_single_title_on_content_area'] == true  ) {
						the_title( '<h2 class="singlepg-font-blog-upper">', '</h2>' );
					}
				} else {
                    the_title( sprintf( '<h2 class="singlepg-font-blog"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				}
            ?>
    <!--<div class="post-cat"></div>--> 
  </div>
  <?php 
  $featured_img_disable = get_post_meta( $post->ID, '_manual_featured_image_disable', true );
  if( $featured_img_disable == 'on' && is_single() ) { } else { manual_post_thumbnail(); }
  ?>
  <div class="blog-box-post-inner">
    <div class="entry-content clearfix">
      <?php 
			if ( is_single() ) :
				the_content();
			else :
				the_excerpt();
			endif;
			
		?>
    </div>
    <?php 
	if( is_single() ) {
	
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'manual' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'manual' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
	}
?>
    <?php if( is_single() ) { the_tags( '</span> <div class="tagcloud singlepgtag clearfix margin-btm-20 singlepg"><span><i class="fa fa-tags"></i> '.esc_html__( 'Tags:', 'manual' ).'</span>', '', '</div>' );  } ?>
    <?php if( is_single() ) {  if( $theme_options['blog_single_social_share_status'] == true ) { manual_social_share(get_permalink()); } } ?>
    <?php if ( !is_single() && !is_search() ) : ?>
    <?php if( $format != 'quote' ) { ?>
    <p> <a href="<?php echo esc_url( get_permalink() ); ?>" class="custom-link-blog hvr-icon-wobble-horizontal">
      <?php esc_html_e( 'Continue Reading', 'manual' ) ?>
      </a> </p>
    <?php } ?>
    <?php endif; ?>
  </div>
</div>
<?php
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
?>