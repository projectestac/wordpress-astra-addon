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

if ( ! class_exists( 'Astra_Nav_Menu_Above_Header_Colors' ) ) {

	/**
	 * Register Mega Menu Customizer Configurations.
	 */
	class Astra_Nav_Menu_Above_Header_Colors extends Astra_Customizer_Config_Base {

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

				/**
				 * Sticky Above Header Colors
				 */

				// Option: Megamenu Heading Color.
				array(
					'type'      => 'sub-control',
					'tab'       => __( 'Normal', 'astra-addon' ),
					'priority'  => 12,
					'parent'    => ASTRA_THEME_SETTINGS . '[sticky-header-above-mega-menus-colors]',
					'control'   => 'ast-color',
					'section'   => 'section-sticky-header',
					'transport' => 'postMessage',
					'name'      => 'sticky-above-header-megamenu-heading-color',
					'default'   => astra_get_option( 'sticky-above-header-megamenu-heading-color' ),
					'title'     => __( 'Color', 'astra-addon' ),
					'context'   => array(
						'relation' => 'OR',
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[above-header-section-1]',
							'operator' => '==',
							'value'    => 'menu',
						),
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[above-header-section-2]',
							'operator' => '==',
							'value'    => 'menu',
						),
					),
				),

				// Option: Megamenu Heading Hover Color.
				array(
					'type'      => 'sub-control',
					'tab'       => __( 'Hover', 'astra-addon' ),
					'priority'  => 12,
					'parent'    => ASTRA_THEME_SETTINGS . '[sticky-header-above-mega-menus-colors]',
					'control'   => 'ast-color',
					'section'   => 'section-sticky-header',
					'transport' => 'postMessage',
					'name'      => 'sticky-above-header-megamenu-heading-h-color',
					'default'   => astra_get_option( 'sticky-above-header-megamenu-heading-h-color' ),
					'title'     => __( 'Color', 'astra-addon' ),
					'context'   => array(
						'relation' => 'OR',
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[above-header-section-1]',
							'operator' => '==',
							'value'    => 'menu',
						),
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[above-header-section-2]',
							'operator' => '==',
							'value'    => 'menu',
						),
					),
				),

			);

			if ( is_callable( 'Astra_Sticky_Header_Configs::is_header_section_active' ) && Astra_Sticky_Header_Configs::is_header_section_active() && ! Astra_Addon_Builder_Helper::$is_header_footer_builder_active ) {

				$_new_config = array(
					/**
					 * Option: Sticky Header Above Menu Color Group
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[sticky-header-above-mega-menus-colors]',
						'default'   => astra_get_option( 'sticky-header-above-mega-menus-colors' ),
						'type'      => 'control',
						'control'   => 'ast-settings-group',
						'title'     => __( 'Mega Menu Column Heading', 'astra-addon' ),
						'section'   => 'section-sticky-header',
						'transport' => 'postMessage',
						'priority'  => 70,
						'context'   => Astra_Addon_Builder_Helper::$is_header_footer_builder_active ?
							Astra_Addon_Builder_Helper::$design_tab : Astra_Addon_Builder_Helper::$general_tab,
					),
				);

				$_configs = array_merge( $_configs, $_new_config );
			}

			$configurations = array_merge( $configurations, $_configs );

			return $configurations;
		}
	}
}

new Astra_Nav_Menu_Above_Header_Colors();
