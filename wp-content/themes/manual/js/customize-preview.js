/**
 * Live-update changed settings in real time in the Customizer preview.
 */

( function( $ ) {
	
	"use strict";
		   
	//Update header bar color
	wp.customize( 'header_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.navbar').css('background', newval );
		} );
	} );
	
	//Nav. text color
	wp.customize( 'header_nav_text_color', function( value ) { 
		value.bind( function( newval ) {
			$('.navbar-inverse .navbar-nav>li>a').css('color', newval );
		} );
	} );
	
	//Nav. background color
	wp.customize( 'header_nav_atv_text_bg_color', function( value ) { 
		value.bind( function( newval ) {
			$('.current-menu-item a').attr( 'style', 'background-color:' +  newval + '!important' );
			$('#navbar > ul > li > a:hover').attr( 'style', 'background:' +  newval + '!important' );
			$('#navbar ul li.has-sub:hover > a').attr( 'style', 'background-color:' +  newval + '!important' );
			$('#navbar ul li > ul').attr( 'style', 'background:' +  newval + '!important' );
		} );
	} );
	
	
	//Nav. text color
	wp.customize( 'header_nav_atv_text_color', function( value ) { 
		value.bind( function( newval ) {
			$('.navbar-inverse .navbar-nav>.active>a').attr( 'style', 'color:' +  newval + '!important' );
		} );
	} );
	
	//Nav. dropdown txt color
	wp.customize( 'header_nav_atv_dropdown_text_color', function( value ) { 
		value.bind( function( newval ) {
			$('#navbar ul li > ul li a').css('color', newval );
		} );
	} );
	

} )( jQuery );
