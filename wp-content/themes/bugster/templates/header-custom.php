<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.06
 */

$bugster_header_css   = '';
$bugster_header_image = get_header_image();
$bugster_header_video = bugster_get_header_video();
if ( ! empty( $bugster_header_image ) && bugster_trx_addons_featured_image_override( is_singular() || bugster_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$bugster_header_image = bugster_get_current_mode_image( $bugster_header_image );
}

$bugster_header_id = bugster_get_custom_header_id();
$bugster_header_meta = get_post_meta( $bugster_header_id, 'trx_addons_options', true );
if ( ! empty( $bugster_header_meta['margin'] ) ) {
	bugster_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( bugster_prepare_css_value( $bugster_header_meta['margin'] ) ) ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $bugster_header_id ); ?> top_panel_custom_<?php echo esc_attr( sanitize_title( get_the_title( $bugster_header_id ) ) ); ?>
				<?php
				echo ! empty( $bugster_header_image ) || ! empty( $bugster_header_video )
					? ' with_bg_image'
					: ' without_bg_image';
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

	// Custom header's layout
	do_action( 'bugster_action_show_layout', $bugster_header_id );

	// Header widgets area
	get_template_part( apply_filters( 'bugster_filter_get_template_part', 'templates/header-widgets' ) );

	?>
</header>
