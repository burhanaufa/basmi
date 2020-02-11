<?php  
// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('bugster_custom_facebook_feed_theme_setup9')) {
    add_action( 'after_setup_theme', 'bugster_custom_facebook_feed_theme_setup9', 9 );
    function bugster_custom_facebook_feed_theme_setup9() {
        if (is_admin()) {
            add_filter( 'bugster_filter_tgmpa_required_plugins',  'bugster_custom_facebook_feed_tgmpa_required_plugins' );
        }
    }
}
// Filter to add in the required plugins list
if ( !function_exists( 'bugster_custom_facebook_feed_tgmpa_required_plugins' ) ) {
    //Handler of the add_filter('bugster_filter_tgmpa_required_plugins',    'bugster_custom_facebook_feed_tgmpa_required_plugins');
    function bugster_custom_facebook_feed_tgmpa_required_plugins($list=array()) {
        if (bugster_storage_isset('required_plugins', 'custom-facebook-feed')) {
            $list[] = array(
                    'name'         => esc_html__( 'Custom Facebook Feed', 'bugster' ),
                    'slug'         => 'custom-facebook-feed',
                    'required'     => false
                );
        }
        return $list;
    }
}
// Check if Custom Facebook Feed installed and activated
if ( !function_exists( 'bugster_exists_custom_facebook_feed' ) ) {
    function bugster_exists_custom_facebook_feed() {
        return function_exists('display_cff');
    }
}
// Set plugin's specific importer options
if ( !function_exists( 'trx_addons_custom_facebook_feed_importer_set_options' ) ) {
    if (is_admin()) add_filter( 'trx_addons_filter_importer_options',    'trx_addons_custom_facebook_feed_importer_set_options', 10, 1 );
    function trx_addons_custom_facebook_feed_importer_set_options($options=array()) {
        if ( bugster_exists_custom_facebook_feed() && in_array('custom-facebook-feed', $options['required_plugins']) ) {
            $options['additional_options'][]    = 'cff_%';                    // Add slugs to export options for this plugin
            if (is_array($options['files']) && count($options['files']) > 0) {
                foreach ($options['files'] as $k => $v) {
                    $options['files'][$k]['file_with_custom-facebook-feed'] = str_replace('name.ext', 'custom-facebook-feed.txt', $v['file_with_']);
                }
            }
        }
        return $options;
    }
}
// Check plugin in the required plugins
if ( !function_exists( 'bugster_custom_facebook_feed_importer_required_plugins' ) ) {
    if (is_admin()) add_filter( 'bugster_filter_importer_required_plugins', 'bugster_custom_facebook_feed_importer_required_plugins', 10, 2 );
    function bugster_custom_facebook_feed_importer_required_plugins($not_installed='', $list='') {
        if (strpos($list, 'custom-facebook-feed')!==false && !bugster_exists_custom_facebook_feed() )
            $not_installed .= '<br>' . esc_html__('Custom Facebook Feed', 'bugster');
        return $not_installed;
    }
}
// Add checkbox to the one-click importer
if ( !function_exists( 'bugster_custom_facebook_feed_importer_show_params' ) ) {
    if (is_admin()) add_action( 'trx_addons_action_importer_params',    'bugster_custom_facebook_feed_importer_show_params', 10, 1 );
    function bugster_custom_facebook_feed_importer_show_params($importer) {
        if ( bugster_exists_custom_facebook_feed() && in_array('custom-facebook-feed', $importer->options['required_plugins']) ) {
            $importer->show_importer_params(array(
                'slug' => 'custom-facebook-feed',
                'title' => esc_html__('Import Custom Facebook Feed', 'bugster'),
                'part' => 0
            ));
        }
    }
}
?>