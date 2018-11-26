<?php 

/**
 * Breadcrumbs
 */
if (!function_exists('manual_breadcrumb')) { 
	function manual_breadcrumb() {
		global $theme_options;
		//Variable (symbol >> encoded) and can be styled separately.
		//Use >> for different level categories (parent >> child >> grandchild)
		$delimiter = '<span class="sep">/</span>';
		//Use bullets for same level categories ( parent . parent )
		$delimiter1 = '<span class="delimiter1">&bull;</span>';
		 
		//text link for the 'Home' page
		$main = esc_html__("home", "manual"); 
		//Display only the first 30 characters of the post title.
		$maxLength = 30;
		 
		//variable for archived year
		$arc_year = get_the_time('Y', true);
		//variable for archived month
		$arc_month = get_the_time('F', true);
		//variables for archived day number + full
		$arc_day = get_the_time('d', true);
		$arc_day_full = get_the_time('l', true); 
		 
		//variable for the URL for the Year
		$url_year = get_year_link($arc_year);
		//variable for the URL for the Month   
		$url_month = get_month_link($arc_year,$arc_month);
		
		//Get the blog page ID
		$posts_page_id = get_option('page_for_posts');
	
	 
		/*is_front_page(): If the front of the site is displayed, whether it is posts or a Page. This is true
		when the main blog page is being displayed and the 'Settings > Reading ->Front page displays'
		is set to "Your latest posts", or when 'Settings > Reading ->Front page displays' is set to
		"A static page" and the "Front Page" value is the current Page being displayed. In this case
		no need to add breadcrumb navigation. is_home() is a subset of is_front_page() */
		 
		//Check if NOT the front page (whether your latest posts or a static page) is displayed. Then add breadcrumb trail.
		if (!is_front_page()) {        
			//If Breadcrump exists, wrap it up in a div container for styling.
			//You need to define the breadcrumb class in CSS file.
			echo '<div id="breadcrumbs">';
			 
			//global WordPress variable $post. Needed to display multi-page navigations.
			global $post, $cat;        
			//A safe way of getting values for a named option from the options database table.
			$homeLink = home_url(); //same as: $homeLink = get_bloginfo('url');
			//If you don't like "You are here:", just remove it.
			echo '<a href="' . $homeLink . '">' . $main . '</a>' . $delimiter;   
			
			
			if (is_home()) {
				echo '<a href="' . get_permalink( $posts_page_id ) . '">' . get_the_title($posts_page_id) .'</a>' . $delimiter;	
				
			} else if (is_tax( 'manualdocumentationcategory' ) || get_post_type() == 'manual_documentation') {
				// Get custom post type data
				$get_page_ID = get_option('manual_breadcrumb_doc');
				if( $get_page_ID != '' ) $nav_url = get_permalink( $get_page_ID );
				else $nav_url = '';
				// custom home url
				if( isset($theme_options['doc-breadcrumb-custom-home-url']) && $theme_options['doc-breadcrumb-custom-home-url'] != '' ) {
					$nav_url = $theme_options['doc-breadcrumb-custom-home-url'];
				}
				//get_post_type_archive_link( 'manual_documentation' )
				$doc_data = get_post_type_object('manual_documentation');
				echo '<a href="' . $nav_url . '">' . $doc_data->labels->singular_name .'</a>' . $delimiter;
				
			}  else if (is_tax( 'manualfaqcategory' ) || get_post_type() == 'manual_faq') {
				// Get custom post type data
				$faq_data = get_post_type_object('manual_faq');
				echo '<a href="' . get_post_type_archive_link( 'manual_faq' ) . '">' . $faq_data->labels->singular_name .'</a>' . $delimiter;
				
			}   else if (is_tax( 'manualknowledgebasecat' ) || get_post_type() == 'manual_kb') {
				// Get custom post type data
				$get_page_ID = get_option('manual_breadcrumb_kb');
				if( $get_page_ID != '' ) $nav_url = get_permalink( $get_page_ID );
				else $nav_url = '';
				// custom home url
				if( isset($theme_options['kb-breadcrumb-custom-home-url']) && $theme_options['kb-breadcrumb-custom-home-url'] != '' ) {
					$nav_url = $theme_options['kb-breadcrumb-custom-home-url'];
				}
				//get_post_type_archive_link( 'manual_kb' )
				$faq_data = get_post_type_object('manual_kb');
				echo '<a href="' . $nav_url . '">' . $faq_data->labels->singular_name .'</a>' . $delimiter;
			}
			 
			//Display breadcrumb for single post
			if (is_single()) { //check if any single post is being displayed.   
			
				if( get_post_type() == 'manual_documentation' ) { 
					
	
					$terms = get_the_terms( $post->ID , 'manualdocumentationcategory' );
					$term = array_pop($terms);
					$st_term_ancestors = get_ancestors( $term->term_id, 'manualdocumentationcategory' );
					$st_term_ancestors = array_reverse( $st_term_ancestors );
					foreach( $st_term_ancestors as $st_term_ancestor ) {
						// Get the taxonomy link
						$st_category_link = get_term_link( $st_term_ancestor, 'manualdocumentationcategory' );
						// Get the taxonomy name
						$st_category_data = get_term( $st_term_ancestor, 'manualdocumentationcategory' );
						echo '<a href="'. $st_category_link .'">'. $st_category_data->name .'</a>' . $delimiter;
					}
					echo '<a href="'.get_term_link($term->slug, 'manualdocumentationcategory').'">'.$term->name.'</a>';
	
				 
				} else if( get_post_type() == 'manual_faq' ) {
					 
	
					$terms = get_the_terms( $post->ID , 'manualfaqcategory' );
					$term = array_pop($terms);
					$st_term_ancestors = get_ancestors( $term->term_id, 'manualfaqcategory' );
					$st_term_ancestors = array_reverse( $st_term_ancestors );
					foreach( $st_term_ancestors as $st_term_ancestor ) {
						// Get the taxonomy link
						$st_category_link = get_term_link( $st_term_ancestor, 'manualfaqcategory' );
						// Get the taxonomy name
						$st_category_data = get_term( $st_term_ancestor, 'manualfaqcategory' );
						echo '<a href="'. $st_category_link .'">'. $st_category_data->name .'</a>' . $delimiter;
					}
					echo '<a href="'.get_term_link($term->slug, 'manualfaqcategory').'">'.$term->name.'</a>';
	
				
				}  else if( get_post_type() == 'manual_kb' ) {
					
					$terms = get_the_terms( $post->ID , 'manualknowledgebasecat' );
					$term = array_pop($terms);
					$st_term_ancestors = get_ancestors( $term->term_id, 'manualknowledgebasecat' );
					$st_term_ancestors = array_reverse( $st_term_ancestors );
					foreach( $st_term_ancestors as $st_term_ancestor ) {
						// Get the taxonomy link
						$st_category_link = get_term_link( $st_term_ancestor, 'manualknowledgebasecat' );
						// Get the taxonomy name
						$st_category_data = get_term( $st_term_ancestor, 'manualknowledgebasecat' );
						echo '<a href="'. $st_category_link .'">'. $st_category_data->name .'</a>' . $delimiter;
					}
					echo '<a href="'.get_term_link($term->slug, 'manualknowledgebasecat').'">'.$term->name.'</a>';
	
				
				} else {  
				
					$category_name = get_the_category( $posts_page_id );
					$array_count = count($category_name);
						if( $array_count > 0 ) {
							// Get the ID of a given category
							$category_id = get_cat_ID( $category_name[0]->cat_name );
							// Get the URL of this category
							$category_link = get_category_link( $category_id );
						}
						echo '<a href="' . get_permalink( $posts_page_id ) . '">' . get_the_title($posts_page_id) .'</a>' . $delimiter;	
						echo the_category( $delimiter1, 'multiple');
					
				}
			
			} elseif (is_tax( 'manualdocumentationcategory' )) {
				
				// Get term data to retrive parent
				$st_term_data = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				$st_term_parent_data = get_term($st_term_data->term_id, get_query_var('taxonomy') );
				$st_term_parent_id = $st_term_parent_data->term_id;
				$st_term_ancestors = get_ancestors( $st_term_parent_id, 'manualdocumentationcategory' );
				$st_term_ancestors = array_reverse( $st_term_ancestors );
				foreach( $st_term_ancestors as $st_term_ancestor ) {
					// Get the taxonomy link
					$st_category_link = get_term_link( $st_term_ancestor, 'manualdocumentationcategory' );
					// Get the taxonomy name
					$st_category_data = get_term( $st_term_ancestor, 'manualdocumentationcategory' );
					echo '<a href="'. $st_category_link .'">'. $st_category_data->name .'</a>' . $delimiter;
				}
				echo single_cat_title() . $delimiter;
			
			} elseif (is_tax( 'manualfaqcategory' )) {
				
				
				// Get term data to retrive parent
				$st_term_data = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				$st_term_parent_data = get_term($st_term_data->term_id, get_query_var('taxonomy') );
				$st_term_parent_id = $st_term_parent_data->term_id;
				$st_term_ancestors = get_ancestors( $st_term_parent_id, 'manualfaqcategory' );
				$st_term_ancestors = array_reverse( $st_term_ancestors );
				foreach( $st_term_ancestors as $st_term_ancestor ) {
					// Get the taxonomy link
					$st_category_link = get_term_link( $st_term_ancestor, 'manualfaqcategory' );
					// Get the taxonomy name
					$st_category_data = get_term( $st_term_ancestor, 'manualfaqcategory' );
					echo '<a href="'. $st_category_link .'">'. $st_category_data->name .'</a>' . $delimiter;
				}
				echo single_cat_title() . $delimiter;
			
			
			//Display breadcrumb for category and sub-category archive
			
			}  elseif (is_tax( 'manualknowledgebasecat' )) {
				// Get term data to retrive parent
				$st_term_data = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				$st_term_parent_data = get_term($st_term_data->term_id, get_query_var('taxonomy') );
				$st_term_parent_id = $st_term_parent_data->term_id;
				$st_term_ancestors = get_ancestors( $st_term_parent_id, 'manualknowledgebasecat' );
				$st_term_ancestors = array_reverse( $st_term_ancestors );
				foreach( $st_term_ancestors as $st_term_ancestor ) {
					// Get the taxonomy link
					$st_category_link = get_term_link( $st_term_ancestor, 'manualknowledgebasecat' );
					// Get the taxonomy name
					$st_category_data = get_term( $st_term_ancestor, 'manualknowledgebasecat' );
					echo '<a href="'. $st_category_link .'">'. $st_category_data->name .'</a>' . $delimiter;
				}
				echo single_cat_title() . $delimiter;
			
			
			//Display breadcrumb for category and sub-category archive
			
			}elseif (is_category()) { //Check if Category archive page is being displayed.
				//returns the category title for the current page.
				//If it is a subcategory, it will display the full path to the subcategory.
				//Returns the parent categories of the current category with links separated by '»'
			   if ( is_wp_error( $cat_parents = get_category_parents($cat, TRUE, $delimiter) )) 	{ 
				echo $cat_parents; 
				} else {
				echo single_cat_title( '', false );
				}
				
			}
			//Display breadcrumb for archive
			elseif (is_archive()) {
				// Check If Woo Active
			if(function_exists("is_woocommerce") && is_shop()){
				$woopage_id = get_option('woocommerce_shop_page_id');
				$wooID  = get_post( $woopage_id );
				echo get_the_title($wooID->ID);
			// Normal			
			} else if ( is_day() ) {
							echo get_the_date();
						} elseif ( is_month() ) {
							echo get_the_date( _x( 'F Y', 'monthly archives date format', 'manual' ) );
						} elseif ( is_year() ) {
							 echo get_the_date( _x( 'Y', 'yearly archives date format', 'manual' ) );
						} else {
							esc_html_e( 'archives', 'manual' );
				}
			}
			//Display breadcrumb for tag archive       
			elseif ( is_tag() ) { //Check if a Tag archive page is being displayed.
				//returns the current tag title for the current page.
				echo single_tag_title("", false);
			}       
			//Display breadcrumb for calendar (day, month, year) archive
			elseif ( is_day()) { //Check if the page is a date (day) based archive page.
				echo '<a href="' . $url_year . '">' . $arc_year . '</a> ' . $delimiter . ' ';
				echo '<a href="' . $url_month . '">' . $arc_month . '</a> ' . $delimiter . $arc_day . ' (' . $arc_day_full . ')';
			}
			elseif ( is_month() ) {  //Check if the page is a date (month) based archive page.
				echo '<a href="' . $url_year . '">' . $arc_year . '</a> ' . $delimiter . $arc_month;
			}
			elseif ( is_year() ) {  //Check if the page is a date (year) based archive page.
				echo $arc_year;
			}      
			//Display breadcrumb for search result page
			elseif ( is_search() ) {  //Check if search result page archive is being displayed.
			
				echo esc_html__('Search Results for: ', 'manual') . get_search_query();
			}      
			//Display breadcrumb for top-level pages (top-level menu)
			elseif ( is_page() && !$post->post_parent ) { //Check if this is a top Level page being displayed.
				echo get_the_title();
			}          
			//Display breadcrumb trail for multi-level subpages (multi-level submenus)
			elseif ( is_page() && $post->post_parent ) {  //Check if this is a subpage (submenu) being displayed.
				//get the ancestor of the current page/post_id, with the numeric ID
				//of the current post as the argument.
				//get_post_ancestors() returns an indexed array containing the list of all the parent categories.               
				$post_array = get_post_ancestors($post);
				 
				//Sorts in descending order by key, since the array is from top category to bottom.
				krsort($post_array);
				 
				//Loop through every post id which we pass as an argument to the get_post() function.
				//$post_ids contains a lot of info about the post, but we only need the title.
				foreach($post_array as $key=>$postid){
					//returns the object $post_ids
					$post_ids = get_post($postid);
					//returns the name of the currently created objects
					$title = $post_ids->post_title;
					//Create the permalink of $post_ids
					echo '<a href="' . get_permalink($post_ids) . '">' . $title . '</a>' . $delimiter;
				}
				the_title(); //returns the title of the current page.              
			}          
			//Display breadcrumb for author archive  
			elseif ( is_author() ) {//Check if an Author archive page is being displayed.
				global $author;
				//returns the user's data, where it can be retrieved using member variables.
				$user_info = get_userdata($author);
				echo  $user_info->display_name;
			}      
			//Display breadcrumb for 404 Error
			elseif ( is_404() ) {//checks if 404 error is being displayed
	
			}      
			else {
				//All other cases that I missed. No Breadcrumb trail.
			}
		   echo '</div>';    
		} 
	}
}
?>