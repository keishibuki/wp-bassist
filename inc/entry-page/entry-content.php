<?php
/**
 * Entry content component.
 *
 * @package WordPress
 */

?>
<div class="entry-content py-12 pc:py-16" itemprop="mainEntityOfPage">
	<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) );
	}
	?>
	<?php the_content(); ?>
	<div class="clear-both"></div>
</div>
