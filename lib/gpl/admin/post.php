<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2016 Jean-Sebastien Morisset (http://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoPlmGplAdminPost' ) ) {

	class WpssoPlmGplAdminPost {

		public function __construct( &$plugin ) {
			$this->p =& $plugin;
			$this->p->util->add_plugin_filters( $this, array( 
				'post_social_settings_tabs' => 2,	// $tabs, $mod
				'post_plm_rows' => 4,			// $table_rows, $form, $head, $mod
			), 200 );
		}

		public function filter_post_social_settings_tabs( $tabs, $mod ) {
			if ( empty( $this->p->options['plm_add_to_'.$mod['post_type']] ) )
				return $tabs;
			$new_tabs = array();
			foreach ( $tabs as $key => $val ) {
				$new_tabs[$key] = $val;
				if ( $key === 'media' )
					$new_tabs['plm'] = _x( 'Place / Location',
						'metabox tab', 'wpsso-plm' );
			}
			return $new_tabs;
		}

		public function filter_post_plm_rows( $table_rows, $form, $head, $mod ) {

			$address_ids['custom'] = WpssoPlmConfig::$cf['form']['plm_address']['custom'];

			$table_rows[] = '<td colspan="2" align="center">'.
				$this->p->msgs->get( 'pro-feature-msg',
					array( 'lca' => 'wpssoplm' ) ).'</td>';

			$form_rows = array(
				'subsection_schema_place' => array(
					'td_class' => 'subsection top',
					'header' => 'h4',
					'label' => _x( 'Pinterest Rich Pin / Schema Place', 'metabox title', 'wpsso-plm' )
				),
				'plm_place' => array(
					'label' => _x( 'Content is a <em>Place</em>', 'option label', 'wpsso-plm' ),
					'th_class' => 'medium', 'tooltip' => 'post-plm_place', 'td_class' => 'blank',
					'content' => $form->get_no_checkbox( 'plm_place' ),
				),
				'plm_type' => array(
					'label' => _x( 'Schema Place Type', 'option label', 'wpsso-plm' ),
					'th_class' => 'medium', 'tooltip' => 'post-plm_type', 'td_class' => 'blank',
					'content' => $form->get_no_select( 'plm_type', WpssoPlmConfig::$cf['form']['plm_type'] ),
				),
				'plm_addr_id' => array(
					'label' => _x( 'Select an Address', 'option label', 'wpsso-plm' ),
					'th_class' => 'medium', 'tooltip' => 'post-plm_addr_id', 'td_class' => 'blank',
					'content' => $form->get_no_select( 'plm_addr_id', $address_ids, 'full_name', '', true ),
				),
				'plm_streetaddr' => array(
					'label' => _x( 'Street Address', 'option label', 'wpsso-plm' ),
					'th_class' => 'medium', 'tooltip' => 'post-plm_streetaddr', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( '', 'wide' ),
				),
				'plm_po_box_number' => array(
					'label' => _x( 'P.O. Box Number', 'option label', 'wpsso-plm' ),
					'th_class' => 'medium', 'tooltip' => 'post-plm_po_box_number', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( '' ),
				),
				'plm_city' => array(
					'label' => _x( 'City', 'option label', 'wpsso-plm' ),
					'th_class' => 'medium', 'tooltip' => 'post-plm_city', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( '' ),
				),
				'plm_state' => array(
					'label' => _x( 'State / Province', 'option label', 'wpsso-plm' ),
					'th_class' => 'medium', 'tooltip' => 'post-plm_state', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( '' ),
				),
				'plm_zipcode' => array(
					'label' => _x( 'Zip / Postal Code', 'option label', 'wpsso-plm' ),
					'th_class' => 'medium', 'tooltip' => 'post-plm_zipcode', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( '' ),
				),
				'plm_country' => array(
					'label' => _x( 'Country', 'option label', 'wpsso-plm' ),
					'th_class' => 'medium', 'tooltip' => 'post-plm_country', 'td_class' => 'blank',
					'content' => $form->get_no_select_country( 'plm_country' ),
				),
				'subsection_opengraph' => array(
					'td_class' => 'subsection',
					'header' => 'h4',
					'label' => _x( 'Facebook / Open Graph Location', 'metabox title', 'wpsso-plm' )
				),
				'plm_latitude' => array(
					'label' => _x( 'Latitude', 'option label', 'wpsso-plm' ),
					'th_class' => 'medium', 'tooltip' => 'post-plm_latitude',
					'content' => $form->get_input( 'plm_latitude', 'required' ),
				),
				'plm_longitude' => array(
					'label' => _x( 'Longitude', 'option label', 'wpsso-plm' ),
					'th_class' => 'medium', 'tooltip' => 'post-plm_longitude',
					'content' => $form->get_input( 'plm_longitude', 'required' ),
				),
				'plm_altitude' => array(
					'label' => _x( 'Altitude in Meters', 'option label', 'wpsso-plm' ),
					'th_class' => 'medium', 'tooltip' => 'post-plm_altitude',
					'content' => $form->get_input( 'plm_altitude' ),
				),
			);

			return $form->get_md_form_rows( $table_rows, $form_rows, $head, $mod );
		}
	}
}

?>
