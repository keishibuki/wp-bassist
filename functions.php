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
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1920;
	}
	register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'bassist' ) ) );
}
add_action( 'after_setup_theme', 'bassist_setup' );

/**
 * Get the update date of the theme style
 *
 * @param string $style_path Css file path.
 * @return string
 */
function get_style_update_date( $style_path = '' ) {
	if ( ! $style_path ) {
		$style_path = get_theme_file_path( 'style.css' );
	}

	return gmdate( 'Ymd/Hi', filemtime( $style_path ) );
}

/**
 * Enqueue scripts & style
 */
function bassist_enqueue_scripts() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), get_style_update_date() );
	wp_enqueue_style( 'main-style', get_theme_file_uri( '/assets/css/style.css' ), array(), get_style_update_date( get_theme_file_path( '/assets/css/style.css' ) ) );
	wp_enqueue_style( 'editor-style', get_theme_file_uri( '/assets/css/editor.css' ), array(), get_style_update_date( get_theme_file_path( '/assets/css/editor.css' ) ) );
	wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'bassist_enqueue_scripts' );

/**
 * Enqueue block styles
 */
function bassist_enqueue_block_editor_assets() {
	wp_enqueue_style( 'twentynineteen-editor-customizer-styles', get_theme_file_uri( '/assets/css/editor.css' ), false, get_style_update_date( get_theme_file_path( '/assets/css/editor.css' ) ) );
}
add_action( 'enqueue_block_editor_assets', 'bassist_enqueue_block_editor_assets' );

/**
 * Visual Editor Customization
 * - Heading level restrictions
 *
 * @param array $settings An array with TinyMCE config.
 * @return array
 */
function my_custom_editor_settings( $settings ) {
	$settings['block_formats'] = '段落=p; 見出し2=h2; 見出し3=h3; 見出し4=h4;';
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'my_custom_editor_settings' );

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
