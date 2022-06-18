<?php
/**
 * No content component.
 *
 * @param $args { content_type: string }
 *
 * @package WordPress
 */

$content_type = isset( $args['content_type'] ) ? $args['content_type'] : '';
if ( ! $content_type ) {
	return null;
}

?>
<div class="text-center">
	<p>
		<?php echo esc_html( $content_type ); ?>コンテンツが存在しません。
	</p>
</div>
