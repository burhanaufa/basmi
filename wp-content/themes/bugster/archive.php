<?php
/**
 * The template file to display taxonomies archive
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.57
 */

// Redirect to the template page (if exists) for output current taxonomy
if ( is_category() || is_tag() || is_tax() ) {
	$bugster_term = get_queried_object();
	global $wp_query;
	if ( ! empty( $bugster_term->taxonomy ) && ! empty( $wp_query->posts[0]->post_type ) ) {
		$bugster_taxonomy  = bugster_get_post_type_taxonomy( $wp_query->posts[0]->post_type );
		if ( $bugster_taxonomy == $bugster_term->taxonomy ) {
			$bugster_template_page_id = bugster_get_template_page_id( array(
				'post_type'  => $wp_query->posts[0]->post_type,
				'parent_cat' => $bugster_term->term_id
			) );
			if ( 0 < $bugster_template_page_id ) {
				wp_safe_redirect( get_permalink( $bugster_template_page_id ) );
				exit;
			}
		}
	}
}
// If template page is not exists - display default blog archive template
get_template_part( apply_filters( 'bugster_filter_get_template_part', bugster_blog_archive_get_template() ) );
