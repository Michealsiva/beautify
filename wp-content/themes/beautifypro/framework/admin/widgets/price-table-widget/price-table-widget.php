<?php
/*
Widget Name: Price Table 
Description: A powerful yet simple price table widget for your sidebars or Page Builder pages.
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
TODO: Same as SiteOrigin PriceTable Widget. Have to write my own
*/

class PriceTable_Widget extends SiteOrigin_Widget {  
	function __construct() {
		parent::__construct(  
			'price-table-widget',
			__('Price Table', 'framework'), 
			array(
				'description' => __('A simple Price Table.', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/price-table',
				'has_preview' => false,
			),
			array( 

			),
			false,
			plugin_dir_path(__FILE__).'../' 
		);
	}

	function initialize() {
		$this->register_frontend_scripts( 
			array(
				array(
					'pricetable-widget',
					Fw_WIDGETS_URI . 'price-table-widget/js/pricetable.min.js',
					array( 'jquery' )
				)
			)
		);
	}

	function initialize_form(){
		return array(
			'columns' => array(
				'type' => 'repeater',
				'label' => __('Columns', 'framework'),
				'item_name' => __('Column', 'framework'),
				'item_label' => array(
					'selector' => "[id*='columns-title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'featured' => array(
						'type' => 'checkbox',
						'label' => __('Featured', 'framework'),
					),
					'title' => array(
						'type' => 'text',
						'label' => __('Title', 'framework'),
					),
					'subtitle' => array(
						'type' => 'text',
						'label' => __('Subtitle', 'framework'),
					),

					'image' => array(
						'type' => 'media',
						'label' => __('Image', 'framework'),
					),

					'image_title' => array(
						'type' => 'text',
						'label' => __('Image title', 'framework'),
					),

					'image_alt' => array(
						'type' => 'text',
						'label' => __('Image alt text', 'framework'),
					),

					'price' => array(
						'type' => 'text',
						'label' => __('Price', 'framework'),
					),
					'per' => array(
						'type' => 'text',
						'label' => __('Per', 'framework'),
					),
					'button' => array(
						'type' => 'text',
						'label' => __('Button text', 'framework'),
					),
					'url' => array(
						'type' => 'link',
						'label' => __('Button URL', 'framework'),
					),
					'features' => array(
						'type' => 'repeater',
						'label' => __('Features', 'framework'),
						'item_name' => __('Feature', 'framework'),
						'item_label' => array(
							'selector' => "[id*='columns-features-text']",
							'update_event' => 'change',
							'value_method' => 'val'
						),
						'fields' => array(
							'text' => array(
								'type' => 'text',
								'label' => __('Text', 'framework'),
							),
							'hover' => array(
								'type' => 'text',
								'label' => __('Hover text', 'framework'),
							),
							'icon_new' => array(
								'type' => 'icon',
								'label' => __('Icon', 'framework'),
							),
							'icon_color' => array(
								'type' => 'color',
								'label' => __('Icon color', 'framework'),
							),  
							'icon_size' => array(
								'type'  => 'measurement',
								'label' => __( 'Icon Size', 'so-widgets-bundle' ),
							),
						),
					),
				),
			),

			'theme' => array(
				'type' => 'select',
				'label' => __('Price table theme', 'framework'),
				'options' => array(
					'default' => __('Theme Style', 'framework'),
					'atom' => __('Atom', 'framework'),
				),
			),

			'header_color' => array(
				'type' => 'color',
				'label' => __('Header color', 'framework'),
			),

			'featured_header_color' => array(
				'type' => 'color',
				'label' => __('Featured header color', 'framework'),
			),

			'button_color' => array(
				'type' => 'color',
				'label' => __('Button color', 'framework'),
			),

			'featured_button_color' => array(
				'type' => 'color',
				'label' => __('Featured button color', 'framework'),
			),

			'button_new_window' => array(
				'type' => 'checkbox',
				'label' => __('Open Button URL in a new window', 'framework'),
			),
		);
	}

	function get_column_classes($column, $i, $columns) {
		$classes = array();
		if($i == 0) $classes[] = 'ow-pt-first';
		if($i == count($columns) -1 ) $classes[] = 'ow-pt-last';
		if(!empty($column['featured'])) $classes[] = 'ow-pt-featured';

		if($i % 2 == 0) $classes[] = 'ow-pt-even';
		else $classes[] = 'ow-pt-odd';

		return implode(' ', $classes);
	}

	function column_image($column){
		$src = wp_get_attachment_image_src($column['image'], 'full');
		$img_attrs = array();
		if ( !empty( $column['image_title'] ) ) $img_attrs['title'] = $column['image_title'];
		if ( !empty( $column['image_alt'] ) ) $img_attrs['alt'] = $column['image_alt'];
		$attr_string = '';
		foreach ( $img_attrs as $attr => $val ) {
			$attr_string .= ' ' . $attr . '="' . esc_attr( $val ) . '"';
		}
		?><img src="<?php echo $src[0] ?>"<?php echo $attr_string ?>/> <?php
	}

	function get_template_name($instance) {
		return $this->get_style_name($instance);
	}

	function get_style_name($instance) {
		//if(empty($instance['theme'])) return 'atom';
		//return $instance['theme'];
		return 'atom';
	}

	/**
	 * Get the LESS variables for the price table widget.
	 *
	 * @param $instance
	 *
	 * @return array
	 */
	function get_less_variables($instance){
		$instance = wp_parse_args($instance, array(
			'header_color' => '',
			'featured_header_color' => '',
			'button_color' => '',
			'featured_button_color' => '',
		));

		$colors = array(
			'header_color' => $instance['header_color'],
			'featured_header_color' => $instance['featured_header_color'],
			'button_color' => $instance['button_color'],
			'featured_button_color' => $instance['featured_button_color'],
		);

		if( !class_exists('SiteOrigin_Widgets_Color_Object') ) require plugin_dir_path( SOW_BUNDLE_BASE_FILE ).'base/inc/color.php';

		if( !empty( $instance['button_color'] ) ) {
			$color = new SiteOrigin_Widgets_Color_Object( $instance['button_color'] );
			$color->lum += ($color->lum > 0.75 ? -0.5 : 0.8);
			$colors['button_text_color'] = $color->hex;
		}

		if( !empty( $instance['featured_button_color'] ) ) {
			$color = new SiteOrigin_Widgets_Color_Object( $instance['featured_button_color'] );
			$color->lum += ($color->lum > 0.75 ? -0.5 : 0.8);
			$colors['featured_button_text_color'] = $color->hex;
		}

		return $colors;
	}

	/**
	 * Modify the instance to use the new icon.
	 */
	function modify_instance($instance){
		if( empty( $instance['columns'] ) || !is_array($instance['columns']) ) return $instance;

		foreach( $instance['columns'] as &$column) {
			if( empty($column['features']) || !is_array($column['features']) ) continue;

			foreach($column['features'] as &$feature) {

				if( empty($feature['icon_new']) && !empty($feature['icon']) ) {
					$feature['icon_new'] = 'fontawesome-'.$feature['icon'];
				}

			}
		}

		return $instance;
	}
}

siteorigin_widget_register('price-table-widget', __FILE__, 'PriceTable_Widget');
