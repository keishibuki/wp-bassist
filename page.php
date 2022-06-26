<?php
/**
 * Page page template
 *
 * @package WordPress
 */

?>
<?php get_header(); ?>
<main>
	<?php
	get_template_part(
		'inc/components/page',
		'header',
		array(
			'page_title'       => get_the_title(),
			'page_description' => '',
		)
	);
	?>
	<div class="container">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
		endif;
		?>
	</div>
</main>

<?php get_footer(); ?>
