<?php
$args = array(
    "title"         => "",
    "iconimage"     => "",
    "description"   => "",
    "link"          => "#",
    "vclinkoption"  => "",
	"licontent"       => "",
	"background_color"  => "",
	"box_border_color"  => "",
	"link_text_color"  => "",
	"box_font_color"  => "",
	"icon_color"  => "",
	"description_text_color"  => "",
);
extract(shortcode_atts($args, $atts));

$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
if( isset($link['target']) && $link['target'] != ''  ) { 
	$add_parm = 'target="_blank"';
} else { 
	$add_parm = '';
}

if( isset($link['title']) && $link['title'] != '' ) {
	$link_html = '<div> <a href="'.$link['url'].'" class="custom-link hvr-icon-wobble-horizontal" '.$add_parm .' style="letter-spacing:1px;color:'.$link_text_color.'!important;">'.$link['title'].'</a> </div>';
} else {
	$link_html = '';
}

echo '<div class="service_table_holder hvr-float">
  <ul class="service_table_inner" style="background:'.$background_color.';border-color:'.$box_border_color.';color:'.$box_font_color.';">
    <li class="service_table_title_holder">
      <h5 style="color:'.$box_font_color.'!important;">'.$title.'</h5>
      <i class="'.$iconimage.'" style="color:'.$icon_color.'"></i>
      <p class="info" style="color:'.$description_text_color.'">'.$description.'</p>
    </li>
    <li class="service_table_content">
      '.do_shortcode($content).'
      '.$link_html.'
    </li>
  </ul>
</div>';
?>