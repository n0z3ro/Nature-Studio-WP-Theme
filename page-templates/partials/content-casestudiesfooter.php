<?php $cs_footer_content = new WP_Query( array( 'post_type' => 'nat_case_studies') ); ?>

<div id="casestudies-foot-wrap"class="container-fluid">
	<div id="casestudies-row" class="row">
		<div id="casestudies-foot" class="row">
			<div class="col-md-12 col-xl-12">THANKS, WE HOPE YOU ENJOY THE WORK!</div>
			<div class="col-md-12 col-xl-12"><strong>NEED HELP ON A SIMILAR PROJECT?</strong></div>
			<div class="col-md-12 col-xl-12"><a href="http://naturestudio.us/contact">HIRE US</a><a href="http://naturestudio.us/contact">STAY CONNECTED</a></div>
		</div>
		<div id="casestudies-foot-carousel-desktop" class="carousel slide desktop-carousel" data-interval="false" data-ride="carousel">
			<div class="carousel-inner" role="listbox">

			<?php

				$footer_posts = $cs_footer_content->posts;
				$posts_per_slide = 2;
				$chunks = array_chunk($footer_posts, $posts_per_slide);

				$slide_number=0;
				foreach($chunks as $chunk):

					echo '<div data-slide-no="'.$slide_number.'" class="carousel-item';
					if($slide_number==0) {
						echo ' active';
					}
					if(count($chunk) == 1){
						echo ' single-slide';
					};
					echo '">';
					foreach ($chunk as $post):
						$post_permalink = get_permalink( $post->ID );
						if(has_post_thumbnail()){
							$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}else{
							$featured_img_url = '#';
						}

						echo '<div class="cs-foot-img"><a href="'.$post_permalink.'"><img src="'.$featured_img_url.'"></a></div>';

					endforeach;
					echo '</div>';
					$slide_number++;
				endforeach;

				wp_reset_postdata();
					
				?>
				</div>
				<a class="carousel-control-prev carousel-control" href="#casestudies-foot-carousel-desktop" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next carousel-control" href="#casestudies-foot-carousel-desktop" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
		</div>
		<div id="casestudies-foot-carousel-mobile" class="carousel slide mobile-carousel" data-interval="false" data-ride="carousel">
			<div class="carousel-inner" role="listbox">

			<?php

				$footer_posts = $cs_footer_content->posts;
				$posts_per_slide = 1;
				$chunks = array_chunk($footer_posts, $posts_per_slide);

				$slide_number=0;
				foreach($chunks as $chunk):

					echo '<div data-slide-no="'.$slide_number.'" class="carousel-item';
					if($slide_number==0) {
						echo ' active';
					}
					if(count($chunk) == 1){
						echo ' single-slide';
					};
					echo '">';
					foreach ($chunk as $post):
						$post_permalink = get_permalink( $post->ID );
						if(has_post_thumbnail()){
							$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}else{
							$featured_img_url = '#';
						}

						echo '<div class="cs-foot-img"><a href="'.$post_permalink.'"><img src="'.$featured_img_url.'"></a></div>';

					endforeach;
					echo '</div>';
					$slide_number++;
				endforeach;

				wp_reset_postdata();
					
				?>
				</div>
				<a class="carousel-control-prev carousel-control" href="#casestudies-foot-carousel-mobile" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next carousel-control" href="#casestudies-foot-carousel-mobile" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
		</div>
	</div>
</div>