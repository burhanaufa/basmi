<?php
/**
 * The template for homepage posts with custom style
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.50
 */

bugster_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	$bugster_blog_style = bugster_get_theme_option( 'blog_style' );
	$bugster_parts      = explode( '_', $bugster_blog_style );
	$bugster_columns    = ! empty( $bugster_parts[1] ) ? max( 1, min( 6, (int) $bugster_parts[1] ) ) : 1;
	$bugster_blog_id    = bugster_get_custom_blog_id( $bugster_blog_style );
	$bugster_blog_meta  = bugster_get_custom_layout_meta( $bugster_blog_id );
	if ( ! empty( $bugster_blog_meta['margin'] ) ) {
		bugster_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( bugster_prepare_css_value( $bugster_blog_meta['margin'] ) ) ) );
	}
	$bugster_custom_style = ! empty( $bugster_blog_meta['scripts_required'] ) ? $bugster_blog_meta['scripts_required'] : 'none';

	bugster_blog_archive_start();

	$bugster_classes    = 'posts_container blog_custom_wrap' 
							. ( ! bugster_is_off( $bugster_custom_style )
								? sprintf( ' %s_wrap', $bugster_custom_style )
								: ( $bugster_columns > 1 
									? ' columns_wrap columns_padding_bottom' 
									: ''
									)
								);
	$bugster_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$bugster_sticky_out = bugster_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $bugster_stickies ) && count( $bugster_stickies ) > 0 && get_query_var( 'paged' ) < 1;
	if ( $bugster_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $bugster_sticky_out ) {
		if ( bugster_get_theme_option( 'first_post_large' ) && ! is_paged() && ! in_array( bugster_get_theme_option( 'body_style' ), array( 'fullwide', 'fullscreen' ) ) ) {
			the_post();
			get_template_part( apply_filters( 'bugster_filter_get_template_part', 'content', 'excerpt' ), 'excerpt' );
		}
		?>
		<div class="<?php echo esc_attr( $bugster_classes ); ?>">
		<?php
	}
	while ( have_posts() ) {
		the_post();
		if ( $bugster_sticky_out && ! is_sticky() ) {
			$bugster_sticky_out = false;
			?>
			</div><div class="<?php echo esc_attr( $bugster_classes ); ?>">
			<?php
		}
		$bugster_part = $bugster_sticky_out && is_sticky() ? 'sticky' : 'custom';
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'content', $bugster_part ), $bugster_part );
	}
	?>
	</div>
	<?php

	bugster_show_pagination();

	bugster_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
