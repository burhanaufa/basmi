<?php
// Add skin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'bugster_skin_get_css' ) ) {
	add_filter( 'bugster_filter_get_css', 'bugster_skin_get_css', 10, 2 );
	function bugster_skin_get_css( $css, $args ) {

		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS

CSS;
		}

		if ( isset( $css['vars'] ) && isset( $args['vars'] ) ) {
			$vars         = $args['vars'];
			$css['vars'] .= <<<CSS

CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

CSS;
		}

		return $css;
	}
}

