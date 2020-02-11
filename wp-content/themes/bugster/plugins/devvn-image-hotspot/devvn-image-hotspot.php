<?php  
// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('bugster_devvn_image_hotspot_theme_setup9')) {
    add_action( 'after_setup_theme', 'bugster_devvn_image_hotspot_theme_setup9', 9 );
    function bugster_devvn_image_hotspot_theme_setup9() {
        if (is_admin()) {
            add_filter( 'bugster_filter_tgmpa_required_plugins',  'bugster_devvn_image_hotspot_tgmpa_required_plugins' );
        }
    }
}
// Filter to add in the required plugins list
if ( !function_exists( 'bugster_devvn_image_hotspot_tgmpa_required_plugins' ) ) {
    //Handler of the add_filter('bugster_filter_tgmpa_required_plugins',    'bugster_custom_facebook_feed_tgmpa_required_plugins');
    function bugster_devvn_image_hotspot_tgmpa_required_plugins($list=array()) {
        if (bugster_storage_isset('required_plugins', 'devvn-image-hotspot')) {
            $list[] = array(
                    'name'         => esc_html__( 'Image Hotspot by DevVN', 'bugster' ),
                    'slug'         => 'devvn-image-hotspot',
                    'required'     => false
                );
        }
        return $list;
    }
}
// Check if Strong testimonials installed and activated
if ( !function_exists( 'bugster_exists_devvn_image_hotspot' ) ) {
    function bugster_exists_devvn_image_hotspot() {
        return function_exists('devvn_ihotspot_meta_box');
    }
}
// Check plugin in the required plugins
if ( !function_exists( 'bugster_devvn_image_hotspot_importer_required_plugins' ) ) {
    if (is_admin()) add_filter( 'bugster_filter_importer_required_plugins', 'bugster_devvn_image_hotspot_importer_required_plugins', 10, 2 );
    function bugster_devvn_image_hotspot_importer_required_plugins($not_installed='', $list='') {
        if (strpos($list, 'devvn-image-hotspot')!==false && !bugster_exists_devvn_image_hotspot() )
            $not_installed .= '<br>' . esc_html__('Image Hotspot by DevVN', 'bugster');
        return $not_installed;
    }
}
// Add checkbox to the one-click importer
if ( !function_exists( 'bugster_devvn_image_hotspot_importer_show_params' ) ) {
    if (is_admin()) add_action( 'trx_addons_action_importer_params',    'bugster_devvn_image_hotspot_importer_show_params', 10, 1 );
    function bugster_devvn_image_hotspot_importer_show_params($importer) {
        if ( bugster_exists_devvn_image_hotspot() && in_array('devvn-image-hotspot', $importer->options['required_plugins']) ) {
            $importer->show_importer_params(array(
                'slug' => 'devvn-image-hotspot',
                'title' => esc_html__('Import Image Hotspot by DevVN', 'bugster'),
                'part' => 0
            ));
        }
    }
}
?>