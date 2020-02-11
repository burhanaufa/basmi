<?php
/**
 * The template to display Admin notices
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.1
 */

$bugster_theme_obj = wp_get_theme();
?>
<div class="bugster_admin_notice bugster_welcome_notice update-nag">
	<?php
	// Theme image
	$bugster_theme_img = bugster_get_file_url( 'screenshot.jpg' );
	if ( '' != $bugster_theme_img ) {
		?>
		<div class="bugster_notice_image"><img src="<?php echo esc_url( $bugster_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'bugster' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="bugster_notice_title">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Welcome to %1$s v.%2$s', 'bugster' ),
				$bugster_theme_obj->name . ( BUGSTER_THEME_FREE ? ' ' . __( 'Free', 'bugster' ) : '' ),
				$bugster_theme_obj->version
			)
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="bugster_notice_text">
		<p class="bugster_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $bugster_theme_obj->description ) );
			?>
		</p>
		<p class="bugster_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Attention! Plugin "ThemeREX Addons" is required! Please, install and activate it!', 'bugster' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="bugster_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=bugster_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Install plugin "ThemeREX Addons"', 'bugster' );
			?>
		</a>
		<?php		
		// Dismiss this notice
		?>
		<a href="#" class="bugster_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="bugster_hide_notice_text"><?php esc_html_e( 'Dismiss', 'bugster' ); ?></span></a>
	</div>
</div>
