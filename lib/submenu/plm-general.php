<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2016 Jean-Sebastien Morisset (http://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlmSubmenuPlmgeneral' ) && class_exists( 'WpssoAdmin' ) ) {

	class WpssoPlmSubmenuPlmgeneral extends WpssoAdmin {

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
			add_meta_box( $this->pagehook.'_plm_general',
				_x( 'Place and Location Meta', 'metabox title', 'wpsso-plm' ), 
					array( &$this, 'show_metabox_plm_general' ), $this->pagehook, 'normal' );
		}

		public function show_metabox_plm_general() {
			$metabox = 'plm';
			echo '<table class="sucom-setting">';
			foreach ( apply_filters( $this->p->cf['lca'].'_'.$metabox.'_general_rows', 
				$this->get_table_rows( $metabox, 'general' ), $this->form ) as $row )
					echo '<tr>'.$row.'</tr>';
			echo '</table>';
		}

		protected function get_table_rows( $metabox, $key ) {
			$table_rows = array();
			switch ( $metabox.'-'.$key ) {
				case 'plm-general':

					$table_rows[] = '<td colspan="2">'.$this->p->msgs->get( 'info-place-general' ).'</td>';

					$checkboxes = '';
					foreach ( $this->p->util->get_post_types() as $post_type )
						$checkboxes .= '<p>'.$this->form->get_checkbox( 'plm_add_to_'.$post_type->name ).' '.
							$post_type->label.' '.( empty( $post_type->description ) ? 
								'' : '('.$post_type->description.')' ).'</p>';

					$table_rows['plm_add_to'] = $this->form->get_th_html( _x( 'Show Tab on Post Types',
						'option label', 'wpsso-plm' ), null, 'plm_add_to' ).'<td>'.$checkboxes.'</td>';

					$table_rows['plm_def_country'] = $this->form->get_th_html( 'Default Country' ). 
					'<td>'.$this->form->get_select_country( 'plm_def_country', '', '', false,
						$this->p->options['plm_def_country'] ).'</td>';

					break;

			}
			return $table_rows;
		}
	}
}

?>
