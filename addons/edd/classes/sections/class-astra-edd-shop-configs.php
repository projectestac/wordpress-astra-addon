<?php
/**
 * Shop Options for our theme.
 *
 * @package     Astra Addon
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       Astra 1.6.10
 */

// Block direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Customizer config base class does not exist.
if ( ! class_exists( 'Astra_Customizer_Config_Base' ) ) {
	return;
}

if ( ! class_exists( 'Astra_Edd_Shop_Configs' ) ) {

	/**
	 * Register Easy Digital Downloads Shop Layout Configurations.
	 */
	class Astra_Edd_Shop_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Easy Digital Downloads Shop Layout Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.6.10
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array(

				/**
				 * Option: Choose Product Style
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[edd-archive-style]',
					'default'  => astra_get_option( 'edd-archive-style' ),
					'type'     => 'control',
					'section'  => 'section-edd-archive',
					'title'    => __( 'Layout', 'astra-addon' ),
					'control'  => 'ast-radio-image',
					'priority' => 5,
					'choices'  => array(
						'edd-archive-page-grid-style' => array(
							'label' => __( 'Grid View', 'astra-addon' ),
							'path'  => ( class_exists( 'Astra_Builder_UI_Controller' ) ) ? Astra_Builder_UI_Controller::fetch_svg_icon( 'edd-archive-page-grid-style', false ) : '',
						),
						'edd-archive-page-list-style' => array(
							'label' => __( 'List View', 'astra-addon' ),
							'path'  => ( class_exists( 'Astra_Builder_UI_Controller' ) ) ? Astra_Builder_UI_Controller::fetch_svg_icon( 'edd-archive-page-list-style', false ) : '',
						),
					),
				),

				/**
				 * Option: EDD Archive Post override-heading to display notice
				 */
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[edd-archive-product-structure]',
					'type'        => 'control',
					'control'     => 'ast-sortable',
					'section'     => 'section-edd-archive',
					'default'     => astra_get_option( 'edd-archive-product-structure' ),
					'priority'    => 30,
					'title'       => __( 'Product Structure', 'astra-addon' ),
					'description' => __( 'The Image option cannot be sortable if the Product Style is selected to the List Style ', 'astra-addon' ),
					'choices'     => array(
						'image'      => __( 'Image', 'astra-addon' ),
						'title'      => __( 'Title', 'astra-addon' ),
						'price'      => __( 'Price', 'astra-addon' ),
						'short_desc' => __( 'Short Description', 'astra-addon' ),
						'add_cart'   => __( 'Add To Cart', 'astra-addon' ),
						'category'   => __( 'Category', 'astra-addon' ),
					),
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[edd-archive-box-styling-divider]',
					'section'  => 'section-edd-archive',
					'title'    => __( 'Product Styling', 'astra-addon' ),
					'type'     => 'control',
					'control'  => 'ast-heading',
					'priority' => 75,
					'settings' => array(),
				),

				/**
				 * Option: Content Alignment
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[edd-archive-product-align]',
					'default'   => astra_get_option( 'edd-archive-product-align' ),
					'type'      => 'control',
					'transport' => 'postMessage',
					'control'   => 'select',
					'section'   => 'section-edd-archive',
					'priority'  => 80,
					'title'     => __( 'Content Alignment', 'astra-addon' ),
					'choices'   => array(
						'align-left'   => __( 'Left', 'astra-addon' ),
						'align-center' => __( 'Center', 'astra-addon' ),
						'align-right'  => __( 'Right', 'astra-addon' ),
					),
				),

				/**
				 * Option: Box shadow
				 */
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[edd-archive-product-shadow]',
					'default'     => astra_get_option( 'edd-archive-product-shadow' ),
					'type'        => 'control',
					'transport'   => 'postMessage',
					'control'     => 'ast-slider',
					'title'       => __( 'Box Shadow', 'astra-addon' ),
					'section'     => 'section-edd-archive',
					'suffix'      => '',
					'priority'    => 85,
					'input_attrs' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 5,
					),
				),

				/**
				 * Option: Box hover shadow
				 */
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[edd-archive-product-shadow-hover]',
					'default'     => astra_get_option( 'edd-archive-product-shadow-hover' ),
					'type'        => 'control',
					'transport'   => 'postMessage',
					'control'     => 'ast-slider',
					'title'       => __( 'Box Hover Shadow', 'astra-addon' ),
					'section'     => 'section-edd-archive',
					'suffix'      => '',
					'priority'    => 90,
					'input_attrs' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 5,
					),
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[edd-archive-button-divider]',
					'section'  => 'section-edd-archive',
					'title'    => __( 'Button', 'astra-addon' ),
					'type'     => 'control',
					'control'  => 'ast-heading',
					'priority' => 110,
					'settings' => array(),
				),

				/**
				 * Option: Vertical Padding
				 */
				array(
					'name'              => ASTRA_THEME_SETTINGS . '[edd-archive-button-v-padding]',
					'default'           => astra_get_option( 'edd-archive-button-v-padding' ),
					'type'              => 'control',
					'transport'         => 'postMessage',
					'section'           => 'section-edd-archive',
					'title'             => __( 'Vertical Padding', 'astra-addon' ),
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'control'           => 'ast-slider',
					'priority'          => 110,
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 200,
					),
				),

				/**
				 * Option: Horizontal Padding
				 */
				array(
					'name'              => ASTRA_THEME_SETTINGS . '[edd-archive-button-h-padding]',
					'default'           => astra_get_option( 'edd-archive-button-h-padding' ),
					'type'              => 'control',
					'transport'         => 'postMessage',
					'section'           => 'section-edd-archive',
					'priority'          => 110,
					'title'             => __( 'Horizontal Padding', 'astra-addon' ),
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'control'           => 'ast-slider',
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 200,
					),
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[edd-archive-meta-divider]',
					'section'  => 'section-edd-archive',
					'type'     => 'control',
					'control'  => 'ast-divider',
					'priority' => 29,
					'settings' => array(),
				),

				/**
				 * Option: Display Page Title
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[edd-archive-page-title-display]',
					'default'  => astra_get_option( 'edd-archive-page-title-display' ),
					'type'     => 'control',
					'section'  => 'section-edd-archive',
					'title'    => __( 'Display Page Title', 'astra-addon' ),
					'priority' => 29,
					'control'  => 'checkbox',
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[edd-archive-colors-heading]',
					'section'  => 'section-edd-archive',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'title'    => __( 'Colors', 'astra-addon' ),
					'priority' => 230,
					'settings' => array(),
				),

				/**
				 * Option: EDD Archive Page Color Group
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[edd-archive-colors]',
					'default'   => astra_get_option( 'edd-archive-colors' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Product', 'astra-addon' ),
					'section'   => 'section-edd-archive',
					'transport' => 'postMessage',
					'priority'  => 231,
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[edd-archive-typo-heading]',
					'section'  => 'section-edd-archive',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'title'    => __( 'Typography', 'astra-addon' ),
					'priority' => 232,
					'settings' => array(),
				),

				/**
				 * Option: EDD Product Title Typography
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[edd-archive-product-title-typo]',
					'default'   => astra_get_option( 'edd-archive-product-title-typo' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Product Title', 'astra-addon' ),
					'section'   => 'section-edd-archive',
					'transport' => 'postMessage',
					'priority'  => 233,
				),

				/**
				 * Option: EDD Product Price Typography
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[edd-archive-product-price-typo]',
					'default'   => astra_get_option( 'edd-archive-product-price-typo' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Product Price', 'astra-addon' ),
					'section'   => 'section-edd-archive',
					'transport' => 'postMessage',
					'priority'  => 233,
				),

				/**
				 * Option: EDD Product Content Typography
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[edd-archive-product-content-typo]',
					'default'   => astra_get_option( 'edd-archive-product-content-typo' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Product Content', 'astra-addon' ),
					'section'   => 'section-edd-archive',
					'transport' => 'postMessage',
					'context'   => array(
						'relation' => 'AND',
						Astra_Addon_Builder_Helper::$general_tab_config,
						array(
							'relation' => 'OR',
							array(
								'setting'  => ASTRA_THEME_SETTINGS . '[edd-archive-product-structure]',
								'operator' => 'contains',
								'value'    => 'category',
							),
							array(
								'setting'  => ASTRA_THEME_SETTINGS . '[edd-archive-product-structure]',
								'operator' => 'contains',
								'value'    => 'structure',
							),
						),

					),
					'priority'  => 233,
				),
			);

			$configurations = array_merge( $configurations, $_configs );

			return $configurations;

		}
	}
}


new Astra_Edd_Shop_Configs();
