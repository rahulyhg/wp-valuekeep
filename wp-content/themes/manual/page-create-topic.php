<?php

/**
 * Template Name: bbPress - Create Topic
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); 
get_template_part( 'template', 'header' ); 
?>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-8 col-sm-8">
  <?php do_action( 'bbp_before_main_content' ); ?>
  <?php do_action( 'bbp_template_notices' ); ?>
  <?php while ( have_posts() ) : the_post(); ?>
  <div id="bbp-new-topic" class="bbp-new-topic">
    <div class="entry-content">
      <?php the_content(); ?>
      <?php bbp_get_template_part( 'form', 'topic' ); ?>
    </div>
  </div>
  <!-- #bbp-new-topic -->
  
  <?php endwhile; ?>
  <?php do_action( 'bbp_after_main_content' ); ?>
</div>
<?php get_sidebar('bbpressforum'); ?>
<?php get_footer(); ?>
