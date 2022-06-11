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

<li <?php post_class( array( 'flex', 'items-center', 'py-5', 'border-b', 'border-600', 'last:border-b-0' ) ); ?>>
	<time datetime="<?php the_time( 'Y-m-d' ); ?>" class="block text-sm leading-none">
		<?php the_time( 'Y-m-d' ); ?>
	</time>
	<div class="flex items-center gap-2 mx-3">
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
	<h3 class="flex-1 font-bold line-clamp-1">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>
</li>
