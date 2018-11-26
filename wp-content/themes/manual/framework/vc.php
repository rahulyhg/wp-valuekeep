<?php
/*** Remove frontend editor ***/
/*if(function_exists('vc_disable_frontend')){
	vc_disable_frontend();
}*/

/*** Removing shortcodes :: widget ***/
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
/*2 :: Structure*/
vc_remove_element("vc_widget_sidebar");
/*3 :: Dep*/
vc_remove_element("vc_button");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
/*vc_remove_element('vc_button2');*/
vc_remove_element("vc_tour");
vc_remove_element("vc_accordion");
vc_remove_element("vc_tabs");
/*4 :: Content*/
vc_remove_element("vc_masonry_media_grid");
vc_remove_element("vc_basic_grid");
vc_remove_element('vc_masonry_grid');
vc_remove_element("vc_line_chart");
vc_remove_element("vc_round_chart");
vc_remove_element("vc_pie");
vc_remove_element("vc_posts_slider");
/*vc_remove_element('vc_icon');*/
vc_remove_element("vc_images_carousel");


/*** Remove unused parameters ***/
if (function_exists('vc_remove_param')) {
	vc_remove_param('vc_row', 'full_width');
	vc_remove_param('vc_row', 'gap');
	vc_remove_param('vc_row', 'full_height');
	vc_remove_param('vc_row', 'columns_placement');
	vc_remove_param('vc_row', 'equal_height');
	vc_remove_param('vc_row', 'video_bg');
	vc_remove_param('vc_row', 'video_bg_url');
	vc_remove_param('vc_row', 'video_bg_parallax');
	vc_remove_param('vc_row', 'full_height');
	vc_remove_param('vc_row', 'content_placement');
	//remove vc parallax functionality
    vc_remove_param('vc_row', 'parallax');
    vc_remove_param('vc_row', 'parallax_image');
    vc_remove_param('vc_row', 'parallax_speed_video');
    vc_remove_param('vc_row', 'parallax_speed_bg');
}
// Add New Row Features
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => esc_html__('Row Type', "manual"),
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
		"Parallax" => "parallax",
		"Full Width Content" => "full-width-content",
	),
	'save_always' => true
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => esc_html__('Row stretch background', "manual"), 
	"param_name" => "stretch_row_type",
	"value" => array(
		"No" => "no",
		"Yes" => "yes"
	),
	'save_always' => true,
	"description" => "", 
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => esc_html__('Background image', "manual"), 
	"value" => "",
	"param_name" => "background_image",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" =>  esc_html__('Row stretch background color', "manual"),
	"param_name" => "background_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "stretch_row_type", 'value' => array('yes'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" =>  esc_html__('Row content stretch background color', "manual"),
	"param_name" => "background_color_content_stretch",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('full-width-content'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__('Border bottom color', "manual"),
	"param_name" => "border_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "stretch_row_type", 'value' => array('yes'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__('Video background', "manual"), 
	"value" => array(
		"No" => "",
		"Yes" => "show_video"
	),
	"param_name" => "video",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__('Video background (webm) file url', "manual"), 
	"value" => "",
	"param_name" => "video_webm",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" =>  esc_html__('Video background (mp4) file url', "manual"),  
	"value" => "",
	"param_name" => "video_mp4",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" =>  esc_html__('Video background (ogv) file url', "manual"),  
	"value" => "",
	"param_name" => "video_ogv",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" =>  esc_html__('Video preview image', "manual"),
	"value" => "",
	"param_name" => "video_image",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));


/*******
  SC ::	COUNTER
********/
   
    vc_map( array(
	"name"             => esc_html__("Counter", "manual"),
	"base"              => "manual_theme_counter",
	"category"          => esc_html__('Manual Theme Shortcodes', "manual"),
	"icon" => "icon-wpb-counter",
	"allowed_container_element" => 'vc_row',
	"params" => array(
		
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Position",
			"param_name" => "position",
			"value" => array(
				"Left" => "left",
				"Right" => "right",	
				"Center" => "center"	
			),
			'save_always' => true,
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Digit",
			"param_name" => "digit",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Digit Font Weight",
			"param_name" => "font_weight",
			"value" => array(
				"Default" 			=> "",
				"Thin 100"			=> "100",
				"Extra-Light 200" 	=> "200",
				"Light 300"			=> "300",
				"Regular 400"		=> "400",
				"Medium 500"		=> "500",
				"Semi-Bold 600"		=> "600",
				"Bold 700"			=> "700",
				"Extra-Bold 800"	=> "800",
				"Ultra-Bold 900"	=> "900"
			),
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Font Color",
			"param_name" => "font_color",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Text",
			"param_name" => "text",
			"description" => ""
		),
		array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Font Weight",
				"param_name" => "text_font_weight",
				"value" => array(
					"Default" => "",
					"Thin 100" => "100",
					"Extra-Light 200" => "200",
					"Light 300" => "300",
					"Regular 400" => "400",
					"Medium 500" => "500",
					"Semi-Bold 600" => "600",
					"Bold 700" => "700",
					"Extra-Bold 800" => "800",
					"Ultra-Bold 900" => "900"
				)
			),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Text Transform",
			"param_name" => "text_transform",
			"value" => array(
				"Default" 			=> "uppercase",
				"None"				=> "none",
				"Capitalize" 		=> "capitalize",
				"Uppercase"			=> "uppercase",
				"Lowercase"			=> "lowercase"
			),
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Text Color",
			"param_name" => "text_color",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Separator",
			"param_name" => "separator",
			"value" => array(
				"Yes" => "yes",
				"No" => "no"
			),
			'save_always' => true,
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Separator Color",
			"param_name" => "separator_color",
			"description" => "",
			"dependency" => array('element' => "separator", 'value' => array('yes'))
		),
	)
   ) );
   
   

/*******
SC :: SERVICE TABLE
********/

	vc_map( array(
	"name" => esc_html__("Service Table", "manual"),
	"base" => "manual_service_table_section",
	"category" =>  esc_html__('Manual Theme Shortcodes', "manual"),
	"as_parent" => array('only' => 'manual_service_option'),
	"content_element" => true,
	"icon" => "icon-wpb-service_column",
	"show_settings_on_create" => true,
	"js_view" => 'VcColumnView',
	"params"            => array(
				 array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => esc_html__("Title", "manual"),
					"param_name"  => "title",
					"value"       => "",
					"description" => esc_html__("The title of the service section", "manual")
				 ),
				 array(
					"type"        => "textfield",
					"class"       => "",
					"heading"     => esc_html__("Icon Image", "manual"),
					"param_name"  => "iconimage",
					"value"       => "",
					"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name"
				 ),
				 array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Color', "manual"), 
					"param_name" => "icon_color",
					"description" => "",
				),
				 array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => esc_html__("Description", "manual"),
					"param_name"  => "description",
					"value"       => "",
					"description" => esc_html__("short info", "manual")
				 ),
				 array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Description Text Color', "manual"), 
					"param_name" => "description_text_color",
					"description" => "",
				),
				 array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", "manual"),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", "manual")
				 ),
				 array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Font Color', "manual"), 
					"param_name" => "box_font_color",
					"description" => "",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Link Text Color', "manual"), 
					"param_name" => "link_text_color",
					"description" => "",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Background Color', "manual"), 
					"param_name" => "background_color",
					"description" => "",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Border Color', "manual"), 
					"param_name" => "box_border_color",
					"description" => "",
				),
	  )
   ) );

   vc_map( array(
	  "name"              => esc_html__("Service Option", "manual"),
	  "base"              => "manual_service_option",
	  "content_element"   => true,
	  "as_child"          => array('only' => 'manual_service_table'),
	  "category"          => esc_html__('Manual Theme Shortcodes', "manual"),
	  "icon"              => "icon-wpb-service_column",
	  "params"            => array(
		 array(
			"type"        => "textarea_html",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Option Text", "manual"),
			"param_name"  => "content",
			"value" => "<li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li>",
			"description" => esc_html__("An option this Service table includes", "manual")
		 ),
		
	  )
   ) );
   
  
   
/*******
SC :: OUR TEAM
********/
   
	vc_map( array(
		"name" => esc_html__("Team", "manual"), 
		"base" => "manual_our_team",
		"category"  => esc_html__('Manual Theme Shortcodes', "manual"),
		"icon" => "icon-wpb-q_team",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Image", "manual"), 
				"param_name" => "team_image"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Name", "manual"), 
				"param_name" => "team_name"
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Name Color", "manual"), 
				"param_name" => "name_color",
				"description" => ""
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Position", "manual"),
				"param_name" => "team_position"
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Position Color", "manual"), 
				"param_name" => "position_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Show Separator", "manual"), 
				"param_name" => "show_separator",
				"value" => array(
					"Default" => "",
					"Yes" => "yes",
					"No" => "no"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Separator Color", "manual"), 
				"param_name" => "separator_color",
				"value" => "#1abc9c",
				"dependency" => array('element' => "show_separator", 'value' => array('yes','')),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icons Color", "manual"),
				"param_name" => "icons_color",
				"value" => "",
				"description" => ""
			),
			// social icons - 1
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 1", "manual"), 
				"param_name" => "team_social_icon_1",
				"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 1 Link", "manual"), 
				"param_name" => "team_social_icon_1_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Social Icon 1 Target",
                "param_name" => "team_social_icon_1_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => ""
            ),
			// social icons - 2
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 2", "manual"), 
				"param_name" => "team_social_icon_2",
				"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 2 Link", "manual"), 
				"param_name" => "team_social_icon_2_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Social Icon 2 Target",
                "param_name" => "team_social_icon_2_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => ""
            ),
			// social icons - 3
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 3", "manual"), 
				"param_name" => "team_social_icon_3",
				"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 3 Link", "manual"), 
				"param_name" => "team_social_icon_3_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Social Icon 3 Target",
                "param_name" => "team_social_icon_3_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => ""
            ),
			// social icons - 4
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 4", "manual"), 
				"param_name" => "team_social_icon_4",
				"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 4 Link", "manual"), 
				"param_name" => "team_social_icon_4_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Social Icon 4 Target",
                "param_name" => "team_social_icon_4_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => ""
            ),
			// Eof social
			
		)
	) );
	
	
	
	

/*******
SC :: PRICING TABLE
********/

	vc_map( array(
	"name" => esc_html__("Pricing Table", "manual"),
	"base" => "manual_pricing_table_section",
	"category" =>  esc_html__('Manual Theme Shortcodes', "manual"),
	"as_parent" => array('only' => 'manual_pricing_option'),
	"content_element" => true,
	"icon" => "icon-wpb-pricing_column",
	"show_settings_on_create" => true,
	"js_view" => 'VcColumnView',
	"params"            => array(
				 array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => esc_html__("Title", "manual"),
					"param_name"  => "title",
					"value"       => "",
					"description" => esc_html__("The title of the service section", "manual")
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Price", "manual"), 
					"param_name" => "price",
					"description" => ""
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Currency", "manual"),
					"param_name" => "currency",
					"description" => ""
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Price Period", "manual"),
					"param_name" => "price_period",
					"description" => ""
				),
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Button Link", "manual"),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", "manual")
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Make Box Standout", "manual"),
					"param_name" => "active",
					"value" => array(
						"No" => "no",
						"Yes" => "yes"	
					),
					'save_always' => true,
					"description" => "",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Background Color', "manual"), 
					"param_name" => "background_color",
					"description" => "",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" =>  esc_html__('Text Color', "manual"), 
					"param_name" => "text_color",
					"description" => "",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Border Color', "manual"), 
					"param_name" => "box_border_color",
					"description" => "",
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Button Color', "manual"),
					"param_name" => "buttom_color",
					"value" => array(
						"" => "",
						"Button Default" => "btn-default",
						"Button Primary" => "btn-primary",
						"Button Success" => "btn-success",
						"Button Info" => "btn-info",
						"Button Warning" => "btn-warning",
						"Button Danger" => "btn-danger",
						"Button Link" => "btn-link",
					),
					"description" => "",
				),
				
			
	  )
   ) );

   vc_map( array(
	  "name"              => esc_html__("Pricing Option", "manual"),
	  "base"              => "manual_pricing_option",
	  "content_element"   => true,
	  "as_child"          => array('only' => 'manual_pricing_table'),
	  "category"          => esc_html__('Manual Theme Shortcodes', "manual"),
	  "icon"              => "icon-wpb-pricing_column",
	  "allowed_container_element" => 'vc_row',
	  "params"            => array(
		 array(
			"type"        => "textarea_html",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Option Text", "manual"),
			"param_name"  => "content",
			"value" => "<li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li>",
			"description" => esc_html__("An option this Service table includes", "manual")
		 ),
	  )
   ) );
   
   


/*******
SC :: TESTIMONIALS
********/

vc_map( array(
		"name" => esc_html__("Testimonials", "manual"), 
		"base" => "manual_theme_testimonials",
		"category" => esc_html__('Manual Theme Shortcodes', "manual"),
		"icon" => "icon-wpb-testimonials",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Number', "manual"),
				"param_name" => "number",
				"value" => "",
				"description" =>  esc_html__('Number of Testimonials, if place -1 it will display all', "manual"), 
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Order By', "manual"),
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					"Title" => "title",
					"Date" => "date",
					"Random" => "rand"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Order Type', "manual"),
				"param_name" => "order",
				"value" => array(
					"" => "",
					"Ascending" => "ASC",
					"Descending" => "DESC",
				),
				"description" => "",
				"dependency" => array("element" => "order_by", "value" => array("title", "date"))
			),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__('Text Color', "manual"), 
                "param_name" => "text_color",
                "description" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Custom Text Font', "manual"),
				"param_name" => "custom_font_size",
				"value" => "22px",
				"description" =>  esc_html__('Enter as: 12px, 34px as per your need', "manual"), 
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" =>  esc_html__('Author Text Font Weight', "manual"),
				"param_name" => "author_text_font_weight",
				"value" => array(
					"Default" 			=> "",
					"Thin 100"			=> "100",
					"Extra-Light 200" 	=> "200",
					"Light 300"			=> "300",
					"Regular 400"		=> "400",
					"Medium 500"		=> "500",
					"Semi-Bold 600"		=> "600",
					"Bold 700"			=> "700",
					"Extra-Bold 800"	=> "800",
					"Ultra-Bold 900"	=> "900"
				),
				"description" => ""
			),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__('Author Text Color', "manual"),
                "param_name" => "author_text_color",
                "description" => ""
            ),
		)
) );



/*******
SC :: ICON WITH TEXT
********/

vc_map( array(
		"name" => esc_html__("Icon With Text", "manual"), 
		"base" => "manual_theme_icon_text",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual Theme Shortcodes', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Icon Name", "manual"),
					"param_name" => "icon_name",
					"value" => "",
					"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Position', "manual"),
					"param_name" => "display_icon_position",
					"value" => array(
						"Left" => "left",
						"Top" => "top",
						"Left From Title" => "left_from_title",
					),
					'save_always' => true,
					"description" => "",
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Margin (px)', "manual"),
					"param_name" => "display_icon_top_margin",
					"value" => "",
					"description" => "Margin should be set in a top right bottom left format",
					"dependency" => array('element' => "display_icon_position", 'value' => array('top'))
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Use Custom Icon Size', "manual"), 
					"param_name" => "use_custom_icon_size",
					"value" => array(
						"No" => "no",
						"Yes" => "yes"
					),
					'save_always' => true,
					"description" => __("Select Yes if you want to use custom icon size and margin")
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Custom Icon Size (px)', "manual"), 
					"param_name" => "custom_icon_size",
					"value" => "",
					"description" => __("Enter just number, omit px"),
					"dependency" => array('element' => "use_custom_icon_size", 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Custom Icon Margin (px)', "manual"),
					"param_name" => "custom_icon_margin",
					"value" => "",
					"description" => __("Spacing between icon and text (for left icon/margin position). Enter just number, omit px"),
					"dependency" => array('element' => "use_custom_icon_size", 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Color', "manual"),
					"param_name" => "icon_color",
					"description" => ""
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title', "manual"), 
					"param_name" => "title",
					"value" => ""
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Color', "manual"), 
					"param_name" => "title_color",
					"description" => ""
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Font Size (px)', "manual"), 
					"param_name" => "title_font_size",
					"value" => "",
					"description" => "Omit px"
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Title Text Transform', "manual"), 
					"param_name" => "title_font_transform",
					"value" => array(
						"Default" 		=> "",
						"capitalize"	=> "capitalize",
						"lowercase" 	=> "lowercase",
						),
					"description" => ""
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Title Font Weight', "manual"), 
					"param_name" => "title_font_weight",
					"value" => array(
						"Default" 			=> "",
						"Thin 100"			=> "100",
						"Extra-Light 200" 	=> "200",
						"Light 300"			=> "300",
						"Regular 400"		=> "400",
						"Medium 500"		=> "500",
						"Semi-Bold 600"		=> "600",
						"Bold 700"			=> "700",
						"Extra-Bold 800"	=> "800",
						"Ultra-Bold 900"	=> "900"
						),
					"description" => ""
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Text', "manual"), 
					"param_name" => "text",
					"value" => ""
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Text Color', "manual"),  
					"param_name" => "text_color",
					"description" => ""
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Custom Top Margin (px)', "manual"), 
					"param_name" => "custom_top_margin_maintext_and_text",
					"value" => "",
					"description" => __("Spacing between title text and text. Enter just number, omit px"),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Activate Link', "manual"), 
					"param_name" => "activate_link",
					"value" => array(
						'' => '',
						'Yes' => 'yes',
						'No' => 'no'
					)
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Link Icon', "manual"), 
					"param_name" => "link_icon",
					"value" => array(
						'' => '',
						'Yes' => 'yes',
						'No' => 'no',
						'Link Icon & Text' => 'both'
					),
					"dependency" => Array('element' => "activate_link", 'value' => array('yes'))
				),
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", "manual"),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", "manual"),
					"dependency" => Array('element' => "activate_link", 'value' => array('yes')),
				 ),
				 array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Link Color", "manual"),
					"param_name" => "link_color",
					"description" => "",
					"dependency" => Array('element' => "link_icon", 'value' => array('no'))
				),
				

			)
		)
) );


/*******
SC :: KNOWLEDGEBASE
********/

vc_map( array(
		"name" => esc_html__("KnowledgeBase", "manual"), 
		"base" => "manual_theme_all_knowledgebase",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual Theme Shortcodes', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Knowledgebase Name (Only For heading, will not display anywhere)", "manual"),
					"param_name" => "knowledgebase_shortcode_name",
					"value" => "",
					"description" => "Will display all knowledgebase",
				),
				
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" =>  esc_html__("Knowledgebase Columns", "manual"), 
				"param_name" => "knowledgebase_column",
				"value" => array(
					"Default" => "",
					"Columns 4 (Full Width)" => "4",
					"Columns 6 (Best Fit Sidebar)" => "6",
				)
			),
				
			)
		)
) );


/*******
SC :: KNOWLEDGEBASE CATEGORIES
********/
vc_map( array(
		"name" => esc_html__("KnowledgeBase Category", "manual"), 
		"base" => "manual_theme_kb_category",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual Theme Shortcodes', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "kb_category_title",
					"value" => "",
					"description" => "",
				),
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Show post counts", "manual"),
					"param_name" => "kb_category_show_post_count",
					"value" => "",
					"description" => "",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Count Text Color', "manual"), 
					"param_name" => "count_text_color",
					"description" => "",
					"dependency" => Array('element' => "kb_category_show_post_count", 'value' => array('true'))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Count Background Color', "manual"), 
					"param_name" => "count_bg_color",
					"description" => "",
					"dependency" => Array('element' => "kb_category_show_post_count", 'value' => array('true'))
				),
			)
		)
) );




/*******
SC :: KNOWLEDGEBASE POPULAR ARTICLE
********/
vc_map( array(
		"name" => esc_html__("KnowledgeBase Article", "manual"), 
		"base" => "manual_theme_kb_popular_article",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual Theme Shortcodes', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "title",
					"value" => "",
					"description" => "",
				),
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Display", "manual"),
				"param_name" => "knowledgebase_article_display_type",
				"value" => array(
					"Select Article Display Type" => "",
					"Latest Articles (using date)" => "1",
					"Popular Article (using number of views)" => "2",
					"Top Rated Article (using like)" => "3",
					"Most Commented Article" => "4",
					)
				),
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Number Of Article", "manual"),
				"param_name" => "knowledgebase_article_number",
				"value" => array(
					"Four" => "4",
					"Five" => "5",
					"Six" => "6",
					"Seven" => "7",
					"Eight" => "8",
					"Nine" => "9",
					"Ten" => "10",
					)
				),
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Article Order", "manual"),
				"param_name" => "knowledgebase_article_order",
				"value" => array(
					"Ascending Order" => "ASC",
					"Descending Order" => "DESC",
					)
				),
			)
		)
) );



/*******
SC :: KNOWLEDGEBASE SINGLE CAT ARTICLE 
********/
vc_map( array(
		"name" => esc_html__("KnowledgeBase Single Category", "manual"), 
		"base" => "manual_theme_single_cat_knowledgebase",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual Theme Shortcodes', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Post Per Page", "manual"),
					"param_name" => "page_per_post",
					"value" => "-1",
					"description" => "Note: -1 shows all post",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Order", "manual"),
					"param_name" => "post_order",
					"value" => array(
						"None" => "",
						"Ascending"  => "ASC",
						"Descending" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Order By", "manual"),
					"param_name" => "post_orderby",
					"value" => array(
							"None" => "none",
							"Title" => "title",
							"Date"  => "date",
							"Last Modified Date"  => "modified",
							"Random"  => "rand",
							"Number of Comments"  => "comment_count",
							"Page Order"  => "menu_order",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Include Child Post", "manual"),
					"param_name" => "include_child_post",
					"value" => array(
							"yes" => "yes",
							"No" => "no",
						)
				),
				 
			   array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Knowledgebase Category ID (ENTER ONLY SINGLE ID)", "manual" ),
					"param_name" => "kbsinglecatid",
					"value" => "",
					"description" => "<strong>How to find knowledgebase category ID??</strong> <br><br> 1. Click On \"Knowledge Base &minus;&gt; Knowledge Base Categories\" (left sidebar menu) <br><br> 2. Click on \"Category Name\" You like to display, You will land on \"Edit Category\" page. <br><br> 3. <strong>Just view browser URL</strong>, you will see something like this: \"wp-admin/term.php?taxonomy=manualknowledgebasecat<strong>&tag_ID=13</strong>&post_type=manual_kb\" <br><br> 4. <strong>Your category ID == 13 (tag_ID=13)</strong>  ",
				 ),
		 
					
			)
		)
) );



/*******
SC :: KNOWLEDGEBASE CUSTOM GROUP CAT ARTICLE 
********/

vc_map( array(
		"name" => esc_html__("KnowledgeBase Custom Group Category", "manual"), 
		"base" => "manual_theme_vc_custom_group_cat_knowledgebase",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual Theme Shortcodes', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Category Order", "manual"),
					"param_name" => "category_order",
					"value" => array(
						"None" => "",
						"Ascending"  => "ASC",
						"Descending" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Category Order By", "manual"),
					"param_name" => "category_orderby",
					"value" => array(
							"None" => "none",
							"Title" => "title",
							"Date"  => "date",
							"Last Modified Date"  => "modified",
							"Random"  => "rand",
							"Number of Comments"  => "comment_count",
							"Page Order"  => "menu_order",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Page Order", "manual"),
					"param_name" => "category_page_order",
					"value" => array(
						"None" => "",
						"Ascending"  => "ASC",
						"Descending" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Page Order By", "manual"),
					"param_name" => "category_page_orderby",
					"value" => array(
							"None" => "none",
							"Title" => "title",
							"Date"  => "date",
							"Last Modified Date"  => "modified",
							"Random"  => "rand",
							"Number of Comments"  => "comment_count",
							"Page Order"  => "menu_order",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Post Per Category", "manual"),
					"param_name" => "kb_post_under_category",
					"value" => array(
					    "Default" => "",
						"Three"   => "3",
						"Four"    => "4",
						"Five"    => "5",
						"Six"     => "6",
						"Seven"   => "7",
						"Eight"   => "8",
						"Nine"    => "9",
						"Ten"     => "10",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Display Column Type", "manual"),
					"param_name" => "kb_column_type",
					"value" => array(
					    "Default" => "",
						"Four" => "4",
						"Six"  => "6",
						)
				),
				
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Disable Masonry", "manual"),
					"param_name" => "kb_disable_customcat_masonry",
					"value" => "",
					"description" => esc_html__("APPLY ONLY IF USING TABS (ALERT :: NOT TO APPLY FOR THE FIRST TAB)", "manual"),
				),
				
				
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Knowledgebase Category ID (COMMA SEPRATED ID)", "manual" ),
					"param_name" => "kbgroupcatid",
					"value" => "",
					"description" => "<strong>How to find knowledgebase category ID??</strong> <br><br> 1. Click On \"Knowledge Base &minus;&gt; Knowledge Base Categories\" (left sidebar menu) <br><br> 2. Click on \"Category Name\" You like to display, You will land on \"Edit Category\" page. <br><br> 3. <strong>Just view browser URL</strong>, you will see something like this: \"wp-admin/term.php?taxonomy=manualknowledgebasecat<strong>&tag_ID=13</strong>&post_type=manual_kb\" <br><br> 4. <strong>Your category ID == 13 (tag_ID=13)</strong>  ",
				 ),
				
			
			
			)
		)
) );






/*******
SC :: HOME HELP BLOCKS
********/
vc_map( array(
		"name" => esc_html__("Home Help Blocks", "manual"), 
		"base" => "manual_theme_home_help_blocks",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual Theme Shortcodes', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title Name (Only For heading, will not display anywhere)", "manual"),
					"param_name" => "title",
					"value" => "",
					"description" => "",
				),
			)
		)
) );



/*******
SC :: PORTFOLIO
********/
vc_map( array(
		"name" => esc_html__("Portfolio List", "manual"), 
		"base" => "manual_theme_portfolio_sc",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual Theme Shortcodes', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio Type", "manual"),
					"param_name" => "portfolio_type",
					"value" => array(
						"Default" => "",
						"FitRows" => "FitRows",
						"Masonry" => "Masonry",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Display Portfolio Filter", "manual"),
					"param_name" => "portfolio_shorting",
					"value" => array(
						"Default" => "",
						"yes" => "yes",
						"no" => "no",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Filter Order", "manual"),
					"param_name" => "sorting_order",
					"value" => array(
						"Default" => "",
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						),
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Filter Order By",
					"param_name" => "sorting_order_by",
					"value" => array(
						"Name" => "name",
						"Slug" => "slug",
						"ID" => "id",
						"Description" => "description"
					),
					"description" => "",
					"dependency" => array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Filter Link Color', "manual"), 
					"param_name" => "shorting_link_color",
					"description" => "",
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Filter Link Border Color', "manual"), 
					"param_name" => "shorting_link_border_color",
					"description" => "",
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Filter Align", "bind"),
					"param_name" => "filter_align",
					"value" => array(
								"Left" => "left",
								"Center" => "center",
								"Right" => "right",
							   ),
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))	
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Filter Padding", "bind"),
					"param_name" => "filter_padding",
					"value" => "50px",
					"description" => "Will distribute equal top/bottom height (Default:50px)",
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number of portfolio records per page", "manual"),
					"param_name" => "number_of_post",
					"value" => "-1",
					"description" => esc_html__("NOTE: value -1 display all result", "manual"),
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio by Selected Category", "manual"),
					"param_name" => "category",
					"value" => "",
					"description" => "Enter Category Slug Name seprated by comma (leave empty for all)"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio by Selected Projects", "manual"),
					"param_name" => "selected_projects",
					"value" => "",
					"description" => "Enter portfolio ID seprated by comma"
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio Order", "manual"),
					"param_name" => "portfolio_order",
					"value" => array(
						"Default" => "",
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio Order By", "manual"),
					"param_name" => "portfolio_order_by",
					"value" => array(
						"Default" => "",
						"Title" => "title",
						"Name" => "name",
						"Date" => "date",
						"Modified" => "modified",
						"Random" => "rand",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio Column", "manual"),
					"param_name" => "portfolio_column",
					"value" => array(
						"Default" => "",
						"Two" => "6",
						"Three" => "4",
						"Four" => "3",
						)
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Link Color', "manual"), 
					"param_name" => "link_color",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Show Categories",
					"param_name" => "show_categories",
					"value" => array(
						"Yes"	=>	"yes",
						"No"   	=>	"no"
					),
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Category Text Color', "manual"), 
					"param_name" => "link_cat_color",
					"description" => "",
					"dependency" => Array('element' => "show_categories", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Show Load More', "manual"),
					"param_name" => "show_load_more",
					"value" => array(
						"" => "",
						"Yes" => "yes",
						"No" => "no"	
					),
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Show Load More Text Align", "bind"),
					"param_name" => "show_load_more_align",
					"value" => array(
								"Default" => "",
								"Left" => "left",
								"Center" => "center",
								"Right" => "right",
							   ),
					"dependency" => Array('element' => "show_load_more", 'value' => array('yes'))	
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Show Load More margin", "bind"),
					"param_name" => "show_load_more_margin",
					"value" => "20px",
					"description" => "Will distribute equal top/bottom height (Default:20px)",
					"dependency" => Array('element' => "show_load_more", 'value' => array('yes'))	
				),
				
			)
		)
) );




/*******
SC :: MONITOR FRAME
********/
vc_map( array(
		"name" => esc_html__("Monitor Frame Portfolio", "manual"), 
		"base" => "manual_theme_monitor_frame_portfolio",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual Theme Shortcodes', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "title",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", "manual"),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", "manual"),
				 ),
				 
				 array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Image", "manual"), 
					"param_name" => "portfoio_image"
				),
					
				
				
			)
		)
) );
			
			

/*******
SC :: FAQ CATEGORY
********/
vc_map( array(
		"name" => esc_html__("FAQ Category (widget)", "manual"), 
		"base" => "manual_theme_faq_category",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual Theme Shortcodes', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "faq_category_title",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Show post counts", "manual"),
					"param_name" => "faq_category_show_post_count",
					"value" => "",
					"description" => "",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Count Text Color', "manual"), 
					"param_name" => "count_text_color",
					"description" => "",
					"dependency" => Array('element' => "faq_category_show_post_count", 'value' => array('true'))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Count Background Color', "manual"), 
					"param_name" => "count_bg_color",
					"description" => "",
					"dependency" => Array('element' => "faq_category_show_post_count", 'value' => array('true'))
				),
				
				
			)
		)
) );





/*******
SC :: FAQ SINGLE CATEGORY ARTICLE
********/
vc_map( array(
		"name" => esc_html__("FAQ Single Category Records", "manual"), 
		"base" => "manual_theme_single_faq_article",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual Theme Shortcodes', "manual"),
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Post Per Page", "manual"),
					"param_name" => "page_per_post",
					"value" => "-1",
					"description" => "Note: -1 shows all post",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Order", "manual"),
					"param_name" => "post_order",
					"value" => array(
						"None" => "",
						"Ascending"  => "ASC",
						"Descending" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Order By", "manual"),
					"param_name" => "post_orderby",
					"value" => array(
							"None" => "none",
							"Title" => "title",
							"Date"  => "date",
							"Last Modified Date"  => "modified",
							"Random"  => "rand",
							"Number of Comments"  => "comment_count",
							"Page Order"  => "menu_order",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Include Child Post", "manual"),
					"param_name" => "include_child_post",
					"value" => array(
							"yes" => "yes",
							"No" => "no",
						)
				),
				 
			   array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Category ID (ENTER ONLY SINGLE ID)", "manual" ),
					"param_name" => "faqsinglecatid",
					"value" => "",
					"description" => "<strong>How to find FAQ category ID??</strong> <br><br> 1. Click On \"FAQs &minus;&gt; FAQs Categories\" (left sidebar menu) <br><br> 2. Click on \"Category Name\" You like to display, You will land on \"Edit Category\" page. <br><br> 3. <strong>Just view browser URL</strong>, you will see something like this: \"wp-admin/term.php?taxonomy=manualfaqcategory<strong>&tag_ID=13</strong>&post_type=manual_kb\" <br><br> 4. <strong>Your category ID == 13 (tag_ID=13)</strong>  ",
				 ),
		 
					
			)
		)
) );
			
	   
/*******
SUPPORT PARM ::	EXTRA PROCESS
********/
	
   if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	   class WPBakeryShortCode_Manual_Service_Table_Section extends WPBakeryShortCodesContainer {}
	   class WPBakeryShortCode_Manual_Pricing_Table_Section extends WPBakeryShortCodesContainer {}
   }
   if ( class_exists( 'WPBakeryShortCode' ) ) {
	   class WPBakeryShortCode_Manual_Service_Option extends WPBakeryShortCode {}
	   class WPBakeryShortCode_Manual_Pricing_Option extends WPBakeryShortCode {}
   }
   
   
   
   
/*******
	ADD TEMPLATE :: SERVICES
********/
	 add_filter( 'vc_load_default_templates', 'vc_services_template' );
	 function vc_services_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] Service Page', 'manual' );
        $template['content']    = <<<CONTENT
            [vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456111714980{margin-top: 50px !important;}"][vc_column][vc_column_text css=".vc_custom_1455039561342{margin-bottom: 27px !important;}"]
<h2 style="text-align: center;">THE BEST SOLUTION</h2>
[/vc_column_text][vc_column_text]
<h4 style="text-align: center;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456489708238{margin-bottom: 60px !important;}"][vc_column width="1/4"][manual_service_table_section title="Fully Responsive" iconimage="icon-mobile" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
	<li>Modern Design</li>
	<li>24/7 Premium Support</li>
	<li>Modern Page Layouts</li>
	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][vc_column width="1/4"][manual_service_table_section title="Premium Slider" iconimage="icon-picture" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
	<li>Modern Design</li>
	<li>24/7 Premium Support</li>
	<li>Modern Page Layouts</li>
	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][vc_column width="1/4"][manual_service_table_section title="Page Builder" iconimage="icon-gears" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
	<li>Modern Design</li>
	<li>24/7 Premium Support</li>
	<li>Modern Page Layouts</li>
	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][vc_column width="1/4"][manual_service_table_section title="Dedicated Support" iconimage="icon-chat" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
	<li>Modern Design</li>
	<li>24/7 Premium Support</li>
	<li>Modern Page Layouts</li>
	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" video="show_video" video_mp4="https://s3-us-west-2.amazonaws.com/coverr/mp4/Traffic-blurred2.mp4" full_width="stretch_row" equal_height="yes" css=".vc_custom_1456489642550{margin-top: 40px !important;padding-top: 50px !important;padding-bottom: 100px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;"><span style="color: #ededed;">OUR STATUS</span></h2>
[/vc_column_text][vc_row_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="5852" text="Happy Customer" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="500" text_font_weight="500" separator="yes" digit="567" text="CUPS OF COFFEE" font_color="#ffffff" text_color="#ffffff" separator_color="#aaaaaa"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="72" text="Finished Projects" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="500" text_font_weight="500" separator="yes" digit="187" text="Staff Members" font_color="#ffffff" text_color="#ffffff" separator_color="#aaaaaa"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	 
	 
/*******
	ADD TEMPLATE :: ABOUT US
********/
	 add_filter( 'vc_load_default_templates', 'vc_aboutus_template' );
	 function vc_aboutus_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] About Us Page', 'manual' );
        $template['content']    = <<<CONTENT
            [vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456998111582{margin-top: 50px !important;margin-bottom: 50px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">Welcome To Manual</h2>
[/vc_column_text][vc_column_text]
<h4 style="text-align: center;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][vc_separator style="double" el_width="50"][vc_row_inner][vc_column_inner width="1/2"][vc_column_text]
<h3>About Us</h3>
[/vc_column_text][vc_column_text]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. Suspendisse consectetur fringilla luctus. Fusce id mi diam, non ornare orci. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text]
<h3 style="text-align: right;">Our Crazy Skills</h3>
[/vc_column_text][vc_progress_bar values="%5B%7B%22label%22%3A%22WEB%20DEVELOPMENT%22%2C%22value%22%3A%2295%22%7D%2C%7B%22label%22%3A%22DESIGN%22%2C%22value%22%3A%2280%22%7D%2C%7B%22label%22%3A%22MARKETING%22%2C%22value%22%3A%2270%22%7D%5D" options="striped,animated" units="%"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#e8e8e8" full_width="stretch_row" equal_height="yes" css=".vc_custom_1456998481095{margin-top: 50px !important;padding-top: 135px !important;padding-bottom: 135px !important;}"][vc_column][vc_custom_heading text="We offer a range of services for both businesses and individual companies" font_container="tag:div|font_size:45|text_align:center|color:%23ffffff" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:800%20bold%20regular%3A800%3Anormal"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#fafafa" css=".vc_custom_1456997907669{padding-top: 30px !important;padding-bottom: 40px !important;}"][vc_column][vc_column_text css=".vc_custom_1455109004925{margin-top: 40px !important;border-bottom-width: 30px !important;}"]
<h2 style="text-align: center;">Our Team Members</h2>
[/vc_column_text][vc_separator style="double" el_width="10" css=".vc_custom_1455109618064{margin-bottom: 50px !important;}"][vc_row_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Miller Johnson " team_position="Founder" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Ubon Anne" team_position="Manager" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Earnest Johnson" team_position="General Manager" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Jeshon Ambron " team_position="Programmer" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	 
	 

/*******
	ADD TEMPLATE :: PRICING TABLE
********/
	 add_filter( 'vc_load_default_templates', 'vc_pricingtable_template' );
	 function vc_pricingtable_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] Pricing Table', 'manual' );
        $template['content']    = <<<CONTENT
            [vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456490436499{margin-top: 50px !important;}"][vc_column][vc_column_text css=".vc_custom_1455440864809{margin-bottom: 27px !important;}"]
<h2 style="text-align: center;">PRICING TABLES</h2>
[/vc_column_text][vc_column_text]
<h4 style="text-align: center;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1455440931885{margin-top: 50px !important;margin-bottom: 60px !important;}"][vc_column width="1/4"][manual_pricing_table_section title="Premium" link="url:%23|title:PURCHEASE|target:%20_blank" active="no" show_button="yes" price="29" currency="$" price_period="/MO"][manual_pricing_option]
<ul>
	<li style="border-bottom: 1px solid #F0F0F0;">1GB Bandwidth</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Free Upgrades</li>
	<li style="border-bottom: 1px solid #F0F0F0;">100GB Storage</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Unlimited Users</li>
</ul>
[/manual_pricing_option][/manual_pricing_table_section][/vc_column][vc_column width="1/4"][manual_pricing_table_section title="Professional" link="url:%23|title:PURCHEASE|target:%20_blank" active="yes" show_button="yes" price="58" currency="$" price_period="/MO"][manual_pricing_option]
<ul>
	<li style="border-bottom: 1px solid #F0F0F0;">1GB Bandwidth</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Free Upgrades</li>
	<li style="border-bottom: 1px solid #F0F0F0;">100GB Storage</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Unlimited Users</li>
</ul>
[/manual_pricing_option][/manual_pricing_table_section][/vc_column][vc_column width="1/4"][manual_pricing_table_section title="Maximum" link="url:%23|title:PURCHEASE|target:%20_blank" active="no" show_button="yes" price="76" currency="$" price_period="/MO"][manual_pricing_option]
<ul>
	<li style="border-bottom: 1px solid #F0F0F0;">1GB Bandwidth</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Free Upgrades</li>
	<li style="border-bottom: 1px solid #F0F0F0;">100GB Storage</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Unlimited Users</li>
</ul>
[/manual_pricing_option][/manual_pricing_table_section][/vc_column][vc_column width="1/4"][manual_pricing_table_section title="Extreme" link="url:%23|title:PURCHEASE|target:%20_blank" active="no" show_button="yes" price="109" currency="$" price_period="/MO"][manual_pricing_option]
<ul>
	<li style="border-bottom: 1px solid #F0F0F0;">1GB Bandwidth</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Free Upgrades</li>
	<li style="border-bottom: 1px solid #F0F0F0;">100GB Storage</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Unlimited Users</li>
</ul>
[/manual_pricing_option][/manual_pricing_table_section][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	 




/*******
	ADD TEMPLATE :: HOME 1 (Business Home)
********/
	 add_filter( 'vc_load_default_templates', 'vc_homeone_template' );
	 function vc_homeone_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] Home 1 (Business Home)', 'manual' );
        $template['content']    = <<<CONTENT
            [vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456491347473{margin-top: 50px !important;margin-bottom: 50px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">WHAT WE DO</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1455583667509{margin-bottom: 55px !important;}"]
<h4 style="text-align: center;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][vc_row_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-mobile" display_icon_position="left" use_custom_icon_size="no" title="Fully Responsive" text="Manual responsive framework ensures your content looks great on all screen sizes"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-clipboard" display_icon_position="left" use_custom_icon_size="no" title="Amazing Elements" text="Manual offers incredible elements that allow you to create a beautiful site"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-gears " display_icon_position="left" use_custom_icon_size="no" title="Dedicated Support" text="We care about your site as much as you do, you can count on us for theme support"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-layers" display_icon_position="left" use_custom_icon_size="no" title="Powerful Options" text="Manual theme options and page options allow you to take control of your website"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-refresh" display_icon_position="left" use_custom_icon_size="no" title="Free Upgrades With Value" text="We issue updates that matter; rich with amazing new features and improvements"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-browser" display_icon_position="left" use_custom_icon_size="no" title="Awesome Portfolio Layouts" text="Manual has awesome portfolio layouts that make your work stand out!"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#e5e5e5" full_width="stretch_row" equal_height="yes" css=".vc_custom_1456995228131{margin-top: 40px !important;padding-top: 110px !important;padding-bottom: 110px !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="5852" text="Happy Customer" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="600" text_font_weight="500" separator="yes" digit="567" text="CUPS OF COFFEE" font_color="#ffffff" text_color="#ffffff" separator_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="72" text="Finished Projects" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="600" text_font_weight="500" separator="yes" digit="187" text="Staff Members" font_color="#ffffff" text_color="#ffffff" separator_color="#ffffff"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456920201828{margin-top: 100px !important;margin-bottom: 60px !important;}"][vc_column width="1/2"][vc_row_inner][vc_column_inner][vc_column_text]
<h2>The Best Help Desk Theme</h2>
[/vc_column_text][vc_separator align="align_left" style="double" el_width="20" css=".vc_custom_1456961114174{margin-top: -10px !important;}"][vc_column_text]
<h4 style="text-align: justify;">Manual is loaded with useful, functional options that allow users to quickly and easily create stunning websites.</h4>
&nbsp;
<p style="text-align: justify;">Donec volutpat nibh sit amet libero ornare non laoreet arcu luctus. Donec id arcu quis mauris euismod placerat sit amet ut metus. Sed imperdiet fringilla sem eget euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2"][vc_single_image img_size="large" alignment="center" style="vc_box_shadow" css_animation="right-to-left"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#5aa773" full_width="stretch_row" css=".vc_custom_1456918650712{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column][vc_column_text css=".vc_custom_1456918715231{margin-top: -30px !important;}"]
<h2 style="text-align: center;"><strong><span style="color: #ededed;">THEY SAY</span></strong></h2>
[/vc_column_text][vc_separator style="double" el_width="30" css=".vc_custom_1455578284368{margin-top: -10px !important;margin-bottom: -3px !important;}"][manual_theme_testimonials number="2" order_by="title" order="DESC" custom_font_size="23px" author_text_font_weight="500" text_color="#ffffff" author_text_color="#ffffff"][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	
	
	
	
/*******
	ADD TEMPLATE :: HOME 2
********/
	 add_filter( 'vc_load_default_templates', 'vc_hometwo_template' );
	 function vc_hometwo_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] Home 2 (Help Desk 1)', 'manual' );
        $template['content']    = <<<CONTENT
[vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456113715539{margin-top: 50px !important;margin-bottom: 5px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">HELP DESK</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1455680031256{margin-bottom: 55px !important;}"]
<h4 style="text-align: center;">Easily create Documentation, Knowledge-base, FAQ, Forum and more using page layouts and the tools we provide</h4>
[/vc_column_text][vc_separator style="shadow" el_width="30" css=".vc_custom_1456119594660{margin-top: -20px !important;}"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456499594010{margin-top: 20px !important;}"][vc_column width="1/3" css=".vc_custom_1456113450674{padding-right: 5px !important;padding-left: 5px !important;}"][manual_theme_icon_text icon_name="icon-documents" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="65" title="knowledge Base" title_font_size="22" title_font_transform="capitalize" title_font_weight="500" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar." activate_link="yes" link_icon="yes" link="url:%23||target:%20_blank" title_color="#333333" link_hover_icon_color="#dd3333" icon_color="#5bc981"][/vc_column][vc_column width="1/3" css=".vc_custom_1456113495794{padding-top: 5px !important;padding-bottom: 5px !important;}"][manual_theme_icon_text icon_name="icon-envelope" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="60" title="Contact Us" title_font_size="22" title_font_transform="capitalize" title_font_weight="500" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar." activate_link="yes" link_icon="yes" link="url:%23||" title_color="#333333" icon_color="#5bc981"][/vc_column][vc_column width="1/3" css=".vc_custom_1456113503002{padding-top: 5px !important;padding-bottom: 5px !important;}"][manual_theme_icon_text icon_name="icon-chat" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="60" title="Community Forum" title_font_size="22" title_font_transform="capitalize" title_font_weight="500" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar." activate_link="yes" link_icon="yes" link="url:%23||" title_color="#333333" icon_color="#5bc981"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#f2f2f2" css=".vc_custom_1456499042030{margin-top: 50px !important;padding-top: 50px !important;padding-bottom: 60px !important;}"][vc_column][vc_column_text css=".vc_custom_1456600882199{margin-bottom: 27px !important;}"]
<h2 style="text-align: center;">FREQUENTLY ASKED QUESTIONS</h2>
[/vc_column_text][vc_row_inner css=".vc_custom_1456601620014{margin-top: 60px !important;}"][vc_column_inner width="1/2"][vc_single_image img_size="full" style="vc_box_outline" css_animation="left-to-right"][/vc_column_inner][vc_column_inner width="1/2"][vc_toggle title="Do I need to know coding to use wordpress?" style="round_outline" color="vista_blue" css_animation="bottom-to-top" el_id="1456601523883-1bc79557-2ea1"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="Theme license information" style="round_outline" color="vista_blue" css_animation="bottom-to-top" el_id="1456601486067-dc85e133-bb63"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="Why does wordpress only support mysql?" style="round_outline" color="vista_blue" css_animation="bottom-to-top" el_id="1456601517885-1d383a2e-1637"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="How do I login forum section" style="round_outline" color="vista_blue" css_animation="bottom-to-top" el_id="1456601497393-ca8fdbae-ad47"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="Do I need to know coding to use wordpress?" style="round_outline" color="vista_blue" css_animation="bottom-to-top" el_id="1456602357419-7359d2d4-3d38"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="Theme license information" style="round_outline" color="vista_blue" css_animation="bottom-to-top" el_id="1456602367478-e9a69e0b-27ca"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="Why does wordpress only support mysql?" style="round_outline" color="vista_blue" css_animation="bottom-to-top" el_id="1456602373983-a997874a-9e0f"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="How do I login forum section" style="round_outline" color="vista_blue" css_animation="bottom-to-top" el_id="1456602398898-ddbae0de-5932"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456111714980{margin-top: 50px !important;}"][vc_column][vc_column_text css=".vc_custom_1455039561342{margin-bottom: 27px !important;}"]
<h2 style="text-align: center;">THE BEST SOLUTION</h2>
[/vc_column_text][vc_column_text]
<h4 style="text-align: center;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456489708238{margin-bottom: 60px !important;}"][vc_column width="1/4"][manual_service_table_section title="Fully Responsive" iconimage="icon-mobile" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
	<li>Modern Design</li>
	<li>24/7 Premium Support</li>
	<li>Modern Page Layouts</li>
	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][vc_column width="1/4"][manual_service_table_section title="Premium Slider" iconimage="icon-picture" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
	<li>Modern Design</li>
	<li>24/7 Premium Support</li>
	<li>Modern Page Layouts</li>
	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][vc_column width="1/4"][manual_service_table_section title="Page Builder" iconimage="icon-gears" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
	<li>Modern Design</li>
	<li>24/7 Premium Support</li>
	<li>Modern Page Layouts</li>
	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][vc_column width="1/4"][manual_service_table_section title="Dedicated Support" iconimage="icon-chat" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
	<li>Modern Design</li>
	<li>24/7 Premium Support</li>
	<li>Modern Page Layouts</li>
	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" video="show_video" video_mp4="https://s3-us-west-2.amazonaws.com/coverr/mp4/Traffic-blurred2.mp4" full_width="stretch_row" equal_height="yes" css=".vc_custom_1456489642550{margin-top: 40px !important;padding-top: 50px !important;padding-bottom: 100px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;"><span style="color: #ededed;">OUR STATUS</span></h2>
[/vc_column_text][vc_row_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="5852" text="Happy Customer" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="500" text_font_weight="500" separator="yes" digit="567" text="CUPS OF COFFEE" font_color="#ffffff" text_color="#ffffff" separator_color="#aaaaaa"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="72" text="Finished Projects" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="500" text_font_weight="500" separator="yes" digit="187" text="Staff Members" font_color="#ffffff" text_color="#ffffff" separator_color="#aaaaaa"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	 

/*******
	ADD TEMPLATE :: HOME 3
********/
	 add_filter( 'vc_load_default_templates', 'vc_homethree_template' );
	 function vc_homethree_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] Home 3 (Modern KB)', 'manual' );
        $template['content']    = <<<CONTENT
		[vc_row row_type="row" stretch_row_type="yes" background_color="#f6f6f6" css=".vc_custom_1456589643389{padding-top: 70px !important;padding-bottom: 35px !important;}"][vc_column width="1/3"][manual_theme_icon_text icon_name="icon-documents" display_icon_position="left_from_title" use_custom_icon_size="yes" custom_icon_size="45" title="knowledge Base" title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="15" activate_link="yes" link_icon="no" link="url:%23|title:Check%20An%20Article|target:%20_blank" title_color="#706e6e" link_hover_icon_color="#dd3333" link_color="#46b289" icon_color="#3d3b3b"][/vc_column][vc_column width="1/3"][manual_theme_icon_text icon_name="icon-search" display_icon_position="left_from_title" use_custom_icon_size="yes" custom_icon_size="45" title="Frequently Asked Questions" title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="15" activate_link="yes" link_icon="no" link="url:%23|title:See%20Answers|target:%20_blank" title_color="#706e6e" link_hover_icon_color="#dd3333" link_color="#46b289" icon_color="#3d3b3b"][/vc_column][vc_column width="1/3"][manual_theme_icon_text icon_name="icon-chat" display_icon_position="left_from_title" use_custom_icon_size="yes" custom_icon_size="45" title="Community Forums" title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="15" activate_link="yes" link_icon="no" link="url:%23|title:Visit%20The%20Forum|target:%20_blank" title_color="#706e6e" link_hover_icon_color="#dd3333" link_color="#46b289" icon_color="#3d3b3b"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456589519878{margin-top: 80px !important;margin-bottom: 25px !important;}"][vc_column][manual_theme_all_knowledgebase knowledgebase_shortcode_name="KB Blocks" icon_name="home page "][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#cecece" full_width="stretch_row" equal_height="yes" css=".vc_custom_1456995775168{margin-top: 40px !important;padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="5852" text="Happy Customer" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="500" text_font_weight="500" separator="yes" digit="567" text="CUPS OF COFFEE" separator_color="#ffffff" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="72" text="Finished Projects" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="500" text_font_weight="500" separator="yes" digit="187" text="Staff Members" separator_color="#ffffff" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	
	
	
	
/*******
	ADD TEMPLATE :: HOME 4
********/
	 add_filter( 'vc_load_default_templates', 'vc_homefour_template' );
	 function vc_homefour_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] Home 4 (Help Desk 2)', 'manual' );
        $template['content']    = <<<CONTENT
		[vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456113715539{margin-top: 50px !important;margin-bottom: 5px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">How Do You Want To Proceed?</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1455680031256{margin-bottom: 55px !important;}"]
<h4 style="text-align: center;">Easily create Documentation, Knowledge-base, FAQ, Forum and more using page layouts and the tools we provide</h4>
[/vc_column_text][vc_separator style="shadow" el_width="30" css=".vc_custom_1456119594660{margin-top: -20px !important;}"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456597253354{margin-top: 20px !important;margin-bottom: 90px !important;}"][vc_column width="1/2" css=".vc_custom_1456973540504{padding-top: 40px !important;padding-right: 35px !important;padding-bottom: 30px !important;padding-left: 35px !important;background-color: #f7f8f9 !important;}"][manual_theme_icon_text icon_name="icon-documents" display_icon_position="left" use_custom_icon_size="yes" custom_icon_size="55" custom_icon_margin="105" title="Knowledge Base" title_font_size="29" title_font_transform="capitalize" title_font_weight="300" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" activate_link="yes" link_icon="no" link="url:%23|title:Go%20to%20Help%20Desk|target:%20_blank" link_hover_icon_color="#dd3333" title_color="#353535" text_color="#353535" icon_color="#353535" link_color="#46b289"][/vc_column][vc_column width="1/2" css=".vc_custom_1456974428873{padding-top: 40px !important;padding-right: 35px !important;padding-bottom: 30px !important;padding-left: 35px !important;background-color: rgba(161,223,116,0.19) !important;*background-color: rgb(161,223,116) !important;}"][manual_theme_icon_text icon_name="icon-chat" display_icon_position="left" use_custom_icon_size="yes" custom_icon_size="55" custom_icon_margin="105" title="Live Chat" title_font_size="29" title_font_transform="capitalize" title_font_weight="300" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" activate_link="yes" link_icon="no" link="url:%23|title:Go%20to%20live%20chat|target:%20_blank" link_hover_icon_color="#dd3333" title_color="#595959" text_color="#595959" icon_color="#595959" link_color="#46b289"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#eaeaea" css=".vc_custom_1456995983591{margin-top: 50px !important;padding-top: 50px !important;padding-bottom: 110px !important;}"][vc_column][vc_column_text css=".vc_custom_1456974093114{margin-bottom: 27px !important;}"]
<h2 style="text-align: center;"><span style="color: #ffffff;">WHY PEOPLE LOVE US</span></h2>
[/vc_column_text][vc_column_text]
<h4 style="text-align: center;"><span style="color: #ffffff;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</span></h4>
[/vc_column_text][vc_row_inner css=".vc_custom_1456499581827{margin-top: 60px !important;}"][vc_column_inner width="1/3" css=".vc_custom_1456598374255{background-color: #fefefe !important;}"][manual_theme_icon_text icon_name="icon-gears" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="56" title="Premium Support" text="24/7 Support"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1456973990728{background-color: #e8e8e8 !important;}"][manual_theme_icon_text icon_name="icon-chat " display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="56" title="Online Chat " text="5 days a week"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1456598384459{background-color: #fefefe !important;}"][manual_theme_icon_text icon_name="icon-linegraph" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="56" title=" Customer Satisfaction " text="Happy Customers"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3" css=".vc_custom_1456973980984{background-color: #e8e8e8 !important;}"][manual_theme_icon_text icon_name="icon-briefcase" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="56" title="Online Documentation " text="Clean User Manuals"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1456598395459{background-color: #fefefe !important;}"][manual_theme_icon_text icon_name="icon-heart " display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="56" title="Great Products " text="Loved By 95% Users"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1456597766266{background-color: #e8e8e8 !important;}"][manual_theme_icon_text icon_name="icon-piechart" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="56" title=" Grow Your Business" text="We Help You Grow"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456662913472{padding-top: 50px !important;padding-bottom: 50px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center; text-transform: capitalize;">QUICK LINKS</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1455680031256{margin-bottom: 55px !important;}"]
<h4 style="text-align: center;">Easily create Documentation, Knowledge-base, FAQ, Forum and more using page layouts and the tools we provide</h4>
[/vc_column_text][manual_theme_home_help_blocks title="Home Help Blocks"][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	



/*******
	ADD TEMPLATE :: HOME 5
********/
add_filter( 'vc_load_default_templates', 'vc_homefive_template' );
function vc_homefive_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home 5 (Classic KB)', 'manual' );
	$template['content']    = <<<CONTENT
	[vc_row row_type="row" stretch_row_type="yes" background_color="rgba(248,248,248,0.45)" css=".vc_custom_1456976449992{padding-top: 70px !important;padding-bottom: 35px !important;}"][vc_column width="1/3"][manual_theme_icon_text icon_name="icon-documents" display_icon_position="left_from_title" use_custom_icon_size="yes" custom_icon_size="45" title="Documentation" title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="15" activate_link="yes" link_icon="no" link="url:%23|title:Check%20An%20Article|target:%20_blank" title_color="#706e6e" link_hover_icon_color="#dd3333" link_color="#46b289" icon_color="#3d3b3b"][/vc_column][vc_column width="1/3"][manual_theme_icon_text icon_name="icon-search" display_icon_position="left_from_title" use_custom_icon_size="yes" custom_icon_size="45" title="Frequently Asked Questions" title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="15" activate_link="yes" link_icon="no" link="url:%23|title:See%20Answers|target:%20_blank" title_color="#706e6e" link_hover_icon_color="#dd3333" link_color="#46b289" icon_color="#3d3b3b"][/vc_column][vc_column width="1/3"][manual_theme_icon_text icon_name="icon-chat" display_icon_position="left_from_title" use_custom_icon_size="yes" custom_icon_size="45" title="Community Forums" title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="15" activate_link="yes" link_icon="no" link="url:%23|title:Visit%20The%20Forum|target:%20_blank" title_color="#706e6e" link_hover_icon_color="#dd3333" link_color="#46b289" icon_color="#3d3b3b"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456651550754{margin-top: 80px !important;margin-bottom: 100px !important;}"][vc_column width="1/4"][manual_theme_kb_category kb_category_title="Categories" kb_category_show_post_count="true" kb_category_show_hierarchy="true"][manual_theme_kb_popular_article title="Popular Articles" knowledgebase_article_display_type="2"][manual_theme_kb_popular_article title="Latest Articles" knowledgebase_article_display_type="1"][/vc_column][vc_column width="3/4" css=".vc_custom_1456651285007{background-color: #f5f5f5 !important;}"][manual_theme_all_knowledgebase knowledgebase_shortcode_name="KB BLOCKS" knowledgebase_column="6"][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	
	
/*******
	ADD TEMPLATE :: HOME 6
********/
add_filter( 'vc_load_default_templates', 'vc_homeseven_template' );
function vc_homeseven_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home 6 (Creative)', 'manual' );
	$template['content']    = <<<CONTENT
[vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456702070989{padding-top: 40px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">WELCOME TO MANUAL</h2>
[/vc_column_text][vc_separator style="shadow" border_width="2" el_width="20" css=".vc_custom_1456702257588{margin-top: -20px !important;}"][vc_column_text css=".vc_custom_1455583667509{margin-bottom: 55px !important;}"]
<h4 style="text-align: center;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][vc_single_image img_size="full" alignment="center" css_animation="bottom-to-top"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#f4f4f4" css=".vc_custom_1456702677402{margin-top: -35px !important;padding-top: 50px !important;padding-bottom: 50px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">WHAT WE DO</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1455583667509{margin-bottom: 55px !important;}"]
<h4 style="text-align: center;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][vc_row_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-mobile" display_icon_position="left" use_custom_icon_size="yes" custom_icon_size="50" title="Responsive Design" title_font_weight="700" text="Manual responsive framework ensures your content looks great on all screen sizes" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-clipboard" display_icon_position="left" use_custom_icon_size="no" title="Amazing Elements" title_font_weight="700" text="Manual offers incredible elements that allow you to create a beautiful site" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-gears " display_icon_position="left" use_custom_icon_size="no" title="Dedicated Support" title_font_weight="700" text="We care about your site as much as you do, you can count on us for theme support" icon_color="#303030"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-layers" display_icon_position="left" use_custom_icon_size="no" title="Powerful Options" title_font_weight="700" text="Manual theme options and page options allow you to take control of your website" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-refresh" display_icon_position="left" use_custom_icon_size="no" title="Free Upgrades With Value" title_font_weight="700" text="We issue updates that matter; rich with amazing new features and improvements" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-browser" display_icon_position="left" use_custom_icon_size="no" title="Awesome Portfolio Layouts" title_font_weight="700" text="Manual has awesome portfolio layouts that make your work stand out!" icon_color="#303030"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#ffffff" full_width="stretch_row" equal_height="yes" css=".vc_custom_1456701452089{padding-top: 70px !important;padding-bottom: 70px !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="5852" text="Happy Customer" font_color="#454545" text_color="#0a0a0a"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="700" text_font_weight="500" separator="yes" digit="567" text="CUPS OF COFFEE" font_color="#454545" text_color="#424242" separator_color="#3d3d3d"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="72" text="Finished Projects" font_color="#454545" text_color="#0a0a0a"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="700" text_font_weight="500" separator="yes" digit="187" text="Staff Members" font_color="#454545" text_color="#424242" separator_color="#3d3d3d"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#f2f2f2" full_width="stretch_row" css=".vc_custom_1456491927839{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column][vc_column_text css=".vc_custom_1455577970863{margin-top: -30px !important;}"]
<h2 style="text-align: center;">THEY SAY</h2>
[/vc_column_text][vc_separator style="double" el_width="30" css=".vc_custom_1455578284368{margin-top: -10px !important;margin-bottom: -3px !important;}"][manual_theme_testimonials number="2" order_by="title" order="DESC" custom_font_size="23px" author_text_font_weight="500"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456490199768{margin-top: 30px !important;margin-bottom: 40px !important;}"][vc_column][vc_column_text css=".vc_custom_1456703300624{margin-top: 40px !important;border-bottom-width: 30px !important;}"]
<h2 style="text-align: center;">OUR AMAZING TEAM</h2>
[/vc_column_text][vc_separator style="double" el_width="10" css=".vc_custom_1455109618064{margin-bottom: 50px !important;}"][vc_row_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Miller Johnson " team_position="Founder" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Earnest Johnson" team_position="General Manager" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Ubon Anne" team_position="Manager" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Jeshon Ambron " team_position="Programmer" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="full-width-content"][vc_column][vc_gmaps link="#E-8_JTNDaWZyYW1lJTIwc3JjJTNEJTIyaHR0cHMlM0ElMkYlMkZ3d3cuZ29vZ2xlLmNvbSUyRm1hcHMlMkZlbWJlZCUzRnBiJTNEJTIxMW0xOCUyMTFtMTIlMjExbTMlMjExZDYzMDQuODI5OTg2MTMxMjcxJTIxMmQtMTIyLjQ3NDY5NjgwMzMwOTIlMjEzZDM3LjgwMzc0NzUyMTYwNDQzJTIxMm0zJTIxMWYwJTIxMmYwJTIxM2YwJTIxM20yJTIxMWkxMDI0JTIxMmk3NjglMjE0ZjEzLjElMjEzbTMlMjExbTIlMjExczB4ODA4NTg2ZTYzMDI2MTVhMSUyNTNBMHg4NmJkMTMwMjUxNzU3YzAwJTIxMnNTdG9yZXklMkJBdmUlMjUyQyUyQlNhbiUyQkZyYW5jaXNjbyUyNTJDJTJCQ0ElMkI5NDEyOSUyMTVlMCUyMTNtMiUyMTFzZW4lMjEyc3VzJTIxNHYxNDM1ODI2NDMyMDUxJTIyJTIwd2lkdGglM0QlMjI2MDAlMjIlMjBoZWlnaHQlM0QlMjI0NTAlMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBzdHlsZSUzRCUyMmJvcmRlciUzQTAlMjIlMjBhbGxvd2Z1bGxzY3JlZW4lM0UlM0MlMkZpZnJhbWUlM0U=" css=".vc_custom_1456705128973{margin-bottom: -5px !important;}"][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }



/*******
	ADD TEMPLATE :: HOME 7
********/
add_filter( 'vc_load_default_templates', 'vc_homeeight_template' );
function vc_homeeight_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home 7 (Corporate)', 'manual' );
	$template['content']    = <<<CONTENT
[vc_row row_type="row" stretch_row_type="yes" background_color="#f4f4f4" css=".vc_custom_1456702677402{margin-top: -35px !important;padding-top: 50px !important;padding-bottom: 50px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">WHAT WE DO</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1455583667509{margin-bottom: 55px !important;}"]
<h4 style="text-align: center;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][vc_row_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-mobile" display_icon_position="left" use_custom_icon_size="yes" custom_icon_size="50" title="Responsive Design" title_font_weight="700" text="Manual responsive framework ensures your content looks great on all screen sizes" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-clipboard" display_icon_position="left" use_custom_icon_size="no" title="Amazing Elements" title_font_weight="700" text="Manual offers incredible elements that allow you to create a beautiful site" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-gears " display_icon_position="left" use_custom_icon_size="no" title="Dedicated Support" title_font_weight="700" text="We care about your site as much as you do, you can count on us for theme support" icon_color="#303030"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-layers" display_icon_position="left" use_custom_icon_size="no" title="Powerful Options" title_font_weight="700" text="Manual theme options and page options allow you to take control of your website" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-refresh" display_icon_position="left" use_custom_icon_size="no" title="Free Upgrades With Value" title_font_weight="700" text="We issue updates that matter; rich with amazing new features and improvements" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text icon_name="icon-browser" display_icon_position="left" use_custom_icon_size="no" title="Awesome Portfolio Layouts" title_font_weight="700" text="Manual has awesome portfolio layouts that make your work stand out!" icon_color="#303030"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="rgba(124,157,191,0.28)" css=".vc_custom_1456759461753{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">PORTFOLIO</h2>
[/vc_column_text][vc_separator style="shadow" border_width="2" el_width="20" css=".vc_custom_1456702257588{margin-top: -20px !important;}"][vc_column_text css=".vc_custom_1455583667509{margin-bottom: 55px !important;}"]
<h4 style="text-align: center;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][manual_theme_portfolio_sc portfolio_type="Masonry" number_of_post="6" portfolio_order="DESC" portfolio_order_by="Name" portfolio_column="4"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#ffffff" full_width="stretch_row" equal_height="yes" css=".vc_custom_1456701452089{padding-top: 70px !important;padding-bottom: 70px !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="5852" text="Happy Customer" font_color="#454545" text_color="#0a0a0a"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="700" text_font_weight="500" separator="yes" digit="567" text="CUPS OF COFFEE" font_color="#454545" text_color="#424242" separator_color="#3d3d3d"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="72" text="Finished Projects" font_color="#454545" text_color="#0a0a0a"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="700" text_font_weight="500" separator="yes" digit="187" text="Staff Members" font_color="#454545" text_color="#424242" separator_color="#3d3d3d"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#f2f2f2" full_width="stretch_row" css=".vc_custom_1456491927839{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column][vc_column_text css=".vc_custom_1455577970863{margin-top: -30px !important;}"]
<h2 style="text-align: center;">THEY SAY</h2>
[/vc_column_text][vc_separator style="double" el_width="30" css=".vc_custom_1455578284368{margin-top: -10px !important;margin-bottom: -3px !important;}"][manual_theme_testimonials number="2" order_by="title" order="DESC" custom_font_size="23px" author_text_font_weight="500"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456490199768{margin-top: 30px !important;margin-bottom: 40px !important;}"][vc_column][vc_column_text css=".vc_custom_1456703300624{margin-top: 40px !important;border-bottom-width: 30px !important;}"]
<h2 style="text-align: center;">OUR AMAZING TEAM</h2>
[/vc_column_text][vc_separator style="double" el_width="10" css=".vc_custom_1455109618064{margin-bottom: 50px !important;}"][vc_row_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Miller Johnson " team_position="Founder" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Earnest Johnson" team_position="General Manager" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Ubon Anne" team_position="Manager" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Jeshon Ambron " team_position="Programmer" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	
	
	
	
/*******
	ADD TEMPLATE :: CHOOSE YOUR DEMO
********/
add_filter( 'vc_load_default_templates', 'vc_choosedemo_template' );
function vc_choosedemo_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Choose Your Demo', 'manual' );
	$template['content']    = <<<CONTENT
[vc_row el_id="" el_class="" css=".vc_custom_1459780703537{margin-top: 50px !important;margin-bottom: 50px !important;}" row_type="row" stretch_row_type="no" background_image="" background_color="" background_color_content_stretch="" border_color="" video="" video_webm="" video_mp4="" video_ogv="" video_image=""][vc_column][vc_custom_heading text="Home Page Layouts" font_container="tag:div|font_size:45px|text_align:center|color:%230a0a0a" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:100%20light%20regular%3A100%3Anormal" css=".vc_custom_1459825827425{padding-bottom: 50px !important;}"][vc_row_inner][vc_column_inner width="1/3"][manual_theme_monitor_frame_portfolio title="Default Home Page" link="url:%23|title:Default%20Home%20Page|target:%20_blank"][manual_theme_monitor_frame_portfolio title="Help Desk 1" link="url:%23|title:Help%20Desk%201|target:%20_blank"][manual_theme_monitor_frame_portfolio title="Classic Knowledgebase" link="url:%23|title:Classic%20Knowledgebase|target:%20_blank"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_monitor_frame_portfolio title="Business" link="url:%23|title:BUSINESS|target:%20_blank"][manual_theme_monitor_frame_portfolio title="Corporate" link="url:%23|title:Corporate|target:%20_blank"][manual_theme_monitor_frame_portfolio title="Modern Knowledgebase" link="url:%23|title:Modern%20Knowledgebase|target:%20_blank"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_monitor_frame_portfolio title="Creative" link="url:%23|title:Creative|target:%20_blank"][manual_theme_monitor_frame_portfolio title="Help Desk 2" link="url:%23|title:Help%20Desk%202|target:%20_blank"][manual_theme_monitor_frame_portfolio title="Choose Your Demo" link="url:%23|title:Choose%20Your%20Demo|target:%20_blank"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row el_id="" el_class="" css=".vc_custom_1459902335371{padding-top: 60px !important;padding-bottom: 40px !important;}" row_type="row" stretch_row_type="yes" background_image="" background_color="#f7f8f9" background_color_content_stretch="" border_color="" video="" video_webm="" video_mp4="" video_ogv="" video_image=""][vc_column][vc_row_inner][vc_column_inner width="1/2"][vc_custom_heading text="Documentation" font_container="tag:div|font_size:45px|text_align:left|color:%230a0a0a" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:100%20light%20regular%3A100%3Anormal" css=".vc_custom_1459825573195{padding-bottom: 20px !important;}"][vc_column_text]Easily create and manage documentation for your product. Manual has features for every need. Some of the amazing features are...[/vc_column_text][vc_column_text]
<ul style="padding-left: 18px;">
	<li style="padding-bottom: 10px; font-weight: 600;">Ajax Load Pages</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Attached unlimited files, images, videos... etc per post</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Allow documentation category access to only login users (on/off feature)</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Allow attached files access to only login users (on/off feature)</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Advance post menu system</li>
	<li style="padding-bottom: 10px; font-weight: 600;">and so much more…</li>
</ul>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_single_image img_size="full" alignment="center" style="vc_box_shadow" css_animation="top-to-bottom"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row el_id="" el_class="" css=".vc_custom_1459901782969{padding-top: 60px !important;padding-bottom: 40px !important;}" row_type="row" stretch_row_type="no" background_image="" background_color="#f7f8f9" background_color_content_stretch="" border_color="" video="" video_webm="" video_mp4="" video_ogv="" video_image=""][vc_column][vc_row_inner][vc_column_inner width="1/2"][vc_single_image img_size="full" alignment="center" style="vc_box_shadow" css_animation="top-to-bottom"][/vc_column_inner][vc_column_inner width="1/2"][vc_custom_heading text="Knowledge Base" font_container="tag:div|font_size:45px|text_align:left|color:%230a0a0a" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:100%20light%20regular%3A100%3Anormal" css=".vc_custom_1459902017045{padding-bottom: 20px !important;}"][vc_column_text]Easily create and manage knowledge-base for your product. Manual has features for every need. Some of the amazing features are...[/vc_column_text][vc_column_text]
<ul style="padding-left: 18px;">
	<li style="padding-bottom: 10px; font-weight: 600;">Masonry record display</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Total freedom to change page layouts</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Add unlimited attachments</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Allow attached files access to only login users (on/off feature)</li>
	<li style="padding-bottom: 10px; font-weight: 600;">and so much more…</li>
</ul>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row el_id="" el_class="" css=".vc_custom_1459904123281{padding-top: 60px !important;padding-bottom: 40px !important;}" row_type="row" stretch_row_type="yes" background_image="" background_color="#f7f8f9" background_color_content_stretch="" border_color="" video="" video_webm="" video_mp4="" video_ogv="" video_image=""][vc_column][vc_row_inner][vc_column_inner width="1/2"][vc_custom_heading text="Creative Portfolio" font_container="tag:div|font_size:45px|text_align:left|color:%230a0a0a" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:100%20light%20regular%3A100%3Anormal" css=".vc_custom_1459904161061{padding-bottom: 20px !important;}"][vc_column_text]Show off your amazing work using manual creative portfolio layouts. Each layouts can be easily adapted for:
[/vc_column_text][vc_column_text]
<ul style="padding-left: 18px;">
	<li style="padding-bottom: 10px; font-weight: 600;">Design</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Illustration</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Photography</li>
	<li style="padding-bottom: 10px; font-weight: 600;">and so much more...</li>
</ul>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_single_image img_size="full" alignment="center" style="vc_box_shadow" css_animation="top-to-bottom"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row el_id="" el_class="" css=".vc_custom_1459905390054{padding-top: 60px !important;padding-bottom: 60px !important;}" row_type="row" stretch_row_type="no" background_image="" background_color="" background_color_content_stretch="" border_color="" video="" video_webm="" video_mp4="" video_ogv="" video_image=""][vc_column][vc_custom_heading text="Create a website that will look professional" font_container="tag:div|font_size:40px|text_align:center" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:100%20light%20regular%3A100%3Anormal"][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	
	
	
	
/*******
	ADD TEMPLATE :: TRENDING KNOWLEDGEBASE
********/
add_filter( 'vc_load_default_templates', 'vc_trending_knowledgebase_template' );
function vc_trending_knowledgebase_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home 8 (Trending knowledgebase)', 'manual' );
	$template['content']    = <<<CONTENT
[vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1462968409830{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column][vc_tta_tour][vc_tta_section title="COPYRIGHT & LEGAL - THEME" tab_id="1462721776263-8675e9ea-fe2a"][/vc_tta_section][vc_tta_section title="CUSTOMIZATION" tab_id="1462721776274-99cc5bed-0ab6"][/vc_tta_section][/vc_tta_tour][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }	
	
	
	
/*******
	ADD TEMPLATE :: GROUP TAB KNOWLEDGEBASSE
********/
add_filter( 'vc_load_default_templates', 'vc_group_tab_knowledgebase_template' );
function vc_group_tab_knowledgebase_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home 9 (Group Tab KnowledgeBase)', 'manual' );
	$template['content']    = <<<CONTENT
[vc_row row_type="row" stretch_row_type="no"][vc_column][vc_empty_space height="50px"][vc_tta_tabs alignment="center" active_section="1"][vc_tta_section i_icon_fontawesome="fa fa-laptop" title="THEME KNOWLEDGEBASE" tab_id="1465301361288-5463cc1c-5900" add_icon="true"][vc_empty_space height="40px"][manual_theme_vc_custom_group_cat_knowledgebase category_order="DESC" kb_post_under_category="5" kb_column_type="4" kbgroupcatid="5,6,7,8"][/vc_tta_section][vc_tta_section i_icon_fontawesome="fa fa-cog" title="PLUGIN KNOWLEDGEBASE" tab_id="1465301361305-6154e639-8ccb" add_icon="true"][vc_empty_space height="40px"][manual_theme_vc_custom_group_cat_knowledgebase category_order="DESC" kb_post_under_category="5" kb_column_type="4" kb_disable_customcat_masonry="true" kbgroupcatid="2,3,6"][/vc_tta_section][/vc_tta_tabs][vc_empty_space height="50px"][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }	
	
	
/*******
	ADD TEMPLATE :: HOME PORTFOLIO
********/
add_filter( 'vc_load_default_templates', 'vc_portfolio_new_template' );
function vc_portfolio_new_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home 10 (Portfolio)', 'manual' );
	$template['content']    = <<<CONTENT
[vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1471758845840{padding-bottom: 50px !important;}"][vc_column][manual_theme_portfolio_sc portfolio_type="FitRows" portfolio_shorting="yes" number_of_post="4" show_load_more="yes" show_load_more_align="center" show_load_more_margin="10px"][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }		


/*******
	ADD TEMPLATE :: HOME PORTFOLIO
********/
add_filter( 'vc_load_default_templates', 'vc_modern_support_desk_template' );
function vc_modern_support_desk_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home 11 (Help Desk 3)', 'manual' );
	$template['content']    = <<<CONTENT
	
[vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1479706838848{margin-top: 50px !important;margin-bottom: 50px !important;}"][vc_column width="1/2" css=".vc_custom_1456973540504{padding-top: 40px !important;padding-right: 35px !important;padding-bottom: 30px !important;padding-left: 35px !important;background-color: #f7f8f9 !important;}"][manual_theme_icon_text icon_name="icon-documents" display_icon_position="left" use_custom_icon_size="yes" custom_icon_size="55" custom_icon_margin="105" title="Knowledge Base" title_font_size="29" title_font_transform="capitalize" title_font_weight="300" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" activate_link="yes" link_icon="no" link="url:%23|title:Go%20to%20Help%20Desk|target:%20_blank" link_hover_icon_color="#dd3333" title_color="#353535" text_color="#353535" icon_color="#353535" link_color="#46b289"][/vc_column][vc_column width="1/2" css=".vc_custom_1456974428873{padding-top: 40px !important;padding-right: 35px !important;padding-bottom: 30px !important;padding-left: 35px !important;background-color: rgba(161,223,116,0.19) !important;*background-color: rgb(161,223,116) !important;}"][manual_theme_icon_text icon_name="icon-chat" display_icon_position="left" use_custom_icon_size="yes" custom_icon_size="55" custom_icon_margin="105" title="Live Chat" title_font_size="29" title_font_transform="capitalize" title_font_weight="300" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" activate_link="yes" link_icon="no" link="url:%23|title:Go%20to%20live%20chat|target:%20_blank" link_hover_icon_color="#dd3333" title_color="#595959" text_color="#595959" icon_color="#595959" link_color="#46b289"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1479708471416{padding-bottom: 40px !important;}"][vc_column][vc_separator style="shadow" el_width="50" css_animation="bounceInRight"][vc_custom_heading text="FAQ - Some quick answers" font_container="tag:h3|text_align:left" css=".vc_custom_1479708326673{padding-bottom: 25px !important;}"][manual_theme_single_faq_article page_per_post="5" faqsinglecatid="43"][/vc_column][/vc_row]

CONTENT;
        array_unshift($data, $template);
        return $data;
    }		
				
				
?>