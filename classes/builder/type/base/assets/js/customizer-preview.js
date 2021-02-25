/**
 * Divider Component CSS.
 *
 * @param string builder_type Builder Type.
 * @param string divider_count HTML Count.
 *
 */
function astra_builder_divider_css( builder_type = 'header', divider_count ) {

	var tablet_break_point    = astraBuilderPreview.tablet_break_point || 768,
        mobile_break_point    = astraBuilderPreview.mobile_break_point || 544;

    for ( var index = 1; index <= divider_count; index++ ) {

		let selector = ( 'header' === builder_type ) ? '.ast-header-divider-' + index : '.footer-widget-area[data-section="section-fb-divider-' + index + '"]';

		let section = ( 'header' === builder_type ) ? 'section-hb-divider-' + index : 'section-fb-divider-' + index;

		// Divider - Style.
		astra_css(
			'astra-settings[' + builder_type + '-divider-' + index + '-style]',
			'border-style',
			selector + ' .ast-divider-wrapper'
		);

		astra_css(
			'astra-settings[' + builder_type + '-divider-' + index + '-color]',
			'border-color',
			selector + ' .ast-divider-wrapper, .ast-mobile-popup-content ' + selector + ' .ast-divider-wrapper'
		);

		// Advanced Visibility CSS Generation.
		astra_builder_visibility_css( section, selector );

		( function ( index ) {
			wp.customize( 'astra-settings[' + builder_type + '-divider-' + index + '-layout]', function ( value ) {
				value.bind( function ( newval ) {

					var context = ( 'header' === builder_type ) ? 'hb' : 'fb';
					var side_class = 'ast-' + context + '-divider-layout-' + newval;

					jQuery( '.ast-' + builder_type + '-divider-' + index ).removeClass( 'ast-' + context + '-divider-layout-horizontal' );
					jQuery( '.ast-' + builder_type + '-divider-' + index ).removeClass( 'ast-' + context + '-divider-layout-vertical' );
					jQuery( '.ast-' + builder_type + '-divider-' + index ).addClass( side_class );
				} );
			} );

			// Divider Thickness.
			wp.customize( 'astra-settings[' + builder_type + '-divider-' + index + '-thickness]', function( value ) {
				value.bind( function( size ) {
					if(
						size.desktop != '' || size.desktop != '' || size.desktop != '' || size.desktop != '' ||
						size.tablet != '' || size.tablet != '' || size.tablet != '' || size.tablet != '' ||
						size.mobile != '' || size.mobile != '' || size.mobile != '' || size.mobile != ''
					) {
						var dynamicStyle = '';
						dynamicStyle += selector + ' .ast-divider-layout-horizontal {';
						dynamicStyle += 'border-top-width: ' + size.desktop + 'px' + ';';
						dynamicStyle += '} ';

						dynamicStyle += selector + ' .ast-divider-layout-vertical {';
						dynamicStyle += 'border-right-width: ' + size.desktop + 'px' + ';';
						dynamicStyle += '} ';
		
						dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';

						dynamicStyle += selector + ' .ast-divider-layout-horizontal {';
						dynamicStyle += 'border-top-width: ' + size.tablet + 'px' + ';';
						dynamicStyle += '} ';

						dynamicStyle += selector + ' .ast-divider-layout-vertical {';
						dynamicStyle += 'border-right-width: ' + size.tablet + 'px' + ';';
						dynamicStyle += '} ';

						dynamicStyle += '} ';
		
						dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';

						dynamicStyle += selector + ' .ast-divider-layout-horizontal {';
						dynamicStyle += 'border-top-width: ' + size.mobile + 'px' + ';';
						dynamicStyle += '} ';

						dynamicStyle += selector + ' .ast-divider-layout-vertical {';
						dynamicStyle += 'border-right-width: ' + size.mobile + 'px' + ';';
						dynamicStyle += '} ';

						dynamicStyle += '} ';
						
						astra_add_dynamic_css( builder_type + '-divider-' + index + '-thickness', dynamicStyle );
					}
				} );
			} );

			// Divider Size.
			wp.customize( 'astra-settings[' + builder_type + '-divider-' + index + '-size]', function( value ) {
				value.bind( function( size ) {
					if(
						size.desktop != '' || size.desktop != '' || size.desktop != '' || size.desktop != '' ||
						size.tablet != '' || size.tablet != '' || size.tablet != '' || size.tablet != '' ||
						size.mobile != '' || size.mobile != '' || size.mobile != '' || size.mobile != ''
					) {
						var dynamicStyle = '';
						dynamicStyle += selector + '.ast-fb-divider-layout-horizontal .ast-divider-layout-horizontal,';
						dynamicStyle += selector + '.ast-hb-divider-layout-horizontal {';
						dynamicStyle += 'width: ' + size.desktop + '%' + ';';
						dynamicStyle += '} ';
		
						dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
						dynamicStyle += selector + '.ast-fb-divider-layout-horizontal .ast-divider-layout-horizontal,';
						dynamicStyle += selector + '.ast-hb-divider-layout-horizontal {';
						dynamicStyle += 'width: ' + size.tablet + '%' + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';
		
						dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
						dynamicStyle += selector + '.ast-fb-divider-layout-horizontal .ast-divider-layout-horizontal,';
						dynamicStyle += selector + '.ast-hb-divider-layout-horizontal {';
						dynamicStyle += 'width: ' + size.mobile + '%' + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';

						dynamicStyle += selector + ' .ast-divider-layout-vertical {';
						dynamicStyle += 'height: ' + size.desktop + '%' + ';';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
						dynamicStyle += selector + ' .ast-divider-layout-vertical {';
						dynamicStyle += 'height: ' + size.tablet + '%' + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
						dynamicStyle += selector + ' .ast-divider-layout-vertical {';
						dynamicStyle += 'height: ' + size.mobile + '%' + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';
						astra_add_dynamic_css( builder_type + '-divider-' + index + '-size', dynamicStyle );
					}
				} );
			} );

			// Margin.
			wp.customize( 'astra-settings[' + section + '-margin]', function( value ) {
				value.bind( function( margin ) {
					if(
						margin.desktop.bottom != '' || margin.desktop.top != '' || margin.desktop.left != '' || margin.desktop.right != '' ||
						margin.tablet.bottom != '' || margin.tablet.top != '' || margin.tablet.left != '' || margin.tablet.right != '' ||
						margin.mobile.bottom != '' || margin.mobile.top != '' || margin.mobile.left != '' || margin.mobile.right != ''
					) {
						var dynamicStyle = '';
						dynamicStyle += selector + ' {';
						dynamicStyle += 'margin-left: ' + margin['desktop']['left'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-right: ' + margin['desktop']['right'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-top: ' + margin['desktop']['top'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-bottom: ' + margin['desktop']['bottom'] + margin['desktop-unit'] + ';';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
						dynamicStyle += selector + ' {';
						dynamicStyle += 'margin-left: ' + margin['tablet']['left'] + margin['tablet-unit'] + ';';
						dynamicStyle += 'margin-right: ' + margin['tablet']['right'] + margin['tablet-unit'] + ';';
						dynamicStyle += 'margin-top: ' + margin['tablet']['top'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-bottom: ' + margin['tablet']['bottom'] + margin['desktop-unit'] + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
						dynamicStyle += selector + ' {';
						dynamicStyle += 'margin-left: ' + margin['mobile']['left'] + margin['mobile-unit'] + ';';
						dynamicStyle += 'margin-right: ' + margin['mobile']['right'] + margin['mobile-unit'] + ';';
						dynamicStyle += 'margin-top: ' + margin['mobile']['top'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-bottom: ' + margin['mobile']['bottom'] + margin['desktop-unit'] + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';
						astra_add_dynamic_css(  section + '-margin', dynamicStyle );
					}
				} );
			} );

		})(index);

    }
}
