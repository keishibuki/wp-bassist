<?php
/**
 * Theme functions file.
 *
 * @package WordPress
 */

/**
 * Theme setup
 */
function bassist_setup() {
	load_theme_textdomain( 'bassist', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
	add_theme_support( 'woocommerce' );
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1920; }
	register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'bassist' ) ) );
}
add_action( 'after_setup_theme', 'bassist_setup' );

/**
 * Enqueue scripts & style
 */
function bassist_enqueue() {
	wp_enqueue_style( 'bassist-style', get_stylesheet_uri(), array(), gmdate( 'Ymd/Hi', filemtime( get_theme_file_path( 'style.css' ) ) ) );
	wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'bassist_enqueue' );

/**
 * Template redirect
 */
add_action(
	'template_redirect',
	function() {
		/**
		 * メディアページにアクセスした場合、添付先の投稿があればその投稿先へ、無ければTOPページへリダイレクト
		 */
		if ( is_attachment() ) {
			global $post;
			if ( $post && $post->post_parent ) {
				wp_safe_redirect( esc_url( get_permalink( $post->post_parent ) ), 301 );
				exit;
			} else {
				wp_safe_redirect( esc_url( home_url( '/' ) ), 301 );
				exit;
			}
		}
		/**
		 * Authorページにアクセスした場合TOPページにリダイレクト
		 */
		if ( is_author() ) {
			wp_safe_redirect( esc_url( home_url( '/' ) ), 301 );
			exit;
		}
	}
);
