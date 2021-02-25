<?php
/**
 * Astra Addon Builder Helper.
 *
 * @since 3.0.0
 * @package astra-builder
 */

/**
 * Class Astra_Addon_Builder_Helper.
 *
 * @since 3.0.0
 */
final class Astra_Addon_Builder_Helper {

	/**
	 * Config context general tab config.
	 *
	 * @var string[][]
	 */
	public static $general_tab_config = array(
		'setting' => 'ast_selected_tab',
		'value'   => 'general',
	);

	/**
	 * Config context general tab.
	 *
	 * @since 3.0.0
	 * @var string[][]
	 */
	public static $general_tab = array(
		array(
			'setting' => 'ast_selected_tab',
			'value'   => 'general',
		),
	);

	/**
	 * Config context design tab.
	 *
	 * @var string[][]
	 */
	public static $design_tab_config = array(
		'setting' => 'ast_selected_tab',
		'value'   => 'design',
	);

	/**
	 * Config context design tab.
	 *
	 * @since 3.0.0
	 * @var string[][]
	 */
	public static $design_tab = array(
		array(
			'setting' => 'ast_selected_tab',
			'value'   => 'design',
		),
	);

	/**
	 * No. Of. Footer HTML.
	 *
	 * @since 3.0.0
	 * @var int
	 */
	public static $num_of_footer_html;

	/**
	 * No. Of. Header Menu.
	 *
	 * @since 3.0.0
	 * @var int
	 */
	public static $num_of_header_menu;

	/**
	 * No. Of. Header Buttons.
	 *
	 * @since 3.0.0
	 * @var int
	 */
	public static $num_of_header_button;

	/**
	 * No. Of. Footer Buttons.
	 *
	 * @since 3.0.0
	 * @var int
	 */
	public static $num_of_footer_button;

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
	 * No. Of. Header Widgets.
	 *
	 * @since 3.0.0
	 * @var int
	 */
	public static $num_of_header_widgets;

	/**
	 * No. Of. Footer Widgets.
	 *
	 * @since 3.0.0
	 * @var int
	 */
	public static $num_of_footer_widgets;

	/**
	 * No. Of. Header HTML.
	 *
	 * @since 3.0.0
	 * @var int
	 */
	public static $num_of_header_html;

	/**
	 * No. Of. Header Social Icons.
	 *
	 * @since 3.0.0
	 * @var int
	 */
	public static $num_of_header_social_icons;

	/**
	 * No. Of. Footer Social Icons.
	 *
	 * @since 3.0.0
	 * @var int
	 */
	public static $num_of_footer_social_icons;

	/**
	 * Check if migrated to new HFB.
	 *
	 * @since 3.0.0
	 * @var int
	 */
	public static $is_header_footer_builder_active;

	/**
	 * Member Variable
	 *
	 * @since 3.0.0
	 * @var instance
	 */
	public static $loaded_grid = null;

	/**
	 * Member Variable
	 *
	 * @since 3.0.0
	 * @var instance
	 */
	private static $instance = null;

	/**
	 * Initiator
	 *
	 * @since 3.0.0
	 */
	public static function get_instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor
	 *
	 * @since 3.0.0
	 */
	public function __construct() {

		$component_count_by_key = self::get_component_count_by_key();

		self::$num_of_header_button = $component_count_by_key['header-button'];
		self::$num_of_footer_button = $component_count_by_key['footer-button'];

		self::$num_of_header_html = $component_count_by_key['header-html'];
		self::$num_of_footer_html = $component_count_by_key['footer-html'];

		self::$num_of_header_divider = $component_count_by_key['header-divider'];
		self::$num_of_footer_divider = $component_count_by_key['footer-divider'];

		self::$num_of_header_menu = $component_count_by_key['header-menu'];

		self::$num_of_header_widgets = $component_count_by_key['header-widget'];
		self::$num_of_footer_widgets = $component_count_by_key['footer-widget'];

		self::$num_of_header_social_icons = $component_count_by_key['header-social-icons'];
		self::$num_of_footer_social_icons = $component_count_by_key['footer-social-icons'];

		self::$is_header_footer_builder_active = self::is_header_footer_builder_active();

		require_once ASTRA_EXT_DIR . 'classes/class-astra-addon-builder-loader.php';
	}

	/**
	 * Get count of each component by its Key.
	 *
	 * @since 3.0.0
	 *
	 * @return int Number of component.
	 */
	public static function get_component_count_by_key() {

		$component_keys_count = array(
			'header-button'       => 2,
			'footer-button'       => 2,
			'header-html'         => 2,
			'footer-html'         => 2,
			'header-menu'         => 2,
			'header-widget'       => 4,
			'footer-widget'       => 4,
			'header-social-icons' => 1,
			'footer-social-icons' => 1,
			'header-divider'      => 3,
			'footer-divider'      => 3,
		);

		$component_keys_count = array_merge(
			$component_keys_count,
			apply_filters(
				'astra_builder_elements_count',
				$component_keys_count
			)
		);

		// Buttons.
		$component_keys_count['header-button'] = ( 10 >= $component_keys_count['header-button'] ) ? $component_keys_count['header-button'] : 10;
		$component_keys_count['footer-button'] = ( 10 >= $component_keys_count['footer-button'] ) ? $component_keys_count['footer-button'] : 10;

		// HTML.
		$component_keys_count['header-html'] = ( 10 >= $component_keys_count['header-html'] ) ? $component_keys_count['header-html'] : 10;
		$component_keys_count['footer-html'] = ( 10 >= $component_keys_count['footer-html'] ) ? $component_keys_count['footer-html'] : 10;

		// Header Menu.
		$component_keys_count['header-menu'] = ( 5 >= $component_keys_count['header-menu'] ) ? $component_keys_count['header-menu'] : 5;

		// Widgets.
		$component_keys_count['header-widget'] = ( 10 >= $component_keys_count['header-widget'] ) ? $component_keys_count['header-widget'] : 10;
		$component_keys_count['footer-widget'] = ( 10 >= $component_keys_count['footer-widget'] ) ? $component_keys_count['footer-widget'] : 10;

		// Social Icons.
		$component_keys_count['header-social-icons'] = ( 5 >= $component_keys_count['header-social-icons'] ) ? $component_keys_count['header-social-icons'] : 5;
		$component_keys_count['footer-social-icons'] = ( 5 >= $component_keys_count['footer-social-icons'] ) ? $component_keys_count['footer-social-icons'] : 5;

		// Divider.
		$component_keys_count['header-divider'] = ( 10 >= $component_keys_count['header-divider'] ) ? $component_keys_count['header-divider'] : 10;
		$component_keys_count['footer-divider'] = ( 10 >= $component_keys_count['footer-divider'] ) ? $component_keys_count['footer-divider'] : 10;

		return $component_keys_count;
	}

	/**
	 * For existing users, do not load the wide/full width image CSS by default.
	 *
	 * @since 3.0.0
	 * @return boolean true if Header Footer Builder is enabled, false if not.
	 */
	public static function is_header_footer_builder_active() {
		$astra_settings                             = get_option( ASTRA_THEME_SETTINGS );
		$astra_settings['is-header-footer-builder'] = isset( $astra_settings['is-header-footer-builder'] ) ? $astra_settings['is-header-footer-builder'] : true;
		return apply_filters( 'astra_is_header_footer_builder_active', $astra_settings['is-header-footer-builder'] );
	}

	/**
	 * Check if component placed on the builder.
	 *
	 * @since 3.0.0
	 * @param integer $component_id component id.
	 * @param string  $builder_type builder type.
	 * @return bool
	 */
	public static function is_component_loaded( $component_id, $builder_type = 'header' ) {

		$loaded_components = array();

		if ( is_null( self::$loaded_grid ) ) {

			$grids[] = astra_get_option( 'header-desktop-items', array() );
			$grids[] = astra_get_option( 'header-mobile-items', array() );
			$grids[] = astra_get_option( 'footer-desktop-items', array() );

			if ( ! empty( $grids ) ) {

				foreach ( $grids as $row_gird => $row_grids ) {

					if ( ! empty( $row_grids ) ) {

						foreach ( $row_grids as $row => $grid ) {

							if ( ! in_array( $row, array( 'below', 'above', 'primary', 'popup' ) ) ) {
								continue;
							}

							if ( ! is_array( $grid ) ) {
								continue;
							}

							$result = array_values( $grid );
							if ( is_array( $result ) ) {
								$loaded_component    = call_user_func_array( 'array_merge', $result );
								$loaded_components[] = is_array( $loaded_component ) ? $loaded_component : array();
							}
						}
					}
				}
			}

			if ( ! empty( $loaded_components ) ) {
				$loaded_components = array_values( $loaded_components );
				$loaded_components = call_user_func_array( 'array_merge', $loaded_components );
			}

			self::$loaded_grid = $loaded_components;
		}

		$loaded_components = self::$loaded_grid;

		return in_array( $component_id, $loaded_components, true ) || is_customize_preview();
	}
}

/**
 *  Prepare if class 'Astra_Addon_Builder_Helper' exist.
 *  Kicking this off by calling 'get_instance()' method
 */
Astra_Addon_Builder_Helper::get_instance();
