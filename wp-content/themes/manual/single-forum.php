<?php

/**
 * Single Forum
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
  <?php while ( have_posts() ) : the_post(); ?>
  <?php if ( bbp_user_can_view_forum() ) : ?>
  <div id="forum-<?php bbp_forum_id(); ?>" class="bbp-forum-content">
    <?php bbp_get_template_part( 'content', 'single-forum' ); ?>
  </div>
  <!-- #forum-<?php bbp_forum_id(); ?> -->
  <?php else : // Forum exists, user no access ?>
  <div>
    <?php bbp_get_template_part( 'feedback', 'no-access' ); ?>
  </div>
  <?php endif; ?>
  <?php endwhile; ?>
  <?php do_action( 'bbp_after_main_content' ); ?>
</div>
<?php 
if( $f_sidebar == 1 ) { 
} else { get_sidebar('bbpress'); } 
?>
<?php get_footer(); ?>
