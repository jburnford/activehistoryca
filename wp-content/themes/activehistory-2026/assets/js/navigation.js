/**
 * Navigation and search functionality
 *
 * @package ActiveHistory_2026
 */
( function() {
    'use strict';

    // Mobile menu toggle
    const menuToggle = document.querySelector( '.menu-toggle' );
    const mobileNav = document.getElementById( 'mobile-navigation' );

    if ( menuToggle && mobileNav ) {
        menuToggle.addEventListener( 'click', function() {
            const expanded = this.getAttribute( 'aria-expanded' ) === 'true';
            this.setAttribute( 'aria-expanded', ! expanded );
            mobileNav.classList.toggle( 'is-active' );
        } );
    }

    // Search overlay
    const searchToggle = document.querySelector( '.search-toggle' );
    const searchOverlay = document.querySelector( '.search-overlay' );
    const searchClose = document.querySelector( '.search-overlay__close' );
    const searchInput = document.querySelector( '.search-overlay__input' );

    if ( searchToggle && searchOverlay ) {
        searchToggle.addEventListener( 'click', function() {
            searchOverlay.classList.add( 'is-active' );
            if ( searchInput ) {
                searchInput.focus();
            }
        } );

        if ( searchClose ) {
            searchClose.addEventListener( 'click', function() {
                searchOverlay.classList.remove( 'is-active' );
            } );
        }

        // Close on Escape key
        document.addEventListener( 'keydown', function( e ) {
            if ( e.key === 'Escape' && searchOverlay.classList.contains( 'is-active' ) ) {
                searchOverlay.classList.remove( 'is-active' );
            }
        } );
    }
} )();
