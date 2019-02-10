<?php
/**
 * Template Name: About Page - Full Scrolling
 *
 * Template for displaying about page with full page scrolling.
 *
 * @package understrap
 */

get_header();

//$about_content = new WP_Query( array( 'category_name' => 'about-content' ) );
?>
<div id="about-page" class="container-fluid">
	<div class="row">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'loop-templates/content', 'blank' ); ?>

		<?php endwhile; // end of the loop. ?>
	</div>
</div>
<?php get_footer(); ?>