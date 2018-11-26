<?php 
get_header(); 
global $theme_options;
if( isset($theme_options['kb-cat-display-order']) && $theme_options['kb-cat-display-order'] != ''  ) {
	if( $theme_options['kb-cat-display-order'] == 1 ) {
		$cat_display_order = 'ASC';
	} else {
		$cat_display_order = 'DESC';
	}
}
// pages
if( isset($theme_options['kb-cat-page-display-order']) && $theme_options['kb-cat-page-display-order'] != ''  ) {
	if( $theme_options['kb-cat-page-display-order'] == 1 ) {
		$page_display_order = 'ASC';
	} else {
		$page_display_order = 'DESC';
	}
}
if( isset( $theme_options['kb-cat-page-display-order-by'] ) && $theme_options['kb-cat-page-display-order-by'] != '' ) {
	$display_page_order_by = $theme_options['kb-cat-page-display-order-by'];	
} else {
	$display_page_order_by = 'date';	
}

if( $theme_options['kb-cat-sidebar-status'] == true ) {
	$col_content = 12;
} else {
	$col_content = 8;
}

// eof page order
// Get our extra meta
$st_term_data =	$wp_query->queried_object;
$term_slug = get_query_var( 'term' );
$current_term = get_term_by( 'slug', $term_slug, 'manualknowledgebasecat' );
$term_id = $current_term->term_id;
?>

<!-- Global Bar -->
<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break">
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-12 col-sm-12 header-text-align">
        <h1 class="inner-header">
          <?php 
			$current_term = get_term_by( 'slug', get_query_var( 'term' ), 'manualknowledgebasecat' );
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
<?php 

if( $theme_options['all-child-cat-post-in-root-category'] == false ) {

if( !is_paged() ) { 
// CHILD CAT !! CHEK IF THERE IS ANY
$st_subcat_args = array(
  'orderby' => 'name',
  'order'   => $cat_display_order,
  'child_of' => $term_id,
  'parent' => $term_id
);
$st_sub_categories = get_terms('manualknowledgebasecat', $st_subcat_args);
	if ($st_sub_categories) {
		 // If the category has sub categories 
		$st_subcat_args = array(
		  'orderby' => 'name',
		  'order'   => $cat_display_order,
		  'child_of' => $term_id,
		  'parent' => $term_id
		);
		$st_sub_categories = get_terms('manualknowledgebasecat', $st_subcat_args); 
		$st_sub_categories_count = count($st_sub_categories);
		if( $st_sub_categories_count == 1 ) { 
			$col_md_sm = 12;
			$col_sm = 12;
		} else { 
			$col_md_sm = 6; 
			$col_sm = 12;
		}
		foreach($st_sub_categories as $st_sub_category) {
?>
  <div class="col-md-<?php echo $col_md_sm; ?> col-sm-<?php echo $col_sm; ?> masonry-item"> 
    <!--Start-->
    <div class="knowledgebase-body">
      <h5><a href="<?php echo get_term_link($st_sub_category->slug, 'manualknowledgebasecat'); ?>">
        <?php   
				 $cat_title = $st_sub_category->name; 
				 echo $cat_title = html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
				?>
        </a> </h5>
      <span class="separator small"></span>
      <ul class="kbse">
        <?php 
					// Get posts per category
					$args = array( 
						'numberposts' => 5, 
						'post_type'  => 'manual_kb',
						'orderby' => $display_page_order_by,
						'order'  => $page_display_order,
						'tax_query' => array(
							array(
								'taxonomy' => 'manualknowledgebasecat',
								'field' => 'id',
								'include_children' => false,
								'terms' => $st_sub_category->term_id
							)
						)
					);
					$st_cat_posts = get_posts( $args );
					foreach( $st_cat_posts as $post ) : 
					?>
        <li class="cat inner"> <a href="<?php the_permalink(); ?>">
          <?php 
					 $org_title = get_the_title(); 
					 echo $title = html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
					 ?>
          </a> </li>
        <?php 
					endforeach; 
					?>
      </ul>
      <div style="padding:10px 0px;"> <a href="<?php echo get_term_link($st_sub_category->slug, 'manualknowledgebasecat'); ?>"  class="custom-link hvr-icon-wobble-horizontal kblnk">
        <?php esc_html_e( 'View All', 'manual' ); ?>
        <?php echo $st_sub_category->count; ?> </a> </div>
    </div>
    <!--Eof Start--> 
  </div>
  <?php 
		}   
	} 
}


}



echo '</div>';

// PARENT CAT
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
				'post_type' => 'manual_kb',
				/*'paged' => $paged,*/
				'posts_per_page' => '-1',
				'order'  => $page_display_order,
				'orderby' => $display_page_order_by,
				'tax_query' => array(
						array(
							'taxonomy' => 'manualknowledgebasecat',
							'field' => 'slug',
							'include_children' => (($theme_options['all-child-cat-post-in-root-category'] == false)? false : true ), //false,
							'terms' => $term_slug
							)
						),
				
);
$wp_query = new WP_Query($args);
if($wp_query->have_posts()) :  
?>
  <div class="col-md-12 col-md-12 clearfix margin-btm-25" style="padding-left:1px; clear:both;"> 
    <!--Start-->
    <div class="knowledgebase-cat-body">
      <?php
		if ( have_posts() ) {
			  
			while($wp_query->have_posts()) : $wp_query->the_post(); 
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
  <?php endif; ?>
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
