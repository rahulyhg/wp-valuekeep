<?php
/**
 * Template Name: Page Builder (VC) Full Width
 */

get_header(); 

get_template_part( 'template', 'header' ); ?>

<!-- /start container -->
<div class="content-wrapper">
<?php
	// Start the loop.
	while ( have_posts() ) : the_post();
?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="clearfix">
			<?php the_content(); ?>
        </div>
    </div>
<?php 		
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		
	// End the loop.
	endwhile;
		
?>
</div>

<div class="container content-wrapper">
<div class="row">
<?php get_footer(); ?>
