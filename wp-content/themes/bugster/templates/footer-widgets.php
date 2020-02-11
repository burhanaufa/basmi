<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.10
 */

// Footer sidebar
$bugster_footer_name    = bugster_get_theme_option( 'footer_widgets' );
$bugster_footer_present = ! bugster_is_off( $bugster_footer_name ) && is_active_sidebar( $bugster_footer_name );
if ( $bugster_footer_present ) {
	bugster_storage_set( 'current_sidebar', 'footer' );
	$bugster_footer_wide = bugster_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $bugster_footer_name ) ) {
		dynamic_sidebar( $bugster_footer_name );
	}
	$bugster_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $bugster_out ) ) {
		$bugster_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $bugster_out );
		$bugster_need_columns = true;   //or check: strpos($bugster_out, 'columns_wrap')===false;
		if ( $bugster_need_columns ) {
			$bugster_columns = max( 0, (int) bugster_get_theme_option( 'footer_columns' ) );			
			if ( 0 == $bugster_columns ) {
				$bugster_columns = min( 4, max( 1, bugster_tags_count( $bugster_out, 'aside' ) ) );
			}
			if ( $bugster_columns > 1 ) {
				$bugster_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $bugster_columns ) . ' widget', $bugster_out );
			} else {
				$bugster_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $bugster_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $bugster_footer_wide ) {
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
				bugster_show_layout( $bugster_out );
				do_action( 'bugster_action_after_sidebar' );
				if ( $bugster_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $bugster_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
