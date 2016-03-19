<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2016 Jean-Sebastien Morisset (http://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlmSubmenuPlmcontact' ) && class_exists( 'WpssoAdmin' ) ) {

	class WpssoPlmSubmenuPlmcontact extends WpssoAdmin {

		public function __construct( &$plugin, $id, $name, $lib, $ext ) {
			$this->p =& $plugin;
			$this->menu_id = $id;
			$this->menu_name = $name;
			$this->menu_lib = $lib;
			$this->menu_ext = $ext;

			if ( $this->p->debug->enabled )
				$this->p->debug->mark();
		}

		protected function add_meta_boxes() {
			// add_meta_box( $id, $title, $callback, $post_type, $context, $priority, $callback_args );
			add_meta_box( $this->pagehook.'_plm_contact', 
				_x( 'Corporate Contacts', 'metabox title', 'wpsso-plm' ), 
					array( &$this, 'show_metabox_plm_contact' ), $this->pagehook, 'normal' );
		}

		public function show_metabox_plm_contact() {
			$metabox = 'cc';
			$tabs = apply_filters( $this->p->cf['lca'].'_'.$metabox.'_tabs', array( 
				'location' => 'Corporate Locations',
			) );
			$table_rows = array();
			foreach ( $tabs as $key => $title )
				$table_rows[$key] = apply_filters( $this->p->cf['lca'].'_'.$metabox.'_'.$key.'_rows', 
					array(), $this->form );
			$this->p->util->do_metabox_tabs( $metabox, $tabs, $table_rows );
		}
	}
}

?>
