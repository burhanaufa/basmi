<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'bugster_essential_grid_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'bugster_essential_grid_theme_setup9', 9 );
	function bugster_essential_grid_theme_setup9() {
		if ( bugster_exists_essential_grid() ) {
			add_action( 'wp_enqueue_scripts', 'bugster_essential_grid_frontend_scripts', 1100 );
			add_filter( 'bugster_filter_merge_styles', 'bugster_essential_grid_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'bugster_filter_tgmpa_required_plugins', 'bugster_essential_grid_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'bugster_essential_grid_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('bugster_filter_tgmpa_required_plugins',	'bugster_essential_grid_tgmpa_required_plugins');
	function bugster_essential_grid_tgmpa_required_plugins( $list = array() ) {
		if ( bugster_storage_isset( 'required_plugins', 'essential-grid' ) && bugster_storage_get_array( 'required_plugins', 'essential-grid', 'install' ) !== false && bugster_is_theme_activated() ) {
			$path = bugster_get_plugin_source_path( 'plugins/essential-grid/essential-grid.zip' );
			if ( ! empty( $path ) || bugster_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => bugster_storage_get_array( 'required_plugins', 'essential-grid', 'title' ),
					'slug'     => 'essential-grid',
					'source'   => ! empty( $path ) ? $path : 'upload://essential-grid.zip',
					'version'  => '2.3.3',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'bugster_exists_essential_grid' ) ) {
	function bugster_exists_essential_grid() {
		return defined( 'EG_PLUGIN_PATH' );
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'bugster_essential_grid_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'bugster_essential_grid_frontend_scripts', 1100 );
	function bugster_essential_grid_frontend_scripts() {
		if ( bugster_is_on( bugster_get_theme_option( 'debug_mode' ) ) ) {
			$bugster_url = bugster_get_file_url( 'plugins/essential-grid/essential-grid.css' );
			if ( '' != $bugster_url ) {
				wp_enqueue_style( 'bugster-essential-grid', $bugster_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'bugster_essential_grid_merge_styles' ) ) {
	//Handler of the add_filter('bugster_filter_merge_styles', 'bugster_essential_grid_merge_styles');
	function bugster_essential_grid_merge_styles( $list ) {
		$list[] = 'plugins/essential-grid/essential-grid.css';
		return $list;
	}
}

