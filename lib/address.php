<?php
/*
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2017 Jean-Sebastien Morisset (https://wpsso.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'These aren\'t the droids you\'re looking for...' );
}

if ( ! class_exists( 'WpssoPlmAddress' ) ) {

	class WpssoPlmAddress {

		private $p;
		private static $mod_md_opts = array();	// get_md_options() meta data cache

		public static $place_mt = array(
			'plm_addr_name' => 'place:name',
			'plm_addr_alt_name' => 'place:alt_name',
			'plm_addr_desc' => 'place:description',
			'plm_addr_streetaddr' => 'place:street_address',
			'plm_addr_po_box_number' => 'place:po_box_number',
			'plm_addr_city' => 'place:locality',
			'plm_addr_state' => 'place:region',
			'plm_addr_zipcode' => 'place:postal_code',
			'plm_addr_country' => 'place:country_name',
		);

		public function __construct( &$plugin ) {
			$this->p =& $plugin;

			if ( $this->p->debug->enabled ) {
				$this->p->debug->mark();
			}
		}

		public static function has_place( array $mod ) {

			$wpsso =& Wpsso::get_instance();

			if ( $wpsso->debug->enabled ) {
				$wpsso->debug->mark();
			}

			$addr_opts = false;
			if ( $mod['is_home_index'] ) {
				if ( isset( $wpsso->options['plm_addr_for_home'] ) &&
					is_numeric( $wpsso->options['plm_addr_for_home'] ) ) {
					if ( ( $addr_opts = self::get_addr_id( $wpsso->options['plm_addr_for_home'] ) ) === false ) {
						if ( $wpsso->debug->enabled ) {
							$wpsso->debug->log( 'no place options for address id '.$wpsso->options['plm_addr_for_home'] );
						}
					}
				}
			} elseif ( is_object( $mod['obj'] ) ) {
				if ( ( $addr_opts = self::has_md_place( $mod ) ) === false ) {
					if ( $wpsso->debug->enabled ) {
						$wpsso->debug->log( 'no place options from module object' );
					}
				}
			} elseif ( $wpsso->debug->enabled ) {
				$wpsso->debug->log( 'not home index and no module object' );
			}

			if ( $wpsso->debug->enabled ) {
				if ( $addr_opts === false ) {
					$wpsso->debug->log( 'no place options found' );
				} else {
					$wpsso->debug->log( count( $addr_opts ).' place options found' );
				}
			}

			return $addr_opts;
		}

		public static function has_md_place( array &$mod ) {
			if ( ! is_object( $mod['obj'] ) ) {	// just in case
				return false;
			}
			$md_opts = self::get_md_options( $mod );
			if ( is_array( $md_opts  ) ) {
				foreach ( self::$place_mt as $key => $mt_name ) {
					if ( ! empty( $md_opts[$key] ) ) {
						return $md_opts;
					}
				}
			}
			return false;
		}

		public static function has_days( array &$mod ) {

			$wpsso =& Wpsso::get_instance();
			if ( $wpsso->debug->enabled ) {
				$wpsso->debug->mark();
			}

			$addr_opts = false;
			if ( $mod['is_home_index'] ) {
				if ( isset( $wpsso->options['plm_addr_for_home'] ) &&
					is_numeric( $wpsso->options['plm_addr_for_home'] ) ) {
					if ( ( $addr_opts = self::get_addr_id( $wpsso->options['plm_addr_for_home'] ) ) === false ) {
						if ( $wpsso->debug->enabled ) {
							$wpsso->debug->log( 'no business days for address id '.$wpsso->options['plm_addr_for_home'] );
						}
					} else {
						foreach ( $wpsso->cf['form']['weekdays'] as $day => $label ) {
							if ( ! empty( $addr_opts['plm_addr_day_'.$day] ) ) {
								return $addr_opts;
							}
						}
						return false;
					}
				}
			} elseif ( is_object( $mod['obj'] ) ) {
				if ( ( $addr_opts = self::has_md_days( $mod ) ) === false ) {
					if ( $wpsso->debug->enabled ) {
						$wpsso->debug->log( 'no business days from module object' );
					}
				}
			} elseif ( $wpsso->debug->enabled ) {
				$wpsso->debug->log( 'not home index and no module object' );
			}

			return $addr_opts;
		}

		public static function has_md_days( array &$mod ) {
			if ( ! is_object( $mod['obj'] ) )	// just in case
				return false;
			$wpsso =& Wpsso::get_instance();
			if ( $wpsso->debug->enabled ) {
				$wpsso->debug->mark();
			}
			$md_opts = self::get_md_options( $mod );
			if ( is_array( $md_opts  ) ) {
				foreach ( $wpsso->cf['form']['weekdays'] as $day => $label ) {
					if ( ! empty( $md_opts['plm_addr_day_'.$day] ) ) {
						return $md_opts;
					}
				}
			}
			return false;
		}

		public static function has_geo( array &$mod ) {

			$wpsso =& Wpsso::get_instance();
			if ( $wpsso->debug->enabled ) {
				$wpsso->debug->mark();
			}

			$addr_opts = false;
			if ( $mod['is_home_index'] ) {
				if ( isset( $wpsso->options['plm_addr_for_home'] ) &&
					is_numeric( $wpsso->options['plm_addr_for_home'] ) ) {
					if ( ( $addr_opts = self::get_addr_id( $wpsso->options['plm_addr_for_home'] ) ) === false ) {
						if ( $wpsso->debug->enabled ) {
							$wpsso->debug->log( 'no geo coordinates for address id '.$wpsso->options['plm_addr_for_home'] );
						}
					} else {
						// allow for latitude and/or longitude of 0
						if ( isset( $addr_opts['plm_addr_latitude'] ) && $addr_opts['plm_addr_latitude'] !== '' && 
							isset( $addr_opts['plm_addr_longitude'] ) && $addr_opts['plm_addr_longitude'] !== '' ) {
							return $addr_opts;
						} else {
							return false;
						}
					}

				}
			} elseif ( is_object( $mod['obj'] ) ) {
				if ( ( $addr_opts = self::has_md_days( $mod ) ) === false ) {
					if ( $wpsso->debug->enabled ) {
						$wpsso->debug->log( 'no geo coordinates from module object' );
					}
				}
			} elseif ( $wpsso->debug->enabled ) {
				$wpsso->debug->log( 'not home index and no module object' );
			}

			return $addr_opts;
		}

		public static function has_md_geo( array &$mod ) {
			if ( ! is_object( $mod['obj'] ) )	// just in case
				return false;
			$md_opts = self::get_md_options( $mod );
			if ( is_array( $md_opts  ) ) {
				// allow for latitude and/or longitude of 0
				if ( isset( $md_opts['plm_addr_latitude'] ) && $md_opts['plm_addr_latitude']!== '' && 
					isset( $md_opts['plm_addr_longitude'] ) && $md_opts['plm_addr_longitude'] !== '' ) {
					return $md_opts;
				}
			}
			return false;
		}

		public static function get_md_options( array &$mod ) {
			if ( ! is_object( $mod['obj'] ) ) {	// just in case
				return array();
			}

			$wpsso =& Wpsso::get_instance();

			if ( $wpsso->debug->enabled ) {
				$wpsso->debug->mark();
			}

			if ( ! isset( self::$mod_md_opts[$mod['name']][$mod['id']] ) ) {	// make sure a cache entry exists
				self::$mod_md_opts[$mod['name']][$mod['id']] = array();
			} else {
				return self::$mod_md_opts[$mod['name']][$mod['id']];		// return the cache entry
			}

			$md_opts =& self::$mod_md_opts[$mod['name']][$mod['id']];		// shortcut variable
			$md_opts = $mod['obj']->get_options( $mod['id'] );			// returns empty string if no meta found

			if ( is_array( $md_opts  ) ) {

				if ( isset( $md_opts['plm_addr_id'] ) && is_numeric( $md_opts['plm_addr_id'] ) ) {	// allow for 0
					if ( ( $addr_opts = self::get_addr_id( $md_opts['plm_addr_id'] ) ) !== false ) {
						if ( $wpsso->debug->enabled ) {
							$wpsso->debug->log( 'using address ID '.$md_opts['plm_addr_id'].' options' );
						}
						$md_opts = array_merge( $md_opts, $addr_opts );
					}
				}

				$md_opts = SucomUtil::preg_grep_keys( '/^plm_/', $md_opts );	// only return plm options

				if ( ! empty( $md_opts ) ) { 
					if ( empty( $md_opts['plm_addr_country'] ) ) {
						$md_opts['plm_addr_country'] = isset( $wpsso->options['plm_addr_def_country'] ) ?
							$wpsso->options['plm_addr_def_country'] : 'none';
					}
				}
			}

			return $md_opts;
		}

		// text value for http://schema.org/address
		public static function get_addr_line( array $addr_opts ) {
			$address = '';
			foreach ( array( 
				'plm_addr_streetaddr',
				'plm_addr_po_box_number',
				'plm_addr_city',
				'plm_addr_state',
				'plm_addr_zipcode',
				'plm_addr_country',
			) as $key ) {
				if ( isset( $addr_opts[$key] ) && $addr_opts[$key] !== '' && $addr_opts[$key] !== 'none' ) {
					switch ( $key ) {
						case 'plm_addr_name':
							$addr_opts[$key] = preg_replace( '/\s*,\s*/', ' ', $addr_opts[$key] );	// just in case
							break;
						case 'plm_addr_po_box_number':
							$address = rtrim( $address, ', ' ).' #';	// continue street address
							break;
					}
					$address .= $addr_opts[$key].', ';
				}
			}
			return rtrim( $address, ', ' );
		}

		public static function get_addr_names() {

			$wpsso =& Wpsso::get_instance();

			if ( $wpsso->debug->enabled ) {
				$wpsso->debug->mark();
			}

			return SucomUtil::get_multi_key_locale( 'plm_addr_name', $wpsso->options, false );
		}

		// get a specific address id
		// if $id is 'custom' then $mixed must be the $mod array
		public static function get_addr_id( $id, $mixed = 'current' ) {

			$wpsso =& Wpsso::get_instance();

			if ( $wpsso->debug->enabled ) {
				$wpsso->debug->log_args( array( 
					'id' => $id,
					'mixed' => $mixed,
				) );
			}

			$addr_opts = array();

			if ( $id === 'custom' &&	// get custom address values from the post
				isset( $mixed['obj'] ) &&
					is_object( $mixed['obj'] ) ) {

				$md_opts = self::get_md_options( $mixed );				// returns all plm options from the post
				foreach ( SucomUtil::preg_grep_keys( '/^(plm_addr_.*)(#.*)?$/', 	// filter for all address options
					$md_opts, false, '$1' ) as $opt_idx => $value ) {
					$addr_opts[$opt_idx] = SucomUtil::get_locale_opt( $opt_idx, $md_opts, $mixed );
				}
			} elseif ( is_numeric( $id ) ) {
				foreach ( SucomUtil::preg_grep_keys( '/^(plm_addr_.*_)'.$id.'(#.*)?$/',
					$wpsso->options, false, '$1' ) as $opt_prefix => $value ) {	// allow '[:_]' as separator
					$opt_idx = rtrim( $opt_prefix, '_' );
					$addr_opts[$opt_idx] = SucomUtil::get_locale_opt( $opt_prefix.$id,
						$wpsso->options, $mixed );
				}
			}

			if ( $wpsso->debug->enabled ) {
				$wpsso->debug->log( $addr_opts );
			}

			if ( empty( $addr_opts ) ) {
				return false; 
			} else {
				return array_merge( WpssoPlmConfig::$cf['form']['plm_addr_opts'], $addr_opts );	// complete the array
			}
		}
	}
}

?>
