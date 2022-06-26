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
	class="inline-block px-3 py-2 text-xs leading-none text-white bg-primary tablet:py-1 tablet:text-sm">
	<?php echo esc_html( $post_term->name ); ?>
</a>
