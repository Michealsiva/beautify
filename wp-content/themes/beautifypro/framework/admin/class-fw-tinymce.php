<?php
if ( ! class_exists( 'Fw_TinyMCE' ) ) {
	class Fw_TinyMCE {


		public function display_kitchen_sink( $in ) {
			$in['wordpress_adv_hidden'] = FALSE;
			return $in;
		}

		/**
		 * Add TinyMCE Button
		 * @link https://shellcreeper.com/?p=1339
		 */
		public function editor_background_color(){
			/* Add the button/option in second row */
			add_filter( 'mce_buttons_2', array($this, 'editor_background_color_button'), 1, 2 ); // 2nd row
		}

		/**
		 * Modify 2nd Row in TinyMCE and Add Background Color After Text Color Option
		 * @link https://shellcreeper.com/?p=1339
		 */
		public function editor_background_color_button( $buttons, $id ){

			/* Only add this for content editor, you can remove this line to activate in all editor instance */
			//if ( 'content' != $id ) return $buttons;

			/* Add the button/option after 4th item */
			array_splice( $buttons, 4, 0, 'backcolor' );

			return $buttons;
		}

	}
}


