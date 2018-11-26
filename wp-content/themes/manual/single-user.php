<?php

/**
 * User Profile
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); 
manual_bbpress_header();
?>
<!-- /start container -->

<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">

<!-- #primary -->
<div class="col-md-12 col-sm-12">
  <?php do_action( 'bbp_before_main_content' ); ?>
  <div id="bbp-user-<?php bbp_current_user_id(); ?>" class="bbp-single-user">
    <div class="entry-content">
      <?php bbp_get_template_part( 'content', 'single-user' ); ?>
    </div>
    <!-- .entry-content --> 
  </div>
  <!-- #bbp-user-<?php bbp_current_user_id(); ?> -->
  
  <?php do_action( 'bbp_after_main_content' ); ?>
</div>
<!-- /#content -->

<?php get_footer(); ?>
