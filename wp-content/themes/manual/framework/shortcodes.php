<?php 
// COUNTER
if(!function_exists("manual_theme_counter")){
	function manual_theme_counter( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"position"         => "",
			"digit"            => "",
			"font_weight"      => "",
			"font_color"       => "",
			"text"             => "",
			"text_transform"   => "",
			"text_color"       => "",
			"text_font_weight" => "",
			"separator"        => "",
			"separator_color"  => "",
		), $atts ) );
		
		// Countdown Color
		if( isset($font_color) && $font_color != '' ) { $font_color = 'color:'.$font_color.';';  
		} else { $font_color = ''; }
		// Countdown Font Weight
		if( isset($font_weight) && $font_weight != '' ) { $font_weight = 'font-weight:'.$font_weight.';'; 
		} else { $font_weight = ''; }
		// Text Color
		if( isset($text_color) && $text_color != '' ) { $text_color =  $text_color = 'color:'.$text_color.';';  
		} else { $text_color = ''; }
		// Text Font Weight
		if( isset($text_font_weight) && $text_font_weight != '' ) { $text_font_weight = 'font-weight:'.$text_font_weight.';'; 
		} else { $text_font_weight = ''; }
		// Separator Color
		if( isset($separator_color) && $separator_color != '' ) { $separator_color = $separator_color;
		} else { $separator_color = ''; }
		// Text Transform 
		if( isset($text_transform) && $text_transform != '' ) { $text_transform = 'text-transform:'.$text_transform.';'; 
		} else { $text_transform = ''; }
		// Separator yes/no
		if( $separator == 'yes' ) { 
			$separator_html = '<span class="separator small" style="background:'.$separator_color.'"></span>';
			$count_down_value_height = '';
		} else { 
			$separator_html = '';
			$count_down_value_height = 'height: 90px;'; 
		}
		
		$return  = '<div class="funact-main-div sc-funact text-white">
		  <span class="timer counter-select-number" data-to="'.$digit.'" data-speed="10000" style="'.$font_color.''.$count_down_value_height.''.$font_weight.'"></span>
		 '.$separator_html.'
		  <p class="counter-sc-text" style="'.$text_color.''.$text_font_weight.''.$text_transform.'">'.$text.'</p>
		</div>';
		
		return $return;
	}
}
add_shortcode('manual_theme_counter', 'manual_theme_counter');


// OUR TEAM
if(!function_exists("manual_our_team")){
	function manual_our_team( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"team_image"       => "",
			"team_name"        => "",
			"name_color"       => "",
			"team_position"    => "",
			"position_color"   => "",
			"show_separator"   => "",
			"separator_color"  => "",
			"icons_color"      => "",
			// social - 1
			"team_social_icon_1"         => "",
			"team_social_icon_1_link"    => "",
			"team_social_icon_1_target"  => "",
			// social - 2
			"team_social_icon_2"         => "",
			"team_social_icon_2_link"    => "",
			"team_social_icon_2_target"  => "",
			// social - 3
			"team_social_icon_3"         => "",
			"team_social_icon_3_link"    => "",
			"team_social_icon_3_target"  => "",
			// social - 4
			"team_social_icon_4"         => "",
			"team_social_icon_4_link"    => "",
			"team_social_icon_4_target"  => "",
		), $atts ) );
		
		
		if (is_numeric($team_image) && isset($team_image)) {
			$image_src = wp_get_attachment_url($team_image);
		} else {
			$image_src = trailingslashit( get_template_directory_uri() ). 'img/team-blank.png';
		}
		if( $show_separator == 'yes' ) {
			$seprator = '<div class="separator" style="background-color:'.$separator_color.'"></div>';
		} else {
			$seprator = '<div class="no-separator"></div>';
		}
		
$return = '<div class="manual_team">
		  <div class="manual_team_inner">
			<div class="manual_team_image"><img src="'.$image_src.'" alt=""></div>
			<div class="manual_team_text" style="padding-top:0px;">
				<div class="manual_team_title_holder">
				<h3 class="manual_team_name" style="color:'.$name_color.'!important;">'.$team_name.'</h3>
				<span style="color:'.$position_color.';">'.$team_position.'</span> '.$seprator.'
					<div class="team_social_holder">
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_1_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_1.' simple_social" style="color:'.$icons_color.';"></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_2_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_2.' simple_social" style="color:'.$icons_color.';"></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_3_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_3.' simple_social" style="color:'.$icons_color.';"></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_4_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_4.' simple_social" style="color:'.$icons_color.';"></i></a></span>
					</div>
				</div>
			</div>
		  </div>
		</div>';
		
		return $return;
	}
}
add_shortcode('manual_our_team', 'manual_our_team');



// TESTIMONIALS
if(!function_exists("manual_theme_testimonials")){
	function manual_theme_testimonials( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"number"                  => "",
			"order_by"                => "",
			"order"                   => "",
			"text_color"              => "",
			"author_text_font_weight" => "",
			"author_text_color"       => "",
			"custom_font_size"        => "",
		), $atts ) );
		
		if( isset($number) && $number != '' ) $number = $number;
		else $number = '-1';
		
		if( isset($order_by) && $order_by != '' ) $order_by = $order_by;
		else $order_by = 'menu_order';
		
		if( isset($order) && $order != '' ) $order = $order;
		else $order = 'DESC';
		
		$return = '<style>.vc_sc_testo .owl-page span{ background:'.$text_color.'!important;}</style>';
		$return .= '<div class="home-testo-desk vc_sc_testo">'; 	
		$args = array(
						'post_type' => 'manual_tmal_block',
						'posts_per_page' => $number,
						'orderby' => $order_by,
						'post_status' => 'publish',
						'order' => $order,
					);
			$wp_query = new WP_Query($args);
			if($wp_query->have_posts()) {
				$i = 0;
				while($wp_query->have_posts()) { $wp_query->the_post();
				$return .= '<div class="testimonial text-center"><div class="testimonial-text">
						<div class="testimonial-quote">
							<p class="textmsg" style="color:'.$text_color.';font-size:'.$custom_font_size.';">
							'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_text', true ).'
							</p>
						</div>
						<div class="testimonial-cite" style="font-weight:'.$author_text_font_weight.';color:'.$author_text_color.';">'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_name', true ).'</div>
					 </div></div>';
				}
			} 
		wp_reset_postdata(); 
		$return .= '</div>';
		
		return $return;
	}
}
add_shortcode('manual_theme_testimonials', 'manual_theme_testimonials');



// ICON TEXT
if(!function_exists("manual_theme_icon_text")){
	function manual_theme_icon_text( $atts, $content = null ) {
		$link_html = '';
		$a_open  = '';
		$a_close = '';
		extract( shortcode_atts( array( 
			"icon_name"  => "",
			"title"      => "",
			"text"      => "",
			"use_custom_icon_size" => "",
			"custom_icon_size" => "",
			"text_color" => "",
			"title_font_weight" => "",
			"title_color" => "",
			"icon_color" => "",
			"display_icon_position" => "",
			"display_icon_top_margin" => "",
			"activate_link" => "",
			"link_icon" => "",
			"link"     => "",
			"link_color"  => "",
			"custom_top_margin_maintext_and_text"  => "",
			"custom_icon_margin"  => "",
			"title_font_size"  => "",
			"title_font_transform"  => "",
			
		), $atts ) );

		
		if( $use_custom_icon_size == "yes" ) {
			$new_custom_icon_size = $custom_icon_size.'px';
		} else {
			$new_custom_icon_size = '';
		}
		
		if( $display_icon_position == 'left' || $display_icon_position == 'left_from_title' ) { 
			$icon_position_class = '';
		} else if( $display_icon_position == 'top' ) { 
			$icon_position_class = 'top';
			$display_icon_top_margin = $display_icon_top_margin;
		} else {
			$display_icon_top_margin = '';
			$icon_position_class = '';
		}
		
		// activate link
		if( $activate_link == 'yes' ) {
			$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
			if( $link_icon == 'yes' ) {
				$a_open  = '<a href="'.$link['url'].'" target="'.$link['target'].'">';
				$a_close = '</a>';
			} else {  
				if( $link_icon == 'both' ) {
					$a_open  = '<a href="'.$link['url'].'" target="'.$link['target'].'">';
					$a_close = '</a>';
				}
				if( isset($link['title']) && $link['title'] != '' ) { 
					$link_html = '<p style="padding-top:10px;font-size:13px;text-transform: capitalize;letter-spacing: 0.6px;"> <a href="'.$link['url'].'" class="custom-link hvr-icon-wobble-horizontal" style="color:'.$link_color.'!important;" target="'.$link['target'].'">'.$link['title'].'</a> </p>';
				} else {  
					$link_html = '';
				}
			}
		}

		
if( $display_icon_position == 'left_from_title' ) { 
	$return = '<div class="manual_icon_with_title">
	  
	  <div class="icon_holder '.$icon_position_class.' " style="margin-bottom:'.$display_icon_top_margin.'px;width: 100%;display: -webkit-box;">
		'.$a_open.'<span class=""><i class="'.$icon_name.'" style="font-size:'.$new_custom_icon_size.'; color:'.$icon_color.';padding: 0 20px 0 0;"></i></span>'.$a_close.'
		<h5 style="font-weight:'.$title_font_weight.'!important;color:'.$title_color.'!important;font-size:'.$title_font_size.'px!important;text-transform:'.$title_font_transform.'!important;">'.$title.'</h5>
	  </div>
	  
	  <div class="icon_text_holder '.$icon_position_class.'" style="padding:0px;padding-top:10px; clear: both;">
		<div class="icon_text_inner" style="margin-top:'.$custom_top_margin_maintext_and_text.'px;">
		  <p class="desc" style="color:'.$text_color.';">'.$text.'</p>
		  '.$link_html.'
		</div>
	  </div>
	  
	</div>';
		
} else {
	
	if( $display_icon_position == 'left' ) $custom_icon_margin_left = $custom_icon_margin;
	else $custom_icon_margin_left = '';
	
	$return = '<div class="manual_icon_with_title">
	  
	  <div class="icon_holder '.$icon_position_class.' " style="margin-bottom:'.$display_icon_top_margin.'px;">
	  '.$a_open.'<span class=""><i class="'.$icon_name.'" style="font-size:'.$new_custom_icon_size.'; color:'.$icon_color.';"></i></span>'.$a_close.'
	  </div>
	  
	  <div class="icon_text_holder '.$icon_position_class.'" style="padding-left:'.$custom_icon_margin_left.'px;">
		<div class="icon_text_inner">
		  <h5 style="font-weight:'.$title_font_weight.'!important;color:'.$title_color.'!important;font-size:'.$title_font_size.'px!important;text-transform:'.$title_font_transform.'!important;">'.$title.'</h5>
		  <p class="desc" style="color:'.$text_color.';margin-top:'.$custom_top_margin_maintext_and_text.'px;">'.$text.'</p>
		  '.$link_html.'
		</div>
	  </div>
	  
	</div>';
}


		return $return;
	}
}
add_shortcode('manual_theme_icon_text', 'manual_theme_icon_text');





// KNOWLEDGEBASE
if(!function_exists("manual_theme_all_knowledgebase")){  
	function manual_theme_all_knowledgebase( $atts, $content = null ) {
	global $theme_options;	
	
		extract( shortcode_atts( array( 
			"knowledgebase_shortcode_name"  => "",
			"knowledgebase_column"  => "",
			
		), $atts ) );
		
		// knowledgebase column  
		if( $knowledgebase_column == 4 ) {
			$class = 'masonry-grid';
			$col_md = 4;
		} else if( $knowledgebase_column == 6 ) {
			$class = 'masonry-grid-without-sidebar';
			$col_md = 6;
		} else {
			$class = 'masonry-grid';
			$col_md = 4;
		}
		
		// main code
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
		$return = '<div class="'.$class.'">';
		
	    $i = 1;
	    foreach ($tax_terms as $tax_term) { 
	    $return .= '<div class="col-md-'.$col_md.' col-sm-12 masonry-item body-content"> 
				  <div class="knowledgebase-body"><h5>
				  <a href="'.esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')).'">'; 
	    
         $cat_title = $tax_term->name; 
         $return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
         $return .= '</a> 
                     </h5>
                     <span class="separator small"></span>
                     <ul class="kbse">';
					 
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
		 foreach( $st_cat_posts as $post ) : 
         $return .= '<li class="cat inner"> <a href="'. get_permalink($post->ID).'">';
		 $org_title = $post->post_title; 
		 $return .= html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
         $return .= '</a> </li>';
         endforeach;
		 wp_reset_postdata(); 
         $return .= '</ul>
              <div style="padding:10px 0px;"> <a href="'. esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')).'" class="custom-link hvr-icon-wobble-horizontal kblnk" >
               '. esc_html__( 'view all', 'manual' ).'
               '. $tax_term->count.' </a></div>
            </div>
          </div>';
         $i++; }
		 $return .= '</div>';
		// Eof main code
		return $return;
		
	}
}
add_shortcode('manual_theme_all_knowledgebase', 'manual_theme_all_knowledgebase');




// KB CATEGORY
if(!function_exists("manual_theme_kb_category")){
	function manual_theme_kb_category( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"kb_category_title"            => "",
			"kb_category_show_post_count"  => "",
			"count_text_color"   => "",
			"count_bg_color"   => "",
		), $atts ) );
		
		$categories = get_categories('taxonomy=manualknowledgebasecat&post_type=manual_kb');
		$return = '<div class="vc_kb_cat_sc sidebar-nav sidebar-widget widget_kb_cat_widget"><div class="display-faq-section">';
		$return .= '<h5 class="widget-title widget-custom" style="margin-bottom: 25px;"><span>' . $kb_category_title . '</span></h5>';
		foreach ($categories as $category) {
			$category_link = get_category_link( $category->term_id );
			$return .= '<ul>';
			$return .= '<li><a href="'. esc_url($category_link) .'">'. $category->name .'</a> ' ;
			if( $kb_category_show_post_count == 'true' ) { $return .= '<span class="kb_cat_post_count" style="color:'.$count_text_color.';background:'.$count_bg_color.';">'.$category->count.'</span>'; }
			$return .= '</li></ul>';
		}
		wp_reset_postdata();
		$return .= '</div></div>';
		return $return;
	}
}
add_shortcode('manual_theme_kb_category', 'manual_theme_kb_category');




// KB POPULAR ARTICLE
if(!function_exists("manual_theme_kb_popular_article")){
	function manual_theme_kb_popular_article( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"title"   => "",
			"knowledgebase_article_display_type"   => "",
			"knowledgebase_article_number"   => "",
			"knowledgebase_article_order"   => "",
		), $atts ) );
		//print_r($atts);
		$return = '<div class="vc_kb_article_type sidebar-nav sidebar-widget widget_kb_cat_widget"><div class="display-faq-section">';
		$return .= '<h5 class="widget-title widget-custom" style="margin-bottom: 25px;"><span>' . $title . '</span></h5>';
		
		$args = '';
		if( $knowledgebase_article_display_type == 1 ) { // Latest Article
			$args = array( 
						'posts_per_page' => $knowledgebase_article_number, 
						'post_type'  => 'manual_kb',
						'orderby' => 'date',
						'order'	=>	$knowledgebase_article_order,
					);
		} else if( $knowledgebase_article_display_type == 2 ) { // Popular Article
			$args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'manual_kb',
							'orderby' => 'meta_value',
							'order'	=>	$knowledgebase_article_order,
							'meta_key' => 'manual_post_visitors'
						);
		} else if( $knowledgebase_article_display_type == 3 ) { // Top Rated Article
			$args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'manual_kb',
							'orderby' => 'meta_value',
							'order'	=>	$knowledgebase_article_order,
							'meta_key' => 'votes_count_doc_manual'
						);
		} else if( $knowledgebase_article_display_type == 4 ) { // Most Commented Article
			$args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'manual_kb',
							'orderby' => 'comment_count',
							'order'	=>	$knowledgebase_article_order,
						);
						
		} else { // Default latest
			$args = array( 
						'posts_per_page' => $knowledgebase_article_number, 
						'post_type'  => 'manual_kb',
						'orderby' => 'date',
						'order'	=>	$knowledgebase_article_order,
					);
		}
		
		$query = new WP_Query($args);
		$return .= '<ul class="clearfix">';
		if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
		$return .= '<li class="articles"><a href="'.get_permalink($query->post->ID).'" rel="bookmark">'.get_the_title($query->post->ID).'</a></li>';
		endwhile; endif;
		$return .= '</ul>'; 
		wp_reset_query();
		$return .= '</div></div>';

		return $return;
	}
}
add_shortcode('manual_theme_kb_popular_article', 'manual_theme_kb_popular_article');




// HOME HELP BLOCKS
if(!function_exists("manual_theme_home_help_blocks")){
	function manual_theme_home_help_blocks( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"title"   => "",
		), $atts ) );
		
		$return = '<div class="loop-help-desk">';
        $args = array(
	 				'post_type' => 'manual_hp_block',
					'posts_per_page' => '-1',
					'orderby' => 'menu_order',
					'post_status' => 'publish',
					'order' => 'ASC'
				);
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) {
		while($wp_query->have_posts()) { $wp_query->the_post(); 
         $return .= '<a href="'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_link', true ).'">
		   <div class="vc-help-blocks counter-text hvr-float">
              <div class="browse-help-desk">
                <div class="browse-help-desk-div"> <i class="'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_icon', true ).' i-fa"></i> </div>
                <div class="m-and-p">
                  <h5>'.get_the_title($wp_query->post->ID).'</h5>
                  <p>'. get_post_meta( $wp_query->post->ID, '_manual_hpblock_text', true ).'</p>';
				
				if( get_post_meta( $wp_query->post->ID, '_manual_hpblock_link_text', true ) != '' ) { 
					 $return .= '<p class="padding"><span class="custom-link hvr-icon-wobble-horizontal" style="letter-spacing:1px;">'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_link_text', true ).'</span></p>';
				} else {  
				   if( get_post_meta( $wp_query->post->ID, '_manual_hpblock_link', true ) != '' ) {
					   $return .= '<p class="padding"><span class="custom-link hvr-icon-wobble-horizontal" style="letter-spacing:1px;">Browse&nbsp;'.get_the_title($wp_query->post->ID).'</span></p>';
					} 
				}
                $return .= '</div>
              </div>
            </div></a>';
		}
		} 
		wp_reset_query();
		$return .= '</div>';
		return $return;
	}
}
add_shortcode('manual_theme_home_help_blocks', 'manual_theme_home_help_blocks');




// PORTFOLIO LIST
if(!function_exists("manual_theme_portfolio_sc")){
	function manual_theme_portfolio_sc( $atts, $content = null ) {
		global $post;
		extract( shortcode_atts( array( 
			"title"                      => "",
			"portfolio_order"            => "DESC",
			"number_of_post"             => "",
			"portfolio_order_by"         => "date",
			"portfolio_column"           => "3",
			"portfolio_type"             => "",
			"portfolio_shorting"         => "no",
			"shorting_link_color"        => "",
			"shorting_link_border_color" => "",
			"filter_align"               => "left",
			"filter_padding"             => "",
			"link_color"                 => "",
			"link_cat_color"             => "",
			"selected_projects"          => "",
			"category"                   => "",
			"sorting_order"              => "ASC",
			"sorting_order_by"           => "name",
			"show_categories"            => "yes",
			"show_load_more"        	 => "yes",
			"show_load_more_align"       => "",
			"show_load_more_margin"      => "",
			
		), $atts ) );
		

		if( isset($portfolio_type) && $portfolio_type != '') {
			if( $portfolio_type == 'FitRows' ) {
				$portfolio_type_class = 'isotope-container';
				$image_handler_size = 'portfolio-FitRows';
				if( $portfolio_shorting == 'yes' ) {
					$portfolio_filter_type_class = 'filter-portfolio-group';
					$portfolio_data_filter_li = 'data-filter';
				}
			} else {
				$portfolio_type_class = 'isotope-container-masnory';
				$image_handler_size = 'large';
				if( $portfolio_shorting == 'yes' ) {
					$portfolio_filter_type_class = 'filter-portfolio-group-masnory';
					$portfolio_data_filter_li = 'data-filter-masnory';
				}
			}
		} else {
			$portfolio_type_class = 'isotope-container-masnory';
			$image_handler_size = 'large';
			if( $portfolio_shorting == 'yes' ) {
				$portfolio_filter_type_class = 'filter-portfolio-group-masnory';
				$portfolio_data_filter_li = 'data-filter-masnory';
			}
		}
		
		$return = '<span></span>';
		if( isset($portfolio_shorting) && $portfolio_shorting != '' && $portfolio_shorting == 'yes') {
			
			if( isset($filter_padding) && !empty($filter_padding) ) $filter_padding = $filter_padding;
			else $filter_padding = '50px';
			
			if( !empty($shorting_link_border_color) ) { 
				$readjust_border_color = 'border-bottom: 1px solid '.$shorting_link_border_color.'';
			} else {
				$readjust_border_color = '';
			}
			
			if( !empty($filter_align) ) {
				if( $filter_align == 'left' ) $filter_padding_align_li = 'padding:10px 18px 10px 0px;';
				else if( $filter_align == 'center' ) $filter_padding_align_li = 'padding: 10px 10px;';
				else if( $filter_align == 'right' ) $filter_padding_align_li = 'padding: 10px 0px 10px 18px;';
			}
			
			// cat names 
			$cat_slug_name = array();
			if( !empty($category) ) {
				$category = preg_replace('/\s+/', '', $category);
				$cat_slug_name = explode(",", $category);
			}
					
			$args = array(
				'hide_empty'    => 1,
				'child_of' 		=> 0,
				'pad_counts' 	=> 1,
				'hierarchical'	=> 1,
				'order'         => $sorting_order,
				'orderby'       => $sorting_order_by,
			); 
			$tax_terms = get_terms('manualportfoliocategory', $args);
			$tax_terms = wp_list_filter($tax_terms,array('parent'=>0));
			
			if( ! empty($tax_terms) ) { 
				$return .= '<div class="portfolio-start-display-section" style="padding: '.$filter_padding.' 0px;">
							<div class="portfolio-filter portfolio-list-divider '.$portfolio_filter_type_class.'" style="text-align:'.$filter_align.'">
							<ul>';
				$return .= '<li style="'.$filter_padding_align_li.'" '.$portfolio_data_filter_li.'="*" class="selected"><span style="'.$readjust_border_color.';color:'.$shorting_link_color.'">All</span></li>';
				$i = 1;
				foreach ($tax_terms as $tax_term) { 
					 if ( !empty($cat_slug_name) && !in_array( trim($tax_term->slug), $cat_slug_name ) ) continue;
					 $cat_title = $tax_term->name; 
					 $cat_title = html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
					 $cat_title_filter = strtolower($cat_title);
					 $cat_title_filter = preg_replace("/[\s_]/", "-", $cat_title_filter);
					 $return .= ' <li style="'.$filter_padding_align_li.'" '.$portfolio_data_filter_li.'=".'.strtolower($cat_title_filter).'"><span style="'.$readjust_border_color.';color:'.$shorting_link_color.'">'.$cat_title.'</span></li> ';
				 } 
				$return .= '</ul></div></div>';
			} 
		}
		
		if( isset($number_of_post) && $number_of_post != '' ) $number_of_post = $number_of_post;
		else $number_of_post = '-1';
		
		$return .= '<div class="portfolio-readjust-container">';	
		$term_slug = get_query_var( 'term' );
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		if ($category == "") {
				$args = array(
	 				'post_type' => 'manual_portfolio',
					'posts_per_page' => $number_of_post,
					'orderby' => $portfolio_order_by,
					'post_status' => 'publish',
					'order' => $portfolio_order,
					'paged' => $paged,
				);
		} else {
				$args = array(
	 				'post_type' => 'manual_portfolio',
					'manualportfoliocategory' => $category,
					'posts_per_page' => $number_of_post,
					'orderby' => $portfolio_order_by,
					'post_status' => 'publish',
					'order' => $portfolio_order,
					'paged' => $paged,
				);
		}
		
		$project_ids = null;
		if ($selected_projects != "") {
			$project_ids = explode(",", $selected_projects);
			$args['post__in'] = $project_ids;
		}
				
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) {
			$return .= '<div class="projects_holder '.$portfolio_type_class.'" style="margin:0px -15px;">';
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
							$out[] = $term->name;
							$data_category[] = $term->name;
						}
					}
				}
				$return .= '<div class="col-md-'.$portfolio_column.' col-sm-6 element-item portfolio-section-records ';
				foreach( $data_category as $val ) { $return .=  preg_replace("/[\s_]/", "-", strtolower($val)).' '; }
				$return .= '">';
				$return .= '<div class="portfolio-image">';
				$return .= '<a href="'. ($cutom_redirect_url?$cutom_redirect_url:get_permalink($wp_query->post->ID)) .'"> ';
				if ( has_post_thumbnail()) { 
					$return .= get_the_post_thumbnail( $wp_query->post->ID, $image_handler_size, array( 'class' => 'hvr-float' ) );
				} else {
				$return .= '<img width="825" height="510" src="'. trailingslashit( get_template_directory_uri() ).'img/blank-portfolio.jpg" class="hvr-float wp-post-image">';
				}
				$return .= '</a></div>
						    <div class="portfolio-desc">
						    <h3><a href="'. ($cutom_redirect_url?$cutom_redirect_url:get_permalink($wp_query->post->ID)) .'" style="color:'.$link_color.'!important;">';
							$title = get_the_title(); 
							$return .= html_entity_decode($title, ENT_QUOTES, "UTF-8");
						
				$return .= '</a></h3>';
				if( $show_categories == 'yes' ) $return .= '<span style="color:'.$link_cat_color.'">'. implode(', ', $out ).' </span>';
				$return .= '</div></div>';
                    
			 endwhile;
			 
			 	$i = 1;
                while ($i <= $portfolio_column) {
                    $i++;
                    if ($portfolio_column != 1) {
                        $return .= "<div class='filler'></div>\n";
                    }
                }
				
			  $return .= '</div>';
             
		} else {
			$return .= '<p> '. esc_html__('Sorry, no posts matched your criteria.', 'manual') .'</p>';
		}
		$return .= '</div>';
		
		if ($show_load_more == "yes" && $wp_query->max_num_pages > 1 ) { 
		if ($show_load_more == "yes" || $show_load_more == "") {
			
			if( isset($show_load_more_margin) && $show_load_more_margin != '' ) $show_load_more_margin = $show_load_more_margin;
			else $show_load_more_margin = '20px';
		
			$return .= '<div style="text-align:'.$show_load_more_align.'; margin: '.$show_load_more_margin.' 0px;" class="portfolio_paging"><span rel="' . $wp_query->max_num_pages . '" class="ajax_load_more_post load_more custom-botton hvr-icon-spin">' . get_next_posts_link(esc_html__('Show more', 'manual'), $wp_query->max_num_pages) . '&nbsp;</span></div>';
			$return .= '<div style="text-align:'.$show_load_more_align.'; margin: '.$show_load_more_margin.' 0px;" class="portfolio_paging_loading load_more "><a href="javascript: void(0)" class="qbutton custom-botton">'.__('Loading...', 'manual').'</a></div>';
		
		}
		}
		
		
		wp_reset_query();
		
		return $return;
	}
}
add_shortcode('manual_theme_portfolio_sc', 'manual_theme_portfolio_sc');




if(!function_exists("manual_theme_monitor_frame_portfolio")){
	function manual_theme_monitor_frame_portfolio( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			"title"      => "",
			"link"       => "#",
			"portfoio_image"  => "",
		), $atts ) );
		
		
		if (is_numeric($portfoio_image) && isset($portfoio_image)) {
			$image_src = wp_get_attachment_url($portfoio_image);
		} else {
			$image_src = trailingslashit( get_template_directory_uri() ). 'img/no-portfolio-img.jpg';
		}
		
		
		$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
		if( isset($link['target']) && $link['target'] != ''  ) { 
			$add_parm = 'target="_blank"';
		} else { 
			$add_parm = '';
		}
				
		$return  = '<div class="monitor_frame_main_div mix hvr-bob">
					<img class="monitor_frame" alt="frame" src="'.trailingslashit( get_template_directory_uri() ).'/img/monitor_frame.png">';
					
		$return  .= '<div class="item_holder slide_up">';
						
						if( $link['title'] != ''  ) {
		
						$return  .= '<div class="portfolio_title_holder hvr-bubble-top">
										<h5 class="portfolio_title"><a href="'.$link['url'].'" style="font-size: 12px" '.$add_parm.'>'.$link['title'].'</a></h5>
									</div>';
						}
						
						$return  .= '<a class="portfolio_link_class" href="'.$link['url'].'" '.$add_parm.'></a> 
						<div class="portfolio_shader"></div>
						
						<div class="image_holder">
							<span class="image"><img src="'.$image_src.'"></span>
						</div>';
					
		$return  .= '</div></div>';
		
		
		return $return;
		
	}
}
add_shortcode('manual_theme_monitor_frame_portfolio', 'manual_theme_monitor_frame_portfolio');



if(!function_exists("manual_theme_single_cat_knowledgebase")){
	function manual_theme_single_cat_knowledgebase( $atts, $content = null ) {
		global $post;
		extract( shortcode_atts( array( 
			"page_per_post"   => "",
			"post_order"   => "",
			"post_orderby" => "",
			"include_child_post" => "",
			"kbsinglecatid"   => "",
		), $atts ) );
		
		
		if( $page_per_post != '' ) $page_per_post = $page_per_post;
		else $page_per_post = '-1';
		
		if( $post_order != '' ) $post_order = $post_order;
		else $post_order = 'DESC';
		
		if( $post_orderby != '' ) $post_orderby = $post_orderby;
		else $post_orderby = 'none';
		
		if( $include_child_post != '' && $include_child_post == 'yes' ) $include_child_post = true;
		else if( $include_child_post != '' && $include_child_post == 'no' ) $include_child_post = false;
		else $include_child_post = true;
		
		$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
		$args = array( 
			'posts_per_page' => $page_per_post, 
			'paged' => $paged,
			'post_type'  => 'manual_kb',
			'orderby' => $post_orderby,
			'order'  => $post_order,
			'tax_query' => array(
				array(
					'taxonomy' => 'manualknowledgebasecat',
					'field' => 'id',
					'include_children' => $include_child_post,
					'terms' => $kbsinglecatid
				)
			)
		 );
		
		
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
		
			$return = '<div style="clear:both" class="knowledgebase-cat-body sc-kb-single">';
			
			 while ( $the_query->have_posts() ) : $the_query->the_post();
			 
			   $return .= '<div class="kb-box-single">
							   <h2><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h2>
							   <p style="font-size: 14px; margin-bottom: 20px;"><i class="fa fa-eye"></i>&nbsp;<span>'; 
							   
									if( get_post_meta( $post->ID, 'manual_post_visitors', true ) != '' ) { 
										$return .= get_post_meta( $post->ID, 'manual_post_visitors', true ). '&nbsp;views ';
									} else { $return .= '0 views'; }
								   
								   $return .= '</span><i class="fa fa-calendar"></i> <span>'.get_the_time( get_option('date_format') ).'</span>
								   <i class="fa fa-user"></i>  <span>'.get_the_author().'</span>
								   <i class="fa fa-thumbs-o-up"></i> <span>';
								   
								   if( get_post_meta( $post->ID, 'votes_count_doc_manual', true ) == '' ) { $return .= 0; } else { $return .=  get_post_meta( $post->ID, 'votes_count_doc_manual', true ); }
								   
								   $return .= '</span>
							   </p>
						   </div>';
			
			
			 endwhile;
			
		}
		
		// pagination here 
        $return .= '<div class="vc_sc_kb_single_cat">
						<ul class="pagination">
							<li class="vc_sc_kb_single_cat_page">'. get_next_posts_link( 'Next Page', $the_query->max_num_pages ).'</li>
							<li class="vc_sc_kb_single_cat_page">'. get_previous_posts_link( 'Previous Page' ).'</li>
						</ul>
					</div>';
		
		wp_reset_postdata(); 
		$return .= '</div>';
		
		return $return;
	}
}
add_shortcode('manual_theme_single_cat_knowledgebase', 'manual_theme_single_cat_knowledgebase');



if(!function_exists("manual_theme_vc_custom_group_cat_knowledgebase")){
	function manual_theme_vc_custom_group_cat_knowledgebase( $atts, $content = null ) {
		global $post;
		extract( shortcode_atts( array( 
			"category_order"   => "",
			"category_orderby"   => "",
			"category_page_order"   => "",
			"category_page_orderby"   => "",
			"kb_column_type"   => "",
			"kb_disable_customcat_masonry"   => "",
			"kb_post_under_category"   => "",
			"kbgroupcatid"   => "",
		), $atts ) );
		
		if( $kb_disable_customcat_masonry == true ) $add_masonry_grid_call_name = 1;
		else $add_masonry_grid_call_name = '';
		
		// column type
		if( $kb_column_type != '' && $kb_column_type == 6 ) {
			$masonry_grid_call = 'masonry-vc-grid-six'.$add_masonry_grid_call_name;
			$kb_column_value = $kb_column_type;
		} else if( $kb_column_type != '' && $kb_column_type == 4 ) {
			$masonry_grid_call = 'masonry-vc-grid-four'.$add_masonry_grid_call_name;
			$kb_column_value = $kb_column_type;
		} else {
			$masonry_grid_call = 'masonry-vc-grid-four'.$add_masonry_grid_call_name;
			$kb_column_value = 4;
		}
		
		// number of post
		if( $kb_post_under_category != '' ) {
			$no_of_post_under_cat = $kb_post_under_category;
		} else {
			$no_of_post_under_cat = 6;
		}
		
		// Cat Order
		if( $category_order != '' ) $cat_order = $category_order;
		else $cat_order = 'DESC';
		
		if( $category_orderby != '' ) $cat_orderby = $category_orderby;
		else $cat_orderby = 'none';
		
		
		// Page Order
		if( $category_page_order != '' ) $post_order = $category_page_order;
		else $post_order = 'DESC';
		
		if( $category_page_orderby != '' ) $post_orderby = $category_page_orderby;
		else $post_orderby = 'none';
		
		
		$kb_catIDs = explode(',', $kbgroupcatid); 
		
		$args = array(
			'hide_empty'    => 1,
			'child_of' 		=> 0,
			'pad_counts' 	=> 1,
			'hierarchical'	=> 1,
			'order'         => $cat_order,
			'orderby'       => $cat_orderby,
		); 
		$tax_terms = get_terms('manualknowledgebasecat', $args);
		$i = 1;
		$return = '<div class=" '.$masonry_grid_call.' body-content">';
		foreach ($tax_terms as $tax_term) { 
			
			if (in_array( $tax_term->term_id, $kb_catIDs)) {
				$return .= '<div class="col-md-'.$kb_column_value.' masonry-item"><div class="knowledgebase-body">';
				$return .= '<h5><a href="'. esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')) .'">';
				$cat_title = $tax_term->name; 
			    $return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
				$return .= '</a> </h5> <span class="separator small"></span><ul class="kbse">';
				
				$args = array( 
				'post_type'  => 'manual_kb',
				'posts_per_page'   => $no_of_post_under_cat,
				'orderby' => $post_orderby,
				'order'  => $post_order,
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
				foreach( $st_cat_posts as $post ) { 
                    $return .= '<li class="cat inner"> <a href="'.get_permalink().'">';
				    $org_title = get_the_title(); 
			        $return .=  html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
					$return .= '</a> </li>';
				}
				$return .= '</ul><div style="padding:10px 0px;"> <a href="'. esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')).'" class="custom-link hvr-icon-wobble-horizontal kblnk" >'. esc_html__( 'View All', 'manual' ) .' '. $tax_term->count .' </a></div>';
				$return .= '</div></div>';
				
			} else {
				continue;	
			}
			
		$i++; }
		wp_reset_postdata();
  		$return .= '</div></div>';
		return $return;
	}
}
add_shortcode('manual_theme_vc_custom_group_cat_knowledgebase', 'manual_theme_vc_custom_group_cat_knowledgebase');




// FAQ CATEGORY
if(!function_exists("manual_theme_faq_category")){
	function manual_theme_faq_category( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"faq_category_title"  => "",
			"faq_category_show_post_count"  => "",
			"count_text_color"  => "",
			"count_bg_color"  => "",
		), $atts ) );
		
		$categories = get_categories('taxonomy=manualfaqcategory&post_type=manual_faq');
		$return = '<div class="vc_kb_cat_sc sidebar-nav sidebar-widget widget_kb_cat_widget"><div class="display-faq-section">';
		$return .= '<h5 class="widget-title widget-custom" style="margin-bottom: 25px;"><span>' . $faq_category_title . '</span></h5>';
		foreach ($categories as $category) {
			$category_link = get_category_link( $category->term_id );
			$return .= '<ul>';
			$return .= '<li><a href="'. esc_url($category_link) .'">'. $category->name .'</a> ' ;
			if( $faq_category_show_post_count == 'true' ) { $return .= '<span class="kb_cat_post_count" style="color:'.$count_text_color.';background:'.$count_bg_color.';">'.$category->count.'</span>'; }
			$return .= '</li></ul>';
		}
		wp_reset_postdata();
		$return .= '</div></div>';
		return $return;
	}
}
add_shortcode('manual_theme_faq_category', 'manual_theme_faq_category');



// FAQ SINGLE CATEGORY ARTICLE
if(!function_exists("manual_theme_single_faq_article")){
	function manual_theme_single_faq_article( $atts, $content = null ) {
		global $post, $theme_options;
		extract( shortcode_atts( array( 
			"page_per_post"   => "",
			"post_order"   => "",
			"post_orderby" => "",
			"include_child_post" => "",
			"faqsinglecatid"   => "",
		), $atts ) );
		
		if( $page_per_post != '' ) $page_per_post = $page_per_post;
		else $page_per_post = '-1';
		
		if( $post_order != '' ) $post_order = $post_order;
		else $post_order = 'DESC';
		
		if( $post_orderby != '' ) $post_orderby = $post_orderby;
		else $post_orderby = 'none';
		
		if( $include_child_post != '' && $include_child_post == 'yes' ) $include_child_post = true;
		else if( $include_child_post != '' && $include_child_post == 'no' ) $include_child_post = false;
		else $include_child_post = true;
		
		$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
		$args = array( 
			'posts_per_page' => $page_per_post, 
			'paged' => $paged,
			'post_type'  => 'manual_faq',
			'orderby' => $post_orderby,
			'order'  => $post_order,
			'tax_query' => array(
				array(
					'taxonomy' => 'manualfaqcategory',
					'field' => 'id',
					'include_children' => $include_child_post,
					'terms' => $faqsinglecatid
				)
			)
		 );
		
		
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
		
			$return = '<div style="clear:both" class="knowledgebase-cat-body sc-kb-single">';
			
			 while ( $the_query->have_posts() ) : $the_query->the_post();
			 
			 	$content = get_the_content();
			 	$content = apply_filters('the_content', $content);
			    $content = str_replace(']]>', ']]&gt;', $content);
			 
				$return .= '<div class="body-content">
							  <div class="collapsible-panels theme-faq-cat-pg" id="'. $post->ID .'">
							  <h4 class="title-faq-cat" style="padding: 20px 0px 20px 4%;"><a href="#">'. $post->post_title .'</a></h4>
							  <div class="entry-content clearfix">
								'. $content .' ';
				$return .= '</div>
							</div></div>';
			
			 endwhile;
			
		}
		
		// pagination here 
        $return .= '<div class="vc_sc_kb_single_cat">
						<ul class="pagination">
							<li class="vc_sc_kb_single_cat_page">'. get_next_posts_link( 'Next Page', $the_query->max_num_pages ).'</li>
							<li class="vc_sc_kb_single_cat_page">'. get_previous_posts_link( 'Previous Page' ).'</li>
						</ul>
					</div>';
		
		wp_reset_postdata(); 
		$return .= '</div>';
		
		return $return;
	}
}
add_shortcode('manual_theme_single_faq_article', 'manual_theme_single_faq_article');
?>