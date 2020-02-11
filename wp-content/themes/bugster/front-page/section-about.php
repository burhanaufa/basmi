<div class="front_page_section front_page_section_about<?php
	$bugster_scheme = bugster_get_theme_option( 'front_page_about_scheme' );
	if ( ! bugster_is_inherit( $bugster_scheme ) ) {
		echo ' scheme_' . esc_attr( $bugster_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( bugster_get_theme_option( 'front_page_about_paddings' ) );
?>"
		<?php
		$bugster_css      = '';
		$bugster_bg_image = bugster_get_theme_option( 'front_page_about_bg_image' );
		if ( ! empty( $bugster_bg_image ) ) {
			$bugster_css .= 'background-image: url(' . esc_url( bugster_get_attachment_url( $bugster_bg_image ) ) . ');';
		}
		if ( ! empty( $bugster_css ) ) {
			echo ' style="' . esc_attr( $bugster_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$bugster_anchor_icon = bugster_get_theme_option( 'front_page_about_anchor_icon' );
	$bugster_anchor_text = bugster_get_theme_option( 'front_page_about_anchor_text' );
if ( ( ! empty( $bugster_anchor_icon ) || ! empty( $bugster_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_about"'
									. ( ! empty( $bugster_anchor_icon ) ? ' icon="' . esc_attr( $bugster_anchor_icon ) . '"' : '' )
									. ( ! empty( $bugster_anchor_text ) ? ' title="' . esc_attr( $bugster_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_about_inner
	<?php
	if ( bugster_get_theme_option( 'front_page_about_fullheight' ) ) {
		echo ' bugster-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$bugster_css           = '';
			$bugster_bg_mask       = bugster_get_theme_option( 'front_page_about_bg_mask' );
			$bugster_bg_color_type = bugster_get_theme_option( 'front_page_about_bg_color_type' );
			if ( 'custom' == $bugster_bg_color_type ) {
				$bugster_bg_color = bugster_get_theme_option( 'front_page_about_bg_color' );
			} elseif ( 'scheme_bg_color' == $bugster_bg_color_type ) {
				$bugster_bg_color = bugster_get_scheme_color( 'bg_color', $bugster_scheme );
			} else {
				$bugster_bg_color = '';
			}
			if ( ! empty( $bugster_bg_color ) && $bugster_bg_mask > 0 ) {
				$bugster_css .= 'background-color: ' . esc_attr(
					1 == $bugster_bg_mask ? $bugster_bg_color : bugster_hex2rgba( $bugster_bg_color, $bugster_bg_mask )
				) . ';';
			}
			if ( ! empty( $bugster_css ) ) {
				echo ' style="' . esc_attr( $bugster_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_about_content_wrap content_wrap">
			<?php
			// Caption
			$bugster_caption = bugster_get_theme_option( 'front_page_about_caption' );
			if ( ! empty( $bugster_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_about_caption front_page_block_<?php echo ! empty( $bugster_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses_post( $bugster_caption ); ?></h2>
				<?php
			}

			// Description (text)
			$bugster_description = bugster_get_theme_option( 'front_page_about_description' );
			if ( ! empty( $bugster_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_about_description front_page_block_<?php echo ! empty( $bugster_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses_post( wpautop( $bugster_description ) ); ?></div>
				<?php
			}

			// Content
			$bugster_content = bugster_get_theme_option( 'front_page_about_content' );
			if ( ! empty( $bugster_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_content front_page_section_about_content front_page_block_<?php echo ! empty( $bugster_content ) ? 'filled' : 'empty'; ?>">
				<?php
					$bugster_page_content_mask = '%%CONTENT%%';
				if ( strpos( $bugster_content, $bugster_page_content_mask ) !== false ) {
					$bugster_content = preg_replace(
						'/(\<p\>\s*)?' . $bugster_page_content_mask . '(\s*\<\/p\>)/i',
						sprintf(
							'<div class="front_page_section_about_source">%s</div>',
							apply_filters( 'the_content', get_the_content() )
						),
						$bugster_content
					);
				}
					bugster_show_layout( $bugster_content );
				?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
