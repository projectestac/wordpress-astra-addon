<?php
/**
 * Account Styling Loader for Astra theme.
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
class Astra_Ext_Header_Account_Component_Loader {

	/**
	 * Constructor
	 *
	 * @since 3.0.0
	 */
	public function __construct() {
		add_filter( 'astra_theme_defaults', array( $this, 'theme_defaults' ) );
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
		// Account header defaults.
		$defaults['header-account-icon-type'] = 'account-1';

		return $defaults;
	}

	/**
	 * Add Styles Callback
	 *
	 * @since 3.0.0
	 */
	public function add_styles() {

		/*** Start Path Logic */

		/* Define Variables */
		$uri  = ASTRA_EXT_HEADER_ACCOUNT_URI . 'assets/css/';
		$path = ASTRA_EXT_HEADER_ACCOUNT_DIR . 'assets/css/';
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
new Astra_Ext_Header_Account_Component_Loader();
