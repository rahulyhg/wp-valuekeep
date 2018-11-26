<?php

/**
 * Topic Tag Edit
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); 
$f_sidebar = $theme_options['manual-forum-yes-no-sidebar'];
if( $f_sidebar == 1 ) { $col_md = 12;
} else { $col_md = 8; } 
?>

<!-- Global Bar -->
<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break">
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-12 col-sm-12 header-text-align">
        <h1 class="inner-header">
           <?php get_template_part( 'page-header', 'forums' ); ?>
        </h1>
        <p class="inner-header-color"><?php 
			$manual_breadcrumbs_args = array(
				'before'          => '<div id="breadcrumbs">',
				'after'           => '</div>',
				'sep'             => esc_html__( '/', 'bbpress' ),
			);
		   bbp_breadcrumb($manual_breadcrumbs_args); 
		  ?></p>
        <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 search-margin-top">
          <div class="global-search">
            <?php get_template_part( 'search-form', 'forums' ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-50">
<?php if( $f_sidebar == 'left' ) { get_sidebar('bbpress'); } ?>
<div class="col-md-<?php echo $col_md; ?> col-sm-<?php echo $col_md; ?>">
  <?php do_action( 'bbp_before_main_content' ); ?>
  <?php do_action( 'bbp_template_notices' ); ?>
  <div id="topic-tag" class="bbp-topic-tag">
    <div class="entry-content">
      <?php bbp_get_template_part( 'content', 'topic-tag-edit' ); ?>
    </div>
  </div>
  <!-- #topic-tag -->
  
  <?php do_action( 'bbp_after_main_content' ); ?>
</div>
<?php 
if( $f_sidebar == 1 ) { 
} else { get_sidebar('bbpress'); } 
?>
<?php get_footer(); ?>
