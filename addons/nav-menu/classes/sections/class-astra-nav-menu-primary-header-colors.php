<?php
/**
 * Mega Menu Options configurations.
 *
 * @package     Astra Addon
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       1.6.0
 */

// Block direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Customizer config base class does not exist.
if ( ! class_exists( 'Astra_Customizer_Config_Base' ) ) {
	return;
}

if ( ! class_exists( 'Astra_Nav_Menu_Primary_Header_Colors' ) ) {

	/**
	 * Register Mega Menu Customizer Configurations.
	 */
	class Astra_Nav_Menu_Primary_Header_Colors extends Astra_Customizer_Config_Base {

		/**
		 * Register Mega Menu Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.6.0
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array(

				// Option: Megamenu Heading Color.
				array(
					'type'      => 'sub-control',
					'priority'  => 12,
					'tab'       => __( 'Normal', 'astra-addon' ),
					'parent'    => ASTRA_THEME_SETTINGS . '[sticky-header-primary-megamenu-colors]',
					'control'   => 'ast-color',
					'section'   => 'section-sticky-header',
					'transport' => 'postMessage',
					'name'      => 'sticky-primary-header-megamenu-heading-color',
					'default'   => astra_get_option( 'sticky-primary-header-megamenu-heading-color' ),
					'title'     => __( 'Color', 'astra-addon' ),
				),

				// Option: Megamenu Heading Hover Color.
				array(
					'type'      => 'sub-control',
					'priority'  => 12,
					'tab'       => __( 'Hover', 'astra-addon' ),
					'parent'    => ASTRA_THEME_SETTINGS . '[sticky-header-primary-megamenu-colors]',
					'control'   => 'ast-color',
					'section'   => 'section-sticky-header',
					'transport' => 'postMessage',
					'name'      => 'sticky-primary-header-megamenu-heading-h-color',
					'default'   => astra_get_option( 'sticky-primary-header-megamenu-heading-h-color' ),
					'title'     => __( 'Hover Color', 'astra-addon' ),
				),
			);

			if ( ! Astra_Addon_Builder_Helper::$is_header_footer_builder_active ) {

				$new_configs = array(

					/**
					 * Option: Sticky Header primary Color Group
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[sticky-header-primary-megamenu-colors]',
						'default'   => astra_get_option( 'sticky-header-primary-megamenu-colors' ),
						'type'      => 'control',
						'control'   => 'ast-settings-group',
						'title'     => __( 'Mega Menu Column Heading', 'astra-addon' ),
						'section'   => 'section-sticky-header',
						'transport' => 'postMessage',
						'priority'  => 100,
						'context'   => Astra_Addon_Builder_Helper::$is_header_footer_builder_active ?
							Astra_Addon_Builder_Helper::$design_tab : Astra_Addon_Builder_Helper::$general_tab,
					),
				);
				$_configs    = array_merge( $_configs, $new_configs );
			}
			$configurations = array_merge( $configurations, $_configs );

			return $configurations;
		}
	}
}

new Astra_Nav_Menu_Primary_Header_Colors();

