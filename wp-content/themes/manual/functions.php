<?php

/**
* Set the content width based on the theme's design and stylesheet.
*/
if ( ! isset( $content_width ) ) $content_width = 700;

/*-----------------------------------------------------------------------------------*/
/*	Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'manual_theme_manual_setup' ) ) {
	function manual_theme_manual_setup() {
		
        /*	Load Text Domain */
		load_theme_textdomain( 'manual', trailingslashit( get_template_directory() ) . 'languages' );
		
        /*	Add Automatic Feed Links Support */
        add_theme_support( 'automatic-feed-links' );
		
        /* Add Post Formats Support */
        add_theme_support('post-formats', array('gallery', 'link', 'image', 'quote', 'video', 'audio'));
		
		/*** If BBPress is active, add theme support */
		if ( class_exists( 'bbPress' ) ) { add_theme_support( 'bbpress' ); }

		/* Let WordPress manage the document title. */
		add_theme_support( 'title-tag' );
		
		/* Add Post Thumbnails Support and Related Image Sizes */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 825, 510, true );
		
		/** This theme uses wp_nav_menu() in one location. */
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu',  'manual' ),
		) );
		
		/** Custom image sizes */
		add_image_size( 'portfolio-FitRows', 700, 525, true ); 
		
	}
}
add_action( 'after_setup_theme', 'manual_theme_manual_setup' );


/*-----------------------------------------------------------------------------------*/
/*	WPML
/*-----------------------------------------------------------------------------------*/
add_action( 'wp_loaded', 'manual_load_theme_language' );

function manual_load_theme_language()
{
    $lang_dir = get_stylesheet_directory() . '/languages';
    return load_theme_textdomain( 'manual', $lang_dir );
}


/*-----------------------------------------------------------------------------------*/
/*	Include Theme Options Framework
/*-----------------------------------------------------------------------------------*/
if ( !class_exists( 'ReduxFramework' ) && file_exists( trailingslashit( get_template_directory() ) . 'framework/ReduxCore/framework.php' ) ) {
	require_once( trailingslashit( get_template_directory() ) . 'framework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( trailingslashit( get_template_directory() ) . 'framework/ReduxCore/manual/manual.php' ) ) {
	require_once( trailingslashit( get_template_directory() ) . 'framework/ReduxCore/manual/manual.php' );
}


/*-----------------------------------------------------------------------------------*/
/*	Enqueue scripts and styles.
/*-----------------------------------------------------------------------------------*/ 
function manual_theme_scripts() {
	global $post, $theme_options, $woocommerce;
	$post_info = get_post_type( $post );
	
	wp_enqueue_script( 'manual-script-bootstrap', trailingslashit( get_template_directory_uri() ) . 'js/bootstrap.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-custom-timer', trailingslashit( get_template_directory_uri() ) . 'js/timer.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-custom-appear', trailingslashit( get_template_directory_uri() ) . 'js/appear.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-parallax-min', trailingslashit( get_template_directory_uri() ) . 'js/parallax/parallax.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-parallax', trailingslashit( get_template_directory_uri() ) . 'js/parallax/parallax.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-js-owl', trailingslashit( get_template_directory_uri() ) . 'js/owl/owl.carousel.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-js-masonry', trailingslashit( get_template_directory_uri() ) . 'js/masonry-docs.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-js-isotope', trailingslashit( get_template_directory_uri() ) . 'js/isotope/isotope.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-js-imagesloaded', trailingslashit( get_template_directory_uri() ) . 'js/imagesloaded.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'manual-js-advsearch', trailingslashit( get_template_directory_uri() ) . 'js/advsearch.js', array( 'jquery' ), false, true );
	if ( $theme_options['documentation-menu-scroller-status'] == true ) {
	wp_enqueue_script( 'manual-js-mCustomScrollbar', trailingslashit( get_template_directory_uri() ) . 'js/cscrollbar/customscrollbar.js', array( 'jquery' ), false, true );
	}
	// doc handler
	if( $post_info == 'manual_documentation' ) {
		wp_register_script('manual-ajax-call-linkurl', trailingslashit( get_template_directory_uri() ) . '/js/handler/functions.js', array('jquery'), true );
		wp_enqueue_script('manual-ajax-call-linkurl');
		wp_register_script('manual-history', trailingslashit( get_template_directory_uri() ) . '/js/handler/jquery.history.js', array('jquery'), true );
		wp_enqueue_script('manual-history');
	}
	// eof doc
	wp_enqueue_script( 'manual-custom-script', trailingslashit( get_template_directory_uri() ) . 'js/theme.js', array( 'jquery' ), false, true );
	
	
	// embed the javascript file that makes the AJAX request
	//wp_enqueue_script( 'manual-ajax-request', plugin_dir_url( __FILE__ ) . 'js/ajax.js', array( 'jquery' ) );
	
	// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
	wp_enqueue_script('doc_like_post', trailingslashit( get_template_directory_uri() ).'js/voting-front.js', array('jquery'), '1.0', true );
	wp_localize_script('doc_like_post', 'doc_ajax_var', array(
		'url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('doc-ajax-nonce')
	));
	
	/*
	* Adds JavaScript to pages with the comment form to support
	* sites with threaded comments (when in use).
	*/
	if ( is_singular() && comments_open() ) {  
			wp_enqueue_script( 'comment-reply' );
	}
		
	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'manual-style', get_stylesheet_uri() );
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'manual-fonts', manual_fonts_url(), array(), null );
	wp_enqueue_style( 'manual-bootstrap', trailingslashit( get_template_directory_uri() ) . 'css/lib/bootstrap.min.css', array(), '3.3.1' );
	wp_enqueue_style( 'manual-css-owl', trailingslashit( get_template_directory_uri() ) . 'js/owl/owl.carousel.css', array(), '' );
	wp_enqueue_style( 'manual-css-owl-theme', trailingslashit( get_template_directory_uri() ) . 'js/owl/owl.theme.css', array(), '' );
	wp_enqueue_style( 'manual-effect', trailingslashit( get_template_directory_uri() ) . 'css/hover.css', array(), '' );
	if ( $theme_options['documentation-menu-scroller-status'] == true ) {
	wp_enqueue_style( 'manual-css-mCustomScrollbar', trailingslashit( get_template_directory_uri() ) . 'js/cscrollbar/mcustomscrollbar.css', array(), '' );
	}
	if ($woocommerce) {
		wp_enqueue_style("woocommerce", trailingslashit(get_template_directory_uri()) . "css/woocommerce.min.css");
	}
	
}
add_action( 'wp_enqueue_scripts', 'manual_theme_scripts' );


/*-----------------------------------------------------------------------------------*/
/*	Font URL
/*-----------------------------------------------------------------------------------*/ 
function manual_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets = 'latin,latin-ext';

	/* translators: To add an additional Open Sans character subset specific to your language, translate
	   this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'PT Sans font: add new subset (greek, cyrillic, vietnamese)', 'manual' );

	if ( 'cyrillic' == $subset )
		$subsets .= ',cyrillic,cyrillic-ext';
	elseif ( 'greek' == $subset )
		$subsets .= ',greek,greek-ext';
	elseif ( 'vietnamese' == $subset )
		$subsets .= ',vietnamese';

	$protocol = is_ssl() ? 'https' : 'http';
	$query_args = add_query_arg(array(
						'family' => 'Source+Sans+Pro:300,400,600,700|Open+Sans:100,200,300,400,600,700,800|Roboto:300,400,500,700|Raleway:400',
						'subset' => $subsets,
					), '//fonts.googleapis.com/css');

	return $query_args;
}

/*-----------------------------------------------------------------------------------*/
/*	Search Template    
/*-----------------------------------------------------------------------------------*/ 
function manual_search_template_chooser($template)
{
  global $wp_query;
  $post_type = get_query_var('post_type');
  
  if ( class_exists( 'bbPress' ) ) {
		if ( bbp_is_search() ) {
			return locate_template('search-forums.php'); 
		}
  } 
  return $template;
}
add_filter('template_include', 'manual_search_template_chooser');



/*-----------------------------------------------------------------------------------*/
/*	Documentation Page
/*-----------------------------------------------------------------------------------*/ 
function manual_documentation_cat_pages( $post, $post_info, $term_id ) {
	global $theme_options;
	
	if( isset( $theme_options['documentation-record-display-order'] ) && $theme_options['documentation-record-display-order'] != '' ) {
	$display_order_doc = $theme_options['documentation-record-display-order'];	
	} else {
		$display_order_doc = 'ASC';	
	}
	if( isset( $theme_options['documentation-record-display-order-by'] ) && $theme_options['documentation-record-display-order-by'] != '' ) {
		$display_order_doc_by = $theme_options['documentation-record-display-order-by'];	
	}
	
	$children = get_posts( array( 'post_parent' => $post->ID, 
								  'post_type' => $post_info, 
								  'orderby' => $display_order_doc_by,
								  'order' => $display_order_doc,
								  'posts_per_page'   => -1,
								  'taxonomy' => 'manualdocumentationcategory'
								  ));
	$child = count($children);
	if( $child > 0 ) {
		echo '<ul class="parent-display-'.$post->ID.'">';
		foreach($children as $child) :
			$count_child = manual_count_child_post($child, $post_info, $term_id); 
			if( is_object_in_term( $child->ID, 'manualdocumentationcategory', $term_id) === true ): ?>

<li manual-topic-id="<?php echo $child->ID; ?>" > <a href="<?php echo get_permalink($child->ID); ?>" rel="<?php echo $child->ID; ?>" class="post-link <?php if( count($count_child) > 0 ) { echo 'has-inner-child';  } ?>" ><?php echo $child->post_title; ?></a>
  <?php manual_documentation_cat_pages($child, $post_info, $term_id); ?>
</li>
<?php 
			endif;
		endforeach; 
		echo '</ul>';
		//echo '<li class="divider"></li>';
	}
}
function manual_count_child_post($post, $post_info, $term_id){
	$count = array();
	$children = get_posts( array( 'post_parent' => $post->ID, 'post_type' => $post_info, 'taxonomy' => 'manualdocumentationcategory'  ));
	$child = count($children);
	if( $child > 0 ) {
		foreach($children as $child) : 
			if( is_object_in_term( $child->ID, 'manualdocumentationcategory', $term_id) === true ): 
				$count[] = 1;
			endif;
		endforeach; 
		return $count;
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Custom Menu
/*-----------------------------------------------------------------------------------*/  
class manual_menu_walker extends Walker {

  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul>\n";
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    /* Add active class */
    if(in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
      unset($classes['current-menu-item']);
    }

    /* Check for children */
    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
    if (!empty($children)) {
      $classes[] = 'has-sub';
    }

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}



/*-----------------------------------------------------------------------------------*/
/*	Custom Comment Buttom
/*-----------------------------------------------------------------------------------*/ 
function manual_custom_comment_button() {
    echo '<input name="submit" class="btn btn-primary margin-btm-20 blog-btn" type="submit" value="' . esc_html__( 'Post Comment', 'manual' ) . '" />';
}
add_action( 'comment_form', 'manual_custom_comment_button' );
     


/*-----------------------------------------------------------------------------------*/
/*	HEX 2 RGB
/*-----------------------------------------------------------------------------------*/ 
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
	  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
	  $r = hexdec(substr($hex,0,2));
	  $g = hexdec(substr($hex,2,2));
	  $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return $rgb; // returns an array with the rgb values
}



/*-----------------------------------------------------------------------------------*/
/*	Add MetaBox Library
/*-----------------------------------------------------------------------------------*/ 
function manual_initialize_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once trailingslashit( get_template_directory() ) . 'framework/post-meta/library/init.php';
	}
}
add_action( 'init', 'manual_initialize_meta_boxes', 9999 );
require trailingslashit( get_template_directory() ) . 'framework/post-meta/home-pg-block.php';
require trailingslashit( get_template_directory() ) . 'framework/post-meta/page-meta.php';


/*-----------------------------------------------------------------------------------*/
/*	Customizer
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/customizer.php';
/*-----------------------------------------------------------------------------------*/
/*	Custom template tags for this theme
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/template-tags.php';

// Add Yes/No to Documentation admin
add_filter('manage_edit-manual_documentation_columns', 'manual_doc_admin_columns_yes');
function manual_doc_admin_columns_yes($columns) {
	$new_columns = array(
					'doc_yes' => esc_html__('Post Like', 'manual'),
					'doc_no' => esc_html__('Post Unlike', 'manual'),
					'doc_stats' => esc_html__('Post Visitors', 'manual'),
				   );
    return array_merge($columns, $new_columns);
}

add_action('manage_manual_documentation_posts_custom_column', 'manual_show_doc_admin_columns');
function manual_show_doc_admin_columns($name) {
		global $post;
		switch ($name) {
		case 'doc_yes':
			$yes = get_post_meta($post->ID, 'votes_count_doc_manual', true);
			if ($yes) {
				echo $yes .esc_html__(' like', 'framework');
			} else {
				echo esc_html__('--', 'framework');
			}
			break;
			
		 case 'doc_no':
		 	$no = get_post_meta($post->ID, 'votes_unlike_doc_manual', true);
			if ($no) {
				echo $no .esc_html__(' unlike', 'framework');
			} else {
				echo esc_html__('--', 'framework');
			}
			break;
			
		 case 'doc_stats':
		 	echo $visitors = get_post_meta($post->ID, 'manual_post_visitors', true);
			break;
			
		}
}

// Add Yes/No to Knowledgebase admin
add_filter('manage_edit-manual_kb_columns', 'manual_kb_admin_columns');
function manual_kb_admin_columns($columns) {
	$new_columns = array(
					'doc_yes' => esc_html__('Post Like', 'manual'),
					'doc_no' => esc_html__('Post Unlike', 'manual'),
					'doc_stats' => esc_html__('Post Visitors', 'manual'),
				   );
    return array_merge($columns, $new_columns);
}
add_action('manage_manual_kb_posts_custom_column', 'manual_show_kb_admin_columns');
function manual_show_kb_admin_columns($name) {
		global $post;
		switch ($name) {
		case 'doc_yes':
			$yes = get_post_meta($post->ID, 'votes_count_doc_manual', true);
			if ($yes) {
				echo $yes .esc_html__(' like', 'framework');
			} else {
				echo esc_html__('--', 'framework');
			}
			break;
			
		 case 'doc_no':
		 	$no = get_post_meta($post->ID, 'votes_unlike_doc_manual', true);
			if ($no) {
				echo $no .esc_html__(' unlike', 'framework');
			} else {
				echo esc_html__('--', 'framework');
			}
			break;
			
		 case 'doc_stats':
		 	echo $visitors = get_post_meta($post->ID, 'manual_post_visitors', true);
			break;
			
		}
}

// Add Yes/No to Portfolio admin
add_filter('manage_edit-manual_portfolio_columns', 'manual_portfolio_admin_columns');
function manual_portfolio_admin_columns($columns) {
	$new_columns = array(
					'doc_yes' => esc_html__('Post Like', 'manual'),
					'doc_no' => esc_html__('Post Unlike', 'manual'),
					'doc_stats' => esc_html__('Post Visitors', 'manual'),
				   );
    return array_merge($columns, $new_columns);
}
add_action('manage_manual_portfolio_posts_custom_column', 'manual_show_portfolio_admin_columns');
function manual_show_portfolio_admin_columns($name) {
		global $post;
		switch ($name) {
		case 'doc_yes':
			$yes = get_post_meta($post->ID, 'votes_count_doc_manual', true);
			if ($yes) {
				echo $yes .esc_html__(' like', 'framework');
			} else {
				echo esc_html__('--', 'framework');
			}
			break;
			
		 case 'doc_no':
		 	$no = get_post_meta($post->ID, 'votes_unlike_doc_manual', true);
			if ($no) {
				echo $no .esc_html__(' unlike', 'framework');
			} else {
				echo esc_html__('--', 'framework');
			}
			break;
			
		 case 'doc_stats':
		 	echo $visitors = get_post_meta($post->ID, 'manual_post_visitors', true);
			break;
			
		}
}

/**
 * Widget Register
 */
require trailingslashit( get_template_directory() ) . 'framework/widget-type.php';


/***
* DOC RECORD
****/

add_action('wp_ajax_nopriv_display-doc-post', 'manual_doc_post');
add_action('wp_ajax_display-doc-post', 'manual_doc_post');

function manual_doc_post(){
	
	global $theme_options, $post, $withcomments;
	
	/******
	*** wpstickies Compatible
	******/
	if ( function_exists ( 'wpstickies_js' ) ) {
		wpstickies_js();
	}
	
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'doc-ajax-nonce' ) )
        die ( 'Busted!');
		
    if(isset($_POST['post_id']))
    {
		?>
<script>
jQuery(document).ready(function() {
	
    jQuery(".post-like a").click(function(){ 
        heart = jQuery(this);
        // Retrieve post ID from data attribute
        post_id = heart.data("post_id");
        // Ajax call
        jQuery.ajax({
            type: "post",
            url: doc_ajax_var.url,
			data: { action: 'post-like', 
					nonce: doc_ajax_var.nonce,
					post_id: post_id,
					post_like: '',
				  },
			success: function(data, textStatus, XMLHttpRequest){ 
					jQuery( "span.manual_doc_count" ).text(data);
			},
			error: function(MLHttpRequest, textStatus, errorThrown){  
				//alert(textStatus); 
			}
        });
        return false;
    })
	
	
    jQuery(".post-unlike a").click(function(){ 
        heart = jQuery(this);
        // Retrieve post ID from data attribute
        post_id = heart.data("post_id");
        // Ajax call
        jQuery.ajax({
            type: "post",
            url: doc_ajax_var.url,
			data: { action: 'post-unlike', 
					nonce: doc_ajax_var.nonce,
					post_id: post_id,
					post_like: '',
				  },
			success: function(data, textStatus, XMLHttpRequest){ 
					jQuery( "span.manual_doc_unlike_count" ).text(data);
			},
			error: function(MLHttpRequest, textStatus, errorThrown){  
				//alert(textStatus); 
			}
        });
        return false;
    })	
	
	
	// Impression
	var ids = 0;
	jQuery('.manual-views').each(function(){
		imp_postIDs = jQuery(this).attr('id').replace('manual-views-','');
		ids++;
	});
	if(imp_postIDs != '' ) { 
		jQuery.ajax({
				type: "post",
				url: doc_ajax_var.url,
				data: { action: 'manual-doc-impression', 
						nonce: doc_ajax_var.nonce,
						post_id: imp_postIDs,
					  },
				success: function(data, textStatus, XMLHttpRequest){ /*alert(data);*/ },
				error: function(MLHttpRequest, textStatus, errorThrown){ /*alert(textStatus);*/  }
		});
	}
	
})
</script>
<style> .pull-right.reply { display: none; } </style>
<?php 
		$post = get_post($_POST['post_id']);
		
		echo '<div id="single-post post-'.$post->ID.'">';
		  	echo '<div class="page-title-header"> 
				   <h2 class="manual-title title singlepg-font">'. $post->post_title .'</h2>';
				   
				   if( $theme_options['documentation-quick-stats-under-title'] == true ) { 
				   	$class_quick_stats_active = 'style="min-height:10px;"';  
				   } else {
				   	$class_quick_stats_active = '';  
				   }
				   
				   echo '<p '.$class_quick_stats_active.'>';
				   if( $theme_options['documentation-quick-stats-under-title'] == false ) {
				   echo '<i class="fa fa-eye"></i> <span>';  
					
					if( get_post_meta( $post->ID, 'manual_post_visitors', true ) != '' ) { 
						echo get_post_meta( $post->ID, 'manual_post_visitors', true );
						echo esc_html_e( ' views ', 'manual' );
					} else { echo '0 views'; } 
                   
					 echo '</span><i class="fa fa-calendar"></i> <span>';  echo get_the_date( get_option('date_format'), $post->ID ); echo '</span>';
					 
					 if( $theme_options['documentation-singlepg-modified-date-status'] == true ) {
					 if (get_post_modified_time(get_option('date_format'),'',$post->ID) != get_the_time(get_option('date_format'),$post->ID) ) { 
						  echo '<i class="fa fa-calendar-plus-o"></i> <span>'.get_post_modified_time(get_option('date_format'),'',$post->ID).'</span>';
					  } 
					 } 
					 
					 echo '<i class="fa fa-user"></i> <span>';  $author_id = $post->post_author; echo the_author_meta( $theme_options['documentation-single-post-user-name'] , $author_id ); echo '</span>';
					 echo ' <i class="fa fa-thumbs-o-up"></i> <span>'; if( get_post_meta( $post->ID, 'votes_count_doc_manual', true ) == '' ) { echo 0; } else { echo get_post_meta( $post->ID, 'votes_count_doc_manual', true ); } echo '</span>';
					 
				   }
					 edit_post_link( esc_html__( 'Edit', 'manual' ), '<span class="edit-link">', '</span>', $post->ID );
                   
				  echo '</p>
				 </div><div class="post-cat margin-btm-35"></div>
				 <div class="entry-content clearfix">'.apply_filters('the_content', $post->post_content).'</div>';
				 
				  
					if( get_post_meta( $post->ID, '_manual_attachement_access_status', true ) == true && !is_user_logged_in() ) {
						$message = get_post_meta( $post->ID, '_manual_attachement_access_login_msg', true );
						manual_access_attachment($message, 1);
					} else { 
						manual_kb_attachment_files($post->ID); 
					}
				 
				  
				// manual_kb_attachment_files($post->ID);
				 echo '<div style="clear:both"></div>';
					if( $theme_options['documentation-social-share-status'] == false ) {
					manual_social_share(get_permalink($post->ID));
					}

					if( ($theme_options['documentation-voting-buttons-status'] == false && $theme_options['documentation-voting-login-users'] == false ) ||
						($theme_options['documentation-voting-buttons-status'] == false && $theme_options['documentation-voting-login-users'] == true && is_user_logged_in())
					) {
					echo '<div class="panel-heading" style="padding:0px;">
						<div id="rate-topic-content" class="row-fluid">
							<div class="rate-buttons"> ';
					if(isset($theme_options['yes-no-above-message'])) { echo '<p class="helpfulmsg" >'.$theme_options['yes-no-above-message'].'</p>'; }
                    
			echo ' <span class="post-like"><a data-post_id="'.$post->ID.'" href="#"><span class="btn btn-success rate custom-like-dislike-btm" data-rating="1"><i class="glyphicon glyphicon-thumbs-up"></i> <span class="manual_doc_count">'. $meta_values = get_post_meta( $post->ID, 'votes_count_doc_manual', true ).' '.esc_html__( ' Yes ', 'manual' ).'</span></span></a></span>&nbsp;';		
			
			echo '<span class="post-unlike"><a data-post_id="'. $post->ID .'" href="#"><span class="btn btn-danger rate custom-like-dislike-btm" data-rating="0">
                <i class="glyphicon glyphicon-thumbs-down"></i> <span class="manual_doc_unlike_count">'. $meta_values = get_post_meta( $post->ID, 'votes_unlike_doc_manual', true ) .' '.esc_html__( ' No ', 'manual' ).' </span></span></a></span> ';		
							
							
			echo '</div>';
			
			if( is_super_admin() && is_user_logged_in() ) {
				echo '<span class="post-reset"><a data-post_id="'.$post->ID.'" href="#"><span class="btn btn-link" data-rating="0"> <i class="fa fa-refresh"></i> <span class="rating_reset_display"> Reset </span></span></a></span>';
			}
			
			echo '</div>
					<div class="clearfix"></div>
					<span class="manual-views" id="manual-views-'.$post->ID.'"></span>
				</div>';						  
					}
		echo '</div>';
		
		if( $theme_options['documentation-related-post-status'] == true ) manual_doc_related_post($post->ID);
		
		/*if( $theme_options['documentation-comment-status'] == true ) {
			if ( comments_open() || get_comments_number() ) { 
				$withcomments = true;
				comments_template( '', true ); 
			}
		}*/
		
	}
	 exit;
}

/***
* IMPRESSION
****/
add_action('wp_ajax_nopriv_manual-doc-impression', 'manual_doc_post_visitors');
add_action('wp_ajax_manual-doc-impression', 'manual_doc_post_visitors');
function manual_doc_post_visitors()
{  
	// Check for nonce security
    $nonce = $_POST['nonce'];
    if ( ! wp_verify_nonce( $nonce, 'doc-ajax-nonce' ) )
        die ( 'Busted!');
	 if(isset($_POST['post_id'])) {echo $_POST['post_id'];
		$post_id = $_POST['post_id'];
		$meta_visitors = get_post_meta($post_id, "manual_post_visitors", true);
		update_post_meta($post_id, "manual_post_visitors", ++$meta_visitors);
	}
	 exit;
}
/***
* VOTING
****/
add_action('wp_ajax_nopriv_post-like', 'manual_doc_post_like');
add_action('wp_ajax_post-like', 'manual_doc_post_like');
add_action('wp_ajax_nopriv_post-unlike', 'manual_doc_post_unlike');
add_action('wp_ajax_post-unlike', 'manual_doc_post_unlike');
add_action('wp_ajax_nopriv_post-reset-stats', 'manual_stats_reset');
add_action('wp_ajax_post-reset-stats', 'manual_stats_reset');

function manual_stats_reset() {
	
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'doc-ajax-nonce' ) )
        die ( 'Busted!');
		
    if(isset($_POST['post_reset'])) { 
		$post_id = $_POST['post_id'];  
		update_post_meta($post_id, "voted_IP", '');
		update_post_meta($post_id, "votes_count_doc_manual", '');
		update_post_meta($post_id, "votes_unlike_doc_manual", '');
		update_post_meta($post_id, "manual_post_visitors", '');
	}
	exit;
}

function manual_doc_post_unlike()
{
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'doc-ajax-nonce' ) )
        die ( 'Busted!');
		
    if(isset($_POST['post_like']))
    {
        // Retrieve user IP address
        $ip = $_SERVER['REMOTE_ADDR'];
        $post_id = $_POST['post_id'];
        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "voted_IP");
		if (!empty($meta_IP)) {
			$voted_IP = $meta_IP[0];
		} else {
			$voted_IP = '';
		}
 
        if(!is_array($voted_IP))
            $voted_IP = array();
			// Get votes count for the current post
			$meta_count = get_post_meta($post_id, "votes_unlike_doc_manual", true);
 
        // Use has already voted ?
        if(!manual_hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();
            // Save IP and increase votes count
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "votes_unlike_doc_manual", ++$meta_count);
            // Display count (ie jQuery return value)
            echo $meta_count.' No';
        }
        else {
            echo "already voted";
		}
    }
    exit;
}

function manual_doc_post_like()
{
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'doc-ajax-nonce' ) )
        die ( 'Busted!');
		
    if(isset($_POST['post_like']))
    {
        // Retrieve user IP address
        $ip = $_SERVER['REMOTE_ADDR'];
        $post_id = $_POST['post_id'];
        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "voted_IP");
		if (!empty($meta_IP)) {
			$voted_IP = $meta_IP[0];
		} else {
			$voted_IP = '';
		}
 
        if(!is_array($voted_IP))
            $voted_IP = array();
			// Get votes count for the current post
			$meta_count = get_post_meta($post_id, "votes_count_doc_manual", true);
 
        // User has already voted ?
        if(!manual_hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();
            // Save IP and increase votes count
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "votes_count_doc_manual", ++$meta_count);
            // Display count (ie jQuery return value)
            echo $meta_count.' Yes';
        } else {
             echo "already voted";
		}
    }
    exit;
}

$timebeforerevote = 30; // = 30 mins
function manual_hasAlreadyVoted($post_id)
{
    global $timebeforerevote;
 
    // Retrieve post votes IPs
    $meta_IP = get_post_meta($post_id, "voted_IP");
	if (!empty($meta_IP)) {
		$voted_IP = $meta_IP[0];
	} else {
		$voted_IP = '';
	}
     
    if(!is_array($voted_IP))
        $voted_IP = array();
         
    // Retrieve current user IP
    $ip = $_SERVER['REMOTE_ADDR'];
     
    // If user has already voted
    if(in_array($ip, array_keys($voted_IP)))
    {
        $time = $voted_IP[$ip];
        $now = time();
         
        // Compare between current time and vote time
        if(round(($now - $time) / 60) > $timebeforerevote)
            return false;
             
        return true;
    }
     
    return false;
}

/**
 * Widget Register
 */
require trailingslashit( get_template_directory() ) . 'framework/temp-nav.php';

/** 
 * Plugin Activation
 */
require_once trailingslashit( get_template_directory() ) . 'framework/inc/tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'manual_theme_register_required_plugins' );

function manual_theme_register_required_plugins() {
	$theme_url = trailingslashit( get_template_directory() );
	$plugins = array(
		// bbPress
		array(
			'name'               => 'bbPress', // The plugin name.
			'slug'               => 'bbpress', // The plugin slug (typically the folder name).
			'source'             => 'https://downloads.wordpress.org/plugin/bbpress.2.5.8.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', 
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => 'https://downloads.wordpress.org/plugin/bbpress.2.5.8.zip', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		// Woo
		array(
			'name'         => 'WooCommerce', // The plugin name.
			'slug'         => 'woocommerce', // The plugin slug (typically the folder name).
			'source'       => 'https://downloads.wordpress.org/plugin/woocommerce.2.6.6.zip', // The plugin source.
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://downloads.wordpress.org/plugin/woocommerce.2.6.6.zip', // If set, overrides default API URL and points to an external URL.
		),
		// Contact Form 7
		array(
			'name'         => 'Contact Form 7', // The plugin name.
			'slug'         => 'contact-form-7', // The plugin slug (typically the folder name).
			'source'       => 'https://downloads.wordpress.org/plugin/contact-form-7.4.2.2.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://downloads.wordpress.org/plugin/contact-form-7.4.2.2.zip', // If set, overrides default API URL and points to an external URL.
		),
		// Regenerate Thumbnails
		array(
			'name'         => 'Regenerate Thumbnails', // The plugin name.
			'slug'         => 'regenerate-thumbnails', // The plugin slug (typically the folder name).
			'source'       => 'https://downloads.wordpress.org/plugin/regenerate-thumbnails.zip', // The plugin source.
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://downloads.wordpress.org/plugin/regenerate-thumbnails.zip', // If set, overrides default API URL and points to an external URL.
		),
		// WPCustom Category Image
		array(
			'name'         => 'WPCustom Category Image', // The plugin name.
			'slug'         => 'wpcustom-category-image', // The plugin slug (typically the folder name).
			'source'       => $theme_url.'install/wpcustom-category-image.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => $theme_url.'install/wpcustom-category-image.zip', // If set, overrides default API URL and points to an external URL.
		),
		// WPCustom Category Image
		array(
			'name'         => 'Manual Framekwork', // The plugin name.
			'slug'         => 'manual-framework', // The plugin slug (typically the folder name).
			'source'       => $theme_url.'install/manual-framework.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => $theme_url.'install/manual-framework.zip', // If set, overrides default API URL and points to an external URL.
		),
		// VC
		array(
			'name'         => 'Visual Composer', // The plugin name.
			'slug'         => 'js_composer', // The plugin slug (typically the folder name).
			'source'       => $theme_url.'install/js_composer.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => $theme_url.'install/js_composer.zip', // If set, overrides default API URL and points to an external URL.
		),
		// Slider R
		array(
			'name'         => 'Slider Revolution', // The plugin name.
			'slug'         => 'revslider', // The plugin slug (typically the folder name).
			'source'       => $theme_url.'install/revslider.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => $theme_url.'install/revslider.zip', // If set, overrides default API URL and points to an external URL.
		),
		
	);
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}


function manual_access_attachment($message, $ajaxcall_login = '') {
	global $theme_options;
	echo '<div class="manual_attached_section">';
	echo '<h5>'.$theme_options['attached-file-title'].'</h5>';
	echo '<span class="separator small"></span>
	  <div class="wrapbox" style="background:none;">
		   <div class="col-md-12 col-sm-12">
				<div class="manual_login_page">
				  <div class="custom_login_form">';
				   if( $message != '' ) { 
						echo '<h3>'.stripslashes($message).'</h3>'; 
					}
					if( $ajaxcall_login == '' ) {
						$args = array(
							'echo' => false,
						);
						echo wp_login_form($args); 
                    } else {
						echo ' <form action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post"><input type="submit" class="button-primary" value="Log In"></form>';
					}
					echo '<ul class="custom_register">';
					if ( get_option( 'users_can_register' ) ) { wp_register(); }
					echo '<li><a href="'.wp_lostpassword_url().'" title="Lost Password">Lost Password</a></li>
					</ul>
				  </div>
				</div>
			</div>
	  </div>
	</div>';	
}

function manual_kb_attachment_files($postID = '') {
	global $theme_options;
	
	if( isset($theme_options['attached-file-title']) && $theme_options['attached-file-title'] != '' ) {
		$attached_title = $theme_options['attached-file-title'];
	}
	
	if( $postID != '' ) { 
		$entries = get_post_meta( $postID, '_manual_custom_post_attached_files', true );
	} else {  
		$entries = get_post_meta( get_the_ID(), '_manual_custom_post_attached_files', true );
	}
	if( !empty($entries)) { 
	echo '<div class="manual_attached_section">
		  <h5>'.$attached_title.'</h5>
		  <span class="separator small"></span>
		  <div class="wrapbox">
		  <table class="table table-hover"> 
			<thead> 
				<tr> 
					<th>#</th> 
					<th>'.$attached_title = $theme_options['attached-file-type'].'</th> 
					<th>'.$attached_title = $theme_options['attached-file-size'].'</th> 
					<th>'.$attached_title = $theme_options['attached-file-download'].'</th> 
				</tr> 
			</thead>	
			 ';
		$i = 1;	
		foreach ( (array) $entries as $key => $entry ) {
			$file_size = filesize( get_attached_file( $entry['image_id'] ) );
			$attach_file_type = wp_check_filetype($entry['image']);
			$filename = ( get_the_title($entry['image_id'])?get_the_title($entry['image_id']):basename( get_attached_file( $entry['image_id'] ) )); 
			$img = $title = $desc = $caption = '';
			if ( isset( $entry['title'] ) ) $title = esc_html( $entry['title'] );
				if ( isset( $entry['image'] ) ) { 
                    echo '<tbody> 
                        <tr> 
                            <th scope="row">'.$i.'</th> 
                            <td>'. '.'.$attach_file_type['ext'].'</td> 
                            <td>'. size_format($file_size, 2) .'</td> 
                            <td><a href="'. wp_get_attachment_url( $entry['image_id'] ) .'">'. $filename .'</a></td> 
                        </tr> 
                    </tbody>'; 
				}
		$i++;		
		}
		echo '</table></div></div>';
	}
}


function manual_kb_related_post() {
	global $post, $theme_options;
	if( isset($theme_options['kb-related-post-per-page']) && $theme_options['kb-related-post-per-page'] != '' ) {
		$posts_per_page = $theme_options['kb-related-post-per-page'];
	} else {
		$posts_per_page = 6;
	}
	$categories = get_the_terms($post->ID, 'manualknowledgebasecat');
	//print_r($categories);
	if ($categories) {
		$category_ids = array();
		foreach($categories as $individual_category) 
			$category_ids[] = $individual_category->term_id;
			//print_r($category_ids);
		$args=array(
		'post_type' => 'manual_kb',
		'tax_query' => array(
			array(
				'taxonomy' => 'manualknowledgebasecat',
				'field' => 'term_id',
				'terms' => $category_ids
			)
		),
		'post__not_in' => array($post->ID),
		'posts_per_page'=> $posts_per_page, // Number of related posts that will be shown.
		'ignore_sticky_posts'=>1 // sticky post hide
	   );
	   $related_articles_query = new wp_query( $args );
	   if( $related_articles_query->have_posts() ) {
	   ?>
        <section class="manual_related_articles">
            <h5><?php echo $theme_options['kb-related-post-title']; ?></h5>
            <span class="separator small"></span>
            <ul class="kbse">
            <?php 
			 while( $related_articles_query->have_posts() ) {
	                $related_articles_query->the_post();
			?>
            	<li class="cat inner"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></li>
             <?php } ?>
            </ul>
        </section>      
	   <?php 	   
	   }
	}
	wp_reset_postdata();
}




function manual_doc_related_post($currentID) {
	global $post, $theme_options;
	if( isset($theme_options['documentation-related-post-per-page']) && $theme_options['documentation-related-post-per-page'] != '' ) {
		$posts_per_page = $theme_options['documentation-related-post-per-page'];
	} else {
		$posts_per_page = 6;
	}
	$categories = get_the_terms($currentID, 'manualdocumentationcategory');
	//print_r($categories);
	if ($categories) {
		$category_ids = array();
		foreach($categories as $individual_category) 
			$category_ids[] = $individual_category->term_id;
			//print_r($category_ids);
		$args=array(
		'post_type' => 'manual_documentation',
		'tax_query' => array(
			array(
				'taxonomy' => 'manualdocumentationcategory',
				'field' => 'term_id',
				'terms' => $category_ids
			)
		),
		'post__not_in' => array($currentID),
		'posts_per_page'=> $posts_per_page, // Number of related posts that will be shown.
		'ignore_sticky_posts'=>1 // sticky post hide
	   );
	   $related_articles_query = new wp_query( $args );
	   if( $related_articles_query->have_posts() ) {
	   ?>
        <style>.manual_related_articles h5:before { left: 26px; } .body-content li.cat.inner:before { left: 30px; }</style>
        <section class="manual_related_articles">
            <h5><?php echo $theme_options['documentation-related-post-title']; ?></h5>
            <span class="separator small"></span>
            <ul class="kbse">
            <?php 
			 while( $related_articles_query->have_posts() ) {
	                $related_articles_query->the_post();
			?>
            	<li class="cat inner"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></li>
             <?php } ?>
            </ul>
        </section>      
	   <?php 	   
	   }
	}
	wp_reset_postdata();
}


add_action( 'wp_footer', 'manual_custom_js_code');
function manual_custom_js_code() {
	global $post, $theme_options;
?>
<?php if( !empty( $theme_options['js_code_call_after_ajax_page_load'] ) &&  $theme_options['activate_js_call_after_ajax_page_load'] == true ) { ?>
<script><?php echo $theme_options['js_code_call_after_ajax_page_load']; ?></script><?php } ?>
<script type="text/javascript">
    var sticky_menu = <?php if ( $theme_options['theme-sticky-menu'] == false ){ echo 1; } else { echo 2; } ?>;
    var manual_searchmsg = '<?php if( isset($theme_options['global-flip-search-text-paceholder']) ){ echo str_replace("'", "", $theme_options['global-flip-search-text-paceholder']); } ?>';
	
	var owlCarousel_item = <?php echo ( $theme_options['home-help-section-mindisplay-blocks']?$theme_options['home-help-section-mindisplay-blocks']:'4'); ?>;
	<?php if ( $theme_options['manual-live-search-status'] == true ){ ?>
	var live_search_active = 1;
	var live_search_url = '<?php echo home_url('/'); ?>';
	<?php } else { ?>
	var live_search_active = 2;
	var live_search_url = '';
	<?php } ?>
	
	/**** DOCUMENTATION  ****/
	<?php
	$footer_js_term_slug = get_query_var( 'term' );
	$footer_js_current_term = get_term_by( 'slug', $footer_js_term_slug, 'manualdocumentationcategory' ); 
	if(  isset($footer_js_current_term->taxonomy) == 'manualdocumentationcategory'  ) {
		if ( $theme_options['documentation-hash-search-status'] == true ) {
			$doc_catpage = 1;
			$cooie_search = 2;
		} else {
			$doc_catpage = 2;
			// cookie search
			if( (int) isset($_COOKIE['manualDocSingleID']) ) { 
				$cooie_search = 1;
			} else {
				$cooie_search = 2;
			}
		}
		if ( $theme_options['documentation-menu-scroller-status'] == true ) { 
			$doc_category_page_active = 1;
		} else { 
			$doc_category_page_active = 2; 
		}
		
		if( !empty ( $theme_options['documentation-scroll-after-menu-height-new'] ) ) {
			$scroll_define_height = $theme_options['documentation-scroll-after-menu-height-new'].'px';
		} else {
			$scroll_define_height = '400px';
		}
		
	} else {
		
		$post_info = get_post_type( $post );
		if( $post_info == 'manual_documentation' ) {
			$doc_catpage = 2;
			$doc_category_page_active = 1;
			$cooie_search = 1;
		} else {
			$doc_catpage = 2;
			$doc_category_page_active = 2;
			$cooie_search = 2;
		}
		if( !empty ( $theme_options['documentation-scroll-after-menu-height-new'] ) ) {
			$scroll_define_height = $theme_options['documentation-scroll-after-menu-height-new'].'px';
		} else {
			$scroll_define_height = '400px';
		}
		
	}
	
	if(  $theme_options['activate_js_call_after_ajax_page_load'] == false ) $execute_js_code_ajax_callpg = 2;
	else $execute_js_code_ajax_callpg = 1;
	?>
	var doc_catpage_hash = <?php echo $doc_catpage; ?>;
	var doc_catpage_active = <?php echo $doc_category_page_active; ?>;
	var doc_cookie_sh = <?php echo $cooie_search; ?>;
	var doc_scroll_menu_define_height = '<?php echo $scroll_define_height; ?>';
	var go_up_icon = '<?php echo $theme_options['go_up_arrow_icon_style']; ?>';
    var execute_js_after_ajax_call_pg_doc = '<?php echo $execute_js_code_ajax_callpg; ?>';
		
	/*** FAQ ***/
	<?php 
	$footer_js_faq_slug = get_query_var( 'term' );
	$footer_js_faq_current_term = get_term_by( 'slug', $footer_js_faq_slug, 'manualfaqcategory' ); 
	if(  isset($footer_js_faq_current_term->taxonomy) == 'manualfaqcategory'  ) { 
	?>
		var faq_search = location.href.split('#');
		if ( faq_search[1] != null ){
			var faq_search_id = faq_search[1];
		} else {
			var faq_search_id = '';
		}
	<?php 
	} else {
		?>
		var faq_search_id = '';
		<?php 
	}
	?>
</script>
<?php
} 

/*-----------------------------------------------------------------------------------*/
/*	Plugin Update Checker
/*-----------------------------------------------------------------------------------*/ 

function manual_plugin_notify() {
?>
<div class="message" style="padding: 10px; font-size: 14px; color: #FCFCFC; color: #000000; background: white; box-shadow: 1px 1px 10px #828181;"><span style="color: #C31111; font-weight:bold;">PLEASE UPGRADE "Manual Framework (Post Type)" to new version 1.4</span> <br><br> 1. Go to: Plugins -> Installed Plugins. <br>2. <strong>DELETE plugin</strong> "Manual Framework (Post Type)" for the system. <strong><i>(you must DEACTIVATE plugin first and DELETE it)</i></strong> <br> 3. <strong>Click on "Begin installing plugin"</strong>, to install new version.</span> <br><br><i>Note: No data will be loss in this upgrade process.</i> </div>
<?php 
}
	
$manual_theme_framework_version_check = "1.4"; 
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active('manual-framework/manual-framework.php') ) {
	$manual_theme_framework_version = get_option( 'manual_theme_framework_version' );
	if( $manual_theme_framework_version != $manual_theme_framework_version_check || $manual_theme_framework_version == '' ) {  
		add_action('admin_notices', 'manual_plugin_notify');
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Google Analytics Code
/*-----------------------------------------------------------------------------------*/ 

if(!function_exists("manual_google_analytics_code")){
    function manual_google_analytics_code($location){
    	global $theme_options;
    	$saved_location = (isset($theme_options['manual-tracking-code-position']) && !empty($theme_options['manual-tracking-code-position']) ? $theme_options['manual-tracking-code-position'] : "");
    	
    	if(!empty($theme_options['manual-google-analytics'])){
    		if($location == "head" && $saved_location == 1) {
                echo "<script type='text/javascript'>"; 
    			echo $theme_options['manual-google-analytics'];
                echo "</script>";

    		} elseif($location == "body" && empty($saved_location)){
                echo "<script type='text/javascript'>"; 
    			echo $theme_options['manual-google-analytics'];
                echo "</script>";
    		}	
    		
    	}
    }
}



/*-----------------------------------------------------------------------------------*/
/*	R=D DOC, FAQ
/*-----------------------------------------------------------------------------------*/ 
add_action( 'template_redirect', 'manual_doc_redirect_post' );

function manual_doc_redirect_post() {
  global $post, $theme_options;
  $queried_post_type = get_query_var('post_type');
  $term_slug = get_query_var( 'term' );
  // Doc
  $current_term = get_term_by( 'slug', $term_slug, 'manualdocumentationcategory' );
  if ( is_single() && 'manual_documentation' ==  $queried_post_type ) {
	 // current post ID
	 $postID = get_the_ID();
	 // Post category ID
	 $terms = get_the_terms( $postID , 'manualdocumentationcategory' );
	 if( !empty($terms) ) { 
		 $term = array_pop($terms);
		 $catID = $term->term_taxonomy_id;
		 // Generate Cat link
		 if ( $theme_options['documentation-hash-search-status'] == true ){
			 $category_link = esc_url( get_category_link( $catID ) ).'#'.$postID;	 
		 } else {
			 $category_link = esc_url( get_category_link( $catID ) );
		 }
		 if( $theme_options['documentation-search-redirect-status'] == false ) {
			 if ( $theme_options['documentation-hash-search-status'] != true ) setcookie("manualDocSingleID", $postID, time()+ (60 * 1), '/');
			 wp_redirect( $category_link, 301 );
			 exit;
		 } else {
			if ( $theme_options['documentation-hash-search-status'] != true ) setcookie("manualDocSingleID", '', time() - 3600, '/'); 
		 }
	 } else {
		 esc_html_e( 'Please assign category for your Documentation RECORD', 'manual' );
		 exit;
	 }
  } else if(  isset($current_term->taxonomy) == 'manualdocumentationcategory'  ) {
	 setcookie("manualDocSingleID", '', time() - 3600, '/'); 
  }
  
  // Faq
  $current_term_faq = get_term_by( 'slug', $term_slug, 'manualfaqcategory' );
  if ( is_single() && 'manual_faq' ==  $queried_post_type ) {
     // current post ID
	 $postID = get_the_ID();
	 // Post category ID
	 $terms = get_the_terms( $postID , 'manualfaqcategory' );
	 if( !empty($terms) ) { 
		 $term = array_pop($terms);
		 $catID = $term->term_taxonomy_id;
		 // Generate Cat link
		 $category_link = esc_url( get_category_link( $catID ) ).'#'.$postID;
		 //$category_link = esc_url( get_category_link( $catID ) );
		 //setcookie("manualFaqSingleID", $postID, time()+ (60 * 1), '/');
		 wp_redirect( $category_link, 301 );
		 exit;
	 } else {
		 esc_html_e( 'Please assign category for your FAQ RECORD', 'manual' );
		 exit;
	 }
  } else if(  isset($current_term_faq->taxonomy) == 'manualfaqcategory'  ) {
	 setcookie("manualFaqSingleID", '', time() - 3600, '/'); 
  }
  
  
}

/*-----------------------------------------------------------------------------------*/
/*	WIDGET
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/includes/widget.php';
/*-----------------------------------------------------------------------------------*/
/*	SUPPORT FUNCTION
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/includes/functions.php';
/*-----------------------------------------------------------------------------------*/
/*	WOOCOMMERCE
/*-----------------------------------------------------------------------------------*/
require trailingslashit( get_template_directory() ) . 'woocommerce/woocommerce_configuration.php';

?>