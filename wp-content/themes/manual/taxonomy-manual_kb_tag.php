<?php 
get_header(); 
global $theme_options;

if( $theme_options['kb-cat-sidebar-status'] == true ) {
	$col_content = 12;
} else {
	$col_content = 8;
}

// eof page order
// Get our extra meta
$st_term_data =	$wp_query->queried_object;
$term_slug = get_query_var( 'term' );
$current_term = get_term_by( 'slug', $term_slug, 'manual_kb_tag' );
$term_id = $current_term->term_id;
?>

<!-- Global Bar -->
<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break">
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-12 col-sm-12 header-text-align">
        <h1 class="inner-header">
          <?php 
			$current_term = get_term_by( 'slug', get_query_var( 'term' ), 'manual_kb_tag' );
			echo $current_term->name; 
        ?>
        </h1>
        <?php if( $theme_options['kb-cat-header-breadcrumb-status'] == false ) { ?>
        <p class="inner-header-color">
          <?php manual_breadcrumb(); ?>
        </p>
        <?php } ?>
        <?php if( $theme_options['kb-cat-header-search-status'] == false ) { ?>
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
<div class="col-md-<?php echo $col_content; ?> col-sm-<?php echo $col_content; ?>">  <!--control-->
<div class="masonry-grid-inner margin-btm-25" style="clear:both;">
<?php echo '</div>'; ?>
  <div class="col-md-12 col-md-12 clearfix margin-btm-25" style="padding-left:1px; clear:both;"> 
    <!--Start-->
    <div class="knowledgebase-cat-body">
      <?php
		if ( have_posts() ) {
			while(have_posts()) : the_post();  
        ?>
      <div class="kb-box-single">
        <h2 style="padding-top:4px; margin-bottom:0px;"><a href="<?php the_permalink(); ?>">
          <?php 
					 $org_title = get_the_title(); 
					 echo $title = html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
					 ?>
          </a> </h2>
          
        <p> <?php if( $theme_options['knowledgebase-cat-quick-stats-under-title'] == false ) { ?><i class="fa fa-eye"></i>
          <span><?php 
			if( get_post_meta( $post->ID, 'manual_post_visitors', true ) != '' ) { 
				echo get_post_meta( $post->ID, 'manual_post_visitors', true );
				echo ' views';
			} else { echo '0 views'; } ?></span>
         
           <i class="fa fa-calendar"></i> <span><?php the_time( get_option('date_format') ); ?></span>
           <i class="fa fa-user"></i>  <span><?php the_author(); ?></span>
           <i class="fa fa-thumbs-o-up"></i> <span><?php if( get_post_meta( $post->ID, 'votes_count_doc_manual', true ) == '' ) { echo 0; } else { echo get_post_meta( $post->ID, 'votes_count_doc_manual', true ); } ?></span>
           <?php } ?>
        </p>
        
      </div>
      <?php 
					endwhile;  
					
			wp_reset_postdata();
			
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => esc_html__( '&lt;', 'manual' ),
				'next_text'          => esc_html__( '&gt;', 'manual' ),
			) );
			
		
		} else {
			 esc_html_e( 'Sorry, no posts were found', 'manual' );
		}			
				  ?>
    </div>
    <!--Eof Start--> 
  </div>
</div>
<?php if( $theme_options['kb-cat-sidebar-status'] != true ) { ?>
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
<?php get_footer(); ?>
