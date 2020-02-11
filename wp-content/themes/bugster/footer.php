<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

						// Widgets area inside page content
						bugster_create_widgets_area( 'widgets_below_content' );
						?>
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					$bugster_body_style = bugster_get_theme_option( 'body_style' );
					if ( 'fullscreen' != $bugster_body_style ) {
						?>
						</div><!-- </.content_wrap> -->
						<?php
					}

					// Widgets area below page content and related posts below page content
					$bugster_widgets_name = bugster_get_theme_option( 'widgets_below_page' );
					$bugster_show_widgets = ! bugster_is_off( $bugster_widgets_name ) && is_active_sidebar( $bugster_widgets_name );
					$bugster_show_related = is_single() && bugster_get_theme_option( 'related_position' ) == 'below_page';
					if ( $bugster_show_widgets || $bugster_show_related ) {
						if ( 'fullscreen' != $bugster_body_style ) {
							?>
							<div class="content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $bugster_show_related ) {
							do_action( 'bugster_action_related_posts' );
						}

						// Widgets area below page content
						if ( $bugster_show_widgets ) {
							bugster_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $bugster_body_style ) {
							?>
							</div><!-- </.content_wrap> -->
							<?php
						}
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Single posts banner before footer
			if ( is_singular( 'post' ) ) {
				bugster_show_post_banner('footer');
			}
			// Footer
			$bugster_footer_type = bugster_get_theme_option( 'footer_type' );
			if ( 'custom' == $bugster_footer_type && ! bugster_is_layouts_available() ) {
				$bugster_footer_type = 'default';
			}
			get_template_part( apply_filters( 'bugster_filter_get_template_part', "templates/footer-{$bugster_footer_type}" ) );
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php wp_footer(); ?>

</body>
</html>