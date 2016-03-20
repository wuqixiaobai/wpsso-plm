<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2016 Jean-Sebastien Morisset (http://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlmAddress' ) ) {

	class WpssoPlmAddress {

		protected $p;

		public function __construct( &$plugin ) {
			$this->p =& $plugin;

			if ( $this->p->debug->enabled )
				$this->p->debug->mark();
		}

		public static function get_md_options( &$mod ) {
			$wpsso =& Wpsso::get_instance();

			if ( $wpsso->debug->enabled )
				$wpsso->debug->mark();

			$md_opts = $mod['obj']->get_options( $mod['id'] );

			if ( ! empty( $md_opts['plm_address'] ) && 
				$md_opts['plm_address'] !== 'none' ) {

				$addr_opts = SucomUtil::preg_grep_keys( '/^(plm_)addr_(.*)_'.$md_opts['plm_address'].'$/',
					$wpsso->options, false, '$1$2' );

				if ( $wpsso->debug->enabled ) {
					$wpsso->debug->log( 'using corporate contact ID '.$md_opts['plm_address'] );
					$wpsso->debug->log( $addr_opts );
				}

				// reset address / place to defaults, then apply the contact address
				$md_opts = array_merge( $md_opts, WpssoPlmConfig::$cf['form']['plm_md_place'], $addr_opts );
			}

			return SucomUtil::preg_grep_keys( '/^plm_/', $md_opts );
		}

		// options may be provided when saving post meta data
		public static function get_ids( $opts = array() ) {
			$wpsso =& Wpsso::get_instance();

			if ( $wpsso->debug->enabled )
				$wpsso->debug->mark();

			if ( empty( $opts ) )
				$opts = $wpsso->options;

			$address_ids = SucomUtil::preg_grep_keys( '/^plm_addr_name_([0-9]+)$/', $opts, false, '$1' );

			natsort( $address_ids );	// sort values to display in select box

			return $address_ids;
		}

		public static function get_ids_first_next() {
			$wpsso =& Wpsso::get_instance();

			if ( $wpsso->debug->enabled )
				$wpsso->debug->mark();

			$address_ids = self::get_ids();

			ksort( $address_ids );		// sort keys to find highest / lowest key integer

			$sorted_keys = array_keys( $address_ids );
			$first_id = (int) reset( $sorted_keys );
			$last_id = (int) end( $sorted_keys );
			$next_id = $last_id > 0 ? $last_id + 1 : 0;

			natsort( $address_ids );	// sort values to display in select box

			return array( $address_ids, $first_id, $next_id );
		}
	}
}

?>
