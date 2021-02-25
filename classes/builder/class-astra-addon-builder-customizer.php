<?php
/**
 * Astra Addon Builder Controller.
 *
 * @package astra-builder
 * @since 3.0.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Astra_Addon_Builder_Customizer.
 *
 * Customizer Configuration for Header Footer Builder.
 *
 * @since 3.0.0
 */
final class Astra_Addon_Builder_Customizer {

	/**
	 * Constructor
	 *
	 * @since 3.0.0
	 */
	public function __construct() {

		add_action( 'customize_preview_init', array( $this, 'enqueue_customizer_preview_scripts' ) );

		if ( ! Astra_Addon_Builder_Helper::$is_header_footer_builder_active ) {
			return;
		}

		$this->load_base_components();

		add_action( 'customize_register', array( $this, 'header_configs' ), 5 );
		add_action( 'customize_register', array( $this, 'footer_configs' ), 5 );
	}

	/**
	 * Register Base Components for Builder.
	 */
	public function load_base_components() {

		// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		// Base Config Files.
		require_once ASTRA_EXT_DIR . 'classes/builder/type/base/configurations/class-astra-divider-component-configs.php';

		// Base Dynamic CSS Files.
		require_once ASTRA_EXT_DIR . 'classes/builder/type/base/dynamic-css/divider/class-astra-divider-component-dynamic-css.php';

		$this->load_header_components();
		$this->load_footer_components();
		// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}

	/**
	 * Register controls for Header Builder.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 3.0.0
	 */
	public function header_configs( $wp_customize ) {
		// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		$header_config_path = ASTRA_EXT_DIR . 'classes/builder/type/header';
		require_once $header_config_path . '/divider/class-astra-header-divider-component-configs.php';
		require_once $header_config_path . '/account/class-astra-ext-header-account-component-configs.php';
		// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}

	/**
	 * Register controls for Footer Builder.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 3.0.0
	 */
	public function footer_configs( $wp_customize ) {
		// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		$footer_config_path = ASTRA_EXT_DIR . 'classes/builder/type/footer';
		require_once $footer_config_path . '/divider/class-astra-footer-divider-component-configs.php';
		// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}

	/**
	 * Register Components for Header Builder.
	 *
	 * @since 3.0.0
	 */
	public function load_header_components() {
		// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		$header_components_path = ASTRA_EXT_DIR . 'classes/builder/type/header';
		if ( ! class_exists( 'Astra_Header_Divider_Component' ) ) {
			require_once $header_components_path . '/divider/class-astra-header-divider-component.php';
		}
		
		require_once $header_components_path . '/account/class-astra-ext-header-account-component.php';

		// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}

	/**
	 * Register Components for Footer Builder.
	 *
	 * @since 3.0.0
	 */
	public function load_footer_components() {
		// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		$footer_components_path = ASTRA_EXT_DIR . 'classes/builder/type/footer';
		if ( ! class_exists( 'Astra_Footer_Divider_Component' ) ) {
			require_once $footer_components_path . '/divider/class-astra-footer-divider-component.php';
		}
		// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}

	/**
	 * Add Customizer preview script.
	 *
	 * @since 3.0.0
	 */
	public function enqueue_customizer_preview_scripts() {

		// Base Dynamic CSS.
		wp_enqueue_script(
			'ahfb-addon-base-customizer-preview',
			ASTRA_EXT_URI . 'classes/builder/type/base/assets/js/customizer-preview.js',
			array( 'customize-preview' ),
			ASTRA_EXT_VER,
			true
		);

		// Localize variables for Astra Breakpoints JS.
		wp_localize_script(
			'ahfb-addon-base-customizer-preview',
			'astraBuilderPreview',
			array(
				'tablet_break_point' => astra_addon_get_tablet_breakpoint(),
				'mobile_break_point' => astra_addon_get_mobile_breakpoint(),
			)
		);
	}
}

/**
 *  Prepare if class 'Astra_Addon_Builder_Customizer' exist.
 *  Kicking this off by creating new object of the class.
 */
new Astra_Addon_Builder_Customizer();
