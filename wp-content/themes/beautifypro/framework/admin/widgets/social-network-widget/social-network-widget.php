<?php
/*
Widget Name: Social Network 
Description: Social Media Button Widget
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/
 

class Social_Network_Widget extends SiteOrigin_Widget {

	private $networks; 

	function __construct() {   
		parent::__construct(
			// The unique id for your widget.
			'social-network-widget',

             // The name of the widget for display purposes.
			__( 'Social Network', 'framework' ),

			array(
				'description' => __('Social Media Button Widget', 'framework'),
				'help'        => 'https://www.webulousthemes.com/docs/widgets/social-network',
				'has_preview' => false,
			),
			array(),
			false,
			plugin_dir_path( __FILE__ ).'../'  
		);
	}

	function initialize_form(){    

		if( empty( $this->networks ) ) {  
			$this->networks = include Fw_WIDGETS_DIR . 'social-network-widget/data/networks.php';
		}


		$network_names = array();
		foreach ( $this->networks as $key => $value ) {
			$network_names[ $key ] = $value['label'];
		}

		return array(
			'networks' => array(
				'type'       => 'repeater',
				'label'      => __( 'Networks', 'framework' ),
				'item_name'  => __( 'Network', 'framework' ),
				'item_label' => array(
					'selector'     => "[id*='networks-name'] :selected",
					'update_event' => 'change',
					'value_method' => 'text'
				),
				'fields'     => array(
					'name'         => array(
						'type'    => 'select',
						'label'   => '',
						'prompt'  => __( 'Select network', 'framework' ),
						'options' => $network_names
					),
					'url'          => array(
						'type'  => 'text',
						'label' => __( 'URL', 'framework' )
					),
					'icon_color'   => array(
						'type'  => 'color',
						'label' => __( 'Icon color', 'framework' )
					),
					'button_color' => array(
						'type'  => 'color',
						'label' => __( 'Background color', 'framework' )
					)
				)
			),
			'design'   => array(
				'type'   => 'section',
				'label'  => __( 'Design and layout', 'framework' ),
				'hide'   => true,
				'fields' => array(
					'new_window' => array(
						'type'    => 'checkbox',
						'label'   => __( 'Open in a new window', 'framework' ),
						'default' => true
					),
					'theme'      => array(
						'type'    => 'select',
						'label'   => __( 'Button theme', 'framework' ),
						'default' => 'normal',  
						'options' => array(
							'normal' => __( 'Custom', 'framework' ),
							'atom' => __( 'Atom', 'framework' ),
							'flat' => __( 'Flat', 'framework' ),
							'wire' => __( 'Wire', 'framework' ),
						),
					),
					'hover'      => array(
						'type'    => 'checkbox',
						'label'   => __( 'Use hover effects', 'framework' ),
						'default' => true
					),
					'icon_size'  => array(
						'type'    => 'select',
						'label'   => __( 'Icon size', 'framework' ),
						'options' => array(
							'1'    => __( 'Normal', 'framework' ),
							'1.33' => __( 'Medium', 'framework' ),
							'1.66' => __( 'Large', 'framework' ),
							'2'    => __( 'Extra large', 'framework' )
						)
					),
					'rounding'   => array(
						'type'    => 'select',
						'label'   => __( 'Rounding', 'framework' ),
						'default' => '0.25',
						'options' => array(
							'0'    => __( 'None', 'framework' ),
							'0.25' => __( 'Slightly rounded', 'framework' ),
							'0.5'  => __( 'Very rounded', 'framework' ),
							'1.5'  => __( 'Completely rounded', 'framework' ),
						),
					),
					'padding'    => array(
						'type'    => 'select',
						'label'   => __( 'Padding', 'framework' ),
						'default' => '1',
						'options' => array(
							'0.5' => __( 'Low', 'framework' ),
							'1'   => __( 'Medium', 'framework' ),
							'1.4' => __( 'High', 'framework' ),
							'1.8' => __( 'Very high', 'framework' ),
						),
					),
					'align'      => array(
						'type'    => 'select',
						'label'   => __( 'Align', 'framework' ),
						'default' => 'left',
						'options' => array(
							'left'    => __( 'Left', 'framework' ),
							'right'   => __( 'Right', 'framework' ),
							'center'  => __( 'Center', 'framework' ),
							'justify' => __( 'Justify', 'framework' ),
						),
					),
					'margin'     => array(
						'type'    => 'select',
						'label'   => __( 'Margin', 'framework' ),
						'default' => '0.1',
						'options' => array(
							'0.1' => __( 'Low', 'framework' ),
							'0.2' => __( 'Medium', 'framework' ),
							'0.3' => __( 'High', 'framework' ),
							'0.4' => __( 'Very high', 'framework' ),
						),
					),
				)
			),
		);
	}

	function modify_form( $form ) {   
		return apply_filters( 'social_form_options', $form );
	}

	function modify_instance( $instance ) {
		if ( ! empty( $instance['networks'] ) ) {
			foreach ( $instance['networks'] as $name => $network ) {
				$instance['networks'][$name]['icon_name'] = 'fontawesome-' . $network['name'];
			}
		}
		return $instance;
	}

	function get_javascript_variables() {
		if( empty( $this->networks ) ) {
			$this->networks = include Fw_WIDGETS_DIR . 'social-network-widget/data/networks.php';
		}

		return array( 'networks' => $this->networks );
	}

	function enqueue_admin_scripts() {  
		wp_enqueue_script( 'social-media-buttons', Fw_WIDGETS_URI . 'social-network-widget/js/social-media-buttons-admin.js', array( 'jquery' ), SOW_BUNDLE_VERSION );
	} 

	function get_style_name( $instance ) {
		if ( empty( $instance['design']['theme'] ) ) {  
			return 'atom'; 
		}

		return $instance['design']['theme'];
	}

	function get_less_variables( $instance ) {
		if( empty( $instance ) ) return;

		$design = $instance['design'];
		$m      = $design['margin'];
		$top = $right = $bottom = $left = $m . 'em';
		switch ( $design['align'] ) {
			case 'left':
				$left = '0';
				break;
			case 'right':
				$right = '0';
				break;
			case 'center':
				$left = $right = ( $m * 0.5 ) . 'em';
				break;
		}
		$margin = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;

		return array(
			'icon_size' => $design['icon_size'] . 'em',
			'rounding'  => $design['rounding'] . 'em',
			'padding'   => $design['padding'] . 'em',
			'align'     => $design['align'],
			'margin'    => $margin
		);
	}

	function less_generate_calls_to( $instance, $args ) {
		$networks = $this->get_instance_networks( $instance );
		$calls    = array();
		foreach ( $networks as $network ) {
			$calls[] = $args[0] . '(' . $network['name'] . ', ' . $network['icon_color'] . ', ' . $network['button_color'] . ');';
		}

		return implode( "\n", $calls );
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'networks' => $this->get_instance_networks( $instance )
		);
	}

	private function get_instance_networks( $instance ) {
		if ( isset( $instance['networks'] ) && ! empty( $instance['networks'] ) ) {
			$networks = $instance['networks'];
		} else {
			$networks = array();
		}
		return apply_filters( 'social_networks', $networks, $instance );
	}

	/**
	 * This is used to generate the hash of the instance.
	 *
	 * @param $instance
	 *
	 * @return array
	 */
	protected function get_style_hash_variables( $instance ){
		$networks = $this->get_instance_networks($instance);

		foreach($networks as $i => $network) {
			// URL is not important for the styling
			unset($networks[$i]['url']);
		}

		return array(
			'less' => $this->get_less_variables($instance),
			'networks' => $networks
		);
	}
}     

siteorigin_widget_register( 'social-network-widget', __FILE__, 'Social_Network_Widget' );
