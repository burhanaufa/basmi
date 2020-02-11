<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

$bugster_args = get_query_var( 'bugster_logo_args' );

// Site logo
$bugster_logo_type   = isset( $bugster_args['type'] ) ? $bugster_args['type'] : '';
$bugster_logo_image  = bugster_get_logo_image( $bugster_logo_type );
$bugster_logo_text   = bugster_is_on( bugster_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$bugster_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $bugster_logo_image['logo'] ) || ! empty( $bugster_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $bugster_logo_image['logo'] ) ) {
			if ( empty( $bugster_logo_type ) && function_exists( 'the_custom_logo' ) && (int) $bugster_logo_image['logo'] > 0 ) {
				the_custom_logo();
			} else {
				$bugster_attr = bugster_getimagesize( $bugster_logo_image['logo'] );
				echo '<img src="' . esc_url( $bugster_logo_image['logo'] ) . '"'
						. ( ! empty( $bugster_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $bugster_logo_image['logo_retina'] ) . ' 2x"' : '' )
						. ' alt="' . esc_attr( $bugster_logo_text ) . '"'
						. ( ! empty( $bugster_attr[3] ) ? ' ' . wp_kses_data( $bugster_attr[3] ) : '' )
						. '>';
			}
		} else {
			bugster_show_layout( bugster_prepare_macros( $bugster_logo_text ), '<span class="logo_text">', '</span>' );
			bugster_show_layout( bugster_prepare_macros( $bugster_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}
