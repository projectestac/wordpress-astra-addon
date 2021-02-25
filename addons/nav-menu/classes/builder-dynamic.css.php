<?php
/**
 * Mega Menu - Dynamic CSS
 *
 * @package Astra Addon
 */

add_filter( 'astra_dynamic_css', 'astra_ext_mega_menu_dynamic_css' );

/**
 * Dynamic CSS
 *
 * @param  string $dynamic_css          Astra Dynamic CSS.
 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
 * @return string
 */
function astra_ext_mega_menu_dynamic_css( $dynamic_css, $dynamic_css_filtered = '' ) {

	$css = '';

	$common_css_output = array(
		'.ast-desktop .ast-mm-widget-content .ast-mm-widget-item' => array(
			'padding' => 0,
		),
	);

	// Common options of Above Header.
	$css .= astra_parse_css( $common_css_output );

	return $dynamic_css . $css;
}
