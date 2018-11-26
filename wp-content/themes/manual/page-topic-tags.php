<?php

/**
 * Template Name: bbPress - Topic Tags
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header();
$pagetitle = get_post_meta( $post->ID, '_manual_page_tagline', true );  
get_template_part( 'template', 'header' ); 
?>


<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-8 col-sm-8">
  <?php do_action( 'bbp_before_main_content' ); ?>
  <?php do_action( 'bbp_template_notices' ); ?>
  <?php while ( have_posts() ) : the_post(); ?>
  <div id="bbp-topic-tags" class="bbp-topic-tags">
    <div class="entry-content">
      <?php get_the_content() ? the_content() : _e( '<p>This is a collection of tags that are currently popular on our forums.</p>', 'bbpress' ); ?>
      <div id="bbpress-forums">
        <div id="bbp-topic-hot-tags">
          <?php wp_tag_cloud( array( 'smallest' => 9, 'largest' => 38, 'number' => 80, 'taxonomy' => bbp_get_topic_tag_tax_id() ) ); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- #bbp-topic-tags -->
  
  <?php endwhile; ?>
  <?php do_action( 'bbp_after_main_content' ); ?>
</div>
<!-- #content -->

<?php get_sidebar('bbpressforum'); ?>
<?php get_footer(); ?>
