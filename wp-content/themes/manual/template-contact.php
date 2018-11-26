<?php
/*
Template Name: Contact
*/
?>
<?php 
get_header(); 
get_template_part( 'template', 'header' ); 
?>

<!-- /start container -->
<div class="container content-wrapper top-body-shadow body-content">
<div class="row margin-top-btm-50">
<div class="col-md-8 col-sm-8">
  <?php
	// Start the loop.
	while ( have_posts() ) : the_post();
		the_content();
	// End the loop.
	endwhile;
  ?>
</div>
<aside class="col-md-4 col-sm-4" id="sidebar-box">
  <div class="custom-well sidebar-nav">
    <?php 
    if ( is_active_sidebar( 'contact-sidebar-1' ) ) : 
		dynamic_sidebar( 'contact-sidebar-1' ); 
    endif; 
	?>
  </div>
</aside>
<?php get_footer(); ?>
