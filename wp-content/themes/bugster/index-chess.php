<?php
/**
 * The template for homepage posts with "Chess" style
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

bugster_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	bugster_blog_archive_start();

	$bugster_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$bugster_sticky_out = bugster_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $bugster_stickies ) && count( $bugster_stickies ) > 0 && get_query_var( 'paged' ) < 1;
	if ( $bugster_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $bugster_sticky_out ) {
		?>
		<div class="chess_wrap posts_container">
		<?php
	}
	
	while ( have_posts() ) {
		the_post();
		if ( $bugster_sticky_out && ! is_sticky() ) {
			$bugster_sticky_out = false;
			?>
			</div><div class="chess_wrap posts_container">
			<?php
		}
		$bugster_part = $bugster_sticky_out && is_sticky() ? 'sticky' : 'chess';
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
