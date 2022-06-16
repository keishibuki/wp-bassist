<?php
/**
 * Entry content component for post.
 *
 * @package WordPress
 */

$post_taxonomy = isset( $args['taxonomy'] ) ? $args['taxonomy'] : 'category';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	get_template_part(
		'inc/components/single',
		'header',
		array(
			'page_title'       => get_the_title(),
			'page_description' => '',
			'taxonomy'         => 'category',
		)
	);
	?>
	<div class="container">
		<?php get_template_part( 'inc/entry-page/entry', 'content' ); ?>
		<?php get_template_part( 'inc/entry-page/entry', 'footer' ); ?>
	</div>
</article>
