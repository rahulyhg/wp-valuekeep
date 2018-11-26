<?php
/**
 * The sidebar containing the main widget area
 */
?>

<aside class="col-md-4 col-sm-4" id="sidebar-box">
  <div class="custom-well sidebar-nav faq_sidebar">
    <?php 
    if ( is_active_sidebar( 'faq-sidebar-1' ) ) : 
		dynamic_sidebar( 'faq-sidebar-1' ); 
    endif; 
	?>
  </div>
</aside>