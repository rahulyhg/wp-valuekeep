<?php
/**
* The template for displaying Search Results pages.
*
*/

get_header(); 
$f_sidebar = $theme_options['manual-forum-yes-no-sidebar'];
if( $f_sidebar == 1 ) { $col_md = 12;
} else { $col_md = 8; } 
?>

<!-- Global Bar -->
<div class="jumbotron padding-bottom inner-jumbotron jumbotron-inner-fix">
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-8 col-sm-8">
        <p id="inner-glob-msg-box" class="inner-bigtext">
          <?php get_template_part( 'page-header', 'forums' ); ?>
          <?php 
			$manual_breadcrumbs_args = array(
				'before'          => '<div id="breadcrumbs">',
				'after'           => '</div>',
				'sep'             => esc_html__( '/', 'bbpress' ),
			);
		   bbp_breadcrumb($manual_breadcrumbs_args); 
		  ?>
        </p>
      </div>
      <div class="col-md-4 col-sm-4 inner-search-margin-top">
        <?php get_template_part( 'search-form', 'forums' ); ?>
      </div>
    </div>
  </div>
</div>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-50">
<?php if( $f_sidebar == 'left' ) { get_sidebar('bbpress'); } ?>
<div class="col-md-<?php echo $col_md; ?> col-sm-<?php echo $col_md; ?>"> 
  <!-- #primary -->
  <?php do_action( 'bbp_template_before_search' ); ?>
  <?php if ( bbp_has_search_results() ) : ?>
  <?php bbp_get_template_part( 'loop',       'search' ); ?>
  <?php bbp_get_template_part( 'pagination', 'search' ); ?>
  <?php elseif ( bbp_get_search_terms() ) : ?>
  <?php bbp_get_template_part( 'feedback',   'no-search' ); ?>
  <?php else : ?>
  <?php bbp_get_template_part( 'form', 'search' ); ?>
  <?php endif; ?>
  <?php do_action( 'bbp_template_after_search_results' ); ?>
</div>
<!-- /#content -->

<?php 
if( $f_sidebar == 1 ) { 
} else { get_sidebar('bbpress'); } 
?>
<?php get_footer(); ?>