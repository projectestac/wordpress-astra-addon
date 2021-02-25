<?php
/**
 * Content Spacing Options for our theme.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       Astra 1.4.3
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
if ( ! class_exists( 'Astra_Customizer_Header_Builder_Menu_Configs' ) ) {

	/**
	 * Register Content Spacing Customizer Configurations.
	 */
	class Astra_Customizer_Header_Builder_Menu_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Content Spacing Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$html_config = array();

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_header_menu; $index++ ) {

				$_section = 'section-hb-menu-' . $index;
				$_prefix  = 'menu' . $index;

				$_configs = array(

					// Option - Primary Sub Menu Space.
					array(
						'name'           => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-submenu-spacing]',
						'default'        => astra_get_option( 'header-' . $_prefix . '-submenu-spacing' ),
						'type'           => 'control',
						'transport'      => 'postMessage',
						'control'        => 'ast-responsive-spacing',
						'section'        => $_section,
						'priority'       => 160,
						'title'          => __( 'Submenu Space', 'astra-addon' ),
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

				if ( 3 > $index ) {

					$_configs = array(
						// Option - Megamenu Heading Space.
						array(
							'name'           => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-megamenu-heading-space]',
							'default'        => astra_get_option( 'header-' . $_prefix . '-megamenu-heading-space' ),
							'type'           => 'control',
							'transport'      => 'postMessage',
							'control'        => 'ast-responsive-spacing',
							'priority'       => 170,
							'title'          => __( 'Megamenu Heading Space', 'astra-addon' ),
							'linked_choices' => true,
							'unit_choices'   => array( 'px', 'em', '%' ),
							'section'        => $_section,
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
			}

			/**
			 * Mobile Menu - Spacing.
			 */
			$html_config[] = array(

				// Option - Primary Sub Menu Space.
				array(
					'name'           => ASTRA_THEME_SETTINGS . '[header-mobile-menu-submenu-spacing]',
					'default'        => astra_get_option( 'header-mobile-menu-submenu-spacing' ),
					'type'           => 'control',
					'transport'      => 'postMessage',
					'control'        => 'ast-responsive-spacing',
					'section'        => 'section-header-mobile-menu',
					'priority'       => 160,
					'title'          => __( 'Submenu Space', 'astra-addon' ),
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

				// Option - Account Menu Space.
				array(
					'name'           => ASTRA_THEME_SETTINGS . '[header-account-menu-spacing]',
					'default'        => astra_get_option( 'header-account-menu-spacing' ),
					'type'           => 'control',
					'control'        => 'ast-responsive-spacing',
					'transport'      => 'postMessage',
					'section'        => 'section-header-account',
					'priority'       => 510,
					'title'          => __( 'Menu Space', 'astra-addon' ),
					'linked_choices' => true,
					'unit_choices'   => array( 'px', 'em', '%' ),
					'choices'        => array(
						'top'    => __( 'Top', 'astra-addon' ),
						'right'  => __( 'Right', 'astra-addon' ),
						'bottom' => __( 'Bottom', 'astra-addon' ),
						'left'   => __( 'Left', 'astra-addon' ),
					),
					'context'        => array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[header-account-action-type]',
							'operator' => '==',
							'value'    => 'menu',
						),
						Astra_Addon_Builder_Helper::$design_tab_config,
					),
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
new Astra_Customizer_Header_Builder_Menu_Configs();
