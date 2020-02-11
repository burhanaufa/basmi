<?php
/**
 * The custom template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.50
 */

$bugster_template_args = get_query_var( 'bugster_template_args' );
if ( is_array( $bugster_template_args ) ) {
	$bugster_columns    = empty( $bugster_template_args['columns'] ) ? 2 : max( 1, $bugster_template_args['columns'] );
	$bugster_blog_style = array( $bugster_template_args['type'], $bugster_columns );
} else {
	$bugster_blog_style = explode( '_', bugster_get_theme_option( 'blog_style' ) );
	$bugster_columns    = empty( $bugster_blog_style[1] ) ? 2 : max( 1, $bugster_blog_style[1] );
}
$bugster_blog_id       = bugster_get_custom_blog_id( join( '_', $bugster_blog_style ) );
$bugster_blog_style[0] = str_replace( 'blog-custom-', '', $bugster_blog_style[0] );
$bugster_expanded      = ! bugster_sidebar_present() && bugster_is_on( bugster_get_theme_option( 'expand_content' ) );
$bugster_animation     = bugster_get_theme_option( 'blog_animation' );
$bugster_components    = bugster_array_get_keys_by_value( bugster_get_theme_option( 'meta_parts' ) );

$bugster_post_format   = get_post_format();
$bugster_post_format   = empty( $bugster_post_format ) ? 'standard' : str_replace( 'post-format-', '', $bugster_post_format );

$bugster_blog_meta     = bugster_get_custom_layout_meta( $bugster_blog_id );
$bugster_custom_style  = ! empty( $bugster_blog_meta['scripts_required'] ) ? $bugster_blog_meta['scripts_required'] : 'none';

if ( ! empty( $bugster_template_args['slider'] ) || $bugster_columns > 1 || ! bugster_is_off( $bugster_custom_style ) ) {
	?><div class="
		<?php
		if ( ! empty( $bugster_template_args['slider'] ) ) {
			echo 'slider-slide swiper-slide';
		} else {
			echo ( bugster_is_off( $bugster_custom_style ) ? 'column' : sprintf( '%1$s_item %1$s_item', $bugster_custom_style ) ) . '-1_' . esc_attr( $bugster_columns );
		}
		?>
	">
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" 
<?php
	post_class(
			'post_item post_format_' . esc_attr( $bugster_post_format )
					. ' post_layout_custom ll post_layout_custom_' . esc_attr( $bugster_columns )
					. ' post_layout_' . esc_attr( $bugster_blog_style[0] )
					. ' post_layout_' . esc_attr( $bugster_blog_style[0] ) . '_' . esc_attr( $bugster_columns )
					. ( ! bugster_is_off( $bugster_custom_style )
						? ' post_layout_' . esc_attr( $bugster_custom_style )
							. ' post_layout_' . esc_attr( $bugster_custom_style ) . '_' . esc_attr( $bugster_columns )
						: ''
						)
		);
	echo ( ! bugster_is_off( $bugster_animation ) && empty( $bugster_template_args['slider'] ) ? ' data-animation="' . esc_attr( bugster_get_animation_classes( $bugster_animation ) ) . '"' : '' );
?>
>
	<?php
	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}
	// Custom layout
	do_action( 'bugster_action_show_layout', $bugster_blog_id );
	?>
</article><?php
if ( ! empty( $bugster_template_args['slider'] ) || $bugster_columns > 1 || ! bugster_is_off( $bugster_custom_style ) ) {
	?></div><?php
	// Need opening PHP-tag above just after </div>, because <div> is a inline-block element (used as column)!
}
