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

		public static $cf = array(
			'opt' => array(				// options
				'defaults' => array(
					'plm_add_to_post' => 0,
					'plm_add_to_page' => 1,
					'plm_add_to_attachment' => 0,
					'plm_def_country' => 'none',	// alpha2 country code
					'plm_cc_location' => 'new',	// value is not used
				),
			),
		);

		public function __construct( &$plugin ) {
			$this->p =& $plugin;

			$this->p->util->add_plugin_filters( $this, array( 
				'get_defaults' => 1,			// option defaults
				'get_md_defaults' => 1,			// meta data defaults
				'og_prefix_ns' => 1,			// open graph namespace
				'og_seed' => 3,				// open graph meta tags
			) );

			if ( is_admin() ) {
				$this->p->util->add_plugin_filters( $this, array( 
					'option_type' => 2,
					'save_options' => 3,
					'messages_tooltip_side' => 2,	// tooltip messages for side boxes
					'messages_tooltip_post' => 3,	// tooltip messages for post social settings
					'messages_info' => 2,		// info messages filter
				) );
				$this->p->util->add_plugin_filters( $this, array( 
					'status_gpl_features' => 3,
					'status_pro_features' => 3,
				), 10, 'wpssoplm' );			// hook into our own filters
			}
		}

		public function filter_og_prefix_ns( $ns ) {
			$ns['place'] = 'http://ogp.me/ns/place#';
			return $ns;
		}

		public function filter_og_seed( $og, $use_post, $mod ) {
			if ( $this->p->debug->enabled )
				$this->p->debug->mark();

			// sanity checks
			if ( $mod['name'] !== 'post' ) {
				if ( $this->p->debug->enabled )
					$this->p->debug->log( 'exiting early: module name is not post' );
				return $og;     // abort
			}

			$post_type = get_post_type( $mod['id'] );
			if ( empty( $this->p->options['plm_add_to_'.$post_type] ) ) {
				if ( $this->p->debug->enabled )
					$this->p->debug->log( 'exiting early: plm disabled for post_type \''.$post_type.'\'' );
				return $og;	// abort
			}

			$location = WpssoPlmPlace::get_md_location( $mod );

			// the latitude and longitude values are both required for the place meta tags
			if ( ! empty( $location['plm_latitude'] ) && 
				! empty( $location['plm_longitude'] ) ) {

				$og_place = array(
					'og:latitude' => $location['plm_latitude'],
					'og:longitude' => $location['plm_longitude'],
					'place:location:latitude' => $location['plm_latitude'],
					'place:location:longitude' => $location['plm_longitude'],
				);

				// optional altitude
				if ( ! empty( $location['plm_altitude'] ) ) {
					$og_place['og:altitude'] = $location['plm_altitude'];
					$og_place['place:location:altitude'] = $location['plm_altitude'];
				}

				ksort( $og_place );

				return array_merge( $og, apply_filters( $this->p->cf['lca'].'_og_place', $og_place, $use_post, $mod ) );
			}

			return $og;
		}

		public function filter_get_defaults( $def_opts ) {
			$def_opts = array_merge( $def_opts, self::$cf['opt']['defaults'] );
			$def_opts = $this->p->util->add_ptns_to_opts( $def_opts, 'pm_add_to' );
			return $def_opts;
		}

		public function filter_get_md_defaults( $def_opts ) {
			return array_merge( $def_opts, 
				WpssoPlmConfig::$cf['form']['plm_md_place'],	// empty array
				array(
					'plm_place' => 0,
					'plm_type' => 'geo',
					'plm_location' => 'custom',
					'plm_country' => $this->p->options['plm_def_country'],	// alpha2 country code
				) );
		}

		public function filter_save_options( $opts, $options_name, $network ) {
			$location_ids = WpssoPlmPlace::get_location_ids( $opts );

			// remove all locations with an empty name value
			foreach ( $location_ids as $id => $name )
				if ( empty( $name ) )
					$opts = SucomUtil::preg_grep_keys( '/^plm_cc_.*_'.$id.'$/',
						$opts, true );	// $invert = true

			return $opts;
		}

		public function filter_option_type( $type, $key ) {
			// check for previous filter values
			if ( ! empty( $type ) )
				return $type;

			// remove localization for more generic match
			if ( strpos( $key, '#' ) !== false )
				$key = preg_replace( '/#.*$/', '', $key );

			switch ( $key ) {
				case 'plm_type':
				case 'plm_def_country':
				case 'plm_location':		// 'none', 'custom', or numeric
				case ( preg_match( '/^plm(_cc)?_(country)(_[0-9]+)?/', $key ) ? true : false ):
					return 'not_blank';
					break;
				case 'plm_cc_location':		// numeric
					return 'numeric';
					break;
				case ( preg_match( '/^plm(_cc)?_(latitude|longitude|altitude|po_box_number)(_[0-9]+)?/', $key ) ? true : false ):
					return 'blank_num';	// must be numeric (blank or zero is ok)
					break;
				case ( preg_match( '/^plm(_cc)?_(streetaddr|city|state|zipcode)(_[0-9]+)?/', $key ) ? true : false ):
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
				case 'tooltip-side-corp-contacts-editor':
					$text = sprintf( __( 'If location information is entered under the <em>%1$s</em> tab (in the %2$s metabox), %3$s will include additional meta tags for %4$s.', 'wpsso-plm' ), _x( 'Place / Location', 'metabox tab', 'wpsso-plm' ), _x( 'Social Settings', 'metabox title', 'wpsso' ), $short, 'Facebook' );
					break;
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
				case 'tooltip-post-plm_place':
					$text = sprintf( __( 'Share this webpage as an Open Graph and Pinterest Rich Pin / Schema <em>Place</em>. If the WPSSO JSON Pro extension is active, the webpage will also include Schema JSON-LD markup for the Schema type <a href="%1$s">%1$s</a>.', 'wpsso-plm' ), 'http://schema.org/Place' );
					break;
				case 'tooltip-post-plm_type':
					$text = __( 'Select the type of address entered &mdash; either a Geographic <em>Place</em> or a Postal Address.', 'wpsso-plm' );
					break;
				case 'tooltip-post-plm_location':
					$text = __( 'Select a corporate contact location, or enter customized location information bellow.', 'wpsso-plm' );
					break;
				case 'tooltip-post-plm_streetaddr':
					$text = __( 'An optional Street Address for the <em>Place</em> meta tags.', 'wpsso-plm' );
					break;
				case 'tooltip-post-plm_po_box_number':
					$text = __( 'An optional Post Office Box Number for the <em>Place</em> Schema JSON-LD markup.', 'wpsso-plm' );
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
					$text = __( 'An optional Country for the <em>Place</em> meta tags.', 'wpsso-plm' );
					break;
				case 'tooltip-post-plm_latitude':
					$text = __( 'The numeric <em>decimal degrees</em> latitude for the content of this webpage.', 'wpsso-plm' ).' '.__( 'You may use a service like <a href="http://www.gps-coordinates.net/">Google Maps GPS Coordinates</a> (as an example), to find the approximate GPS coordinates of a street address.', 'wpsso-plm' ).' <strong>'.__( 'This field is required to include the Place and Location meta tags.', 'wpsso-plm' ).'</strong>';
					break;
				case 'tooltip-post-plm_longitude':
					$text = __( 'The numeric <em>decimal degrees</em> longitude for the content of this webpage.', 'wpsso-plm' ).' '.__( 'You may use a service like <a href="http://www.gps-coordinates.net/">Google Maps GPS Coordinates</a> (as an example), to find the approximate GPS coordinates of a street address.', 'wpsso-plm' ).' <strong>'.__( 'This field is required to include the Place and Location meta tags.', 'wpsso-plm' ).'</strong>';
					break;
				case 'tooltip-post-plm_altitude':
					$text = __( 'An optional numeric altitude (in meters above sea level) for the content of this webpage.', 'wpsso-plm' );
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

		public function filter_status_pro_features( $features, $lca, $info ) {
			$aop = $this->p->check->aop( $lca );
			$features['Corp. Contacts Editor'] = array( 
				'status' => $aop ? 'on' : 'off',
				'td_class' => $aop ? '' : 'blank',
			);
			return $features;
		}
	}
}

?>
