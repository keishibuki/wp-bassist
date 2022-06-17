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
	<div id="wrapper" class="hfeed">
		<header id="header" role="banner">
			<?php
			wp_nav_menu(
				array(
					'container'       => 'nav',
					'container_id'    => 'primary-menu',
					'container_class' => '',
					'menu_class'      => '',
					'theme_location'  => 'footer',
					'li_class'        => '',
					'fallback_cb'     => false,
					'add_li_class'    => 'flex items-center',
					'add_a_class'     => 'block w-full py-4 px-2 text-white text-center',
				)
			);
			?>
			<button type="button" id="primary-menu-toggle">
				<span></span>
				<span></span>
				<span></span>
			</button>
		</header>
