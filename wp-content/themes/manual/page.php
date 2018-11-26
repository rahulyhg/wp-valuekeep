<?php
/**
 * The template for displaying pages
 */

get_header(); 
get_template_part( 'template', 'header' ); 
?>


<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-8 col-sm-8">
  <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>
  <div class="clearfix"></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
