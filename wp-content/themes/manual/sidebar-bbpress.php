<?php if ( is_active_sidebar( 'manual-sidebar-bbpress' ) ) { ?>

<aside class="col-md-4 col-sm-4" id="sidebar-box">
  <div class="custom-well sidebar-nav manual-forum">
    <?php dynamic_sidebar( 'manual-sidebar-bbpress' )  ?>
  </div>
</aside>
<?php } ?>
