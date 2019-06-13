<?php $cs_footer_content = new WP_Query( array( 'post_type' => 'nat_case_studies', 'posts_per_page' => 6 ) ); ?>

<div id="casestudies-foot-wrap"class="container-fluid">
	<div id="casestudies-foot" class="row">
		<div class="col-md-12 col-xl-12">THANKS, WE HOPE YOU ENJOY THE WORK!</div>
		<div class="col-md-12 col-xl-12"><strong>NEED HELP ON A SIMILAR PROJECT?</strong></div>
		<div class="col-md-12 col-xl-12"><a href="http://naturestudio.us/contact">HIRE US</a><a href="http://naturestudio.us/contact">STAY CONNECTED</a></div>
	</div>
	<div class="row">
		<div id="casestudies-foot-carousel" class="carousel slide carousel-fade" data-interval="false" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#casestudies-foot-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#casestudies-foot-carousel" data-slide-to="1"></li>
				<li data-target="#casestudies-foot-carousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div data-slide-no="0" id="get_the_title" class="carousel-item active">
				<?php

					$slide_number=0;
					if ( $cs_footer_content->have_posts() ) {
						while ( $cs_footer_content->have_posts() and $slide_number<2) {
							$cs_footer_content->the_post();
							/*
							echo '<div data-slide-no="'.$slide_number.'" id="'.str_replace(" ","-",get_the_title()).'" class="carousel-item';
							if($slide_number==0) {
								echo ' active';
							}
							echo '">';
							*/
							if(has_post_thumbnail()){
								$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
								echo '<div class="cs-foot-img"><img src="'.$featured_img_url.'"></div>';
							}else{
								echo'<div class="cs-foot-img"></div>';
							}
							/*
							echo '<div class="carousel-caption"><a href="'.get_permalink( $post->ID ).'"><h5>';
							echo the_title();
							echo '</h5><p>';
							echo get_post_meta($post->ID, 'nat-project', true);
							echo '</p></a></div>';
							*/
							/*
							echo '</div>';
							*/
							$slide_number++;
						}
					}else{
						echo '<div class="carousel-item active">No featured posts yet</div>';
					}
					wp_reset_postdata();
				?>
				</div>
			</div>
			<a class="carousel-control-prev" href="#casestudies-foot-carousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#casestudies-foot-carousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>