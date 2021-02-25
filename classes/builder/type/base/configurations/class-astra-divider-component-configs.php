<?php
/**
 * Astra Theme Customizer Configuration Builder.
 *
 * @package     astra-builder
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       3.0.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Customizer config divider base class is already present.
if ( class_exists( 'Astra_Divider_Component_Configs' ) ) {
	return;
}

/**
 * Register Builder Customizer Configurations.
 *
 * @since 3.0.0
 */
class Astra_Divider_Component_Configs {

	/**
	 * Register Builder Customizer Configurations.
	 *
	 * @param Array  $configurations Configurations.
	 * @param string $builder_type Builder Type.
	 * @param string $section Section.
	 *
	 * @since 3.0.0
	 * @return Array Astra Customizer Configurations with updated configurations.
	 */
	public static function register_configuration( $configurations, $builder_type = 'header', $section = 'section-hb-divider-' ) {

		$divider_config = array();

		if ( 'footer' === $builder_type ) {
			$class_obj         = Astra_Addon_Builder_Footer::get_instance();
			$number_of_divider = Astra_Addon_Builder_Helper::$num_of_footer_divider;
		} else {
			$class_obj         = Astra_Addon_Builder_Header::get_instance();
			$number_of_divider = Astra_Addon_Builder_Helper::$num_of_header_divider;
		}

		for ( $index = 1; $index <= $number_of_divider; $index++ ) {

			$_section = $section . $index;
			$_prefix  = 'divider' . $index;

			/**
			 * These options are related to Header Section - divider.
			 * Prefix hs represents - Header Section.
			 */
			$_configs = array(

				/**
				 * Option: Header Builder Tabs
				 */
				array(
					'name'        => $_section . '-ast-context-tabs',
					'section'     => $_section,
					'type'        => 'control',
					'control'     => 'ast-builder-header-control',
					'priority'    => 0,
					'description' => '',

				),

				/*
				* Header Builder section - divider Component Configs.
				*/
				array(
					'name'     => $_section,
					'type'     => 'section',
					'priority' => 50,
					/* translators: %s Index */
					'title'    => ( 1 === $number_of_divider ) ? __( 'Divider', 'astra-addon' ) : sprintf( __( 'Divider %s', 'astra-addon' ), $index ),
					'panel'    => 'panel-' . $builder_type . '-builder-group',
				),

				/**
				 * Option: Position
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[' . $builder_type . '-divider-' . $index . '-layout]',
					'default'   => astra_get_option( $builder_type . '-divider-' . $index . '-layout' ),
					'type'      => 'control',
					'control'   => 'select',
					'section'   => $_section,
					'priority'  => 30,
					'title'     => __( 'Layout', 'astra-addon' ),
					'choices'   => array(
						'horizontal' => __( 'Horizontal', 'astra-addon' ),
						'vertical'   => __( 'Vertical', 'astra-addon' ),
					),
					'transport' => 'postMessage',
					'partial'   => array(
						'selector'        => '.ast-' . $builder_type . '-divider-' . $index,
						'render_callback' => array( $class_obj, $builder_type . '_divider_' . $index ),
					),
				),

				// Vertical divider notice.
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[' . $builder_type . '-divider-' . $index . '-description]',
					'type'     => 'control',
					'control'  => 'ast-description',
					'section'  => $_section,
					'priority' => 30,
					'label'    => '',
					/* translators: %1$s builder type param */
					'help'     => sprintf( __( 'If the Divider don\'t seem to be visible please check if elements are added in the current %1$s row.', 'astra-addon' ), $builder_type ),
					'context'  => array(
						Astra_Addon_Builder_Helper::$general_tab_config,
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[' . $builder_type . '-divider-' . $index . '-layout]',
							'operator' => '==',
							'value'    => 'vertical',
						),
					),
				),

				/**
				 * Option:  Divider Style
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[' . $builder_type . '-divider-' . $index . '-style]',
					'default'   => astra_get_option( $builder_type . '-divider-' . $index . '-style' ),
					'type'      => 'control',
					'control'   => 'select',
					'section'   => $_section,
					'priority'  => 30,
					'title'     => __( 'Style', 'astra-addon' ),
					'choices'   => array(
						'solid'  => __( 'Solid', 'astra-addon' ),
						'dashed' => __( 'Dashed', 'astra-addon' ),
						'dotted' => __( 'Dotted', 'astra-addon' ),
						'double' => __( 'Double', 'astra-addon' ),
					),
					'transport' => 'postMessage',
				),

				// Section: Above Footer Border.
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[' . $builder_type . '-divider-' . $index . '-thickness]',
					'section'     => $_section,
					'priority'    => 40,
					'transport'   => 'postMessage',
					'default'     => astra_get_option( $builder_type . '-divider-' . $index . '-thickness' ),
					'title'       => __( 'Thickness (px)', 'astra-addon' ),
					'type'        => 'control',
					'control'     => 'ast-responsive-slider',
					'input_attrs' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 60,
					),
					'context'     => Astra_Addon_Builder_Helper::$design_tab,
				),

				// Section: Above Footer Border.
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[' . $builder_type . '-divider-' . $index . '-size]',
					'section'     => $_section,
					'priority'    => 40,
					'transport'   => 'postMessage',
					'default'     => astra_get_option( $builder_type . '-divider-' . $index . '-size' ),
					'title'       => __( 'Size (%)', 'astra-addon' ),
					'type'        => 'control',
					'control'     => 'ast-responsive-slider',
					'input_attrs' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 100,
					),
					'context'     => Astra_Addon_Builder_Helper::$design_tab,
				),

				/**
				 * Option: divider Color.
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[' . $builder_type . '-divider-' . $index . '-color]',
					'default'   => '',
					'type'      => 'control',
					'section'   => $_section,
					'priority'  => 8,
					'transport' => 'postMessage',
					'control'   => 'ast-color',
					'title'     => __( 'Color', 'astra-addon' ),
					'context'   => Astra_Addon_Builder_Helper::$design_tab,
				),

				/**
				 * Option: Margin heading
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[' . $_section . '-margin-heading]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'section'  => $_section,
					'title'    => __( 'Spacing', 'astra-addon' ),
					'priority' => 200,
					'settings' => array(),
					'context'  => Astra_Addon_Builder_Helper::$design_tab,
				),

				/**
				 * Option: Margin Space
				 */
				array(
					'name'           => ASTRA_THEME_SETTINGS . '[' . $_section . '-margin]',
					'default'        => '',
					'type'           => 'control',
					'transport'      => 'postMessage',
					'control'        => 'ast-responsive-spacing',
					'section'        => $_section,
					'priority'       => 220,
					'title'          => __( 'Margin', 'astra-addon' ),
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

			if ( 'footer' === $builder_type ) {
				$_configs[] = array(
					'name'      => ASTRA_THEME_SETTINGS . '[footer-divider-' . $index . '-alignment]',
					'default'   => astra_get_option( 'footer-divider-' . $index . '-alignment' ),
					'type'      => 'control',
					'control'   => 'ast-responsive-select',
					'section'   => $_section,
					'priority'  => 35,
					'title'     => __( 'Alignment', 'astra-addon' ),
					'choices'   => array(
						'flex-start' => __( 'Left', 'astra-addon' ),
						'flex-end'   => __( 'Right', 'astra-addon' ),
						'center'     => __( 'Center', 'astra-addon' ),
					),
					'transport' => 'postMessage',
				);
			}

			if ( class_exists( 'Astra_Builder_Base_Configuration' ) && method_exists( 'Astra_Builder_Base_Configuration', 'prepare_visibility_tab' ) ) {
				$divider_config[] = Astra_Builder_Base_Configuration::prepare_visibility_tab( $_section, $builder_type );
			}

			$divider_config[] = $_configs;
		}

		$divider_config = call_user_func_array( 'array_merge', $divider_config + array( array() ) );
		$configurations = array_merge( $configurations, $divider_config );

		return $configurations;
	}
}

/**
 * Kicking this off by creating object of this class.
 */

new Astra_Divider_Component_Configs();
