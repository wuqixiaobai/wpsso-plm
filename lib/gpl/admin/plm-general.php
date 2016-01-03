<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2016 Jean-Sebastien Morisset (http://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlmGplAdminPlmgeneral' ) ) {

	class WpssoPlmGplAdminPlmgeneral {

		public function __construct( &$plugin ) {
			$this->p =& $plugin;
			$this->p->util->add_plugin_filters( $this, array( 
				'post_tabs' => 3,		// add the Place / Location tab
				'post_plm_rows' => 3,		// content for the Place / Location tab
			), 200 );
		}

		public function filter_post_tabs( $tabs, $post, $post_type ) {
			if ( empty( $this->p->options[ 'plm_add_to_'.$post_type->name ] ) )
				return $tabs;
			$new_tabs = array();	// new array to insert plm after media tab
			foreach ( $tabs as $key => $val ) {
				$new_tabs[$key] = $val;
				if ( $key === 'media' )
					$new_tabs['plm'] = _x( 'Place / Location',
						'metabox tab', 'wpsso-plm' );
			}
			return $new_tabs;
		}

		public function filter_post_plm_rows( $rows, $form, $head_info ) {

			$rows[] = '<td colspan="2" class="subsection" style="margin-top:0;"><h4>'.
				__( 'Pinterest Place Rich Pin', 'metabox title', 'wpsso-plm' ).'</h4></td>';

			$rows[] = '<td colspan="2" align="center">'.
				$this->p->msgs->get( 'pro-feature-msg', array( 'lca' => 'wpssoplm' ) ).'</td>';

			$rows[] = $this->p->util->get_th( _x( 'Share as a <em>Place</em>',
				'option label', 'wpsso-plm' ), 'medium', 'post-plm_place' ). 
			'<td class="blank">'.$form->get_no_checkbox( 'plm_place' ).'</td>';

			$rows[] = $this->p->util->get_th( _x( 'Street Address',
				'option label', 'wpsso-plm' ), 'medium', 'post-plm_streetaddr' ). 
			'<td class="blank">'.$form->get_options( 'plm_streetaddr' ).'</td>';

			$rows[] = $this->p->util->get_th( _x( 'City',
				'option label', 'wpsso-plm' ), 'medium', 'post-plm_city' ). 
			'<td class="blank">'.$form->get_options( 'plm_city' ).'</td>';

			$rows[] = $this->p->util->get_th( _x( 'State / Province',
				'option label', 'wpsso-plm' ), 'medium', 'post-plm_state' ). 
			'<td class="blank">'.$form->get_options( 'plm_state' ).'</td>';

			$rows[] = $this->p->util->get_th( _x( 'Zip / Postal Code',
				'option label', 'wpsso-plm' ), 'medium', 'post-plm_zipcode' ). 
			'<td class="blank">'.$form->get_options( 'plm_zipcode' ).'</td>';

			$rows[] = $this->p->util->get_th( _x( 'Country',
				'option label', 'wpsso-plm' ), 'medium', 'post-plm_country' ). 
			'<td class="blank">'.$form->get_options( 'plm_country' ).'</td>';

			$rows[] = '<td colspan="2" class="subsection"><h4>'.
				__( 'Facebook / Open Graph Location', 'metabox title', 'wpsso-plm' ).'</h4></td>';

			$rows[] = $this->p->util->get_th( _x( 'Latitude',
				'option label', 'wpsso-plm' ), 'medium', 'post-plm_latitude' ). 
			'<td>'.$form->get_input( 'plm_latitude', 'required' ).'</td>';

			$rows[] = $this->p->util->get_th( _x( 'Longitude',
				'option label', 'wpsso-plm' ), 'medium', 'post-plm_longitude' ). 
			'<td>'.$form->get_input( 'plm_longitude', 'required' ).'</td>';

			$rows[] = $this->p->util->get_th( _x( 'Altitude in Meters',
				'option label', 'wpsso-plm' ), 'medium', 'post-plm_altitude' ). 
			'<td>'.$form->get_input( 'plm_altitude' ).'</td>';

			return $rows;
		}
	}
}

?>
