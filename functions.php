<?php
/**
 * nyan2score functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nyan2score
 */

if ( ! function_exists( 'nyan2score_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nyan2score_setup() {
	// Register Custom Navigation Walker
	require_once('inc/wp-bootstrap-navwalker.php');

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on nyan2score, use a find and replace
	 * to change 'nyan2score' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'nyan2score', get_template_directory() . '/languages' );

	// フィードリンクの設定
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * 投稿サムネイル
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'nyan2score' ),
		// 'menu-1' => esc_html__( 'Primary', 'nyan2score' ),
	) );

	/*
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nyan2score_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'nyan2score_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nyan2score_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nyan2score_content_width', 640 );
}
add_action( 'after_setup_theme', 'nyan2score_content_width', 0 );

/**
 * ウィジェットエリアを設定する
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nyan2score_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nyan2score' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'サイドバー部分のウィジェットエリアです', 'nyan2score' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'nyan2score_widgets_init' );

/**
 * scripts と styles をキューに入れます。
 */
function nyan2score_scripts() {
	// bootstrapのjavascriptを呼び出し
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/assets/javascripts/bootstrap.min.js', array(), '1.0.0', true );
	wp_enqueue_style( 'nyan2score-style', get_stylesheet_uri() );

	wp_enqueue_script( 'nyan2score-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'nyan2score-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nyan2score_scripts' );

// postclassで奇数と偶数用のクラスを追加。
function additional_post_classes( $classes ) {
	global $wp_query;
	if( $wp_query->found_posts < 1 ) {
		return $classes;
	}
	if( $wp_query->current_post == 0 ) {
		$classes[] = 'first';
	}
	if( $wp_query->current_post % 2 ) {
		$classes[] = 'even';
	} else {
		$classes[] = 'odd';
	}
	if( $wp_query->current_post == ( $wp_query->post_count - 1 ) ) {
		$classes[] = 'last';
	}
	return $classes;
}
add_filter( 'post_class', 'additional_post_classes' );

// アイキャッチ画像を有効にする。
add_theme_support('post-thumbnails'); 

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
