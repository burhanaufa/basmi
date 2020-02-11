<?php
/**
 * Generate custom CSS for theme hovers
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

// Theme init priorities:
// 3 - add/remove Theme Options elements
if ( ! function_exists( 'bugster_hovers_theme_setup3' ) ) {
	add_action( 'after_setup_theme', 'bugster_hovers_theme_setup3', 3 );
	function bugster_hovers_theme_setup3() {

		// Add 'Buttons hover' option
		bugster_storage_set_array_after(
			'options', 'border_radius', array(
				'button_hover' => array(
					'title'   => esc_html__( "Button's hover", 'bugster' ),
					'desc'    => wp_kses_data( __( 'Select hover effect to decorate all theme buttons', 'bugster' ) ),
					'std'     => 'slide_left',
					'options' => array(
						'slide_left'   => esc_html__( 'Slide from Left', 'bugster' ),
					),
					'type'    => 'select',
				),
				'image_hover'  => array(
					'title'    => esc_html__( "Image's hover", 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select hover effect to decorate all theme images', 'bugster' ) ),
					'std'      => 'icon',
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'options'  => bugster_get_list_hovers(),
					'type'     => 'select',
				),
			)
		);
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'bugster_hovers_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'bugster_hovers_theme_setup9', 9 );
	function bugster_hovers_theme_setup9() {
		add_action( 'wp_enqueue_scripts', 'bugster_hovers_frontend_scripts', 1010 );
		add_action( 'wp_enqueue_scripts', 'bugster_hovers_frontend_styles', 1100 );
		add_action( 'wp_enqueue_scripts', 'bugster_hovers_responsive_styles', 2000 );
		add_filter( 'bugster_filter_localize_script', 'bugster_hovers_localize_script' );
		add_filter( 'bugster_filter_merge_scripts', 'bugster_hovers_merge_scripts' );
		add_filter( 'bugster_filter_merge_styles', 'bugster_hovers_merge_styles' );
		add_filter( 'bugster_filter_merge_styles_responsive', 'bugster_hovers_merge_styles_responsive' );
		add_filter( 'bugster_filter_get_css', 'bugster_hovers_get_css', 10, 2 );
	}
}

// Enqueue hover styles and scripts
if ( ! function_exists( 'bugster_hovers_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'bugster_hovers_frontend_scripts', 1010 );
	function bugster_hovers_frontend_scripts() {
		if ( bugster_is_on( bugster_get_theme_option( 'debug_mode' ) ) ) {
			$bugster_url = bugster_get_file_url( 'theme-specific/theme-hovers/theme-hovers.js' );
			if ( '' != $bugster_url ) {
				wp_enqueue_script( 'bugster-hovers', $bugster_url, array( 'jquery' ), null, true );
			}
		}
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'bugster_hovers_frontend_styles' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'bugster_hovers_frontend_styles', 1100 );
	function bugster_hovers_frontend_styles() {
		if ( bugster_is_on( bugster_get_theme_option( 'debug_mode' ) ) ) {
			$bugster_url = bugster_get_file_url( 'theme-specific/theme-hovers/theme-hovers.css' );
			if ( '' != $bugster_url ) {
				wp_enqueue_style( 'bugster-hovers', $bugster_url, array(), null );
			}
		}
	}
}

// Enqueue responsive styles for frontend
if ( ! function_exists( 'bugster_hovers_responsive_styles' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'bugster_hovers_responsive_styles', 2000 );
	function bugster_hovers_responsive_styles() {
		if ( bugster_is_on( bugster_get_theme_option( 'debug_mode' ) ) ) {
			$bugster_url = bugster_get_file_url( 'theme-specific/theme-hovers/theme-hovers-responsive.css' );
			if ( '' != $bugster_url ) {
				wp_enqueue_style( 'bugster-hovers-responsive', $bugster_url, array(), null );
			}
		}
	}
}

// Merge hover effects into single css
if ( ! function_exists( 'bugster_hovers_merge_styles' ) ) {
	//Handler of the add_filter( 'bugster_filter_merge_styles', 'bugster_hovers_merge_styles' );
	function bugster_hovers_merge_styles( $list ) {
		$list[] = 'theme-specific/theme-hovers/theme-hovers.css';
		return $list;
	}
}

// Merge hover effects to the single css (responsive)
if ( ! function_exists( 'bugster_hovers_merge_styles_responsive' ) ) {
	//Handler of the add_filter( 'bugster_filter_merge_styles_responsive', 'bugster_hovers_merge_styles_responsive' );
	function bugster_hovers_merge_styles_responsive( $list ) {
		$list[] = 'theme-specific/theme-hovers/theme-hovers-responsive.css';
		return $list;
	}
}

// Add hover effect's vars to the localize array
if ( ! function_exists( 'bugster_hovers_localize_script' ) ) {
	//Handler of the add_filter( 'bugster_filter_localize_script','bugster_hovers_localize_script' );
	function bugster_hovers_localize_script( $arr ) {
		$arr['button_hover'] = bugster_get_theme_option( 'button_hover' );
		return $arr;
	}
}

// Merge hover effects to the single js
if ( ! function_exists( 'bugster_hovers_merge_scripts' ) ) {
	//Handler of the add_filter( 'bugster_filter_merge_scripts', 'bugster_hovers_merge_scripts' );
	function bugster_hovers_merge_scripts( $list ) {
		$list[] = 'theme-specific/theme-hovers/theme-hovers.js';
		return $list;
	}
}

// Add hover icons on the featured image
if ( ! function_exists( 'bugster_hovers_add_icons' ) ) {
	function bugster_hovers_add_icons( $hover, $args = array() ) {

		// Additional parameters
		$args = array_merge(
			array(
				'cat'      => '',
				'image'    => null,
				'no_links' => false,
				'link'     => '',
			), $args
		);

		$post_link = empty( $args['no_links'] )
						? ( ! empty( $args['link'] )
							? $args['link']
							: get_permalink()
							)
						: '';
		$no_link   = 'javascript:void(0)';
		$target    = ! empty( $post_link ) && false === strpos( $post_link, home_url() )
						? ' target="_blank" rel="nofollow"'
						: '';

		if ( in_array( $hover, array( 'icons', 'zoom' ) ) ) {
			// Hover style 'Icons and 'Zoom'
			if ( $args['image'] ) {
				$large_image = $args['image'];
			} else {
				$attachment = wp_get_attachment_image_src( get_post_thumbnail_id(), 'masonry-big' );
				if ( ! empty( $attachment[0] ) ) {
					$large_image = $attachment[0];
				}
			}
			?>
			<div class="icons">
				<a href="<?php echo ! empty( $post_link ) ? esc_url( $post_link ) : $no_link; ?>" <?php bugster_show_layout($target); ?> aria-hidden="true" class="icon-link
									<?php
									if ( empty( $large_image ) ) {
										echo ' single_icon';}
									?>
				"></a>
				<?php if ( ! empty( $large_image ) ) { ?>
				<a href="<?php echo esc_url( $large_image ); ?>" aria-hidden="true" class="icon-search" title="<?php echo esc_attr( get_the_title() ); ?>"></a>
				<?php } ?>
			</div>
			<?php

		} elseif ( 'shop' == $hover || 'shop_buttons' == $hover ) {
			// Hover style 'Shop'
			global $product;
			?>
			<div class="icons">
				<?php
				if ( ! is_object( $args['cat'] ) ) {
					bugster_show_layout(
						apply_filters(
							'woocommerce_loop_add_to_cart_link',
							'<a rel="nofollow" href="' . esc_url( $product->add_to_cart_url() ) . '" 
														aria-hidden="true" 
														data-quantity="1" 
														data-product_id="' . esc_attr( $product->is_type( 'variation' ) ? $product->get_parent_id() : $product->get_id() ) . '"
														data-product_sku="' . esc_attr( $product->get_sku() ) . '"
														class="shop_cart icon-cart-2 button add_to_cart_button'
																. ' product_type_' . $product->get_type()
																. ' product_' . ( $product->is_purchasable() && $product->is_in_stock() ? 'in' : 'out' ) . '_stock'
																. ( $product->supports( 'ajax_add_to_cart' ) ? ' ajax_add_to_cart' : '' )
																. '">'
											. ( 'shop_buttons' == $hover ? ( $product->is_type( 'variable' ) ? esc_html__( 'Select options', 'bugster' ) : esc_html__( 'Buy now', 'bugster' ) ) : '' )
										. '</a>',
							$product
						)
					);
				}
				?>
			</div>
			<?php

		} elseif ( 'icon' == $hover ) {
			// Hover style 'Icon'
			?>
			<div class="icons"><a href="<?php echo ! empty( $post_link ) ? esc_url( $post_link ) : $no_link; ?>" <?php bugster_show_layout($target); ?> aria-hidden="true" class="icon-iconmonstr-plus-2"></a></div>
			<?php

		} elseif ( 'dots' == $hover ) {
			// Hover style 'Dots'
			?>
			<a href="<?php echo ! empty( $post_link ) ? esc_url( $post_link ) : $no_link; ?>" <?php bugster_show_layout($target); ?> aria-hidden="true" class="icons"><span></span><span></span><span></span></a>
			<?php

		} elseif ( in_array( $hover, array( 'fade', 'pull', 'slide', 'border' ) ) ) {
			// Hover style 'Fade', 'Slide', 'Pull', 'Border'
			?>
			<div class="post_info">
				<div class="post_info_back">
					<h4 class="post_title">
					<?php
					if ( ! empty( $post_link ) ) {
						?>
							<a href="<?php echo esc_url( $post_link ); ?>" <?php bugster_show_layout($target); ?>>
							<?php
					}
						the_title();
					if ( ! empty( $post_link ) ) {
						?>
							</a>
							<?php
					}
					?>
					</h4>
					<div class="post_descr">
						<?php
						$bugster_components = bugster_array_get_keys_by_value( bugster_get_theme_option( 'meta_parts' ) );
						if ( ! empty( $bugster_components ) ) {
							bugster_show_post_meta(
								apply_filters(
									'bugster_filter_post_meta_args', array(
										'components' => $bugster_components,
										'seo'        => false,
										'echo'       => true,
									), 'hover_' . $hover, 1
								)
							);
						}
						// Remove the condition below if you want display excerpt
						if ( false ) {
							?>
							<div class="post_excerpt"><?php the_excerpt(); ?></div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
			<?php

		} elseif ( ! empty( $post_link ) ) {
			// Hover style empty
			?>
			<a href="<?php echo esc_url( $post_link ); ?>" <?php bugster_show_layout($target); ?> aria-hidden="true" class="icons"></a>
			<?php
		}
	}
}

// Add styles into CSS
if ( ! function_exists( 'bugster_hovers_get_css' ) ) {
	//Handler of the add_filter( 'bugster_filter_get_css', 'bugster_hovers_get_css', 10, 2 );
	function bugster_hovers_get_css( $css, $args ) {

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

/* ================= BUTTON'S HOVERS ==================== */

/* Slide */
.sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; }

.post_item .sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['text_link']} 50%, {$colors['text_hover']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_hover']} !important; }
.post_item.sticky .sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['extra_dark']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; }
.sc_services_list .sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['text_link']} 50%, {$colors['text_hover']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_hover']} !important; }
.content .widget.wp-widget-search input[type="submit"].sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['extra_dark']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; }


.sc_button_hover_slide_right {  background: linear-gradient(to left,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link']} !important; }
.sc_button_hover_slide_top {	background: linear-gradient(to bottom,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link']} !important; }
.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link']} !important; }

input[type="submit"][disabled].sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['text_light']} 50%, {$colors['text_light']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_light']} !important; }

.sc_button_hover_style_link2.sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['text']} 50%, {$colors['text_link2']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link2']} !important; }
.sc_button_hover_style_link2.sc_button_hover_slide_right {  background: linear-gradient(to left,	{$colors['text_hover2']} 50%, {$colors['text_link2']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link2']} !important; }
.sc_button_hover_style_link2.sc_button_hover_slide_top {	background: linear-gradient(to bottom,	{$colors['text_hover2']} 50%, {$colors['text_link2']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link2']} !important; }
.sc_button_hover_style_link2.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['text_hover2']} 50%, {$colors['text_link2']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link2']} !important; }

.sc_button_hover_style_link3.sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['text_hover3']} 50%, {$colors['text_link3']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link3']} !important; }
.sc_button_hover_style_link3.sc_button_hover_slide_right {  background: linear-gradient(to left,	{$colors['text_hover3']} 50%, {$colors['text_link3']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link3']} !important; }
.sc_button_hover_style_link3.sc_button_hover_slide_top {	background: linear-gradient(to bottom,	{$colors['text_hover3']} 50%, {$colors['text_link3']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link3']} !important; }
.sc_button_hover_style_link3.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['text_hover3']} 50%, {$colors['text_link3']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link3']} !important; }

.sc_button_hover_style_dark.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['text_link']} 50%, {$colors['text_dark']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_dark']} !important; }

.slider_controls_wrap .sc_button_hover_style_dark.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['text_dark']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; }

.sc_button_hover_style_dark.sc_button_hover_slide_right {		background: linear-gradient(to left,	{$colors['text_link']} 50%, {$colors['text_dark']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_dark']} !important; }
.sc_button_hover_style_dark.sc_button_hover_slide_top {			background: linear-gradient(to bottom,	{$colors['text_link']} 50%, {$colors['text_dark']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_dark']} !important; }
.sc_button_hover_style_dark.sc_button_hover_slide_bottom {		background: linear-gradient(to top,		{$colors['text_link']} 50%, {$colors['text_dark']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_dark']} !important; }

.sc_button_hover_style_light.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['text_link']} 50%, {$colors['text_light']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_light']} !important; }
.sc_button_hover_style_light.sc_button_hover_slide_right {		background: linear-gradient(to left,	{$colors['text_link']} 50%, {$colors['text_light']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_light']} !important; }
.sc_button_hover_style_light.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['text_link']} 50%, {$colors['text_light']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_light']} !important; }
.sc_button_hover_style_light.sc_button_hover_slide_bottom {		background: linear-gradient(to top,		{$colors['text_link']} 50%, {$colors['text_light']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_light']} !important; }

.sc_button_hover_style_inverse.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['inverse_link']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; }
.sc_button_hover_style_inverse.sc_button_hover_slide_right {	background: linear-gradient(to left,	{$colors['inverse_link']} 50%, {$colors['text_link']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link']} !important; }
.sc_button_hover_style_inverse.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['inverse_link']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link']} !important; }
.sc_button_hover_style_inverse.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['inverse_link']} 50%, {$colors['text_link']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link']} !important; }

.sc_button_hover_style_hover.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; }
.sc_button_hover_style_hover.sc_button_hover_slide_right {		background: linear-gradient(to left,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link']} !important; }
.sc_button_hover_style_hover.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link']} !important; }
.sc_button_hover_style_hover.sc_button_hover_slide_bottom {		background: linear-gradient(to top,		{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link']} !important; }

.sc_button_hover_style_alter.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['alter_dark']} 50%, {$colors['alter_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['alter_link']} !important; }
.sc_button_hover_style_alter.sc_button_hover_slide_right {		background: linear-gradient(to left,	{$colors['alter_dark']} 50%, {$colors['alter_link']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['alter_link']} !important; }
.sc_button_hover_style_alter.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['alter_dark']} 50%, {$colors['alter_link']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['alter_link']} !important; }
.sc_button_hover_style_alter.sc_button_hover_slide_bottom {		background: linear-gradient(to top,		{$colors['alter_dark']} 50%, {$colors['alter_link']} 50%) no-repeat scroll right top / 100% 210% {$colors['alter_link']} !important; }

.sc_button_hover_style_alterbd.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['alter_link']} 50%, {$colors['text_dark']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_dark']} !important; }
.sc_button_hover_style_alterbd.sc_button_hover_slide_right {	background: linear-gradient(to left,	{$colors['alter_link']} 50%, {$colors['alter_bd_color']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['alter_bd_color']} !important; }
.sc_button_hover_style_alterbd.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['alter_link']} 50%, {$colors['alter_bd_color']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['alter_bd_color']} !important; }
.sc_button_hover_style_alterbd.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['alter_link']} 50%, {$colors['alter_bd_color']} 50%) no-repeat scroll right top / 100% 210% {$colors['alter_bd_color']} !important; }

.sc_button_hover_style_extra.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['text_link']} 50%, {$colors['text_hover2']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_hover2']} !important; }
.sc_button_hover_style_extra.sc_button_hover_slide_right {		background: linear-gradient(to left,	{$colors['extra_link']} 50%, {$colors['extra_bg_color']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['extra_bg_color']} !important; }
.sc_button_hover_style_extra.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['extra_link']} 50%, {$colors['extra_bg_color']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['extra_bg_color']} !important; }
.sc_button_hover_style_extra.sc_button_hover_slide_bottom {		background: linear-gradient(to top,		{$colors['extra_link']} 50%, {$colors['extra_bg_color']} 50%) no-repeat scroll right top / 100% 210% {$colors['extra_bg_color']} !important; }

.sc_button_hover_style_alter.sc_button_hover_slide_left:hover,
.sc_button_hover_style_alter.sc_button_hover_slide_right:hover,
.sc_button_hover_style_alter.sc_button_hover_slide_top:hover,
.sc_button_hover_style_alter.sc_button_hover_slide_bottom:hover  {	color: {$colors['bg_color']} !important; }

.sc_button_hover_style_extra.sc_button_hover_slide_left {	color: {$colors['inverse_link']} !important; }
.sc_button_hover_style_link2.sc_button_hover_slide_left,
.sc_button_hover_style_link3.sc_button_hover_slide_left { 
	color: {$colors['inverse_link']} !important; 
}
.sc_button_hover_style_link3.sc_button_hover_slide_left:hover {
	background-position: left bottom !important; color: {$colors['text_dark']} !important; }
}

.sc_button_hover_style_extra.sc_button_hover_slide_left:hover,
.sc_button_hover_style_extra.sc_button_hover_slide_right:hover,
.sc_button_hover_style_extra.sc_button_hover_slide_top:hover,
.sc_button_hover_style_extra.sc_button_hover_slide_bottom:hover  {	color: {$colors['text_dark']} !important; }

.sc_button_hover_slide_left:hover,
.sc_button_hover_slide_left.active,
.ui-state-active .sc_button_hover_slide_left,
.vc_active .sc_button_hover_slide_left,
.vc_tta-accordion .vc_tta-panel-title:hover .sc_button_hover_slide_left,
li.active .sc_button_hover_slide_left {		background-position: left bottom !important; color: {$colors['bg_color']} !important; }

.post_item .sc_button_hover_slide_left:hover {		background-position: left bottom !important; color: {$colors['text_dark']} !important; }
.post_item.sticky .sc_button_hover_slide_left:hover {		background-position: left bottom !important; color: {$colors['text_dark']} !important; }
.sc_button_hover_style_dark.sc_button_hover_slide_left:hover {		background-position: left bottom !important; color: {$colors['text_dark']} !important; }
.slider_controls_wrap .sc_button_hover_style_dark.sc_button_hover_slide_left:hover {		background-position: left bottom !important; color: {$colors['bg_color']} !important; }
.sc_services_list .sc_button_hover_slide_left:hover {		background-position: left bottom !important; color: {$colors['text_dark']} !important; }
.content .widget.wp-widget-search input[type="submit"].sc_button_hover_slide_left:hover {		background-position: left bottom !important; color: {$colors['text_dark']} !important; }

.sc_button_hover_slide_right:hover,
.sc_button_hover_slide_right.active,
.ui-state-active .sc_button_hover_slide_right,
.vc_active .sc_button_hover_slide_right,
.vc_tta-accordion .vc_tta-panel-title:hover .sc_button_hover_slide_right,
li.active .sc_button_hover_slide_right {	background-position: right bottom !important; color: {$colors['bg_color']} !important; }

.sc_button_hover_slide_top:hover,
.sc_button_hover_slide_top.active,
.ui-state-active .sc_button_hover_slide_top,
.vc_active .sc_button_hover_slide_top,
.vc_tta-accordion .vc_tta-panel-title:hover .sc_button_hover_slide_top,
li.active .sc_button_hover_slide_top {		background-position: right top !important; color: {$colors['bg_color']} !important; }

.sc_button_hover_slide_bottom:hover,
.sc_button_hover_slide_bottom.active,
.ui-state-active .sc_button_hover_slide_bottom,
.vc_active .sc_button_hover_slide_bottom,
.vc_tta-accordion .vc_tta-panel-title:hover .sc_button_hover_slide_bottom,
li.active .sc_button_hover_slide_bottom {	background-position: right bottom !important; color: {$colors['bg_color']} !important; }


/* ================= IMAGE'S HOVERS ==================== */

/* Dots */
.post_featured.hover_dots .icons span {
	background-color: {$colors['text_link']};
}
.post_featured.hover_dots .post_info {
	color: {$colors['bg_color']};
}

/* Icon */
.post_featured.hover_icon .icons a {
	color: {$colors['inverse_text']};
}
.post_featured.hover_icon a:hover {
	color: {$colors['text_link']};
}

/* Icon and Icons */
.post_featured.hover_icons .icons a {
	color: {$colors['text_dark']};
	background-color: {$colors['bg_color_07']};
}
.post_featured.hover_icons a:hover {
	color: {$colors['text_link']};
	background-color: {$colors['bg_color']};
}

/* Fade */
.post_featured.hover_fade .post_info,
.post_featured.hover_fade .post_info a,
.post_featured.hover_fade .post_info .post_meta_item {
	color: {$colors['inverse_link']};
}
.post_featured.hover_fade .post_info a:hover {
	color: {$colors['text_link']};
}

/* Slide */
.post_featured.hover_slide .post_info,
.post_featured.hover_slide .post_info a,
.post_featured.hover_slide .post_info .post_meta_item {
	color: {$colors['inverse_link']};
}
.post_featured.hover_slide .post_info a:hover {
	color: {$colors['text_link']};
}
.post_featured.hover_slide .post_info .post_title:after {
	background-color: {$colors['inverse_link']};
}

/* Pull */
.post_featured.hover_pull {
	background-color: {$colors['extra_bg_color']};
}
.post_featured.hover_pull .post_info,
.post_featured.hover_pull .post_info a,
.post_featured.hover_pull .post_info a:before {
	color: {$colors['extra_dark']};
}
.post_featured.hover_pull .post_info a:hover,
.post_featured.hover_pull .post_info a:hover:before {
	color: {$colors['extra_link']};
}

/* Border */
.post_featured.hover_border .post_info,
.post_featured.hover_border .post_info a,
.post_featured.hover_border .post_info .post_meta_item {
	color: {$colors['inverse_link']};
}
.post_featured.hover_border .post_info a:hover {
	color: {$colors['text_link']};
}
.post_featured.hover_border .post_info:before,
.post_featured.hover_border .post_info:after {
	border-color: {$colors['inverse_link']};
}

/* Shop */
.post_featured.hover_shop .icons a {
	color: {$colors['text_dark']};
	border-color: {$colors['text_link']} !important;
	background-color: {$colors['text_link']};
}
.post_featured.hover_shop .icons a:hover {
	color: {$colors['inverse_text']};
	border-color: {$colors['text_link']} !important;
	background-color: {$colors['text_hover']};
}
.products.related .post_featured.hover_shop .icons a {
	color: {$colors['inverse_link']};
	border-color: {$colors['text_link']} !important;
	background-color: {$colors['text_link']};
}
.products.related .post_featured.hover_shop .icons a:hover {
	color: {$colors['inverse_hover']};
	border-color: {$colors['text_hover']} !important;
	background-color: {$colors['text_hover']};
}
.post_featured.hover_shop .icons a.added_to_cart {
	color: {$colors['text_link']};
}
.post_featured.hover_shop .icons a.added_to_cart:hover {
	color: {$colors['text_dark']};
}

/* Shop Buttons */
.post_featured.hover_shop_buttons .icons .shop_link {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
.post_featured.hover_shop_buttons .icons a:hover {
	color: {$colors['inverse_hover']};
	background-color: {$colors['text_hover']};
}
CSS;
		}

		return $css;
	}
}
