<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

// Page (category, tag, archive, author) title

if ( bugster_need_page_title() ) {
	bugster_sc_layouts_showed( 'title', true );
	bugster_sc_layouts_showed( 'postmeta', true );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								bugster_show_post_meta(
									apply_filters(
										'bugster_filter_post_meta_args', array(
											'components' => bugster_array_get_keys_by_value( bugster_get_theme_option( 'meta_parts' ) ),
											'counters'   => bugster_array_get_keys_by_value( bugster_get_theme_option( 'counters' ) ),
											'seo'        => bugster_is_on( bugster_get_theme_option( 'seo_snippets' ) ),
										), 'header', 1
									)
								);
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$bugster_blog_title           = bugster_get_blog_title();
							$bugster_blog_title_text      = '';
							$bugster_blog_title_class     = '';
							$bugster_blog_title_link      = '';
							$bugster_blog_title_link_text = '';
							if ( is_array( $bugster_blog_title ) ) {
								$bugster_blog_title_text      = $bugster_blog_title['text'];
								$bugster_blog_title_class     = ! empty( $bugster_blog_title['class'] ) ? ' ' . $bugster_blog_title['class'] : '';
								$bugster_blog_title_link      = ! empty( $bugster_blog_title['link'] ) ? $bugster_blog_title['link'] : '';
								$bugster_blog_title_link_text = ! empty( $bugster_blog_title['link_text'] ) ? $bugster_blog_title['link_text'] : '';
							} else {
								$bugster_blog_title_text = $bugster_blog_title;
							}
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr( $bugster_blog_title_class ); ?>">
								<?php
								$bugster_top_icon = bugster_get_term_image_small();
								if ( ! empty( $bugster_top_icon ) ) {
									$bugster_attr = bugster_getimagesize( $bugster_top_icon );
									?>
									<img src="<?php echo esc_url( $bugster_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'bugster' ); ?>"
										<?php
										if ( ! empty( $bugster_attr[3] ) ) {
											bugster_show_layout( $bugster_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses_post( $bugster_blog_title_text );
								?>
							</h1>
							<?php
							if ( ! empty( $bugster_blog_title_link ) && ! empty( $bugster_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $bugster_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $bugster_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						?>
						<div class="sc_layouts_title_breadcrumbs">
							<?php
							do_action( 'bugster_action_breadcrumbs' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
