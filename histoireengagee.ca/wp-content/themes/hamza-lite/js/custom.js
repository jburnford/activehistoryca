jQuery(function($){  

  $('.testimonial-slider').bxSlider({
   auto:true,
   controls:'true',
   pager: false   
  });
  
    if(hamza_lite_data.option == 'true'){
        var slider_pager =  true;  
    }else{
        var slider_pager = false;
    }
    
    if(hamza_lite_data.auto == 'true'){
        var slider_auto =  true;  
    }else{
        var slider_auto = false;
    }
    $('.bx-slider').bxSlider({	
        mode: hamza_lite_data.mode,
		speed: hamza_lite_data.speed,				
        pager: slider_pager,
		controls: false,				
		auto : slider_auto,
		pause: hamza_lite_data.pause				
    });
	
    
var winwidth = $(window).width();
  if(winwidth<=992 && winwidth>640){var maxsl = 2; swidth = 290;}
  else if(winwidth<=640){var maxsl = 1; swidth = 290;}
  else{var maxsl = 3; swidth = 380;}
  $('.service-slider').bxSlider({
   auto:true,
   controls:false,
   pager: true,
   moveSlides:1,
   minSlides: 1,
   maxSlides: maxsl,
   slideWidth: swidth,
   slideMargin: 10

  });

  $(window).resize(function(){
    $('.slider-caption').each(function(){
    var cap_height = $(this).actual( 'outerHeight' );
    $(this).css('margin-top',-(cap_height/2));
    });
    }).resize();
    
  $('.caption-description').each(function(){
    $(this).find('a').appendTo($(this).parent('.ak-container'));
  });
  

  $('.commentmetadata').after('<div class="clear"></div>');

  $('.menu-toggle').click(function(){
    $('#site-navigation .menu').slideToggle('slow');
  });
    
    $('.gallery .gallery-item a').each(function(){
        $(this).addClass('fancybox-gallery').attr('data-lightbox-gallery','gallery');
    });
    
    $(".fancybox-gallery").nivoLightbox();


  $('.search-icon .fa-search').click(function(){
    $('.ak-search').fadeToggle();
  });

  $(window).bind('load',function(){
  $('.slider-wrap .slides').each(function(){
    $(this).prepend('<div class="overlay"></div>');
  });
  });
  
  $('.service-section .bx-pager-item:first-child').css('width', '26');
 });