!function(t){"use strict";t(document).scroll(function(){var o=t(".stat-container,.skill-circle,.skill-container");if(o.length){o.offset().top<t(document).scrollTop()+500&&(t(document).unbind("scroll"),t(".stat,.skill-nos,.count").each(function(){var o=t(this);jQuery({Counter:0}).animate({Counter:o.text()},{duration:3e3,easing:"swing",step:function(){o.text(Math.ceil(this.Counter))}})}))}}),t(window).scroll(function(){t(this).scrollTop()>100?t(".scroll-to-top").fadeIn():t(".scroll-to-top").fadeOut()}),t(".design-details a").on("click",function(){var o=t(this).attr("href");t(".active").removeClass("active"),t(o).addClass("active")}),t(".design-details a").on("click",function(){t(".design-details.active").removeClass("active"),t(this).parent().addClass("active")}),t(".design-details a[href^=#]").on("click",function(t){t.preventDefault(),history.pushState({},"",this.href)}),t(".scroll-to-top").click(function(){return t("html, body").animate({scrollTop:0},800),!1}),t(".masonry-blog-content").imagesLoaded(function(){t(".masonry-blog-content").masonry({itemSelector:".masonry-post",gutter:0,transitionDuration:0}).masonry("reloadItems")}),t(".flex-caption a").wrap('<p class="btn-slider"></p>'),Grid.init(),t.fn.flexslider&&(t(".recent-posts-carousel").flexslider({animation:"slide",animationLoop:!1,itemWidth:350,itemMargin:5}),t(".recent-posts-slider,.free-flex").flexslider(),t(".testimonials").flexslider({animation:"slide",animationLoop:!0,controlNav:!0}),t("#gallery-images").flexslider({animation:"slide",animationLoop:!0,controlNav:!1,itemWidth:170}),t(".recent-work").flexslider({animation:"slide",animationLoop:!0,controlNav:!1,itemWidth:300,itemMargin:5}));var o={header:"fa fa-plus",activeHeader:"fa fa-minus"};t.fn.accordion&&t(".accordion").accordion({heightStyle:"content",icons:o}),t(".alert-close").click(function(o){o.preventDefault(),t(this).parent().fadeOut("slow",function(){t(this).remove()})}),t(".toggle-title").click(function(){t(this).next().toggle("slow"),"fa fa-minus"==t(".icn i",this).attr("class")?t(".icn i",this).attr("class","fa fa-plus"):t(".icn i",this).attr("class","fa fa-minus")}),t.fn.tabulous&&t(".tabs").tabulous(),t.fn.eislideshow&&t(".ei-slider").eislideshow({easing:"easeOutExpo",titleeasing:"easeOutExpo",titlespeed:1200}),t.fn.prettyPhoto&&t("a[rel^='prettyPhoto']").prettyPhoto(),t.fn.slicknav&&t("#site-navigation ul.menu").slicknav();var e={Config:{imgCache:[],spacer:"/path/to/your/spacer.gif"},collate:function(t){if((!document.all||window.opera||window.XDomainRequest?0:1)&&document.getElementsByTagName){for(var o=e,i=o.Config.imgCache,n=t&&t.length?t:document.getElementsByTagName("img"),a=0;a<n.length;a++)n[a].origWidth=n[a].offsetWidth,n[a].origHeight=n[a].offsetHeight,i.push(n[a]),o.ieAlpha(n[a]),n[a].style.width="100%";i.length&&o.resize(function(){for(var t=0;t<i.length;t++){var o=i[t].offsetWidth/i[t].origWidth;i[t].style.height=i[t].origHeight*o+"px"}})}},ieAlpha:function(t){var o=e;t.oldSrc&&(t.src=t.oldSrc);var i=t.src;t.style.width=t.offsetWidth+"px",t.style.height=t.offsetHeight+"px",t.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+i+"', sizingMethod='scale')",t.oldSrc=i,t.src=o.Config.spacer},resize:function(t){var o=window.onresize;"function"!=typeof window.onresize?window.onresize=t:window.onresize=function(){o&&o(),t()}}};!function(t){var o=window.onload;"function"!=typeof window.onload?window.onload=t:window.onload=function(){o&&o(),t()}}(function(){e.collate()});var i=t("#portfolio");i.hasClass("masonry-portfolio")?i.imagesLoaded(function(){i.isotope({itemSelector:".item",layoutMode:"masonry"})}):i.imagesLoaded(function(){i.isotope({itemSelector:".item",layoutMode:"fitRows"})});var n=t("#filters .filter-options"),a=n.find("a");console.log(n),a.click(function(){var o=t(this);if(o.hasClass("selected"))return!1;var e=o.parents(".filter-options");e.find(".selected").removeClass("selected"),o.addClass("selected");var n={},a=e.attr("data-option-key"),s=o.attr("data-option-value");return s="false"!==s&&s,n[a]=s,"layoutMode"===a&&"function"==typeof changeLayoutMode?changeLayoutMode(o,n):i.isotope(n),!1}),t(".portfolio2col").hover(function(){t(this).addClass("hover"),t(".portfolio2col_overlay",this).stop(!0,!1,!0).fadeIn(),t(".portfolio2col_overlay .overlay_icon",this).stop(!0,!1,!0).animate({left:"42%"},300)},function(){t(this).removeClass("hover"),t(".portfolio2col_overlay",this).stop(!0,!1,!0).fadeOut(),t(this).find(".portfolio2col_overlay .overlay_icon").stop(!0,!1,!0).animate({left:"142%"},100,function(){t(this).css("left","-42%")})})}(jQuery);