<?php
/**
 * Template Name: Home Page Template
 *
 * Template for displaying a home page.
 *
 * @package understrap
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'loop-templates/content', 'blank' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>