<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'beautify_pro';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'beautify_pro' ),
				'background-image'      => esc_attr__( 'Background Image', 'beautify_pro' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'beautify_pro' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'beautify_pro' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'beautify_pro' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'beautify_pro' ),
				'inherit'               => esc_attr__( 'Inherit', 'beautify_pro' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'beautify_pro' ),
				'cover'                 => esc_attr__( 'Cover', 'beautify_pro' ),
				'contain'               => esc_attr__( 'Contain', 'beautify_pro' ),
				'background-size'       => esc_attr__( 'Background Size', 'beautify_pro' ),
				'fixed'                 => esc_attr__( 'Fixed', 'beautify_pro' ),
				'scroll'                => esc_attr__( 'Scroll', 'beautify_pro' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'beautify_pro' ),
				'left-top'              => esc_attr__( 'Left Top', 'beautify_pro' ),
				'left-center'           => esc_attr__( 'Left Center', 'beautify_pro' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'beautify_pro' ),
				'right-top'             => esc_attr__( 'Right Top', 'beautify_pro' ),
				'right-center'          => esc_attr__( 'Right Center', 'beautify_pro' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'beautify_pro' ),
				'center-top'            => esc_attr__( 'Center Top', 'beautify_pro' ),
				'center-center'         => esc_attr__( 'Center Center', 'beautify_pro' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'beautify_pro' ),
				'background-position'   => esc_attr__( 'Background Position', 'beautify_pro' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'beautify_pro' ),
				'on'                    => esc_attr__( 'ON', 'beautify_pro' ),
				'off'                   => esc_attr__( 'OFF', 'beautify_pro' ),
				'all'                   => esc_attr__( 'All', 'beautify_pro' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'beautify_pro' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'beautify_pro' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'beautify_pro' ),
				'greek'                 => esc_attr__( 'Greek', 'beautify_pro' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'beautify_pro' ),
				'khmer'                 => esc_attr__( 'Khmer', 'beautify_pro' ),
				'latin'                 => esc_attr__( 'Latin', 'beautify_pro' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'beautify_pro' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'beautify_pro' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'beautify_pro' ),
				'arabic'                => esc_attr__( 'Arabic', 'beautify_pro' ),
				'bengali'               => esc_attr__( 'Bengali', 'beautify_pro' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'beautify_pro' ),
				'tamil'                 => esc_attr__( 'Tamil', 'beautify_pro' ),
				'telugu'                => esc_attr__( 'Telugu', 'beautify_pro' ),
				'thai'                  => esc_attr__( 'Thai', 'beautify_pro' ),
				'serif'                 => _x( 'Serif', 'font style', 'beautify_pro' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'beautify_pro' ),
				'monospace'             => _x( 'Monospace', 'font style', 'beautify_pro' ),
				'font-family'           => esc_attr__( 'Font Family', 'beautify_pro' ),
				'font-size'             => esc_attr__( 'Font Size', 'beautify_pro' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'beautify_pro' ),
				'line-height'           => esc_attr__( 'Line Height', 'beautify_pro' ),
				'font-style'            => esc_attr__( 'Font Style', 'beautify_pro' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'beautify_pro' ),
				'top'                   => esc_attr__( 'Top', 'beautify_pro' ),
				'bottom'                => esc_attr__( 'Bottom', 'beautify_pro' ),
				'left'                  => esc_attr__( 'Left', 'beautify_pro' ),
				'right'                 => esc_attr__( 'Right', 'beautify_pro' ),
				'center'                => esc_attr__( 'Center', 'beautify_pro' ),
				'justify'               => esc_attr__( 'Justify', 'beautify_pro' ),
				'color'                 => esc_attr__( 'Color', 'beautify_pro' ),
				'add-image'             => esc_attr__( 'Add Image', 'beautify_pro' ),
				'change-image'          => esc_attr__( 'Change Image', 'beautify_pro' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'beautify_pro' ),
				'add-file'              => esc_attr__( 'Add File', 'beautify_pro' ),
				'change-file'           => esc_attr__( 'Change File', 'beautify_pro' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'beautify_pro' ),
				'remove'                => esc_attr__( 'Remove', 'beautify_pro' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'beautify_pro' ),
				'variant'               => esc_attr__( 'Variant', 'beautify_pro' ),
				'subsets'               => esc_attr__( 'Subset', 'beautify_pro' ),
				'size'                  => esc_attr__( 'Size', 'beautify_pro' ),
				'height'                => esc_attr__( 'Height', 'beautify_pro' ),
				'spacing'               => esc_attr__( 'Spacing', 'beautify_pro' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'beautify_pro' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'beautify_pro' ),
				'light'                 => esc_attr__( 'Light 200', 'beautify_pro' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'beautify_pro' ),
				'book'                  => esc_attr__( 'Book 300', 'beautify_pro' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'beautify_pro' ),
				'regular'               => esc_attr__( 'Normal 400', 'beautify_pro' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'beautify_pro' ),
				'medium'                => esc_attr__( 'Medium 500', 'beautify_pro' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'beautify_pro' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'beautify_pro' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'beautify_pro' ),
				'bold'                  => esc_attr__( 'Bold 700', 'beautify_pro' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'beautify_pro' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'beautify_pro' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'beautify_pro' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'beautify_pro' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'beautify_pro' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'beautify_pro' ),
				'add-new'           	=> esc_attr__( 'Add new', 'beautify_pro' ),
				'row'           		=> esc_attr__( 'row', 'beautify_pro' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'beautify_pro' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'beautify_pro' ),
				'back'                  => esc_attr__( 'Back', 'beautify_pro' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'beautify_pro' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'beautify_pro' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'beautify_pro' ),
				'none'                  => esc_attr__( 'None', 'beautify_pro' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'beautify_pro' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'beautify_pro' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'beautify_pro' ),
				'initial'               => esc_attr__( 'Initial', 'beautify_pro' ),
				'select-page'           => esc_attr__( 'Select a Page', 'beautify_pro' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'beautify_pro' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'beautify_pro' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'beautify_pro' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'beautify_pro' ),
			);

			// Apply global changes from the kirki/config filter.
			// This is generally to be avoided.
			// It is ONLY provided here for backwards-compatibility reasons.
			// Please use the kirki/{$config_id}/l10n filter instead.
			$config = apply_filters( 'kirki/config', array() );
			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			// Apply l10n changes using the kirki/{$config_id}/l10n filter.
			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
