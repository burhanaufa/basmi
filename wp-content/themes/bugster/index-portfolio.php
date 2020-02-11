<?php
/**
 * The template for homepage posts with "Portfolio" style
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

	// Show filters
	$bugster_cat          = bugster_get_theme_option( 'parent_cat' );
	$bugster_post_type    = bugster_get_theme_option( 'post_type' );
	$bugster_taxonomy     = bugster_get_post_type_taxonomy( $bugster_post_type );
	$bugster_show_filters = bugster_get_theme_option( 'show_filters' );
	$bugster_tabs         = array();
	if ( ! bugster_is_off( $bugster_show_filters ) ) {
		$bugster_args           = array(
			'type'         => $bugster_post_type,
			'child_of'     => $bugster_cat,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => 0,
			'taxonomy'     => $bugster_taxonomy,
			'pad_counts'   => false,
		);
		$bugster_portfolio_list = get_terms( $bugster_args );
		if ( is_array( $bugster_portfolio_list ) && count( $bugster_portfolio_list ) > 0 ) {
			$bugster_tabs[ $bugster_cat ] = esc_html__( 'All', 'bugster' );
			foreach ( $bugster_portfolio_list as $bugster_term ) {
				if ( isset( $bugster_term->term_id ) ) {
					$bugster_tabs[ $bugster_term->term_id ] = $bugster_term->name;
				}
			}
		}
	}
	if ( count( $bugster_tabs ) > 0 ) {
		$bugster_portfolio_filters_ajax   = true;
		$bugster_portfolio_filters_active = $bugster_cat;
		$bugster_portfolio_filters_id     = 'portfolio_filters';
		?>
		<div class="portfolio_filters bugster_tabs bugster_tabs_ajax">
			<ul class="portfolio_titles bugster_tabs_titles">
				<?php
				foreach ( $bugster_tabs as $bugster_id => $bugster_title ) {
					?>
					<li><a href="<?php echo esc_url( bugster_get_hash_link( sprintf( '#%s_%s_content', $bugster_portfolio_filters_id, $bugster_id ) ) ); ?>" data-tab="<?php echo esc_attr( $bugster_id ); ?>"><?php echo esc_html( $bugster_title ); ?></a></li>
					<?php
				}
				?>
			</ul>
			<?php
			$bugster_ppp = bugster_get_theme_option( 'posts_per_page' );
			if ( bugster_is_inherit( $bugster_ppp ) ) {
				$bugster_ppp = '';
			}
			foreach ( $bugster_tabs as $bugster_id => $bugster_title ) {
				$bugster_portfolio_need_content = $bugster_id == $bugster_portfolio_filters_active || ! $bugster_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr( sprintf( '%s_%s_content', $bugster_portfolio_filters_id, $bugster_id ) ); ?>"
					class="portfolio_content bugster_tabs_content"
					data-blog-template="<?php echo esc_attr( bugster_storage_get( 'blog_template' ) ); ?>"
					data-blog-style="<?php echo esc_attr( bugster_get_theme_option( 'blog_style' ) ); ?>"
					data-posts-per-page="<?php echo esc_attr( $bugster_ppp ); ?>"
					data-post-type="<?php echo esc_attr( $bugster_post_type ); ?>"
					data-taxonomy="<?php echo esc_attr( $bugster_taxonomy ); ?>"
					data-cat="<?php echo esc_attr( $bugster_id ); ?>"
					data-parent-cat="<?php echo esc_attr( $bugster_cat ); ?>"
					data-need-content="<?php echo ( false === $bugster_portfolio_need_content ? 'true' : 'false' ); ?>"
				>
					<?php
					if ( $bugster_portfolio_need_content ) {
						bugster_show_portfolio_posts(
							array(
								'cat'        => $bugster_id,
								'parent_cat' => $bugster_cat,
								'taxonomy'   => $bugster_taxonomy,
								'post_type'  => $bugster_post_type,
								'page'       => 1,
								'sticky'     => $bugster_sticky_out,
							)
						);
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		bugster_show_portfolio_posts(
			array(
				'cat'        => $bugster_cat,
				'parent_cat' => $bugster_cat,
				'taxonomy'   => $bugster_taxonomy,
				'post_type'  => $bugster_post_type,
				'page'       => 1,
				'sticky'     => $bugster_sticky_out,
			)
		);
	}

	bugster_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
