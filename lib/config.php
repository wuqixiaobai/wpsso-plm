<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2016 Jean-Sebastien Morisset (http://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlmConfig' ) ) {

	class WpssoPlmConfig {

		public static $cf = array(
			'plugin' => array(
				'wpssoplm' => array(
					'version' => '1.5.0',	// plugin version
					'short' => 'WPSSO PLM',
					'name' => 'WPSSO Place and Location Meta (WPSSO PLM)',
					'desc' => 'WPSSO extension to provide Facebook / Open Graph "Location" and Pinterest "Place" Rich Pin meta tags.',
					'slug' => 'wpsso-plm',
					'base' => 'wpsso-plm/wpsso-plm.php',
					'update_auth' => 'tid',
					'text_domain' => 'wpsso-plm',
					'domain_path' => '/languages',
					'img' => array(
						'icon_small' => 'images/icon-128x128.png',
						'icon_medium' => 'images/icon-256x256.png',
					),
					'url' => array(
						// wordpress
						'download' => 'https://wordpress.org/plugins/wpsso-plm/',
						'review' => 'https://wordpress.org/support/view/plugin-reviews/wpsso-plm?filter=5&rate=5#postform',
						'readme' => 'https://plugins.svn.wordpress.org/wpsso-plm/trunk/readme.txt',
						'wp_support' => 'https://wordpress.org/support/plugin/wpsso-plm',
						// surniaulula
						'update' => 'http://wpsso.com/extend/plugins/wpsso-plm/update/',
						'purchase' => 'http://wpsso.com/extend/plugins/wpsso-plm/',
						'changelog' => 'http://wpsso.com/extend/plugins/wpsso-plm/changelog/',
						'codex' => 'http://wpsso.com/codex/plugins/wpsso-plm/',
						'faq' => 'http://wpsso.com/codex/plugins/wpsso-plm/faq/',
						'notes' => '',
						'feed' => 'http://wpsso.com/category/application/wordpress/wp-plugins/wpsso-plm/feed/',
						'pro_support' => 'http://wpsso-plm.support.wpsso.com/',
					),
					'lib' => array(
						'submenu' => array (
							'wpssoplm-separator-0' => 'PLM Extension',
							'plm-general' => 'Place / Location Meta',
							'plm-contact' => 'Corporate Contacts',
						),
						'gpl' => array(
							'admin' => array(
								'plm-contact' => 'Corporate Contacts',
								'plm-post' => 'Place / Location Tab',
							),
						),
						'pro' => array(
							'admin' => array(
								'plm-contact' => 'Corporate Contacts',
								'plm-post' => 'Place / Location Tab',
							),
							'head' => array(
								'place' => 'Place Meta Tags',
							),
						),
					),
				),
			),
			'form' => array(
				'plm_location' => array(
					'none' => '[None]',
					'custom' => '[Custom Location]',
					'new' => '[New Location]',
				),
				'plm_type' => array(
					'geo' => 'Geographic',
					'postal' => 'Postal Address',
				),
				'plm_md_place' => array(
					'plm_streetaddr' => '',
					'plm_po_box_number' => '',
					'plm_city' => '',
					'plm_state' => '',
					'plm_zipcode' => '',
					'plm_country' => '',
					'plm_latitude' => '',
					'plm_longitude' => '',
					'plm_altitude' => '',
				),
			),
		);

		public static function set_constants( $plugin_filepath ) { 
			define( 'WPSSOPLM_FILEPATH', $plugin_filepath );						
			define( 'WPSSOPLM_PLUGINDIR', trailingslashit( realpath( dirname( $plugin_filepath ) ) ) );
			define( 'WPSSOPLM_PLUGINSLUG', self::$cf['plugin']['wpssoplm']['slug'] );	// wpsso-plm
			define( 'WPSSOPLM_PLUGINBASE', self::$cf['plugin']['wpssoplm']['base'] );	// wpsso-plm/wpsso-plm.php
			define( 'WPSSOPLM_URLPATH', trailingslashit( plugins_url( '', $plugin_filepath ) ) );
		}

		public static function require_libs( $plugin_filepath ) {

			require_once( WPSSOPLM_PLUGINDIR.'lib/register.php' );
			require_once( WPSSOPLM_PLUGINDIR.'lib/filters.php' );
			require_once( WPSSOPLM_PLUGINDIR.'lib/place.php' );

			add_filter( 'wpssoplm_load_lib', array( 'WpssoPlmConfig', 'load_lib' ), 10, 3 );
		}

		// gpl / pro library loader
		public static function load_lib( $ret = false, $filespec = '', $classname = '' ) {
			if ( $ret === false && ! empty( $filespec ) ) {
				$filepath = WPSSOPLM_PLUGINDIR.'lib/'.$filespec.'.php';
				if ( file_exists( $filepath ) ) {
					require_once( $filepath );
					if ( empty( $classname ) )
						return 'wpssoplm'.str_replace( array( '/', '-' ), '', $filespec );
					else return $classname;
				}
			}
			return $ret;
		}
	}
}

?>
