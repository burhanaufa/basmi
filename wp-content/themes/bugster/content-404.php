<article <?php post_class( 'post_item_single post_item_404' ); ?>>
	<div class="post_content">
		<h1 class="page_title"><?php esc_html_e( '4', 'bugster' ); ?><span></span><?php esc_html_e( '4', 'bugster' ); ?></h1>
		<div class="page_info">
			<?php 
				$x = get_bloginfo('name'); 
			?>
			<h1 class="page_subtitle"><?php echo esc_html($x) ?><?php esc_html_e( ' is out there', 'bugster' ); ?></h1>
			<p class="page_description"><?php echo wp_kses_post( esc_html__( "We're sorry, but something went wrong.", 'bugster' ) ); ?></p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="go_home theme_button"><?php esc_html_e( 'Homepage', 'bugster' ); ?></a>
		</div>
	</div>
</article>
