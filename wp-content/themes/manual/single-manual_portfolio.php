<?php 
get_header();
global $theme_options;
if( get_post_meta( $post->ID, '_manual_portfolio_page_type', true ) == 1 ) { 
	$no_sidebar = 1;
	$right_sidebar = 2;
	$left_sidebar = 2;
} else if( get_post_meta( $post->ID, '_manual_portfolio_page_type', true ) == 2 ) {  
	$right_sidebar = 1;
	$no_sidebar = 2;
	$left_sidebar = 2;
} else if( get_post_meta( $post->ID, '_manual_portfolio_page_type', true ) == 3 ) {  
	$left_sidebar = 1;
	$no_sidebar = 2;
	$right_sidebar = 2;
} else {  
	$no_sidebar = 2;
	$right_sidebar = 2;
	$left_sidebar = 2;
}
?>

<!-- Global Bar -->
<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break" style=" <?php if( get_post_meta( $post->ID, '_manual_portfolio_header_text_on', true ) == true ) { ?> padding: 170px 0px!important; <?php } ?>" >
  <div class="container inner-margin-top">
    <div class="row">
      <?php if( get_post_meta( $post->ID, '_manual_portfolio_header_text_on', true ) == false ) {  ?>
      <div class="col-md-12 col-sm-12 header-text-align">
        <h1 class="inner-header">
          <?php 
		  if( get_post_meta( $post->ID, '_manual_portfolio_tagline', true ) ) {
		  	echo get_post_meta( $post->ID, '_manual_portfolio_tagline', true );
		  } else {
		  	the_title(); 
		  }
		  ?>
        </h1>
        <p class="inner-header-color"><?php echo get_post_meta( $post->ID, '_manual_portfolio_description', true ); ?></p>
        
        <?php if( get_post_meta( $post->ID, '_manual_portfolio_search_box_status', true ) == 1  ) { ?>
        <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 search-margin-top">
          <div class="global-search">
            <?php get_template_part( 'search', 'home' ); ?>
          </div>
        </div>
        <?php } ?>
        
      </div>
      <?php } ?>
    </div>
  </div>
</div>
<?php 

if( $no_sidebar == 1 ) {
		if( get_post_meta( get_the_ID(), '_manual_portfolio_desc_and_link_status', true ) == false ) { ?>
<div class="portfolio-section">
  <div class="container clearfix">
    <div class="row">
      <div class="col-md-9">
        <div class="heading-block">
          <h4><?php echo get_post_meta( get_the_ID(), '_manual_portfolio_widget_title', true ); ?></h4>
        </div>
        <p class="note"><?php echo get_post_meta( get_the_ID(), '_manual_portfolio_widget_description', true ); ?></p>
      </div>
      <div class="col-md-3">
      <?php if( get_post_meta( get_the_ID(), '_manual_portfolio_widget_link_button_text', true ) != '' ) { ?>
        <p class="portfolio-button-top"> <a class="link hvr-icon-wobble-horizontal" href="<?php echo get_post_meta( get_the_ID(), '_manual_portfolio_widget_link_url', true ); ?>" > <?php echo get_post_meta( get_the_ID(), '_manual_portfolio_widget_link_button_text', true ); ?> </a> 
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php } } ?>

<!-- /start container -->
<div class="container content-wrapper body-content">
  <div class="row margin-top-btm-50">
    <?php if( $no_sidebar != 1 && $left_sidebar == 1 && $right_sidebar == 2  ) { ?>
    <aside class="col-md-4 col-sm-4" id="sidebar-box">
      <?php if( get_post_meta( get_the_ID(), '_manual_portfolio_desc_and_link_status', true ) == false ) { ?>
      <div class="portfolio-link-box-padding-right" style="margin-bottom:40px;">
        <h5><?php echo get_post_meta( get_the_ID(), '_manual_portfolio_widget_title', true ); ?></h5>
        <p><?php echo get_post_meta( get_the_ID(), '_manual_portfolio_widget_description', true ); ?></p>
        
        <?php if( get_post_meta( get_the_ID(), '_manual_portfolio_widget_link_button_text', true ) != '' ) { ?>
        <p class="portfolio-des-n-link"> <a class="link hvr-icon-wobble-horizontal" href="<?php echo get_post_meta( get_the_ID(), '_manual_portfolio_widget_link_url', true ); ?>" > <?php echo get_post_meta( get_the_ID(), '_manual_portfolio_widget_link_button_text', true ); ?> </a> </p>
        <?php } ?>
        
      </div>
      <?php } ?>
      <div class="custom-well sidebar-nav portfolio-widget-right-margin" style="clear:both;">
        <?php 
    if ( is_active_sidebar( 'manual-poftfolio-widget' ) ) : 
        dynamic_sidebar( 'manual-poftfolio-widget' ); 
    endif; 
    ?>
      </div>
    </aside>
    <?php } ?>
    <div class="<?php if( $no_sidebar != 1 ) { ?>col-md-8 col-sm-8 <?php } else { ?> col-md-12 col-sm-12  <?php } ?>">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php if( get_post_meta( get_the_ID(), '_manual_portfolio_stats_status', true ) == 1  ) { ?>
      <div class="portfolio-single">
        <p> <i class="fa fa-eye"></i> <span>
          <?php 
            if( get_post_meta( $post->ID, 'manual_post_visitors', true ) != '' ) { 
                echo get_post_meta( $post->ID, 'manual_post_visitors', true );
                echo esc_html_e( '&nbsp;views ', 'manual' );
            } else { echo '0 views'; } ?>
          </span> <i class="fa fa-calendar"></i> <span>
          <?php the_time( get_option('date_format') ); ?>
          </span> <i class="fa fa-user"></i> <span>
          <?php the_author(); ?>
          </span>
          <?php if( get_post_meta( $post->ID, '_manual_portfolio_like_dislike_post', true ) == 1 ) {  ?>
          <i class="fa fa-thumbs-o-up"></i> <span>
          <?php if( get_post_meta( $post->ID, 'votes_count_doc_manual', true ) == '' ) { echo 0; } else { echo get_post_meta( $post->ID, 'votes_count_doc_manual', true ); } ?>
          </span>
          <?php } ?>
        </p>
      </div>
      <?php } ?>
      <?php 
	$entries = get_post_meta( get_the_ID(), '_manual_portfolio_images', true );
	if( !empty($entries)) { 
		echo '<div class="owl-portfolio">';
		foreach ( (array) $entries as $key => $entry ) {
			echo '<div class="item">';
				$img = $title = $desc = $caption = '';
				if ( isset( $entry['image_id'] ) ) {            
					echo $img = wp_get_attachment_image( $entry['image_id'], 'share-pick', null, array(
						'class' => 'item',
					) );
				}
			echo '</div>';
		}
		echo '</div>';
	}
	?>
      <div class="entry-content clearfix">
        <?php  the_content();  ?>
      </div>
      <?php endwhile; // end of the loop. ?>
      <?php if( get_post_meta( $post->ID, '_manual_portfolio_like_dislike_post', true ) == 1 ) { ?>
      <div id="rate-topic-content" class="row-fluid margin-15">
        <div class="rate-buttons"> <span class="post-like"><a data-post_id="<?php echo $post->ID; ?>" href="#"><span class="btn btn-success rate custom-like-dislike-btm" data-rating="1"><i class="glyphicon glyphicon-thumbs-up"></i> <span class="manual_doc_count"><?php echo $meta_values = get_post_meta( $post->ID, 'votes_count_doc_manual', true ); ?> Yes</span></span></a></span> <span class="post-unlike"><a data-post_id="<?php echo $post->ID; ?>" href="#"><span class="btn btn-danger rate custom-like-dislike-btm" data-rating="0"> <i class="glyphicon glyphicon-thumbs-down"></i> <span class="manual_doc_unlike_count"><?php echo $meta_values = get_post_meta( $post->ID, 'votes_unlike_doc_manual', true ); ?> No </span></span></a></span> </div>
      </div>
      <?php } ?>
      <?php
	if( $theme_options['portfolio-comment-status'] == true ) {
		if ( comments_open() || get_comments_number() ) {
			comments_template( '', true ); 
		}
	}
	?>
      <div style="clear:both"></div>
      <span class="manual-views" id="manual-views-<?php echo $post->ID; ?>"></span> <br>
    </div>
    <?php if( $no_sidebar != 1 && $left_sidebar == 2 && $right_sidebar == 1  ) { ?>
    <aside class="col-md-4 col-sm-4" id="sidebar-box">
    
      <?php if( get_post_meta( get_the_ID(), '_manual_portfolio_desc_and_link_status', true ) == false ) { ?>
      <div class="portfolio-link-box-padding-left" style="margin-bottom:40px;">
        <h5><?php echo get_post_meta( get_the_ID(), '_manual_portfolio_widget_title', true ); ?></h5>
        <p><?php echo get_post_meta( get_the_ID(), '_manual_portfolio_widget_description', true ); ?></p>
        
        <?php if( get_post_meta( get_the_ID(), '_manual_portfolio_widget_link_button_text', true ) != '' ) { ?>
        <p class="portfolio-des-n-link"> <a class="link hvr-icon-wobble-horizontal" href="<?php echo get_post_meta( get_the_ID(), '_manual_portfolio_widget_link_url', true ); ?>" > <?php echo get_post_meta( get_the_ID(), '_manual_portfolio_widget_link_button_text', true ); ?> </a> </p>
        <?php } ?>
        
      </div>
      <?php } ?>
      
      <div class="custom-well sidebar-nav portfolio-widget-left-margin" style="clear:both;">
        <?php 
    if ( is_active_sidebar( 'manual-poftfolio-widget' ) ) : 
        dynamic_sidebar( 'manual-poftfolio-widget' ); 
    endif; 
    ?>
      </div>
    </aside>
    <?php } ?>
  </div>
</div>


<?php if( $theme_options['portfolio-next-previous-status'] == false ||  get_post_meta( $post->ID, '_manual_portfolio_social_share_status', true ) == 1 ) { ?>
<!--Next Previous-->
<div class="portfolio-next-prv-bar">
  <div class="container">
    <div class="portfolio-prev col-md-4 col-sm-12">
    <?php if( $theme_options['portfolio-next-previous-status'] == false ) { ?>
      <p class="previous_post_link_hide">
        <?php previous_post_link('<span class="hvr-icon-back"><strong>%link</strong></span>'); ?>
      </p>
    <?php } ?>  
    </div>
    <div class="col-md-4 col-sm-12 portfolio-soial">
      <?php 
	  if( get_post_meta( $post->ID, '_manual_portfolio_social_share_status', true ) == 1 ) {
		  manual_social_share(get_permalink()); 
	  }
	  ?>
    </div>
    <div class="portfolio-next col-md-4 col-sm-12">
     <?php if( $theme_options['portfolio-next-previous-status'] == false ) { ?>
      <p class="next_post_link_hide">
        <?php next_post_link('<span class="hvr-icon-forward"><strong>%link</strong></span>'); ?>
      </p>
     <?php } ?>  
    </div>
  </div>
</div>
<!--Eof Next Previous-->
<?php } get_footer(); ?>