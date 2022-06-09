<?php
/**
 * Loop news component for post.
 *
 * @package WordPress
 */

?>

<?php
	$contrast           = $args['contrast'];
	$tag_classes        = true === $contrast ? 'text-white border border-white' : 'text-white bg-primary';
	$text_color_classes = true === $contrast ? 'text-white' : '';
?>

<li <?php post_class( array( 'flex', 'items-center', 'py-5', 'border-b', 'border-600', 'last:border-b-0' ) ); ?>>
	<time datetime="<?php the_time( 'Y-m-d' ); ?>"
		class="block text-sm leading-none <?php echo esc_attr( $text_color_classes ); ?>">
		<?php the_time( 'Y-m-d' ); ?>
	</time>
	<div class="flex items-center gap-2 mx-3">
		<?php $categories = get_the_terms( $post->ID, 'category' ); ?>
		<?php if ( $categories ) : ?>
			<?php foreach ( $categories as $post_cat ) : ?>
			<a href="<?php echo esc_url( get_term_link( $post_cat->term_id, 'category' ) ); ?>"
				class="inline-block px-3 py-1 text-sm <?php echo esc_attr( $tag_classes ); ?>">
				<?php echo esc_html( $post_cat->name ); ?>
			</a>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<h3 class="flex-1 font-bold line-clamp-1 <?php echo esc_attr( $text_color_classes ); ?>">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>
</li>
