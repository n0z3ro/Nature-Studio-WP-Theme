<?php ?>
<div id="casestudies-foot-wrap"class="container-fluid">
	<div id="casestudies-foot" class="row">
	<div class="col-md-12 col-xl-12">THANKS, WE HOPE YOU ENJOY THE WORK!</div>
	<div class="col-md-12 col-xl-12"><strong>NEED HELP ON A SIMILAR PROJECT?</strong></div>
	<div class="col-md-12 col-xl-12"><a href="http://naturestudio.us/contact">HIRE US</a><a href="http://naturestudio.us/contact">STAY CONNECTED</a></div>
	<!--<div><img src="http://localhost:1003/wp-content/uploads/2018/08/Nature_Pepsi_Is-the-cola.jpg"><img src="http://localhost:1003/wp-content/uploads/2017/10/Scion-Work.jpg"></div>-->
	</div>
	<div class="row">
		<div class="jumbotron jumbotron-fluid">
			<div class="container-fluid">
				<div class="row">
					<div id="crossCarousel" class="carousel slide carousel-fade" data-interval="10000" data-ride="carousel">
						<div class="carousel-inner" role="listbox">
							<?php

$home_content = new WP_Query( array( 'post_type' => 'nat_case_studies', 'posts_per_page' => 6 ) );

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
</div>