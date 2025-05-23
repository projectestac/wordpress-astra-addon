<?php
/**
 * Shop Options for Astra.
 *
 * @package     Astra Addon
 * @link        https://www.brainstormforce.com
 * @since       3.9.0
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
 * Register Woocommerce shop cart Layout Configurations.
 */
// @codingStandardsIgnoreStart
class Astra_Woocommerce_Shop_Cart_Configs extends Astra_Customizer_Config_Base {
// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedClassFound
// @codingStandardsIgnoreEnd

	/**
	 * Register Woocommerce shop cart Layout Configurations.
	 *
	 * @param Array                $configurations Astra Customizer Configurations.
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 * @since 3.9.0
	 * @return Array Astra Customizer Configurations with updated configurations.
	 */
	public function register_configuration( $configurations, $wp_customize ) {
		// Help text for modern cart.
		$cart_description = '';
		if ( defined( 'ELEMENTOR_PRO_VERSION' ) && function_exists( 'wc_get_page_id' ) ) {
			$cart_page_id   = wc_get_page_id( 'cart' );
			$elementor_data = get_post_meta( $cart_page_id, '_elementor_data', true );
			if ( is_string( $elementor_data ) && ! empty( $elementor_data ) ) {
				$elementor_data = json_decode( $elementor_data, true );
				if ( astra_check_elementor_widget( $elementor_data, 'woocommerce-cart' ) ) {
					$cart_description = __( "Astra's modern cart is disabled when Elementor Cart block is added on the cart page to prevent layout conflicts.", 'astra-addon' );
				}
			}
		}

		$_configs = array(

			/**
			 * Option: Divider.
			 */
			array(
				'name'     => ASTRA_THEME_SETTINGS . '[cart-general-divider]',
				'section'  => 'section-woo-shop-cart',
				'title'    => __( 'General', 'astra-addon' ),
				'type'     => 'control',
				'control'  => 'ast-heading',
				'priority' => 1,
				'settings' => array(),
			),

			/**
			 * Option: Enable Modern Cart Layout.
			 */
			array(
				'name'        => ASTRA_THEME_SETTINGS . '[cart-modern-layout]',
				'default'     => astra_get_option( 'cart-modern-layout' ),
				'type'        => 'control',
				'section'     => 'section-woo-shop-cart',
				'title'       => __( 'Enable Modern Cart Layout', 'astra-addon' ),
				'priority'    => 1,
				'control'     => Astra_Theme_Extension::$switch_control,
				'description' => $cart_description,
				'disabled'    => true,
				'divider'     => array( 'ast_class' => 'ast-section-spacing' ),
			),

			/**
			 * Option: Enable ajax quantity selector
			 */
			array(
				'name'     => ASTRA_THEME_SETTINGS . '[cart-sticky-cart-totals]',
				'default'  => astra_get_option( 'cart-sticky-cart-totals' ),
				'type'     => 'control',
				'section'  => 'section-woo-shop-cart',
				'title'    => __( 'Sticky Cart Totals', 'astra-addon' ),
				'priority' => 1,
				'control'  => Astra_Theme_Extension::$switch_control,
				'context'  => array(
					array(
						'setting'  => ASTRA_THEME_SETTINGS . '[cart-modern-layout]',
						'operator' => '==',
						'value'    => true,
					),
				),
			),

			/**
			 * Option: Enable ajax quantity selector
			 */
			array(
				'name'     => ASTRA_THEME_SETTINGS . '[cart-ajax-cart-quantity]',
				'default'  => astra_get_option( 'cart-ajax-cart-quantity' ),
				'type'     => 'control',
				'section'  => 'section-woo-shop-cart',
				'title'    => __( 'Real-Time Quantity Updater', 'astra-addon' ),
				'priority' => 1,
				'control'  => Astra_Theme_Extension::$switch_control,
			),

			/**
			 * Option: Divider
			 */
			array(
				'name'     => ASTRA_THEME_SETTINGS . '[cart-cross-sells-divider]',
				'section'  => 'section-woo-shop-cart',
				'title'    => __( 'Cross Sells', 'astra-addon' ),
				'type'     => 'control',
				'control'  => 'ast-heading',
				'priority' => 2.5,
				'settings' => array(),
				'divider'  => array( 'ast_class' => 'ast-top-section-divider' ),
			),
		);

		return array_merge( $configurations, $_configs );
	}

}

new Astra_Woocommerce_Shop_Cart_Configs();
