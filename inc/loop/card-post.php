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

<li <?php post_class( array( 'scroll', 'fadeIn' ) ); ?>>
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
		<?php
		if ( $categories ) {
			foreach ( $categories as $post_cat ) {
				get_template_part(
					'inc/components/category',
					'label',
					array(
						'taxonomy' => $post_taxonomy,
						'term'     => $post_cat,
					)
				);
			}
		}
		?>
	</div>
	<h3 class="font-bold line-clamp-2">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>
</li>
