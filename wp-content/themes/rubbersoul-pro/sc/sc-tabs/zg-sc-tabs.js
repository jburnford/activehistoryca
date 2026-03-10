/*Tabs*/

jQuery(document).ready(function() {
	
	jQuery(".contenido_tab").appendTo("#contenidos");
	jQuery(".contenido_tab").hide(); //Ocultar capas
	jQuery("ul.tabs li:first").addClass("t-activa").show(); //Activar primera pestaña
	//jQuery(".activa a").css('color', '#0688B7');
	jQuery(".contenido_tab:first").show(); //Mostrar contenido primera pestaña

	// Sucesos al hacer click en una pestaña
	jQuery("ul.tabs li").click(function() {
		var font_color = jQuery(".contenedor_tab").css("color");
		var tab_activa = jQuery(this).find("a").attr("href"); //Leer el valor de href para identificar la pestaña activa 
		
		jQuery("ul.tabs li").removeClass("t-activa"); //Borrar todas las clases "activa"
		jQuery("ul.tabs li a").css('color', 'font_color');
		jQuery(this).addClass("t-activa"); //Añadir clase "activa" a la pestaña seleccionada
		jQuery(".contenido_tab").hide(); //Ocultar todo el contenido de la pestaña
		jQuery(tab_activa).show();
		return false;
	});
	
});