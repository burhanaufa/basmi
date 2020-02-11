<?php
/**
 * The Portfolio template to display the content
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
		. ( is_sticky() && ! is_paged() ? ' sticky' : '' )
	);
	echo ( ! bugster_is_off( $bugster_animation ) && empty( $bugster_template_args['slider'] ) ? ' data-animation="' . esc_attr( bugster_get_animation_classes( $bugster_animation ) ) . '"' : '' );
	?>
>
<?php

	$bugster_image_hover = ! empty( $bugster_template_args['hover'] ) && ! bugster_is_inherit( $bugster_template_args['hover'] )
								? $bugster_template_args['hover']
								: bugster_get_theme_option( 'image_hover' );
	// Featured image
	bugster_show_post_featured(
		array(
			'hover'         => $bugster_image_hover,
			'no_links'      => ! empty( $bugster_template_args['no_links'] ),
			'thumb_size'    => bugster_get_thumb_size(
				strpos( bugster_get_theme_option( 'body_style' ), 'full' ) !== false || $bugster_columns < 3
								? 'masonry-big'
				: 'masonry-big'
			),
			'show_no_image' => true,
			'class'         => 'dots' == $bugster_image_hover ? 'hover_with_info' : '',
			'post_info'     => 'dots' == $bugster_image_hover ? '<div class="post_info">' . esc_html( get_the_title() ) . '</div>' : '',
		)
	);
	?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!