<?php
/**
 * Astra Builder UI Controller.
 *
 * @package astra-builder
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Addon_Builder_UI_Controller' ) ) {

	/**
	 * Class Astra_Addon_Builder_UI_Controller.
	 */
	final class Astra_Addon_Builder_UI_Controller {

		/**
		 * Prepare divider Markup.
		 *
		 * @param string $index Key of the divider Control.
		 */
		public static function render_divider_markup( $index = 'header-divider-1' ) {

			$layout = astra_get_option( $index . '-layout' );
			?>

			<div class="ast-divider-wrapper ast-divider-layout-<?php echo esc_attr( $layout ); ?>">
				<?php
				if ( is_customize_preview() ) {
					self::render_customizer_edit_button();
				}
				?>
				<div class="ast-builder-divider-element"></div>
			</div>

			<?php
		}

		/**
		 * Prepare Edit icon inside customizer.
		 */
		public static function render_customizer_edit_button() {
			if ( ! is_callable( 'Astra_Builder_UI_Controller::fetch_svg_icon' ) ) {
				return;
			}
			?>
			<div class="customize-partial-edit-shortcut" data-id="ahfb">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'astra-addon' ); ?>"
						title="<?php esc_attr_e( 'Click to edit this element.', 'astra-addon' ); ?>"
						class="customize-partial-edit-shortcut-button item-customizer-focus">
					<?php echo Astra_Builder_UI_Controller::fetch_svg_icon( 'edit' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</button>
			</div>
			<?php
		}
	}
}
