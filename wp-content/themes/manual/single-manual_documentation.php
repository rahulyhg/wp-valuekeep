<?php 
get_header();  
// Get needed extra meta
global $theme_options;
if( isset( $theme_options['documentation-record-display-order'] ) && $theme_options['documentation-record-display-order'] != '' ) {
	$display_order_doc = $theme_options['documentation-record-display-order'];	
} else {
	$display_order_doc = 'ASC';	
}
if( isset( $theme_options['documentation-record-display-order-by'] ) && $theme_options['documentation-record-display-order-by'] != '' ) {
	$display_order_doc_by = $theme_options['documentation-record-display-order-by'];	
}

$terms = wp_get_post_terms($post->ID, 'manualdocumentationcategory');
$_COOKIE['manualDocSingleID'] = $post->ID;
$st_term_data =	$wp_query->queried_object;
$term_slug = $terms[0]->slug;
$current_term = $terms[0];
$term_id = $current_term->term_id; // cat id
$post_info = get_post_type( $post );

?>
<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break">
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-12 col-sm-12 header-text-align">
        <h1 class="inner-header">
          <?php echo $terms[0]->name; ?>
        </h1>
        <p class="inner-header-color">
          <?php manual_breadcrumb(); ?>
        </p>
        <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 search-margin-top">
          <div class="global-search">
            <?php get_template_part( 'search', 'home' ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<?php 
$check_if_login_call = '';
$check_if_login_call = get_option( 'doc_cat_check_login_'.$terms[0]->term_id );
$check_user_role = get_option( 'doc_cat_user_role_'.$terms[0]->term_id );
$custom_login_message = get_option( 'doc_cat_login_message_'.$terms[0]->term_id );
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
		?>
        <script>
		jQuery(document).ready(function() { 
			"use strict";
			jQuery("#list-manual li a").removeClass('doc-active');
			jQuery("a[rel='<?php echo $_COOKIE['manualDocSingleID']; ?>']").addClass('doc-active');
			
			jQuery("a[rel='<?php echo $_COOKIE['manualDocSingleID']; ?>']").parentsUntil('#list-manual', 'ul').slideDown(300).each(function(index, ele) {
				jQuery(ele).prev('a').addClass('dataicon');
			});
		});
		</script>
        <?php 
		    $post = get_post( $_COOKIE['manualDocSingleID']);
			get_template_part( 'single', 'manualdoc' );
			wp_reset_postdata(); 
		?>
    </div>
  </div>
</div>
<?php }} get_footer(); ?>