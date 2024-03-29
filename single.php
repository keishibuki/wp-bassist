<?php
/**
 * Single page template
 *
 * @package WordPress
 */

?>
<?php get_header(); ?>
<main>
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			get_template_part( 'inc/entry-page/entry', 'page' );
		endwhile;
	endif;
	?>
</main>

<footer class="footer">
	<?php // get_template_part( 'nav', 'below-single' ); ?>
</footer>
<?php get_footer(); ?>
