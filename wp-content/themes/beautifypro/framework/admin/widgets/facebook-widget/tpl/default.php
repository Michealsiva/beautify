<?php

    $language = get_locale();  
	if ( ! $language ) {
		$language = 'en_EN';
	} 
 ?>
		
	<script>(function(d, s, id) {  
		 var js, fjs = d.getElementsByTagName(s)[0]; 
		 if (d.getElementById(id)) return;
		 js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/<?php echo $language; ?>/sdk.js#xfbml=1&version=v2.5";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));      
	</script> 

    <div id="fb-root"> 
	     <div class="fb-like-box" data-href="<?php echo $facebook_url; ?>" data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>" data-show-faces="true" data-stream="true" data-header="true"></div>
    </div>