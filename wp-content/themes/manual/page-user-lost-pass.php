<?php

/**
 * Template Name: bbPress - User Lost Password
 *
 * @package bbPress
 * @subpackage Theme
 */

// No logged in users
bbp_logged_in_redirect();

get_header(); 
get_template_part( 'template', 'header' ); 
?>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-6 col-sm-12 col-md-offset-3">
  <?php do_action( 'bbp_before_main_content' ); ?>
  <?php do_action( 'bbp_template_notices' ); ?>
  <?php while ( have_posts() ) : the_post(); ?>
  <div id="bbp-lost-pass" class="bbp-lost-pass">
    <!--<h1 class="entry-title">
      <?php //the_title(); ?>
    </h1>-->
    <div class="entry-content">
      <?php the_content(); ?>
      <div id="bbpress-forums">
        <?php bbp_get_template_part( 'form', 'user-lost-pass' ); ?>
      </div>
    </div>
  </div>
  <!-- #bbp-lost-pass -->
  
  <?php endwhile; ?>
  <?php do_action( 'bbp_after_main_content' ); ?>
</div>
<?php //get_sidebar('bbpressforum'); ?>
<?php get_footer(); ?>
