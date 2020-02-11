<?php
/* Booked Appointments support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'bugster_booked_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'bugster_booked_theme_setup9', 9 );
	function bugster_booked_theme_setup9() {
		if ( bugster_exists_booked() ) {
			add_action( 'wp_enqueue_scripts', 'bugster_booked_frontend_scripts', 1100 );
			add_filter( 'bugster_filter_merge_styles', 'bugster_booked_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'bugster_filter_tgmpa_required_plugins', 'bugster_booked_tgmpa_required_plugins' );
			add_filter( 'bugster_filter_theme_plugins', 'bugster_booked_theme_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'bugster_booked_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('bugster_filter_tgmpa_required_plugins',	'bugster_booked_tgmpa_required_plugins');
	function bugster_booked_tgmpa_required_plugins( $list = array() ) {
		if ( bugster_storage_isset( 'required_plugins', 'booked' ) && bugster_storage_get_array( 'required_plugins', 'booked', 'install' ) !== false && bugster_is_theme_activated() ) {
			$path = bugster_get_plugin_source_path( 'plugins/booked/booked.zip' );
			if ( ! empty( $path ) || bugster_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => bugster_storage_get_array( 'required_plugins', 'booked', 'title' ),
					'slug'     => 'booked',
					'source'   => ! empty( $path ) ? $path : 'upload://booked.zip',
					'version'  => '2.2.5',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Filter theme-supported plugins list
if ( ! function_exists( 'bugster_booked_theme_plugins' ) ) {
	//Handler of the add_filter( 'bugster_filter_theme_plugins', 'bugster_booked_theme_plugins' );
	function bugster_booked_theme_plugins( $list = array() ) {
		if ( ! empty( $list['booked']['group'] ) ) {
			foreach ( $list as $k => $v ) {
				if ( substr( $k, 0, 6 ) == 'booked' ) {
					if ( empty( $v['group'] ) ) {
						$list[ $k ]['group'] = $list['booked']['group'];
					}
					if ( ! empty( $list['booked']['logo'] ) ) {
						$list[ $k ]['logo'] = strpos( $list['booked']['logo'], '//' ) !== false
												? $list['booked']['logo']
												: bugster_get_file_url( "plugins/booked/{$list['booked']['logo']}" );
					}
				}
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'bugster_exists_booked' ) ) {
	function bugster_exists_booked() {
		return class_exists( 'booked_plugin' );
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'bugster_booked_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'bugster_booked_frontend_scripts', 1100 );
	function bugster_booked_frontend_scripts() {
		if ( bugster_is_on( bugster_get_theme_option( 'debug_mode' ) ) ) {
			$bugster_url = bugster_get_file_url( 'plugins/booked/booked.css' );
			if ( '' != $bugster_url ) {
				wp_enqueue_style( 'bugster-booked', $bugster_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'bugster_booked_merge_styles' ) ) {
	//Handler of the add_filter('bugster_filter_merge_styles', 'bugster_booked_merge_styles');
	function bugster_booked_merge_styles( $list ) {
		$list[] = 'plugins/booked/booked.css';
		return $list;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( bugster_exists_booked() ) {
	require_once BUGSTER_THEME_DIR . 'plugins/booked/booked-styles.php';
}
