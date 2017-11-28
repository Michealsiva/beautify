<?php

	/**
	 * Created by PhpStorm.
	 * User: venkat
	 * Date: 26/11/15
	 * Time: 11:10 AM
	 */
if( ! class_exists( 'Beautify_Pro_Theme_fields' ) ) {  
	class Beautify_Pro_Theme_fields {
	
      	
        /* Add Or Override the widegt fields */ 

        public function beautify_pro_extend_heading_form($form_options, $widget) {
	          $form_options['divider'] = array(
			  	'type' => 'checkbox',
		        'label' => __( 'Enable Heading Divider', 'beautify_pro' ),
		        'default' => true  
			  );  
			  $form_options['divider_color'] = array(
			  	'type' => 'color',
		        'label' => __( 'Choose Heading Divider Color', 'beautify_pro' ),
			  ); 
			  
			  return $form_options; 

        } 

        public function beautify_pro_extend_testimonial_form($form_options, $widget) {  
			  $form_options['bg_color'] = array(
			  	'type' => 'color',
		        'label' => __( 'Choose Testimonial Background Color', 'beautify_pro' ),
		        'default' => '#000' 
			  ); 
			  
			  return $form_options; 

        } 
     
	}
}

