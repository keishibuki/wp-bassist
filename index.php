<?php
/**
 * Index template
 *
 * @package WordPress
 */

?>
<?php get_header(); ?>

<main>
	<section class="py-12 bg-gray-200">
		<div class="px-4 md:px-3 md:mx-auto md:container md:max-w-5xl">
			<h2 class="text-2xl leading-sung text-center mb-10 md:text-5xl">
				<span class="block">FEATURE</span>
				<span class="text-lg block mt-1 md:text-2xl">特徴</span>
			</h2>
			<ul class="grid gap-8 md:grid-cols-3">
				<li>
					<div class="text-4xl text-center">1</div>
					<picture class="block mt-4">
						<img src="https://picsum.photos/id/237/600/400" alt="" width="600" height="400"
							class="aspect-3/2 object-cover w-full rounded">
					</picture>
					<div class="mt-4 text-center">
						<p>
							〇〇〇〇数、コストパフォーマンス、<br />
							〇〇〇〇率、共に〇〇年連続で業界No.1
						</p>
					</div>
				</li>
				<li>
					<div class="text-4xl text-center">2</div>
					<picture class="block mt-4">
						<img src="https://picsum.photos/id/237/600/400" alt="" width="600" height="400"
							class="aspect-3/2 object-cover w-full rounded">
					</picture>
					<div class="mt-4 text-center">
						<p>
							〇〇業界の黎明期から〇〇年以上に<br />
							渡って積み上げた膨大なナレッジ
						</p>
					</div>
				</li>
				<li>
					<div class="text-4xl text-center">3</div>
					<picture class="block mt-4">
						<img src="https://picsum.photos/id/237/600/400" alt="" width="600" height="400"
							class="aspect-3/2 object-cover w-full rounded">
					</picture>
					<div class="mt-4 text-center">
						<p>
							〇〇業務はお客様自身で自走できるまで<br />
							専属コンサルタントがお手伝い
						</p>
					</div>
				</li>
			</ul>
		</div>
	</section>
	<section class="py-12">
		<div class="px-4 md:px-3 md:mx-auto md:container md:max-w-5xl">
			<h2 class="text-2xl leading-sung text-center mb-10 md:text-5xl">
				<span class="block">INFORMATION</span>
				<span class="text-lg block mt-1 md:text-2xl">お知らせ</span>
			</h2>
			<?php if ( have_posts() ) : ?>
			<ul class="">
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'inc/loop/news', 'post' );
				}
				?>
			</ul>
			<?php endif; ?>
		</div>
	</section>
	<section class="py-12 bg-primary">
		<div class="px-4 md:px-3 md:mx-auto md:container md:max-w-5xl">
			<h2 class="text-2xl leading-sung text-center mb-10 text-white md:text-5xl">
				<span class="block">INFORMATION</span>
				<span class="text-lg block mt-1 md:text-2xl">お知らせ</span>
			</h2>
			<?php if ( have_posts() ) : ?>
			<ul class="">
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'inc/loop/news', 'post', array( 'contrast' => true ) );
				}
				?>
			</ul>
			<?php endif; ?>
		</div>
	</section>
	<section class="py-12 bg-gray-200">
		<div class="px-4 md:px-3 md:mx-auto md:container md:max-w-5xl">
			<h2 class="text-2xl leading-sung text-center mb-5 md:mb-10 md:text-5xl">
				<span class="block">BLOG</span>
				<span class="text-lg block mt-1 md:text-2xl">ブログ</span>
			</h2>
			<?php if ( have_posts() ) : ?>
			<ul class="grid grid-cols-2 gap-x-4 gap-8 md:gap-x-8 md:grid-cols-3">
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'inc/loop/card', 'post' );
				}
				?>
			</ul>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>
