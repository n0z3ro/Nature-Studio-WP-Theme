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
							<!--
							<div class="carousel-item active">
								<div class="splash-img" style="background-image:url('<?php echo get_stylesheet_directory_uri() . '/img/NatureStudio-EA_Splash.jpg' ?>')"></div>
							</div>
							-->
							<?php
								$slide_number=0;
								if ( $home_content->have_posts() ) {
									while ( $home_content->have_posts() ) {
										$home_content->the_post();
										echo '<div data-slide-no="'.$slide_number.'" class="carousel-item';
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
											echo '<div class="carousel-caption d-none d-md-block"><h5>';
											echo the_title();
											echo '</h5><p>sub header</p></div>';
										}
										echo '</div>';
										$slide_number++;
									}
								}else{
									echo '<div class="carousel-item active">No featured posts yet</div>';
								}
								wp_reset_postdata();
							?>
						</div>
						<a class="carousel-control-prev" href="#crossCarousel" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#crossCarousel" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
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
							<h1> CLIENTS: </h1>
						</div>
					</div>
					<div id="client-logo-img" class="row">

						<?php
							$slide_number=0;
							if ( $home_content->have_posts() ) {
								while ( $home_content->have_posts() ) {
									$home_content->the_post();
									echo '<div data-slide-to="'.$slide_number.'" class="col-6 col-sm-6 col-md-2 crossCarousel-target';
									if($slide_number==0) {
										echo ' active';
									}
									echo '">';
									//echo '<img id="logo-scion" src="'.get_stylesheet_directory_uri().'/img/Logo_Scion.png" />';
									echo '<img src="'.get_post_meta($post->ID, 'nat-logo', true).'" />';
									echo '</div>';
									$slide_number++;
									
								}
								wp_reset_postdata();
							}else{
								echo 'no featured content yet';
							}
						?>
						<!--
						<div data-slide-to="0" class="col-6 col-sm-6 col-md-2 crossCarousel-target active">
							<img id="logo-scion" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Scion.png' ?>" />
						</div>
						<div data-slide-to="1" class="col-6 col-sm-6 col-md-2 crossCarousel-target">
							<img id="logo-spike" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Spike.png' ?>" />
						</div>
						<div data-slide-to="2" class="col-6 col-sm-6 col-md-2 crossCarousel-target">
							<img id="logo-pepsi" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Pepsi.png' ?>" />
						</div>
						<div data-slide-to="3" class="col-6 col-sm-6 col-md-2 crossCarousel-target">
							<img id="logo-nike" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Nike.png' ?>" />
						</div>
						<div data-slide-to="4" class="col-6 col-sm-6 col-md-2 crossCarousel-target">
							<img id="logo-ea" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_EASports.png' ?>" />
						</div>
						<div data-slide-to="5" class="col-6 col-sm-6 col-md-2 crossCarousel-target">
							<img id="logo-md" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_MountainDew.png' ?>" />
						</div>
						-->
					</div>
				</div>
			</div>
			<div id="nature-exp" class="row">
				<div class="col-md-4">
					<h1> WHO WE ARE: </h1>
					<div class="exp-txt">
						Nature was created by Nicanor Cruz and is a creative collective. We grow brands from the underground and make them pop. We consult brands and agencies in youth culture and lifestyle. We have a decade and a half of experience in custom
					</div>
				</div>
				<div class="col-md-4">
					<h1> WHAT WE DO: </h1>
					<div class="exp-txt">
						Nature creates opportunity for our clients to connect with their audiences in distinct, authentic, meaningful and rewarding ways. We are an agency that publishes and specialize in developing, marketing and distributing.... more
					</div>
				</div>
				<div class="col-md-4">
					<h1> SERVICES: </h1>
					<div class="exp-txt">
						<ul>
							<li>Market &amp; Culture Research</li>
							<li>Product &amp; Brand Development</li>
							<li>Strategy &amp; Management</li>
							<li>Content Development &amp; Production</li>
							<li>Media &amp; Advertising</li>
							<li>Print, Digital &amp; Experiential</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>