<?php
/**
 * Template Name: Home Page Template
 *
 * Template for displaying a home page.
 *
 * @package understrap
 */

get_header();

$home_content = new WP_Query( array( 'post_type' => 'nat_case_studies', 'posts_per_page' => 6 ) );

?>
<div id="home-page" class="container-fluid">
	<div class="row">
		<div class="jumbotron jumbotron-fluid">
			<div class="container-fluid">
				<div class="row">
					<div id="crossCarousel" class="carousel slide carousel-fade" data-interval="10000" data-ride="carousel">
						<div class="carousel-inner" role="listbox">
							<?php
								$slide_number=0;
								if ( $home_content->have_posts() ) {
									while ( $home_content->have_posts() ) {
										$home_content->the_post();
										echo '<div data-slide-no="'.$slide_number.'" id="'.str_replace(" ","-",get_the_title()).'" class="carousel-item';
										if($slide_number==0) {
											echo ' active';
										}
										echo '">';
										if(has_post_thumbnail()){
											$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
											echo '<div class="splash-img" style="background-image:url('.$featured_img_url.')"></div>';
										}else{
											//missing image fallback
											echo'<div class="splash-img"></div>';
										}
										echo '<div class="carousel-caption"><a href="'.get_permalink( $post->ID ).'"><h5>';
										echo the_title();
										echo '</h5><p>';
										echo get_post_meta($post->ID, 'nat-project', true);
										echo '</p></a></div>';
										echo '</div>';
										$slide_number++;
									}
								}else{
									echo '<div class="carousel-item active">No featured posts yet</div>';
								}
								wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container-fluid">
			<div id="client-spotlight" class="row">
				<div class="container-fluid">
					<div class="row">
						<div class="col">
							<h1> CLIENTS </h1>
						</div>
					</div>
					<div id="client-logo-img" class="row justify-content-center">

						<?php
							$slide_number=0;
							if ( $home_content->have_posts() ) {
								while ( $home_content->have_posts() ) {
									$home_content->the_post();
									echo '<div data-slide-to="'.$slide_number.'" class="col-6 col-md-4 col-lg-2 crossCarousel-target';
									if($slide_number==0) {
										echo ' active';
									}
									echo '">';
									echo '<a href="'.get_permalink( $post->ID ).'">';
									echo '<img src="'.get_post_meta($post->ID, 'nat-logo', true).'" alt="';
									echo the_title_attribute();
									echo '" />';
									echo '</a>';
									echo '</div>';
									$slide_number++;
									
								}
								wp_reset_postdata();
							}else{
								echo 'no featured content yet';
							}
						?>
					</div>
				</div>
			</div>
			<div id="nature-exp" class="row">
				<div class="col-md-4">
					<?php if( is_active_sidebar( 'home-text-left' ) ) : ?>
						<?php dynamic_sidebar( 'home-text-left' ); ?>
					<?php endif; ?>
				</div>
				<div class="col-md-4">
					<?php if( is_active_sidebar( 'home-text-center' ) ) : ?>
						<?php dynamic_sidebar( 'home-text-center' ); ?>
					<?php endif; ?>
				</div>
				<div class="col-md-4">
					<?php if( is_active_sidebar( 'home-text-right' ) ) : ?>
						<?php dynamic_sidebar( 'home-text-right' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>