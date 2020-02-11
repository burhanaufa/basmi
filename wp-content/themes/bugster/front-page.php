<?php
/**
 * The Front Page template file.
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.31
 */

get_header();

// If front-page is a static page
if ( get_option( 'show_on_front' ) == 'page' ) {

	// If Front Page Builder is enabled - display sections
	if ( bugster_is_on( bugster_get_theme_option( 'front_page_enabled' ) ) ) {

		if ( have_posts() ) {
			the_post();
		}

		$bugster_sections = bugster_array_get_keys_by_value( bugster_get_theme_option( 'front_page_sections' ), 1, false );
		if ( is_array( $bugster_sections ) ) {
			foreach ( $bugster_sections as $bugster_section ) {
				get_template_part( apply_filters( 'bugster_filter_get_template_part', 'front-page/section', $bugster_section ), $bugster_section );
			}
		}

		// Else if this page is blog archive
	} elseif ( is_page_template( 'blog.php' ) ) {
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'blog' ) );

		// Else - display native page content
	} else {
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'page' ) );
	}

	// Else get index template to show posts
} else {
	get_template_part( apply_filters( 'bugster_filter_get_template_part', 'index' ) );
}

get_footer();
