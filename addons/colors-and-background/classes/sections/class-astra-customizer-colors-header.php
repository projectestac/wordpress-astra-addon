<?php
/**
 * Colors Header Options for our theme.
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
if ( ! class_exists( 'Astra_Customizer_Colors_Header' ) ) {

	/**
	 * Register General Customizer Configurations.
	 */
	class Astra_Customizer_Colors_Header extends Astra_Customizer_Config_Base {

		/**
		 * Register General Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$defaults = Astra_Theme_Options::defaults();

			if ( Astra_Addon_Builder_Helper::$is_header_footer_builder_active ) {
				$title_color_heading = __( 'Title', 'astra-addon' );
			} else {
				$title_color_heading = __( 'Colors', 'astra-addon' );
			}

			$_configs = array(

				array(
					'name'      => ASTRA_THEME_SETTINGS . '[site-identity-title-color-group]',
					'default'   => astra_get_option( 'site-identity-title-color-group' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => Astra_Addon_Builder_Helper::$is_header_footer_builder_active ? __( 'Title', 'astra-addon' ) : __( 'Colors', 'astra-addon' ),
					'section'   => 'title_tagline',
					'transport' => 'postMessage',
					'priority'  => 8,
					'context'   => Astra_Addon_Builder_Helper::$is_header_footer_builder_active ? array(
						Astra_Addon_Builder_Helper::$design_tab_config,
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[display-site-title]',
							'operator' => '==',
							'value'    => true,
						),
					) : array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[display-site-title]',
							'operator' => '==',
							'value'    => true,
						),
					),
				),

				// Option: Site Title Color.
				array(
					'name'      => 'header-color-site-title',
					'parent'    => ASTRA_THEME_SETTINGS . '[site-identity-title-color-group]',
					'section'   => 'title_tagline',
					'type'      => 'sub-control',
					'control'   => 'ast-color',
					'default'   => astra_get_option( 'header-color-site-title' ),
					'transport' => 'postMessage',
					'title'     => __( 'Title Color', 'astra-addon' ),
					'tab'       => __( 'Normal', 'astra-addon' ),
					'context'   => Astra_Addon_Builder_Helper::$design_tab,
				),

				// Option: Site Title Hover Color.
				array(
					'name'      => 'header-color-h-site-title',
					'parent'    => ASTRA_THEME_SETTINGS . '[site-identity-title-color-group]',
					'section'   => 'title_tagline',
					'type'      => 'sub-control',
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'default'   => astra_get_option( 'header-color-h-site-title' ),
					'title'     => __( 'Title Hover Color', 'astra-addon' ),
					'tab'       => __( 'Hover', 'astra-addon' ),
					'context'   => Astra_Addon_Builder_Helper::$design_tab,
				),

				// Option: Site Tagline Color.
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[header-color-site-tagline]',
					'type'      => 'control',
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'default'   => astra_get_option( 'header-color-site-tagline' ),
					'title'     => Astra_Addon_Builder_Helper::$is_header_footer_builder_active ? __( 'Tagline', 'astra-addon' ) : __( 'Color', 'astra-addon' ),
					'section'   => 'title_tagline',
					'priority'  => Astra_Addon_Builder_Helper::$is_header_footer_builder_active ? 8 : 11,
					'context'   => Astra_Addon_Builder_Helper::$is_header_footer_builder_active ? array(
						Astra_Addon_Builder_Helper::$design_tab_config,
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[display-site-tagline]',
							'operator' => '==',
							'value'    => true,
						),
					) : array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[display-site-tagline]',
							'operator' => '==',
							'value'    => true,
						),
					),
				),
			);

			if ( Astra_Addon_Builder_Helper::$is_header_footer_builder_active ) {

				array_push(
					$_configs,
					/**
					 * Option: Color heading
					 */
					array(
						'name'     => ASTRA_THEME_SETTINGS . '[site-identity-colors-heading]',
						'type'     => 'control',
						'control'  => 'ast-heading',
						'section'  => 'title_tagline',
						'title'    => __( 'Colors', 'astra-addon' ),
						'priority' => 7,
						'settings' => array(),
						'context'  => array(
							'relation' => 'AND',
							Astra_Addon_Builder_Helper::$design_tab_config,
							array(
								'relation' => 'OR',
								array(
									'setting'  => ASTRA_THEME_SETTINGS . '[display-site-title]',
									'operator' => '==',
									'value'    => true,
								),
								array(
									'setting'  => ASTRA_THEME_SETTINGS . '[display-site-tagline]',
									'operator' => '==',
									'value'    => true,
								),
							),
						),
					),
					/**
					 * Search Overlay Color
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[header-search-overlay-color]',
						'default'   => astra_get_option( 'header-search-overlay-color' ),
						'type'      => 'control',
						'section'   => 'section-header-search',
						'priority'  => 9,
						'transport' => 'postMessage',
						'control'   => 'ast-color',
						'title'     => __( 'Overlay Background Color', 'astra-addon' ),
						'context'   => array(
							Astra_Addon_Builder_Helper::$design_tab_config,
							array(
								'setting'  => ASTRA_THEME_SETTINGS . '[header-search-box-type]',
								'operator' => 'in',
								'value'    => array( 'full-screen', 'header-cover' ),
							),
						),
					),
					/**
					 * Search Overlay Text Color
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[header-search-overlay-text-color]',
						'default'   => astra_get_option( 'header-search-overlay-text-color' ),
						'type'      => 'control',
						'section'   => 'section-header-search',
						'priority'  => 9,
						'transport' => 'postMessage',
						'control'   => 'ast-color',
						'title'     => __( 'Overlay Text Color', 'astra-addon' ),
						'context'   => array(
							Astra_Addon_Builder_Helper::$design_tab_config,
							array(
								'setting'  => ASTRA_THEME_SETTINGS . '[header-search-box-type]',
								'operator' => 'in',
								'value'    => array( 'full-screen', 'header-cover' ),
							),
						),
					),
					/**
					 * Search Box Background Color
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[header-search-box-background-color]',
						'default'   => astra_get_option( 'header-search-box-background-color' ),
						'type'      => 'control',
						'section'   => 'section-header-search',
						'priority'  => 9,
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
					/**
					 * Group: Search Border Group
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[header-search-border-group]',
						'default'   => astra_get_option( 'header-search-border-group' ),
						'type'      => 'control',
						'control'   => 'ast-settings-group',
						'title'     => __( 'Border', 'astra-addon' ),
						'section'   => 'section-header-search',
						'transport' => 'postMessage',
						'priority'  => 9,
						'context'   => array(
							Astra_Addon_Builder_Helper::$design_tab_config,
							array(
								'setting'  => ASTRA_THEME_SETTINGS . '[header-search-box-type]',
								'operator' => 'in',
								'value'    => array( 'slide-search', 'search-box' ),
							),
						),
					),
					/**
					* Option: Search Border Size
					*/
					array(
						'name'           => 'header-search-border-size',
						'default'        => astra_get_option( 'header-search-border-size' ),
						'parent'         => ASTRA_THEME_SETTINGS . '[header-search-border-group]',
						'type'           => 'sub-control',
						'section'        => 'section-header-search',
						'control'        => 'ast-border',
						'transport'      => 'postMessage',
						'linked_choices' => true,
						'priority'       => 10,
						'title'          => __( 'Width', 'astra-addon' ),
						'context'        => Astra_Addon_Builder_Helper::$general_tab,
						'choices'        => array(
							'top'    => __( 'Top', 'astra-addon' ),
							'right'  => __( 'Right', 'astra-addon' ),
							'bottom' => __( 'Bottom', 'astra-addon' ),
							'left'   => __( 'Left', 'astra-addon' ),
						),
					),
					/**
					* Option: Search Border Color
					*/
					array(
						'name'       => 'header-search-border-color',
						'default'    => astra_get_option( 'header-search-border-color' ),
						'transport'  => 'postMessage',
						'type'       => 'sub-control',
						'parent'     => ASTRA_THEME_SETTINGS . '[header-search-border-group]',
						'section'    => 'section-header-search',
						'control'    => 'ast-color',
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 12,
						'context'    => Astra_Addon_Builder_Helper::$general_tab,
						'title'      => __( 'Color', 'astra-addon' ),
					),
					/**
					* Option: Search Border Hover Color
					*/
					array(
						'name'       => 'header-search-border-h-color',
						'default'    => astra_get_option( 'header-search-border-h-color' ),
						'transport'  => 'postMessage',
						'type'       => 'sub-control',
						'parent'     => ASTRA_THEME_SETTINGS . '[header-search-border-group]',
						'section'    => 'section-header-search',
						'control'    => 'ast-color',
						'responsive' => true,
						'rgba'       => true,
						'priority'   => 14,
						'context'    => Astra_Addon_Builder_Helper::$general_tab,
						'title'      => __( 'Hover Color', 'astra-addon' ),
					),
					/**
					* Option: Search Border Radius
					*/
					array(
						'name'        => 'header-search-border-radius',
						'default'     => astra_get_option( 'header-search-border-radius' ),
						'type'        => 'sub-control',
						'parent'      => ASTRA_THEME_SETTINGS . '[header-search-border-group]',
						'section'     => 'section-header-search',
						'control'     => 'ast-slider',
						'transport'   => 'postMessage',
						'priority'    => 16,
						'context'     => Astra_Addon_Builder_Helper::$general_tab,
						'title'       => __( 'Border Radius', 'astra-addon' ),
						'input_attrs' => array(
							'min'  => 0,
							'step' => 1,
							'max'  => 100,
						),
					)
				);
			}

			return array_merge( $configurations, $_configs );
		}
	}
}

/**
 * Kicking this off by calling 'get_instance()' method
 */
new Astra_Customizer_Colors_Header();
