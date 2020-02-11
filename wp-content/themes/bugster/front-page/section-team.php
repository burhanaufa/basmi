<div class="front_page_section front_page_section_team<?php
	$bugster_scheme = bugster_get_theme_option( 'front_page_team_scheme' );
	if ( ! bugster_is_inherit( $bugster_scheme ) ) {
		echo ' scheme_' . esc_attr( $bugster_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( bugster_get_theme_option( 'front_page_team_paddings' ) );
?>"
		<?php
		$bugster_css      = '';
		$bugster_bg_image = bugster_get_theme_option( 'front_page_team_bg_image' );
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
	$bugster_anchor_icon = bugster_get_theme_option( 'front_page_team_anchor_icon' );
	$bugster_anchor_text = bugster_get_theme_option( 'front_page_team_anchor_text' );
if ( ( ! empty( $bugster_anchor_icon ) || ! empty( $bugster_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_team"'
									. ( ! empty( $bugster_anchor_icon ) ? ' icon="' . esc_attr( $bugster_anchor_icon ) . '"' : '' )
									. ( ! empty( $bugster_anchor_text ) ? ' title="' . esc_attr( $bugster_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_team_inner
	<?php
	if ( bugster_get_theme_option( 'front_page_team_fullheight' ) ) {
		echo ' bugster-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$bugster_css      = '';
			$bugster_bg_mask  = bugster_get_theme_option( 'front_page_team_bg_mask' );
			$bugster_bg_color_type = bugster_get_theme_option( 'front_page_team_bg_color_type' );
			if ( 'custom' == $bugster_bg_color_type ) {
				$bugster_bg_color = bugster_get_theme_option( 'front_page_team_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_team_content_wrap content_wrap">
			<?php
			// Caption
			$bugster_caption = bugster_get_theme_option( 'front_page_team_caption' );
			if ( ! empty( $bugster_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_team_caption front_page_block_<?php echo ! empty( $bugster_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses_post( $bugster_caption ); ?></h2>
				<?php
			}

			// Description (text)
			$bugster_description = bugster_get_theme_option( 'front_page_team_description' );
			if ( ! empty( $bugster_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_team_description front_page_block_<?php echo ! empty( $bugster_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses_post( wpautop( $bugster_description ) ); ?></div>
				<?php
			}

			// Content (widgets)
			?>
			<div class="front_page_section_output front_page_section_team_output">
			<?php
			if ( is_active_sidebar( 'front_page_team_widgets' ) ) {
				dynamic_sidebar( 'front_page_team_widgets' );
			} elseif ( current_user_can( 'edit_theme_options' ) ) {
				if ( ! bugster_exists_trx_addons() ) {
					bugster_customizer_need_trx_addons_message();
				} else {
					bugster_customizer_need_widgets_message( 'front_page_team_caption', 'ThemeREX Addons - Team' );
				}
			}
			?>
			</div>
		</div>
	</div>
</div>
