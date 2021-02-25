<?php
/**
 * Astra Builder
 *
 * @package Astra Addon
 */

if ( ! class_exists( 'Astra_Builder' ) ) {

	/**
	 * Astra_Builder initial setup
	 *
	 * @since 3.0.0
	 */
	class Astra_Builder {

		/**
		 * Member Variable
		 *
		 * @var instance
		 */
		private static $instance;

		/**
		 * No. Of. Header Dividers.
		 *
		 * @since 3.0.0
		 * @var int
		 */
		public static $num_of_header_divider;

		/**
		 * No. Of. Footer Dividers.
		 *
		 * @since 3.0.0
		 * @var int
		 */
		public static $num_of_footer_divider;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			add_filter( 'astra_builder_elements_count', __CLASS__ . '::elements_count', 10 );

			add_filter(
				'astra_footer_row_layout',
				function( $layout ) {
					// Modify Layouts here.
					return $layout;
				}
			);

			$component_count_by_key = self::elements_count();

			self::$num_of_header_divider = $component_count_by_key['header-divider'];
			self::$num_of_footer_divider = $component_count_by_key['footer-divider'];

			add_filter( 'astra_header_desktop_items', array( $this, 'update_header_builder_desktop_items' ) );
			add_filter( 'astra_header_mobile_items', array( $this, 'update_header_builder_mobile_items' ) );
			add_filter( 'astra_footer_desktop_items', array( $this, 'update_footer_builder_desktop_items' ) );

			add_action( 'astra_render_header_components', array( $this, 'render_header_components' ) );
			add_action( 'astra_render_footer_components', array( $this, 'render_footer_dynamic_components' ) );
		}

		/**
		 * Update default header builder's desktop components.
		 *
		 * @param array $header_items array of header elements which will load in customizer builder layout.
		 * @return array Array of desktop components.
		 *
		 * @since 3.0.0
		 */
		public function update_header_builder_desktop_items( $header_items ) {

			for ( $index = 1; $index <= self::$num_of_header_divider; $index++ ) {

				$header_items[ 'divider-' . $index ] = array(
					'name'    => ( 1 === self::$num_of_header_divider ) ? 'Divider' : 'Divider ' . $index,
					'icon'    => 'minus',
					'section' => 'section-hb-divider-' . $index,
				);
			}

			return $header_items;
		}

		/**
		 * Update default header builder's mobile components.
		 *
		 * @param array $mobile_items array of mobile elements which will load in customizer builder layout.
		 * @return array Array of mobile components.
		 *
		 * @since 3.0.0
		 */
		public function update_header_builder_mobile_items( $mobile_items ) {

			for ( $index = 1; $index <= self::$num_of_header_divider; $index++ ) {

				$mobile_items[ 'divider-' . $index ] = array(
					'name'    => ( 1 === self::$num_of_header_divider ) ? 'Divider' : 'Divider ' . $index,
					'icon'    => 'minus',
					'section' => 'section-hb-divider-' . $index,
				);
			}

			return $mobile_items;
		}

		/**
		 * Update default footer builder's components.
		 *
		 * @param array $footer_items array of footer elements which will load in customizer builder layout.
		 * @return array Array of footer components.
		 *
		 * @since 3.0.0
		 */
		public function update_footer_builder_desktop_items( $footer_items ) {

			for ( $index = 1; $index <= self::$num_of_footer_divider; $index++ ) {

				$footer_items[ 'divider-' . $index ] = array(
					'name'    => ( 1 === self::$num_of_footer_divider ) ? 'Divider' : 'Divider ' . $index,
					'icon'    => 'minus',
					'section' => 'section-fb-divider-' . $index,
				);
			}

			return $footer_items;
		}

		/**
		 * Update the count of elements in HF Builder.
		 *
		 * @param array $elements array of elements having key as slug and value as count.
		 * @return array $elements
		 */
		public static function elements_count( $elements = array() ) {

			$elements['header-button']       = 2;
			$elements['footer-button']       = 2;
			$elements['header-html']         = 3;
			$elements['footer-html']         = 2;
			$elements['header-menu']         = 3;
			$elements['header-widget']       = 4;
			$elements['footer-widget']       = 6;
			$elements['header-social-icons'] = 1;
			$elements['footer-social-icons'] = 1;
			$elements['header-divider']      = 3;
			$elements['footer-divider']      = 3;

			return $elements;
		}

		/**
		 * Render header component.
		 *
		 * @param string $slug component slug.
		 */
		public function render_header_components( $slug ) {

			$this->render_header_dynamic_components( $slug );
		}

		/**
		 * Render header dynamic components.
		 *
		 * @param string $slug slug.
		 */
		public function render_header_dynamic_components( $slug ) {

			if ( 0 === strpos( $slug, 'html' ) ) {
				?>
				<div class="ast-builder-layout-element site-header-focus-item ast-header-<?php echo esc_attr( $slug ); ?>" data-section="section-hb-<?php echo esc_attr( $slug ); ?>">
					<?php
					$action_name = 'astra_header_' . str_replace( '-', '_', $slug );
					do_action( $action_name );
					?>
				</div>
				<?php
			} elseif ( 0 === strpos( $slug, 'button' ) ) {

				?>
				<div class="ast-builder-layout-element site-header-focus-item ast-header-<?php echo esc_attr( $slug ); ?>" data-section="section-hb-<?php echo esc_attr( $slug ); ?>">
					<?php
					$action_name = 'astra_header_' . str_replace( '-', '_', $slug );
					do_action( $action_name );
					?>
				</div>
				<?php
			} elseif ( 0 === strpos( $slug, 'widget' ) ) {
				?>
				<aside class="header-widget-area widget-area site-header-focus-item" data-section="sidebar-widgets-header-<?php echo esc_attr( $slug ); ?>">
					<?php
					if ( is_customize_preview() && class_exists( 'Astra_Builder_UI_Controller' ) ) {
						Astra_Builder_UI_Controller::render_customizer_edit_button();
					}
					?>
					<div class="header-widget-area-inner site-info-inner">
						<?php dynamic_sidebar( 'header-' . str_replace( '_', '-', $slug ) ); ?>
					</div>
				</aside>

				<?php
			} elseif ( 0 === strpos( $slug, 'menu' ) ) {
				?>
				<div class="ast-builder-<?php echo esc_attr( $slug ); ?> ast-builder-menu ast-builder-<?php echo esc_attr( $slug ); ?>-focus-item ast-builder-layout-element site-header-focus-item" data-section="section-hb-<?php echo esc_attr( $slug ); ?>">
					<?php
					$action_name = 'astra_header_' . str_replace( '-', '_', $slug );
					do_action( $action_name );
					?>
				</div>
				<?php
			} elseif ( 0 === strpos( $slug, 'social-icons' ) ) {
				$index = str_replace( 'social-icons-', '', $slug );
				?>
				<div class="ast-builder-layout-element site-header-focus-item" data-section="section-hb-social-icons-<?php echo esc_attr( $index ); ?>">
					<?php
					$action_name = 'astra_header_social_' . $index;
					do_action( $action_name );
					?>
				</div>
				<?php
			} elseif ( 0 === strpos( $slug, 'divider' ) ) {
				$layout_class = astra_get_option( 'header-' . $slug . '-layout' );
				?>
					<div class="ast-builder-layout-element site-header-focus-item ast-header-divider-element ast-header-<?php echo esc_attr( $slug ); ?> ast-hb-divider-layout-<?php echo esc_attr( $layout_class ); ?>" data-section="section-hb-<?php echo esc_attr( $slug ); ?>">
					<?php
						$action_name = 'astra_header_' . str_replace( '-', '_', $slug );
						do_action( $action_name );
					?>
					</div>
				<?php
			}

		}

		/**
		 * Render footer dynamic components.
		 *
		 * @param string $slug slug.
		 */
		public function render_footer_dynamic_components( $slug ) {

			if ( 0 === strpos( $slug, 'html' ) ) {
				?>
				<div class="footer-widget-area widget-area site-footer-focus-item ast-footer-<?php echo esc_attr( $slug ); ?>" data-section="section-fb-<?php echo esc_attr( $slug ); ?>">
					<?php
					$action_name = 'astra_footer_' . str_replace( '-', '_', $slug );
					do_action( $action_name );
					?>
				</div>
				<?php
			} elseif ( 0 === strpos( $slug, 'button' ) ) {
				?>
				<div class="ast-builder-layout-element site-footer-focus-item ast-footer-<?php echo esc_attr( $slug ); ?>" data-section="section-fb-<?php echo esc_attr( $slug ); ?>">
					<?php
					$action_name = 'astra_footer_' . str_replace( '-', '_', $slug );
					do_action( $action_name );
					?>
				</div>
				<?php
			} elseif ( 0 === strpos( $slug, 'widget' ) ) {
				?>
				<aside class="footer-widget-area widget-area site-footer-focus-item" data-section="sidebar-widgets-footer-<?php echo esc_attr( $slug ); ?>">
					<div class="footer-widget-area-inner site-info-inner">
						<?php
						dynamic_sidebar( 'footer-' . str_replace( '_', '-', $slug ) );
						?>
					</div>
				</aside>

				<?php
			} elseif ( 0 === strpos( $slug, 'social-icons' ) ) {
				$index = str_replace( 'social-icons-', '', $slug );
				?>
				<div class="ast-builder-layout-element site-footer-focus-item" data-section="section-fb-social-icons-<?php echo esc_attr( $index ); ?>">
					<?php
					$action_name = 'astra_footer_social_' . $index;
					do_action( $action_name );
					?>
				</div>
				<?php
			} elseif ( 0 === strpos( $slug, 'divider' ) ) {
				$layout_class = astra_get_option( 'footer-' . $slug . '-layout' );
				?>
					<div class="footer-widget-area widget-area site-footer-focus-item ast-footer-divider-element ast-footer-<?php echo esc_attr( $slug ); ?> ast-fb-divider-layout-<?php echo esc_attr( $layout_class ); ?>" data-section="section-fb-<?php echo esc_attr( $slug ); ?>">
					<?php
						$action_name = 'astra_footer_' . str_replace( '-', '_', $slug );
						do_action( $action_name );
					?>
					</div>
				<?php
			}

		}

	}
}

/**
 *  Prepare if class 'Astra_Builder' exist.
 *  Kicking this off by calling 'get_instance()' method
 */
Astra_Builder::get_instance();
