<?php
/**
 * Template Name: Media Case Study
 * Template Post Type: nat_case_studies
 * @package understrap
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'loop-templates/content', 'blank' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>