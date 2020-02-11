<?php
/**
 * The template 'Style 2' to displaying related posts
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

$bugster_link        = get_permalink();
$bugster_post_format = get_post_format();
$bugster_post_format = empty( $bugster_post_format ) ? 'standard' : str_replace( 'post-format-', '', $bugster_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item post_format_' . esc_attr( $bugster_post_format ) ); ?>>
	<?php
	bugster_show_post_featured(
		array(
			'thumb_size'    => apply_filters( 'bugster_filter_related_thumb_size', bugster_get_thumb_size( (int) bugster_get_theme_option( 'related_posts' ) == 1 ? 'huge' : 'big' ) ),
			'show_no_image' => bugster_get_no_image() != '',
		)
	);
	?>
	<div class="post_header entry-header">
		<?php
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			?>
			<div class="post_meta_wrap"><?php
				$bugster_components = bugster_array_get_keys_by_value( bugster_get_theme_option( 'meta_parts' ) );
				$bugster_components_arr = explode(',', $bugster_components);
				$bugster_post_meta3 = (in_array('categories',$bugster_components_arr) ? 'categories,' : '')
										. (in_array('date',$bugster_components_arr) ? 'date,' : '');

				if ( ! empty( $bugster_components ) ) {
					bugster_show_post_meta(
						apply_filters(
							'bugster_filter_post_meta_args', array(
								'components' => $bugster_post_meta3,
								'seo'        => false,
							), 'excerpt', 1
						)
					);
				}
			?></div>
			<?php
		}
		?>
		<h4 class="post_title entry-title"><a href="<?php echo esc_url( $bugster_link ); ?>"><?php the_title(); ?></a></h4>
	</div>
</div>
