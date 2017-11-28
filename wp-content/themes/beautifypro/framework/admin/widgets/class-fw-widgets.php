<?php

if ( ! class_exists( 'Fw_Widgets' ) ) {

	class Fw_Widgets {

	    /* Inclue All Widget folders */
	    public function Fw_get_widgets_folder( $folders ) {
			$sow_path = WP_PLUGIN_DIR . '/so-widgets-bundle/widgets/';
			$current_settings = get_option( 'siteorigin_panels_settings', array() );
			if( empty($current_settings['widget_bundle_widgets']) ) {
				if( $sow_path === $folders[0] ) {
				   unset($folders[0]);    
			    }  
			}
			 
			$folders[] = Fw_DIR . 'admin/widgets/';
			return $folders;
		}

	    /* Site Origin Widegt Bundle Webulous widgets Group & Tab */
		public function Fw_add_widgets_group($widgets) {
				$genex_widgets = array(
				        'Accordion_Widget',  
						'Alert_Widget',
						'Button_Widget',
						'Call_To_Action_Widget', 
						'Divider_Widget',
						'Dropcap_Widget', 
						'Text_Editor_Widget', 
						'Embed_Widget', 
						'Flexslider_Widget',
						'Gap_Widget',
						'Google_Font_Widget',
						'Heading_Widget',
						'Icon_Box_Widget',  
						'List_Widget',
						'Quote_Widget',
						'Recent_Work_Widget',
						'Recent_Posts_Widget',
						'Skills_Widget',
						'Stats_Widget',
						'Tabs_Widget',
						'Team_Member_Widget',
						'Testimonial_Widget',
						'Toggle_Widget',
						'Tooltip_Widget', 
						'Faq_Widget',
						'PriceTable_Widget',
						'Elastic_Slider_Widget',
						'Facebook_Widget',
						'Flickr_Widget',
						'Twitter_Widget',
						'Image_Widget',
						'Social_Network_Widget',
						'Google_Map_Widget',
				);
				foreach($genex_widgets as $genex_widget) {
					if( isset( $widgets[$genex_widget] ) ) {
						$widgets[$genex_widget]['groups'] = array('theme');
					}
				}
				return $widgets;
		}

		public function Fw_add_dialog_tabs($tabs){
				$tabs['genex_tab'] = array(
					'title' => __('Theme Widgets', 'framework'),    
					'filter' => array(
						'groups' => array('theme')
					)
				);  
			
				return $tabs;
		}

		public function Fw_add_dialog_tab($tabs) {
			unset($tabs['recommended']);

			if( class_exists('SiteOrigin_Widgets_Bundle') ) {  
				// Add a message about enabling more widgets
				$tabs['widgets_bundle']['message'] = preg_replace(
					array(
						'/1\{ *(.*?) *\}/',
						'/2\{ *(.*?) *\}/' 
					),
					array(
						'<a href="' . admin_url('plugins.php?page=so-widgets-plugins') . '">$1</a>',
						'<a href="' . admin_url('options-general.php?page=siteorigin_panels') . '">$1</a>'
					),
					__('You can enable the widget bundle widgets in 2{Page Builder Settings}. & Enable more widgets in the 1{Widgets Bundle settings}.', 'framework')
				);
		    }  

			return $tabs;
		}

	    /* add settings options */
		public function Fw_settings_options($fields) {
	        // The genex option fields   

			$fields['widgets']['fields']['widget_bundle_widgets'] = array(
				'type' => 'checkbox',
				'label' => __('Enable Widgets Bundle Widgets', 'framework'),
				'description' => __('Display all widgets from widget bundle', 'framework'),
			);

			return $fields;
		}

		public function Fw_filter_active_widgets($active){
			$active_widgets = array(
				    'accordion-widget',  
					'alert-widget',
					'button-widget',
					'call-to-action-widget', 
					'divider-widget',
					'dropcap-widget',
					'text-editor-widget',  
					'elastic-slider-widget',   
					'embed-widget',
					'facebook-widget',
					'faq-widget',
					'flexslider-widget',
					'flickr-widget',
					'gap-widget',   
					'google-font-widget',
					'google-map-widget',
					'heading-widget', 
					'icon-box-widget',
					'image-widget',
					'list-widget',
					'price-table-widget',  
					'quote-widget',
					'recent-work-widget',
					'recent-posts-widget',
					'skills-widget',
					'stats-widget',
					'tabs-widget',  
					'team-member-widget',    
					'testimonial-widget',
					'toggle-widget',
					'tooltip-widget',
					'twitter-widget',
					'social-network-widget'
			);
			
			foreach ($active_widgets as $value ) {
			   $active[$value] = true;
			}
		   
		    return $active;
		}

	}
	
}


