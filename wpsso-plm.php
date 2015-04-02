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
 * Tested Up To: 4.1
 * Version: 1.2
 * 
 * Copyright 2014 - Jean-Sebastien Morisset - http://surniaulula.com/
*/

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlm' ) ) {

	class WpssoPlm {

		public $p;				// class object variables

		protected static $instance = null;

		private $opt_version = 'plm2';
		private $min_version = '2.9';
		private $has_min_ver = true;

		public static function &get_instance() {
			if ( self::$instance === null )
				self::$instance = new self;
			return self::$instance;
		}

		public function __construct() {
			require_once ( dirname( __FILE__ ).'/lib/config.php' );
			WpssoPlmConfig::set_constants( __FILE__ );
			WpssoPlmConfig::require_libs( __FILE__ );

			add_filter( 'wpssoplm_installed_version', array( &$this, 'filter_installed_version' ), 10, 1 );
			add_filter( 'wpsso_get_config', array( &$this, 'filter_get_config' ), 20, 1 );

			if ( is_admin() )
				add_action( 'admin_init', array( &$this, 'check_for_wpsso' ) );

			add_action( 'wpsso_init_options', array( &$this, 'init_options' ), 20 );
			add_action( 'wpsso_init_objects', array( &$this, 'init_objects' ), 10 );
			add_action( 'wpsso_init_plugin', array( &$this, 'init_plugin' ), 20 );
		}

		// this filter is executed at init priority -1
		public function filter_get_config( $cf ) {
			if ( version_compare( $cf['plugin']['wpsso']['version'], $this->min_version, '<' ) ) {
				$this->has_min_ver = false;
				return $cf;
			}
			$cf['opt']['version'] .= $this->opt_version;
			$cf = SucomUtil::array_merge_recursive_distinct( $cf, WpssoPlmConfig::$cf );
			return $cf;
		}

		public function check_for_wpsso() {
			if ( ! class_exists( 'Wpsso' ) ) {
				require_once( ABSPATH.'wp-admin/includes/plugin.php' );
				deactivate_plugins( WPSSOPLM_PLUGINBASE );
				wp_die( '<p>'. sprintf( __( 'WPSSO PLM requires the use of WPSSO &mdash; Please install and activate the WPSSO plugin before re-activating this extension.', WPSSOPLM_TEXTDOM ) ).'</p>' );
			}
		}

		// this action is executed when WpssoOptions::__construct() is executed (class object is created)
		public function init_options() {
			$this->p =& Wpsso::get_instance();
			if ( $this->has_min_ver === false )
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
			$shortname = WpssoPlmConfig::$cf['plugin']['wpssoplm']['short'];
			if ( $this->has_min_ver === false ) {
				$wpsso_version = $this->p->cf['plugin']['wpsso']['version'];
				if ( $this->p->debug_enabled )
					$this->p->debug->log( $shortname.' requires WPSSO version '.
						$this->min_version.' or newer ('.$wpsso_version.' installed)' );
				if ( is_admin() )
					$this->p->notice->err( $shortname.' v'.WpssoPlmConfig::$cf['plugin']['wpssoplm']['version'].
						' requires WPSSO v'.$this->min_version.' or newer ('.$wpsso_version.' is currently installed).', true );
				return;
			}

			if ( is_admin() && ! empty( $this->p->options['plugin_wpssoplm_tid'] ) && ! $this->p->check->aop( 'wpssoplm', false ) )
				$this->p->notice->inf( 'An Authentication ID was entered for '.
					$shortname.', but the Pro version is not installed yet &ndash; don\'t forget to update the '.
					$shortname.' plugin to install the Pro version.', true );
		}

		public function filter_installed_version( $version ) {
			if ( ! $this->p->check->aop( 'wpssoplm', false ) )
				$version = '0.'.$version;
			return $version;
		}
	}

        global $wpssoplm;
	$wpssoplm = WpssoPlm::get_instance();
}

?>
