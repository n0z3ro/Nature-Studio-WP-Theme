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
	$nat_thumb = get_post_meta($post->ID, 'nat-thumb', true);
	echo '<div class="col-12 col-md-6"><div class="work-img">';
	if(strlen($nat_thumb) > 0){
		echo '<a href="'.get_permalink( $post->ID ).'"><img src="'.$nat_thumb.'"/></a>';
	}else{
		if(has_post_thumbnail()){
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
			
			echo '<a href="'.get_permalink( $post->ID ).'"><img src="'.$featured_img_url.'"/></a>';
			
		}else{
			echo '<div><a href="'.get_permalink( $post->ID ).'">';
			echo the_title();
			echo '<br>';
			echo get_post_meta($post->ID, 'nat-project', true);
			echo '</a></div>';
		}
	}
	echo '</div></div>';
}
}else{
	echo '<div class="col">No samples yet</div>';
}
wp_reset_postdata();
?>
</div>
<?php get_footer(); ?>
