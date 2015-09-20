<?php
/*
 * Plugin Name: WPSSO Place and Location Meta (WPSSO PLM)
 * Plugin URI: http://surniaulula.com/extend/plugins/wpsso-plm/
 * Author: Jean-Sebastien Morisset
 * Author URI: http://surniaulula.com/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Description: WPSSO extension to provide Open Graph / Facebook Location and Pinterest Place Rich Pin meta tags.
 * Requires At Least: 3.1
 * Tested Up To: 4.3.1
 * Version: 1.3.6
 * 
 * Copyright 2014-2015 - Jean-Sebastien Morisset - http://surniaulula.com/
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlm' ) ) {

	class WpssoPlm {

		public $p;			// Wpsso
		public $reg;			// WpssoPlmRegister

		protected static $instance = null;

		private static $wpsso_short = 'WPSSO';
		private static $wpsso_name = 'WordPress Social Sharing Optimization (WPSSO)';
		private static $wpsso_min_version = '3.10';
		private static $wpsso_has_min_ver = true;
		private static $opt_version_suffix = 'plm2';

		public static function &get_instance() {
			if ( self::$instance === null )
				self::$instance = new self;
			return self::$instance;
		}

		public function __construct() {

			require_once ( dirname( __FILE__ ).'/lib/config.php' );
			WpssoPlmConfig::set_constants( __FILE__ );
			WpssoPlmConfig::require_libs( __FILE__ );
			$this->reg = new WpssoPlmRegister();		// activate, deactivate, uninstall hooks

			if ( is_admin() )
				add_action( 'admin_init', array( &$this, 'check_for_wpsso' ) );

			add_filter( 'wpsso_get_config', array( &$this, 'wpsso_get_config' ), 20, 1 );
			add_action( 'wpsso_init_options', array( &$this, 'wpsso_init_options' ), 20 );
			add_action( 'wpsso_init_objects', array( &$this, 'wpsso_init_objects' ), 10 );
			add_action( 'wpsso_init_plugin', array( &$this, 'wpsso_init_plugin' ), 20 );
		}

		public function check_for_wpsso() {
			if ( ! class_exists( 'Wpsso' ) )
				add_action( 'all_admin_notices', array( __CLASS__, 'wpsso_missing_notice' ) );
		}

		public static function wpsso_missing_notice( $deactivate = false ) {
			$lca = 'wpssoplm';
			$name = WpssoPlmConfig::$cf['plugin'][$lca]['name'];
			$short = WpssoPlmConfig::$cf['plugin'][$lca]['short'];
			if ( $deactivate === true ) {
				require_once( ABSPATH.'wp-admin/includes/plugin.php' );
				deactivate_plugins( WPSSOPLM_PLUGINBASE );
				wp_die( '<p>'.sprintf( __( 'The %s extension requires the %s plugin &mdash; please install and '.
					'activate the %s plugin before trying to re-activate the %s extension.', WPSSOPLM_TEXTDOM ), 
						$name, self::$wpsso_name, self::$wpsso_short, $short ).'</p>' );
			} else echo '<div class="error"><p>'.sprintf( __( 'The %s extension requires the %s plugin &mdash; '.
					'please install and activate the %s plugin.', WPSSOPLM_TEXTDOM ), 
						$name, self::$wpsso_name, self::$wpsso_short ).'</p></div>';
		}

		public function wpsso_get_config( $cf ) {
			if ( version_compare( $cf['plugin']['wpsso']['version'], self::$wpsso_min_version, '<' ) ) {
				self::$wpsso_has_min_ver = false;
				return $cf;
			}
			$cf['opt']['version'] .= '-'.self::$opt_version_suffix.
				( is_dir( trailingslashit( dirname( __FILE__ ) ).'lib/pro/' ) ? 'pro' : 'gpl' );
			$cf = SucomUtil::array_merge_recursive_distinct( $cf, WpssoPlmConfig::$cf );
			return $cf;
		}

		public function wpsso_init_options() {
			$this->p =& Wpsso::get_instance();
			if ( self::$wpsso_has_min_ver === false )
				return;
			$this->p->is_avail['plm'] = true;
			$this->p->is_avail['admin']['plm-general'] = true;
			$this->p->is_avail['head']['place-meta'] = true;
		}

		public function wpsso_init_objects() {
			if ( self::$wpsso_has_min_ver === false )
				return;		// stop here
			WpssoPlmConfig::load_lib( false, 'filters' );
			$this->p->plm = new WpssoPlmFilters( $this->p, __FILE__ );
		}

		public function wpsso_init_plugin() {
			if ( self::$wpsso_has_min_ver === false )
				return $this->warning_wpsso_version( WpssoPlmConfig::$cf['plugin']['wpssoplm'] );
		}

		private function warning_wpsso_version( $info ) {
			$wpsso_version = $this->p->cf['plugin']['wpsso']['version'];
			if ( $this->p->debug->enabled )
				$this->p->debug->log( $info['name'].' requires WPSSO version '.self::$wpsso_min_version.
					' or newer ('.$wpsso_version.' installed)' );
			if ( is_admin() )
				$this->p->notice->err( 'The '.$info['name'].' version '.$info['version'].
					' extension requires WPSSO version '.self::$wpsso_min_version.
					' or newer (version '.$wpsso_version.' is currently installed).', true );
		}
	}

        global $wpssoplm;
	$wpssoplm = WpssoPlm::get_instance();
}

?>
