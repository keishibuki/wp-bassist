<?php
/**
 * Site Footer
 *
 * @package WordPress
 */

$site_name = get_bloginfo( 'name' );
?>
<footer id="footer" role="contentinfo" class="bg-zinc-800 text-white py-8">
	<div class="container pc:flex">
		<div class="mb-8 pc:mb-0 pc:ml-4 pc:order-2">
			<?php
			wp_nav_menu(
				array(
					'container'       => 'nav',
					'container_id'    => 'primary-menu',
					'container_class' => '',
					'menu_class'      => 'grid gap-4 text-sm grid-cols-2 tablet:grid-cols-none tablet:grid-rows-5 tablet:grid-flow-col',
					'theme_location'  => 'footer',
					'li_class'        => '',
					'fallback_cb'     => false,
					'add_li_class'    => 'flex items-center',
					'add_a_class'     => '',
				)
			);
			?>
		</div>

		<div class="pc:flex-1 pc:order-1">
			<picture class="flex justify-center mb-4 pc:justify-start">
				<img src="https://placehold.jp/180x60.png" alt="<?php echo esc_html( $site_name ); ?>" />
			</picture>
			<p class="text-sm mb-2 text-center pc:text-left">
				株式会社〇〇〇〇<br />
				〒000-0000　<br class="pc:hidden" />東京都世田谷区代田6-6-1　<br class="pc:hidden" />TOKYU REIT下北沢スクエア 3F
			</p>
			<div id="copyright" class="text-xs text-center pc:text-left">
				&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?>
				<?php echo esc_html( $site_name ); ?>
			</div>
		</div>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>
