<?php 
if(function_exists("is_woocommerce")){
	
	function manual_woo_wrapper_start() {
	  echo '<section id="main">';
	}
	function manual_woo_wrapper_end() {
	  echo '</section>';
	}
	add_action('woocommerce_before_main_content', 'manual_woo_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'manual_woo_wrapper_end', 10);
	
	// support compatible
	add_action( 'after_setup_theme', 'manual_woocommerce_support' );
	function manual_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	
	// Disable breadcrum
	function manual_woocommerce_remove_breadcrumb(){
		remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
	}
	add_action('woocommerce_before_main_content', 'manual_woocommerce_remove_breadcrumb');
	
	// custom breadcrumb
	function manual_woocommerce_custom_breadcrumb(){
		woocommerce_breadcrumb();
	}
	add_action( 'woo_custom_breadcrumb', 'manual_woocommerce_custom_breadcrumb' );
	
	// hide page title. 
	add_filter( 'woocommerce_show_page_title' , 'manual_woocommerce_hide_page_title' );
	function manual_woocommerce_hide_page_title() {
		return false;
	}
	
	// Social share
	function manual_woocommerce_share_icon() {
		global $post;
		$url = get_permalink( $post->ID );
		manual_social_share($url);
	}
	add_action('woocommerce_product_meta_end', 'manual_woocommerce_share_icon');
	
	// display an 'Out of Stock' label on archive pages
	add_action( 'woocommerce_before_shop_loop_item_title', 'manual_woocommerce_template_loop_stock', 10 );
	function manual_woocommerce_template_loop_stock() {
		global $product;
		if ( ! $product->managing_stock() && ! $product->is_in_stock() )
			echo '<span class="onsale out-of-stock-button">'. esc_html__('Out of Stock', 'bind') .'</span>';
	}
	
	// Change number or products per row to 3
	add_filter('loop_shop_columns', 'bind_per_row_records');
	if (!function_exists('bind_per_row_records')) {
		function bind_per_row_records() {
			global $theme_options;
			$rows = $theme_options['woo_column_product_listing'];
			return $rows ; // 3,4 products per row
		}
	}
	
	// Display 24 products per page. Goes in functions.php
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );
	
}
?>