/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

(function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		});
	});

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		});
	});

	//Update site background color...
	wp.customize( 'main_content_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.main-content, .home-section, .news-section').css('background-color', newval );
		} );
	} );
	
} )( jQuery );
