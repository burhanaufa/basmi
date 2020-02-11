<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.10
 */

$bugster_footer_id = bugster_get_custom_footer_id();
$bugster_footer_meta = get_post_meta( $bugster_footer_id, 'trx_addons_options', true );
if ( ! empty( $bugster_footer_meta['margin'] ) ) {
	bugster_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( bugster_prepare_css_value( $bugster_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $bugster_footer_id ); ?> footer_custom_<?php echo esc_attr( sanitize_title( get_the_title( $bugster_footer_id ) ) ); ?>
						<?php
						if ( ! bugster_is_inherit( bugster_get_theme_option( 'footer_scheme' ) ) ) {
							echo ' scheme_' . esc_attr( bugster_get_theme_option( 'footer_scheme' ) );
						}
						?>
						">
	<?php
	// Custom footer's layout
	do_action( 'bugster_action_show_layout', $bugster_footer_id );
	?>
</footer><!-- /.footer_wrap -->
