<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.10
 */

// Logo
if ( bugster_is_on( bugster_get_theme_option( 'logo_in_footer' ) ) ) {
	$bugster_logo_image = bugster_get_logo_image( 'footer' );
	$bugster_logo_text  = get_bloginfo( 'name' );
	if ( ! empty( $bugster_logo_image['logo'] ) || ! empty( $bugster_logo_text ) ) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if ( ! empty( $bugster_logo_image['logo'] ) ) {
					$bugster_attr = bugster_getimagesize( $bugster_logo_image['logo'] );
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">'
							. '<img src="' . esc_url( $bugster_logo_image['logo'] ) . '"'
								. ( ! empty( $bugster_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $bugster_logo_image['logo_retina'] ) . ' 2x"' : '' )
								. ' class="logo_footer_image"'
								. ' alt="' . esc_attr__( 'Site logo', 'bugster' ) . '"'
								. ( ! empty( $bugster_attr[3] ) ? ' ' . wp_kses_data( $bugster_attr[3] ) : '' )
							. '>'
						. '</a>';
				} elseif ( ! empty( $bugster_logo_text ) ) {
					echo '<h1 class="logo_footer_text">'
							. '<a href="' . esc_url( home_url( '/' ) ) . '">'
								. esc_html( $bugster_logo_text )
							. '</a>'
						. '</h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
