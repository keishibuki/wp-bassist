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
<div>
	<h1><?php echo esc_html( $page_title ); ?></h1>
	<?php if ( $page_description ) : ?>
	<p><?php echo esc_html( $page_description ); ?></p>
	<?php endif; ?>
</div>
