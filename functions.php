<?php
/**
 * Best Practice Media functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Best_Practice_Media
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function best_practice_media_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Best Practice Media, use a find and replace
		* to change 'best-practice-media' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'best-practice-media', get_template_directory() . '/languages' );

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
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'best-practice-media' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'best_practice_media_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'best_practice_media_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function best_practice_media_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'best_practice_media_content_width', 640 );
}
add_action( 'after_setup_theme', 'best_practice_media_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function best_practice_media_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'best-practice-media' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'best-practice-media' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'best_practice_media_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function best_practice_media_scripts() {
	wp_enqueue_style( 'best-practice-media-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'best-practice-media-style', 'rtl', 'replace' );
	wp_enqueue_script( 'best-practice-media-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_style( 'fontawesome-css', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css',_S_VERSION);
	wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',_S_VERSION);
	wp_enqueue_style( 'slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css	',_S_VERSION);
	wp_enqueue_style( 'slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css	',_S_VERSION);
	wp_enqueue_style( 'blocks_wp-css', get_stylesheet_directory_uri() . '/build/main.css',_S_VERSION);
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js	', array('jquery'), '1.0.0', true );
  wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/build/index.js', array('jquery'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'best_practice_media_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * ACF Blocks
 */
require get_template_directory() . '/inc/acf-blocks.php';

/**
 * Nav Walker
 */
require get_template_directory() . '/inc/nav-walker.php';


/**
 * Register Menu
 */
register_nav_menu('main-menu', 'Main menu');

/**
 * ACF OPTIONS
 */
if( function_exists('acf_add_options_page') ) {
    
	acf_add_options_page(array(
			'page_title'    => 'Theme General Settings',
			'menu_title'    => 'Theme Settings',
			'menu_slug'     => 'theme-general-settings',
			'capability'    => 'edit_posts',
			'redirect'      => false
	));
	
	acf_add_options_sub_page(array(
			'page_title'    => 'Theme Header Settings',
			'menu_title'    => 'Header',
			'parent_slug'   => 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
			'page_title'    => 'Theme Footer Settings',
			'menu_title'    => 'Footer',
			'parent_slug'   => 'theme-general-settings',
	));
	
}
