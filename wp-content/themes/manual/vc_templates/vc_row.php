<?php
$v_image = $video_container = $border_color = $background_color = $row_id = $parallax_class = $data_parallax = $css = $el_class = $el_id = '';
extract(shortcode_atts(array(
	'el_id' => '',
	'el_class' => '',
	'disable_element' => '',
	'row_type' => '',
	'background_image' => '',
	'background_color' => '',
	'stretch_row_type' => '',
	'css' => '',
	'border_color' => '',
	'background_color_content_stretch' => '',
	'video' => '',
	'video_webm' => '',
	'video_mp4' => '',
	'video_ogv' => '',
	'video_image' => '',
), $atts));

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row section vc_row-fluid '. ( $this->settings('base')==='vc_row_inner' ? 'vc_inner ' : '' ) . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

// row id
if($el_id !== '') {
    $row_id = 'id="'.esc_attr($el_id).'"';
}

// parallax background
$_image = "";
if($background_image != '' || $background_image != ' ') { 
	$_image = wp_get_attachment_image_src( $background_image, 'full');
}

// video
$css_class_video =  "";
if($video == "show_video"){
	$css_class_video =  "video_section";
	$video_container = '';
}

// Conduction tags 
if($row_type == 'row'){
	if( $stretch_row_type == 'yes' ) {
		$background_color = "background:".$background_color.";";
		if( ($border_color != '') ) { $border_color = "border-bottom:1px solid ".$border_color.";"; }
	}
} else if($row_type == 'parallax'){
	$parallax_class = 'parallax-window';
	$data_parallax = 'data-parallax="scroll"';
} else if($row_type == 'full-width-content') {
	$background_color = "background:".$background_color_content_stretch.";";
}

if( $disable_element != 'yes' ) {
$output .='<div '.$row_id.' class=" vc-manual-section '.$video_container.' '. $css_class .' '. $parallax_class .''. $css_class_video .'" '.$data_parallax.' style="'.$background_color.' '.$border_color.'" ';
if($row_type == 'parallax'){ $output .= ($background_image !== '' || $background_image !== ' ') ? " data-image-src='".$_image[0]."'" : ""; }
$output .= '>';

if( $video == 'show_video' ) { 
 $v_image = wp_get_attachment_url($video_image);
 $output .= '<div class="mobile-video-image" style="background-image: url('.$v_image.')"></div>
			<div class="video-wrap">
			<video class="video" poster="'.$v_image.'" controls="controls" preload="auto" loop autoplay muted>';
					if(!empty($video_webm)) { $output .= '<source type="video/webm" src="'.$video_webm.'">'; }
					if(!empty($video_mp4)) { $output .= '<source type="video/mp4" src="'.$video_mp4.'">'; }
					if(!empty($video_ogv)) { $output .= '<source type="video/ogg" src="'. $video_ogv.'">'; }
 $output .='</video>
	        </div>';
}

if( $row_type != 'full-width-content'){ $output .='<div class="container vc-container">'; }
$output .= wpb_js_remove_wpautop($content);
if( $row_type != 'full-width-content'){ $output .='</div>'; }
$output .= "</div>".$this->endBlockComment('row');
echo $output;
}