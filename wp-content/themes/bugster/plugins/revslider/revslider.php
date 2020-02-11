<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'bugster_revslider_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'bugster_revslider_theme_setup9', 9 );
	function bugster_revslider_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'bugster_filter_tgmpa_required_plugins', 'bugster_revslider_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'bugster_revslider_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('bugster_filter_tgmpa_required_plugins',	'bugster_revslider_tgmpa_required_plugins');
	function bugster_revslider_tgmpa_required_plugins( $list = array() ) {
		if ( bugster_storage_isset( 'required_plugins', 'revslider' ) && bugster_storage_get_array( 'required_plugins', 'revslider', 'install' ) !== false && bugster_is_theme_activated() ) {
			$path = bugster_get_plugin_source_path( 'plugins/revslider/revslider.zip' );
			if ( ! empty( $path ) || bugster_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => bugster_storage_get_array( 'required_plugins', 'revslider', 'title' ),
					'slug'     => 'revslider',
					'source'   => ! empty( $path ) ? $path : 'upload://revslider.zip',
					'version'  => '6.1.3',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if RevSlider installed and activated
if ( ! function_exists( 'bugster_exists_revslider' ) ) {
	function bugster_exists_revslider() {
		return function_exists( 'rev_slider_shortcode' );
	}
}
