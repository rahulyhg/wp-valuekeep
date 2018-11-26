<?php 
/**
* Add Custom Widget
*/


// Creating Custom KB Category Widget
class manual_custom_kb_cat extends WP_Widget {
	
	
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'kb_custom_cat_widget',
		// Widget name will appear in UI
		esc_html__('KB Custom Category', 'manual'),
		// Widget description
		array( 'description' => esc_html__( 'Display custom knowledgebase category', 'manual' ), )
		);
	} // Eof __construct
	
	
	
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		
		echo $args['before_widget'];
			echo '<div class="display-faq-section">';
				if ( ! empty( $title ) ) echo '<h5 class="widget-title widget-custom"><span>' . $title . '</span></h5>';
				
					if( $instance['cat_list'] != '' ) {
					 echo '<ul>';
					   wp_list_categories( array(
						  'orderby' => 'name',
						  //'show_count' => $show_count,
						  'pad_counts' => 0,
						  'hierarchical' => false,
						  'taxonomy' => 'manualknowledgebasecat',
						  'title_li' => '',
						  'include' => $instance['cat_list'],
						) );
					 echo '</ul>';
					}
				
			echo '<div style="clear:both"></div>';
			echo '</div>';
		echo $args['after_widget'];
	}
	
	
	
	// Widget Backend
	public function form( $instance ) {
		
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'manual' );
		}
		
		$select = array();
		if ( isset( $instance[ 'cat_list' ] ) ) {
			$select = $instance[ 'cat_list' ];
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'manual' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
        <p>
        <label for="<?php echo $this->get_field_id( 'cat_list' ); ?>"><?php esc_html_e( 'Select Category:', 'manual' ); ?></label>
		 <?php 
			 $cat_list = get_categories( array( 'taxonomy' => 'manualknowledgebasecat' ) );
			 
			printf (
                '<select multiple="multiple" name="%s[]" id="%s" class="widefat" size="15" style="margin:10px 0px">',
                $this->get_field_name('cat_list'),
                $this->get_field_id('cat_list')
            );

            // Each individual option
            foreach( $cat_list as $cat )
            {
                printf(
                    '<option value="%s" %s style="margin-bottom:3px;">%s</option>',
                    $cat->cat_ID,
                    in_array( $cat->cat_ID, $select) ? 'selected="selected"' : '',
                    $cat->cat_name
                );
            }

            echo '</select>';
			 
		 ?>
         </p>
         
         <?php 
		
	} // Eof public form
	
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['cat_list'] = ( ! empty( $new_instance['cat_list'] ) ) ? esc_sql( $new_instance['cat_list'] ) : '';
		return $instance;
	}
	
}// Eof Class manual_custom_kb_cat


// Register and load the widget
function manual_custom_kb_cat_widget() { register_widget( 'manual_custom_kb_cat' ); }
add_action( 'widgets_init', 'manual_custom_kb_cat_widget' );






// Creating FAQ WIDGET
class manual_faq extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'faq_cat_widget',
		// Widget name will appear in UI
		esc_html__('FAQ Categroy', 'manual'),
		// Widget description
		array( 'description' => esc_html__( 'Faq records based on category', 'manual' ), )
		);
	}

	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( $instance['cat_count'] == 1 ) { $show_count = 1; } else { $show_count = 0; }
		if( $instance['cat_hierarchy'] == 1 ) { $cat_hierarchy = 1; } else { $cat_hierarchy = 0; }
		// before and after widget arguments are defined by themes
		
		echo $args['before_widget'];
			echo '<div class="display-faq-section">';
				if ( ! empty( $title ) ) echo '<h5 class="widget-title widget-custom"><span>' . $title . '</span></h5>';
				
				$customPostTaxonomies = get_object_taxonomies('manual_faq');
				if(count($customPostTaxonomies) > 0) {    
					 echo '<ul>';
					 foreach($customPostTaxonomies as $tax) {
						 wp_list_categories( array(
							  'orderby' => 'name',
							  'show_count' => $show_count,
							  'pad_counts' => 0,
							  'hierarchical' => $cat_hierarchy,
							  'taxonomy' => $tax,
							  'title_li' => ''
							) );
					 }	
					 echo '</ul>';
				}
			echo '<div style="clear:both"></div>';
			echo '</div>';
		echo $args['after_widget'];
	}
         
	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'manual' );
		}
		
		$cat_count = (isset($instance[ 'cat_count' ])?$instance[ 'cat_count' ]:'');
		$cat_hierarchy = (isset($instance[ 'cat_hierarchy' ])?$instance[ 'cat_hierarchy' ]:''); 
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'manual' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<input name="<?php echo $this->get_field_name( 'cat_count' ); ?>" id="<?php echo $this->get_field_id( 'cat_count' ); ?>" type="checkbox" value="1" <?php if( $cat_count == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo $this->get_field_id( 'cat_count' ); ?>"><?php esc_html_e( 'Show post counts', 'manual' ); ?></label>
		</p>

		<p>
			<input name="<?php echo $this->get_field_name( 'cat_hierarchy' ); ?>" id="<?php echo $this->get_field_id( 'cat_hierarchy' ); ?>" type="checkbox" value="1" <?php if( $cat_hierarchy == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo $this->get_field_id( 'cat_hierarchy' ); ?>"><?php esc_html_e( 'Show hierarchy', 'manual' ); ?></label>
		</p>


		<?php		
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['cat_dropdown'] = ( ! empty( $new_instance['cat_dropdown'] ) ) ? strip_tags( $new_instance['cat_dropdown'] ) : '';
		$instance['cat_count'] = ( ! empty( $new_instance['cat_count'] ) ) ? strip_tags( $new_instance['cat_count'] ) : '';
		$instance['cat_hierarchy'] = ( ! empty( $new_instance['cat_hierarchy'] ) ) ? strip_tags( $new_instance['cat_hierarchy'] ) : '';
		return $instance;
	}

} // Class wpb_widget ends here
 
// Register and load the widget
function manual_load_faq_widget() { register_widget( 'manual_faq' ); }
add_action( 'widgets_init', 'manual_load_faq_widget' );



















// Creating Knowledge Base WIDGET
class manual_kbse extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'kb_cat_widget',
		// Widget name will appear in UI
		esc_html__('KB Categroy', 'manual'),
		// Widget description
		array( 'description' => esc_html__( 'KB records based on category', 'manual' ), )
		);
	}

	// This is where the action happens
	public function widget( $args, $instance ) {
		global $post;
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( $instance['cat_count'] == 1 ) { $show_count = 1; } else { $show_count = 0; }
		if( $instance['cat_hierarchy'] == 1 ) { $cat_hierarchy = 1; } else { $cat_hierarchy = 0; }
		// before and after widget arguments are defined by themes
		
		echo $args['before_widget'];
			echo '<div class="display-faq-section">';
				if ( ! empty( $title ) ) echo '<h5 class="widget-title widget-custom"><span>' . $title . '</span></h5>';
				
				//$customPostTaxonomies = get_object_taxonomies('manual_kb');
				// Select current cat
				$currentKBID = '';
				$terms_kb_selectCatID = get_the_terms( $post->ID, 'manualknowledgebasecat' );
				//print_r($terms_kb_selectCatID); 
				if ( $terms_kb_selectCatID != null ){  
					$currentKBID = array();
					foreach( $terms_kb_selectCatID as $terms_kb_selectCatID ) {
						$currentKBID[] = $terms_kb_selectCatID->term_taxonomy_id;
						unset($terms_kb_selectCatID);
					}
					//print_r($currentKBID);
					if( (array) !empty($currentKBID) ) {
						$kbcatID = implode(",",$currentKBID);
					} else {
						$kbcatID = 0;
					}
				} else {
					$kbcatID = 0;
				}
				//if(count($customPostTaxonomies) > 0) {    
					 echo '<ul>';
					 //foreach($customPostTaxonomies as $tax) {
						 wp_list_categories( array(
							  'orderby' => 'name',
							  'show_count' => $show_count,
							  'pad_counts' => 0,
							  'hierarchical' => $cat_hierarchy,
							  //'taxonomy' => $tax,
							  'taxonomy' => 'manualknowledgebasecat',
							  'current_category' => $kbcatID,
							  'title_li' => ''
							) );
					 //}	
					 echo '</ul>';
				//}
			echo '<div style="clear:both"></div>';
			echo '</div>';
		echo $args['after_widget'];
	}
         
	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'manual' );
		}
		
		$cat_count = (isset($instance[ 'cat_count' ])?$instance[ 'cat_count' ]:'');
		$cat_hierarchy = (isset($instance[ 'cat_hierarchy' ])?$instance[ 'cat_hierarchy' ]:'');
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'manual' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<input name="<?php echo $this->get_field_name( 'cat_count' ); ?>" id="<?php echo $this->get_field_id( 'cat_count' ); ?>" type="checkbox" value="1" <?php if( $cat_count == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo $this->get_field_id( 'cat_count' ); ?>"><?php esc_html_e( 'Show post counts', 'manual' ); ?></label>
		</p>

		<p>
			<input name="<?php echo $this->get_field_name( 'cat_hierarchy' ); ?>" id="<?php echo $this->get_field_id( 'cat_hierarchy' ); ?>" type="checkbox" value="1" <?php if( $cat_hierarchy == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo $this->get_field_id( 'cat_hierarchy' ); ?>"><?php esc_html_e( 'Show hierarchy', 'manual' ); ?></label>
		</p>


		<?php		
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['cat_dropdown'] = ( ! empty( $new_instance['cat_dropdown'] ) ) ? strip_tags( $new_instance['cat_dropdown'] ) : '';
		$instance['cat_count'] = ( ! empty( $new_instance['cat_count'] ) ) ? strip_tags( $new_instance['cat_count'] ) : '';
		$instance['cat_hierarchy'] = ( ! empty( $new_instance['cat_hierarchy'] ) ) ? strip_tags( $new_instance['cat_hierarchy'] ) : '';
		return $instance;
	}

} // Class wpb_widget ends here
 
// Register and load the widget
function manual_load_kb_widget() { register_widget( 'manual_kbse' ); }
add_action( 'widgets_init', 'manual_load_kb_widget' );







// Creating Knowledge Base Article WIDGET
class manual_kb_articles extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'kb_article_widget',
		// Widget name will appear in UI
		esc_html__('KB Articles', 'manual'),
		// Widget description
		array( 'description' => esc_html__( 'KB articles (latest, popular, top rated and the most commented articles)', 'manual' ), )
		);
	}
	
	// This is where the action happens
	public function widget( $args, $instance ) {
		global $post;
		$title = apply_filters( 'widget_title', $instance['title'] );
		$knowledgebase_article_number = $instance['article_number'];
		$knowledgebase_article_order = $instance[ 'article_order' ];
		
		if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 1 ) { // Latest Article
			$kb_args = array( 
						'posts_per_page' => $knowledgebase_article_number, 
						'post_type'  => 'manual_kb',
						'orderby' => 'date',
						'order'	=>	$knowledgebase_article_order,
					);
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 2 ) { // Popular Article
			$kb_args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'manual_kb',
							'orderby' => 'meta_value',
							'order'	=>	$knowledgebase_article_order,
							'meta_key' => 'manual_post_visitors'
						);
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 3 ) { // Top Rated Article
			$kb_args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'manual_kb',
							'orderby' => 'meta_value',
							'order'	=>	$knowledgebase_article_order,
							'meta_key' => 'votes_count_doc_manual'
						);
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 4 ) { // Most Commented Article
			$kb_args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'manual_kb',
							'orderby' => 'comment_count',
							'order'	=>	$knowledgebase_article_order,
						);
		}
		
		echo $args['before_widget'];
		echo '<div class="kb_article_type display-faq-section">';
			if ( ! empty( $title ) ) echo '<h5 class="widget-title widget-custom"><span>' . $title . '</span></h5>';
			$query = new WP_Query($kb_args);
			echo '<ul class="clearfix">';
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			echo '<li class="articles"><a href="'.get_permalink($query->post->ID).'" rel="bookmark">'.get_the_title($query->post->ID).'</a></li>';
			endwhile; endif;
			echo '</ul>'; 
		wp_reset_query();
		echo '</div>';
		echo $args['after_widget'];
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['display_type'] = ( ! empty( $new_instance['display_type'] ) ) ? strip_tags( $new_instance['display_type'] ) : '';
		$instance['article_number'] = ( ! empty( $new_instance['article_number'] ) ) ? strip_tags( $new_instance['article_number'] ) : '';
		$instance['article_order'] = ( ! empty( $new_instance['article_order'] ) ) ? strip_tags( $new_instance['article_order'] ) : '';
		return $instance;
	}
	
	// Widget Backend
	public function form( $instance ) {
		
		// title
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'manual' );
		}
		
		// display
		$latest_article = $popular_article = $top_rated_article = $most_commented_article = '';
		if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 1 ) $latest_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 2 ) $popular_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 3 ) $top_rated_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 4 ) $most_commented_article = 'selected';
		
		// article number
		if ( isset( $instance[ 'article_number' ] ) ) {
			$article_number = $instance[ 'article_number' ];
		} else {
			$article_number = 5;
		}
		
		// order
		$ascending_order = $descending_order = '';
		if(  isset($instance[ 'article_order' ]) && $instance[ 'article_order' ] == 'ASC' ) { $ascending_order = 'selected';  }
		else if(  isset($instance[ 'article_order' ]) && $instance[ 'article_order' ] == 'DESC' ) { $descending_order = 'selected';  }

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'manual' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
        <label for="<?php echo $this->get_field_id( 'Article Display Type' ); ?>"><?php esc_html_e( 'Article Display Type', 'manual' ); ?></label>
        <select id="<?php echo $this->get_field_id( 'display_type' ); ?>" name="<?php echo $this->get_field_name( 'display_type' ); ?>">
            <option value="1" <?php echo $latest_article; ?>>Latest Articles (using date)</option>
            <option value="2" <?php echo $popular_article; ?>>Popular Article (using number of views)</option>
            <option value="3" <?php echo $top_rated_article; ?>>Top Rated Article (using like)</option>
            <option value="4" <?php echo $most_commented_article; ?>>Most Commented Article</option>
        </select>
        </p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'Number of Articles' ); ?>"><?php esc_html_e( 'Number of Articles:', 'manual' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'article_number' ); ?>" name="<?php echo $this->get_field_name( 'article_number' ); ?>" type="text" value="<?php echo esc_attr( $article_number ); ?>" />
		</p>
        
        
         <p>
        <label for="<?php echo $this->get_field_id( 'Article Order' ); ?>"><?php esc_html_e( 'Article Order', 'manual' ); ?></label>
        <select id="<?php echo $this->get_field_id( 'article_order' ); ?>" name="<?php echo $this->get_field_name( 'article_order' ); ?>">
            <option value="ASC" <?php echo $ascending_order; ?>>Ascending Order</option>
            <option value="DESC" <?php echo $descending_order; ?>>Descending Order</option>
        </select>
        </p>


		<?php		
	}
	
} // Class wpb_widget ends here
 
// Register and load the widget
function manual_load_kb_article_widget() { register_widget( 'manual_kb_articles' ); }
add_action( 'widgets_init', 'manual_load_kb_article_widget' );









// Display KB category articles in single page sidebar 
class manual_kb_cat_article_single_pg extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'kb_single_pg_related_cat_widget',
		// Widget name will appear in UI
		esc_html__('KB Category Articles In Single Page Sidebar', 'manual'),
		// Widget description
		array( 'description' => esc_html__( 'display category articles for all KB single post pages', 'manual' ), )
		);
	}

	// This is where the action happens
	public function widget( $args, $instance ) {
		global $post;
		$no_of_category_records = $instance['no_of_category_records'];
		$post_type = get_post_type();
		if( $post_type == 'manual_kb' && is_single() ) {
		echo $args['before_widget'];
			echo '<div class="display-faq-section">';
			
				$terms = get_the_terms( $post->ID , 'manualknowledgebasecat' );
				$term = array_pop($terms);
				echo '<div class="knowledgebase-body">
				  <h5><a href="'.get_category_link($term->term_id).'">'.$term->name.'</a> </h5>
				  <span class="separator small"></span><ul class="kbse">';
				  
					$post_args = array( 
						'post_type'  => 'manual_kb',
						'posts_per_page' => $no_of_category_records,
						'orderby' => 'date',
						'order'  => 'DESC',
						'tax_query' => array(
							array(
								'taxonomy' => 'manualknowledgebasecat',
								'field' => 'term_id',
								'terms' => $term->term_id
							)
						)
					); 
					$st_cat_posts = get_posts( $post_args );
					foreach( $st_cat_posts as $post ) :
						echo '<li class="cat inner"> <a href="'. get_the_permalink().'">';
						$org_title = get_the_title(); 
						echo $title = html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
						echo '</a></li>';
					endforeach;	
					wp_reset_postdata(); 
						  
				  echo '</ul><div style="padding:10px 0px;"> <a href="'.get_category_link($term->term_id).'" class="custom-link hvr-icon-wobble-horizontal kblnk"> '. traduzirString() .$term->count.' </a></div>
                </div>';				
			echo '<div style="clear:both"></div>';
			echo '</div>';
		echo $args['after_widget'];
		}
	}
         
	// Widget Backend
	public function form( $instance ) {
		$no_of_category_records = (isset($instance[ 'no_of_category_records' ])?$instance[ 'no_of_category_records' ]:'');
		?><p>
        <label for="<?php echo $this->get_field_id( 'no_of_category_records' ); ?>"><?php esc_html_e( 'No Of Category Records', 'manual' ); ?></label>
		<input name="<?php echo $this->get_field_name( 'no_of_category_records' ); ?>" id="<?php echo $this->get_field_id( 'no_of_category_records' ); ?>" type="text" value="<?php echo esc_attr( $no_of_category_records ); ?>" />
		</p><?php		
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['no_of_category_records'] = ( ! empty( $new_instance['no_of_category_records'] ) ) ? strip_tags( $new_instance['no_of_category_records'] ) : '';
		return $instance;
	}

} // Class wpb_widget ends here
 
// Register and load the widget
function manual_kb_cat_article_single_pg_widget() { register_widget( 'manual_kb_cat_article_single_pg' ); }
add_action( 'widgets_init', 'manual_kb_cat_article_single_pg_widget' );
?>