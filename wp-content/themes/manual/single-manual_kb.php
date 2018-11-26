<?php 
$terms = get_the_terms( $post->ID , 'manualknowledgebasecat' ); 
if( !empty($terms) ) { 

get_header();
global $theme_options;
$col_type = '';
if( $theme_options['kb-cat-sidebar-singlepg-status'] == true ) {
	$col_type = 12;	
} else {
	$col_type = 8;	
}
?>

<!-- Global Bar -->
<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break">
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-12 col-sm-12 header-text-align">
        <h1 class="inner-header">
          <?php 
			 $term = array_pop($terms);
			 echo $term->name;
			 ?>
        </h1>
        <?php if( $theme_options['kb-single-pg-header-breadcrumb-status'] != true ) { ?>
        <p class="inner-header-color">
          <?php manual_breadcrumb(); ?>
        </p>
        <?php } ?>
        <?php if( $theme_options['kb-single-pg-header-search-status'] == false ) { ?>
        <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 search-margin-top">
          <div class="global-search">
            <?php get_template_part( 'search', 'home' ); ?>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-<?php echo $col_type; ?> col-sm-<?php echo $col_type; ?>">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="kb-single" <?php if( $theme_options['knowledgebase-quick-stats-under-title'] == true ) { ?> style="padding: 4px 0px 7px 70px;" <?php } ?>>
  <h2 class="singlepg-font">
    <?php the_title(); ?>
  </h2>
  
    <p class="kb-box-single-page" > 
    <?php if( $theme_options['knowledgebase-quick-stats-under-title'] != true ) { ?>  
    <i class="fa fa-eye"></i>
     <span> <?php 
			if( get_post_meta( $post->ID, 'manual_post_visitors', true ) != '' ) { 
				echo get_post_meta( $post->ID, 'manual_post_visitors', true );
				echo esc_html_e( '&nbsp;views ', 'manual' );
			} else { echo '0 views'; } ?></span>
      <i class="fa fa-calendar"></i> <span><?php the_time( get_option('date_format') ); ?></span>
      
      <?php 
	  if( $theme_options['kb-singlepg-modified-date-status'] == true ) {
	  if (get_the_modified_time() != get_the_time()) { ?>
      <i class="fa fa-calendar-plus-o"></i> <span><?php the_modified_time( get_option('date_format') ); ?></span>
      <?php } } ?>
      
      <i class="fa fa-user"></i> <span><?php the_author(); ?></span>
      <i class="fa fa-thumbs-o-up"></i> <span><?php if( get_post_meta( $post->ID, 'votes_count_doc_manual', true ) == '' ) { echo 0; } else { echo get_post_meta( $post->ID, 'votes_count_doc_manual', true ); } ?></span>
      <?php } ?> 
      <?php edit_post_link( esc_html__( 'Edit', 'manual' ), '<span class="edit-link">', '</span>' ); ?>
    </p>
    
  </div>
  <div class="margin-15 entry-content clearfix">
    <?php the_content(); ?>
  </div>
  
  <?php if (is_single() && has_term( '', 'manual_kb_tag' )) { ?>
      <div class="tagcloud singlepgtag kbtag clearfix margin-btm-20 singlepg"><span><i class="fa fa-tags"></i> <?php echo esc_html__( 'Tags:', 'manual' ); ?></span><?php the_terms( get_the_ID(), 'manual_kb_tag', '' , ''); ?>
      </div>
 <?php } ?>
  
  <?php 
	if( get_post_meta( $post->ID, '_manual_attachement_access_status', true ) == true && !is_user_logged_in() ) { 
		$message = get_post_meta( $post->ID, '_manual_attachement_access_login_msg', true ); 
		manual_access_attachment($message);
	} else { 
		manual_kb_attachment_files(); 
	} 
  ?>
  <?php endwhile; // end of the loop. ?>
  <?php if( $theme_options['knowledgebase-social-share-status'] != true ) { manual_social_share(get_permalink()); } ?>
  <?php if( ($theme_options['knowledgebase-voting-buttons-status'] != true && $theme_options['knowledgebase-voting-login-users'] != true) || 
            ($theme_options['knowledgebase-voting-buttons-status'] == false && $theme_options['knowledgebase-voting-login-users'] == true && is_user_logged_in())
		   ) { ?>
  <div id="rate-topic-content" class="row-fluid margin-15">
    <div class="rate-buttons"> <?php if(isset($theme_options['yes-no-above-message'])) { ?><p class="helpfulmsg"><?php echo $theme_options['yes-no-above-message']; ?></p> <?php } ?><span class="post-like"><a data-post_id="<?php echo $post->ID; ?>" href="#"><span class="btn btn-success rate custom-like-dislike-btm" data-rating="1"><i class="glyphicon glyphicon-thumbs-up"></i> <span class="manual_doc_count"><?php echo $meta_values = get_post_meta( $post->ID, 'votes_count_doc_manual', true ); ?> <?php echo esc_html_e( ' Yes ', 'manual' ); ?></span></span></a></span> <span class="post-unlike"><a data-post_id="<?php echo $post->ID; ?>" href="#"><span class="btn btn-danger rate custom-like-dislike-btm" data-rating="0"> <i class="glyphicon glyphicon-thumbs-down"></i> <span class="manual_doc_unlike_count"><?php echo $meta_values = get_post_meta( $post->ID, 'votes_unlike_doc_manual', true ); ?> <?php echo esc_html_e( ' No ', 'manual' ); ?> </span></span></a></span> </div>
    <?php 
	if( is_super_admin() && is_user_logged_in() ) {
		echo '<span class="post-reset"><a data-post_id="'.$post->ID.'" href="#"><span class="btn btn-link" data-rating="0"> <i class="fa fa-refresh"></i> <span class="rating_reset_display"> Reset </span></span></a></span>';
	}
	?>
  </div>
  <?php } ?>
    <?php
	if( $theme_options['kb-related-post-status'] == true ) { manual_kb_related_post(); }
	if( $theme_options['kb-comment-status'] == true ) {
		if ( comments_open() || get_comments_number() ) {
			comments_template( '', true ); 
		}
	}
	?>
  
  <div style="clear:both"></div>
  <span class="manual-views" id="manual-views-<?php echo $post->ID; ?>"></span> <br>
</div>

<?php if( $theme_options['kb-cat-sidebar-singlepg-status'] != true ) { ?>
<aside class="col-md-4 col-sm-4" id="sidebar-box">
  <div class="custom-well sidebar-nav">
    <?php 
                if ( is_active_sidebar( 'kb-sidebar-1' ) ) : 
                    dynamic_sidebar( 'kb-sidebar-1' ); 
                endif; 
            ?>
  </div>
</aside>
<?php } ?>
<?php 
get_footer(); 
} else {
 esc_html_e( 'Please assign category for your Knowledge Base RECORD', 'manual' );	
} 
?>