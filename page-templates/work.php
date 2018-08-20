<?php
/**
 * Template Name: Nature Work
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

get_header();

$work_content = new WP_Query( array( 'post_type' => 'nat_case_studies' ) );

?>
<div class="row no-gutters">
<?php
if ( $work_content->have_posts() ) {
while ( $work_content->have_posts() ) {
	$work_content->the_post();
	echo '<div class="col-6">';
	if(has_post_thumbnail()){
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
		echo '<div class="work-img">';
		echo '<a href="'.get_permalink( $post->ID ).'"><img src="'.$featured_img_url.'"/></a>';
		echo '</div>';
	}else{
		echo the_title();
		echo '</h5><p>sub header</p></div>';
	}
	echo '</div>';
}
}else{
echo '<div class="carousel-item active">No featured posts yet</div>';
}
wp_reset_postdata();
?>
</div>
<?php get_footer(); ?>
