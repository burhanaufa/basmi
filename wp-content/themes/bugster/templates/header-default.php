<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

$bugster_header_css   = '';
$bugster_header_image = get_header_image();
$bugster_header_video = bugster_get_header_video();
if ( ! empty( $bugster_header_image ) && bugster_trx_addons_featured_image_override( is_singular() || bugster_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$bugster_header_image = bugster_get_current_mode_image( $bugster_header_image );
}

?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $bugster_header_image ) || ! empty( $bugster_header_video ) ? ' with_bg_image' : ' without_bg_image';
	if ( '' != $bugster_header_video ) {
		echo ' with_bg_video';
	}
	if ( '' != $bugster_header_image ) {
		echo ' ' . esc_attr( bugster_add_inline_css_class( 'background-image: url(' . esc_url( $bugster_header_image ) . ');' ) );
	}
	if ( is_single() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	if ( bugster_is_on( bugster_get_theme_option( 'header_fullheight' ) ) ) {
		echo ' header_fullheight bugster-full-height';
	}
	if ( ! bugster_is_inherit( bugster_get_theme_option( 'header_scheme' ) ) ) {
		echo ' scheme_' . esc_attr( bugster_get_theme_option( 'header_scheme' ) );
	}
	?>
">
	<?php

	// Background video
	if ( ! empty( $bugster_header_video ) ) {
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'templates/header-video' ) );
	}

	// Main menu
	if ( bugster_get_theme_option( 'menu_style' ) == 'top' ) {
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'templates/header-navi' ) );
	}

	// Mobile header
	if ( bugster_is_on( bugster_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'templates/header-mobile' ) );
	}

	if ( !is_page() || !is_single() || ( bugster_get_theme_option( 'post_header_position' ) == 'default' && bugster_get_theme_option( 'post_thumbnail_type' ) == 'default' ) ) {
		// Page title and breadcrumbs area
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'templates/header-title' ) );

		// Display featured image in the header on the single posts
		// Comment next line to prevent show featured image in the header area
		// and display it in the post's content
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'templates/header-single' ) );
	}

	// Header widgets area
	get_template_part( apply_filters( 'bugster_filter_get_template_part', 'templates/header-widgets' ) );
	?>
</header>
