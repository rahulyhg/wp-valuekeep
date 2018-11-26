<?php
/*
Template Name: Documentation - home 
*/
?>
<?php get_header();
global $theme_options;
$id = get_the_ID();
$get_id = update_option('manual_breadcrumb_doc', $id);
if( isset( $theme_options['documentation-category-record-display-order'] ) && $theme_options['documentation-category-record-display-order'] != '' ) {
	$cat_display_order = $theme_options['documentation-category-record-display-order'];
} else {
	$cat_display_order = 'ASC';
}
if( isset( $theme_options['documentation-category-record-display-order-by'] ) && $theme_options['documentation-category-record-display-order-by'] != '' ) {
	$cat_display_order_by = $theme_options['documentation-category-record-display-order-by'];
} else {
	$cat_display_order_by = 'name';
}
get_template_part( 'template', 'header' ); 
?>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-12 col-sm-12">
  <?php 
		$args = array(
					'orderby'           => $cat_display_order_by, 
					'order'             => $cat_display_order,
					'hide_empty'        => true, 
					'exclude'           => array(), 
					'exclude_tree'      => array(), 
					'include'           => array(),
					'number'            => '', 
					'fields'            => 'all', 
					'slug'              => '',
					'parent'            => '',
					'hierarchical'      => false, 
					'child_of'          => 0, 
					'get'               => '', 
					'name__like'        => '',
					'description__like' => '',
					'pad_counts'        => false, 
					'offset'            => '', 
					'search'            => '', 
					'cache_domain'      => 'core'
				); 
		$customPostTaxonomies = get_object_taxonomies('manual_documentation');		
		$customPostTaxonomies = get_terms( $customPostTaxonomies[0], $args );
		if ($customPostTaxonomies) {
		    echo '<ul class="news-list">';
			foreach($customPostTaxonomies as $cat) {
				echo "<li class='cat-lists'><h2 style='margin-bottom: 0px;'>";
				echo '<a href="' . esc_attr(get_term_link($cat, $customPostTaxonomies[0])) . '" >' . esc_attr( $cat->name ).'</a>';
				echo "</h2><p>".esc_html( $cat->description )."</p></li>";
			}
			echo '</ul>';
		  }
		?>
</div>
<?php get_footer(); ?>