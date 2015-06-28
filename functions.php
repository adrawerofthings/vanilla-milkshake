<?php
/**
 * Theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 * 
 * I don't like this setting (https://wycks.wordpress.com/2013/02/14/why-the-content_width-wordpress-global-kinda-sucks/)
 * even with theme support (https://core.trac.wordpress.org/ticket/21256) as it
 * penalizes responsive/fluid designs (not to mention the pixel-only metric).
 * So am setting very high to basically ignore it
 * since Wordpress requires it for theme uploads.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1920;
}

/**
 * Theme only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'vanillamilkshake_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vanillamilkshake_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'vanillamilkshake', get_template_directory() . '/languages' );

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
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width. Optional!
	 */
	add_editor_style( 'css/editor-style.css' );

}
endif; // vanillamilkshake_setup
add_action( 'after_setup_theme', 'vanillamilkshake_setup' );

/**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function vanillamilkshake_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'vanillamilkshake' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'vanillamilkshake' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vanillamilkshake_widgets_init' );

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function vanillamilkshake_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'vanillamilkshake_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function vanillamilkshake_scripts() {

	// Load Tachyons
	wp_enqueue_style( 'tachyons', get_template_directory_uri() . '/css/tachyons/css/tachyons.min.css' );

	// Load our custom stylesheet.
	wp_enqueue_style( 'vanillamilkshake-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'vanillamilkshake-ie', get_template_directory_uri() . '/css/ie.css', array( 'vanillamilkshake-style' ), '20141010' );
	wp_style_add_data( 'vanillamilkshake-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'vanillamilkshake-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'vanillamilkshake-style' ), '20141010' );
	wp_style_add_data( 'vanillamilkshake-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'vanillamilkshake-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'vanillamilkshake-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	wp_localize_script( 'vanillamilkshake-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'vanillamilkshake' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'vanillamilkshake' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'vanillamilkshake_scripts' );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function vanillamilkshake_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'vanillamilkshake_search_form_modify' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Customizer colors.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Media rich excerpts.
 */
require get_template_directory() . '/inc/rich-excerpt.php';
/**
 * Dashboard styling for post editing, feel free to delete
 */
function vanillamilkshake_load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'vanillamilkshake_load_custom_wp_admin_style' );