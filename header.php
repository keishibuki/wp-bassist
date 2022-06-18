<?php
/**
 * Site header
 *
 * @package WordPress
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<meta name="viewport-extra" content="width=device-width,initial-scale=1,min-width=375" />
	<?php wp_head(); ?>
	<?php if ( is_user_logged_in() ) : ?>
	<style type="text/css">
	html {
		margin-top: 0 !important;
	}

	#wpadminbar {
		display: none;
	}

	</style>
	<?php endif; ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<noscript>
		<div
			class="z-50 fixed top-0 right-0 bottom-0 left-0 w-screen h-screen bg-white flex items-center justify-center text-center">
			<p>このサイトではJavaScriptを使用しています。<br />JavaScriptを有効にしてください。</p>
		</div>
	</noscript>
	<div id="wrapper" class="hfeed">
		<header id="header" class="">
			<div class="px-4 py-2 flex items-center justify-between">
				<picture class="mr-4">
					<a href="<?php echo esc_attr( home_url() ); ?>">
						<img src="https://placehold.jp/180x60.png" alt="<?php echo esc_html( $site_name ); ?>" />
					</a>
				</picture>
				<div class="flex items-center justify-end flex-1">
					<nav id="primary-menu" class="flex-1">
						<?php
						wp_nav_menu(
							array(
								'container'       => null,
								'container_id'    => null,
								'container_class' => '',
								'menu_class'      => '',
								'theme_location'  => 'primary',
								'li_class'        => '',
								'fallback_cb'     => false,
								'add_li_class'    => '',
								'add_a_class'     => '',
							)
						);
						?>
						<button type="button" class="primary-menu-toggle">
							<span></span>
							<span></span>
							<span></span>
						</button>
					</nav>
					<a href="<?php echo esc_attr( home_url( '/contact' ) ); ?>"
						class="hidden pc:block ml-4 px-4 py-4 rounded font-bold border border-primary text-white bg-primary hover:bg-white hover:text-primary">
						お問い合わせ
					</a>
				</div>
				<button type="button" class="primary-menu-toggle">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
		</header>
