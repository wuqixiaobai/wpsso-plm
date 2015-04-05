<?php
/*
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.txt
Copyright 2014-2015 - Jean-Sebastien Morisset - http://surniaulula.com/
*/

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlmConfig' ) ) {

	class WpssoPlmConfig {

		public static $cf = array(
			'plugin' => array(
				'wpssoplm' => array(
					'version' => '1.3dev1',	// plugin version
					'short' => 'WPSSO PLM',
					'name' => 'WPSSO Place and Location Meta (WPSSO PLM)',
					'desc' => 'WPSSO extension to provide Facebook / Open Graph "Location" and Pinterest "Place" Rich Pin meta tags.',
					'slug' => 'wpsso-plm',
					'base' => 'wpsso-plm/wpsso-plm.php',
					'img' => array(
						'icon_small' => 'images/icon-128x128.png',
						'icon_medium' => 'images/icon-256x256.png',
					),
					'url' => array(
						// wordpress
						'download' => 'https://wordpress.org/plugins/wpsso-plm/',
						'review' => 'https://wordpress.org/support/view/plugin-reviews/wpsso-plm#postform',
						'readme' => 'https://plugins.svn.wordpress.org/wpsso-plm/trunk/readme.txt',
						'wp_support' => 'https://wordpress.org/support/plugin/wpsso-plm',
						// surniaulula
						'update' => 'http://surniaulula.com/extend/plugins/wpsso-plm/update/',
						'purchase' => 'http://surniaulula.com/extend/plugins/wpsso-plm/',
						'changelog' => 'http://surniaulula.com/extend/plugins/wpsso-plm/changelog/',
						'codex' => 'http://surniaulula.com/codex/plugins/wpsso-plm/',
						'faq' => 'http://surniaulula.com/codex/plugins/wpsso-plm/faq/',
						'notes' => '',
						'feed' => 'http://surniaulula.com/category/application/wordpress/wp-plugins/wpsso-plm/feed/',
						'pro_support' => 'http://support.wpsso-plm.surniaulula.com/',
						'pro_ticket' => 'http://ticket.wpsso-plm.surniaulula.com/',
					),
					'lib' => array(
						'submenu' => array (
							'wpssoplm-separator-0' => 'PLM Extension',
							'plm-general' => 'Place and Location Meta',
							'corp-contact' => 'Corporate Contacts',
						),
						'gpl' => array(
							'admin' => array(
								'plm-general' => 'Place and Location Meta',
							),
						),
						'pro' => array(
							'admin' => array(
								'plm-general' => 'Place and Location Meta',
							),
							'head' => array(
								'place-meta' => 'Place Meta Tags',
							),
						),
					),
					'cp' => array(
					)
				),
			),
		);

		public static function set_constants( $plugin_filepath ) { 
			$lca = 'wpssoplm';
			$slug = self::$cf['plugin'][$lca]['slug'];

			define( 'WPSSOPLM_FILEPATH', $plugin_filepath );						
			define( 'WPSSOPLM_PLUGINDIR', trailingslashit( plugin_dir_path( $plugin_filepath ) ) );
			define( 'WPSSOPLM_PLUGINBASE', plugin_basename( $plugin_filepath ) );
			define( 'WPSSOPLM_TEXTDOM', $slug );
			define( 'WPSSOPLM_URLPATH', trailingslashit( plugins_url( '', $plugin_filepath ) ) );
		}

		public static function require_libs( $plugin_filepath ) {
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
