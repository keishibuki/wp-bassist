<?php
/**
 * Loop news component for post.
 *
 * @package WordPress
 */

?>

<?php
	$post_taxonomy = isset( $args['taxonomy'] ) ? $args['taxonomy'] : 'category';
?>

<li
	<?php post_class( array( 'flex', 'flex-wrap', 'items-center', 'py-5', 'border-b', 'border-gray-300', 'last:border-b-0' ) ); ?>>
	<time datetime="<?php the_time( 'Y-m-d' ); ?>" class="block text-sm leading-none">
		<?php the_time( 'Y-m-d' ); ?>
	</time>
	<div class="flex items-center gap-2 ml-3 tablet:mx-3">
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
	<h3 class="mt-4 w-full font-bold line-clamp-1 tablet:mt-0 tablet:flex-1">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>
</li>
