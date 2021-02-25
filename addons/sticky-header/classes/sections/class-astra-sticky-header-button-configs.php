<?php
/**
 * Sticky Header - Button Options for our theme.
 *
 * @package     Astra Addon
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       1.0.0
 */

// Block direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Customizer config base class does not exist.
if ( ! class_exists( 'Astra_Customizer_Config_Base' ) ) {
	return;
}

if ( ! class_exists( 'Astra_Sticky_Header_Button_Configs' ) ) {

	/**
	 * Register Sticky Header Above Header ColorsCustomizer Configurations.
	 */
	class Astra_Sticky_Header_Button_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Sticky Header Colors Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$defaults = Astra_Theme_Options::defaults();

			$html_config = array();

			$main_stick  = astra_get_option( 'header-main-stick' );
			$above_stick = astra_get_option( 'header-above-stick' );
			$below_stick = astra_get_option( 'header-below-stick' );

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_header_button; $index++ ) {

				$_section = 'section-hb-button-' . $index;
				$_prefix  = 'button' . $index;

				$_configs = array(

					/**
					 * Option: Sticky Header Button Heading.
					 */
					array(
						'name'     => ASTRA_THEME_SETTINGS . '[sticky-header-' . $_prefix . '-heading]',
						'type'     => 'control',
						'control'  => 'ast-heading',
						'section'  => $_section,
						'title'    => __( 'Sticky Header Options', 'astra-addon' ),
						'settings' => array(),
						'priority' => 100,
						'context'  => Astra_Addon_Builder_Helper::$design_tab,
					),
					/**
					 * Group: Primary Header Button Colors Group
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[sticky-header-' . $_prefix . '-color-group]',
						'default'   => astra_get_option( 'sticky-header-' . $_prefix . '-color-group' ),
						'type'      => 'control',
						'control'   => 'ast-settings-group',
						'title'     => __( 'Colors', 'astra-addon' ),
						'section'   => $_section,
						'transport' => 'postMessage',
						'priority'  => 101,
						'context'   => Astra_Addon_Builder_Helper::$design_tab,
					),

					/**
					* Option: Button Text Color
					*/
					array(
						'name'       => 'sticky-header-' . $_prefix . '-text-color',
						'transport'  => 'postMessage',
						'default'    => astra_get_option( 'sticky-header-' . $_prefix . '-text-color' ),
						'type'       => 'sub-control',
						'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-' . $_prefix . '-color-group]',
						'section'    => $_section,
						'tab'        => __( 'Normal', 'astra-addon' ),
						'control'    => 'ast-responsive-color',
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 10,
						'context'    => Astra_Addon_Builder_Helper::$design_tab,
						'title'      => __( 'Text Color', 'astra-addon' ),
					),

					/**
					* Option: Button Text Hover Color
					*/
					array(
						'name'       => 'sticky-header-' . $_prefix . '-text-h-color',
						'default'    => astra_get_option( 'sticky-header-' . $_prefix . '-text-h-color' ),
						'transport'  => 'postMessage',
						'type'       => 'sub-control',
						'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-' . $_prefix . '-color-group]',
						'section'    => $_section,
						'tab'        => __( 'Hover', 'astra-addon' ),
						'control'    => 'ast-responsive-color',
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 10,
						'context'    => Astra_Addon_Builder_Helper::$design_tab,
						'title'      => __( 'Text Color', 'astra-addon' ),
					),

					/**
					* Option: Button Background Color
					*/
					array(
						'name'       => 'sticky-header-' . $_prefix . '-back-color',
						'default'    => astra_get_option( 'sticky-header-' . $_prefix . '-back-color' ),
						'transport'  => 'postMessage',
						'type'       => 'sub-control',
						'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-' . $_prefix . '-color-group]',
						'section'    => $_section,
						'tab'        => __( 'Normal', 'astra-addon' ),
						'control'    => 'ast-responsive-color',
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 10,
						'context'    => Astra_Addon_Builder_Helper::$design_tab,
						'title'      => __( 'Background Color', 'astra-addon' ),
					),

					/**
					* Option: Button Button Hover Color
					*/
					array(
						'name'       => 'sticky-header-' . $_prefix . '-back-h-color',
						'default'    => astra_get_option( 'sticky-header-' . $_prefix . '-back-h-color' ),
						'transport'  => 'postMessage',
						'type'       => 'sub-control',
						'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-' . $_prefix . '-color-group]',
						'section'    => $_section,
						'tab'        => __( 'Hover', 'astra-addon' ),
						'control'    => 'ast-responsive-color',
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 10,
						'context'    => Astra_Addon_Builder_Helper::$design_tab,
						'title'      => __( 'Background Color', 'astra-addon' ),
					),

					/**
					 * Group: Primary Header Button Border Group
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[sticky-header-' . $_prefix . '-border-group]',
						'default'   => astra_get_option( 'sticky-header-' . $_prefix . '-border-group' ),
						'type'      => 'control',
						'control'   => 'ast-settings-group',
						'title'     => __( 'Border', 'astra-addon' ),
						'section'   => $_section,
						'transport' => 'postMessage',
						'priority'  => 110,
						'context'   => Astra_Addon_Builder_Helper::$design_tab,
					),

					/**
					* Option: Button Border Size
					*/
					array(
						'name'           => 'sticky-header-' . $_prefix . '-border-size',
						'default'        => astra_get_option( 'sticky-header-' . $_prefix . '-border-size' ),
						'parent'         => ASTRA_THEME_SETTINGS . '[sticky-header-' . $_prefix . '-border-group]',
						'type'           => 'sub-control',
						'section'        => $_section,
						'control'        => 'ast-border',
						'transport'      => 'postMessage',
						'linked_choices' => true,
						'priority'       => 10,
						'title'          => __( 'Width', 'astra-addon' ),
						'context'        => Astra_Addon_Builder_Helper::$design_tab,
						'choices'        => array(
							'top'    => __( 'Top', 'astra-addon' ),
							'right'  => __( 'Right', 'astra-addon' ),
							'bottom' => __( 'Bottom', 'astra-addon' ),
							'left'   => __( 'Left', 'astra-addon' ),
						),
					),

					/**
					* Option: Button Border Color
					*/
					array(
						'name'       => 'sticky-header-' . $_prefix . '-border-color',
						'default'    => astra_get_option( 'sticky-header-' . $_prefix . '-border-color' ),
						'transport'  => 'postMessage',
						'type'       => 'sub-control',
						'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-' . $_prefix . '-border-group]',
						'section'    => $_section,
						'control'    => 'ast-responsive-color',
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 12,
						'context'    => Astra_Addon_Builder_Helper::$design_tab,
						'title'      => __( 'Color', 'astra-addon' ),
					),

					/**
					* Option: Button Border Hover Color
					*/
					array(
						'name'       => 'sticky-header-' . $_prefix . '-border-h-color',
						'default'    => astra_get_option( 'sticky-header-' . $_prefix . '-border-h-color' ),
						'transport'  => 'postMessage',
						'type'       => 'sub-control',
						'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-' . $_prefix . '-border-group]',
						'section'    => $_section,
						'control'    => 'ast-responsive-color',
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 14,
						'context'    => Astra_Addon_Builder_Helper::$design_tab,
						'title'      => __( 'Hover Color', 'astra-addon' ),
					),

					/**
					* Option: Button Border Radius
					*/
					array(
						'name'        => 'sticky-header-' . $_prefix . '-border-radius',
						'default'     => astra_get_option( 'sticky-header-' . $_prefix . '-border-radius' ),
						'type'        => 'sub-control',
						'parent'      => ASTRA_THEME_SETTINGS . '[sticky-header-' . $_prefix . '-border-group]',
						'section'     => $_section,
						'control'     => 'ast-slider',
						'transport'   => 'postMessage',
						'priority'    => 16,
						'context'     => Astra_Addon_Builder_Helper::$design_tab,
						'title'       => __( 'Border Radius', 'astra-addon' ),
						'input_attrs' => array(
							'min'  => 0,
							'step' => 1,
							'max'  => 100,
						),
					),

					// Padding.
					array(
						'name'           => ASTRA_THEME_SETTINGS . '[sticky-header-' . $_prefix . '-padding]',
						'default'        => astra_get_option( 'sticky-header-' . $_prefix . '-padding' ),
						'type'           => 'control',
						'transport'      => 'postMessage',
						'control'        => 'ast-responsive-spacing',
						'section'        => $_section,
						'priority'       => 120,
						'title'          => __( 'Padding', 'astra-addon' ),
						'linked_choices' => true,
						'unit_choices'   => array( 'px', 'em', '%' ),
						'choices'        => array(
							'top'    => __( 'Top', 'astra-addon' ),
							'right'  => __( 'Right', 'astra-addon' ),
							'bottom' => __( 'Bottom', 'astra-addon' ),
							'left'   => __( 'Left', 'astra-addon' ),
						),
						'context'        => Astra_Addon_Builder_Helper::$design_tab,
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

new Astra_Sticky_Header_Button_Configs();



