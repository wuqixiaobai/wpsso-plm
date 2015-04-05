<?php
/*
 * Plugin Name: WPSSO Place and Location Meta (WPSSO PLM)
 * Plugin URI: http://surniaulula.com/extend/plugins/wpsso-plm/
 * Author: Jean-Sebastien Morisset
 * Author URI: http://surniaulula.com/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Description: WPSSO extension to provide Open Graph / Facebook Location and Pinterest Place Rich Pin meta tags.
 * Requires At Least: 3.0
 * Tested Up To: 4.1.1
 * Version: 1.3dev1
 * 
 * Copyright 2014-2015 - Jean-Sebastien Morisset - http://surniaulula.com/
*/

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlm' ) ) {

	class WpssoPlm {

		public $p;				// class object variables

		protected static $instance = null;

		private $opt_version_suffix = 'plm2';
		private $wpsso_min_version = '3.0dev1';
		private $wpsso_has_min_ver = true;

		public static function &get_instance() {
			if ( self::$instance === null )
				self::$instance = new self;
			return self::$instance;
		}

		public function __construct() {
			require_once ( dirname( __FILE__ ).'/lib/config.php' );
			WpssoPlmConfig::set_constants( __FILE__ );
			WpssoPlmConfig::require_libs( __FILE__ );

			add_filter( 'wpsso_get_config', array( &$this, 'filter_get_config' ), 20, 1 );

			if ( is_admin() )
				add_action( 'admin_init', array( &$this, 'check_for_wpsso' ) );
			add_action( 'wpsso_init_options', array( &$this, 'init_options' ), 20 );
			add_action( 'wpsso_init_objects', array( &$this, 'init_objects' ), 10 );
			add_action( 'wpsso_init_plugin', array( &$this, 'init_plugin' ), 20 );
		}

		// this filter is executed at init priority -1
		public function filter_get_config( $cf ) {
			if ( version_compare( $cf['plugin']['wpsso']['version'], $this->wpsso_min_version, '<' ) ) {
				$this->wpsso_has_min_ver = false;
				return $cf;
			}
			$cf['opt']['version'] .= $this->opt_version_suffix;
			$cf = SucomUtil::array_merge_recursive_distinct( $cf, WpssoPlmConfig::$cf );
			return $cf;
		}

		public function check_for_wpsso() {
			if ( ! class_exists( 'Wpsso' ) ) {
				require_once( ABSPATH.'wp-admin/includes/plugin.php' );
				deactivate_plugins( WPSSOPLM_PLUGINBASE );
				wp_die( '<p>'. sprintf( __( 'The WPSSO Place and Location Meta (WPSSO PLM) extension requires the WordPress Social Sharing Optimization (WPSSO) plugin &mdash; Please install and activate WPSSO before re-activating this extension.', WPSSOPLM_TEXTDOM ) ).'</p>' );
			}
		}

		// this action is executed when WpssoOptions::__construct() is executed (class object is created)
		public function init_options() {
			$this->p =& Wpsso::get_instance();
			if ( $this->wpsso_has_min_ver === false )
				return;
			$this->p->is_avail['plm'] = true;
			$this->p->is_avail['admin']['plm-general'] = true;
			$this->p->is_avail['head']['place-meta'] = true;
		}

		public function init_objects() {
			WpssoPlmConfig::load_lib( false, 'filters' );
			$this->p->plm = new WpssoPlmFilters( $this->p, __FILE__ );
		}

		// this action is executed once all class objects have been defined and modules have been loaded
		public function init_plugin() {
			if ( $this->wpsso_has_min_ver === false )
				return $this->min_version_warning( WpssoPlmConfig::$cf['plugin']['wpssoplm'] );

			if ( ! empty( $this->p->options['plugin_wpssoplm_tid'] ) )
				add_filter( 'wpssoplm_installed_version', array( &$this, 'filter_installed_version' ), 10, 1 );
		}

		public function filter_installed_version( $version ) {
			if ( ! $this->p->check->aop( 'wpssoplm', false ) )
				$version = '0.'.$version;
			return $version;
		}

		private function min_version_warning( $info ) {
			$wpsso_version = $this->p->cf['plugin']['wpsso']['version'];
			if ( $this->p->debug->enabled )
				$this->p->debug->log( $info['name'].' requires WPSSO version '.$this->wpsso_min_version.
					' or newer ('.$wpsso_version.' installed)' );
			if ( is_admin() )
				$this->p->notice->err( $info['name'].' v'.$info['version'].' requires WPSSO v'.$this->wpsso_min_version.
					' or newer ('.$wpsso_version.' is currently installed).', true );
		}
	}

        global $wpssoplm;
	$wpssoplm = WpssoPlm::get_instance();
}

?>
