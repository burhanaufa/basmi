<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.14
 */
$bugster_header_video = bugster_get_header_video();
$bugster_embed_video  = '';
if ( ! empty( $bugster_header_video ) && ! bugster_is_from_uploads( $bugster_header_video ) ) {
	if ( bugster_is_youtube_url( $bugster_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $bugster_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		?>
		<div id="background_video"><?php bugster_show_layout( bugster_get_embed_video( $bugster_header_video ) ); ?></div>
		<?php
	}
}
