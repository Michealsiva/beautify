<?php

/* Site Origin widget bundle - default settings for recommended widgets & display teaser */
if( defined('SITEORIGIN_PANELS_BASE_FILE') ) { 
	$current_settings = get_option( 'siteorigin_panels_settings', array() );
	if(!isset($current_settings['display-teaser'])) {
		$current_settings['display-teaser'] = false;
	}
	if(!isset($current_settings['recommended-widgets'])) {
		$current_settings['recommended-widgets'] = false;   
	}

	update_option( 'siteorigin_panels_settings', $current_settings );   
}

 