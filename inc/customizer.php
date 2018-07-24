<?php
/**
 * Apollo Hotel Theme Customizer.
 *
 * @package Apollo Hotel
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function astrothemes_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
			'selector'        => '.navbar-brand a',
			'render_callback' => 'astrothemes_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array(
			'selector'        => '.navbar-brand-description',
			'render_callback' => 'astrothemes_customize_partial_blogdescription',
		)
	);

	$color_scheme = astrothemes_get_color_scheme();

	// Add section for colors.
	$wp_customize->add_section( 'astrothemes_colors' , array(
		'title'      => __( 'Colors', 'apollohotel' ),
		'priority'   => 30,
	) );

	// Add body background color setting and control.
	$wp_customize->add_setting( 'body_bg_color', array(
			'default'           => $color_scheme[0],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' 		=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_bg_color', array(
			'label'    => __( 'Body Background Color', 'apollohotel' ),
			'section'  => 'astrothemes_colors',
			'settings' => 'body_bg_color',
	) ) );
	
	// Add font color setting and control.
	$wp_customize->add_setting( 'font_color', array(
			'default'           => $color_scheme[5],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' 		=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'font_color', array(
			'label'    => __( 'Font Color', 'apollohotel' ),
			'section'  => 'astrothemes_colors',
			'settings' => 'font_color',
	) ) );

	// Add link color setting and control.
	$wp_customize->add_setting( 'link_color', array(
			'default'           => $color_scheme[8],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' 		=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
			'label'    => __( 'Link Color', 'apollohotel' ),
			'section'  => 'astrothemes_colors',
			'settings' => 'link_color',
	) ) );

	// Add link color setting and control.
	$wp_customize->add_setting( 'link_hover_color', array(
			'default'           => $color_scheme[9],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' 		=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
			'label'    => __( 'Link Hover Color', 'apollohotel' ),
			'section'  => 'astrothemes_colors',
			'settings' => 'link_hover_color',
	) ) );

	// Add main content background color setting and control.
	$wp_customize->add_setting( 'main_content_bg_color', array(
			'default'           => $color_scheme[1],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' 		=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_content_bg_color', array(
			'label'    => __( 'Main Content Background Color', 'apollohotel' ),
			'section'  => 'astrothemes_colors',
			'settings' => 'main_content_bg_color',
	) ) );

	// Add header background color setting and control.
	$wp_customize->add_setting( 'header_bg_color', array(
			'default'           => $color_scheme[2],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' 		=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', array(
			'label'    => __( 'Header Background Color', 'apollohotel' ),
			'section'  => 'astrothemes_colors',
			'settings' => 'header_bg_color',
	) ) );

	// Add title color setting and control.
	$wp_customize->add_setting( 'title_color', array(
			'default'           => $color_scheme[3],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' 		=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_color', array(
			'label'    => __( 'Title Color', 'apollohotel' ),
			'section'  => 'astrothemes_colors',
			'settings' => 'title_color',
	) ) );

	// Add title in-page color setting and control.
	$wp_customize->add_setting( 'title_inpage_color', array(
			'default'           => $color_scheme[4],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' 		=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_inpage_color', array(
			'label'    => __( 'Title In Page Color', 'apollohotel' ),
			'section'  => 'astrothemes_colors',
			'settings' => 'title_inpage_color',
	) ) );

	// Add post meta color setting and control.
	$wp_customize->add_setting( 'post_meta_color', array(
			'default'           => $color_scheme[6],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' 		=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_meta_color', array(
			'label'    => __( 'Post Meta Color', 'apollohotel' ),
			'section'  => 'astrothemes_colors',
			'settings' => 'post_meta_color',
	) ) );

	// Add navbar color setting and control.
	$wp_customize->add_setting( 'navbar_color', array(
			'default'           => $color_scheme[7],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' 		=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navbar_color', array(
			'label'    => __( 'Main Menu Color', 'apollohotel' ),
			'section'  => 'astrothemes_colors',
			'settings' => 'navbar_color',
	) ) );

	// Add sidebar background color setting and control.
	$wp_customize->add_setting( 'sidebar_bg_color', array(
			'default'           => $color_scheme[10],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' 		=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_bg_color', array(
			'label'    => __( 'Sidebar Background Color', 'apollohotel' ),
			'section'  => 'astrothemes_colors',
			'settings' => 'sidebar_bg_color',
	) ) );

	// Add footer background color setting and control.
	$wp_customize->add_setting( 'footer_bg_color', array(
			'default'           => $color_scheme[11],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' 		=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
			'label'    => __( 'Footer Background Color', 'apollohotel' ),
			'section'  => 'astrothemes_colors',
			'settings' => 'footer_bg_color',
	) ) );

	// Add footer font color setting and control.
	$wp_customize->add_setting( 'footer_color', array(
			'default'           => $color_scheme[12],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' 		=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color', array(
			'label'    => __( 'Footer Color', 'apollohotel' ),
			'section'  => 'astrothemes_colors',
			'settings' => 'footer_color',
	) ) );

}
add_action( 'customize_register', 'astrothemes_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function astrothemes_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function astrothemes_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Enqueues front-end CSS for the body background color.
 *
 * @see wp_add_inline_style()
 */
function astrothemes_body_bg_color_css() {
	$color_scheme   = astrothemes_get_color_scheme();
	$default_color 	= $color_scheme[0];
	$custom_color 	= get_theme_mod( 'body_bg_color' );

	if ( ($custom_color === $default_color) || !$custom_color ) { return; }

	$css_style = 'body { background-color: %1$s; }';
	wp_add_inline_style( 'apollohotel-css-style', sprintf( $css_style, esc_attr( $custom_color ) ) );
}
add_action( 'wp_enqueue_scripts', 'astrothemes_body_bg_color_css' );

/**
 * Enqueues front-end CSS for the main content background color.
 *
 * @see wp_add_inline_style()
 */
function astrothemes_main_content_bg_color_css() {
	$color_scheme   = astrothemes_get_color_scheme();
	$default_color 	= $color_scheme[1];
	$custom_color 	= get_theme_mod( 'main_content_bg_color' );

	if ( ($custom_color === $default_color) || !$custom_color ) { return; }

	$css_style = '.main-content, .home-section, .news-section {	background-color: %1$s;	}';
	wp_add_inline_style( 'apollohotel-css-style', sprintf( $css_style, esc_attr( $custom_color ) ) );
}
add_action( 'wp_enqueue_scripts', 'astrothemes_main_content_bg_color_css' );

/**
 * Enqueues front-end CSS for the header background color.
 *
 * @see wp_add_inline_style()
 */
function astrothemes_header_bg_color_css() {
	$color_scheme   = astrothemes_get_color_scheme();
	$default_color 	= $color_scheme[2];
	$custom_color 	= get_theme_mod( 'header_bg_color' );

	if ( ($custom_color === $default_color) || !$custom_color ) { return; }

	$css_style = 'header { background-color: %1$s; }';
	wp_add_inline_style( 'apollohotel-css-style', sprintf( $css_style, esc_attr( $custom_color ) ) );
}
add_action( 'wp_enqueue_scripts', 'astrothemes_header_bg_color_css' );

/**
 * Enqueues front-end CSS for the title color.
 *
 * @see wp_add_inline_style()
 */
function astrothemes_title_color_css() {
	$color_scheme   = astrothemes_get_color_scheme();
	$default_color 	= $color_scheme[3];
	$custom_color 	= get_theme_mod( 'title_color' );

	if ( ($custom_color === $default_color) || !$custom_color ) { return; }

	$css_style = '.page-header h1 {	color: %1$s; }';
	wp_add_inline_style( 'apollohotel-css-style', sprintf( $css_style, esc_attr( $custom_color ) ) );
}
add_action( 'wp_enqueue_scripts', 'astrothemes_title_color_css' );

/**
 * Enqueues front-end CSS for the title in-page color.
 *
 * @see wp_add_inline_style()
 */
function astrothemes_title_inpage_color_css() {
	$color_scheme   = astrothemes_get_color_scheme();
	$default_color 	= $color_scheme[4];
	$custom_color 	= get_theme_mod( 'title_inpage_color' );

	if ( ($custom_color === $default_color) || !$custom_color ) { return; }

	$css_style = 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color: %1$s; }';
	wp_add_inline_style( 'apollohotel-css-style', sprintf( $css_style, esc_attr( $custom_color ) ) );
}
add_action( 'wp_enqueue_scripts', 'astrothemes_title_inpage_color_css' );

/**
 * Enqueues front-end CSS for the font color.
 *
 * @see wp_add_inline_style()
 */
function astrothemes_font_color_css() {
	$color_scheme   = astrothemes_get_color_scheme();
	$default_color 	= $color_scheme[5];
	$custom_color 	= get_theme_mod( 'font_color' );

	if ( ($custom_color === $default_color) || !$custom_color ) { return; }

	$css_style = 'body { color: %1$s; } .sidebar .widget ul li:before { color: %1$s; }';
	wp_add_inline_style( 'apollohotel-css-style', sprintf( $css_style, esc_attr( $custom_color ) ) );
}
add_action( 'wp_enqueue_scripts', 'astrothemes_font_color_css' );

/**
 * Enqueues front-end CSS for the post-meta color.
 *
 * @see wp_add_inline_style()
 */
function astrothemes_post_meta_color_css() {
	$color_scheme   = astrothemes_get_color_scheme();
	$default_color 	= $color_scheme[6];
	$custom_color 	= get_theme_mod( 'post_meta_color' );

	if ( ($custom_color === $default_color) || !$custom_color ) { return; }

	$css_style = 'header .navbar-brand-description { color: %1$s; } .post-meta, .post-date { color: %1$s; } .loop-post .article-inner { border-bottom-color: %1$s; } .comment-timestamp { color: %1$s; } 
	.sidebar .widget.widget_recent_entries ul li .post-date { color: %1$s; } .sidebar .widget_archive li { color: %1$s; } .sidebar .widget .rss-date { color: %1$s; }';
	wp_add_inline_style( 'apollohotel-css-style', sprintf( $css_style, esc_attr( $custom_color ) ) );
}
add_action( 'wp_enqueue_scripts', 'astrothemes_post_meta_color_css' );

/**
 * Enqueues front-end CSS for the post-meta color.
 *
 * @see wp_add_inline_style()
 */
function astrothemes_navbar_color_css() {
	$color_scheme   = astrothemes_get_color_scheme();
	$default_color 	= $color_scheme[7];
	$custom_color 	= get_theme_mod( 'navbar_color' );

	if ( ($custom_color === $default_color) || !$custom_color ) { return; }

	$css_style = '.navbar-light .navbar-nav .nav-link {	color: %1$s; }';
	wp_add_inline_style( 'apollohotel-css-style', sprintf( $css_style, esc_attr( $custom_color ) ) );
}
add_action( 'wp_enqueue_scripts', 'astrothemes_navbar_color_css' );

/**
 * Enqueues front-end CSS for the link color.
 *
 * @see wp_add_inline_style()
 */
function astrothemes_link_color_css() {
	$color_scheme   = astrothemes_get_color_scheme();
	$default_color 	= $color_scheme[8];
	$custom_color 	= get_theme_mod( 'link_color' );

	if ( ($custom_color === $default_color) || !$custom_color ) { return; }

	$css_style = 'a { color: %1$s; } header { border-color: %1$s; }
		#to_top { background: %1$s; } #loader:not(:required)::after { border-top-color: %1$s; }
		.navbar-light .navbar-nav .active > .nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show > .nav-link { color: %1$s; }
		.btn-primary { background-color: %1$s; border-color: %1$s; }
		header nav a:hover, header nav a.dropdown-item:hover { color: %1$s; }
		.navbar-light .navbar-toggler { border-color: %1$s; }';
	wp_add_inline_style( 'apollohotel-css-style', sprintf( $css_style, esc_attr( $custom_color ) ) );
}
add_action( 'wp_enqueue_scripts', 'astrothemes_link_color_css' );

/**
 * Enqueues front-end CSS for the link hover color.
 *
 * @see wp_add_inline_style()
 */
function astrothemes_link_hover_color_css() {
	$color_scheme   = astrothemes_get_color_scheme();
	$default_color 	= $color_scheme[9];
	$custom_color 	= get_theme_mod( 'link_hover_color' );

	if ( ($custom_color === $default_color) || !$custom_color ) { return; }

	$css_style = 'a:active, a:hover { color: %1$s; }';
	wp_add_inline_style( 'apollohotel-css-style', sprintf( $css_style, esc_attr( $custom_color ) ) );
}
add_action( 'wp_enqueue_scripts', 'astrothemes_link_hover_color_css' );

/**
 * Enqueues front-end CSS for the sidebar background color.
 *
 * @see wp_add_inline_style()
 */
function astrothemes_sidebar_background_color_css() {
	$color_scheme   = astrothemes_get_color_scheme();
	$default_color 	= $color_scheme[10];
	$custom_color 	= get_theme_mod( 'sidebar_bg_color' );

	if ( ($custom_color === $default_color) || !$custom_color ) { return; }

	$css_style = '.sidebar { background-color: %1$s; } .navigation-loop .page-numbers { background-color: %1$s; }';
	wp_add_inline_style( 'apollohotel-css-style', sprintf( $css_style, esc_attr( $custom_color ) ) );
}
add_action( 'wp_enqueue_scripts', 'astrothemes_sidebar_background_color_css' );

/**
 * Enqueues front-end CSS for the footer background color.
 *
 * @see wp_add_inline_style()
 */
function astrothemes_footer_background_color_css() {
	$color_scheme   = astrothemes_get_color_scheme();
	$default_color 	= $color_scheme[11];
	$custom_color 	= get_theme_mod( 'footer_bg_color' );

	if ( ($custom_color === $default_color) || !$custom_color ) { return; }

	$css_style = '.page-header { background-color: %1$s; } 
	.sidebar #wp-calendar caption, .sidebar #wp-calendar th { background-color: %1$s; } 
	figcaption, .gallery-caption, .wp-caption-text { background-color: %1$s; } 
	.carousel-section .carousel-control-prev-icon, .carousel-section .carousel-control-next-icon { background-color: %1$s; } 
	footer { background-color: %1$s; }';
	wp_add_inline_style( 'apollohotel-css-style', sprintf( $css_style, esc_attr( $custom_color ) ) );
}
add_action( 'wp_enqueue_scripts', 'astrothemes_footer_background_color_css' );

/**
 * Enqueues front-end CSS for the footer background color.
 *
 * @see wp_add_inline_style()
 */
function astrothemes_footer_color_css() {
	$color_scheme   = astrothemes_get_color_scheme();
	$default_color 	= $color_scheme[12];
	$custom_color 	= get_theme_mod( 'footer_color' );

	if ( ($custom_color === $default_color) || !$custom_color ) { return; }

	$css_style = 'footer { color: %1$s; } .footer-columns .titlewidget { color: %1$s; }';
	wp_add_inline_style( 'apollohotel-css-style', sprintf( $css_style, esc_attr( $custom_color ) ) );
}
add_action( 'wp_enqueue_scripts', 'astrothemes_footer_color_css' );

/**
 * Registers color schemes for Apollo Hotel.
 *
 * Can be filtered with {@see 'astrothemes_get_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Main Content Background Color.
 *
 * @return array An associative array of color scheme options.
 */
function astrothemes_get_color_schemes() {
	/**
	 * Filter the color schemes registered for use with Apollo Hotel.
	 *
	 * @param array $schemes {
	 *     Associative array of color schemes data.
	 *
	 *     @type array $slug {
	 *         Associative array of information for setting up the color scheme.
	 *
	 *         @type string $label  Color scheme label.
	 *         @type array  $colors HEX codes for default colors prepended with a hash symbol ('#').
	 *                              Colors are defined in the following order: Main background, page
	 *                              background, link, main text, secondary text.
	 *     }
	 * }
	 */
	 
	return apply_filters( 'astrothemes_color_schemes', array(
		'default' => array(
			'label'  => __( 'Default', 'apollohotel' ),
			'colors' => array(
				'#f6f6f6', 	// [0] background color 
				'#f6f6f6', 	// [1] main content background color
				'#ffffff', 	// [2] header background color
				'#ffffff', 	// [3] title h1 color
				'#b3925a', 	// [4] title in-page color
				'#666666', 	// [5] font color
				'#999999', 	// [6] post meta color
				'#4f4200',	// [7] navbar font color
				'#b3925a',	// [8] link color
				'#9b8258',	// [9] link hover color
				'#fffcf9',	// [10] sidebar background color 
				'#322b1f',	// [11] footer background color 
				'#f6f6f6',	// [12] footer color 
			),
		),
	) );
}

/**
 * Retrieves the current Apollo Hotel color scheme.
 *
 * Create your own astrothemes_get_color_scheme() function to override in a child theme.
 *
 * @return array An associative array of either the current or default color scheme HEX values.
 */
function astrothemes_get_color_scheme() {
	$color_scheme_option 	= get_theme_mod( 'color_scheme', 'default' );
	$color_schemes       	= astrothemes_get_color_schemes();

	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
		return $color_schemes[ $color_scheme_option ]['colors'];
	}

	return $color_schemes['default']['colors'];
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function astrothemes_customize_preview_js() {
	wp_enqueue_script( 'astrothemes-customize-preview', get_theme_file_uri( '/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'astrothemes_customize_preview_js' );


/**
 * Sets up the WordPress core custom header and custom background features.
 */
function astrothemes_custom_header_and_background() {
	$color_scheme 		= astrothemes_get_color_scheme();
	$default_bg_color	= sanitize_hex_color_no_hash( $color_scheme[0], '#' );

	/**
	 * Filter the arguments used when adding 'custom-background' support in Apollo Hotel.
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 *
	 *     @type string $default-color Default color of the background.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'astrothemes_custom_background_args', array(
		'default-color' => $default_bg_color,
	) ) );

}
add_action( 'after_setup_theme', 'astrothemes_custom_header_and_background' );
