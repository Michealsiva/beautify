(function( $ ) {
	'use strict';

		/* Animation count  */
		$(document).scroll(function() {
			var countClass = $('.stat-container,.skill-circle,.skill-container');
			if (countClass.length) {
		      var divPos =  countClass.offset().top;
		      var topOfWindow = $(document).scrollTop();
		       if( divPos < topOfWindow+500) {
			        $(document).unbind('scroll');
			        $('.stat,.skill-nos,.count').each(function () {
			          var $this = $(this);
			          jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
			            duration: 3000,
			            easing: 'swing',
			            step: function () {
			              $this.text(Math.ceil(this.Counter));
			            }
			          });
			        });        
			    }
			}
		});

		
		/* SCROLL TO TOP */
		//Check to see if the window is top if not then display button
		$(window).scroll(function(){ 
			if ($(this).scrollTop() > 100) {
				$('.scroll-to-top').fadeIn();
			} else {
				$('.scroll-to-top').fadeOut();          
			}
		});      

		$(".design-details a").on("click", function() {
		  var id = $(this).attr('href');
		  $('.active').removeClass('active'); // remove existing active
		  $(id).addClass('active'); // set current link as active
		});
		$(".design-details a").on("click", function() {
			$('.design-details.active').removeClass('active');
			$(this).parent().addClass('active');
		});

		$(".design-details a[href^=#]").on("click", function(e) {
		    e.preventDefault();
		    history.pushState({}, "", this.href);
		});
 
		//Click event to scroll to top
		$('.scroll-to-top').click(function(){
			$('html, body').animate({scrollTop : 0},800);
			return false;
		});  


	    $('.masonry-blog-content').imagesLoaded(function () {
            $('.masonry-blog-content').masonry({
                itemSelector: '.masonry-post',
                gutter: 0, 
                transitionDuration: 0,
            }).masonry('reloadItems');
        });     
        $('.flex-caption a').wrap('<p class="btn-slider"></p>');        

		Grid.init();        

		   if( $.fn.flexslider ) {
			$('.recent-posts-carousel').flexslider({
				animation: "slide",
				animationLoop: false,
				itemWidth: 350,
				itemMargin: 5
			});

			$('.recent-posts-slider,.free-flex').flexslider();	


			$('.testimonials').flexslider({  
		      animation: 'slide',
		      animationLoop: true,
		      controlNav: true, 
			});    

			$('#gallery-images').flexslider({
		      animation: 'slide',
		      animationLoop: true,
		      controlNav: false,
		      itemWidth: 170,
		    });	

			$('.recent-work').flexslider({
				animation: "slide",
				animationLoop: true,
				controlNav: false,
				itemWidth: 300,
				itemMargin: 5
			});
		}

		var icons = {
			header: "fa fa-plus",
			activeHeader: "fa fa-minus"
		};

		//Accordion
		if( $.fn.accordion ) {
			$( ".accordion" ).accordion({
				heightStyle: "content",
				icons: icons
			});
		}

		$('.alert-close').click(function(evt){
			evt.preventDefault();
			$(this).parent().fadeOut('slow', function(){ $(this).remove();});
		});  

		$('.toggle-title').click(function() {

			$(this).next().toggle('slow');
			var icn = $('.icn i',this).attr('class');
			if( icn == 'fa fa-minus' ) {
				$('.icn i',this).attr('class','fa fa-plus');
			} else {
				$('.icn i',this).attr('class','fa fa-minus');
			}
			//$('.icn',this).html(icn);

		});

		if( $.fn.tabulous ) {
			$('.tabs').tabulous();
		}

		if( $.fn.eislideshow ) {
			$('.ei-slider').eislideshow({
				easing    : 'easeOutExpo',
				titleeasing : 'easeOutExpo',
				titlespeed  : 1200
			});
			
		}

		if( $.fn.prettyPhoto ) {
			$("a[rel^='prettyPhoto']").prettyPhoto();
		}

		if( $.fn.slicknav ) {
			$('#site-navigation ul.menu').slicknav();
		}

		var imgSizer = {
			Config : {
				imgCache : []
				,spacer : "/path/to/your/spacer.gif"
			}

			,collate : function(aScope) {
				var isOldIE = (document.all && !window.opera && !window.XDomainRequest) ? 1 : 0;
				if (isOldIE && document.getElementsByTagName) {
					var c = imgSizer;
					var imgCache = c.Config.imgCache;

					var images = (aScope && aScope.length) ? aScope : document.getElementsByTagName("img");
					for (var i = 0; i < images.length; i++) {
						images[i].origWidth = images[i].offsetWidth;
						images[i].origHeight = images[i].offsetHeight;

						imgCache.push(images[i]);
						c.ieAlpha(images[i]);
						images[i].style.width = "100%";
					}

					if (imgCache.length) {
						c.resize(function() {
							for (var i = 0; i < imgCache.length; i++) {
								var ratio = (imgCache[i].offsetWidth / imgCache[i].origWidth);
								imgCache[i].style.height = (imgCache[i].origHeight * ratio) + "px";
							}
						});
					}
				}
			}

			,ieAlpha : function(img) {  
				var c = imgSizer;
				if (img.oldSrc) {
					img.src = img.oldSrc;
				}
				var src = img.src;
				img.style.width = img.offsetWidth + "px";
				img.style.height = img.offsetHeight + "px";
				img.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + src + "', sizingMethod='scale')"
				img.oldSrc = src;
				img.src = c.Config.spacer;
			}

			// Ghettomodified version of Simon Willison's addLoadEvent() -- http://simonwillison.net/2004/May/26/addLoadEvent/
			,resize : function(func) {
				var oldonresize = window.onresize;
				if (typeof window.onresize != 'function') {
					window.onresize = func;
				} else {
					window.onresize = function() {
						if (oldonresize) {
							oldonresize();
						}
						func();
					}
				}
			}
		}

		addLoadEvent(function() {
			imgSizer.collate();
		});

		function addLoadEvent(func) {
			var oldonload = window.onload;
			if (typeof window.onload != 'function') {
				window.onload = func;
			} else {
				window.onload = function() {
					if (oldonload) {
						oldonload();
					}
					func();
				}
			}
		}

		/* Isotope Implementation */

		var $container = $('#portfolio');  

        /* Isotope Implementation with masonry  */

	    if(! $container.hasClass("masonry-portfolio") ) {
	      $container.imagesLoaded(function() {      
	        $container.isotope({
	          // options
	          itemSelector : '.item',
	          layoutMode : 'fitRows'        
	        });
	      });  
	    } else{
			$container.imagesLoaded(function() {   
				$container.isotope({
					// options
					itemSelector : '.item',
					layoutMode : 'masonry'
				});
			}); 
	    }

		var $optionSets = $('#filters .filter-options'),
			$optionLinks = $optionSets.find('a');
		console.log($optionSets);
		$optionLinks.click(function(){
			var $this = $(this);
			// don't proceed if already selected
			if ( $this.hasClass('selected') ) {
				return false;
			}
			var $optionSet = $this.parents('.filter-options');
			$optionSet.find('.selected').removeClass('selected');
			$this.addClass('selected');

			// make option object dynamically, i.e. { filter: '.my-filter-class' }
			var options = {},
				key = $optionSet.attr('data-option-key'),
				value = $this.attr('data-option-value');
			// parse 'false' as false boolean
			value = value === 'false' ? false : value;
			options[ key ] = value;
			if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
				// changes in layout modes need extra logic
				changeLayoutMode( $this, options )
			} else {
				// otherwise, apply new options
				$container.isotope( options );
			}

			return false;
		});
		
	$('.portfolio2col').hover(function() {
        $(this).addClass('hover');
        $('.portfolio2col_overlay', this).stop(true, false, true).fadeIn();
        $('.portfolio2col_overlay .overlay_icon', this).stop(true, false, true).animate({ left: '42%' }, 300);
      },function(){
        $(this).removeClass('hover');
        $('.portfolio2col_overlay', this).stop(true, false, true).fadeOut();
        $(this).find('.portfolio2col_overlay .overlay_icon').stop(true, false, true).animate({ left: '142%' }, 100, function() {
        $(this).css('left', '-42%');
        });
    });


})( jQuery );


  

