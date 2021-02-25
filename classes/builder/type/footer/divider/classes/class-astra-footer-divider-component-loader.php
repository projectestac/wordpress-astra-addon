<?php
/**
 * Divider Styling Loader for Astra theme.
 *
 * @package     Astra Builder
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       Astra 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Customizer Initialization
 *
 * @since 3.0.0
 */
class Astra_Footer_Divider_Component_Loader {

	/**
	 * Constructor
	 *
	 * @since 3.0.0
	 */
	public function __construct() {
		add_filter( 'astra_theme_defaults', array( $this, 'theme_defaults' ) );
		add_action( 'customize_preview_init', array( $this, 'preview_scripts' ), 110 );
		add_action( 'astra_get_css_files', array( $this, 'add_styles' ) );
	}

	/**
	 * Default customizer configs.
	 *
	 * @param  array $defaults  Astra options default value array.
	 *
	 * @since 3.0.0
	 */
	public function theme_defaults( $defaults ) {
		// Divider Footer defaults.
		for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_footer_divider; $index++ ) {

			$defaults[ 'footer-divider-' . $index . '-layout' ] = 'horizontal';
			$defaults[ 'footer-divider-' . $index . '-style' ]  = 'solid';
			$defaults[ 'footer-divider-' . $index . '-color' ]  = '#3a3a3a';

			$defaults[ 'footer-divider-' . $index . '-size' ] = array(
				'desktop' => 50,
				'tablet'  => '',
				'mobile'  => '',
			);

			$defaults[ 'footer-divider-' . $index . '-thickness' ] = array(
				'desktop' => 1,
				'tablet'  => '',
				'mobile'  => '',
			);

			$defaults[ 'footer-divider-' . $index . '-alignment' ] = array(
				'desktop' => 'center',
				'tablet'  => 'center',
				'mobile'  => 'center',
			);
		}

		return $defaults;
	}

	/**
	 * Customizer Preview
	 *
	 * @since 3.0.0
	 */
	public function preview_scripts() {
		/**
		 * Load unminified if SCRIPT_DEBUG is true.
		 */
		/* Directory and Extension */
		$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';
		$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';
		wp_enqueue_script( 'astra-footer-divider-customizer-preview-js', ASTRA_FOOTER_DIVIDER_URI . 'assets/js/customizer-preview.js', array( 'customize-preview', 'astra-customizer-preview-js' ), ASTRA_EXT_VER, true );

		// Localize variables for divider JS.
		wp_localize_script(
			'astra-footer-divider-customizer-preview-js',
			'AstraBuilderDividerData',
			array(
				'footer_divider_count' => Astra_Addon_Builder_Helper::$num_of_footer_divider,
				'tablet_break_point'   => astra_addon_get_tablet_breakpoint(),
				'mobile_break_point'   => astra_addon_get_mobile_breakpoint(),
			)
		);
	}

	/**
	 * Add Styles Callback
	 *
	 * @since 3.0.0
	 */
	public function add_styles() {

		/*** Start Path Logic */

		/* Define Variables */
		$uri  = ASTRA_FOOTER_DIVIDER_URI . 'assets/css/';
		$path = ASTRA_FOOTER_DIVIDER_DIR . 'assets/css/';
		$rtl  = '';

		if ( is_rtl() ) {
			$rtl = '-rtl';
		}

		/* Directory and Extension */
		$file_prefix = $rtl . '.min';
		$dir_name    = 'minified';

		if ( SCRIPT_DEBUG ) {
			$file_prefix = $rtl;
			$dir_name    = 'unminified';
		}

		$css_uri = $uri . $dir_name . '/';
		$css_dir = $path . $dir_name . '/';

		if ( defined( 'ASTRA_THEME_HTTP2' ) && ASTRA_THEME_HTTP2 ) {
			$gen_path = $css_uri;
		} else {
			$gen_path = $css_dir;
		}

		/*** End Path Logic */

		/* Add style.css */
		Astra_Minify::add_css( $gen_path . 'style' . $file_prefix . '.css' );
	}
}

/**
*  Kicking this off by creating the object of the class.
*/
new Astra_Footer_Divider_Component_Loader();
