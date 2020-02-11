<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
if ( ! bugster_is_inherit( bugster_get_theme_option( 'copyright_scheme' ) ) ) {
	echo ' scheme_' . esc_attr( bugster_get_theme_option( 'copyright_scheme' ) );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$bugster_copyright = bugster_get_theme_option( 'copyright' );
			if ( ! empty( $bugster_copyright ) ) {
				// Replace {{Y}} or {Y} with the current year
				$bugster_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $bugster_copyright );
				// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
				$bugster_copyright = bugster_prepare_macros( $bugster_copyright );
				// Display copyright
				echo wp_kses_post( nl2br( $bugster_copyright ) );
			}
			?>
			</div>
		</div>
	</div>
</div>
