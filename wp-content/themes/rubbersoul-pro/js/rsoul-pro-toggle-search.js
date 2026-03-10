// JavaScript Document

jQuery(document).ready(function() {
	jQuery(".search-top-bar #btn-search").hide();
	
	jQuery(".toggle-search").click(function() {
		jQuery(".wrapper-search-top-bar").toggle();
		jQuery(".wrapper-search-top-bar .txt-search").focus();
	});
	
	jQuery(".boton-menu-movil").click(function() {
		jQuery("#menu-movil").toggle();
	});
	
	jQuery(".ir-arriba").click(function() {
		jQuery('html, body').animate({ scrollTop: 0 }, 'fast');
	});
	
	// Mostrar/Ocultar botón 'Volver arriba'
	if (jQuery('.ir-arriba').length){
		var refScroll = jQuery('#main');
		var refScroll_offset = refScroll.offset();
		
		jQuery(window).on('scroll', function() {
			if(jQuery(window).scrollTop() > refScroll_offset.top) {
			  jQuery(".ir-arriba").show(500);
			} else {
			  jQuery(".ir-arriba").hide();
			}
		});
	}
	
});