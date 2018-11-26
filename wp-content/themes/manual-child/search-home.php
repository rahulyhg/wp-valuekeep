<?php global $theme_options; ?>
<input type="hidden" id="oldplacvalue" value="<?php echo $theme_options['global-search-text-paceholder']; ?>">
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <i class="fa fa-search livesearch"></i>
  <div class="form-group">
    <input type="text"  placeholder="<?php echo $theme_options['global-search-text-paceholder']; ?>" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control header-search" />
    <!--Advance Search-->
    
    <?php
	$display_on_forum_page = '';
	if( $theme_options['manual-trending-post-type-search-status-on-forum-pages'] == false ) {
		if( get_post_type() == 'forum' ) $display_on_forum_page = 1;
	} else {
		 $display_on_forum_page = 2;
	}
	if ( $theme_options['manual-trending-post-type-search-status'] == true && ($display_on_forum_page != 1) ){ 
		echo '<select class="search-expand-types" name="post_type" id="search_post_type">';
		echo ' <option value="">'.$theme_options['manual-post-type-search-text-inital'].'</option>';
		foreach ( $theme_options['manual-search-post-type-multi-select']  as $post_type ) {
			
			if( $post_type == 'manual_ourteam' ||
			   $post_type == 'manual_tmal_block' ||
			   $post_type == 'manual_org_block' ||
			   $post_type == 'manual_hp_block'  ||
			   $post_type == 'reply' ||
			   $post_type == 'topic' ) { continue; }
			   
			if( $post_type == 'attachment' ) { $new_name = $theme_options['manual-post-type-search-dropdown-media'];   
			} else if( $post_type == 'forum' ) { $new_name = $theme_options['manual-post-type-search-dropdown-forums'];   
			} else if( $post_type == 'manual_kb' ) { $new_name = $theme_options['manual-post-type-search-dropdown-kb'];    
			} else if( $post_type == 'manual_faq' ) { $new_name = $theme_options['manual-post-type-search-dropdown-faq'];    
			} else if( $post_type == 'manual_portfolio' ) { $new_name = $theme_options['manual-post-type-search-dropdown-portfolio'];    
			} else if( $post_type == 'manual_documentation' ) { $new_name = $theme_options['manual-post-type-search-dropdown-documentation']; 
			} else if( $post_type == 'page' ) { $new_name = $theme_options['manual-post-type-search-dropdown-page'];   
			} else if( $post_type == 'post' ) { $new_name = $theme_options['manual-post-type-search-dropdown-post'];   
			} else {
				$post_type_label = get_post_type_object( $post_type );
				$new_name = $post_type_label->label;
			}
			
			
			if( isset($_GET['post_type']) && $_GET['post_type'] == $post_type ) $select = 'selected';
			else $select = '';
			
			echo ' <option '.$select.' value="'. $post_type .'">' . $new_name . '</option>';
			
		}
		echo ' </select>';
	} else {
		#echo '<input type="hidden" value="" name="post_type" id="search_post_type">';
        echo '<input type="hidden" value="manual_kb" name="post_type" id="search_post_type">';
        #echo '<input type="hidden" id="search_post_type">';
	}
	?>
    <!--Eof Advance Search-->
    <input type="submit" class=" button button-custom" value="<?php esc_html_e("Search", "manual") ?>">
  </div>
</form>
<?php if (function_exists('manual_trending_search')) { manual_trending_search(); } ?>
