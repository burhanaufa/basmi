<?php
// Add plugin-specific colors and fonts to the custom CSS
if (!function_exists('bugster_strong_testimonials_get_css')) {
	add_filter('bugster_filter_get_css', 'bugster_strong_testimonials_get_css', 10, 2);

	function bugster_strong_testimonials_get_css($css, $args) {
		if (isset($css['fonts']) && isset($args['fonts'])) {
			$fonts = $args['fonts'];
			$css['fonts'] .= <<<CSS


}

CSS;
		}
			if (isset($css['colors']) && isset($args['colors'])) {
			$colors = $args['colors'];
			$css['colors'] .= <<<CSS

/*Strong testimonials*/
.widget .strong-view.modern .testimonial-inner {
	background-color: {$colors['bg_color']};
}
.strong-view.modern .testimonial-name {
	color: {$colors['text_dark']};
}
.strong-view.modern .testimonial-company {
	color: {$colors['text_light']};
}
.strong-rating span.star:before {
	color: {$colors['text_link']};
}

CSS;
		}

		return $css;
	}
}
?>