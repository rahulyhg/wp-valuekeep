<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/wp-content/themes/manual-child/js/script.js"> </script>   
    <?php 
	global $theme_options;
	if(!empty($theme_options['manual-favicon']['url'])){ 
		$favIcon = $theme_options['manual-favicon']['url'];
		$favIcon = str_replace("vki-", "", $favIcon);
     echo '<link href="'.$favIcon.'" rel="shortcut icon">';
	}
	?>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <?php 
    manual_google_analytics_code("head"); 
wp_head();
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
			$url = str_replace("vki-", "", $url);
			if( isset($theme_options['theme-nav-homepg-logo-when-img-bg']['url']) ) {
				$white_url = $theme_options['theme-nav-homepg-logo-when-img-bg']['url'];
				$white_url = str_replace("vki-", "", $white_url);
			}
			if( !is_front_page() && isset($theme_options['theme-nav-homepg-logo-when-img-bg']['url']) && 
				$theme_options['theme-nav-homepg-logo-when-img-bg']['url'] != '' ) {
				$white_url = str_replace("vki-", "", $white_url);
				echo '<img src="'. esc_url($white_url) .'" class="pull-left custom-nav-logo inner-page-white-logo" alt=""> ';
			}
			if( is_front_page() && $theme_options['theme-nav-type'] == 1 ) {
				$white_url = str_replace("vki-", "", $white_url);
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
	   if ( has_nav_menu( 'primary' ) ) { 
		 wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav',  'walker' => new manual_menu_walker() )); 	
	   } else { 
	   ?>
		<ul class="nav navbar-nav">
	   <?php echo wp_list_pages( array( 'title_li' => '' ) ); ?>
		</ul>
	   <?php } ?>
    </div>
	
  </div>
</nav>