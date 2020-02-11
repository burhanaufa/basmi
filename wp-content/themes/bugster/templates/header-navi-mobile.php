<?php
/**
 * The template to show mobile menu
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */
?>
<div class="menu_mobile_overlay"></div>
<div class="menu_mobile menu_mobile_<?php echo esc_attr( bugster_get_theme_option( 'menu_mobile_fullscreen' ) > 0 ? 'fullscreen' : 'narrow' ); ?> scheme_dark">
	<div class="menu_mobile_inner">
		<a class="menu_mobile_close icon-cancel"></a>
		<?php

		// Logo
		set_query_var( 'bugster_logo_args', array( 'type' => 'mobile' ) );
		get_template_part( apply_filters( 'bugster_filter_get_template_part', 'templates/header-logo' ) );
		set_query_var( 'bugster_logo_args', array() );

		// Mobile menu
		$bugster_menu_mobile = bugster_get_nav_menu( 'menu_mobile' );
		if ( empty( $bugster_menu_mobile ) ) {
			$bugster_menu_mobile = apply_filters( 'bugster_filter_get_mobile_menu', '' );
			if ( empty( $bugster_menu_mobile ) ) {
				$bugster_menu_mobile = bugster_get_nav_menu( 'menu_main' );
				if ( empty( $bugster_menu_mobile ) ) {
					$bugster_menu_mobile = bugster_get_nav_menu();
				}
			}
		}
		if ( ! empty( $bugster_menu_mobile ) ) {
			$bugster_menu_mobile = str_replace(
				array( 'menu_main',   'id="menu-',        'sc_layouts_menu_nav', 'sc_layouts_menu ', 'sc_layouts_hide_on_mobile', 'hide_on_mobile' ),
				array( 'menu_mobile', 'id="menu_mobile-', '',                    ' ',                '',                          '' ),
				$bugster_menu_mobile
			);
			if ( strpos( $bugster_menu_mobile, '<nav ' ) === false ) {
				$bugster_menu_mobile = sprintf( '<nav class="menu_mobile_nav_area" itemscope itemtype="http://schema.org/SiteNavigationElement">%s</nav>', $bugster_menu_mobile );
			}
			bugster_show_layout( apply_filters( 'bugster_filter_menu_mobile_layout', $bugster_menu_mobile ) );
		}

		// Search field
		do_action(
			'bugster_action_search',
			array(
				'style' => 'normal',
				'class' => 'search_mobile',
				'ajax'  => false
			)
		);

		// Social icons
		bugster_show_layout( bugster_get_socials_links(), '<div class="socials_mobile">', '</div>' );
		?>
	</div>
</div>
