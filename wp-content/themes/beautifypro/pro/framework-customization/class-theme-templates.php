<?php

	/**
	 * Created by PhpStorm.
	 * User: venkat
	 * Date: 26/11/15
	 * Time: 11:10 AM
	 */
if( ! class_exists( 'Beautify_Pro_Theme_templates' ) ) {  
	class Beautify_Pro_Theme_templates {
        public function beautify_pro_recent_post_template_file( $filename, $instance, $widget  ) {
           return get_stylesheet_directory() . '/pro/framework-customization/widgets/recentpost.php';  
        }
        public function beautify_pro_recent_work_template_file( $filename, $instance, $widget  ) {
           return get_stylesheet_directory() . '/pro/framework-customization/widgets/recent-work.php';  
        }
   		  public function beautify_pro_heading_template_file( $filename, $instance, $widget  ) {
           return get_stylesheet_directory() . '/pro/framework-customization/widgets/heading.php';  
        }
        public function beautify_pro_team_member_template_file( $filename, $instance, $widget  ) {
           return get_stylesheet_directory() . '/pro/framework-customization/widgets/team-member.php';  
        }
        public function beautify_pro_testimonial_template_file( $filename, $instance, $widget  ) {
           return get_stylesheet_directory() . '/pro/framework-customization/widgets/testimonial.php';  
        }
        public function beautify_pro_icon_box_template_file( $filename, $instance, $widget  ) {
           return get_stylesheet_directory() . '/pro/framework-customization/widgets/icon-box.php';  
        }
	}
}

         
