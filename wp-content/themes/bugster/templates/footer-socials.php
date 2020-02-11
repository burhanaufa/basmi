<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.10
 */


// Socials
if ( bugster_is_on( bugster_get_theme_option( 'socials_in_footer' ) ) ) {
	$bugster_output = bugster_get_socials_links();
	if ( '' != $bugster_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php bugster_show_layout( $bugster_output ); ?>
			</div>
		</div>
		<?php
	}
}
