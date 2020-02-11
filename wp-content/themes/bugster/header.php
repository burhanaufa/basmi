<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js
									<?php
										// Class scheme_xxx need in the <html> as context for the <body>!
										echo ' scheme_' . esc_attr( bugster_get_theme_option( 'color_scheme' ) );
									?>
										">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>

	<?php do_action( 'bugster_action_before_body' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">
			<?php
			// Desktop header
			$bugster_header_type = bugster_get_theme_option( 'header_type' );
			if ( 'custom' == $bugster_header_type && ! bugster_is_layouts_available() ) {
				$bugster_header_type = 'default';
			}
			get_template_part( apply_filters( 'bugster_filter_get_template_part', "templates/header-{$bugster_header_type}" ) );

			// Side menu
			if ( in_array( bugster_get_theme_option( 'menu_style' ), array( 'left', 'right' ) ) ) {
				get_template_part( apply_filters( 'bugster_filter_get_template_part', 'templates/header-navi-side' ) );
			}

			// Mobile menu
			get_template_part( apply_filters( 'bugster_filter_get_template_part', 'templates/header-navi-mobile' ) );
			
			// Single posts banner after header
			bugster_show_post_banner( 'header' );
			?>

			<div class="page_content_wrap">
				<?php
				// Single posts banner on the background
				if ( is_singular( 'post' ) || is_singular( 'attachment' ) ) {

					bugster_show_post_banner( 'background' );

					$bugster_post_thumbnail_type  = bugster_get_theme_option( 'post_thumbnail_type' );
					$bugster_post_header_position = bugster_get_theme_option( 'post_header_position' );
					$bugster_post_header_align    = bugster_get_theme_option( 'post_header_align' );

					// Boxed post thumbnail
					if ( in_array( $bugster_post_thumbnail_type, array( 'boxed', 'fullwidth') ) ) {
						ob_start();
						?>
						<div class="header_content_wrap header_align_<?php echo esc_attr( $bugster_post_header_align ); ?>">
							<?php
							if ( 'boxed' === $bugster_post_thumbnail_type ) {
								?>
								<div class="content_wrap">
								<?php
							}

							// Post title and meta
							if ( 'above' === $bugster_post_header_position ) {
								bugster_show_post_title_and_meta();
							}

							// Featured image
							bugster_show_post_featured_image();

							// Post title and meta
							if ( in_array( $bugster_post_header_position, array( 'under', 'on_thumb' ) ) ) {
								bugster_show_post_title_and_meta();
							}

							if ( 'boxed' === $bugster_post_thumbnail_type ) {
								?>
								</div>
								<?php
							}
							?>
						</div>
						<?php
						$bugster_post_header = ob_get_contents();
						ob_end_clean();
						if ( strpos( $bugster_post_header, 'post_featured' ) !== false || strpos( $bugster_post_header, 'post_title' ) !== false ) {
							bugster_show_layout( $bugster_post_header );
						}
					}
				}

				// Widgets area above page content
				$bugster_body_style   = bugster_get_theme_option( 'body_style' );
				$bugster_widgets_name = bugster_get_theme_option( 'widgets_above_page' );
				$bugster_show_widgets = ! bugster_is_off( $bugster_widgets_name ) && is_active_sidebar( $bugster_widgets_name );
				if ( $bugster_show_widgets ) {
					if ( 'fullscreen' != $bugster_body_style ) {
						?>
						<div class="content_wrap">
							<?php
					}
					bugster_create_widgets_area( 'widgets_above_page' );
					if ( 'fullscreen' != $bugster_body_style ) {
						?>
						</div><!-- </.content_wrap> -->
						<?php
					}
				}

				// Content area
				if ( 'fullscreen' != $bugster_body_style ) {
					?>
					<div class="content_wrap">
						<?php
				}
				?>

				<div class="content">
					<?php
					// Widgets area inside page content
					bugster_create_widgets_area( 'widgets_above_content' );
