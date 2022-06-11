<?php
/**
 * Loop card component for post.
 *
 * @package WordPress
 */

?>
<?php
	$post_taxonomy = isset( $args['taxonomy'] ) ? $args['taxonomy'] : 'category';
?>

<li <?php post_class(); ?>>
	<picture class="block">
		<a href="<?php the_permalink(); ?>">
			<?php
				$thumbnail_url = get_the_post_thumbnail_url( '', 'medium' );
			if ( $thumbnail_url ) :
				?>
			<img class="aspect-3/2 object-cover w-full" src="<?php echo esc_attr( $thumbnail_url ); ?>"
				alt="<?php the_title(); ?>">
			<?php else : ?>
			<img class="aspect-3/2 object-cover w-full" src="//placehold.jp/cccccc/999999/280x200.png?text=NoImage"
				alt="<?php the_title(); ?>">
			<?php endif; ?>
		</a>
	</picture>
	<time datetime="<?php the_time( 'Y-m-d' ); ?>"
		class="block text-sm leading-none mt-3"><?php the_time( 'Y-m-d' ); ?></time>
	<div class="flex items-center gap-2 my-3">
		<?php $categories = get_the_terms( $post->ID, $post_taxonomy ); ?>
		<?php if ( $categories ) : ?>
			<?php foreach ( $categories as $post_cat ) : ?>
			<a
				href="<?php echo esc_url( get_term_link( $post_cat->term_id, $post_taxonomy ) ); ?>"
				class="inline-block px-3 py-1 text-sm text-white bg-primary"
			>
				<?php echo esc_html( $post_cat->name ); ?>
			</a>
		<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<h3 class="font-bold line-clamp-2">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>
</li>
