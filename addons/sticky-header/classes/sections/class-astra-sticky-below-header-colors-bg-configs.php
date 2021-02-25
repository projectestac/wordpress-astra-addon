<?php
/**
 * Sticky Header - Below Header Colors Options for our theme.
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

if ( ! class_exists( 'Astra_Sticky_Below_Header_Colors_Bg_Configs' ) ) {

	/**
	 * Register Sticky Header Below Header ColorsCustomizer Configurations.
	 */
	class Astra_Sticky_Below_Header_Colors_Bg_Configs extends Astra_Customizer_Config_Base {

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

			$header_below_section        = 'section-sticky-header';
			$header_below_color_priority = 115;
			$context                     = Astra_Addon_Builder_Helper::$general_tab_config;

			if ( Astra_Addon_Builder_Helper::$is_header_footer_builder_active ) {

				$header_below_section        = 'section-below-header-builder';
				$header_below_color_priority = 90;
				$context                     = Astra_Addon_Builder_Helper::$design_tab;
			}

			$_config = array(

				array(
					'name'       => ASTRA_THEME_SETTINGS . '[sticky-below-header-bg-color-responsive]',
					'default'    => $defaults['sticky-below-header-bg-color-responsive'],
					'type'       => 'control',
					'priority'   => $header_below_color_priority,
					'section'    => $header_below_section,
					'transport'  => 'postMessage',
					'control'    => 'ast-responsive-color',
					'title'      => __( 'Background Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'context'    => $context,
				),

				/**
				 * Option: Primary Menu Color
				 */
				array(
					'name'       => 'sticky-below-header-menu-color-responsive',
					'default'    => $defaults['sticky-below-header-menu-color-responsive'],
					'type'       => 'sub-control',
					'tab'        => __( 'Normal', 'astra-addon' ),
					'priority'   => 6,
					'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-below-menus-colors]',
					'section'    => 'section-sticky-header',
					'transport'  => 'postMessage',
					'control'    => 'ast-responsive-color',
					'title'      => __( 'Link / Text Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'context'    => array(
						'relation' => 'OR',
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-1]',
							'operator' => '==',
							'value'    => 'menu',
						),
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-2]',
							'operator' => '==',
							'value'    => 'menu',
						),
					),
				),
				/**
				 * Option: Menu Background Color
				 */
				array(
					'name'       => 'sticky-below-header-menu-bg-color-responsive',
					'default'    => $defaults['sticky-below-header-menu-bg-color-responsive'],
					'type'       => 'sub-control',
					'tab'        => __( 'Normal', 'astra-addon' ),
					'priority'   => 7,
					'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-below-menus-colors]',
					'section'    => 'section-sticky-header',
					'transport'  => 'postMessage',
					'control'    => 'ast-responsive-color',
					'title'      => __( 'Background Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'context'    => array(
						'relation' => 'OR',
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-1]',
							'operator' => '==',
							'value'    => 'menu',
						),
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-2]',
							'operator' => '==',
							'value'    => 'menu',
						),
					),
				),

				// Option: Divider.
				array(
					'name'     => 'divider-sticky-below-h-menu-colors',
					'control'  => 'ast-divider',
					'default'  => '',
					'type'     => 'sub-control',
					'parent'   => ASTRA_THEME_SETTINGS . '[sticky-header-below-menus-colors]',
					'section'  => 'section-sticky-header',
					'title'    => __( 'Active / Hover', 'astra-addon' ),
					'tab'      => __( 'Hover', 'astra-addon' ),
					'priority' => 5,
					'settings' => array(),
				),

				/**
				 * Option: Menu Hover Color
				 */
				array(
					'name'       => 'sticky-below-header-menu-h-color-responsive',
					'default'    => $defaults['sticky-below-header-menu-h-color-responsive'],
					'type'       => 'sub-control',
					'tab'        => __( 'Hover', 'astra-addon' ),
					'priority'   => 6,
					'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-below-menus-colors]',
					'section'    => 'section-sticky-header',
					'transport'  => 'postMessage',
					'control'    => 'ast-responsive-color',
					'title'      => __( 'Link Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'context'    => array(
						'relation' => 'OR',
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-1]',
							'operator' => '==',
							'value'    => 'menu',
						),
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-2]',
							'operator' => '==',
							'value'    => 'menu',
						),
					),
				),
				/**
				 * Option: Menu Link / Hover Background Color
				 */
				array(
					'name'       => 'sticky-below-header-menu-h-a-bg-color-responsive',
					'default'    => $defaults['sticky-below-header-menu-h-a-bg-color-responsive'],
					'type'       => 'sub-control',
					'tab'        => __( 'Hover', 'astra-addon' ),
					'priority'   => 7,
					'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-below-menus-colors]',
					'section'    => 'section-sticky-header',
					'transport'  => 'postMessage',
					'control'    => 'ast-responsive-color',
					'title'      => __( 'Link Background Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'context'    => array(
						'relation' => 'OR',
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-1]',
							'operator' => '==',
							'value'    => 'menu',
						),
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-2]',
							'operator' => '==',
							'value'    => 'menu',
						),
					),
				),

				/**
				 * Option: Primary Menu Color
				 */
				array(
					'name'       => 'sticky-below-header-submenu-color-responsive',
					'default'    => $defaults['sticky-below-header-submenu-color-responsive'],
					'type'       => 'sub-control',
					'tab'        => __( 'Normal', 'astra-addon' ),
					'priority'   => 9,
					'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-below-submenus-colors]',
					'section'    => 'section-sticky-header',
					'transport'  => 'postMessage',
					'control'    => 'ast-responsive-color',
					'title'      => __( 'Link / Text Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'context'    => array(
						'relation' => 'OR',
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-1]',
							'operator' => '==',
							'value'    => 'menu',
						),
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-2]',
							'operator' => '==',
							'value'    => 'menu',
						),
					),
				),
				/**
				 * Option: SubMenu Background Color
				 */
				array(
					'name'       => 'sticky-below-header-submenu-bg-color-responsive',
					'default'    => $defaults['sticky-below-header-submenu-bg-color-responsive'],
					'type'       => 'sub-control',
					'tab'        => __( 'Normal', 'astra-addon' ),
					'priority'   => 10,
					'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-below-submenus-colors]',
					'section'    => 'section-sticky-header',
					'transport'  => 'postMessage',
					'control'    => 'ast-responsive-color',
					'title'      => __( 'Background Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'context'    => array(
						'relation' => 'OR',
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-1]',
							'operator' => '==',
							'value'    => 'menu',
						),
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-2]',
							'operator' => '==',
							'value'    => 'menu',
						),
					),
				),

				// Option: Divider.
				array(
					'name'     => 'divider-sticky-below-submenu-h-menu-colors',
					'control'  => 'ast-divider',
					'default'  => '',
					'type'     => 'sub-control',
					'parent'   => ASTRA_THEME_SETTINGS . '[sticky-header-below-submenus-colors]',
					'section'  => 'section-sticky-header',
					'title'    => __( 'Active / Hover', 'astra-addon' ),
					'tab'      => __( 'Hover', 'astra-addon' ),
					'priority' => 5,
					'settings' => array(),
				),

				/**
				 * Option: Menu Hover Color
				 */
				array(
					'name'       => 'sticky-below-header-submenu-h-color-responsive',
					'default'    => $defaults['sticky-below-header-submenu-h-color-responsive'],
					'type'       => 'sub-control',
					'tab'        => __( 'Hover', 'astra-addon' ),
					'priority'   => 9,
					'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-below-submenus-colors]',
					'section'    => 'section-sticky-header',
					'transport'  => 'postMessage',
					'control'    => 'ast-responsive-color',
					'title'      => __( 'Link Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'context'    => array(
						'relation' => 'OR',
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-1]',
							'operator' => '==',
							'value'    => 'menu',
						),
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-2]',
							'operator' => '==',
							'value'    => 'menu',
						),
					),
				),

				/**
				 * Option: SubMenu Link / Hover Background Color
				 */
				array(
					'name'       => 'sticky-below-header-submenu-h-a-bg-color-responsive',
					'default'    => $defaults['sticky-below-header-submenu-h-a-bg-color-responsive'],
					'type'       => 'sub-control',
					'tab'        => __( 'Hover', 'astra-addon' ),
					'priority'   => 10,
					'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-below-submenus-colors]',
					'section'    => 'section-sticky-header',
					'transport'  => 'postMessage',
					'control'    => 'ast-responsive-color',
					'title'      => __( 'Link Background Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'context'    => array(
						'relation' => 'OR',
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-1]',
							'operator' => '==',
							'value'    => 'menu',
						),
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[below-header-section-2]',
							'operator' => '==',
							'value'    => 'menu',
						),
					),
				),

				/**
				* Option: Content Section Text color.
				*/
				array(
					'name'       => 'sticky-below-header-content-section-text-color-responsive',
					'default'    => $defaults['sticky-below-header-content-section-text-color-responsive'],
					'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-below-header-content-colors]',
					'tab'        => __( 'Normal', 'astra-addon' ),
					'type'       => 'sub-control',
					'transport'  => 'postMessage',
					'control'    => 'ast-responsive-color',
					'title'      => __( 'Text Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
				),

				/**
				* Option: Content Section Link color.
				*/
				array(
					'name'       => 'sticky-below-header-content-section-link-color-responsive',
					'default'    => $defaults['sticky-below-header-content-section-link-color-responsive'],
					'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-below-header-content-colors]',
					'type'       => 'sub-control',
					'transport'  => 'postMessage',
					'tab'        => __( 'Normal', 'astra-addon' ),
					'control'    => 'ast-responsive-color',
					'title'      => __( 'Link Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
				),
				/**
				* Option: Content Section Link Hover color.
				*/
				array(
					'name'       => 'sticky-below-header-content-section-link-h-color-responsive',
					'default'    => $defaults['sticky-below-header-content-section-link-h-color-responsive'],
					'parent'     => ASTRA_THEME_SETTINGS . '[sticky-header-below-header-content-colors]',
					'type'       => 'sub-control',
					'tab'        => __( 'Hover', 'astra-addon' ),
					'transport'  => 'postMessage',
					'control'    => 'ast-responsive-color',
					'title'      => __( 'Link Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
				),

			);

			return array_merge( $configurations, $_config );
		}

	}
}

new Astra_Sticky_Below_Header_Colors_Bg_Configs();



