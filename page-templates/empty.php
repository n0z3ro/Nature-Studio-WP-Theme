<?php
/**
 * Template Name: Nature Empty Page Template
 *
 * Template for a page just with the header and footer area and a blank content area.
 *
 * @package understrap
 */

get_header();

while ( have_posts() ) : the_post();
	get_template_part( 'loop-templates/content', 'empty' );
endwhile;

get_footer();
