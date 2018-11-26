<?php
/*
Template Name: Masonry Knowledge Base with sidebar
*/
?>
<?php get_header();
global $theme_options;
if( isset($theme_options['kb-cat-display-order']) && $theme_options['kb-cat-display-order'] != ''  ) {
	if( $theme_options['kb-cat-display-order'] == 1 ) {
		$cat_display_order = 'ASC';
	} else {
		$cat_display_order = 'DESC';
	}
}

if( isset($theme_options['kb-cat-display-order-by']) && $theme_options['kb-cat-display-order-by'] != ''  ) {
	$cat_display_order_by = $theme_options['kb-cat-display-order-by'];
} else {
	$cat_display_order_by = 'name';
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
// eof page order
$id = get_the_ID();
$get_id = update_option('manual_breadcrumb_kb', $id);
 
//list terms in a given taxonomy
$args = array(
    'hide_empty'    => 1,
	'child_of' 		=> 0,
	'pad_counts' 	=> 1,
	'hierarchical'	=> 1,
	'order'         => $cat_display_order,
	'orderby'       => $cat_display_order_by,
); 
$tax_terms = get_terms('manualknowledgebasecat', $args);
if( $theme_options['kb-home-page-allow-child'] == false ) $tax_terms = wp_list_filter($tax_terms,array('parent'=>0));
$col_md = 6;
$col_sm = 12;
get_template_part( 'template', 'header' ); 
?>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50 fix-margin-50">
<div class="col-md-8 col-sm-12 margin-btm-20">
<div class="masonry-grid-without-sidebar">
  <?php 
  $i = 1;
  foreach ($tax_terms as $tax_term) { 
  ?>
  <div class="col-md-<?php echo $col_md; ?> col-sm-<?php echo $col_sm; ?> masonry-item"> 
    <!--Start-->
    <div class="knowledgebase-body">
      <h5><a href="<?php  echo esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')); ?>">
            <?php   
			 $cat_title = $tax_term->name; 
			 echo $cat_title = html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
			?>
        </a> </h5>
      <span class="separator small"></span>
      <ul class="kbse">
        <?php 
			  if( isset( $theme_options['kb-no-of-records-per-cat'] ) && $theme_options['kb-no-of-records-per-cat'] != '' ) {
					$display_on_of_records_under_cat = $theme_options['kb-no-of-records-per-cat'];	
			  } else {
					$display_on_of_records_under_cat = '5';	
			  }
			  
			  $args = array( 
				'post_type'  => 'manual_kb',
				'posts_per_page' => $display_on_of_records_under_cat,
				'orderby' => $display_page_order_by,
				'order'  => $page_display_order,
				'tax_query' => array(
					array(
						'taxonomy' => 'manualknowledgebasecat',
						'field' => 'term_id',
						'include_children' => true,
						'terms' => $tax_term->term_id
					)
				)
			 );
			 $st_cat_posts = get_posts( $args );
			 foreach( $st_cat_posts as $post ) : ?>
        <li class="cat inner"> <a href="<?php the_permalink(); ?>">
          <?php 
			 $org_title = get_the_title(); 
			 echo $title = html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
		  ?>
          </a> </li>
        <?php endforeach; ?>
      </ul>
      <div style="padding:10px 0px;"> <a href="<?php  echo esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')); ?>" class="custom-link hvr-icon-wobble-horizontal kblnk" >
        <?php esc_html_e( 'View All', 'manual' ); ?>
        <?php echo $tax_term->count; ?> </a></div>
    </div>
    <!--Eof Start class="custom-link"--> 
  </div>
  <?php $i++; } ?>
</div>
</div>


<aside class="col-md-4 col-sm-12" id="sidebar-box">
  <div class="custom-well sidebar-nav">
    <?php 
                if ( is_active_sidebar( 'kb-sidebar-1' ) ) : 
                    dynamic_sidebar( 'kb-sidebar-1' ); 
                endif; 
            ?>
  </div>
</aside>
<?php get_footer(); ?>