<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0.22
 */

// If this theme is a free version of premium theme
if ( ! defined( 'BUGSTER_THEME_FREE' ) ) {
	define( 'BUGSTER_THEME_FREE', false );
}
if ( ! defined( 'BUGSTER_THEME_FREE_WP' ) ) {
	define( 'BUGSTER_THEME_FREE_WP', false );
}

// If this theme uses multiple skins
if ( ! defined( 'BUGSTER_ALLOW_SKINS' ) ) {
	define( 'BUGSTER_ALLOW_SKINS', false );
}
if ( ! defined( 'BUGSTER_DEFAULT_SKIN' ) ) {
	define( 'BUGSTER_DEFAULT_SKIN', 'default' );
}



// Theme storage
// Attention! Must be in the global namespace to compatibility with WP CLI
//-------------------------------------------------------------------------
$GLOBALS['BUGSTER_STORAGE'] = array(

	// Key validator: market[env|loc]-vendor[axiom|ancora|themerex]
	'theme_pro_key'      => 'env-themerex',

	// Generate Personal token from Envato to automatic upgrade theme
	'upgrade_token_url'  => 'https://build.envato.com/create-token/?default=t&purchase:download=t&purchase:list=t',

	// Theme-specific URLs (will be escaped in place of the output)
	'theme_demo_url'     => 'http://bugster.themerex.net',
	'theme_doc_url'      => 'http://bugster.themerex.net/doc',
	
	'theme_rate_url'     => 'https://themeforest.net/download',

	'theme_custom_url'   => 'utm_source=offers&utm_medium=click&utm_campaign=themeinstall',

	'theme_download_url' => 'https://themeforest.net/item/bugster-bugs-pest-control-wordpress-theme-for-home-services/23529488', 	// ThemeREX

	'theme_support_url'  => 'https://themerex.net/support/',                             // ThemeREX

	'theme_video_url'    => 'https://www.youtube.com/channel/UCnFisBimrK2aIE-hnY70kCA',  // ThemeREX

	'theme_privacy_url'  => 'https://themerex.net/privacy-policy/',                      // ThemeREX

	// Comma separated slugs of theme-specific categories (for get relevant news in the dashboard widget)
	// (i.e. 'children,kindergarten')
	'theme_categories'   => '',

	// Responsive resolutions
	// Parameters to create css media query: min, max
	'responsive'         => array(
		// By size
		'xxl'        => array( 'max' => 1679 ),
		'xl'         => array( 'max' => 1439 ),
		'lg'         => array( 'max' => 1279 ),
		'md_over'    => array( 'min' => 1024 ),
		'md'         => array( 'max' => 1023 ),
		'sm'         => array( 'max' => 767 ),
		'sm_wp'      => array( 'max' => 600 ),
		'xs'         => array( 'max' => 479 ),
		// By device
		'wide'       => array(
			'min' => 2160
		),
		'desktop'    => array(
			'min' => 1680,
			'max' => 2159,
		),
		'notebook'   => array(
			'min' => 1280,
			'max' => 1679,
		),
		'tablet'     => array(
			'min' => 768,
			'max' => 1279,
		),
		'not_mobile' => array(
			'min' => 768
		),
		'mobile'     => array(
			'max' => 767
		),
	),
);



// THEME-SUPPORTED PLUGINS
// If plugin not need - remove its settings from next array
//----------------------------------------------------------
$bugster_theme_required_plugins_group = esc_html__( 'Core', 'bugster' );
$bugster_theme_required_plugins = array(
	// Section: "CORE" (required plugins)
	// DON'T COMMENT OR REMOVE NEXT LINES!
	'trx_addons'         => array(
								'title'       => esc_html__( 'ThemeREX Addons', 'bugster' ),
								'description' => esc_html__( "Will allow you to install recommended plugins, demo content, and improve the theme's functionality overall with multiple theme options", 'bugster' ),
								'required'    => true,
								'logo'        => 'logo.png',
								'group'       => $bugster_theme_required_plugins_group,
							),
);

// Section: "PAGE BUILDERS"
$bugster_theme_required_plugins_group = esc_html__( 'Page Builders', 'bugster' );
$bugster_theme_required_plugins['elementor'] = array(
	'title'       => esc_html__( 'Elementor', 'bugster' ),
	'description' => esc_html__( "Is a beautiful PageBuilder, even the free version of which allows you to create great pages using a variety of modules.", 'bugster' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $bugster_theme_required_plugins_group,
);
$bugster_theme_required_plugins['gutenberg'] = array(
	'title'       => esc_html__( 'Gutenberg', 'bugster' ),
	'description' => esc_html__( "It's a posts editor coming in place of the classic TinyMCE. Can be installed and used in parallel with Elementor", 'bugster' ),
	'required'    => false,
	'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
	'logo'        => 'logo.png',
	'group'       => $bugster_theme_required_plugins_group,
);
if ( ! BUGSTER_THEME_FREE ) {
	$bugster_theme_required_plugins['js_composer']          = array(
		'title'       => esc_html__( 'WPBakery PageBuilder', 'bugster' ),
		'description' => esc_html__( "Popular PageBuilder which allows you to create excellent pages", 'bugster' ),
		'required'    => false,
		'logo'        => 'logo.jpg',
		'group'       => $bugster_theme_required_plugins_group,
	);
	$bugster_theme_required_plugins['vc-extensions-bundle'] = array(
		'title'       => esc_html__( 'WPBakery PageBuilder extensions bundle', 'bugster' ),
		'description' => esc_html__( "Many shortcodes for the WPBakery PageBuilder", 'bugster' ),
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $bugster_theme_required_plugins_group,
	);
}

// Section: "E-COMMERCE"
$bugster_theme_required_plugins_group = esc_html__( 'E-Commerce', 'bugster' );
$bugster_theme_required_plugins['woocommerce']              = array(
	'title'       => esc_html__( 'WooCommerce', 'bugster' ),
	'description' => esc_html__( "Connect the store to your website and start selling now", 'bugster' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $bugster_theme_required_plugins_group,
);


// Section: "EVENTS & TIMELINES"
$bugster_theme_required_plugins_group = esc_html__( 'Events and Appointments', 'bugster' );
if ( ! BUGSTER_THEME_FREE ) {
	$bugster_theme_required_plugins['booked']                 = array(
		'title'       => esc_html__( 'Booked Appointments', 'bugster' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $bugster_theme_required_plugins_group,
	);
}

// Section: "CONTENT"
$bugster_theme_required_plugins_group = esc_html__( 'Content', 'bugster' );
$bugster_theme_required_plugins['contact-form-7'] = array(
	'title'       => esc_html__( 'Contact Form 7', 'bugster' ),
	'description' => esc_html__( "CF7 allows you to create an unlimited number of contact forms", 'bugster' ),
	'required'    => false,
	'logo'        => 'logo.jpg',
	'group'       => $bugster_theme_required_plugins_group,
);
if ( ! BUGSTER_THEME_FREE ) {
	$bugster_theme_required_plugins['essential-grid']             = array(
		'title'       => esc_html__( 'Essential Grid', 'bugster' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $bugster_theme_required_plugins_group,
	);
	$bugster_theme_required_plugins['revslider']                  = array(
		'title'       => esc_html__( 'Revolution Slider', 'bugster' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $bugster_theme_required_plugins_group,
	);
	$bugster_theme_required_plugins['devvn-image-hotspot']          = array(
		'title'       => esc_html__( 'Image Hotspot by DevVN', 'bugster' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.jpg',
		'group'       => $bugster_theme_required_plugins_group,
	);
	$bugster_theme_required_plugins['strong-testimonials']          = array(
		'title'       => esc_html__( 'Strong Testimonials', 'bugster' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $bugster_theme_required_plugins_group,
	);
	$bugster_theme_required_plugins['custom-facebook-feed']          = array(
		'title'       => esc_html__( 'Custom Facebook Feed', 'bugster' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $bugster_theme_required_plugins_group,
	);
}

// Add plugins list to the global storage
$GLOBALS['BUGSTER_STORAGE']['required_plugins'] = $bugster_theme_required_plugins;


// THEME-SPECIFIC BLOG LAYOUTS
//----------------------------------------------
$bugster_theme_blog_styles = array(
	'excerpt' => array(
		'title'   => esc_html__( 'Standard', 'bugster' ),
		'archive' => 'index-excerpt',
		'item'    => 'content-excerpt',
		'styles'  => 'excerpt',
	),
	'classic' => array(
		'title'   => esc_html__( 'Classic', 'bugster' ),
		'archive' => 'index-classic',
		'item'    => 'content-classic',
		'columns' => array( 2, 3 ),
		'styles'  => 'classic',
	),
);
if ( ! BUGSTER_THEME_FREE ) {
	$bugster_theme_blog_styles['masonry']   = array(
		'title'   => esc_html__( 'Masonry', 'bugster' ),
		'archive' => 'index-classic',
		'item'    => 'content-classic',
		'columns' => array( 2, 3 ),
		'styles'  => 'masonry',
	);
	$bugster_theme_blog_styles['portfolio'] = array(
		'title'   => esc_html__( 'Portfolio', 'bugster' ),
		'archive' => 'index-portfolio',
		'item'    => 'content-portfolio',
		'columns' => array( 2, 3, 4 ),
		'styles'  => 'portfolio',
	);
	$bugster_theme_blog_styles['gallery']   = array(
		'title'   => esc_html__( 'Gallery', 'bugster' ),
		'archive' => 'index-portfolio',
		'item'    => 'content-portfolio-gallery',
		'columns' => array( 2, 3, 4 ),
		'styles'  => array( 'portfolio', 'gallery' ),
	);
	$bugster_theme_blog_styles['chess']     = array(
		'title'   => esc_html__( 'Chess', 'bugster' ),
		'archive' => 'index-chess',
		'item'    => 'content-chess',
		'columns' => array( 1, 2, 3 ),
		'styles'  => 'chess',
	);
	$bugster_theme_blog_styles['modern']     = array(
		'title'   => esc_html__( 'Modern', 'bugster' ),
		'archive' => 'index-modern',
		'item'    => 'content-modern',
		'columns' => array( 1 ),
		'styles'  => 'modern',
	);
}

// Add list of blog styles to the global storage
$GLOBALS['BUGSTER_STORAGE']['blog_styles'] = $bugster_theme_blog_styles;


// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)

if ( ! function_exists( 'bugster_customizer_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'bugster_customizer_theme_setup1', 1 );
	function bugster_customizer_theme_setup1() {

		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		bugster_storage_set(
			'settings', array(

				'duplicate_options'      => 'child',                    // none  - use separate options for the main and the child-theme
																		// child - duplicate theme options from the main theme to the child-theme only
																		// both  - sinchronize changes in the theme options between main and child themes

				'customize_refresh'      => 'auto',                     // Refresh method for preview area in the Appearance - Customize:
																		// auto - refresh preview area on change each field with Theme Options
																		// manual - refresh only obn press button 'Refresh' at the top of Customize frame

				'max_load_fonts'         => 5,                          // Max fonts number to load from Google fonts or from uploaded fonts

				'comment_after_name'     => true,                       // Place 'comment' field after the 'name' and 'email'

				'show_author_avatar'     => true,                       // Display author's avatar in the post meta

				'icons_selector'         => 'internal',                 // Icons selector in the shortcodes:
																		// vc (default) - standard VC (very slow) or Elementor's icons selector (not support images and svg)
																		// internal - internal popup with plugin's or theme's icons list (fast and support images and svg)

				'icons_type'             => 'icons',                    // Type of icons (if 'icons_selector' is 'internal'):
																		// icons  - use font icons to present icons
																		// images - use images from theme's folder trx_addons/css/icons.png
																		// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'socials_type'           => 'icons',                    // Type of socials icons (if 'icons_selector' is 'internal'):
																		// icons  - use font icons to present social networks
																		// images - use images from theme's folder trx_addons/css/icons.png
																		// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'check_min_version'      => true,                       // Check if exists a .min version of .css and .js and return path to it
																		// instead the path to the original file
																		// (if debug_mode is off and modification time of the original file < time of the .min file)

				'autoselect_menu'        => false,                      // Show any menu if no menu selected in the location 'main_menu'
																		// (for example, the theme is just activated)

				'disable_jquery_ui'      => false,                      // Prevent loading custom jQuery UI libraries in the third-party plugins

				'use_mediaelements'      => true,                       // Load script "Media Elements" to play video and audio

				'tgmpa_upload'           => false,                      // Allow upload not pre-packaged plugins via TGMPA

				'allow_no_image'         => false,                      // Allow to use theme-specific image placeholder if no image present in the blog, related posts, post navigation, etc.

				'separate_schemes'       => true,                       // Save color schemes to the separate files __color_xxx.css (true) or append its to the __custom.css (false)

				'allow_fullscreen'       => false,                      // Allow cases 'fullscreen' and 'fullwide' for the body style in the Theme Options
																		// In the Page Options this styles are present always
																		// (can be removed if filter 'bugster_filter_allow_fullscreen' return false)

				'attachments_navigation' => false,                      // Add arrows on the single attachment page to navigate to the prev/next attachment

				'gutenberg_safe_mode'    => array(),                    // 'vc', 'elementor' - Prevent simultaneous editing of posts for Gutenberg and other PageBuilders (VC, Elementor)

				'gutenberg_add_context'  => false,                      // Add context to the Gutenberg editor styles with our method (if true - use if any problem with editor styles) or use native Gutenberg way via add_editor_style() (if false - used by default)

				'allow_gutenberg_blocks' => true,                       // Allow our shortcodes and widgets as blocks in the Gutenberg (not ready yet - in the development now)

				'subtitle_above_title'   => true,                       // Put subtitle above the title in the shortcodes

				'add_hide_on_xxx'        => 'replace',                  // Add our breakpoints to the Responsive section of each element
																		// 'add' - add our breakpoints after Elementor's
																		// 'replace' - add our breakpoints instead Elementor's
																		// 'none' - don't add our breakpoints (using only Elementor's)
			)
		);

		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------

		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		// For example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'
		bugster_storage_set(
			'load_fonts', array(
				// Google font
				// Font-face packed with theme
				array(
					'name'   => 'Assistant',
					'family' => 'sans-serif',
				),
				array(
					'name'   => 'D-DIN',
					'family' => 'sans-serif',
				),
			)
		);

		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		bugster_storage_set( 'load_fonts_subset', 'latin,latin-ext' );

		// Settings of the main tags
		// Attention! Font name in the parameter 'font-family' will be enclosed in the quotes and no spaces after comma!
		// For example:	'font-family' => '"Roboto",sans-serif'	- is correct

		bugster_storage_set(
			'theme_fonts', array(
				'p'       => array(
					'title'           => esc_html__( 'Main text', 'bugster' ),
					'description'     => esc_html__( 'Font settings of the main text of the site. Attention! For correct display of the site on mobile devices, use only units "rem", "em" or "ex"', 'bugster' ),
					'font-family'     => '"Assistant",sans-serif',
					'font-size'       => '1.142857rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '2rem',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '0em',
					'margin-bottom'   => '1.2em',
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'bugster' ),
					'font-family'     => '"D-DIN",sans-serif',
					'font-size'       => '4.285714rem',
					'font-weight'     => '900',
					'font-style'      => 'normal',
					'line-height'     => '5rem',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0',
					'margin-top'      => '1.3em',
					'margin-bottom'   => '0.61em',
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'bugster' ),
					'font-family'     => '"D-DIN",sans-serif',
					'font-size'       => '3.571428rem',
					'font-weight'     => '900',
					'font-style'      => 'normal',
					'line-height'     => '4.285714rem',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '1.15em',
					'margin-bottom'   => '0.83em',
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'bugster' ),
					'font-family'     => '"D-DIN",sans-serif',
					'font-size'       => '2.571428rem',
					'font-weight'     => '900',
					'font-style'      => 'normal',
					'line-height'     => '3.214285rem',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0',
					'margin-top'      => '1.2em',
					'margin-bottom'   => '0.6em',
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'bugster' ),
					'font-family'     => '"D-DIN",sans-serif',
					'font-size'       => '1.714285rem',
					'font-weight'     => '900',
					'font-style'      => 'normal',
					'line-height'     => '2.285714rem',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0',
					'margin-top'      => '1.86em',
					'margin-bottom'   => '1.1em',
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'bugster' ),
					'font-family'     => '"D-DIN",sans-serif',
					'font-size'       => '1.428571rem',
					'font-weight'     => '900',
					'font-style'      => 'normal',
					'line-height'     => '1.785714rem',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0',
					'margin-top'      => '2.33em',
					'margin-bottom'   => '1.4em',
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'bugster' ),
					'font-family'     => '"D-DIN",sans-serif',
					'font-size'       => '1.142857rem',
					'font-weight'     => '900',
					'font-style'      => 'normal',
					'line-height'     => '1.857142rem',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '1.55em',
					'margin-bottom'   => '0.35em',
				),
				'logo'    => array(
					'title'           => esc_html__( 'Logo text', 'bugster' ),
					'description'     => esc_html__( 'Font settings of the text case of the logo', 'bugster' ),
					'font-family'     => '"D-DIN",sans-serif',
					'font-size'       => '1.8em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '1px',
				),
				'button'  => array(
					'title'           => esc_html__( 'Buttons', 'bugster' ),
					'font-family'     => '"D-DIN",sans-serif',
					'font-size'       => '16px',
					'font-weight'     => '900',
					'font-style'      => 'normal',
					'line-height'     => '22px',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.1em',
				),
				'input'   => array(
					'title'           => esc_html__( 'Input fields', 'bugster' ),
					'description'     => esc_html__( 'Font settings of the input fields, dropdowns and textareas', 'bugster' ),
					'font-family'     => 'inherit',
					'font-size'       => '1.285714rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em', // Attention! Firefox don't allow line-height less then 1.5em in the select
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
				),
				'info'    => array(
					'title'           => esc_html__( 'Post meta', 'bugster' ),
					'description'     => esc_html__( 'Font settings of the post meta: date, counters, share, etc.', 'bugster' ),
					'font-family'     => '"D-DIN",sans-serif',
					'font-size'       => '1.142857rem',  // Old value '13px' don't allow using 'font zoom' in the custom blog items
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '0',
					'margin-bottom'   => '',
				),
				'menu'    => array(
					'title'           => esc_html__( 'Main menu', 'bugster' ),
					'description'     => esc_html__( 'Font settings of the main menu items', 'bugster' ),
					'font-family'     => '"D-DIN",sans-serif',
					'font-size'       => '1.285714rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.2em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'bugster' ),
					'description'     => esc_html__( 'Font settings of the dropdown menu items', 'bugster' ),
					'font-family'     => '"D-DIN",sans-serif',
					'font-size'       => '1.285714rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.2em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
				),
			)
		);

		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		bugster_storage_set(
			'scheme_color_groups', array(
				'main'    => array(
					'title'       => esc_html__( 'Main', 'bugster' ),
					'description' => esc_html__( 'Colors of the main content area', 'bugster' ),
				),
				'alter'   => array(
					'title'       => esc_html__( 'Alter', 'bugster' ),
					'description' => esc_html__( 'Colors of the alternative blocks (sidebars, etc.)', 'bugster' ),
				),
				'extra'   => array(
					'title'       => esc_html__( 'Extra', 'bugster' ),
					'description' => esc_html__( 'Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'bugster' ),
				),
				'inverse' => array(
					'title'       => esc_html__( 'Inverse', 'bugster' ),
					'description' => esc_html__( 'Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'bugster' ),
				),
				'input'   => array(
					'title'       => esc_html__( 'Input', 'bugster' ),
					'description' => esc_html__( 'Colors of the form fields (text field, textarea, select, etc.)', 'bugster' ),
				),
			)
		);
		bugster_storage_set(
			'scheme_color_names', array(
				'bg_color'    => array(
					'title'       => esc_html__( 'Background color', 'bugster' ),
					'description' => esc_html__( 'Background color of this block in the normal state', 'bugster' ),
				),
				'bg_hover'    => array(
					'title'       => esc_html__( 'Background hover', 'bugster' ),
					'description' => esc_html__( 'Background color of this block in the hovered state', 'bugster' ),
				),
				'bd_color'    => array(
					'title'       => esc_html__( 'Border color', 'bugster' ),
					'description' => esc_html__( 'Border color of this block in the normal state', 'bugster' ),
				),
				'bd_hover'    => array(
					'title'       => esc_html__( 'Border hover', 'bugster' ),
					'description' => esc_html__( 'Border color of this block in the hovered state', 'bugster' ),
				),
				'text'        => array(
					'title'       => esc_html__( 'Text', 'bugster' ),
					'description' => esc_html__( 'Color of the plain text inside this block', 'bugster' ),
				),
				'text_dark'   => array(
					'title'       => esc_html__( 'Text dark', 'bugster' ),
					'description' => esc_html__( 'Color of the dark text (bold, header, etc.) inside this block', 'bugster' ),
				),
				'text_light'  => array(
					'title'       => esc_html__( 'Text light', 'bugster' ),
					'description' => esc_html__( 'Color of the light text (post meta, etc.) inside this block', 'bugster' ),
				),
				'text_link'   => array(
					'title'       => esc_html__( 'Link', 'bugster' ),
					'description' => esc_html__( 'Color of the links inside this block', 'bugster' ),
				),
				'text_hover'  => array(
					'title'       => esc_html__( 'Link hover', 'bugster' ),
					'description' => esc_html__( 'Color of the hovered state of links inside this block', 'bugster' ),
				),
				'text_link2'  => array(
					'title'       => esc_html__( 'Link 2', 'bugster' ),
					'description' => esc_html__( 'Color of the accented texts (areas) inside this block', 'bugster' ),
				),
				'text_hover2' => array(
					'title'       => esc_html__( 'Link 2 hover', 'bugster' ),
					'description' => esc_html__( 'Color of the hovered state of accented texts (areas) inside this block', 'bugster' ),
				),
				'text_link3'  => array(
					'title'       => esc_html__( 'Link 3', 'bugster' ),
					'description' => esc_html__( 'Color of the other accented texts (buttons) inside this block', 'bugster' ),
				),
				'text_hover3' => array(
					'title'       => esc_html__( 'Link 3 hover', 'bugster' ),
					'description' => esc_html__( 'Color of the hovered state of other accented texts (buttons) inside this block', 'bugster' ),
				),
			)
		);
		bugster_storage_set(
			'schemes', array(

				// Color scheme: 'default'
				'default' => array(
					'title'    => esc_html__( 'Default', 'bugster' ),
					'internal' => true,
					'colors'   => array(

						// Whole block border and background
						'bg_color'         => '#ffffff',
						'bd_color'         => '#eff2f4',

						// Text and links colors
						'text'             => '#525a6c',
						'text_light'       => '#92969f',
						'text_dark'        => '#0a1328',
						'text_link'        => '#10f5aa',
						'text_hover'       => '#0a1328',
						'text_link2'       => '#0a1328',
						'text_hover2'      => '#0a1328',
						'text_link3'       => '#000719',
						'text_hover3'      => '#ffffff',

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => '#f1f5f6',
						'alter_bg_hover'   => '#e3ebec',
						'alter_bd_color'   => '#ffffff',
						'alter_bd_hover'   => '#eeeeee',
						'alter_text'       => '#525a6c',
						'alter_light'      => '#92969f',
						'alter_dark'       => '#0a1328',
						'alter_link'       => '#10f5aa',
						'alter_hover'      => '#0a1328',
						'alter_link2'      => '#ffffff',
						'alter_hover2'     => '#ffffff',
						'alter_link3'      => '#ffffff',
						'alter_hover3'     => '#ffffff',

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#000719',
						'extra_bg_hover'   => '#ffffff',
						'extra_bd_color'   => '#242d41',
						'extra_bd_hover'   => '#ffffff',
						'extra_text'       => '#525a6c',
						'extra_light'      => '#525a6c',
						'extra_dark'       => '#ffffff',
						'extra_link'       => '#ffffff',
						'extra_hover'      => '#ffffff',
						'extra_link2'      => '#ffffff',
						'extra_hover2'     => '#ffffff',
						'extra_link3'      => '#ffffff',
						'extra_hover3'     => '#ffffff',

						// Input fields (form's fields and textarea)
						'input_bg_color'   => '#e3ebec',
						'input_bg_hover'   => '#e3ebec',
						'input_bd_color'   => '#e3e7e8',
						'input_bd_hover'   => '#eff2f4',
						'input_text'       => '#525a6c',
						'input_light'      => '#e3ebec',
						'input_dark'       => '#1f1f1f',

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => '#ffffff',
						'inverse_bd_hover' => '#ffffff',
						'inverse_text'     => '#ffffff',
						'inverse_light'    => '#ffffff',
						'inverse_dark'     => '#10f5aa',
						'inverse_link'     => '#ffffff',
						'inverse_hover'    => '#10f5aa',
					),
				),

				// Color scheme: 'dark'
				'dark'    => array(
					'title'    => esc_html__( 'Dark', 'bugster' ),
					'internal' => true,
					'colors'   => array(

						// Whole block border and background
						'bg_color'         => '#0a1328',
						'bd_color'         => '#242d41',

						// Text and links colors
						'text'             => '#9ca1ae',
						'text_light'       => '#797c86',
						'text_dark'        => '#ffffff',
						'text_link'        => '#10f5aa',
						'text_hover'       => '#ffffff',
						'text_link2'       => '#0a1328',
						'text_hover2'      => '#525a6c',
						'text_link3'       => '#000719',
						'text_hover3'      => '#ffffff',

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => '#000719',
						'alter_bg_hover'   => '#141c30',
						'alter_bd_color'   => '#242d41',
						'alter_bd_hover'   => '#ffffff',
						'alter_text'       => '#9ca1ae',
						'alter_light'      => '#797c86',
						'alter_dark'       => '#ffffff',
						'alter_link'       => '#10f5aa',
						'alter_hover'      => '#ffffff',
						'alter_link2'      => '#ffffff',
						'alter_hover2'     => '#ffffff',
						'alter_link3'      => '#ffffff',
						'alter_hover3'     => '#ffffff',

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#eff2f4',
						'extra_bg_hover'   => '#f3f5f7',
						'extra_bd_color'   => '#e5e5e5',
						'extra_bd_hover'   => '#ffffff',
						'extra_text'       => '#9ca1ae',
						'extra_light'      => '#797c86',
						'extra_dark'       => '#0a1328',
						'extra_link'       => '#10f5aa',
						'extra_hover'      => '#ffffff',
						'extra_link2'      => '#ffffff',
						'extra_hover2'     => '#ffffff',
						'extra_link3'      => '#ffffff',
						'extra_hover3'     => '#ffffff',

						// Input fields (form's fields and textarea)
						'input_bg_color'   => '#ffffff',
						'input_bg_hover'   => '#ffffff',
						'input_bd_color'   => '#ffffff',
						'input_bd_hover'   => '#ffffff',
						'input_text'       => '#92969f',
						'input_light'      => '#ecf1f3',
						'input_dark'       => '#0a1328',

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => '#ffffff',
						'inverse_bd_hover' => '#ffffff',
						'inverse_text'     => '#ffffff',
						'inverse_light'    => '#ffffff',
						'inverse_dark'     => '#10f5aa',
						'inverse_link'     => '#ffffff',
						'inverse_hover'    => '#0a1328',
					),
				),

			)
		);
		bugster_storage_set( 'schemes_original', bugster_storage_get( 'schemes' ) );

		// Simple scheme editor: lists the colors to edit in the "Simple" mode.
		// For each color you can set the array of 'slave' colors and brightness factors that are used to generate new values,
		// when 'main' color is changed
		// Leave 'slave' arrays empty if your scheme does not have a color dependency
		bugster_storage_set(
			'schemes_simple', array(
				'text_link'        => array(
					'alter_hover'      => 1,
					'extra_link'       => 1,
					'inverse_bd_color' => 0.85,
					'inverse_bd_hover' => 0.7,
				),
				'text_hover'       => array(
					'alter_link'  => 1,
					'extra_hover' => 1,
				),
				'text_link2'       => array(
					'alter_hover2' => 1,
					'extra_link2'  => 1,
				),
				'text_hover2'      => array(
					'alter_link2'  => 1,
					'extra_hover2' => 1,
				),
				'text_link3'       => array(
					'alter_hover3' => 1,
					'extra_link3'  => 1,
				),
				'text_hover3'      => array(
					'alter_link3'  => 1,
					'extra_hover3' => 1,
				),
				'alter_link'       => array(),
				'alter_hover'      => array(),
				'alter_link2'      => array(),
				'alter_hover2'     => array(),
				'alter_link3'      => array(),
				'alter_hover3'     => array(),
				'extra_link'       => array(),
				'extra_hover'      => array(),
				'extra_link2'      => array(),
				'extra_hover2'     => array(),
				'extra_link3'      => array(),
				'extra_hover3'     => array(),
				'inverse_bd_color' => array(),
				'inverse_bd_hover' => array(),
			)
		);

		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		bugster_storage_set(
			'scheme_colors_add', array(
				'bg_color_0'        => array(
					'color' => 'bg_color',
					'alpha' => 0,
				),
				'bg_color_02'       => array(
					'color' => 'bg_color',
					'alpha' => 0.2,
				),
				'bg_color_07'       => array(
					'color' => 'bg_color',
					'alpha' => 0.7,
				),
				'bg_color_08'       => array(
					'color' => 'bg_color',
					'alpha' => 0.8,
				),
				'bg_color_09'       => array(
					'color' => 'bg_color',
					'alpha' => 0.9,
				),
				'alter_bg_color_07' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.7,
				),
				'alter_bg_color_04' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.4,
				),
				'alter_bg_color_00' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0,
				),
				'alter_bg_color_02' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.2,
				),
				'alter_bd_color_02' => array(
					'color' => 'alter_bd_color',
					'alpha' => 0.2,
				),
				'alter_link_02'     => array(
					'color' => 'alter_link',
					'alpha' => 0.2,
				),
				'alter_link_07'     => array(
					'color' => 'alter_link',
					'alpha' => 0.7,
				),
				'extra_bg_color_05' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.5,
				),
				'extra_bg_color_07' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.7,
				),
				'extra_link_02'     => array(
					'color' => 'extra_link',
					'alpha' => 0.2,
				),
				'inverse_link_02'     => array(
					'color' => 'inverse_link',
					'alpha' => 0.2,
				),
				'extra_link_07'     => array(
					'color' => 'extra_link',
					'alpha' => 0.7,
				),
				'text_dark_07'      => array(
					'color' => 'text_dark',
					'alpha' => 0.7,
				),
				'text_link_02'      => array(
					'color' => 'text_link',
					'alpha' => 0.2,
				),
				'text_link_07'      => array(
					'color' => 'text_link',
					'alpha' => 0.7,
				),
				'inverse_link_02'      => array(
					'color' => 'inverse_link',
					'alpha' => 0.2,
				),
				'inverse_link_07'      => array(
					'color' => 'inverse_link',
					'alpha' => 0.7,
				),
				'text_link_blend'   => array(
					'color'      => 'text_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'alter_link_blend'  => array(
					'color'      => 'alter_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
			)
		);

		// Parameters to set order of schemes in the css
		bugster_storage_set(
			'schemes_sorted', array(
				'color_scheme',
				'header_scheme',
				'sidebar_scheme',
				'footer_scheme',
			)
		);

		// -----------------------------------------------------------------
		// -- Theme specific thumb sizes
		// -----------------------------------------------------------------
		bugster_storage_set(
			'theme_thumbs', apply_filters(
				'bugster_filter_add_thumb_sizes', array(
					// Width of the image is equal to the content area width (without sidebar)
					// Height is fixed
					'bugster-thumb-huge'        => array(
						'size'  => array( 1170, 658, true ),
						'title' => esc_html__( 'Huge image', 'bugster' ),
						'subst' => 'trx_addons-thumb-huge',
					),
					// Width of the image is equal to the content area width (with sidebar)
					// Height is fixed
					'bugster-thumb-big'         => array(
						'size'  => array( 1600, 900, true ),
						'title' => esc_html__( 'Large image', 'bugster' ),
						'subst' => 'trx_addons-thumb-big',
					),
					'bugster-thumb-modern'         => array(
						'size'  => array( 570, 570, true ),
						'title' => esc_html__( 'Modern image', 'bugster' ),
						'subst' => 'trx_addons-thumb-modern',
					),

					// Width of the image is equal to the 1/3 of the content area width (without sidebar)
					// Height is fixed
					'bugster-thumb-med'         => array(
						'size'  => array( 370, 208, true ),
						'title' => esc_html__( 'Medium image', 'bugster' ),
						'subst' => 'trx_addons-thumb-medium',
					),
					'bugster-thumb-service'         => array(
						'size'  => array( 250, 250, true ),
						'title' => esc_html__( 'Service image', 'bugster' ),
						'subst' => 'trx_addons-thumb-service',
					),
					'bugster-thumb-footer'         => array(
						'size'  => array( 52, 52, true ),
						'title' => esc_html__( 'Footer icon', 'bugster' ),
						'subst' => 'trx_addons-thumb-footer',
					),

					// Small square image (for avatars in comments, etc.)
					'bugster-thumb-tiny'        => array(
						'size'  => array( 100, 100, true ),
						'title' => esc_html__( 'Small square avatar', 'bugster' ),
						'subst' => 'trx_addons-thumb-tiny',
					),

					// Width of the image is equal to the content area width (with sidebar)
					// Height is proportional (only downscale, not crop)
					'bugster-thumb-masonry-big' => array(
						'size'  => array( 760, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry Large (scaled)', 'bugster' ),
						'subst' => 'trx_addons-thumb-masonry-big',
					),

					// Width of the image is equal to the 1/3 of the full content area width (without sidebar)
					// Height is proportional (only downscale, not crop)
					'bugster-thumb-masonry'     => array(
						'size'  => array( 370, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry (scaled)', 'bugster' ),
						'subst' => 'trx_addons-thumb-masonry',
					),
				)
			)
		);
	}
}




//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'bugster_importer_set_options' ) ) {
	add_filter( 'trx_addons_filter_importer_options', 'bugster_importer_set_options', 9 );
	function bugster_importer_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;
			// Allow import/export functionality
			$options['allow_import'] = true;
			$options['allow_export'] = false;
			// Prepare demo data
			$options['demo_url'] = esc_url( bugster_get_protocol() . '://demofiles.themerex.net/bugster/' );
			// Required plugins
			$options['required_plugins'] = array_keys( bugster_storage_get( 'required_plugins' ) );
			// Set number of thumbnails (usually 3 - 5) to regenerate at once when its imported (if demo data was zipped without cropped images)
			// Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
			$options['regenerate_thumbnails'] = 0;
			// Default demo
			$options['files']['default']['title']       = esc_html__( 'Bugster Demo', 'bugster' );
			$options['files']['default']['domain_dev']  = esc_url( bugster_get_protocol() . '://bugster.themerex.net' );       // Developers domain
			$options['files']['default']['domain_demo'] = esc_url( bugster_get_protocol() . '://bugster.themerex.net' );       // Demo-site domain
			// If theme need more demo - just copy 'default' and change required parameter

			// The array with theme-specific banners, displayed during demo-content import.
			// If array with banners is empty - the banners are uploaded directly from demo-content server.
			$options['banners'] = array();
		}
		return $options;
	}
}


//------------------------------------------------------------------------
// OCDI support
//------------------------------------------------------------------------

// Set theme specific OCDI options
if ( ! function_exists( 'bugster_ocdi_set_options' ) ) {
	add_filter( 'trx_addons_filter_ocdi_options', 'bugster_ocdi_set_options', 9 );
	function bugster_ocdi_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Prepare demo data
			$options['demo_url'] = esc_url( bugster_get_protocol() . '://demofiles.themerex.net/bugster/' );
			// Required plugins
			$options['required_plugins'] = array_keys( bugster_storage_get( 'required_plugins' ) );
			// Demo-site domain
			$options['files']['ocdi']['title']       = esc_html__( 'Bugster OCDI Demo', 'bugster' );
			$options['files']['ocdi']['domain_demo'] = esc_url( bugster_get_protocol() . '://bugster.themerex.net' );
			// If theme need more demo - just copy 'default' and change required parameter
		}
		return $options;
	}
}


// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if ( ! function_exists( 'bugster_create_theme_options' ) ) {

	function bugster_create_theme_options() {

		// Message about options override.
		// Attention! Not need esc_html() here, because this message put in wp_kses_data() below
		$msg_override = __( 'Attention! Some of these options can be overridden in the following sections (Blog, Plugins settings, etc.) or in the settings of individual pages. If you changed such parameter and nothing happened on the page, this option may be overridden in the corresponding section or in the Page Options of this page. These options are marked with an asterisk (*) in the title.', 'bugster' );

		// Color schemes number: if < 2 - hide fields with selectors
		$hide_schemes = count( bugster_storage_get( 'schemes' ) ) < 2;

		bugster_storage_set(

			'options', array(

				// 'Logo & Site Identity'
				//---------------------------------------------
				'title_tagline'                 => array(
					'title'    => esc_html__( 'Logo & Site Identity', 'bugster' ),
					'desc'     => '',
					'priority' => 10,
					'type'     => 'section',
				),
				'logo_info'                     => array(
					'title'    => esc_html__( 'Logo Settings', 'bugster' ),
					'desc'     => '',
					'priority' => 20,
					'qsetup'   => esc_html__( 'General', 'bugster' ),
					'type'     => 'info',
				),
				'logo_text'                     => array(
					'title'    => esc_html__( 'Use Site Name as Logo', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Use the site title and tagline as a text logo if no image is selected', 'bugster' ) ),
					'class'    => 'bugster_column-1_2 bugster_new_row',
					'priority' => 30,
					'std'      => 1,
					'qsetup'   => esc_html__( 'General', 'bugster' ),
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_retina_enabled'           => array(
					'title'    => esc_html__( 'Allow retina display logo', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Show fields to select logo images for Retina display', 'bugster' ) ),
					'class'    => 'bugster_column-1_2',
					'priority' => 40,
					'refresh'  => false,
					'std'      => 0,
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_zoom'                     => array(
					'title'   => esc_html__( 'Logo zoom', 'bugster' ),
					'desc'    => wp_kses_post(
									__( 'Zoom the logo (set 1 to leave original size).', 'bugster' )
									. ' <br>'
									. __( 'Attention! For this parameter to affect images, their max-height should be specified in "em" instead of "px" when creating a header.', 'bugster' )
									. ' <br>'
									. __( 'In this case maximum size of logo depends on the actual size of the picture.', 'bugster' )
								),
					'std'     => 1,
					'min'     => 0.2,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => BUGSTER_THEME_FREE ? 'hidden' : 'slider',
				),
				// Parameter 'logo' was replaced with standard WordPress 'custom_logo'
				'logo_retina'                   => array(
					'title'      => esc_html__( 'Logo for Retina', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'bugster' ) ),
					'class'      => 'bugster_column-1_2',
					'priority'   => 70,
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile_header'            => array(
					'title' => esc_html__( 'Logo for the mobile header', 'bugster' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile header (if enabled in the section "Header - Header mobile"', 'bugster' ) ),
					'class' => 'bugster_column-1_2 bugster_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_header_retina'     => array(
					'title'      => esc_html__( 'Logo for the mobile header on Retina', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'bugster' ) ),
					'class'      => 'bugster_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile'                   => array(
					'title' => esc_html__( 'Logo for the mobile menu', 'bugster' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile menu', 'bugster' ) ),
					'class' => 'bugster_column-1_2 bugster_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_retina'            => array(
					'title'      => esc_html__( 'Logo mobile on Retina', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'bugster' ) ),
					'class'      => 'bugster_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'image',
				),



				// 'General settings'
				//---------------------------------------------
				'general'                       => array(
					'title'    => esc_html__( 'General', 'bugster' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 20,
					'type'     => 'section',
				),

				'general_layout_info'           => array(
					'title'  => esc_html__( 'Layout', 'bugster' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'bugster' ),
					'type'   => 'info',
				),
				'body_style'                    => array(
					'title'    => esc_html__( 'Body style', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select width of the body content', 'bugster' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'qsetup'   => esc_html__( 'General', 'bugster' ),
					'refresh'  => false,
					'std'      => 'wide',
					'options'  => bugster_get_list_body_styles( false ),
					'type'     => 'select',
				),
				'page_width'                    => array(
					'title'      => esc_html__( 'Page width', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Total width of the site content and sidebar (in pixels). If empty - use default width', 'bugster' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed', 'wide' ),
					),
					'std'        => 1230,
					'min'        => 1000,
					'max'        => 1400,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page',               // SASS variable's name to preview changes 'on fly'
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'slider',
				),
				'page_boxed_extra'             => array(
					'title'      => esc_html__( 'Boxed page extra spaces', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Width of the extra side space on boxed pages', 'bugster' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'std'        => 60,
					'min'        => 0,
					'max'        => 300,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page_boxed_extra',   // SASS variable's name to preview changes 'on fly'
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'slider',
				),
				'boxed_bg_image'                => array(
					'title'      => esc_html__( 'Boxed bg image', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'bugster' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'std'        => '',
					'qsetup'     => esc_html__( 'General', 'bugster' ),
					'type'       => 'image',
				),
				'remove_margins'                => array(
					'title'    => esc_html__( 'Remove margins', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Remove margins above and below the content area', 'bugster' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'refresh'  => false,
					'std'      => 0,
					'type'     => 'checkbox',
				),

				'general_sidebar_info'          => array(
					'title' => esc_html__( 'Sidebar', 'bugster' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position'              => array(
					'title'    => esc_html__( 'Sidebar position', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar', 'bugster' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_single'
						'section' => esc_html__( 'Widgets', 'bugster' ),
					),
					'std'      => 'right',
					'qsetup'   => esc_html__( 'General', 'bugster' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_position_ss'       => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'bugster' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_ss_single'
						'section' => esc_html__( 'Widgets', 'bugster' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
					),
					'std'      => 'below',
					'qsetup'   => esc_html__( 'General', 'bugster' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets'               => array(
					'title'      => esc_html__( 'Sidebar widgets', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_widgets_single'
						'section' => esc_html__( 'Widgets', 'bugster' ),
					),
					'dependency' => array(
						'sidebar_position' => array( 'left', 'right' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'bugster' ),
					'type'       => 'select',
				),
				'sidebar_width'                 => array(
					'title'      => esc_html__( 'Sidebar width', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Width of the sidebar (in pixels). If empty - use default width', 'bugster' ) ),
					'std'        => 390,
					'min'        => 150,
					'max'        => 500,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'sidebar',      // SASS variable's name to preview changes 'on fly'
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'slider',
				),
				'sidebar_gap'                   => array(
					'title'      => esc_html__( 'Sidebar gap', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Gap between content and sidebar (in pixels). If empty - use default gap', 'bugster' ) ),
					'std'        => 40,
					'min'        => 0,
					'max'        => 100,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'gap',          // SASS variable's name to preview changes 'on fly'
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'slider',
				),
				'expand_content'                => array(
					'title'   => esc_html__( 'Expand content', 'bugster' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'bugster' ) ),
					'refresh' => false,
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'bugster' ),
					),
					'std'     => 1,
					'type'    => 'checkbox',
				),
				
				'general_effects_info'          => array(
					'title' => esc_html__( 'Design & Effects', 'bugster' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'border_radius'                 => array(
					'title'      => esc_html__( 'Border radius', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Specify the border radius of the form fields and buttons in pixels', 'bugster' ) ),
					'std'        => 0,
					'min'        => 0,
					'max'        => 20,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'rad',      // SASS name to preview changes 'on fly'
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'slider',
				),

				'general_misc_info'             => array(
					'title' => esc_html__( 'Miscellaneous', 'bugster' ),
					'desc'  => '',
					'type'  => BUGSTER_THEME_FREE ? 'hidden' : 'info',
				),
				'seo_snippets'                  => array(
					'title' => esc_html__( 'SEO snippets', 'bugster' ),
					'desc'  => wp_kses_data( __( 'Add structured data markup to the single posts and pages', 'bugster' ) ),
					'std'   => 0,
					'type'  => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'privacy_text' => array(
					"title" => esc_html__("Text with Privacy Policy link", 'bugster'),
					"desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'bugster') ),
					"std"   => wp_kses_post( __( 'I agree that my submitted data is being collected and stored.', 'bugster') ),
					"type"  => "text"
				),



				// 'Header'
				//---------------------------------------------
				'header'                        => array(
					'title'    => esc_html__( 'Header', 'bugster' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 30,
					'type'     => 'section',
				),

				'header_style_info'             => array(
					'title' => esc_html__( 'Header style', 'bugster' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type'                   => array(
					'title'    => esc_html__( 'Header style', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'bugster' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'bugster' ),
					),
					'std'      => 'default',
					'options'  => bugster_get_list_header_footer_types(),
					'type'     => BUGSTER_THEME_FREE || ! bugster_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'bugster' ),
					'desc'       => wp_kses_post( __( 'Select custom header from Layouts Builder', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'bugster' ),
					),
					'dependency' => array(
						'header_type' => array( 'custom' ),
					),
					'std'        => BUGSTER_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position'               => array(
					'title'    => esc_html__( 'Header position', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'bugster' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'bugster' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_wide'                   => array(
					'title'      => esc_html__( 'Header fullwidth', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'bugster' ),
					),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 1,
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'menu_info'                     => array(
					'title' => esc_html__( 'Main menu', 'bugster' ),
					'desc'  => wp_kses_data( __( 'Select main menu style, position and other parameters', 'bugster' ) ),
					'type'  => BUGSTER_THEME_FREE ? 'hidden' : 'info',
				),
				'menu_style'                    => array(
					'title'    => esc_html__( 'Menu position', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select position of the main menu', 'bugster' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'bugster' ),
					),
					'std'      => 'top',
					'options'  => array(
						'top'   => esc_html__( 'Top', 'bugster' ),
					),
					'type'     => BUGSTER_THEME_FREE || ! bugster_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'menu_side_stretch'             => array(
					'title'      => esc_html__( 'Stretch sidemenu', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Stretch sidemenu to window height (if menu items number >= 5)', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'bugster' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 0,
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_side_icons'               => array(
					'title'      => esc_html__( 'Iconed sidemenu', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'bugster' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 1,
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_mobile_fullscreen'        => array(
					'title' => esc_html__( 'Mobile menu fullscreen', 'bugster' ),
					'desc'  => wp_kses_data( __( 'Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'bugster' ) ),
					'std'   => 1,
					'type'  => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_image_info'             => array(
					'title' => esc_html__( 'Header image', 'bugster' ),
					'desc'  => '',
					'type'  => BUGSTER_THEME_FREE ? 'hidden' : 'info',
				),
				'header_image_override'         => array(
					'title'    => esc_html__( 'Header image override', 'bugster' ),
					'desc'     => wp_kses_data( __( "Allow override the header image with the page's/post's/product's/etc. featured image", 'bugster' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'bugster' ),
					),
					'std'      => 1,
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_mobile_info'            => array(
					'title'      => esc_html__( 'Mobile header', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Configure the mobile version of the header', 'bugster' ) ),
					'priority'   => 500,
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'info',
				),
				'header_mobile_enabled'         => array(
					'title'      => esc_html__( 'Enable the mobile header', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Use the mobile version of the header (if checked) or relayout the current header on mobile devices', 'bugster' ) ),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_additional_info' => array(
					'title'      => esc_html__( 'Additional info', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Additional info to show at the top of the mobile header', 'bugster' ) ),
					'std'        => '',
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'refresh'    => false,
					'teeny'      => false,
					'rows'       => 20,
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'text_editor',
				),
				'header_mobile_hide_info'       => array(
					'title'      => esc_html__( 'Hide additional info', 'bugster' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_logo'       => array(
					'title'      => esc_html__( 'Hide logo', 'bugster' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_login'      => array(
					'title'      => esc_html__( 'Hide login/logout', 'bugster' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_search'     => array(
					'title'      => esc_html__( 'Hide search', 'bugster' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_cart'       => array(
					'title'      => esc_html__( 'Hide cart', 'bugster' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),



				// 'Footer'
				//---------------------------------------------
				'footer'                        => array(
					'title'    => esc_html__( 'Footer', 'bugster' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 50,
					'type'     => 'section',
				),
				'footer_type'                   => array(
					'title'    => esc_html__( 'Footer style', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'bugster' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'bugster' ),
					),
					'std'      => 'default',
					'options'  => bugster_get_list_header_footer_types(),
					'type'     => BUGSTER_THEME_FREE || ! bugster_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'bugster' ),
					'desc'       => wp_kses_post( __( 'Select custom footer from Layouts Builder', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'bugster' ),
					),
					'dependency' => array(
						'footer_type' => array( 'custom' ),
					),
					'std'        => BUGSTER_THEME_FREE ? 'footer-custom-elementor-footer-default' : 'footer-custom-footer-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets'                => array(
					'title'      => esc_html__( 'Footer widgets', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'bugster' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns'                => array(
					'title'      => esc_html__( 'Footer columns', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'bugster' ),
					),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'footer_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => bugster_get_list_range( 0, 6 ),
					'type'       => 'select',
				),
				'footer_wide'                   => array(
					'title'      => esc_html__( 'Footer fullwidth', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'bugster' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_in_footer'                => array(
					'title'      => esc_html__( 'Show logo', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Show logo in the footer', 'bugster' ) ),
					'refresh'    => false,
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_footer'                   => array(
					'title'      => esc_html__( 'Logo for footer', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo to display it in the footer', 'bugster' ) ),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'logo_in_footer' => array( 1 ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'logo_footer_retina'            => array(
					'title'      => esc_html__( 'Logo for footer (Retina)', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'bugster' ) ),
					'dependency' => array(
						'footer_type'         => array( 'default' ),
						'logo_in_footer'      => array( 1 ),
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'image',
				),
				'socials_in_footer'             => array(
					'title'      => esc_html__( 'Show social icons', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Show social icons in the footer (under logo or footer widgets)', 'bugster' ) ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => ! bugster_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'copyright'                     => array(
					'title'      => esc_html__( 'Copyright', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'bugster' ) ),
					'translate'  => true,
					'std'        => esc_html__( 'Copyright &copy; {Y} by ThemeREX. All rights reserved.', 'bugster' ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'refresh'    => false,
					'type'       => 'textarea',
				),



				// 'Mobile version'
				//---------------------------------------------
				'mobile'                        => array(
					'title'    => esc_html__( 'Mobile', 'bugster' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 55,
					'type'     => 'section',
				),

				'mobile_header_info'            => array(
					'title' => esc_html__( 'Header on the mobile device', 'bugster' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_mobile'            => array(
					'title'    => esc_html__( 'Header style', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use on mobile devices: the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'bugster' ) ),
					'std'      => 'inherit',
					'options'  => bugster_get_list_header_footer_types( true ),
					'type'     => BUGSTER_THEME_FREE || ! bugster_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_mobile'           => array(
					'title'      => esc_html__( 'Select custom layout', 'bugster' ),
					'desc'       => wp_kses_post( __( 'Select custom header from Layouts Builder', 'bugster' ) ),
					'dependency' => array(
						'header_type_mobile' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_mobile'        => array(
					'title'    => esc_html__( 'Header position', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'bugster' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),

				'mobile_sidebar_info'           => array(
					'title' => esc_html__( 'Sidebar on the mobile device', 'bugster' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_mobile'       => array(
					'title'    => esc_html__( 'Sidebar position on mobile', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar on mobile devices - above or below the content', 'bugster' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_mobile'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on mobile devices', 'bugster' ) ),
					'dependency' => array(
						'sidebar_position_mobile' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_mobile'         => array(
					'title'   => esc_html__( 'Expand content', 'bugster' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden on mobile devices', 'bugster' ) ),
					'refresh' => false,
					'dependency' => array(
						'sidebar_position_mobile' => array( 'hide', 'inherit' ),
					),
					'std'     => 'inherit',
					'options'  => bugster_get_list_checkbox_values( true ),
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),

				'mobile_footer_info'           => array(
					'title' => esc_html__( 'Footer on the mobile device', 'bugster' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'footer_type_mobile'           => array(
					'title'    => esc_html__( 'Footer style', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use on mobile devices: the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'bugster' ) ),
					'std'      => 'inherit',
					'options'  => bugster_get_list_header_footer_types(),
					'type'     => BUGSTER_THEME_FREE || ! bugster_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style_mobile'          => array(
					'title'      => esc_html__( 'Select custom layout', 'bugster' ),
					'desc'       => wp_kses_post( __( 'Select custom footer from Layouts Builder', 'bugster' ) ),
					'dependency' => array(
						'footer_type_mobile' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets_mobile'        => array(
					'title'      => esc_html__( 'Footer widgets', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'bugster' ) ),
					'dependency' => array(
						'footer_type_mobile' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns_mobile'        => array(
					'title'      => esc_html__( 'Footer columns', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'bugster' ) ),
					'dependency' => array(
						'footer_type_mobile'    => array( 'default' ),
						'footer_widgets_mobile' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => bugster_get_list_range( 0, 6 ),
					'type'       => 'select',
				),



				// 'Blog'
				//---------------------------------------------
				'blog'                          => array(
					'title'    => esc_html__( 'Blog', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Options of the the blog archive', 'bugster' ) ),
					'priority' => 70,
					'type'     => 'panel',
				),


				// Blog - Posts page
				//---------------------------------------------
				'blog_general'                  => array(
					'title' => esc_html__( 'Posts page', 'bugster' ),
					'desc'  => wp_kses_data( __( 'Style and components of the blog archive', 'bugster' ) ),
					'type'  => 'section',
				),
				'blog_general_info'             => array(
					'title'  => esc_html__( 'Posts page settings', 'bugster' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'bugster' ),
					'type'   => 'info',
				),
				'blog_style'                    => array(
					'title'      => esc_html__( 'Blog style', 'bugster' ),
					'desc'       => '',
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'excerpt',
					'qsetup'     => esc_html__( 'General', 'bugster' ),
					'options'    => array(),
					'type'       => 'select',
				),
				'first_post_large'              => array(
					'title'      => esc_html__( 'First post large', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Make your first post stand out by making it bigger', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style' => array( 'classic', 'masonry' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'blog_content'                  => array(
					'title'      => esc_html__( 'Posts content', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Display either post excerpts or the full post content', 'bugster' ) ),
					'std'        => 'excerpt',
					'dependency' => array(
						'blog_style' => array( 'excerpt' ),
					),
					'options'    => array(
						'excerpt'  => esc_html__( 'Excerpt', 'bugster' ),
						'fullpost' => esc_html__( 'Full post', 'bugster' ),
					),
					'type'       => 'switch',
				),
				'excerpt_length'                => array(
					'title'      => esc_html__( 'Excerpt length', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged', 'bugster' ) ),
					'dependency' => array(
						'blog_style'   => array( 'excerpt', 'modern' ),
						'blog_content' => array( 'excerpt' ),
					),
					'std'        => 55,
					'type'       => 'text',
				),
				'excerpt_modern_length'        => array(
					'title'      => esc_html__( 'Excerpt length for posts with featured image', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged', 'bugster' ) ),
					'dependency' => array(
						'blog_style'   => array( 'modern' ),
					),
					'std'        => 30,
					'type'       => 'text',
				),
				'blog_columns'                  => array(
					'title'   => esc_html__( 'Blog columns', 'bugster' ),
					'desc'    => wp_kses_data( __( 'How many columns should be used in the blog archive (from 2 to 4)?', 'bugster' ) ),
					'std'     => 2,
					'options' => bugster_get_list_range( 2, 4 ),
					'type'    => 'hidden',      // This options is available and must be overriden only for some modes (for example, 'shop')
				),
				'post_type'                     => array(
					'title'      => esc_html__( 'Post type', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select post type to show in the blog archive', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'linked'     => 'parent_cat',
					'refresh'    => false,
					'hidden'     => true,
					'std'        => 'post',
					'options'    => array(),
					'type'       => 'select',
				),
				'parent_cat'                    => array(
					'title'      => esc_html__( 'Category to show', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select category to show in the blog archive', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'refresh'    => false,
					'hidden'     => true,
					'std'        => '0',
					'options'    => array(),
					'type'       => 'select',
				),
				'posts_per_page'                => array(
					'title'      => esc_html__( 'Posts per page', 'bugster' ),
					'desc'       => wp_kses_data( __( 'How many posts will be displayed on this page', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'hidden'     => true,
					'std'        => '',
					'type'       => 'text',
				),
				'blog_pagination'               => array(
					'title'      => esc_html__( 'Pagination style', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Show Older/Newest posts or Page numbers below the posts list', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'std'        => 'pages',
					'qsetup'     => esc_html__( 'General', 'bugster' ),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'options'    => array(
						'pages'    => esc_html__( 'Page numbers', 'bugster' ),
						'links'    => esc_html__( 'Older/Newest', 'bugster' ),
						'more'     => esc_html__( 'Load more', 'bugster' ),
						'infinite' => esc_html__( 'Infinite scroll', 'bugster' ),
					),
					'type'       => 'select',
				),
				'blog_animation'                => array(
					'title'      => esc_html__( 'Animation for the posts', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'fadeInUpSmall',
					'options'    => array(),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'select',
				),
				'show_filters'                  => array(
					'title'      => esc_html__( 'Show filters', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Show categories as tabs to filter posts', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style'     => array( 'portfolio', 'gallery' ),
					),
					'hidden'     => true,
					'std'        => 0,
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_header_info'              => array(
					'title' => esc_html__( 'Header', 'bugster' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_blog'              => array(
					'title'    => esc_html__( 'Header style', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'bugster' ) ),
					'std'      => 'inherit',
					'options'  => bugster_get_list_header_footer_types( true ),
					'type'     => BUGSTER_THEME_FREE || ! bugster_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_blog'             => array(
					'title'      => esc_html__( 'Select custom layout', 'bugster' ),
					'desc'       => wp_kses_post( __( 'Select custom header from Layouts Builder', 'bugster' ) ),
					'dependency' => array(
						'header_type_blog' => array( 'custom' ),
					),
					'std'        => BUGSTER_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_blog'          => array(
					'title'    => esc_html__( 'Header position', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'bugster' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_blog'        => array(
					'title'    => esc_html__( 'Header fullheight', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'bugster' ) ),
					'std'      => 'inherit',
					'options'  => bugster_get_list_checkbox_values( true ),
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_wide_blog'              => array(
					'title'      => esc_html__( 'Header fullwidth', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'bugster' ) ),
					'dependency' => array(
						'header_type_blog' => array( 'default' ),
					),
					'std'      => 'inherit',
					'options'  => bugster_get_list_checkbox_values( true ),
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_sidebar_info'             => array(
					'title' => esc_html__( 'Sidebar', 'bugster' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_blog'         => array(
					'title'   => esc_html__( 'Sidebar position', 'bugster' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar', 'bugster' ) ),
					'std'     => 'right',
					'options' => array(),
					'qsetup'     => esc_html__( 'General', 'bugster' ),
					'type'    => 'switch',
				),
				'sidebar_position_ss_blog'  => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'bugster' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'      => 'inherit',
					'qsetup'   => esc_html__( 'General', 'bugster' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_blog'          => array(
					'title'      => esc_html__( 'Sidebar widgets', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'bugster' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'bugster' ),
					'type'       => 'select',
				),
				'expand_content_blog'           => array(
					'title'   => esc_html__( 'Expand content', 'bugster' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'bugster' ) ),
					'refresh' => false,
					'std'     => 'inherit',
					'options'  => bugster_get_list_checkbox_values( true ),
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_advanced_info'            => array(
					'title' => esc_html__( 'Advanced settings', 'bugster' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'no_image'                      => array(
					'title' => esc_html__( 'Image placeholder', 'bugster' ),
					'desc'  => wp_kses_data( __( 'Select or upload an image used as placeholder for posts without a featured image', 'bugster' ) ),
					'std'   => '',
					'type'  => 'image',
				),
				'time_diff_before'              => array(
					'title' => esc_html__( 'Easy Readable Date Format', 'bugster' ),
					'desc'  => wp_kses_data( __( "For how many days to show the easy-readable date format (e.g. '3 days ago') instead of the standard publication date", 'bugster' ) ),
					'std'   => 5,
					'type'  => 'text',
				),
				'sticky_style'                  => array(
					'title'   => esc_html__( 'Sticky posts style', 'bugster' ),
					'desc'    => wp_kses_data( __( 'Select style of the sticky posts output', 'bugster' ) ),
					'std'     => 'inherit',
					'options' => array(
						'inherit' => esc_html__( 'Decorated posts', 'bugster' ),
						'columns' => esc_html__( 'Mini-cards', 'bugster' ),
					),
					'type'    => BUGSTER_THEME_FREE ? 'hidden' : 'select',
				),
				'meta_parts'                    => array(
					'title'      => esc_html__( 'Post meta', 'bugster' ),
					'desc'       => wp_kses_data( __( "If your blog page is created using the 'Blog archive' page template, set up the 'Post Meta' settings in the 'Theme Options' section of that page. Post counters and Share Links are available only if plugin ThemeREX Addons is active", 'bugster' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|views=0|likes=0|comments=0|author=0|share=0|edit=0',
					'options'    => bugster_get_list_meta_parts(),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'checklist',
				),


				// Blog - Single posts
				//---------------------------------------------
				'blog_single'                   => array(
					'title' => esc_html__( 'Single posts', 'bugster' ),
					'desc'  => wp_kses_data( __( 'Settings of the single post', 'bugster' ) ),
					'type'  => 'section',
				),

				'blog_single_header_info'       => array(
					'title' => esc_html__( 'Header', 'bugster' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_single'            => array(
					'title'    => esc_html__( 'Header style', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'bugster' ) ),
					'std'      => 'inherit',
					'options'  => bugster_get_list_header_footer_types( true ),
					'type'     => BUGSTER_THEME_FREE || ! bugster_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_single'           => array(
					'title'      => esc_html__( 'Select custom layout', 'bugster' ),
					'desc'       => wp_kses_post( __( 'Select custom header from Layouts Builder', 'bugster' ) ),
					'dependency' => array(
						'header_type_single' => array( 'custom' ),
					),
					'std'        => BUGSTER_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_single'        => array(
					'title'    => esc_html__( 'Header position', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'bugster' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_single'      => array(
					'title'    => esc_html__( 'Header fullheight', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'bugster' ) ),
					'std'      => 'inherit',
					'options'  => bugster_get_list_checkbox_values( true ),
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_wide_single'            => array(
					'title'      => esc_html__( 'Header fullwidth', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'bugster' ) ),
					'dependency' => array(
						'header_type_single' => array( 'default' ),
					),
					'std'      => 'inherit',
					'options'  => bugster_get_list_checkbox_values( true ),
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_single_sidebar_info'      => array(
					'title' => esc_html__( 'Sidebar', 'bugster' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_single'       => array(
					'title'   => esc_html__( 'Sidebar position', 'bugster' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar on the single posts', 'bugster' ) ),
					'std'     => 'hide',
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'bugster' ),
					),
					'options' => array(),
					'type'    => 'switch',
				),
				'sidebar_position_ss_single'=> array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the single posts on the small screen - above or below the content', 'bugster' ) ),
					'override' => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'bugster' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'      => 'below',
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_single'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on the single posts', 'bugster' ) ),
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'bugster' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_single'           => array(
					'title'   => esc_html__( 'Expand content', 'bugster' ),
					'desc'    => wp_kses_data( __( 'Expand the content width on the single posts if the sidebar is hidden', 'bugster' ) ),
					'refresh' => false,
					'std'     => 0,
					'options'  => bugster_get_list_checkbox_values( true ),
					'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_single_title_info'      => array(
					'title' => esc_html__( 'Featured image and title', 'bugster' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'hide_featured_on_single'       => array(
					'title'    => esc_html__( 'Hide featured image on the single post', 'bugster' ),
					'desc'     => wp_kses_data( __( "Hide featured image on the single post's pages", 'bugster' ) ),
					'override' => array(
						'mode'    => 'page,post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'std'      => 0,
					'type'     => 'checkbox',
				),
				'post_thumbnail_type'      => array(
					'title'      => esc_html__( 'Type of post thumbnail', 'bugster' ),
					'desc'       => wp_kses_data( __( "Select type of post thumbnail on the single post's pages", 'bugster' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 ),
					),
					'std'        => 'default',
					'options'    => array(
						'fullwidth'   => esc_html__( 'Fullwidth', 'bugster' ),
						'boxed'       => esc_html__( 'Boxed', 'bugster' ),
						'default'     => esc_html__( 'Default', 'bugster' ),
					),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_position'          => array(
					'title'      => esc_html__( 'Post header position', 'bugster' ),
					'desc'       => wp_kses_data( __( "Select post header position on the single post's pages", 'bugster' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 )
					),
					'std'        => 'under',
					'options'    => array(
						'above'      => esc_html__( 'Above the post thumbnail', 'bugster' ),
						'under'      => esc_html__( 'Under the post thumbnail', 'bugster' ),
						'default'    => esc_html__( 'Default', 'bugster' ),
					),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_align'             => array(
					'title'      => esc_html__( 'Align of the post header', 'bugster' ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'post_header_position' => array( 'on_thumb' ),
					),
					'std'        => 'mc',
					'options'    => array(
						'ts' => esc_html__('Top Stick Out', 'bugster'),
						'tl' => esc_html__('Top Left', 'bugster'),
						'tc' => esc_html__('Top Center', 'bugster'),
						'tr' => esc_html__('Top Right', 'bugster'),
						'ml' => esc_html__('Middle Left', 'bugster'),
						'mc' => esc_html__('Middle Center', 'bugster'),
						'mr' => esc_html__('Middle Right', 'bugster'),
						'bl' => esc_html__('Bottom Left', 'bugster'),
						'bc' => esc_html__('Bottom Center', 'bugster'),
						'br' => esc_html__('Bottom Right', 'bugster'),
						'bs' => esc_html__('Bottom Stick Out', 'bugster'),
					),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'select',
				),
				'post_subtitle'                 => array(
					'title' => esc_html__( 'Post subtitle', 'bugster' ),
					'desc'  => wp_kses_data( __( "Specify post subtitle to display it under the post title.", 'bugster' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'std'   => '',
					'hidden' => true,
					'type'  => 'text',
				),
				'show_post_meta'                => array(
					'title' => esc_html__( 'Show post meta', 'bugster' ),
					'desc'  => wp_kses_data( __( "Display block with post's meta: date, categories, counters, etc.", 'bugster' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),
				'meta_parts_single'             => array(
					'title'      => esc_html__( 'Post meta', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Meta parts for single posts. Post counters and Share Links are available only if plugin ThemeREX Addons is active', 'bugster' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'bugster' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|views=0|likes=0|comments=0|author=1|share=0|edit=0',
					'options'    => bugster_get_list_meta_parts(),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'checklist',
				),
				'show_share_links'              => array(
					'title' => esc_html__( 'Show share links', 'bugster' ),
					'desc'  => wp_kses_data( __( 'Display share links on the single post', 'bugster' ) ),
					'std'   => 1,
					'type'  => ! bugster_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'show_author_info'              => array(
					'title' => esc_html__( 'Show author info', 'bugster' ),
					'desc'  => wp_kses_data( __( "Display block with information about post's author", 'bugster' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),

				'blog_single_related_info'      => array(
					'title' => esc_html__( 'Related posts', 'bugster' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'show_related_posts'            => array(
					'title'    => esc_html__( 'Show related posts', 'bugster' ),
					'desc'     => wp_kses_data( __( "Show section 'Related posts' on the single post's pages", 'bugster' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'std'      => 1,
					'type'     => 'checkbox',
				),
				'related_style'                 => array(
					'title'      => esc_html__( 'Related posts style', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select style of the related posts output', 'bugster' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'classic',
					'options'    => array(
						'classic' => esc_html__( 'Classic', 'bugster' ),
					),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_position'              => array(
					'title'      => esc_html__( 'Related posts position', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Select position to display the related posts', 'bugster' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'below_content',
					'options'    => array (
						'below_content' => esc_html__( 'After the content', 'bugster' ),
						'below_page'    => esc_html__( 'After the content & sidebar', 'bugster' ),
					),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'select',
				),
				'related_position_inside'       => array(
					'title'      => esc_html__( 'Before # paragraph', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Before what paragraph should related posts appear? If 0 - randomly.', 'bugster' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_position' => array( 'inside', 'inside_left', 'inside_right' ),
					),
					'std'        => 2,
					'options'    => bugster_get_list_range( 0, 9 ),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'select',
				),
				'related_posts'                 => array(
					'title'      => esc_html__( 'Related posts', 'bugster' ),
					'desc'       => wp_kses_data( __( 'How many related posts should be displayed in the single post? If 0 - no related posts are shown.', 'bugster' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'min'        => 1,
					'max'        => 9,
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'slider',
				),
				'related_columns'               => array(
					'title'      => esc_html__( 'Related columns', 'bugster' ),
					'desc'       => wp_kses_data( __( 'How many columns should be used to output related posts in the single page?', 'bugster' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_position' => array( 'inside', 'below_content', 'below_page' ),
					),
					'std'        => 2,
					'options'    => bugster_get_list_range( 1, 2 ),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider'                => array(
					'title'      => esc_html__( 'Use slider layout', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Use slider layout in case related posts count is more than columns count', 'bugster' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 0,
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'related_slider_controls'       => array(
					'title'      => esc_html__( 'Slider controls', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Show arrows in the slider', 'bugster' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'none',
					'options'    => array(
						'none'    => esc_html__('None', 'bugster'),
						'side'    => esc_html__('Side', 'bugster'),
						'outside' => esc_html__('Outside', 'bugster'),
						'top'     => esc_html__('Top', 'bugster'),
						'bottom'  => esc_html__('Bottom', 'bugster')
					),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'select',
				),
				'related_slider_pagination'       => array(
					'title'      => esc_html__( 'Slider pagination', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Show bullets after the slider', 'bugster' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'bottom',
					'options'    => array(
						'none'    => esc_html__('None', 'bugster'),
						'bottom'  => esc_html__('Bottom', 'bugster')
					),
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider_space'          => array(
					'title'      => esc_html__( 'Space', 'bugster' ),
					'desc'       => wp_kses_data( __( 'Space between slides', 'bugster' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'bugster' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 30,
					'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'text',
				),
				'blog_end'                      => array(
					'type' => 'panel_end',
				),



				// 'Colors'
				//---------------------------------------------
				'panel_colors'                  => array(
					'title'    => esc_html__( 'Colors', 'bugster' ),
					'desc'     => '',
					'priority' => 300,
					'type'     => 'section',
				),

				'color_schemes_info'            => array(
					'title'  => esc_html__( 'Color schemes', 'bugster' ),
					'desc'   => wp_kses_data( __( 'Color schemes for various parts of the site. "Inherit" means that this block is used the Site color scheme (the first parameter)', 'bugster' ) ),
					'hidden' => $hide_schemes,
					'type'   => 'info',
				),
				'color_scheme'                  => array(
					'title'    => esc_html__( 'Site Color Scheme', 'bugster' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'bugster' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'header_scheme'                 => array(
					'title'    => esc_html__( 'Header Color Scheme', 'bugster' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'bugster' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'sidebar_scheme'                => array(
					'title'    => esc_html__( 'Sidebar Color Scheme', 'bugster' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'bugster' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'footer_scheme'                 => array(
					'title'    => esc_html__( 'Footer Color Scheme', 'bugster' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'bugster' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),

				'color_scheme_editor_info'      => array(
					'title' => esc_html__( 'Color scheme editor', 'bugster' ),
					'desc'  => wp_kses_data( __( 'Select color scheme to modify. Attention! Only those sections in the site will be changed which this scheme was assigned to', 'bugster' ) ),
					'type'  => 'info',
				),
				'scheme_storage'                => array(
					'title'       => esc_html__( 'Color scheme editor', 'bugster' ),
					'desc'        => '',
					'std'         => '$bugster_get_scheme_storage',
					'refresh'     => false,
					'colorpicker' => 'tiny',
					'type'        => 'scheme_editor',
				),

				// Internal options.
				// Attention! Don't change any options in the section below!
				// Use huge priority to call render this elements after all options!
				'reset_options'                 => array(
					'title'    => '',
					'desc'     => '',
					'std'      => '0',
					'priority' => 10000,
					'type'     => 'hidden',
				),

				'last_option'                   => array(     // Need to manually call action to include Tiny MCE scripts
					'title' => '',
					'desc'  => '',
					'std'   => 1,
					'type'  => 'hidden',
				),

			)
		);



		// Prepare panel 'Fonts'
		// -------------------------------------------------------------
		$fonts = array(

			// 'Fonts'
			//---------------------------------------------
			'fonts'             => array(
				'title'    => esc_html__( 'Typography', 'bugster' ),
				'desc'     => '',
				'priority' => 200,
				'type'     => 'panel',
			),

			// Fonts - Load_fonts
			'load_fonts'        => array(
				'title' => esc_html__( 'Load fonts', 'bugster' ),
				'desc'  => wp_kses_data( __( 'Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'bugster' ) )
						. '<br>'
						. wp_kses_data( __( 'Attention! Press "Refresh" button to reload preview area after the all fonts are changed', 'bugster' ) ),
				'type'  => 'section',
			),
			'load_fonts_subset' => array(
				'title'   => esc_html__( 'Google fonts subsets', 'bugster' ),
				'desc'    => wp_kses_data( __( 'Specify comma separated list of the subsets which will be load from Google fonts', 'bugster' ) )
						. '<br>'
						. wp_kses_data( __( 'Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'bugster' ) ),
				'class'   => 'bugster_column-1_3 bugster_new_row',
				'refresh' => false,
				'std'     => '$bugster_get_load_fonts_subset',
				'type'    => 'text',
			),
		);

		for ( $i = 1; $i <= bugster_get_theme_setting( 'max_load_fonts' ); $i++ ) {
			if ( bugster_get_value_gp( 'page' ) != 'theme_options' ) {
				$fonts[ "load_fonts-{$i}-info" ] = array(
					// Translators: Add font's number - 'Font 1', 'Font 2', etc
					'title' => esc_html( sprintf( __( 'Font %s', 'bugster' ), $i ) ),
					'desc'  => '',
					'type'  => 'info',
				);
			}
			$fonts[ "load_fonts-{$i}-name" ]   = array(
				'title'   => esc_html__( 'Font name', 'bugster' ),
				'desc'    => '',
				'class'   => 'bugster_column-1_3 bugster_new_row',
				'refresh' => false,
				'std'     => '$bugster_get_load_fonts_option',
				'type'    => 'text',
			);
			$fonts[ "load_fonts-{$i}-family" ] = array(
				'title'   => esc_html__( 'Font family', 'bugster' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Select font family to use it if font above is not available', 'bugster' ) )
							: '',
				'class'   => 'bugster_column-1_3',
				'refresh' => false,
				'std'     => '$bugster_get_load_fonts_option',
				'options' => array(
					'inherit'    => esc_html__( 'Inherit', 'bugster' ),
					'serif'      => esc_html__( 'serif', 'bugster' ),
					'sans-serif' => esc_html__( 'sans-serif', 'bugster' ),
					'monospace'  => esc_html__( 'monospace', 'bugster' ),
					'cursive'    => esc_html__( 'cursive', 'bugster' ),
					'fantasy'    => esc_html__( 'fantasy', 'bugster' ),
				),
				'type'    => 'select',
			);
			$fonts[ "load_fonts-{$i}-styles" ] = array(
				'title'   => esc_html__( 'Font styles', 'bugster' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'bugster' ) )
								. '<br>'
								. wp_kses_data( __( 'Attention! Each weight and style increase download size! Specify only used weights and styles.', 'bugster' ) )
							: '',
				'class'   => 'bugster_column-1_3',
				'refresh' => false,
				'std'     => '$bugster_get_load_fonts_option',
				'type'    => 'text',
			);
		}
		$fonts['load_fonts_end'] = array(
			'type' => 'section_end',
		);

		// Fonts - H1..6, P, Info, Menu, etc.
		$theme_fonts = bugster_get_theme_fonts();
		foreach ( $theme_fonts as $tag => $v ) {
			$fonts[ "{$tag}_section" ] = array(
				'title' => ! empty( $v['title'] )
								? $v['title']
								// Translators: Add tag's name to make title 'H1 settings', 'P settings', etc.
								: esc_html( sprintf( __( '%s settings', 'bugster' ), $tag ) ),
				'desc'  => ! empty( $v['description'] )
								? $v['description']
								// Translators: Add tag's name to make description
								: wp_kses_post( sprintf( __( 'Font settings of the "%s" tag.', 'bugster' ), $tag ) ),
				'type'  => 'section',
			);

			foreach ( $v as $css_prop => $css_value ) {
				if ( in_array( $css_prop, array( 'title', 'description' ) ) ) {
					continue;
				}
				$options    = '';
				$type       = 'text';
				$load_order = 1;
				$title      = ucfirst( str_replace( '-', ' ', $css_prop ) );
				if ( 'font-family' == $css_prop ) {
					$type       = 'select';
					$options    = array();
					$load_order = 2;        // Load this option's value after all options are loaded (use option 'load_fonts' to build fonts list)
				} elseif ( 'font-weight' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'bugster' ),
						'100'     => esc_html__( '100 (Light)', 'bugster' ),
						'200'     => esc_html__( '200 (Light)', 'bugster' ),
						'300'     => esc_html__( '300 (Thin)', 'bugster' ),
						'400'     => esc_html__( '400 (Normal)', 'bugster' ),
						'500'     => esc_html__( '500 (Semibold)', 'bugster' ),
						'600'     => esc_html__( '600 (Semibold)', 'bugster' ),
						'700'     => esc_html__( '700 (Bold)', 'bugster' ),
						'800'     => esc_html__( '800 (Black)', 'bugster' ),
						'900'     => esc_html__( '900 (Black)', 'bugster' ),
					);
				} elseif ( 'font-style' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'bugster' ),
						'normal'  => esc_html__( 'Normal', 'bugster' ),
						'italic'  => esc_html__( 'Italic', 'bugster' ),
					);
				} elseif ( 'text-decoration' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'      => esc_html__( 'Inherit', 'bugster' ),
						'none'         => esc_html__( 'None', 'bugster' ),
						'underline'    => esc_html__( 'Underline', 'bugster' ),
						'overline'     => esc_html__( 'Overline', 'bugster' ),
						'line-through' => esc_html__( 'Line-through', 'bugster' ),
					);
				} elseif ( 'text-transform' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'    => esc_html__( 'Inherit', 'bugster' ),
						'none'       => esc_html__( 'None', 'bugster' ),
						'uppercase'  => esc_html__( 'Uppercase', 'bugster' ),
						'lowercase'  => esc_html__( 'Lowercase', 'bugster' ),
						'capitalize' => esc_html__( 'Capitalize', 'bugster' ),
					);
				}
				$fonts[ "{$tag}_{$css_prop}" ] = array(
					'title'      => $title,
					'desc'       => '',
					'class'      => 'bugster_column-1_5',
					'refresh'    => false,
					'load_order' => $load_order,
					'std'        => '$bugster_get_theme_fonts_option',
					'options'    => $options,
					'type'       => $type,
				);
			}

			$fonts[ "{$tag}_section_end" ] = array(
				'type' => 'section_end',
			);
		}

		$fonts['fonts_end'] = array(
			'type' => 'panel_end',
		);

		// Add fonts parameters to Theme Options
		bugster_storage_set_array_before( 'options', 'panel_colors', $fonts );

		// Add Header Video if WP version < 4.7
		// -----------------------------------------------------
		if ( ! function_exists( 'get_header_video_url' ) ) {
			bugster_storage_set_array_after(
				'options', 'header_image_override', 'header_video', array(
					'title'    => esc_html__( 'Header video', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select video to use it as background for the header', 'bugster' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'bugster' ),
					),
					'std'      => '',
					'type'     => 'video',
				)
			);
		}

		// Add option 'logo' if WP version < 4.5
		// or 'custom_logo' if current page is not 'Customize'
		// ------------------------------------------------------
		if ( ! function_exists( 'the_custom_logo' ) || ! bugster_check_url( 'customize.php' ) ) {
			bugster_storage_set_array_before(
				'options', 'logo_retina', function_exists( 'the_custom_logo' ) ? 'custom_logo' : 'logo', array(
					'title'    => esc_html__( 'Logo', 'bugster' ),
					'desc'     => wp_kses_data( __( 'Select or upload the site logo', 'bugster' ) ),
					'class'    => 'bugster_column-1_2 bugster_new_row',
					'priority' => 60,
					'std'      => '',
					'qsetup'   => esc_html__( 'General', 'bugster' ),
					'type'     => 'image',
				)
			);
		}

	}
}


// Returns a list of options that can be overridden for CPT
if ( ! function_exists( 'bugster_options_get_list_cpt_options' ) ) {
	function bugster_options_get_list_cpt_options( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return array(
			"content_info_{$cpt}"           => array(
				'title' => esc_html__( 'Content', 'bugster' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"body_style_{$cpt}"             => array(
				'title'    => esc_html__( 'Body style', 'bugster' ),
				'desc'     => wp_kses_data( __( 'Select width of the body content', 'bugster' ) ),
				'std'      => 'inherit',
				'options'  => bugster_get_list_body_styles( true ),
				'type'     => 'select',
			),
			"boxed_bg_image_{$cpt}"         => array(
				'title'      => esc_html__( 'Boxed bg image', 'bugster' ),
				'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'bugster' ) ),
				'dependency' => array(
					"body_style_{$cpt}" => array( 'boxed' ),
				),
				'std'        => 'inherit',
				'type'       => 'image',
			),
			"header_info_{$cpt}"            => array(
				'title' => esc_html__( 'Header', 'bugster' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"header_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Header style', 'bugster' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'bugster' ) ),
				'std'     => 'inherit',
				'options' => bugster_get_list_header_footer_types( true ),
				'type'    => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'bugster' ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select custom layout to display the site header on the %s pages', 'bugster' ), $title ) ),
				'dependency' => array(
					"header_type_{$cpt}" => array( 'custom' ),
				),
				'std'        => 'inherit',
				'options'    => array(),
				'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'select',
			),
			"header_position_{$cpt}"        => array(
				'title'   => esc_html__( 'Header position', 'bugster' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to display the site header on the %s pages', 'bugster' ), $title ) ),
				'std'     => 'inherit',
				'options' => array(),
				'type'    => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_image_override_{$cpt}"  => array(
				'title'   => esc_html__( 'Header image override', 'bugster' ),
				'desc'    => wp_kses_data( __( "Allow override the header image with the post's featured image", 'bugster' ) ),
				'std'     => 'inherit',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'bugster' ),
					1         => esc_html__( 'Yes', 'bugster' ),
					0         => esc_html__( 'No', 'bugster' ),
				),
				'type'    => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
			),

			"sidebar_info_{$cpt}"           => array(
				'title' => esc_html__( 'Sidebar', 'bugster' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"sidebar_position_{$cpt}"       => array(
				'title'   => sprintf( __( 'Sidebar position on the %s list', 'bugster' ), $title ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the %s list', 'bugster' ), $title ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_ss_{$cpt}"=> array(
				'title'    => sprintf( __( 'Sidebar position on the %s list on the small screen', 'bugster' ), $title ),
				'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'bugster' ) ),
				'std'      => 'below',
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_{$cpt}"        => array(
				'title'      => wp_kses_data( sprintf( __( 'Sidebar widgets on the %s list', 'bugster' ), $title ) ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select sidebar to show on the %s list', 'bugster' ), $title ) ),
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"sidebar_position_single_{$cpt}"       => array(
				'title'   => sprintf( __( 'Sidebar position on the single post', 'bugster' ), $title ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the single posts of the %s', 'bugster' ), $title ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_ss_single_{$cpt}"=> array(
				'title'    => esc_html__( 'Sidebar position on the single post on the small screen', 'bugster' ),
				'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'bugster' ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'      => 'below',
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_single_{$cpt}"        => array(
				'title'      => wp_kses_data( sprintf( __( 'Sidebar widgets on the single post', 'bugster' ), $title ) ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select widgets to show in the sidebar on the single posts of the %s', 'bugster' ), $title ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"expand_content_{$cpt}"         => array(
				'title'   => esc_html__( 'Expand content', 'bugster' ),
				'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'bugster' ) ),
				'refresh' => false,
				'std'     => 'inherit',
				'options'  => bugster_get_list_checkbox_values( true ),
				'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
			),
			"expand_content_single_{$cpt}"         => array(
				'title'   => esc_html__( 'Expand content on the single post', 'bugster' ),
				'desc'    => wp_kses_data( __( 'Expand the content width on the single post if the sidebar is hidden', 'bugster' ) ),
				'refresh' => false,
				'std'     => true,
				'options'  => bugster_get_list_checkbox_values( true ),
				'type'     => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
			),

			"footer_info_{$cpt}"            => array(
				'title' => esc_html__( 'Footer', 'bugster' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"footer_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Footer style', 'bugster' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'bugster' ) ),
				'std'     => 'inherit',
				'options' => bugster_get_list_header_footer_types( true ),
				'type'    => BUGSTER_THEME_FREE ? 'hidden' : 'switch',
			),
			"footer_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'bugster' ),
				'desc'       => wp_kses_data( __( 'Select custom layout to display the site footer', 'bugster' ) ),
				'std'        => 'inherit',
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'custom' ),
				),
				'options'    => array(),
				'type'       => BUGSTER_THEME_FREE ? 'hidden' : 'select',
			),
			"footer_widgets_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer widgets', 'bugster' ),
				'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'bugster' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 'footer_widgets',
				'options'    => array(),
				'type'       => 'select',
			),
			"footer_columns_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer columns', 'bugster' ),
				'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'bugster' ) ),
				'dependency' => array(
					"footer_type_{$cpt}"    => array( 'default' ),
					"footer_widgets_{$cpt}" => array( '^hide' ),
				),
				'std'        => 0,
				'options'    => bugster_get_list_range( 0, 6 ),
				'type'       => 'select',
			),
			"footer_wide_{$cpt}"            => array(
				'title'      => esc_html__( 'Footer fullwidth', 'bugster' ),
				'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'bugster' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 0,
				'type'       => 'checkbox',
			),
		);
	}
}


// Return lists with choises when its need in the admin mode
if ( ! function_exists( 'bugster_options_get_list_choises' ) ) {
	add_filter( 'bugster_filter_options_get_list_choises', 'bugster_options_get_list_choises', 10, 2 );
	function bugster_options_get_list_choises( $list, $id ) {
		if ( is_array( $list ) && count( $list ) == 0 ) {
			if ( strpos( $id, 'header_style' ) === 0 ) {
				$list = bugster_get_list_header_styles( strpos( $id, 'header_style_' ) === 0 );
			} elseif ( strpos( $id, 'header_position' ) === 0 ) {
				$list = bugster_get_list_header_positions( strpos( $id, 'header_position_' ) === 0 );
			} elseif ( strpos( $id, 'header_widgets' ) === 0 ) {
				$list = bugster_get_list_sidebars( strpos( $id, 'header_widgets_' ) === 0, true );
			} elseif ( strpos( $id, '_scheme' ) > 0 ) {
				$list = bugster_get_list_schemes( 'color_scheme' != $id );
			} elseif ( strpos( $id, 'sidebar_widgets' ) === 0 ) {
				$list = bugster_get_list_sidebars( 'sidebar_widgets_single' != $id && ( strpos( $id, 'sidebar_widgets_' ) === 0 || strpos( $id, 'sidebar_widgets_single_' ) === 0 ), true );
			} elseif ( strpos( $id, 'sidebar_position_ss' ) === 0 ) {
				$list = bugster_get_list_sidebars_positions_ss( strpos( $id, 'sidebar_position_ss_' ) === 0 );
			} elseif ( strpos( $id, 'sidebar_position' ) === 0 ) {
				$list = bugster_get_list_sidebars_positions( strpos( $id, 'sidebar_position_' ) === 0 );
			} elseif ( strpos( $id, 'widgets_above_page' ) === 0 ) {
				$list = bugster_get_list_sidebars( strpos( $id, 'widgets_above_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_above_content' ) === 0 ) {
				$list = bugster_get_list_sidebars( strpos( $id, 'widgets_above_content_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_page' ) === 0 ) {
				$list = bugster_get_list_sidebars( strpos( $id, 'widgets_below_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_content' ) === 0 ) {
				$list = bugster_get_list_sidebars( strpos( $id, 'widgets_below_content_' ) === 0, true );
			} elseif ( strpos( $id, 'footer_style' ) === 0 ) {
				$list = bugster_get_list_footer_styles( strpos( $id, 'footer_style_' ) === 0 );
			} elseif ( strpos( $id, 'footer_widgets' ) === 0 ) {
				$list = bugster_get_list_sidebars( strpos( $id, 'footer_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'blog_style' ) === 0 ) {
				$list = bugster_get_list_blog_styles( strpos( $id, 'blog_style_' ) === 0 );
			} elseif ( strpos( $id, 'post_type' ) === 0 ) {
				$list = bugster_get_list_posts_types();
			} elseif ( strpos( $id, 'parent_cat' ) === 0 ) {
				$list = bugster_array_merge( array( 0 => esc_html__( '- Select category -', 'bugster' ) ), bugster_get_list_categories() );
			} elseif ( strpos( $id, 'blog_animation' ) === 0 ) {
				$list = bugster_get_list_animations_in();
			} elseif ( 'color_scheme_editor' == $id ) {
				$list = bugster_get_list_schemes();
			} elseif ( strpos( $id, '_font-family' ) > 0 ) {
				$list = bugster_get_list_load_fonts( true );
			}
		}
		return $list;
	}
}
