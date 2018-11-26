<?php
/*
Template Name: Home Page
*/

global $theme_options;
get_header();
?>

<!-- Global Bar -->
<style><?php echo '.button-custom { padding: 15px 20px 15px !important;'; ?></style>
<div class="jumbotron" style="background:url(<?php if(isset($theme_options['home-header-background-img']['url']) && $theme_options['home-header-background-img']['url'] != '') { echo esc_url($theme_options['home-header-background-img']['url']); } ?>)!important;background-size:cover!important; background-position: 50% 50%;
    background-repeat: no-repeat; padding: 0px!important;">
  <div class="jumbotron-bg-color" style="padding: <?php echo $theme_options['home-header-background-padding']; ?>px 0;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 padding-jumbotron">
          <h1 id="glob-msg-box" class="bigtext"><?php echo $theme_options['home-header-main-title']; ?></h1>
          <p class="titletag_dec"><?php echo $theme_options['home-header-sub-title']; ?></p>
          
          <?php if( $theme_options['home-search-form-status'] == true ) { ?>
          <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 search-margin-top">
            <div class="global-search home">
              <?php get_template_part( 'search', 'home' ); ?>
            </div>
          </div>
          <?php } ?>
          
        </div>
      </div>
    </div>
  </div>
</div>
<!--Home Help Section-->
<?php if( $theme_options['home-help-section-status'] == true ) { ?>
<div class="clearfix"></div>
<div class="padding-top-70-btm-70">
  <div class="container content-wrapper top-body-shadow body-content">
    <div class="row">
      <div class="margin-15">
        <div class="col-md-12 col-sm-12 margin-btm-20" style="text-align:center;">
          <h2 class="margin-btm-25 uppercase"><?php echo $theme_options['home-help-section-title-main']; ?></h2>
          <p class="custom-size"><?php echo $theme_options['home-help-section-msg-short']; ?></p>
        </div>
        <div class="col-md-12 col-sm-12">
          <div class="loop-help-desk">
            <?php 
        $args = array(
	 				'post_type' => 'manual_hp_block',
					'posts_per_page' => '-1',
					'orderby' => 'menu_order',
					'post_status' => 'publish',
					'order' => 'ASC'
				);
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) {
		while($wp_query->have_posts()) { $wp_query->the_post(); 
		?> <a href="<?php echo get_post_meta( $post->ID, '_manual_hpblock_link', true ); ?>">
            <div class="counter-text hvr-float">
              <div class="browse-help-desk">
                <div class="browse-help-desk-div"> <i class="<?php echo get_post_meta( $post->ID, '_manual_hpblock_icon', true ); ?> i-fa"></i> </div>
                <div class="m-and-p">
                  <h5>
                    <?php the_title(); ?>
                  </h5>
                  <p><?php echo get_post_meta( $post->ID, '_manual_hpblock_text', true ); ?></p>
                  <?php if( get_post_meta( $post->ID, '_manual_hpblock_link', true ) != '' ) { ?>
                  <p>
                    <span class="custom-link hvr-icon-wobble-horizontal" style="letter-spacing:1px;">
                    <?php 
					if( get_post_meta( $post->ID, '_manual_hpblock_link_text', true ) != '' ) {
						echo get_post_meta( $post->ID, '_manual_hpblock_link_text', true );
					} else {
						esc_html_e( 'Browse', 'manual' ); echo '&nbsp;'; the_title();  
					}
					?>
                    </span>
                  </p>
                  <?php } ?>
                </div>
              </div>
            </div>
            </a>
            <?php 
		}
		} 
		wp_reset_query();
		?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!--Testo-->
<?php if( $theme_options['home-testimonials-status'] == true ) { ?>
<div class="homepg-seprator-bg parallax-window" <?php if( isset($theme_options['testimonials-plx-url']['url']) && $theme_options['testimonials-plx-url']['url'] != '' ) { ?> data-image-src="<?php echo esc_url($theme_options['testimonials-plx-url']['url']); ?>" data-parallax="scroll" <?php } ?>>
  <div style="background: rgba(55, 56, 53, 0.79);  padding:95px 0px;">
    <div class="container">
      <div class="row">
        <div class="margin-15">
          <div class="home-testo-desk">
            <?php 	
        $args = array(
	 				'post_type' => 'manual_tmal_block',
					'posts_per_page' => '-1',
					'orderby' => 'menu_order',
					'post_status' => 'publish',
					'order' => 'DESC'
				);
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) {
			$i = 0;
			while($wp_query->have_posts()) { $wp_query->the_post();
		?>
            <div class="col-md-12 col-sm-12  testimonial">
              <div class="testimonial-text">
                <div class="testimonial-quote">
                  <p style="color:#EDEDED!important;font-size: 26px;line-height: 1.666666666666667em;font-weight: 400;"><?php echo get_post_meta( $post->ID, '_manual_hpblock_text', true ); ?></p>
                </div>
                <div class="testimonial-cite text-white-color"><?php echo get_post_meta( $post->ID, '_manual_hpblock_name', true ); ?></div>
              </div>
            </div>
            <?php 
			}
		} 
		wp_reset_postdata(); 
		?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Eof Testo-->
<?php } ?>

<?php if( $theme_options['home-org-block-status'] == true ) { ?>
<div class="clearfix">
  <div class="lightblue-break">
    <div class="container padding-top-70-btm-70">
      <div class="row">
        <div class="margin-15">
          <div class="col-md-12 col-sm-12 margin-btm-20" style="text-align:center;">
            <h2 class="margin-btm-25"><?php echo $theme_options['home-org-block-main-title']; ?></h2>
            <p class="custom-size"><?php echo $theme_options['home-org-block-sub-title']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4" style="min-height: 516px; background: url(<?php if( isset($theme_options['home-org-block-background-url']['url']) && $theme_options['home-org-block-background-url']['url'] != '' ) { echo esc_url($theme_options['home-org-block-background-url']['url']); } ?>) 50% 50% / cover no-repeat;"></div>
<div class="col-md-8" style="min-height: 516px;">
  <div class="row">
    <?php 	
            $args = array(
                        'post_type' => 'manual_org_block',
                        'posts_per_page' => '-1',
                        'orderby' => 'menu_order',
						'post_status' => 'publish',
                        'order' => 'ASC'
                    );
            $wp_query = new WP_Query($args);
            if($wp_query->have_posts()) {
                $i = 0;
                while($wp_query->have_posts()) { $wp_query->the_post();
                if( $i % 2 == 0 ) $css = 'browse-whyus-desk';
                else $css = 'browse-seprate';
            ?>
    <div class="col-md-4 col-sm-6 org-box">
      <div style="text-align:center">
        <div class="home-box"> <i class="<?php echo get_post_meta( $post->ID, '_manual_hpblock_icon', true ); ?> i-fa" style="font-size: 56px; color:#717171"></i> </div>
        <h5>
          <?php the_title(); ?>
        </h5>
        <p><?php echo get_post_meta( $post->ID, '_manual_hpblock_text', true ); ?></p>
      </div>
    </div>
    <?php 
                $i++; }
            } 
            wp_reset_postdata(); 
            ?>
  </div>
</div>
</div>
<?php } ?>
<div class="clearfix"></div>

<?php if( $theme_options['de-message-bar'] == true ) { ?>
<div class="clearfix">
  <div class="lightblue-break">
    <div class="container padding-top-70-btm-70">
      <div class="row">
        <div class="margin-15">
          <div class="col-md-12 col-sm-12 margin-btm-20" style="text-align:center;">
            <h2 class="margin-btm-25"><?php echo $theme_options['message-bar-main-title']; ?></h2>
            <p class="custom-size"><?php echo $theme_options['message-bar-sub-title']; ?></p>
          </div>
          <div class="col-md-12 col-sm-12 message-bar-trim">
            <p class="home-message-darkblue-bar"> <a class="link hvr-icon-wobble-horizontal" href="<?php if( isset($theme_options['message-bar-bottom-url']) && $theme_options['message-bar-bottom-url']!= '' ){ echo $theme_options['message-bar-bottom-url']; } ?>" title=""><?php echo $theme_options['message-bar-bottom-display-text']; ?></a> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!--Fun Act-->
<?php if( $theme_options['home-funact-status'] == true ) { ?>
<div class="homepg-seprator-bg parallax-window" <?php if( isset($theme_options['funact-plx-url']['url']) && $theme_options['funact-plx-url']['url'] != '' ) { ?> data-image-src="<?php echo esc_url($theme_options['funact-plx-url']['url']); ?>" data-parallax="scroll" <?php } ?>>
  <div class="padding-top-70-btm-70 lightblue-break" <?php if( isset($theme_options['funact-plx-url']['url']) && $theme_options['funact-plx-url']['url'] != '' ) { ?> style="background: rgba(55, 56, 53, 0.5);" <?php } ?>>
    <div class="funact-main-div">
      <div class="container content-wrapper">
        <div class="row">
          <div class="col-md-12 col-sm-12 margin-btm-20" style="text-align:center;">
            <h2  class="margin-btm-25 <?php if( isset($theme_options['funact-plx-url']['url']) && $theme_options['funact-plx-url']['url'] != '' ) { ?> text-white-color <?php } ?>"><?php echo $theme_options['home-funact-main-title']; ?></h2>
            <p class="custom-size <?php if( isset($theme_options['funact-plx-url']['url']) && $theme_options['funact-plx-url']['url'] != '' ) { ?> text-white-color <?php } ?>"><?php echo $theme_options['home-funact-sub-title']; ?></p>
          </div>
          <div class="col-md-12 col-sm-12">
            <?php 
	  foreach( $theme_options['home-funact-sortable'] as $key=>$val ) {  
		 $funact[$theme_options['home-funact-no-sortable'][$key]] = $val;
	  }
	  
	  if( count($funact) > 1 ) {
	  foreach( $funact as $key=>$val ) { ?>
            <div class="col-md-3 col-sm-6" style=" padding: 25px 3px;text-align: center;">
              <p><b class="timer counter-number funact counter-number-color <?php if( isset($theme_options['funact-plx-url']['url']) && $theme_options['funact-plx-url']['url'] != '' ) { ?> text-white-color <?php } ?>"  data-to="<?php echo $key ?>" data-speed="10000" ></b></p>
              <p class="counter-text countdown <?php if( isset($theme_options['funact-plx-url']['url']) && $theme_options['funact-plx-url']['url'] != '' ) { ?> text-white-color <?php } ?>"><?php echo $val; ?></p>
            </div>
            <?php } } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php get_footer(); ?>
