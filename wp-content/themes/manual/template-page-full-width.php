<?php
/**
 * Template Name: Page Full Width
 */

get_header(); 
get_template_part( 'template', 'header' ); 
?>



<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50" style="margin-top:35px!important;">
<div class="col-md-12 col-sm-12">
  <?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			get_template_part( 'content', 'page' );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		// End the loop.
		endwhile;
		?>
</div>
<?php get_footer(); ?>
