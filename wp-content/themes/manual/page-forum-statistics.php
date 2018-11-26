<?php

/**
 * Template Name: bbPress - Statistics
 *
 * @package bbPress
 * @subpackage Theme
 */

// Get the statistics and extract them for later use in this template
// @todo - remove variable references
extract( bbp_get_statistics(), EXTR_SKIP );

get_header();
get_template_part( 'template', 'header' ); 
?>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-8 col-sm-8">
  <?php do_action( 'bbp_before_main_content' ); ?>
  <?php do_action( 'bbp_template_notices' ); ?>
  <?php while ( have_posts() ) : the_post(); ?>
  <div id="bbp-statistics" class="bbp-statistics">
    <!--<h1 class="entry-title">
      <?php //the_title(); ?>
    </h1>-->
    <div class="entry-content">
      <?php get_the_content() ? the_content() : _e( '<p>Here are the statistics of our forums.</p>', 'bbpress' ); ?>
      <?php do_action( 'bbp_before_statistics' ); ?>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th><?php esc_html_e( 'Registered Users', 'bbpress' ); ?></th>
              <th><?php esc_html_e( 'Forums', 'bbpress' ); ?></th>
              <th><?php esc_html_e( 'Topics', 'bbpress' ); ?></th>
              <th><?php esc_html_e( 'Replies', 'bbpress' ); ?></th>
              <th><?php esc_html_e( 'Topic Tags', 'bbpress' ); ?></th>
              <?php if ( !empty( $empty_topic_tag_count ) ) : ?>
              <th><?php esc_html_e( 'Empty Topic Tags', 'bbpress' ); ?></th>
              <?php endif; ?>
              <?php if ( !empty( $topic_count_hidden ) ) : ?>
              <th><?php esc_html_e( 'Hidden Topics', 'bbpress' ); ?></th>
              <?php endif; ?>
              <?php if ( !empty( $reply_count_hidden ) ) : ?>
              <th><?php esc_html_e( 'Hidden Replies', 'bbpress' ); ?></th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $user_count; ?></td>
              <td><?php echo $forum_count; ?></td>
              <td><?php echo $topic_count; ?></td>
              <td><?php echo $reply_count; ?></td>
              <td><?php echo $topic_tag_count; ?></td>
              <?php if ( !empty( $empty_topic_tag_count ) ) : ?>
              <th><?php echo $empty_topic_tag_count; ?></th>
              <?php endif; ?>
              <?php if ( !empty( $topic_count_hidden ) ) : ?>
              <th><abbr title="<?php echo esc_attr( $hidden_topic_title ); ?>"><?php echo $topic_count_hidden; ?></abbr></th>
              <?php endif; ?>
              <?php if ( !empty( $reply_count_hidden ) ) : ?>
              <th><abbr title="<?php echo esc_attr( $hidden_reply_title ); ?>"><?php echo $reply_count_hidden; ?></abbr></th>
              <?php endif; ?>
            </tr>
          </tbody>
        </table>
      </div>
      <?php do_action( 'bbp_after_statistics' ); ?>
    </div>
  </div>
  <!-- #bbp-statistics -->
  
  <?php endwhile; ?>
  <?php do_action( 'bbp_after_main_content' ); ?>
</div>
<?php get_sidebar('bbpressforum'); ?>
<?php get_footer(); ?>
