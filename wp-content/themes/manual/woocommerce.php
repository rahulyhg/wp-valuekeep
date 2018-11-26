<?php 
/**
 * woo page
 */
 
get_header();

global $theme_options;

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

// page header
$pagetitle_size = $auto_adjust_padding = $header_tagline_color = $header_description_color = $header_title_text_transform = '';
$pagetitle = get_post_meta( $woopage->ID, '_manual_page_tagline', true ); 
$pagetitle_size = get_post_meta( $woopage->ID, '_manual_page_tagline_size', true ); 

if( $pagetitle_size != '' ) { $pagetitle_size = $pagetitle_size; 
}

$pagetitle_weight = get_post_meta( $woopage->ID, '_manual_page_tagline_weight', true ); 

if( $pagetitle_weight != '' ) $pagetitle_weight = $pagetitle_weight;
else $pagetitle_weight = '400';

$pagetitle_font_family = get_post_meta( $woopage->ID, '_manual_page_tagline_font_family', true ); 
$searchbox = get_post_meta( $woopage->ID, '_manual_header_searh_box', true ); 
$revslider = get_post_meta($woopage->ID, "_manual_slider_rev_shortcode", true);
$text_align = get_post_meta($woopage->ID, "_manual_text_align_title_and_desc", true);
$readjust_padding = get_post_meta($woopage->ID, "_manual_header_re_adjust_padding", true);
$breadcrumb = get_post_meta( $woopage->ID, '_manual_header_breadcrumb_status', true );
$parallax_effect = get_post_meta( $woopage->ID, '_manual_header_parallax_effect', true );
$disable_title = get_post_meta( $woopage->ID, '_manual_header_no_title', true );

if( get_post_meta( $woopage->ID, '_manual_page_tagline_color', true ) != '' ) {
	$header_tagline_color = 'color:'.get_post_meta( $woopage->ID, '_manual_page_tagline_color', true ).'!important;';
}
if( get_post_meta( $woopage->ID, '_manual_page_header_description_color', true ) != '' ) {
	$header_description_color = 'color:'.get_post_meta( $woopage->ID, '_manual_page_header_description_color', true ).'!important;';
}
if( get_post_meta( $woopage->ID, '_manual_header_title_text_transform', true ) != '' ) {
	$header_title_text_transform = 'text-transform:'.get_post_meta( $woopage->ID, '_manual_header_title_text_transform', true ).';';
}
 
if( isset($readjust_padding) && $readjust_padding != ''  ) {
	$auto_adjust_padding = 'padding:'.$readjust_padding.'px 0px!important;';
}

//px
$plx_class = $plx_data_src = $plx_bk_img = '';
if( get_post_meta( $woopage->ID, '_manual_header_image', true ) != '' && $parallax_effect == true  ) {
	$plx_class = 'parallax-window';
	$plx_data_src = 'data-image-src="'.get_post_meta( $woopage->ID, '_manual_header_image', true ).'"  data-parallax="scroll"';
	$plx_bk_img = "background-image:none;";
}

if( isset($text_align) && $text_align != '' ) {
	if($text_align == 'center') {
		$align_text = 'text-align:center;';
	} else if($text_align == 'left') {
		$align_text = 'text-align:left;';
	} else if($text_align == 'right') {
		$align_text = 'text-align:right;';
	}
} else { 
	 $align_text = 'text-align:center;';
}

if (!empty($revslider)){ ?>
	<div class="q_slider"><div class="q_slider_inner">
	<?php echo do_shortcode($revslider); ?>
	</div></div>
<?php
} else {
?>
<!-- Global Bar -->
<style>.button-custom{ font-size: 15px!important; line-height: inherit!important; }#breadcrumbs{ <?php echo $align_text; ?> }</style>
<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break <?php echo $plx_class; ?>" <?php echo $plx_data_src; ?> style=" <?php echo $auto_adjust_padding.''.$plx_bk_img; ?> "> 
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-12 col-sm-12" style=" <?php echo $align_text; ?> ">
      
      	<?php if( $disable_title != true ) { ?>
        <h1 class="inner-header" style="font-size:<?php echo $pagetitle_size ?>px!important; font-weight:<?php echo $pagetitle_weight; ?>; font-family:<?php echo $pagetitle_font_family; ?>!important; <?php echo $header_tagline_color.' '.$header_title_text_transform; ?>">
          <?php if( $pagetitle != '' ){ echo $pagetitle; } else { echo get_the_title($woopage->ID); } ?>
        </h1>
        <?php } ?>
        
        <?php if( get_post_meta( $woopage->ID, '_manual_page_desc', true ) != '' ) {  ?>
        <p class="inner-header-color" style=" <?php echo $header_description_color; ?>"><?php echo get_post_meta( $woopage->ID, '_manual_page_desc', true ); ?></p>
        <?php } ?>
        
		<?php if( isset($breadcrumb) && $breadcrumb == true  ) { ?>
        <div class="inner-header-color"><?php  manual_breadcrumb();  ?></div>
        <?php } else if(function_exists("is_product") && is_product()){ ?>
        <div class="inner-header-color"><?php  woocommerce_breadcrumb();  ?></div>
        <?php } ?>
        
        <?php if( isset($searchbox) && $searchbox == true  ) { ?>
        <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 search-margin-top">
          <div class="global-search">
            <?php get_template_part( 'search', 'home' ); ?>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php } // eof page header ?>

<?php 
if( $theme_options['woo_display_sidebar_on_product_listing_page'] == true && is_shop() ) {
	$md_sm = 8;
	$sidebar_woo = true;
} else {
	$md_sm = 12;
	$sidebar_woo = false;
}
?>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-<?php echo $md_sm; ?> col-sm-<?php echo $md_sm; ?>">
  <?php woocommerce_content(); ?>
  <div class="clearfix"></div>
</div>

<?php if( $sidebar_woo == true ) { ?>
<!--sidebar-->
<aside class="col-md-4 col-sm-4" id="sidebar-box">
  <div class="custom-well sidebar-nav blankbg">
    <?php 
    if ( is_active_sidebar( 'manual-woocommerce-widget' ) ) : 
		dynamic_sidebar( 'manual-woocommerce-widget' ); 
    endif; 
	?>
  </div>
</aside>
<!--eof sidebar-->
<?php } ?>

<?php get_footer(); ?>