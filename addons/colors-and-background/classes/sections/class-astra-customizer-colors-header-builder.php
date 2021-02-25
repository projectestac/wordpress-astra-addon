<?php
/**
 * Colors Primary Menu Options for our theme.
 *
 * @package     Astra Addon
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       1.4.3
 */

// Block direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Customizer config base class does not exist.
if ( ! class_exists( 'Astra_Customizer_Config_Base' ) ) {
	return;
}

/**
 * Customizer Sanitizes
 *
 * @since 1.4.3
 */
if ( ! class_exists( 'Astra_Customizer_Colors_Header_Builder' ) ) {

	/**
	 * Register General Customizer Configurations.
	 */
	class Astra_Customizer_Colors_Header_Builder extends Astra_Customizer_Config_Base {

		/**
		 * Register General Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			/**
			 * Header - Menu - Colors
			 */

			$html_config = array();

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_header_menu; $index++ ) {

				$_section = 'section-hb-menu-' . $index;
				$_prefix  = 'menu' . $index;

				$_configs = array(
					// Option Group: Sub Menu Colors.
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-submenu-colors]',
						'type'      => 'control',
						'control'   => 'ast-settings-group',
						'title'     => __( 'Submenu', 'astra-addon' ),
						'section'   => $_section,
						'priority'  => 100,
						'transport' => 'postMessage',
						'context'   => Astra_Addon_Builder_Helper::$design_tab,
					),

					// Option: Submenu Color.
					array(
						'name'       => 'header-' . $_prefix . '-submenu-color-responsive',
						'default'    => astra_get_option( 'header-' . $_prefix . '-submenu-color-responsive' ),
						'parent'     => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-submenu-colors]',
						'type'       => 'sub-control',
						'control'    => 'ast-responsive-color',
						'title'      => __( 'Link / Text Color', 'astra-addon' ),
						'section'    => $_section,
						'transport'  => 'postMessage',
						'tab'        => __( 'Normal', 'astra-addon' ),
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 13,
						'context'    => Astra_Addon_Builder_Helper::$general_tab,
					),

					// Option: Submenu Background Color.
					array(
						'name'       => 'header-' . $_prefix . '-submenu-bg-color-responsive',
						'default'    => astra_get_option( 'header-' . $_prefix . '-submenu-bg-color-responsive' ),
						'parent'     => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-submenu-colors]',
						'type'       => 'sub-control',
						'title'      => __( 'Background Color', 'astra-addon' ),
						'section'    => $_section,
						'control'    => 'ast-responsive-color',
						'transport'  => 'postMessage',
						'tab'        => __( 'Normal', 'astra-addon' ),
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 15,
						'context'    => Astra_Addon_Builder_Helper::$general_tab,
					),

					// Option: Submenu Hover Color.
					array(
						'name'       => 'header-' . $_prefix . '-submenu-h-color-responsive',
						'default'    => astra_get_option( 'header-' . $_prefix . '-submenu-h-color-responsive' ),
						'parent'     => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-submenu-colors]',
						'type'       => 'sub-control',
						'control'    => 'ast-responsive-color',
						'tab'        => __( 'Hover', 'astra-addon' ),
						'section'    => $_section,
						'transport'  => 'postMessage',
						'title'      => __( 'Link Color', 'astra-addon' ),
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 25,
						'context'    => Astra_Addon_Builder_Helper::$general_tab,
					),

					// Option: Submenu Hover Background Color.
					array(
						'name'       => 'header-' . $_prefix . '-submenu-h-bg-color-responsive',
						'default'    => astra_get_option( 'header-' . $_prefix . '-submenu-h-bg-color-responsive' ),
						'parent'     => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-submenu-colors]',
						'type'       => 'sub-control',
						'control'    => 'ast-responsive-color',
						'transport'  => 'postMessage',
						'section'    => $_section,
						'tab'        => __( 'Hover', 'astra-addon' ),
						'title'      => __( 'Background Color', 'astra-addon' ),
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 27,
						'context'    => Astra_Addon_Builder_Helper::$general_tab,
					),

					// Option: Active Submenu Color.
					array(
						'name'       => 'header-' . $_prefix . '-submenu-a-color-responsive',
						'default'    => astra_get_option( 'header-' . $_prefix . '-submenu-a-color-responsive' ),
						'parent'     => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-submenu-colors]',
						'type'       => 'sub-control',
						'control'    => 'ast-responsive-color',
						'transport'  => 'postMessage',
						'section'    => $_section,
						'tab'        => __( 'Active', 'astra-addon' ),
						'title'      => __( 'Link Color', 'astra-addon' ),
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 37,
						'context'    => Astra_Addon_Builder_Helper::$general_tab,
					),

					// Option: Active Submenu Background Color.
					array(
						'name'       => 'header-' . $_prefix . '-submenu-a-bg-color-responsive',
						'default'    => astra_get_option( 'header-' . $_prefix . '-submenu-a-bg-color-responsive' ),
						'parent'     => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-submenu-colors]',
						'type'       => 'sub-control',
						'control'    => 'ast-responsive-color',
						'transport'  => 'postMessage',
						'section'    => $_section,
						'tab'        => __( 'Active', 'astra-addon' ),
						'title'      => __( 'Background Color', 'astra-addon' ),
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 39,
						'context'    => Astra_Addon_Builder_Helper::$general_tab,
					),
				);

				$html_config[] = $_configs;

				if ( 3 > $index ) {
					$_configs = array(
						// Option Group: Primary Mega Menu Colors.
						array(
							'name'      => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-mega-menu-col-color-group]',
							'type'      => 'control',
							'transport' => 'postMessage',
							'control'   => 'ast-settings-group',
							'title'     => __( 'Mega Menu Column Heading', 'astra-addon' ),
							'section'   => $_section,
							'priority'  => 100,
							'context'   => Astra_Addon_Builder_Helper::$design_tab,
						),

						// Option: Megamenu Heading Color.
						array(
							'name'      => 'header-' . $_prefix . '-header-megamenu-heading-color',
							'default'   => astra_get_option( 'header-' . $_prefix . '-header-megamenu-heading-color' ),
							'parent'    => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-mega-menu-col-color-group]',
							'type'      => 'sub-control',
							'control'   => 'ast-color',
							'section'   => $_section,
							'transport' => 'postMessage',
							'title'     => __( 'Heading Color', 'astra-addon' ),
							'tab'       => __( 'Normal', 'astra-addon' ),
							'context'   => Astra_Addon_Builder_Helper::$general_tab,
						),

						// Option: Megamenu Heading Hover Color.
						array(
							'name'      => 'header-' . $_prefix . '-header-megamenu-heading-h-color',
							'default'   => astra_get_option( 'header-' . $_prefix . '-header-megamenu-heading-h-color' ),
							'parent'    => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-mega-menu-col-color-group]',
							'type'      => 'sub-control',
							'control'   => 'ast-color',
							'section'   => $_section,
							'transport' => 'postMessage',
							'title'     => __( 'Hover Color', 'astra-addon' ),
							'tab'       => __( 'Hover', 'astra-addon' ),
							'context'   => Astra_Addon_Builder_Helper::$general_tab,
						),
					);

					$html_config[] = $_configs;
				}
			}

			/**
			 * Footer Copyright Link Colors
			 */

			$html_config[] = array(

				/**
				* Option: Account Colors tab
				*/
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[header-account-menu-heading]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'section'  => 'section-header-account',
					'title'    => __( 'Colors', 'astra-addon' ),
					'priority' => 18,
					'settings' => array(),
					'context'  => array(
						Astra_Addon_Builder_Helper::$design_tab_config,
						array(
							'relation' => 'OR',
							array(
								'setting'  => ASTRA_THEME_SETTINGS . '[header-account-action-type]',
								'operator' => '==',
								'value'    => 'menu',
							),
							array(
								'setting'  => ASTRA_THEME_SETTINGS . '[header-account-logout-action]',
								'operator' => '==',
								'value'    => 'login',
							),
						),
					),
				),

				// Option Group: Account Menu Color.
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[header-account-menu-colors]',
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Menu', 'astra-addon' ),
					'section'   => 'section-header-account',
					'transport' => 'postMessage',
					'priority'  => 19,
					'context'   => array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[header-account-action-type]',
							'operator' => '==',
							'value'    => 'menu',
						),
						Astra_Addon_Builder_Helper::$design_tab_config,
					),
				),

				// Option: Menu Color.
				array(
					'name'       => 'header-account-menu-color-responsive',
					'default'    => '',
					'parent'     => ASTRA_THEME_SETTINGS . '[header-account-menu-colors]',
					'type'       => 'sub-control',
					'control'    => 'ast-responsive-color',
					'transport'  => 'postMessage',
					'tab'        => __( 'Normal', 'astra-addon' ),
					'section'    => 'section-header-account',
					'title'      => __( 'Link / Text Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'priority'   => 7,
					'context'    => array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[header-account-action-type]',
							'operator' => '==',
							'value'    => 'menu',
						),
						Astra_Addon_Builder_Helper::$design_tab_config,
					),
				),

				// Option: Background Color.
				array(
					'name'       => 'header-account-menu-bg-obj-responsive',
					'default'    => '',
					'parent'     => ASTRA_THEME_SETTINGS . '[header-account-menu-colors]',
					'type'       => 'sub-control',
					'control'    => 'ast-responsive-color',
					'transport'  => 'postMessage',
					'section'    => 'section-header-account',
					'title'      => __( 'Background Color', 'astra-addon' ),
					'tab'        => __( 'Normal', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'priority'   => 8,
					'context'    => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Menu Hover Color.
				array(
					'name'       => 'header-account-menu-h-color-responsive',
					'default'    => '',
					'parent'     => ASTRA_THEME_SETTINGS . '[header-account-menu-colors]',
					'tab'        => __( 'Hover', 'astra-addon' ),
					'type'       => 'sub-control',
					'control'    => 'ast-responsive-color',
					'transport'  => 'postMessage',
					'title'      => __( 'Link Color', 'astra-addon' ),
					'section'    => 'section-header-account',
					'responsive' => true,
					'rgba'       => true,
					'priority'   => 19,
					'context'    => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Menu Hover Background Color.
				array(
					'name'       => 'header-account-menu-h-bg-color-responsive',
					'default'    => '',
					'parent'     => ASTRA_THEME_SETTINGS . '[header-account-menu-colors]',
					'type'       => 'sub-control',
					'title'      => __( 'Background Color', 'astra-addon' ),
					'section'    => 'section-header-account',
					'control'    => 'ast-responsive-color',
					'transport'  => 'postMessage',
					'tab'        => __( 'Hover', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'priority'   => 21,
					'context'    => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Active Menu Color.
				array(
					'name'       => 'header-account-menu-a-color-responsive',
					'default'    => '',
					'parent'     => ASTRA_THEME_SETTINGS . '[header-account-menu-colors]',
					'type'       => 'sub-control',
					'section'    => 'section-header-account',
					'control'    => 'ast-responsive-color',
					'transport'  => 'postMessage',
					'tab'        => __( 'Active', 'astra-addon' ),
					'title'      => __( 'Link Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'priority'   => 31,
					'context'    => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Active Menu Background Color.
				array(
					'name'       => 'header-account-menu-a-bg-color-responsive',
					'default'    => '',
					'parent'     => ASTRA_THEME_SETTINGS . '[header-account-menu-colors]',
					'type'       => 'sub-control',
					'control'    => 'ast-responsive-color',
					'transport'  => 'postMessage',
					'section'    => 'section-header-account',
					'title'      => __( 'Background Color', 'astra-addon' ),
					'tab'        => __( 'Active', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'priority'   => 33,
					'context'    => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option Group: Account Popup Color.
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[header-account-popup-colors]',
					'default'   => astra_get_option( 'header-account-popup-colors' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Login Popup', 'astra-addon' ),
					'section'   => 'section-header-account',
					'transport' => 'postMessage',
					'priority'  => 20,
					'context'   => array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[header-account-logout-action]',
							'operator' => '==',
							'value'    => 'login',
						),
						Astra_Addon_Builder_Helper::$design_tab_config,
					),
				),

				// Option: label Color.
				array(
					'name'      => 'header-account-popup-label-color',
					'default'   => astra_get_option( 'header-account-popup-label-color' ),
					'parent'    => ASTRA_THEME_SETTINGS . '[header-account-popup-colors]',
					'type'      => 'sub-control',
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'section'   => 'section-header-account',
					'title'     => __( 'Label Color', 'astra-addon' ),
					'rgba'      => true,
					'priority'  => 1,
					'context'   => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: input text Color.
				array(
					'name'      => 'header-account-popup-input-text-color',
					'default'   => astra_get_option( 'header-account-popup-input-text-color' ),
					'parent'    => ASTRA_THEME_SETTINGS . '[header-account-popup-colors]',
					'type'      => 'sub-control',
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'section'   => 'section-header-account',
					'title'     => __( 'Input Text Color', 'astra-addon' ),
					'rgba'      => true,
					'priority'  => 2,
					'context'   => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Background Color.
				array(
					'name'      => 'header-account-popup-input-border-color',
					'default'   => astra_get_option( 'header-account-popup-input-border-color' ),
					'parent'    => ASTRA_THEME_SETTINGS . '[header-account-popup-colors]',
					'type'      => 'sub-control',
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'section'   => 'section-header-account',
					'title'     => __( 'Input Border Color', 'astra-addon' ),
					'rgba'      => true,
					'priority'  => 3,
					'context'   => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Background Color.
				array(
					'name'      => 'header-account-popup-button-text-color',
					'default'   => astra_get_option( 'header-account-popup-button-text-color' ),
					'parent'    => ASTRA_THEME_SETTINGS . '[header-account-popup-colors]',
					'type'      => 'sub-control',
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'section'   => 'section-header-account',
					'title'     => __( 'Button Text Color', 'astra-addon' ),
					'rgba'      => true,
					'priority'  => 4,
					'context'   => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Background Color.
				array(
					'name'      => 'header-account-popup-button-bg-color',
					'default'   => astra_get_option( 'header-account-popup-button-bg-color' ),
					'parent'    => ASTRA_THEME_SETTINGS . '[header-account-popup-colors]',
					'type'      => 'sub-control',
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'section'   => 'section-header-account',
					'title'     => __( 'Button Background Color', 'astra-addon' ),
					'rgba'      => true,
					'priority'  => 5,
					'context'   => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Popup Background Color.
				array(
					'name'      => 'header-account-popup-bg-color',
					'default'   => astra_get_option( 'header-account-popup-bg-color' ),
					'parent'    => ASTRA_THEME_SETTINGS . '[header-account-popup-colors]',
					'type'      => 'sub-control',
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'section'   => 'section-header-account',
					'title'     => __( 'Popup Background Color', 'astra-addon' ),
					'rgba'      => true,
					'priority'  => 6,
					'context'   => Astra_Addon_Builder_Helper::$general_tab,
				),

				/**
				 * Option: Footer copyright Link Color.
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[footer-copyright-link-color]',
					'default'   => astra_get_option( 'footer-copyright-link-color' ),
					'type'      => 'control',
					'section'   => 'section-footer-copyright',
					'priority'  => 9,
					'transport' => 'postMessage',
					'control'   => 'ast-color',
					'title'     => __( 'Link Color', 'astra-addon' ),
					'context'   => Astra_Addon_Builder_Helper::$design_tab,
				),

				/**
				 * Option: Link Hover Color.
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[footer-copyright-link-h-color]',
					'default'   => astra_get_option( 'footer-copyright-link-h-color' ),
					'type'      => 'control',
					'section'   => 'section-footer-copyright',
					'priority'  => 9,
					'transport' => 'postMessage',
					'control'   => 'ast-color',
					'title'     => __( 'Link Hover Color', 'astra-addon' ),
					'context'   => Astra_Addon_Builder_Helper::$design_tab,
				),
			);

			/**
			 * Mobile Menu - Submenu Colors
			 */
			$html_config[] = array(

				// Option Group: Sub Menu Colors.
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[header-mobile-menu-submenu-colors]',
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Submenu', 'astra-addon' ),
					'section'   => 'section-header-mobile-menu',
					'priority'  => 100,
					'transport' => 'postMessage',
					'context'   => Astra_Addon_Builder_Helper::$design_tab,
				),

				// Option: Submenu Color.
				array(
					'name'       => 'header-mobile-menu-submenu-color-responsive',
					'default'    => astra_get_option( 'header-mobile-menu-submenu-color-responsive' ),
					'parent'     => ASTRA_THEME_SETTINGS . '[header-mobile-menu-submenu-colors]',
					'type'       => 'sub-control',
					'control'    => 'ast-responsive-color',
					'title'      => __( 'Link / Text Color', 'astra-addon' ),
					'section'    => 'section-header-mobile-menu',
					'transport'  => 'postMessage',
					'tab'        => __( 'Normal', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'priority'   => 13,
					'context'    => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Submenu Background Color.
				array(
					'name'       => 'header-mobile-menu-submenu-bg-color-responsive',
					'default'    => astra_get_option( 'header-mobile-menu-submenu-bg-color-responsive' ),
					'parent'     => ASTRA_THEME_SETTINGS . '[header-mobile-menu-submenu-colors]',
					'type'       => 'sub-control',
					'title'      => __( 'Background Color', 'astra-addon' ),
					'section'    => 'section-header-mobile-menu',
					'control'    => 'ast-responsive-color',
					'transport'  => 'postMessage',
					'tab'        => __( 'Normal', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'priority'   => 15,
					'context'    => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Submenu Hover Color.
				array(
					'name'       => 'header-mobile-menu-submenu-h-color-responsive',
					'default'    => astra_get_option( 'header-mobile-menu-submenu-h-color-responsive' ),
					'parent'     => ASTRA_THEME_SETTINGS . '[header-mobile-menu-submenu-colors]',
					'type'       => 'sub-control',
					'control'    => 'ast-responsive-color',
					'tab'        => __( 'Hover', 'astra-addon' ),
					'section'    => 'section-header-mobile-menu',
					'transport'  => 'postMessage',
					'title'      => __( 'Link Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'priority'   => 25,
					'context'    => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Submenu Hover Background Color.
				array(
					'name'       => 'header-mobile-menu-submenu-h-bg-color-responsive',
					'default'    => astra_get_option( 'header-mobile-menu-submenu-h-bg-color-responsive' ),
					'parent'     => ASTRA_THEME_SETTINGS . '[header-mobile-menu-submenu-colors]',
					'type'       => 'sub-control',
					'control'    => 'ast-responsive-color',
					'transport'  => 'postMessage',
					'section'    => 'section-header-mobile-menu',
					'tab'        => __( 'Hover', 'astra-addon' ),
					'title'      => __( 'Background Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'priority'   => 27,
					'context'    => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Active Submenu Color.
				array(
					'name'       => 'header-mobile-menu-submenu-a-color-responsive',
					'default'    => astra_get_option( 'header-mobile-menu-submenu-a-color-responsive' ),
					'parent'     => ASTRA_THEME_SETTINGS . '[header-mobile-menu-submenu-colors]',
					'type'       => 'sub-control',
					'control'    => 'ast-responsive-color',
					'transport'  => 'postMessage',
					'section'    => 'section-header-mobile-menu',
					'tab'        => __( 'Active', 'astra-addon' ),
					'title'      => __( 'Link Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'priority'   => 37,
					'context'    => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Active Submenu Background Color.
				array(
					'name'       => 'header-mobile-menu-submenu-a-bg-color-responsive',
					'default'    => astra_get_option( 'header-mobile-menu-submenu-a-bg-color-responsive' ),
					'parent'     => ASTRA_THEME_SETTINGS . '[header-mobile-menu-submenu-colors]',
					'type'       => 'sub-control',
					'control'    => 'ast-responsive-color',
					'transport'  => 'postMessage',
					'section'    => 'section-header-mobile-menu',
					'tab'        => __( 'Active', 'astra-addon' ),
					'title'      => __( 'Background Color', 'astra-addon' ),
					'responsive' => true,
					'rgba'       => true,
					'priority'   => 39,
					'context'    => Astra_Addon_Builder_Helper::$general_tab,
				),
			);

			$html_config    = call_user_func_array( 'array_merge', $html_config + array( array() ) );
			$configurations = array_merge( $configurations, $html_config );

			return $configurations;
		}
	}
}

/**
 * Kicking this off by calling 'get_instance()' method
 */
new Astra_Customizer_Colors_Header_Builder();
