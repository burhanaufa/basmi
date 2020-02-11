<?php
/**
 * Skins support: Main skin file for the skin 'Default'
 *
 * Setup skin-dependent fonts and colors, load scripts and styles,
 * and other operations that affect the appearance and behavior of the theme
 * when the skin is activated
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.46
 */


// Theme init priorities:
// 3 - add/remove Theme Options elements
if ( ! function_exists( 'bugster_skin_theme_setup3' ) ) {
	add_action( 'after_setup_theme', 'bugster_skin_theme_setup3', 3 );
	function bugster_skin_theme_setup3() {
		// ToDo: Add / Modify theme options, color schemes, required plugins, etc.
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'bugster_skin_tgmpa_required_plugins' ) ) {
	add_filter( 'bugster_filter_tgmpa_required_plugins', 'bugster_skin_tgmpa_required_plugins' );
	function bugster_skin_tgmpa_required_plugins( $list = array() ) {
		// ToDo: Check if plugin is in the 'required_plugins' and add his parameters to the TGMPA-list
		//       Replace 'skin-specific-plugin-slug' to the real slug of the plugin
		if ( bugster_storage_isset( 'required_plugins', 'skin-specific-plugin-slug' ) ) {
			$list[] = array(
				'name'     => bugster_storage_get_array( 'required_plugins', 'skin-specific-plugin-slug', 'title' ),
				'slug'     => 'skin-specific-plugin-slug',
				'required' => false,
			);
		}
		return $list;
	}
}

// Enqueue skin-specific styles and scripts
// Priority 1150 - after plugins-specific (1100), but before child theme (1200)
if ( ! function_exists( 'bugster_skin_frontend_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'bugster_skin_frontend_scripts', 1150 );
	function bugster_skin_frontend_scripts() {
		$bugster_url = bugster_get_file_url( BUGSTER_SKIN_DIR . 'skin.css' );
		if ( '' != $bugster_url ) {
			wp_enqueue_style( 'bugster-skin-' . esc_attr( BUGSTER_SKIN_NAME ), $bugster_url, array(), null );
		}
		if ( bugster_is_on( bugster_get_theme_option( 'debug_mode' ) ) ) {
			$bugster_url = bugster_get_file_url( BUGSTER_SKIN_DIR . 'skin.js' );
			if ( '' != $bugster_url ) {
				wp_enqueue_script( 'bugster-skin-' . esc_attr( BUGSTER_SKIN_NAME ), $bugster_url, array( 'jquery' ), null, true );
			}
		}
	}
}

// Enqueue skin-specific responsive styles
// Priority 2050 - after theme responsive 2000
if ( ! function_exists( 'bugster_skin_styles_responsive' ) ) {
	add_action( 'wp_enqueue_scripts', 'bugster_skin_styles_responsive', 2050 );
	function bugster_skin_styles_responsive() {
		$bugster_url = bugster_get_file_url( BUGSTER_SKIN_DIR . 'skin-responsive.css' );
		if ( '' != $bugster_url ) {
			wp_enqueue_style( 'bugster-skin-' . esc_attr( BUGSTER_SKIN_NAME ) . '-responsive', $bugster_url, array(), null );
		}
	}
}

// Merge custom scripts
if ( ! function_exists( 'bugster_skin_merge_scripts' ) ) {
	add_filter( 'bugster_filter_merge_scripts', 'bugster_skin_merge_scripts' );
	function bugster_skin_merge_scripts( $list ) {
		if ( bugster_get_file_dir( BUGSTER_SKIN_DIR . 'skin.js' ) != '' ) {
			$list[] = BUGSTER_SKIN_DIR . 'skin.js';
		}
		return $list;
	}
}

// Set theme specific importer options
if ( ! function_exists( 'bugster_skin_importer_set_options' ) ) {
	add_filter('trx_addons_filter_importer_options', 'bugster_skin_importer_set_options', 9);
	function bugster_skin_importer_set_options($options = array()) {
		if ( is_array( $options ) ) {
			$options['demo_type'] = 'skin_slug';
			$options['files']['skin_slug'] = $options['files']['default'];
			$options['files']['skin_slug']['title'] = esc_html__('Skin Title Demo', 'bugster');
			$options['files']['skin_slug']['domain_demo'] = esc_url( bugster_get_protocol() . '://skin_slug.theme_slug.themerex.net' );   // Demo-site domain
			unset($options['files']['default']);
		}
		return $options;
	}
}

// Add slin-specific colors and fonts to the custom CSS
require_once BUGSTER_THEME_DIR . BUGSTER_SKIN_DIR . 'skin-styles.php';
