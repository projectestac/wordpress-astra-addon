<?php
/**
 * Colors & Background - Dynamic CSS
 *
 * @package Astra Addon
 */

add_filter( 'astra_dynamic_css', 'astra_ext_header_sections_colors_dynamic_css' );

/**
 * Dynamic CSS
 *
 * @param  string $dynamic_css          Astra Dynamic CSS.
 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
 * @return string
 */
function astra_ext_header_sections_colors_dynamic_css( $dynamic_css, $dynamic_css_filtered = '' ) {

	$disable_primary_nav = astra_get_option( 'disable-primary-nav' );
	$above_header_merged = astra_get_option( 'above-header-merge-menu' );
	$below_header_merged = astra_get_option( 'below-header-merge-menu' );

	$header_break_point = astra_header_break_point(); // Header Break Point.

	$parse_css = '';

	/**
	 * Merge Header Section when there is no primary menu
	 */
	if ( $disable_primary_nav && ( $above_header_merged || $below_header_merged ) && ! Astra_Addon_Builder_Helper::$is_header_footer_builder_active ) {

		$header_bg_obj           = astra_get_option( 'header-bg-obj-responsive' );
		$desktop_header_bg_color = isset( $header_bg_obj['desktop']['background-color'] ) ? $header_bg_obj['desktop']['background-color'] : '';
		$tablet_header_bg_color  = isset( $header_bg_obj['tablet']['background-color'] ) ? $header_bg_obj['tablet']['background-color'] : '';
		$mobile_header_bg_color  = isset( $header_bg_obj['mobile']['background-color'] ) ? $header_bg_obj['mobile']['background-color'] : '';

		$primary_menu_bg_image   = astra_get_option( 'primary-menu-bg-obj-responsive' );
		$primary_menu_color      = astra_get_option( 'primary-menu-color-responsive' );
		$primary_menu_h_bg_color = astra_get_option( 'primary-menu-h-bg-color-responsive' );
		$primary_menu_h_color    = astra_get_option( 'primary-menu-h-color-responsive' );
		$primary_menu_a_bg_color = astra_get_option( 'primary-menu-a-bg-color-responsive' );
		$primary_menu_a_color    = astra_get_option( 'primary-menu-a-color-responsive' );

		$primary_submenu_b_color    = astra_get_option( 'primary-submenu-b-color' );
		$primary_submenu_bg_color   = astra_get_option( 'primary-submenu-bg-color-responsive' );
		$primary_submenu_color      = astra_get_option( 'primary-submenu-color-responsive' );
		$primary_submenu_h_bg_color = astra_get_option( 'primary-submenu-h-bg-color-responsive' );
		$primary_submenu_h_color    = astra_get_option( 'primary-submenu-h-color-responsive' );
		$primary_submenu_a_bg_color = astra_get_option( 'primary-submenu-a-bg-color-responsive' );
		$primary_submenu_a_color    = astra_get_option( 'primary-submenu-a-color-responsive' );

		// Desktop.
		$desktop_colors = array(

			/**
			 * Primary Menu merge with Above Header & Below Header menu
			 */
			'.ast-header-sections-navigation .menu-item.current-menu-item > .menu-link, .ast-above-header-menu-items .menu-item.current-menu-item > .menu-link,.ast-header-sections-navigation .menu-item.current-menu-ancestor > .menu-link, .ast-above-header-menu-items .menu-item.current-menu-ancestor > .menu-link' => array(
				'color'            => esc_attr( $primary_menu_a_color['desktop'] ),
				'background-color' => esc_attr( $primary_menu_a_bg_color['desktop'] ),
			),
			'.main-header-menu .menu-link:hover, .ast-header-custom-item .menu-link:hover, .main-header-menu .menu-item:hover > .menu-link, .main-header-menu .menu-item.focus > .menu-link, .ast-header-break-point .ast-header-sections-navigation .menu-link:hover, .ast-header-break-point .ast-header-sections-navigation .menu-link:focus' => array(
				'background-color' => esc_attr( $primary_menu_h_bg_color['desktop'] ),
				'color'            => esc_attr( $primary_menu_h_color['desktop'] ),
			),
			'.ast-header-sections-navigation .menu-item:hover > .ast-menu-toggle, .ast-header-sections-navigation .menu-item.focus > .ast-menu-toggle' => array(
				'color' => esc_attr( $primary_menu_h_color['desktop'] ),
			),

			'.ast-header-sections-navigation, .ast-header-sections-navigation .menu-link' => array(
				'color' => esc_attr( $primary_menu_color['desktop'] ),
			),

			'.ast-header-sections-navigation .ast-inline-search form' => array(
				'border-color' => esc_attr( $primary_menu_color['desktop'] ),
			),

			/**
			 * Primary Submenu
			 */
			'.ast-header-sections-navigation .sub-menu .menu-link' => array(
				'color' => esc_attr( $primary_submenu_color['desktop'] ),
			),
			'.ast-header-sections-navigation .sub-menu .menu-link:hover' => array(
				'color'            => esc_attr( $primary_submenu_h_color['desktop'] ),
				'background-color' => esc_attr( $primary_submenu_h_bg_color['desktop'] ),
			),
			'.ast-header-sections-navigation .sub-menu .menu-item:hover > .ast-menu-toggle, .ast-header-sections-navigation .sub-menu .menu-item:focus > .ast-menu-toggle, .ast-above-header-menu-items .sub-menu .menu-item:hover > .ast-menu-toggle, .ast-above-header-menu-items .sub-menu .menu-item:focus > .ast-menu-toggle' => array(
				'color' => esc_attr( $primary_submenu_h_color['desktop'] ),
			),
			'.ast-header-sections-navigation .sub-menu .menu-item.current-menu-item > .menu-link' => array(
				'color'            => esc_attr( $primary_submenu_a_color['desktop'] ),
				'background-color' => esc_attr( $primary_submenu_a_bg_color['desktop'] ),
			),
			'.ast-header-sections-navigation .sub-menu > .menu-item > .menu-link' => array(
				'border-color' => esc_attr( $primary_submenu_b_color ),
			),
			'.main-navigation .sub-menu, .ast-header-break-point .main-header-menu .sub-menu, .ast-header-sections-navigation .sub-menu > .menu-item > .menu-link' => array(
				'background-color' => esc_attr( $primary_submenu_bg_color['desktop'] ),
			),
		);

		// Tablet.
		$tablet_colors = array(

			/**
			 * Primary Menu merge with Above Header & Below Header menu
			 */
			'.ast-header-sections-navigation .menu-item.current-menu-item > .menu-link,.ast-header-sections-navigation .menu-item.current-menu-ancestor > .menu-link' => array(
				'color'            => esc_attr( $primary_menu_a_color['tablet'] ),
				'background-color' => esc_attr( $primary_menu_a_bg_color['tablet'] ),
			),
			'.main-header-menu .menu-link:hover, .ast-header-custom-item .menu-link:hover, .main-header-menu .menu-item:hover > .menu-link, .main-header-menu .menu-item.focus > .menu-link, .ast-header-break-point .ast-header-sections-navigation .menu-link:hover, .ast-header-break-point .ast-header-sections-navigation .menu-link:focus' => array(
				'background-color' => esc_attr( $primary_menu_h_bg_color['tablet'] ),
				'color'            => esc_attr( $primary_menu_h_color['tablet'] ),
			),
			'.ast-header-sections-navigation .menu-item:hover > .ast-menu-toggle, .ast-header-sections-navigation .menu-item.focus > .ast-menu-toggle' => array(
				'color' => esc_attr( $primary_menu_h_color['tablet'] ),
			),

			'.ast-header-sections-navigation, .ast-header-sections-navigation .menu-link' => array(
				'color' => esc_attr( $primary_menu_color['tablet'] ),
			),

			'.ast-header-sections-navigation .ast-inline-search form' => array(
				'border-color' => esc_attr( $primary_menu_color['tablet'] ),
			),

			/**
			 * Primary Submenu
			 */
			'.ast-header-sections-navigation .sub-menu .menu-link, .ast-above-header-menu-items .sub-menu .menu-link' => array(
				'color' => esc_attr( $primary_submenu_color['tablet'] ),
			),
			'.ast-header-sections-navigation .sub-menu .menu-link:hover' => array(
				'color'            => esc_attr( $primary_submenu_h_color['tablet'] ),
				'background-color' => esc_attr( $primary_submenu_h_bg_color['tablet'] ),
			),
			'.ast-header-sections-navigation .sub-menu .menu-item:hover > .ast-menu-toggle, .ast-header-sections-navigation .sub-menu .menu-item:focus > .ast-menu-toggle' => array(
				'color' => esc_attr( $primary_submenu_h_color['tablet'] ),
			),
			'.ast-header-sections-navigation .sub-menu .menu-item.current-menu-item > .menu-link' => array(
				'color'            => esc_attr( $primary_submenu_a_color['tablet'] ),
				'background-color' => esc_attr( $primary_submenu_a_bg_color['tablet'] ),
			),
			'.main-navigation .sub-menu, .ast-header-break-point .main-header-menu .sub-menu, .ast-header-sections-navigation .sub-menu > .menu-item > .menu-link' => array(
				'background-color' => esc_attr( $primary_submenu_bg_color['tablet'] ),
			),
		);

		// Mobile.
		$mobile_colors = array(

			/**
			 * Primary Menu merge with Above Header & Below Header menu
			 */
			'.ast-header-sections-navigation .menu-item.current-menu-item > .menu-link,.ast-header-sections-navigation .menu-item.current-menu-ancestor > .menu-link' => array(
				'color'            => esc_attr( $primary_menu_a_color['mobile'] ),
				'background-color' => esc_attr( $primary_menu_a_bg_color['mobile'] ),
			),
			'.main-header-menu .menu-link:hover, .ast-header-custom-item .menu-link:hover, .main-header-menu .menu-item:hover > .menu-link, .main-header-menu .menu-item.focus > .menu-link, .ast-header-break-point .ast-header-sections-navigation .menu-link:hover, .ast-header-break-point .ast-header-sections-navigation .menu-link:focus' => array(
				'background-color' => esc_attr( $primary_menu_h_bg_color['mobile'] ),
				'color'            => esc_attr( $primary_menu_h_color['mobile'] ),
			),
			'.ast-header-sections-navigation .menu-item:hover > .ast-menu-toggle, .ast-header-sections-navigation .menu-item.focus > .ast-menu-toggle' => array(
				'color' => esc_attr( $primary_menu_h_color['mobile'] ),
			),
			'.ast-header-sections-navigation, .ast-header-sections-navigation .menu-link' => array(
				'color' => esc_attr( $primary_menu_color['mobile'] ),
			),
			'.ast-header-sections-navigation .ast-inline-search form' => array(
				'border-color' => esc_attr( $primary_menu_color['mobile'] ),
			),

			/**
			 * Primary Submenu
			 */
			'.ast-header-sections-navigation .sub-menu .menu-link' => array(
				'color' => esc_attr( $primary_submenu_color['mobile'] ),
			),
			'.ast-header-sections-navigation .sub-menu .menu-link:hover' => array(
				'color'            => esc_attr( $primary_submenu_h_color['mobile'] ),
				'background-color' => esc_attr( $primary_submenu_h_bg_color['mobile'] ),
			),
			'.ast-header-sections-navigation .sub-menu .menu-item:hover > .ast-menu-toggle, .ast-header-sections-navigation .sub-menu .menu-item:focus > .ast-menu-toggle' => array(
				'color' => esc_attr( $primary_submenu_h_color['mobile'] ),
			),
			'.ast-header-sections-navigation .sub-menu .menu-item.current-menu-item > .menu-link' => array(
				'color'            => esc_attr( $primary_submenu_a_color['mobile'] ),
				'background-color' => esc_attr( $primary_submenu_a_bg_color['mobile'] ),
			),
			'.main-navigation .sub-menu, .ast-header-break-point .main-header-menu .sub-menu, .ast-header-sections-navigation .sub-menu > .menu-item > .menu-link' => array(
				'background-color' => esc_attr( $primary_submenu_bg_color['mobile'] ),
			),
		);

		// Desktop.
		if ( '' != $primary_menu_bg_image['desktop']['background-color'] || '' != $primary_menu_bg_image['desktop']['background-image'] ) {
			// If primary menu background color is set then only apply it to the Merged menu.
			$desktop_colors['.ast-header-break-point .ast-header-sections-navigation'] = astra_get_responsive_background_obj( $primary_menu_bg_image, 'desktop' );
		} else {
			// If primary menu background color is not set then only apply Header background color to the Merged menu.
			$desktop_colors['.ast-header-break-point .ast-header-sections-navigation'] = array(
				'background-color' => esc_attr( $desktop_header_bg_color ),
			);
		}

		// Tablet.
		if ( '' != $primary_menu_bg_image['tablet']['background-color'] || '' != $primary_menu_bg_image['tablet']['background-image'] ) {
			// If primary menu background color is set then only apply it to the Merged menu.
			$tablet_colors['.ast-header-break-point .ast-header-sections-navigation'] = astra_get_responsive_background_obj( $primary_menu_bg_image, 'tablet' );
		} else {
			// If primary menu background color is not set then only apply Header background color to the Merged menu.
			$tablet_colors['.ast-header-break-point .ast-header-sections-navigation'] = array(
				'background-color' => esc_attr( $tablet_header_bg_color ),
			);
		}

		// mobile.
		if ( '' != $primary_menu_bg_image['mobile']['background-color'] || '' != $primary_menu_bg_image['mobile']['background-image'] ) {
			// If primary menu background color is set then only apply it to the Merged menu.
			$mobile_colors['.ast-header-break-point .ast-header-sections-navigation'] = astra_get_responsive_background_obj( $primary_menu_bg_image, 'mobile' );
		} else {
			// If primary menu background color is not set then only apply Header background color to the Merged menu.
			$mobile_colors['.ast-header-break-point .ast-header-sections-navigation'] = array(
				'background-color' => esc_attr( $mobile_header_bg_color ),
			);
		}

		/* Parse CSS from array() */
		$parse_css .= astra_parse_css( $desktop_colors );
		$parse_css .= astra_parse_css( $tablet_colors, '', astra_addon_get_tablet_breakpoint() );
		$parse_css .= astra_parse_css( $mobile_colors, '', astra_addon_get_mobile_breakpoint() );
	}

	if ( Astra_Addon_Builder_Helper::$is_header_footer_builder_active ) {
		/**
		 * Header - Menu
		 */
		for ( $index = 1; $index <= Astra_Addon_Builder_Helper::$num_of_header_menu; $index++ ) {

			if ( ! Astra_Addon_Builder_Helper::is_component_loaded( 'menu-' . $index, 'header' ) ) {
				continue;
			}

			$_prefix  = 'menu' . $index;
			$_section = 'section-hb-menu-' . $index;

			$selector         = '.ast-builder-menu-' . $index . ' .main-header-menu';
			$selector_desktop = '.ast-desktop .ast-builder-menu-' . $index . ' .main-header-menu';

			$submenu_resp_color           = astra_get_option( 'header-' . $_prefix . '-submenu-color-responsive' );
			$submenu_resp_bg_color        = astra_get_option( 'header-' . $_prefix . '-submenu-bg-color-responsive' );
			$submenu_resp_color_hover     = astra_get_option( 'header-' . $_prefix . '-submenu-h-color-responsive' );
			$submenu_resp_bg_color_hover  = astra_get_option( 'header-' . $_prefix . '-submenu-h-bg-color-responsive' );
			$submenu_resp_color_active    = astra_get_option( 'header-' . $_prefix . '-submenu-a-color-responsive' );
			$submenu_resp_bg_color_active = astra_get_option( 'header-' . $_prefix . '-submenu-a-bg-color-responsive' );

			$submenu_resp_color_desktop = ( isset( $submenu_resp_color['desktop'] ) ) ? $submenu_resp_color['desktop'] : '';
			$submenu_resp_color_tablet  = ( isset( $submenu_resp_color['tablet'] ) ) ? $submenu_resp_color['tablet'] : '';
			$submenu_resp_color_mobile  = ( isset( $submenu_resp_color['mobile'] ) ) ? $submenu_resp_color['mobile'] : '';

			$submenu_resp_bg_color_desktop = ( isset( $submenu_resp_bg_color['desktop'] ) ) ? $submenu_resp_bg_color['desktop'] : '';
			$submenu_resp_bg_color_tablet  = ( isset( $submenu_resp_bg_color['tablet'] ) ) ? $submenu_resp_bg_color['tablet'] : '';
			$submenu_resp_bg_color_mobile  = ( isset( $submenu_resp_bg_color['mobile'] ) ) ? $submenu_resp_bg_color['mobile'] : '';

			$submenu_resp_color_hover_desktop = ( isset( $submenu_resp_color_hover['desktop'] ) ) ? $submenu_resp_color_hover['desktop'] : '';
			$submenu_resp_color_hover_tablet  = ( isset( $submenu_resp_color_hover['tablet'] ) ) ? $submenu_resp_color_hover['tablet'] : '';
			$submenu_resp_color_hover_mobile  = ( isset( $submenu_resp_color_hover['mobile'] ) ) ? $submenu_resp_color_hover['mobile'] : '';

			$submenu_resp_bg_color_hover_desktop = ( isset( $submenu_resp_bg_color_hover['desktop'] ) ) ? $submenu_resp_bg_color_hover['desktop'] : '';
			$submenu_resp_bg_color_hover_tablet  = ( isset( $submenu_resp_bg_color_hover['tablet'] ) ) ? $submenu_resp_bg_color_hover['tablet'] : '';
			$submenu_resp_bg_color_hover_mobile  = ( isset( $submenu_resp_bg_color_hover['mobile'] ) ) ? $submenu_resp_bg_color_hover['mobile'] : '';

			$submenu_resp_color_active_desktop = ( isset( $submenu_resp_color_active['desktop'] ) ) ? $submenu_resp_color_active['desktop'] : '';
			$submenu_resp_color_active_tablet  = ( isset( $submenu_resp_color_active['tablet'] ) ) ? $submenu_resp_color_active['tablet'] : '';
			$submenu_resp_color_active_mobile  = ( isset( $submenu_resp_color_active['mobile'] ) ) ? $submenu_resp_color_active['mobile'] : '';

			$submenu_resp_bg_color_active_desktop = ( isset( $submenu_resp_bg_color_active['desktop'] ) ) ? $submenu_resp_bg_color_active['desktop'] : '';
			$submenu_resp_bg_color_active_tablet  = ( isset( $submenu_resp_bg_color_active['tablet'] ) ) ? $submenu_resp_bg_color_active['tablet'] : '';
			$submenu_resp_bg_color_active_mobile  = ( isset( $submenu_resp_bg_color_active['mobile'] ) ) ? $submenu_resp_bg_color_active['mobile'] : '';

			if ( 3 > $index ) {
				$css_megamenu_output_desktop = array(

					// Mega Menu.
					$selector_desktop . ' .menu-item.menu-item-heading > .menu-link' => array(
						'color' => esc_attr( astra_get_option( 'header-' . $_prefix . '-header-megamenu-heading-color' ) ),
					),
					$selector_desktop . ' .astra-megamenu-li .menu-item.menu-item-heading > .menu-link:hover, ' . $selector_desktop . ' .astra-megamenu-li .menu-item.menu-item-heading:hover > .menu-link' => array(
						'color' => esc_attr( astra_get_option( 'header-' . $_prefix . '-header-megamenu-heading-h-color' ) ),
					),
				);
				$parse_css                  .= astra_parse_css( $css_megamenu_output_desktop );
			}

			$css_output_desktop = array(
				// Sub Menu.
				$selector . ' .sub-menu'            => array(
					'background' => $submenu_resp_bg_color_desktop,
				),
				$selector . ' .sub-menu .menu-link' => array(
					'color' => $submenu_resp_color_desktop,
				),
				$selector . ' .sub-menu .menu-item > .ast-menu-toggle' => array(
					'color' => $submenu_resp_color_desktop,
				),
				$selector . ' .sub-menu .menu-item .menu-link:hover' => array(
					'color'      => $submenu_resp_color_hover_desktop,
					'background' => $submenu_resp_bg_color_hover_desktop,
				),
				$selector . ' .sub-menu .menu-item:hover > .ast-menu-toggle' => array(
					'color' => $submenu_resp_color_desktop,
				),
				$selector . ' .sub-menu .current-menu-item > .menu-link' => array(
					'color'      => $submenu_resp_color_active_desktop,
					'background' => $submenu_resp_bg_color_active_desktop,
				),
				$selector . ' .sub-menu .current-menu-item > .ast-menu-toggle' => array(
					'color' => $submenu_resp_color_active_desktop,
				),
			);

			$css_output_tablet = array(

				$selector . '.ast-nav-menu .sub-menu' => array(
					'background' => $submenu_resp_bg_color_tablet,
				),
				$selector . '.ast-nav-menu .sub-menu' => array(
					'background' => $submenu_resp_bg_color_tablet,
				),
				$selector . '.ast-nav-menu .sub-menu .menu-item .menu-link' => array(
					'color' => $submenu_resp_color_tablet,
				),
				$selector . ' .sub-menu .menu-item > .ast-menu-toggle' => array(
					'color' => $submenu_resp_color_tablet,
				),
				$selector . '.ast-nav-menu .sub-menu .menu-item .menu-link:hover' => array(
					'color'      => $submenu_resp_color_hover_tablet,
					'background' => $submenu_resp_bg_color_hover_tablet,
				),
				$selector . ' .sub-menu .menu-item:hover > .ast-menu-toggle' => array(
					'color' => $submenu_resp_color_hover_tablet,
				),
				$selector . '.ast-nav-menu .sub-menu .menu-item.current-menu-item > .menu-link' => array(
					'color'      => $submenu_resp_color_active_tablet,
					'background' => $submenu_resp_bg_color_active_tablet,
				),
				$selector . ' .sub-menu .current-menu-item > .ast-menu-toggle' => array(
					'color' => $submenu_resp_color_active_tablet,
				),
			);

			$css_output_mobile = array(

				$selector . '.ast-nav-menu .sub-menu' => array(
					'background' => $submenu_resp_bg_color_mobile,
				),
				$selector . '.ast-nav-menu .sub-menu' => array(
					'background' => $submenu_resp_bg_color_mobile,
				),
				$selector . '.ast-nav-menu .sub-menu .menu-item .menu-link' => array(
					'color' => $submenu_resp_color_mobile,
				),
				$selector . ' .sub-menu .menu-item  > .ast-menu-toggle' => array(
					'color' => $submenu_resp_color_mobile,
				),
				$selector . '.ast-nav-menu .sub-menu .menu-item .menu-link:hover' => array(
					'color'      => $submenu_resp_color_hover_mobile,
					'background' => $submenu_resp_bg_color_hover_mobile,
				),
				$selector . ' .sub-menu .menu-item:hover  > .ast-menu-toggle' => array(
					'color' => $submenu_resp_color_hover_mobile,
				),
				$selector . '.ast-nav-menu .sub-menu .menu-item.current-menu-item > .menu-link' => array(
					'color'      => $submenu_resp_color_active_mobile,
					'background' => $submenu_resp_bg_color_active_mobile,
				),
				$selector . ' .sub-menu .current-menu-item  > .ast-menu-toggle' => array(
					'color' => $submenu_resp_color_active_mobile,
				),
			);

			$parse_css .= astra_parse_css( $css_output_desktop );
			$parse_css .= astra_parse_css( $css_output_tablet, '', astra_addon_get_tablet_breakpoint() );
			$parse_css .= astra_parse_css( $css_output_mobile, '', astra_addon_get_mobile_breakpoint() );
		}

		/**
		 * Mobile Menu
		 */
		$_section = 'section-header-mobile-menu';

		$selector = '.astra-hfb-header .ast-builder-menu-mobile .main-header-menu';

		$submenu_resp_color           = astra_get_option( 'header-mobile-menu-submenu-color-responsive' );
		$submenu_resp_bg_color        = astra_get_option( 'header-mobile-menu-submenu-bg-color-responsive' );
		$submenu_resp_color_hover     = astra_get_option( 'header-mobile-menu-submenu-h-color-responsive' );
		$submenu_resp_bg_color_hover  = astra_get_option( 'header-mobile-menu-submenu-h-bg-color-responsive' );
		$submenu_resp_color_active    = astra_get_option( 'header-mobile-menu-submenu-a-color-responsive' );
		$submenu_resp_bg_color_active = astra_get_option( 'header-mobile-menu-submenu-a-bg-color-responsive' );

		$submenu_resp_color_tablet = ( isset( $submenu_resp_color['tablet'] ) ) ? $submenu_resp_color['tablet'] : '';
		$submenu_resp_color_mobile = ( isset( $submenu_resp_color['mobile'] ) ) ? $submenu_resp_color['mobile'] : '';

		$submenu_resp_bg_color_tablet = ( isset( $submenu_resp_bg_color['tablet'] ) ) ? $submenu_resp_bg_color['tablet'] : '';
		$submenu_resp_bg_color_mobile = ( isset( $submenu_resp_bg_color['mobile'] ) ) ? $submenu_resp_bg_color['mobile'] : '';

		$submenu_resp_color_hover_tablet = ( isset( $submenu_resp_color_hover['tablet'] ) ) ? $submenu_resp_color_hover['tablet'] : '';
		$submenu_resp_color_hover_mobile = ( isset( $submenu_resp_color_hover['mobile'] ) ) ? $submenu_resp_color_hover['mobile'] : '';

		$submenu_resp_bg_color_hover_tablet = ( isset( $submenu_resp_bg_color_hover['tablet'] ) ) ? $submenu_resp_bg_color_hover['tablet'] : '';
		$submenu_resp_bg_color_hover_mobile = ( isset( $submenu_resp_bg_color_hover['mobile'] ) ) ? $submenu_resp_bg_color_hover['mobile'] : '';

		$submenu_resp_color_active_tablet = ( isset( $submenu_resp_color_active['tablet'] ) ) ? $submenu_resp_color_active['tablet'] : '';
		$submenu_resp_color_active_mobile = ( isset( $submenu_resp_color_active['mobile'] ) ) ? $submenu_resp_color_active['mobile'] : '';

		$submenu_resp_bg_color_active_tablet = ( isset( $submenu_resp_bg_color_active['tablet'] ) ) ? $submenu_resp_bg_color_active['tablet'] : '';
		$submenu_resp_bg_color_active_mobile = ( isset( $submenu_resp_bg_color_active['mobile'] ) ) ? $submenu_resp_bg_color_active['mobile'] : '';

		$css_output_tablet = array(

			$selector . '.ast-nav-menu .sub-menu' => array(
				'background' => $submenu_resp_bg_color_tablet,
			),
			$selector . '.ast-nav-menu .sub-menu' => array(
				'background' => $submenu_resp_bg_color_tablet,
			),
			$selector . '.ast-nav-menu .sub-menu .menu-item .menu-link' => array(
				'color' => $submenu_resp_color_tablet,
			),
			$selector . ' .sub-menu .menu-item > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_tablet,
			),
			$selector . '.ast-nav-menu .sub-menu .menu-item .menu-link:hover' => array(
				'color'      => $submenu_resp_color_hover_tablet,
				'background' => $submenu_resp_bg_color_hover_tablet,
			),
			$selector . ' .sub-menu .menu-item:hover > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_hover_tablet,
			),
			$selector . '.ast-nav-menu .sub-menu .menu-item.current-menu-item > .menu-link' => array(
				'color'      => $submenu_resp_color_active_tablet,
				'background' => $submenu_resp_bg_color_active_tablet,
			),
			$selector . ' .sub-menu .current-menu-item > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_active_tablet,
			),
		);

		$css_output_mobile = array(

			$selector . '.ast-nav-menu .sub-menu' => array(
				'background' => $submenu_resp_bg_color_mobile,
			),
			$selector . '.ast-nav-menu .sub-menu' => array(
				'background' => $submenu_resp_bg_color_mobile,
			),
			$selector . '.ast-nav-menu .sub-menu .menu-item .menu-link' => array(
				'color' => $submenu_resp_color_mobile,
			),
			$selector . ' .sub-menu .menu-item  > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_mobile,
			),
			$selector . '.ast-nav-menu .sub-menu .menu-item .menu-link:hover' => array(
				'color'      => $submenu_resp_color_hover_mobile,
				'background' => $submenu_resp_bg_color_hover_mobile,
			),
			$selector . ' .sub-menu .menu-item:hover  > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_hover_mobile,
			),
			$selector . '.ast-nav-menu .sub-menu .menu-item.current-menu-item > .menu-link' => array(
				'color'      => $submenu_resp_color_active_mobile,
				'background' => $submenu_resp_bg_color_active_mobile,
			),
			$selector . ' .sub-menu .current-menu-item  > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_active_mobile,
			),
		);

		$parse_css .= astra_parse_css( $css_output_tablet, '', astra_addon_get_tablet_breakpoint() );
		$parse_css .= astra_parse_css( $css_output_mobile, '', astra_addon_get_mobile_breakpoint() );

		/**
		 * Footer - Copyright
		 */

		$css_output = array(
			// Copyright Link.
			'.ast-footer-copyright .ast-footer-html-inner a' => array(
				'color' => esc_attr( astra_get_option( 'footer-copyright-link-color' ) ),
			),
			'.ast-footer-copyright .ast-footer-html-inner a:hover' => array(
				'color' => esc_attr( astra_get_option( 'footer-copyright-link-h-color' ) ),
			),
		);

		$parse_css .= astra_parse_css( $css_output );

		if ( Astra_Addon_Builder_Helper::is_component_loaded( 'account', 'header' ) ) {

			$_section     = 'section-header-account';
			$selector     = '.ast-header-account-wrap';
			$adv_selector = '.ast-advanced-headers .ast-header-account-wrap';

			/**
			 * Header - Account
			 */
			$login_label_color        = astra_get_option( 'header-account-popup-label-color' );
			$login_input_text_color   = astra_get_option( 'header-account-popup-input-text-color' );
			$login_input_border_color = astra_get_option( 'header-account-popup-input-border-color' );
			$login_button_text_color  = astra_get_option( 'header-account-popup-button-text-color' );
			$login_button_bg_color    = astra_get_option( 'header-account-popup-button-bg-color' );
			$popup_bg_color           = astra_get_option( 'header-account-popup-bg-color' );

			// Menu colors.
			$menu_resp_color           = astra_get_option( 'header-account-menu-color-responsive' );
			$menu_resp_bg_color        = astra_get_option( 'header-account-menu-bg-obj-responsive' );
			$menu_resp_color_hover     = astra_get_option( 'header-account-menu-h-color-responsive' );
			$menu_resp_bg_color_hover  = astra_get_option( 'header-account-menu-h-bg-color-responsive' );
			$menu_resp_color_active    = astra_get_option( 'header-account-menu-a-color-responsive' );
			$menu_resp_bg_color_active = astra_get_option( 'header-account-menu-a-bg-color-responsive' );

			$menu_resp_color_desktop = ( isset( $menu_resp_color['desktop'] ) ) ? $menu_resp_color['desktop'] : '';
			$menu_resp_color_tablet  = ( isset( $menu_resp_color['tablet'] ) ) ? $menu_resp_color['tablet'] : '';
			$menu_resp_color_mobile  = ( isset( $menu_resp_color['mobile'] ) ) ? $menu_resp_color['mobile'] : '';

			$menu_resp_bg_color_desktop = ( isset( $menu_resp_bg_color['desktop'] ) ) ? $menu_resp_bg_color['desktop'] : '';
			$menu_resp_bg_color_tablet  = ( isset( $menu_resp_bg_color['tablet'] ) ) ? $menu_resp_bg_color['tablet'] : '';
			$menu_resp_bg_color_mobile  = ( isset( $menu_resp_bg_color['mobile'] ) ) ? $menu_resp_bg_color['mobile'] : '';

			$menu_resp_color_hover_desktop = ( isset( $menu_resp_color_hover['desktop'] ) ) ? $menu_resp_color_hover['desktop'] : '';
			$menu_resp_color_hover_tablet  = ( isset( $menu_resp_color_hover['tablet'] ) ) ? $menu_resp_color_hover['tablet'] : '';
			$menu_resp_color_hover_mobile  = ( isset( $menu_resp_color_hover['mobile'] ) ) ? $menu_resp_color_hover['mobile'] : '';

			$menu_resp_bg_color_hover_desktop = ( isset( $menu_resp_bg_color_hover['desktop'] ) ) ? $menu_resp_bg_color_hover['desktop'] : '';
			$menu_resp_bg_color_hover_tablet  = ( isset( $menu_resp_bg_color_hover['tablet'] ) ) ? $menu_resp_bg_color_hover['tablet'] : '';
			$menu_resp_bg_color_hover_mobile  = ( isset( $menu_resp_bg_color_hover['mobile'] ) ) ? $menu_resp_bg_color_hover['mobile'] : '';

			$menu_resp_color_active_desktop = ( isset( $menu_resp_color_active['desktop'] ) ) ? $menu_resp_color_active['desktop'] : '';
			$menu_resp_color_active_tablet  = ( isset( $menu_resp_color_active['tablet'] ) ) ? $menu_resp_color_active['tablet'] : '';
			$menu_resp_color_active_mobile  = ( isset( $menu_resp_color_active['mobile'] ) ) ? $menu_resp_color_active['mobile'] : '';

			$menu_resp_bg_color_active_desktop = ( isset( $menu_resp_bg_color_active['desktop'] ) ) ? $menu_resp_bg_color_active['desktop'] : '';
			$menu_resp_bg_color_active_tablet  = ( isset( $menu_resp_bg_color_active['tablet'] ) ) ? $menu_resp_bg_color_active['tablet'] : '';
			$menu_resp_bg_color_active_mobile  = ( isset( $menu_resp_bg_color_active['mobile'] ) ) ? $menu_resp_bg_color_active['mobile'] : '';

			/**
			 * Account CSS.
			 */
			$account_css_desktop = array(
				'.ast-header-account-wrap .ast-hb-account-login-form input[type="submit"]' => array(
					'color'            => esc_attr( $login_button_text_color ),
					'background-color' => esc_attr( $login_button_bg_color ),
				),
				'.ast-header-account-wrap .ast-hb-account-login-form label,.ast-header-account-wrap .ast-hb-account-login-form-footer .ast-header-account-footer-link' => array(
					'color' => esc_attr( $login_label_color ),
				),
				'.ast-header-account-wrap .ast-hb-account-login-form #loginform input[type=text], .ast-header-account-wrap .ast-hb-account-login-form #loginform input[type=password]' => array(
					'color'        => esc_attr( $login_input_text_color ),
					'border-color' => esc_attr( $login_input_border_color ),
				),
				'.ast-header-account-wrap .ast-hb-account-login' => array(
					'background' => $popup_bg_color,
				),
				$selector . ' .main-header-menu.ast-account-nav-menu .menu-item .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .menu-item .menu-link' => array(
					'color' => $menu_resp_color_desktop,
				),
				$selector . ' .main-header-menu.ast-account-nav-menu .menu-item:hover > .menu-link, ' . $selector . ' .main-header-menu.ast-account-nav-menu .menu-item > .menu-link:hover,' . $selector . ' .main-header-menu.ast-account-nav-menu .menu-item.current-menu-item:hover > .menu-link, ' . $selector . ' .main-header-menu.ast-account-nav-menu .woocommerce-MyAccount-navigation-link.is-active:hover > .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .menu-item:hover > .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .menu-item > .menu-link:hover,' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .menu-item.current-menu-item:hover > .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .woocommerce-MyAccount-navigation-link.is-active:hover > .menu-link' => array(
					'color'      => $menu_resp_color_hover_desktop,
					'background' => $menu_resp_bg_color_hover_desktop,
				),
				$selector . ' .main-header-menu.ast-account-nav-menu .menu-item.current-menu-item > .menu-link, ' . $selector . ' .main-header-menu.ast-account-nav-menu .woocommerce-MyAccount-navigation-link.is-active > .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .menu-item.current-menu-item > .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .woocommerce-MyAccount-navigation-link.is-active > .menu-link' => array(
					'color'      => $menu_resp_color_active_desktop,
					'background' => $menu_resp_bg_color_active_desktop,
				),

				$selector . ' .account-main-navigation ul, ' . $selector . ' .account-woo-navigation ul, ' . $adv_selector . ' .account-main-navigation ul, ' . $adv_selector . ' .account-woo-navigation ul' => array(
					'background' => $menu_resp_bg_color_desktop,
				),
				$selector . ' .menu-item .menu-link' => array(
					'border-style' => 'none',
				),
			);

			$account_css_tablet = array(
				$selector . ' .main-header-menu.ast-account-nav-menu .menu-item .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .menu-item .menu-link' => array(
					'color' => $menu_resp_color_tablet,
				),
				$selector . ' .main-header-menu.ast-account-nav-menu .menu-item:hover > .menu-link, ' . $selector . ' .main-header-menu.ast-account-nav-menu .menu-item > .menu-link:hover, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .menu-item:hover > .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .menu-item > .menu-link:hover'    => array(
					'color'      => $menu_resp_color_hover_tablet,
					'background' => $menu_resp_bg_color_hover_tablet,
				),
				$selector . ' .main-header-menu.ast-account-nav-menu .menu-item.current-menu-item > .menu-link, ' . $selector . ' .main-header-menu.ast-account-nav-menu .woocommerce-MyAccount-navigation-link.is-active > .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .menu-item.current-menu-item > .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .woocommerce-MyAccount-navigation-link.is-active > .menu-link' => array(
					'color'      => $menu_resp_color_active_tablet,
					'background' => $menu_resp_bg_color_active_tablet,
				),

				$selector . ' .account-main-navigation ul, ' . $selector . ' .account-woo-navigation ul, ' . $adv_selector . ' .account-main-navigation ul, ' . $adv_selector . ' .account-woo-navigation ul' => array(
					'background' => $menu_resp_bg_color_tablet,
				),
				'.ast-header-break-point ' . $selector . ' .account-main-navigation .menu-item .menu-link, .ast-header-break-point ' . $selector . ' .account-main-navigation .menu-item .menu-link' => array(
					'border-style' => 'none',
				),
			);

			$account_css_mobile = array(
				$selector . ' .main-header-menu.ast-account-nav-menu .menu-item .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .menu-item .menu-link' => array(
					'color' => $menu_resp_color_mobile,
				),
				$selector . ' .main-header-menu.ast-account-nav-menu .menu-item:hover > .menu-link, ' . $selector . ' .main-header-menu.ast-account-nav-menu .menu-item > .menu-link:hover, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .menu-item:hover > .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .menu-item > .menu-link:hover'    => array(
					'color'      => $menu_resp_color_hover_mobile,
					'background' => $menu_resp_bg_color_hover_mobile,
				),
				$selector . ' .main-header-menu.ast-account-nav-menu .menu-item.current-menu-item > .menu-link, ' . $selector . ' .main-header-menu.ast-account-nav-menu .woocommerce-MyAccount-navigation-link.is-active > .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .menu-item.current-menu-item > .menu-link, ' . $adv_selector . ' .main-header-menu.ast-account-nav-menu .woocommerce-MyAccount-navigation-link.is-active > .menu-link' => array(
					'color'      => $menu_resp_color_active_mobile,
					'background' => $menu_resp_bg_color_active_mobile,
				),

				$selector . ' .account-main-navigation ul, ' . $selector . ' .account-woo-navigation ul, ' . $adv_selector . ' .account-main-navigation ul, ' . $adv_selector . ' .account-woo-navigation ul' => array(
					'background' => $menu_resp_bg_color_mobile,
				),
				'.ast-header-break-point ' . $selector . ' .account-main-navigation .menu-item .menu-link, .ast-header-break-point ' . $selector . ' .account-main-navigation .menu-item .menu-link' => array(
					'border-style' => 'none',
				),
			);

			$parse_css .= astra_parse_css( $account_css_desktop );
			$parse_css .= astra_parse_css( $account_css_tablet, '', astra_get_tablet_breakpoint() );
			$parse_css .= astra_parse_css( $account_css_mobile, '', astra_get_mobile_breakpoint() );
		}

		/**
		 * Search Colors Dynamic CSS.
		 */

		$search_selector      = '.ast-header-search .ast-search-menu-icon';
		$search_border_size   = astra_get_option( 'header-search-border-size' );
		$search_border_radius = astra_get_option( 'header-search-border-radius' );

		$search_css_output = array(

			// Search Box Background.
			$search_selector . ' .search-field'      => array(
				'background-color' => esc_attr( astra_get_option( 'header-search-box-background-color' ) ),

				// Search Box Border.
				'border-radius'    => astra_get_css_value( $search_border_radius, 'px' ),
			),
			$search_selector . ' .search-submit'     => array(
				'background-color' => esc_attr( astra_get_option( 'header-search-box-background-color' ) ),

				// Search Box Border.
				'border-radius'    => astra_get_css_value( $search_border_radius, 'px' ),
			),
			$search_selector . ' .search-form'       => array(
				'background-color'    => esc_attr( astra_get_option( 'header-search-box-background-color' ) ),

				// Search Box Border.
				'border-top-width'    => astra_get_css_value( $search_border_size['top'], 'px' ),
				'border-bottom-width' => astra_get_css_value( $search_border_size['bottom'], 'px' ),
				'border-left-width'   => astra_get_css_value( $search_border_size['left'], 'px' ),
				'border-right-width'  => astra_get_css_value( $search_border_size['right'], 'px' ),
				'border-color'        => esc_attr( astra_get_option( 'header-search-border-color' ) ),
				'border-radius'       => astra_get_css_value( $search_border_radius, 'px' ),
			),

			$search_selector . ' .search-form:hover' => array(
				'border-color' => esc_attr( astra_get_option( 'header-search-border-h-color' ) ),
			),

			// Seach Full Screen Overlay Color.
			'.ast-search-box.full-screen, .ast-search-box.header-cover' => array(
				'background' => esc_attr( astra_get_option( 'header-search-overlay-color' ) ),
			),

			// Search Overlay Text Color.
			'.ast-search-box.header-cover #close, .ast-search-box.full-screen #close, .ast-search-box.full-screen .ast-search-wrapper .large-search-text, .ast-search-box.header-cover .search-submit, .ast-search-box.full-screen .search-submit, .ast-search-box.header-cover .search-field, .ast-search-box.full-screen .search-field, .ast-search-box.header-cover .search-field::-webkit-input-placeholder, .ast-search-box.full-screen .search-field::-webkit-input-placeholder' => array(
				'color' => esc_attr( astra_get_option( 'header-search-overlay-text-color' ) ),
			),

			'.ast-search-box.full-screen .ast-search-wrapper fieldset' => array(
				'border-color' => esc_attr( astra_get_option( 'header-search-overlay-text-color' ) ),
			),
		);

		$parse_css .= astra_parse_css( $search_css_output );

	}

	return $dynamic_css . $parse_css;
}
