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
<div class="bugster_admin_notice bugster_rate_notice update-nag">
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
	<h3 class="bugster_notice_title"><a href="<?php echo esc_url( bugster_storage_get( 'theme_rate_url' ) ); ?>" target="_blank">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Rate our theme "%s", please', 'bugster' ),
				$bugster_theme_obj->name . ( BUGSTER_THEME_FREE ? ' ' . __( 'Free', 'bugster' ) : '' )
			)
		);
		?>
	</a></h3>
	<?php

	// Description
	?>
	<div class="bugster_notice_text">
		<p><?php echo wp_kses_data( __( 'We are glad you chose our WP theme for your website. You have done well customizing your website and we hope that you have enjoyed working with our theme.', 'bugster' ) ); ?></p>
		<p><?php echo wp_kses_data( __( 'It would be just awesome if you spend just a minute of your time to rate our theme or the customer service you have received from us.', 'bugster' ) ); ?></p>
		<p class="bugster_notice_text_info"><?php echo wp_kses_data( __( '* We love receiving your reviews! Every time you leave a review, our CEO Henry Rise gives $5 to homeless dog shelter! Save the planet with us!', 'bugster' ) ); ?></p>
	</div>
	<?php

	// Buttons
	?>
	<div class="bugster_notice_buttons">
		<?php
		// Link to the theme download page
		?>
		<a href="<?php echo esc_url( bugster_storage_get( 'theme_rate_url' ) ); ?>" class="button button-primary" target="_blank"><i class="dashicons dashicons-star-filled"></i> 
			<?php
			// Translators: Add theme name
			echo esc_html( sprintf( __( 'Rate theme %s', 'bugster' ), $bugster_theme_obj->name ) );
			?>
		</a>
		<?php
		// Link to the theme support
		?>
		<a href="<?php echo esc_url( bugster_storage_get( 'theme_support_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-sos"></i> 
			<?php
			esc_html_e( 'Support', 'bugster' );
			?>
		</a>
		<?php
		// Link to the theme documentation
		?>
		<a href="<?php echo esc_url( bugster_storage_get( 'theme_doc_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-book"></i> 
			<?php
			esc_html_e( 'Documentation', 'bugster' );
			?>
		</a>
		<?php
		// Dismiss
		?>
		<a href="#" class="bugster_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="bugster_hide_notice_text"><?php esc_html_e( 'Dismiss', 'bugster' ); ?></span></a>
	</div>
</div>
