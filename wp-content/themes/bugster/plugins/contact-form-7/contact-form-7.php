<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'bugster_cf7_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'bugster_cf7_theme_setup9', 9 );
	function bugster_cf7_theme_setup9() {
		if ( bugster_exists_cf7() ) {
			add_action( 'wp_enqueue_scripts', 'bugster_cf7_frontend_scripts', 1100 );
			add_filter( 'bugster_filter_merge_scripts', 'bugster_cf7_merge_scripts' );
		}
		if ( is_admin() ) {
			add_filter( 'bugster_filter_tgmpa_required_plugins', 'bugster_cf7_tgmpa_required_plugins' );
			add_filter( 'bugster_filter_theme_plugins', 'bugster_cf7_theme_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'bugster_cf7_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('bugster_filter_tgmpa_required_plugins',	'bugster_cf7_tgmpa_required_plugins');
	function bugster_cf7_tgmpa_required_plugins( $list = array() ) {
		if ( bugster_storage_isset( 'required_plugins', 'contact-form-7' ) && bugster_storage_get_array( 'required_plugins', 'contact-form-7', 'install' ) !== false ) {
			// CF7 plugin
			$list[] = array(
				'name'     => bugster_storage_get_array( 'required_plugins', 'contact-form-7', 'title' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			);
			// CF7 extension - datepicker
			if ( ! BUGSTER_THEME_FREE && bugster_is_theme_activated() ) {
				$params = array(
					'name'     => esc_html__( 'Contact Form 7 Datepicker', 'bugster' ),
					'slug'     => 'contact-form-7-datepicker',
					'version'  => '2.6.0',
					'required' => false,
				);
				$path   = bugster_get_plugin_source_path( 'plugins/contact-form-7/contact-form-7-datepicker.zip' );
				if ( '' != $path ) {
					$params['source'] = $path;
				}
				$list[] = $params;
			}
		}
		return $list;
	}
}

// Filter theme-supported plugins list
if ( ! function_exists( 'bugster_cf7_theme_plugins' ) ) {
	//Handler of the add_filter( 'bugster_filter_theme_plugins', 'bugster_cf7_theme_plugins' );
	function bugster_cf7_theme_plugins( $list = array() ) {
		if ( ! empty( $list['contact-form-7']['group'] ) ) {
			foreach ( $list as $k => $v ) {
				if ( substr( $k, 0, 15 ) == 'contact-form-7-' ) {
					if ( empty( $v['group'] ) ) {
						$list[ $k ]['group'] = $list['contact-form-7']['group'];
					}
					if ( ! empty( $list['contact-form-7']['logo'] ) ) {
						$list[ $k ]['logo'] = strpos( $list['contact-form-7']['logo'], '//' ) !== false
												? $list['contact-form-7']['logo']
												: bugster_get_file_url( "plugins/contact-form-7/{$list['contact-form-7']['logo']}" );
					}
				}
			}
		}
		return $list;
	}
}



// Check if cf7 installed and activated
if ( ! function_exists( 'bugster_exists_cf7' ) ) {
	function bugster_exists_cf7() {
		return class_exists( 'WPCF7' );
	}
}

// Enqueue custom scripts
if ( ! function_exists( 'bugster_cf7_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'bugster_cf7_frontend_scripts', 1100 );
	function bugster_cf7_frontend_scripts() {
		if ( bugster_is_on( bugster_get_theme_option( 'debug_mode' ) ) ) {
			$bugster_url = bugster_get_file_url( 'plugins/contact-form-7/contact-form-7.js' );
			if ( '' != $bugster_url ) {
				wp_enqueue_script( 'bugster-cf7', $bugster_url, array( 'jquery' ), null, true );
			}
		}
	}
}

// Merge custom scripts
if ( ! function_exists( 'bugster_cf7_merge_scripts' ) ) {
	//Handler of the add_filter('bugster_filter_merge_scripts', 'bugster_cf7_merge_scripts');
	function bugster_cf7_merge_scripts( $list ) {
		$list[] = 'plugins/contact-form-7/contact-form-7.js';
		return $list;
	}
}
