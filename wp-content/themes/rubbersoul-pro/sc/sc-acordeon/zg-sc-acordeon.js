/*Tabs*/

jQuery(document).ready(function() {
	//jQuery(".acordeon").find('br').remove();
	jQuery(".contenido_sec").hide(); //Ocultar capas

	// Sucesos al hacer click en una seccion
	jQuery("ul.secciones li").click(function() {
		if (jQuery(this).hasClass("activa")) {
			var sec_activa = jQuery(this).find("a").attr("href"); //Leer el valor de href para identificar la seccion activa 
			jQuery(sec_activa).slideUp();
			jQuery("ul.secciones li").removeClass("activa");
		}else{
			jQuery("ul.secciones li").removeClass("activa"); //Borrar todas las clases "activa"
			var font_color = jQuery(".acordeon").css("color");
			jQuery("ul.secciones li a").css('color', 'font_color');
			jQuery(this).addClass("activa"); //Añadir clase "activa" a la seccion seleccionada
			jQuery(".contenido_sec").slideUp(); //Ocultar todos los contenidos
			var sec_activa = jQuery(this).find("a").attr("href"); //Leer el valor de href para identificar la seccion activa 
			jQuery(sec_activa).css('border-top', 'none');
			jQuery(sec_activa).slideDown();
		}
		return false;
	});
	
});