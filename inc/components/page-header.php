<?php
/**
 * Page header component.
 *
 * @param $args { page_title: string, page_description }
 * @package WordPress
 */

$page_title       = isset( $args['page_title'] ) ? $args['page_title'] : '';
$page_description = isset( $args['page_description'] ) ? $args['page_description'] : '';
if ( ! $page_title ) {
	return;
}

?>
<div class="text-center py-16 bg-gray-200">
	<div class="container">
		<h1 class="text-4xl font-bold"><?php echo esc_html( $page_title ); ?></h1>
		<?php if ( $page_description ) : ?>
		<p class="text-base"><?php echo esc_html( $page_description ); ?></p>
		<?php endif; ?>
	</div>
</div>
