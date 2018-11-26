<?php

/**
 * Template Name: bbPress - Forums (Index)
 *
 * @package bbPress
 * @subpackage Theme
 */

global $theme_options;
get_header();
$f_sidebar = $theme_options['manual-forum-yes-no-sidebar'];
if( $f_sidebar == 1 ) { $col_md = 12;
} else { $col_md = 8; }

$current_pageID = get_option('manual_forum_page');
if( $current_pageID == '' ) { 
	update_option( 'manual_forum_page', $post->ID );
} else if( isset($current_pageID) && ($current_pageID != $post->ID) ) { 
	update_option( 'manual_forum_page', $post->ID );
}
get_template_part( 'template', 'header' ); 
?>




<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-50">
<?php 
$f_msg = $theme_options['manual-forum-message']; 
if( $f_msg != '' ) {
?>
<div class="col-md-12 col-sm-12">
  <div class="forum-msg">
     <?php echo $f_msg; ?>
  </div>
</div>
<?php } ?>
<div class="col-md-<?php echo $col_md; ?> col-sm-<?php echo $col_md; ?>">
  <?php do_action( 'bbp_before_main_content' ); ?>
  <?php do_action( 'bbp_template_notices' ); ?>
  <?php while ( have_posts() ) : the_post(); ?>
  <div>
    <?php the_content(); ?>
    <?php bbp_get_template_part( 'content', 'archive-forum' ); ?>
  </div>
  <?php endwhile; ?>
  <?php do_action( 'bbp_after_main_content' ); ?>
</div>
<?php 
if( $f_sidebar == 1 ) { 
} else { get_sidebar('bbpressforum'); } 
?>
<?php get_footer(); ?>
