<?php
/**
 * Template Name: Media Case Study
 * Template Post Type: nat_case_studies
 * @package understrap
 */
get_header();
?>
<div id="case-studies" class="container-fluid">
	<div id="casestudy_target" class="row">
		<?php //while ( have_posts() ) : the_post(); ?>

			<?php //get_template_part( 'loop-templates/content', 'blank' ); ?>

		<?php //endwhile; // end of the loop. ?>
	</div>
	<button id="casestudy-load-button" >Load Case Study</button>
</div>

<?php get_footer(); ?>