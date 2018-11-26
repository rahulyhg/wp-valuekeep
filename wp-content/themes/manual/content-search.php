<?php
/**
 * The template part for displaying results in search pages
*/
?>
<div class="search" id="post-<?php the_ID(); ?>">
  <?php //manual_post_thumbnail(); ?>
  <div class="caption">
    <?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <p> <i class="fa fa-calendar"></i> <span>
      <?php the_time( get_option('date_format') ); ?>
      </span> <i class="fa fa-user"></i> 
      <span>
      <?php $author_id = $post->post_author; echo the_author_meta( 'user_nicename' , $author_id ); ?>
      </span> </p>
  </div>
  
  <?php if ( 'post' == get_post_type() ) : ?>
  <footer class="entry-footer">
    <?php edit_post_link( esc_html__( 'Edit', 'manual' ), '<span>', '</span>' ); ?>
  </footer>
  
  <?php else : ?>
  <?php edit_post_link( esc_html__( 'Edit', 'manual' ), '<span>', '</span><!-- .entry-footer -->' ); ?>
  <?php endif; ?>
</div>
