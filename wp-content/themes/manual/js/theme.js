jQuery(document).ready(function() { 
	
	"use strict";
  
	//Open comment box once on click
    jQuery("#feedback-form").on("click",function() { 
       jQuery("#comment-form").slideDown( "slow" );
       jQuery("#feedback-form").hide();
       	return false;
    });
	
	// PRINT
    /*jQuery(".print-page").on("click",function(event) { 
      event.preventDefault();
      window.print();
      return false;
    });*/
	
	/***** HB MENU *****/
	jQuery('.hamburger-menu').on('click', function(e) {  
		 if (jQuery(".hamburger-menu").hasClass("menu-open")) {
			  jQuery('.hamburger-menu').removeClass( "menu-open" ); 
			  jQuery('#menu-header-menu').hide(); 
			  jQuery('.form-group.menu-bar-form').show(); 
			  jQuery(window).trigger("resize");
		 } else {
			 jQuery('.hamburger-menu').addClass( "menu-open" );  
			 jQuery('#menu-header-menu').show(); 
			 jQuery('.form-group.menu-bar-form').hide(); 
			 jQuery(window).trigger("resize");
		 }
	});

	/**** FAQ COLLAPSIBLE PANEL  ****/
	
	if ( faq_search_id != '' ){ 
		 jQuery('.collapsible-panels div').hide(); 
		 jQuery('#'+faq_search_id ).addClass( "active" ); 
		 jQuery('#'+faq_search_id+' .entry-content').show();
	} else {  
		jQuery('.collapsible-panels div').hide(); 
	}
	 
    jQuery('.collapsible-panels.theme-faq-cat-pg h4.title-faq-cat').on("click",function(e) { 
        jQuery(this).next('.collapsible-panels div').slideToggle('slow');  
        jQuery(this).parent().toggleClass('active');  
		jQuery('.entry-content .social-box').show();
        e.preventDefault();  
    }); 
	
	jQuery('#faq-expandall').on("click",function() { 
		 jQuery('.collapsible-panels div').slideToggle('slow');  
		 jQuery('.collapsible-panels h4').toggleClass('active');       
	});  
	
	
	/**** TRENDING SEARCH  ****/
	
	jQuery('.trending-search a.trending-search-popular-keyword').on('click', function(e){  
		var current_text = jQuery(this).text();
		jQuery('#s').val(current_text).focus();
		return false;
	});
	
	jQuery( ".form-group input.header-search" ).mousedown(function() { 
		jQuery('.form-group input.header-search').attr('placeholder',manual_searchmsg);
	});
	
	jQuery( ".form-group input.header-search"  ).focusout(function() { 
	  var old_place_holder = jQuery( "#oldplacvalue" ).val();
	  jQuery('.form-group input.header-search').attr('placeholder', old_place_holder);
	});
	
	
	
	/**** ON SCROLL STICKY MENU BAR  ****/

	if( sticky_menu == 2 ) {
		jQuery(window).on("scroll",function() {
			var $mainClass = jQuery(".navbar"), $body = jQuery("body");	
			var $original_html_height = jQuery( document ).height();
			if ((jQuery("html nav").hasClass("navbar"))){
				if ((jQuery(window).scrollTop() > 25)&& (jQuery(window).width()>=1100) ) {  
					// Active
					if($mainClass.hasClass("after-scroll-wrap"))
					return false;
					
					$body.addClass("search-active-sticky").css("padding-top", 1);
					$mainClass.addClass("after-scroll-wrap");
					jQuery(window).trigger("resize").trigger("scroll");
				} else {
					if($body.hasClass("search-active-sticky")) {
						$body.removeClass("search-active-sticky").css("padding-top", 0);
						$mainClass.removeClass("after-scroll-wrap");
						jQuery(window).trigger("resize").trigger("scroll");
					}
				}
			}
		});	
	}
	

	/**** WOO PLUS/MINUS  ****/
	jQuery('.quantity.woo-add-plus-minus').on('click', '.plus', function(e) {
		var input = jQuery(this).prev('input.qty');
		var val = parseInt(input.val());
		input.val( val+1 ).change();
	});

	jQuery('.quantity.woo-add-plus-minus').on('click', '.minus', 
		function(e) {
		var input = jQuery(this).next('input.qty');
		var val = parseInt(input.val());
		if (val > 0) {
			input.val( val-1 ).change();
		} 
	});
	
	/**** GLOBAL :: SCROLL PAGE UP  ****/
	
	if ( (jQuery(window).width()>=767) ) {
		// hide #back-top first
		jQuery("#scrollbkToTop").hide();
		jQuery( "body" ).append( "<p id=\"scrollbkToTop\" style=\"display: none;\"><a href=\"#top\"><span> <i class=\'"+go_up_icon+" footer-go-uplink\'></i></span></a></p>" );
		
		// fade in #back-top
		jQuery(function () {
			jQuery(window).on("scroll",function() {
				if (jQuery(this).scrollTop() > 150) {
					jQuery('#scrollbkToTop').fadeIn();
				} else {
					jQuery('#scrollbkToTop').fadeOut();
				}
			});
		
			// scroll body to 0px on click
			jQuery('#scrollbkToTop a').on("click",function() { 
				jQuery('body,html').animate({
					scrollTop: 0
				}, 800);
				return false;
			});
		});
	}



	/**** DOCUMENTATION :: S=H  ****/
	
	jQuery('#list-manual > li > a.has-child').on('click', function(e){
		var current_post_ID = jQuery(this).attr("rel");
		if ( 0 < jQuery(this).next("ul").size() ) {
		  e.preventDefault();
		}
		if ( 0 == jQuery(this).next("ul").size() || 0 == jQuery(this).next("ul:hidden").size() ) {
		  return;
		}
		jQuery(this).parents("#list-manual").find("li > a").removeClass('dataicon');
		jQuery(this).parents("#list-manual").find("ul").not(":hidden").slideUp(300);
		jQuery(this).addClass('dataicon').next("ul").slideDown(300);
	});
	
	jQuery('#list-manual li a.has-inner-child').on('click', function(e){ 
		var current_post_ID = jQuery(this).attr("rel");
		var current_ul_status = jQuery(this).parents("#list-manual").find("ul.child-open-"+current_post_ID).is(':hidden');
		
		if ( 0 < jQuery(this).next("ul").size() ) {  
		  e.preventDefault();
		}
		
		if( current_ul_status == true ) { 
				jQuery(this).next("ul").slideDown(300);
		} else if( jQuery(this).parents("#list-manual").find('ul').hasClass('child-open-'+current_post_ID) ) {
			jQuery(this).parents("#list-manual").find("ul.child-open-"+current_post_ID).not(":hidden").slideUp(300);
			jQuery(this).parents("#list-manual").find('ul').removeClass('child-open-'+current_post_ID);
			jQuery(this).parents("#list-manual").find("li > a.child-a-icon-"+current_post_ID).removeClass('dataicon');
			jQuery(this).parents("#list-manual").find("li > a.child-a-icon-"+current_post_ID).removeClass('child-a-icon-'+current_post_ID);
		} else {
			jQuery(this).addClass('dataicon child-a-icon-'+current_post_ID).next("ul").addClass('child-open-'+current_post_ID).slideDown(300);
		}
	});
	
	jQuery("#list-manual").each(function(e){
		if( jQuery( "#list-manual > li > a" ).hasClass( "open-ul-first" ) ){ 
			jQuery( "#list-manual > li > a.open-ul-first" ).addClass('dataicon').next("ul").slideDown(300);
		}
	});
	
	jQuery('.doc-expandall').on('click', function(e){ 
		 jQuery("#list-manual li a").addClass('dataicon');
		 jQuery(".doc-expandall").hide();
		 jQuery(".doc-collapseall").show();
		 jQuery("#list-manual li").children('ul').slideDown(300); 
	});
	
	jQuery('.doc-collapseall').on('click', function(e){ 
		 jQuery("#list-manual li a").removeClass('dataicon');
		 jQuery(".doc-collapseall").hide();
		 jQuery(".doc-expandall").show();
		 jQuery("#list-manual li").children('ul').slideUp(300); 
	});


	/**** DOCUMENTATION :: AJAX LOAD  ****/
	
	jQuery(".post-link").on("click",function() {
		jQuery("#list-manual li a").removeClass('doc-active');
		jQuery(this).addClass('doc-active');
		jQuery("#single-post-container").html("<div style=\"width:100%; margin:30px; min-height:300px;\"><div class=\"spinner-loader\"></div></div>");
		// Retrieve post ID from data attribute 
		var current_post_ID = jQuery(this).attr("rel");
        // Ajax call
        jQuery.ajax({
            type: "post",
            url: doc_ajax_var.url,
			data: { action: 'display-doc-post', 
					nonce: doc_ajax_var.nonce,
					post_id: current_post_ID,
				  },
			success: function(data, textStatus, XMLHttpRequest){  
					jQuery( "#single-post-container" ).html(data); 
					//jQuery("#single-post-container").load(data);
					if( execute_js_after_ajax_call_pg_doc == 1 ) {
						jQuery( document ).trigger( "executeJSCodeOnAjaxCallDocPost", { "post_id": current_post_ID, "nonce": doc_ajax_var.nonce } );  
					}
			},
			error: function(MLHttpRequest, textStatus, errorThrown){  
				//alert(textStatus); 
			}
        });
        return false;
    });
	
	// mScroll
	if( doc_catpage_active == 1 ) { jQuery("#list-manual").mCustomScrollbar({ setHeight: doc_scroll_menu_define_height }); }
	
	// Accurate # Cache Search
	if( doc_catpage_hash == 1 ) {
		var doc_search = location.href.split('#');
		if ( doc_search[1] != null ){
			jQuery("#list-manual li a").removeClass('doc-active').filter('a[rel^="'+doc_search[1]+'"]').addClass('doc-active');
			jQuery("#list-manual li a").addClass('dataicon');
			jQuery(".doc-expandall").hide();
			jQuery(".doc-collapseall").show();
			jQuery("#list-manual li").children('ul').slideDown(300);
			jQuery("#single-post-container").html("<div style=\"width:100%; margin:30px; min-height:300px;\"><div class=\"spinner-loader\"></div></div>");
			// Ajax call
			jQuery.ajax({
				type: "post",
				url: doc_ajax_var.url,
				data: { action: 'display-doc-post', 
						nonce: doc_ajax_var.nonce,
						post_id: doc_search[1],
					  },
				success: function(data, textStatus, XMLHttpRequest){  
						jQuery( "#single-post-container" ).html(data); 
						if( doc_catpage_active == 1 ) { jQuery("#list-manual").mCustomScrollbar("scrollTo", ".doc-active"); }
				},
				error: function(MLHttpRequest, textStatus, errorThrown){  
					//alert(textStatus); 
				}
			});
			//return false;
		}
	}
	
	/**** HOME PAGE :: HELP DESK  ****/
	jQuery('.loop-help-desk').owlCarousel({
			items : owlCarousel_item,
			navigation :false,
			pagination : true,
			responsive: true,
			lazyLoad : true,
			itemsDesktop : [1199,3],
			itemsDesktopSmall : [979,3],
			itemsTablet: [768,3],
			itemsTablet: [603,2],
			itemsMobile : [479,1],
	});
	
	/**** LIVE SEARCH URL  ****/
	if( live_search_active ==  1 ) {
		jQuery('#searchform #s').liveSearch({
				url: ''+live_search_url+'?ajax=on&s='
		});
	}
	
	/**** KNOWLEDGEBASE  ****/
	
	jQuery('.masonry-vc-grid-four').masonry({
	  itemSelector: '.masonry-item',
	  columnWidth: 200,
	  columnWidth: '.col-md-4',
	  percentPosition: true
	});
	
	jQuery('.masonry-vc-grid-six').masonry({
	  itemSelector: '.masonry-item',
	  columnWidth: 200,
	  columnWidth: '.col-md-6',
	  percentPosition: true
	});
	
	jQuery('.masonry-grid').masonry({
	  itemSelector: '.masonry-item',
	  columnWidth: '.col-md-4',
	  percentPosition: true
	});
	
	jQuery('.masonry-grid-without-sidebar').masonry({
	  itemSelector: '.masonry-item',
	  columnWidth: '.col-md-6',
	  percentPosition: true
	});
	
	jQuery('.masonry-grid-inner').masonry({
	  itemSelector: '.masonry-item',
	  columnWidth: '.col-md-6',
	  percentPosition: true
	});
	
	
	jQuery(".owl-portfolio").owlCarousel({
	  //navigation : true, // Show next and prev buttons
	  slideSpeed : 300,
	  paginationSpeed : 400,
	  singleItem:true,
	  navigation:false,
	});
	
	
	/**** HOME PAGE CAROUSEL  ****/
	
	jQuery('.home-testo-desk').owlCarousel({
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
	  navigation :false,
	  items : 1, 
	});
	
	
	/**** LOAD MORE  ****/
	var loada = 1;
	jQuery(".ajax_load_more_post a").on("click", function(b) {
		 b.preventDefault();
		 var c = jQuery(this).attr("href"),
		     d = ".projects_holder",
			 g = jQuery(".projects_holder .filler").length,
			 e = ".portfolio_paging .ajax_load_more_post a",
			 f = jQuery(e).attr("href"),
		     h = jQuery(".portfolio_paging"),
             i = jQuery(".portfolio_paging_loading");
			 h.hide(), i.show(), jQuery.get(c + "", function(b) {
				 jQuery(".projects_holder .filler").slice(-g).remove();
				 var c = jQuery(d, b).wrapInner("").html();
				 f = jQuery(e, b).attr("href"), jQuery(d, b).waitForImages(function() {
					jQuery("div.portfolio-section-records:last").after(c);
					jQuery(".projects_holder").isotope("reloadItems").isotope();
					jQuery(".ajax_load_more_post").attr("rel") > loada ? jQuery(".ajax_load_more_post a").attr("href", f) : jQuery(".portfolio_paging").remove();
					h.show(); i.hide();
				 })
			 }), loada++
	})
	
	
	/**** IMPRESSION  ****/
	
	var imp_postIDs = '';
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
	
	
});



jQuery(window).load(function(){
	
	"use strict";
	initmanualDropDownMenu();
	
	/**** PORTFOLIO  ****/
	
	// Filter Masnory
	var $masnorygrid = jQuery('.isotope-container-masnory').isotope({
		itemSelector: '.element-item',
	});
	jQuery('.filter-portfolio-group-masnory').on( 'click', 'li', function() {  
		var $filter  = jQuery(this),
			selector = $filter.attr('data-filter-masnory');
		
		$masnorygrid.imagesLoaded( function() {		
			$masnorygrid.isotope({
				filter: selector
			});
		});
		jQuery(this).addClass('selected').siblings().removeClass('selected');
	});
	
	
	// Filter fitRows
	var $grid = jQuery('.isotope-container').isotope({
		itemSelector: '.element-item',
		layoutMode: 'fitRows'
	});
	jQuery('.filter-portfolio-group').on( 'click', 'li', function() {  
		var $filter  = jQuery(this),
			selector = $filter.attr('data-filter');
		
		$grid.imagesLoaded( function() {	
			$grid.isotope({
				filter: selector
			});
		});
		jQuery(this).addClass('selected').siblings().removeClass('selected');
	});
	
	
	/**** DOCUMENTATION  ****/
	if( doc_cookie_sh == 1 && doc_catpage_active == 1 ) { jQuery("#list-manual").mCustomScrollbar("scrollTo", ".doc-active"); }
	
});


function initmanualDropDownMenu() { 
    "use strict";
	jQuery(".navbar ul.nav.navbar-nav li").on('mouseenter mouseleave', function (e) {
       
	   	var window_width = jQuery(window).width(); 
		if( window_width > 767 ) {
			if (jQuery('ul', this).length) { 
				var elm = jQuery('ul:first', this);
				var off = elm.offset();
				var l = off.left;
				var w = elm.width();
				var docH = jQuery(".navbar").height();
				var docW = jQuery(".navbar").width();
				var isEntirelyVisible = (l + w <= docW);
				if (!isEntirelyVisible) {
					jQuery(this).addClass('menu-edge');
				} else {
					jQuery(this).removeClass('menu-edge');
				}
			}
	   }
		
    });
}



/**************
**  FUN ACT  **
***************/
jQuery(function($) {
	"use strict";
	$('.funact-main-div').appear(function() { 
		$('.timer').countTo();
	},{accX: 90, accY: 100});

});