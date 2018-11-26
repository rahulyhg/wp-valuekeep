<?php

/**
 * bbPress - Forum Archive
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); 
global $theme_options;
$f_sidebar = $theme_options['manual-forum-yes-no-sidebar'];
if( $f_sidebar == 1 ) { $col_md = 12;
} else { $col_md = 8; } 
$forumID = get_option('manual_forum_page');
if( isset($forumID) && $forumID != '' ) {  
	$pagetitle = get_post_meta( $forumID, '_manual_page_tagline', true ); 
	$pagedesc = get_post_meta( $forumID, '_manual_page_desc', true );
	$active_forumID = $forumID;
}
manual_bbpress_header();
?>
<!-- /start container -->

<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<?php 
$f_msg = $theme_options['manual-forum-message']; 
if( $f_msg != '' ) {
?>
<div class="col-md-12 col-sm-12" style="margin-top: -20px;">
  <div class="forum-msg"> <?php echo $f_msg; ?> </div>
</div>
<?php } ?>
<?php if( $f_sidebar == 'left' ) { get_sidebar('bbpress'); } ?>
<div class="col-md-<?php echo $col_md; ?> col-sm-<?php echo $col_md; ?>">
  <?php do_action( 'bbp_before_main_content' ); ?>
  <?php do_action( 'bbp_template_notices' ); ?>
  <div id="forum-front" class="bbp-forum-front">
    <?php bbp_get_template_part( 'content', 'archive-forum' ); ?>
  </div>
  <!-- #forum-front -->
  
  <?php do_action( 'bbp_after_main_content' ); ?>
</div>
<?php if( $f_sidebar == 1 ) { } else { get_sidebar('bbpress'); }  ?>
<?php get_footer(); ?>
