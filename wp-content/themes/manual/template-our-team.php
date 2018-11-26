<?php
/**
 * Template Name: Our Team
 */

get_header(); 
get_template_part( 'template', 'header' );
?>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-12 col-sm-12">
  <?php 	
        $args = array(
	 				'post_type' => 'manual_ourteam',
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
  <div class="col-md-4 col-sm-6">
    <div class="manual_team">
      <div class="manual_team_inner">
        <div class="manual_team_image">
          <?php if( get_post_meta( $post->ID, '_manual_ourteam_image', true ) != '' ) { ?>
          <img src="<?php echo esc_url( get_post_meta( $post->ID, '_manual_ourteam_image', true ) ); ?>" alt="">
          <?php } ?>
        </div>
        <div class="manual_team_text">
          <div class="manual_team_title_holder">
            <h3 class="manual_team_name"><?php echo get_post_meta( $post->ID, '_manual_ourteam_name', true ); ?></h3>
            <span><?php echo get_post_meta( $post->ID, '_manual_ourteam_position', true ); ?></span></div>
        </div>
      </div>
    </div>
  </div>
  <?php 
			}
			
		} 
		
		wp_reset_postdata(); 
		?>
  
</div>
<?php get_footer(); ?>