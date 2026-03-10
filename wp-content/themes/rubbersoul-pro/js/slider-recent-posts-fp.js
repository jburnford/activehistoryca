/*
Theme Name: RubberSoul Pro
Theme URI: http://galussothemes.com/wordpress-themes/rubbersoul-pro
Author: GalussoThemes
Author URI: http://galussothemes.com
*/

	var n = 0;
	jQuery(document).ready(function(){
		
		var n_imgs = jQuery(".entrada").length;
		jQuery(".slider-slide").show();
		jQuery(".entrada").hide();
		jQuery(".slider-nav-btn:first").addClass("slider-current-btn");
		jQuery(".entrada:first").show();
		
		setInterval(function(){
			n++;
			if (n >= n_imgs) {n = 0};
			jQuery(".entrada").hide();
			jQuery(".slider-nav-btn").removeClass("slider-current-btn");
			jQuery("#slider-nav-btn-" + n ).addClass("slider-current-btn");
			jQuery(".entrada").eq(n).fadeIn(2000);
		}, 5000);
		
		jQuery(".slider-nav-btn").click(function(event){
			event.preventDefault();
			var id = jQuery(this).find("a").attr("href");
			var cur_img = id;
			n = cur_img;
			jQuery(".entrada").hide();
			jQuery(".slider-nav-btn").removeClass("slider-current-btn");
			jQuery(this).addClass("slider-current-btn");
			jQuery(".entrada").eq(cur_img).show();
		});
		
	});