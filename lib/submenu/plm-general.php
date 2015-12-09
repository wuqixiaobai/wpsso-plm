<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2015 - Jean-Sebastien Morisset - http://surniaulula.com/
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlmSubmenuPlmgeneral' ) && class_exists( 'WpssoAdmin' ) ) {

	class WpssoPlmSubmenuPlmgeneral extends WpssoAdmin {

		public function __construct( &$plugin, $id, $name ) {
			$this->p =& $plugin;
			$this->menu_id = $id;
			$this->menu_name = $name;
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
				$this->get_rows( $metabox, 'general' ), $this->form ) as $row )
					echo '<tr>'.$row.'</tr>';
			echo '</table>';
		}

		protected function get_rows( $metabox, $key ) {
			$rows = array();
			switch ( $metabox.'-'.$key ) {
				case 'plm-general':

					$rows[] = '<td colspan="2">'.$this->p->msgs->get( 'info-place-general' ).'</td>';

					$checkboxes = '';
					foreach ( $this->p->util->get_post_types() as $post_type )
						$checkboxes .= '<p>'.$this->form->get_checkbox( 'plm_add_to_'.$post_type->name ).' '.
							$post_type->label.' '.( empty( $post_type->description ) ? 
								'' : '('.$post_type->description.')' ).'</p>';

					$rows[] = $this->p->util->get_th( _x( 'Show Tab on Post Types',
						'option label', 'wpsso-plm' ), null, 'plm_add_to' ).'<td>'.$checkboxes.'</td>';

					break;

			}
			return $rows;
		}
	}
}

?>
