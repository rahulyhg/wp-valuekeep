<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); 
global $theme_options;
?>

<!-- Global Bar -->
<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break"> 
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-12 col-sm-12 header-text-align">
        <h1 class="inner-header">
          <?php echo $theme_options['home-404-main-title']; ?>
        </h1>
        <?php if( $theme_options['home-404-search-bar-status'] == false ) { ?>
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


<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-12 col-sm-12">
  <div class="empty404 margin-top-btm-50">
    <h2> <?php echo $theme_options['home-404-body-main-title']; ?></h2>
    <p> <?php echo $theme_options['home-404-body-main-subtitle-title']; ?></p>
  </div>
</div>
<?php get_footer(); ?>