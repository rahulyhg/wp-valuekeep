<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */


/**
 * Post
 */

add_filter( 'cmb_meta_boxes', 'manual_post_metaboxes' );
function manual_post_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	$meta_boxes[] = array(
		'id'         => 'page_options',
		'title'      => 'Post Options',
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
			array(
				'name' => 'Featured Image',
				'desc' => 'Disable featured image inside single post',
				'id' => $prefix . 'featured_image_disable',
				'type' => 'checkbox'
			),
			
			array(
				'name' => 'Post Header Image',
				'desc' => 'Upload image for your header',
				'id'   => $prefix . 'header_image',
				'type' => 'file',
			),
			
			
		),
	);
	return $meta_boxes;
}


/**
 * Pages
 */
 
add_filter( 'cmb_meta_boxes', 'manual_page_menu_metaboxes' );
function manual_page_menu_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	$meta_boxes[] = array(
		'id'         => 'page_menu_options',
		'title'      => 'Header Menu Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
				array(
					'name' => 'Activate Hamburger Menu',
					'desc' => 'On checked, The normal standard header menu will be replaced by hamburger menu',
					'id'   => $prefix .'header_display_hamburger_bar',
					'type' => 'checkbox'
				),
				
				array(
					'name' => 'Search Box On The Menu Bar',
					'desc' => 'On checked, The search box will appear on the menu bar. <br> <strong>NOTE: Feature will only work if activate Hamburger Menu</strong>',
					'id'   => $prefix .'header_display_search_box_on_menu_bar',
					'type' => 'checkbox'
				),
				
				array(
					'name' => 'Replace Manual Search',
					'desc' => 'On checked, Manual Search will be replace by simple modern search',
					'id'   => $prefix .'header_display_search_box_modern_on_menu_bar',
					'type' => 'checkbox'
				),
		
		),
	);
	return $meta_boxes;
}
 
add_filter( 'cmb_meta_boxes', 'manual_page_metaboxes' );
function manual_page_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	$meta_boxes[] = array(
		'id'         => 'page_options',
		'title'      => 'Page Header Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
			array(
				'name' => 'Hide Header Bar',
				'desc' => 'Check to hide header bar that appear right after logo & menu bar, <br><br><strong>NOTE: Feature does not work <br>1. If selected Navigation Style as: With Background Image <br> 2. If place Slider Revolution ShortCode </strong>',
				'id'   => $prefix .'header_hide_header_bar',
				'type' => 'checkbox'
			),
			
			array(
				'name' => 'Hide Menu',
				'desc' => 'On check system will hide menu bar',
				'id'   => $prefix . 'header_hide_menu_bar',
				'type' => 'checkbox',
			),
			
			array(
				'name' => 'Remove Nav Background Opacity',
				'desc' => 'On checked, remove background opacity',
				'id'   => $prefix . 'remove_nav_header_bg_opacity',
				'type' => 'checkbox',
			),
			
			array(
				'name'    => 'Navigation Style',
				'desc'    => 'Align title and description',
				'id'      => $prefix . 'nav_style_type',
				'type'    => 'select',
				'options' => array(
					'no_background_nav'   => esc_html__( 'Without Background Image (white background)', 'manual' ),
					'with_background_nav' => esc_html__( 'With Background Image', 'manual' ),
				),
				'default' => 'with_background_nav',
			),
			array(
				'name' => 'Activate Breadcrumb',
				'desc' => 'Will activate breadcrumb',
				'id'   => $prefix . 'header_breadcrumb_status',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Disable Title',
				'desc' => 'On check no title will appear on the page header',
				'id'   => $prefix . 'header_no_title',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Title',
				'desc' => 'Your new page tagline',
				'id'   => $prefix . 'page_tagline',
				'type' => 'text',
			),
			array(
				'name' => 'Custom Title Color',
				'desc' => '<strong>Default: #4d515c</strong> (NOTE: for image background use #FFFFFF)',
				'id'   => $prefix . 'page_tagline_color',
				'type' => 'colorpicker',
			),
			array(
				'name' => 'Custom Title Size',
				'desc' => '<strong>(omit px)</strong> Title size (example = 54)',
				'id'   => $prefix . 'page_tagline_size',
				'type' => 'text',
			),
			array(
				'name'    => 'Title Text Transform',
				'id'      => $prefix . 'header_title_text_transform',
				'type'    => 'select',
				'options' => array(
					'none'   => esc_html__( 'none', 'manual' ),
					'capitalize' => esc_html__( 'Capitalize', 'manual' ),
					'uppercase'  => esc_html__( 'Uppercase', 'manual' ),
				),
				'default' => 'capitalize',
			),
			array(
				'name'    => 'Custom Title Weight',
				'desc'    => 'redefine weight of the title',
				'id'      => $prefix . 'page_tagline_weight',
				'type'    => 'select',
				'options' => array(
					''   => esc_html__( 'Default', 'manual' ),
					'100'   => esc_html__( 'Thin 100', 'manual' ),
					'200' => esc_html__( 'Extra-Light 200', 'manual' ),
					'300'  => esc_html__( 'Light 300', 'manual' ),
					'400'  => esc_html__( 'Regular 400', 'manual' ),
					'500'  => esc_html__( 'Medium 500', 'manual' ),
					'600'  => esc_html__( 'Semi-Bold 600', 'manual' ),
					'700'  => esc_html__( 'Bold 700', 'manual' ),
					'800'  => esc_html__( 'Extra-Bold 800', 'manual' ),
					'900'  => esc_html__( 'Ultra-Bold 900', 'manual' ),
				),
				'default' => '',
			),
			array(
				'name'    => 'Custom Title Font Family',
				'desc'    => 'redefine font for the title',
				'id'      => $prefix . 'page_tagline_font_family',
				'type'    => 'select',
				'options' => array(
					''   => esc_html__( 'Default', 'manual' ),
					'Roboto'  => esc_html__( 'Roboto', 'manual' ),
				),
				'default' => '',
			),
			array(
				'name' => 'Description',
				'desc' => 'Your new page Description (will appear under title)',
				'id'   => $prefix . 'page_desc',
				'type' => 'text',
			),
			array(
				'name' => 'Description Color',
				'desc' => '<strong>Default: #989CA6</strong> (NOTE: for image background use #FFFFFF)',
				'id'   => $prefix . 'page_header_description_color',
				'type' => 'colorpicker',
			),
			array(
				'name'    => 'Text Align',
				'desc'    => 'Align title and description',
				'id'      => $prefix . 'text_align_title_and_desc',
				'type'    => 'select',
				'options' => array(
					'left'   => esc_html__( 'Left Align', 'manual' ),
					'center' => esc_html__( 'Center', 'manual' ),
					'right'  => esc_html__( 'Right Align', 'manual' ),
				),
				'default' => 'center',
			),
			array(
				'name' => 'Activate Search Box',
				'desc' => 'Will activate search box under title',
				'id' => $prefix . 'header_searh_box',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Re-adjust Header Padding (Height)',
				'desc' => '<strong>(omit px)</strong> (170 = standard home, 120 = standard inner header, 60 = standard normal)',
				'id' => $prefix . 'header_re_adjust_padding',
				'type' => 'text',
			),
			array(
				'name' => 'Page Header Image',
				'desc' => 'Upload image for your header <br>(Note: Does not work if, select <strong>Template as "Home Page" from the page attributes on the right side</strong>)',
				'id'   => $prefix . 'header_image',
				'type' => 'file',
			),
			array(
				'name' => 'Apply Parallax Effect For the Upload Image',
				'desc' => 'Parallax effect for the upload image',
				'id' => $prefix . 'header_parallax_effect',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Slider Shortcode',
				'desc' => '<strong>Will replace header image (Copy and paste your shortcode located in "Slider Revolution -> Slider Revolution -> Embed Slider")</strong>',
				'default' => '',
				'id' => $prefix . 'slider_rev_shortcode',
				'type' => 'text'
			),
			
		),
	);
	return $meta_boxes;
}
/**
 * Pages Option - 2
 */
add_filter( 'cmb_meta_boxes', 'manual_page_footer_metaboxes' );
function manual_page_footer_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	$meta_boxes[] = array(
		'id'         => 'page_footer_options',
		'title'      => 'Page Footer Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
				
				array(
				'name' => 'Forcely De-activate Footer Notification Bar',
				'desc' => 'Will de-activate footer message box',
				'id' => $prefix . 'footer_force_hide_msg_box',
				'type' => 'checkbox',
				),
				
				array(
				'name' => 'Forcely De-activate Footer Widget Area',
				'desc' => 'Will de-activate footer widget area',
				'id' => $prefix . 'footer_force_hide_widget_area',
				'type' => 'checkbox',
				),
		
		),
	);
	return $meta_boxes;
}



/**
 * KNOWLEDGEBASE :: ADD - 1
 */
add_filter( 'cmb_meta_boxes', 'manual_kb_metaboxes' );
function manual_kb_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	$meta_boxes[] = array(
		'id'         => 'page_options',
		'title'      => 'Page Options',
		'pages'      => array( 'manual_kb' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			
			array(
				'name' => 'Header Image',
				'desc' => 'Upload post header image (use only if required)',
				'id'   => $prefix . 'header_image',
				'type' => 'file',
			),

		),
	);
	return $meta_boxes;
}
/**
 * KNOWLEDGEBASE :: ADD - 2
 */
add_filter( 'cmb_meta_boxes', 'manual_kb_two_metaboxes' );
function manual_kb_two_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	$meta_boxes[] = array(
		'id'         => 'kb_add_files',
		'title'      => 'Attached Files',
		'pages'      => array( 'manual_kb' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
							array(
								'name' => 'Allow attached files access to only login users',
								'desc' => 'If checked only login users can download attachment',
								'id' => $prefix . 'attachement_access_status',
								'type' => 'checkbox'
							),
							
							array(
								'name' => 'Login Message',
								'desc' => 'Your short description',
								'id' => $prefix . 'attachement_access_login_msg',
								'type' => 'text'
							),
					
							array(
								'id'          => $prefix . 'custom_post_attached_files',
								'type'        => 'group',
								//'description' => __( 'Generates reusable form entries', 'cmb2' ),
								'options'     => array(
									//'group_title'   => __( 'Entry {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
									'add_button'    => __( 'Add Another File', 'cmb2' ),
									'remove_button' => __( 'Remove Add File', 'cmb2' ),
									'sortable'      => true, // beta
								),
								// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
								'fields'      => array(
								
									array(
										'name' => 'Files/Image',
										'id'   => 'image',
										'type' => 'file',
									),
					
								),
							),
		
		
		),
	);
	return $meta_boxes;
}


/**
 * PORTFOLIO :: ADD - 1
 */
add_filter( 'cmb_meta_boxes', 'manual_portfolio_page_initial_metaboxes' );
function manual_portfolio_page_initial_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	$meta_boxes[] = array(
		'id'         => 'portfolio_page_redirect_options',
		'title'      => 'Portfolio :: Redirect',
		'pages'      => array( 'manual_portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
			array(
				'name' => 'Custom Redirect Link URL',
				'desc' => 'Custom redirect link to the portfolio details page',
				'id' => $prefix . 'portfolio_redirect_link_url',
				'type' => 'text'
			),
			

		),
	);
	return $meta_boxes;
}


/**
 * PORTFOLIO :: ADD - 1
 */
add_filter( 'cmb_meta_boxes', 'manual_portfolio_page_metaboxes' );
function manual_portfolio_page_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	$meta_boxes[] = array(
		'id'         => 'portfolio_page_display_options',
		'title'      => 'Portfolio :: Page Display Option',
		'pages'      => array( 'manual_portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
			array(
				'name'    => 'Page Template',
				'desc'    => 'Select an option',
				'id'      => $prefix . 'portfolio_page_type',
				'type'    => 'select',
				'options' => array(
					'1' => __( 'Full Width', 'cmb2' ),
					'2' => __( 'Sidebar Right', 'cmb2' ),
					'3' => __( 'Sidebar Left', 'cmb2' ),
				),
				'default' => '2',
			),
			
			

		),
	);
	return $meta_boxes;
}
/**
 * PORTFOLIO :: ADD - 2
 */
add_filter( 'cmb_meta_boxes', 'manual_portfolio_two_metaboxes' );
function manual_portfolio_two_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	$meta_boxes[] = array(
		'id'         => 'portfolio_extra_controls',
		'title'      => 'Portfolio :: Display Control',
		'pages'      => array( 'manual_portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
			array(
				'name'    => 'Activate  Like/Dislike',
				'desc'    => 'Display visitors control like/dislike post',
				'id'      => $prefix . 'portfolio_like_dislike_post',
				'type'    => 'select',
				'options' => array(
					'1' => __( 'ON', 'cmb2' ),
					'2' => __( 'OFF', 'cmb2' ),
				),
				'default' => '2',
			),
			
			array(
				'name'    => 'Activate Post Infomation',
				'desc'    => 'Display (post views, post date, author, likes) Stats',
				'id'      => $prefix . 'portfolio_stats_status',
				'type'    => 'select',
				'options' => array(
					'1' => __( 'ON', 'cmb2' ),
					'2' => __( 'OFF', 'cmb2' ),
				),
				'default' => '2',
			),
			
			array(
				'name'    => 'Activate Social Share',
				'desc'    => 'Display post social share',
				'id'      => $prefix . 'portfolio_social_share_status',
				'type'    => 'select',
				'options' => array(
					'1' => __( 'ON', 'cmb2' ),
					'2' => __( 'OFF', 'cmb2' ),
				),
				'default' => '1',
			),
			
			array(
				'name'    => 'Activate Search Box',
				'desc'    => 'Display search box',
				'id'      => $prefix . 'portfolio_search_box_status',
				'type'    => 'select',
				'options' => array(
					'1' => __( 'ON', 'cmb2' ),
					'2' => __( 'OFF', 'cmb2' ),
				),
				'default' => '2',
			),
			

		),
	);
	return $meta_boxes;
}
/**
 * PORTFOLIO :: ADD - 3
 */
add_filter( 'cmb_meta_boxes', 'manual_portfolio_metaboxes' );
function manual_portfolio_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	$meta_boxes[] = array(
		'id'         => 'portfolio_header_options',
		'title'      => 'Portfolio :: Page Header Controls',
		'pages'      => array( 'manual_portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
			array(
				'name' => 'Disable Header Text',
				'desc' => 'If checked no any text ( title/page tagline & description ) will appear on the page header',
				'id' => $prefix . 'portfolio_header_text_on',
				'type' => 'checkbox'
			),
			
			array(
				'name' => 'Page Tagline',
				'desc' => 'Your new page tagline',
				'id' => $prefix . 'portfolio_tagline',
				'type' => 'text'
			),
			
			array(
				'name' => 'Page Short Description',
				'desc' => 'Your Short Descriptione (will appear below Page Tagline )',
				'id' => $prefix . 'portfolio_description',
				'type' => 'text'
			),
			
			array(
				'name' => 'Header Image',
				'desc' => 'Header image for the post',
				'id'   => $prefix . 'header_image',
				'type' => 'file',
			),

		),
	);
	return $meta_boxes;
}
/**
 * PORTFOLIO :: ADD - 4
 */
add_filter( 'cmb_meta_boxes', 'manual_portfolio_desc_and_link_metaboxes' );
function manual_portfolio_desc_and_link_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	$meta_boxes[] = array(
		'id'         => 'portfolio_desc_and_link',
		'title'      => 'Portfolio :: Description and Link',
		'pages'      => array( 'manual_portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
				array(
					'name' => 'Disable Feature ',
					'desc' => 'If checked current section (Portfolio :: Description and Link) will go inactive',
					'id' => $prefix . 'portfolio_desc_and_link_status',
					'type' => 'checkbox'
				),
		
				array(
					'name' => 'Text Title',
					'desc' => 'Will appear as title on the sidebar section or at the top based on the choosen page template.',
					'id' => $prefix . 'portfolio_widget_title',
					'type' => 'text'
				),
				
				array(
					'name' => 'Description',
					'desc' => 'Your short description',
					'id' => $prefix . 'portfolio_widget_description',
					'type' => 'textarea'
				),
				
				
				array(
					'name' => 'Link Button Text',
					'desc' => 'Your link URL text (example: DOWNLOAD NOW)',
					'id' => $prefix . 'portfolio_widget_link_button_text',
					'type' => 'text'
				),
				
				array(
					'name' => __( 'Link URL', 'cmb2' ),
					'id'   => $prefix . 'portfolio_widget_link_url',
					'type' => 'text_url',
					//'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
				),		
		
		),
	);
	return $meta_boxes;
}
/**
 * PORTFOLIO :: ADD - 5
 */
add_filter( 'cmb_meta_boxes', 'manual_portfolio_four_metaboxes' );
function manual_portfolio_four_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	$meta_boxes[] = array(
		'id'         => 'portfolio_add_images',
		'title'      => 'Portfolio :: Images',
		'pages'      => array( 'manual_portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
							array(
								'id'          => $prefix . 'portfolio_images',
								'type'        => 'group',
								//'description' => __( 'Generates reusable form entries', 'cmb2' ),
								'options'     => array(
									//'group_title'   => __( 'Entry {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
									'add_button'    => __( 'Add Another Entry', 'cmb2' ),
									'remove_button' => __( 'Remove Entry', 'cmb2' ),
									'sortable'      => true, // beta
								),
								// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
								'fields'      => array(
								
									array(
										'name' => 'Entry Image',
										'id'   => 'image',
										'type' => 'file',
									),
					
								),
							),
		
		
		),
	);
	return $meta_boxes;
}


/**
 * DOC :: ADD - 1
 */
add_filter( 'cmb_meta_boxes', 'manual_doc_metaboxes' );
function manual_doc_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	$meta_boxes[] = array(
		'id'         => 'doc_add_files',
		'title'      => 'Attached Files',
		'pages'      => array( 'manual_documentation' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
		
							array(
								'name' => 'Allow attached files access to only login users',
								'desc' => 'If checked only login users can download attachment',
								'id' => $prefix . 'attachement_access_status',
								'type' => 'checkbox'
							),
							
							array(
								'name' => 'Login Message',
								'desc' => 'Your short description',
								'id' => $prefix . 'attachement_access_login_msg',
								'type' => 'text'
							),
		
		
							array(
								'id'          => $prefix . 'custom_post_attached_files',
								'type'        => 'group',
								//'description' => __( 'Generates reusable form entries', 'cmb2' ),
								'options'     => array(
									//'group_title'   => __( 'Entry {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
									'add_button'    => __( 'Add Another File', 'cmb2' ),
									'remove_button' => __( 'Remove Add File', 'cmb2' ),
									'sortable'      => true, // beta
								),
								// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
								'fields'      => array(
								
									array(
										'name' => 'Files/Image',
										'id'   => 'image',
										'type' => 'file',
									),
					
								),
							),
		
		
		),
	);
	return $meta_boxes;
}




/**
 * DOC CAT
 */
 
/** Add Custom Field To Category Form */
add_action( 'manualdocumentationcategory_add_form_fields', 'manual_doc_category_field_add', 10 );
add_action( 'manualdocumentationcategory_edit_form_fields', 'manual_doc_category_field_edit', 10, 2 );
 
function manual_doc_category_field_add( $taxonomy ) {
	global $wp_roles;
?>
<div style="background: #F8F7F7; border: 1px solid #E4E4E4;  padding: 8px 5px 5px 20px; margin:20px 0px;">
<h3>Documentation Access Control</h3>
<div class="form-field">
  <input type="checkbox" name="doc_cat_check_login" id="doc_cat_check_login" value="1" />
  <span><strong>Allow access only for the login users</strong></span>
  <p class="description">Only login users can have access</p>
</div>

<div class="form-field">
<div><strong>User Role</strong></div>
<?php 
$wp_roles = new WP_Roles();
$roles = $wp_roles->get_names();
foreach ($roles as $role_value => $role_name) {
	echo '<p><input type="checkbox" name="user_role['.$role_value.']" id="user_role['.$role_value.']" value="' . $role_value . '">'.$role_name.'</p>';
}
?>
<br>
<p class="description">Documentation will limit to above define user roles</p>
</div>

<div class="form-field">
  <span><strong>Login Message</strong></span>
  <input type="text" name="doc_cat_login_message" id="doc_cat_login_message" />
</div>

<!--On/Off Controls-->
<h3 style="border-bottom: 1px solid #e1e1e1;padding-bottom: 8px;margin-top: 40px;border-width: medium;">On/Off Controls</h3>
<div class="form-field">
  <input type="checkbox" name="doc_cat_disable_search" id="doc_cat_disable_search" value="1" />
  <span><strong>Disable Search</strong></span>
  <p class="description">Disable search bar from the header</p>
</div>
<div class="form-field">
  <input type="checkbox" name="doc_cat_disable_breadcrumb" id="doc_cat_disable_breadcrumb" value="1" />
  <span><strong>Disable Breadcrumb</strong></span>
  <p class="description">Disable breadcrumb link from the header</p>
</div>

<!--Header Design Controls-->
<h3 style="border-bottom: 1px solid #e1e1e1;padding-bottom: 8px;margin-top: 40px;border-width: medium;">Header Design Controls</h3>
<div class="form-field">
  <span><strong>Height (padding top/bottom)</strong></span>
  <input type="text" name="doc_cat_header_height" id="doc_cat_header_height" value="" />
  <p class="description">Default: 120px (equal top bottom padding)</p>
</div>

<div class="form-field">
  <span><strong>Text Align</strong></span>
  <select name="doc_cat_header_text_align" id="doc_cat_header_text_align">
  <option value="left">Left</option>
  <option value="center" selected="selected">Center</option>
  <option value="right">Right</option>
  </select>
  <p class="description">Default: center</p>
</div>

<div class="form-field">
  <span><strong>Title Font Size</strong></span>
  <input type="text" name="doc_cat_header_title_font_size" id="doc_cat_header_title_font_size" value="" />
  <p class="description">Default: 36px </p>
</div>

<div class="form-field">
  <span><strong>Title Letter Spacing</strong></span>
  <input type="text" name="doc_cat_header_title_font_letter_spacing" id="doc_cat_header_title_font_letter_spacing" value="" />
  <p class="description">Default: 1px </p>
</div>

<div class="form-field">
  <span><strong>Title Text Transform</strong></span>
  <select name="doc_cat_header_text_text_transform" id="doc_cat_header_text_text_transform">
  <option value="none">None</option>
  <option value="capitalize" selected="selected">Capitalize</option>
  <option value="uppercase">Uppercase</option>
  </select>
  <p class="description">Default: Capitalize</p>
</div>

<div class="form-field">
  <span><strong>Title Font Weight</strong></span>
  <select name="doc_cat_header_title_font_weight" id="doc_cat_header_title_font_weight">
  <option value="100">100</option>
  <option value="200">200</option>
  <option value="300">300</option>
  <option value="400" selected="selected">400</option>
  <option value="500">500</option>
  <option value="600">600</option>
  <option value="700">700</option>
  <option value="800">800</option>
  <option value="900">900</option>
  </select>
  <p class="description">Default: 400</p>
</div>



</div>
<?php
}

function manual_doc_category_field_edit( $tag, $taxonomy ) {
	global $wp_roles;
	
    $option_name = 'doc_cat_check_login_' . $tag->term_id;
    $category_custom_order = get_option( $option_name );
	
	$option_role = 'doc_cat_user_role_' . $tag->term_id;
    $accessby_user_role = get_option( $option_role );
	
    $option_name_msg = 'doc_cat_login_message_' . $tag->term_id;
    $category_custom_login_message = get_option( $option_name_msg );
	
	$search_status = 'doc_cat_disable_search_' . $tag->term_id;
    $category_search_status = get_option( $search_status );
	
	$breadcrumb_status = 'doc_cat_disable_breadcrumb_' . $tag->term_id;
    $category_breadcrumb_status = get_option( $breadcrumb_status );
	
    $header_height = 'doc_cat_header_height_' . $tag->term_id;
    $category_header_height = get_option( $header_height );
	
	$header_text_align = 'doc_cat_header_text_align_' . $tag->term_id;
    $category_header_text_align = get_option( $header_text_align );
	
	$header_main_title_font_size = 'doc_cat_header_title_font_size_' . $tag->term_id;
    $category_header_title_font_size = get_option( $header_main_title_font_size );
	
	$header_main_title_font_letter_spacing = 'doc_cat_header_title_font_letter_spacing_' . $tag->term_id;
    $category_header_title_letter_spacing = get_option( $header_main_title_font_letter_spacing );
	
	$header_main_title_font_text_transform = 'doc_cat_header_text_text_transform_' . $tag->term_id;
    $category_header_title_text_transform = get_option( $header_main_title_font_text_transform );
	
	$header_main_title_font_font_weight = 'doc_cat_header_title_font_weight_' . $tag->term_id;
    $category_header_title_font_weight = get_option( $header_main_title_font_font_weight );
	
?>
<tr class="form-field">
  <th scope="row" valign="top"><label for="category_custom_order">Category access</label></th>
  <td>
    <input type="checkbox" name="doc_cat_check_login" id="doc_cat_check_login" value="1" <?php echo esc_attr( $category_custom_order == 1 ) ? 'checked' : ''; ?> />
    <span class="description">Only for the login users</span>
  </td>
</tr>

<tr class="form-field">
  <th scope="row" valign="top"><label for="category_user_access">User Role</label></th>
  <td>
    <?php 
	$wp_roles = new WP_Roles();
	$roles = $wp_roles->get_names();
	$current_value = unserialize($accessby_user_role);
	foreach ($roles as $role_value => $role_name) {
		if ( $current_value != '' && in_array($role_value, $current_value)) $checked = 'checked';
		else $checked = '';
		echo '<p><input type="checkbox" '.$checked.' name="user_role['.$role_value.']" id="user_role['.$role_value.']" value="' . $role_value . '">'.$role_name.'</p>';
  	}
	?>
  </td>
</tr>

<tr class="form-field">
  <th scope="row" valign="top"><label for="category_login_message">Login Message</label></th>
  <td>
    <input type="text" name="doc_cat_login_message" id="doc_cat_login_message" value="<?php echo $category_custom_login_message; ?>" />
  </td>
</tr>

<!--Other Controls-->
<tr class="form-field">
  <th scope="row" valign="top"><label for="doc_cat_disable_search">Disable Search</label></th>
  <td>
    <input type="checkbox" name="doc_cat_disable_search" id="doc_cat_disable_search" value="1" <?php echo esc_attr( $category_search_status == 1 ) ? 'checked' : ''; ?> />
    <span class="description">Disable search bar from the header</span>
  </td>
</tr>

<tr class="form-field">
  <th scope="row" valign="top"><label for="doc_cat_disable_breadcrumb">Disable Breadcrumb</label></th>
  <td>
    <input type="checkbox" name="doc_cat_disable_breadcrumb" id="doc_cat_disable_breadcrumb" value="1" <?php echo esc_attr( $category_breadcrumb_status == 1 ) ? 'checked' : ''; ?> />
    <span class="description">Disable breadcrumb link from the header</span>
  </td>
</tr>

<!--Header Design Controls-->
<tr class="form-field">
  <th scope="row" valign="top"><label for="doc_cat_header_height">Height (padding top/bottom)</label></th>
  <td>
    <input type="text" name="doc_cat_header_height" id="doc_cat_header_height" value="<?php echo ($category_header_height?$category_header_height:''); ?>" />
    <span class="description">Default: 120px (equal top bottom padding)</span>
  </td>
</tr>

<tr class="form-field">
  <th scope="row" valign="top"><label for="doc_cat_header_text_align">Text Align</label></th>
  <td>
   <select name="doc_cat_header_text_align" id="doc_cat_header_text_align">
   <option value="center" <?php if($category_header_text_align == 'center') echo 'selected'; ?>>Center</option>
   <option value="left" <?php if($category_header_text_align == 'left') echo 'selected'; ?>>Left</option>
   <option value="right" <?php if($category_header_text_align == 'right') echo 'selected'; ?>>Right</option>
   </select>
    <span class="description">Default: center</span>
  </td>
</tr>


<tr class="form-field">
  <th scope="row" valign="top"><label for="doc_cat_header_title_font_size">Title Font Size</label></th>
  <td>
    <input type="text" name="doc_cat_header_title_font_size" id="doc_cat_header_title_font_size" value="<?php echo ($category_header_title_font_size?$category_header_title_font_size:''); ?>" />
    <span class="description">Default: 36px</span>
  </td>
</tr>



<tr class="form-field">
  <th scope="row" valign="top"><label for="doc_cat_header_title_font_letter_spacing">Letter Spacing</label></th>
  <td>
    <input type="text" name="doc_cat_header_title_font_letter_spacing" id="doc_cat_header_title_font_letter_spacing" value="<?php echo ($category_header_title_letter_spacing?$category_header_title_letter_spacing:''); ?>" />
    <span class="description">Default: 1px</span>
  </td>
</tr>

<tr class="form-field">
  <th scope="row" valign="top"><label for="doc_cat_header_text_text_transform">Text Transform</label></th>
  <td>
   <select name="doc_cat_header_text_text_transform" id="doc_cat_header_text_text_transform">
   <option value="capitalize" <?php if($category_header_title_text_transform == 'capitalize') echo 'selected'; ?>>Capitalize</option>
   <option value="none" <?php if($category_header_title_text_transform == 'none') echo 'selected'; ?>>None</option>
   <option value="uppercase" <?php if($category_header_title_text_transform == 'uppercase') echo 'selected'; ?>>Uppercase</option>
   </select>
    <span class="description">Default: Capitalize</span>
  </td>
</tr>

<tr class="form-field">
  <th scope="row" valign="top"><label for="doc_cat_header_title_font_weight">Font Weight</label></th>
  <td>
   <select name="doc_cat_header_title_font_weight" id="doc_cat_header_title_font_weight">
   <option value="100" <?php if($category_header_title_font_weight == '100') echo 'selected'; ?>>100</option>
   <option value="200" <?php if($category_header_title_font_weight == '200') echo 'selected'; ?>>200</option>
   <option value="300" <?php if($category_header_title_font_weight == '300') echo 'selected'; ?>>300</option>
   <option value="400" <?php echo ($category_header_title_font_weight == ''?'selected':($category_header_title_font_weight == '400'?'selected':'')); ?>>400</option>
   <option value="500" <?php if($category_header_title_font_weight == '500') echo 'selected'; ?>>500</option>
   <option value="600" <?php if($category_header_title_font_weight == '600') echo 'selected'; ?>>600</option>
   <option value="700" <?php if($category_header_title_font_weight == '700') echo 'selected'; ?>>700</option>
   <option value="800" <?php if($category_header_title_font_weight == '800') echo 'selected'; ?>>800</option>
   <option value="900" <?php if($category_header_title_font_weight == '900') echo 'selected'; ?>>900</option>
   </select>
    <span class="description">Default: 400</span>
  </td>
</tr>

<?php
}
 
/** Save Custom Field Of Category Form */
add_action( 'created_manualdocumentationcategory', 'manual_doc_category_field_save', 10, 2 ); 
add_action( 'edited_manualdocumentationcategory', 'manual_doc_category_field_save', 10, 2 );
 
function manual_doc_category_field_save( $term_id, $tt_id ) {
	$option_name = 'doc_cat_check_login_' . $term_id;
	$option_role = 'doc_cat_user_role_' . $term_id;
	$option_login_message = 'doc_cat_login_message_' . $term_id;
	// other controls
	$option_search_status = 'doc_cat_disable_search_' . $term_id;
	$option_breadcrumb_status = 'doc_cat_disable_breadcrumb_' . $term_id;
	// header design control
	$option_header_height = 'doc_cat_header_height_' . $term_id;
	$option_header_text_align = 'doc_cat_header_text_align_' . $term_id;
	$option_header_title_font_size = 'doc_cat_header_title_font_size_' . $term_id;
	$option_header_title_font_letter_spacing = 'doc_cat_header_title_font_letter_spacing_' . $term_id;
	$option_header_title_font_text_transform = 'doc_cat_header_text_text_transform_' . $term_id;
	$option_header_title_font_font_weight = 'doc_cat_header_title_font_weight_' . $term_id;
	
	
	if ( isset( $_POST['doc_cat_check_login'] ) && $_POST['doc_cat_check_login'] != '' ) {           
        update_option( $option_name, $_POST['doc_cat_check_login'] );
    } else {
        update_option( $option_name, '' );
	}
	
	if ( isset( $_POST['user_role'] ) && $_POST['user_role'] != '' ) {           
        update_option( $option_role, serialize($_POST['user_role']) );
    } else {
        update_option( $option_role, '' );
	}
	
    if ( isset( $_POST['doc_cat_login_message'] ) && $_POST['doc_cat_login_message'] != '' ) {           
        update_option( $option_login_message, stripslashes($_POST['doc_cat_login_message']) );
    } else {
        update_option( $option_login_message, '' );
	}
	
	// other controls
	if ( isset( $_POST['doc_cat_disable_search'] ) && $_POST['doc_cat_disable_search'] != '' ) {           
        update_option( $option_search_status, $_POST['doc_cat_disable_search'] );
    } else {
        update_option( $option_search_status, '' );
	}
	
	if ( isset( $_POST['doc_cat_disable_breadcrumb'] ) && $_POST['doc_cat_disable_breadcrumb'] != '' ) {           
        update_option( $option_breadcrumb_status, $_POST['doc_cat_disable_breadcrumb'] );
    } else {
        update_option( $option_breadcrumb_status, '' );
	}
	
	// header design control
    if ( isset( $_POST['doc_cat_header_height'] ) && $_POST['doc_cat_header_height'] != '' ) {           
        update_option( $option_header_height, stripslashes($_POST['doc_cat_header_height']) );
    } else {
        update_option( $option_header_height, '' );
	}
	
    if ( isset( $_POST['doc_cat_header_text_align'] ) && $_POST['doc_cat_header_text_align'] != '' ) {           
        update_option( $option_header_text_align, stripslashes($_POST['doc_cat_header_text_align']) );
    } else {
        update_option( $option_header_text_align, '' );
	}
	
    if ( isset( $_POST['doc_cat_header_title_font_size'] ) && $_POST['doc_cat_header_title_font_size'] != '' ) {           
        update_option( $option_header_title_font_size, stripslashes($_POST['doc_cat_header_title_font_size']) );
    } else {
        update_option( $option_header_title_font_size, '' );
	}
	
    if ( isset( $_POST['doc_cat_header_title_font_letter_spacing'] ) && $_POST['doc_cat_header_title_font_letter_spacing'] != '' ) {           
        update_option( $option_header_title_font_letter_spacing, stripslashes($_POST['doc_cat_header_title_font_letter_spacing']) );
    } else {
        update_option( $option_header_title_font_letter_spacing, '' );
	}
	
    if ( isset( $_POST['doc_cat_header_text_text_transform'] ) && $_POST['doc_cat_header_text_text_transform'] != '' ) {           
        update_option( $option_header_title_font_text_transform, stripslashes($_POST['doc_cat_header_text_text_transform']) );
    } else {
        update_option( $option_header_title_font_text_transform, '' );
	}
	
    if ( isset( $_POST['doc_cat_header_title_font_weight'] ) && $_POST['doc_cat_header_title_font_weight'] != '' ) {           
        update_option( $option_header_title_font_font_weight, stripslashes($_POST['doc_cat_header_title_font_weight']) );
    } else {
        update_option( $option_header_title_font_font_weight, '' );
	}
	
	
}
?>