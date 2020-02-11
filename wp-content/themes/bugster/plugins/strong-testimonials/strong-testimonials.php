<?php  
// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('bugster_strong_testimonials_theme_setup9')) {
    add_action( 'after_setup_theme', 'bugster_strong_testimonials_theme_setup9', 9 );
    function bugster_strong_testimonials_theme_setup9() {
        add_filter( 'bugster_filter_merge_styles', 'bugster_strong_testimonials_merge_styles' );
        add_filter( 'bugster_filter_merge_styles_responsive', 'bugster_strong_testimonials_merge_styles_responsive' );
        if (is_admin()) {
            add_filter( 'bugster_filter_tgmpa_required_plugins',  'bugster_strong_testimonials_tgmpa_required_plugins' );
        }
    }
}
	// Filter to add in the required plugins list
if ( !function_exists( 'bugster_strong_testimonials_tgmpa_required_plugins' ) ) {
    //Handler of the add_filter('bugster_filter_tgmpa_required_plugins',    'bugster_strong_testimonials_tgmpa_required_plugins');
    function bugster_strong_testimonials_tgmpa_required_plugins($list=array()) {
        if (bugster_storage_isset('required_plugins', 'strong-testimonials')) {
            $list[] = array(
                    'name'         => esc_html__( 'Strong Testimonials', 'bugster' ),
                    'slug'         => 'strong-testimonials',
                    'required'     => false
                );
        }
        return $list;
    }
}
// Check if Strong testimonials installed and activated
if ( !function_exists( 'bugster_exists_strong_testimonials' ) ) {
    function bugster_exists_strong_testimonials() {
        return class_exists('Strong_Testimonials');
    }
}
// Return true, if current page is any strong testimonials page, my function
if ( !function_exists( 'bugster_is_strong_testimonials_page' ) ) {
    function bugster_is_strong_testimonials_page() {
        $rez = false;
        if (bugster_exists_strong_testimonials())
            $page_id = get_queried_object_id();
                        $page_object = get_page( $page_id );
                     $rez =  strpos($page_object->post_content, 'testimonial_view' );
        return $rez;
    }
}
if (bugster_exists_strong_testimonials()) { require_once BUGSTER_THEME_DIR . 'plugins/strong-testimonials/strong-testimonials-styles.php'; }

// Merge custom styles
if ( ! function_exists( 'bugster_strong_testimonials_merge_styles' ) ) {
	//Handler of the add_filter('bugster_filter_merge_styles', 'bugster_strong_testimonials_merge_styles');
	function bugster_strong_testimonials_merge_styles( $list ) {
		$list[] = 'plugins/strong-testimonials/strong-testimonials.css';
		return $list;
	}
}

// Merge responsive styles
if ( ! function_exists( 'bugster_strong_testimonials_merge_styles_responsive' ) ) {
	//Handler of the add_filter('bugster_filter_merge_styles_responsive', 'bugster_strong_testimonials_merge_styles_responsive');
	function bugster_strong_testimonials_merge_styles_responsive( $list ) {
		$list[] = 'plugins/strong-testimonials/strong-testimonials-responsive.css';
		return $list;
	}
}

// Set plugin's specific importer options
if ( !function_exists( 'trx_addons_strong_testimonials_importer_set_options' ) ) {
    if (is_admin()) add_filter( 'trx_addons_filter_importer_options',    'trx_addons_strong_testimonials_importer_set_options' );
    function trx_addons_strong_testimonials_importer_set_options($options=array()) {
        if ( bugster_exists_strong_testimonials() && in_array('strong-testimonials', $options['required_plugins']) ) {
            $options['additional_options'][]    = 'wpmtst_%';                    // Add slugs to export options for this plugin
            $options['additional_options'][]    = 'widget_strong-testimonials-view-widget';
        if (is_array($options['files']) && count($options['files']) > 0) {
                foreach ($options['files'] as $k => $v) {
                    $options['files'][$k]['file_with_strong-testimonials'] = str_replace('name.ext', 'strong-testimonials.txt', $v['file_with_']);
                }
            }
        }
        return $options;
    }
}
// Export
if ( !function_exists( 'trx_addons_strong_testimonials_importer_export' ) ) {
    if (is_admin()) add_action( 'trx_addons_action_importer_export',    'trx_addons_strong_testimonials_importer_export', 10, 1 );
    function trx_addons_strong_testimonials_importer_export($importer) {
        if ( bugster_exists_strong_testimonials() && in_array('strong-testimonials', $importer->options['required_plugins']) ) {
            trx_addons_fpc($importer->export_file_dir('strong-testimonials.txt'), serialize( array(
                "strong_views"=> $importer->export_dump("strong_views"),
                ) )
            );
         }
    }
}

// Display exported data in the fields
if ( !function_exists( 'trx_addons_strong_testimonials_importer_export_fields' ) ) {
    if (is_admin()) add_action( 'trx_addons_action_importer_export_fields',    'trx_addons_strong_testimonials_importer_export_fields', 10, 1 );
    function trx_addons_strong_testimonials_importer_export_fields($importer) {
        if ( in_array('strong-testimonials', $importer->options['required_plugins']) ) {
            $importer->show_exporter_fields(array(
                'slug'    => 'strong-testimonials',
                'title' => esc_html__('Strong testimonials', 'bugster')
                )
            );
        }
    }
}
// Check plugin in the required plugins
if ( !function_exists( 'bugster_strong_testimonials_importer_required_plugins' ) ) {
    if (is_admin()) add_filter( 'bugster_filter_importer_required_plugins', 'bugster_strong_testimonials_importer_required_plugins', 10, 2 );
    function bugster_strong_testimonials_importer_required_plugins($not_installed='', $list='') {
        if (strpos($list, 'strong-testimonials')!==false && !bugster_exists_strong_testimonials() )
            $not_installed .= '<br>' . esc_html__('Strong testimonials', 'bugster');
        return $not_installed;
    }
}
// Add checkbox to the one-click importer
if ( !function_exists( 'bugster_strong_testimonials_importer_show_params' ) ) {
    if (is_admin()) add_action( 'trx_addons_action_importer_params',    'bugster_strong_testimonials_importer_show_params', 10, 1 );
    function bugster_strong_testimonials_importer_show_params($importer) {
        if ( bugster_exists_strong_testimonials() && in_array('strong-testimonials', $importer->options['required_plugins']) ) {
            $importer->show_importer_params(array(
                'slug' => 'strong-testimonials',
                'title' => esc_html__('Import Strong testimonials', 'bugster'),
                'part' => 0
            ));
        }
    }
}
// Check if the row will be imported
if ( !function_exists( 'trx_addons_strong_testimonials_importer_check_row' ) ) {
    if (is_admin()) add_filter('trx_addons_filter_importer_import_row', 'trx_addons_strong_testimonials_importer_check_row', 9, 4);
    function trx_addons_strong_testimonials_importer_check_row($flag, $table, $row, $list) {
        if ($flag || strpos($list, 'strong-testimonials')===false) return $flag;
        if ( trx_addons_exists_strong_testimonials() ) {
            if ($table == 'posts')
                $flag = $row['post_type']=='wpm-testimonial';
        }
        return $flag;
    }
}
// Import posts tables
if ( !function_exists( 'trx_addons_strong_testimonials_importer_import' ) ) {
    if (is_admin()) add_action( 'trx_addons_action_importer_import',    'trx_addons_strong_testimonials_importer_import', 10, 2 );
    function trx_addons_strong_testimonials_importer_import($importer, $action) {
        if ( bugster_exists_strong_testimonials() && in_array('strong-testimonials', $importer->options['required_plugins']) ) {
            if ( $action == 'import_strong-testimonials' ) {
                $importer->response['start_from_id'] = 0;
                $importer->import_dump('strong-testimonials', esc_html__('Strong testimonials', 'bugster'));
                delete_transient( 'wc_attribute_taxonomies' );
            }
        }
    }
}
?>