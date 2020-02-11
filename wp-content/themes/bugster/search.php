<?php
/**
 * The template for search results with desired blog style
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

// Search page setup
// (uncomment lines with bugster_storage_set_array2() calls if you want to override the relevant settings from Theme Options)

// Blog style:
// Replace last parameter with one of values: excerpt | chess_N | classic_N | masonry_N | portfolio_N | gallery_N
// where N - columns number from 2 to 4 (for chess also available 1 column)
bugster_storage_set_array( 'options_meta', 'blog_style', 'classic_3' );

// Sidebar position:
// Replace last parameter with one of values: none | left | right
bugster_storage_set_array( 'options_meta', 'sidebar_position', 'none' );

get_template_part( apply_filters( 'bugster_filter_get_template_part', 'index' ) );
