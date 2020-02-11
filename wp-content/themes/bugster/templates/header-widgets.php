<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

// Header sidebar
$bugster_header_name    = bugster_get_theme_option( 'header_widgets' );
$bugster_header_present = ! bugster_is_off( $bugster_header_name ) && is_active_sidebar( $bugster_header_name );
if ( $bugster_header_present ) {
	bugster_storage_set( 'current_sidebar', 'header' );
	$bugster_header_wide = bugster_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $bugster_header_name ) ) {
		dynamic_sidebar( $bugster_header_name );
	}
	$bugster_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $bugster_widgets_output ) ) {
		$bugster_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $bugster_widgets_output );
		$bugster_need_columns   = strpos( $bugster_widgets_output, 'columns_wrap' ) === false;
		if ( $bugster_need_columns ) {
			$bugster_columns = max( 0, (int) bugster_get_theme_option( 'header_columns' ) );
			if ( 0 == $bugster_columns ) {
				$bugster_columns = min( 6, max( 1, bugster_tags_count( $bugster_widgets_output, 'aside' ) ) );
			}
			if ( $bugster_columns > 1 ) {
				$bugster_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $bugster_columns ) . ' widget', $bugster_widgets_output );
			} else {
				$bugster_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $bugster_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $bugster_header_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $bugster_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'bugster_action_before_sidebar' );
				bugster_show_layout( $bugster_widgets_output );
				do_action( 'bugster_action_after_sidebar' );
				if ( $bugster_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $bugster_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
