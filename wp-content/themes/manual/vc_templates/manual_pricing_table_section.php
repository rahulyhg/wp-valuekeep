<?php
$args = array(
    "title"        => "",
    "price"        => "",
    "currency"     => "",
    "price_period" => "",
	"link"         => "",
	"active"       => "",
	"background_color"  => "",
	"box_border_color"  => "",
	"text_color"  => "",
	"buttom_color"  => "",
);
extract(shortcode_atts($args, $atts));

$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
if( isset($link['target']) && $link['target'] != ''  ) { 
	$add_parm = 'target="_blank"';
} else { 
	$add_parm = '';
}

if( $buttom_color == '' ) {
	$buttom_color = 'btn-default';
} else {
	$buttom_color = $buttom_color;
}

if( isset($link['title']) && $link['title'] != '' ) {
	$link_html = '<div> <a href="'.$link['url'].'" class="btn '.$buttom_color.' pricing-btm" '.$add_parm .'>'.$link['title'].'</a> </div>';
} else {
	$link_html = '';
}

if( $active == 'yes' ) {
	$standout = 'standout';
} else {
	$standout = '';
}

echo '<div class="service_table_holder pricing-table '.$standout.' hvr-float" style="color:'.$text_color.'!important;">
  <ul class="service_table_inner" style="background:'.$background_color.';border-color:'.$box_border_color.';">
    <li class="service_table_title_holder">
      <h5 style="color:'.$text_color.'!important;">'.$title.'</h5>
	  <div class="price_in_table">
		  <sup class="value">'.$currency.'</sup>
		  <span class="price">'.$price.'</span>
		  <span class="mark">'.$price_period.'</span>
	  </div>
    </li>
    <li class="service_table_content">
      '.do_shortcode($content).'
      '.$link_html.'
    </li>
  </ul>
</div>';
?>