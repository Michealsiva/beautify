<?php
/*
Widget Name: Google Map 
Description: Create Google Map 
Author: N. Venkat Raj
Author URI: https://www.webulousthemes.com
Widget URI: todo
Video URI: todo
*/

class Google_Map_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
	        // The unique id for your widget.
			'google-map-widget',  

			// The name of the widget for display purposes.
			__('Google Maps', 'framework'),

			array(
				'description' => __('Google Map Widget', 'framework'), 
				'help'        => 'https://www.webulousthemes.com/docs/widgets/google-map',
				'has_preview' => false,
			),

			array(),
			false,
			plugin_dir_path(__FILE__).'../' 
		);
	}

	function initialize() {
		$this->register_frontend_scripts( 
			array(
				array(
					'google-map-widget',
					Fw_WIDGETS_URI . 'google-map-widget/js/js-map.js',
					array( 'jquery' )
				)
			)
		);
		$this->register_frontend_styles( 
			array(
				array(
					'google-map-widget',
					Fw_WIDGETS_URI . 'google-map-widget/css/style.css',
				)
			)  
		);
	}

	function initialize_form(){
		return array(
			'map_center'      => array(
				'type'        => 'textarea',
				'rows'        => 2,
				'label'       => __( 'Map center', 'framework' ),
				'description' => __( 'The name of a place, town, city, or even a country. Can be an exact address too.', 'framework' )
			),
			'api_key_section' => array(
				'type'   => 'section',
				'label'  => __( 'API key', 'framework' ),
				'hide'   => false,
				'fields' => array(
					'api_key' => array(
						'type'        => 'text',
						'label'       => __( 'API key', 'framework' ),
						'required'    => true,
						'description' => sprintf(
							__( 'Enter your %sAPI key%s. Your map may not function correctly without one.', 'framework' ),
							'<a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">',
							'</a>'
						)
					)
				)
			),
			'settings'        => array(
				'type'        => 'section',
				'label'       => __( 'Settings', 'framework' ),
				'hide'        => false,
				'description' => __( 'Set map display options.', 'framework' ),
				'fields'      => array(
					'map_type'    => array(
						'type'    => 'radio',
						'default' => 'interactive',
						'label'   => __( 'Map type', 'framework' ),
						'state_emitter' => array(
							'callback' => 'select',
							'args' => array( 'map_type' )
						),
						'options' => array(
							'interactive' => __( 'Interactive', 'framework' ),
							'static'      => __( 'Static image', 'framework' ),
						)
					),
					'width'       => array(
						'type'       => 'text',
						'default'    => 640,
						'hidden'     => true,
						'state_handler' => array(
							'map_type[static]' => array('show'),
							'_else[map_type]' => array('hide'),
						),
						'label'      => __( 'Width', 'framework' )
					),
					'height'      => array(
						'type'    => 'text',
						'default' => 480,
						'label'   => __( 'Height', 'framework' )
					),
					'zoom'        => array(
						'type'        => 'slider',
						'label'       => __( 'Zoom level', 'framework' ),
						'description' => __( 'A value from 0 (the world) to 21 (street level).', 'framework' ),
						'min'         => 0,
						'max'         => 21,
						'default'     => 12,
						'integer'     => true,

					),
					'scroll_zoom' => array(
						'type'        => 'checkbox',
						'default'     => true,
						'state_handler' => array(
							'map_type[interactive]' => array('show'),
							'_else[map_type]' => array('hide'),
						),
						'label'       => __( 'Scroll to zoom', 'framework' ),
						'description' => __( 'Allow scrolling over the map to zoom in or out.', 'framework' )
					),
					'draggable'   => array(
						'type'        => 'checkbox',
						'default'     => true,
						'state_handler' => array(
							'map_type[interactive]' => array('show'),
							'_else[map_type]' => array('hide'),
						),
						'label'       => __( 'Draggable', 'framework' ),
						'description' => __( 'Allow dragging the map to move it around.', 'framework' )
					),
					'disable_default_ui' => array(
						'type' => 'checkbox',
						'default' => false,
						'state_handler' => array(
							'map_type[interactive]' => array('show'),
							'_else[map_type]' => array('hide'),
						),
						'label'       => __( 'Disable default UI', 'framework' ),
						'description' => __( 'Hides the default Google Maps controls.', 'framework' )
					),
					'keep_centered' => array(
						'type' => 'checkbox',
						'default' => false,
						'state_handler' => array(
							'map_type[interactive]' => array('show'),
							'_else[map_type]' => array('hide'),
						),
						'label'       => __( 'Keep map centered', 'framework' ),
						'description' => __( 'Keeps the map centered when it\'s container is resized.', 'framework' )
					)
				)
			),
			'markers'         => array(
				'type'        => 'section',
				'label'       => __( 'Markers', 'framework' ),
				'hide'        => true,
				'description' => __( 'Use markers to identify points of interest on the map.', 'framework' ),
				'fields'      => array(
					'marker_at_center'  => array(
						'type'    => 'checkbox',
						'default' => true,
						'label'   => __( 'Show marker at map center', 'framework' )
					),
					'marker_icon'       => array(
						'type'        => 'media',
						'default'     => '',
						'label'       => __( 'Marker icon', 'framework' ),
						'description' => __( 'Replaces the default map marker with your own image.', 'framework' )
					),
					'markers_draggable' => array(
						'type'       => 'checkbox',
						'default'    => false,
						'state_handler' => array(
							'map_type[interactive]' => array('show'),
							'_else[map_type]' => array('hide'),
						),
						'label'      => __( 'Draggable markers', 'framework' )
					),
					'marker_positions'  => array(
						'type'       => 'repeater',
						'label'      => __( 'Marker positions', 'framework' ),
						'description' => __( 'Please be aware that adding more than 10 markers may cause a slight delay before they appear, due to Google Geocoding API rate limits.', 'framework' ),
						'item_name'  => __( 'Marker', 'framework' ),
						'item_label' => array(
							'selector'     => "[id*='marker_positions-place']",
							'update_event' => 'change',
							'value_method' => 'val'
						),
						'fields'     => array(
							'place' => array(
								'type'  => 'textarea',
								'rows'  => 2,
								'label' => __( 'Place', 'framework' )
							),
							'info' => array(
								'type' => 'tinymce',
								'rows' => 10,
								'label' => __( 'Info Window Content', 'framework' )
							),
							'info_max_width' => array(
								'type' => 'text',
								'label' => __( 'Info Window max width', 'framework' )
							),
						)
					),
					'info_display' => array(
						'type' => 'radio',
						'label' => __( 'When should Info Windows be displayed?', 'framework' ),
						'default' => 'click',
						'options' => array(
							'click'   => __( 'Click', 'framework' ),
							'mouseover'   => __( 'Mouse over', 'framework' ),
							'always' => __( 'Always', 'framework' ),
						)
					),
				)
			),
			'styles'          => array(
				'type'        => 'section',
				'label'       => __( 'Styles', 'framework' ),
				'hide'        => true,
				'description' => __( 'Apply custom colors to map features, or hide them completely.', 'framework' ),
				'fields'      => array(
					'style_method'        => array(
						'type'    => 'radio',
						'default' => 'normal',
						'label'   => __( 'Map styles', 'framework' ),
						'state_emitter' => array(
							'callback' => 'select',
							'args' => array( 'style_method' )
						),
						'options' => array(
							'normal'   => __( 'Default', 'framework' ),
							'custom'   => __( 'Custom', 'framework' ),
							'raw_json' => __( 'Predefined Styles', 'framework' ),
						)
					),
					'styled_map_name'     => array(
						'type'       => 'text',
						'state_handler' => array(
							'style_method[default]' => array('hide'),
							'_else[style_method]' => array('show'),
						),
						'label'      => __( 'Styled map name', 'framework' )
					),
					'raw_json_map_styles' => array(
						'type'        => 'textarea',
						'state_handler' => array(
							'style_method[raw_json]' => array('show'),
							'_else[style_method]' => array('hide'),
						),
						'rows'        => 5,
						'hidden'      => true,
						'label'       => __( 'Raw JSON styles', 'framework' ),
						'description' => __( 'Copy and paste predefined styles here from <a href="http://snazzymaps.com/" target="_blank">Snazzy Maps</a>.', 'framework' )
					),
					'custom_map_styles'   => array(
						'type'       => 'repeater',
						'state_handler' => array(
							'style_method[custom]' => array('show'),
							'_else[style_method]' => array('hide'),
						),
						'label'      => __( 'Custom map styles', 'framework' ),
						'item_name'  => __( 'Style', 'framework' ),
						'item_label' => array(
							'selector'     => "[id*='custom_map_styles-map_feature'] :selected",
							'update_event' => 'change',
							'value_method' => 'text'
						),
						'fields'     => array(
							'map_feature'  => array(
								'type'    => 'select',
								'label'   => '',
								'prompt'  => __( 'Select map feature to style', 'framework' ),
								'options' => array(
									'water'                       => __( 'Water', 'framework' ),
									'road_highway'                => __( 'Highways', 'framework' ),
									'road_arterial'               => __( 'Arterial roads', 'framework' ),
									'road_local'                  => __( 'Local roads', 'framework' ),
									'transit_line'                => __( 'Transit lines', 'framework' ),
									'transit_station'             => __( 'Transit stations', 'framework' ),
									'landscape_man-made'          => __( 'Man-made landscape', 'framework' ),
									'landscape_natural_landcover' => __( 'Natural landscape landcover', 'framework' ),
									'landscape_natural_terrain'   => __( 'Natural landscape terrain', 'framework' ),
									'poi_attraction'              => __( 'Point of interest - Attractions', 'framework' ),
									'poi_business'                => __( 'Point of interest - Business', 'framework' ),
									'poi_government'              => __( 'Point of interest - Government', 'framework' ),
									'poi_medical'                 => __( 'Point of interest - Medical', 'framework' ),
									'poi_park'                    => __( 'Point of interest - Parks', 'framework' ),
									'poi_place-of-worship'        => __( 'Point of interest - Places of worship', 'framework' ),
									'poi_school'                  => __( 'Point of interest - Schools', 'framework' ),
									'poi_sports-complex'          => __( 'Point of interest - Sports complexes', 'framework' ),
								)
							),
							'element_type' => array(
								'type'    => 'select',
								'label'   => __( 'Select element type to style', 'framework' ),
								'options' => array(
									'geometry' => __( 'Geometry', 'framework' ),
									'labels'   => __( 'Labels', 'framework' ),
									'all'      => __( 'All', 'framework' ),
								)
							),
							'visibility'   => array(
								'type'    => 'checkbox',
								'default' => true,
								'label'   => __( 'Visible', 'framework' )
							),
							'color'        => array(
								'type'  => 'color',
								'label' => __( 'Color', 'framework' )
							)
						)
					)
				)
			),
			'directions'      => array(
				'type'        => 'section',
				'label'       => __( 'Directions', 'framework' ),
				'state_handler' => array(
					'map_type[interactive]' => array('show'),
					'_else[map_type]' => array('hide'),
				),
				'hide'        => true,
				'description' => __( 'Display a route on your map, with waypoints between your starting point and destination.', 'framework' ),
				'fields'      => array(
					'origin'             => array(
						'type'  => 'text',
						'label' => __( 'Starting point', 'framework' )
					),
					'destination'        => array(
						'type'  => 'text',
						'label' => __( 'Destination', 'framework' )
					),
					'travel_mode'        => array(
						'type'    => 'select',
						'label'   => __( 'Travel mode', 'framework' ),
						'default' => 'driving',
						'options' => array(
							'driving'   => __( 'Driving', 'framework' ),
							'walking'   => __( 'Walking', 'framework' ),
							'bicycling' => __( 'Bicycling', 'framework' ),
							'transit'   => __( 'Transit', 'framework' )
						)
					),
					'avoid_highways'     => array(
						'type'  => 'checkbox',
						'label' => __( 'Avoid highways', 'framework' ),
					),
					'avoid_tolls'        => array(
						'type'  => 'checkbox',
						'label' => __( 'Avoid tolls', 'framework' ),
					),
					'waypoints'          => array(
						'type'       => 'repeater',
						'label'      => __( 'Waypoints', 'framework' ),
						'item_name'  => __( 'Waypoint', 'framework' ),
						'item_label' => array(
							'selector'     => "[id*='waypoints-location']",
							'update_event' => 'change',
							'value_method' => 'val'
						),
						'fields'     => array(
							'location' => array(
								'type'  => 'textarea',
								'rows'  => 2,
								'label' => __( 'Location', 'framework' )
							),
							'stopover' => array(
								'type'        => 'checkbox',
								'default'     => true,
								'label'       => __( 'Stopover', 'framework' ),
								'description' => __( 'Whether or not this is a stop on the route or just a route preference.', 'framework' )
							)
						)
					),
					'optimize_waypoints' => array(
						'type'        => 'checkbox',
						'label'       => __( 'Optimize waypoints', 'framework' ),
						'default'     => false,
						'description' => __( 'Allow the Google Maps service to reorder waypoints for the shortest travelling distance.', 'framework' )
					)
				)
			),
		);
	}

	function get_template_name( $instance ) {
		return $instance['settings']['map_type'] == 'static' ? 'static-map' : 'js-map';
	}

	function get_style_name( $instance ) {
		// We aren't using a LESS style for this widget.
		return false;
	}

	function get_template_variables( $instance, $args ) {
		if( empty( $instance ) ) return array();

		$settings = $instance['settings'];

		$mrkr_src = wp_get_attachment_image_src( $instance['markers']['marker_icon'] );

		$styles = $this->get_styles( $instance );

		if ( $settings['map_type'] == 'static' ) {
			$src_url = $this->get_static_image_src( $instance, $settings['width'], $settings['height'], ! empty( $styles ) ? $styles['styles'] : array() );

			return array(
				'src_url' => sow_esc_url( $src_url )
			);
		} else {
			$markers         = $instance['markers'];
			$directions = '';
			if ( ! empty( $instance['directions']['origin'] ) && ! empty( $instance['directions']['destination'] ) ) {
				if ( empty( $instance['directions']['waypoints'] ) ) {
					unset( $instance['directions']['waypoints'] );
				}
				$directions = siteorigin_widgets_underscores_to_camel_case( $instance['directions'] );
			}

			$map_data = siteorigin_widgets_underscores_to_camel_case( array(
				'address'           => $instance['map_center'],
				'zoom'              => $settings['zoom'],
				'scroll_zoom'       => $settings['scroll_zoom'],
				'draggable'         => $settings['draggable'],
				'disable_ui'        => $settings['disable_default_ui'],
				'keep_centered'     => $settings['keep_centered'],
				'marker_icon'       => ! empty( $mrkr_src ) ? $mrkr_src[0] : '',
				'markers_draggable' => isset( $markers['markers_draggable'] ) ? $markers['markers_draggable'] : '',
				'marker_at_center'  => !empty( $markers['marker_at_center'] ),
				'marker_info_display' => $markers['info_display'],
				'marker_positions'  => isset( $markers['marker_positions'] ) ? $markers['marker_positions'] : '',
				'map_name'          => ! empty( $styles ) ? $styles['map_name'] : '',
				'map_styles'        => ! empty( $styles ) ? $styles['styles'] : '',
				'directions'        => $directions,
				'api_key'           => $instance['api_key_section']['api_key']
			));

			return array(
				'map_id'   => md5( $instance['map_center'] ),
				'height'   => $settings['height'],
				'map_data' => $map_data,
			);
		}
	}

	private function get_styles( $instance ) {
		$style_config = $instance['styles'];
		switch ( $style_config['style_method'] ) {
			case 'custom':
				if ( empty( $style_config['custom_map_styles'] ) ) {
					return array();
				} else {
					$map_name   = ! empty( $style_config['styled_map_name'] ) ? $style_config['styled_map_name'] : 'Custom Map';
					$map_styles = $style_config['custom_map_styles'];
					$styles     = array();
					foreach ( $map_styles as $style_item ) {
						$map_feature = $style_item['map_feature'];
						unset( $style_item['map_feature'] );
						$element_type = $style_item['element_type'];
						unset( $style_item['element_type'] );

						$stylers = array();
						foreach ( $style_item as $style_name => $style_value ) {
							if ( $style_value !== '' && ! is_null( $style_value ) ) {
								$style_value = $style_value === false ? 'off' : $style_value;
								array_push( $stylers, array( $style_name => $style_value ) );
							}
						}
						$map_feature = str_replace( '_', '.', $map_feature );
						$map_feature = str_replace( '-', '_', $map_feature );
						array_push( $styles, array(
							'featureType' => $map_feature,
							'elementType' => $element_type,
							'stylers'     => $stylers
						) );
					}

					return array( 'map_name' => $map_name, 'styles' => $styles );
				}
			case 'raw_json':
				if ( empty( $style_config['raw_json_map_styles'] ) ) {
					return array();
				} else {
					$map_name      = ! empty( $style_config['styled_map_name'] ) ? $style_config['styled_map_name'] : __( 'Custom Map', 'framework' );
					$styles_string = $style_config['raw_json_map_styles'];

					return array( 'map_name' => $map_name, 'styles' => json_decode( $styles_string, true ) );
				}
			case 'normal':
			default:
				return array();
		}
	}

	private function get_static_image_src( $instance, $width, $height, $styles ) {
		$src_url = "https://maps.googleapis.com/maps/api/staticmap?";
		$src_url .= "center=" . $instance['map_center'];
		$src_url .= "&zoom=" . $instance['settings']['zoom'];
		$src_url .= "&size=" . $width . "x" . $height;

		if ( ! empty( $instance['api_key_section']['api_key'] ) ) {
			$src_url .= "&key=" . $instance['api_key_section']['api_key'];
		}

		if ( ! empty( $styles ) ) {
			foreach ( $styles as $st ) {
				if ( empty( $st ) || ! isset( $st['stylers'] ) || empty( $st['stylers'] ) ) {
					continue;
				}
				$st_string = '';
				if ( isset ( $st['featureType'] ) ) {
					$st_string .= 'feature:' . $st['featureType'];
				}
				if ( isset ( $st['elementType'] ) ) {
					if ( ! empty( $st_string ) ) {
						$st_string .= "|";
					}
					$st_string .= 'element:' . $st['elementType'];
				}
				foreach ( $st['stylers'] as $style_prop_arr ) {
					foreach ( $style_prop_arr as $prop_name => $prop_val ) {
						if ( ! empty( $st_string ) ) {
							$st_string .= "|";
						}
						if ( $prop_val[0] == "#" ) {
							$prop_val = "0x" . substr( $prop_val, 1 );
						}
						if ( is_bool( $prop_val ) ) {
							$prop_val = $prop_val ? 'true' : 'false';
						}
						$st_string .= $prop_name . ":" . $prop_val;
					}
				}
				$st_string = '&style=' . $st_string;
				$src_url .= $st_string;
			}
		}

		if ( ! empty( $instance['markers'] ) ) {
			$markers    = $instance['markers'];
			$markers_st = '';

			if ( ! empty( $markers['marker_icon'] ) ) {
				$mrkr_src = wp_get_attachment_image_src( $markers['marker_icon'] );
				if ( ! empty( $mrkr_src ) ) {
					$markers_st .= 'icon:' . $mrkr_src[0];
				}
			}

			if ( !empty( $markers['marker_at_center'] ) ) {
				if ( ! empty( $markers_st ) ) {
					$markers_st .= "|";
				}
				$markers_st .= $instance['map_center'];
			}

			if ( ! empty( $markers['marker_positions'] ) ) {
				foreach ( $markers['marker_positions'] as $marker ) {
					if ( ! empty( $markers_st ) ) {
						$markers_st .= "|";
					}
					$markers_st .= urlencode( $marker['place'] );
				}
			}
			$markers_st = '&markers=' . $markers_st;
			$src_url .= $markers_st;
		}

		return $src_url;
	}
}

siteorigin_widget_register( 'google-map-widget', __FILE__, 'Google_Map_Widget' );
