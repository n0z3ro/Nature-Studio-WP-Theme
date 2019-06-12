<?php
/**
 * Template Name: Nature Contact
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

get_header();
?>
<div id="contact-page" class="container-fluid">
	<div class="row">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'loop-templates/content', 'blank' ); ?>

		<?php endwhile; // end of the loop. ?>
		</div>
	</div>

<?php get_footer(); ?>
