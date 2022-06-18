<?php
/**
 * Index template
 *
 * @package WordPress
 */

?>
<?php get_header(); ?>

<main>
	<section
		class="splide before:block before:content-[''] before:absolute before:inset-0 before:bg-black before:opacity-50 before:z-20">
		<div class="container">
			<div class="z-30 relative py-12 flex flex-col items-center justify-center text-white tablet:py-24">
				<h1 class="text-3xl tablet:text-5xl font-bold leading-none">キャッチコピー</h1>
				<p class="text-base text-center mt-5 tablet:mt-10">
					企業・サービス・製品が何かを補足するコピー企業・サービス・製品が何かを補足するコピー<br />企業・サービス・製品が何かを補足するコピー。</p>
				<div class="text-center mt-5 tablet:mt-10">
					<a href="<?php echo esc_attr( home_url( '/contact/' ) ); ?>"
						class="inline-block px-16 py-4 rounded font-bold border text-center border-primary text-white bg-primary transition-all duration-300 ease-in hover:bg-white hover:text-primary">
						お問い合わせ
					</a>
				</div>
			</div>
		</div>
		<div class="splide__track">
			<ul class="splide__list">
				<li class="splide__slide">
					<picture>
						<img src="https://picsum.photos/seed/100/1920/750" alt="" width="1920" height="750" />
					</picture>
				</li>
				<li class="splide__slide">
					<picture>
						<img src="https://picsum.photos/seed/200/1920/750" alt="" width="1920" height="750" />
					</picture>
				</li>
				<li class="splide__slide">
					<picture>
						<img src="https://picsum.photos/seed/300/1920/750" alt="" width="1920" height="750" />
					</picture>
				</li>
			</ul>
		</div>
	</section>
	<section class="py-12 pc:py-24">
		<div class="container">
			<h2 class="text-3xl font-bold leading-sung text-center mb-5 tablet:text-5xl tablet:mb-10 scroll fadeIn">
				<span class="block">FEATURE</span>
				<span class="text-lg block mt-1 tablet:text-2xl">特徴</span>
			</h2>
			<ul class="grid gap-8 tablet:grid-cols-3 scroll fadeIn">
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
	<?php
		$the_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'posts_per_page' => 5,
			)
		);
		?>
	<section class="py-12 bg-gray-200 pc:py-24">
		<div class="container">
			<h2 class="text-3xl font-bold leading-sung text-center mb-5 tablet:text-5xl tablet:mb-10 scroll fadeIn">
				<span class="block">INFORMATION</span>
				<span class="text-lg block mt-1 tablet:text-2xl">お知らせ</span>
			</h2>
			<?php if ( $the_query->have_posts() ) : ?>
			<ul class="scroll fadeIn">
				<?php
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					get_template_part( 'inc/loop/news', 'post' );
				}
				?>
			</ul>
			<div class="text-center mt-5 tablet:mt-10">
				<a href="<?php echo esc_attr( home_url( '/information/' ) ); ?>"
					class="inline-block px-8 py-4 rounded font-bold border text-center border-primary text-primary bg-white transition-all duration-300 ease-in hover:bg-primary hover:text-white scroll fadeIn">
					お知らせをもっと見る
				</a>
			</div>
			<?php endif; ?>
			<?php
			if ( ! $the_query->have_posts() ) {
				get_template_part( 'inc/components/nocontent', '', array( 'content_type' => 'お知らせ' ) );
			}
			?>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>
	<?php
		$the_query = new WP_Query(
			array(
				'post_type'           => 'post',
				'posts_per_page'      => 6,
				'ignore_sticky_posts' => false,
				'post__not_in'        => get_option( 'sticky_posts' ),
			)
		);
		?>
	<section class="py-12 pc:py-24">
		<div class="container">
			<h2 class="text-3xl font-bold leading-sung text-center mb-5 tablet:text-5xl tablet:mb-10 scroll fadeIn">
				<span class="block">BLOG</span>
				<span class="text-lg block mt-1 tablet:text-2xl">ブログ</span>
			</h2>
			<?php if ( $the_query->have_posts() ) : ?>
			<ul class="grid grid-cols-2 gap-x-4 gap-8 tablet:gap-x-8 tablet:grid-cols-3">
				<?php
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					get_template_part( 'inc/loop/card', 'post' );
				}
				?>
			</ul>
			<div class="text-center mt-5 tablet:mt-10">
				<a href="<?php echo esc_attr( home_url( '/blog/' ) ); ?>"
					class="inline-block px-8 py-4 rounded font-bold border text-center border-primary text-primary bg-white transition-all duration-300 ease-in hover:bg-primary hover:text-white scroll fadeIn">
					ブログをもっと見る
				</a>
			</div>
			<?php endif; ?>
			<?php
			if ( ! $the_query->have_posts() ) {
				get_template_part( 'inc/components/nocontent', '', array( 'content_type' => 'お知らせ' ) );
			}
			?>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>

	<?php get_template_part( 'inc/components/cta', 'inquiry' ); ?>
</main>

<?php get_footer(); ?>
