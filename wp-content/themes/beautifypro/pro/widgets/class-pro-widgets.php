<?php

if ( ! class_exists( 'Beautify_Pro_Widgets' ) ) {

	class Beautify_Pro_Widgets {

	    /* Inclue All Widget folders */
	    public function Beautify_Pro_get_widgets_folder( $folders ) {
	    	$sow_path = WP_PLUGIN_DIR . '/so-widgets-bundle/widgets/';
			$current_settings = get_option( 'siteorigin_panels_settings', array() );
			/* if( empty($current_settings['widget_bundle_widgets']) ) {
				if( $sow_path === $folders[0] ) {
				   unset($folders[0]);    
			    }   
			} */   
			 
			$folders[] = get_template_directory() . '/pro/widgets/';
			return $folders;
		} 

	    /* Site Origin Widget Bundle Webulous widgets Group & Tab */
		public function Beautify_Pro_add_widgets_group($widgets) {
				$beautify_pro_widgets = array(
				    'ThemePro_Process_Details_Widget',
				);
				foreach($beautify_pro_widgets as $beautify_pro_widget) {
					if( isset( $widgets[$beautify_pro_widget] ) ) {
						$widgets[$beautify_pro_widget]['groups'] = array('theme');
					}
				} 
				return $widgets;
		}   
    

		public function Beautify_Pro_filter_active_widgets($active){
			$active_widgets = array(
				'themepro-process-details-widget',
			);
			
			foreach ($active_widgets as $value ) {
			   $active[$value] = true;
			} 
		   
		    return $active;
		}   

	}
	
}


