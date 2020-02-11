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
	$bugster_columns    = empty( $bugster_template_args['columns'] ) ? 2 : max( 1, $bugster_template_args['columns'] );
	$bugster_blog_style = array( $bugster_template_args['type'], $bugster_columns );
} else {
	$bugster_blog_style = explode( '_', bugster_get_theme_option( 'blog_style' ) );
	$bugster_columns    = empty( $bugster_blog_style[1] ) ? 2 : max( 1, $bugster_blog_style[1] );
}
$bugster_expanded   = ! bugster_sidebar_present() && bugster_is_on( bugster_get_theme_option( 'expand_content' ) );
$bugster_animation  = bugster_get_theme_option( 'blog_animation' );
$bugster_components = bugster_array_get_keys_by_value( bugster_get_theme_option( 'meta_parts' ) );

$bugster_post_format = get_post_format();
$bugster_post_format = empty( $bugster_post_format ) ? 'standard' : str_replace( 'post-format-', '', $bugster_post_format );

?><div class="
<?php
if ( ! empty( $bugster_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo ( 'classic' == $bugster_blog_style[0] ? 'column' : 'masonry_item masonry_item' ) . '-1_' . esc_attr( $bugster_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
		post_class(
			'post_item post_format_' . esc_attr( $bugster_post_format )
					. ' post_layout_classic post_layout_classic_' . esc_attr( $bugster_columns )
					. ' post_layout_' . esc_attr( $bugster_blog_style[0] )
					. ' post_layout_' . esc_attr( $bugster_blog_style[0] ) . '_' . esc_attr( $bugster_columns )
		);
		echo ( ! bugster_is_off( $bugster_animation ) && empty( $bugster_template_args['slider'] ) ? ' data-animation="' . esc_attr( bugster_get_animation_classes( $bugster_animation ) ) . '"' : '' );
		?>
	>
	<?php

	// Featured image
	$bugster_hover = ! empty( $bugster_template_args['hover'] ) && ! bugster_is_inherit( $bugster_template_args['hover'] )
						? $bugster_template_args['hover']
						: bugster_get_theme_option( 'image_hover' );
	bugster_show_post_featured(
		array(
			'thumb_size' => bugster_get_thumb_size(
				'classic' == $bugster_blog_style[0]
						? ( strpos( bugster_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $bugster_columns > 2 ? 'big' : 'huge' )
								: ( $bugster_columns > 2
									? ( $bugster_expanded ? 'huge' : 'huge' )
									: ( $bugster_expanded ? 'huge' : 'huge' )
									)
							)
						: ( strpos( bugster_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $bugster_columns > 2 ? 'masonry-big' : 'full' )
								: ( $bugster_columns <= 2 && $bugster_expanded ? 'masonry-big' : 'masonry' )
							)
			),
			'hover'      => $bugster_hover,
			'no_links'   => ! empty( $bugster_template_args['no_links'] ),
		)
	);

	if ( ! in_array( $bugster_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			do_action( 'bugster_action_before_post_title' );

			// Post title
			if ( empty( $bugster_template_args['no_links'] ) ) {
				the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
			} else {
				the_title( '<h4 class="post_title entry-title">', '</h4>' );
			}

			do_action( 'bugster_action_before_post_meta' );

			// Post meta
			if ( ! empty( $bugster_components ) && ! in_array( $bugster_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
				bugster_show_post_meta(
					apply_filters(
						'bugster_filter_post_meta_args', array(
							'components' => $bugster_components,
							'seo'        => false,
						), $bugster_blog_style[0], $bugster_columns
					)
				);
			}

			do_action( 'bugster_action_after_post_meta' );
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>

	<div class="post_content entry-content">
		<?php
		if ( empty( $bugster_template_args['hide_excerpt'] ) && bugster_get_theme_option( 'excerpt_length' ) > 0 ) {
			// Post content area
			bugster_show_post_content( $bugster_template_args, '<div class="post_content_inner">', '</div>' );
		}
		
		// Post meta
		if ( in_array( $bugster_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			if ( ! empty( $bugster_components ) ) {
				bugster_show_post_meta(
					apply_filters(
						'bugster_filter_post_meta_args', array(
							'components' => $bugster_components,
						), $bugster_blog_style[0], $bugster_columns
					)
				);
			}
		}
		
		// More button
		if ( empty( $bugster_template_args['no_links'] ) && ! empty( $bugster_template_args['more_text'] ) && ! in_array( $bugster_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			bugster_show_post_more_link( $bugster_template_args, '<p>', '</p>' );
		}
		?>
	</div><!-- .entry-content -->

</article></div><?php
// Need opening PHP-tag above, because <div> is a inline-block element (used as column)!
