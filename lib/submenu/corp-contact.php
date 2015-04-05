<?php
/*
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.txt
Copyright 2014-2015 - Jean-Sebastien Morisset - http://surniaulula.com/
*/

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlmSubmenuCorpContact' ) && class_exists( 'WpssoAdmin' ) ) {

	class WpssoPlmSubmenuCorpContact extends WpssoAdmin {

		public function __construct( &$plugin, $id, $name ) {
			$this->p =& $plugin;
			$this->menu_id = $id;
			$this->menu_name = $name;
		}

		protected function add_meta_boxes() {
			// add_meta_box( $id, $title, $callback, $post_type, $context, $priority, $callback_args );
			add_meta_box( $this->pagehook.'_corp_contact', 'Corporate Contacts', 
				array( &$this, 'show_metabox_corp_contact' ), $this->pagehook, 'normal' );
		}

		public function show_metabox_corp_contact() {
			$metabox = 'cc';
			$tabs = apply_filters( $this->p->cf['lca'].'_'.$metabox.'_tabs', array( 
				'location' => 'Corporate Locations',
				'contact_point' => 'Contact Points',
			) );
			$rows = array();
			foreach ( $tabs as $key => $title )
				$rows[$key] = array_merge( $this->get_rows( $metabox, $key ), 
					apply_filters( $this->p->cf['lca'].'_'.$metabox.'_'.$key.'_rows', array(), $this->form ) );
			$this->p->util->do_tabs( $metabox, $tabs, $rows );
		}

		protected function get_rows( $metabox, $key ) {
			$rows = array();
			switch ( $metabox.'-'.$key ) {
				case 'cc-location':
					$locations = SucomUtil::preg_grep_keys( '/^plm_cc_name_/', 
						$this->p->options, false, '' );

					ksort( $locations );				// sort array keys to find the highest key integer
					$sorted_keys = array_keys( $locations );	// end requires a variable
					$next_id = (int) end( $sorted_keys ) + 1;

					natsort( $locations );				// sort values to display in select box
					$sorted_keys = array_keys( $locations );	// reset requires a variable
					$first_id = (int) reset( $sorted_keys );

					$locations[$next_id] = '[Add New Location]';

					$id = isset( $_GET['plm_cc_edit_id'] ) ?
						(int) $_GET['plm_cc_edit_id'] : $first_id;

					$rows[] = $this->p->util->th( 'Edit Location' ).
					'<td>'.$this->form->get_select( 'plm_cc_edit_id', 
						$locations, '', '', true, false, $id, true ).'</td>';

					$rows[] = $this->p->util->th( 'Location Name' ). 
					'<td>'.$this->form->get_input( 'plm_cc_name_'.$id ).'</td>';
		
					$rows[] = $this->p->util->th( 'Street Address' ). 
					'<td>'.$this->form->get_input( 'plm_cc_streetaddr_'.$id, 'wide' ).'</td>';
		
					$rows[] = $this->p->util->th( 'City' ). 
					'<td>'.$this->form->get_input( 'plm_cc_city_'.$id ).'</td>';
		
					$rows[] = $this->p->util->th( 'State / Province' ). 
					'<td>'.$this->form->get_input( 'plm_cc_state_'.$id ).'</td>';
		
					$rows[] = $this->p->util->th( 'Zip / Postal Code' ). 
					'<td>'.$this->form->get_input( 'plm_cc_zipcode_'.$id ).'</td>';
		
					$rows[] = $this->p->util->th( 'Country' ). 
					'<td>'.$this->form->get_input( 'plm_cc_country_'.$id ).'</td>';
		
					$rows[] = $this->p->util->th( 'Latitude' ). 
					'<td>'.$this->form->get_input( 'plm_cc_latitude_'.$id ).'</td>';
		
					$rows[] = $this->p->util->th( 'Longitude' ). 
					'<td>'.$this->form->get_input( 'plm_cc_longitude_'.$id ).'</td>';
		
					$rows[] = $this->p->util->th( 'Altitude in Feet' ). 
					'<td>'.$this->form->get_input( 'plm_cc_altitude_'.$id ).'</td>';
	
					break;

				case 'cc-contact_point':

					$rows[] = $this->p->util->th( 'Edit Contact Point', null, 'cc_edit_contact_point' ).
					'<td></td>';

					break;

			}
			return $rows;
		}
	}
}

?>
