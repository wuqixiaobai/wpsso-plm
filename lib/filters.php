<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2016 Jean-Sebastien Morisset (http://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlmFilters' ) ) {

	class WpssoPlmFilters {

		protected $p;
		protected $plugin_filepath;

		public static $cf = array(
			'opt' => array(				// options
				'defaults' => array(
					'plm_add_to_post' => 0,
					'plm_add_to_page' => 1,
					'plm_add_to_attachment' => 0,
				),
			),
		);

		public function __construct( &$plugin, $plugin_filepath = WPSSOPLM_FILEPATH ) {
			$this->p =& $plugin;
			$this->plugin_filepath = $plugin_filepath;
			$this->p->util->add_plugin_filters( $this, array( 
				'get_defaults' => 1,			// option defaults
				'get_post_defaults' => 1,		// post option defaults
				'og_prefix_ns' => 1,			// open graph namespace
				'og_seed' => 3,				// open graph meta tags
			) );
			if ( is_admin() ) {
				$this->p->util->add_plugin_filters( $this, array( 
					'option_type' => 2,
					'messages_tooltip_side' => 2,	// tooltip messages for side boxes
					'messages_tooltip_post' => 3,	// tooltip messages for post social settings
					'messages_tooltip' => 2,	// tooltip messages filter
					'messages_info' => 2,		// info messages filter
				) );
				$this->p->util->add_plugin_filters( $this, array( 
					'status_gpl_features' => 3,
				), 10, 'wpssoplm' );			// hook into our own filters
			}
		}

		public function filter_og_prefix_ns( $ns ) {
			$ns['place'] = 'http://ogp.me/ns/place#';
			return $ns;
		}

		public function filter_og_seed( $og = array(), $use_post = false, $obj = false ) {
			if ( ! is_object( $obj ) && 
				( $obj = $this->p->util->get_post_object( $use_post ) ) === false ) {
				$this->p->debug->log( 'exiting early: invalid post object' );
				return $og;
			}
			if ( ! isset( $obj->post_type ) ) {
				$this->p->debug->log( 'exiting early: object post_type is empty' );
				return $og;
			}
			$this->p->debug->mark();
			$post_type = get_post_type_object( $obj->post_type );
			if ( empty( $this->p->options[ 'plm_add_to_'.$post_type->name ] ) )
				return $og;

			$opts = $this->p->mods['util']['post']->get_options( $obj->ID );

			// the latitude and longitude values are both required for the place meta tags
			if ( ! empty( $opts['plm_latitude'] ) && 
				! empty( $opts['plm_longitude'] ) ) {

				$og_place = array(
					'og:latitude' => $opts['plm_latitude'],
					'og:longitude' => $opts['plm_longitude'],
					'place:location:latitude' => $opts['plm_latitude'],
					'place:location:longitude' => $opts['plm_longitude'],
				);

				if ( ! empty( $opts['plm_altitude'] ) ) {
					$og_place['og:altitude'] = $opts['plm_altitude'];
					$og_place['place:location:altitude'] = $opts['plm_altitude'];
				}

				ksort( $og_place );

				return array_merge( $og, apply_filters( $this->p->cf['lca'].'_og_place', 
					$og_place, $use_post, $obj ) );
			}

			return $og;
		}

		public function filter_get_defaults( $opts_def ) {
			$opts_def = array_merge( $opts_def, self::$cf['opt']['defaults'] );
			$opts_def = $this->p->util->add_ptns_to_opts( $opts_def, 'pm_add_to' );
			return $opts_def;
		}

		public function filter_get_post_defaults( $opts_def ) {
			$opts_def = array_merge( $opts_def, array(
				'plm_latitude' => '',
				'plm_longitude' => '',
				'plm_altitude' => '',
				'plm_place' => 0,
				'plm_streetaddr' => '',
				'plm_city' => '',
				'plm_state' => '',
				'plm_zipcode' => '',
				'plm_country' => '',
			) );
			return $opts_def;
		}

		public function filter_option_type( $type, $key ) {
			if ( ! empty( $type ) )
				return $type;

			// remove localization for more generic match
			if ( strpos( $key, '#' ) !== false )
				$key = preg_replace( '/#.*$/', '', $key );

			switch ( $key ) {
				case 'plm_latitude':
				case 'plm_longitude':
				case 'plm_altitude':
					return 'blank_num';	// must be numeric (blank or zero is ok)
					break;
				case 'plm_streetaddr':
				case 'plm_city':
				case 'plm_state':
				case 'plm_zipcode':
				case 'plm_country':
					return 'ok_blank';	// text strings that can be blank
					break;
			}
			return $type;
		}

		public function filter_messages_tooltip_side( $text, $idx ) {
			$lca =  $this->p->cf['lca'];
			$short = $this->p->cf['plugin'][$lca]['short'];
			$short_pro = $short.' Pro';
			switch ( $idx ) {
				case 'tooltip-side-location-meta-tags':
					$text = sprintf( __( 'If location information is entered under the <em>%1$s</em> tab (in the %2$s metabox), %3$s will include additional meta tags for %4$s.', 'wpsso-plm' ), _x( 'Place / Location', 'metabox tab', 'wpsso-plm' ), _x( 'Social Settings', 'metabox title', 'wpsso' ), $short, 'Facebook' );
					break;
				case 'tooltip-side-place-meta-tags':
					$text = sprintf( __( 'If location information is entered under the <em>%1$s</em> tab (in the %2$s metabox), %3$s will include additional meta tags for %4$s.', 'wpsso-plm' ), _x( 'Place / Location', 'metabox tab', 'wpsso-plm' ), _x( 'Social Settings', 'metabox title', 'wpsso' ), $short, 'Pinterest <em>Place</em> Rich Pin' );
					break;
			}
			return $text;
		}

		public function filter_messages_tooltip_post( $text, $idx, $atts ) {
			if ( strpos( $idx, 'tooltip-post-plm_' ) !== 0 )
				return $text;

			switch ( $idx ) {
				case 'tooltip-post-plm_latitude':
					$text = __( 'The numeric <em>decimal degrees</em> latitude for the content of this webpage.', 'wpsso-plm' ).' '.__( 'You may use a service like <a href="http://www.gps-coordinates.net/">Google Maps GPS Coordinates</a> (as an example), to find the approximate GPS coordinates of a street address.', 'wpsso-plm' ).' <strong>'.__( 'This field is required to include the Place and Location meta tags.', 'wpsso-plm' ).'</strong>';
					break;
				case 'tooltip-post-plm_longitude':
					$text = __( 'The numeric <em>decimal degrees</em> longitude for the content of this webpage.', 'wpsso-plm' ).' '.__( 'You may use a service like <a href="http://www.gps-coordinates.net/">Google Maps GPS Coordinates</a> (as an example), to find the approximate GPS coordinates of a street address.', 'wpsso-plm' ).' <strong>'.__( 'This field is required to include the Place and Location meta tags.', 'wpsso-plm' ).'</strong>';
					break;
				case 'tooltip-post-plm_place':
					$text = __( 'Share this webpage as an Open Graph and Pinterest <em>Place</em> Rich Pin.', 'wpsso-plm' );
					break;
				case 'tooltip-post-plm_altitude':
					$text = __( 'An optional numeric altitude (in meters above sea level) for the content of this webpage.', 'wpsso-plm' );
					break;
				case 'tooltip-post-plm_streetaddr':
					$text = __( 'An optional Street Address for the <em>Place</em> meta tags.', 'wpsso-plm' );
					break;
				case 'tooltip-post-plm_city':
					$text = __( 'An optional City name for the <em>Place</em> meta tags.', 'wpsso-plm' );
					break;
				case 'tooltip-post-plm_state':
					$text = __( 'An optional State or Province name for the <em>Place</em> meta tags.', 'wpsso-plm' );
					break;
				case 'tooltip-post-plm_zipcode':
					$text = __( 'An optional Zip or Postal Code for the <em>Place</em> meta tags.', 'wpsso-plm' );
					break;
				case 'tooltip-post-plm_country':
					$text = __( 'An optional Country name for the <em>Place</em> meta tags.', 'wpsso-plm' );
					break;
			}
			return $text;
		}

		public function filter_messages_tooltip( $text, $idx ) {
			if ( strpos( $idx, 'tooltip-plm_' ) !== 0 )
				return $text;

			switch ( $idx ) {
				case 'tooltip-plm_add_to':
					$text = sprintf( __( 'Add a <em>%1$s</em> tab to the %2$s metabox on Posts, Pages, etc.', 'wpsso-plm' ), _x( 'Place / Location', 'metabox tab', 'wpsso-plm' ), _x( 'Social Settings', 'metabox title', 'wpsso' ) );
					break;
			}
			return $text;
		}

		public function filter_messages_info( $text, $idx ) {
			switch ( $idx ) {
				case 'info-place-general':
					$text = '<blockquote class="top-info"><p>'.sprintf( __( 'A <em>%1$s</em> tab can be added to the %2$s metabox on Posts, Pages, and custom post types, allowing you to enter specific location information for that webpage (ie. GPS coordinates and/or street address).', 'wpsso-plm' ), _x( 'Place / Location', 'metabox tab', 'wpsso-plm' ), _x( 'Social Settings', 'metabox title', 'wpsso' ) ).'</p></blockquote>';
					break;
			}
			return $text;
		}

		public function filter_status_gpl_features( $features, $lca, $info ) {
			$features['Location Meta Tags'] = array( 
				'status' => 'on',
			);
			return $features;
		}
	}
}

?>
