<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

if ( bugster_sidebar_present() ) {
	ob_start();
	$bugster_sidebar_name = bugster_get_theme_option( 'sidebar_widgets' );
	bugster_storage_set( 'current_sidebar', 'sidebar' );
	if ( is_active_sidebar( $bugster_sidebar_name ) ) {
		dynamic_sidebar( $bugster_sidebar_name );
	}
	$bugster_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $bugster_out ) ) {
		$bugster_sidebar_position    = bugster_get_theme_option( 'sidebar_position' );
		$bugster_sidebar_position_ss = bugster_get_theme_option( 'sidebar_position_ss' );
		?>
		<div class="sidebar widget_area
			<?php
			echo ' ' . esc_attr( $bugster_sidebar_position );
			echo ' sidebar_' . esc_attr( $bugster_sidebar_position_ss );

			if ( 'float' == $bugster_sidebar_position_ss ) {
				echo ' sidebar_float';
			}
			if ( ! bugster_is_inherit( bugster_get_theme_option( 'sidebar_scheme' ) ) ) {
				echo ' scheme_' . esc_attr( bugster_get_theme_option( 'sidebar_scheme' ) );
			}
			?>
		" role="complementary">
			<?php
			// Single posts banner before sidebar
			bugster_show_post_banner( 'sidebar' );
			// Button to show/hide sidebar on mobile
			if ( in_array( $bugster_sidebar_position_ss, array( 'above', 'float' ) ) ) {
				$bugster_title = apply_filters( 'bugster_filter_sidebar_control_title', 'float' == $bugster_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'bugster' ) : '' );
				$bugster_text  = apply_filters( 'bugster_filter_sidebar_control_text', 'above' == $bugster_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'bugster' ) : '' );
				?>
				<a href="#" class="sidebar_control" title="<?php echo esc_attr( $bugster_title ); ?>"><?php echo esc_html( $bugster_text ); ?></a>
				<?php
			}
			?>
			<div class="sidebar_inner">
				<?php
				do_action( 'bugster_action_before_sidebar' );
				bugster_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $bugster_out ) );
				do_action( 'bugster_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<div class="clearfix"></div>
		<?php
	}
}
