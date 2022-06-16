<?php
/**
 * Category label component.
 *
 * @param $args { taxonomy: string, term: WP_Term }
 *
 * @package WordPress
 */

$post_taxonomy = isset( $args['taxonomy'] ) ? $args['taxonomy'] : 'category';
$post_term     = isset( $args['term'] ) ? $args['term'] : null;
if ( ! $post_term || ! isset( $post_term->name ) ) {
	return;
}

?>
<a href="<?php echo esc_url( get_term_link( $post_term->term_id, $post_taxonomy ) ); ?>"
	class="inline-block px-3 py-1 text-sm text-white bg-primary">
	<?php echo esc_html( $post_term->name ); ?>
</a>
