<?php
/**
 * CTA inquiry section.
 *
 * @package WordPress
 */

?>
<section class="py-12 pc:py-24 bg-gray-200">
	<div class="container">
		<h2 class="text-3xl font-bold leading-sung text-center mb-5 tablet:text-5xl tablet:mb-10 scroll fadeIn">
			<span class="block">CTAキャッチコピー</span>
			<span class="text-lg block mt-1 tablet:text-2xl">お問い合わせ</span>
		</h2>
		<div class="mt-5 text-center pc:flex pc:items-center pc:justify-center pc:mt-10">
			<div class="leading-none font-bold">お電話でのお問い合わせ</div>
			<div class="flex items-center justify-center leading-none text-4xl font-bold my-2 pc:ml-4">
				<span class="dashicons dashicons-phone mr-2"></span>
				<a href="tel:023-772-1433">023-772-1433​</a>
			</div>
			<div class="text-sm leading-none font-bold">（平日00:00〜00:00）</div>
		</div>
		<div class="text-center mt-5 tablet:mt-10">
			<a href="<?php echo esc_attr( home_url( '/contact/' ) ); ?>"
				class="inline-block px-8 py-4 rounded font-bold border text-center border-primary text-white bg-primary transition-all duration-300 ease-in hover:bg-white hover:text-primary scroll fadeIn">
				お問い合わせ
			</a>
		</div>
	</div>
</section>
