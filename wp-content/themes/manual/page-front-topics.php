<?php

/**
 * Template Name: bbPress - Front Topics
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); 
$pagetitle = get_post_meta( $post->ID, '_manual_page_tagline', true );
get_template_part( 'template', 'header' ); 
?>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-8 col-sm-8">
  <?php do_action( 'bbp_before_main_content' ); ?>
  <?php do_action( 'bbp_template_notices' ); ?>
  <?php while ( have_posts() ) : the_post(); ?>
  <div id="topics-front" class="bbp-topics-front">
    <div class="entry-content">
      <?php the_content(); ?>
      <?php bbp_get_template_part( 'content', 'archive-topic' ); ?>
    </div>
  </div>
  <!-- #topics-front -->
  
  <?php endwhile; ?>
  <?php do_action( 'bbp_after_main_content' ); ?>
</div>
<?php get_sidebar('bbpressforum'); ?>
<?php get_footer(); ?>
