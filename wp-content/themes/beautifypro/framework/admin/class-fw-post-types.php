<?php
if ( ! class_exists( 'Fw_Post_Types' ) ) {
	class Fw_Post_Types {

		public function __construct(  ) {
			$this->flexslider();
			$this->elastic_slider();
		}

		public function flexslider(  ) {
			$flexslider = new \PostTypes\PostType('flexslider');
			$flexslider->taxonomy('flexslider_group');
		}

		public function elastic_slider(  ) {
			$elastic_slider = new \PostTypes\PostType('elastic_slider');
			$elastic_slider->taxonomy('elastic_slider_group');
		}


	}
}