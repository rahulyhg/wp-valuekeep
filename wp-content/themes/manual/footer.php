<?php global $theme_options; ?>
</div>
</div>

<!-- SECTION FOOTER TOP-->
<?php
$hide_widget_area = $hide = $notification_background = ''; 

if( is_page() && get_post_meta( $post->ID, '_manual_footer_force_hide_msg_box', true ) == true ) { 
	$hide = 2;
} else {
	if( $theme_options['footer-notification-status'] == true ) $hide = 1;
	else $hide = 2;
}

if( (is_page() && get_post_meta( $post->ID, '_manual_footer_force_hide_widget_area', true ) == true) ) { 
	$hide_widget_area = 1;
} else {  
	if( $theme_options['footer-widget-status'] == true )  $hide_widget_area = 1;
	else $hide_widget_area = 2;
}

if( !empty($theme_options['footer-notification-bar-background-img']['url']) ) { 
	$notification_background = 'background-image:url('.$theme_options['footer-notification-bar-background-img']['url'].');background-size: cover; background-position: center;';
} else { 
	if( isset($theme_options['footer-notification-bar-bg-color']['rgba']) && $theme_options['footer-notification-bar-bg-color']['rgba'] != '' ) { 
		$notification_background = 'background:'.$theme_options['footer-notification-bar-bg-color']['rgba'].';'; 
	}
}

?>
<?php if( $hide == 1 ) { ?>

<div id="footer-info" >
  <div class="bg-color" style=" <?php echo $notification_background; ?> ">
    <div class="container">
      <div class="row  text-padding" style="margin:<?php echo $theme_options['footer-notification-bar-text-margin']; ?>px 0px">
        <div class="col-md-12 col-sm-12 footer-msg-bar">
          <?php if( isset($theme_options['footer-text']) && $theme_options['footer-text'] != '') { echo $theme_options['footer-text']; } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- SECTION FOOTER -->
<footer>
  <div class="footer-bg <?php if( $theme_options['theme-footer-type'] == 1 ) { echo 'footer-type-one'; } ?>" <?php if( $hide_widget_area != 1 || $theme_options['theme-footer-type'] != 2 ) { ?> style="padding: 65px 0px 0px;" <?php } ?>>
    <?php 
	     if( $theme_options['theme-footer-type'] == 1 ) { 
		 ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 footer-btm-box-one" style="text-align:center;">
          <ul class="social-foot" style="margin-bottom: 35px;">
            <?php manual_footer_social_share(); ?>
          </ul>
          <p style=" font-size: 12px;">
            <?php if( isset($theme_options['footer-copyright']) && $theme_options['footer-copyright'] != '' ) { echo $theme_options['footer-copyright']; } ?>
          </p>
        </div>
      </div>
    </div>
    <?php 
	} else { 
    if( $hide_widget_area != 1 ) { 
	
		
	if( isset( $theme_options['theme_footer_noof_section_widget_area'] ) && $theme_options['theme_footer_noof_section_widget_area'] != '' ) {
		if( $theme_options['theme_footer_noof_section_widget_area'] == 4 ) {
			$col_md = 3;
			$col_sm = 6;
			$hide_widget = 4;
		} else if( $theme_options['theme_footer_noof_section_widget_area'] == 3 ) {
			$col_md = 4;
			$col_sm = 6;
			$hide_widget = 3;
		} else if( $theme_options['theme_footer_noof_section_widget_area'] == 2 ) {
			$col_md = 6;
			$col_sm = 6;
			$hide_widget = 2;
		} else if( $theme_options['theme_footer_noof_section_widget_area'] == 1 ) {
			$col_md = 12;
			$col_sm = 12;
			$hide_widget = 1;
		}
	}
	
	?>
    <div class="container">
      <div class="row">
        <div class="col-md-<?php echo $col_md; ?> col-sm-<?php echo $col_sm; ?>">
			<?php 
				if ( is_active_sidebar( 'footer-box-1' ) ) : 
					dynamic_sidebar( 'footer-box-1' ); 
				endif; 
            ?>
        </div>
        <?php if( $hide_widget == 4 || $hide_widget == 3 || $hide_widget == 2  ) { ?>
        <div class="col-md-<?php echo $col_md; ?> col-sm-<?php echo $col_sm; ?>">
			<?php 
				if ( is_active_sidebar( 'footer-box-2' ) ) : 
					dynamic_sidebar( 'footer-box-2' ); 
				endif; 
            ?>
        </div>
        <?php 
		}
		
		if( $hide_widget == 4 || $hide_widget == 3 && $hide_widget != 2  ) { ?>
        <div class="col-md-<?php echo $col_md; ?> col-sm-<?php echo $col_sm; ?>">
			<?php 
				if ( is_active_sidebar( 'footer-box-3' ) ) : 
					dynamic_sidebar( 'footer-box-3' ); 
				endif; 
            ?>
        </div>
        <?php } 
		
		if( $hide_widget == 4 && $hide_widget != 3 && $hide_widget != 2  ) {  ?>
        <div class="col-md-<?php echo $col_md; ?> col-sm-<?php echo $col_sm; ?>">
			<?php 
				if ( is_active_sidebar( 'footer-box-4' ) ) : 
					dynamic_sidebar( 'footer-box-4' ); 
				endif; 
            ?>
        </div>
        <?php } ?>
      </div>
    </div>
    <?php } ?>
    
    <?php if( $theme_options['footer-social-copyright-status'] == false ) { ?>
    <div class="footer_social_copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 footer-btm-box" style=" <?php if( $theme_options['footer-disable-social-icons'] == true ) { echo 'padding-top: 19px;';} ?>" >
           <?php if( $theme_options['footer-disable-social-icons'] == false ) { ?>
            <ul class="social-foot" style="padding-left:0px;">
              <?php manual_footer_social_share(); ?>
            </ul>
            <?php } 
			if( $theme_options['footer-disable-copyright-section'] == false ) {
			?>
            <p>
              <?php if( isset($theme_options['footer-copyright']) && $theme_options['footer-copyright'] != '' ) { echo $theme_options['footer-copyright']; } ?>
            </p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <?php } } ?>
  </div>
</footer>


<?php 
if( !empty( $theme_options['manual-editor-js'] ) ) {
	echo "<script type='text/javascript'>"; 
	echo $theme_options['manual-editor-js'];
	echo "</script>";
}
manual_google_analytics_code("body");
wp_footer(); 
?>
</body></html>