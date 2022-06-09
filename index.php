<?php
/**
 * Index template
 *
 * @package WordPress
 */

?>
<?php get_header(); ?>
<div class="px-4 md:px-3 md:mx-auto md:container md:max-w-5xl">
	<?php if ( have_posts() ) : ?>
	<ul class="grid grid-cols-2 gap-x-4 gap-8 md:gap-x-8 md:grid-cols-3">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'inc/loop/card', 'post' );
		}
		?>
	</ul>
	<?php endif; ?>
	<?php
	get_template_part( 'nav', 'below' );
	?>
</div>
<?php
get_footer();
?>
