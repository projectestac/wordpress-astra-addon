<?php
/**
 * Sticky Header - Search Options for our theme.
 *
 * @package     Astra Addon
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       3.0.0
 */

// Block direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Customizer config base class does not exist.
if ( ! class_exists( 'Astra_Customizer_Config_Base' ) ) {
	return;
}

if ( ! class_exists( 'Astra_Sticky_Header_Search_Configs' ) ) {

	/**
	 * Register Sticky Header Above Header ColorsCustomizer Configurations.
	 */
	class Astra_Sticky_Header_Search_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Sticky Header Colors Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 3.0.0
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_section = 'section-header-search';
			$defaults = Astra_Theme_Options::defaults();

			$_configs = array(

				/**
				 * Option: Sticky Header Search Heading.
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[sticky-header-search-heading]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'section'  => $_section,
					'title'    => __( 'Sticky Header Option', 'astra-addon' ),
					'settings' => array(),
					'priority' => 10,
					'context'  => Astra_Addon_Builder_Helper::$design_tab,
				),

				/**
				 * Option: Search Color.
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[sticky-header-search-icon-color]',
					'default'   => '',
					'type'      => 'control',
					'section'   => $_section,
					'priority'  => 20,
					'transport' => 'postMessage',
					'control'   => 'ast-color',
					'title'     => __( 'Icon Color', 'astra-addon' ),
					'context'   => Astra_Addon_Builder_Helper::$design_tab,
				),
				/**
				 * Search Box Background Color
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[sticky-header-search-box-background-color]',
					'default'   => astra_get_option( 'sticky-header-search-box-background-color' ),
					'type'      => 'control',
					'section'   => $_section,
					'priority'  => 21,
					'transport' => 'postMessage',
					'control'   => 'ast-color',
					'title'     => __( 'Box Background Color', 'astra-addon' ),
					'context'   => array(
						Astra_Addon_Builder_Helper::$design_tab_config,
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[header-search-box-type]',
							'operator' => 'in',
							'value'    => array( 'slide-search', 'search-box' ),
						),
					),
				),
			);

			return array_merge( $configurations, $_configs );
		}
	}
}

new Astra_Sticky_Header_Search_Configs();



