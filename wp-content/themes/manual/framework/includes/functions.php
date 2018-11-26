<?php 
/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: BBPRESS SEARCH HACK
/*-----------------------------------------------------------------------------------*/

/**
 * Include bbPress 'topic' custom post type in WordPress' search results
 */
if (!function_exists('manual_bbp_topic_search')) { 
	function manual_bbp_topic_search( $topic_search ) {
		$topic_search['exclude_from_search'] = false;
		return $topic_search;
	}
	add_filter( 'bbp_register_topic_post_type', 'manual_bbp_topic_search' );
}

/**
 * Include bbPress 'reply' custom post type in WordPress' search results
 */
if (!function_exists('manual_bbp_reply_search')) {
	function manual_bbp_reply_search( $reply_search ) {
		$reply_search['exclude_from_search'] = false;
		return $reply_search;
	}
	add_filter( 'bbp_register_reply_post_type', 'manual_bbp_reply_search' );
}

/**
 * Include bbPress 'forum' custom post type in WordPress' search results 
 */
if (!function_exists('manual_bbp_forum_search')) {
	function manual_bbp_forum_search( $forum_search ) {
		$forum_search['exclude_from_search'] = false;
		return $forum_search;
	}
	add_filter( 'bbp_register_forum_post_type', 'manual_bbp_forum_search' );
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: BBPRESS HEADER
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_bbpress_header')) {
	function manual_bbpress_header() {
	global $theme_options;
	if( !empty($theme_options['bbpress-header-height']) ) $bbpress_height = 'padding: '.$theme_options['bbpress-header-height'].'px 0px!important;';
	else $bbpress_height = '';
		?>
        <div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break" style=" <?php echo $bbpress_height; ?> "> 
          <div class="container inner-margin-top">
            <div class="row">
              <div class="col-md-12 col-sm-12 header-text-align">
                <h1 class="inner-header bigtext" style="text-shadow:none!important;">
                    <?php  echo $theme_options['manual-forum-title']; ?>
                </h1>
               <?php if( !empty($theme_options['manual-forum-subtitle']) && bbp_is_forum_archive() ) { ?> 
               	<p class="inner-header-color"><?php  echo $theme_options['manual-forum-subtitle']; ?></p>
                <?php } ?>
                <?php 
				if( $theme_options['bbpress_breadcrumb_status'] == true ) {
					if( bbp_is_single_user() != true && !bbp_is_forum_archive() ) { ?>
                    <div id="breadcrumbs" class="forum-breadcrumbs">
                    <?php  
                        $manual_breadcrumbs_args = array(
                                'before'          => '',
                                'after'           => '',
                                'sep'             => esc_html__( '/', 'manual' ),
                                'home_text'       => esc_html__( 'Home', 'manual' ),
                                (($theme_options['bbpress_breadcrumb'] ==  true )?'':'include_root') => ( ($theme_options['bbpress_breadcrumb'] ==  true )? '' : false ),
                            );
                        bbp_breadcrumb($manual_breadcrumbs_args);
                    ?>
                    </div>
                <?php } 
				} 
				?>
                <?php if( $theme_options['bbpress_search_status'] == true ) { ?>
                <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 search-margin-top">
                  <div class="global-search">
                    <?php get_template_part( 'search-form', 'forums' ); ?>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <?php
	}
}



/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: TRENDING SEARCH
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_trending_search')) {
	function manual_trending_search() {
		global $theme_options;
		$search_keywords = array();
		if( isset($theme_options['manual-trending-live-search-status']) && $theme_options['manual-trending-live-search-status'] == true ){ 
			echo '<div class="trending-search">';
			if( isset($theme_options['manual-trending-text']) ){ echo '<span class="popular-keyword-title">'.$theme_options['manual-trending-text'].'</span>';  }  
			if( isset($theme_options['manual-three-trending-search-text']) ) {
				foreach( $theme_options['manual-three-trending-search-text'] as $val ) {
					if( empty($val) ) continue;
					$search_keywords[] = '<a href="" class="trending-search-popular-keyword">'.$val.'</a>';
				}
				echo implode('<span class="comma">,</span> ', $search_keywords );
			}
			echo '</div>';
		}
	}
}



/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: ADVANCE SEARCH
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_shFilter')) {
	function manual_shFilter($query) {  
		if( isset($_GET['post_type']) && $_GET['post_type'] != '' ) {
			if ($query->is_search){  
				$query->set('post_type', $_GET['post_type'] ); 
			} 
		}
		return $query;  
	}  
	add_filter('pre_get_posts', 'manual_shFilter'); 
}

if (!function_exists('manual_attachment_sh_clauses')) {
	function manual_attachment_sh_clauses( $pieces ) {  
		global $wp_query, $wpdb, $theme_options;
		$vars = $wp_query->query_vars;
		if ( empty( $vars ) ) {
			$vars = ( isset( $_REQUEST['query'] ) ) ? $_REQUEST['query'] : array();
		}
		
		// Rewrite the where clause
		if ( ( isset($_GET['post_type']) &&  ($_GET['post_type'] == '')   ) ) { 
		
			if( isset( $theme_options['manual-default-search-type-multi-select'] ) ) { 
				$where = $post_typeIN = '';
				$query_where = array();
				$count = 1;
				foreach ( $theme_options['manual-default-search-type-multi-select']  as $post_type ) {
					if( $count == 1 ) $comma = '';
					else $comma = ',';
					
					$post_typeIN .= "".$comma."'".$post_type."'";
					
					if( $post_type == 'attachment' ) $add_attachOR = " OR $wpdb->posts.post_status = 'inherit' ";
					else $add_attachOR = '';
					
					$count++;
				}
				$query_where[] = " AND (($wpdb->posts.post_title LIKE '%".$_GET['s']."%') OR ($wpdb->posts.post_excerpt LIKE '%".$_GET['s']."%') OR ($wpdb->posts.post_content LIKE '%".$_GET['s']."%')) AND $wpdb->posts.post_type IN ( ".$post_typeIN." ) AND ($wpdb->posts.post_status = 'publish' OR $wpdb->posts.post_status = 'closed' ".$add_attachOR.")";
				$pieces['where'] =  $query_where[0];
			}       
			
		} else if ( ( isset($_GET['post_type']) && 'attachment' == $_GET['post_type'] ) ) { 
			$pieces['where'] = " AND $wpdb->posts.post_type = 'attachment' AND $wpdb->posts.post_status = 'inherit' ";
		}
		
		return $pieces;
	}
	add_filter( 'posts_clauses', 'manual_attachment_sh_clauses');
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: DOCUMENTATION ACCESS CONTROL
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_doc_access')) {
	function manual_doc_access($check_user_role) {
		if ( is_user_logged_in() &&  $check_user_role != '' && !is_super_admin() ) {  
			$value = '';
			$check_roles = unserialize($check_user_role);
			$current_user = wp_get_current_user();
			$wp_role = $current_user->roles;
			foreach ($wp_role as $role_value => $role_name) {
				if ( in_array($role_name, $check_roles) ) {
					$value = 1;
				} else {
					continue;	
				}
			}
			if( $value == 1 ) return true;
			else return false;
		}
		return true;
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: SOCIAL SHARE CONTROL POST
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_social_share')) {
	function manual_social_share($url){
		global $theme_options;
		if( isset($theme_options['theme-social-box']) && $theme_options['theme-social-box'] == true ) {
			if( isset($theme_options['theme-social-box-mailto-subject']) ){
				$mailto = $theme_options['theme-social-box-mailto-subject'];
			} else {
				$mailto = '';
			}
			
		?>
		<div class="social-box">
		<?php 
		if( !empty($theme_options['theme-social-share-displaycrl-status']) ) {
			foreach ( $theme_options['theme-social-share-displaycrl-status'] as $key => $value ) {
				if( $key == 'linkedin' && $value == 1 ) {
					echo '<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$url.'"><i class="fa fa-linkedin social-share-box"></i></a>';
				} 
				if( $key == 'twitter' && $value == 1 ) {
					echo '<a target="_blank" href="https://twitter.com/home?status='.$url.'"><i class="fa fa-twitter social-share-box"></i></a>';
				}
				if( $key == 'facebook' && $value == 1 ) {
					echo '<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$url.'" title="facebook"><i class="fa fa-facebook social-share-box"></i></a>';
				}
				if( $key == 'pinterest' && $value == 1 ) {
					echo '<a target="_blank" href="https://pinterest.com/pin/create/button/?url='. $url .'&media=&description="><i class="fa fa-pinterest social-share-box"></i></a>';
				}
				if( $key == 'google-plus' && $value == 1 ) {
					echo '<a target="_blank" href="https://plus.google.com/share?url='.$url.'"><i class="fa fa-google-plus social-share-box"></i></a>';
				}
				if( $key == 'email' && $value == 1 ) {
					echo '<a target="_blank" href="mailto:?Subject='.$mailto.'"><i class="fa fa-envelope-o social-share-box"></i></a>';
				}
			} 
		} 
		?>
		</div>
		<?php 
		}
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: HAMBURGER MENU
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_css_hamburger_menu_control')) {
	function manual_css_hamburger_menu_control(){
		$hamburger_class = '';
		global $theme_options,$post;
		$current_post_type = get_post_type();
		if( $current_post_type == 'page' ) {
			$page_hamburger_menu = get_post_meta( $post->ID, '_manual_header_display_hamburger_bar', true );
			if( $page_hamburger_menu == true ) {
					$hamburger_class = 'hidemenu';
			} else {
				$hamburger_class = '';
			}
		} else {
			$activate_post_type = array();
			if( !empty( $theme_options['target-display-search-box-on-menu-bar'] ) ) {
			foreach ( $theme_options['target-display-search-box-on-menu-bar']  as $post_type ) {
						if( $post_type == 'manual_ourteam' ||
							$post_type == 'manual_tmal_block' ||
							$post_type == 'manual_org_block' ||
							$post_type == 'manual_hp_block'  ||
							$post_type == 'reply' ||
							$post_type == 'topic' || $post_type == 'page' ) { continue; }
							$activate_post_type[] = $post_type;
					}
			}
			if( !empty( $activate_post_type ) && in_array($current_post_type, $activate_post_type) ) {
				if( $theme_options['activate-hamburger-menu'] == true ) {
					$hamburger_class = 'hidemenu';
				} else {
					$hamburger_class = '';
				}
			}
		}
		return $hamburger_class;
	}
}


if (!function_exists('manual_hamburger_menu_control')) {
	function manual_hamburger_menu_control(){
		global $theme_options, $post;
		$current_post_type = get_post_type();
		
		if( $current_post_type == 'page' ) {
			$page_hamburger_menu = get_post_meta( $post->ID, '_manual_header_display_hamburger_bar', true );
			$page_search_on_the_menu = get_post_meta( $post->ID, '_manual_header_display_search_box_on_menu_bar', true );
			if( $page_hamburger_menu == true ) {
				echo '<div class="hamburger-menu">
						<span></span> <span></span> <span></span> <span></span>
					 </div>';
				if( $page_search_on_the_menu == true ) {
					 echo '<div class="form-group menu-bar-form col-md-offset-3">';
						$modern_search_design_header = get_post_meta( $post->ID, '_manual_header_display_search_box_modern_on_menu_bar', true );
						if( $modern_search_design_header == true ) {
							manual_nav_bar_search_normal();
						} else {
							get_template_part( 'search', 'home' );
						}
					 echo '</div>';
				}
			}
		
		} else {
			$activate_post_type = array();
			if( !empty( $theme_options['target-display-search-box-on-menu-bar'] ) ) {
			foreach ( $theme_options['target-display-search-box-on-menu-bar']  as $post_type ) {
						if( $post_type == 'manual_ourteam' ||
							$post_type == 'manual_tmal_block' ||
							$post_type == 'manual_org_block' ||
							$post_type == 'manual_hp_block'  ||
							$post_type == 'reply' ||
							$post_type == 'topic' || $post_type == 'page' ) { continue; }
							$activate_post_type[] = $post_type;
					}
			}
			if( !empty( $activate_post_type ) && in_array($current_post_type, $activate_post_type) ) {
				if( $theme_options['activate-hamburger-menu'] == true ) { 
					echo '<div class="hamburger-menu">
						<span></span> <span></span> <span></span> <span></span>
					</div>';
					
					if( $theme_options['activate-search-box-on-menu-bar'] == true ) {
						 echo '<div class="form-group menu-bar-form col-md-offset-3">';
							if( $theme_options['replace-search-design-with-modern-bar'] == true ) { 
								manual_nav_bar_search_normal();
							} else {
								get_template_part( 'search', 'home' );
							}
						 echo '</div>';
					}
				}
			}
		} // eof page
	}
}

if (!function_exists('manual_nav_bar_search_normal')) {
	function manual_nav_bar_search_normal(){
		global $theme_options;
        echo '<input type="hidden" id="oldplacvalue" value="'.$theme_options['global-search-text-paceholder'].'">
        <form role="search" method="get" id="searchform_nav" class="searchform" action="'.esc_url( home_url( '/' ) ).'">
          <div class="form-group">
            <input type="text"  placeholder="'.$theme_options['global-search-text-paceholder'].'" value="'.get_search_query().'" name="s" id="s" class="form-control header-search custom-simple-header-search" />
            <input type="hidden" value="" name="post_type" id="search_post_type">
            <input type="submit" class=" button button-custom custom-simple-search" value="&#xf002;">
          </div>
        </form>';
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: SOCIAL SHARE CONTROL FOOTER
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_footer_social_share')) {
	function manual_footer_social_share(){
	global $theme_options;
	if( isset($theme_options['footer-social-twitter']) && $theme_options['footer-social-twitter'] != ''  ) {  ?>
        <li><a href="<?php echo $theme_options['footer-social-twitter']; ?>" title="Twitter" target="_blank"><i class="fa fa-twitter social-footer-icon"></i></a></li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-facebook']) && $theme_options['footer-social-facebook'] != ''  ) {  ?>
        <li><a href="<?php echo $theme_options['footer-social-facebook']; ?>" title="Facebook" target="_blank"><i class="fa fa-facebook social-footer-icon"></i></a></li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-youtube']) && $theme_options['footer-social-youtube'] != ''  ) {  ?>
        <li><a href="<?php echo $theme_options['footer-social-youtube']; ?>" title="YouTube" target="_blank"><i class="fa fa-youtube social-footer-icon"></i></a> </li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-google']) && $theme_options['footer-social-google'] != ''  ) {  ?>
        <li><a href="<?php echo $theme_options['footer-social-google']; ?>" title="Google+" target="_blank"><i class="fa fa-google-plus social-footer-icon"></i></a></li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-instagram']) && $theme_options['footer-social-instagram'] != ''  ) {  ?>
        <li><a href="<?php echo $theme_options['footer-social-instagram']; ?>" title="Instagram" target="_blank"><i class="fa fa-instagram social-footer-icon"></i></a></li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-linkedin']) && $theme_options['footer-social-linkedin'] != ''  ) {  ?>
        <li><a href="<?php echo $theme_options['footer-social-linkedin']; ?>" title="Linkedin" target="_blank"><i class="fa fa-linkedin social-footer-icon"></i></a> </li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-pinterest']) && $theme_options['footer-social-pinterest'] != ''  ) {  ?>
        <li><a href="<?php echo $theme_options['footer-social-pinterest']; ?>" title="Pinterest" target="_blank"><i class="fa fa-pinterest social-footer-icon"></i></a> </li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-vimo']) && $theme_options['footer-social-vimo'] != ''  ) {  ?>
        <li><a href="<?php echo $theme_options['footer-social-vimo']; ?>" title="Vimo" target="_blank"><i class="fa fa-vimeo-square social-footer-icon"></i></a> </li>
        <?php } ?>
		
		<?php if( isset($theme_options['footer-social-tumblr']) && $theme_options['footer-social-tumblr'] != ''  ) {  ?>
        <li><a href="<?php echo $theme_options['footer-social-tumblr']; ?>" title="Tumblr" target="_blank"><i class="fa fa-tumblr-square social-footer-icon"></i></a> </li>
        <?php }
	}
}


/*-----------------------------------------------------------------------------------*/
/*	WOOCOMMERSE ::  REPLACE HEADER CSS
/*-----------------------------------------------------------------------------------*/
function manual_woo_shop_column_css_handler(){
	global $theme_options;
	if( $theme_options['woo_column_product_listing'] == 4  ) {
		echo '@media (max-width:767px) { .woocommerce ul.products li.product{ width: 99%; } }';
	} else if( $theme_options['woo_column_product_listing'] == 3  ) {
		echo '.woocommerce ul.products li.product{ width: 30.7%; } @media (max-width:767px) { .woocommerce ul.products li.product{ width: 99.5%; } }';
	}
}


/*******************************
 ***  VISUAL COMPOSER     ****
********************************/

/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: LOAD VC INSIDE DOCUMENTATION PAGES
/*-----------------------------------------------------------------------------------*/
add_action('wp_ajax_nopriv_display-doc-post', 'enable_vc_custom', 1);
add_action('wp_ajax_display-doc-post', 'enable_vc_custom', 1);
function enable_vc_custom(){
	global $theme_options;
	if( $theme_options['activate-vc-inside-ajax-load-page-doc'] == true ) WPBMap::addAllMappedShortcodes();
}

/*-----------------------------------------------------------------------------------*/
/*	ACTIVATE VC
/*-----------------------------------------------------------------------------------*/
if ( is_plugin_active('js_composer/js_composer.php') ) {
	
	// check the latest vc version
	if( version_compare(WPB_VC_VERSION, '5.0', '<' ) ) {
		add_action('admin_notices', 'manual_plugin_vc_update_notify');
	}
	//if(function_exists('vc_set_as_theme')) vc_set_as_theme(true);   // Activate on last
	require trailingslashit( get_template_directory() ) . 'framework/vc.php';
	require trailingslashit( get_template_directory() ) . 'framework/shortcodes.php';
	
	function manual_vc_remove_frontend_links() {
		vc_disable_frontend(); // this will disable frontend editor
	}
	add_action( 'vc_after_init', 'manual_vc_remove_frontend_links' );

}

function manual_plugin_vc_update_notify() {
?>
<div class="message" style="padding: 10px; font-size: 14px; color: #FCFCFC; color: #000000; background: white; box-shadow: 1px 1px 10px #828181;"><span style="color: #C31111; font-weight:bold;">PLEASE UPGRADE "WPBakery Visual Composer" to the new version 5.0</span> <br><br> 1. Go to: Plugins -> Installed Plugins. <br>2. <strong>DELETE plugin</strong> "WPBakery Visual Composer" for the system. <strong><i>(you must DEACTIVATE plugin first and DELETE it)</i></strong> <br> 3. <strong>Click on "Begin installing plugin"</strong>, to install new version.</span> <br><br><i>Note: No data will be loss in this upgrade process.</i> </div>
<?php 
}
?>
