<?php

/**
 * Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); 
$f_sidebar = $theme_options['manual-forum-yes-no-sidebar'];
if( $f_sidebar == 1 ) { $col_md = 12;
} else { $col_md = 8; } 
manual_bbpress_header();
?>
<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<?php if( $f_sidebar == 'left' ) { get_sidebar('bbpress'); } ?>
<div class="col-md-<?php echo $col_md; ?> col-sm-<?php echo $col_md; ?>">
  <?php do_action( 'bbp_before_main_content' ); ?>
  <?php do_action( 'bbp_template_notices' ); ?>
  <?php if ( bbp_user_can_view_forum( array( 'forum_id' => bbp_get_reply_forum_id() ) ) ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
  <div id="bbp-reply-wrapper-<?php bbp_reply_id(); ?>" class="bbp-reply-wrapper">
    <div class="entry-content">
      <?php bbp_get_template_part( 'content', 'single-reply' ); ?>
    </div>
    <!-- .entry-content --> 
  </div>
  <!-- #bbp-reply-wrapper-<?php bbp_reply_id(); ?> -->
  
  <?php endwhile; ?>
  <?php elseif ( bbp_is_forum_private( bbp_get_reply_forum_id(), false ) ) : ?>
  <?php bbp_get_template_part( 'feedback', 'no-access' ); ?>
  <?php endif; ?>
  <?php do_action( 'bbp_after_main_content' ); ?>
</div>
<?php 
if( $f_sidebar == 1 ) { 
} else { get_sidebar('bbpress'); } 
?>
<?php get_footer(); ?>
