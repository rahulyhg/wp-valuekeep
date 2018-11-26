<?php global $theme_options, $withcomments; ?>
      <div class="page-title-header">
        <h2 class="manual-title title singlepg-font"> 
		<?php echo $post->post_title; ?>
        </h2>
         <p <?php if( $theme_options['documentation-quick-stats-under-title'] == true ) { echo 'style="min-height:10px;"';  }  ?> >
           <?php  if( $theme_options['documentation-quick-stats-under-title'] == false ) { ?>
            <i class="fa fa-eye"></i>  
			<span><?php 
			if( get_post_meta( $post->ID, 'manual_post_visitors', true ) != '' ) { 
				echo get_post_meta( $post->ID, 'manual_post_visitors', true );
				echo esc_html_e( ' views ', 'manual' );
			} else { echo '0 views'; } ?></span>
		  	 <i class="fa fa-calendar"></i> <span><?php the_time( get_option('date_format') ); ?></span>
             
			  <?php 
			  if( $theme_options['documentation-singlepg-modified-date-status'] == true ) {
			  if (get_the_modified_time() != get_the_time()) { ?>
			  <i class="fa fa-calendar-plus-o"></i> <span><?php the_modified_time( get_option('date_format') ); ?></span>
			  <?php } } ?>
              
             <i class="fa fa-user"></i> <span><?php $author_id = $post->post_author; echo the_author_meta( $theme_options['documentation-single-post-user-name'] , $author_id ); ?></span>
             <i class="fa fa-thumbs-o-up"></i> <span><?php if( get_post_meta( $post->ID, 'votes_count_doc_manual', true ) == '' ) { echo 0; } else { echo get_post_meta( $post->ID, 'votes_count_doc_manual', true ); } ?></span>
             <?php } ?>
              <?php edit_post_link( esc_html__( 'Edit', 'manual' ), '<span class="edit-link">', '</span>', $post->ID ); ?>
          </p>
          
          
      </div>
      <div class="post-cat margin-btm-35"></div>
      <div class="entry-content clearfix">
      <?php echo apply_filters('the_content', $post->post_content); ?>
      </div>
	   <?php 
	   if( get_post_meta( $post->ID, '_manual_attachement_access_status', true ) == true && !is_user_logged_in() ) {
		   $message = get_post_meta( $post->ID, '_manual_attachement_access_login_msg', true ); 
		   manual_access_attachment($message);
	   } else { 
	   	   manual_kb_attachment_files(); 
	   } 
	  ?>
      <div style="clear:both"></div>
      <?php if( $theme_options['documentation-social-share-status'] == false ) { manual_social_share(get_permalink()); } ?>
      <?php if( ($theme_options['documentation-voting-buttons-status'] == false && $theme_options['documentation-voting-login-users'] == false ) ||
	  			($theme_options['documentation-voting-buttons-status'] == false && $theme_options['documentation-voting-login-users'] == true && is_user_logged_in())
			) { ?>
      <!--feedback form-->
      <div class="panel-heading" style="padding:0px;">
        <div id="rate-topic-content" class="row-fluid">
          <div class="rate-buttons"> 
          <?php if(isset($theme_options['yes-no-above-message'])) { ?><p class="helpfulmsg"><?php echo $theme_options['yes-no-above-message']; ?></p> <?php } ?>
          <span class="post-like"><a data-post_id="<?php echo $post->ID; ?>" href="#"><span class="btn btn-success rate custom-like-dislike-btm" data-rating="1"><i class="glyphicon glyphicon-thumbs-up"></i> <span class="manual_doc_count"><?php echo $meta_values = get_post_meta( $post->ID, 'votes_count_doc_manual', true ); ?> <?php echo esc_html_e( ' Yes ', 'manual' ); ?></span></span></a></span> <span class="post-unlike"><a data-post_id="<?php echo $post->ID; ?>" href="#"><span class="btn btn-danger rate custom-like-dislike-btm" data-rating="0"> <i class="glyphicon glyphicon-thumbs-down"></i> <span class="manual_doc_unlike_count"><?php echo $meta_values = get_post_meta( $post->ID, 'votes_unlike_doc_manual', true ); ?> <?php echo esc_html_e( ' No ', 'manual' ); ?> </span></span></a></span> </div>
          <?php 
	if( is_super_admin() && is_user_logged_in() ) {
		echo '<span class="post-reset"><a data-post_id="'.$post->ID.'" href="#"><span class="btn btn-link" data-rating="0"> <i class="fa fa-refresh"></i> <span class="rating_reset_display"> Reset </span></span></a></span>';
	}
	?>
        </div>
        <div class="clearfix"></div>
        <span class="manual-views" id="manual-views-<?php echo $post->ID; ?>"></span>
      </div>
      <!--Eof feedback form-->
<style> .pull-right.reply { display: none; } </style>      
      <?php } 
	  
	  if( $theme_options['documentation-related-post-status'] == true ) manual_doc_related_post($post->ID);
	  
	  /*if( $theme_options['documentation-comment-status'] == true ) {
		  if ( comments_open() || get_comments_number() ) {
				$withcomments = true;
				comments_template( '', true ); 
		  }
	  }*/
	  
	 ?>