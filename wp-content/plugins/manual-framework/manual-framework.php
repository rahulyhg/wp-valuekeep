<?php 
/* 
 * Plugin Name:   Manual Framework (Post Type) 
 * Version:       1.4
 * Plugin URI:    http://www.wpsmartapps.com/
 * Description:   <strong>Add HIGHLY necesseary POST TYPES for the theme MANUAL</strong>.
 * Author:        pixelacehq (Jabin Kadel)
 * Author URI:    http://www.wpsmartapps.com
 *
 * License: Copyright (c) 2015 WpSmartApps.com. All rights reserved.
 *  
 */


/********************************
*** ACTIVATE PLUGIN ACTION  ***
***********************************/
$manual_framework_path     = preg_replace('/^.*wp-content[\\\\\/]plugins[\\\\\/]/', '', __FILE__);
$manual_framework_path     = str_replace('\\','/',$manual_framework_path);

// Language
add_action('plugins_loaded', 'manual_framework_load_textdomain');
function manual_framework_load_textdomain() {
        load_plugin_textdomain( 'manual-framework', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
}

add_action('activate_'.$manual_framework_path, 'manual_framework_plugin_active'); 
function manual_framework_plugin_active() {
	update_option( 'manual_theme_framework_version', '1.4' );
	return true;
}

/********************************
*** Add FAQ Post Type  ***
***********************************/
add_action( 'init', 'manual_faq_post_type' );
if ( ! function_exists( 'manual_faq_post_type' ) ) {

	
	function manual_faq_post_type() {
		
		register_post_type( 'manual_faq',
			array(
			'labels' => array(
					'name' => esc_html__( 'FAQs', 'manual-framework' ),
					'singular_name' => esc_html__( 'FAQ', 'manual-framework' ),
					'add_new' => esc_html__('Add FAQ', 'manual-framework'),  
					'add_new_item' => esc_html__('Add New FAQ', 'manual-framework'),  
					'edit_item' => esc_html__('Edit FAQ', 'manual-framework'),  
					'new_item' => esc_html__('New FAQ', 'manual-framework'),  
					'view_item' => esc_html__('View FAQ', 'manual-framework'),  
					'search_items' => esc_html__('Search FAQs', 'manual-framework'),  
					'not_found' =>  esc_html__('No FAQs found', 'manual-framework'),  
					'not_found_in_trash' => esc_html__('No FAQs found in Trash', 'manual-framework')
				),
			'taxonomies'  => array( 'manualfaqcategory' ),	
			'public' => true,
			'menu_position' => 5,
			'rewrite' => array(	'slug' => 'faqs',
								'hierarchical' => 'true',
								'with_front' => false),
			'supports' => array(
				'title',
				'editor',
				'page-attributes','thumbnail'),
			'public' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'capability_type' => 'page',
			'hierarchical' => false,
			'exclude_from_search' => false,
			'show_in_nav_menus'  => false,
 			//'has_archive'   => true
			)
		);	
		flush_rewrite_rules();
	}

}


if ( ! function_exists('manual_faq_category_taxonomy') ) {
// Register faq Category Custom Taxonomy
function manual_faq_category_taxonomy()  {

	$labels = array(
		'name'                       => _x( 'FAQ Categories', 'Taxonomy General Name', 'manual-framework' ),
		'singular_name'              => _x( 'FAQ Category', 'Taxonomy Singular Name', 'manual-framework' ),
		'menu_name'                  => esc_html__( 'FAQ Categories', 'manual-framework' ),
		'all_items'                  => esc_html__( 'All Categories', 'manual-framework' ),
		'parent_item'                => esc_html__( 'Parent Category', 'manual-framework' ),
		'parent_item_colon'          => esc_html__( 'Parent Category:', 'manual-framework' ),
		'new_item_name'              => esc_html__( 'New Category Name', 'manual-framework' ),
		'add_new_item'               => esc_html__( 'Add New Category', 'manual-framework' ),
		'edit_item'                  => esc_html__( 'Edit Category', 'manual-framework' ),
		'update_item'                => esc_html__( 'Update Category', 'manual-framework' ),
		'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'manual-framework' ),
		'search_items'               => esc_html__( 'Search categories', 'manual-framework' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'manual-framework' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'manual-framework' ),
	);

	$rewrite = array(
		'slug'                       => 'faq',
		'with_front'                 => false,
		'hierarchical'               => true,
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'query_var'                  => 'article_category',
		'rewrite'                    => $rewrite,
	);

	register_taxonomy( 'manualfaqcategory', 'manual_faq', $args );
	flush_rewrite_rules();
}

// Hook into the 'init' action
add_action( 'init', 'manual_faq_category_taxonomy', 0 );

}






/********************************
*** Add Portfolio Post Type  ***
***********************************/

add_action( 'init', 'manual_portfolio_post_type' );
if ( ! function_exists( 'manual_portfolio_post_type' ) ) {

	
	function manual_portfolio_post_type() {
		
	global $theme_options;
	
	if( isset($theme_options['portfolio-slug-name']) && $theme_options['portfolio-slug-name'] != ''  ) {
		$new_portfolio_slug_name = $theme_options['portfolio-slug-name'];
	} else {
		$new_portfolio_slug_name = 'work';
	}
	
	if( $theme_options['portfolio-comment-status'] == true ) {
		$activate_comment = 'comments';
	} else {
		$activate_comment = '';
	}
	
		
		
		register_post_type( 'manual_portfolio',
			array(
			'labels' => array(
					'name' => esc_html__( 'Portfolio', 'manual-framework' ),
					'singular_name' => esc_html__( 'Portfolio', 'manual-framework' ),
					'add_new' => esc_html__('Add Portfolio', 'manual-framework'),  
					'add_new_item' => esc_html__('Add New Portfolio', 'manual-framework'),  
					'edit_item' => esc_html__('Edit Portfolio', 'manual-framework'),  
					'new_item' => esc_html__('New Portfolio', 'manual-framework'),  
					'view_item' => esc_html__('View Portfolio', 'manual-framework'),  
					'search_items' => esc_html__('Search Portfolio', 'manual-framework'),  
					'not_found' =>  esc_html__('No Portfolio found', 'manual-framework'),  
					'not_found_in_trash' => esc_html__('No Portfolio found in Trash', 'manual-framework')
				),
			'taxonomies'  => array( 'manualportfoliocategory' ),	
			'public' => true,
			'menu_position' => 5,
			'rewrite' => array(	'slug' => $new_portfolio_slug_name,
								'hierarchical' => 'true',
								'with_front' => false),
			'supports' => array(
				'title',
				'editor',
				'page-attributes','thumbnail', $activate_comment),
			'public' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'capability_type' => 'page',
			'hierarchical' => false,
			'exclude_from_search' => false,
			'show_in_nav_menus'  => false,
 			//'has_archive'   => true
			)
		);	
		flush_rewrite_rules();
	}

}


if ( ! function_exists('manual_portfolio_category_taxonomy') ) {
// Register faq Category Custom Taxonomy
function manual_portfolio_category_taxonomy()  {
	
	global $theme_options;
	
	if( isset($theme_options['portfolio-cat-slug-name']) && $theme_options['portfolio-cat-slug-name'] != ''  ) {
		$pof_new_cat_slug_name = $theme_options['portfolio-cat-slug-name'];
	} else {
		$pof_new_cat_slug_name = 'pfocat';
	}

	$labels = array(
		'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'manual-framework' ),
		'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'manual-framework' ),
		'menu_name'                  => esc_html__( 'Portfolio Categories', 'manual-framework' ),
		'all_items'                  => esc_html__( 'All Categories', 'manual-framework' ),
		'parent_item'                => esc_html__( 'Parent Category', 'manual-framework' ),
		'parent_item_colon'          => esc_html__( 'Parent Category:', 'manual-framework' ),
		'new_item_name'              => esc_html__( 'New Category Name', 'manual-framework' ),
		'add_new_item'               => esc_html__( 'Add New Category', 'manual-framework' ),
		'edit_item'                  => esc_html__( 'Edit Category', 'manual-framework' ),
		'update_item'                => esc_html__( 'Update Category', 'manual-framework' ),
		'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'manual-framework' ),
		'search_items'               => esc_html__( 'Search categories', 'manual-framework' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'manual-framework' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'manual-framework' ),
	);

	$rewrite = array(
		'slug'                       => $pof_new_cat_slug_name,
		'with_front'                 => false,
		'hierarchical'               => true,
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'query_var'                  => true,
		'rewrite'                    => $rewrite,
	);

	register_taxonomy( 'manualportfoliocategory', 'manual_portfolio', $args );
	flush_rewrite_rules();
}

// Hook into the 'init' action
add_action( 'init', 'manual_portfolio_category_taxonomy', 0 );

}






/********************************
*** Add Documentation Post Type  ***
***********************************/
add_action( 'init', 'manual_documentation_post_type' );
if ( ! function_exists( 'manual_documentation_post_type' ) ) {

	
	function manual_documentation_post_type() {
		
		global $theme_options;
		
		if( isset($theme_options['doc-slug-name']) && $theme_options['doc-slug-name'] != ''  ) {
			$new_slug_name = $theme_options['doc-slug-name'];
		} else {
			$new_slug_name = 'documentation';
		}
		
		if( isset($theme_options['doc-breadcrumb-name']) && $theme_options['doc-breadcrumb-name'] != ''  ) {
			$doc_breadcrumb_name = $theme_options['doc-breadcrumb-name'];
		} else {
			$doc_breadcrumb_name = 'Documentation';
		}
		
		if( $theme_options['documentation-comment-status'] == true ) {
			$activate_comment = 'comments';
		} else {
			$activate_comment = '';
		}
		
	
		register_post_type('manual_documentation',
			array(
			'labels' => array(
					'name' => esc_html__( 'Documentation', 'manual-framework' ),
					'singular_name' => esc_html__( $doc_breadcrumb_name, 'manual-framework' ),
					'add_new' => esc_html__('Add Documentation', 'manual-framework'),  
					'add_new_item' => esc_html__('Add New Documentation', 'manual-framework'),  
					'edit_item' => esc_html__('Edit Documentation', 'manual-framework'),  
					'new_item' => esc_html__('New Documentation', 'manual-framework'),  
					'view_item' => esc_html__('View Documentation', 'manual-framework'),  
					'search_items' => esc_html__('Search Documentation', 'manual-framework'),  
					'not_found' =>  esc_html__('No Documentation found', 'manual-framework'),  
					'not_found_in_trash' => esc_html__('No Documentation found in Trash', 'manual-framework'),
					
					'menu_name'           => esc_html__( 'Documentation', 'manual-framework' ),
					'parent_item_colon'   => esc_html__( 'Parent Documentation:', 'manual-framework' ),
					'all_items'           => esc_html__( 'All Documentation', 'manual-framework' ),
					'update_item'         => esc_html__( 'Update Documentation', 'manual-framework' ),
				),
				
			'taxonomies'  => array( 'manualdocumentationcategory' ),	
			'public' => true,
			'menu_position' => 5,
			
			'rewrite' => array(	'slug' => $new_slug_name,
								/*'hierarchical' => 'true',*/
								'with_front' => false),
								
			'supports' => array(
				'title',
				'author',
				'editor',
				'revisions',
				'page-attributes','thumbnail', $activate_comment),
				
			'public' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'capability_type' => 'page',
			'hierarchical' => true,
			'exclude_from_search' => false,
			'show_in_nav_menus'  => false,
			'query_var'          => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
 			//'has_archive'   => true
			)
		);
		
		flush_rewrite_rules();
	}
	
}

if ( ! function_exists('manual_documentation_category_taxonomy') ) {
// Register faq Category Custom Taxonomy
function manual_documentation_category_taxonomy()  {
	
	global $theme_options;
	
	if( isset($theme_options['doc-cat-slug-name']) && $theme_options['doc-cat-slug-name'] != ''  ) {
		$new_cat_slug_name = $theme_options['doc-cat-slug-name'];
	} else {
		$new_cat_slug_name = 'doc';
	}
	

	$labels = array(
		'name'                       => _x( 'Documentation Categories', 'Taxonomy General Name', 'manual-framework' ),
		'singular_name'              => _x( 'Documentation Category', 'Taxonomy Singular Name', 'manual-framework' ),
		'menu_name'                  => esc_html__( 'Documentation Categories', 'manual-framework' ),
		'all_items'                  => esc_html__( 'All Categories', 'manual-framework' ),
		'parent_item'                => esc_html__( 'Parent Category', 'manual-framework' ),
		'parent_item_colon'          => esc_html__( 'Parent Category:', 'manual-framework' ),
		'new_item_name'              => esc_html__( 'New Category Name', 'manual-framework' ),
		'add_new_item'               => esc_html__( 'Add New Category', 'manual-framework' ),
		'edit_item'                  => esc_html__( 'Edit Category', 'manual-framework' ),
		'update_item'                => esc_html__( 'Update Category', 'manual-framework' ),
		'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'manual-framework' ),
		'search_items'               => esc_html__( 'Search categories', 'manual-framework' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'manual-framework' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'manual-framework' ),
	);

	$rewrite = array(
		'slug'                       => $new_cat_slug_name,
		'with_front'                 => false,
		'hierarchical'               => true,
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'query_var'                  => true,
		'rewrite'                    => $rewrite,
	);

	register_taxonomy( 'manualdocumentationcategory', 'manual_documentation', $args );
	flush_rewrite_rules();
}
// Hook into the 'init' action
add_action( 'init', 'manual_documentation_category_taxonomy', 0 );
}










/********************************
*** Add Knowledgebase Post Type  ***
***********************************/
// Hook into the 'init' action
add_action( 'init', 'manual_kb_post_type', 0 );
if ( ! function_exists('manual_kb_post_type') ) {

// Register Custom Post Type
function manual_kb_post_type() {
	global $theme_options;
	
	if( isset($theme_options['kb-slug-name']) && $theme_options['kb-slug-name'] != ''  ) {
		$new_slug_name = $theme_options['kb-slug-name'];
	} else {
		$new_slug_name = 'knowledgebase';
	}
	
	if( $theme_options['kb-comment-status'] == true ) {
		$activate_comment = 'comments';
	} else {
		$activate_comment = '';
	}
	
	if( isset($theme_options['kb-breadcrumb-name']) && $theme_options['kb-breadcrumb-name'] != ''  ) {
		$kb_breadcrumb_name = $theme_options['kb-breadcrumb-name'];
	} else {
		$kb_breadcrumb_name = 'Knowledge Base';
	}
	
	// Get Knowledge slug from options
	$labels = array(
		'name'                => esc_html__( 'Knowledge Base', 'manual-framework' ),
		'singular_name'       => esc_html__( $kb_breadcrumb_name, 'manual-framework' ),
		'menu_name'           => esc_html__( 'Knowledge Base', 'manual-framework' ),
		'parent_item_colon'   => esc_html__( 'Parent Knowledge Base:', 'manual-framework' ),
		'all_items'           => esc_html__( 'All Knowledge Base', 'manual-framework' ),
		'view_item'           => esc_html__( 'View Knowledge Base', 'manual-framework' ),
		'add_new_item'        => esc_html__( 'Add New Knowledge Base', 'manual-framework' ),
		'add_new'             => esc_html__( 'New Knowledge Base', 'manual-framework' ),
		'edit_item'           => esc_html__( 'Edit Knowledge Base', 'manual-framework' ),
		'update_item'         => esc_html__( 'Update Knowledge Base', 'manual-framework' ),
		'search_items'        => esc_html__( 'Search Knowledge Base', 'manual-framework' ),
		'not_found'           => esc_html__( 'No Knowledge Base found', 'manual-framework' ),
		'not_found_in_trash'  => esc_html__( 'No Knowledge Base found in Trash', 'manual-framework' ),
	);

	$rewrite = array(
		'slug'                => $new_slug_name,
		'with_front'          => false,
		'pages'               => true,
		'feeds'               => true,
	);

	$args = array(
		'label'               => esc_html__( 'manual_kb', 'manual-framework' ),
		'description'         => esc_html__( 'Knowledge Base Post Type', 'manual-framework' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'author', 'revisions', 'editor', 'page-attributes', 'thumbnail', $activate_comment ),
		'taxonomies'          => array( 'manualknowledgebasecat' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		//'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);

	register_post_type( 'manual_kb', $args );
	flush_rewrite_rules();
}

}


if ( ! function_exists('manual_kb_category_taxonomy') ) {

// Register Article Category Custom Taxonomy
function manual_kb_category_taxonomy()  {
	
	global $theme_options;
	
	if( isset($theme_options['kb-cat-slug-name']) && $theme_options['kb-cat-slug-name'] != ''  ) {
		$new_cat_slug_name = $theme_options['kb-cat-slug-name'];
	} else {
		$new_cat_slug_name = 'kb';
	}
	
	$labels = array(
		'name'                       => _x( 'Knowledge Base Categories', 'Taxonomy General Name', 'manual-framework' ),
		'singular_name'              => _x( 'Knowledge Base Category', 'Taxonomy Singular Name', 'manual-framework' ),
		'menu_name'                  => esc_html__( 'Knowledge Base Categories', 'manual-framework' ),
		'all_items'                  => esc_html__( 'All Categories', 'manual-framework' ),
		'parent_item'                => esc_html__( 'Parent Category', 'manual-framework' ),
		'parent_item_colon'          => esc_html__( 'Parent Category:', 'manual-framework' ),
		'new_item_name'              => esc_html__( 'New Category Name', 'manual-framework' ),
		'add_new_item'               => esc_html__( 'Add New Category', 'manual-framework' ),
		'edit_item'                  => esc_html__( 'Edit Category', 'manual-framework' ),
		'update_item'                => esc_html__( 'Update Category', 'manual-framework' ),
		'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'manual-framework' ),
		'search_items'               => esc_html__( 'Search categories', 'manual-framework' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'manual-framework' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'manual-framework' ),
	);

	$rewrite = array(
		'slug'                       => $new_cat_slug_name,
		'with_front'                 => false,
		'hierarchical'               => true,
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'query_var'                  => true,
		'rewrite'                    => $rewrite,
	);

	register_taxonomy( 'manualknowledgebasecat', 'manual_kb', $args );
	flush_rewrite_rules();
}

// Hook into the 'init' action
add_action( 'init', 'manual_kb_category_taxonomy', 0 );

}




if ( ! function_exists('manual_kb_tag_taxonomy') ) {

// Register Article Tag Custom Taxonomy
function manual_kb_tag_taxonomy()  {
	
	global $theme_options;
	
	if( isset($theme_options['kb-tag-slug-name']) && $theme_options['kb-tag-slug-name'] != ''  ) {
		$kb_tag_slug_name = $theme_options['kb-tag-slug-name'];
	} else {
		$kb_tag_slug_name = 'kb-tag';
	}
	
	$labels = array(
		'name'                       => _x( 'Knowledge Base Tags', 'Taxonomy General Name', 'manual-framework' ),
		'singular_name'              => _x( 'Knowledge Base Tag', 'Taxonomy Singular Name', 'manual-framework' ),
		'menu_name'                  => esc_html__( 'Knowledge Base Tags', 'manual-framework' ),
		'all_items'                  => esc_html__( 'All Tags', 'manual-framework' ),
		'parent_item'                => esc_html__( 'Parent Tag', 'manual-framework' ),
		'parent_item_colon'          => esc_html__( 'Parent Tag:', 'manual-framework' ),
		'new_item_name'              => esc_html__( 'New Tag Name', 'manual-framework' ),
		'add_new_item'               => esc_html__( 'Add New Tag', 'manual-framework' ),
		'edit_item'                  => esc_html__( 'Edit Tag', 'manual-framework' ),
		'update_item'                => esc_html__( 'Update Tag', 'manual-framework' ),
		'separate_items_with_commas' => esc_html__( 'Separate tags with commas', 'manual-framework' ),
		'search_items'               => esc_html__( 'Search tags', 'manual-framework' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove tags', 'manual-framework' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used tags', 'manual-framework' ),
	);

	$rewrite = array(
		'slug'                       => $kb_tag_slug_name,
		'with_front'                 => false,
		'hierarchical'               => false,
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'                  => 'article_tag',
		'rewrite'                    => $rewrite,
	);

	register_taxonomy( 'manual_kb_tag', 'manual_kb', $args );
}

// Hook into the 'init' action
add_action( 'init', 'manual_kb_tag_taxonomy', 0 );

}


/********************************
*** Add Home Page Blocks  ***
***********************************/
add_action( 'init', 'manual_homepg_blocks' );
if ( ! function_exists( 'manual_homepg_blocks' ) ) {
	function manual_homepg_blocks() {

		register_post_type( 'manual_hp_block',
			array(
				'public' => true,
				'publicly_queryable' => false,
				'show_in_nav_menus' => false,
				'show_in_admin_bar' => true,
				'menu_position' => 5,
				'exclude_from_search' => true,
				'hierarchical' => false,
				'map_meta_cap' => true,
				'labels' => array(
						'name' => esc_html__( 'Home Help Blocks', 'manual-framework' ),
						'singular_name' => esc_html__( 'Home Help Blocks', 'manual-framework' ),
						'add_new' => esc_html__('Add New Block', 'manual-framework'),  
						'add_new_item' => esc_html__('Add New Block', 'manual-framework'),  
						'edit_item' => esc_html__('Edit Block', 'manual-framework'),  
						'new_item' => esc_html__('New Block', 'manual-framework'),  
						'view_item' => esc_html__('View Block', 'manual-framework'),  
						'search_items' => esc_html__('Search Blocks', 'manual-framework'),  
						'not_found' =>  esc_html__('No Blocks found', 'manual-framework'),  
						'not_found_in_trash' => esc_html__('No Blocks found in Trash', 'manual-framework')
					),
				'supports' => array('title','page-attributes'),
				)
		);
		
	}
	
}




/********************************
*** Add Home Page Blocks  ***
***********************************/
add_action( 'init', 'manual_homepg_org_blocks' );
if ( ! function_exists( 'manual_homepg_org_blocks' ) ) {
	function manual_homepg_org_blocks() {

		register_post_type( 'manual_org_block',
			array(
				'public' => true,
				'publicly_queryable' => false,
				'show_in_nav_menus' => false,
				'show_in_admin_bar' => true,
				'menu_position' => 5,
				'exclude_from_search' => true,
				'hierarchical' => false,
				'map_meta_cap' => true,
				'labels' => array(
						'name' => esc_html__( 'Home Org Blocks', 'manual-framework' ),
						'singular_name' => esc_html__( 'Home Org Blocks', 'manual-framework' ),
						'add_new' => esc_html__('Add New Block', 'manual-framework'),  
						'add_new_item' => esc_html__('Add New Block', 'manual-framework'),  
						'edit_item' => esc_html__('Edit Block', 'manual-framework'),  
						'new_item' => esc_html__('New Block', 'manual-framework'),  
						'view_item' => esc_html__('View Block', 'manual-framework'),  
						'search_items' => esc_html__('Search Blocks', 'manual-framework'),  
						'not_found' =>  esc_html__('No Blocks found', 'manual-framework'),  
						'not_found_in_trash' => esc_html__('No Blocks found in Trash', 'manual-framework')
					),
				'supports' => array('title','page-attributes'),
				)
		);
	}
}





/********************************
*** Testimonial Blocks  ***
***********************************/
add_action( 'init', 'manual_homepg_testimonial_blocks' );
if ( ! function_exists( 'manual_homepg_testimonial_blocks' ) ) {
	function manual_homepg_testimonial_blocks() {

		register_post_type( 'manual_tmal_block',
			array(
				'public' => true,
				'publicly_queryable' => false,
				'show_in_nav_menus' => false,
				'show_in_admin_bar' => true,
				'menu_position' => 5,
				'exclude_from_search' => true,
				'hierarchical' => false,
				'map_meta_cap' => true,
				'labels' => array(
						'name' => esc_html__( 'Testimonial', 'manual-framework' ),
						'singular_name' => esc_html__( 'Testimonial', 'manual-framework' ),
						'add_new' => esc_html__('Add New Block', 'manual-framework'),  
						'add_new_item' => esc_html__('Add New Block', 'manual-framework'),  
						'edit_item' => esc_html__('Edit Block', 'manual-framework'),  
						'new_item' => esc_html__('New Block', 'manual-framework'),  
						'view_item' => esc_html__('View Block', 'manual-framework'),  
						'search_items' => esc_html__('Search Blocks', 'manual-framework'),  
						'not_found' =>  esc_html__('No Blocks found', 'manual-framework'),  
						'not_found_in_trash' => esc_html__('No Blocks found in Trash', 'manual-framework')
					),
				'supports' => array('title','page-attributes'),
				)
		);
	}
}




/********************************
*** Our Team Blocks  ***
***********************************/
add_action( 'init', 'manual_page_our_team' );
if ( ! function_exists( 'manual_page_our_team' ) ) {
	function manual_page_our_team() {

		register_post_type( 'manual_ourteam',
			array(
				'public' => true,
				'publicly_queryable' => false,
				'show_in_nav_menus' => false,
				'show_in_admin_bar' => true,
				'menu_position' => 5,
				'exclude_from_search' => true,
				'hierarchical' => false,
				'map_meta_cap' => true,
				'labels' => array(
						'name' => esc_html__( 'Team', 'manual-framework' ),
						'singular_name' => esc_html__( 'Team', 'manual-framework' ),
						'add_new' => esc_html__('Add New Team', 'manual-framework'),  
						'add_new_item' => esc_html__('Add New Team', 'manual-framework'),  
						'edit_item' => esc_html__('Edit Team', 'manual-framework'),  
						'new_item' => esc_html__('New Team', 'manual-framework'),  
						'view_item' => esc_html__('View Block', 'manual-framework'),  
						'search_items' => esc_html__('Search Blocks', 'manual-framework'),  
						'not_found' =>  esc_html__('No Blocks found', 'manual-framework'),  
						'not_found_in_trash' => esc_html__('No Blocks found in Trash', 'manual-framework')
					),
				'supports' => array('title','page-attributes'),
				)
		);
	}
}
?>