<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2016 Jean-Sebastien Morisset (http://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlmGplAdminPlmcontact' ) ) {

	class WpssoPlmGplAdminPlmcontact {

		public function __construct( &$plugin ) {
			$this->p =& $plugin;
			$this->p->util->add_plugin_filters( $this, array( 
				'contact_address_rows' => 2,	// $table_rows, $form
			) );
		}

		public function filter_contact_address_rows( $table_rows, $form ) {

			$address_ids['0'] = WpssoPlmConfig::$cf['form']['plm_address']['new'];

			$table_rows[] = '<td colspan="2" align="center">'.
				$this->p->msgs->get( 'pro-feature-msg', 
					array( 'lca' => 'wpssoplm' ) ).'</td>';

			$table_rows['plm_addr_id'] = $form->get_th_html( _x( 'Edit an Address',
				'option label', 'wpsso-plm' ) ).
			'<td class="blank">'.$form->get_no_select( 'plm_addr_id',
				$address_ids, 'full_name', '', true, true ).'</td>';

			foreach ( $address_ids as $id => $name ) {

				$table_rows['plm_addr_name_'.$id] = $form->get_th_html( _x( 'Address Name',
					'option label', 'wpsso-plm' ) ). 
				'<td class="blank">'.$form->get_no_input_value( '', 'full_name required' ).'</td>';
	
				$table_rows['plm_addr_streetaddr_'.$id] = $form->get_th_html( _x( 'Street Address',
					'option label', 'wpsso-plm' ) ). 
				'<td class="blank">'.$form->get_no_input_value( '', 'wide' ).'</td>';
	
				$table_rows['plm_addr_po_box_number_'.$id] = $form->get_th_html( _x( 'P.O. Box Number',
					'option label', 'wpsso-plm' ) ). 
				'<td class="blank">'.$form->get_no_input_value( '' ).'</td>';
	
				$table_rows['plm_addr_city_'.$id] = $form->get_th_html( _x( 'City',
					'option label', 'wpsso-plm' ) ). 
				'<td class="blank">'.$form->get_no_input_value( '' ).'</td>';
	
				$table_rows['plm_addr_state_'.$id] = $form->get_th_html( _x( 'State / Province',
					'option label', 'wpsso-plm' ) ). 
				'<td class="blank">'.$form->get_no_input_value( '' ).'</td>';
	
				$table_rows['plm_addr_zipcode_'.$id] = $form->get_th_html( _x( 'Zip / Postal Code',
					'option label', 'wpsso-plm' ) ). 
				'<td class="blank">'.$form->get_no_input_value( '' ).'</td>';
	
				$form->defaults['plm_addr_country_'.$id] = $this->p->options['plm_def_country'];

				$table_rows['plm_addr_country_'.$id] = $form->get_th_html( _x( 'Country',
					'option label', 'wpsso-plm' ) ). 
				'<td class="blank">'.$form->get_no_select_country( 'plm_addr_country_'.$id,
					'', '', $this->p->options['plm_def_country'] ).'</td>';
	
				$table_rows['plm_addr_latitude_'.$id] = $form->get_th_html( _x( 'Latitude',
					'option label', 'wpsso-plm' ) ). 
				'<td class="blank">'.$form->get_no_input_value( '' ).'</td>';
	
				$table_rows['plm_addr_longitude_'.$id] = $form->get_th_html( _x( 'Longitude',
					'option label', 'wpsso-plm' ) ). 
				'<td class="blank">'.$form->get_no_input_value( '' ).'</td>';
	
				$table_rows['plm_addr_altitude_'.$id] = $form->get_th_html( _x( 'Altitude in Meters',
					'option label', 'wpsso-plm' ) ). 
				'<td class="blank">'.$form->get_no_input_value( '' ).'</td>';
			}

			return $table_rows;
		}
	}
}

?>
