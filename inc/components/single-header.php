<?php
/**
 * Page header component.
 *
 * @param $args { page_title: string, page_description }
 * @package WordPress
 */

$page_title       = isset( $args['page_title'] ) ? $args['page_title'] : '';
$page_description = isset( $args['page_description'] ) ? $args['page_description'] : '';
$post_taxonomy    = isset( $args['taxonomy'] ) ? $args['taxonomy'] : 'category';
if ( ! $page_title || ! $post_taxonomy ) {
	return;
}

?>
<div class="text-center py-16 bg-gray-200">
	<div class="container">
		<h1 class="text-4xl font-bold"><?php echo esc_html( $page_title ); ?></h1>
		<?php if ( $page_description ) : ?>
		<p class="text-base"><?php echo esc_html( $page_description ); ?></p>
		<?php endif; ?>
		<time class="block mt-4 text-base"><?php the_date(); ?></time>
		<div class="categories mt-4">
			<?php $categories = get_the_terms( $post->ID, $post_taxonomy ); ?>
			<?php
			if ( $categories ) {
				foreach ( $categories as $post_term ) {
					get_template_part(
						'inc/components/category',
						'label',
						array(
							'taxonomy' => $post_taxonomy,
							'term'     => $post_term,
						)
					);
				}
			}
			?>
		</div>
	</div>
</div>
