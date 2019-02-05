<?php
/**
 * Template Name: Experiential Case Study
 * Template Post Type: nat_case_studies
 * @package understrap
 */
get_header();
?>
<div id="case-studies" class="container-fluid">
	<div class="row">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'loop-templates/content', 'blank' ); ?>

		<?php endwhile; // end of the loop. ?>
		</div>
	</div>
<?php get_footer(); ?>