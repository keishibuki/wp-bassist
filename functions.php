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
	register_nav_menus(
		array(
			'primary' => 'Primary Menu',
			'footer'  => 'Footer Menu',
		)
	);
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
 * Enqueue scripts & style.
 */
function bassist_enqueue_scripts() {
	// Styles.
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), get_style_update_date() );
	wp_enqueue_style( 'app-style', get_theme_file_uri( '/assets/css/style.css' ), array(), get_style_update_date( get_theme_file_path( '/assets/css/style.css' ) ) );
	wp_enqueue_style( 'editor-style', get_theme_file_uri( '/assets/css/editor.css' ), array(), get_style_update_date( get_theme_file_path( '/assets/css/editor.css' ) ) );
	wp_enqueue_style( 'dashicons' );

	// Scripts.
	wp_enqueue_style( 'main-style', get_theme_file_uri( '/assets/js/main.css' ), array(), get_style_update_date( get_theme_file_path( '/assets/js/main.css' ) ) );
	wp_enqueue_script( 'main-scripts', get_theme_file_uri( '/assets/js/main.js' ), array(), get_style_update_date( get_theme_file_path( '/assets/js/main.js' ) ), true );
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

/**
 * Add "<li>" class to wp_nav_menu
 *
 * @param string[] $atts The HTML attributes applied to the menu item's <li> element, empty strings are ignored.
 * @param WP_Post  $menu_item The current menu item object.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return strong[]
 */
function add_additional_class_on_li( $atts, $menu_item, $args ) {
	if ( isset( $args->add_li_class ) ) {
		$atts['class'] = $args->add_li_class;
	}
	return $atts;
}
add_filter( 'nav_menu_css_class', 'add_additional_class_on_li', 1, 3 );

/**
 * Add "<a>" class to wp_nav_menu
 *
 * @param Array    $atts The HTML attributes applied to the menu item's <a> element, empty strings are ignored.
 * @param WP_Post  $menu_item The current menu item object.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return strong[]
 */
function add_additional_class_on_a( $atts, $menu_item, $args ) {
	if ( isset( $args->add_a_class ) ) {
		$atts['class'] = $args->add_a_class;
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3 );
