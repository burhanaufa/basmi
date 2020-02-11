<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

$bugster_template_args = get_query_var( 'bugster_template_args' );
if ( is_array( $bugster_template_args ) ) {
	$bugster_columns    = empty( $bugster_template_args['columns'] ) ? 1 : max( 1, min( 3, $bugster_template_args['columns'] ) );
	$bugster_blog_style = array( $bugster_template_args['type'], $bugster_columns );
} else {
	$bugster_blog_style = explode( '_', bugster_get_theme_option( 'blog_style' ) );
	$bugster_columns    = empty( $bugster_blog_style[1] ) ? 1 : max( 1, min( 3, $bugster_blog_style[1] ) );
}
$bugster_expanded    = ! bugster_sidebar_present() && bugster_is_on( bugster_get_theme_option( 'expand_content' ) );
$bugster_post_format = get_post_format();
$bugster_post_format = empty( $bugster_post_format ) ? 'standard' : str_replace( 'post-format-', '', $bugster_post_format );
$bugster_animation   = bugster_get_theme_option( 'blog_animation' );

?><article id="post-<?php the_ID(); ?>" 
									<?php
									post_class(
										'post_item'
										. ' post_layout_chess'
										. ' post_layout_chess_' . esc_attr( $bugster_columns )
										. ' post_format_' . esc_attr( $bugster_post_format )
										. ( ! empty( $bugster_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
									);
									echo ( ! bugster_is_off( $bugster_animation ) && empty( $bugster_template_args['slider'] ) ? ' data-animation="' . esc_attr( bugster_get_animation_classes( $bugster_animation ) ) . '"' : '' );
									?>
	>

	<?php
	// Add anchor
	if ( 1 == $bugster_columns && ! is_array( $bugster_template_args ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode( '[trx_sc_anchor id="post_' . esc_attr( get_the_ID() ) . '" title="' . esc_attr( get_the_title() ) . '" icon="' . esc_attr( bugster_get_post_icon() ) . '"]' );
	}

	// Featured image
	$bugster_hover = ! empty( $bugster_template_args['hover'] ) && ! bugster_is_inherit( $bugster_template_args['hover'] )
						? $bugster_template_args['hover']
						: bugster_get_theme_option( 'image_hover' );
	bugster_show_post_featured(
		array(
			'class'         => 1 == $bugster_columns && ! is_array( $bugster_template_args ) ? 'bugster-full-height' : '',
			'hover'         => $bugster_hover,
			'no_links'      => ! empty( $bugster_template_args['no_links'] ),
			'show_no_image' => true,
			'thumb_ratio'   => '1:1',
			'thumb_bg'      => true,
			'thumb_size'    => bugster_get_thumb_size(
				strpos( bugster_get_theme_option( 'body_style' ), 'full' ) !== false
										? ( 1 < $bugster_columns ? 'huge' : 'original' )
										: ( 2 < $bugster_columns ? 'big' : 'huge' )
			),
		)
	);

	?>
	<div class="post_inner"><div class="post_inner_content"><div class="post_header entry-header">
		<?php
			do_action( 'bugster_action_before_post_title' );

			// Post title
			if ( empty( $bugster_template_args['no_links'] ) ) {
				the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			} else {
				the_title( '<h3 class="post_title entry-title">', '</h3>' );
			}

			do_action( 'bugster_action_before_post_meta' );

			// Post meta
			$bugster_components = bugster_array_get_keys_by_value( bugster_get_theme_option( 'meta_parts' ) );
			$bugster_post_meta  = empty( $bugster_components ) || in_array( $bugster_hover, array( 'border', 'pull', 'slide', 'fade' ) )
										? ''
										: bugster_show_post_meta(
											apply_filters(
												'bugster_filter_post_meta_args', array(
													'components' => $bugster_components,
													'seo'  => false,
													'echo' => false,
												), $bugster_blog_style[0], $bugster_columns
											)
										);
			bugster_show_layout( $bugster_post_meta );
			?>
		</div><!-- .entry-header -->

		<div class="post_content entry-content">
			<?php
			// Post content area
			if ( empty( $bugster_template_args['hide_excerpt'] ) && bugster_get_theme_option( 'excerpt_length' ) > 0 ) {
				bugster_show_post_content( $bugster_template_args, '<div class="post_content_inner">', '</div>' );
			}
			// Post meta
			if ( in_array( $bugster_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
				bugster_show_layout( $bugster_post_meta );
			}
			// More button
			if ( empty( $bugster_template_args['no_links'] ) && ! in_array( $bugster_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
				bugster_show_post_more_link( $bugster_template_args, '<p>', '</p>' );
			}
			?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
