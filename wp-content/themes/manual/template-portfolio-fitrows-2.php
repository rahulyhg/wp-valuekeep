<?php
/*
Template Name: Portfolio 2 column : FitRows
*/

global $theme_options;
get_header();
$id = get_the_ID();

//list terms in a given taxonomy
$args = array(
    'hide_empty'    => 1,
	'child_of' 		=> 0,
	'pad_counts' 	=> 1,
	'hierarchical'	=> 1,
	'order'         => 'ASC',
); 
$tax_terms = get_terms('manualportfoliocategory', $args);
$tax_terms = wp_list_filter($tax_terms,array('parent'=>0));
get_template_part( 'template', 'header' ); 
?>

<!--PORTFOLIO-->
<div class="portfolio-start-display-section">
 <div class="container portfolio-filter portfolio-list-divider filter-portfolio-group">
    <ul>
		<?php if( ! empty($tax_terms) ) { ?>
            <li data-filter="*" class="selected"><span>All</span></li>
		<?php } ?>    
			<?php
                $i = 1;
                foreach ($tax_terms as $tax_term) { 
				 $cat_title = $tax_term->name; 
				 $cat_title = html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
				 $cat_title_filter = strtolower($cat_title);
				 $cat_title_filter = preg_replace("/[\s_]/", "-", $cat_title_filter);
            ?>
            <li data-filter=".<?php echo strtolower($cat_title_filter); ?>"><span><?php echo $cat_title; ?></span></li>
            <?php 
			 } 
			?> 
    </ul>
 </div>
</div>

<div style="padding-top:10px; padding-bottom:50px;">
<div class="container portfolio-readjust-container">
		  <?php
		  	if( isset($theme_options['portfolio-record-display-order']) && $theme_options['portfolio-record-display-order'] != '' &&  $theme_options['portfolio-record-display-order'] == '1' ) {
				$record_display_order = 'ASC';
			} else {
				$record_display_order = 'DESC';
			}
			
			// order by
		  	if( isset($theme_options['portfolio-record-display-order-by']) && $theme_options['portfolio-record-display-order-by'] != '') {
				$record_display_order_by = $theme_options['portfolio-record-display-order-by'];
			} else {
				$record_display_order_by = 'date';
			}
			
			if( isset($theme_options['portfolio-x-posts-per-page']) && $theme_options['portfolio-x-posts-per-page'] != '' ) {
				$posts_per_page = $theme_options['portfolio-x-posts-per-page'];
			} else {
				$posts_per_page = '-1';
			}
		  
		  
		    $term_slug = get_query_var( 'term' );
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
							'post_type'  => array( 'manual_portfolio' ), 
							'orderby' => $record_display_order_by,
							'posts_per_page' => $posts_per_page,
							'paged' => $paged, 
							'order' => $record_display_order,
			);
			$wp_query = new WP_Query($args);
			if($wp_query->have_posts()) {
				if ( have_posts() ) {
					?>
                    <div class="isotope-container">
                    <?php 
					while($wp_query->have_posts()) : $wp_query->the_post();
					$cutom_redirect_url = get_post_meta( $wp_query->post->ID, '_manual_portfolio_redirect_link_url', true );
					$taxonomies = get_object_taxonomies( $post->post_type, 'objects' ); 
					$out = array();
					$data_category = array();
					foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
						// get the terms related to post
						$terms = get_the_terms( $post->ID, $taxonomy_slug );
						if ( !empty( $terms ) ) {
							foreach ( $terms as $term ) {
								$out[] =
								//'  <a href="'
								//get_term_link( $term->slug, $taxonomy_slug ) .'">'
								$term->name;
								//. "</a>\n";
								
								$data_category[] = $term->name;
								
							}
						}
					}
					?>
					<div class="col-md-6 col-sm-6 element-item  portfolio-section-records <?php foreach( $data_category as $val ) { echo  preg_replace("/[\s_]/", "-", strtolower($val)).' '; } ?>" >
                        <div class="portfolio-image"> 
                            <a href="<?php echo ($cutom_redirect_url?$cutom_redirect_url:get_the_permalink()); ?>"> 
                                <?php 
                                if ( has_post_thumbnail()) { 
                                    the_post_thumbnail(  'portfolio-FitRows', array( 'class' => 'hvr-float' ) );
                                } else {
                                    echo '<img width="825" height="510" src="'. trailingslashit( get_template_directory_uri() ).'img/blank-portfolio.jpg" class="hvr-float wp-post-image">';
                                }
                                ?> 
                            </a>
                        </div>
                        <div class="portfolio-desc">
                            <h3>
                                <a href="<?php echo ($cutom_redirect_url?$cutom_redirect_url:get_the_permalink()); ?>">
                                <?php 
                                    $title = get_the_title(); 
                                    echo $title = html_entity_decode($title, ENT_QUOTES, "UTF-8");
                                ?>
                                </a>
                            </h3>
                            <span> <?php  echo implode(', ', $out ); ?> </span>
                        </div>
                    
                    </div>
                    <?php 
					endwhile;
					wp_reset_postdata();
					?>
                    </div> 
					<div style="clear:both;">
                    <?php 
					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => esc_html__( '&lt;', 'manual' ),
						'next_text'          => esc_html__( '&gt;', 'manual' ),
					) );
					?>
                    </div>
                    <?php
				} // Eof if;
			} // Eof ($wp_query)  have post
		  ?>

</div>
</div>
<div style="clear:both"><div>
<?php get_footer(); ?>