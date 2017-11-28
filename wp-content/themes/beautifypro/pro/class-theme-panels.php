<?php


/**
 * Integrates this theme with SiteOrigin Page Builder.
 *
 * @package beautify Pro
 * @since 1.0
 * @license GPL 2.0   
 */
    

/**    
 * Adds default page layouts
 *
 * Adds default page layouts to SiteOrigin Page Builder prebuilt layout section
 *
 * @param $layouts        
 */
if ( ! class_exists('Beautify_Pro_Prebuilt_Layouts')) { 

    class Beautify_Pro_Prebuilt_Layouts { 
        public function layouts($layouts) {     
           $layouts['default-home'] = array ( 
				'name' => __('Beautify Pro Home', 'beautify_pro'),
				'description' => __('Pre Built Layout for  home page', 'beautify_pro'),
				'filename' => get_template_directory() . '/pro/prebuilt/home.json',

			);

			$layouts['about-us'] = array(
				'name' => __('About Us Page', 'beautify_pro'),
				'description' => __( 'Pre Built layout for about us page', 'beautify_pro'),
				'filename' => get_template_directory() . '/pro/prebuilt/about-us.json',
			);

			$layouts['contact-us'] = array(
				'name' => __('Contact Us Page', 'beautify_pro'),
				'description' => __( 'Pre Built layout for contact us page', 'beautify_pro'),
				'filename' => get_template_directory() . '/pro/prebuilt/contact-us.json',
			);

			$layouts['faq'] = array (
				'name' => __('FAQ Page', 'beautify_pro'),
				'description' => __('Pre Built Layout for faq page', 'beautify_pro'),
				'filename' => get_template_directory() . '/pro/prebuilt/faq.json',
			);
    		return $layouts; 
        }     

    }

}


