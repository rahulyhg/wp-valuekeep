<?php 
get_header();  
// Get needed extra meta
global $theme_options;
$header_text_size = $header_text_letter_spacing = $header_title_text_transform = $header_font_text_weight = '';
if( isset( $theme_options['documentation-record-display-order'] ) && $theme_options['documentation-record-display-order'] != '' ) {
	$display_order_doc = $theme_options['documentation-record-display-order'];	
} else {
	$display_order_doc = 'ASC';	
}
if( isset( $theme_options['documentation-record-display-order-by'] ) && $theme_options['documentation-record-display-order-by'] != '' ) {
	$display_order_doc_by = $theme_options['documentation-record-display-order-by'];	
}

$st_term_data =	$wp_query->queried_object;
$term_slug = get_query_var( 'term' );
$current_term = get_term_by( 'slug', $term_slug, 'manualdocumentationcategory' );
$term_id = $current_term->term_id; // cat id
$post_info = get_post_type( $post );

// other controls
$display_search_status = get_option( 'doc_cat_disable_search_'.$current_term->term_id );
$display_breadcrumb_status = get_option( 'doc_cat_disable_breadcrumb_'.$current_term->term_id );
$header_height_control = get_option( 'doc_cat_header_height_'.$current_term->term_id );
if( $header_height_control == '' ) {
	$header_height_control = '120px';
} else {
	$header_height_control = $header_height_control;
}
$header_text_align = get_option( 'doc_cat_header_text_align_'.$current_term->term_id );
if( $header_text_align == 'center' ) {
	$header_text_align = 'center';
	$header_search_offset = 'col-md-offset-1';
	$header_search_offset_style = '';
	$header_search_offset_style_live_search = '';
} else if( $header_text_align == 'left' ) {
	$header_text_align = $header_text_align;
	$header_search_offset = '';
	$header_search_offset_style = 'style="padding-left:0px;"';
	$header_search_offset_style_live_search = 'left: 14px;"';
} else if( $header_text_align == 'right' ) {
	$header_text_align = $header_text_align;
	$header_search_offset = 'col-md-offset-2';
	$header_search_offset_style = 'style="padding-left:0px;"';
	$header_search_offset_style_live_search = 'left: 14px;"';
} else {
	$header_text_align = 'center';
	$header_search_offset = 'col-md-offset-1';
	$header_search_offset_style = '';
	$header_search_offset_style_live_search = '';
}
$header_text_font_size = get_option( 'doc_cat_header_title_font_size_'.$current_term->term_id );
if( $header_text_font_size != '' ) $header_text_size = 'font-size:'.$header_text_font_size.'!important;';
else $header_text_size = 'font-size:36px!important;';

$header_text_font_letter_spacing = get_option( 'doc_cat_header_title_font_letter_spacing_'.$current_term->term_id );
if( $header_text_font_letter_spacing != '' ) $header_text_letter_spacing = 'letter-spacing:'.$header_text_font_letter_spacing.';';

$header_text_font_text_transform = get_option( 'doc_cat_header_text_text_transform_'.$current_term->term_id );
if( $header_text_font_text_transform != '' ) $header_title_text_transform = 'text-transform:'.$header_text_font_text_transform.';';
else  $header_title_text_transform = 'text-transform:capitalize;';

$header_text_font_text_weight = get_option( 'doc_cat_header_title_font_weight_'.$current_term->term_id );
if( $header_text_font_text_weight != '' ) $header_font_text_weight = 'font-weight:'.$header_text_font_text_weight.';';
else $header_font_text_weight = 'font-weight:400;';

?>
<style>
#breadcrumbs { text-align: <?php echo $header_text_align; ?>; }
form.searchform i.livesearch { <?php echo $header_search_offset_style_live_search; ?> }
</style>
<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break" style="padding: <?php echo $header_height_control; ?> 0px!important;">
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-12 col-sm-12" style="text-align:<?php echo $header_text_align; ?>">
        <h1 class="inner-header" style=" <?php echo $header_text_size.' '.$header_text_letter_spacing.' '.$header_title_text_transform.' '.$header_font_text_weight; ?> ">
          <?php 
              $current_term = get_term_by( 'slug', get_query_var( 'term' ), 'manualdocumentationcategory' );
              echo $current_term->name; 
              ?>
        </h1>
        <?php if ( $display_breadcrumb_status != 1 ) { ?>
        <p class="inner-header-color">
          <?php manual_breadcrumb(); ?>
        </p>
        <?php } ?>
        <?php if ( $display_search_status != 1 ) { ?>
        <div class="col-md-10 col-sm-12 col-xs-12 <?php echo $header_search_offset; ?> search-margin-top" <?php echo $header_search_offset_style; ?>>
          <div class="global-search">
            <?php get_template_part( 'search', 'home' ); ?>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<?php 
$check_if_login_call = '';
$current_term_check_termID = get_term_by( 'slug', get_query_var( 'term' ), 'manualdocumentationcategory' );
$check_if_login_call = get_option( 'doc_cat_check_login_'.$current_term_check_termID->term_id );
$check_user_role = get_option( 'doc_cat_user_role_'.$current_term_check_termID->term_id );
$custom_login_message = get_option( 'doc_cat_login_message_'.$current_term_check_termID->term_id );
if( $check_if_login_call == 1 && !is_user_logged_in() ) {
?>
<div class="col-md-12 col-sm-12">
    <div class="manual_login_page">
      <div class="custom_login_form">
        <?php if( $custom_login_message != '' ) { ?>
        	<h3><?php echo stripslashes($custom_login_message); ?></h3> 
		<?php } ?>
        <?php wp_login_form(); ?>
        <ul class="custom_register">
        <?php if ( get_option( 'users_can_register' ) ) { wp_register(); } ?>
        <li><a href="<?php echo wp_lostpassword_url(); ?>" title="Lost Password"><?php esc_html_e( 'Lost Password', 'manual' ); ?></a></li>
        </ul>
      </div>
    </div>
</div>
<?php 
} else {
	$access_status = manual_doc_access($check_user_role);
	if( $access_status == false ) { 
		echo '<div class="doc_access_control"><p>';
		esc_html_e( 'You do not have sufficient permissions to access this documentation.', 'manual' );
		echo '</p></div>';
	} else {
?>
<aside class="col-md-4 col-sm-4" id="sidebar-box">
  <div class="custom-well blankbg sidebar-nav" style="padding-left:0px;">
  
    <div class="margin-btm-20">
        <span><a class="more-link doc-expandall" style="cursor:pointer;"><?php esc_html_e('Expand All',  'manual' ); ?></a></span>
        <span><a class="more-link doc-collapseall" style="cursor:pointer;display:none;"><?php esc_html_e('Collapse All',  'manual' ); ?></a></span>
    </div>         
    
    <!--Sidebar list-->
    <ul id="list-manual" class="toc-expandable page-doc <?php if ( $theme_options['documentation-menu-scroller-status'] == true ) { echo 'mCustomScrollbar'; } ?>" data-toc-depth-max="1">
      <?php 
		// Get posts per category
		$args = array( 
			'posts_per_page'   => -1,
			'post_type'  => $post_info,
			'orderby'    => $display_order_doc_by,
			'order'      => $display_order_doc,
			'tax_query' => array(
				array(
					'taxonomy' => 'manualdocumentationcategory',
					'field' => 'id',
					'include_children' => false,
					'terms' => $term_id,
				)
			)
		);
		$cat_posts = get_posts( $args );
		$i = 1;
		foreach( $cat_posts as $post ) : 
			if( $post->post_parent == 0 ) { 
				$count = manual_count_child_post($post, $post_info, $term_id);
				?>
                
      <li class="nav-header nav-header-sub" manual-topic-id="<?php echo $post->ID; ?>" manual-parent-id="<?php echo $post->ID; ?>" style="padding:3px 0px;"> 
      
      <a href="<?php the_permalink(); ?>" rel="<?php the_ID(); ?>" class="post-link <?php if( $i == 1 ) { echo 'doc-active';} ?> <?php if( count($count) > 0 ) { echo 'has-child';  } else { echo 'no-child'; } ?>  <?php if( $i == 1 && count($count) > 0 ) { echo 'open-ul-first';  } ?>" 
			  style=" <?php if( count($count) <= 0 ) {  ?> font-weight:normal;   <?php } ?>">
              
        <?php the_title(); ?>
        </a>
        <?php 
			  manual_documentation_cat_pages($post, $post_info, $term_id);
			$i++;}
			
			?>
      </li>
      <?php  endforeach;  ?>
    </ul>
    <!--Eof sidebar list--> 
  </div>
</aside>
<div class="col-md-8 col-sm-8">
  <div class="col-md-12">
    <div class="doc-single-post" id="single-post-container">
     <?php
	    // Display specific page
		if( (int) isset($_COOKIE['manualDocSingleID']) ) { 
		?>
        <script>
		jQuery(document).ready(function() { 
			"use strict";
			jQuery("#list-manual li a").removeClass('doc-active');
			jQuery("a[rel='<?php echo $_COOKIE['manualDocSingleID']; ?>']").addClass('doc-active');
			jQuery("#list-manual li a").addClass('dataicon');
			jQuery(".doc-expandall").hide();
			jQuery(".doc-collapseall").show();
			jQuery("#list-manual li").children('ul').slideDown(300);  
		});
		</script>
        <?php 
		    $post = get_post( $_COOKIE['manualDocSingleID']);
			get_template_part( 'single', 'manualdoc' );
			wp_reset_postdata(); 
	  } else { 
		// Get posts per category
		$content_args = array( 
			'posts_per_page'   => 1,
			'post_type'  => $post_info,
			'orderby'    => $display_order_doc_by,
			'order'      => $display_order_doc,
			'post_parent'  => 0,
			'tax_query' => array(
				array(
					'taxonomy' => 'manualdocumentationcategory',
					'field' => 'id',
					'include_children' => false,
					'terms' => $term_id,
				)
			)
		);
		$display_root_cat_posts = get_posts( $content_args );
		$new_count = 1;
		foreach( $display_root_cat_posts as $post ) : 
			if( $post->post_parent == 0 ) {
				if( $new_count > 1 ) break;
				get_template_part( 'single', 'manualdoc' );
			}
			$new_count++;
		endforeach;
		} 
		?>
    </div>
  </div>
</div>
<?php }} get_footer(); ?>