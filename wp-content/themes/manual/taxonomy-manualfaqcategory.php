<?php 
get_header();
global $theme_options;
// sidebar status
if( $theme_options['faq-display-sidebar-status'] == true ) {
	$col_md_sm = 12;
	$sidebar_status = true;
} else {
	$col_md_sm = 8;
	$sidebar_status = false;
}
?>

<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break">
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-12 col-sm-12 header-text-align">
        <h1 class="inner-header">
          <?php 
              $current_term = get_term_by( 'slug', get_query_var( 'term' ), 'manualfaqcategory' );
              echo $current_term->name; 
              ?>
        </h1>
        <p class="inner-header-color">
          <?php manual_breadcrumb(); ?>
        </p>
        <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 search-margin-top">
          <div class="global-search">
            <?php get_template_part( 'search', 'home' ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">

<?php if( $sidebar_status == false ) get_template_part('sidebar', 'faq');  ?>

<div class="col-md-<?php echo $col_md_sm; ?> col-sm-<?php echo $col_md_sm; ?>">
  <div class="margin-btm-20"> <span><a class="more-link" id="faq-expandall" style="cursor:pointer;">
    <?php esc_html_e('Expand / Collapse All',  'manual' ); ?>
    </a></span> </div>
  <?php 
    if ( is_active_sidebar( 'faq-1' ) ) : 
		dynamic_sidebar( 'faq-1' ); 
    endif; 
?>
  <?php
  
	if( isset($theme_options['faq-display-order']) && $theme_options['faq-display-order'] != ''  ) {
		if( $theme_options['faq-display-order'] == 1 ) {
			$faq_record_order = 'ASC';
		} else {
			$faq_record_order = 'DESC';
		}
	}
	
	if( isset( $theme_options['faq-display-order-by'] ) && $theme_options['faq-display-order-by'] != '' ) {
		$faq_record_order_by = $theme_options['faq-display-order-by'];	
	} else {
		$faq_record_order_by = 'date';	
	}
	
	$st_term_data =	$wp_query->queried_object;
	$term_slug = get_query_var( 'term' );
	$args = array(
				'post_type' => 'manual_faq',
				'posts_per_page' => '-1',
				'order'    => $faq_record_order,
				'orderby'  => $faq_record_order_by,
				'tax_query' => array(
						array(
							'taxonomy' => 'manualfaqcategory',
							'field' => 'slug',
							'include_children' => true,
							'terms' => $term_slug
							)
						),
				
	);
	$wp_query = new WP_Query($args);
   
  if($wp_query->have_posts()) { 
  if ( have_posts() ) : ?>
  <div class="display-faq-section margin-30">
    <?php while($wp_query->have_posts()) :  $wp_query->the_post(); ?>
    <div class="collapsible-panels theme-faq-cat-pg" id="<?php echo $post->ID; ?>">
      <h4 class="title-faq-cat"><a href="#"><?php echo get_the_title(); ?></a></h4>
      <div class="entry-content clearfix">
        <?php the_content(); ?>
        <?php edit_post_link( esc_html__( 'Edit', 'manual' ), '<p class="edit-link" style="text-align:right">', '</p>', $post->ID ); ?>
        <?php if( $theme_options['faq-display-social-share'] == true ) manual_social_share(get_permalink()); ?>
      </div>
    </div>
    <?php 
		endwhile; 
		// Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text'          => esc_html__( '&lt;', 'manual' ),
			'next_text'          => esc_html__( '&gt;', 'manual' ),
		) );
		?>
  </div>
  <?php 
	// If no content, include the "No posts found" template.
	else :
		 esc_html_e( 'Sorry, no records were found', 'manual' );
	endif;
  }
  wp_reset_query(); 
?>
  <div class="clearfix"></div>
</div>

<?php get_footer(); ?>