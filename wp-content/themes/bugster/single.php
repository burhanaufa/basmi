<?php
/**
 * The template to display single post
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

get_header();

while ( have_posts() ) {
	the_post();

	// Prepare theme-specific vars:

	// Position of the related posts
	$bugster_related_position = bugster_get_theme_option( 'related_position' );

	// Type of the prev/next posts navigation
	$bugster_posts_navigation = bugster_get_theme_option( 'posts_navigation' );
	if ( 'scroll' == $bugster_posts_navigation ) {
		$bugster_prev_post = get_previous_post( true );         // Get post from same category
		if ( ! $bugster_prev_post ) {
			$bugster_prev_post = get_previous_post( false );    // Get post from any category
			if ( ! $bugster_prev_post ) {
				$bugster_posts_navigation = 'links';
			}
		}
		// Override some theme options to display featured image, title and post meta in the dynamic loaded posts
		if ( $bugster_prev_post && bugster_get_value_gp( 'action' ) == 'prev_post_loading' ) {
			bugster_storage_set_array( 'options_meta', 'post_thumbnail_type', 'default' );
			if ( bugster_get_theme_option( 'post_header_position' ) != 'below' ) {
				bugster_storage_set_array( 'options_meta', 'post_header_position', 'above' );
			}
			bugster_sc_layouts_showed( 'featured', false );
			bugster_sc_layouts_showed( 'title', false );
			bugster_sc_layouts_showed( 'postmeta', false );
		}
	}

	// If related posts should be inside the content
	if ( strpos( $bugster_related_position, 'inside' ) === 0 ) {
		ob_start();
	}

	// Display post's content
	get_template_part( apply_filters( 'bugster_filter_get_template_part', 'content', get_post_format() ), get_post_format() );

	// If related posts should be inside the content
	if ( strpos( $bugster_related_position, 'inside' ) === 0 ) {
		$bugster_content = ob_get_contents();
		ob_end_clean();

		ob_start();
		do_action( 'bugster_action_related_posts' );
		$bugster_related_content = ob_get_contents();
		ob_end_clean();

		$bugster_related_position_inside = max( 0, min( 9, bugster_get_theme_option( 'related_position_inside' ) ) );
		if ( 0 == $bugster_related_position_inside ) {
			$bugster_related_position_inside = mt_rand( 1, 9 );
		}
		
		$bugster_p_number = 0;
		$bugster_related_inserted = false;
		for ( $i = 0; $i < strlen( $bugster_content ) - 3; $i++ ) {
			if ( $bugster_content[ $i ] == '<' && $bugster_content[ $i + 1 ] == 'p' && in_array( $bugster_content[ $i + 2 ], array( '>', ' ' ) ) ) {
				$bugster_p_number++;
				if ( $bugster_related_position_inside == $bugster_p_number ) {
					$bugster_related_inserted = true;
					$bugster_content = ( $i > 0 ? substr( $bugster_content, 0, $i ) : '' )
										. $bugster_related_content
										. substr( $bugster_content, $i );
				}
			}
		}
		if ( ! $bugster_related_inserted ) {
			$bugster_content .= $bugster_related_content;
		}

		bugster_show_layout( $bugster_content );
	}

	// Author bio
	if ( bugster_get_theme_option( 'show_author_info' ) == 1
		&& ! is_attachment()
		&& get_the_author_meta( 'description' )
		&& ( 'scroll' != $bugster_posts_navigation || bugster_get_theme_option( 'posts_navigation_scroll_hide_author' ) == 0 )
	) {
		do_action( 'bugster_action_before_post_author' );
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'templates/author-bio' ) );
		do_action( 'bugster_action_after_post_author' );
	}

	// Related posts
	if ( 'below_content' == $bugster_related_position && ( 'scroll' != $bugster_posts_navigation || bugster_get_theme_option( 'posts_navigation_scroll_hide_related' ) == 0 ) ) {
		do_action( 'bugster_action_related_posts' );
	}

	// If comments are open or we have at least one comment, load up the comment template.
	if ( ( comments_open() || get_comments_number() ) && ( 'scroll' != $bugster_posts_navigation || bugster_get_theme_option( 'posts_navigation_scroll_hide_comments' ) == 0 ) ) {
		do_action( 'bugster_action_before_comments' );
		comments_template();
		do_action( 'bugster_action_after_comments' );
	}

	if ( 'scroll' == $bugster_posts_navigation ) {
		?>
		<div class="nav-links-single-scroll"
			data-post-id="<?php echo esc_attr( get_the_ID( $bugster_prev_post ) ); ?>"
			data-post-link="<?php echo esc_attr( get_permalink( $bugster_prev_post ) ); ?>"
			data-post-title="<?php echo esc_attr( get_the_title( $bugster_prev_post ) ); ?>">
		</div>
		<?php
	}
}

get_footer();
