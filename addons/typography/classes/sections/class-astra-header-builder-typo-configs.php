<?php
/**
 * [Primary Menu] options for astra theme.
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

if ( ! class_exists( 'Astra_Header_Builder_Typo_Configs' ) ) {

	/**
	 * Register below header Configurations.
	 */
	class Astra_Header_Builder_Typo_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Primary Menu typography Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 3.0.0
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			/**
			 * Header - HTML - Typography
			 */

			$html_config = array();
			$section     = 'section-hb-html-';

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_header_html; $index++ ) {

				$_section = $section . $index;

				$parent = ASTRA_THEME_SETTINGS . '[' . $_section . '-typography]';

				$_configs = array(

					/**
					 * Option: Font Weight
					 */
					array(
						'name'      => 'font-weight-' . $_section,
						'control'   => 'ast-font',
						'parent'    => $parent,
						'section'   => $_section,
						'font_type' => 'ast-font-weight',
						'type'      => 'sub-control',
						'default'   => astra_get_option( 'font-weight-' . $_section ),
						'title'     => __( 'Weight', 'astra-addon' ),
						'priority'  => 14,
						'connect'   => 'font-family-' . $_section,
					),

					/**
					 * Option: Font Family
					 */
					array(
						'name'      => 'font-family-' . $_section,
						'type'      => 'sub-control',
						'parent'    => $parent,
						'section'   => $_section,
						'control'   => 'ast-font',
						'font_type' => 'ast-font-family',
						'default'   => astra_get_option( 'font-family-' . $_section ),
						'title'     => __( 'Family', 'astra-addon' ),
						'priority'  => 13,
						'connect'   => 'font-weight-' . $_section,
					),

					/**
					 * Option: Line Height.
					 */
					array(
						'name'              => 'line-height-' . $_section,
						'type'              => 'sub-control',
						'parent'            => $parent,
						'section'           => $_section,
						'default'           => astra_get_option( 'line-height-' . $_section ),
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'title'             => __( 'Line Height', 'astra-addon' ),
						'transport'         => 'postMessage',
						'control'           => 'ast-slider',
						'priority'          => 16,
						'suffix'            => '',
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 0.01,
							'max'  => 5,
						),
					),

					/**
					 * Option: Text Transform
					 */
					array(
						'name'      => 'text-transform-' . $_section,
						'type'      => 'sub-control',
						'parent'    => $parent,
						'section'   => $_section,
						'title'     => __( 'Text Transform', 'astra-addon' ),
						'transport' => 'postMessage',
						'default'   => astra_get_option( 'text-transform-' . $_section ),
						'control'   => 'ast-select',
						'priority'  => 17,
						'choices'   => array(
							''           => __( 'Inherit', 'astra-addon' ),
							'none'       => __( 'None', 'astra-addon' ),
							'capitalize' => __( 'Capitalize', 'astra-addon' ),
							'uppercase'  => __( 'Uppercase', 'astra-addon' ),
							'lowercase'  => __( 'Lowercase', 'astra-addon' ),
						),
					),

				);

				$html_config[] = $_configs;

			}

			/**
			 * Footer - HTML - Typography
			 */

			$section = 'section-fb-html-';

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_footer_html; $index++ ) {

				$_section = $section . $index;

				$parent = ASTRA_THEME_SETTINGS . '[' . $_section . '-typography]';

				$_configs = array(

					/**
					 * Option: Font Weight
					 */
					array(
						'name'      => 'font-weight-' . $_section,
						'control'   => 'ast-font',
						'parent'    => $parent,
						'section'   => $_section,
						'font_type' => 'ast-font-weight',
						'type'      => 'sub-control',
						'default'   => astra_get_option( 'font-weight-' . $_section ),
						'title'     => __( 'Weight', 'astra-addon' ),
						'priority'  => 14,
						'connect'   => 'font-family-' . $_section,
					),

					/**
					 * Option: Font Family
					 */
					array(
						'name'      => 'font-family-' . $_section,
						'type'      => 'sub-control',
						'parent'    => $parent,
						'section'   => $_section,
						'control'   => 'ast-font',
						'font_type' => 'ast-font-family',
						'default'   => astra_get_option( 'font-family-' . $_section ),
						'title'     => __( 'Family', 'astra-addon' ),
						'priority'  => 13,
						'connect'   => 'font-weight-' . $_section,
					),

					/**
					 * Option: Line Height.
					 */
					array(
						'name'              => 'line-height-' . $_section,
						'type'              => 'sub-control',
						'parent'            => $parent,
						'section'           => $_section,
						'default'           => astra_get_option( 'line-height-' . $_section ),
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'title'             => __( 'Line Height', 'astra-addon' ),
						'transport'         => 'postMessage',
						'control'           => 'ast-slider',
						'priority'          => 16,
						'suffix'            => '',
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 0.01,
							'max'  => 5,
						),
					),

					/**
					 * Option: Text Transform
					 */
					array(
						'name'      => 'text-transform-' . $_section,
						'type'      => 'sub-control',
						'parent'    => $parent,
						'section'   => $_section,
						'title'     => __( 'Text Transform', 'astra-addon' ),
						'transport' => 'postMessage',
						'default'   => astra_get_option( 'text-transform-' . $_section ),
						'control'   => 'ast-select',
						'priority'  => 17,
						'choices'   => array(
							''           => __( 'Inherit', 'astra-addon' ),
							'none'       => __( 'None', 'astra-addon' ),
							'capitalize' => __( 'Capitalize', 'astra-addon' ),
							'uppercase'  => __( 'Uppercase', 'astra-addon' ),
							'lowercase'  => __( 'Lowercase', 'astra-addon' ),
						),
					),

				);

				$html_config[] = $_configs;

			}

			/**
			 * Header - Social - Typography
			 */

			$section = 'section-hb-social-icons-';

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_header_social_icons; $index++ ) {

				$_section = $section . $index;

				$parent = ASTRA_THEME_SETTINGS . '[' . $_section . '-typography]';

				$_configs = array(

					/**
					 * Option: Font Weight
					 */
					array(
						'name'      => 'font-weight-' . $_section,
						'control'   => 'ast-font',
						'parent'    => $parent,
						'section'   => $_section,
						'font_type' => 'ast-font-weight',
						'type'      => 'sub-control',
						'default'   => astra_get_option( 'font-weight-' . $_section ),
						'title'     => __( 'Weight', 'astra-addon' ),
						'priority'  => 14,
						'connect'   => 'font-family-' . $_section,
					),

					/**
					 * Option: Font Family
					 */
					array(
						'name'      => 'font-family-' . $_section,
						'type'      => 'sub-control',
						'parent'    => $parent,
						'section'   => $_section,
						'control'   => 'ast-font',
						'font_type' => 'ast-font-family',
						'default'   => astra_get_option( 'font-family-' . $_section ),
						'title'     => __( 'Family', 'astra-addon' ),
						'priority'  => 13,
						'connect'   => 'font-weight-' . $_section,
					),

					/**
					 * Option: Line Height.
					 */
					array(
						'name'              => 'line-height-' . $_section,
						'type'              => 'sub-control',
						'parent'            => $parent,
						'section'           => $_section,
						'default'           => astra_get_option( 'line-height-' . $_section ),
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'title'             => __( 'Line Height', 'astra-addon' ),
						'transport'         => 'postMessage',
						'control'           => 'ast-slider',
						'priority'          => 16,
						'suffix'            => '',
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 0.01,
							'max'  => 5,
						),
					),

					/**
					 * Option: Text Transform
					 */
					array(
						'name'      => 'text-transform-' . $_section,
						'type'      => 'sub-control',
						'parent'    => $parent,
						'section'   => $_section,
						'title'     => __( 'Text Transform', 'astra-addon' ),
						'transport' => 'postMessage',
						'default'   => astra_get_option( 'text-transform-' . $_section ),
						'control'   => 'ast-select',
						'priority'  => 17,
						'choices'   => array(
							''           => __( 'Inherit', 'astra-addon' ),
							'none'       => __( 'None', 'astra-addon' ),
							'capitalize' => __( 'Capitalize', 'astra-addon' ),
							'uppercase'  => __( 'Uppercase', 'astra-addon' ),
							'lowercase'  => __( 'Lowercase', 'astra-addon' ),
						),
					),

				);

				$html_config[] = $_configs;

			}

			/**
			 * Footer - Social - Typography
			 */

			$section = 'section-fb-social-icons-';

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_footer_social_icons; $index++ ) {

				$_section = $section . $index;

				$parent = ASTRA_THEME_SETTINGS . '[' . $_section . '-typography]';

				$_configs = array(

					/**
					 * Option: Font Weight
					 */
					array(
						'name'      => 'font-weight-' . $_section,
						'control'   => 'ast-font',
						'parent'    => $parent,
						'section'   => $_section,
						'font_type' => 'ast-font-weight',
						'type'      => 'sub-control',
						'default'   => astra_get_option( 'font-weight-' . $_section ),
						'title'     => __( 'Weight', 'astra-addon' ),
						'priority'  => 14,
						'connect'   => 'font-family-' . $_section,
					),

					/**
					 * Option: Font Family
					 */
					array(
						'name'      => 'font-family-' . $_section,
						'type'      => 'sub-control',
						'parent'    => $parent,
						'section'   => $_section,
						'control'   => 'ast-font',
						'font_type' => 'ast-font-family',
						'default'   => astra_get_option( 'font-family-' . $_section ),
						'title'     => __( 'Family', 'astra-addon' ),
						'priority'  => 13,
						'connect'   => 'font-weight-' . $_section,
					),

					/**
					 * Option: Line Height.
					 */
					array(
						'name'              => 'line-height-' . $_section,
						'type'              => 'sub-control',
						'parent'            => $parent,
						'section'           => $_section,
						'default'           => astra_get_option( 'line-height-' . $_section ),
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'title'             => __( 'Line Height', 'astra-addon' ),
						'transport'         => 'postMessage',
						'control'           => 'ast-slider',
						'priority'          => 16,
						'suffix'            => '',
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 0.01,
							'max'  => 5,
						),
					),

					/**
					 * Option: Text Transform
					 */
					array(
						'name'      => 'text-transform-' . $_section,
						'type'      => 'sub-control',
						'parent'    => $parent,
						'section'   => $_section,
						'title'     => __( 'Text Transform', 'astra-addon' ),
						'transport' => 'postMessage',
						'default'   => astra_get_option( 'text-transform-' . $_section ),
						'control'   => 'ast-select',
						'priority'  => 17,
						'choices'   => array(
							''           => __( 'Inherit', 'astra-addon' ),
							'none'       => __( 'None', 'astra-addon' ),
							'capitalize' => __( 'Capitalize', 'astra-addon' ),
							'uppercase'  => __( 'Uppercase', 'astra-addon' ),
							'lowercase'  => __( 'Lowercase', 'astra-addon' ),
						),
					),

				);

				$html_config[] = $_configs;

			}

			/**
			 * Header - Mobile Trigger
			 */

			$_section = 'section-header-mobile-trigger';

			$html_config[] = array(

				// Option: Trigger Font Family.
				array(
					'name'      => 'mobile-header-label-font-family',
					'default'   => astra_get_option( 'mobile-header-label-font-family' ),
					'parent'    => ASTRA_THEME_SETTINGS . '[mobile-header-label-typography]',
					'type'      => 'sub-control',
					'section'   => $_section,
					'transport' => 'postMessage',
					'control'   => 'ast-font',
					'font_type' => 'ast-font-family',
					'title'     => __( 'Family', 'astra-addon' ),
					'priority'  => 22,
					'connect'   => 'mobile-header-label-font-weight',
					'context'   => Astra_Addon_Builder_Helper::$design_tab,
				),

				// Option: Trigger Font Weight.
				array(
					'name'              => 'mobile-header-label-font-weight',
					'default'           => astra_get_option( 'mobile-header-label-font-weight' ),
					'parent'            => ASTRA_THEME_SETTINGS . '[mobile-header-label-typography]',
					'section'           => $_section,
					'type'              => 'sub-control',
					'control'           => 'ast-font',
					'transport'         => 'postMessage',
					'font_type'         => 'ast-font-weight',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
					'title'             => __( 'Weight', 'astra-addon' ),
					'priority'          => 24,
					'connect'           => 'mobile-header-label-font-family',
					'context'           => Astra_Addon_Builder_Helper::$design_tab,
				),

				// Option: Trigger Text Transform.
				array(
					'name'      => 'mobile-header-label-text-transform',
					'default'   => astra_get_option( 'mobile-header-label-text-transform' ),
					'parent'    => ASTRA_THEME_SETTINGS . '[mobile-header-label-typography]',
					'section'   => $_section,
					'type'      => 'sub-control',
					'control'   => 'ast-select',
					'transport' => 'postMessage',
					'title'     => __( 'Text Transform', 'astra-addon' ),
					'priority'  => 25,
					'choices'   => array(
						''           => __( 'Inherit', 'astra-addon' ),
						'none'       => __( 'None', 'astra-addon' ),
						'capitalize' => __( 'Capitalize', 'astra-addon' ),
						'uppercase'  => __( 'Uppercase', 'astra-addon' ),
						'lowercase'  => __( 'Lowercase', 'astra-addon' ),
					),
					'context'   => Astra_Addon_Builder_Helper::$design_tab,
				),

				// Option: Trigger Line Height.
				array(
					'name'              => 'mobile-header-label-line-height',
					'parent'            => ASTRA_THEME_SETTINGS . '[mobile-header-label-typography]',
					'section'           => $_section,
					'type'              => 'sub-control',
					'priority'          => 26,
					'title'             => __( 'Line Height', 'astra-addon' ),
					'transport'         => 'postMessage',
					'default'           => '',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'control'           => 'ast-slider',
					'suffix'            => '',
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 0.01,
						'max'  => 10,
					),
					'context'           => Astra_Addon_Builder_Helper::$design_tab,
				),
			);

			/**
			 * Footer - Copyright - Typography
			 */

			$selector = '.ast-footer-copyright .ast-footer-html-inner';
			$_section = 'section-footer-copyright';
			$parent   = ASTRA_THEME_SETTINGS . '[' . $_section . '-typography]';

			$html_config[] = array(

				/**
				 * Option: Font Weight
				 */
				array(
					'name'      => 'font-weight-' . $_section,
					'control'   => 'ast-font',
					'parent'    => $parent,
					'section'   => $_section,
					'font_type' => 'ast-font-weight',
					'type'      => 'sub-control',
					'default'   => astra_get_option( 'font-weight-' . $_section ),
					'title'     => __( 'Weight', 'astra-addon' ),
					'priority'  => 14,
					'connect'   => 'font-family-' . $_section,
				),

				/**
				 * Option: Font Family
				 */
				array(
					'name'      => 'font-family-' . $_section,
					'type'      => 'sub-control',
					'parent'    => $parent,
					'section'   => $_section,
					'control'   => 'ast-font',
					'font_type' => 'ast-font-family',
					'default'   => astra_get_option( 'font-family-' . $_section ),
					'title'     => __( 'Family', 'astra-addon' ),
					'priority'  => 13,
					'connect'   => 'font-weight-' . $_section,
				),

				/**
				 * Option: Line Height.
				 */
				array(
					'name'              => 'line-height-' . $_section,
					'type'              => 'sub-control',
					'parent'            => $parent,
					'section'           => $_section,
					'default'           => astra_get_option( 'line-height-' . $_section ),
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'title'             => __( 'Line Height', 'astra-addon' ),
					'transport'         => 'postMessage',
					'control'           => 'ast-slider',
					'priority'          => 16,
					'suffix'            => '',
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 0.01,
						'max'  => 5,
					),
				),

				/**
				 * Option: Text Transform
				 */
				array(
					'name'      => 'text-transform-' . $_section,
					'type'      => 'sub-control',
					'parent'    => $parent,
					'section'   => $_section,
					'title'     => __( 'Text Transform', 'astra-addon' ),
					'transport' => 'postMessage',
					'default'   => astra_get_option( 'text-transform-' . $_section ),
					'control'   => 'ast-select',
					'priority'  => 17,
					'choices'   => array(
						''           => __( 'Inherit', 'astra-addon' ),
						'none'       => __( 'None', 'astra-addon' ),
						'capitalize' => __( 'Capitalize', 'astra-addon' ),
						'uppercase'  => __( 'Uppercase', 'astra-addon' ),
						'lowercase'  => __( 'Lowercase', 'astra-addon' ),
					),
				),

			);

			/**
			 * Header - Account - Typography
			 */
			$acc_section = 'section-header-account';
			$parent      = ASTRA_THEME_SETTINGS . '[' . $acc_section . '-typography]';

			$html_config[] = array(

				/**
				 * Option: Font Weight
				 */
				array(
					'name'      => 'font-weight-' . $acc_section,
					'control'   => 'ast-font',
					'parent'    => $parent,
					'section'   => $acc_section,
					'font_type' => 'ast-font-weight',
					'type'      => 'sub-control',
					'default'   => astra_get_option( 'font-weight-' . $acc_section ),
					'title'     => __( 'Weight', 'astra-addon' ),
					'priority'  => 14,
					'connect'   => 'font-family-' . $acc_section,
				),

				/**
				 * Option: Font Family
				 */
				array(
					'name'      => 'font-family-' . $acc_section,
					'type'      => 'sub-control',
					'parent'    => $parent,
					'section'   => $acc_section,
					'control'   => 'ast-font',
					'font_type' => 'ast-font-family',
					'default'   => astra_get_option( 'font-family-' . $acc_section ),
					'title'     => __( 'Family', 'astra-addon' ),
					'priority'  => 13,
					'connect'   => 'font-weight-' . $acc_section,
				),

				/**
				 * Option: Line Height.
				 */
				array(
					'name'              => 'line-height-' . $acc_section,
					'type'              => 'sub-control',
					'parent'            => $parent,
					'section'           => $acc_section,
					'default'           => astra_get_option( 'line-height-' . $acc_section ),
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'title'             => __( 'Line Height', 'astra-addon' ),
					'transport'         => 'postMessage',
					'control'           => 'ast-slider',
					'priority'          => 16,
					'suffix'            => '',
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 0.01,
						'max'  => 5,
					),
				),

				/**
				 * Option: Text Transform
				 */
				array(
					'name'      => 'text-transform-' . $acc_section,
					'type'      => 'sub-control',
					'parent'    => $parent,
					'section'   => $acc_section,
					'title'     => __( 'Text Transform', 'astra-addon' ),
					'transport' => 'postMessage',
					'default'   => astra_get_option( 'text-transform-' . $acc_section ),
					'control'   => 'ast-select',
					'priority'  => 17,
					'choices'   => array(
						''           => __( 'Inherit', 'astra-addon' ),
						'none'       => __( 'None', 'astra-addon' ),
						'capitalize' => __( 'Capitalize', 'astra-addon' ),
						'uppercase'  => __( 'Uppercase', 'astra-addon' ),
						'lowercase'  => __( 'Lowercase', 'astra-addon' ),
					),
				),

				/**
				 * Option: Typography
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[header-account-popup-heading]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'section'  => $acc_section,
					'title'    => __( 'Typography', 'astra-addon' ),
					'priority' => 21,
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

				// Option Group: Menu Typography.
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[' . $acc_section . '-menu-typography]',
					'default'   => '',
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Menu', 'astra-addon' ),
					'section'   => $acc_section,
					'transport' => 'postMessage',
					'priority'  => 22,
					'context'   => array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[header-account-action-type]',
							'operator' => '==',
							'value'    => 'menu',
						),
						Astra_Addon_Builder_Helper::$design_tab_config,
					),
				),

				// Option: Menu Font Family.
				array(
					'name'      => $acc_section . '-menu-font-family',
					'default'   => '',
					'parent'    => ASTRA_THEME_SETTINGS . '[' . $acc_section . '-menu-typography]',
					'type'      => 'sub-control',
					'section'   => $acc_section,
					'transport' => 'postMessage',
					'control'   => 'ast-font',
					'font_type' => 'ast-font-family',
					'title'     => __( 'Family', 'astra-addon' ),
					'priority'  => 22,
					'connect'   => $acc_section . '-menu-font-weight',
					'context'   => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Menu Font Weight.
				array(
					'name'              => $acc_section . '-menu-font-weight',
					'default'           => '',
					'parent'            => ASTRA_THEME_SETTINGS . '[' . $acc_section . '-menu-typography]',
					'section'           => $acc_section,
					'type'              => 'sub-control',
					'control'           => 'ast-font',
					'transport'         => 'postMessage',
					'font_type'         => 'ast-font-weight',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
					'title'             => __( 'Weight', 'astra-addon' ),
					'priority'          => 24,
					'connect'           => $acc_section . '-menu-font-family',
					'context'           => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Menu Text Transform.
				array(
					'name'      => $acc_section . '-menu-text-transform',
					'default'   => '',
					'parent'    => ASTRA_THEME_SETTINGS . '[' . $acc_section . '-menu-typography]',
					'section'   => $acc_section,
					'type'      => 'sub-control',
					'control'   => 'ast-select',
					'transport' => 'postMessage',
					'title'     => __( 'Text Transform', 'astra-addon' ),
					'priority'  => 25,
					'choices'   => array(
						''           => __( 'Inherit', 'astra-addon' ),
						'none'       => __( 'None', 'astra-addon' ),
						'capitalize' => __( 'Capitalize', 'astra-addon' ),
						'uppercase'  => __( 'Uppercase', 'astra-addon' ),
						'lowercase'  => __( 'Lowercase', 'astra-addon' ),
					),
					'context'   => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Menu Font Size.
				array(
					'name'        => $acc_section . '-menu-font-size',
					'default'     => astra_get_option( $acc_section . '-menu-font-size' ),
					'parent'      => ASTRA_THEME_SETTINGS . '[' . $acc_section . '-menu-typography]',
					'section'     => $acc_section,
					'type'        => 'sub-control',
					'priority'    => 23,
					'title'       => __( 'Size', 'astra-addon' ),
					'control'     => 'ast-responsive',
					'transport'   => 'postMessage',
					'input_attrs' => array(
						'min' => 0,
					),
					'units'       => array(
						'px' => 'px',
						'em' => 'em',
					),
					'context'     => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Menu Line Height.
				array(
					'name'              => $acc_section . '-menu-line-height',
					'parent'            => ASTRA_THEME_SETTINGS . '[' . $acc_section . '-menu-typography]',
					'section'           => $acc_section,
					'type'              => 'sub-control',
					'priority'          => 26,
					'title'             => __( 'Line Height', 'astra-addon' ),
					'transport'         => 'postMessage',
					'default'           => '',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'control'           => 'ast-slider',
					'suffix'            => '',
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 0.01,
						'max'  => 10,
					),
					'context'           => Astra_Addon_Builder_Helper::$general_tab,
				),

				/**
				 * Option:  Logged Out Popup text Typography
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[' . $acc_section . '-popup-typography]',
					'default'   => astra_get_option( $acc_section . '-popup-typography' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Login Popup', 'astra-addon' ),
					'section'   => $acc_section,
					'transport' => 'postMessage',
					'context'   => array(
						Astra_Addon_Builder_Helper::$design_tab_config,
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[header-account-logout-action]',
							'operator' => '==',
							'value'    => 'login',
						),
					),
					'priority'  => 22,
				),

				// Option: Menu Font Size.
				array(
					'name'        => $acc_section . '-popup-font-size',
					'default'     => astra_get_option( $acc_section . '-popup-font-size' ),
					'parent'      => ASTRA_THEME_SETTINGS . '[' . $acc_section . '-popup-typography]',
					'section'     => $acc_section,
					'type'        => 'sub-control',
					'control'     => 'ast-responsive',
					'priority'    => 1,
					'title'       => __( 'Label / Input Text Size', 'astra-addon' ),
					'transport'   => 'postMessage',
					'input_attrs' => array(
						'min' => 0,
					),
					'units'       => array(
						'px' => 'px',
						'em' => 'em',
					),
					'context'     => Astra_Addon_Builder_Helper::$general_tab,
				),

				// Option: Menu Font Size.
				array(
					'name'        => $acc_section . '-popup-button-font-size',
					'default'     => astra_get_option( $acc_section . '-popup-button-font-size' ),
					'parent'      => ASTRA_THEME_SETTINGS . '[' . $acc_section . '-popup-typography]',
					'section'     => $acc_section,
					'type'        => 'sub-control',
					'control'     => 'ast-responsive',
					'priority'    => 2,
					'title'       => __( 'Button Font Size', 'astra-addon' ),
					'transport'   => 'postMessage',
					'input_attrs' => array(
						'min' => 0,
					),
					'units'       => array(
						'px' => 'px',
						'em' => 'em',
					),
					'context'     => Astra_Addon_Builder_Helper::$general_tab,
				),
			);

			/**
			 * Header - Button - Typography
			 */

			$section = 'section-hb-button-';

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_header_button; $index++ ) {

				$_section = $section . $index;
				$_prefix  = 'button' . $index;

				$_configs = array(

					/**
					 * Option: Primary Header Button Font Family
					 */
					array(
						'name'      => 'header-' . $_prefix . '-font-family',
						'default'   => astra_get_option( 'header-' . $_prefix . '-font-family' ),
						'parent'    => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-text-typography]',
						'type'      => 'sub-control',
						'section'   => $_section,
						'control'   => 'ast-font',
						'font_type' => 'ast-font-family',
						'title'     => __( 'Family', 'astra-addon' ),
						'context'   => Astra_Addon_Builder_Helper::$general_tab,
						'connect'   => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-font-weight]',
						'priority'  => 1,
					),

					/**
					 * Option: Primary Header Button Font Weight
					 */
					array(
						'name'              => 'header-' . $_prefix . '-font-weight',
						'default'           => astra_get_option( 'header-' . $_prefix . '-font-weight' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-text-typography]',
						'type'              => 'sub-control',
						'section'           => $_section,
						'control'           => 'ast-font',
						'font_type'         => 'ast-font-weight',
						'title'             => __( 'Weight', 'astra-addon' ),
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
						'connect'           => 'header-' . $_prefix . '-font-family',
						'priority'          => 2,
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
					),

					/**
					 * Option: Primary Header Button Text Transform
					 */
					array(
						'name'      => 'header-' . $_prefix . '-text-transform',
						'default'   => astra_get_option( 'header-' . $_prefix . '-text-transform' ),
						'parent'    => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-text-typography]',
						'transport' => 'postMessage',
						'title'     => __( 'Text Transform', 'astra-addon' ),
						'type'      => 'sub-control',
						'section'   => $_section,
						'control'   => 'ast-select',
						'priority'  => 3,
						'context'   => Astra_Addon_Builder_Helper::$general_tab,
						'choices'   => array(
							''           => __( 'Inherit', 'astra-addon' ),
							'none'       => __( 'None', 'astra-addon' ),
							'capitalize' => __( 'Capitalize', 'astra-addon' ),
							'uppercase'  => __( 'Uppercase', 'astra-addon' ),
							'lowercase'  => __( 'Lowercase', 'astra-addon' ),
						),
					),

					/**
					 * Option: Primary Header Button Line Height
					 */
					array(
						'name'              => 'header-' . $_prefix . '-line-height',
						'default'           => astra_get_option( 'header-' . $_prefix . '-line-height' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-text-typography]',
						'control'           => 'ast-slider',
						'transport'         => 'postMessage',
						'type'              => 'sub-control',
						'section'           => $_section,
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'title'             => __( 'Line Height', 'astra-addon' ),
						'suffix'            => '',
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
						'priority'          => 4,
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 0.01,
							'max'  => 5,
						),
					),

					/**
					 * Option: Primary Header Button Letter Spacing
					 */
					array(
						'name'              => 'header-' . $_prefix . '-letter-spacing',
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-text-typography]',
						'control'           => 'ast-slider',
						'transport'         => 'postMessage',
						'type'              => 'sub-control',
						'default'           => '',
						'section'           => $_section,
						'title'             => __( 'Letter Spacing', 'astra-addon' ),
						'suffix'            => '',
						'priority'          => 5,
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 1,
							'max'  => 100,
						),
					),
				);

				$html_config[] = $_configs;

			}

			/**
			 * Footer - Button - Typography
			 */

			$section = 'section-fb-button-';

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_footer_button; $index++ ) {

				$_section = $section . $index;
				$_prefix  = 'button' . $index;

				$_configs = array(

					/**
					 * Option: Primary Header Button Font Family
					 */
					array(
						'name'      => 'footer-' . $_prefix . '-font-family',
						'default'   => astra_get_option( 'footer-' . $_prefix . '-font-family' ),
						'parent'    => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-text-typography]',
						'type'      => 'sub-control',
						'section'   => $_section,
						'control'   => 'ast-font',
						'font_type' => 'ast-font-family',
						'title'     => __( 'Family', 'astra-addon' ),
						'context'   => Astra_Addon_Builder_Helper::$general_tab,
						'connect'   => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-font-weight]',
						'priority'  => 1,
					),

					/**
					 * Option: Primary Footer Button Font Weight
					 */
					array(
						'name'              => 'footer-' . $_prefix . '-font-weight',
						'default'           => astra_get_option( 'footer-' . $_prefix . '-font-weight' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-text-typography]',
						'type'              => 'sub-control',
						'section'           => $_section,
						'control'           => 'ast-font',
						'font_type'         => 'ast-font-weight',
						'title'             => __( 'Weight', 'astra-addon' ),
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
						'connect'           => 'footer-' . $_prefix . '-font-family',
						'priority'          => 2,
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
					),

					/**
					 * Option: Primary Footer Button Text Transform
					 */
					array(
						'name'      => 'footer-' . $_prefix . '-text-transform',
						'default'   => astra_get_option( 'footer-' . $_prefix . '-text-transform' ),
						'parent'    => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-text-typography]',
						'transport' => 'postMessage',
						'title'     => __( 'Text Transform', 'astra-addon' ),
						'type'      => 'sub-control',
						'section'   => $_section,
						'control'   => 'ast-select',
						'priority'  => 3,
						'context'   => Astra_Addon_Builder_Helper::$general_tab,
						'choices'   => array(
							''           => __( 'Inherit', 'astra-addon' ),
							'none'       => __( 'None', 'astra-addon' ),
							'capitalize' => __( 'Capitalize', 'astra-addon' ),
							'uppercase'  => __( 'Uppercase', 'astra-addon' ),
							'lowercase'  => __( 'Lowercase', 'astra-addon' ),
						),
					),

					/**
					 * Option: Primary Footer Button Line Height
					 */
					array(
						'name'              => 'footer-' . $_prefix . '-line-height',
						'default'           => astra_get_option( 'footer-' . $_prefix . '-line-height' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-text-typography]',
						'control'           => 'ast-slider',
						'transport'         => 'postMessage',
						'type'              => 'sub-control',
						'section'           => $_section,
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'title'             => __( 'Line Height', 'astra-addon' ),
						'suffix'            => '',
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
						'priority'          => 4,
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 0.01,
							'max'  => 5,
						),
					),

					/**
					 * Option: Primary Footer Button Letter Spacing
					 */
					array(
						'name'              => 'footer-' . $_prefix . '-letter-spacing',
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-text-typography]',
						'control'           => 'ast-slider',
						'transport'         => 'postMessage',
						'type'              => 'sub-control',
						'default'           => '',
						'section'           => $_section,
						'title'             => __( 'Letter Spacing', 'astra-addon' ),
						'suffix'            => '',
						'priority'          => 5,
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 1,
							'max'  => 100,
						),
					),
				);

				$html_config[] = $_configs;

			}

			/**
			 * Header - Widget - Typography
			 */

			$section = 'sidebar-widgets-header-widget-';

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_header_widgets; $index++ ) {

				$_section = $section . $index;
				$_prefix  = 'widget-' . $index;

				$_configs = array(

					/**
					 * Option: Header Widget Titles Font Family
					 */
					array(
						'name'      => 'header-' . $_prefix . '-font-family',
						'default'   => astra_get_option( 'header-' . $_prefix . '-font-family' ),
						'parent'    => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-text-typography]',
						'type'      => 'sub-control',
						'section'   => $_section,
						'control'   => 'ast-font',
						'font_type' => 'ast-font-family',
						'title'     => __( 'Family', 'astra-addon' ),
						'context'   => Astra_Addon_Builder_Helper::$general_tab,
						'connect'   => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-font-weight]',
						'priority'  => 1,
					),

					/**
					 * Option: Header Widget Title Font Weight
					 */
					array(
						'name'              => 'header-' . $_prefix . '-font-weight',
						'default'           => astra_get_option( 'header-' . $_prefix . '-font-weight' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-text-typography]',
						'type'              => 'sub-control',
						'section'           => $_section,
						'control'           => 'ast-font',
						'font_type'         => 'ast-font-weight',
						'title'             => __( 'Weight', 'astra-addon' ),
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
						'connect'           => 'header-' . $_prefix . '-font-family',
						'priority'          => 2,
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
					),

					/**
					 * Option: Header Widget Title Text Transform
					 */
					array(
						'name'      => 'header-' . $_prefix . '-text-transform',
						'default'   => astra_get_option( 'header-' . $_prefix . '-text-transform' ),
						'parent'    => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-text-typography]',
						'transport' => 'postMessage',
						'title'     => __( 'Text Transform', 'astra-addon' ),
						'type'      => 'sub-control',
						'section'   => $_section,
						'control'   => 'ast-select',
						'priority'  => 3,
						'context'   => Astra_Addon_Builder_Helper::$general_tab,
						'choices'   => array(
							''           => __( 'Inherit', 'astra-addon' ),
							'none'       => __( 'None', 'astra-addon' ),
							'capitalize' => __( 'Capitalize', 'astra-addon' ),
							'uppercase'  => __( 'Uppercase', 'astra-addon' ),
							'lowercase'  => __( 'Lowercase', 'astra-addon' ),
						),
					),

					/**
					 * Option: Header Widget Title Line Height
					 */
					array(
						'name'              => 'header-' . $_prefix . '-line-height',
						'default'           => astra_get_option( 'header-' . $_prefix . '-line-height' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-text-typography]',
						'control'           => 'ast-slider',
						'transport'         => 'postMessage',
						'type'              => 'sub-control',
						'section'           => $_section,
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'title'             => __( 'Line Height', 'astra-addon' ),
						'suffix'            => '',
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
						'priority'          => 4,
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 0.01,
							'max'  => 5,
						),
					),

					/**
					 * Option: Header Widget Title Letter Spacing
					 */
					array(
						'name'              => 'header-' . $_prefix . '-letter-spacing',
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-text-typography]',
						'control'           => 'ast-slider',
						'transport'         => 'postMessage',
						'type'              => 'sub-control',
						'default'           => '',
						'section'           => $_section,
						'title'             => __( 'Letter Spacing', 'astra-addon' ),
						'suffix'            => '',
						'priority'          => 5,
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 1,
							'max'  => 100,
						),
					),

					/**
					 * Option: Header Widget Content Font Family
					 */
					array(
						'name'      => 'header-' . $_prefix . '-content-font-family',
						'default'   => astra_get_option( 'header-' . $_prefix . '-content-font-family' ),
						'parent'    => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-content-typography]',
						'type'      => 'sub-control',
						'section'   => $_section,
						'control'   => 'ast-font',
						'font_type' => 'ast-font-family',
						'title'     => __( 'Family', 'astra-addon' ),
						'context'   => Astra_Addon_Builder_Helper::$general_tab,
						'connect'   => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-content-font-weight]',
						'priority'  => 1,
					),

					/**
					 * Option: Header Widget Content Font Weight
					 */
					array(
						'name'              => 'header-' . $_prefix . '-content-font-weight',
						'default'           => astra_get_option( 'header-' . $_prefix . '-content-font-weight' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-content-typography]',
						'type'              => 'sub-control',
						'section'           => $_section,
						'control'           => 'ast-font',
						'font_type'         => 'ast-font-weight',
						'title'             => __( 'Weight', 'astra-addon' ),
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
						'connect'           => 'header-' . $_prefix . '-content-font-family',
						'priority'          => 2,
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
					),

					/**
					 * Option: Header Widget Content Text Transform
					 */
					array(
						'name'      => 'header-' . $_prefix . '-content-transform',
						'default'   => astra_get_option( 'header-' . $_prefix . '-content-transform' ),
						'parent'    => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-content-typography]',
						'transport' => 'postMessage',
						'title'     => __( 'Text Transform', 'astra-addon' ),
						'type'      => 'sub-control',
						'section'   => $_section,
						'control'   => 'ast-select',
						'priority'  => 3,
						'context'   => Astra_Addon_Builder_Helper::$general_tab,
						'choices'   => array(
							''           => __( 'Inherit', 'astra-addon' ),
							'none'       => __( 'None', 'astra-addon' ),
							'capitalize' => __( 'Capitalize', 'astra-addon' ),
							'uppercase'  => __( 'Uppercase', 'astra-addon' ),
							'lowercase'  => __( 'Lowercase', 'astra-addon' ),
						),
					),

					/**
					 * Option: Header Widget Content Line Height
					 */
					array(
						'name'              => 'header-' . $_prefix . '-content-line-height',
						'default'           => astra_get_option( 'header-' . $_prefix . '-content-line-height' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-content-typography]',
						'control'           => 'ast-slider',
						'transport'         => 'postMessage',
						'type'              => 'sub-control',
						'section'           => $_section,
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'title'             => __( 'Line Height', 'astra-addon' ),
						'suffix'            => '',
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
						'priority'          => 4,
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 0.01,
							'max'  => 5,
						),
					),

					/**
					 * Option: Header Widget Content Letter Spacing
					 */
					array(
						'name'              => 'header-' . $_prefix . '-content-letter-spacing',
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[header-' . $_prefix . '-content-typography]',
						'control'           => 'ast-slider',
						'transport'         => 'postMessage',
						'type'              => 'sub-control',
						'default'           => '',
						'section'           => $_section,
						'title'             => __( 'Letter Spacing', 'astra-addon' ),
						'suffix'            => '',
						'priority'          => 5,
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 1,
							'max'  => 100,
						),
					),
				);

				$html_config[] = $_configs;

			}

			/**
			 * Footer - Widget - Typography
			 */

			$section = 'sidebar-widgets-footer-widget-';

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_footer_widgets; $index++ ) {

				$_section = $section . $index;
				$_prefix  = 'widget-' . $index;

				$_configs = array(

					/**
					 * Option: Footer Widget Titles Font Family
					 */
					array(
						'name'      => 'footer-' . $_prefix . '-font-family',
						'default'   => astra_get_option( 'footer-' . $_prefix . '-font-family' ),
						'parent'    => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-text-typography]',
						'type'      => 'sub-control',
						'section'   => $_section,
						'control'   => 'ast-font',
						'font_type' => 'ast-font-family',
						'title'     => __( 'Family', 'astra-addon' ),
						'context'   => Astra_Addon_Builder_Helper::$general_tab,
						'connect'   => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-font-weight]',
						'priority'  => 1,
					),

					/**
					 * Option: Footer Widget Title Font Weight
					 */
					array(
						'name'              => 'footer-' . $_prefix . '-font-weight',
						'default'           => astra_get_option( 'footer-' . $_prefix . '-font-weight' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-text-typography]',
						'type'              => 'sub-control',
						'section'           => $_section,
						'control'           => 'ast-font',
						'font_type'         => 'ast-font-weight',
						'title'             => __( 'Weight', 'astra-addon' ),
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
						'connect'           => 'footer-' . $_prefix . '-font-family',
						'priority'          => 2,
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
					),

					/**
					 * Option: Footer Widget Title Text Transform
					 */
					array(
						'name'      => 'footer-' . $_prefix . '-text-transform',
						'default'   => astra_get_option( 'footer-' . $_prefix . '-text-transform' ),
						'parent'    => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-text-typography]',
						'transport' => 'postMessage',
						'title'     => __( 'Text Transform', 'astra-addon' ),
						'type'      => 'sub-control',
						'section'   => $_section,
						'control'   => 'ast-select',
						'priority'  => 3,
						'context'   => Astra_Addon_Builder_Helper::$general_tab,
						'choices'   => array(
							''           => __( 'Inherit', 'astra-addon' ),
							'none'       => __( 'None', 'astra-addon' ),
							'capitalize' => __( 'Capitalize', 'astra-addon' ),
							'uppercase'  => __( 'Uppercase', 'astra-addon' ),
							'lowercase'  => __( 'Lowercase', 'astra-addon' ),
						),
					),

					/**
					 * Option: Footer Widget Title Line Height
					 */
					array(
						'name'              => 'footer-' . $_prefix . '-line-height',
						'default'           => astra_get_option( 'footer-' . $_prefix . '-line-height' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-text-typography]',
						'control'           => 'ast-slider',
						'transport'         => 'postMessage',
						'type'              => 'sub-control',
						'section'           => $_section,
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'title'             => __( 'Line Height', 'astra-addon' ),
						'suffix'            => '',
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
						'priority'          => 4,
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 0.01,
							'max'  => 5,
						),
					),

					/**
					 * Option: Footer Widget Title Letter Spacing
					 */
					array(
						'name'              => 'footer-' . $_prefix . '-letter-spacing',
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-text-typography]',
						'control'           => 'ast-slider',
						'transport'         => 'postMessage',
						'type'              => 'sub-control',
						'default'           => '',
						'section'           => $_section,
						'title'             => __( 'Letter Spacing', 'astra-addon' ),
						'suffix'            => '',
						'priority'          => 5,
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 1,
							'max'  => 100,
						),
					),

					/**
					 * Option: Header Widget Content Font Family
					 */
					array(
						'name'      => 'footer-' . $_prefix . '-content-font-family',
						'default'   => astra_get_option( 'footer-' . $_prefix . '-content-font-family' ),
						'parent'    => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-content-typography]',
						'type'      => 'sub-control',
						'section'   => $_section,
						'control'   => 'ast-font',
						'font_type' => 'ast-font-family',
						'title'     => __( 'Family', 'astra-addon' ),
						'context'   => Astra_Addon_Builder_Helper::$general_tab,
						'connect'   => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-content-font-weight]',
						'priority'  => 1,
					),

					/**
					 * Option: Footer Widget Content Font Weight
					 */
					array(
						'name'              => 'footer-' . $_prefix . '-content-font-weight',
						'default'           => astra_get_option( 'footer-' . $_prefix . '-content-font-weight' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-content-typography]',
						'type'              => 'sub-control',
						'section'           => $_section,
						'control'           => 'ast-font',
						'font_type'         => 'ast-font-weight',
						'title'             => __( 'Weight', 'astra-addon' ),
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
						'connect'           => 'footer-' . $_prefix . '-content-font-family',
						'priority'          => 2,
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
					),

					/**
					 * Option: Footer Widget Content Text Transform
					 */
					array(
						'name'      => 'footer-' . $_prefix . '-content-transform',
						'default'   => astra_get_option( 'footer-' . $_prefix . '-content-transform' ),
						'parent'    => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-content-typography]',
						'transport' => 'postMessage',
						'title'     => __( 'Text Transform', 'astra-addon' ),
						'type'      => 'sub-control',
						'section'   => $_section,
						'control'   => 'ast-select',
						'priority'  => 3,
						'context'   => Astra_Addon_Builder_Helper::$general_tab,
						'choices'   => array(
							''           => __( 'Inherit', 'astra-addon' ),
							'none'       => __( 'None', 'astra-addon' ),
							'capitalize' => __( 'Capitalize', 'astra-addon' ),
							'uppercase'  => __( 'Uppercase', 'astra-addon' ),
							'lowercase'  => __( 'Lowercase', 'astra-addon' ),
						),
					),

					/**
					 * Option: Footer Widget Content Line Height
					 */
					array(
						'name'              => 'footer-' . $_prefix . '-content-line-height',
						'default'           => astra_get_option( 'footer-' . $_prefix . '-content-line-height' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-content-typography]',
						'control'           => 'ast-slider',
						'transport'         => 'postMessage',
						'type'              => 'sub-control',
						'section'           => $_section,
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'title'             => __( 'Line Height', 'astra-addon' ),
						'suffix'            => '',
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
						'priority'          => 4,
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 0.01,
							'max'  => 5,
						),
					),

					/**
					 * Option: Footer Widget Content Letter Spacing
					 */
					array(
						'name'              => 'footer-' . $_prefix . '-content-letter-spacing',
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
						'parent'            => ASTRA_THEME_SETTINGS . '[footer-' . $_prefix . '-content-typography]',
						'control'           => 'ast-slider',
						'transport'         => 'postMessage',
						'type'              => 'sub-control',
						'default'           => '',
						'section'           => $_section,
						'title'             => __( 'Letter Spacing', 'astra-addon' ),
						'suffix'            => '',
						'priority'          => 5,
						'context'           => Astra_Addon_Builder_Helper::$general_tab,
						'input_attrs'       => array(
							'min'  => 1,
							'step' => 1,
							'max'  => 100,
						),
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

new Astra_Header_Builder_Typo_Configs();
