( function( $ ) {
	$(function() {
		/*
		 * This code is based on Theme Foundry's "Make" theme
		 * Make WordPress Theme, Copyright 2014 The Theme Foundry
		 * Make is distributed under the terms of the GNU GPL
		 */
         
		docs = $('<a class="beautify-pro-docs doc"></a>')
			.attr('href','https://webulousthemes.com/documentation/') 
			.attr('target','_blank')
			.text('Documentation');

		support = $('<a class="beautify-pro-docs question"></a>')
			.attr('href','http://www.webulousthemes.com/submit-support-ticket/')
			.attr('target','_blank')
			.text('Ask a Question');

		$('#customize-info .preview-notice').append(docs);
		$('#customize-info .preview-notice').append(support);

		$('.beautify-pro-docs').on('click',function(e){
			e.stopPropagation();
		});
		
    });
} )( jQuery );  