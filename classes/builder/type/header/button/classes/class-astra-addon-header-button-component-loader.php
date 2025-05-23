<?php
/**
 * Button Styling Loader for Astra theme.
 *
 * @package     Astra Builder
 * @link        https://www.brainstormforce.com
 * @since       Astra 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Customizer Initialization
 *
 * @since 3.1.0
 */
class Astra_Addon_Header_Button_Component_Loader {
	/**
	 * Constructor
	 *
	 * @since 3.1.0
	 */
	public function __construct() {
		add_filter( 'astra_theme_defaults', array( $this, 'theme_defaults' ) );
		add_action( 'customize_preview_init', array( $this, 'preview_scripts' ), 110 );
	}

	/**
	 * Default customizer configs.
	 *
	 * @param  array $defaults  Astra options default value array.
	 *
	 * @since 3.1.0
	 */
	public function theme_defaults( $defaults ) {
		// Button header defaults.

		$component_limit         = astra_addon_builder_helper()->component_limit;
		$builder_button_stylings = is_callable( 'Astra_Dynamic_CSS::astra_4_6_4_compatibility' ) ? Astra_Dynamic_CSS::astra_4_6_4_compatibility() : false;

		for ( $index = 1; $index <= $component_limit; $index++ ) {

			$_prefix = 'button' . $index;

			$defaults[ 'header-' . $_prefix . '-size' ] = $builder_button_stylings ? 'default' : 'sm';

			$defaults[ 'header-' . $_prefix . '-box-shadow-control' ]  = array(
				'x'      => '0',
				'y'      => '0',
				'blur'   => '0',
				'spread' => '0',
			);
			$defaults[ 'header-' . $_prefix . '-box-shadow-color' ]    = 'rgba(0,0,0,0.1)';
			$defaults[ 'header-' . $_prefix . '-box-shadow-position' ] = 'outline';

		}

		return $defaults;
	}

	/**
	 * Customizer Preview
	 *
	 * @since 3.3.0
	 */
	public function preview_scripts() {
		/**
		 * Load unminified if SCRIPT_DEBUG is true.
		 */
		/* Directory and Extension */
		$dir_name    = SCRIPT_DEBUG ? 'unminified' : 'minified';
		$file_prefix = SCRIPT_DEBUG ? '' : '.min';
		wp_enqueue_script( 'astra-ext-header-button-customizer-preview-js', ASTRA_ADDON_HEADER_BUTTON_URI . '/assets/js/' . $dir_name . '/customizer-preview' . $file_prefix . '.js', array( 'customize-preview', 'ahfb-addon-base-customizer-preview' ), ASTRA_EXT_VER, true );

		// Localize variables for button JS.
		wp_localize_script(
			'astra-ext-header-button-customizer-preview-js',
			'AstraAddonHeaderButtonData',
			array(
				'component_limit' => astra_addon_builder_helper()->component_limit,
			)
		);
	}

}

/**
 *  Kicking this off by creating the object of the class.
 */
new Astra_Addon_Header_Button_Component_Loader();
