<?php

/**
 * Template Name: bbPress - User Login
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

<!-- #primary -->
<div class="col-md-6 col-sm-12 col-md-offset-3">
  <?php do_action( 'bbp_before_main_content' ); ?>
  <?php do_action( 'bbp_template_notices' ); ?>
  <?php while ( have_posts() ) : the_post(); ?>
  <div id="bbp-login" class="bbp-login">
   <!-- <h1 class="entry-title">
      <?php //the_title(); ?>
    </h1>-->
    <div class="entry-content">
      <?php the_content(); ?>
      <div id="bbpress-forums">
        <?php bbp_get_template_part( 'form', 'user-login' ); ?>
      </div>
    </div>
  </div>
  <!-- #bbp-login -->
  
  <?php endwhile; ?>
  <?php do_action( 'bbp_after_main_content' ); ?>
</div>
<?php //get_sidebar('bbpressforum'); ?>
<?php get_footer(); ?>
