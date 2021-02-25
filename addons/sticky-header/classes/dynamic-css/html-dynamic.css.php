<?php
/**
 * Sticky Header HTML Dynamic CSS
 *
 * @package Astra Addon
 */

add_filter( 'astra_dynamic_css', 'astra_sticky_header_html_dynamic_css' );

/**
 * Dynamic CSS
 *
 * @param  string $dynamic_css          Astra Dynamic CSS.
 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
 * @return string
 */
function astra_sticky_header_html_dynamic_css( $dynamic_css, $dynamic_css_filtered = '' ) {

	for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_header_html; $index++ ) {

		$selector = '.ast-header-sticked .site-header-section .ast-builder-layout-element.ast-header-html-' . $index;

		$css_output = array(

			$selector . ' .ast-builder-html-element' => array(
				'color' => esc_attr( astra_get_option( 'sticky-header-html-' . $index . 'color' ) ),
			),
		);

		/* Parse CSS from array() */
		$css_output = astra_parse_css( $css_output );

		$dynamic_css .= $css_output;
	}

	return $dynamic_css;
}
