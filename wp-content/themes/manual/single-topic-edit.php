<?php

/**
 * Edit handler for topics
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
  <?php while ( have_posts() ) : the_post(); ?>
  <div id="bbp-edit-page" class="bbp-edit-page">
    <div class="entry-content">
      <?php bbp_get_template_part( 'form', 'topic' ); ?>
    </div>
  </div>
  <!-- #bbp-edit-page -->
  
  <?php endwhile; ?>
  <?php do_action( 'bbp_after_main_content' ); ?>
</div>
<!-- /#content -->

<?php 
if( $f_sidebar == 1 ) { 
} else { get_sidebar('bbpress'); } 
?>
<?php get_footer(); ?>
