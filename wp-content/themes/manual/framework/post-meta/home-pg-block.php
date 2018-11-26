<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'manual_home_page_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function manual_home_page_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';

	
	$meta_boxes[] = array(
		'id'         => 'homeblock_meta',
		'title'      => esc_html__( 'Home Page Help Options', 'manual' ),
		'pages'      => array( 'manual_hp_block' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Block Icon Name',
				'desc' => 'Enter <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href="https://www.elegantthemes.com/blog/resources/elegant-icon-font" target="_blank">elegant icon font</a> name -OR- <br>Enter <a href="http://demo.wpsmartapps.com/themes/manual/et-line-font/" target="_blank">et line font</a> name',
				'id' => $prefix . 'hpblock_icon',
				'type' => 'text',
			),
			array(
				'name' => 'Block Text',
				'desc' => 'The text below the block heading (optional)',
				'id' => $prefix . 'hpblock_text',
				'type' => 'wysiwyg',
				'options' => array(	'textarea_rows' => 5, ),
				),
			array(
				'name' => 'Link URL',
				'desc' => 'Link the block (optional)',
				'id' => $prefix . 'hpblock_link',
				'type' => 'text_medium',
				),
			array(
				'name' => 'Link Text',
				'desc' => 'Will replace Browse .... ',
				'id' => $prefix . 'hpblock_link_text',
				'type' => 'text_medium',
				),
		),
		
	);
	
	// Add other metaboxes as needed

	return $meta_boxes;
}










/*HOME ORG BLOCKS*/

add_filter( 'cmb_meta_boxes', 'manual_home_org_page_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function manual_home_org_page_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';

	
	$meta_boxes[] = array(
		'id'         => 'home_org_block_meta',
		'title'      => esc_html__( 'Organization Blocks', 'manual' ),
		'pages'      => array( 'manual_org_block' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Block Icon Name',
				'desc' => 'Enter <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href="https://www.elegantthemes.com/blog/resources/elegant-icon-font" target="_blank">elegant icon font</a> name -OR- <br>Enter <a href="http://demo.wpsmartapps.com/themes/manual/et-line-font/" target="_blank">et line font</a> name',
				'id' => $prefix . 'hpblock_icon',
				'type' => 'text',
			),
			array(
				'name' => 'Block Text',
				'desc' => 'The text below the block heading (optional)',
				'id' => $prefix . 'hpblock_text',
				'type' => 'wysiwyg',
				'options' => array(	'textarea_rows' => 5, ),
				),
		),

	);
	
	// Add other metaboxes as needed

	return $meta_boxes;
}







/*Testimonial*/

add_filter( 'cmb_meta_boxes', 'manual_home_testimonial_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function manual_home_testimonial_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';

	
	$meta_boxes[] = array(
		'id'         => 'home_testimonial_meta',
		'title'      => esc_html__( 'Testimonial', 'manual' ),
		'pages'      => array( 'manual_tmal_block' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
		
			/*array(
				'name' => 'Image',
				'desc' => 'Upload an image or enter an URL.',
				'id'   => $prefix . 'person_image',
				'type' => 'file',
			),*/
		
			array(
				'name' => 'Person Name',
				'id' => $prefix . 'hpblock_name',
				'type' => 'text',
			),
			array(
				'name' => 'Message',
				'desc' => 'The text below the block heading (optional)',
				'id' => $prefix . 'hpblock_text',
				'type' => 'wysiwyg',
				'options' => array(	'textarea_rows' => 5, ),
				),
		),

	);
	
	// Add other metaboxes as needed

	return $meta_boxes;
}












/*Team*/

add_filter( 'cmb_meta_boxes', 'manual_ourteam_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function manual_ourteam_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';

	
	$meta_boxes[] = array(
		'id'         => 'page_ourteam_meta',
		'title'      => esc_html__( 'Team Member', 'manual' ),
		'pages'      => array( 'manual_ourteam' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
		
			array(
				'name' => 'Image',
				'desc' => 'Upload an image or enter an URL.',
				'id'   => $prefix . 'ourteam_image',
				'type' => 'file',
			),
		
			array(
				'name' => 'Person Name',
				'id' => $prefix . 'ourteam_name',
				'type' => 'text',
			),
			
			array(
				'name' => 'Job Title',
				'id' => $prefix . 'ourteam_position',
				'type' => 'text',
			),
			
			
		),

	);
	
	// Add other metaboxes as needed

	return $meta_boxes;
}


?>