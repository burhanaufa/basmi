<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

$bugster_template_args = get_query_var( 'bugster_template_args' );
if ( is_array( $bugster_template_args ) ) {
	$bugster_columns    = empty( $bugster_template_args['columns'] ) ? 1 : max( 1, $bugster_template_args['columns'] );
	$bugster_blog_style = array( $bugster_template_args['type'], $bugster_columns );
	if ( ! empty( $bugster_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $bugster_columns > 1 ) {
		?>
		<div class="column-1_<?php echo esc_attr( $bugster_columns ); ?>">
		<?php
	}
}
$bugster_expanded    = ! bugster_sidebar_present() && bugster_is_on( bugster_get_theme_option( 'expand_content' ) );
$bugster_post_format = get_post_format();
$bugster_post_format = empty( $bugster_post_format ) ? 'standard' : str_replace( 'post-format-', '', $bugster_post_format );
$bugster_animation   = bugster_get_theme_option( 'blog_animation' );
?>
<article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_' . esc_attr( $bugster_post_format ) ); ?>
	<?php echo ( ! bugster_is_off( $bugster_animation ) && empty( $bugster_template_args['slider'] ) ? ' data-animation="' . esc_attr( bugster_get_animation_classes( $bugster_animation ) ) . '"' : '' ); ?>
>
	<?php

	// Featured image
	$bugster_hover = ! empty( $bugster_template_args['hover'] ) && ! bugster_is_inherit( $bugster_template_args['hover'] )
						? $bugster_template_args['hover']
						: bugster_get_theme_option( 'image_hover' );
	bugster_show_post_featured(
		array(
			'no_links'   => ! empty( $bugster_template_args['no_links'] ),
			'hover'      => $bugster_hover,
			'thumb_size' => bugster_get_thumb_size( strpos( bugster_get_theme_option( 'body_style' ), 'full' ) !== false ? 'full' : ( $bugster_expanded ? 'huge' : 'big' ) ),
		)
	);

	// Title and post meta
	if ( get_the_title() != '' ) {
		?>
		<div class="post_header entry-header">
			<?php
			do_action( 'bugster_action_before_post_title' );

			// Post meta
			$bugster_components = bugster_array_get_keys_by_value( bugster_get_theme_option( 'meta_parts' ) );

			if ( ! empty( $bugster_components ) && ! in_array( $bugster_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
				bugster_show_post_meta(
					apply_filters(
						'bugster_filter_post_meta_args', array(
							'components' => $bugster_components,
							'seo'        => false,
						), 'excerpt', 1
					)
				);
			}

			// Post title
			if ( empty( $bugster_template_args['no_links'] ) ) {
				the_title( sprintf( '<h2 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			} else {
				the_title( '<h2 class="post_title entry-title">', '</h2>' );
			}

			do_action( 'bugster_action_before_post_meta' );
			?>
		</div><!-- .post_header -->
		<?php
	}

	// Post content
	if ( empty( $bugster_template_args['hide_excerpt'] ) && bugster_get_theme_option( 'excerpt_length' ) > 0 ) {
		?>
		<div class="post_content entry-content">
			<?php
			if ( bugster_get_theme_option( 'blog_content' ) == 'fullpost' ) {
				// Post content area
				?>
				<div class="post_content_inner">
					<?php
					do_action( 'bugster_action_before_full_post_content' );
					the_content( '' );
					do_action( 'bugster_action_after_full_post_content' );
					?>
				</div>
				<?php
				// Inner pages
				wp_link_pages(
					array(
						'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'bugster' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'bugster' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
			} else {
				// Post content area
				bugster_show_post_content( $bugster_template_args, '<div class="post_content_inner">', '</div>' );
				// More button
				if ( empty( $bugster_template_args['no_links'] ) && ! in_array( $bugster_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
					bugster_show_post_more_link( $bugster_template_args, '<p>', '</p>' );
				}
			}
			?>
		</div><!-- .entry-content -->
		<?php
	}
	?>
</article>
<?php

if ( is_array( $bugster_template_args ) ) {
	if ( ! empty( $bugster_template_args['slider'] ) || $bugster_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
