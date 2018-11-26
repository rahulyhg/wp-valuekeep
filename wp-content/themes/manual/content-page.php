<?php
/**
 * The template used for displaying page content
 */
?>

<div class="blog uniquepage" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php manual_post_thumbnail(); ?>
   <div class="entry-content clearfix">
  <?php the_content(); ?>
  </div>
  <?php edit_post_link( esc_html__( 'Edit', 'manual' ) ); ?>
</div>