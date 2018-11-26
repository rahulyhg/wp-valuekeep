<?php
/**
 * The template for displaying search results pages.
 */
 
if(!empty($_GET['ajax']) ? $_GET['ajax'] : null) { ?>
    <?php if (have_posts()) : ?>
        <ul class="manual-searchresults">
            <?php 
			while (have_posts()) : the_post(); 
			$post_type = get_post_type( get_the_ID() );
			if( $post_type == "manual_documentation" ) {
				$new_class = 'live_search_doc_icon';
			} else if ( $post_type == "manual_faq" ) {
				$new_class = 'live_search_faq_icon';
			} else if ( $post_type == "manual_kb" ) {
				$new_class = 'live_search_kb_icon';
			} else if ( $post_type == "forum" ) {
				$new_class = 'live_search_forum_icon';
			} else if ( $post_type == "manual_portfolio" ) {
				$new_class = 'live_search_portfolio_icon';
			} else if ( $post_type == "attachment" ) {
				$new_class = 'live_search_attachment_icon';
			} else {
				$new_class = '';
			}			
			?>
                <li class="<?php echo $new_class; ?>">
                    <a href="<?php the_permalink() ?>">
                        <?php the_title() ?>
                    </a>
                </li>
            <?php endwhile ?>
            <li class="manual-searchresults-showall">
                <a href="<?php echo home_url('/'); ?>?s=<?php echo get_search_query(); ?>&post_type=<?php echo $_GET['post_type']; ?>">
					<?php printf( esc_html__( 'Show All Results', 'manual' ) ); ?>
                </a> 
            </li>
        </ul>
    <?php else : ?>
        <ul class="manual-searchresults">
        <li class="manual-searchresults-noresults"><?php printf( esc_html__( 'No Results', 'manual' ) ); ?></li>
        </ul>
    <?php endif ?>
<!-- Normal search results code -->
<?php 
} else {
get_header();
?>
<!-- Global Bar -->
<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break"> 
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-12 col-sm-12" style="text-align:center">
        <h1 class="inner-header"> <?php printf( esc_html__( 'Search Results', 'manual' ) ); ?> </h1>
        <p class="inner-header-color"><?php esc_html_e( 'your search of', 'manual' ); echo '&nbsp;<b>&quot;'.get_search_query().'&quot;</b>'; ?></p>
        <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 search-margin-top">
          <div class="global-search"> <?php get_template_part( 'search', 'home' ); ?> </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-8 col-sm-8">
  <?php 
		if ( have_posts() ) : 
		// Start the loop.
		while ( have_posts() ) : the_post(); 
			get_template_part( 'content', 'search' );
		endwhile;
		// Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text'          => esc_html__( '&lt;', 'manual' ),
			'next_text'          => esc_html__( '&gt;', 'manual' ),
		) );
	// If no content, include the "No posts found" template.
	else :
		esc_html_e( 'Sorry!! nothing found related to your search topic, please try search again.', 'manual' );
	endif;
	?>
  <div class="clearfix"></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php } ?>