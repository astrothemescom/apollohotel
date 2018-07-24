<?php
/**
 * Apollo Hotel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! function_exists( 'astrothemes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function astrothemes_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'apollohotel' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

	/**
	 * Add image size for the theme style.
	 */
	//add_image_size( 'apollohotel-slideshow', 1920, 1080, true );
	add_image_size( 'apollohotel-slideshow', 1800, 800, true );
	add_image_size( 'apollohotel-slideshow-lg', 1400, 600, true );
	add_image_size( 'apollohotel-slideshow-md', 800, 600, true );
	add_image_size( 'apollohotel-slideshow-sm', 600, 600, true );
	add_image_size( 'apollohotel-featured-page', 800, 400, true );
	add_image_size( 'apollohotel-thumbnail', 600, 420, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Main Menu', 'apollohotel' )
	) );

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 
		'comment-form', 
		'comment-list', 
		'gallery', 
		'caption', 
	) );

	/**
	 * Add support for Custom Logo.
	 */
	add_theme_support( 'custom-logo', array(
	   'height'      => 100,
	   'width'       => 200,
	   'flex-width'  => true,
	   'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for Boostrap Nav Menu Walker
	 * https://github.com/dupkey/bs4navwalker
	 */
	require_once( get_template_directory() . '/inc/bs4navwalker.php' );

	/**
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', astrothemes_fonts_url() ) );

	/**
	 * Add support for Customizer.
	 */
	require_once( get_template_directory() . '/inc/customizer.php' );

}
endif; // astrothemes_setup
add_action( 'after_setup_theme', 'astrothemes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) $content_width = 1140;

/**
 * Register custom fonts.
 */
function astrothemes_fonts_url() {
	
	$fonts_url 			= '';
	$font_families    	= array();
	$subsets   			= 'latin,latin-ext';
	
	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Lato, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'apollohotel' ) ) {
		$font_families[] = 'Lato:300,300i,400,400i,700,700i';
	}

	if ( $font_families ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return esc_url_raw($fonts_url);
}

/**
 * Add preconnect for Google Fonts.
 */
function astrothemes_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'apollohotel-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => '//fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'astrothemes_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function astrothemes_widgets_init() {
	
    // sidebar standard
	register_sidebar( array(
        'name' 			=> __( 'Main Sidebar', 'apollohotel' ),
        'id' 			=> 'sidebar',
        'description' 	=> __( 'Widgets in this area will be shown on all posts and pages.', 'apollohotel' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		) );

	// footer col-1
	register_sidebar( array(
        'name' 			=> __( 'Footer: Column 1', 'apollohotel' ),
        'id' 			=> 'footer-col-1',
        'description' 	=> __( 'Widgets in this area will be shown on all posts and pages.', 'apollohotel' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="titlewidget">',
		'after_title'   => '</h2>',
		) );

	// footer col-2
	register_sidebar( array(
        'name' 			=> __( 'Footer: Column 2', 'apollohotel' ),
        'id' 			=> 'footer-col-2',
        'description' 	=> __( 'Widgets in this area will be shown on all posts and pages.', 'apollohotel' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="titlewidget">',
		'after_title'   => '</h2>',
		) );

	// footer col-3
	register_sidebar( array(
        'name' 			=> __( 'Footer: Column 3', 'apollohotel' ),
        'id' 			=> 'footer-col-3',
        'description' 	=> __( 'Widgets in this area will be shown on all posts and pages.', 'apollohotel' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="titlewidget">',
		'after_title'   => '</h2>',
		) );

	// footer col-4
	register_sidebar( array(
        'name' 			=> __( 'Footer: Column 4', 'apollohotel' ),
        'id' 			=> 'footer-col-4',
        'description' 	=> __( 'Widgets in this area will be shown on all posts and pages.', 'apollohotel' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="titlewidget">',
		'after_title'   => '</h2>',
		) );

}
add_action( 'widgets_init', 'astrothemes_widgets_init' );

/**
 * AstroThemes Custom Search Form for Bootstrap 4.
 */
function astrothemes_custom_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform form-inline" action="' . home_url( '/' ) . '" >
    <div>
	<!-- <label class="screen-reader-text" for="s">' . __( 'Search for:', 'apollohotel' ) . '</label> -->
    <input type="text" class="form-control" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" class="btn btn-primary btn-search" value="'. esc_attr__( 'Search', 'apollohotel' ) .'" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'astrothemes_custom_search_form', 100 );

/**
 * Replaces the default custom logo class attribute with the bootstrap navbar-brand.
 */
function astrothemes_custom_logo_mod() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class' => 'custom-logo',
            	)	
			);
	if (!$image) { return false; }
    $html = sprintf(
				'<div class="navbar-brand"><a href="%1$s">%2$s</a></div>',
				esc_url( home_url() ),
				$image
				);
    return $html;   
} 
add_filter( 'get_custom_logo', 'astrothemes_custom_logo_mod' );

/**
 * Bootstrap table
 */
function astrotheme_bootstrap_responsive_table( $content ) {
	$content = str_replace( 
		[ '<table>', '</table>' ], 
		[ '<table class="table table-hover table-striped table-responsive">', '</table>' ],
		$content
	);

	return $content;
}
add_filter( 'the_content', 'astrotheme_bootstrap_responsive_table' );

/**
 * Bootstrap navbar
 */
function astrothemes_navbar( $arr = array() ) {
	global $apollohotel;
	
	$menu = 'primary';
	$menu_id = false;
	$theme_location = 'primary';
	$container = '';
	$container_id = 'bs4navbar';
	$container_class = 'collapse navbar-collapse';
	$theme_location = 'primary';
	$nav_class = 'nav-left';
	$menu_class = 'navbar-nav ml-auto';
	
?>
    <nav class="navbar navbar-expand-lg navbar-light <?php echo $nav_class; ?>">

        <?php
		if ($nav_class != 'nav-right') {
		
			if ( function_exists( 'the_custom_logo' ) || is_customize_preview() ) {
				$logo = get_custom_logo();
				if ( !empty( $logo ) ) {
					echo $logo;
				}else{
        ?>
            <div class="navbar-brand">
                <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a> 
                <div class="navbar-brand-description"><?php bloginfo( 'description' ); ?></div>
            </div>
        <?php
				}
			}else{
        ?>
            <div class="navbar-brand">
                <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a> 
                <div class="navbar-brand-description"><?php bloginfo( 'description' ); ?></div>
            </div>
        <?php	
			}
        ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
		}
		?>

        <div id="bs4navbar" class="navbar-collapse collapse">
		<?php
        wp_nav_menu( array(
                     'menu'            => $menu,
                     'menu_id'         => $menu_id,
                     'menu_class'      => $menu_class,
                     'container'       => $container,
                     'container_id'    => $container_id,
                     'container_class' => $container_class,
                     'depth'           => 2,
                     'theme_location'  => $theme_location,
                     'fallback_cb'     => 'bs4navwalker::fallback',
                     'walker'          => new bs4navwalker()
                   )
                 );
        ?>
        </div>
        
        
    </nav>
<?php
}

/**
 * Handles JavaScript detection.
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function astrothemes_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'astrothemes_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function astrothemes_scripts() {
	
	global $apollohotel;

	$my_theme = wp_get_theme();

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'apollohotel-fonts', astrothemes_fonts_url(), array(), null );

	// Font-Awesome.
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css', null, '4.7.0' );

	// Boostrap.
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css', null, '4.0.0' );

	wp_enqueue_script( 
		'popper-min-js', 
		get_theme_file_uri( '/vendor/popper/popper.min.js' ), 
		array( 'jquery' ),
		'1.12.9', 
		true
	);
		
	wp_enqueue_script( 
		'bootstrap-min-js', 
		get_theme_file_uri( '/vendor/bootstrap/js/bootstrap.min.js' ), 
		array( 'jquery' ),
		'4.0.0', 
		true
	);

	// Comment reply.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Theme stylesheet.
	wp_enqueue_style( 'apollohotel-css', get_stylesheet_uri(), null, $my_theme->get( 'Version' ) );
	
	$theme_css = get_template_directory_uri() . '/css/style.css';
	$responsive_theme_css = get_template_directory_uri() . '/css/responsive.css';
	wp_enqueue_style( 'apollohotel-css-style', $theme_css, null, $my_theme->get( 'Version' ) );
	wp_enqueue_style( 'apollohotel-responsive-css-style', $responsive_theme_css, null, time() );

	// Theme JS
	wp_enqueue_script( 
		'scripts-js', 
		get_theme_file_uri( '/js/scripts.js' ), 
		array( 'jquery' ),
		false, 
		true
	);

}
add_action( 'wp_enqueue_scripts', 'astrothemes_scripts' );

/**
 * Get First Post Gallery in the Content
 */
function astrothemes_get_the_first_post_gallery( $post_id = false, $url_size = 'thumbnail', $link_url_size = 'large' ) {

	if ( !$post_id ) { return false; }
	
	$arr = array();
	// https://codex.wordpress.org/Function_Reference/get_post_galleries
	if ( get_post_galleries( $post_id ) ) :
		$gallery = get_post_galleries(  $post_id, false ); // get all galleries

		if ( count($gallery) > 1 ) { // if there are more galleries
			$gallery = $gallery[0];
			$ids = explode(',', $gallery['ids']);
			$srcs = $gallery['src'];
		}else{
			$ids = explode(',', $gallery[0]['ids']);
			$srcs = $gallery[0]['src'];
		}

		// loop through all the image and output them one by one
		$i = 0;
		foreach( $srcs as $src ) :
		
			$img = wp_get_attachment_image_src( $ids[$i], 'apollohotel-slideshow' );
			$img = $img[0];
			$img_lg = wp_get_attachment_image_src( $ids[$i], 'apollohotel-slideshow-lg' );
			$img_lg = $img_lg[0];
			$img_md = wp_get_attachment_image_src( $ids[$i], 'apollohotel-slideshow-md' );
			$img_md = $img_md[0];
			$img_sm = wp_get_attachment_image_src( $ids[$i], 'apollohotel-slideshow-sm' );
			$img_sm = $img_sm[0];
			
			// get caption or title for alt attribute
			$title = esc_attr( get_post( $ids[$i] )->post_title );
			$caption = esc_attr( get_post( $ids[$i] )->post_excerpt );
			
			$arr[] = array( 
							'img' 	 	=> $img, 
							'img_lg' 	=> $img_lg, 
							'img_md' 	=> $img_md, 
							'img_sm' 	=> $img_sm, 
							'title'  	=> $title, 
							'caption'  	=> $caption, 
							);

			$i++;
		endforeach;
			
	endif;

	return $arr; 
}

/**
 * Strip the First Gallery Shortcode from the Content
 */
function astrothemes_strip_first_shortcode_gallery( $content ) {
    preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if( false !== $pos ) {
                    $content = substr_replace( $content, '', $pos, strlen( $shortcode[0] ) );
					$content = apply_filters('the_content', $content);
					return $content;					
                }
            }
        }
    }

    return $content;
}

/**
 * Print the Comments
 */
function astrothemes_comments( $comment, $args, $depth ) {
	switch ( $comment->comment_type ) :
		case '' :
?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>">
				
					<div class="comment-author">
						<?php echo get_avatar( $comment, 50 ); ?>

                        <div class="comment-author-details">
                            <?php printf( __( '%s', 'apollohotel' ), sprintf( '<cite class="comment-author-name">%s</cite>', get_comment_author_link() ) ); ?>
                            <div class="comment-timestamp">
								<?php printf( __('%1$s at %2$s', 'apollohotel'), get_comment_date(), get_comment_time()); ?>
                            	<?php edit_comment_link( __( 'Edit', 'apollohotel' ), ' - ' ); ?>
                            </div>
                            <div class="btn-reply">
                                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                            </div><!-- .reply -->
                        </div>

					</div><!-- .comment-author .vcard -->
	
					<div class="comment-body">
	
						<div class="comment-content">
						<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'apollohotel' ); ?></p>
						<?php endif; ?>
	
						<?php comment_text(); ?>
						</div><!-- .comment-content -->

					</div><!-- .comment-body -->
	
				</div><!-- #comment-<?php comment_ID(); ?> -->
		
			</li><!-- #li-comment-<?php comment_ID(); ?> -->
		
<?php
		break;

		case 'pingback'  :
		case 'trackback' :
?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<p><?php _e( 'Pingback:', 'apollohotel' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'apollohotel' ), ' ' ); ?></p>
			</li>
<?php
		break;
	
	endswitch;
}

/**
 * Child Pages
 */
function astrothemes_list_child_pages() { 
	global $post;
	 
	$str = '';
	$childpages = false;
	if ( is_page() && $post->post_parent ) {
		$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&exclude=' . $post->ID . '&echo=0' );
	}
	
	if ( $childpages ) {
		$str = '<div class="related-pages">';
		$str .= '<h2>' . __( 'Related Pages', 'apollohotel' ) . '</h2>';
		$str .= '<ul>' . $childpages . '</ul>';
		$str .= '</div>';
	}
	echo $str;
}

/**
 * Strip shortcodes from home
 */
function astrothemes_remove_shortcode_from_index( $content ) {
	if ( is_home() || is_front_page() ) {
		$content = strip_shortcodes( $content );
	}
	return $content;
}
add_filter( 'the_content', 'astrothemes_remove_shortcode_from_index' );

/**
 * Add support for TGM Plugin Activation
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';
function astrothemes_require_plugins() {
 
    $plugins = array(
					array(
						'name'      => 'Responsive Lightbox & Gallery',
						'slug'      => 'responsive-lightbox',
						'required'  => false, // this plugin is recommended
					),
					array(
						'name'      => 'One Click Demo Import',
						'slug'      => 'one-click-demo-import',
						'required'  => false, // this plugin is recommended
					),
				);
 
    tgmpa( $plugins );
 
}
add_action( 'tgmpa_register', 'astrothemes_require_plugins' );

/**
 * Add support for OCDI
 */
require_once( get_template_directory() . '/inc/ocdi.php' );
