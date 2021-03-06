<?php
/*
Widget Name: Text Editor 
Description: A widget which allows editing of content using the TinyMCE editor.
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/  

class Text_Editor_Widget extends SiteOrigin_Widget {

	function __construct() {  

		parent::__construct(   
			'text-editor-widget',
			__('Text Editor', 'framework'),
			array(
				'description' => __('A rich-text, text editor.', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/editor',
				'has_preview' => false,
			),
			array(),
			false
		);
	}

	function initialize_form(){
		return array(
			'text' => array(
				'type' => 'tinymce',
				'rows' => 20
			),
			'autop' => array(
				'type' => 'checkbox',
				'default' => true,
				'label' => __('Automatically add paragraphs', 'framework'),
			),
		);
	}

	function unwpautop($string) {
		$string = str_replace("<p>", "", $string);
		$string = str_replace(array("<br />", "<br>", "<br/>"), "\n", $string);
		$string = str_replace("</p>", "\n\n", $string);

		return $string;
	}

	public function get_template_variables( $instance, $args ) {
		$instance = wp_parse_args(
			$instance,
			array(  'text' => '' )
		);

		$instance['text'] = $this->unwpautop( $instance['text'] );
		$instance['text'] = apply_filters( 'widget_text', $instance['text'] );

		// Run some known stuff
		if( !empty($GLOBALS['wp_embed']) ) {
			$instance['text'] = $GLOBALS['wp_embed']->autoembed( $instance['text'] );
		}
		if (function_exists('wp_make_content_images_responsive')) {
			$instance['text'] = wp_make_content_images_responsive( $instance['text'] );
		}
		if( $instance['autop'] ) {
			$instance['text'] = wpautop( $instance['text'] );
		}
		$instance['text'] = do_shortcode( shortcode_unautop( $instance['text'] ) );

		return array(
			'text' => $instance['text'],
		);
	}


	function get_style_name($instance) {
		// We're not using a style
		return false;
	}
}

siteorigin_widget_register( 'text-editor-widget', __FILE__, 'Text_Editor_Widget' );
