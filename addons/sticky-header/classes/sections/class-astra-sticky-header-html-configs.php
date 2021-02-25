<?php
/**
 * Sticky Header - HTML Options for our theme.
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

if ( ! class_exists( 'Astra_Sticky_Header_Html_Configs' ) ) {

	/**
	 * Register Sticky Header Above Header ColorsCustomizer Configurations.
	 */
	class Astra_Sticky_Header_Html_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Sticky Header Colors Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 3.0.0
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$html_config = array();

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_header_html; $index++ ) {

				$_section = 'section-hb-html-' . $index;

				$_configs = array(

					/**
					 * Option: Sticky Header HTML Heading.
					 */
					array(
						'name'     => ASTRA_THEME_SETTINGS . '[sticky-header-html-' . $index . '-heading]',
						'type'     => 'control',
						'control'  => 'ast-heading',
						'section'  => $_section,
						'title'    => __( 'Sticky Header Option', 'astra-addon' ),
						'settings' => array(),
						'priority' => 110,
						'context'  => Astra_Addon_Builder_Helper::$design_tab,
					),
					/**
					 * Option: HTML Color.
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[sticky-header-html-' . $index . 'color]',
						'default'   => '',
						'type'      => 'control',
						'section'   => $_section,
						'priority'  => 120,
						'transport' => 'postMessage',
						'control'   => 'ast-color',
						'title'     => __( 'Color', 'astra-addon' ),
						'context'   => Astra_Addon_Builder_Helper::$design_tab,
					),
				);

				$html_config[] = $_configs;
			}

			$html_config    = call_user_func_array( 'array_merge', $html_config + array( array() ) );
			$configurations = array_merge( $configurations, $html_config );

			return $configurations;
		}
	}
}

new Astra_Sticky_Header_Html_Configs();
