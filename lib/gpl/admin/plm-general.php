<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2015 - Jean-Sebastien Morisset - http://surniaulula.com/
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlmGplAdminPlmgeneral' ) ) {

	class WpssoPlmGplAdminPlmgeneral {

		public function __construct( &$plugin ) {
			$this->p =& $plugin;
			$this->p->util->add_plugin_filters( $this, array( 
				'meta_tabs' => 1,		// add the Place / Location tab
				'meta_plm_rows' => 3,		// content for the Place / Location tab
			), 200 );
		}

		public function filter_meta_tabs( $tabs ) {
			if ( ( $obj = $this->p->util->get_post_object() ) === false ) 
				return $tabs;
			$post_type = get_post_type_object( $obj->post_type );
			if ( empty( $this->p->options[ 'plm_add_to_'.$post_type->name ] ) )
				return $tabs;
			$new_tabs = array();
			foreach ( $tabs as $key => $val ) {
				$new_tabs[$key] = $val;
				if ( $key === 'media' )
					$new_tabs['plm'] = 'Place / Location';
			}
			return $new_tabs;
		}

		public function filter_meta_plm_rows( $rows, $form, $post_info ) {

			$rows[] = '<td colspan="2" class="subsection" style="margin-top:0;"><h4>Pinterest Place Rich Pin</h4></td>';

			$rows[] = '<td colspan="2" align="center">'.$this->p->msgs->get( 'pro-feature-msg', 
				array( 'lca' => 'wpssoplm' ) ).'</td>';

			$rows[] = $this->p->util->th( 'Share as a <em>Place</em>', 'medium', 'postmeta-plm_place' ). 
			'<td class="blank">'.$form->get_no_checkbox( 'plm_place' ).'</td>';

			$rows[] = $this->p->util->th( 'Street Address', 'medium', 'postmeta-plm_streetaddr' ). 
			'<td class="blank">'.$form->get_options( 'plm_streetaddr' ).'</td>';

			$rows[] = $this->p->util->th( 'City', 'medium', 'postmeta-plm_city' ). 
			'<td class="blank">'.$form->get_options( 'plm_city' ).'</td>';

			$rows[] = $this->p->util->th( 'State / Province', 'medium', 'postmeta-plm_state' ). 
			'<td class="blank">'.$form->get_options( 'plm_state' ).'</td>';

			$rows[] = $this->p->util->th( 'Zip / Postal Code', 'medium', 'postmeta-plm_zipcode' ). 
			'<td class="blank">'.$form->get_options( 'plm_zipcode' ).'</td>';

			$rows[] = $this->p->util->th( 'Country', 'medium', 'postmeta-plm_country' ). 
			'<td class="blank">'.$form->get_options( 'plm_country' ).'</td>';

			$rows[] = '<td colspan="2" class="subsection"><h4>Facebook / Open Graph Location</h4></td>';

			$rows[] = $this->p->util->th( 'Latitude', 'medium', 'postmeta-plm_latitude' ). 
			'<td>'.$form->get_input( 'plm_latitude', 'required' ).'</td>';

			$rows[] = $this->p->util->th( 'Longitude', 'medium', 'postmeta-plm_longitude' ). 
			'<td>'.$form->get_input( 'plm_longitude', 'required' ).'</td>';

			$rows[] = $this->p->util->th( 'Altitude in Feet', 'medium', 'postmeta-plm_altitude' ). 
			'<td>'.$form->get_input( 'plm_altitude' ).'</td>';

			return $rows;
		}
	}
}

?>
