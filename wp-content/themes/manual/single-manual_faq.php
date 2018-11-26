<?php 
get_header(); 
?>

<!-- Global Bar -->
<div class="jumbotron inner-jumbotron jumbotron-inner-fix noise-break"> 
  <div class="container inner-margin-top">
    <div class="row">
      <div class="col-md-12 col-sm-12 header-text-align">
        <h1 class="inner-header">
             <?php 
			 $terms = get_the_terms( $post->ID , 'manualfaqcategory' );
			 $term = array_pop($terms);
			 echo $term->name;
			 ?>
        </h1>
        <p class="inner-header-color"><?php manual_breadcrumb(); ?></p>
        <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 search-margin-top">
          <div class="global-search">
            <?php get_template_part( 'search-form', 'forums' ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-12 col-sm-12 faq">
  <h2 class="singlepg-font">
    <?php the_title(); ?>
  </h2>
  <?php while ( have_posts() ) : the_post(); ?>
   <div class="entry-content clearfix">
    <?php the_content(); ?>
    <?php edit_post_link( esc_html__( 'Edit', 'manual' ), '<p class="edit-link" style="text-align:right">', '</p>', $post->ID ); ?>
  </div>
  <?php endwhile; // end of the loop. ?>
  <div style="clear:both"></div>
  <br>
</div>
<?php get_footer(); ?>
