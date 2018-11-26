<?php
/**
 * The template for displaying archive pages
*/
get_header(); 
$index_id = get_option('page_for_posts');
$page_tagline = get_post_meta( $index_id, '_manual_page_tagline', true );
?>
<!-- Global Bar -->
<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break"> 
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-12 col-sm-12 header-text-align">
        <h1 class="inner-header">
            <?php 
		  	 if ( is_category() ) {
				 /*if( $page_tagline != '' ) {
				 	echo $page_tagline; 
				 } else {
					echo get_the_title($index_id); 
				 }*/
				?> <!--:--> <?php echo single_cat_title( '', false ); 
			 } else if ( is_tag() ) {
				if( $page_tagline != '' ) {
				 	echo $page_tagline; 
				 } else {
					echo get_the_title($index_id); 
				 } ?> : <?php echo single_cat_title( '', false ); 
			 } else {
			    if ( is_day() ) :
						printf( esc_html__( 'Daily Archives: %s', 'manual' ), get_the_date() );
					elseif ( is_month() ) :
						printf( esc_html__( 'Monthly Archives: %s', 'manual' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'manual' ) ) );
					elseif ( is_year() ) :
						printf( esc_html__( 'Yearly Archives: %s', 'manual' ), get_the_date( _x( 'Y', 'yearly archives date format', 'manual' ) ) );
					else :
						esc_html_e( 'Archives', 'manual' );
				endif;
			 }
			  ?>
        </h1>
        <p class="inner-header-color"><?php  manual_breadcrumb();  ?></p>
      </div>
    </div>
  </div>
</div>




<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-8 col-sm-8">
  <?php if ( have_posts() ) : ?>
  <?php if( is_archive() && !is_category() ) : ?>
  <header class="page-header margin-fix">
    <?php
					the_archive_title( '<h2 class="page-title">', '</h2>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
  </header>
  <!-- .page-header -->
  <?php endif; ?>
  <?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => esc_html__( '&lt;', 'manual' ),
				'next_text'          => esc_html__( '&gt;', 'manual' ),
			) );

		// If no content, include the "No posts found" template.
		else :
			 esc_html_e( 'Sorry, no records were found', 'manual' );
		endif;
		?>
  <div class="clearfix"></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
