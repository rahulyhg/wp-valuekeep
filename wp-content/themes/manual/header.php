<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php 
	global $theme_options;
	if(!empty($theme_options['manual-favicon']['url'])){ 
     echo '<link href="'.$theme_options['manual-favicon']['url'].'" rel="shortcut icon">';
	}
	?>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <?php 
	wp_head(); 
    manual_google_analytics_code("head"); 
	?>
</head>

<body <?php body_class(); ?>>
<!--Navigation Menu-->
<nav class="navbar navbar-inverse">
  <div class="container nav-fix">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
		  <span class="sr-only"></span> 
		  <span class="icon-bar"></span> 
		  <span class="icon-bar"></span> 
		  <span class="icon-bar"></span> 
	  </button>
      <?php 
	  global $theme_options;
	  if( $theme_options['hide-header-logo-status'] == false ) { 
	  ?>
      <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"> 
	  <?php 
	  if( isset($theme_options['theme-header-logo']['url']) && $theme_options['theme-header-logo']['url'] != '' ) { 
	  	$logo_url = $theme_options['theme-header-logo']['url']; 
	  } else { 
	  	$logo_url = get_template_directory_uri().'/img/logo-dark.png'; 
	  }
	  
	  if( is_front_page() && isset($theme_options['theme-nav-homepg-logo']['url']) && 
	      $theme_options['theme-nav-homepg-logo']['url'] != '' && 
		  $theme_options['theme-nav-type'] == 2 ) {
			  $url = $theme_options['theme-nav-homepg-logo']['url'];
			  echo '<img src="'. esc_url($logo_url) .'" class="pull-left custom-nav-logo home-logo-hide" alt=""> ';
	  } else {
		  	$white_url = '';
			$url = $logo_url;
			if( isset($theme_options['theme-nav-homepg-logo-when-img-bg']['url']) ) {
				$white_url = $theme_options['theme-nav-homepg-logo-when-img-bg']['url'];
			}
			if( !is_front_page() && isset($theme_options['theme-nav-homepg-logo-when-img-bg']['url']) && 
				$theme_options['theme-nav-homepg-logo-when-img-bg']['url'] != '' ) {
				echo '<img src="'. esc_url($white_url) .'" class="pull-left custom-nav-logo inner-page-white-logo" alt=""> ';
			}
			if( is_front_page() && $theme_options['theme-nav-type'] == 1 ) {
				echo '<img src="'. esc_url($white_url) .'" class="pull-left custom-nav-logo inner-page-white-logo" alt=""> ';
			} 
	  }
	  ?>
	  <img src="<?php echo esc_url( $url ); ?>" class="pull-left custom-nav-logo home-logo-show" alt=""> 
	  </a>
      <?php } ?> 
	</div>
    
	<div id="navbar" class="navbar-collapse collapse">
	   <?php 
	   $hamburger_class = manual_css_hamburger_menu_control();
	   manual_hamburger_menu_control(); 
	  
	   if ( has_nav_menu( 'primary' ) ) { 
		 wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav '.$hamburger_class.'',  'walker' => new manual_menu_walker() )); 	
	   } else { 
	   ?>
		<ul class="nav navbar-nav">
	   <?php echo wp_list_pages( array( 'title_li' => '' ) ); ?>
		</ul>
	   <?php } ?>
    </div>
	
  </div>
</nav>