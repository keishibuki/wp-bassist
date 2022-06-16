<?php
/**
 * Entry footer component.
 *
 * @package WordPress
 */

?>
<footer class="entry-footer pt-4 border-t border-gray-200">
	<?php
	$categories = get_the_terms( $post->ID, 'post_tag' );
	if ( $categories ) :
		?>
	<div class="flex gap-2">
		<?php
		foreach ( $categories as $post_cat ) {
			get_template_part(
				'inc/components/hashtag',
				null,
				array(
					'taxonomy' => 'post_tag',
					'term'     => $post_cat,
				)
			);
		}
		?>
	</div>
	<?php endif; ?>
</footer>
