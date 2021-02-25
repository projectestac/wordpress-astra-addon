<?php
/**
 * Sticky Header - Panels & Sections
 *
 * @package Astra Addon
 */

// Block direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Customizer config base class does not exist.
if ( ! class_exists( 'Astra_Customizer_Config_Base' ) ) {
	return;
}

if ( ! class_exists( 'Astra_Sticky_Header_Panels_Configs' ) ) {

	/**
	 * Register Sticky Header Customizer Configurations.
	 */
	class Astra_Sticky_Header_Panels_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Sticky Header Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_section = 'section-sticky-header';

			$_config = array(

				array(
					'name'     => $_section,
					'title'    => __( 'Sticky Header', 'astra-addon' ),
					'panel'    => Astra_Addon_Builder_Helper::$is_header_footer_builder_active ? 'panel-header-builder-group' : 'panel-header-group',
					'priority' => 31,
					'type'     => 'section',
				),

			);

			if ( Astra_Addon_Builder_Helper::$is_header_footer_builder_active ) {

				$_hfb_config = array(

					/**
					 * Option: Sticky Header Above Divider
					 */
					array(
						'name'     => ASTRA_THEME_SETTINGS . '[divider-section-sticky-header-logo]',
						'type'     => 'control',
						'control'  => 'ast-heading',
						'section'  => $_section,
						'title'    => __( 'Logo', 'astra-addon' ),
						'settings' => array(),
						'priority' => 14,
						'context'  => Astra_Addon_Builder_Helper::$general_tab,
					),

					/**
					 * Option: Sticky Header Above Divider
					 */
					array(
						'name'     => ASTRA_THEME_SETTINGS . '[divider-section-sticky-header-animations]',
						'type'     => 'control',
						'control'  => 'ast-heading',
						'section'  => $_section,
						'title'    => __( 'Animations & Rules', 'astra-addon' ),
						'settings' => array(),
						'priority' => 39,
						'context'  => Astra_Addon_Builder_Helper::$general_tab,
					),
				);
				$_config = array_merge( $_config, $_hfb_config );
			}

			return array_merge( $configurations, $_config );
		}

	}
}

new Astra_Sticky_Header_Panels_Configs();
