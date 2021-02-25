<?php
/**
 * Astra Builder Loader.
 *
 * @package astra-builder
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Addon_Builder_Footer' ) ) {

	/**
	 * Class Astra_Addon_Builder_Footer.
	 */
	final class Astra_Addon_Builder_Footer {

		/**
		 * Member Variable
		 *
		 * @var instance
		 */
		private static $instance = null;

		/**
		 * Dynamic Methods.
		 *
		 * @var dynamic methods
		 */
		private static $methods = array();

		/**
		 *  Initiator
		 */
		public static function get_instance() {

			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_header_divider; $index++ ) {
				add_action( 'astra_footer_divider_' . $index, array( $this, 'footer_divider_' . $index ) );
				self::$methods[] = 'footer_divider_' . $index;
			}
		}

		/**
		 * Callback when method not exists.
		 *
		 * @param  string $func function name.
		 * @param array  $params function parameters.
		 */
		public function __call( $func, $params ) {

			if ( in_array( $func, self::$methods, true ) ) {

				if ( 0 === strpos( $func, 'footer_divider_' ) ) {

					$index = (int) substr( $func, strrpos( $func, '_' ) + 1 );

					if ( $index ) {
						Astra_Addon_Builder_UI_Controller::render_divider_markup( str_replace( '_', '-', $func ) );
					}
				}
			}
		}
	}

	/**
	 *  Prepare if class 'Astra_Addon_Builder_Footer' exist.
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Astra_Addon_Builder_Footer::get_instance();
}
