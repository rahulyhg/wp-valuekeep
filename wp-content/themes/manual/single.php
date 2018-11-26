<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header();
global $theme_options;
if( $theme_options['blog_single_sidebar_status'] == true ) {
	$col_md_sm = 8;
	$sidebar_status = true;
} else {
	$col_md_sm = 12;
	$sidebar_status = false;
}
$page_for_posts = get_option('page_for_posts');
$page_tagline = get_post_meta( $page_for_posts, '_manual_page_tagline', true );
?>
<!-- Global Bar -->
<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break"> 
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-12 col-sm-12 header-text-align">
        <h1 class="inner-header">
         <?php
		 if( $theme_options['blog_single_title_on_header'] == true ) {
			 the_title();
		 } else {
			if( $page_tagline != '' ) {
				echo $page_tagline;
			} else if ($page_for_posts) {
				$blog = get_post($page_for_posts);
				echo $blog->post_title; 
			} else {
				esc_html_e('Blog', 'manual');
			}
		 }
			?>
        </h1>
       <?php if( $theme_options['blog_single_breadcrumb_on_header'] == true ) { ?>
       <p class="inner-header-color">  <?php manual_breadcrumb(); ?> </p>
       <?php } ?>
      </div>
    </div>
  </div>
</div>




<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row  margin-top-btm-50">
<div class="col-md-<?php echo $col_md_sm; ?> col-sm-<?php echo $col_md_sm; ?>">
  <?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		// End the loop.
		endwhile;
		?>
  <div class="clearfix"></div>
</div>
<?php if( $sidebar_status == true ) get_sidebar(); ?>
<?php get_footer(); ?>