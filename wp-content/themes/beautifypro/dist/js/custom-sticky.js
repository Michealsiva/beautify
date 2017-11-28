(function($){
	// Sticky Header Options 
			 
		$(window).scroll(function() {
		if ($(this).scrollTop() > 1){  
		    $('.nav-wrap').addClass("sticky-header");
		  }
		  else{
		    $('.nav-wrap').removeClass("sticky-header");
		  }
		});

})(jQuery);  