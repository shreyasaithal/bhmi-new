/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function ( $ ) {
    "use strict";
    wp.customize( 'header-main-menu-style', function ( value ) {
        value.bind( function ( to ) {
            $( '#header.header' )
                .removeClass( 'simple-menu' )
                .removeClass( 'underline-menu-style' )
                .removeClass( 'anim-underline-menu-style' )
                .addClass( to );
        } );
        value.bind( function ( to ) {
        $( 'body' )
                .removeClass( 'simple-menu' )
                .removeClass( 'underline-menu-style' )
                .removeClass( 'anim-underline-menu-style' )
                .addClass( to );
        } );
    } );
} )( jQuery );
