<?php 

class manual_Customize {

		public static function register( $wp_customize ) {
		
		} // eof register
		
		/**
		* This will output the custom WordPress settings to the live theme's WP head.
		*/
	    public static function header_output() {
		  $theme_nav_type = '';
		  global $post, $theme_options; 
		  
		  /*DEFAULT HEADER*/
		  $default_theme_header_gray_bg = $default_theme_header_bg_color = $default_theme_header_style_padding = $default_header_subtitle_clolor = $default_header_subtitle_font_size = '';
		  if( $theme_options['default-header-sytle-backgorund-image'] == true ) $default_theme_header_gray_bg = 'background-image:none;';
		  if( !empty($theme_options['default-header-sytle-background-color']) ) $default_theme_header_bg_color = 'background-color:'.$theme_options['default-header-sytle-background-color'].';';
		  if( !empty($theme_options['default-header-sytle-height']) ) $default_theme_header_style_padding = 'padding: '.$theme_options['default-header-sytle-height'].'px 0px!important;';
		  if( !empty($theme_options['default-top-header-title-color']) ) $default_header_title_clolor = 'color:'.$theme_options['default-top-header-title-color'].'!important;';
		  if( !empty($theme_options['default-top-header-subtitle-color']) ) $default_header_subtitle_clolor = 'color:'.$theme_options['default-top-header-subtitle-color'].';';
		  if( !empty($theme_options['default-header-subtitle-font-size']) ) $default_header_subtitle_font_size = 'font-size:'.$theme_options['default-header-subtitle-font-size'].'px!important;';
		  echo '<style type="text/css">.noise-break{ '.$default_theme_header_gray_bg.' '.$default_theme_header_bg_color.' '.$default_theme_header_style_padding.' }h1.inner-header{ '.$default_header_title_clolor.' font-size: '.$theme_options['default-header-title-font-size'].'px!important; text-transform:'.$theme_options['default-header-title-text-transform'].'; letter-spacing: '.$theme_options['default-header-title-font-letter-spacing'].'px; font-weight:'.$theme_options['default-header-title-font-weight'].'; }#breadcrumbs {color:'.$theme_options['default-top-header-breadcrumb-color'].'; } #breadcrumbs a{ color:'.$theme_options['default-top-header-breadcrumb-link-color']['regular'].'; } #breadcrumbs a:hover{ color:'.$theme_options['default-top-header-breadcrumb-link-color']['hover'].'; }p.inner-header-color { '.$default_header_subtitle_clolor.' '.$default_header_subtitle_font_size.'; }.header-text-align, #breadcrumbs{ text-align:'.$theme_options['default-header-text-align'].'; }#breadcrumbs{ text-transform:'.$theme_options['default-header-breadcrumb-text-transform'].'; letter-spacing: '.$theme_options['default-header-breadcrumb-letter-spacing'].'px; font-size: '.$theme_options['default-header-breadcrumb-font-size'].'px; }</style>';
				
		  
			if( is_page() ) {  
				$navstyle_type_singlepg = get_post_meta( $post->ID, '_manual_nav_style_type', true );
				if( isset($navstyle_type_singlepg) && $navstyle_type_singlepg != '' ) {
					if( $navstyle_type_singlepg == 'no_background_nav') { 
						$theme_nav_type = 1; 
					} else {
						$theme_nav_type = 2;
					}
				} else {
					if( $theme_options['theme-nav-type'] == 2 ) {
						$theme_nav_type = 2;
					} else {
						$theme_nav_type = 1;
					}
				}
			} else {  
			
				if(function_exists("is_woocommerce") && (is_shop() || is_checkout() || is_account_page())){ 	
					if(is_shop() ){
						$page_id = get_option('woocommerce_shop_page_id');
					} elseif(is_checkout()) {
						$page_id = get_option('woocommerce_pay_page_id'); 
					} elseif(is_account_page()) {
						$page_id = get_option('woocommerce_myaccount_page_id'); 
					} elseif(is_account_page()) {
						$page_id = get_option('woocommerce_edit_address_page_id'); 
					} elseif(is_account_page()) {
						$page_id = get_option('woocommerce_view_order_page_id'); 
					}
					$woopage  = get_post( $page_id );
					$navstyle_type_singlepg = get_post_meta( $woopage->ID, '_manual_nav_style_type', true );
					if( isset($navstyle_type_singlepg) && $navstyle_type_singlepg != '' ) {
						if( $navstyle_type_singlepg == 'no_background_nav') { 
							$theme_nav_type = 1; 
						} else {
							$theme_nav_type = 2;
						}
					} else {
						if( $theme_options['theme-nav-type'] == 2 ) {
							$theme_nav_type = 2;
						} else {
							$theme_nav_type = 1;
						}
					}
				
				// custom blog		
				} else if( is_front_page() && is_home() ) {
				
				} else if( is_front_page() ) {
					
				} else if( is_home() ) {
					$page_blogID = get_option('page_for_posts');
					$navstyle_type_singlepg = get_post_meta( $page_blogID, '_manual_nav_style_type', true );
					if( isset($navstyle_type_singlepg) && $navstyle_type_singlepg != '' ) {
						if( $navstyle_type_singlepg == 'no_background_nav') { 
							$theme_nav_type = 1; 
						} else {
							$theme_nav_type = 2;
						}
					} else {
						if( $theme_options['theme-nav-type'] == 2 ) {
							$theme_nav_type = 2;
						} else {
							$theme_nav_type = 1;
						}
					}
				} else {
					if( $theme_options['theme-nav-type'] == 2 ) {
						$theme_nav_type = 2;
					} else {
						$theme_nav_type = 1;
					}
				}
			}
		  ?>
			<style type="text/css">
				<?php if($theme_nav_type == 2) { ?>
img.home-logo-hide{ display:none; }img.home-logo-show{ display:block; } .navbar { position: absolute!important; width: 100%; <?php if( is_front_page() && isset($theme_options['theme-nav-homepg-color']) ) { ?> background: rgba(0, 0, 0, 0)!important; <?php } else { ?> background: transparent!important; <?php } ?> } .navbar-inverse { border-color:none!important; } body.home .navbar-inverse .navbar-nav>li>a { <?php if( is_front_page() && isset($theme_options['theme-nav-homepg-color']) ) { ?> color: <?php echo $theme_options['theme-nav-homepg-color']; ?>!important; <?php } else { ?> color: #000000!important; <?php } ?> } body.home .navbar-inverse .navbar-nav > li > a:hover{ <?php if( is_front_page() && isset($theme_options['theme-nav-homepg-color']) ) { ?> color: #E3E2E2!important; <?php } else { ?> color: #7C7C7C!important; <?php } ?> }.padding-jumbotron{padding:35px 0px 0px;}.jumbotron.jumbotron-inner-fix .inner-margin-top{padding-top: 110px!important;}.jumbotron.jumbotron-inner-fix {position: inherit;}.jumbotron .jumbotron-bg-color {background-color: rgba(0, 0, 0, 0.2);padding: 170px 0;}body.home nav.navbar.after-scroll-wrap img.home-logo-hide { display: block!important; }body.home nav.navbar.after-scroll-wrap img.home-logo-show { display: none!important; }@media (min-width:768px) and (max-width:991px) { <?php if( is_front_page() && isset($theme_options['theme-nav-homepg-logo']['url']) && $theme_options['theme-nav-homepg-logo']['url'] != '' ) { ?> img.home-logo-hide{ display:block; }img.home-logo-show{ display:none; } <?php } ?> .navbar { position:relative!important; background: #FFFFFF!important; } .jumbotron.jumbotron-inner-fix .inner-margin-top{ padding-top: 0px!important; } .navbar-inverse .navbar-nav > li > a { color: #181818!important; } .padding-jumbotron{  padding:0px 0px 0px; } body.home .navbar-inverse .navbar-nav>li>a { color: #000000!important; } body.home .navbar-inverse .navbar-nav > li > a:hover{ color: #7C7C7C!important; } } @media (max-width:767px) { <?php if( is_front_page() && isset($theme_options['theme-nav-homepg-logo']['url']) && $theme_options['theme-nav-homepg-logo']['url'] != '' ) { ?> img.home-logo-hide{ display:block; } img.home-logo-show{ display:none; } <?php } ?> .navbar { position:relative!important; background: #FFFFFF!important; } .padding-jumbotron{ padding:0px 10px;  } .navbar-inverse .navbar-nav > li > a { color: #181818!important; padding-top: 10px!important; } .jumbotron.jumbotron-inner-fix .inner-margin-top { padding-top: 0px!important;  } .navbar-inverse .navbar-nav > li > a { border-top: none!important; } body.home .navbar-inverse .navbar-nav>li>a { color: #000000!important; } body.home .navbar-inverse .navbar-nav > li > a:hover{ color: #7C7C7C!important; } }				
				<?php } else { ?>
.jumbotron .jumbotron-bg-color { background-color: rgba(0, 0, 0, 0.2); padding: 130px 0; } nav.navbar.after-scroll-wrap img.home-logo-show { display: block!important; }
				<?php } ?>
.jumbotron .titletag_dec { color: #FFFFFF; font-size:22px!important; } h1#glob-msg-box { color: <?php echo $theme_options['home-header-main-title-color']; ?>!important; } .jumbotron .titletag_dec { color: <?php echo $theme_options['home-header-sub-title-color']; ?>!important; }
				<?php 
				if (function_exists('category_image_src')) {
					$display_cat_img = false; 
					// Get only image url
					$display_cat_params = array(
					  'term_id' => null,
					  'size' => 'full'
					);
					$check_cat_img_exist = category_image_src( $display_cat_params , $display_cat_img );
					$check_cat_img_exist = esc_url( $check_cat_img_exist );
				} else {
					$check_cat_img_exist = '';
				}
				
				if( is_front_page() ) { 
					$check_home_current_page = basename( get_page_template() );
				} else {
					$check_home_current_page = 'nopage';
				}
				
				// custom blog
				if( is_front_page() && is_home() ) {
					$custom_blog_post = 2;
				} else if( is_front_page() ) {
					$custom_blog_post = 2;
				} else if( is_home() ) {
					$custom_blog_post = 1;
				} else {
					$custom_blog_post = 2;
				}
				
				if( is_404() == false ) { 
					if( $custom_blog_post == 1 ) {
						$page_for_blogpost_ID = get_option('page_for_posts');
						$header_image = get_post_meta( $page_for_blogpost_ID, '_manual_header_image', true );
						$header_image = esc_url( $header_image );
					} else if ( class_exists('bbPress') && is_bbPress() ) {
						
						if(isset($theme_options['bbpress-header-image']['url']) && $theme_options['bbpress-header-image']['url'] != '') {
							$header_image = esc_url($theme_options['bbpress-header-image']['url']);
						} else {
							$header_image = '';
						}
						
					} else if(function_exists("is_woocommerce") && (is_shop() || is_checkout() || is_account_page())){ 	
						if(is_shop() ){
							$page_id = get_option('woocommerce_shop_page_id');
							manual_woo_shop_column_css_handler();
						} elseif(is_checkout()) {
							$page_id = get_option('woocommerce_pay_page_id'); 
						} elseif(is_account_page()) {
							$page_id = get_option('woocommerce_myaccount_page_id'); 
						} elseif(is_account_page()) {
							$page_id = get_option('woocommerce_edit_address_page_id'); 
						} elseif(is_account_page()) {
							$page_id = get_option('woocommerce_view_order_page_id'); 
						}
						$woopage  = get_post( $page_id );
						$header_image = get_post_meta( $woopage->ID, '_manual_header_image', true );
						
					} else if( is_single() || is_page() || ( is_front_page() && $check_home_current_page != 'template-home.php' ) ) { 
						if( get_post_meta( $post->ID, '_manual_slider_rev_shortcode', true ) != '' ) {
						$header_image = 'rev-slider';
						} else {
						$header_image = get_post_meta( $post->ID, '_manual_header_image', true );
						}
						$header_image = esc_url( $header_image ); 
					} else {
						$header_image = $check_cat_img_exist;
					}
				} else {
					$header_image = '';
				}
				
				if( ( isset($header_image) && $header_image != '' && $check_home_current_page != 'template-home.php' ) &&
					is_search() == false 
				) { ?>
#breadcrumbs,#breadcrumbs a {color: #F0F0F0;}#breadcrumbs a:hover {color: #cdcdcd;}#breadcrumbs span {color: #E8E7E7;}.noise-break {background: none;background-image:url("<?php echo $header_image;  ?>");background-size:cover!important;background-position: 50% 50%;}.jumbotron {padding: 120px 0px!important;}.jumbotron.jumbotron-inner-fix .inner-margin-top {padding-top: 0px!important;}
					<?php if($theme_nav_type == 2) { 
					if( get_post_meta( $post->ID, '_manual_remove_nav_header_bg_opacity', true ) != true ) { echo '.navbar {background: rgba(53, 55, 62, 0.2)!important;z-index:999;}';  } ?>
.navbar-inverse .navbar-nav>li>a {color: #FFFFFF!important;}.navbar-inverse .navbar-nav > li > a:hover{color: #EAEAEA!important;}.jumbotron.jumbotron-inner-fix .inner-margin-top {padding-top: 90px!important;}img.home-logo-show {display: none!important;}nav.navbar.after-scroll-wrap img.home-logo-show { display: block!important; }nav.navbar.after-scroll-wrap img.inner-page-white-logo { display: none!important; } .form-group.menu-bar-form .form-control { border: 1px solid rgba(244, 244, 244, 0.27)!important; } .hamburger-menu span { background: #ffffff; } nav.navbar.after-scroll-wrap .hamburger-menu span{ background: #121212; } @media (max-width: 991px) and (min-width: 768px) { .hamburger-menu span {background: #121212; } }
 
					<?php } else { ?>
					img.inner-page-white-logo {display: none!important;}
					<?php } ?>
body.home .navbar { background: none!important;}h1.inner-header {color: #FFFFFF!important;letter-spacing: 1px;font-weight: bold;}p.inner-header-color {color: #F8F8F8;}.trending-search span.popular-keyword-title {color: #D6D4D4;}.trending-search a {color: #BFBFBF!important;}@media (min-width:768px) and (max-width:991px) {.navbar {background: rgba(53, 55, 62, 0)!important;}.navbar-inverse .navbar-nav>li>a {color: #181818!important;}.navbar-inverse .navbar-nav > li > a:hover{color: #7C7C7C!important;}img.home-logo-show { display: block!important; }img.inner-page-white-logo { display: none!important; }.jumbotron.jumbotron-inner-fix .inner-margin-top {padding-top: 0px!important;}}@media (max-width:767px) { .navbar { background: rgba(53, 55, 62, 0)!important;}.navbar-inverse .navbar-nav>li>a {color: #181818!important;}.navbar-inverse .navbar-nav > li > a:hover{color: #7C7C7C!important;}img.home-logo-show { display: block!important; }img.inner-page-white-logo { display: none!important; }.jumbotron.jumbotron-inner-fix .inner-margin-top {padding-top: 0px!important;}}
					<?php 
						if( is_front_page() && $check_home_current_page != 'template-home.php' ) {
							if( $theme_nav_type == 1 ) { // no background
								if( $theme_options['theme-nav-type'] == 2 ) {
									echo ' img.home-logo-show { display: none!important; } nav.navbar.after-scroll-wrap img.home-logo-show { display: none!important; }'; 
								} else { 
									echo ' img.home-logo-show { display: block!important; } nav.navbar.after-scroll-wrap img.home-logo-show { display: block!important; }'; 
								}
							} else { 
								if( $theme_options['theme-nav-type'] == 1 ) {
									echo ' img.home-logo-show { display: none!important; } @media (min-width:768px) and (max-width:991px) { img.home-logo-show { display: block!important; } } @media (max-width:767px) { img.home-logo-show { display: block!important; } } body.home nav.navbar.after-scroll-wrap img.home-logo-show { display: block!important; }';
								} else {
									echo ' img.home-logo-show { display: block!important; } @media (min-width:768px) and (max-width:991px) { img.home-logo-show { display: none!important; } } @media (max-width:767px) { img.home-logo-show { display: none!important; } }';
								}
							}
						}
					
					} else { // if no image ?>
					img.inner-page-white-logo {display: none!important;}
					<?php 
					if( is_front_page() && $check_home_current_page == 'template-home.php' ) {
						if( $theme_nav_type == 1 ) { // no background
							if( $theme_options['theme-nav-type'] == 2 ) { 
								echo 'img.home-logo-show { display: none!important; } body.home nav.navbar.after-scroll-wrap img.home-logo-show { display: none!important; }';
							}
						} else {
							if( $theme_options['theme-nav-type'] == 1 ) { 
								echo 'img.inner-page-white-logo { display: block!important; } img.home-logo-show { display: none; } @media (min-width:768px) and (max-width:991px) { img.home-logo-show { display: block!important; } img.inner-page-white-logo { display: none!important; } } @media (max-width:767px) { img.home-logo-show { display: block!important; } img.inner-page-white-logo { display: none!important; } }  body.home nav.navbar.after-scroll-wrap img.home-logo-show { display: block!important; } body.home nav.navbar.after-scroll-wrap img.inner-page-white-logo { display: none!important; }';
							}
						}
					}
					
					if( is_front_page() && $check_home_current_page != 'template-home.php' ) {
						if( $theme_nav_type == 1 ) { // no background
							if( $theme_options['theme-nav-type'] == 2 ) { 
								echo ' img.home-logo-show { display: none!important; } nav.navbar.after-scroll-wrap img.home-logo-show { display: none!important; }'; 
							} else {  
								echo ' img.home-logo-show { display: block!important; } nav.navbar.after-scroll-wrap img.home-logo-show { display: block!important; }'; 
							}
						} else { 
							if( $theme_options['theme-nav-type'] == 1 ) { 
								echo ' img.home-logo-show { display: block!important; } @media (min-width:768px) and (max-width:991px) { img.home-logo-show { display: block!important; } } @media (max-width:767px) { img.home-logo-show { display: block!important; } } body.home nav.navbar.after-scroll-wrap img.home-logo-show { display: block!important; } body.home .navbar-inverse .navbar-nav>li>a { color: #181818!important; } body.home .navbar-inverse .navbar-nav>li>a:hover { color: #5E5E5E!important; }';
							} else {    
								echo ' img.home-logo-show { display:none!important; } img.home-logo-hide { display: block!important; } body.home .navbar-inverse .navbar-nav>li>a { color: #181818!important; } body.home .navbar-inverse .navbar-nav>li>a:hover { color: #5E5E5E!important; } @media (min-width:768px) and (max-width:991px) { img.home-logo-show { display: none!important; } } @media (max-width:767px) { img.home-logo-show { display: none!important; } }';
							}
						}
					}
				 } // Eof else 
				 ?>
				
				<?php if(is_front_page()  && $check_home_current_page == 'template-home.php'   ) { ?>
.trending-search span.popular-keyword-title {color: #D6D6D6;}.trending-search a {color: #C5C5C5!important;}
				<?php } ?>
				
				<?php if( isset($theme_options['manual-global-color-link']['rgba']) && $theme_options['manual-global-color-link']['rgba'] != '' ) { ?>
.custom-link, .custom-link-blog, .more-link, .load_more a {color: <?php echo $theme_options['manual-global-color-link']['rgba']; ?> !important;}.custom-link:hover, .custom-link-blog:hover, .more-link:hover, .load_more a:hover { color: <?php echo $theme_options['manual-global-color-link-hover']['rgba']; ?> !important; }
				<?php } ?>
				
				<?php if( isset($theme_options['manual-global-color-botton']['rgba']) && $theme_options['manual-global-color-botton']['rgba'] != '' ) { ?>
				.button-custom, p.home-message-darkblue-bar, p.portfolio-des-n-link, .portfolio-section .portfolio-button-top, .body-content .wpcf7 input[type="submit"], .container .blog-btn, .sidebar-widget.widget_search input[type="submit"], .navbar-inverse .navbar-toggle, .custom_login_form input[type="submit"], .custom-botton, button#bbp_user_edit_submit, button#bbp_topic_submit, button#bbp_reply_submit, button#bbp_merge_topic_submit, .bbp_widget_login button#user-submit {background-color: <?php echo $theme_options['manual-global-color-botton']['rgba']; ?> !important;}.navbar-inverse .navbar-toggle, .container .blog-btn { border-color: <?php echo $theme_options['manual-global-color-botton']['rgba']; ?>!important;}.button-custom:hover, p.home-message-darkblue-bar:hover, .body-content .wpcf7 input[type="submit"]:hover, .container .blog-btn:hover, .sidebar-widget.widget_search input[type="submit"]:hover, .navbar-inverse .navbar-toggle:hover, .custom_login_form input[type="submit"]:hover, .custom-botton:hover, button#bbp_user_edit_submit:hover, button#bbp_topic_submit:hover, button#bbp_reply_submit:hover, button#bbp_merge_topic_submit:hover, .bbp_widget_login button#user-submit:hover{  background-color: <?php echo $theme_options['manual-global-color-botton-hover']['rgba']; ?> !important; }
				<?php } ?>
				.footer-go-uplink { color:<?php echo (!empty($theme_options['manual-go-up-icon-color']['rgba'])?$theme_options['manual-go-up-icon-color']['rgba']:''); ?>!important; font-size: <?php echo $theme_options['go_up_arrow_font_size']; ?>px!important; }
				<?php if( isset($theme_options['manual-hover-icon-color']['rgba']) && $theme_options['manual-hover-icon-color']['rgba'] != '' ) { ?>
				.browse-help-desk .browse-help-desk-div .i-fa:hover, ul.news-list li.cat-lists:hover:before, .body-content li.cat.inner:hover:before, .kb-box-single:hover:before {color:<?php echo $theme_options['manual-hover-icon-color']['rgba']; ?>; } .social-share-box:hover { background:<?php echo $theme_options['manual-hover-icon-color']['rgba']; ?>; border: 1px solid <?php echo $theme_options['manual-hover-icon-color']['rgba']; ?>; }
				<?php } ?>
				
				<?php 
				$display_on_forum_page_head_call = '';
				if( $theme_options['manual-trending-post-type-search-status-on-forum-pages'] == false ) {
					if( get_post_type() == 'forum' ) $display_on_forum_page_head_call = 1;
				} else {
					 $display_on_forum_page_head_call = 2;
				}
				if ( $theme_options['manual-trending-post-type-search-status'] == true && ($display_on_forum_page_head_call != 1) ){ ?>
				.form-control.header-search.search_loading { background: #fff url("<?php echo trailingslashit( get_template_directory_uri() ); ?>img/loader.svg") no-repeat right 255px center!important; } @media (max-width:767px) { .form-control.header-search.search_loading { background: #fff url("<?php echo trailingslashit( get_template_directory_uri() ); ?>img/loader.svg") no-repeat right 115px center!important; } }
				<?php } ?>
				
				
				<?php 
				
				if( is_object($post) && get_post_meta( $post->ID, '_manual_header_hide_menu_bar', true ) == true ) { ?>
					.navbar { display:none; } .jumbotron.jumbotron-inner-fix .inner-margin-top { padding-top:0px!important; }
				<?php } ?>
				
				<?php
				/*LOGO ADJUSTMENT*/
				$readjust_logo_height = $readjust_logo_margintop = '';
				if( !empty($theme_options['theme-logo-readjust-height']['units']) && !empty($theme_options['theme-logo-readjust-height']['height']) ) { 
					$readjust_logo_height = $theme_options['theme-logo-readjust-height']['height'];
					echo '.custom-nav-logo { height: '.$readjust_logo_height.'!important;}'; 
				}
				if( !empty($theme_options['theme-logo-readjust-margin-top']['units']) && !empty($theme_options['theme-logo-readjust-margin-top']['height']) ) { 
					$readjust_logo_margintop = $theme_options['theme-logo-readjust-margin-top']['height'];
					echo '.custom-nav-logo { margin-top: '.$readjust_logo_margintop.';}'; 
				}
				if( !empty($theme_options['theme-logo-readjust-sticky-height']['units']) && !empty($theme_options['theme-logo-readjust-sticky-height']['height']) ) { 
					$readjust_sticky_menu_logo_height = $theme_options['theme-logo-readjust-sticky-height']['height'];
					echo 'nav.navbar.after-scroll-wrap .custom-nav-logo { height: '.$readjust_sticky_menu_logo_height.';}'; 
				}
				if( !empty($theme_options['theme-logo-readjust-sticky-margin-top']['units']) && !empty($theme_options['theme-logo-readjust-sticky-margin-top']['height']) ) { 
					$readjust_sticky_menu_logo_margintop = $theme_options['theme-logo-readjust-sticky-margin-top']['height'];
					echo 'nav.navbar.after-scroll-wrap .custom-nav-logo { margin-top: '.$readjust_sticky_menu_logo_margintop.';}'; 
				}
				
				/*REDEFINE FOOTER DESIGN*/
				echo '.footer-bg { background: '.$theme_options['theme_footer_widget_bg_color'].'; } .footer-widget h5 { color: '.$theme_options['theme_footer_widget_title_color'].'!important; } .footer-widget .textwidget { color: '.$theme_options['theme_footer_widget_text_color'].'!important; } .footer-widget a {
    color: '.$theme_options['theme_footer_widget_text_link_color']['regular'].'!important; } .footer-widget a:hover { color:'.$theme_options['theme_footer_widget_text_link_color']['hover'].'!important; } span.post-date { color: '.$theme_options['theme_footer_widget_text_color'].'; }'; 
	
				echo '.footer_social_copyright, .footer-bg.footer-type-one{ background-color: '.$theme_options['theme_footer_social_bg_color'].'; } .footer-btm-box p, .footer-bg.footer-type-one p { color: '.$theme_options['theme_footer_social_text_color'].'; } .footer-btm-box a, .footer-bg.footer-type-one .footer-btm-box-one a{ color: '.$theme_options['theme_footer_social_link_color']['regular'].'!important;  } .footer-btm-box a:hover, .footer-bg.footer-type-one .footer-btm-box-one a:hover { color: '.$theme_options['theme_footer_social_link_color']['hover'].'!important; } .footer-btm-box .social-footer-icon, .footer-bg.footer-type-one .social-footer-icon { color: '.$theme_options['theme_footer_social_icon_link_color']['regular'].'; } .footer-btm-box .social-footer-icon:hover, .footer-bg.footer-type-one .social-footer-icon:hover { color:'.$theme_options['theme_footer_social_icon_link_color']['hover'].'; }';
				
				
				/*SEARCH ICON BOUNCEIN ANIMATION*/
				if( $theme_options['manual-live-search-icon-bouncein'] == true ) {
				echo 'form.searchform i.livesearch{ animation: bounceIn 750ms linear infinite alternate; -moz-animation: bounceIn 750ms linear infinite alternate;   -webkit-animation: bounceIn 750ms linear infinite alternate; -o-animation: bounceIn 750ms linear infinite alternate; } @-webkit-keyframes bounceIn{0%,20%,40%,60%,80%,100%{-webkit-transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);}0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3);}20%{-webkit-transform:scale3d(1.1,1.1,1.1);transform:scale3d(1.1,1.1,1.1);}40%{-webkit-transform:scale3d(.9,.9,.9);transform:scale3d(.9,.9,.9);}60%{opacity:1;-webkit-transform:scale3d(1.03,1.03,1.03);transform:scale3d(1.03,1.03,1.03);}80%{-webkit-transform:scale3d(.97,.97,.97);transform:scale3d(.97,.97,.97);}100%{opacity:1;-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1);}}
keyframes bounceIn{0%,20%,40%,60%,80%,100%{-webkit-transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);}0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);-ms-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3);}20%{-webkit-transform:scale3d(1.1,1.1,1.1);-ms-transform:scale3d(1.1,1.1,1.1);transform:scale3d(1.1,1.1,1.1);}40%{-webkit-transform:scale3d(.9,.9,.9);-ms-transform:scale3d(.9,.9,.9);transform:scale3d(.9,.9,.9);}60%{opacity:1;-webkit-transform:scale3d(1.03,1.03,1.03);-ms-transform:scale3d(1.03,1.03,1.03);transform:scale3d(1.03,1.03,1.03);}80%{-webkit-transform:scale3d(.97,.97,.97);-ms-transform:scale3d(.97,.97,.97);transform:scale3d(.97,.97,.97);}100%{opacity:1;-webkit-transform:scale3d(1,1,1);-ms-transform:scale3d(1,1,1);transform:scale3d(1,1,1);}}
.bounceIn{-webkit-animation-name:bounceIn;animation-name:bounceIn;-webkit-animation-duration:.75s;animation-duration:.75s;}';
				}
				
				/*CUSTOM CODE*/
				if( isset($theme_options['manual-editor-css']) && $theme_options['manual-editor-css'] != '' ) { echo $theme_options['manual-editor-css']; }  
				?>
            </style>
          <?php
	    }
		
		public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
		  $return = '';
		  $mod = get_theme_mod($mod_name);
		  if ( ! empty( $mod ) ) {
			 $return = sprintf('%s { %s:%s; }',
				$selector,
				$style,
				$prefix.$mod.$postfix
			 );
			 if ( $echo ) {
				echo $return;
			 }
		  }
		  return $return;
		}
		
		
	   /**
		* This outputs the javascript needed to automate the live settings preview.
		*/
	   public static function live_preview() {
		  wp_enqueue_script( 
			   'manual-themecustomizer', // Give the script a unique ID
			   get_template_directory_uri() . '/js/customize-preview.js', // Define the path to the JS file
			   array(  'jquery', 'customize-preview' ), // Define dependencies
			   '', // Define a version (optional) 
			   true // Specify whether to put in footer (leave this true)
		  );
	   }
		

}
// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'manual_Customize' , 'register' ) );
// Output custom CSS to live site
add_action( 'wp_head' , array( 'manual_Customize' , 'header_output' ) );
// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'manual_Customize' , 'live_preview' ) );
?>