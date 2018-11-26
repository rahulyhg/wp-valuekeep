<?php
/*
Plugin Name: WP Fancy Message Box
Plugin URI: http://www.mindstien.com
Description: Uses shortcode to display diffrent style message box like error message box, info message box, you can configure different message box  using shortcode parameters. See below shortcode with default parameters....
Author: Mindstien Technologies
Version: 1.2
Author URI: http://www.mindstien.com
*/


add_action('init', 'init_css');

function init_css()
{
	if (!is_admin()) {
		wp_register_style( 'msgbox.css', plugins_url('css/msgbox.css', __FILE__) );
		wp_enqueue_style( 'msgbox.css' );
	}
}

add_shortcode('wpfmb','test1');
function test1($atts,$content=null)
{
	extract( shortcode_atts( array(
	      'type' => 'info',
	      'theme' => 1,
	      
     ), $atts ) );
	 
	 if($theme==3)
	 {
		switch($type)
		{
			case 'up':
				$a="<div class='up'>".$content."</div>";
				return $a;
				break;
			case 'down':
				$a="<div class='down'>".$content."</div>";
				return $a;
				break;
			case 'left':
				$a="<div class='left'>".$content."</div>";
				return $a; 
				break;
			case 'right':
				$a="<div class='right'>".$content."</div>";
				return $a;
				break;
		}
			
	 }
	 else
	 {
	 switch($type)
	 {
		case 'info':
			$a="<div class='info".$theme."'>".$content."</div>";
			return $a;
			break;
		case 'success':
			$a="<div class='success".$theme."'>".$content."</div>";
			return $a;
			break;
		case 'warning':
			$a="<div class='warning".$theme."'>".$content."</div>";
			return $a;
			break;
		case 'error':
			$a="<div class='error".$theme."'>".$content."</div>";
			return $a;
			break;
		case 'info1':
			$a="<div class='info".$theme."'>".$content."</div>";
			return $a;
			break;
		case 'success1':
			$a="<div class='success".$theme."'>".$content."</div>";
			return $a;
			break;
		case 'warning1':
			$a="<div class='warning".$theme."'>".$content."</div>";
			return $a;
			break;
		case 'error1':
			$a="<div class='error".$theme."'>".$content."</div>";
			return $a;
			break;
		
	 }}
}
?>