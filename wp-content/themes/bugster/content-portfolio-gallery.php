<?php
/**
 * The Gallery template to display posts
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
$bugster_post_format = get_post_format();
$bugster_post_format = empty( $bugster_post_format ) ? 'standard' : str_replace( 'post-format-', '', $bugster_post_format );
$bugster_animation   = bugster_get_theme_option( 'blog_animation' );
$bugster_image       = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

?><div class="
<?php
if ( ! empty( $bugster_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo 'masonry_item masonry_item-1_' . esc_attr( $bugster_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class(
		'post_item post_format_' . esc_attr( $bugster_post_format )
		. ' post_layout_portfolio'
		. ' post_layout_portfolio_' . esc_attr( $bugster_columns )
		. ' post_layout_gallery'
		. ' post_layout_gallery_' . esc_attr( $bugster_columns )
	);
	echo ( ! bugster_is_off( $bugster_animation ) && empty( $bugster_template_args['slider'] ) ? ' data-animation="' . esc_attr( bugster_get_animation_classes( $bugster_animation ) ) . '"' : '' );
	?>
	data-size="
		<?php
		if ( ! empty( $bugster_image[1] ) && ! empty( $bugster_image[2] ) ) {
			echo intval( $bugster_image[1] ) . 'x' . intval( $bugster_image[2] );}
		?>
	"
	data-src="
		<?php
		if ( ! empty( $bugster_image[0] ) ) {
			echo esc_url( $bugster_image[0] );}
		?>
	"
>
<?php

	// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	// Featured image
	$bugster_image_hover = 'icon';
if ( in_array( $bugster_image_hover, array( 'icons', 'zoom' ) ) ) {
	$bugster_image_hover = 'dots';
}
$bugster_components = bugster_array_get_keys_by_value( bugster_get_theme_option( 'meta_parts' ) );
bugster_show_post_featured(
	array(
		'hover'         => $bugster_image_hover,
		'no_links'      => ! empty( $bugster_template_args['no_links'] ),
		'thumb_size'    => bugster_get_thumb_size( strpos( bugster_get_theme_option( 'body_style' ), 'full' ) !== false || $bugster_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only'    => true,
		'show_no_image' => true,
		'post_info'     => '<div class="post_details">'
						. '<h2 class="post_title">'
							. ( empty( $bugster_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>'
								: esc_html( get_the_title() )
								)
						. '</h2>'
						. '<div class="post_description">'
							. ( ! empty( $bugster_components )
								? bugster_show_post_meta(
									apply_filters(
										'bugster_filter_post_meta_args', array(
											'components' => $bugster_components,
											'seo'      => false,
											'echo'     => false,
										), $bugster_blog_style[0], $bugster_columns
									)
								)
								: ''
								)
							. ( empty( $bugster_template_args['hide_excerpt'] )
								? '<div class="post_description_content">' . get_the_excerpt() . '</div>'
								: ''
								)
							. ( empty( $bugster_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__( 'Learn more', 'bugster' ) . '</span></a>'
								: ''
								)
						. '</div>'
					. '</div>',
	)
);
?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
